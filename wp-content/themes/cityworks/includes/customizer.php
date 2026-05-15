<?php
/**
 * Customizer Options
 *
 * @package CityWorks
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer settings
 */
function cityworks_customize_register($wp_customize) {
    // Theme Options Panel
    $wp_customize->add_panel('cityworks_options', array(
        'title'       => __('CityWorks Options', 'cityworks'),
        'priority'    => 30,
        'description' => __('Customize CityWorks theme settings.', 'cityworks'),
    ));

    // === Hero Section ===
    $wp_customize->add_section('cityworks_hero', array(
        'title'    => __('Hero Section', 'cityworks'),
        'panel'    => 'cityworks_options',
        'priority' => 1,
    ));

    $wp_customize->add_setting('hero_badge', array(
        'default'           => 'Google Cloud Partner',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge', array(
        'label'   => __('Hero Badge Text', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Enterprise Cloud, AI & Security Solutions for Modern Businesses',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'We help organizations modernize infrastructure, deploy AI solutions and secure operations using Google Cloud technologies.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'textarea',
    ));

    $wp_customize->add_setting('hero_cta_text', array(
        'default'           => 'Talk to a Cloud Architect',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_cta_text', array(
        'label'   => __('Primary CTA Text', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('hero_cta_link', array(
        'default'           => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('hero_cta_link', array(
        'label'   => __('Primary CTA Link', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('hero_cta_secondary_text', array(
        'default'           => 'View Case Studies',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_cta_secondary_text', array(
        'label'   => __('Secondary CTA Text', 'cityworks'),
        'section' => 'cityworks_hero',
        'type'    => 'text',
    ));

    // === Contact Info ===
    $wp_customize->add_section('cityworks_contact', array(
        'title'    => __('Contact Information', 'cityworks'),
        'panel'    => 'cityworks_options',
        'priority' => 2,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'           => 'marketing@city.works',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => __('Email Address', 'cityworks'),
        'section' => 'cityworks_contact',
        'type'    => 'email',
    ));

    $wp_customize->add_setting('contact_phone_usa', array(
        'default'           => '1-561-772-3033',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone_usa', array(
        'label'   => __('Phone (USA)', 'cityworks'),
        'section' => 'cityworks_contact',
        'type'    => 'tel',
    ));

    // === Footer ===
    $wp_customize->add_section('cityworks_footer', array(
        'title'    => __('Footer', 'cityworks'),
        'panel'    => 'cityworks_options',
        'priority' => 3,
    ));

    $wp_customize->add_setting('footer_copyright', array(
        'default'           => '&copy; ' . date('Y') . ' CityWorks. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright', array(
        'label'   => __('Copyright Text', 'cityworks'),
        'section' => 'cityworks_footer',
        'type'    => 'text',
    ));

    // === Colors ===
    $wp_customize->add_section('cityworks_colors', array(
        'title'    => __('Colors', 'cityworks'),
        'panel'    => 'cityworks_options',
        'priority' => 4,
    ));

    $colors = array(
        'primary' => array('label' => 'Primary Blue', 'default' => '#4a90e2'),
        'secondary' => array('label' => 'Accent Orange', 'default' => '#ff8b00'),
        'dark' => array('label' => 'Dark Background', 'default' => '#1a1a2e'),
        'light' => array('label' => 'Light Background', 'default' => '#f7f7f7'),
    );

    foreach ($colors as $key => $color) {
        $wp_customize->add_setting("color_$key", array(
            'default'           => $color['default'],
            'sanitize_callback' => 'sanitize_hex_color',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "color_$key", array(
            'label'   => $color['label'],
            'section' => 'cityworks_colors',
        )));
    }
}
add_action('customize_register', 'cityworks_customize_register');
