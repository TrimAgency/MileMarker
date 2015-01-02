/*
 Plugin: jQuery Parallax
 Version 1.1.3
 Author: Ian Lunn
 Twitter: @IanLunn
 Author URL: http://www.ianlunn.co.uk/
 Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
 */

(function ($) {
    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallax = function (xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;

        //get the starting position of each element to have parallax applied to it
        function update() {

            if (outerHeight) {
                getHeight = function (jqo) {
                    return jqo.outerHeight(true);
                };
            } else {
                getHeight = function (jqo) {
                    return jqo.height();
                };
            }

            // setup defaults if arguments aren't specified
            if (arguments.length < 1 || xpos === null) xpos = "50%";
            if (arguments.length < 2 || speedFactor === null) speedFactor = 0.5;
            if (arguments.length < 3 || outerHeight === null) outerHeight = true;

            // function to be called whenever the window is scrolled or resized

            var scrollbar_pos = $window.scrollTop();

            $this.each(function () {
                var $element = $(this);
                var element_top = $element.offset().top;
                var element_height = getHeight($element);

                // Check if totally above or totally below viewport
                if (element_top + element_height < scrollbar_pos || element_top > scrollbar_pos + windowHeight) {
                    return;
                }

                var ypos = element_top - scrollbar_pos;
                var speed = $element.data("parallax-speed");
                if (speed === null)
                    speed = speedFactor;

                $element.css('backgroundPosition', xpos + " " + Math.round(ypos * speed) + "px");

            });
        }

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);