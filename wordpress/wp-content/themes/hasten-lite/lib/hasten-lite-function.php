<?php
/**
 *
 * Layout functions
 *
 **/
if (!function_exists('hasten_lite_check_sidebar')) {
    function hasten_lite_check_sidebar()
    {

        $hasten_lite_theme_options = hasten_lite_get_theme_options();
        $sidebar_layout = $hasten_lite_theme_options['sidebar_layout_picker'];
        if ($sidebar_layout == '1') {
            $sidebar_class = 'no-sidebar';
        } else if ($sidebar_layout == '3' && is_active_sidebar('hasten_lite_main_sidebar')) {
            $sidebar_class = 'pull-right';
        } else if ($sidebar_layout == '2' && is_active_sidebar('hasten_lite_main_sidebar')) {
            $sidebar_class = 'pull-left';
        } else {
            $sidebar_class = 'no-selection';
        }
        return $sidebar_class;
    }
}

/* Breadcrumbs  */
if (!function_exists('hasten_lite_breadcrumb')) {

    function hasten_lite_breadcrumb()
    {
        $header_image = get_header_image();
        if ((get_post_type() == 'portfolio') && !is_archive()) {
            $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
            $header_image = $image[0];

        }
        ?>
        <div class="inner-banner-wrap"
             <?php if ($header_image) { ?>style="background-image:url(<?php echo esc_url($header_image); ?>)"<?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="inner-banner-content">
                        <?php
                        if (is_archive()) {
                            the_archive_title('<h2>', '</h2>');
                        }
                        if (is_single()) {
                            the_title('<h2>', '</h2>');
                        }
                        if (is_search()) {
                            echo('<h2>' . esc_html__('Search Page', 'hasten-lite') . '</h2>');
                        }
                        ?>
                        <div class="header-breadcrumb">
                            <?php

                            if (is_page_template('page-templates/template-home.php')) {

                            } else {

                                $delimiter = '';
                                if (is_home())
                                    $home = esc_html__('Blog', 'hasten-lite'); // text for the 'Home' link
                                else
                                    $home = esc_html__('Home', 'hasten-lite'); // text for the 'Home' link

                                $before = '<li>'; // tag before the current crumb
                                $after = '</li>'; // tag after the current crumb
                                echo '<ul class="breadcrumb">';
                                global $post;
                                $homeLink = home_url();
                                echo '<li><a href="' . esc_url($homeLink) . '">' . esc_html($home) . '</a></li>' . wp_kses_post($delimiter) . ' ';
                                if (is_category()) {
                                    global $wp_query;
                                    $cat_obj = $wp_query->get_queried_object();
                                    $thisCat = $cat_obj->term_id;
                                    $thisCat = get_category($thisCat);
                                    $parentCat = get_category($thisCat->parent);
                                    if ($thisCat->parent != 0)
                                        echo(get_category_parents(esc_html($parentCat), TRUE, ' ' . wp_kses_post($delimiter) . ' '));
                                    echo wp_kses_post($before) . single_cat_title('', false) . wp_kses_post($after);
                                } elseif (is_day()) {
                                    echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo '<li><a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_time('d')) . wp_kses_post($after);
                                } elseif (is_month()) {
                                    echo '<li><a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_time('F')) . wp_kses_post($after);
                                } elseif (is_year()) {
                                    echo wp_kses_post($before) . esc_attr(get_the_time('Y')) . wp_kses_post($after);
                                } elseif (is_single() && !is_attachment()) {
                                    if (get_post_type() != 'post') {
                                        $post_type = get_post_type_object(get_post_type());
                                        $slug = $post_type->rewrite;
                                        echo '<li><a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                        echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                    } else {
                                        $cat = get_the_category();
                                        $cat = $cat[0];
                                        //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                                        echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                    }

                                } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
                                    $post_type = get_post_type_object(get_post_type());
                                    if (!empty($post_type)) {
                                        echo wp_kses_post($before) . esc_html($post_type->labels->singular_name) . wp_kses_post($after);
                                    }
                                } elseif (is_attachment()) {
                                    $parent = get_post($post->post_parent);
                                    $cat = get_the_category($parent->ID);
                                    echo '<li><a href="' . esc_url(get_permalink($parent)) . '">' . esc_html($parent->post_title) . '</a></li> ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                } elseif (is_page() && !$post->post_parent) {
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                } elseif (is_page() && $post->post_parent) {
                                    $parent_id = $post->post_parent;
                                    $breadcrumbs = array();
                                    while ($parent_id) {
                                        $page = get_page($parent_id);
                                        $breadcrumbs[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
                                        $parent_id = $page->post_parent;
                                    }
                                    $breadcrumbs = array_reverse($breadcrumbs);
                                    foreach ($breadcrumbs as $crumb)
                                        echo wp_kses_post($crumb) . ' ' . wp_kses_post($delimiter) . ' ';
                                    echo wp_kses_post($before) . esc_html(get_the_title()) . wp_kses_post($after);
                                } elseif (is_search()) {
                                    echo wp_kses_post($before) . esc_html__("Search results for: ", "hasten-lite") . esc_html(get_search_query()) . '' . wp_kses_post($after);
                                } elseif (is_tag()) {
                                    echo wp_kses_post($before) . esc_html__('Tag', 'hasten-lite') . single_tag_title('', false) . wp_kses_post($after);
                                } elseif (is_author()) {
                                    global $author;
                                    $userdata = get_userdata($author);
                                    echo wp_kses_post($before) . esc_html__("Articles posted by", "hasten-lite") . ' ' . esc_html($userdata->display_name) . wp_kses_post($after);
                                } elseif (is_404()) {
                                    echo wp_kses_post($before) . esc_html__("Error 404", "hasten-lite") . wp_kses_post($after);
                                } elseif (is_page_template('page-templates/template-contact.php')) {
                                    echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
                                }
                            }
                            echo '</ul>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('hasten_lite_headsearch')) {

    add_filter('wp_nav_menu_items', 'hasten_lite_headsearch', 10, 2);

    /** Add searchbar in header. */
    function hasten_lite_headsearch($items, $args)
    {
        if ($args->theme_location == 'primary') {
            return $items .= "<li class=\"header-icon header-search\"><i class=\"fa fa-search\"></i></li>";
        }
        return $items;
    }
}


if (!function_exists('hasten_lite_banner_callback_choice')):
    function hasten_lite_banner_callback_choice($control)
    {
        $banner_setting = $control->manager->get_setting('hasten_lite_theme_options[banner_picker]')->value();

        $control_id = $control->id;

        if ((($control_id == 'hasten_lite_theme_options[hasten_featured_page_slider_1]') || ($control_id == 'hasten_lite_theme_options[hasten_featured_page_slider_2]') || ($control_id == 'hasten_lite_theme_options[hasten_featured_page_slider_3]') || ($control_id == 'hasten_lite_theme_options[hasten_featured_page_slider_4]')) && $banner_setting == 'banner-slider') {
            return true;
        }

        if (($control_id == 'hasten_lite_theme_options[single_link1]' || $control_id == 'hasten_lite_theme_options[single_link2]' || $control_id == 'hasten_lite_theme_options[single_btn1]' || $control_id == 'hasten_lite_theme_options[single_btn2]' || $control_id == 'hasten_lite_theme_options[slider_image_title]' || $control_id == 'hasten_lite_theme_options[slider_image_description]' || $control_id == 'hasten_lite_theme_options[upload_banner_image]') && $banner_setting == 'banner-image') {
            return true;
        }


        return false;
    }
endif;

//banner starts
if (!function_exists('hasten_lite_slider_default_query')) {
    function hasten_lite_slider_default_query()
    {

        global $post;
        $hasten_settings = hasten_lite_get_theme_options();
        $hasten_total_page_no = 0;
        $hasten_list_page = array();
        for ($i = 1; $i <= 2; $i++) {
            if (isset ($hasten_settings['hasten_featured_page_slider_' . $i]) && $hasten_settings['hasten_featured_page_slider_' . $i] > 0) {
                $hasten_total_page_no++;
                $hasten_list_page = array_merge($hasten_list_page, array(esc_attr($hasten_settings['hasten_featured_page_slider_' . $i])));
            }
        }
        if (!empty($hasten_list_page) && $hasten_total_page_no > 0) {
            $get_featured_posts = new WP_Query(array('posts_per_page' => 2, 'post_type' => array('page'), 'post__in' => $hasten_list_page, 'orderby' => 'post__in',));
            $i = 0;
            ?>
            <div class="hn-banner-slider">

                <?php
                while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    $i++;
                    if (!empty($image_src)) {
                        $image_style = "style='background-image:url(" . esc_url($image_src[0]) . ")'";
                    } else {
                        $image_style = "";
                    }
                    ?>
                    <div class="slider-item" <?php echo wp_kses_post($image_style); ?>>
                        <div class="banner-text-wrap">
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_kses_post(hasten_lite_get_excerpt(get_the_ID(), 125)); ?></p>
                            <div class="btn-wrap">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>"
                                   class="btn btn-default"><?php echo esc_html__('Read More', 'hasten-lite'); ?></a>
                            </div>
                        </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>

            <?php
        }
    }
}

if (!function_exists('hasten_lite_single_image_banner')):
    function hasten_lite_single_image_banner()
    {
        $banner_option = hasten_lite_get_theme_options();
        $slider_image_title = ($banner_option['slider_image_title'] ? $banner_option['slider_image_title'] : '');
        $slider_image_description = ($banner_option['slider_image_description'] ? $banner_option['slider_image_description'] : '');
        $slider_image_url = (($banner_option['upload_banner_image']) ? $banner_option['upload_banner_image'] : '');
        $slider_btn1 = $banner_option['single_btn1'];
        $slider_link1 = $banner_option['single_link1'];

        if (!empty($slider_image_url)) {
            $image_style = "style='background-image:url(" . esc_url($slider_image_url) . ");'"; ?>
            <?php
        } else {
            $image_style = "";
        }

        ?>
        <div class="hn-banner-wrapper parallax" <?php echo wp_kses_post($image_style); ?>>
            <div class="container">
                <div class="banner-text-wrap" data-aos="fade">
                    <h2><?php echo esc_html($slider_image_title); ?></h2>

                    <p><?php echo esc_html($slider_image_description); ?></p>
                    <?php if ($slider_btn1 && $slider_link1): ?>
                        <a href="<?php echo esc_url($slider_link1); ?>"
                           class="btn btn-default"><?php echo esc_html($slider_btn1) ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Start of Image Background wrapper -->
        <?php
    }
endif;

if (!function_exists('hasten_lite_woocommerce_get_div')) {

    function hasten_lite_woocommerce_get_div()
    {
        $GLOBALS['hasten_lite_woocommerce_row'] = $GLOBALS['hasten_lite_woocommerce_row'] + 1;
        if ($GLOBALS['hasten_lite_woocommerce_row'] % 4 == 0) {
            echo '</div>';
        } else {
            return;
        }
    }
}

if (!function_exists('hasten_lite_limit_title')) {
    function hasten_lite_limit_title($text, $chars_limit)
    {
        // Change to the number of characters you want to display
        $chars_text = strlen($text);
        $text = $text . " ";
        $text = substr($text, 0, $chars_limit);
        $text = substr($text, 0, strrpos($text, ' '));
        // If the text has more characters that your limit,
        //add ... so the user knows the text is actually longer
        if ($chars_text > $chars_limit) {
            $text = $text . "&hellip;";
        }
        return $text;
    }
}
if (!function_exists('hasten_lite_archive_link')) {
    function hasten_lite_archive_link($post)
    {
        $year = date('Y', strtotime($post->post_date));
        $month = date('m', strtotime($post->post_date));
        $day = date('d', strtotime($post->post_date));
        $link = site_url('') . '/' . $year . '/' . $month . '?day=' . $day;
        return $link;
    }
}


if (!function_exists('hasten_lite_is_url')):
    function hasten_lite_is_url($uri)
    {
        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $uri)) {
            return $uri;
        } else {
            return false;
        }
    }
endif;


if (!function_exists('hasten_lite_get_excerpt')) :
    function hasten_lite_get_excerpt($post_id, $count)
    {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '&hellip;';
        }
        return $excerpt;
    }
