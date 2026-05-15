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
                    <!-- Placeholder icon -->
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="white" opacity="0.3">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>
                    </svg>
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
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23 6l-9.5 9.5-5-5L1 18l5 5 7-7 5 5 4-4z"/></svg>
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
