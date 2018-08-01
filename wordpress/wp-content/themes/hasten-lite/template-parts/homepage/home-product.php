<?php
$customizer_options = hasten_lite_get_theme_options();
$show = $customizer_options['product_show'];
$woo_args = $customizer_options['product_listing_woo'];
$limit = 8;

if(!$limit)
    $limit = 8;
if ($show == 1) {
    $args = hasten_get_woo_args($woo_args, $limit);
    $product_query = new WP_Query($args);
    $title = $customizer_options['product_title'];
    $description = $customizer_options['product_description'];
    $exists = '';
    ?>
    <section class="section product-sec new-arrival-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <?php if ($title || $description): ?>
                        <div class="section-title">
                            <?php
                            if ($title)
                                echo '<h2>' . esc_html($title) . '</h2>';
                            if ($description)
                                echo '<p>' . esc_html($description) . '</p>';
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="product-slider-wrap woocommerce new-arrival">
                        <div class="row">
                        <?php
                        $loop = 1;
                        while ($product_query->have_posts()) : $product_query->the_post();
                            global $product;
                            wc_get_template_part('content', 'product');
                            if ($loop % 4 == 0) {
                                echo '</div>';
                                echo '<div class="row">';
                            }
                            $loop++;
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>