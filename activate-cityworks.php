<?php
// Database credentials from wp-config.php
define('DB_NAME', 'local');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_HOST', 'localhost');
$table_prefix = 'wp_';

// Connect to database using mysqli
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die(json_encode([
        'error' => 'Connection failed: ' . $mysqli->connect_error,
        'theme_activated' => false,
        'menu_created' => false,
        'front_page_set' => false,
    ]));
}

$mysqli->set_charset('utf8');

$results = [
    'theme_activated' => false,
    'menu_created' => false,
    'front_page_set' => false,
];

// 1. Activate theme - update template and stylesheet options
$stmt = $mysqli->prepare("UPDATE {$table_prefix}options SET option_value = ? WHERE option_name = ?");
$stmt->execute(['cityworks', 'template']);
$stmt->execute(['cityworks', 'stylesheet']);
if ($stmt->affected_rows >= 0) {
    $results['theme_activated'] = true;
}
$stmt->close();

// 2. Create/ensure "Main Menu" exists
$menu_name = 'Main Menu';
$menu_slug = 'main-menu';
$stmt = $mysqli->prepare("SELECT term_id FROM {$table_prefix}terms WHERE name = ? AND slug = ?");
$stmt->bind_param('ss', $menu_name, $menu_slug);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Create term
    $stmt->close();
    $stmt = $mysqli->prepare("INSERT INTO {$table_prefix}terms (name, slug, term_group) VALUES (?, ?, 0)");
    $stmt->bind_param('ss', $menu_name, $menu_slug);
    $stmt->execute();
    $menu_term_id = $stmt->insert_id;
    $stmt->close();

    // Create taxonomy relationship
    $stmt = $mysqli->prepare("INSERT INTO {$table_prefix}term_taxonomy (term_id, taxonomy, description, parent, count) VALUES (?, 'nav_menu', '', 0, 0)");
    $stmt->bind_param('i', $menu_term_id);
    $stmt->execute();
    $menu_taxonomy_id = $stmt->insert_id;
    $stmt->close();

    // Assign menu to 'primary' location
    $locations = get_option('nav_menu_locations') ?: [];
    $locations['primary'] = $menu_taxonomy_id;
    update_option('nav_menu_locations', $locations);

    $results['menu_created'] = true;
} else {
    $row = $result->fetch_assoc();
    $menu_term_id = $row['term_id'];
    $result->free();

    // Get taxonomy ID
    $stmt->close();
    $stmt = $mysqli->prepare("SELECT term_taxonomy_id FROM {$table_prefix}term_taxonomy WHERE term_id = ? AND taxonomy = 'nav_menu'");
    $stmt->bind_param('i', $menu_term_id);
    $stmt->execute();
    $tax_result = $stmt->get_result();
    if ($tax_result->num_rows > 0) {
        $tax_row = $tax_result->fetch_assoc();
        $menu_taxonomy_id = $tax_row['term_taxonomy_id'];
        // Assign to primary
        $locations = get_option('nav_menu_locations') ?: [];
        $locations['primary'] = $menu_taxonomy_id;
        update_option('nav_menu_locations', $locations);
    }
    $stmt->close();
    $results['menu_created'] = true;
}

// 3. Ensure "Home" page exists and set as front page
$stmt = $mysqli->prepare("SELECT ID FROM {$table_prefix}posts WHERE post_name = 'home' AND post_type = 'page' AND post_status != 'trash' LIMIT 1");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // Create Home page
    $stmt->close();
    $current_time = current_time('mysql');
    $stmt = $mysqli->prepare("INSERT INTO {$table_prefix}posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count) VALUES (?, ?, ?, '', 'Home', '', 'publish', 'open', 'open', '', 'home', '', '', ?, ?, '', 0, '', 0, 'page', '', 0)");
    $author_id = 1;
    $stmt->bind_param('issss', $author_id, $current_time, $current_time, $current_time, $current_time);
    $stmt->execute();
    $home_page_id = $stmt->insert_id;
    $stmt->close();

    update_option('page_on_front', $home_page_id);
    update_option('show_on_front', 'page');
    $results['front_page_set'] = true;
} else {
    $row = $result->fetch_assoc();
    $home_page_id = $row['ID'];
    update_option('page_on_front', $home_page_id);
    update_option('show_on_front', 'page');
    $results['front_page_set'] = true;
}

$mysqli->close();

// Helper functions to get/update options directly
function get_option($name) {
    global $mysqli, $table_prefix;
    $stmt = $mysqli->prepare("SELECT option_value FROM {$table_prefix}options WHERE option_name = ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return maybe_unserialize($row['option_value']);
    }
    return false;
}

function update_option($name, $value) {
    global $mysqli, $table_prefix;
    $value = maybe_serialize($value);
    $stmt = $mysqli->prepare("SELECT option_id FROM {$table_prefix}options WHERE option_name = ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        $stmt = $mysqli->prepare("UPDATE {$table_prefix}options SET option_value = ? WHERE option_name = ?");
        $stmt->bind_param('ss', $value, $name);
        $stmt->execute();
    } else {
        $stmt->close();
        $stmt = $mysqli->prepare("INSERT INTO {$table_prefix}options (option_name, option_value, autoload) VALUES (?, ?, 'yes')");
        $stmt->bind_param('ss', $name, $value);
        $stmt->execute();
    }
    $stmt->close();
}

function maybe_serialize($data) {
    if (is_array($data) || is_object($data)) {
        return serialize($data);
    }
    return $data;
}

function maybe_unserialize($data) {
    if (is_serialized($data)) {
        return @unserialize($data);
    }
    return $data;
}

function is_serialized($data) {
    $data = trim($data);
    if ($data == 'N;') return true;
    if (!preg_match('/^([adObis]):|O:\d+"/', $data)) return false;
    return true;
}

function current_time($format = 'mysql') {
    if ($format == 'mysql') {
        return current_time('Y-m-d H:i:s');
    }
    return gmdate($format);
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($results);
