-- Update wp_navigation post (ID=4) with proper block content
-- This creates a wp:navigation block with all 5 required items

SET @nav_content = '<!-- wp:group {"layout":{"type":"flex"},"backgroundColor":"transparent","align":"full"} -->\n<div class="wp-block-group alignfull">\n<!-- wp:navigation {"ref":0,"borderRadius":"0px","fontFamily":"primary","fontSize":"normal","layout":{"type":"flex","justifyContent":"center"},"overlayMenu":"never","overlayBackgroundColor":"base","overlayTextColor":"invert"} -->\n<!-- wp:navigation-link {"label":"Home","url":"/"} /-->\n<!-- wp:navigation-link {"label":"Servicios","url":"/servicios"} /-->\n<!-- wp:navigation-link {"label":"Industrias","url":"/industrias"} /-->\n<!-- wp:navigation-link {"label":"Casos de Exito","url":"/casos-de-exito"} /-->\n<!-- wp:navigation-link {"label":"Contacto","url":"/contacto"} /-->\n<!-- /wp:navigation -->\n</div>\n<!-- /wp:group -->';

UPDATE wp_posts SET post_content = @nav_content, post_modified = NOW(), post_modified_gmt = UTC_TIMESTAMP() WHERE ID = 4;

SELECT ID, post_title, post_type, LEFT(post_content, 300) AS content_preview FROM wp_posts WHERE ID = 4;
