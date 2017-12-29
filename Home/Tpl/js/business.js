$(function(){
	//空间选择
	$('.room').find('a').click(function(){
		$('.room').find('a').removeClass('clActive');
		$(this).addClass('clActive');
		var cat_id = $(this).attr('catid');//分类ID

		var index = $(this).attr('index');
		var html = "";
		html += '<div class="hasChoice rchoice"><p>'+$(this).find('p').html()+'</p><a href="javascript:;" class="rclose'+index+'" index='+index+'></a></div>';
		if($('.rchoice').length == 0)
		{		
			$('.all').append(html);
		}else{
			var rindex = $('.rchoice').find('a').attr('index');
			$('.rchoice').find('a').removeClass('close'+rindex);
			$('.rchoice').find('p').html($(this).find('p').html());
			$('.rchoice').find('a').addClass('close'+index);
			$('.rchoice').find('a').attr('index',index);
		}
		$('.rclose'+index).click(function(){
			$('.rchoice').animate({'width':'0%','padding':'0%'},400,function(){
				$(this).remove();
			});
			$('.room').find('.cl'+$(this).attr('index')).removeClass('clActive');
		});
	});



	//类型选择
	$('.style').find('a').click(function(){
		$('.style').find('a').removeClass('clActive');
		$(this).addClass('clActive');
        var cat_id = $(this).attr('catid');//分类ID
		
		var index = $(this).attr('index');
		var html = "";
		html += '<div class="hasChoice tchoice"><p>'+$(this).find('p').html()+'</p><a href="javascript:;" class="tclose'+index+'" index='+index+'></a></div>';
		if($('.tchoice').length == 0)
		{		
			$('.all').append(html);
		}else{
			var lindex = $('.tchoice').find('a').attr('index');
			$('.tchoice').find('a').removeClass('close'+lindex);
			$('.tchoice').find('p').html($(this).find('p').html());
			$('.tchoice').find('a').addClass('close'+index);
			$('.tchoice').find('a').attr('index',index);
		}
		$('.tclose'+index).click(function(){
			$('.tchoice').animate({'width':'0%','padding':'0%'},400,function(){
				$(this).remove();
			});
			console.log($(this).attr('index'));
			$('.style').find('.cl'+$(this).attr('index')).removeClass('clActive');
		});
	});
	//系列选择
	$('.series').find('a').click(function(){
		$('.series').find('a').removeClass('clActive');
		$(this).addClass('clActive');
        var cat_id = $(this).attr('catid');//分类ID
		
		var index = $(this).attr('index');
		var html = "";
		html += '<div class="hasChoice schoice"><p>'+$(this).find('p').html()+'</p><a href="javascript:;" class="sclose'+index+'" index='+index+'></a></div>';
		if($('.schoice').length == 0)
		{		
			$('.all').append(html);
		}else{
			var sindex = $('.schoice').find('a').attr('index');
			$('.schoice').find('a').removeClass('close'+sindex);
			$('.schoice').find('p').html($(this).find('p').html());
			$('.schoice').find('a').addClass('close'+index);
			$('.schoice').find('a').attr('index',index);
		}
		$('.sclose'+index).click(function(){
			$('.schoice').animate({'width':'0%','padding':'0%'},400,function(){
				$(this).remove();
			});
			$('.series').find('.cl'+$(this).attr('index')).removeClass('clActive');
		});
	});
});


function details(id) {
    window.location.href = img_path+"index.php/getGoodsDetail?id="+id;
}
