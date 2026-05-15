<?php
/**
 * Partners / Trust Section Template Part
 *
 * @package CityWorks
 */

$partner_logos = array(
    CITYWORKS_THEME_URL . '/assets/images/Google_Cloud_Partner_no_outline_horizontal.png' => 'Google Cloud Partner',
    CITYWORKS_THEME_URL . '/assets/images/GWS-PP-Sell-Outline-2.png' => 'Google Workspace',
);
?>

<section class="partners section-light section">
    <div class="container">
        <p class="partners-title"><?php _e('Powered by Google Cloud Technologies', 'cityworks'); ?></p>
        <div class="partners-grid">
            <?php foreach ($partner_logos as $src => $alt): ?>
                <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($alt); ?>" class="partner-logo" loading="lazy">
            <?php endforeach; ?>
            <div class="partner-text" style="height: 48px; display: flex; align-items: center; font-weight: 700; color: var(--color-primary); font-size: 1.25rem;">
                Kubernetes
            </div>
            <div class="partner-text" style="height: 48px; display: flex; align-items: center; font-weight: 700; color: var(--color-success); font-size: 1.25rem;">
                Vertex AI
            </div>
            <div class="partner-text" style="height: 48px; display: flex; align-items: center; font-weight: 700; color: var(--color-secondary); font-size: 1.25rem;">
                Looker
            </div>
        </div>
    </div>
</section>
