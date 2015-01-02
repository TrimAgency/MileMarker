<?php
/**
 * Custom Meta Boxes using Option Tree framework
 * @package Livemesh_Framework
 */

/**
 * Initialize the meta boxes.
 */
add_action('admin_init', 'mo_custom_meta_boxes');

if (!function_exists('mo_custom_meta_boxes')) {


    function mo_custom_meta_boxes() {

        mo_build_advanced_page_meta_boxes();

        mo_build_layout_option_meta_Boxes();

        mo_build_entry_header_metaboxes();

        /*$page_meta_box = array(
            'id' => 'mo_page_options',
            'title' => 'Page Options',
            'desc' => '',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(

                array(
                    'id'          => 'mo_featured_portfolio',
                    'label'       => 'Select the featured portfolio',
                    'desc'        => 'Select the featured portfolio item to be displayed on top of the page.',
                    'std'         => '',
                    'type'        => 'custom-post-type-select',
                    'rows'        => '',
                    'post_type'   => 'portfolio',
                    'taxonomy'    => '',
                    'class'       => ''
                )

            )
        );

        ot_register_meta_box($page_meta_box);*/

        mo_build_blog_meta_boxes();

        mo_build_team_profile_meta_boxes();

        mo_build_testimonials_meta_boxes();

        mo_build_pricing_plan_meta_boxes();

    }
}

if (!function_exists('mo_build_layout_option_meta_Boxes')) {

    function mo_build_layout_option_meta_Boxes() {

        $post_layouts = mo_get_entry_layout_options();

        $layout_meta_box = array(
            'id' => 'mo_post_layout',
            'title' => 'Post Layout',
            'desc' => '',
            'pages' => array('post'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'id' => 'mo_current_post_layout',
                    'label' => 'Current Post Layout',
                    'desc' => 'Choose the layout for the current post.',
                    'std' => '',
                    'type' => 'select',
                    'rows' => '',
                    'post_type' => '',
                    'taxonomy' => '',
                    'class' => '',
                    'choices' => $post_layouts
                )
            )
        );

        ot_register_meta_box($layout_meta_box);

        $my_sidebars = mo_get_user_defined_sidebars();

        $sidebar_meta_box = array(
            'id' => 'mo_sidebar_options',
            'title' => 'Choose Custom Sidebar',
            'desc' => '',
            'pages' => array('post', 'page'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'id' => 'mo_primary_sidebar_choice',
                    'label' => 'Custom Sidebar Choice',
                    'desc' => 'Custom sidebar for the post/page. <i>Useful if the post/page is not designated as full width.</i>',
                    'std' => '',
                    'type' => 'select',
                    'rows' => '',
                    'post_type' => '',
                    'taxonomy' => '',
                    'class' => '',
                    'choices' => $my_sidebars
                )
            )
        );

        ot_register_meta_box($sidebar_meta_box);
    }
}

if (!function_exists('mo_build_advanced_page_meta_boxes')) {

    function mo_build_advanced_page_meta_boxes() {

        $one_page_meta_box = array(
            'id' => 'mo_one_page_options',
            'title' => 'Single Page Composition',
            'desc' => '',
            'pages' => array('page'),
            'context' => 'side',
            'priority' => 'default',
            'fields' => array(
                array(
                    'label' => 'Choose the Page Sections for display',
                    'id' => 'mo_page_section_select_for_one_page',
                    'type' => 'custom-post-type-checkbox',
                    'desc' => 'Choose the page sections to display if Single Page Site template is chosen for this page. A page built with Single Page Site template will be composed of the below chosen page sections.<br>Consider installing <a href="http://wordpress.org/plugins/post-types-order/" title="Post Types Order Plugin">Post Types Order plugin</a> to specify the order of these page sections for display in the page.',
                    'std' => '',
                    'rows' => '',
                    'post_type' => 'page_section',
                    'taxonomy' => '',
                    'class' => ''
                )
            )
        );

        ot_register_meta_box($one_page_meta_box);

        $menu_array = array(array('value' => 'default',
            'label' => 'Default',
            'src' => ''
        ));

        $menu_items = get_terms('nav_menu', array('hide_empty' => true));
        foreach ($menu_items as $wp_menu) {
            $menu_array[] = array('value' => $wp_menu->slug,
                'label' => $wp_menu->name,
                'src' => ''
            );
        };

        $advanced_page_meta_box = array(
            'id' => 'mo_advanced_page_options',
            'title' => 'Advanced Page Options',
            'desc' => '',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_disable_slider_section',
                    'label' => 'Disable Sliders and Disable Home Page Slider Area Widget',
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => 'Do not display top section for the page with slider or static content if Single Page Site template or Home Page template is chosen for this page.',
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => 'Yes',
                            'src' => ''
                        )
                    )
                ),
                array(
                    'id' => 'mo_custom_primary_navigation_menu',
                    'label' => 'Choose Custom Primary Navigation Menu',
                    'desc' => '',
                    'std' => '',
                    'type' => 'select',
                    'desc' => 'Choose the page specific header navigation menu created using tools in ' . mo_get_menu_admin_url() . '. Useful for one page/single page templates with multiple internal navigation links. Users can choose to any of the custom menu designed in that screen for this page. <br/>Leave "Default" selected to display any global WordPress Menu set by you in ' . mo_get_menu_admin_url() .'.',
                    'choices' => $menu_array
                )

            )
        );

        ot_register_meta_box($advanced_page_meta_box);
    }
}

