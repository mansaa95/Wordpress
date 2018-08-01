<?php
$hasten_theme_options = hasten_lite_get_theme_options();

if (!in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    $wp_customize->add_section('hasten_team_status', array(
        'title' => esc_html__('Team Section', 'hasten-lite'),
        'priority' => 1, // Mixed with top-level-section hierarchy.
    ));


    $wp_customize->add_setting('hasten_lite_theme_options[team_status]',
        array(
            'type' => 'option',
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control(new Hasten_Lite_Info_Customize_Controls($wp_customize, 'hasten_lite_theme_options[team_status]', array(
                'label' => esc_html__('Info:', 'hasten-lite'),
                'description' => esc_html__('Please Install Hasten Companion Plugin For Team Section.', 'hasten-lite'),
                'section' => 'hasten_team_status',
                'settings' => 'hasten_lite_theme_options[team_status]',
                'type' => 'hasten-lite-team-status',
            )
        )
    );

}

$wp_customize->add_setting(
    'hasten_lite_theme_options[show_sc1]',
    array(
        'default' => $hasten_theme_options['show_sc1'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_sc1]',
        array(
            'label' => esc_html__('Show Shortcode Section In Homepage? ', 'hasten-lite'),
            'section' => 'top_shortcode',
            'settings' => 'hasten_lite_theme_options[show_sc1]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[sc1_title]',
    array(
        'default' => $hasten_theme_options['sc1_title'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    ));
$wp_customize->add_control('hasten_lite_theme_options[sc1_title]',
    array(
        'priority' => 50,
        'label' => esc_html__('Section Title', 'hasten-lite'),
        'section' => 'top_shortcode',
        'type' => 'text',
    ));
$wp_customize->add_setting('hasten_lite_theme_options[sc1_description]',
    array(
        'default' => $hasten_theme_options['sc1_description'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    ));
$wp_customize->add_control('hasten_lite_theme_options[sc1_description]',
    array(
        'priority' => 50,
        'label' => esc_html__('Section Description', 'hasten-lite'),
        'section' => 'top_shortcode',
        'type' => 'text',
    ));
$wp_customize->add_setting('hasten_lite_theme_options[hasten_lite_shortcode1]',
    array(
        'default' => $hasten_theme_options['hasten_lite_shortcode1'],
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field',
    ));
$wp_customize->add_control('hasten_lite_theme_options[hasten_lite_shortcode1]',
    array(
        'priority' => 50,
        'label' => esc_html__('Shortcode', 'hasten-lite'),
        'description' => esc_html__('Paste Shortcode Here.', 'hasten-lite'),
        'section' => 'top_shortcode',
        'type' => 'text',
    ));
$wp_customize->add_setting(
    'hasten_lite_theme_options[show_sc2]',
    array(
        'default' => $hasten_theme_options['show_sc2'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_Lite_Info_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_sc2]',
        array(
            'label' => esc_html__('Info', 'hasten-lite'),
            'description' => esc_html__('Please Install Hasten Companion Plugin For Shortcode Section.', 'hasten-lite'),
            'section' => 'bottom_shortcode',
            'settings' => 'hasten_lite_theme_options[show_sc2]',
            'priority' => 1,
        )
    )
);