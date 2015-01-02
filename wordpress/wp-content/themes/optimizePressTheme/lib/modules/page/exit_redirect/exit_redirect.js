;(function($){
	var exit_disabled = false;
	$(document).ready(function(){
		var els = document.getElementsByName('form');
		for(var i=0,il=els.length;i<il;i++){
			if(!els[i].onclick){
				els[i].onclick = function(){
					exit_disabled = true;
				};
			} else if(!els[i].onsubmit){
				els[i].onsubmit = function(){
					exit_disabled = true;
				};
			}
		};
		els = document.getElementsByName('a');
		for(var i=0,il=els.length;i<il;i++){
			$(els[i]).click(function(){
				exit_disabled = false;
				if($(this).attr('target') != '_blank'){
					exit_disabled = true;
				}
			});
		};

		//Don't trigger exit redirect if user clicks on button or submits a form.
		$('body').on('submit', 'form', function () {
			exit_disabled = true;
		});
		$('body').on('click', '.css-button,	a, [class^="button-style"], button', function () {
			exit_disabled = true;
		});
	});
	$(window).bind('beforeunload',unload_event);
	function unload_event(e){
		if(exit_disabled === false){
			if($.browser.mozilla && version_compare($.browser.version,'4.0')){
				window.alert(OP.exit_redirect_message);
			}
			if(e){
				e.returnValue = OP.exit_redirect_message;
			}
			load_iframe();
			return OP.exit_redirect_message;
		}
	};
	function load_iframe(){
		$(window).unbind('beforeunload',unload_event);
		var div = $('<div />'),
			attrs = {
				display: 'block',
				position: 'absolute',
				width: '100%',
				height: '100%',
				zIndex: '99999',
				top: '0',
				left: '0'
			},
			url = OP.exit_redirect_url;
		if(url.indexOf('?') < 0){
			url += '?';
		}
		url += 'op_exit_redirect=true';
		div.css(attrs).html('<iframe src="'+url+'" width="100%" height="100%" frameborder="0"></iframe>');
		$('body').html('').css('margin','0 !important').append(div);
	};
	function version_compare(a,b){
		if(a === b){
			return 0;
		}
		a = a.split('.');
		b = b.split('.');
		for(var i=0,len=Math.min(a.length,b.length);i<len;i++){
			if(parseInt(a[i]) > parseInt(b[i]))
				return 1;
			if(parseInt(a[i]) < parseInt(b[i]))
				return -1;
		}
		if(a.length > b.length)
			return 1;
		if(a.length < b.length)
			return -1;
		return 0;
	};
}(opjq));