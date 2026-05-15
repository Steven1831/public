<?php
/**
 * Office / Team Showcase Section
 *
 * @package CityWorks
 */
?>

<section class="office-showcase section">
    <div class="container">
        <div class="office-showcase-grid">
            <div class="office-showcase-content fade-in-up">
                <span class="section-kicker"><?php _e('Local presence, cloud expertise', 'cityworks'); ?></span>
                <h2 class="section-title"><?php _e('A Google Cloud partner built for the Americas.', 'cityworks'); ?></h2>
                <p class="section-subtitle">
                    <?php _e('Our teams work across North America and Latin America, pairing certified cloud talent with hands-on delivery for modern infrastructure, AI, data and security initiatives.', 'cityworks'); ?>
                </p>
            </div>
            <div class="office-photo-grid fade-in-up stagger-2">
                <img class="office-photo office-photo-large" src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-2.jpg'); ?>" alt="<?php esc_attr_e('CityWorks team portrait', 'cityworks'); ?>" loading="lazy">
                <img class="office-photo" src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-3.jpg'); ?>" alt="<?php esc_attr_e('CityWorks leadership team', 'cityworks'); ?>" loading="lazy">
                <img class="office-photo" src="<?php echo esc_url(CITYWORKS_THEME_URL . '/assets/images/uploads/cityworks-office-5.jpg'); ?>" alt="<?php esc_attr_e('CityWorks office collaboration', 'cityworks'); ?>" loading="lazy">
            </div>
        </div>
    </div>
</section>
