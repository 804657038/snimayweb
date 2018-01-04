$(function(){
	//省市区三级联动
	!function () {
        var $target = $('#city');

        $target.citySelect();

        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function (ret) {
            $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();
	//实例化轮播图
	var mySwiper = new Swiper('.swiper-container-index', {
		loop: true,
		pagination: '.swiper-pagination',
		paginationClickable :true,
		autoplayDisableOnInteraction : false,
		paginationBulletRender: function (swiper, index,className) {
		    return '<span class="' + className + '">0' + (index + 1) + '</span>';
		    
		},
		effect : 'fade',
		autoplay:5000,
		onInit: function(swiper){
			//添加分页标签
			for(i=0;i<$('.swiper-pagination span').length;i++)
			{
				$('.swiper-pagination span').eq(i).text('0'+(i+1));
			}
			$('.logoL a img').attr('src',img_path+logo1.original_img);
	       	$('header nav .navR ul li a').css('color',"#333333");
	       	$('header nav .navR ul li:nth-child(7) a').css('color',"#a51e32");
	       	$('header nav .navR ul li:nth-child(9) a img').attr('src',imgLink+'img/moreB.png');
	       	$('header nav .navR ul li:nth-child(10) a img').attr('src',imgLink+'img/searchB.png');
		}
	});
	//子区域标题导航
	$('.childSelect li').mouseover(function(){
		if($(this).index()==0)
		{
			$(this).addClass('lsd');
		}else{
			$(this).addClass('lsd');
			$(this).prev('li').addClass('lsdp');
		}
	});
	$('.childSelect li').mouseout(function(){
		if($(this).index()==0)
		{
			$(this).removeClass('lsd');
		}else{
			$(this).removeClass('lsd');
			$(this).prev('li').removeClass('lsdp');
		}
	});
	//子区域标题导航
	$('.childSelect li').click(function(){
		$(this).addClass('lsdn');
		$(this).siblings('li').removeClass('lsdn');
		$(this).siblings('li').removeClass('lsdpn');
		$(this).prev('li').addClass('lsdpn');
	});
});
layui.use(['layer', 'form'], function(){
    var layer = layui.layer
        ,form = layui.form;
});

var is_post=0;
function addOrder(){
    var url = img_path+"index.php/add_order";
    var data = {};
    data.username = $("#name").val();
    data.phone = $("#phone").val();
    data.J_Address = $("#city").val();
    is_post++;
    layer.load(1);
    if (is_post == 1) {
        $.post(url, data, function(res) {
            layer.closeAll();
            if (res.code == 1) {
				popWindow("信息提醒","Information to remind","您的定制留言已经提交成功",'感谢您对诗尼曼的支持！');
            } else {
                layer.msg(res.info,{time: 1000});
                is_post = 0;
            }
        }, 'json');
    } else {
        layer.msg("请不要重复提交", {icon: 5, time: 1000});
        layer.closeAll();
    }
}

function getQuanwu(id){
    var url = img_path+"/index.php/getQuanwu?id="+id;
    $.get(url,function(res){
        var data = JSON.parse(res);
        $("#q_img").attr('src',img_path+data.quan1.original_img);
        $("#q_title").html(data.quan1.title);
        $("#q_short").html(data.quan1.short);
        var html="";
        var quans = data.quan;
        var tip = data.tips;
        for(item in quans){
            html +='<div class="cRight floatl"><div class="cRightList"><div class="cRLBox"><div class="cRLLeft floatl">';
            html +='<img src="'+img_path+quans[item].original_img+'" />';
            html +='<div class="best"><p>推荐</p></div></div><div class="cRLRight floatl"><ul><li class="pRFirst">';
            html +='<p class="p1">'+quans[item].title+'</p>';
            html +='</li><li class="pRSecond">';
            html +='<p class="p2">'+quans[item].short+'</p>';
            html +='</li><li><div class="btnLeft floatl"><ul>';
            for(items in tip){
                html +='<li>';
                html +='<button>'+tip[items]+'</button>';
                html +='</li>';
            }
            html +='</ul></div><div class="btnRight floatr"><a href="###"><span></span><span></span></a></div>';
            html +='<div class="clearBoth"></div></li></ul></div><div class="clearl"></div></div></div></div>';
        }
        $('#quan').html(html);

    })
}

function getXiaohu(id){
    var url = img_path+"/index.php/getQuanwu?id="+id;
    $.get(url,function(res){
        var data = JSON.parse(res);
        $("#x_img").attr('src',img_path+data.quan1.original_img);
        $("#x_title").html(data.quan1.title);
        $("#x_short").html(data.quan1.short);
        var html="";
        var quans = data.quan;
        var tip = data.tips;
        for(item in quans){
            html +='<div class="cRightList"><div class="cRLBox"><div class="cRLLeft floatl">';
            html +='<img src="'+img_path+quans[item].original_img+'" />';
            html +='<div class="best"><p>推荐</p></div></div><div class="cRLRight floatl"><ul><li class="pRFirst">';
            html +='<p class="p1">'+quans[item].title+'</p>';
            html +='</li><li class="pRSecond">';
            html +='<p class="p2">'+quans[item].short+'</p>';
            html +='</li><li><div class="btnLeft floatl"><ul>';
            for(items in tip){
                html +='<li>';
                html +='<button>'+tip[items]+'</button>';
                html +='</li>';
            }
            html +='</ul></div><div class="btnRight floatr"><a href="###"><span></span><span></span></a></div>';
            html +='<div class="clearBoth"></div></li></ul></div><div class="clearl"></div></div></div></div>';
        }
        $('#xiao').html(html);

    })
}

function getQiqa(id){
    var url = img_path+"/index.php/getQuanwu?id="+id;
    $.get(url,function(res){
        var data = JSON.parse(res);
        $("#qi_img").attr('src',img_path+data.quan1.original_img);
        $("#qi_title").html(data.quan1.title);
        $("#qi_short").html(data.quan1.short);
        var html="";
        var quans = data.quan;
        var tip = data.tips;
        for(item in quans){
            html +='<div class="cRightList"><div class="cRLBox"><div class="cRLLeft floatl">';
            html +='<img src="'+img_path+quans[item].original_img+'" />';
            html +='<div class="best"><p>推荐</p></div></div><div class="cRLRight floatl"><ul><li class="pRFirst">';
            html +='<p class="p1">'+quans[item].title+'</p>';
            html +='</li><li class="pRSecond">';
            html +='<p class="p2">'+quans[item].short+'</p>';
            html +='</li><li><div class="btnLeft floatl"><ul>';
            for(items in tip){
                html +='<li>';
                html +='<button>'+tip[items]+'</button>';
                html +='</li>';
            }
            html +='</ul></div><div class="btnRight floatr"><a href="###"><span></span><span></span></a></div>';
            html +='<div class="clearBoth"></div></li></ul></div><div class="clearl"></div></div></div></div>';
        }
        $('#qipa').html(html);

    })
}