<?php
/**
 * hasten functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hasten
 */

if (!function_exists('is_plugin_active')) {
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

if (!function_exists('hasten_lite_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function hasten_lite_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Hasten, use a find and replace
         * to change 'hasten-lite' to the name of your theme in all the template files.
         */
        load_theme_textdomain('hasten-lite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'hasten-lite'),
        ));

        register_nav_menus(
            array(
                'footer' => esc_html__('Footer Menu (Sub-Menus will not appear on footer)', 'hasten-lite'),
            ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('hasten_lite_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
        add_theme_support('woocommerce');
        add_image_size('hasten-lite-recent-image', 800, 600, true);
        add_image_size('hasten-lite-blog-image', 700, 500, true);
        add_image_size('hasten-lite-team-image', 600, 800, array('left', 'top'));
        add_image_size('hasten-lite-round-image', 120, 120, true);
        add_image_size('hasten-lite-portfolio-image', 800, 600, true);
        add_image_size('hasten-lite-testimonial-image', 200, 200, true);
        add_image_size('hasten-lite-service-image', 100, 100, true);
    }
endif;
add_action('after_setup_theme', 'hasten_lite_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hasten_lite_content_width()
{
    $GLOBALS['content_width'] = apply_filters('hasten_lite_content_width', 640);
}

add_action('after_setup_theme', 'hasten_lite_content_width', 0);

if (!function_exists('hasten_lite_add_editor_styles')) {
    // Add editor styles
    function hasten_lite_add_editor_styles()
    {
        add_editor_style(get_template_directory() . '/assets/css/admin/editor-styles.min.css');
    }

    add_action('init', 'hasten_lite_add_editor_styles');
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if (!function_exists('hasten_lite_get_theme_options')) {
    function hasten_lite_widgets_init()
    {
        register_sidebar(array(
            'name' => esc_html__('Hasten Lite Sidebar', 'hasten-lite'),
            'id' => 'hasten_lite_main_sidebar',
            'description' => esc_html__('Add widgets here.', 'hasten-lite'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Woocommerce Sidebar', 'hasten-lite'),
            'id' => 'hasten_lite_woo_sidebar',
            'description' => esc_html__('Add widgets here.', 'hasten-lite'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

        for ($i = 1; $i <= 3; $i++) {
            register_sidebar(array(
                'name' => esc_html__('Footer Widget ', 'hasten-lite') . $i,
                'id' => 'hasten_lite_footer_' . $i,
                'description' => esc_html__('Shows widgets at Footer Widget ', 'hasten-lite') . $i,
                'before_widget' => '<aside id="%1$s" class="widget page-links %2$s">',
                'after_widget' => '</aside>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>',
            ));
        }
    }
}

add_action('widgets_init', 'hasten_lite_widgets_init');

if (!function_exists('hasten_lite_get_theme_options')):
    function hasten_lite_get_theme_options()
    {
        return wp_parse_args(get_option('hasten_lite_theme_options', array()), hasten_lite_theme_options());
    }
endif;

$GLOBALS['hasten_lite_woocommerce_row'] = 0;

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/functions/class-hasten-discount.php';

require get_template_directory() . '/inc/customizer/functions/customizer.php';


require get_template_directory() . '/inc/customizer/functions/custom-sanitization.php';

require get_template_directory() . '/inc/theme-option-settings.php';

require get_template_directory() . '/inc/customizer/functions/customizer-control.php';

require get_template_directory() . '/lib/hasten-lite-enqueue.php';

require get_template_directory() . '/lib/hasten-lite-function.php';

require get_template_directory() . '/plugin-activation.php';

require get_template_directory() . '/lib/hasten-lite-tgmp.php';

require get_template_directory() . '/template-parts/header/hasten-menu.php';

require get_template_directory() . '/inc/customizer/hasten-color-picker/hasten-color-picker.php';

require get_template_directory() . '/information/feature-about-page.php';

require get_template_directory() . '/information/hasten-lite-notifications-utils.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

//information
define( 'HASTEN_LITE_VERSION', '1.4.0' );


    function hasten_lite_get_wporg_plugin_description( $slug ) {

        $plugin_transient_name = 'hasten_t_' . $slug;

        $transient = get_transient( $plugin_transient_name );

        if ( ! empty( $transient ) ) {

            return $transient;

        } else {

            $plugin_description = '';

            if ( ! function_exists( 'plugins_api' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
            }

            $call_api = plugins_api(
                'plugin_information', array(
                    'slug'   => $slug,
                    'fields' => array(
                        'short_description' => true,
                    ),
                )
            );

            if ( ! empty( $call_api ) ) {
                if ( ! empty( $call_api->short_description ) ) {
                    $plugin_description = strtok( $call_api->short_description, '.' );
                }
            }

            set_transient( $plugin_transient_name, $plugin_description, 10 * DAY_IN_SECONDS );

            return $plugin_description;

        }
    }



function hasten_lite_check_passed_time( $no_seconds ) {
    $activation_time = get_option( 'hasten_lite_time_activated' );
    if ( ! empty( $activation_time ) ) {
        $current_time    = time();
        $time_difference = (int) $no_seconds;
        if ( $current_time >= $activation_time + $time_difference ) {
            return true;
        } else {
            return false;
        }
    }

    return true;
}


    function hasten_lite_demo_import_files()
    {
        return array(

            array(
                'import_file_name'             => 'Agency Demo',
                'local_import_file'            => trailingslashit( get_template_directory() )  . 'lib/demo/demo1/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() )  . 'lib/demo/demo1/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() )  . 'lib/demo/demo1/customizer.dat',
                'import_preview_image_url'     => esc_url( get_template_directory_uri() . '/lib/demo/demo1/corporate-demo.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo1/'),
            ),


            array(
                'import_file_name'             => 'Woo Store',
                'local_import_file'            => trailingslashit( get_template_directory() )  . 'lib/demo/demo2/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() )  . 'lib/demo/demo2/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() )  . '/lib/demo/demo2/customizer.dat',
                'import_preview_image_url'     =>  esc_url(get_template_directory_uri()  . '/lib/demo/demo2/woo-store.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo2/'),
            ),

            array(
                'import_file_name'             => 'Restaurant',
                'local_import_file'            => trailingslashit( get_template_directory() )  . '/lib/demo/demo3/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() )  . '/lib/demo/demo3/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/lib/demo/demo3/customizer.dat',
                'import_preview_image_url'     =>  esc_url(get_template_directory_uri()  . '/lib/demo/demo3/restaurant.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo3/'),
            ),
            array(
                'import_file_name'             => 'Travel',
                'local_import_file'            => trailingslashit( get_template_directory() )  . '/lib/demo/demo4/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . '/lib/demo/demo4/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() )  . '/lib/demo/demo4/customizer.dat',
                'import_preview_image_url'     =>  esc_url(get_template_directory_uri()  . '/lib/demo/demo4/travel.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo4/'),
            ),
            array(
                'import_file_name'             => 'Start Up',
                'local_import_file'            => trailingslashit( get_template_directory() )  . '/lib/demo/demo5/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() )  . '/lib/demo/demo5/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . '/lib/demo/demo5/customizer.dat',
                'import_preview_image_url'     =>  esc_url(get_template_directory_uri()  . '/lib/demo/demo5/start-up.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo5/'),
            ),
            array(
                'import_file_name'             => 'Education',
                'local_import_file'            => trailingslashit( get_template_directory() )  . '/lib/demo/demo6/import.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() )  . '/lib/demo/demo6/widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() )  . '/lib/demo/demo6/customizer.dat',
                'import_preview_image_url'     =>  esc_url(get_template_directory_uri()  . '/lib/demo/demo6/education.jpg'),
                'preview_url'                  => esc_url('http://demo.axelthemes.com/hasten-lite-demos/demo6/'),
            ),


        );
    }

    add_filter('pt-ocdi/import_files', 'hasten_lite_demo_import_files');


function hasten_lite_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'hasten_lite_after_import_setup' );