<?php
/**
 * Widgets
 *
 * @package CityWorks
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom widgets
 */
function cityworks_register_widgets() {
    register_widget('CityWorks_Services_Widget');
    register_widget('CityWorks_Contact_Form_Widget');
}
add_action('widgets_init', 'cityworks_register_widgets');

/**
 * Services Widget
 */
class CityWorks_Services_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cityworks_services',
            __('CityWorks - Services', 'cityworks'),
            array('description' => __('Display services grid.', 'cityworks'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        $title = !empty($instance['title']) ? $instance['title'] : __('Our Services', 'cityworks');
        ?>
        <div class="widget-services">
            <?php if ($title): ?>
                <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
            <?php endif; ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <?php foreach (cityworks_get_services() as $service): ?>
                    <div class="service-card-sm p-4" style="padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem;">
                        <h4 style="margin-bottom: 0.5rem; color: #4a90e2;"><?php echo esc_html($service['title']); ?></h4>
                        <p style="font-size: 0.9rem; color: #6b7280; margin: 0;"><?php echo esc_html($service['excerpt']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = $instance['title'] ?? __('Our Services', 'cityworks');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'cityworks'); ?>
            </label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}

/**
 * Contact Form Widget
 */
class CityWorks_Contact_Form_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'cityworks_contact_form',
            __('CityWorks Contact Form', 'cityworks'),
            array('description' => __('Display contact form.', 'cityworks'))
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];
        ?>
        <div class="cityworks-contact-widget">
            <h4 class="widget-title"><?php _e('Get in Touch', 'cityworks'); ?></h4>
            <form class="cityworks-contact-form" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="<?php _e('Name', 'cityworks'); ?>" required class="form-input">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="<?php _e('Email', 'cityworks'); ?>" required class="form-input">
                </div>
                <div class="form-group">
                    <textarea name="message" placeholder="<?php _e('Message', 'cityworks'); ?>" rows="4" required class="form-input form-textarea"></textarea>
                </div>
                <button type="submit" class="submit-btn btn btn-primary btn-block"><?php _e('Send Message', 'cityworks'); ?></button>
                <?php wp_nonce_field('cityworks_contact', 'cityworks_contact_nonce'); ?>
            </form>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        // Sin opciones
    }

    public function update($new_instance, $old_instance) {
        return $old_instance;
    }
}
