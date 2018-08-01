<?php
if(!function_exists('hasten_lite_sanitize_checkbox')):
    function hasten_lite_sanitize_checkbox( $input ) {
        return ( ( isset( $input ) && true == $input ) ? true : false );
    }
endif;

if ( ! function_exists( 'hasten_lite_sanitize_page' ) ) :
    function hasten_lite_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;


if(!function_exists('hasten_lite_sanitize_select')):

function hasten_lite_sanitize_select( $input, $setting ) {

    // Ensure input is a slug
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;


if(!function_exists('hasten_lite_sanitize_choices')):
    function hasten_lite_sanitize_choices( $input, $setting ) {
        global $wp_customize;

        $control = $wp_customize->get_control( $setting->id );

        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }
endif;


if(!function_exists('hasten_lite_sanitize_rgba')):
    function hasten_lite_sanitize_rgba( $color ) {
        if ( empty( $color ) || is_array( $color ) )
            return 'rgba(0,0,0,0)';

        // If string does not start with 'rgba', then treat as hex
        // sanitize the hex color and finally convert hex to rgba
        if ( false === strpos( $color, 'rgba' ) ) {
            return sanitize_hex_color( $color );
        }

        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace( ' ', '', $color );
        sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
        return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
    }
endif;

if(!function_exists('hasten_lite_reset_alls')):

function hasten_lite_reset_alls( $input ) {
    if ( $input == 1 ) {
        delete_option( 'hasten_lite_theme_options');
        delete_option( 'hasten_companion_theme_options');
        $input=0;
        return $input;
    }
    else {
        return '';
    }
}
endif;