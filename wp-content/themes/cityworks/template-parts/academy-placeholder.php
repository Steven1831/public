<?php
/**
 * CityWorks Academy Placeholder Section
 *
 * @package CityWorks
 */

$academy = cityworks_get_academy_placeholder();
?>

<section id="cityworks-academy" class="academy-placeholder section">
    <div class="container">
        <div class="academy-placeholder-box">
            <div>
                <span class="section-kicker"><?php _e('Preparado para despues', 'cityworks'); ?></span>
                <h2 class="section-title"><?php echo esc_html($academy['title']); ?></h2>
                <p class="section-subtitle"><?php echo esc_html($academy['summary']); ?></p>
            </div>
            <div class="academy-taxonomy-preview">
                <h3><?php _e('Categorias previstas', 'cityworks'); ?></h3>
                <?php foreach ($academy['categories'] as $category) : ?>
                    <span><?php echo esc_html($category); ?></span>
                <?php endforeach; ?>
                <h3><?php _e('Niveles previstos', 'cityworks'); ?></h3>
                <?php foreach ($academy['levels'] as $level) : ?>
                    <span><?php echo esc_html($level); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
