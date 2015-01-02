<?php
  /*
  * Plugin Name: Mile Marker Products
  * Description: A brief description of the plugin.
  * Version: 0.0.1
  * Author: Damon Davison, Curatur LLC
  */

  // Prevent direct access to this plugin
  defined('ABSPATH') or die("Not authorized!");

  // Define custom post type for "Product"
  add_action( 'init', 'create_product' );

  function create_product() {
    register_post_type( 'mm_product',
      array(
        'labels' => array(
          'name' => __( 'Products' ),
          'singular_name' => __( 'Product' )
        ),
        'description' => 'Mile Marker Products',
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'supports' => array('title', 'editor', 'custom-fields'),
      )
    );
  }

  // Configure Advanced Custom Fields plugin
  if (function_exists("register_field_group")) {
    register_field_group(
      array(
      'id' => 'acf_product',
      'title' => 'Product',
      'fields' => array(
        array(
          'key' => 'field_54a6e00000001',
          'label' => 'Part Number',
          'name' => 'partNumber',
          'type' => 'text',
          'instructions' => 'Please enter the part number as it appears in the Shopatron product view.',
          'required' => 1,
          'default_value' => '',
          'placeholder' => 'XX-YYYYYZZ',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_54a6e00000002',
          'label' => 'Description',
          'name' => 'description',
          'type' => 'text',
          'instructions' => 'Please enter a succint, plain text description for search engines.',
          'required' => 1,
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '160',
        ),
        array(
          'key' => 'field_54a6e00000003',
          'label' => 'SEO Keywords',
          'name' => 'seoKeywords',
          'type' => 'text',
          'required' => 1,
          'default_value' => '',
          'placeholder' => 'Enter a comma-separated list of keywords for search engines.',
          'prepend' => '',
          'append' => '',
          'formatting' => 'none',
          'maxlength' => '',
        ),
      ),
      'location' => array(
        array(
          array(
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'mm_product',
            'order_no' => 0,
            'group_no' => 0,
          ),
        ),
      ),
      'options' => array(
        'position' => 'acf_after_title',
        'layout' => 'no_box',
        'hide_on_screen' => array(
          0 => 'custom_fields',
          1 => 'comments',
          2 => 'categories',
          3 => 'tags',
          4 => 'send-trackbacks',
        ),
      ),
      'menu_order' => 0,
    ));

    // Hide the ACF admin menu item
    add_filter('acf/settings/show_admin', '__return_false');
  }
?>
