<?php
/**
 *
 * Displays portfolio items belonging to specific portfolio categories
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="showcase-full-width">

        <?php
        $args = array(
            'number_of_columns' => 3,
            'image_size' => 'medium',
            'posts_per_page' => 6,
            'filterable' => false,
            'post_type' => 'portfolio'
        );

        mo_display_portfolio_content($args);
        ?>

    </div> <!-- showcase-full-width -->

<?php
get_footer(); // Loads the footer.php template. ?>