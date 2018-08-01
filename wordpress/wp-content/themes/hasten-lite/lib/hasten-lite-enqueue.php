<?php
/**
 * Enqueue scripts and styles.
 */
if (!function_exists('hasten_lite_scripts')) {
    function hasten_lite_scripts()
    {
        $hasten_theme_options = hasten_lite_get_theme_options();
        $hasten_companion_options = hasten_lite_companion_get_theme_options();


        $color = $hasten_companion_options['hc_cta_section_color'];
        $testimonial_color = $hasten_theme_options['testimonial_section_color'];
        $recent_color = $hasten_theme_options['recent_color'];
        $blog_color = $hasten_theme_options['blog_color'];
        $port_image = $hasten_theme_options['recent_background'];
        $hasten_theme_color = $hasten_theme_options['theme_color'];

        $bgcolor = '';
        $bgcolor .= ".cta-sec:before {background: $color;}
		";

        if ($testimonial_color) {
            $bgcolor .= ".testimonial-sec:before{background : $testimonial_color;}
			";
        }
        if ($blog_color) {
            $bgcolor .= ".blog-sec:before{background : $blog_color;}";
        }

        if ($recent_color) {
            $bgcolor .= ".portfolio-sec:before{background : $recent_color;}";
        }

        if (!empty($port_image)) {
            $bgcolor .= ".portfolio-sec{background-image:url(" . esc_url($port_image) . ")'}";
        }

        if ($hasten_theme_color != '#10cfe7') {
            $bgcolor .=
                "

                .scroll {
                    border: 2px solid $hasten_theme_color;
                    }
                    .slick-next, .slick-prev {
                      background: $hasten_theme_color;
                      }
                      .sticky:before {
                        color: $hasten_theme_color;}
                    a {
                      color: $hasten_theme_color;
                    }
                    article .read-more:hover, article .read-more:focus,article .read-more:hover:after,article .read-more:focus:after{
                      color: $hasten_theme_color;
                    }
                    article .read-more{
                      border: 2px solid $hasten_theme_color;
                    }
                    .btn-default, .comment-respond .comment-form input[type='submit'], .comments-area ol.comment-list .reply a, a.post-edit-link,div.wpcf7 input[type='submit'] ,.btn-default, .comment-respond .comment-form input[type='submit'], .comments-area ol.comment-list .reply a, a.post-edit-link, .modal-frame .modal-wrap .ajax_add_to_cart, .woocommerce-cart .woocommerce table.cart input.button, .woocommerce-cart .woocommerce .wc-proceed-to-checkout a.checkout-button, .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .woocommerce ul.products li.product .button, .woocommerce input.button.alt, .woocommerce-message a.button.wc-forward, a.button.wc-backward, .product-quick-view button.single_add_to_cart_button, .product-quick-view .woocommerce button.button.alt, .woocommerce button.single_add_to_cart_button, .woocommerce button.button.alt, .woocommerce .wishlist_table td.product-add-to-cart a, .sidenav p.woocommerce-mini-cart__buttons.buttons .button, div.wpcf7 input[type='submit'], button, input[type='submit']{
                      background: $hasten_theme_color;
                    }
                      .comment-respond .comment-form input[type='submit'] ,span.cat-links a:hover, span.tags-links a:hover,.post-navigation .nav-links a span, .post-navigation .nav-links a span,article .read-more{
                        background: $hasten_theme_color;
                        }
                      .pingback .comment-body a:hover, .pingback .comment-body a:focus {
                        color: $hasten_theme_color;
                        }
                    .pingback .comment-body a.comment-edit-link {
                      color: $hasten_theme_color;
                      }

                      .nav-links a:hover, .nav-links span:hover,.post-navigation .nav-previous .post-nav-content a,.post-navigation .nav-next .post-nav-content a,.related-posts .related-item .post-content-wrap .post-content h2 a:hover, .related-posts .related-item .post-content-wrap .post-content h2 a:focus,.post-navigation .nav-previous .post-nav-content a:hover,.post-navigation .nav-next .post-nav-content a:hover{
                        color: $hasten_theme_color;
                        }
                            .inner-banner-wrap ul.breadcrumb li a:hover, .inner-banner-wrap ul.breadcrumb li a:focus {
                              color: $hasten_theme_color;
                              }
                        header.entry-header h2.entry-title a:hover,a:hover, a:focus  {
                          color: $hasten_theme_color;
                          }
                        header.entry-header h1.entry-title a:hover,.portfolio-detail-wrap h5 a:hover,.our-team .post-title a:hover {
                          color: $hasten_theme_color;
                          }
                    #wp-calendar caption {
                      background-color: $hasten_theme_color;
                    }
                    .woocommerce-product-search .search-field:focus {
                        border: 2px solid $hasten_theme_color !important;
                    }
                    a.post-edit-link ,.menu-close,.fullscreen-search .search,.simply-countdown > .simply-section,.subscription-form-wrapper .epm-submit-chimp,.navigation.pagination a.next.page-numbers,#secondary .widget_product_search input[type='submit'],.product-wrap .product-desc .add_to_cart_button,a.button.product_type_variable{
                      background: $hasten_theme_color;
                    }
                    .our-team .social_media_team{
                      background: $hasten_theme_color;
                      opacity: 0.9;
                    }
                    .subscription-form-wrapper .epm-submit-chimp,.woocommerce input.button, .woocommerce input.button.alt,.jetpack_subscription_widget #subscribe-submit input{
                      background: $hasten_theme_color !important;
                    }
                        .post-password-form input[type='password']:focus,.jetpack_subscription_widget #subscribe-email input {
                          border: 2px solid $hasten_theme_color !important;
                          }
                      .post-password-form input[type='submit'] {
                        background: $hasten_theme_color;
                         }
                      .tagcloud a:hover, .tagcloud a:focus,.product-wrap .product-top .product-icons a:hover,li.header-icon.header-cart.slide-nav span,.single-product.woocommerce div.product .woocommerce-tabs ul.tabs li.active a ,article .page-links a{
                        background: $hasten_theme_color;
                    }
                            #secondary .widget ul li a:hover {
                              color: $hasten_theme_color;
                              }
                        .search-form .search-field:focus {
                          border-color: $hasten_theme_color !important;
                          }
                          .single-product.woocommerce div.product .woocommerce-tabs ul.tabs::before,.single-product.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
                            border-bottom: 2px solid $hasten_theme_color;
                        }
                      .search-form .search-submit,.btn-default, .comment-respond .comment-form input[type='submit'], .comments-area ol.comment-list .reply a, a.post-edit-link, .modal-frame .modal-wrap .ajax_add_to_cart, .woocommerce-cart .woocommerce table.cart input.button, .woocommerce-cart .woocommerce .wc-proceed-to-checkout a.checkout-button, .woocommerce #review_form #respond .form-submit input, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .woocommerce ul.products li.product .button, .woocommerce input.button.alt, .woocommerce-message a.button.wc-forward, a.button.wc-backward, .product-quick-view button.single_add_to_cart_button, .product-quick-view .woocommerce button.button.alt, .woocommerce button.single_add_to_cart_button, .woocommerce button.button.alt, .woocommerce .wishlist_table td.product-add-to-cart a, .sidenav p.woocommerce-mini-cart__buttons.buttons .button, div.wpcf7 input[type='submit'] {
                        background: $hasten_theme_color;
                        }
                      span.comments-link a {
                        color: $hasten_theme_color;
                        }
                    .quick-contact-wrap li .icon i {
                      color: $hasten_theme_color;
                      }
                    .sidr .hero-star i {
                      color: $hasten_theme_color; }
                    .sidr ul li span {
                      color: $hasten_theme_color;
                      }
                    .sidr .copyright a {
                      color: $hasten_theme_color;
                      }
                    .header-extended .nav-wrapper .navbar {
                      background: $hasten_theme_color;
                      border-radius: 0;
                      }
                        .header-extended .nav-wrapper .navbar ul.dropdown-menu li a:hover {
                            color: $hasten_theme_color !important; }
                    .header-extended .nav-wrapper.stick-me.sticking {
                      background: $hasten_theme_color;
                      }
                    .header-social-wrap ul li a:hover {
                      color: $hasten_theme_color;
                      }
                        .navbar-transparent.nav-wrapper .navbar ul.dropdown-menu li a:hover {
                          color: $hasten_theme_color !important;
                          }
                          .nav .open > a,.nav .open > a:hover,.nav .open > a:focus{
                              color: $hasten_theme_color !important;
                          }
                      .navbar-transparent.nav-wrapper .navbar .nav li > a:hover {
                        color: $hasten_theme_color;
                        }
                              .nav-wrapper .navbar ul.dropdown-menu li a:hover {
                                color: $hasten_theme_color !important;
                                }
                          .nav-wrapper .navbar .nav li > a:hover {
                            color: $hasten_theme_color;
                            }
                    .bottom-cta-sec {
                      background: $hasten_theme_color;
                      }
                    .velo-slides-nav i {
                      color: $hasten_theme_color;
                      }
                    .portfolio-style3 .pic:after {
                      background-color: $hasten_theme_color;
                    }
                    .element-item.box h3:hover {
                      color: $hasten_theme_color;
                      }
                      .counter-sec i {
                        color: $hasten_theme_color;
                        }
                        .callout-sec .callout-item.icon-left .callout-icon i {
                          color: $hasten_theme_color;
                          }
                    .callout-sec.style2 .serviceBox .service-icon {
                      background: $hasten_theme_color;
                    }
                    .callout-sec.style2 .serviceBox .service-icon:after {
                      border: 4px solid $hasten_theme_color;
                    }
                    .callout-sec.style4 .serviceBox .service-icon {
                      background: $hasten_theme_color;
                    }
                    .serviceBox a.read {
                      background: $hasten_theme_color;
                    }
                    .tabs-style-bar nav ul li a:hover,
                    .tabs-style-bar nav ul li a:focus {
                      color: $hasten_theme_color;
                      }
                    .tabs-style-bar nav ul li.tab-current a {
                      background: $hasten_theme_color;
                    }
                    .tabs-style-underline nav li a::after {
                      background: $hasten_theme_color;
                     }
                    .tabs-style-topline nav li.tab-current {
                      border-top-color: $hasten_theme_color;
                    }
                    .tabs-style-topline nav a:hover,
                    .tabs-style-topline nav a:focus {
                      color: $hasten_theme_color;
                      }

                    .tabs-style-topline nav li.tab-current a {
                      box-shadow: inset 0 3px 0 $hasten_theme_color;
                      color: $hasten_theme_color;
                      }
                    .tabs-style-iconfall nav a:hover,
                    .tabs-style-iconfall nav a:focus,
                    .tabs-style-iconfall nav li.tab-current a {
                      color: $hasten_theme_color;
                      }
                    .tabs-style-iconfall nav li::before {
                      background: $hasten_theme_color;
                     }
                    .tabs-style-linemove nav li:last-child::before {
                      background: $hasten_theme_color;
                    }
                    .tabs-style-linemove nav li.tab-current a {
                      color: $hasten_theme_color;
                    }
                    .tabs-style-line nav li.tab-current a {
                      box-shadow: inset 0 -2px $hasten_theme_color;
                      color: $hasten_theme_color; }
                    .tabs-style-circle nav li::before {
                      border: 1px solid $hasten_theme_color;
                    }
                    .tabs-style-circle nav li.tab-current a {
                      color: $hasten_theme_color;
                      }
                    .tabs-style-shape nav li a:hover span {
                      background-color: $hasten_theme_color;
                      }

                    .tabs-style-shape nav li a:hover svg {
                      fill: $hasten_theme_color;
                      }
                    .tabs-style-linebox nav a:hover,
                    .tabs-style-linebox nav a:focus {
                      color: $hasten_theme_color;
                      }
                    .tabs-style-linebox nav a:hover::after,
                    .tabs-style-linebox nav a:focus::after,
                    .tabs-style-linebox nav li.tab-current a::after {
                      background: $hasten_theme_color;
                      }
                    .tabs-style-flip nav a {
                      color: $hasten_theme_color;
                     }
                    .tabs-style-fillup nav ul li a {
                      border-right: 1px solid $hasten_theme_color;
                    }
                    .tabs-style-fillup nav ul li a::after {
                      border: 1px solid $hasten_theme_color;
                      background: $hasten_theme_color;
                    }
                    .tabs-style-tzoid nav ul li.tab-current a,
                    .tabs-style-tzoid nav ul li.tab-current a:hover {
                      color: $hasten_theme_color;
                      }
                    .tabs-style-tzoid nav ul li a::after {

                      background: $hasten_theme_color;
                    }
                    .tabs-style-circlefill {
                      border: 1px solid $hasten_theme_color;
                       }

                    .tabs-style-circlefill nav ul li {
                      border-right: 1px solid $hasten_theme_color;
                      }
                    .tabs-style-circlefill nav li::before {

                      border: 1px solid $hasten_theme_color;
                      background: $hasten_theme_color;
                    }
                    .tabs-style-circlefill .content-wrap {
                      border-top: 1px solid $hasten_theme_color;
                       }
                    .team-sec .box .box-content {
                      background: $hasten_theme_color;
                     }
                    .team-style2 {
                      background: $hasten_theme_color !important;
                    }

                    .team-style2 .section-title {
                      background: $hasten_theme_color;
                      }
                    .team2-slider .our-team .team-prof span {
                      color: $hasten_theme_color;
                      }
                        .blog-wrap.style3 .blog-image .blog-date {
                          background: $hasten_theme_color;
                        }

                        .blog-wrap.style3 a:hover {
                          color: $hasten_theme_color;
                          }
                        .card .title a:hover {
                          color: $hasten_theme_color;
                          }

                      .cover-box .content .read {

                        background: $hasten_theme_color;
                    }
                    .blog-footer {
                      background: $hasten_theme_color;

                      }
                    .style2 .pricing__price {
                      color: $hasten_theme_color;
                    }
                    .style2 .pricing__action {
                      background: $hasten_theme_color;
                    }

                    .style2 .pricing__action:hover,
                    .style2 .pricing__action:focus {
                      color: $hasten_theme_color;
                    }
                    .input__field--nao:focus ~ .graphic--nao,
                    .input--filled .graphic--nao {
                      stroke: $hasten_theme_color;
                    }
                    .subscription-form-wrapper.style2 .form-wrapper button {

                      background: $hasten_theme_color;
                    }
                    ";
        }


        wp_enqueue_style('hasten-lite-fonts', hasten_fonts_url(), array(), null);

        wp_enqueue_style('hasten-lite-style', get_stylesheet_uri());
        wp_enqueue_style('hasten-lite-custom-style', get_template_directory_uri() . '/assets/css/hasten.css', array(), '201802191031', null);
        wp_add_inline_style('hasten-lite-custom-style', $bgcolor);

        wp_enqueue_script('hasten-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180120', true);
        wp_enqueue_script('hasten-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
        wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-count', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-jarallax', get_template_directory_uri() . '/assets/js/jarallax.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-pagescroll', get_template_directory_uri() . '/assets/js/pagescroll.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-tab', get_template_directory_uri() . '/assets/js/tab.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-imageloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-codrops', get_template_directory_uri() . '/assets/js/codrops-hover.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-tilter', get_template_directory_uri() . '/assets/js/titler.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-anime', get_template_directory_uri() . '/assets/js/anime.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-youtubepopup', get_template_directory_uri() . '/assets/js/youtubepopup.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-sidr', get_template_directory_uri() . '/assets/js/sidr.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-sticky-header', get_template_directory_uri() . '/assets/js/sticky-header.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.min.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-video', get_template_directory_uri() . '/assets/js/jquery.video.js', array('jquery'), '', true);
        wp_enqueue_script('jquery-aos', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), '', true);
        wp_enqueue_script('hasten-lite-app', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), '20180122', true);
        wp_localize_script('hasten-lite-app', 'hasten_lite_ajax_function', array('ajaxurl' => admin_url('admin-ajax.php'),));

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'hasten_lite_scripts', 200);
}
if (!function_exists('hasten_lite_fonts_url')) :
    function hasten_fonts_url()
    {
        $fonts_url = '';
        $fonts = array();


        if ('off' !== _x('on', 'Poppins font: on or off', 'hasten-lite')) {
            $fonts[] = 'Poppins:300,400,500,600,700';
        }
        if ('off' !== _x('on', 'Quicksand font: on or off', 'hasten-lite')) {
            $fonts[] = 'Quicksand:400,500';
        }
        if ('off' !== _x('on', 'Playfair Display font: on or off', 'hasten-lite')) {
            $fonts[] = 'Playfair Display:400,700,900';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
            ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
endif;
