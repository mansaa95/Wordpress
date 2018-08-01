<?php
$hasten_settings = hasten_lite_get_theme_options();

$wp_customize->add_setting(
    'hasten_lite_theme_options[show_cta_section]',
    array(
        'default' => $hasten_settings['show_cta_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_Lite_Info_Customize_Controls(
    $wp_customize, 'hasten_lite_theme_options[show_cta_section]',
        array(
            'label' => esc_html__('Info:', 'hasten-lite'),
            'description' => esc_html__('Please Install Hasten Companion Plugin For CTA Section.', 'hasten-lite'),
            'section' => 'cta_section',
            'settings' => 'hasten_lite_theme_options[show_cta_section]',
            'priority' => 1,
        )
    )
);
