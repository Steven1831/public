<?php
/**
 * Industries Section Template Part
 *
 * @package CityWorks
 */

$industries = cityworks_get_industries();
$icons = array('bank', 'hospital', 'shopping-cart', 'building', 'factory');
$i = 0;
?>

<section id="industries" class="industries section section-light">
    <div class="container">
        <div class="section-header fade-in-up">
            <h2 class="section-title"><?php _e('Solutions by Industry', 'cityworks'); ?></h2>
            <p class="section-subtitle">
                <?php _e('Tailored cloud strategies for your sector\'s unique challenges.', 'cityworks'); ?>
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($industries as $name => $solutions): ?>
                <div class="industry-card fade-in-up stagger-<?php echo ($i % 5) + 1; ?>">
                    <div class="industry-icon">
                        <i class="<?php echo esc_attr(cityworks_get_icon_class($icons[$i % count($icons)], 'building')); ?>" aria-hidden="true"></i>
                    </div>
                    <h3 class="industry-title"><?php echo esc_html($name); ?></h3>
                    <ul class="industry-list">
                        <?php foreach ($solutions as $solution): ?>
                            <li><?php echo esc_html($solution); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="#contact" class="btn btn-secondary mt-auto"><?php _e('Explore Solutions', 'cityworks'); ?></a>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
