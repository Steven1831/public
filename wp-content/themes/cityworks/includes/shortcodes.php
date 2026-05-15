<?php
/**
 * Shortcodes
 *
 * @package CityWorks
 */

if (!defined('ABSPATH')) {
    exit;
}

// Register shortcodes
add_action('init', function() {
    add_shortcode('cityworks_services', 'cityworks_services_shortcode');
    add_shortcode('cityworks_industries', 'cityworks_industries_shortcode');
    add_shortcode('cityworks_stats', 'cityworks_stats_shortcode');
    add_shortcode('cityworks_contact', 'cityworks_contact_shortcode');
    add_shortcode('cityworks_hero', 'cityworks_hero_shortcode');
    add_shortcode('cityworks_case_studies', 'cityworks_case_studies_shortcode');
    add_shortcode('cityworks_priority_plays', 'cityworks_priority_plays_shortcode');
    add_shortcode('cityworks_consulting_services', 'cityworks_consulting_services_shortcode');
    add_shortcode('cityworks_insights', 'cityworks_insights_shortcode');
    add_shortcode('cityworks_about_overview', 'cityworks_about_overview_shortcode');
    add_shortcode('cityworks_academy_placeholder', 'cityworks_academy_placeholder_shortcode');
});

function cityworks_render_template_part_shortcode($template_part) {
    ob_start();
    get_template_part($template_part);
    return ob_get_clean();
}

function cityworks_priority_plays_shortcode() {
    return cityworks_render_template_part_shortcode('template-parts/priority-plays');
}

function cityworks_consulting_services_shortcode() {
    return cityworks_render_template_part_shortcode('template-parts/consulting-services');
}

function cityworks_insights_shortcode() {
    return cityworks_render_template_part_shortcode('template-parts/insights-masonry');
}

function cityworks_about_overview_shortcode() {
    return cityworks_render_template_part_shortcode('template-parts/about-overview');
}

function cityworks_academy_placeholder_shortcode() {
    return cityworks_render_template_part_shortcode('template-parts/academy-placeholder');
}

function cityworks_services_shortcode($atts) {
    $services = cityworks_get_services();
    $output = '<div class="cityworks-services-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';
    foreach ($services as $service) {
        $icon_class = sanitize_title(str_replace(' ', '-', strtolower($service['title'])));
        $output .= '
        <div class="service-card hover-lift">
            <div class="service-icon"><i class="ph ph-' . esc_attr($icon_class) . '"></i></div>
            <h3 class="service-title">' . esc_html($service['title']) . '</h3>
            <p class="service-desc">' . esc_html($service['excerpt']) . '</p>
            <a href="#contact" class="service-link">' . esc_html__('Learn more', 'cityworks') . ' &rarr;</a>
        </div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('cityworks_services', 'cityworks_services_shortcode');

function cityworks_industries_shortcode($atts) {
    $industries = cityworks_get_industries();
    $output = '<div class="cityworks-industries-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';
    $icons = array('bank', 'hospital', 'shopping-cart', 'building', 'factory');
    $i = 0;
    foreach ($industries as $name => $solutions) {
        $icon = $icons[$i % count($icons)];
        $output .= '
        <div class="industry-card">
            <div class="industry-icon"><i class="ph ph-' . esc_attr($icon) . '"></i></div>
            <h3 class="industry-title">' . esc_html($name) . '</h3>
            <ul class="industry-list">';
        foreach ($solutions as $solution) {
            $output .= '<li>' . esc_html($solution) . '</li>';
        }
        $output .= '
            </ul>
            <a href="#contact" class="btn btn-secondary mt-4">' . esc_html__('Explore Solutions', 'cityworks') . '</a>
        </div>';
        $i++;
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('cityworks_industries', 'cityworks_industries_shortcode');

function cityworks_stats_shortcode($atts) {
    $stats = cityworks_get_stats();
    $output = '<div class="cityworks-stats-grid stats-grid">';
    foreach ($stats as $stat) {
        $output .= '
        <div class="stat-item">
            <h3>' . esc_html($stat['value']) . '</h3>
            <p>' . esc_html($stat['label']) . '</p>
        </div>';
    }
    $output .= '</div>';
    return $output;
}
add_shortcode('cityworks_stats', 'cityworks_stats_shortcode');

function cityworks_case_studies_shortcode($atts) {
    $case_studies = cityworks_get_case_studies();
    $output = '<div class="cityworks-case-studies-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">';

    foreach ($case_studies as $case) {
        $output .= '
        <article class="case-card">
            <div class="case-content">
                <span class="case-industry">' . esc_html($case['industry']) . '</span>
                <h3 class="case-title">' . esc_html($case['title']) . '</h3>
                <p><strong>' . esc_html__('Challenge:', 'cityworks') . '</strong> ' . esc_html($case['problem']) . '<br>
                <strong>' . esc_html__('Solution:', 'cityworks') . '</strong> ' . esc_html($case['solution']) . '</p>
                <div class="case-result">' . esc_html($case['result']) . '</div>
                <a href="' . esc_url($case['link'] ?? '#contact') . '" class="btn btn-secondary btn-sm mt-4">' . esc_html__('Read more', 'cityworks') . '</a>
            </div>
        </article>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode('cityworks_case_studies', 'cityworks_case_studies_shortcode');

function cityworks_contact_shortcode($atts) {
    ob_start();
    ?>
    <div class="cityworks-contact-shortcode">
        <form id="cityworks-contact-form" method="post" class="contact-form">
            <div class="form-group">
                <label for="contact-name"><?php _e('Name', 'cityworks'); ?></label>
                <input type="text" name="name" id="contact-name" required class="form-input">
            </div>
            <div class="form-group">
                <label for="contact-email"><?php _e('Email', 'cityworks'); ?></label>
                <input type="email" name="email" id="contact-email" required class="form-input">
            </div>
            <div class="form-group">
                <label for="contact-message"><?php _e('Message', 'cityworks'); ?></label>
                <textarea name="message" id="contact-message" rows="5" required class="form-input form-textarea"></textarea>
            </div>
            <button type="submit" class="submit-btn btn btn-primary btn-lg"><?php _e('Schedule a Meeting', 'cityworks'); ?></button>
            <?php wp_nonce_field('cityworks_contact', 'cityworks_contact_nonce'); ?>
        </form>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('cityworks_contact', 'cityworks_contact_shortcode');

function cityworks_hero_shortcode($atts) {
    $hero = cityworks_get_hero_data();
    ob_start();
    ?>
    <section id="hero" class="hero section">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
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
                </div>
                <div class="hero-visual">
                    <img src="<?php echo CITYWORKS_THEME_URL; ?>/assets/images/hero-bg.jpg" alt="Cloud Dashboard" class="img-fluid rounded-1">
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('cityworks_hero', 'cityworks_hero_shortcode');
