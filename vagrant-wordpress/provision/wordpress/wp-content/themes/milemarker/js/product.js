/**
 * Created by HansHeiberg on 11/12/14.
 */

$(document).ready(function() {

    /* timeup */
    $('.winch').counterUp();

    /* fancybox */
    $(".fancybox").fancybox({
        autoSize: true,
        padding: 0,
        margin: 20,
        aspectRatio: true,
        helpers: {
            title : {
                type : 'outside'
            },
            overlay : {
                speedOut : 0
            }
        }
    });
	
	animation();

});

function animation() {
	var controller = new ScrollMagic();
    new ScrollScene({offset: 267, triggerElement: "#gator_start_trigger", duration: 1300, triggerHook: 1})
        .setPin("#gator_rope_winch")
        .addTo(controller)
        .on("progress", function (e) {
            $('#gator_rope').css('height', 1300 * e.progress.toFixed(3));
        });

    new ScrollScene({offset: 266, triggerElement: "#trade_start_trigger", duration: 1300, triggerHook: 1})
        .setPin("#trade_rope_winch")
        .addTo(controller)
        .on("progress", function (e) {
            $('#trade_rope').css('height', 1300 * e.progress.toFixed(3));
        });

     new ScrollScene({offset: 580, triggerElement: "#gator_sec1", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec1", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec2", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec2", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec3", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec3", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#gator_sec4", triggerHook: 1}).setTween(TweenMax.fromTo("#gator_sec4", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec1", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec1", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec2", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec2", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec3", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec3", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
     new ScrollScene({offset: 580, triggerElement: "#trade_sec4", triggerHook: 1}).setTween(TweenMax.fromTo("#trade_sec4", 0.5, {"opacity": 0}, {"opacity": 1})).addTo(controller);
}

