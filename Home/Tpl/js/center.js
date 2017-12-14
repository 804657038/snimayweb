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
			$('.logoL a img').attr('src','img/logobb.png');
	       	$('header nav .navR ul li a').css('color',"#333333");
	       	$('header nav .navR ul li:nth-child(7) a').css('color',"#a51e32");
	       	$('header nav .navR ul li:nth-child(9) a img').attr('src','img/moreB.png');
	       	$('header nav .navR ul li:nth-child(10) a img').attr('src','img/searchB.png');
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