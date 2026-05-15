<?php
/**
 * About Overview Section
 *
 * @package CityWorks
 */

$timeline = cityworks_get_timeline();
$team_profiles = cityworks_get_team_profiles();
?>

<section id="quienes-somos" class="about-overview section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Quienes Somos', 'cityworks'); ?></span>
            <h2 class="section-title"><?php _e('Innovacion, certificaciones y entrega regional.', 'cityworks'); ?></h2>
            <p class="section-subtitle"><?php _e('Una estructura preparada para contar la evolucion de CityWorks y mostrar perfiles con badges oficiales de Google.', 'cityworks'); ?></p>
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
        <div id="equipo" class="team-badge-grid">
            <?php foreach ($team_profiles as $profile) : ?>
                <article class="team-badge-card">
                    <img src="<?php echo esc_url($profile['image']); ?>" alt="<?php echo esc_attr($profile['name']); ?>" loading="lazy">
                    <div>
                        <span><?php echo esc_html($profile['badge']); ?></span>
                        <h3><?php echo esc_html($profile['name']); ?></h3>
                        <p><?php echo esc_html($profile['role']); ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
