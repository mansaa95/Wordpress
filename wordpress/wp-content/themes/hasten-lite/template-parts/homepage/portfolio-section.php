<?php
$hasten_settings = hasten_lite_get_theme_options();
$show_recent = $hasten_settings['show_recent_section'];
$title = $hasten_settings['recent_title'];
$description = $hasten_settings['recent_desc'];
$category = $hasten_settings['recent_cat'];
$image = $hasten_settings['recent_background'];

if (!empty($image)) {
    $image_style = "style='background-image:url(" . esc_url($image) . ")'";
} else {
    $image_style = "";
}
if (1 == $show_recent):
    if ($category == 'none') {
        $args = array(
            'post_type' => 'jetpack-portfolio',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'order' => 'desc',
            'orderby' => 'menu_order date',
        );
    } else {
        $args = array(
            'post_type' => 'jetpack-portfolio',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'order' => 'desc',
            'orderby' => 'menu_order date',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'jetpack-portfolio-type',
                    'field' => 'slug',
                    'terms' => array($category),
                    'include_children' => true,
                    'operator' => 'IN'
                ),
            )
        );
    }

    $recent_query = new WP_Query($args);
?>

    <section id="portfolio" class="parallax section portfolio-sec" <?php echo wp_kses_post($image_style); ?>>
        <div class="container">
            <?php if ($title || $description): ?>
                    <div class="section-title">
                        <?php
                        if($title)
                            echo '<h2>' . esc_html($title) . '</h2>';
                        if($description)
                            echo '<p>' . esc_html($description) . '</p>';
                        ?>
                    </div>
            <?php endif; ?>
            <?php
            $loop = 1;
            while ($recent_query->have_posts()) : $recent_query->the_post();
                $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $image = wp_get_attachment_image_src($post_thumbnail_id, 'hasten-lite-portfolio-image');
                $content = get_the_content();
                $id = get_the_ID();
                $category = get_the_terms($id, 'jetpack-portfolio-type');
                if (!empty($image[0])) {
                    $image_style = $image[0]; ?>
                <?php } else {
                    $image_style = "";
                }
                $content = get_the_content();
                echo(($loop % 3 == 1 || $loop == 1) ? '<div class="row">' : '');

                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="element-item box" data-aos="fade-up">
                        <div class="port-wrapper">
                        <img src="<?php echo esc_url($image_style); ?>" alt="">
                        <div class="box-content">
                            <?php echo '<a href="' . esc_url($image_style) . '" class="popup-link"><i class="ion-plus"></i></a>' ?>
                        </div>
                        </div>
                        <div class="port-footer">
                            <?php echo('<a href="' . esc_url(get_the_permalink()) . '"><h3  class="title">' . get_the_title() . '</h3></a>'); ?>
                             <span><?php  echo esc_html($category[0]->name); ?> </span>
                        </div>
                    </div>
                </div>
            <?php
                echo(($loop % 3 == 0 && $loop != 1) ? '</div>' : '');
                $loop++;
            endwhile; ?>

        </div>
    </section>
    <!-- End of portfolio section -->
<?php endif; ?>
