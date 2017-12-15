$(function(){	
	/////////////////////////////////////////////时间会给我答案/////////////////////////////////////////////
	//时间轴
	var n = 6;//年数
	var m ;//刻度
	var y = [2017,2016,2015,2013,2009,2007];//具体年
	var activeYear = 2;
	var openClick = true;
	var seconds = 20;//毫秒
	m = parseInt(1152/((n-1)*10));
	for(var i=0;i<n-1;i++)
	{
		for(var j=0;j<m;j++)
		{
			if(j==0)
			{
				
				if(i==activeYear)
				{
					$('.loadBar').append('<div class="floatl longR"><div index='+i+' class="year"><p>'+y[i]+'</p></div></div>');
				}else{
					$('.loadBar').append('<div class="floatl longB"><div index='+i+' class="year"><p>'+y[i]+'</p></div></div>');
				}
			}else{
				$('.loadBar').append('<div class="floatl shortB"></div>');
			}	
		}
	}
	if(i==(n-1)){
		$('.loadBar').append('<div class="floatl longB" style="margin-right:0px"><div index='+i+' class="year"><p>'+y[i]+'</p></div></div><div class="clearl"></div>');
		$('.loadBar').width(($('.loadBar').children('div').length-2)*10+1);
		$('.loadBar').css('margin','0 auto');
	}
	$('.year').click(function(){
		console.log(1);
		if(openClick==true&&$(this).attr('index')!=activeYear)
		{
			var self = $(this);
			var indexActive = $(this).attr('index');
			openClick=false;
			if($(this).attr('index')>activeYear){
				var count = m*($(this).attr('index')-activeYear);
				var startIndex = m*activeYear;
				var time = 1;
				var cTween; 
				cTween = setInterval(function(){
					if(time-1==count)
					{
						clearInterval(cTween);						
						for(var i=0;i<n;i++)
						{
							$('.loadBar').children('div').eq(i*m).removeClass('longR');	
							$('.loadBar').children('div').eq(i*m).addClass('longB');
						}
						self.parent('.floatl').removeClass('longB');
						self.parent('.floatl').addClass('longR');
						activeYear = indexActive;
						openClick=true;
					}else{
						$('.loadBar').children('div').eq(startIndex+time-1).css('background-color','#888888');
						$('.loadBar').children('div').eq(startIndex+time).css('background-color','#a51e32');
						time++;				
					}				
				},seconds);
			}else if($(this).attr('index')<activeYear){
				var count = m*(activeYear-$(this).attr('index'));
				var startIndex = m*activeYear;
				var time = 1;
				var cTween; 	
				cTween = setInterval(function(){
					if(time-1==count)
					{
						clearInterval(cTween);
						for(var i=0;i<n;i++)
						{
							$('.loadBar').children('div').eq(i*m).removeClass('longR');	
							$('.loadBar').children('div').eq(i*m).addClass('longB');
						}
						self.parent('.floatl').removeClass('longB');
						self.parent('.floatl').addClass('longR');
						activeYear = indexActive;
						openClick=true;
					}else{
						$('.loadBar').children('div').eq(startIndex-time+1).css('background-color','#888888');
						$('.loadBar').children('div').eq(startIndex-time).css('background-color','#a51e32');
						time++;				
					}				
				},seconds);
			}
			
		}
	});
	/////////////////////////////////////////////时间会给我答案/////////////////////////////////////////////
});