<?php

/* Shortcode for source code formatting */
function mo_team_shortcode($atts, $content = null, $shortcode_name = "") {


    global $post;


    // Get 'team' posts
    $team_posts = get_posts(array(
        'post_type' => 'team',
        'posts_per_page' => 50, // Unlimited posts
        'orderby' => 'menu_order', // Order by menu order
        'order' => 'ASC' // Start with 'A'
    ));

    $output = null;
    if ($team_posts):

        // Gather output
        ob_start();
        ?>
        <div class="row profiles">
            <?php
            foreach ($team_posts as $post):
                setup_postdata($post);
                $post_id = $post->ID;
                $member_name = get_the_title();
                $position = htmlspecialchars_decode(get_post_meta($post_id, 'mo_position', true));
                $email = get_post_meta($post_id, 'mo_email', true);
                $twitter = get_post_meta($post_id, 'mo_twitter', true);
                $linkedin = get_post_meta($post_id, 'mo_linkedin', true);
                $googleplus = get_post_meta($post_id, 'mo_googleplus', true);
                $facebook = get_post_meta($post_id, 'mo_facebook', true);
                $dribbble = get_post_meta($post_id, 'mo_dribbble', true);
                $instagram = get_post_meta($post_id, 'mo_instagram', true);


                ?>
                <div class="twelvecol profile">
                    <div class="fivecol zero-margin">
                        <div class="profile-header">
                            <?php
                            $image_alt = $member_name . $position;
                            mo_thumbnail(array('image_size' => 'square', 'image_class' => 'img-circle', 'wrapper' => true, 'image_alt' => $image_alt, 'size' => 'full'));
                            ?>

                            <div class="socials">

                                <?php

                                $shortcode_text = '[social_list';
                                $shortcode_text .= $email ? ' email="' . $email . '"' : '';
                                $shortcode_text .= $twitter ? ' twitter_url="' . $twitter . '"' : '';
                                $shortcode_text .= $googleplus ? ' googleplus_url="' . $googleplus . '"' : '';
                                $shortcode_text .= $linkedin ? ' linkedin_url="' . $linkedin . '"' : '';
                                $shortcode_text .= $facebook ? ' facebook_url="' . $facebook . '"' : '';
                                $shortcode_text .= $dribbble ? ' dribbble_url="' . $dribbble . '"' : '';
                                $shortcode_text .= $instagram ? ' instagram_url="' . $instagram . '"' : '';
                                $shortcode_text .= ' align="right"]';

                                echo do_shortcode($shortcode_text);

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="profile-content sevencol zero-margin">

                        <h3><?php echo $member_name; ?></h3>

                        <p class="employee-title"><?php echo $position; ?></p>

                        <?php the_content(); ?>

                    </div>

                </div><!-- /.profile -->

                <?php wp_reset_postdata(); ?>

            <?php endforeach; ?>

        </div><!-- /.row -->

        <?php
        // Save output
        $output = ob_get_contents();
        ob_end_clean();

    endif; // end if $team_posts

    // Output the HTML if it exists
    return ($output) ? $output : '';
}

add_shortcode('team', 'mo_team_shortcode');


/* Shortcode for source code formatting */
function mo_team_slider_shortcode($atts, $content = null, $shortcode_name = "") {


    global $post;


    // Get 'team' posts
    $team_posts = get_posts(array(
        'post_type' => 'team',
        'posts_per_page' => 50, // Unlimited posts
        'orderby' => 'menu_order', // Order by menu order
        'order' => 'ASC' // Start with 'A'
    ));

    $output = null;
    if ($team_posts):

        // Gather output
        ob_start();
        ?>

        <div class="team-slider-profiles flexslider">

            <ul class="slides">

                <?php

                $member_names = array(); // store the names for populating the member name indices later
                $member_count = 0;

                foreach ($team_posts as $post):
                    setup_postdata($post);
                    $post_id = $post->ID;
                    $member_name = get_the_title();
                    $member_names[] = $member_name;
                    $position = htmlspecialchars_decode(get_post_meta($post_id, 'mo_position', true));
                    $email = get_post_meta($post_id, 'mo_email', true);
                    $twitter = get_post_meta($post_id, 'mo_twitter', true);
                    $linkedin = get_post_meta($post_id, 'mo_linkedin', true);
                    $googleplus = get_post_meta($post_id, 'mo_googleplus', true);
                    $facebook = get_post_meta($post_id, 'mo_facebook', true);
                    $dribbble = get_post_meta($post_id, 'mo_dribbble', true);
                    $instagram = get_post_meta($post_id, 'mo_instagram', true);


                    ?>

                    <li id="<?php echo 'slider-member' . ++$member_count ?>">

                        <div class="sixcol">

                            <div class="center">

                                <div class="team-member">

                                    <div class="img-wrap">
                                        <?php mo_thumbnail(array('before_html' => '<p>', 'after_html' => '</p>', 'image_size' => 'square', 'image_class' => 'alignleft img-circle', 'wrapper' => false, 'image_alt' => 'Testimonial', 'size' => 'full')); ?>
                                    </div>

                                    <h3><?php echo $member_name; ?> </h3>

                                    <p class="employee-title"><?php echo $position; ?> </p>

                                </div>

                            </div>

                        </div>

                        <div class="sixcol last">

                            <h3 class="member-title"><?php echo __('About ', 'mo_theme') . $member_name; ?> </h3>

                            <div class="member-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="footer">
                                <span
                                    class="follow-text"><?php echo __('Connect Now: ', 'mo_theme'); ?> </span>

                                <div class="social-wrap">
                                    <?php

                                    $shortcode_text = '[social_list';
                                    $shortcode_text .= $email ? ' email="' . $email . '"' : '';
                                    $shortcode_text .= $twitter ? ' twitter_url="' . $twitter . '"' : '';
                                    $shortcode_text .= $googleplus ? ' googleplus_url="' . $googleplus . '"' : '';
                                    $shortcode_text .= $linkedin ? ' linkedin_url="' . $linkedin . '"' : '';
                                    $shortcode_text .= $facebook ? ' facebook_url="' . $facebook . '"' : '';
                                    $shortcode_text .= $dribbble ? ' dribbble_url="' . $dribbble . '"' : '';
                                    $shortcode_text .= $instagram ? ' instagram_url="' . $instagram . '"' : '';
                                    $shortcode_text .= ' align="right"]';

                                    echo do_shortcode($shortcode_text);

                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php wp_reset_postdata(); ?>

                <?php endforeach; ?>

            </ul>
            <!-- /.row -->
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                jQuery('.team-slider-profiles').flexslider({
                    animation: 'slide',
                    controlsContainer: ".member-list",
                    controlNav: true,
                    directionNav: false,
                    animationLoop: false,
                    slideshow: false,
                    manualControls: ".member-list li a"
                });
            });
        </script>

        <?php

        $member_count = 0;

        $output = '<ul class="member-list">';

        foreach ($member_names as $name) {
            $output .= '<li><a href="#slider-member' . ++$member_count . '">' . $name . '</a></li>';
        }

        $output .= '</ul>';

        // Save output
        $output .= ob_get_contents();
        ob_end_clean();

    endif; // end if $team_posts

    // Output the HTML if it exists
    return ($output) ? $output : '';
}

add_shortcode('team_slider', 'mo_team_slider_shortcode');