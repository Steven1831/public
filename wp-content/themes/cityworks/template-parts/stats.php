<?php
/**
 * Stats Section Template Part
 *
 * @package CityWorks
 */

$stats = cityworks_get_stats();
$delay = 1;
?>

<section class="stats section">
    <div class="container">
        <div class="stats-grid">
            <?php foreach ($stats as $stat): ?>
                <div class="stat-item fade-in-up stagger-<?php echo $delay++; ?>">
                    <h3 data-count="<?php echo esc_attr($stat['value']); ?>">0</h3>
                    <p><?php echo esc_html($stat['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
