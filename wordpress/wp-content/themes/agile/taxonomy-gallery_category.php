<?php
/**
 *
 * Displays gallery items belonging to specific gallery categories
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="gallery-full-width">

        <?php
        $args = array(
            'number_of_columns' => 3,
            'image_size' => 'medium',
            'posts_per_page' => 6,
            'filterable' => false,
            'post_type' => 'gallery_item'
        );

        mo_display_gallery_content($args);
        ?>

    </div> <!-- gallery-full-width -->

<?php
get_footer(); // Loads the footer.php template. ?>