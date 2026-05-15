<?php
/**
 * Template part for displaying posts
 *
 * @package CityWorks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('service-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('medium_large'); ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php
        the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
        ?>
    </header>

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php echo esc_url(get_permalink()); ?>" class="fit-business-btn">
            <?php esc_html_e('Read More', 'cityworks'); ?>
        </a>
    </footer>
</article>