if (!function_exists('mo_build_blog_meta_boxes')) {

    function mo_build_blog_meta_boxes() {
        $post_meta_box = array(
            'id' => 'mo_post_thumbnail_detail',
            'title' => 'Post Thumbnail Options',
            'desc' => '',
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(

                array(
                    'label' => 'Use Video as Thumbnail',
                    'id' => 'mo_use_video_thumbnail',
                    'type' => 'checkbox',
                    'desc' => 'Specify if video will be used as a thumbnail instead of a featured image.',
                    'choices' => array(
                        array(
                            'label' => 'Yes',
                            'value' => 'Yes'
                        )
                    ),
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => 'Video URL',
                    'id' => 'mo_video_thumbnail_url',
                    'type' => 'text',
                    'desc' => 'Specify the URL of the video (Youtube or Vimeo only).',
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => 'Use Slider as Thumbnail',
                    'id' => 'mo_use_slider_thumbnail',
                    'type' => 'checkbox',
                    'desc' => 'Specify if slider will be used as a thumbnail instead of a featured image or a video.',
                    'choices' => array(
                        array(
                            'label' => 'Yes',
                            'value' => 'Yes'
                        )
                    ),
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),

                array(
                    'label' => 'Images for thumbnail slider',
                    'id' => 'post_slider',
                    'desc' => 'Specify the images to be used a slider thumbnails for the post',
                    'type' => 'list-item',
                    'class' => '',
                    'settings' => array(
                        array(
                            'id' => 'slider_image',
                            'label' => 'Image',
                            'desc' => '',
                            'std' => '',
                            'type' => 'upload',
                            'class' => '',
                            'choices' => array()
                        )
                    )
                )

            )
        );

        ot_register_meta_box($post_meta_box);
    }
}


