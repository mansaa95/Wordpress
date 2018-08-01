<?php
$hasten_theme_options = hasten_lite_get_theme_options();
$intro_pages = $hasten_theme_options['intro_pages'];
$intro_title = $hasten_theme_options['intro_title'];
$align = $hasten_theme_options['intro_image_align'];



if (!empty($intro_pages)):
    $intro_pages_arg = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'page_id' => $intro_pages);
    $intro_pages_query = new WP_Query($intro_pages_arg);
    if ($intro_pages_query->have_posts()): ?>

        <div id="intro1" class="section about-sec">
            <div class="container">
                <div class="row">
                    <?php
                    while ($intro_pages_query->have_posts()):
                        $intro_pages_query->the_post();
                        $gallery = get_post_gallery_images($post);
                        $gallery_count = count($gallery);
                        $ori_url = explode("\n", get_the_content());
                        $url = $ori_url[0];
                        $url_chk = hasten_lite_is_url($url);
                        if (!empty($gallery)):
                            $content_check = 'hasten-gallery';
                            $content_length = '250';
                        elseif (!empty($url_chk)):
                            $content_check = 'hasten-video';
                            $content_length = '250';
                        elseif (get_the_post_thumbnail()):
                            $content_check = 'hasten-image';
                            $content_length = '250';
                        else:
                            $content_check = '';
                            $content_length = '250';
                        endif;
                        $content = trim(get_post_field('post_content', $post->ID));
                        $ori_url = explode("\n", esc_html($content));
                        $url = $ori_url[0];
                        $url_type = explode(" ", $url);
                        $url_type = explode("[", $url_type[0]);
                        if (isset($url_type[1])) {
                            $url_type_shortcode = $url_type[1];
                        }
                        $new_content = get_shortcode_regex();
                        if($align == 'right') {

                            ?>
                            <div class="col-md-6 pull-left">
                                <div class="section-title">
                                    <?php echo ($intro_title) ? '<span>' . esc_html($intro_title) . '</span>' : ''; ?>
                                    <h2><?php the_title(); ?></h2>
                                </div>

                                <div class="about-wrapper">
                                    <p><?php echo wp_kses_post(hasten_lite_get_excerpt($intro_pages_query->post->ID, $content_length)); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($intro_pages)) ?>"
                                       class="btn btn-default"><?php esc_html_e('Read More', 'hasten-lite'); ?></a>
                                </div>
                            </div>
                            <?php if (!empty($gallery)): ?>

                                <div class="col-md-6">
                                    <div class="about-slider pull-right">
                                        <?php foreach ($gallery as $g) :
                                            $image_style = "style='background-image:url(" . esc_url($g) . ")'"; ?>

                                            <div class="about-slider-item" <?php echo wp_kses_post($image_style); ?>>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php elseif (!empty($url_chk)): ?>
                                <div class="col-md-6 pull-right">
                                    <?php echo wp_oembed_get($url); ?>
                                </div>
                            <?php else:
                                $image_style = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                if (!empty($image_style[0])) {
                                    $image_style = "style='background-image:url(" . esc_url($image_style[0]) . ")'";
                                    if (isset($url_type[1])) {
                                        if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                                            && array_key_exists(2, $matches)
                                            && in_array($url_type_shortcode, $matches[2])

                                        ) {
                                            echo '<div class="col-md-6 pull-right">';
                                            echo do_shortcode($matches[0][0]);
                                            echo '</div>';
                                        }
                                    } else {

                                        ?>
                                        <div class="col-md-6 pull-right">
                                            <div class="about-slider">
                                                <div class="about-slider-item" <?php echo wp_kses_post($image_style); ?>>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } endif;

                        }
                        else{
                            if (!empty($gallery)): ?>

                                <div class="col-md-6">
                                    <div class="about-slider pull-left">
                                        <?php foreach ($gallery as $g) :
                                            $image_style = "style='background-image:url(" . esc_url($g) . ")'"; ?>

                                            <div class="about-slider-item" <?php echo wp_kses_post($image_style); ?>>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php elseif (!empty($url_chk)): ?>
                                <div class="col-md-6 pull-left">
                                    <?php echo wp_oembed_get($url); ?>
                                </div>
                            <?php else:
                                $image_style = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                if (!empty($image_style[0])) {
                                    $image_style = "style='background-image:url(" . esc_url($image_style[0]) . ")'";
                                    if (isset($url_type[1])) {
                                        if (preg_match_all('/' . $new_content . '/s', $post->post_content, $matches)
                                            && array_key_exists(2, $matches)
                                            && in_array($url_type_shortcode, $matches[2])

                                        ) {
                                            echo '<div class="col-md-6 pull-left">';
                                            echo do_shortcode($matches[0][0]);
                                            echo '</div>';
                                        }
                                    } else {

                                        ?>
                                        <div class="col-md-6 pull-left">
                                            <div class="about-slider">
                                                <div class="about-slider-item" <?php echo wp_kses_post($image_style); ?>>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } endif;
                                ?>
                            <div class="col-md-6 pull-right">
                                <div class="section-title">
                                    <?php echo ($intro_title) ? '<span>' . esc_html($intro_title) . '</span>' : ''; ?>
                                    <h2><?php the_title(); ?></h2>
                                </div>

                                <div class="about-wrapper">
                                    <p><?php echo wp_kses_post(hasten_lite_get_excerpt($intro_pages_query->post->ID, $content_length)); ?></p>
                                    <a href="<?php echo esc_url(get_permalink($intro_pages)) ?>"
                                       class="btn btn-default"><?php esc_html_e('Read More', 'hasten-lite'); ?></a>
                                </div>
                            </div>
                       <?php  }
                        ?>
                    <?php endwhile;
                    wp_reset_postdata(); ?>

                </div>
            </div>
        </div>
    <?php endif;
endif;