endif;

if (!function_exists('hasten_lite_post_excerpt')) {
    function hasten_lite_post_excerpt($post_content, $count)
    {
        $excerpt = $post_content;
        $excerpt = strip_tags($excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);
        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '&hellip;';
        }
        return $excerpt;
    }
}

if (!function_exists('hasten_lite_excerpt_more')) {

    function hasten_lite_excerpt_more($more)
    {
        if ( ! is_admin() )
        return '';
        else
           return $more ;
    }
}

add_filter('excerpt_more', 'hasten_lite_excerpt_more');

add_action('hasten_lite_head_navigation', 'hasten_lite_navigation_head');

if (!function_exists('hasten_lite_site_description')) {
    function hasten_lite_site_description()
    {
        $description = get_bloginfo('description', 'display');
        if ((function_exists('the_custom_logo') && has_custom_logo())) {
            the_custom_logo();
        } else {
            ?>
            <div class="logo">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <h3 class="site-title"><?php bloginfo('name'); ?></h3>

                    <p class="site-description"><?php echo esc_html($description) ?></p>
                </a>

            </div>
            <?php
        }

    }
}

if (!function_exists('hasten_lite_navigation_head')) {

    function hasten_lite_navigation_head($style)
    {
            ?>
            <div class="nav-wrapper">
                <div class="container">
                    <nav id="primary-nav" class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a id="simple-menu" class="ninja-btn menu-btn pull-right" href="#sidr"><span></span></a>
                            <?php hasten_lite_site_description(); ?>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => '',
                                'menu_class' => 'nav navbar-nav navbar-right',
                                'walker' => new hasten_lite_nav_walker(),
                                'fallback_cb' => 'hasten_lite_nav_walker::fallback',
                            ));
                            ?>
                        </div>
                        <!-- End navbar-collapse -->
                    </nav>
                </div>
            </div>
    <?php
    }
}


