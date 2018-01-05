$(function(){
	$('.mbRight').height($('.mbLeft').height());
	//开启滑动动画
	if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
		(function() {
			window.scrollReveal = new scrollReveal({
				reset: true
			});
		})();
	};
});