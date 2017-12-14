$(function(){
	//微信特效
	$('.wechat').mousemove(function(){
		$(this).find('.wtBox').show();
		$(this).find('.wtBox').addClass('animated flipInX')
	});
	$('.wechat').mouseout(function(){
		$(this).find('.wtBox').hide();
		$(this).find('.wtBox').removeClass('animated flipInX');
	});
	//出现回到顶部按钮
	$(window).scroll(function(){
		if($(window).scrollTop()>0){
			$('#goToTop').slideDown();
		}else{
			$('#goToTop').slideUp();
		}
		
	});
	//回到顶部
	$('#goToTop a').click(function(){
		$('html,body').animate({  
            scrollTop: 0
        }, 500); 
	});
});