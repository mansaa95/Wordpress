<?php
//Banner Section
$hasten_settings = hasten_lite_get_theme_options();

$wp_customize->add_setting(
    'hasten_lite_theme_options[banner_picker]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'hasten_lite_sanitize_choices',
        'default' => 'banner-image',
    )
);
$banner_choice = array(
    'banner-image' => esc_html__('Single Image Banner (default)', 'hasten-lite'),
    'banner-slider' => esc_html__('Slider Banner', 'hasten-lite'),
);

$wp_customize->add_control(
    'hasten_lite_theme_options[banner_picker]',
    array(
        'section' => 'banner_options',
        'label' => esc_html__('Banner', 'hasten-lite'),
        'type' => 'radio',
        'choices' => $banner_choice,
        'settings' => 'hasten_lite_theme_options[banner_picker]',

    )
);


$wp_customize->add_setting('hasten_lite_theme_options[slider_image_title]',
    array(
        'type' => 'option',
        'default' => $hasten_settings['slider_image_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[slider_image_title]',
    array(
        'label' => esc_html__('Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'banner_options',
        'active_callback' => 'hasten_lite_banner_callback_choice',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[slider_image_description]',
    array(
        'type' => 'option',
        'default' => $hasten_settings['slider_image_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[slider_image_description]',
    array(
        'label' => esc_html__('Description', 'hasten-lite'),
        'type' => 'text',
        'section' => 'banner_options',
        'active_callback' => 'hasten_lite_banner_callback_choice',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[upload_banner_image]',
    array(
        'type' => 'option',
        'default' => $hasten_settings['upload_banner_image'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hasten_lite_theme_options[upload_banner_image]',
        array(
            'label' => esc_html__('Add Image', 'hasten-lite'),
            'active_callback' => 'hasten_lite_banner_callback_choice',
            'section' => 'banner_options',
            'settings' => 'hasten_lite_theme_options[upload_banner_image]',
        ))
);

$wp_customize->add_setting('hasten_lite_theme_options[single_btn1]',
    array(
        'type' => 'option',
        'default' => $hasten_settings['single_btn1'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[single_btn1]',
    array(
        'label' => esc_html__('Button Text', 'hasten-lite'),
        'type' => 'text',
        'section' => 'banner_options',
        'settings' => 'hasten_lite_theme_options[single_btn1]',
        'active_callback' => 'hasten_lite_banner_callback_choice',
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[single_link1]',
    array(
        'type' => 'option',
        'default' => $hasten_settings['single_link1'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[single_link1]',
    array(
        'label' => esc_html__('Button Link', 'hasten-lite'),
        'type' => 'text',
        'section' => 'banner_options',
        'settings' => 'hasten_lite_theme_options[single_link1]',
        'active_callback' => 'hasten_lite_banner_callback_choice',
    )
);