;(function($){
	$(document).ready(function(){
		var el = $('.op_live_editor .op-pagebuilder, .op_page_builder .op-pagebuilder,#toplevel_page_optimizepress a[href$="page=optimizepress-page-builder"],#op-pagebuilder-container a.op-pagebuilder, form.op-bsw-settings a.op-pagebuilder'),
			defaults = {
				width: '98%',
				height: '98%',
				padding: 0,
				//minWidth: 900,
				//minHeight: 600,
				closeClick: false,
				type: 'iframe',
				beforeShow: function() {
					$.fancybox.showLoading();
					setTimeout(function() {$.fancybox.hideLoading();}, 2000);

					//This is necessary in order to hide the parent fancybox scrollbars and close button
					$('html').css({
						overflow: 'hidden',
						height: '100%'
					});
					$(window.parent.document).find('.fancybox-close').css({ display: 'none' });
				},
				afterShow: function () {
					$('.fancybox-opened').find('iframe').focus();
				},
				beforeClose: function(){
					if (!OP.disable_alert) {
						return confirm(OptimizePress.pb_unload_alert);
					}
					OP.disable_alert = false;
				},
				afterClose: function(){
					//This is necessary in order to hide the parent fancybox scrollbars and close button
					$('html').css({
						overflow: 'auto'
					});
					$(window.parent.document).find('.fancybox-close').css({ display: 'block' });
					/*
					 * If user is on the pages list screen, it will refresh his page (so he'll be able to view his newly created page)
					 */
					if (window.location.pathname.indexOf('wp-admin/edit.php') >= 0 && window.location.search.indexOf('post_type=page') >= 0
					&& typeof window.OP.reload_page !== 'undefined' && window.OP.reload_page === true) {
						setTimeout(function () {
							window.location = window.location.href;
						}, 0);
					}
				}
			};
		el.fancybox(defaults);

		$('body.widgets-php').find('#available-widgets #widget-list .widget .widget-description').each(function(){
			$(this).html($(this).text());
		});

		/*
		 * This is a fix for missing ready.promise() on jQuery 1.7.2
		 */
		$.Deferred(function(defer) {
		    $(defer.resolve);
		    $.ready.promise = defer.promise;
		});

		/**
		 * Tabbed module
		 * Related to /lib/tpl/generic/tabbed_module.php
		 * It needs to be triggered after all event listeners in document are already set, that's why it's in $.ready.promise()
		 */
		$.ready.promise().done(function() {
			if (window.location.hash) {
				var hash = window.location.hash.split('--');
				$tab = $('.op-bsw-grey-panel-tabs a[href="' + hash[0] + '"]');//$('.tab-' + window.location.hash);
				if ($tab.length > 0) {
					$tab.trigger('click');
					if (hash.length == 2) {
						$provider = $('.tab-' + hash[0].substring(1) + ' .section-' + hash[1] + ' .op-bsw-grey-panel-header h3 a');
						$provider.trigger('click');
					}
				}
			}
		});
	});

}(opjq));
