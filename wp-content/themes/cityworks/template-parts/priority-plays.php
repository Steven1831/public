<?php
/**
 * Priority Plays 2026 Section
 *
 * @package CityWorks
 */

$plays = cityworks_get_priority_plays();
?>

<section id="soluciones" class="priority-plays section">
    <div class="container">
        <div class="section-header fade-in-up">
            <span class="section-kicker"><?php _e('Priority Plays 2026', 'cityworks'); ?></span>
            <h2 class="section-title"><?php _e('Soluciones alineadas al roadmap de Google Cloud.', 'cityworks'); ?></h2>
            <p class="section-subtitle"><?php _e('Cinco frentes para convertir estrategia cloud en resultados medibles.', 'cityworks'); ?></p>
        </div>
        <div class="priority-solutions-grid">
            <?php foreach ($plays as $index => $play) : ?>
                <article class="priority-play-card priority-play-card-static fade-in-up stagger-<?php echo esc_attr(($index % 5) + 1); ?>">
                    <div class="priority-card-header">
                        <span class="priority-card-icon">
                            <i class="<?php echo esc_attr(cityworks_get_icon_class($play['icon'] ?? '', 'cloud')); ?>" aria-hidden="true"></i>
                        </span>
                        <h3><?php echo esc_html($play['title']); ?></h3>
                    </div>
                    <p><?php echo esc_html($play['summary']); ?></p>
                    <div class="priority-card-outcome">
                        <strong><?php _e('Resultado:', 'cityworks'); ?></strong>
                        <?php echo esc_html($play['outcome'] ?? ''); ?>
                    </div>
                    <ul class="priority-chip-list" aria-label="<?php echo esc_attr(sprintf(__('Entregables de %s', 'cityworks'), $play['title'])); ?>">
                        <?php foreach ($play['items'] as $item) : ?>
                            <li><?php echo esc_html($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
