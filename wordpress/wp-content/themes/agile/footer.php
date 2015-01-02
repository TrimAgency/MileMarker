<?php

/**

 * Footer Template

 *

 * The footer template is generally used on every page of your site. Nearly all other

 * templates call it somewhere near the bottom of the file. It is used mostly as a closing

 * wrapper, which is opened with the header.php file. It also executes key functions needed

 * by the theme, child themes, and plugins.

 *

 * @package Agile

 * @subpackage Template

 */

?>



</div><!-- #main .inner -->



<?php mo_exec_action('end_main'); ?>



</div><!-- #main -->



<?php

$sidebar_manager = MO_SidebarManager::getInstance();



if ($sidebar_manager->is_footer_area_active()):

    ?>

    <?php mo_exec_action('before_footer'); ?>



    <footer id="footer">



        <div class="inner">



            <?php mo_exec_action('start_footer'); ?>



            <div id="sidebars-footer" class="clearfix">



                <?php

                mo_exec_action('start_sidebar_footer');



                $sidebar_manager->populate_footer_sidebars();



                mo_exec_action('end_sidebar_footer');

                ?>



            </div>

            <!-- #sidebars-footer -->



            <?php mo_exec_action('end_footer'); ?>



        </div>



    </footer> <!-- #footer -->



    <?php mo_exec_action('after_footer'); ?>



<?php endif; ?>



<footer id="footer-bottom">



    <div class="inner">



        <?php get_template_part('menu', 'footer'); // Loads the menu-footer.php template.    ?>



        <?php mo_footer_content(); ?>



        <?php echo '<a id="go-to-top" href="#" title="' . __('Back to top', 'mo_theme') . '">' . __('Go Top', 'mo_theme') . '</a>'; ?>



    </div>



</footer><!-- #footer-bottom -->



</div><!-- #container -->



<?php mo_exec_action('end_body'); ?>



<?php wp_footer(); // wp_footer    ?>






<!------------------JS for the bottom-to-top text in Semina rOverview----------------------------------->
<script>
//js to check the div is visible on screen or not
function checkVisible( elm, eval ) {
    eval = eval || "visible";
    var vpH = $(window).height(), // Viewport Height
        st = $(window).scrollTop(), // Scroll Top
        y = $(elm).offset().top,
        elementHeight = $(elm).height();
    
    if (eval == "visible") return ((y < (vpH + st)) && (y > (st - elementHeight)));
    if (eval == "above") return ((y < (vpH + st)));
}
</script>


<!--EFFECT FOR SEMNAR SECTION START-->

<script>
//var lmn = jQuery.noConflict();
$( window ).load(function() {
$(window).scroll(function() {
if (checkVisible($('.bottom-to-top-seminar'))) 
{$('.animated').addClass('fadeInUpBig')} 
});
});
</script>





<!--EFFECT FOR SEMNAR SECTION END-->



<!--EFFECT FOR ASK SECTION START-->

<script>
//var lmn = jQuery.noConflict();
$( window ).load(function() {
$(window).scroll(function() {
if (checkVisible($('.bottom-to-top-ask-yourself'))) 
{$('.bottom-ask').addClass('fadeInUpBig')
$('.bottom-ask').addClass('animated')
} 
});
});
</script>

<!--EFFECT FOR ASK SECTION END-->



<!--EFFECT FOR PANNY SECTION START-->

<script>
//var lmn = jQuery.noConflict();
$( window ).load(function() {
$(window).scroll(function() {
if (checkVisible($('#about-2 .button'))) 
{$('#investment-bar').addClass("pullUp");
$('#risk-bar').addClass("pullUp");
} 
});
});
</script>




<!--EFFECT FOR PANNY SECTION END-->



<!--EFFECT FOR OFFERING SECTION START-->

<script>
//var lmn = jQuery.noConflict();
$( window ).load(function() {
$(window).scroll(function() {
if (checkVisible($('#about-3 .button'))) 
{$('.fade').addClass("fadeIn");
 $('.button').addClass("fadeIn");
} 
});
});
</script>


<script>
//var lmn = jQuery.noConflict();
$( window ).load(function() {
$(window).scroll(function() {
if (checkVisible($('#clients'))) 
{$('.blackmen').addClass("clients_visible");
 
} 
});
});
</script>






<script>

