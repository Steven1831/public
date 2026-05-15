<?php
/**
 * Site footer
 *
 * @package CityWorks
 */

$contact_email = get_theme_mod('contact_email', 'marketing@city.works');
$contact_phone = get_theme_mod('contact_phone_usa', '1-561-772-3033');
?>

<footer class="site-footer">
    <div class="container">
        <div class="footer-topline">
            <div class="footer-brand-block">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-brand" aria-label="<?php esc_attr_e('CityWorks Home', 'cityworks'); ?>">
                    <span class="footer-brand-word">City<span>Works</span></span>
                    <span class="footer-brand-dots" aria-hidden="true">
                        <i></i><i></i><i></i><i></i>
                    </span>
                </a>
                <p><?php _e('Google Cloud consulting, AI, data, security and adoption support for organizations across North America and Latin America.', 'cityworks'); ?></p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/city.works" target="_blank" rel="noopener" aria-label="Instagram">
                        <i class="<?php echo esc_attr(cityworks_get_icon_class('instagram-logo', 'instagram-logo')); ?>" aria-hidden="true"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/city-works-usa-llc/about/" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <i class="<?php echo esc_attr(cityworks_get_icon_class('linkedin-logo', 'linkedin-logo')); ?>" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <div class="footer-cta-card">
                <span><?php _e('Ready for the next cloud move?', 'cityworks'); ?></span>
                <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="btn btn-primary">
                    <?php _e('Schedule Consultation', 'cityworks'); ?>
                </a>
            </div>
        </div>

        <div class="footer-grid">
            <nav class="footer-col" aria-label="<?php esc_attr_e('Footer services', 'cityworks'); ?>">
                <h4><?php _e('Servicios', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/servicios')); ?>"><?php _e('Cloud Migration', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/servicios')); ?>"><?php _e('AI & Vertex AI', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/servicios')); ?>"><?php _e('Data Analytics', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/servicios')); ?>"><?php _e('Security Operations', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/servicios')); ?>"><?php _e('FinOps & Optimization', 'cityworks'); ?></a></li>
                </ul>
            </nav>

            <nav class="footer-col" aria-label="<?php esc_attr_e('Footer solutions', 'cityworks'); ?>">
                <h4><?php _e('Soluciones', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/soluciones')); ?>"><?php _e('AI', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/soluciones')); ?>"><?php _e('Data', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/soluciones')); ?>"><?php _e('Infrastructure', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/soluciones')); ?>"><?php _e('Security', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/soluciones')); ?>"><?php _e('Agentic Workplace', 'cityworks'); ?></a></li>
                </ul>
            </nav>

            <nav class="footer-col" aria-label="<?php esc_attr_e('Footer insights', 'cityworks'); ?>">
                <h4><?php _e('Insights', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/insights')); ?>"><?php _e('Videos & Eventos', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/casos-de-exito')); ?>"><?php _e('Casos de Exito', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/recursos')); ?>"><?php _e('Recursos', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/quienes-somos')); ?>"><?php _e('Quienes Somos', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/equipo')); ?>"><?php _e('Equipo', 'cityworks'); ?></a></li>
                </ul>
            </nav>

            <div class="footer-col">
                <h4><?php _e('Contacto', 'cityworks'); ?></h4>
                <ul class="footer-contact">
                    <li>
                        <i class="<?php echo esc_attr(cityworks_get_icon_class('map-pin', 'map-pin')); ?>" aria-hidden="true"></i>
                        <span>3801 PGA Blvd.<br>Palm Beach Gardens, FL 33410</span>
                    </li>
                    <li>
                        <i class="<?php echo esc_attr(cityworks_get_icon_class('phone', 'phone')); ?>" aria-hidden="true"></i>
                        <a href="tel:<?php echo esc_attr($contact_phone); ?>"><?php echo esc_html($contact_phone); ?></a>
                    </li>
                    <li>
                        <i class="<?php echo esc_attr(cityworks_get_icon_class('envelope-simple', 'envelope-simple')); ?>" aria-hidden="true"></i>
                        <a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo esc_html(date('Y')); ?> CityWorks. <?php _e('All rights reserved.', 'cityworks'); ?></p>
            <div class="footer-legal">
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php _e('Privacy Policy', 'cityworks'); ?></a>
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php _e('Terms of Service', 'cityworks'); ?></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
