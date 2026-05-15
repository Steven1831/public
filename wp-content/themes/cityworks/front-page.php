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
    if (have_posts()) :
        while (have_posts()) :
            the_post();
            if (trim(get_the_content()) !== '') :
                ?>
                <div class="container section">
                    <?php the_content(); ?>
                </div>
                <?php
            endif;
        endwhile;
    endif;

    get_template_part('template-parts/hero');
    get_template_part('template-parts/stats');
    get_template_part('template-parts/partners');
    get_template_part('template-parts/priority-plays');
    get_template_part('template-parts/office-showcase');
    get_template_part('template-parts/consulting-services');
    get_template_part('template-parts/services');
    get_template_part('template-parts/industries');
    get_template_part('template-parts/insights-masonry');
    get_template_part('template-parts/about-overview');
    get_template_part('template-parts/case-studies');
    get_template_part('template-parts/cta');
    ?>
</main>

<?php
get_footer();
