<?php


function mo_service_box1_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'title' => '',
        'link_url' => '',
        'hover_image_url' => '',
        'image_url' => ''
    ), $atts));

    $output = '<div class="service-box1">';

    $output .= '<a href="' . $link_url . '" target="_self">';
    $output .= '<div class="service-img-wrap">';
    $output .= '<img  class="replacer" src="' . $hover_image_url . '" alt="' . $title . '">';
    $output .= '<img  class="hideOnHover" src="' . $image_url . '" alt="' . $title . '">';
    $output .= '</div>';
    $output .= '<h3 class="title">' . $title . '</h3>';
    $output .= $content;
    $output .= '<div class="folded-edge"></div>';
    $output .= '</a>';
    $output .= '</div>';

    return $output;
}

add_shortcode('service_box1', 'mo_service_box1_shortcode');

function mo_service_box2_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'wrapper_class' => '',
        'title' => '',
        'hover_image_url' => '',
        'separator' => null,
        'image_url' => ''
    ), $atts));

    $output = '<div class="service-box2 ' . $wrapper_class . '">';

    $output .= '<div class="service-img-wrap">';
    $output .= '<img class="replacer" src="' . $hover_image_url . '" alt="' . $title . '">';
    $output .= '<img class="hideOnHover" src="' . $image_url . '" alt="' . $title . '">';
    $output .= '</div>';
    $output .= '<h3 class="title">' . $title . '</h3>';
    if ($separator)
        $output .= '<div class="mini-separator"></div>';
    $output .= $content;
    $output .= '</div>';

    return $output;
}

add_shortcode('service_box2', 'mo_service_box2_shortcode');


function mo_skills($atts, $content) {
    extract(shortcode_atts(array(),
        $atts));
    return '<div id="skill-bars">' . do_shortcode($content) . '</div>';
}

add_shortcode('skills', 'mo_skills');


function mo_skill_bar($atts, $content) {
    extract(shortcode_atts(array(
        'title' => 'Web Development 85%',
        'value' => '83'
    ), $atts));
    return '<div class="skill-bar"><div class="skill-title">' . $title . '</div><div class="skill-bar-content" data-perc="' . $value . '"></div></div>';
}

add_shortcode('skill_bar', 'mo_skill_bar');


function mo_piechart($atts, $content) {
    extract(shortcode_atts(array(
        'percent' => 85,
        'title' => ''
    ), $atts));

    $output = '<div class="piechart">';
    $output .= '<div class="percentage" data-percent="' . $percent . '"><span>' . $percent . '<sup>%</sup></span></div>';
    $output .= '<div class="label">' . $title . '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('piechart', 'mo_piechart');

