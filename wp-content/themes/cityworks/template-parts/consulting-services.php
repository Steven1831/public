<?php
/**
 * Strategic Consulting Services Section
 *
 * @package CityWorks
 */

$consulting_services = cityworks_get_consulting_services();
?>

<section id="servicios-consultoria" class="consulting-services section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Consultoria Estrategica', 'cityworks'); ?></span>
            <h2 class="section-title"><?php _e('Servicios que sostienen el cambio despues de implementar.', 'cityworks'); ?></h2>
            <p class="section-subtitle"><?php _e('Ampliamos la oferta tecnica con continuidad operativa, eficiencia financiera y adopcion cultural.', 'cityworks'); ?></p>
        </div>
        <div class="consulting-grid">
            <?php foreach ($consulting_services as $service) : ?>
                <article class="consulting-card fade-in-up">
                    <span><?php echo esc_html($service['metric']); ?></span>
                    <h3><?php echo esc_html($service['title']); ?></h3>
                    <p><?php echo esc_html($service['summary']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
