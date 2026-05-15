<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="icon" href="<?php echo CITYWORKS_THEME_URL; ?>/assets/images/favicon.svg" type="image/svg+xml">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="header">
    <div class="container">
        <div class="header-inner">

            <!-- Logo -->
            <div class="site-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="logo-image-link">
                        <img src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-logo-full.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </a>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-nav" id="main-nav" role="navigation" aria-label="<?php _e('Primary Menu', 'cityworks'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'menu_class'      => 'nav-menu',
                    'container'       => false,
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'fallback_cb'     => 'cityworks_header_fallback_menu',
                ));
                ?>
            </nav>

            <!-- Header CTA -->
            <div class="header-cta-wrapper">
                <a href="<?php echo esc_url(get_theme_mod('hero_cta_link', '#contact')); ?>" class="header-cta">
                    <?php _e('Schedule Consultation', 'cityworks'); ?>
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="<?php _e('Toggle menu', 'cityworks'); ?>" aria-expanded="false" aria-controls="mobile-menu">
                <span class="bar bar-1"></span>
                <span class="bar bar-2"></span>
                <span class="bar bar-3"></span>
            </button>

        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div class="mobile-menu" id="mobile-menu" role="dialog" aria-modal="true" aria-label="<?php _e('Mobile Menu', 'cityworks'); ?>">
        <div class="mobile-menu-header">
            <span class="mobile-menu-logo">
                City<span class="text-primary">Works</span>
            </span>
            <button class="mobile-menu-close" id="mobile-menu-close" aria-label="<?php _e('Close menu', 'cityworks'); ?>">
                <i class="<?php echo esc_attr(cityworks_get_icon_class('x', 'x')); ?>" aria-hidden="true"></i>
            </button>
        </div>
        <nav class="mobile-nav-body">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'primary',
                'menu_class'      => 'mobile-nav-list',
                'container'       => false,
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'fallback_cb'     => 'cityworks_mobile_fallback_menu',
            ));
            ?>
        </nav>
    </div>

    <!-- Overlay for mobile menu -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
</header>

<?php
/**
 * Fallback menu (if no menu assigned)
 */
function cityworks_header_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '" class="nav-link">' . __('Home', 'cityworks') . '</a></li>';
    echo '<li><a href="' . home_url('/soluciones') . '" class="nav-link">' . __('Soluciones', 'cityworks') . '</a></li>';
    echo '<li><a href="' . home_url('/servicios') . '" class="nav-link">' . __('Servicios', 'cityworks') . '</a></li>';
    echo '<li class="menu-item-has-children"><a href="' . home_url('/insights') . '" class="nav-link">' . __('Insights', 'cityworks') . '</a><ul class="sub-menu"><li><a href="' . home_url('/casos-de-exito') . '">' . __('Casos de Exito', 'cityworks') . '</a></li><li><a href="' . home_url('/recursos') . '">' . __('Recursos', 'cityworks') . '</a></li></ul></li>';
    echo '<li class="menu-item-has-children"><a href="' . home_url('/quienes-somos') . '" class="nav-link">' . __('Quienes Somos', 'cityworks') . '</a><ul class="sub-menu"><li><a href="' . home_url('/equipo') . '">' . __('Equipo', 'cityworks') . '</a></li></ul></li>';
    echo '<li><a href="' . home_url('/contacto') . '" class="nav-link">' . __('Contact', 'cityworks') . '</a></li>';
    echo '</ul>';
}

function cityworks_mobile_fallback_menu() {
    echo '<ul class="mobile-nav-list">';
    echo '<li><a href="' . home_url('/') . '">' . __('Home', 'cityworks') . '</a></li>';
    echo '<li><a href="' . home_url('/soluciones') . '">' . __('Soluciones', 'cityworks') . '</a></li>';
    echo '<li><a href="' . home_url('/servicios') . '">' . __('Servicios', 'cityworks') . '</a></li>';
    echo '<li class="menu-item-has-children"><a href="' . home_url('/insights') . '">' . __('Insights', 'cityworks') . '</a><ul class="sub-menu"><li><a href="' . home_url('/casos-de-exito') . '">' . __('Casos de Exito', 'cityworks') . '</a></li><li><a href="' . home_url('/recursos') . '">' . __('Recursos', 'cityworks') . '</a></li></ul></li>';
    echo '<li class="menu-item-has-children"><a href="' . home_url('/quienes-somos') . '">' . __('Quienes Somos', 'cityworks') . '</a><ul class="sub-menu"><li><a href="' . home_url('/equipo') . '">' . __('Equipo', 'cityworks') . '</a></li></ul></li>';
    echo '<li><a href="' . home_url('/contacto') . '">' . __('Contact', 'cityworks') . '</a></li>';
    echo '</ul>';
}
?>
