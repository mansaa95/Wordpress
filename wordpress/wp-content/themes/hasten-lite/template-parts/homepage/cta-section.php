<?php
//$hasten_settings 	     = get_option('hasten_companion_theme_options');
$hasten_settings 	     = hasten_lite_companion_get_theme_options();
$home_cta_title		 	 = $hasten_settings['home_cta_title'];
$home_cta_description	 = $hasten_settings['home_cta_description'];
$cta_video_bg_image		 = $hasten_settings['cta_video_bg_image'];
$class          		 = $hasten_settings['cta_parallax'];
$btntext          		 = $hasten_settings['cta_button_txt'];
$btnlink          		 = $hasten_settings['cta_button_url'];
$default = "";
if(!empty($class)){
    $class = " parallax ";
}
else{
    $class = "";
}

if(!empty($home_video_bg_image)){
    $background_style = "style='background-image:url(".esc_url($home_video_bg_image).")'";
}
else{
    $background_style = "";
}
?>



<?php if((empty($default)) && ($home_cta_title||$home_cta_description)):?>
    <section data-aos="fade" class="section cta-sec <?php  echo esc_html($class); if ($video_bg_option == 'vid_repeat' ) { echo "bg-repeat"; } else { echo "bg-cover"; } ?>"  style="background-image: url(<?php echo esc_url($cta_video_bg_image); ?>);">
        <div class="container">
            <div class="row">
                <div class="cta-content">
                    <h2 class="cta-title"><?php echo esc_html($home_cta_title); ?></h2>
                    <p><?php echo esc_html($home_cta_description); ?></p>
                    <?php  if( $btntext && $btnlink):?>
                        <a href="<?php echo esc_url($btnlink); ?>" class="btn btn-default"><?php echo esc_html($btntext); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>
