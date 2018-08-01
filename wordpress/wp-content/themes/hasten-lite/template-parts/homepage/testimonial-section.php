<?php
$hasten_settings = hasten_lite_get_theme_options();
$show_testimonial = $hasten_settings['show_testimonial_section'];
$title = $hasten_settings['testimonial_title'];
$description = $hasten_settings['testimonial_desc'];
$options = $hasten_settings['testimonial_options_column'];
$testimonial_image = $hasten_settings['testimonial_image'];
$testimonial_bg_option = $hasten_settings['testimonial_bg'];
$testimonial_section_color = $hasten_settings['testimonial_section_color'];
$count = $hasten_settings['testimonial_count'];
$no_of_posts = (!empty($count) ? $count : '3');

$args = array(
    'post_type' => 'jetpack-testimonial',
    'posts_per_page' => $no_of_posts,
    'post_status' => 'publish',
    'order' => 'desc',
    'orderby' => 'menu_order date',
);
$testimonial_query = new WP_Query($args);
if (!empty($testimonial_image)) {
    $background_style = "style='background-image:url(" . esc_url($testimonial_image) . ")'";
} else {
    $background_style = "";
}
$class = ($testimonial_bg_option ? $testimonial_bg_option : '');
?>

<?php if ($testimonial_query->have_posts() || $title || $description): ?>

    <!-- Start of testimonial section -->
    <section id="testimonial" class="section testimonial-sec parallax" <?php echo wp_kses_post($background_style); ?>>
        <div class="container">
            <div class="row">
                <?php if ($title || $description): ?>

                    <div class="row">
                        <div class="section-title">
                            <?php echo(esc_html($title) ? '<h2>' . esc_html($title) . '</h2>' : ''); ?>
                            <?php echo(esc_html($description) ? '<p>' . esc_html($description) . '</p>' : ''); ?>
                        </div>
                    </div>
                <?php endif;
                ?>

                <div class="slider testimonial-content testimonial-col3 text-center" data-aos="fade">

                    <?php

                    while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                        global $post;
                        $recent_category = "";
                        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                        $image = wp_get_attachment_image_src($post_thumbnail_id, 'testimonial-image');
                        $content = get_the_content();
                        ?>

                        <div class="testimonial-slide">
                            <?php
                            if ($content) {
                                echo '<div class="client-testimonial"><p>';
                                echo wp_kses_post(hasten_lite_post_excerpt($content, 300));
                                echo '</p></div>';
                            }
                            if ($image): ?>
                                <div class="client-img">
                                    <img src="<?php echo esc_url($image[0]); ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <div class="testimonial-desc">
                                <h3 class="testimonial-title"><?php the_title(); ?></h3>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
