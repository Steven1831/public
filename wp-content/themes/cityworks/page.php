<?php
/**
 * Page Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section-padding">
    <div class="page-content">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
