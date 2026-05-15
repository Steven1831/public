<?php
/**
 * The main template file
 *
 * @package CityWorks
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if (is_front_page()) : ?>

        <!-- Hero Section -->
        <?php get_template_part('template-parts/hero'); ?>

        <!-- Stats Section -->
        <?php get_template_part('template-parts/stats'); ?>

        <!-- Partners / Trust Section -->
        <?php get_template_part('template-parts/partners'); ?>

        <!-- Priority Plays -->
        <?php get_template_part('template-parts/priority-plays'); ?>

        <!-- Office / Team Showcase -->
        <?php get_template_part('template-parts/office-showcase'); ?>

        <!-- Consulting Services -->
        <?php get_template_part('template-parts/consulting-services'); ?>

        <!-- Services Section -->
        <?php get_template_part('template-parts/services'); ?>

        <!-- Industries Section -->
        <?php get_template_part('template-parts/industries'); ?>

        <!-- Insights Section -->
        <?php get_template_part('template-parts/insights-masonry'); ?>

        <!-- About Section -->
        <?php get_template_part('template-parts/about-overview'); ?>

        <!-- Case Studies Section -->
        <?php get_template_part('template-parts/case-studies'); ?>

        <!-- CTA Section -->
        <?php get_template_part('template-parts/cta'); ?>

    <?php else : ?>

        <!-- Regular Page Content -->
        <div class="container section">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
        </div>

    <?php endif; ?>

</main>

<?php get_footer();
