<?php
/**
 * Template Name: Gallery
 *
 * A custom page template for displaying gallery items
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="showcase-template">

        <?php

        $column_count = intval(mo_get_theme_option('mo_gallery_column_count', 3));
        $post_count = intval(mo_get_theme_option('mo_gallery_post_count', 6));

        $args = array(
            'number_of_columns' => $column_count,
            'image_size' => 'medium',
            'posts_per_page' => $post_count,
            'filterable' => false,
            'post_type' => 'gallery_item'
        );

        mo_display_gallery_content($args);
        ?>

    </div> <!-- #showcase-template -->

<?php

$gallery_sidebar = mo_get_theme_option('mo_display_gallery_sidebar') ? true : false;

if ($gallery_sidebar)
    get_sidebar();

get_footer(); // Loads the footer.php template.