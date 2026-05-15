<?php
/**
 * Case Studies Section Template Part
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

<section class="case-studies section">
    <div class="container">
        <div class="section-header fade-in-up">
            <h2 class="section-title"><?php _e('Success Stories', 'cityworks'); ?></h2>
            <p class="section-subtitle">
                <?php _e('Real results from real transformations.', 'cityworks'); ?>
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($case_studies as $index => $case): ?>
                <article class="case-card fade-in-up stagger-<?php echo ($index % 3) + 1; ?>">
                    <div class="case-image-col">
                        <img src="<?php echo esc_url(!empty($case['image']) ? $case['image'] : CITYWORKS_THEME_URL . '/assets/images/uploads/' . $case_images[$index % count($case_images)]); ?>" alt="<?php echo esc_attr($case['title']); ?>" loading="lazy">
                    </div>
                    <div class="case-content">
                        <span class="case-industry"><?php echo esc_html($case['industry']); ?></span>
                        <h3 class="case-title"><?php echo esc_html($case['title']); ?></h3>
                        <p>
                            <strong><?php _e('Challenge:', 'cityworks'); ?></strong> <?php echo esc_html($case['problem']); ?><br>
                            <strong><?php _e('Solution:', 'cityworks'); ?></strong> <?php echo esc_html($case['solution']); ?>
                        </p>
                        <div class="case-result">
                            <i class="<?php echo esc_attr(cityworks_get_icon_class('check-circle', 'check-circle')); ?>" aria-hidden="true"></i>
                            <?php echo esc_html($case['result']); ?>
                        </div>
                        <a href="<?php echo esc_url($case['link'] ?? '#contact'); ?>" class="btn btn-secondary btn-sm mt-4"><?php _e('Similar Project', 'cityworks'); ?></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-16">
            <a href="<?php echo esc_url(home_url('/casos-de-exito')); ?>" class="btn btn-secondary btn-lg"><?php _e('View All Case Studies', 'cityworks'); ?></a>
        </div>
    </div>
</section>
