<footer class="site-footer">
<?php
$contact_email     = get_theme_mod('contact_email', 'marketing@city.works');
$contact_phone     = get_theme_mod('contact_phone_usa', '1-561-772-3033');
$footer_copyright  = get_theme_mod('footer_copyright', '&copy; ' . date('Y') . ' CityWorks. All rights reserved.');
?>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <div class="footer-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-text text-white" style="font-size: 1.75rem; font-weight: 800;">
                            City<span class="text-primary">Works</span>
                        </a>
                    <?php endif; ?>
                </div>
                <p style="margin-top: var(--space-4); opacity: 0.7; line-height: 1.7;">
                    <?php _e('Your bridge to innovation in the cloud. We help organizations modernize infrastructure, deploy AI solutions and secure operations using Google Cloud technologies.', 'cityworks'); ?>
                </p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/city.works" target="_blank" rel="noopener" aria-label="Instagram">IG</a>
                    <a href="https://www.linkedin.com/company/city-works-usa-llc/about/" target="_blank" rel="noopener" aria-label="LinkedIn">in</a>
                </div>
            </div>

            <div class="footer-col">
                <h4><?php _e('Services', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/#solutions')); ?>"><?php _e('Cloud Migration', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#solutions')); ?>"><?php _e('AI & Vertex AI', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#solutions')); ?>"><?php _e('Data Analytics', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#solutions')); ?>"><?php _e('Cybersecurity', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#solutions')); ?>"><?php _e('Kubernetes & GKE', 'cityworks'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Industries', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/#industries')); ?>"><?php _e('Financial Services', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#industries')); ?>"><?php _e('Healthcare', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#industries')); ?>"><?php _e('Retail & CPG', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#industries')); ?>"><?php _e('Public Sector', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/#industries')); ?>"><?php _e('Manufacturing', 'cityworks'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Resources', 'cityworks'); ?></h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php _e('Blog', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/casos-de-exito')); ?>"><?php _e('Case Studies', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/recursos')); ?>"><?php _e('Whitepapers', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/events')); ?>"><?php _e('Events', 'cityworks'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('About Us', 'cityworks'); ?></a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4><?php _e('Contact Us', 'cityworks'); ?></h4>
                <ul class="footer-contact">
                    <li>
                        <div>
                            <strong>USA:</strong><br>
                            3801 PGA Blvd.<br>
                            Palm Beach Gardens, FL 33410
                        </div>
                    </li>
                    <li><a href="tel:<?php echo esc_attr($contact_phone); ?>"><?php echo esc_html($contact_phone); ?></a></li>
                    <li><a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p><?php echo wp_kses_post($footer_copyright); ?></p>
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
