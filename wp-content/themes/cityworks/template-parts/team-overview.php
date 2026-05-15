<?php
/**
 * Team Overview Section
 *
 * @package CityWorks
 */

$team_profiles = cityworks_get_team_profiles();
?>

<section id="equipo" class="team-overview section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Equipo', 'cityworks'); ?></span>
            <h1 class="section-title"><?php _e('Especialistas que conectan estrategia, cloud y adopcion.', 'cityworks'); ?></h1>
            <p class="section-subtitle"><?php _e('Perfiles del equipo CityWorks preparados para mostrar roles, certificaciones y badges oficiales de Google.', 'cityworks'); ?></p>
        </div>

        <div class="team-badge-grid">
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
