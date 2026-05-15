<?php
// Override DB_HOST before wp-load.php pulls in wp-config.php
// wp-load.php excludes itself if ABSPATH is defined, so set it first:
if (!defined('ABSPATH')) { define('ABSPATH', __DIR__ . '/'); }

// Force correct port BEFORE connecting
$GLOBALS['wpdb_connect_args'] = ['127.0.0.1', 'root', 'root', 'local', true, 10011];

// Load WordPress partial without full wp-load.php
$_SERVER['HTTP_HOST'] = 'cityworks.local';
$_SERVER['SERVER_NAME'] = 'cityworks.local';
$_SERVER['REQUEST_URI'] = '/';
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['PHP_SELF'] = '/index.php';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_METHOD'] = 'GET';

require_once __DIR__ . '/wp-load.php';

$results = [
    'pages_created' => [],
    'menu_updated' => false,
];

// Check DB connection
if (empty($wpdb->dbh)) {
    echo "ERROR: DB not connected\n";
    echo "DB_HOST: " . DB_HOST . "\n";
    exit(1);
}

// Step 1: Create/resolve pages
$pages = [
    'servicios' => [
        'title'   => 'Servicios',
        'slug'    => 'servicios',
        'content' => '<h2>Nuestros Servicios</h2><p>Soluciones integrales en Google Cloud.</p>[cityworks_services]',
    ],
    'contacto' => [
        'title'   => 'Contacto',
        'slug'    => 'contacto',
        'content' => '<h2>Contáctanos</h2><p>Habla con un arquitecto cloud.</p>[cityworks_contact]',
    ],
    'casos-de-exito' => [
        'title'   => 'Casos de Éxito',
        'slug'    => 'casos-de-exito',
        'content' => '<h2>Casos de Éxito</h2><p>Resultados reales de nuestros clientes.</p>',
    ],
    'industrias' => [
        'title'   => 'Industrias',
        'slug'    => 'industrias',
        'content' => '<h2>Industrias que Servimos</h2>[cityworks_industries]',
    ],
];

foreach ($pages as $slug => $data) {
    $existing = get_page_by_path($slug, OBJECT, 'page');
    if ($existing) {
        if ($existing->post_status !== 'publish' || 
            $existing->post_content !== $data['content'] ||
            $existing->post_title !== $data['title']) {
            wp_update_post([
                'ID' => $existing->ID,
                'post_status' => 'publish',
                'post_content' => $data['content'],
                'post_title' => $data['title'],
            ]);
            $results['pages_created'][] = ['slug' => $slug, 'action' => 'updated', 'id' => $existing->ID];
        } else {
            $results['pages_created'][] = ['slug' => $slug, 'action' => 'exists', 'id' => $existing->ID];
        }
        continue;
    }

    $page_id = wp_insert_post([
        'post_title'   => $data['title'],
        'post_name'    => $data['slug'],
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_content' => $data['content'],
    ]);

    if (is_wp_error($page_id)) {
        $results['pages_created'][] = ['slug' => $slug, 'action' => 'error', 'message' => $page_id->get_error_message()];
    } else {
        $results['pages_created'][] = ['slug' => $slug, 'action' => 'created', 'id' => $page_id];
    }
}

// Step 2: Update wp_navigation using WordPress block functions
$nav_post = get_post(4);
if ($nav_post) {
    $servicios_id  = get_page_by_path('servicios');
    $contacto_id   = get_page_by_path('contacto');
    $casos_id      = get_page_by_path('casos-de-exito');
    $industrias_id = get_page_by_path('industrias');
    $home_id       = get_page_by_path('home');

    if ($servicios_id) { $servicios_id  = $servicios_id->ID; } else { $servicios_id = 0; }
    if ($contacto_id)  { $contacto_id   = $contacto_id->ID; } else { $contacto_id = 0; }
    if ($casos_id)     { $casos_id      = $casos_id->ID; } else { $casos_id = 0; }
    if ($industrias_id){ $industrias_id = $industrias_id->ID; } else { $industrias_id = 0; }
    if ($home_id)      { $home_id       = $home_id->ID; } else { $home_id = 0; }

    // Build a custom navigation block
    $blocks = [];

    // Home
    if ($home_id) {
        $blocks[] = [
            'blockName' => 'wp:navigation-link',
            'attrs' => [
                'kind' => 'post-type',
                'title' => (string)$home_id,
                'type' => 'page',
                'url' => '/',
                'label' => 'Home',
                'isTeaser' => false,
                'opensInNewTab' => false,
            ],
            'innerBlocks' => [],
            'innerContent' => [],
        ];
    }

    // Solutions -> /servicios
    if ($servicios_id) {
        $blocks[] = [
            'blockName' => 'wp:navigation-link',
            'attrs' => [
                'kind' => 'post-type',
                'title' => (string)$servicios_id,
                'type' => 'page',
                'url' => '/servicios',
                'label' => 'Solutions',
                'isTeaser' => false,
                'opensInNewTab' => false,
            ],
            'innerBlocks' => [],
            'innerContent' => [],
        ];
    }

    // Industries -> /industrias
    if ($industrias_id) {
        $blocks[] = [
            'blockName' => 'wp:navigation-link',
            'attrs' => [
                'kind' => 'post-type',
                'title' => (string)$industrias_id,
                'type' => 'page',
                'url' => '/industrias',
                'label' => 'Industries',
                'isTeaser' => false,
                'opensInNewTab' => false,
            ],
            'innerBlocks' => [],
            'innerContent' => [],
        ];
    }

    // Case Studies -> /casos-de-exito
    if ($casos_id) {
        $blocks[] = [
            'blockName' => 'wp:navigation-link',
            'attrs' => [
                'kind' => 'post-type',
                'title' => (string)$casos_id,
                'type' => 'page',
                'url' => '/casos-de-exito',
                'label' => 'Case Studies',
                'isTeaser' => false,
                'opensInNewTab' => false,
            ],
            'innerBlocks' => [],
            'innerContent' => [],
        ];
    }

    // Contact -> /contacto
    if ($contacto_id) {
        $blocks[] = [
            'blockName' => 'wp:navigation-link',
            'attrs' => [
                'kind' => 'post-type',
                'title' => (string)$contacto_id,
                'type' => 'page',
                'url' => '/contacto',
                'label' => 'Contact',
                'isTeaser' => false,
                'opensInNewTab' => false,
            ],
            'innerBlocks' => [],
            'innerContent' => [],
        ];
    }

    $nav_blocks = [[
        'blockName' => 'wp:navigation',
        'attrs' => [],
        'innerBlocks' => $blocks,
        'innerContent' => [],
    ]];

    $serialized = serialize_blocks($nav_blocks);
    $updated = wp_update_post([
        'ID' => 4,
        'post_content' => $serialized,
    ]);

    if (!is_wp_error($updated)) {
        $results['menu_updated'] = true;
    } else {
        // Try with direct SQL fallback
        $results['menu_updated'] = false;
        error_log('nav_update_error: ' . $updated->get_error_message());
    }
} else {
    error_log('Navigation post ID 4 not found');
}

echo json_encode($results, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
