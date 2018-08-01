<?php
/**
 * Lite Manager
 *
 * @package Hasten_Lite
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once get_template_directory() . '/information/hasten-lite-about-page/class-hasten-lite-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => apply_filters( 'hasten_lite_about_page_filter', esc_html__( 'About Hasten Lite', 'hasten-lite' ), 'menu_name' ),
	// Page title.
	'page_name'           => apply_filters( 'hasten_lite_about_page_filter', esc_html__( 'About Hasten Lite', 'hasten-lite' ), 'page_name' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => apply_filters( 'hasten_lite_about_page_filter', sprintf( esc_html__( 'Welcome to %s! - Version ', 'hasten-lite' ), 'Hasten Lite' ), 'welcome_title' ),
	// Main welcome content
	'welcome_content'     => apply_filters( 'hasten_lite_about_page_filter', esc_html__( 'Hasten is a incredibly robust, smoothest, most well-polished one page and multipage multipurpose WordPress theme  that has been masterfully crafted with painstaking attention to detail.Hasten is a easy to use and technologically ambitious,flexible and highly responsive premium multipurpose WordPress theme perfect for business and corporate and agency site.Hasten has 5 page templates including default template.It also includes 5 header layout combination.Choose whatever you prefer among them.
', 'hasten-lite' ), 'welcome_content' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => esc_html__( 'Getting Started', 'hasten-lite' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'hasten-lite' ),
		'recommended_plugins' => esc_html__( 'Useful Plugins', 'hasten-lite' ),
		'demo_import'         => esc_html__( 'Demo Import', 'hasten-lite' ),
		'support'             => esc_html__( 'Support', 'hasten-lite' ),
		'changelog'           => esc_html__( 'Changelog', 'hasten-lite' ),
		'free_pro'            => esc_html__( 'Free vs PRO', 'hasten-lite' ),
	),
	// Support content tab.
	'support_content'     => array(
		'first'  => array(
			'title'        => esc_html__( 'Contact Support', 'hasten-lite' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
			'button_label' => esc_html__( 'Contact Support', 'hasten-lite' ),
			'button_link'  => esc_url( 'https://pridethemes.com/submit-ticket/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Documentation', 'hasten-lite' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Hasten_Lite.', 'hasten-lite' ),
			'button_label' => esc_html__( 'Read full documentation', 'hasten-lite' ),
			'button_link'  => esc_url('https://www.pridethemes.com/wp-content/uploads/2018/04/hasten_documentation.pdf'),
			'is_button'    => false,
			'is_new_tab'   => true,
        ),
		'third'  => array(
			'title'        => esc_html__( 'Changelog', 'hasten-lite' ),
			'icon'         => 'dashicons dashicons-portfolio',
			'text'         => esc_html__( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'hasten-lite' ),
			'button_label' => esc_html__( 'Changelog', 'hasten-lite' ),
			'button_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-free-wordpress-theme/' ),
			'is_button'    => false,
			'is_new_tab'   => false,

        ),
	),
	'demo_import'     => array(
        'second'  => array(
            'title'        => esc_html__( 'Corporate', 'hasten-lite' ),
            'image'        => esc_url('http://axelthemes.com/lite-content/demo1/corporate-demo.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
            'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo1/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),
		'first'  => array(
			'title'        => esc_html__( 'Woo Store', 'hasten-lite' ),
			'image'        => esc_url('http://axelthemes.com/lite-content/demo2/woo-store.jpg'),
			'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
			'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
			'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo2/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),

        'demo3'  => array(
            'title'        => esc_html__( 'Restaurant', 'hasten-lite' ),
            'image'        => esc_url('http://axelthemes.com/lite-content/demo3/restaurant.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
            'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo3/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),
        'demo4'  => array(
            'title'        => esc_html__( 'Travel', 'hasten-lite' ),
            'image'        => esc_url('http://axelthemes.com/lite-content/demo4/travel.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
            'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo4/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),
        'demo5'  => array(
            'title'        => esc_html__( 'Start Up', 'hasten-lite' ),
            'image'        => esc_url('http://axelthemes.com/lite-content/demo5/start-up.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
            'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo5/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),
        'demo6'  => array(
            'title'        => esc_html__( 'Education', 'hasten-lite' ),
            'image'        => esc_url('http://axelthemes.com/lite-content/demo5/education.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Import Now', 'hasten-lite' ),
            'buy_link'  => esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-lite-demos/demo6/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'free',
        ),

        'seconds'  => array(
            'title'        => esc_html__( 'Creative Agency', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/cre-agency.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/creative-agency/'),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',

        ),
        'third'  => array(
            'title'        => esc_html__( 'Agency', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/agency.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/agency/'  ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'fourth'  => array(
            'title'        => esc_html__( 'Bitcoin', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/bitcoin.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/bitcoin/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'fifth'  => array(
            'title'        => esc_html__( 'Portfolio', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/portfolio.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/portfolio/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'sixth'  => array(
            'title'        => esc_html__( 'Event', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/event.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/event/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'seventh'  => array(
            'title'        => esc_html__( 'Construction', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/construction.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/construction/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'eighth'  => array(
            'title'        => esc_html__( 'Fashion Store', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/fashion-store.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/store2/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'ninth'  => array(
            'title'        => esc_html__( 'Woocommerce', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/woo.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/woo/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'tenth'  => array(
            'title'        => esc_html__( 'Furniture', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/furniture.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/furniture/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'eleventh'  => array(
            'title'        => esc_html__( 'Insta Shop', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/insta.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/insta-shop/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),


        'elevenths'  => array(
            'title'        => esc_html__( 'Organic Store', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/organic.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/organic-store/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'twelveth'  => array(
            'title'        => esc_html__( 'Glass Store', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/glass.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/glass-store/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',

        ),
        'thirteenth'  => array(
            'title'        => esc_html__( 'Watch Store', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/watch.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/woo-watch/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'fourteenth'  => array(
            'title'        => esc_html__( 'SEO', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/seo.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/seo/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'fifteenth'  => array(
            'title'        => esc_html__( 'Attorney/Law', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/law.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/law/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'sixteenth'  => array(
            'title'        => esc_html__( 'Medical', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/medical.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/medical/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'seventeenth'  => array(
            'title'        => esc_html__( 'SPA', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/spa.jpg'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/spa/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'eighteenth'  => array(
            'title'        => esc_html__( 'Restaurant', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/restaurant.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/restaurant/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'ninetinth'  => array(
            'title'        => esc_html__( 'Real State', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/vacation.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url(  'http://demo.axelthemes.com/hasten-demos/real-state/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'twentith'  => array(
            'title'        => esc_html__( 'Blog', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/blog.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url( 'http://demo.axelthemes.com/hasten-demos/blog/blog/'  ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
        'twentyfirst'  => array(
            'title'        => esc_html__( 'Portfolio Slider', 'hasten-lite' ),
            'image'        => esc_url('http://demo.axelthemes.com/hasten-demos/images/slider.png'),
            'text'         => esc_html__( 'We want to make sure you have the best experience using Hasten_Lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using Hasten_Lite as much as we enjoy creating great products.', 'hasten-lite' ),
            'buy_label' => esc_html__( 'Buy Now', 'hasten-lite' ),
            'buy_link'  => esc_url( 'https://www.pridethemes.com/product/hasten-wordpress-theme/' ),
            'demo_label' => esc_html__( 'Preview', 'hasten-lite' ),
            'demo_link'  => esc_url(  'http://demo.axelthemes.com/hasten-demos/portfolio-slider/' ),
            'is_button'    => true,
            'is_new_tab'   => true,
            'is_free_pro'   => 'pro',
        ),
    ),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Recommended actions', 'hasten-lite' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'hasten-lite' ),
			'button_label'        => esc_html__( 'Recommended actions', 'hasten-lite' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=hasten_lite-welcome&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'hasten-lite' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use Hasten_Lite.', 'hasten-lite' ),
			'button_label'        => esc_html__( 'Documentation', 'hasten-lite' ),
			'button_link'         => esc_url('https://www.pridethemes.com/wp-content/uploads/2018/04/hasten_documentation.pdf'),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'hasten-lite' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'hasten-lite' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'hasten-lite' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),
	// Free vs PRO array.
	'free_pro'            => array(
		'free_theme_name'     => 'Hasten Lite',
		'pro_theme_name'      => 'Hasten Pro',
		'pro_theme_link'      => esc_url('https://pridethemes.com/product/hasten-wordpress-theme/'),
		/* translators: s - theme name */
		'get_pro_theme_label' => sprintf( esc_html__( 'Get %s now!', 'hasten-lite' ), 'Hasten Pro' ),
		'banner_link'         => 'http://docs.hasten_lite.com/article/647-what-is-the-difference-between-hasten_lite-and-hasten_lite-pro',
		'banner_src'          => esc_url(''),
		'features'            => array(
            array(
                'title'       => esc_html__( 'Mobile friendly', 'hasten-lite' ),
                'is_in_lite'  => 'true',
                'is_in_pro'   => 'true',
            ),
		    array(
            'title'       => esc_html__( 'Demos ready to Import', 'hasten-lite' ),
            'is_in_lite'  => '2 Demos',
            'is_in_pro'   => '20+ Demos',
            ),

			array(
				'title'       => esc_html__( 'WooCommerce Compatible', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Theme Options using Customizer API', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),

			array(
				'title'       => esc_html__( 'Cross-Browser Compatible', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Multiple Slider Banner Options', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Jetpack plugin support', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Show or Hide Page Elements', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Custom Error Page', 'hasten-lite' ),
				'is_in_lite'  => 'true',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Unlimited Colours', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Related Posts w/Thumbnails', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
			array(
				'title'       => esc_html__( 'Recent Posts Widget w/Thumbnails', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
            array(
				'title'       => esc_html__( 'Designed Single Portfolio', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
            array(
				'title'       => esc_html__( 'Header Styles', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
            array(
				'title'       => esc_html__( 'Theme Support', 'hasten-lite' ),
				'is_in_lite'  => 'Basic',
				'is_in_pro'   => 'Advanced',
			),
             array(
				'title'       => esc_html__( 'Theme Options', 'hasten-lite' ),
				'is_in_lite'  => 'Basic',
				'is_in_pro'   => 'Advanced',
			),
             array(
				'title'       => esc_html__( 'Home Page Layouts', 'hasten-lite' ),
				'is_in_lite'  => 'Basic',
				'is_in_pro'   => 'Advanced',
			),
             array(
				'title'       => esc_html__( 'Custom Post Type', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
             array(
				'title'       => esc_html__( 'Typography Options', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),

             array(
				'title'       => esc_html__( 'Contact Page Template Option', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
             array(
				'title'       => esc_html__( 'Sections Reorder', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),
            array(
				'title'       => esc_html__( 'Ajax Based Woocommerce Elements', 'hasten-lite' ),
				'is_in_lite'  => 'false',
				'is_in_pro'   => 'true',
			),

		),
	),
	// Plugins array.
	'recommended_plugins' => array(
		'already_activated_message' => esc_html__( 'Already activated', 'hasten-lite' ),
		'version_label'             => esc_html__( 'Version: ', 'hasten-lite' ),
		'install_label'             => esc_html__( 'Install and Activate', 'hasten-lite' ),
		'activate_label'            => esc_html__( 'Activate', 'hasten-lite' ),
		'deactivate_label'          => esc_html__( 'Deactivate', 'hasten-lite' ),
		'content'                   => array(
			array(
				'slug' => 'one-click-demo-import',
			),
            array(
                'slug' => 'elementor',
            ),
            array(
                'slug' => 'loco-translate',
            ),
		),
	),
	// Required actions array.
	'recommended_actions' => array(
		'install_label'    => esc_html__( 'Install and Activate', 'hasten-lite' ),
		'activate_label'   => esc_html__( 'Activate', 'hasten-lite' ),
		'deactivate_label' => esc_html__( 'Deactivate', 'hasten-lite' ),
		'content'          => array(
            'hasten-companion'           => array(
                'title'       => 'Hasten Companion',
                'description' => hasten_lite_get_wporg_plugin_description( 'hasten-companion' ),
                'check'       => ( defined( 'HL_HASTEN_COMPANION_VERSION' ) || ! hasten_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'hasten-companion',
                'id'          => 'hasten-companion',
            ),
            'jetpack'           => array(
                'title'       => 'Jetpack',
                'description' => hasten_lite_get_wporg_plugin_description( 'jetpack' ),
                'check'       => ( defined( 'HL_JETPACK_VERSION' ) || ! hasten_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'jetpack',
                'id'          => 'jetpack',
            ),
            'contact-form-7'           => array(
                'title'       => 'Contact Form 7',
                'description' => hasten_lite_get_wporg_plugin_description( 'contact-form-7' ),
                'check'       => ( defined( 'HL_WPCF7_VERSION' ) || ! hasten_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'contact-form-7',
                'id'          => 'contact-form-7',
            ),
            'one-click-demo-import'           => array(
                'title'       => 'One Click Demo Import',
                'description' => hasten_lite_get_wporg_plugin_description( 'one-click-demo-import' ),
                'check'       => ( defined( 'HL_ONE_CLICK_DEMO_IMPORT_VERSION' ) || ! hasten_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'one-click-demo-import',
                'id'          => 'one-click-demo-import',
            ),  'woocommerce'           => array(
                'title'       => 'Woocommerce',
                'description' => hasten_lite_get_wporg_plugin_description( 'woocommerce' ),
                'check'       => ( defined( 'HL_WOOCOMMERCE_VERSION' ) || ! hasten_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'woocommerce',
                'id'          => 'woocommerce',
            ),
		),
	),
);
Hasten_Lite_About_Page::init( apply_filters( 'hasten_lite_about_page_array', $config ) );

/*
 * Notifications in customize
 */
require get_template_directory() . '/information/class-hasten-lite-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'hasten-lite-companion' => array(
			'recommended' => true,
			/* translators: s - Orbit Fox Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s.', 'hasten-lite' ), sprintf( '<strong>%s</strong>', 'Orbit Fox Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'hasten-lite' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'hasten-lite' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'hasten-lite' ),
	'activate_button_label'     => esc_html__( 'Activate', 'hasten-lite' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'hasten-lite' ),
);
Hasten_Lite_Customizer_Notify::init( apply_filters( 'hasten_lite_customizer_notify_array', $config_customizer ) );
