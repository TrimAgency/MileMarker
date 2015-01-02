<?php

/**
 * Display a testimonial
 *
 * @param    int $post_per_page The number of testimonials you want to display
 * @param    string $orderby The order by setting  https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters
 * @param    array $testimonial_id The ID or IDs of the testimonial(s), comma separated
 *
 * @return    string  Formatted HTML
 */

if (!function_exists('mo_get_testimonial')) {
    function mo_get_testimonial($post_count = -1, $testimonial_ids = null) {
        $query_args = array(
            'posts_per_page' => (int)$post_count,
            'post_type' => 'testimonials',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'no_found_rows' => true,
        );
        if (!empty($testimonial_ids))
            $query_args['post__in'] = explode(',', $testimonial_ids);

        $query = new WP_Query($query_args);

        $testimonials = '';
        if ($query->have_posts()) {

            // Gather output
            ob_start(); ?>

            <ul>

                <?php

                while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $client_name = htmlspecialchars_decode(get_post_meta($post_id, 'mo_client_name', true));
                    $client_details = htmlspecialchars_decode(get_post_meta($post_id, 'mo_client_details', true));

                    $client_name = (empty($client_name)) ? '' : $client_name;
                    $client_details = (empty($client_details)) ? '' : $client_details;

                    $thumbnail_element = mo_get_thumbnail(array('before_html' => '<span>', 'after_html' => '</span>', 'image_size' => 'square', 'image_class' => 'alignleft img-circle', 'wrapper' => false, 'image_alt' => 'Testimonial', 'size' => 'full'));

                    ?>

                    <li>
                        <?php if (!empty($thumbnail_element)) : ?>
                            <div class="fourcol">
                                <div class="center">
                                    <?php echo $thumbnail_element; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="quote<?php echo (empty($thumbnail_element)) ? '' : ' eightcol last'; ?>">
                            <blockquote>
                                <cite><i class="icon-testimonial"></i><?php echo $client_name . ', ' . $client_details ?></cite>

                                <div class="text">
                                    <p><?php echo get_the_content() ?></p>
                                </div>
                            </blockquote>
                        </div>
                    </li>
                <?php

                endwhile;

                wp_reset_postdata();

                ?>

            </ul>

            <?php
            // Save output
            $testimonials = ob_get_contents();
            ob_end_clean();
        }

        return $testimonials;
    }
}

/**
 * Shortcode to display testimonials
 *
 * This functions is attached to the 'testimonial' action hook.
 *
 * [testimonial post_count="1" orderby="none" testimonial_id=""]
 */
if (!function_exists('mo_testimonial_shortcode')) {
    function mo_testimonial_shortcode($atts) {
        extract(shortcode_atts(array(
            'post_count' => '-1',
            'testimonial_ids' => '',
        ), $atts));

        return mo_get_testimonial($post_count, $testimonial_ids);
    }
}

add_shortcode('testimonials', 'mo_testimonial_shortcode');
