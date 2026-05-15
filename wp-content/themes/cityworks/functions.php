<?php
/**
 * CityWorks Theme Functions
 *
 * @package CityWorks
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme constants - PRIMERO en todo el archivo
if (!defined('CITYWORKS_THEME_DIR')) {
    define('CITYWORKS_THEME_DIR', get_template_directory());
}
if (!defined('CITYWORKS_THEME_URL')) {
    define('CITYWORKS_THEME_URL', get_template_directory_uri());
}

/**
 * Register all Custom Post Types
 */
function cityworks_register_post_types() {

    // ==========================================
    // 0. SOLUTION PLAYS (Soluciones)
    // ==========================================
    register_post_type('solution_play', array(
        'labels' => array(
            'name' => __('Priority Plays', 'cityworks'),
            'singular_name' => __('Priority Play', 'cityworks'),
            'add_new' => __('Add Priority Play', 'cityworks'),
            'add_new_item' => __('Add New Priority Play', 'cityworks'),
            'edit_item' => __('Edit Priority Play', 'cityworks'),
            'new_item' => __('New Priority Play', 'cityworks'),
            'view_item' => __('View Priority Play', 'cityworks'),
            'search_items' => __('Search Priority Plays', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'priority-play'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_solutions_admin',
    ));
    
    // ==========================================
    // 1. SERVICES (Servicios)
    // ==========================================
    register_post_type('service', array(
        'labels' => array(
            'name' => __('Servicios', 'cityworks'),
            'singular_name' => __('Servicio', 'cityworks'),
            'add_new' => __('Añadir Servicio', 'cityworks'),
            'add_new_item' => __('Añadir Nuevo Servicio', 'cityworks'),
            'edit_item' => __('Editar Servicio', 'cityworks'),
            'new_item' => __('Nuevo Servicio', 'cityworks'),
            'view_item' => __('Ver Servicio', 'cityworks'),
            'search_items' => __('Buscar Servicios', 'cityworks'),
            'not_found' => __('No se encontraron servicios', 'cityworks'),
            'not_found_in_trash' => __('No se encontraron servicios en la papelera', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'servicios'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-hammer',
        'menu_position' => 5,
    ));

    // ==========================================
    // 2. INDUSTRIES (Industrias)
    // ==========================================
    register_post_type('industry', array(
        'labels' => array(
            'name' => __('Industrias', 'cityworks'),
            'singular_name' => __('Industria', 'cityworks'),
            'add_new' => __('Añadir Industria', 'cityworks'),
            'add_new_item' => __('Añadir Nueva Industria', 'cityworks'),
            'edit_item' => __('Editar Industria', 'cityworks'),
            'new_item' => __('Nueva Industria', 'cityworks'),
            'view_item' => __('Ver Industria', 'cityworks'),
            'search_items' => __('Buscar Industrias', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => 'industrias',
        'rewrite' => array('slug' => 'industrias'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_solutions_admin',
    ));

    // ==========================================
    // 3. CASE STUDIES (Casos de Éxito)
    // ==========================================
    register_post_type('case_study', array(
        'labels' => array(
            'name' => __('Casos de Éxito', 'cityworks'),
            'singular_name' => __('Caso de Éxito', 'cityworks'),
            'add_new' => __('Añadir Caso de Éxito', 'cityworks'),
            'add_new_item' => __('Añadir Nuevo Caso de Éxito', 'cityworks'),
            'edit_item' => __('Editar Caso de Éxito', 'cityworks'),
            'new_item' => __('Nuevo Caso de Éxito', 'cityworks'),
            'view_item' => __('Ver Caso de Éxito', 'cityworks'),
            'search_items' => __('Buscar Casos de Éxito', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'casos-de-exito'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_insights_admin',
    ));

    // ==========================================
    // 4. TEAM MEMBERS (Equipo)
    // ==========================================
    register_post_type('team_member', array(
        'labels' => array(
            'name' => __('Equipo', 'cityworks'),
            'singular_name' => __('Miembro del Equipo', 'cityworks'),
            'add_new' => __('Añadir Miembro', 'cityworks'),
            'add_new_item' => __('Añadir Nuevo Miembro', 'cityworks'),
            'edit_item' => __('Editar Miembro', 'cityworks'),
            'new_item' => __('Nuevo Miembro', 'cityworks'),
            'view_item' => __('Ver Miembro', 'cityworks'),
            'search_items' => __('Buscar Miembros', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'equipo'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_about_admin',
    ));

    // ==========================================
    // 5. TESTIMONIALS (Testimonios)
    // ==========================================
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonios', 'cityworks'),
            'singular_name' => __('Testimonio', 'cityworks'),
            'add_new' => __('Añadir Testimonio', 'cityworks'),
            'add_new_item' => __('Añadir Nuevo Testimonio', 'cityworks'),
            'edit_item' => __('Editar Testimonio', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'testimonios'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_about_admin',
    ));

    // ==========================================
    // 6. RESOURCES / WHITEPAPERS (Recursos)
    // ==========================================
    register_post_type('resource', array(
        'labels' => array(
            'name' => __('Recursos', 'cityworks'),
            'singular_name' => __('Recurso', 'cityworks'),
            'add_new' => __('Añadir Recurso', 'cityworks'),
            'add_new_item' => __('Añadir Nuevo Recurso', 'cityworks'),
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'recursos'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'show_in_menu' => 'cityworks_insights_admin',
    ));

}
add_action('init', 'cityworks_register_post_types', 0);

/**
 * Group secondary content types under the public information architecture.
 */
function cityworks_register_admin_menu_groups() {
    add_menu_page(
        __('Soluciones', 'cityworks'),
        __('Soluciones', 'cityworks'),
        'edit_posts',
        'cityworks_solutions_admin',
        'cityworks_admin_menu_group_page',
        'dashicons-lightbulb',
        6
    );

    add_menu_page(
        __('Insights', 'cityworks'),
        __('Insights', 'cityworks'),
        'edit_posts',
        'cityworks_insights_admin',
        'cityworks_admin_menu_group_page',
        'dashicons-welcome-write-blog',
        7
    );

    add_menu_page(
        __('Quienes Somos', 'cityworks'),
        __('Quienes Somos', 'cityworks'),
        'edit_posts',
        'cityworks_about_admin',
        'cityworks_admin_menu_group_page',
        'dashicons-groups',
        8
    );
}
add_action('admin_menu', 'cityworks_register_admin_menu_groups', 5);

/**
 * Simple landing screen for grouped admin menus.
 */
function cityworks_admin_menu_group_page() {
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    $title = $screen && !empty($screen->parent_file) ? $screen->parent_file : __('CityWorks', 'cityworks');
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('CityWorks Content Hub', 'cityworks'); ?></h1>
        <p><?php esc_html_e('Usa los submenus de la izquierda para editar el contenido de esta seccion.', 'cityworks'); ?></p>
        <p><code><?php echo esc_html($title); ?></code></p>
    </div>
    <?php
}

/**
 * Register Custom Taxonomies
 */
function cityworks_register_taxonomies() {
    
    // Service Categories
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name' => __('Categorías de Servicio', 'cityworks'),
            'singular_name' => __('Categoría de Servicio', 'cityworks'),
            'search_items' => __('Buscar Categorías', 'cityworks'),
            'all_items' => __('Todas las Categorías', 'cityworks'),
            'edit_item' => __('Editar Categoría', 'cityworks'),
            'update_item' => __('Actualizar Categoría', 'cityworks'),
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'servicio-categoria'),
    ));

    // Service Tags
    register_taxonomy('service_tag', 'service', array(
        'labels' => array(
            'name' => __('Etiquetas de Servicio', 'cityworks'),
            'singular_name' => __('Etiqueta de Servicio', 'cityworks'),
        ),
        'hierarchical' => false,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'servicio-etiqueta'),
    ));

    // Industry Locations (for filtering by country)
    register_taxonomy('industry_location', 'industry', array(
        'labels' => array(
            'name' => __('Ubicaciones', 'cityworks'),
            'singular_name' => __('Ubicación', 'cityworks'),
        ),
        'hierarchical' => false,
        'public' => true,
        'show_in_rest' => true,
    ));

}
add_action('init', 'cityworks_register_taxonomies');

/**
 * ==========================================
 * THEME SETUP
 * ==========================================
 */
function cityworks_setup() {
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 600, true);
    add_image_size('cityworks-hero', 1920, 1080, true);
    add_image_size('cityworks-service', 600, 400, true);
    add_image_size('cityworks-case', 800, 500, true);

    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cityworks'),
        'footer'  => esc_html__('Footer Menu', 'cityworks'),
    ));

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ));

    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-logo', array(
        'height'     => 100,
        'width'      => 300,
        'flex-width' => true,
        'flex-height'=> true,
    ));
}
add_action('after_setup_theme', 'cityworks_setup');

