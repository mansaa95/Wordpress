<?php
global $post;
global $wp_query;
$hasten_theme_options = hasten_lite_get_theme_options();
$loop = 0;
$blog_title = $hasten_theme_options['blog_title'];
$blog_subtitle = $hasten_theme_options['blog_desc'];
$meta = $hasten_theme_options['hasten_entry_meta_blog'];
$image = $hasten_theme_options['blog_background'];

$args = array(
    'post_type' => 'post',
    'orderby' => 'DATE',
    'order' => 'DESC',
    'posts_per_page' => 3,
);
if (!empty($image)) {
    $image_style = "style='background-image:url(" . esc_url($image) . ")'";
} else {
    $image_style = "";
}
$loop=1;
$featured = new WP_Query($args);
    ?>
    <section id="blog" class="section parallax blog-sec" <?php echo wp_kses_post($image_style); ?>>
        <div class="container">
            <div class="row">
                <?php if ($blog_title || $blog_subtitle) { ?>
                    <div class="section-title">
                        <?php echo (esc_html($blog_title)) ? '<h2>' . esc_html($blog_title) . '</h2>' : ''; ?>
                        <?php echo (esc_html($blog_subtitle)) ? '<p>' . esc_html($blog_subtitle) . '</p>' : ''; ?>
                    </div>
                <?php } ?>
                <?php

                while ($featured->have_posts()) : $featured->the_post();
                    $post_format = get_post_format($post->ID);
                    $blog_post_author = get_avatar(get_the_author_meta('ID'), 32);
                    $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                    $image = wp_get_attachment_image_src($post_thumbnail_id, 'full');
                    $author_name = get_the_author_meta('display_name');
                    $category = get_the_category();
                    $id = get_the_ID();
                    if($loop<=3):
                    ?>
                    <div class="col-md-4">
                        <div class="blog-wrap style3 box-shadow" data-aos="fade">
                            <div class="blog-image">
                                <?php  hasten_lite_blog_post_format($post_format,$post->ID);?>
                                <div class="blog-date">
                                    <span class="tags"><a
                                                href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"><?php echo esc_attr($category[0]->name); ?></a></span>
                                </div>
                            </div>

                            <div class="blog-footer">
                                <?php echo '<h2><a href="' . esc_url(get_the_permalink()) . '">' . get_the_title() . '</a></h2>' ?>
                                <p class="text"><?php echo wp_kses_post(hasten_lite_get_excerpt($id, 125)); ?></p>
                                <div class="blog-meta">
                                    <?php if ($meta == 'show-meta'): ?>

                                    <div class="author">
                                        <a class="know-more"
                                           href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i
                                                    class="fa fa-user"></i><span><?php echo esc_html($author_name); ?></span></a>
                                    </div>
                                    <div class="author">
                                        <a class="know-more"
                                           href="<?php echo esc_url(get_comments_link($post->ID));; ?>"><i
                                                    class="fa fa-comments-o"></i><span><?php echo esc_html(get_comments_number()); ?></span></a>
                                    </div>
                                    <a class="know-more"
                                       href="<?php the_permalink(); ?>"><?php echo esc_html__('Read more', 'hasten-lite'); ?>
                                        <i
                                                class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $loop++; endif; endwhile; ?>
            </div>
        </div>
    </section>