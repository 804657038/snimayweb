$(function(){
	//步骤循环
	var step = 1;
	$('.stepChild').eq(0).addClass('scActive');
	$('.stepChild').eq(0).find('.spl').css('background-position-y','-66px');
	var stepTween;
	stepTween = setInterval(function(){
		if(step-1<0)
		{
			$('.stepChild').eq(2).removeClass('scActive');
			$('.stepChild').eq(2).find('.spl').css('background-position-y',-132*2+'px');
		}else{
			$('.stepChild').eq(step-1).removeClass('scActive');
			$('.stepChild').eq(step-1).find('.spl').css('background-position-y',-132*(step-1)+'px');
		}
		
		$('.stepChild').eq(step).addClass('scActive');
		$('.stepChild').eq(step).find('.spl').css('background-position-y',-66-132*step+'px');
		if(++step==3)
		{
			step = 0;
		}
	},4000);
});
