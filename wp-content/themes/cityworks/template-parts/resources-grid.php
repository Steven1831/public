<?php
/**
 * Resources Grid
 *
 * @package CityWorks
 */

$resources = cityworks_get_resources();
?>

<section class="resources-grid-section section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Recursos', 'cityworks'); ?></span>
            <h1 class="section-title"><?php _e('Guias, assessments y lead magnets para acelerar decisiones.', 'cityworks'); ?></h1>
            <p class="section-subtitle"><?php _e('Material editable desde WordPress para apoyar campanas, ventas consultivas y eventos.', 'cityworks'); ?></p>
        </div>

        <div class="resources-card-grid">
            <?php foreach ($resources as $index => $resource) : ?>
                <article class="resource-card hover-lift fade-in-up stagger-<?php echo esc_attr(($index % 3) + 1); ?>">
                    <div class="resource-card-top">
                        <span class="resource-card-icon">
                            <i class="<?php echo esc_attr(cityworks_get_icon_class('file-text', 'file-text')); ?>" aria-hidden="true"></i>
                        </span>
                        <span class="resource-card-type"><?php echo esc_html($resource['type']); ?></span>
                    </div>
                    <h2 class="resource-card-title"><?php echo esc_html($resource['title']); ?></h2>
                    <p class="resource-card-summary"><?php echo esc_html($resource['summary']); ?></p>
                    <a href="<?php echo esc_url($resource['link']); ?>" class="service-link">
                        <?php _e('Ver recurso', 'cityworks'); ?> &rarr;
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
