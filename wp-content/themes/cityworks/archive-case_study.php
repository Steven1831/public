<?php
/**
 * Case Studies Archive Template
 *
 * @package CityWorks
 */

get_header();
?>

<div class="container section">
    <div class="section-header fade-in-up">
        <h1 class="section-title"><?php _e('Case Studies', 'cityworks'); ?></h1>
        <p class="section-subtitle">
            <?php _e('Discover how we help enterprises achieve digital transformation.', 'cityworks'); ?>
        </p>
    </div>

    <?php
    $case_studies = cityworks_get_case_studies();
    foreach ($case_studies as $index => $case):
    ?>
        <article class="case-card mb-8 fade-in-up stagger-<?php echo ($index % 3) + 1; ?>">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0" style="border-radius: 1rem; overflow: hidden; border: 1px solid #e5e7eb;">
                <div class="case-image-col" style="background: linear-gradient(135deg, #4a90e2, #00b8a9); display: flex; align-items: center; justify-content: center; min-height: 250px; padding: 2rem;">
                    <i class="<?php echo esc_attr(cityworks_get_icon_class('chart-line-up', 'chart-line-up')); ?>" aria-hidden="true" style="font-size:5rem;color:rgba(255,255,255,0.34);"></i>
                </div>
                <div class="case-content" style="grid-column: span 2; padding: 2.5rem;">
                    <span class="case-industry"><?php echo esc_html($case['industry']); ?></span>
                    <h2 class="case-title" style="font-size: 1.75rem; margin-top: 1rem;"><?php echo esc_html($case['title']); ?></h2>
                    <p style="color: #6b7280; margin: 1.5rem 0; line-height: 1.7;">
                        <strong><?php _e('Challenge:', 'cityworks'); ?></strong> <?php echo esc_html($case['problem']); ?><br>
                        <strong><?php _e('Solution:', 'cityworks'); ?></strong> <?php echo esc_html($case['solution']); ?>
                    </p>
                    <div class="flex gap-4 items-center">
                        <div class="case-result">
                            <i class="<?php echo esc_attr(cityworks_get_icon_class('check-circle', 'check-circle')); ?>" aria-hidden="true"></i>
                            <?php echo esc_html($case['result']); ?>
                        </div>
                        <a href="#contact" class="btn btn-secondary"><?php _e('Similar Project', 'cityworks'); ?></a>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
</div>

<?php get_footer(); ?>