if (!function_exists('hasten_lite_blank_widget')) {

    function hasten_lite_blank_widget()
    {
        $hasten_lite_theme_options = hasten_lite_get_theme_options();
        $pre_footer_layout = $hasten_lite_theme_options['pre_footer_layout'];
        if ($pre_footer_layout == 'prefooter2') {
            echo '<div class="col-md-3 footer-blank-widget">';
        } else {
            echo '<div class="col-md-4">';
        }
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' . esc_url(admin_url('widgets.php')) . '" target="_blank"><i class="fa fa-plus-circle"></i> ' . esc_html__('Add Footer Widget', 'hasten-lite') . '</a>';
        }
        echo '</div>';
    }
}


add_action('hasten_lite_header', 'hasten_lite_header_default');
if (!function_exists('hasten_lite_header_default')) {

    function hasten_lite_header_default()
    {
        ?>
        <div id="sidr" class="mobile-menu">
            <div class="menu-close">
                <i class="fa fa-close"></i>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'menu_class' => '',
                'walker' => new hasten_lite_nav_walker(),
                'fallback_cb' => 'hasten_lite_nav_walker::fallback'
            ));
            ?>
        </div>
        <?php
    }
}



if (!function_exists('hasten_lite_blog_post_format')) {
    function hasten_lite_blog_post_format($post_format, $post_id)
    {
        global $post;

        if ($post_format == 'video') {

            $content = trim(get_post_field('post_content', $post->ID));
            $ori_url = explode("\n", esc_html($content));
            $url = $ori_url[0];
            $url_type = explode(" ", $url);
            $url_type = explode("[", $url_type[0]);

            if (isset($url_type[1])) {
                $url_type_shortcode = $url_type[1];
            }
            $new_content = get_shortcode_regex();
            if (isset($url_type[1])) {
                if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                    && array_key_exists(2, $matches)
                    && in_array($url_type_shortcode, $matches[2])
                ) {
                    echo do_shortcode($matches[0][0]);
                }
            } else {
                echo wp_oembed_get(hasten_lite_the_featured_video($content));
            }
        }
        elseif ($post_format == 'gallery') {
            $image_url = get_post_gallery_images($post_id);
            $post_thumbnail_id = get_post_thumbnail_id($post_id);
            $attachment = get_post($post_thumbnail_id);
            if ($image_url) {
                ?>

                <div class="post-gallery">

                    <div class="post-format-gallery">
                        <?php foreach ($image_url as $key => $images) { ?>
                            <div class="slider-item" style="background-image: url('<?php echo esc_url($images); ?>');"
                                 alt="<?php echo esc_attr($attachment->post_excerpt); ?>">
                            </div>
                        <?php } ?>
                    </div>

                </div>
            <?php } else {
                if (has_post_thumbnail() && !is_single() && is_page_template('page-templates/template-home.php')) {
                    echo '<div class="featured-image archive-thumb">';
                    echo '<a  href="' . esc_url(get_the_permalink()) . '" class="post-thumbnail">';
                    the_post_thumbnail();
                    echo '<div class="share-mask"><div class="share-wrap"></div></div></a></div>';
                } else {
                    the_post_thumbnail();
                }

            }


        } else {
            if (has_post_thumbnail() && !is_single() && is_page_template('page-templates/template-home.php')) {
                echo '<div class="featured-image archive-thumb">';
                echo '<a  href="' . esc_url(get_the_permalink()) . '" class="post-thumbnail">';

                the_post_thumbnail();
                echo '<div class="share-mask"><div class="share-wrap"></div></div></a></div>';
            } else {
                the_post_thumbnail();
            }

        }


    }
}



