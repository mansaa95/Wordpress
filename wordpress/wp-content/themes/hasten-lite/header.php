<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hasten
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('woocommerce'); ?>>

<?php
$hasten_settings = hasten_lite_get_theme_options();
$banner_choice = sanitize_text_field($hasten_settings['banner_picker']);
$slider_image_url = $hasten_settings['upload_banner_image'];
$breadcrumb_metabox = get_post_meta(get_the_ID(),'check_breadcrumb', true);
$description = get_bloginfo('description', 'display');

if (empty($slider_image_url) && (is_page_template('page-templates/template-home.php') || is_home())) {
    $default_banner_class = 'no-banner';
} else {
    $default_banner_class = '';
}
?>
<div class="search-close">
  <i class="fa fa-close"></i>
</div>
<!-- Loader -->
<?php get_template_part('template-parts/nav-search', 'form'); ?>

<!-- Header -->
<header class="header">
    <?php
    do_action('hasten_lite_header');
    do_action('hasten_lite_head_navigation');
    ?>
    <!-- End of header banner -->

</header>
<!-- End of header -->

<?php
if (is_page_template('page-templates/template-home.php')) {
    $banner_choice = sanitize_text_field($hasten_settings['banner_picker']);
    $banner_post_type = $hasten_settings['banner_post_type'];

    switch ($banner_choice) {
        case "banner-slider":
            if (function_exists('hasten_lite_slider_default_query')) :
            echo wp_kses_post(hasten_lite_slider_default_query());
            endif;

            break;
        case "banner-image":
            if (function_exists('hasten_lite_single_image_banner')) :
                echo wp_kses_post(hasten_lite_single_image_banner());
            endif;
            break;
    }
}
else {
    if(!is_singular( 'portfolio' )){
        if($breadcrumb_metabox == 1 || $breadcrumb_metabox=='')
            hasten_lite_breadcrumb();
    }
}
?>
