<?php
/**
 * Services Section Template Part
 *
 * @package CityWorks
 */

$services = cityworks_get_services();
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
                        <i class="<?php echo esc_attr(cityworks_get_icon_class($service['icon'] ?? '', 'cloud')); ?>" aria-hidden="true"></i>
                    </div>
                    <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                    <p class="service-desc"><?php echo esc_html($service['excerpt']); ?></p>
                    <a href="<?php echo esc_url($service['link'] ?? '#contact'); ?>" class="service-link">
                        <?php _e('Learn more', 'cityworks'); ?>
                        <i class="ph ph-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
