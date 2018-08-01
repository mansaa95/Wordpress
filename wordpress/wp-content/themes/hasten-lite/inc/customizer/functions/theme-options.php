<?php
$hasten_lite_theme_options = hasten_lite_get_theme_options();

//Support section
$wp_customize->add_section('hasten_lite_theme_support', array(
    'title' => esc_html__('Support', 'hasten-lite'),
    'priority' => 1, // Mixed with top-level-section hierarchy.
));


for ($i = 1; $i <= 2; $i++) {
    $wp_customize->add_setting('hasten_lite_theme_options[hasten_featured_page_slider_' . $i . ']',
        array(
            'default' => '',
            'sanitize_callback' => 'hasten_lite_sanitize_page',
            'type' => 'option',
            'capability' => 'manage_options'
        ));
    $wp_customize->add_control('hasten_lite_theme_options[hasten_featured_page_slider_' . $i . ']',
        array(
            'priority' => 220 . $i,
            'label' => __(' Page Slider', 'hasten-lite') . ' ' . $i,
            'section' => 'banner_options',
            'type' => 'dropdown-pages',
            'active_callback' => 'hasten_lite_banner_callback_choice',
        ));
}

/* General Options*/

	$wp_customize->add_setting('hasten_lite_theme_options[hasten_reset_all]',
    array(
        'default' => $hasten_lite_theme_options['hasten_lite_reset_all'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_reset_alls',
        'transport' => 'postMessage',
    ));
	$wp_customize->add_control('hasten_lite_theme_options[hasten_reset_all]',
    array(
        'priority' => 50,
        'label' => esc_html__('Reset all default settings. (Refresh it to view the effect)', 'hasten-lite'),
        'section' => 'general_option',
        'type' => 'checkbox',
    ));

		/* Layout Picker */

		$wp_customize->add_setting( 'hasten_lite_theme_options[sidebar_layout_picker]', array(
				'default'           => $hasten_lite_theme_options['sidebar_layout_picker'],
				'sanitize_callback' => 'hasten_lite_sanitize_choices',
                'type'      =>'option',
            )
		);

        $wp_customize->add_control('hasten_lite_theme_options[sidebar_layout_picker]', array(
            'label' => esc_html__('Sidebar Alignment', 'hasten-lite'),
            'description' => esc_html__('Sidebar For Post And Pages', 'hasten-lite'),
            'type' => 'radio',
            'choices' => array(
                '3' => esc_html__('Right Sidebar', 'hasten-lite'),
                '1' => esc_html__('No Sidebar', 'hasten-lite'),
                '2' => esc_html__('Left Sidebar', 'hasten-lite'),
            ),
            'section' => 'general_option',
            'settings' => 'hasten_lite_theme_options[sidebar_layout_picker]'
        ));


$wp_customize->add_setting(
    'hasten_lite_theme_options[show_service]',
    array(
        'default' => $hasten_lite_theme_options['show_service'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_service]',
        array(
            'label' => __('Show Service Section In Homepage? ', 'hasten-lite'),
            'section' => 'service_options',
            'settings' => 'hasten_lite_theme_options[show_service]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[service_title]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['service_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[service_title]',
    array(
        'label' => esc_html__('Section Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'service_options',
        'settings' => 'hasten_lite_theme_options[service_title]',
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[service_desc]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['service_desc'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[service_desc]',
    array(
        'label' => esc_html__('Section Description', 'hasten-lite'),
        'type' => 'text',
        'section' => 'service_options',
        'settings' => 'hasten_lite_theme_options[service_desc]',
    )
);

for ($i = 1; $i <= 6; $i++) {
    $wp_customize->add_setting('hasten_lite_theme_options[hasten_service_page_' . $i . ']',
        array(
            'default' => '',
            'sanitize_callback' => 'hasten_lite_sanitize_page',
            'type' => 'option',
            'capability' => 'manage_options'
        ));
    $wp_customize->add_control('hasten_lite_theme_options[hasten_service_page_' . $i . ']',
        array(
            'priority' => 220 . $i,
            'label' => __('Service ', 'hasten-lite') . ' ' . $i,
            'section' => 'service_options',
            'settings' => 'hasten_lite_theme_options[hasten_service_page_' . $i . ']',
            'type' => 'dropdown-pages',
        ));
}

/* Intro Options*/


$wp_customize->add_setting(
    'hasten_lite_theme_options[show_intro]',
    array(
        'default' => $hasten_lite_theme_options['show_intro'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_intro]',
        array(
            'label' => __('Show Intro Section In Homepage? ', 'hasten-lite'),
            'section' => 'introduction_options',
            'settings' => 'hasten_lite_theme_options[show_intro]',
            'priority' => 1,
        )
    )
);

$wp_customize->add_setting(
    'hasten_lite_theme_options[intro_pages]',
    array(
        'default' => $hasten_lite_theme_options['intro_pages'],
        'type' => 'option',
        'sanitize_callback' => 'absint',
        'capability' => 'edit_theme_options'
    )
);
$wp_customize->add_control('intro_pages', array(
    'label' => esc_html__('Choose Introduction Page :', 'hasten-lite'),
    'type' => 'dropdown-pages',
    'section' => 'introduction_options',
    'settings' => 'hasten_lite_theme_options[intro_pages]'
));

$wp_customize->add_setting('hasten_lite_theme_options[intro_title]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['intro_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[intro_title]',
    array(
        'label' => esc_html__('Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'introduction_options',
        'settings' => 'hasten_lite_theme_options[intro_title]',
    )
);



$wp_customize->add_setting(
    'hasten_lite_theme_options[intro_image_align]',
    array(
        'default' => 'right',
        'type' => 'option',
        'sanitize_callback' => 'hasten_lite_sanitize_choices',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[intro_image_align]', array(
    'label' => esc_html__('Image Alignment', 'hasten-lite'),
    'type' => 'radio',
    'choices' => array(
        'left' => esc_html__('Image Align Left', 'hasten-lite'),
        'right' => esc_html__('Image Align Right', 'hasten-lite'),
    ),
    'section' => 'introduction_options',
    'settings' => 'hasten_lite_theme_options[intro_image_align]'
));


//recent works customizer

$wp_customize->add_setting(
    'hasten_lite_theme_options[show_recent_section]',
    array(
        'default' => $hasten_lite_theme_options['show_recent_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_recent_section]',
        array(
            'label' => esc_html__('Show Portfolio Section In Homepage? ', 'hasten-lite'),
            'section' => 'recent_options',
            'settings' => 'hasten_lite_theme_options[show_recent_section]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[recent_title]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['recent_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[recent_title]',
    array(
        'label' => esc_html__('Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'recent_options',
        'settings' => 'hasten_lite_theme_options[recent_title]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[recent_desc]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['recent_desc'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[recent_desc]',
    array(
        'label' => esc_html__('Subtitle', 'hasten-lite'),
        'type' => 'text',
        'section' => 'recent_options',
        'settings' => 'hasten_lite_theme_options[recent_desc]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[recent_cat]', array(
    'default' => $hasten_lite_theme_options['recent_cat'],
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
    'capability' => 'edit_theme_options',

));

$wp_customize->add_control(new Hasten_Top_Dropdown_Customize_Control(
    $wp_customize, 'hasten_lite_theme_options[recent_cat]',
    array(
        'label' => esc_html__('Select Portfolio Category', 'hasten-lite'),
        'section' => 'recent_options',
        'settings' => 'hasten_lite_theme_options[recent_cat]',
    )
));


$wp_customize->add_setting('hasten_lite_theme_options[recent_background]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hasten_lite_theme_options[recent_background]',
        array(
            'label' => esc_html__('Add Background Image', 'hasten-lite'),
            'section' => 'recent_options',
            'settings' => 'hasten_lite_theme_options[recent_background]',
        ))
);
$wp_customize->add_setting('hasten_lite_theme_options[recent_color]',
    array(
        'type' => 'option',
        'default' => '#fff',
        'sanitize_callback' => 'hasten_lite_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hasten_Customize_Opacity_Color_Control(
        $wp_customize,
        'hasten_lite_theme_options[recent_color]',
        array(
            'label' => esc_html__('Backgorund Overlay', 'hasten-lite'),
            'section' => 'recent_options',
            'settings' => 'hasten_lite_theme_options[recent_color]',
        ))
);

//Testimonial options
$wp_customize->add_setting(
    'hasten_lite_theme_options[show_testimonial_section]',
    array(
        'default' => $hasten_lite_theme_options['show_testimonial_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_testimonial_section]',
        array(
            'label' => esc_html__('Show Testimonial Section In Homepage? ', 'hasten-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hasten_lite_theme_options[show_testimonial_section]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[testimonial_title]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['testimonial_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[testimonial_title]',
    array(
        'label' => esc_html__('Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'testimonial_options',
        'settings' => 'hasten_lite_theme_options[testimonial_title]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[testimonial_desc]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['testimonial_desc'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[testimonial_desc]',
    array(
        'label' => esc_html__('Subtitle', 'hasten-lite'),
        'type' => 'textarea',
        'section' => 'testimonial_options',
        'settings' => 'hasten_lite_theme_options[testimonial_desc]',
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[testimonial_count]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['testimonial_count'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[testimonial_count]',
    array(
        'label' => esc_html__('No. of Posts', 'hasten-lite'),
        'type' => 'number',
        'section' => 'testimonial_options',
        'settings' => 'hasten_lite_theme_options[testimonial_count]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[testimonial_image]',
    array(
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hasten_lite_theme_options[testimonial_image]',
        array(
            'label' => esc_html__('Add Background Image', 'hasten-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hasten_lite_theme_options[testimonial_image]',
        ))
);


$wp_customize->add_setting('hasten_lite_theme_options[testimonial_section_color]',
    array(
        'type' => 'option',
        'default' => '#fff',
        'sanitize_callback' => 'hasten_lite_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hasten_Customize_Opacity_Color_Control(
        $wp_customize,
        'hasten_lite_theme_options[testimonial_section_color]',
        array(
            'label' => esc_html__('Add Background Color', 'hasten-lite'),
            'section' => 'testimonial_options',
            'settings' => 'hasten_lite_theme_options[testimonial_section_color]',
        ))
);

//Blog options
$wp_customize->add_setting(
    'hasten_lite_theme_options[show_blog_section]',
    array(
        'default' => $hasten_lite_theme_options['show_blog_section'],
        'type' => 'option',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    )
);

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[show_blog_section]',
        array(
            'label' => esc_html__('Show Blog Section In Homepage? ', 'hasten-lite'),
            'section' => 'blog_options',
            'settings' => 'hasten_lite_theme_options[show_blog_section]',
            'priority' => 1,
        )
    )
);
$wp_customize->add_setting('hasten_lite_theme_options[blog_title]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['blog_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[blog_title]',
    array(
        'label' => esc_html__('Title', 'hasten-lite'),
        'type' => 'text',
        'section' => 'blog_options',
        'settings' => 'hasten_lite_theme_options[blog_title]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[blog_desc]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['blog_desc'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('hasten_lite_theme_options[blog_desc]',
    array(
        'label' => esc_html__('Subtitle', 'hasten-lite'),
        'type' => 'text',
        'section' => 'blog_options',
        'settings' => 'hasten_lite_theme_options[blog_desc]',
    )
);

$wp_customize->add_setting('hasten_lite_theme_options[hasten_entry_meta_blog]',
    array(
        'default' => $hasten_lite_theme_options['hasten_entry_meta_blog'],
        'sanitize_callback' => 'hasten_lite_sanitize_select',
        'type' => 'option',
    ));
$wp_customize->add_control('hasten_lite_theme_options[hasten_entry_meta_blog]',
    array(
        'priority' => 45,
        'label' => esc_html__('Meta for blog page', 'hasten-lite'),
        'section' => 'blog_options',
        'type' => 'select',
        'settings' => 'hasten_lite_theme_options[hasten_entry_meta_blog]',
        'choices' =>
            array(
                'show-meta' => esc_html__('Show Meta', 'hasten-lite'),
                'hide-meta' => esc_html__('Hide Meta', 'hasten-lite'),
            ),
    ));
$wp_customize->add_setting('hasten_lite_theme_options[blog_background]',
    array(
        'type' => 'option',
        'default' => $hasten_lite_theme_options['blog_background'],
        'sanitize_callback' => 'esc_url_raw',

    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hasten_lite_theme_options[blog_background]',
        array(
            'label' => esc_html__('Add Background Image', 'hasten-lite'),
            'section' => 'blog_options',
            'settings' => 'hasten_lite_theme_options[blog_background]',
        ))
);
$wp_customize->add_setting('hasten_lite_theme_options[blog_color]',
    array(
        'type' => 'option',
        'default' => '#fff',
        'sanitize_callback' => 'hasten_lite_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hasten_Customize_Opacity_Color_Control(
        $wp_customize,
        'hasten_lite_theme_options[blog_color]',
        array(
            'label' => esc_html__('Backgorund Overlay', 'hasten-lite'),
            'section' => 'blog_options',
            'settings' => 'hasten_lite_theme_options[blog_color]',
        ))
);

//Pre Footer options


//Footer Section


$wp_customize->add_setting('hasten_lite_theme_options[footer_checkbox]',
    array(
        'type'    => 'option',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
        'default' => $hasten_lite_theme_options['footer_checkbox'],
    ));

$wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[footer_checkbox]',
        array(
            'section' => 'footer_section',
            'label'   => esc_html__('Show Pre-Footer', 'hasten-lite'),
            'description' => esc_html__('You Can Add The Widgets From Customizer>widgets.', 'hasten-lite'),
            'settings' => 'hasten_lite_theme_options[footer_checkbox]',
            'priority' => 1,
        )
    )
);


//contact
$wp_customize->add_setting('hasten_lite_theme_options[contact_checkbox]',
    array(
        'type'    => 'option',
        'default' => '',
        'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
    ));

$wp_customize->add_control(new Hasten_Lite_Info_Customize_Controls(
        $wp_customize, 'hasten_lite_theme_options[contact_checkbox]',
        array(
            'section' => 'contact_section',
            'label' => esc_html__('Info:', 'hasten-lite'),
            'description' => esc_html__('Please Install Hasten Companion Plugin For Contact Section.', 'hasten-lite'),
            'settings' => 'hasten_lite_theme_options[contact_checkbox]',
            'priority' => 1,
        )
    )
);


if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    //woocommerce

    $wp_customize->add_section('product_listing',array(
        'title' => esc_html__('Simple Product Listing Section', 'hasten-lite'),
        'priority' => 18,
        'panel' => 'woo_options'
    ));

    $wp_customize->add_setting(
        'hasten_lite_theme_options[product_show]',
        array(
            'default' => $hasten_lite_theme_options['product_show'],
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'hasten_lite_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Hasten_checkbox_Customize_Controls(
            $wp_customize, 'hasten_lite_theme_options[product_show]',
            array(
                'label' => esc_html__('Show Product Listing Section In Homepage ? ', 'hasten-lite'),
                'section' => 'product_listing',
                'settings' => 'hasten_lite_theme_options[product_show]',
                'priority' => 1,
            )
        )
    );

    $wp_customize->add_setting('hasten_lite_theme_options[product_title]',
        array(
            'capability' => 'edit_theme_options',
            'default' => $hasten_lite_theme_options['product_title'],
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option',
        ));
    $wp_customize->add_control('hasten_lite_theme_options[product_title]',
        array(
            'label' => esc_html__('Section Title', 'hasten-lite'),
            'priority' => 1,
            'section' => 'product_listing',
            'type' => 'text',
        ));
    $wp_customize->add_setting('hasten_lite_theme_options[product_description]',
        array(
            'capability' => 'edit_theme_options',
            'default' => $hasten_lite_theme_options['product_description'],
            'sanitize_callback' => 'sanitize_text_field',
            'type' => 'option',
        ));
    $wp_customize->add_control('hasten_lite_theme_options[product_description]',
        array(
            'label' => esc_html__('Section Description', 'hasten-lite'),
            'priority' => 1,
            'section' => 'product_listing',
            'type' => 'text',
        ));

    $wp_customize->add_setting(
        'hasten_lite_theme_options[product_listing_woo]',
        array(
            'type'    => 'option',
            'sanitize_callback' => 'hasten_lite_sanitize_choices',
            'default' => $hasten_lite_theme_options['product_listing_woo'],

        )
    );
    $wp_customize->add_control(
        'hasten_lite_theme_options[product_listing_woo]',
        array(
            'label'   => esc_html__( 'Choose Product To Show', 'hasten-lite' ),
            'section' =>  'product_listing',
            'type'    => 'select',
            'choices' =>  array(
                'feature'   => esc_html__('Feature Products','hasten-lite'),
                'sale'   => esc_html__('Sale Products','hasten-lite'),
                'total-sales'   => esc_html__('Maximum Sale Products','hasten-lite'),
                'new-product'   => esc_html__('New Products','hasten-lite'),
            ),
            'settings' => 'hasten_lite_theme_options[product_listing_woo]',
        )
    );
}

$wp_customize->add_setting('hasten_lite_theme_options[theme_color]',
    array(
        'type' => 'option',
        'default' => '#45deb0',
        'sanitize_callback' => 'hasten_lite_sanitize_rgba',
    )
);


$wp_customize->add_control(
    new  Hasten_Customize_Opacity_Color_Control(
        $wp_customize,
        'hasten_lite_theme_options[theme_color]',
        array(
            'label' => esc_html__('Theme Color', 'hasten-lite'),
            'section' => 'colors',
            'settings' => 'hasten_lite_theme_options[theme_color]',
        ))
);

function hasten_sanitize_date($input)
{
    $date = new DateTime($input);
    return $date->format('m-d-Y');
}