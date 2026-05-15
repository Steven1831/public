<?php
/**
 * About Overview Section
 *
 * @package CityWorks
 */

$timeline = cityworks_get_timeline();
?>

<section id="quienes-somos" class="about-overview section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Quienes Somos', 'cityworks'); ?></span>
            <h2 class="section-title"><?php _e('Innovacion, certificaciones y entrega regional.', 'cityworks'); ?></h2>
            <p class="section-subtitle"><?php _e('Una estructura preparada para contar la evolucion de CityWorks, su enfoque regional y su madurez como partner de Google Cloud.', 'cityworks'); ?></p>
        </div>
        <div id="timeline-innovacion" class="timeline">
            <?php foreach ($timeline as $item) : ?>
                <article class="timeline-item">
                    <span><?php echo esc_html($item['year']); ?></span>
                    <h3><?php echo esc_html($item['title']); ?></h3>
                    <p><?php echo esc_html($item['summary']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="about-actions">
            <a href="<?php echo esc_url(home_url('/equipo')); ?>" class="btn btn-secondary">
                <?php _e('Conoce al equipo', 'cityworks'); ?>
            </a>
        </div>
    </div>
</section>