if (!function_exists('hasten_lite_the_featured_video')) {
    function hasten_lite_the_featured_video($content)
    {
        $ori_url = explode("\n", $content);
        $url = $ori_url[0];
        $w = get_option('embed_size_w');
        if (is_single() || is_archive() || is_search() || is_page_template('page-templates/template-home.php')) {
            $url = str_replace('448', $w, $url);

            return $url;
        }

        if (0 === strpos($url, 'https://') || 0 == strpos($url, 'http://')) {
            echo esc_url(wp_oembed_get($url));
            $content = trim(str_replace($url, '', $content));
        } elseif (preg_match('#^<(script|iframe|embed|object)#i', $url)) {
            $h = get_option('embed_size_h');
            echo esc_url($url);
            if (!empty($h)) {

                if ($w === $h) $h = ceil($w * 0.75);
                $url = preg_replace(
                    array('#height="[0-9]+?"#i', '#height=[0-9]+?#i'),
                    array(sprintf('height="%d"', $h), sprintf('height=%d', $h)),
                    $url
                );
                echo esc_url($url);
            }

            $content = trim(str_replace($url, '', $content));

        }
    }
}


if (!function_exists('hasten_lite_single_navigation')) {
    function hasten_lite_single_navigation($post_id)
    {
        global $post;
        ?>
        <div class="bgwhite post-pad">
            <nav class="navigation post-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php echo esc_html__('Post navigation', 'hasten-lite'); ?></h2>

                <div class="nav-links">
                    <?php $next_post = get_adjacent_post(false, '', false);
                    if (!empty($next_post)) :
                        ?>
                        <div class="nav-previous">
                            <div class="post-nav-content">
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="prev"><span><i
                                                class="fa fa-long-arrow-left"
                                                aria-hidden="true"></i><?php echo esc_html__('&nbsp;Prev Post', 'hasten-lite'); ?></span>
                                    <br><h4><?php echo esc_html(get_the_title($next_post->ID)); ?></h4></a></div>
                        </div>
                    <?php endif; ?>

                    <?php $prev_post = get_adjacent_post(false, '', true);
                    if (!empty($prev_post)) :
                        $post_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
                        $attachment = get_post($post_thumbnail_id);
                        $image_url = wp_get_attachment_image_src($post_thumbnail_id, 'small');
                        $image_url1 = $image_url[0];
                        ?>
                        <div class="nav-next">
                            <?php if ($image_url1) : ?>
                                <div class="nav-post-thumb"><img src="<?php echo esc_url($image_url1); ?>"></div>
                            <?php else: ?>
                                <div class="nav-post-thumb"></div>
                            <?php endif; ?>
                            <div class="post-nav-content">
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"
                                   rel="next"><span><?php echo esc_html__('Next Post&nbsp;', 'hasten-lite'); ?><i
                                                class="fa fa-long-arrow-right" aria-hidden="true"></i></span><br>
                                    <h4><?php echo esc_html(get_the_title($prev_post->ID)); ?></h4></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        <?php
    }
}

if (!function_exists('hasten_get_woo_args')) {

    function hasten_get_woo_args($data, $limit)
    {
        $args = '';
        if ($data == 'sale') {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $limit,
                'meta_query' => array(
                    'relation' => 'OR',
                    array( // Simple products type
                        'key' => '_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    ),
                    array( // Variable products type
                        'key' => '_min_variation_sale_price',
                        'value' => 0,
                        'compare' => '>',
                        'type' => 'numeric'
                    )
                )
            );
        } elseif ($data == 'feature') {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $limit,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_visibility',
                        'field' => 'name',
                        'terms' => 'featured',
                    ),
                ),
            );
        } elseif ($data == 'total-sales') {
            $args = array(
                'post_type' => 'product',
                'meta_key' => 'total_sales',
                'orderby' => 'meta_value_num',
                'posts_per_page' => $limit,
            );

        } else {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $limit
            );
        }
        return $args;
    }
}
