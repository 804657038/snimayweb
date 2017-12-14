$(function(){
	//打开更多
	$('.short p').click(function(){
		if($(this).attr('isOpen')=='false')
		{
			$(this).attr('isOpen',true);
			$(this).siblings('.profess').stop().slideDown();
			$(this).siblings('img').stop().css('transform','rotate(180deg)');
		}else{
			$(this).attr('isOpen',false);
			$(this).siblings('.profess').slideUp();
			$(this).siblings('img').stop().css('transform','rotate(0deg)');
		}
	});
	$('.short').mouseleave(function(){
		$(this).children('p').attr('isOpen',false);
		$(this).children('p').siblings('.profess').slideUp();
		$(this).children('p').siblings('img').stop().css('transform','rotate(0deg)');
	});
	$('.profess ul li').click(function(){
		$(this).parents(".short").children('p').text($(this).children('p').text());
		$(this).parents(".short").children('p').attr('isOpen',false);
		$(this).parents(".short").children('p').siblings('.profess').slideUp();
		$(this).parents(".short").children('p').siblings('img').stop().css('transform','rotate(0deg)');
	});
	//查看详情
	$('.rc').click(function(){
		$('.jobBox').hide();
		$('.jobDetails').show();
		$('.jobDetails').addClass('animated bounceInDown');
	});
	$('.rBtn button').click(function(){
		$('.jobBox').show();
		$('.jobDetails').hide();
		$('.jobBox').addClass('animated bounceInUp');
	});
	//选择文件
	$('.upBtnBox input').change(function(){
		if($(this).val()=="")
		{
			$(this).parent('.upBtnBox').siblings('span').text("未选择文件");
		}else{
			$(this).parent('.upBtnBox').siblings('span').text($(this).val());
		}
	});
	//关闭
	$('.close a').click(function(){
		$('#pop').hide();
	})
	//立即申请
	$('.tdBtn button').click(function(){
		$('#pop').show();
		$('.pop').addClass('animated bounceInDown');
	});
});
