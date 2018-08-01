<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Hasten
 */

get_header();
$content_class = '';
$sidebar_class = hasten_lite_check_sidebar();
$s_class = '';
if($sidebar_class == 'pull-left'):
    $content_class = 'pull-right';
    $s_class = 'sidebar-page';
elseif($sidebar_class == 'pull-right'):
    $content_class = 'pull-left';
    $s_class = 'sidebar-page';
elseif($sidebar_class == 'no-sidebar'):
    $content_class = 'no-sidebar';
    $s_class = 'no-sidebar';
endif;
$col = 8;
$pageid ='';
if (in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $pageid = get_option('yith_wcwl_wishlist_page_id');
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if (is_cart() || is_checkout() || is_account_page() || get_the_ID() == $pageid) {
        $col = 12;
        $sidebar_class = 'no-sidebar';
    }
}
?>
    <div class="section-content section <?php echo esc_attr($s_class); ?> ">
        <div class="container">
            <div class="row">

                <?php if($sidebar_class != 'no-sidebar'):?>
                <div class="col-md-<?php echo esc_attr($col); ?> <?php echo esc_html($content_class);?>">
                    <?php endif; ?>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <?php
                            while (have_posts()) : the_post();

                                get_template_part('template-parts/content', 'page');

                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;

                            endwhile; // End of the loop.
                            ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->

                    <?php if($sidebar_class != 'no-sidebar'):?>
                </div>
            <?php endif; ?>

                <?php if($sidebar_class != 'no-sidebar'):?>

                    <div class="col-md-4 sidebar <?php echo esc_html($sidebar_class);?>">

                        <div id="secondary">
                            <?php if (is_active_sidebar('hasten_lite_main_sidebar')) {
                                dynamic_sidebar('hasten_lite_main_sidebar');
                            } ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php
get_footer();
