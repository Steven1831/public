<?php
/**
 * Single Post Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section-padding">
    <div class="single-post">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <div class="entry-meta">
                        <?php
                        echo '<time datetime="' . get_the_date('c') . '">' . get_the_date() . '</time>';
                        echo ' · ' . esc_html(get_the_author());
                        ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cityworks'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {
                        echo '<span class="cat-links">' . esc_html__('Categorized as:', 'cityworks') . ' ';
                        the_category(', ');
                        echo '</span>';
                    }
                    ?>
                </footer>
            </article>

            <?php
            // Post navigation
            the_post_navigation(array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next:', 'cityworks') . '</span> ' .
                               '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous:', 'cityworks') . '</span> ' .
                               '<span class="post-title">%title</span>',
            ));

            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
