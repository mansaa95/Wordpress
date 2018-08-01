<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class hasten_lite_Discount_Customize {

    /**
     * Returns the instance.
     *
     */
    public static function get_instance() {

        static $instance = null;

        if ( is_null( $instance ) ) {
            $instance = new self;
            $instance->setup_actions();
        }

        return $instance;
    }

    /**
     * Constructor method.
     *
     */
    private function __construct() {}

    /**
     * Sets up initial actions.
     *
     */
    private function setup_actions() {

        // Register panels, sections, settings, controls, and partials.
        add_action( 'customize_register', array( $this, 'sections' ) );

        // Register scripts and styles for the controls.
        add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
    }

    /**
     * Sets up the customizer sections.
     *
     */
    public function sections( $manager ) {

        // Load custom sections.
        require get_template_directory(). '/inc/customizer/functions/hasten-section-pro-discount.php';

        // Register custom section types.
        $manager->register_section_type( 'hasten_lite_Discount_Customize_Section_Pro' );

        // Register sections.
        $manager->add_section(
            new hasten_lite_Discount_Customize_Section_Pro(
                $manager,
                'hasten_lite_to_pro_discount',
                array(

                    'pro_text' => wp_kses_post( "Buy Hasten Pro (20% Off)", 'hasten-lite' ),
                    'pro_url'  => 'https://www.pridethemes.com/product/hasten-premium-wordpress-theme/',
                    'priority' => 1,
                )
            )
        );
    }

    /**
     * Loads theme customizer CSS.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue_control_scripts() {

        wp_enqueue_script( 'hasten-lite-customize-controls', get_template_directory_uri() . '/inc/customizer/assets/customizer.js', array( 'customize-controls' ) );

        wp_enqueue_style( 'hasten-lite-customize-controls',get_template_directory_uri() . '/inc/customizer/css/customizer-control.css' );
    }
}

// Doing this customizer thang!
hasten_lite_Discount_Customize::get_instance();
