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
function popWindow(titleCH,titleE,text1,text2){
	/*
	 * titleCH  中文标题
	 * titleE   英文标题
	 * text1    提示内容1
	 * text2    提示内容2 
	 */
	var html = "";
	html += '<div id="popNormal"><div class="popIn"><div class="popBox"><div class="bigTitle"><ul><li>';
	html += '<p class="bt">'+titleCH+'</p></li><li><p class="st">'+titleE+'</p></li><li><span></span>';
	html += '</li></ul></div><div class="popTitle"><ul><li><p>'+text1+'。</p><p>'+text2+'</p></li>';
	html += '<li><p class="popTips">弹窗将在<span>3</span>秒钟后自动关闭</p></li>'
	html += '</ul></div><div class="poPclose"><a href="###"><img src="img/redCrocss.png"/></a></div></div></div></div>';

	$('body').append(html);
	var time = 2;
	var popTween = setInterval(function(){
		$('.popTips span').text(time);
		time--;
		if(time==-1)
		{
			clearInterval(popTween);
			$('#popNormal').fadeOut(500).remove();
		}
	},1000);
	$('.poPclose a').click(function(){
		$('#popNormal').fadeOut(500).remove();
		clearInterval(popTween);
	});
}
