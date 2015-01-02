<?php

function mo_video_header_shortcode($atts, $content = null, $shortcode_name = "") {

    extract(shortcode_atts(
        array(
            'id' => '',
            'class' => '',
            'mp4_url' => '',
            'ogg_url' => '',
            'webm_url' => '',
            'placeholder_url' => '',
            'title' => '',
            'text' => '',
            'button_text' => '',
            'button_url' => '',
            'overlay_color' => '',
            'overlay_opacity' => '0.7',
            'overlay_pattern' => ''),
        $atts));

    $output = '';
    if (!empty($mp4_url) || !empty($ogg_url) || !empty($webm_url)) {

        ob_start(); // Gather output
        ?>
        <div id="<?php echo $id; ?>"
             class="<?php echo str_replace("_", "-", $shortcode_name) . ($class ? ' ' . $class : ''); ?>">

            <div class="video-header">

                <div class="header-content">

                    <?php echo empty($title) ? '' : '<h3>' . $title . '</h3>'; ?>

                    <?php echo empty($text) ? '' : '<div class="text">' . $text . '</div>'; ?>

                    <?php echo empty($button_text) ? '' : '<a href="' . $button_url . '" class="button transparent"><span>' . $button_text . '</span></a>'; ?>

                </div>

                <div class="media">
                    <div class="video-bg">
                        <video preload="none"
                               poster="<?php echo esc_url($placeholder_url); ?>"
                               autoplay="autoplay" loop="loop">
                            <source src="<?php echo esc_url($mp4_url); ?>" type="video/mp4">
                            <source src="<?php echo esc_url($ogg_url); ?>" type="video/ogg">
                            <source src="<?php echo esc_url($webm_url); ?>" type="video/webm">
                        </video>
                    </div>
                    <div class="img-bg">
                        <img alt="Video Poster" class="video-placeholder"
                             src="<?php echo esc_url($placeholder_url); ?>"/>
                    </div>
                    <?php

                    if (!empty($overlay_color) || !empty($overlay_pattern)) {

                        $hex = $overlay_color;
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

                        $bg_color = empty($overlay_color) ? "" : "background-color: rgba(".  "$r, $g, $b, $overlay_opacity);";
                        $bg_pattern = empty($overlay_pattern) ? "" : "background-image:url(" . $overlay_pattern . ");";

                        echo '<div class="overlay" style="' . ($bg_color) . ($bg_pattern) . '"></div>';
                    }

                    ?>
                </div>

            </div>

        </div>
        <?php
        // Save output
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}

add_shortcode('video_showcase', 'mo_video_header_shortcode');

add_shortcode('video_section', 'mo_video_header_shortcode');

function mo_html5_audio_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('mp3_url' => '', 'ogg_url' => ''), $atts));


    if (!empty($mp3_url) || !empty($ogg_url)) {
        return <<<HTML
<div class="video-box">
<audio controls="controls">
  <source src="{$ogg_url}" type="audio/ogg" />
  <source src="{$mp3_url}" type="audio/mp3" />
  Your browser does not support the HTML5 audio. Do upgrade. 
</audio>
</div>
HTML;
    }
}

add_shortcode('html5_audio', 'mo_html5_audio_shortcode');

function mo_youtube_video_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'hd' => false, 'align' => 'center', 'style' => '', 'parent_selector' => '#content'), $atts));

    $output = '';

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_youtube_height', 480);
        $width = mo_get_theme_option('mo_youtube_width', 640);
    }

    if (!empty($style))
        $style = ' style="' . $style . '"';

    if (!empty($clip_id))
        $output = '<div class="video-box' . ' align' . $align . '"' . $style . '><iframe title="YouTube video player" parent-selector=' . $parent_selector . ' width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $clip_id . '?rel=0&amp;' . ($hd ? '?hd=1' : '') . '" frameborder="0" allowfullscreen></iframe></div>';

    return $output;
}

add_shortcode('youtube_video', 'mo_youtube_video_shortcode');

function mo_vimeo_video_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'hd' => false, 'align' => 'center', 'style' => '', 'parent_selector' => '#content'), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_vimeo_height', 225);
        $width = mo_get_theme_option('mo_vimeo_width', 400);
    }

    if (!empty($style))
        $style = ' style="' . $style . '"';

    if (!empty($clip_id))
        $out = '<div class="video-box' . ' align' . $align . '"' . $style . '><iframe parent-selector=' . $parent_selector . ' width="' . $width . '" height="' . $height . '" src="http://player.vimeo.com/video/' . $clip_id . '?byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></div>';

    return $out;
}

add_shortcode('vimeo_video', 'mo_vimeo_video_shortcode');


function mo_dailymotion_video_shortcode($atts, $content = null, $code = "") {
    global $mo_theme;

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'theme' => 'none'), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_dailymotion_height', 360);
        $width = mo_get_theme_option('mo_dailymotion_width', 480);
    }

    if (!empty($clip_id))
        $out = '<div class="video-box"><iframe width="' . $width . '" height="' . $height . '" src="http://www.dailymotion.com/video/' . $clip_id . '" frameborder="0"></iframe></div>';

    return $out;

}

add_shortcode('dailymotion_video', 'mo_dailymotion_video_shortcode');

function mo_flash_video_shortcode($atts, $content = null, $code = "") {
    extract(shortcode_atts(array('video_url' => '', 'width' => false, 'height' => false, 'play' => false), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {
        $height = mo_get_theme_option('mo_flash_height', 360);
        $width = mo_get_theme_option('mo_flash_width', 480);
    }

    $play_video = $play ? 'true' : 'false';

    if (!empty($video_url)) {
        return <<<HTML
<div class="video-box">
<object width="{$width}" height="{$height}">
    <param name="movie" value="{$video_url}" />
    <param name="quality" value="high">
    <param name="allowFullScreen" value="true" />
    <param name="allowscriptaccess" value="always" />
    <param name="play" value="{$play_video}"/>
    <param name="wmode" value="transparent" />
    <embed type="application/x-shockwave-flash" src="{$video_url}" pluginspage="http://get.adobe.com/flashplayer/" width="{$width}" height="{$height}" wmode="direct" allowfullscreen="true" allowscriptaccess="always"></embed>
</object>
</div>
HTML;
    }
}

add_shortcode('flash_video', 'mo_flash_video_shortcode');



?>