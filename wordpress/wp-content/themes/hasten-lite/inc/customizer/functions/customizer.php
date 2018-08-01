<?php
/**
 * Hasten Theme Customizer
 *
 * @package Hasten
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hasten_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hasten_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hasten_lite_customize_partial_blogdescription',
		) );
	}

    $wp_customize->remove_section('hc_bottom_shortcode');

    $wp_customize->add_panel(
        'theme_options',
        array(
            'title' => esc_html__( 'Theme Options','hasten-lite' ),
            'priority' => 1,
        )
    );
    $wp_customize->add_panel(
        'team_options',
        array(
            'title' => esc_html__( 'Team Options','hasten-lite' ),
            'priority' => 2,
        )
    );

    $wp_customize->add_panel(
        'woo_options',
        array(
            'title' => esc_html__( 'Woocommerce Options','hasten-lite' ),
            'priority' => 2,
        )
    );

    /* General Section */
    $wp_customize->add_section(
        'general_option',
        array(
            'title'    => esc_html__( 'General Options','hasten-lite' ),
            'panel' => 'theme_options',
            'priority' => 2,
        )
    );

    /* Banner section */
    $wp_customize->add_section(
        'banner_options',
        array(
            'title'    => esc_html__( 'Banner Options','hasten-lite' ),
            'panel' => 'theme_options',
            'priority' => 4,
        )
    );
    /* Intro Options*/
    $wp_customize->add_section(
        'introduction_options',
        array(
            'title'    => esc_html__( 'Intro Options','hasten-lite' ),
            'panel' => 'theme_options',
            'priority' =>5,
        )
    );



    $wp_customize->add_section(
            'service_options',
            array(
                'title' => esc_html__('Service Options', 'hasten-lite'),
                'panel' => 'theme_options',
                'priority' => 10,
            )
        );
        /* Portfolio Options*/
    if (in_array('jetpack/jetpack.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        $wp_customize->add_section(
            'recent_options',
            array(
                'title' => esc_html__('Portfolio Options', 'hasten-lite'),
                'panel' => 'theme_options',
                'priority' => 13,
            )
        );

        $wp_customize->add_panel(
            'woo_options',
            array(
                'title' => esc_html__( 'Woocommerce Options','hasten-lite' ),
                'priority' => 2,
            )
        );

        /* Testimonial Options*/

        $wp_customize->add_section(
            'testimonial_options',
            array(
                'title' => esc_html__('Testimonial Options', 'hasten-lite'),
                'panel' => 'theme_options',
                'priority' => 15,
            )
        );
    }

    /* Call to Action Options*/
    if (!in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        $wp_customize->add_section(
            'cta_section',
            array(
                'title' => esc_html__('Call To Action Option', 'hasten-lite'),
                'panel' => 'theme_options',
                'priority' => 11,
            )
        );
    }

    $wp_customize->add_section(
        'blog_options',
        array(
            'title'    => esc_html__( 'Blog Options','hasten-lite' ),
            'panel' => 'theme_options',
            'priority' => 24,
        )
    );


    /* Footer Section */
    $wp_customize->add_section(
        'footer_section',
        array(
            'title'    => esc_html__( 'Footer Options','hasten-lite' ),
            'panel' => 'theme_options',
            'priority' => 25,
        )
    );


    if (!in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        $wp_customize->add_section(
            'contact_section',
            array(
                'title' => esc_html__('Contact Sections', 'hasten-lite'),
                'panel' => 'theme_options',
                'priority' => 26,
                'capability' => 'edit_theme_options',
            )
        );
    }

    require get_template_directory() . '/inc/customizer/functions/theme-options.php';
    require get_template_directory() . '/inc/customizer/functions/banner-options.php';
    require get_template_directory() . '/inc/customizer/functions/team-options.php';
    require get_template_directory() . '/inc/customizer/functions/cta-options.php';



}
add_action( 'customize_register', 'hasten_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hasten_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hasten_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hasten_lite_customize_preview_js() {
    wp_enqueue_script( 'hasten-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hasten_lite_customize_preview_js' );

function hasten_lite_custom_customize_enqueue() {
    wp_enqueue_style( 'hasten-lite-customizer-style', trailingslashit( get_template_directory_uri() ) . 'assets/inc/sortable/customizer-control.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'hasten_lite_custom_customize_enqueue' );