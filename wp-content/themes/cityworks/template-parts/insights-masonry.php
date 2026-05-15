<?php
/**
 * Insights Masonry Section
 *
 * @package CityWorks
 */

$insights = cityworks_get_insights();
?>

<section id="insights" class="insights-masonry section">
    <div class="container">
        <div class="insights-layout">
            <div>
                <div class="section-header text-left fade-in-up">
                    <span class="section-kicker"><?php _e('Insights', 'cityworks'); ?></span>
                    <h2 class="section-title"><?php _e('Videos, casos y eventos para equipos que estan decidiendo.', 'cityworks'); ?></h2>
                    <p class="section-subtitle"><?php _e('Un hub editorial preparado para filtros por formato, industria y etapa del viaje cloud.', 'cityworks'); ?></p>
                </div>
                <div class="insights-filters" aria-label="<?php esc_attr_e('Insight filters', 'cityworks'); ?>">
                    <span><?php _e('Videos', 'cityworks'); ?></span>
                    <span><?php _e('Casos de Exito', 'cityworks'); ?></span>
                    <span><?php _e('Eventos', 'cityworks'); ?></span>
                    <span><?php _e('Whitepapers', 'cityworks'); ?></span>
                </div>
                <div class="insights-grid">
                    <?php foreach ($insights as $index => $item) : ?>
                        <article class="insight-card insight-card-<?php echo esc_attr(($index % 3) + 1); ?>">
                            <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" loading="lazy">
                            <div>
                                <span><?php echo esc_html($item['type']); ?></span>
                                <h3><?php echo esc_html($item['title']); ?></h3>
                                <p><?php echo esc_html($item['summary']); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
            <aside class="lead-magnets fade-in-up stagger-2">
                <h3><?php _e('Lead Magnets', 'cityworks'); ?></h3>
                <a href="#contact"><?php _e('FinOps checklist para Google Cloud', 'cityworks'); ?></a>
                <a href="#contact"><?php _e('Guia de adopcion de Gemini', 'cityworks'); ?></a>
                <a href="#contact"><?php _e('Assessment de seguridad cloud', 'cityworks'); ?></a>
            </aside>
        </div>
    </div>
</section>
