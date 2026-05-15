<?php
/**
 * Hero Section Template Part
 *
 * @package CityWorks
 */

$hero = cityworks_get_hero_data();
?>

<section id="hero" class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content fade-in-up">
                <span class="hero-badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="margin-right: 0.5rem; vertical-align: middle;">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <?php echo esc_html($hero['badge'] ?? 'Google Cloud Partner'); ?>
                </span>
                <h1 class="hero-title"><?php echo esc_html($hero['title']); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html($hero['subtitle']); ?></p>
                <div class="hero-cta-group">
                    <a href="<?php echo esc_url($hero['cta_link']); ?>" class="hero-cta-primary">
                        <?php echo esc_html($hero['cta_text']); ?>
                    </a>
                    <a href="#solutions" class="hero-cta-secondary">
                        <?php _e('Explore Solutions', 'cityworks'); ?>
                    </a>
                </div>
                <div class="hero-trust">
                    <span><?php _e('Trusted by:', 'cityworks'); ?></span>
                    <img src="<?php echo CITYWORKS_THEME_URL; ?>/assets/images/Google_Cloud_Partner_no_outline_horizontal.png" alt="Google Cloud Partner" height="24">
                </div>
            </div>
            <div class="hero-visual fade-in-up stagger-2">
                <img src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-2.jpg'); ?>" alt="<?php esc_attr_e('CityWorks team at the office', 'cityworks'); ?>" class="img-fluid rounded-xl" loading="eager">
                <div class="hero-visual-badge">
                    <img src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/google-cloud-partner.png'); ?>" alt="<?php esc_attr_e('Google Cloud Partner', 'cityworks'); ?>">
                </div>
            </div>
        </div>
    </div>
</section>
