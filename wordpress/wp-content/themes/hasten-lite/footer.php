<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hasten
 */
$hasten_companion_options = hasten_lite_companion_get_theme_options();
$hasten_theme_options = hasten_lite_get_theme_options();
$title = $hasten_companion_options['contact_title'];
$description = $hasten_companion_options['contact_desc'];
$show_contact = $hasten_companion_options['contact_checkbox'];
$mapapi = $hasten_companion_options['contact_map_api'];
$latitude = $hasten_companion_options['contact_map_latitude'];
$longitude = $hasten_companion_options['contact_map_longitude'];
$contact_title = $hasten_companion_options['contact_title'];
$contact_desc = $hasten_companion_options['contact_desc'];
$form_title = $hasten_companion_options['form_title'];
$form_desc = $hasten_companion_options['form_desc'];
$contact_add = $hasten_companion_options['contact_add'];
$email = $hasten_companion_options['contact_email'];
$phone = $hasten_companion_options['contact_phone'];
$mobile = $hasten_companion_options['contact_mobile'];
$fax = $hasten_companion_options['contact_fax'];
$form_sc = $hasten_companion_options['form_sc'];

$class = '';
if (!$hasten_companion_options['contact_map_latitude'] || !$hasten_companion_options['contact_map_longitude'] || !$hasten_companion_options['contact_map_api']) {
    $class = 'no-map';
}
if ($show_contact == 1 && is_page_template('page-templates/template-home.php')) {
    if (in_array('hasten-companion/hasten-companion.php', apply_filters('active_plugins', get_option('active_plugins')))) {     ?>

    <!-- Start of contact section -->
    <section id="contact" class="section contact-sec <?php echo esc_attr($class) ?>">
        <div class="row">
            <?php if ($title || $description): ?>
                <div class="section-title">
                    <?php
                    echo '<h2>' . esc_html($title) . '</h2>';
                    echo '<p>' . esc_html($description) . '</p>';
                    ?>
                </div>
            <?php endif; ?>
        </div>


        <?php if ($hasten_companion_options['contact_map_latitude'] && $hasten_companion_options['contact_map_longitude'] && $hasten_companion_options['contact_map_api']) { ?>
            <div class="map-wrapper contact-map" id="contact-map-wrapper">
            </div>
            <input type="hidden" id="contact-map-latitude"
                   value="<?php echo esc_attr($hasten_companion_options['contact_map_latitude']); ?>">
            <input type="hidden" id="contact-map-longitude"
                   value="<?php echo esc_attr($hasten_companion_options['contact_map_longitude']); ?>">
            <input type="hidden" id="contact-map-link"
                   value="<?php echo esc_url('https://www.google.com/maps/@' . $hasten_companion_options['contact_map_latitude'] . ',' . $hasten_companion_options['contact_map_longitude'] . ''); ?>">

            <?php
            if (is_page_template('page-templates/template-home.php')) {

                $is_template_contact = 1;

            } else {

                $is_template_contact = 0;

            }
            ?>
            <input type="hidden" id="is_template_home" value="<?php echo esc_attr($is_template_contact); ?>">
        <?php } ?>

        <div class="container">
            <div class="row">
                <div class="contact-wrapper">
                    <div class="contact-info">
                        <?php

                        if ($form_title)
                            echo('<h2>' . esc_html($form_title) . '</h2>');
                        if ($form_desc)
                            echo('<span>' . esc_html($form_desc) . '</span><br>');
                        if ($contact_add)
                            echo('<p>' . esc_html($contact_add) . '</p><br>');
                        if ($email)
                            echo('<p><strong>' . esc_html__("Email: ", "hasten-lite") . '</strong>' . esc_html($email) . '</p>');
                        if ($phone)
                            echo('<p><strong>' . esc_html__("Phone number: ", "hasten-lite") . '</strong>' . esc_html($phone) . '</p>');
                        if ($mobile)
                            echo('<p><strong>' . esc_html__("Office number: ", "hasten-lite") . '</strong>' . esc_html($mobile) . '</p>');
                        if ($fax)
                            echo('<p><strong>' . esc_html__("Fax: ", "hasten-lite") . '</strong>' . esc_html($fax) . '</p>');


                        ?>
                    </div>

                    <div class="contact-form-wrap">
                        <?php
                        if($form_sc)
                            echo do_shortcode($form_sc)
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }} ?>
<!-- End of contact section -->



<!-- Footer -->
    <footer>
        <?php if ($hasten_theme_options['footer_checkbox'] == 1) { ?>

            <div class="prefooter">
                <div class="container">
                    <div class="row">
                        <?php
                        if ((($hasten_theme_options['footer_checkbox'] == 1) || is_active_sidebar('hasten_lite_footer_1') || is_active_sidebar('hasten_lite_footer_2') || is_active_sidebar('hasten_lite_footer_3'))) { ?>

                            <?php if (is_active_sidebar('hasten_lite_footer_1')) : ?>
                                <div class="col-md-4">
                                    <?php dynamic_sidebar('hasten_lite_footer_1') ?>
                                </div>
                                <?php
                            else: hasten_lite_blank_widget();
                            endif; ?>

                            <?php if (is_active_sidebar('hasten_lite_footer_2')) : ?>
                                <div class="col-md-4 col-sm-6">
                                    <?php dynamic_sidebar('hasten_lite_footer_2') ?>
                                </div>
                                <?php
                            else: hasten_lite_blank_widget();
                            endif; ?>
                            <?php if (is_active_sidebar('hasten_lite_footer_3')) : ?>
                                <div class="col-md-4 col-sm-6">
                                    <?php dynamic_sidebar('hasten_lite_footer_3') ?>
                                </div>
                                <?php
                            else: hasten_lite_blank_widget();
                            endif; ?>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>

        <?php } ?>

        <div class="botfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 txt-center">
                        <div class="copyright">
                            <p><?php echo esc_html__('Powered By WordPress', 'hasten-lite');
                                echo esc_html__(' | ', 'hasten-lite') ?>
                                <a target="_blank" rel="nofollow"
                                   href="<?php echo esc_url('https://www.pridethemes.com/product/hasten-free-wordpress-theme/'); ?>"><?php echo esc_html__('Hasten Lite', 'hasten-lite'); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>