(function($) {
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0.03,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 0,  // the number the element should start at
        to: 99.997,  // the number the element should end at
        speed: 1,  // how long it should take to count between the target numbers
        refreshInterval: 1,  // how often the element should be updated
        decimals: 3,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
		
    };
})(jQuery);

jQuery(function($) {
$("#pricing .countdown").mouseenter(
function () { 
if (checkVisible($('.timerdown')))

       $('.timerup').countTo({
            from:0,
            to: 99.997,
            speed: 140,
            refreshInterval:1,
            onComplete: function(value) {
            console.debug(this);
			
            }
        });
    });
	
  });


</script>


<script>

(function($) {
    $.fn.countTo = function(options) {
        // merge the default plugin settings with the custom options
        options = $.extend({}, $.fn.countTo.defaults, options || {});

        // how many times to update the value, and how much to increment the value on each update
        var loops = Math.ceil(options.speed / options.refreshInterval),
            increment = (options.to - options.from) / loops;

        return $(this).each(function() {
            var _this = this,
                loopCount = 0.03,
                value = options.from,
                interval = setInterval(updateTimer, options.refreshInterval);

            function updateTimer() {
                value += increment;
                loopCount++;
                $(_this).html(value.toFixed(options.decimals));

                if (typeof(options.onUpdate) == 'function') {
                    options.onUpdate.call(_this, value);
                }

                if (loopCount >= loops) {
                    clearInterval(interval);
                    value = options.to;

                    if (typeof(options.onComplete) == 'function') {
                        options.onComplete.call(_this, value);
                    }
                }
            }
        });
    };

    $.fn.countTo.defaults = {
        from: 100,  // the number the element should start at
        to: 0.003,  // the number the element should end at
        speed: 1,  // how long it should take to count between the target numbers
        refreshInterval: 1,  // how often the element should be updated
        decimals: 3,  // the number of decimal places to show
        onUpdate: null,  // callback method for every time the element is updated,
        onComplete: null,  // callback method for when the element finishes updating
    };
})(jQuery);

jQuery(function($) {

$("#pricing .countdown").mouseenter(
function () {
if (checkVisible($('.timerdown')))
        $('.timerdown').countTo({
            from: 100,
            to: 0.003,
            speed: 140,
            refreshInterval: 1,
            onComplete: function(value) {
                console.debug(this);
            }
        });
    });

});


</script>

<script src="<?php bloginfo('stylesheet_directory')?>/js/tabcontent.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory')?>/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
jQuery(window).load(function() {
	jQuery('.flexslider').flexslider({
	  animation: "slide",              //String: Select your animation type, "fade" or "slide"
	  directionNav: true, //Boolean: Create navigation for previous/next navigation? (true/false)
	  controlNav: false  //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
	});
});
</script>	


<?php 
   
    $iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
   
    if(  $iPhone ){ ?>
        <style type="text/css">
         @media only screen and (max-width: 479px)

 {
 
 div#welcome {height: 5vh;}
    }
	
	
	@media only screen and (min-width: 480px) and (max-width: 767px) 
	
	 {
 
 div#welcome {height: 5vh;}
    }


        </style>
    <?php }
?>

<!--EFFECT FOR OFFERING SECTION END-->

<!------------------------------Style for the 100% height of the top section--------------------------->
<style type="text/css">

#primary-menu .hover-bg {border:none!important;}
#primary-menu > ul.menu > li > a:hover{ color:#ad8763!important;}
/*----- Tabs -----*/



.single-page-template .type-page_section .edit-button {
    display: none!important;
   
}




.tabs {
    float: left;
   
    list-style: none outside none;
    margin: 0 !important;
    padding: 0;
    position: relative;
    top: 60px;
    z-index: 99;
}

.tabs a {
    background: url("http://www.pe-primer.com/wp-content/uploads/2014/07/greyball.png") no-repeat;
    border:none!important;
    color: #000 !important;
    display: block;
    height: 24px;
    margin: 0;
    padding: 4px 20px;
    position: relative;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
}



.tabs a.current {
    background: url("http://www.pe-primer.com/wp-content/uploads/2014/07/whiteball.png") no-repeat;
    border:none;
    color: #000 !important;
    cursor: default !important;
}



/*
.tabs {
    display: none;
    list-style: none outside none;
    margin: 0 !important;
    padding: 0;
}*/

</style>

</body>
</html>