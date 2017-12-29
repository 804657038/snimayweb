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
	for(var i=0;i<6;i++)
	{
		$('.btBox').eq(i).animate({"margin-left":0,"opacity":1},400*(i+1));
	}
	function getProvince(target,label){
		/* 
		 * target为父级
		 * label为装子级的东西
		 */
		var html = "";
		html += '<div class="proviceBox"><p>省份</p>';
		html+= '<div class="list"><div class="lLeft floatl"><p>A-G</p></div><div class="lRight  floatl lr1"></div></div><div class="clearl"></div>';
		html+= '<div class="list"><div class="lLeft floatl"><p>H-K</p></div><div class="lRight  floatl lr2"></div></div><div class="clearl"></div>';
		html+= '<div class="list"><div class="lLeft floatl"><p>L-S</p></div><div class="lRight  floatl lr3"></div></div><div class="clearl"></div>';
		html+= '<div class="list"><div class="lLeft floatl"><p>T-Z</p></div><div class="lRight  floatl lr4"></div></div><div class="clearl"></div>';
		html +=	'</div>';
		$(target).append(html);
		for(var i=0;i<citys.length;i++)
		{
			switch(i)
			{
				case 0:
				case 3:
				case 13:
				case 15:
				case 18:
				case 19:
				case 23:
				case 27:
				case 32:
					$('.lr1').append('<div class="floatl"><a href="###" c='+i+'>'+citys[i].n+'</a></div>');
				break;
				case 4:
				case 6:
				case 8:
				case 9:
				case 11:
				case 16:
				case 17:
				case 20:
				case 21:
				case 33:
					$('.lr2').append('<div class="floatl"><a href="###" c='+i+'>'+citys[i].n+'</a></div>');
				break;
				case 1:
				case 5:
				case 7:
				case 10:
				case 12:
				case 21:
				case 26:
				case 28:
				case 29:
					$('.lr3').append('<div class="floatl"><a href="###" c='+i+'>'+citys[i].n+'</a></div>');
				break;
				case 2:
				case 14:
				case 24:
				case 25:
				case 30:
				case 31:
				
					$('.lr4').append('<div class="floatl"><a href="###" c='+i+'>'+citys[i].n+'</a></div>');
				break;
			}
			
		}
		$('.proviceBox a').click(function(){
			$(target).children(label).html($(this).html());
			$('.proviceBox').remove();
			$(target).addClass('zjProvice');
			$(target).attr('provice',$(this).attr('c'));
		});
	}
	$('.area1>p').click(function(){
		$('.proviceBox').remove();
		$('.area1').removeAttr('provice');
		$('.area2').removeAttr('city');
		$('.area3').removeAttr('area');
		getProvince('.area1','p');
		if($(window).height()-($(this).offset().top-$(window).scrollTop())>=($('.proviceBox').height()+20))
		{
			$('.proviceBox').css('top','65px');
		}else if($(this).offset().top-$(window).scrollTop()>($('.proviceBox').height()+20)){
			$('.proviceBox').css('top',-($('.proviceBox').height()+20)+'px');
		}
		if($(window).width()-$(this).offset().left>=($('.proviceBox').width()+10)){
			$('.proviceBox').css('left','0px');
		}else if($(window).width()-$(this).offset().left<($('.proviceBox').width()+10)){
			$('.proviceBox').css('left',($(this).width()-$('.proviceBox').width())+'px');
		}
		$(this).html("请选择省");
		$('.area2>p').html("请选择市");
		$('.area3>p').html("请选择区");		
	});
	$('.area2>p').click(function(){
		$('.area2').removeAttr('city');
		$('.area3').removeAttr('area');
		$('.proviceBox').remove();
		getCity('.area2','p');
		if($(window).height()-($(this).offset().top-$(window).scrollTop())>=($('.proviceBox').height()+20))
		{
			$('.proviceBox').css('top','65px');
		}else if($(this).offset().top-$(window).scrollTop()>($('.proviceBox').height()+20)){
			$('.proviceBox').css('top',-($('.proviceBox').height()+20)+'px');
		}
		if($(window).width()-$(this).offset().left>=($('.proviceBox').width()+10)){
			$('.proviceBox').css('left','0px');
		}else if($(window).width()-$(this).offset().left<($('.proviceBox').width()+10)){
			$('.proviceBox').css('left',($(this).width()-$('.proviceBox').width())+'px');
		}
		$(this).html("请选择市");
		$('.area3>p').html("请选择区");
	});
	$('.area3>p').click(function(){
		$('.area3').removeAttr('area');
		$('.proviceBox').remove();
		$(this).html("请选择区");
		getArea('.area3','p');
		if($(window).height()-($(this).offset().top-$(window).scrollTop())>=($('.proviceBox').height()+20))
		{
			$('.proviceBox').css('top','65px');
		}else if($(this).offset().top-$(window).scrollTop()>($('.proviceBox').height()+20)){
			$('.proviceBox').css('top',-($('.proviceBox').height()+20)+'px');
		}
		if($(window).width()-$(this).offset().left>=($('.proviceBox').width()+10)){
			$('.proviceBox').css('left','0px');
		}else if($(window).width()-$(this).offset().left<($('.proviceBox').width()+10)){
			$('.proviceBox').css('left',($(this).width()-$('.proviceBox').width())+'px');
		}
	});
	function getCity(target,label){
		var html = "";
		html += '<div class="proviceBox"><p>市</p>';
		html+= '<div class="list"><div class="lLeft floatl"><p>A-G</p></div><div class="lRight  floatl lr"></div></div><div class="clearl"></div>	</div>';
		html +=	'</div>';
		$(target).append(html);
		$('.proviceBox').width(500);
		$('.proviceBox .lLeft').remove();
		var index = $('.zjProvice').attr('provice');
		if(typeof index == 'undefined'){
			$('.lr').prepend('<div class="floatl" style="width:100%"><a href="###">'+"请先选择省份"+'</a></div>');
			$('.proviceBox a').click(function() {
				$('.proviceBox').remove();
			});
		}else{
			if(index < 4) {
				$('.lr').append('<div class="floatl"><a href="###" c='+i+'>' + citys[index].n + '</a></div>');
			} else if(index < 34) {
				for(var i = 0; i < citys[index].c.length; i++) {
					$('.lr').prepend('<div class="floatl"><a href="###" c='+i+'>' + citys[index].c[i].n + '</a></div>');
				}
			};
			$('.lr1').append('<div class="clearl">');
			$('.proviceBox a').click(function() {
				$(target).children(label).html($(this).html());
				$('.proviceBox').remove();
				$(target).addClass('zjCity');
				$(target).attr('city', $(this).attr('c'));
			});
		} 
	}
	function getArea(target,label){
		var html = "";
		html += '<div class="proviceBox"><p>区</p>';
		html+= '<div class="list"><div class="lLeft floatl"><p>A-G</p></div><div class="lRight  floatl lr"></div></div><div class="clearl"></div>	</div>';
		html +=	'</div>';
		$(target).append(html);
		$('.proviceBox').width(500);
		$('.proviceBox .lLeft').remove();
		var indexp = $('.zjProvice').attr('provice');
		var indexc = $('.zjCity').attr('city');
		if(typeof indexc == 'undefined' || typeof indexp == 'undefined' ){
			$('.lr').prepend('<div class="floatl" style="width:100%"><a href="###">'+"请先选择省区或市区"+'</a></div>');
			$('.proviceBox a').click(function() {
				$('.proviceBox').remove();
			});
		}else{
			if(indexp < 4) {
				for(var i=0;i<citys[indexp].c.length;i++)
				{
					$('.lr').append('<div class="floatl"><a href="###" c='+i+'>' + citys[indexp].c[i].n + '</a></div>');
				}
				
			} else if(indexp < 34) {
				for(var i = 0; i < citys[indexp].c[indexc].a.length; i++) {
					$('.lr').prepend('<div class="floatl"><a href="###" c='+i+'>' + citys[indexp].c[indexc].a[i] + '</a></div>');
				}
			};
			$('.lr1').append('<div class="clearl">');
			$('.proviceBox a').click(function() {
				$(target).children(label).html($(this).html());
				$('.proviceBox').remove();
				$(target).attr('area', $(this).attr('c'));
			});
		} 
	}
	//查看更多类型
	$('.moreType').click(function(){
		if($(this).attr('isOpen')=='true')
		{
			$(this).attr('isOpen','false');
			$('.typeBox').stop().animate({'height':'58px'},500);
		}else{
			$(this).attr('isOpen','true');
			$('.typeBox').stop().animate({'height':$(this).siblings('.typeList').height()+20+'px'},500);
		}
		
	});
	//选择类型
	$('.typeList button').click(function(){
		$('.btnActive').removeClass('btnActive');
		$(this).addClass('btnActive');
	});
});

layui.use([ 'layer'], function () {
	var layer = layui.layer,$ = layui.jquery;
});

var is_post = 0;
//我要定制
function add_order() {
    var url = img_path+"index.php/book_order";
    var data = {};
    $('.types').each(function(){
        if($(this).find('button').hasClass('btnActive')){
            data.type=$(this).find('button').text();
        }
    });
    data.username = $("#name").val();
    data.phone = $("#phone").val();
    var province = $(".area1").find('p').text();
    var city = $(".area2").find('p').text();
    var area = $(".area3").find('p').text();
    data.J_Address = province+' '+city+' '+area+' ';
    is_post++;
    layer.load(1);
    if (is_post == 1) {
        $.post(url, data, function(res) {
            layer.closeAll();
            if (res.code == 1) {
                popWindow("信息提醒","Information to remind","您的留言已经提交成功。",'感谢您对诗尼曼的支持！');
            } else {
                layer.msg(res.info,{time: 3000});
                is_post = 0;
            }
        }, 'json');
    } else {
        layer.msg("请不要重复提交", {time: 1000});
        layer.closeAll();
    }
}