if (!function_exists('mo_build_entry_header_metaboxes')) {

    function mo_build_entry_header_metaboxes() {
        $header_meta_box = array(
            'id' => 'mo_entry_header_options',
            'title' => 'Header Options',
            'desc' => '',
            'pages' => array('post', 'page', 'portfolio'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_description',
                    'label' => 'Description',
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => 'Enter the description of the page/post. Shown under the entry title.',
                    'rows' => '2'
                ),
                array(
                    'id' => 'mo_entry_title_background',
                    'label' => 'Entry Title Background',
                    'desc' => '',
                    'std' => '',
                    'type' => 'background',
                    'desc' => 'Specify a background for your page/post title and description.'
                ),
                array(
                    'id' => 'mo_entry_title_height',
                    'label' => 'Page/Post Title Height',
                    'desc' => 'Specify the approximate height in pixel units that the entry title area for a page/post occupies along with the background. <br><br> Does not apply when custom heading content is specified. ',
                    'type' => 'text',
                    'std' => '',
                    'rows' => '',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_disable_breadcrumbs_for_entry',
                    'label' => 'Disable Breadcrumbs on this Post/Page',
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => 'Disable Breadcrumbs on this Post/Page. Breadcrumbs can be a hindrance in many pages that showcase marketing content. Home pages and wide layout pages will have no breadcrumbs displayed.',
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => 'Yes',
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($header_meta_box);

        $custom_header_meta_box = array(
            'id' => 'mo_custom_entry_header_options',
            'title' => 'Custom Header Options',
            'desc' => '',
            'pages' => array('post', 'page', 'portfolio'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_custom_heading_background',
                    'label' => 'Custom Heading Background',
                    'desc' => '',
                    'std' => '',
                    'type' => 'background',
                    'desc' => 'Specify a background for custom heading content that replaces the regular page/post title area. Spans entire screen width or maximum available width (boxed layout).'
                ),
                array(
                    'id' => 'mo_custom_heading_content',
                    'label' => 'Custom Heading Content',
                    'desc' => '',
                    'std' => '',
                    'type' => 'textarea',
                    'desc' => 'Enter custom heading content HTML markup that replaces the regular page/post title area. This can be any of these - image, a slider, a slogan, purchase/request quote button, an invitation to signup or any plain marketing material.<br><br>Shown under the logo area. Be aware of SEO implications and <strong>use heading tags appropriately</strong>.',
                    'rows' => '8'
                ),
                array(
                    'id' => 'mo_wide_heading_layout',
                    'label' => 'Custom Heading Content spans entire screen width',
                    'desc' => '',
                    'std' => '',
                    'type' => 'checkbox',
                    'desc' => 'Make the heading content span the entire screen width. While the background graphics or color spans entire screen width for custom heading content, the HTML markup consisting of heading text and content is restricted to the 1140px grid in the center of the window. <br>Choosing this option will make the content span the entire screen width or max available width(boxed layout).<br><strong>Choose this option when when you want to go for a custom heading with maps or a wide slider like the revolution slider in the custom heading area</strong>.',
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => 'Yes',
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($custom_header_meta_box);
    }
}

if (!function_exists('mo_testimonials_meta_boxes')) {
    function mo_build_testimonials_meta_boxes() {
        $testimonials_meta_box = array(
            'id' => 'mo_testimonial_details',
            'title' => 'Testimonial Details',
            'desc' => '',
            'pages' => array('testimonials'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_client_name',
                    'label' => 'Client',
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Enter the name of the client for the testimonial.',
                ),
                array(
                    'id' => 'mo_client_details',
                    'label' => 'Client Details',
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Enter additional details like position, business name, URL etc. for the source of the testimonial.'
                )
            )
        );

        ot_register_meta_box($testimonials_meta_box);
    }
}

if (!function_exists('mo_build_pricing_plan_meta_boxes')) {
    function mo_build_pricing_plan_meta_boxes() {
        $pricing_meta_box = array(
            'id' => 'mo_pricing_details',
            'title' => 'Pricing Plan Details',
            'desc' => '',
            'pages' => array('pricing'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_price_tag',
                    'label' => 'Price Tag',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Enter the price tag for the pricing plan. <strong>HTML is accepted</strong>',
                ),
                array(
                    'id' => 'mo_pricing_tagline',
                    'label' => 'Tagline Text',
                    'desc' => 'Provide any taglines like "Most Popular", "Best Value", "Best Selling", "Most Flexible" etc. that you would like to use for this pricing plan.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_pricing_img',
                    'label' => 'Pricing Image',
                    'desc' => 'Choose the custom image that represents this pricing plan, if any.',
                    'std' => '',
                    'type' => 'upload',
                ),
                array(
                    'id' => 'mo_pricing_url',
                    'label' => 'URL for the Pricing link/button',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Provide the target URL for the link or the button shown for this pricing plan.'
                ),
                array(
                    'id' => 'mo_pricing_button_text',
                    'label' => 'Text for the Pricing link/button',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Provide the text for the link or the button shown for this pricing plan.'
                ),
                array(
                    'id' => 'mo_highlight_pricing',
                    'label' => 'Highlight Pricing Plan',
                    'desc' => 'Specify if you want to highlight the pricing plan.',
                    'std' => '',
                    'type' => 'checkbox',
                    'class' => '',
                    'choices' => array(
                        array(
                            'value' => 'Yes',
                            'label' => 'Yes',
                            'src' => ''
                        )
                    )
                )
            )
        );

        ot_register_meta_box($pricing_meta_box);
    }
}

if (!function_exists('mo_team_profile_meta_boxes')) {
    function mo_build_team_profile_meta_boxes() {
        $team_meta_box = array(
            'id' => 'mo_team_profile_options',
            'title' => 'Team Profile Details',
            'desc' => '',
            'pages' => array('team'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => 'mo_position',
                    'label' => 'Position',
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Enter the position of the team member.',
                ),
                array(
                    'id' => 'mo_email',
                    'label' => 'Email',
                    'desc' => '',
                    'std' => '',
                    'type' => 'text',
                    'desc' => 'Provide email for the team member.'
                ),
                array(
                    'id' => 'mo_twitter',
                    'label' => 'Twitter',
                    'desc' => 'URL of the Twitter page of the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_linkedin',
                    'label' => 'LinkedIn',
                    'desc' => 'URL of the LinkedIn profile of the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_facebook',
                    'label' => 'Facebook',
                    'desc' => 'URL of the Facebook page of the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_dribbble',
                    'label' => 'Dribbble',
                    'desc' => 'URL of the Dribbble profile of the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_googleplus',
                    'label' => 'Google Plus',
                    'desc' => 'URL of the Google Plus page of the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                ),
                array(
                    'id' => 'mo_instagram',
                    'label' => 'Instagram',
                    'desc' => 'URL of the Instagram feed for the team member.',
                    'std' => '',
                    'type' => 'text',
                    'class' => ''
                )
            )
        );

        ot_register_meta_box($team_meta_box);
    }
}

if (!function_exists('mo_get_user_defined_sidebars')) {
    function mo_get_user_defined_sidebars() {
        $my_sidebars = array(
            array(
                'label' => 'Default',
                'value' => 'default'
            )
        );

        $sidebar_list = mo_get_theme_option('mo_sidebar_list');

        if (!empty($sidebar_list)) {
            foreach ($sidebar_list as $sidebar_item) {
                $sidebar = array('label' => $sidebar_item['title'], 'value' => $sidebar_item['id']);
                $my_sidebars [] = $sidebar;
            }
        }

        return $my_sidebars;
    }
}

if (!function_exists('mo_get_menu_admin_url')) {
    function mo_get_menu_admin_url() {
        $menu_admin_url = get_home_url() . '/wp-admin/nav-menus.php';

        $menu_admin_url = '<a href="' . $menu_admin_url . '" title="' . __('Appearances Menu Screen',
                'mo_theme') . '">' . __('Appearances Menu Screen', 'mo_theme') . '</a>';

        return $menu_admin_url;
    }
}