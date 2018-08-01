<?php

$hasten_theme_options = hasten_lite_companion_get_theme_options();
$title = $hasten_theme_options['team_section_title'];
$description = $hasten_theme_options['team_section_desc'];
$count = 0;
for ($i = 1; $i <= 4; $i++) {
    $team_image = $hasten_theme_options['team_image_' . $i . ''];
    $team_name = $hasten_theme_options['team_title_' . $i . ''];
    $team_designation = $hasten_theme_options['team_designation_' . $i . ''];
    $team_fb = $hasten_theme_options['team_fb_' . $i . ''];
    $team_tw = $hasten_theme_options['team_tw_' . $i . ''];
    $team_gmail = $hasten_theme_options['team_gmail_' . $i . ''];
    $team_in = $hasten_theme_options['team_in_' . $i . ''];

    if($team_image || $team_name || $team_designation|| $team_fb || $team_tw || $team_gmail || $team_in){
        $count++;
    }
}
if($count > 0 || $title || $description){
?>
<div class="team-section section">
    <div class="container">
        <div class="row">
            <?php if ($title || $description) {
                echo '<div class="section-title">';
                if ($title)
                    echo '<h2>' . esc_html($title) . '</h2>';
                if ($description)
                    echo '<p>' . esc_html($description) . '</p>';
                echo '</div>';
               }
            for ($i = 1; $i <= 4; $i++) {
                $team_image = $hasten_theme_options['team_image_' . $i . ''];
                $team_name = $hasten_theme_options['team_title_' . $i . ''];
                $team_designation = $hasten_theme_options['team_designation_' . $i . ''];
                $team_fb = $hasten_theme_options['team_fb_' . $i . ''];
                $team_tw = $hasten_theme_options['team_tw_' . $i . ''];
                $team_gmail = $hasten_theme_options['team_gmail_' . $i . ''];
                $team_in = $hasten_theme_options['team_in_' . $i . ''];

                if (!empty($team_image)) {
                    $background_style = "style='background-image:url(" . esc_url($team_image) . ")'";
                } else {
                    $background_style = "";
                }


                if ($team_image || $team_name || $team_designation || $team_fb || $team_tw || $team_gmail || $team_in) {
                    echo '<div class="col-md-3 col-sm-6">';
                    echo '<div class="our-team">';
                    echo '<div class="pic" '.wp_kses_post($background_style).'>';
                    if ($team_fb || $team_tw || $team_gmail || $team_in) {
                        echo '<div class="social_media_team">';
                        echo '<ul class="team_social">';
                        if ($team_fb)
                            echo '<li><a href="' . esc_url($team_fb) . '"><i class="fa fa-facebook"></i></a></li>';
                        if ($team_tw)
                            echo '<li><a href="' . esc_url($team_tw) . '"><i class="fa fa-twitter"></i></a></li>';
                        if ($team_gmail)
                            echo '<li><a href="' . esc_url($team_gmail) . '"><i class="fa fa-google-plus"></i></a></li>';
                        if ($team_in)
                            echo '<li><a href="' . esc_url($team_in) . '"><i class="fa fa-linkedin"></i></a></li>';
                        echo '</ul>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<div class="team-prof">';
                    if ($team_name)
                        echo '<h3 class="post-title"><a href="#">' . esc_html($team_name) . '</a></h3>';
                    if ($team_designation)
                        echo '<span class="post">' . esc_html($team_designation) . '</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } ?>
        </div>
    </div>
</div>
<?php
}