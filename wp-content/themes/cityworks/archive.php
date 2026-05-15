<?php
/**
 * Archive Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section-padding">
    <header class="archive-header">
        <?php
        the_archive_title('<h1 class="archive-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header>

    <div class="archive-content">
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
            <p><?php esc_html_e('No content found.', 'cityworks'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
