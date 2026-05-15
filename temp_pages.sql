-- Step 1: Create pages that don't exist
INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
SELECT 1, NOW(), UTC_TIMESTAMP(),
    '<h2>Nuestros Servicios</h2><p>Soluciones integrales en Google Cloud.</p>[cityworks_services]',
    'Servicios', '', 'publish', 'closed', 'closed', '', 'servicios', '', '', NOW(), UTC_TIMESTAMP(), '', 0, '', 0, 'page', '', 0
WHERE NOT EXISTS (SELECT 1 FROM wp_posts WHERE post_name='servicios' AND post_type='page');

INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
SELECT 1, NOW(), UTC_TIMESTAMP(),
    '<h2>Contáctanos</h2><p>Habla con un arquitecto cloud.</p>[cityworks_contact]',
    'Contacto', '', 'publish', 'closed', 'closed', '', 'contacto', '', '', NOW(), UTC_TIMESTAMP(), '', 0, '', 0, 'page', '', 0
WHERE NOT EXISTS (SELECT 1 FROM wp_posts WHERE post_name='contacto' AND post_type='page');

INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
SELECT 1, NOW(), UTC_TIMESTAMP(),
    '<h2>Casos de Éxito</h2><p>Resultados reales de nuestros clientes.</p>',
    'Casos de Éxito', '', 'publish', 'closed', 'closed', '', 'casos-de-exito', '', '', NOW(), UTC_TIMESTAMP(), '', 0, '', 0, 'page', '', 0
WHERE NOT EXISTS (SELECT 1 FROM wp_posts WHERE post_name='casos-de-exito' AND post_type='page');

INSERT INTO wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
SELECT 1, NOW(), UTC_TIMESTAMP(),
    '<h2>Industrias que Servimos</h2>[cityworks_industries]',
    'Industrias', '', 'publish', 'closed', 'closed', '', 'industrias', '', '', NOW(), UTC_TIMESTAMP(), '', 0, '', 0, 'page', '', 0
WHERE NOT EXISTS (SELECT 1 FROM wp_posts WHERE post_name='industrias' AND post_type='page');
