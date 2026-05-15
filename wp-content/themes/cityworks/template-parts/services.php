<?php
/**
 * Services Section Template Part
 *
 * @package CityWorks
 */

$services = cityworks_get_services();
$service_images = array(
    'service-cloud-1.png',
    'service-cloud-3.png',
    'service-cloud-4.png',
    'service-cloud-5.png',
    'service-cloud-6.png',
    'service-cloud-7.png',
    'service-cloud-main.png',
    'service-cloud-1.png',
);
?>

<section id="solutions" class="services section">
    <div class="container">
        <div class="section-header fade-in-up">
            <h2 class="section-title"><?php _e('Enterprise Solutions', 'cityworks'); ?></h2>
            <p class="section-subtitle">
                <?php _e('End-to-end cloud services powered by Google Cloud to modernize your business.', 'cityworks'); ?>
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($services as $index => $service): ?>
                <div class="service-card hover-lift fade-in-up stagger-<?php echo ($index % 4) + 1; ?>">
                    <div class="service-icon">
                        <img src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/' . $service_images[$index % count($service_images)]); ?>" alt="" loading="lazy">
                    </div>
                    <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                    <p class="service-desc"><?php echo esc_html($service['excerpt']); ?></p>
                    <a href="<?php echo esc_url($service['link'] ?? '#contact'); ?>" class="service-link">
                        <?php _e('Learn more', 'cityworks'); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14m-7-7 7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
