<?php
// temp-create-pages.php - Crea páginas de WordPress
define('WP_USE_THEMES', false);
require_once __DIR__ . '/wp-load.php';

$pages = [
    ['Servicios', 'servicios', 'Lista de servicios de CityWorks.'],
    ['Industrias', 'industrias', 'Sectores industriales que atienden CityWorks.'],
    ['Casos de Éxito', 'casos-de-exito', 'Casos de éxito y resultados de CityWorks.'],
    ['Nosotros', 'nosotros', 'Historia, misión, visión y valores de CityWorks.'],
    ['Equipo', 'equipo', 'Miembros del equipo de CityWorks.'],
    ['Recursos', 'recursos', 'Blog y whitepapers de CityWorks.'],
    ['Contacto', 'contacto', 'Página de contacto con formulario de CityWorks.']
];

$created = [];
$existed = [];

foreach ($pages as $page) {
    list($title, $slug, $content) = $page;
    $existing = get_page_by_path($slug);
    if ($existing) {
        $existed[] = $slug;
        continue;
    }
    $post_id = wp_insert_post([
        'post_title'    => $title,
        'post_name'     => $slug,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
        'post_author'   => 1
    ]);
    if ($post_id && !is_wp_error($post_id)) {
        $created[] = $slug;
    } else {
        $existed[] = $slug;
    }
}

$total = count($created) + count($existed);
$result = [
    'pages_created' => $created,
    'pages_existed' => $existed,
    'total' => $total
];
header('Content-Type: application/json');
echo json_encode($result, JSON_PRETTY_PRINT);

// Auto-delete after execution (optional) - commented out for safety
// unlink(__FILE__);
