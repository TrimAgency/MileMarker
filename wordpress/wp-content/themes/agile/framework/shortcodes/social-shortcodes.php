<?php
/* Subscribe to RSS feed */

function mo_subscribe_rss() {
    $feed_url = home_url() . '/feed';
    return '<div class="rss-block">Like what you see? <a href="' . $feed_url . '">Subscribe to RSS feed</a> to receive updates!</div>';

}

add_shortcode('subscribe_rss', 'mo_subscribe_rss');

function mo_social_list_shortcode($atts, $content = null, $code) {
    extract(shortcode_atts(array(
        'email' => false,
        'facebook_url' => false,
        'twitter_url' => false,
        'flickr_url' => false,
        'youtube_url' => false,
        'linkedin_url' => false,
        'googleplus_url' => false,
        'vimeo_url' => false,
        'instagram_url' => false,
        'behance_url' => false,
        'pinterest_url' => false,
        'skype_url' => false,
        'dribbble_url' => false,
        'include_rss' => false,
        'align' => 'left'
    ), $atts));


    $output = '<ul class="social-list clearfix';
    if ($align == 'center')
        $output .= ' center';
    $output .= '">';

    if ($email)
        $output .= '<li><a class="email" href="' . $email . '" target="_blank" title="Contact Us"><i class="icon-email2"></i></a></li>';
    if ($facebook_url)
        $output .= '<li><a class="facebook" href="' . $facebook_url . '" target="_blank" title="Follow on Facebook"><i class="icon-facebook8"></i></a></li>';
    if ($twitter_url)
        $output .= '<li><a class="twitter" href="' . $twitter_url . '" target="_blank" title="Subscribe to Twitter Feed"><i class="icon-twitter2"></i></a></li>';
    if ($flickr_url)
        $output .= '<li><a class="flickr" href="' . $flickr_url . '" target="_blank" title="View Flickr Portfolio"><i class="icon-flickr"></i></a></li>';
    if ($youtube_url)
        $output .= '<li><a class="youtube" href="' . $youtube_url . '" target="_blank" title="Subscribe to the YouTube channel"><i class="icon-youtube4"></i></a></li>';
    if ($linkedin_url)
        $output .= '<li><a class="linkedin" href="' . $linkedin_url . '" target="_blank" title="View LinkedIn Profile"><i class="icon-linkedin4"></i></a></li>';
    if ($googleplus_url)
        $output .= '<li><a class="googleplus" href="' . $googleplus_url . '" target="_blank" title="Follow on Google Plus"><i class="icon-google-plus2"></i></a></li>';
    if ($vimeo_url)
        $output .= '<li><a class="vimeo" href="' . $vimeo_url . '" target="_blank" title="Subscribe to the Vimeo Channel"><i class="icon-vimeo2"></i></a></li>';
    if ($instagram_url)
        $output .= '<li><a class="instagram" href="' . $instagram_url . '" target="_blank" title="View Instagram Feed"><i class="icon-instagram5"></i></a></li>';
    if ($behance_url)
        $output .= '<li><a class="behance" href="' . $behance_url . '" target="_blank" title="View Behance Portfolio"><i class="icon-behance"></i></a></li>';
    if ($pinterest_url)
        $output .= '<li><a class="pinterest" href="' . $pinterest_url . '" target="_blank" title="Subscribe to Pinterest Feed"><i class="icon-pinterest4"></i></a></li>';
    if ($skype_url)
        $output .= '<li><a class="skype" href="' . $skype_url . '" target="_blank" title="Connect to us on Skype"><i class="icon-skype"></i></a></li>';
    if ($dribbble_url)
        $output .= '<li><a class="dribbble" href="' . $dribbble_url . '" target="_blank" title="View Dribbble Portfolio"><i class="icon-dribbble6"></i></a></li>';

    if ($include_rss && mo_to_boolean($include_rss)) {
        $rss = get_bloginfo('rss2_url');
        $output .= '<li><a class="rss" href="' . $rss . '" target="_blank" title="Subscribe to our RSS Feed"><i class="icon-rss4"></i></a></li>';
    }

    $output .= '</ul>';

    return $output;

}

add_shortcode('social_list', 'mo_social_list_shortcode');

/*------- Paypal Donate Button - http://blue-anvil.com/archives/8-fun-useful-shortcode-functions-for-wordpress/ ----*/

function mo_paypal_donate_shortcode($atts) {
    extract(shortcode_atts(array(
        'title' => 'Make a donation',
        'account' => 'REPLACE ME',
        'for' => '',
        'display_card_logos' => "Yes",
    ), $atts));

    global $post;

    if (!$for) $for = str_replace(" ", "+", $post->post_title);

    if ($display_card_logos == "Yes")
        $class = 'donate-button-plus';
    else
        $class = 'donate-button';

    return '<a class="' . $class . '" href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=' . $account . '&item_name=Donation+for+' . $for . '" title="' . $title . '"></a>';

}

add_shortcode('donate', 'mo_paypal_donate_shortcode');