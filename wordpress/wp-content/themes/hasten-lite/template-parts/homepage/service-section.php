<?php
$hasten_theme_options = hasten_lite_get_theme_options();
$title = $hasten_theme_options['service_title'];
$description = $hasten_theme_options['service_desc'];
?>
<div class="service-section section">
    <div class="container">
        <?php if ($title || $description) {
            echo '<div class="section-title">';
            if ($title)
                echo '<h2>' . esc_html($title) . '</h2>';
            if ($description)
                echo '<p>' . esc_html($description) . '</p>';
            echo '</div>';
        }
        ?>
        <div class="row">
            <?php
            global $post;
            $hasten_settings = hasten_lite_get_theme_options();
            $hasten_total_page_no = 0;
            $hasten_list_page = array();
            for ($i = 1; $i <= 6; $i++) {
                if (isset ($hasten_settings['hasten_service_page_' . $i]) && $hasten_settings['hasten_service_page_' . $i] > 0) {
                    $hasten_total_page_no++;
                    $hasten_list_page = array_merge($hasten_list_page, array(esc_attr($hasten_settings['hasten_service_page_' . $i])));
                }
            }
            if (!empty($hasten_list_page) && $hasten_total_page_no > 0) {
                $get_featured_posts = new WP_Query(array('posts_per_page' => 6, 'post_type' => array('page'), 'post__in' => $hasten_list_page, 'orderby' => 'post__in',));
                $i = 0;
                while ($get_featured_posts->have_posts()):$get_featured_posts->the_post();
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', 'hasten-lite-service-image');
                    $i++;
                    if (!empty($image_src)) {
                        $image_style = $image_src[0];
                    } else {
                        $image_style = "";
                    }
                    echo '<div class="col-md-4 col-sm-6">';
                    if($image_style){
                        echo '<div class="service-img">';
                        echo '<img src="'.esc_url($image_style).'">';
                        echo '</div>';
                    }
                    echo '<div class="serviceBox">';
                    echo '<h3 class="title"><a href="'.esc_url(get_the_permalink()).'">'.get_the_title().'</a></h3>';
                    echo wp_kses_post(hasten_lite_get_excerpt(get_the_ID(), 125));
                    echo '</div>';
                    echo '</div>';
                    if ($i % 3 == 0) {
                        echo '</div>';
                        echo '<div class="row">';
                    }
                endwhile;
                 wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>
