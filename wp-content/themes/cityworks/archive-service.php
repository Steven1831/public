<?php
/**
 * Servicios (Services) Archive Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="services-hero section bg-light" style="padding-top: 120px; padding-bottom: 80px;">
    <div class="container">
        <div class="text-center" style="max-width: 800px; margin: 0 auto 3rem;">
            <h1 class="mb-6" style="font-size: 3rem; font-weight: 800; color: #1a1a2e;">
                <?php _e('Nuestros Servicios', 'cityworks'); ?>
            </h1>
            <p style="font-size: 1.25rem; color: #6b7280; line-height: 1.7;">
                <?php _e('Soluciones integrales de Google Cloud para transformar tu negocio.', 'cityworks'); ?>
            </p>
        </div>
    </div>
</div>

<div class="container section">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $services = cityworks_get_services();
        foreach ($services as $index => $service):
        ?>
            <article class="service-card hover-lift fade-in-up stagger-<?php echo ($index % 6) + 1; ?>">
                <div class="service-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                <p class="service-desc"><?php echo esc_html($service['excerpt']); ?></p>
                <a href="<?php echo esc_url($service['link']); ?>" class="service-link">
                    <?php _e('Ver detalles', 'cityworks'); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14m-7-7 7 7-7 7"/>
                    </svg>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
