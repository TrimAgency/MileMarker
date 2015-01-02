<?php

/*

Plugin Name: Bootstrap Collapse

Plugin URI: http://www.cloudwark.in/bootstap-collapse-for-wordpress

Description: A Twitter Bootstrap collapse / Accordion plugin for wordpress . 

Version: 1.0.4

Author: Suresh Kumar

Author URI: http://profiles.wordpress.org/sureshdsk/

License: GPL2

    

*/

 



register_activation_hook(__FILE__, 'tbc_install');

register_uninstall_hook(__FILE__, 'tbc_uninstall');



function tbc_install(){

$data1="#21759B";

$data2="#e5e5e5";

$data3="#e5e5e5";

if ( ! get_option('tbc_title_color')){

      add_option('tbc_title_color' , $data1);

    }

else { update_option('tbc_title_color' , $data1); }	

if ( ! get_option('tbc_group_border')){

      add_option('tbc_group_border' , $data2);

    } 

else { update_option('tbc_group_border' , $data2); }	

if ( ! get_option('tbc_inner_border')){

      add_option('tbc_inner_border' , $data3);

    }

else { update_option('tbc_inner_border' , $data3); }		

}

function tbc_uninstall(){

delete_option('tbc_title_color');

delete_option('tbc_group_border');

delete_option('tbc_inner_border');

}



function tbc_menu() {

add_menu_page('Bootstrap Collapse','Bootstrap Collapse', 'administrator', 'tbc-option', 'tbc_disp_control');

}



add_action('admin_menu', 'tbc_menu');



add_action( 'admin_enqueue_scripts', 'tbc_enqueue_color_picker' );

function tbc_enqueue_color_picker( $hook_suffix ) {

    

    wp_enqueue_style('wp-color-picker');

    wp_enqueue_script('bc-script-handle', plugins_url('js/bcpickcolor.js', __FILE__ ), array('wp-color-picker'), false, true );

	

}



function tbc_disp_control(){ 

//settings page



$tbc_title_color = get_option('tbc_title_color');

$tbc_group_border = get_option('tbc_group_border');

$tbc_inner_border = get_option('tbc_inner_border');



//update html

if (isset($_POST['tbc_updatedata'])) {



 update_option('tbc_title_color', $_POST['tbc_title_color']);

 update_option('tbc_group_border', $_POST['tbc_group_border']);

 update_option('tbc_inner_border', $_POST['tbc_inner_border']);

echo '<div id="message" class="updated"><p><strong>';

        echo 'Settings Updated!';

		echo '</strong></p></div>';

		echo "<script>self.location='admin.php?page=tbc-option';</script>";

}

?>

<div id="icon-themes" class="icon32"><br></div>



    <h2>Bootstrap Collapse Settings</h2>



	 <form method="post" action="">



      <table>

<tr><td>Title Color</td> <td> <input type="text" name="tbc_title_color" value="<?php echo $tbc_title_color;?>" class="color-field" /></td> </tr>

<tr><td>Inner Border Color</td> <td> <input type="text" name="tbc_group_border" value="<?php echo $tbc_group_border;?>" class="color-field" /></td> </tr>

<tr><td>Group Border Color</td> <td> <input type="text" name="tbc_inner_border" value="<?php echo $tbc_inner_border;?>" class="color-field" /></td> </tr>

</table>  

            

                 



        <p>

            <input type="hidden" name="tbc_updatedata" value="1" />

            <input type="submit" value="Save" class="button button-primary">

        </p>



    </form> 

<?php

}





function bc_group( $atts, $content = null ) {  

    extract(shortcode_atts(array(  

    'id' => '',

    'class' => ''

    ), $atts));  

	

	$output  = '<div class="accordion '.$class.'"  ';

	

	if(!empty($id))

		$output .= 'id="'.$id.'"';

		

	$output .='>'.do_shortcode($content).'</div>';

	return $output;  

}  

add_shortcode("bc_group", "bc_group");





function bc_collapse($atts, $content = null) {  

    extract(shortcode_atts(array(  

    'id' => '',

    'title' => '',

	'open'=>'n' 

    ), $atts));  



	

	if(empty($id))

		$id = 'accordian_item_'.rand(100,999);

		

	$output = '<div class="accordion-group">

        <div class="accordion-heading">

        <a class="accordion-toggle" data-toggle="collapse" 

        data-parent="#accordion2" href="#'.$id.'">&dArr;&nbsp;'.$title.'</a>

        </div>

         <div id="'.$id.'" class="accordion-body collapse '.($open == 'y' ? 'in' :'').'">

            <div class="accordion-inner">'.do_shortcode($content).'</div>

         </div>

        </div>';  

		

	return $output;

}  



add_shortcode("bc_collapse", "bc_collapse");







function bootstrap_scripts(){

wp_enqueue_script('jquery');

wp_enqueue_script('bootstrapjs',plugin_dir_url(__FILE__) . 'js/bootstrap-collapse.js',array( 'jquery' ));

wp_enqueue_script('bootstrapjst',plugin_dir_url(__FILE__) . 'js/bootstrap-transition.js',array( 'jquery' ));

wp_enqueue_style('bootstrapstyle',plugin_dir_url(__FILE__) . 'css/bootstrap.css');

//wp_register_style('bootstrapCustomCss',plugin_dir_url(__FILE__). 'bootstrapCustomCss.php');

//wp_enqueue_style( 'bootstrapCustomCss');	



}



add_action('wp_enqueue_scripts','bootstrap_scripts');

add_action('wp_enqueue_styles','bootstrap_scripts');

function tbc_custom_styles() {

$tbc_title_color = get_option('tbc_title_color');

$tbc_group_border = get_option('tbc_group_border');

$tbc_inner_border = get_option('tbc_inner_border');

    ?>

	<style type="text/css">

        

.accordion-inner {

  border-top: 1px solid <?php echo $tbc_group_border?>;

  padding: 9px 15px;

}



.accordion-toggle {

  color: <?php echo $tbc_title_color;?> !important;

  cursor: pointer;

}

.accordion-group {

  border: 1px solid <?php echo $tbc_inner_border;?>;

  border-radius: 4px 4px 4px 4px;

  margin-bottom: 2px;

}



    </style><?php

}

add_action( 'wp_head', 'tbc_custom_styles' );



?>