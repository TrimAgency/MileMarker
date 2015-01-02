/**
 * Create an alias version of jQuery for OptimizePress purpuses
 * (to handle conflict and inconsistencies with plugins and themes that use different version od jQuery)
 */

//Check jQuery Version
//jQuery.fn.jquery;

(function () {

	if (jQuery && !window.opjq) {
		var jQueryVersion = jQuery.fn.jquery;
		var jQueryVersionMajor;
		var jQueryVersionMinor;

		jQueryVersion = jQueryVersion.replace(/(\d+\.\d+).+/i, '$1');
		jQueryVersion = jQueryVersion.split(/\./gi);

		jQueryVersionMajor = jQueryVersion[0];
		jQueryVersionMinor = jQueryVersion[1];

		//console.error('jQueryVersion', jQueryVersionMajor + '.'+ jQueryVersionMinor);
		if (jQueryVersionMajor < 1 || jQueryVersionMinor < 8 && console && console.error) {
			console.error("Currently is loaded jQuery version " + jQuery.fn.jquery + " which is too low for OptimizePress. Please check if you're using WordPress version 3.5 or higher or contact customer support.");
		}

		window.opjq = jQuery.noConflict();
		//console.log('OP version initiated: ' + opjq.fn.jquery);
	}

	window.checkJqueryVersion = function() {
		console.log('jQuery: ' + jQuery.fn.jquery, 'opjq: ' + opjq.fn.jquery);
		if (jQueryVersionMajor < 1 || jQueryVersionMinor < 8 && console && console.error) {
			console.error("Currently is loaded jQuery version " + jQuery.fn.jquery + " which is too low for OptimizePress. Please check if you're using WordPress version 3.5 or higher or contact customer support.");
		}
	}
	//checkJqueryVersion();

	window.loadOldjQueryVersion = function (version) {
		var version = '1.3.2' || version;
		var jQuery = document.createElement("script");
		jQuery.src = "//ajax.googleapis.com/ajax/libs/jquery/" + version + "/jquery.min.js";
		document.body.appendChild(jQuery);
	}

	window.deleteJquery = function () {
		delete $;
		delete jQuery;
	}

}());