/**
 * Set the content width
 */
function cityworks_content_width() {
    $GLOBALS['content_width'] = 1200;
}
add_action('after_setup_theme', 'cityworks_content_width', 0);

/**
 * ==========================================
 * ENQUEUE SCRIPTS & STYLES
 * ==========================================
 */
function cityworks_scripts() {
    $theme_version = wp_get_theme()->get('Version');
    $style_version = filemtime(CITYWORKS_THEME_DIR . '/style.css') ?: $theme_version;
    $main_js_version = filemtime(CITYWORKS_THEME_DIR . '/assets/js/main.js') ?: $theme_version;
    $responsive_version = file_exists(CITYWORKS_THEME_DIR . '/assets/css/responsive.css')
        ? filemtime(CITYWORKS_THEME_DIR . '/assets/css/responsive.css')
        : $theme_version;

    // Google Fonts - Poppins
    wp_enqueue_style('cityworks-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), null);

    // Phosphor Icons
    wp_enqueue_style('cityworks-icons', 'https://unpkg.com/@phosphor-icons/web@2.1.0/css/phosphor.css', array(), null);

    // Main stylesheet
    wp_enqueue_style('cityworks-style', get_stylesheet_uri(), array(), $style_version);
    wp_add_inline_style('cityworks-style', cityworks_get_custom_color_css());

    if (file_exists(CITYWORKS_THEME_DIR . '/assets/css/responsive.css')) {
        wp_enqueue_style('cityworks-responsive', CITYWORKS_THEME_URL . '/assets/css/responsive.css', array('cityworks-style'), $responsive_version);
    }

    // Main JavaScript
    wp_enqueue_script('cityworks-main', CITYWORKS_THEME_URL . '/assets/js/main.js', array('jquery'), $main_js_version, true);

    // Animations JS
    wp_enqueue_script('cityworks-animations', CITYWORKS_THEME_URL . '/assets/js/animations.js', array(), '2.1.0', true);

    // AJAX
    wp_localize_script('cityworks-main', 'cityworks_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('cityworks_nonce'),
    ));

    // Comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cityworks_scripts');

/**
 * Convert Customizer color settings into CSS variables.
 */
function cityworks_get_custom_color_css() {
    $colors = array(
        'primary'   => get_theme_mod('color_primary', '#4a90e2'),
        'secondary' => get_theme_mod('color_secondary', '#ff8b00'),
        'dark'      => get_theme_mod('color_dark', '#1a1a2e'),
        'light'     => get_theme_mod('color_light', '#f7f7f7'),
    );

    foreach ($colors as $key => $value) {
        $colors[$key] = sanitize_hex_color($value);
    }

    return sprintf(
        ':root { --color-primary: %1$s; --color-primary-dark: %1$s; --color-secondary: %2$s; --color-secondary-dark: %2$s; --color-dark: %3$s; --color-light: %4$s; }',
        $colors['primary'] ?: '#4a90e2',
        $colors['secondary'] ?: '#ff8b00',
        $colors['dark'] ?: '#1a1a2e',
        $colors['light'] ?: '#f7f7f7'
    );
}

/**
 * Handle AJAX contact form submissions.
 */
function cityworks_handle_contact_form() {
    check_ajax_referer('cityworks_contact', 'nonce');

    $data = cityworks_sanitize_contact(wp_unslash($_POST));

    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        wp_send_json_error(array(
            'message' => __('Please fill in all fields.', 'cityworks'),
        ));
    }

    if (!is_email($data['email'])) {
        wp_send_json_error(array(
            'message' => __('Please enter a valid email address.', 'cityworks'),
        ));
    }

    $to      = get_theme_mod('contact_email', get_option('admin_email'));
    $subject = sprintf(__('New CityWorks contact request from %s', 'cityworks'), $data['name']);
    $body    = sprintf(
        "Name: %s\nEmail: %s\n\nMessage:\n%s",
        $data['name'],
        $data['email'],
        $data['message']
    );
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $data['name'] . ' <' . $data['email'] . '>',
    );

    if (!wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_error(array(
            'message' => __('We could not send your message. Please try again later.', 'cityworks'),
        ));
    }

    wp_send_json_success(array(
        'message' => __('Message sent successfully.', 'cityworks'),
    ));
}
add_action('wp_ajax_cityworks_contact', 'cityworks_handle_contact_form');
add_action('wp_ajax_nopriv_cityworks_contact', 'cityworks_handle_contact_form');

