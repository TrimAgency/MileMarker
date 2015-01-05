<?php
/**
 * The Header template for our theme
 *
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link href="<?php echo get_template_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/jquery.fancybox.css?v=2.1.4" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/js/plugin/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <link href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
