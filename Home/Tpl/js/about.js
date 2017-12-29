$(function(){
	//打开更多
	var open  = true;
	$('.short p').click(function(){
		if(open==true)
		{
			open = false;
			if($(this).attr('isOpen')=='false')
			{
				$(this).attr('isOpen',true);
				$(this).siblings('.profess').stop().slideDown(500,function(){
					open = true;
				});
				$(this).siblings('img').stop().css('transform','rotate(180deg)');
			}else{
				$(this).attr('isOpen',false);
				$(this).siblings('.profess').slideUp(500,function(){
					open = true;
				});
				$(this).siblings('img').stop().css('transform','rotate(0deg)');
			}
		}
	});
	$('.short').mouseleave(function(){
		open  = true;
		$(this).children('p').attr('isOpen',false);
		$(this).children('p').siblings('.profess').slideUp();
		$(this).children('p').siblings('img').stop().css('transform','rotate(0deg)');
	});
	$('.prov ul li').click(function(){
		open  = true;
		$(this).parents(".short").children('p').text($(this).children('p').text());
		$(this).parents(".short").children('p').attr('isOpen',false);
		$(this).parents(".short").children('p').siblings('.profess').slideUp();
		$(this).parents(".short").children('p').siblings('img').stop().css('transform','rotate(0deg)');

        var province = $(this).parents(".short").children('p').text();
        var url = img_path+"/index.php/getCity?province="+province;
        $.get(url,function(res){
            var city = JSON.parse(res);
            var html="";
            for(item in city){
                html +='<li>';
                html +='<p class="p1">'+city[item].region_name+'</p>';
                html +='</li>';
            }
            $('#cy').html(html);

            $('.cty ul li').click(function(){
                open  = true;
                $(this).parents(".short").children('p').text($(this).children('p').text());
                $(this).parents(".short").children('p').attr('isOpen',false);
                $(this).parents(".short").children('p').siblings('.profess').slideUp();
                $(this).parents(".short").children('p').siblings('img').stop().css('transform','rotate(0deg)');
            });
        })
	});




    setTimeout(function(){
        var province = '北京';
        var url = img_path+"/index.php/getCity?province="+province;
        $.get(url,function(res){
            var city = JSON.parse(res);
            var html="";
            for(item in city){
                html +='<li>';
                html +='<p class="p1">'+city[item].region_name+'</p>';
                html +='</li>';
            }
            $('#cy').html(html);

            $('.cty ul li').click(function(){
                open  = true;
                $(this).parents(".short").children('p').text($(this).children('p').text());
                $(this).parents(".short").children('p').attr('isOpen',false);
                $(this).parents(".short").children('p').siblings('.profess').slideUp();
                $(this).parents(".short").children('p').siblings('img').stop().css('transform','rotate(0deg)');
            });
        })
    },300);

	var mapExist = false;
	//选择
	$('.netNavs ul li button').click(function(){
		$(this).addClass('btnActive');
		$(this).parent('li').siblings('li').find('button').removeClass('btnActive');
		var eq;
		eq= parseInt($(this).attr('eq'));

        //添加历程
        var years=lc_title;
        var title=lc_short;
        var content=lc_content;

		switch(eq)
		{
			case 0:
				$('.profile').show();
				$('.honor').hide();
				$('.net').hide();
				$('.development').hide();
				$('.profile').addClass('animated bounceInUp');
				break;
			case 1:
				$('.development').show();
				$('.profile').hide();
				$('.honor').hide();
				$('.net').hide();
				$('.development').fadeIn(1000);
				if(dCondition==false){
					dCondition = true;
					//添加历程
					for(var i = 0; i < years.length; i++) {
						var html = '';
						if(years[i] % 2 == 1) {
							html += '<div class="mBox lBox" ><div class="mLeft" data-scroll-reveal="enter left and move 50px over 1.0s">';
							html += '<p class="mTitle">' + title[i] + '</p><p class="mContent mr' + i + ' ">' + content[i] + '</p></div>';
							html += '<div class="mMiddle"><div></div></div>';
							html += '<div class="mright" data-scroll-reveal="enter right and move 50px over 1.0s"><p>' + years[i] + '</p></div></div>';
						} else {
							html += '<div class="mBox rBox" ><div class="mLeft" data-scroll-reveal="enter right and move 50px over 1.0s">';
							html += '<p class="mTitle">' + title[i] + '</p><p class="mContent mr' + i + ' ">' + content[i] + '</p></div>';
							html += '<div class="mMiddle"><div></div></div>';
							html += '<div class="mright" data-scroll-reveal="enter left and move 50px over 1.0s"><p>' + years[i] + '</p></div></div>';
						}
						$('.dashed').prepend(html);

                        var h = $('.mr13 + p>span').height();//.pyuan + p>span
                        console.log(h);

						//3-26 4-13 2-44 1-60
						if($('.mr' + i +'+ p>span').height() >= 30 && $('.mr' + i +'+ p>span').height() < 35) {
							$('.mr' + i).prev('.mTitle').css('padding-top', '60px');
						}  else if($('.mr' + i +'+ p>span').height() >= 35 && $('.mr' + i +'+ p>span').height() < 40) {
                            $('.mr' + i).prev('.mTitle').css('padding-top', '48px');
                        } else if($('.mr' + i +'+ p>span').height() >= 40 && $('.mr' + i +'+ p>span').height() < 60) {
                            $('.mr' + i).prev('.mTitle').css('padding-top', '40px');
                        } else if($('.mr' + i +'+ p>span').height() >= 60 && $('.mr' + i +'+ p>span').height() < 90) {
							$('.mr' + i).prev('.mTitle').css('padding-top', '44px');
						} else if($('.mr' + i +'+ p>span').height() >= 90 && $('.mr' + i +'+ p>span').height() < 120) {
							$('.mr' + i).prev('.mTitle').css('padding-top', '26px');
						} else if($('.mr' + i +'+ p>span').height() >= 120 && $('.mr' + i +'+ p>span').height() < 150) {
							$('.mr' + i).prev('.mTitle').css('padding-top', '13px');
						}
						if((i + 1) != years.length) {
							var htmlm = '';
							htmlm += '<div class="mbox"></div>';
							$('.dashed').prepend(htmlm);
						}
					}
					//开启滑动动画
                    setTimeout(function(){
                        if(!(/msie [6|7|8|9]/i.test(navigator.userAgent))) {
                            (function() {
                                window.scrollReveal = new scrollReveal({
                                    reset: true
                                });
                            })();
                        }
                    },500);

				}
				break;
			case 2:
				$('.honor').show();
				$('.profile').hide();
				$('.net').hide();
				$('.development').hide();
				$('.honor').addClass('animated bounceInDown');
				break;
			case 3:
				$('.net').show();
				$('.profile').hide();
				$('.honor').hide();
				$('.development').hide();
				$('.net').addClass('animated tada');
				if(mapExist==false){
					mapExist = true;
					var c = Raphael("map_container", 600, 600);
					// 初始化地图
					var map = InitializeMap(c, "0.2", "#C9E9F7");
					// 绘制地图
					DrawMap(c, map);
				}

				break;
		}
	});

	var dCondition = false;

});


function searchData(){
    var province = $('.provice').text();
    var city = $('.city_dy').text();
    var zw_name = $('#zw_name').text();
    var url = img_path+"/index.php/getShop?province="+province+"&city="+city+"&zw_name="+zw_name;
    $.get(url,function(res){
        var data = JSON.parse(res);
        var html="";
        if(data != ''){
            $('#shop_y').show();
            $('#shop_n').hide();
            html +='<tr>';
            html +='<td>专卖店名称</td>';
            html +='<td>专卖店地址</td>';
            html +='<td>营业时间</td>';
            html +='</tr>';
            for(item in data){
                html +='<tr>';
                html +='<td>'+data[item].z_name+'</td>';
                html +='<td>'+data[item].z_loca+'</td>';
                html +='<td>'+data[item].z_tel+'</td>';
                html +='</tr>';
            }
            $('#shop_y').html(html);
        }else{
            $('#shop_n').show();
        }

    })
}





	


