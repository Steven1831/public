<?php
/**
 * Front Page Template
 *
 * @package CityWorks
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $has_home_content = false;

    if (have_posts()) :
        while (have_posts()) :
            the_post();

            if (trim(get_the_content()) !== '') {
                the_content();
                $has_home_content = true;
            }
        endwhile;
    endif;

    if (!$has_home_content) {
        cityworks_render_home_sections();
    }
    ?>
</main>

<?php
get_footer();
