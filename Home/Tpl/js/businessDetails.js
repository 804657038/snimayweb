$(function(){
	var swiper = new Swiper('.swiper-container-three', {
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        loop:true,
        prevButton:'.prev',
		nextButton:'.next',
    });
    //选择颜色
    $('.colorList').find('a').click(function(){
    	$(this).addClass('colorActive');
    	$(this).parent('li').siblings('li').find('a').removeClass('colorActive');
    });
    //选择实木类型
    $('.treeList').find('a').click(function(){
    	$(this).addClass('treeActive');
    	$(this).parent('li').siblings('li').find('a').removeClass('treeActive');
    });
    //类型选择
    $('.styleList').find('a').click(function(){
    	$(this).addClass('classifyActive');
    	$(this).parent('li').siblings('li').find('a').removeClass('classifyActive');
    });

    //鼠标悬浮显示大图
    $(".swiper-slide").find('img').hover(function(){
        $(".pintroImg").find('img').attr("src",$(this).attr('src'));
    },function(){
        $(".pintroImg").find('img').attr("src",$('.swq1').attr('src'));
    });
});
