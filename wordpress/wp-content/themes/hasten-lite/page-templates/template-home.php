<?php
/**
 *
 * Template Name: Frontpage
 * Description: A page template that displays the Homepage or a Front page as in theme main page with slider and some other contents of the
 * post.
 *
 * @package Hasten
 */

get_header();
$hasten_settings = hasten_lite_get_theme_options();
$hasten_companion_settings = hasten_lite_companion_get_theme_options();
$show_intro = $hasten_settings['show_intro'];
$show_cta = $hasten_companion_settings['show_hc_cta_section'];
$show_portfolio = $hasten_settings['show_recent_section'];
$show_testimonial = $hasten_settings['show_testimonial_section'];
$show_blog = $hasten_settings['show_blog_section'];
$product_show = $hasten_settings['product_show'];
$show_team = $hasten_companion_settings['show_team_section'];
$show_service = $hasten_settings['show_service'];


if ($show_intro == 1) {
    get_template_part('template-parts/homepage/intro', 'page');

}
if ($show_service == 1) {
    get_template_part('template-parts/homepage/service', 'section');
}
if ($show_cta == 1) {
    if (in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        get_template_part('template-parts/homepage/cta', 'section');
    }
}
if ($show_team == 1) {
    if (in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {

        get_template_part('template-parts/homepage/team', 'section');
    }
}

if ($product_show == 1) {
    get_template_part('template-parts/homepage/home', 'product');
}

if ($show_portfolio == 1) {
    if (in_array('jetpack/jetpack.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        get_template_part('template-parts/homepage/portfolio', 'section');
    }
}

if ($show_testimonial == 1):
    if (in_array('jetpack/jetpack.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        get_template_part('template-parts/homepage/testimonial', 'section');
    }
endif;
if ($show_blog == 1) {
    get_template_part('template-parts/homepage/blog', 'section');
}

get_footer();