/**
 * ==========================================
 * WIDGET AREAS
 * ==========================================
 */
function cityworks_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'cityworks'),
        'id'            => 'sidebar-1',
        'description'   => __('Blog sidebar.', 'cityworks'),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-6">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title mb-3">',
        'after_title'   => '</h3>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 1', 'cityworks'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title mb-3">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 2', 'cityworks'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title mb-3">',
        'after_title'   => '</h4>',
    ));
    register_sidebar(array(
        'name'          => __('Footer Column 3', 'cityworks'),
        'id'            => 'footer-3',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title mb-3">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'cityworks_widgets_init');

/**
 * Include required files
 */
require_once CITYWORKS_THEME_DIR . '/includes/template-functions.php';
require_once CITYWORKS_THEME_DIR . '/includes/customizer.php';
require_once CITYWORKS_THEME_DIR . '/includes/widgets.php';
require_once CITYWORKS_THEME_DIR . '/includes/shortcodes.php';

/**
 * Insert starter CPT content only when that exact title does not exist.
 */
function cityworks_seed_content_post($post_type, $title, $content, $meta = array(), $excerpt = '', $menu_order = 0) {
    $existing = get_posts(array(
        'post_type'      => $post_type,
        'post_status'    => 'any',
        'title'          => $title,
        'posts_per_page' => 1,
        'fields'         => 'ids',
    ));

    if (!empty($existing)) {
        return (int) $existing[0];
    }

    $post_id = wp_insert_post(array(
        'post_type'    => $post_type,
        'post_title'   => $title,
        'post_content' => $content,
        'post_excerpt' => $excerpt,
        'post_status'  => 'publish',
        'menu_order'   => $menu_order,
    ));

    if (!is_wp_error($post_id)) {
        foreach ($meta as $key => $value) {
            update_post_meta($post_id, $key, $value);
        }
    }

    return $post_id;
}

/**
 * Seed editable starter content for empty areas.
 */
function cityworks_seed_default_content() {
    $solutions = array(
        array('AI', 'Convertimos casos de uso de IA en flujos productivos, gobernados y medibles.', 'Automatizacion inteligente sin perder control operativo.', 'Vertex AI, Gemini for Google Cloud, Document AI, AI governance', 'ph-brain'),
        array('Data', 'Creamos bases modernas de datos para analitica, reporting, automatizacion e IA.', 'Decisiones mas rapidas con datos confiables.', 'BigQuery, Looker, Data pipelines, Data quality', 'ph-chart-line-up'),
        array('Infrastructure', 'Disenamos fundamentos cloud seguros para migracion, modernizacion y plataformas escalables.', 'Operaciones resilientes con menor friccion tecnica.', 'Cloud migration, GKE, Landing zones, Platform engineering', 'ph-cloud'),
        array('Security', 'Integramos seguridad cloud, deteccion de amenazas y cumplimiento dentro del modelo operativo.', 'Menos exposicion, mas visibilidad y mejor respuesta.', 'Chronicle, Mandiant, Zero Trust, Cloud posture management', 'ph-shield-check'),
        array('Agentic Workplace Transformation', 'Transformamos la colaboracion con Workspace, Gemini y agentes orientados a procesos reales.', 'Equipos mas productivos, adopcion mas clara.', 'Google Workspace, Gemini adoption, Agentspace, Workflow automation', 'ph-users-three'),
    );

    foreach ($solutions as $index => $solution) {
        cityworks_seed_content_post('solution_play', $solution[0], $solution[1], array(
            'solution_outcome' => $solution[2],
            'solution_items'   => $solution[3],
            'solution_icon'    => $solution[4],
        ), $solution[1], $index + 1);
    }

    $services = array(
        array('Cloud Migration & Modernization', 'Migracion, modernizacion y landing zones en Google Cloud con gobierno, seguridad y automatizacion desde el primer dia.', 'cloud'),
        array('AI & Vertex AI Delivery', 'Casos de uso con Gemini, Vertex AI y Document AI llevados desde prototipo hasta operacion real.', 'brain'),
        array('Data Analytics & Looker', 'BigQuery, Looker, pipelines y calidad de datos para decisiones confiables y tableros accionables.', 'chart-line-up'),
        array('Security Operations', 'Arquitectura Zero Trust, posture management, Chronicle y respuesta con practicas de seguridad cloud.', 'shield-check'),
        array('Google Workspace Transformation', 'Adopcion de Workspace, Gemini y automatizacion de flujos colaborativos con control administrativo.', 'users-three'),
        array('Cloud Optimization & FinOps', 'Auditorias de gasto, rightsizing, etiquetas, presupuestos y roadmaps de ahorro medible.', 'coins'),
        array('Change Management', 'Consultoria de adopcion digital, comunicacion, champions internos y transformacion cultural.', 'arrows-clockwise'),
        array('Managed Support', 'Soporte administrativo, continuidad operativa, monitoreo y mejoras continuas despues del go-live.', 'headset'),
    );

    foreach ($services as $index => $service) {
        cityworks_seed_content_post('service', $service[0], $service[1], array(
            'service_icon' => $service[2],
        ), $service[1], $index + 1);
    }

    $industries = array(
        array('Financial Services', 'Open banking, seguridad, modernizacion de core y analitica para instituciones financieras.', 'Apigee, GKE, Agentspace, Chronicle'),
        array('Healthcare & Life Sciences', 'Datos clinicos, IA aplicada, cumplimiento y colaboracion segura para organizaciones de salud.', 'Healthcare Data Engine, Vertex AI, Document AI, Workspace'),
        array('Retail & CPG', 'Analitica de demanda, personalizacion, comercio digital y operaciones conectadas.', 'BigQuery, Looker, Customer Data Platform, Cloud Commerce'),
        array('Public Sector', 'Servicios digitales, automatizacion documental, datos ciudadanos y seguridad institucional.', 'Workspace, Document AI, BigQuery, Chronicle'),
        array('Manufacturing', 'Datos operativos, mantenimiento predictivo, cadena de suministro y tableros de produccion.', 'Manufacturing Data Engine, Vertex AI, IoT, Looker'),
    );

    foreach ($industries as $index => $industry) {
        cityworks_seed_content_post('industry', $industry[0], $industry[1], array(
            'industry_solutions' => $industry[2],
        ), $industry[1], $index + 1);
    }

    $cases = array(
        array('Cloud migration operating model', 'Legacy infrastructure created slow releases and rising costs.', 'Built a Google Cloud migration operating model with landing zones, GKE and Terraform.', '38% cost reduction and 60% faster deployments.', 'Financial Services'),
        array('AI adoption for document workflows', 'Manual review slowed back-office operations.', 'Implemented Document AI and Vertex AI workflows with governance and human review.', '10x faster document processing with better traceability.', 'Operations'),
        array('Workspace security modernization', 'Collaboration tools needed stronger controls and admin visibility.', 'Rolled out Workspace security posture, Gemini enablement and admin training.', 'Higher adoption with stronger governance.', 'Productivity'),
    );

    foreach ($cases as $index => $case) {
        cityworks_seed_content_post('case_study', $case[0], $case[2], array(
            'problem'  => $case[1],
            'solution' => $case[2],
            'result'   => $case[3],
            'industry' => $case[4],
        ), $case[3], $index + 1);
    }

    $resources = array(
        array('FinOps checklist for Google Cloud', 'Guia practica para detectar desperdicio, ordenar presupuestos y priorizar ahorros en Google Cloud.', 'Whitepaper'),
        array('Gemini adoption guide', 'Checklist para preparar equipos, procesos y gobierno antes de escalar Gemini en la organizacion.', 'Guide'),
        array('Cloud security assessment', 'Marco inicial para revisar postura, accesos, logging y respuesta ante incidentes.', 'Assessment'),
    );

    foreach ($resources as $index => $resource) {
        cityworks_seed_content_post('resource', $resource[0], $resource[1], array(
            'resource_type' => $resource[2],
        ), $resource[1], $index + 1);
    }
}

/**
 * ==========================================
 * THEME ACTIVATION
 * ==========================================
 */
function cityworks_theme_activation() {
    $defaults = array(
        'hero_badge'         => 'Google Cloud Partner',
        'hero_title'         => 'Enterprise Cloud, AI & Security Solutions for Modern Businesses',
        'hero_subtitle'      => 'We help organizations modernize infrastructure, deploy AI solutions and secure operations using Google Cloud technologies.',
        'hero_cta_text'      => 'Talk to a Cloud Architect',
        'hero_cta_link'      => '#contact',
        'contact_email'      => 'marketing@city.works',
        'contact_phone_usa'  => '1-561-772-3033',
        'footer_copyright'   => '&copy; ' . date('Y') . ' CityWorks. All rights reserved.',
    );
    foreach ($defaults as $key => $value) {
        if (get_theme_mod($key) === false) {
            set_theme_mod($key, $value);
        }
    }

    // Register CPTs & Taxonomies
    cityworks_register_post_types();
    cityworks_register_taxonomies();

    // Create/update primary menu
    $menu_name = 'Main Menu';
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
        $menu_id = wp_create_nav_menu($menu_name);
    } else {
        $menu_id = $menu->term_id;
    }
    
    $menu_items = array(
        array('title' => 'Home',              'url' => home_url('/'),                    'type' => 'custom'),
        array('title' => 'Soluciones',        'url' => home_url('/soluciones'),           'type' => 'custom'),
        array('title' => 'Servicios',         'url' => home_url('/servicios'),            'type' => 'custom'),
        array('title' => 'CityWorks Academy', 'url' => home_url('/cityworks-academy'),    'type' => 'custom'),
        array(
            'title' => 'Insights',
            'url' => home_url('/insights'),
            'type' => 'custom',
            'children' => array(
                array('title' => 'Casos de Exito', 'url' => home_url('/casos-de-exito'), 'type' => 'custom'),
                array('title' => 'Recursos',       'url' => home_url('/recursos'),        'type' => 'custom'),
            ),
        ),
        array(
            'title' => 'Quienes Somos',
            'url' => home_url('/quienes-somos'),
            'type' => 'custom',
            'children' => array(
                array('title' => 'Equipo', 'url' => home_url('/equipo'), 'type' => 'custom'),
            ),
        ),
        array('title' => 'Contacto',          'url' => home_url('/contacto'),             'type' => 'custom'),
    );

    $flatten_menu_items = function ($items) use (&$flatten_menu_items) {
        $flat = array();

        foreach ($items as $item) {
            $flat[] = $item['title'];

            if (!empty($item['children'])) {
                $flat = array_merge($flat, $flatten_menu_items($item['children']));
            }
        }

        return $flat;
    };

    $existing_items = wp_get_nav_menu_items($menu_id);
    $existing_items = is_array($existing_items) ? $existing_items : array();
    $allowed_menu_titles = $flatten_menu_items($menu_items);
    foreach ($existing_items as $existing) {
        if (!in_array($existing->title, $allowed_menu_titles, true)) {
            wp_delete_post($existing->ID, true);
        }
    }

    $existing_items = wp_get_nav_menu_items($menu_id);
    $existing_items = is_array($existing_items) ? $existing_items : array();

    $existing_by_title = array();
    foreach ($existing_items as $existing) {
        $existing_by_title[$existing->title] = $existing;
    }

    $menu_position = 1;
    $sync_menu_items = function ($items, $parent_id = 0) use (&$sync_menu_items, &$existing_by_title, &$menu_position, $menu_id) {
        foreach ($items as $item) {
            $existing_id = isset($existing_by_title[$item['title']]) ? $existing_by_title[$item['title']]->ID : 0;
            $item_id = wp_update_nav_menu_item($menu_id, $existing_id, array(
                'menu-item-title'     => $item['title'],
                'menu-item-url'       => $item['url'],
                'menu-item-status'    => 'publish',
                'menu-item-type'      => $item['type'] ?? 'custom',
                'menu-item-position'  => $menu_position,
                'menu-item-parent-id' => $parent_id,
            ));

            if (!is_wp_error($item_id)) {
                $existing_by_title[$item['title']] = (object) array('ID' => $item_id);
                $menu_position++;

                if (!empty($item['children'])) {
                    $sync_menu_items($item['children'], $item_id);
                }
            }
        }
    };

    $sync_menu_items($menu_items);
    
    set_theme_mod('nav_menu_locations', array(
        'primary' => $menu_id,
        'footer'  => $menu_id,
    ));

    // Create/update default pages
    $pages = array(
        'about' => array(
            'title'   => 'About',
            'content' => '<div class="container section"><div class="grid grid-cols-1 lg:grid-cols-3 gap-8"><div class="lg:col-span-2"><h2 class="section-title">About CityWorks</h2><p>CityWorks is a premier Google Cloud Partner specializing in cloud migration, AI/ML deployment, data analytics, and cybersecurity across North America and Latin America.</p><h3 style="margin-top:2rem;">Our Mission</h3><p>To be the strategic partner in Latin America for companies across all industries, providing innovative and efficient technological solutions through Google Cloud.</p><h3 style="margin-top:2rem;">Our Vision</h3><p>To become a leading force across "The Americas" — United States, Canada, and LATAM — with our base of operations in Palm Beach Gardens, Florida.</p></div><div class="lg:col-span-1"><div class="card p-6 sticky" style="top:120px;"><h4 style="margin-bottom:1rem;">Our Values</h4><ul style="display:flex;flex-direction:column;gap:1rem;"><li><strong>Ethics:</strong><br>Complete honesty and transparency in all operations.</li><li><strong>Innovation:</strong><br>Always seeking new ways with Google Cloud.</li><li><strong>Teamwork:</strong><br>Collaboration and shared knowledge.</li></ul></div></div></div></div>',
        ),
        'servicios' => array(
            'title'   => 'Servicios',
            'content' => '[cityworks_consulting_services]<div class="container section"><div class="section-header"><h1 class="section-title">Implementacion Tecnica</h1><p class="section-subtitle">Soluciones integrales de Google Cloud para transformar tu negocio.</p></div>[cityworks_services]</div>',
        ),
        'industrias' => array(
            'title'   => 'Industrias',
            'content' => '<div class="section-header text-center section" style="padding-top:120px;"><h1 class="section-title">Industrias que Servimos</h1><p class="section-subtitle" style="max-width:600px;margin:0 auto 3rem;">Estrategias cloud adaptadas a cada sector.</p></div>[cityworks_industries]',
        ),
        'casos-de-exito' => array(
            'title'   => 'Casos de Éxito',
            'content' => '<div class="section-header text-center section" style="padding-top:120px;"><h1 class="section-title">Casos de Éxito</h1><p class="section-subtitle" style="max-width:600px;margin:0 auto 3rem;">Resultados reales de transformaciones digitales.</p></div><div class="container section"><div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">[cityworks_case_studies]</div></div>',
        ),
        'contacto' => array(
            'title'   => 'Contacto',
            'content' => '[cityworks_contact]',
        ),
        'soluciones' => array(
            'title'   => 'Soluciones',
            'content' => '[cityworks_priority_plays]',
        ),
        'cityworks-academy' => array(
            'title'   => 'CityWorks Academy',
            'content' => '[cityworks_academy_placeholder]',
        ),
        'insights' => array(
            'title'   => 'Insights',
            'content' => '[cityworks_insights]',
        ),
        'recursos' => array(
            'title'   => 'Recursos',
            'content' => '[cityworks_resources]',
        ),
        'quienes-somos' => array(
            'title'   => 'Quienes Somos',
            'content' => '[cityworks_about_overview]',
        ),
        'equipo' => array(
            'title'   => 'Equipo',
            'content' => '[cityworks_team]',
        ),
    );
    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug);
        if ($existing) {
            if (trim($existing->post_content) === '') {
                wp_update_post(array(
                    'ID'           => $existing->ID,
                    'post_content' => $page['content'],
                    'post_status'  => 'publish',
                ));
            }
        } else {
            wp_insert_post(array(
                'post_title'   => $page['title'],
                'post_content' => $page['content'],
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_name'    => $slug,
            ));
        }
    }

    cityworks_seed_default_content();

    // Prepare Academy categories for the future learning hub. LMS is intentionally deferred.
    if (!term_exists('CityWorks Academy', 'category')) {
        wp_insert_term('CityWorks Academy', 'category', array(
            'slug' => 'cityworks-academy',
        ));
    }

    foreach (array('AI', 'Data', 'Infrastructure', 'Security', 'Workspace') as $academy_category) {
        if (!term_exists($academy_category, 'category')) {
            wp_insert_term($academy_category, 'category');
        }
    }

    // Set homepage
    $front_page = get_option('page_on_front');
    if (!$front_page) {
        $home = get_page_by_path('home');
        if (!$home) {
            $home_id = wp_insert_post(array(
                'post_title'   => 'Home',
                'post_content' => '[cityworks_home]',
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_name'    => 'home',
            ));
            update_option('page_on_front', $home_id);
            update_option('show_on_front', 'page');
        } else {
            update_option('page_on_front', $home->ID);
            update_option('show_on_front', 'page');
        }
    }

    $home_page_id = get_option('page_on_front');
    if ($home_page_id && trim((string) get_post_field('post_content', $home_page_id)) === '') {
        wp_update_post(array(
            'ID'           => $home_page_id,
            'post_content' => '[cityworks_home]',
        ));
    }
}
add_action('after_switch_theme', 'cityworks_theme_activation');

/**
 * Register key strings for Polylang when available.
 */
function cityworks_register_polylang_strings() {
    if (!function_exists('pll_register_string')) {
        return;
    }

    $strings = array(
        'Home',
        'Soluciones',
        'Servicios',
        'CityWorks Academy',
        'Insights',
        'Casos de Exito',
        'Recursos',
        'Quienes Somos',
        'Equipo',
        'Contacto',
        'Priority Plays 2026',
        'Consultoria Estrategica',
        'Lead Magnets',
    );

    foreach ($strings as $string) {
        pll_register_string('cityworks_' . sanitize_title($string), $string, 'CityWorks IA');
    }
}
add_action('init', 'cityworks_register_polylang_strings');

/**
 * Flush rewrite rules on switch theme
 */
function cityworks_flush_rewrites() {
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'cityworks_flush_rewrites');
