<?php
/**
 * Search Results Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section-padding">
    <header class="search-header">
        <h1 class="search-title">
            <?php
            printf(
                esc_html__('Search Results for: %s', 'cityworks'),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </header>

    <?php if (have_posts()) : ?>
        <div class="posts-grid">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;
            ?>
        </div>

        <?php cityworks_pagination(); ?>

    <?php else : ?>
        <p><?php esc_html_e('No results found.', 'cityworks'); ?></p>
    <?php endif; ?>
</div>

<?php
get_footer();
