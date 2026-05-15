<?php
/**
 * 404 Page Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section-padding text-center">
    <h1 class="page-title"><?php esc_html_e('404 - Page Not Found', 'cityworks'); ?></h1>
    <p><?php esc_html_e('Sorry, the page you are looking for does not exist.', 'cityworks'); ?></p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="hero-cta"><?php esc_html_e('Go to Homepage', 'cityworks'); ?></a>
</div>

<?php
get_footer();
