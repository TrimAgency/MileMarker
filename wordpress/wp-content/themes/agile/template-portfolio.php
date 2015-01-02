<?php
/**
 * Template Name: Portfolio
 *
 * A custom page template for displaying portfolio items
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="showcase-template">

        <?php

        $column_count = intval(mo_get_theme_option('mo_portfolio_column_count', 3));
        $post_count = intval(mo_get_theme_option('mo_portfolio_post_count', 6));

        $args = array(
            'number_of_columns' => $column_count,
            'image_size' => 'medium',
            'posts_per_page' => $post_count,
            'filterable' => false,
            'post_type' => 'portfolio'
        );

        mo_display_portfolio_content($args);
        ?>

    </div> <!-- #showcase-template -->

<?php

$portfolio_sidebar = mo_get_theme_option('mo_display_portfolio_sidebar') ? true : false;

if ($portfolio_sidebar)
    get_sidebar();

get_footer(); // Loads the footer.php template. 