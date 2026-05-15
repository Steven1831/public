<?php
/**
 * CTA Section Template Part
 *
 * @package CityWorks
 */

$contact_email = get_theme_mod('contact_email', 'marketing@city.works');
$contact_phone = get_theme_mod('contact_phone_usa', '1-561-772-3033');
?>

<section id="contact" class="cta-section section">
    <div class="container">
        <h2 class="section-title"><?php _e('Ready to Accelerate Your Digital Transformation?', 'cityworks'); ?></h2>
        <p class="section-subtitle">
            <?php _e('Let\'s build the future of your business with Google Cloud.', 'cityworks'); ?>
        </p>
        <div class="cta-buttons">
            <a href="#contact-form" class="cta-primary">
                <?php _e('Schedule a Consultation', 'cityworks'); ?>
            </a>
            <a href="tel:<?php echo esc_attr($contact_phone); ?>" class="cta-secondary">
                <?php _e('Call Us Now', 'cityworks'); ?>
            </a>
        </div>
    </div>
</section>
