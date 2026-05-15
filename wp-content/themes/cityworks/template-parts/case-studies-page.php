<?php
/**
 * Case Studies Page
 *
 * @package CityWorks
 */

$case_studies = cityworks_get_case_studies();
$case_images = array(
    'cityworks-office-3.jpg',
    'cityworks-office-5.jpg',
    'cityworks-office-10.jpg',
);
?>

<section class="case-studies-page section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Insights', 'cityworks'); ?></span>
            <h1 class="section-title"><?php _e('Casos de Exito con resultados claros.', 'cityworks'); ?></h1>
            <p class="section-subtitle"><?php _e('Historias editables desde WordPress para mostrar retos, soluciones y resultados medibles.', 'cityworks'); ?></p>
        </div>

        <div class="case-studies-page-grid">
            <?php foreach ($case_studies as $index => $case) : ?>
                <article class="case-card case-study-page-card fade-in-up stagger-<?php echo esc_attr(($index % 3) + 1); ?>">
                    <div class="case-image-col">
                        <img src="<?php echo esc_url(!empty($case['image']) ? $case['image'] : CITYWORKS_THEME_URL . '/assets/images/uploads/' . $case_images[$index % count($case_images)]); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                    </div>
                    <div class="case-content">
                        <span class="case-industry"><?php echo esc_html($case['industry']); ?></span>
                        <h2 class="case-title"><?php echo esc_html($case['title']); ?></h2>
                        <p><strong><?php _e('Challenge:', 'cityworks'); ?></strong> <?php echo esc_html($case['problem']); ?></p>
                        <p><strong><?php _e('Solution:', 'cityworks'); ?></strong> <?php echo esc_html($case['solution']); ?></p>
                        <div class="case-result">
                            <i class="<?php echo esc_attr(cityworks_get_icon_class('check-circle', 'check-circle')); ?>" aria-hidden="true"></i>
                            <?php echo esc_html($case['result']); ?>
                        </div>
                        <a href="<?php echo esc_url($case['link'] ?? '#contact'); ?>" class="service-link"><?php _e('Ver caso', 'cityworks'); ?> &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
