<?php
if (!function_exists('hasten_lite_theme_options')) :
    function hasten_lite_theme_options()
    {
        $defaults = array(
			'sidebar_layout_picker' => '3',
            'banner_picker' => 'banner-image',
            'slider_image_title' => '',
            'slider_image_description' => '',
            'slider_image_text' => '',
            'slider_image_link' => '',
            'upload_banner_image' => '',
            'banner_post_type' => '',
            'single_btn1' => '',
            'single_btn2' => '',
            'single_link1' => '',
            'single_link2' => '',
            'slider_posts' => '',
            'hasten_lite_reset_all' => '',

            //intro options
            'show_intro' => 0,
            'intro_pages' => '',
            'introbg_image' => '',
            'intro_title' => '',
            'intro_image_align' => 'right',

            //woocommerce
            'product_show' => 0,
            'show_sc1' => 0,
            'show_sc2' => 0,
            'product_title' => '',
            'product_description' => '',
            'product_listing_woo' => '',
            'hasten_lite_shortcode1' => '',
            'hasten_lite_shortcode2' => '',
            'sc1_title' => '',
            'sc2_title' => '',
            'sc1_description' => '',
            'sc2_description' => '',
            'product_limit' => '',


            //CTA section
            'show_cta_section' => '',
            'home_cta_title' => '',
            'home_cta_description' => '',
            'cta_video_radio' => 'video_link',
            'youtube_vemeo_link' => '',
            'cta_upload_video' => '',
            'cta_video_bg_image' => '',
            'video_bg_option' => '',
            'cta_parallax' => '',
            'hasten_lite_sortable_control' => '',
            'cta_button_txt' => '',
            'cta_button_url' => '',
            'feature_post_type' => '',
            'features_block_title' => '',

            //Recent opions
            'show_recent_section' => 0,
            'recent_title' => '',
            'recent_background' => '',
            'recent_layout' => 'layout-1',
            'recent_desc' => '',
            'recent_color' => '#fff',
            'theme_color' => '#45deb0',
            'recent_cat' => 'none',


            //Team Options
            'show_team_section' => 0,
            'team_title' => '',
            'team_desc' => '',
            'team_background' => '',
            'team_color' => '#fff',
            'team_layout' => 'layout-1',
            'team_count' => 3,

            //Testimonial Options
            'show_testimonial_section' => 0,
            'testimonial_title' => '',
            'testimonial_desc' => '',
            'testimonial_section_color' => '#fff',
            'testimonial_image' => '',
            'testimonial_bg_option' => '',
            'testimonial_bg' => 'bg-cover',
            'testimonial_options_column' => 'one-column',
            'testimonial_count' => 3,

            //Blog Options
            'show_service' => 0,
            'team_section_title' => '',
            'service_title' => '',
            'service_desc' => '',
            'team_section_desc' => '',

            //Blog Options
            'show_blog_section' => 0,
            'blog_title' => '',
            'blog_desc' => '',
            'blog_color' => '#fff',
            'blog_background' => '',
            'hasten_entry_meta_blog' => 'show-meta',
            'blog_layout1' => 'layout-1',

            //Pre footer
            'show_prefooter_section' => 0,
            'contact_map_api' => '',
            'contact_map_latitude' => '',
            'contact_map_longitude' => '',
            'form_sc' => '',
            'contact_background' => '',
            'contact_color' => '#fff',

            //contact
            'contact_checkbox' => 0,
            'contact_title' => '',
            'contact_desc' => '',
            'contact_phone' => '',
            'contact_mobile' => '',
            'contact_email' => '',
            'contact_web1' => '',
            'contact_web_title1' => '',
            'contact_web2' => '',
            'contact_web_title2' => '',
            'contact_web3' => '',
            'contact_web_title3' => '',
            'contact_add' => '',
            'form_title' => '',
            'form_desc' => '',
            'form_email' => '',
            'contact_fax' => '',

            // footer
            'footer_checkbox' => 0,
            'pre_footer_layout' => 'prefooter1',
            'footer_layout' => 'footer1',
            'copyright_text' => '&copy; Copyright 2018',
            'developed_by_text' => 'Axel Themes',
            'developed_by_link' => 'https://axelthemes.com/',

        );
        $user_info = get_userdata(1);
        $user_email = $user_info->user_email;
        if(is_email($user_email) && !empty($user_email)){
            $defaults['form_email'] =$user_email;
        }
        else{
            $defaults['form_email'] = '';
        }
        $options = get_option('hasten_lite_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;

if (!function_exists('hasten_lite_companion_theme_options')) :
    function hasten_lite_companion_theme_options()
    {
        $defaults = array(
            //woocommerce
            'show_hc_cta_section' => 0,
            'home_cta_title' => '',
            'home_cta_description' => '',
            'cta_button_txt' => '',
            'cta_button_url' => '',
            'cta_video_bg_image' => '',
            'cta_parallax' => '',
            'hc_cta_section_color' => '',
            'show_team_section' => '',

            //Blog Options
            'team_image_1' => '',
            'team_title_1' => '',
            'team_designation_1' => '',
            'team_fb_1' => '',
            'team_tw_1' => '',
            'team_gmail_1' => '',
            'team_in_1' => '',
            'team_image_2' => '',
            'team_title_2' => '',
            'team_designation_2' => '',
            'team_fb_2' => '',
            'team_tw_2' => '',
            'team_gmail_2' => '',
            'team_in_2' => '',
            'team_image_3' => '',
            'team_title_3' => '',
            'team_designation_3' => '',
            'team_fb_3' => '',
            'team_tw_3' => '',
            'team_gmail_3' => '',
            'team_in_3' => '',
            'team_image_4' => '',
            'team_title_4' => '',
            'team_designation_4' => '',
            'team_fb_4' => '',
            'team_tw_4' => '',
            'team_gmail_4' => '',
            'team_in_4' => '',

            //other options
            'contact_checkbox' => 0,
            'contact_title' => '',
            'contact_desc' => '',
            'form_title' => '',
            'form_desc' => '',
            'form_sc' => '',
            'form_email' => '',
            'contact_add' => '',
            'contact_phone' => '',
            'contact_mobile' => '',
            'contact_email' => '',
            'contact_fax' => '',
            'contact_map_api' => '',
            'contact_map_latitude' => '',
            'contact_map_longitude' => '',
            'sc2_title' => '',
            'sc2_description' => '',
            'hasten_lite_shortcode2' => '',
        );
        $user_info = get_userdata(1);
        $user_email = $user_info->user_email;
        if(is_email($user_email) && !empty($user_email)){
            $defaults['form_email'] =$user_email;
        }
        else{
            $defaults['form_email'] = '';
        }
        $options = get_option('hasten_companion_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;


if (!function_exists('hasten_lite_companion_get_theme_options')):
    function hasten_lite_companion_get_theme_options()
    {
        return wp_parse_args(get_option('hasten_lite_companion_theme_options', array()), hasten_lite_companion_theme_options());
    }
endif;


if (!function_exists('hasten_lite_check')) :
    function hasten_lite_check($check)
    {
        echo '<pre>';
        print_r($check);
        echo '</pre>';
    }
endif;
