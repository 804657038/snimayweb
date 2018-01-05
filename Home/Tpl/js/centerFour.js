$(function(){
	//子区域标题导航
	$('.childSelect li').click(function(){
		$(this).addClass('lsdn');
		$(this).siblings('li').removeClass('lsdn');
		$(this).siblings('li').removeClass('lsdpn');
		$(this).prev('li').addClass('lsdpn');
		var index = parseInt($(this).attr('index'));
		switch(index){
			case 0:
				$('.company').show();
				$('.videoCenter').hide();
				$('.media').hide();
				$('.email').hide();
				$('.company').addClass('animated bounceInUp');
				break;
			case 1:
				$('.media').show();
				$('.videoCenter').hide();
				$('.company').hide();
				$('.email').hide();
				$('.media').addClass('animated bounceInDown');
				break;
			case 2:
				$('.videoCenter').show();
				$('.email').hide();
				$('.company').hide();
				$('.media').hide();
				$('.videoCenter').addClass('animated bounceInUp');
				break;
				break;
			case 3:
				$('.email').show();
				$('.videoCenter').hide();
				$('.company').hide();
				$('.media').hide();
				$('.email').addClass('animated bounceInDown');
				break;
		}
	});
	//返回媒体报道列表
	$('.newsReturn').click(function(){
		$('#news').show();
		$('.media').show();
		$('#details').hide();
		$('.newsD').hide();
		$('.media').addClass('animated bounceInDown');
	});
	//查看详情
	$('.readMore').click(function(){
		$('#news').hide();
		$('.media').hide();
		$('#details').show();
		$('.newsD').show();
		$('.newsD').addClass('animated tada');
	});
	//电子报刊
	$('.emailReturn').click(function(){
		$('#news').show();
		$('.email').show();
		$('#details').hide();
		$('.emailDetails').hide();
		$('.email').addClass('animated bounceInUp');
	});
	//播放视频
	var myPlayer1 = videojs('my-video1');
	videojs("my-video1").ready(function(){
		var myPlayer = this;
		$('.pVideo1').click(function(){
			myPlayer.play();
			$(this).hide();
		});
	});
	var myPlayer2 = videojs('my-video2');
	videojs("my-video2").ready(function(){
		var myPlayer = this;
		$('.pVideo2').click(function(){
			myPlayer.play();
			$(this).hide();
		});
	});
	var myPlayer3 = videojs('my-video3');
	videojs("my-video3").ready(function(){
		var myPlayer = this;
		$('.pVideo3').click(function(){
			myPlayer.play();
			$(this).hide();
		});
	});


});
//查看电子报刊详情
var first = false;
function bao(){
    $('#news').hide();
    $('.email').hide();
    $('#details').show();
    $('.emailDetails').show();
    $('.emailDetails').addClass('animated tada');
    if(first == false)
    {
        first = true;
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            centeredSlides: true,
            slidesPerview: 'auto',
            loopedSlides: 5,
            autoplay: 5000,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
        });
    }
}

function getDetails(id){
	var url = img_path+"/index.php/getDetails?id="+id;
	$.get(url,function(res) {
        var data = JSON.parse(res);
		var html = "";
		if (data.list != '') {
            $('#news').hide();
            $('.media').hide();
            $('#details').show();
            $('.newsD').show();
            $('.newsD').addClass('animated');

            $('#title').text(data.list.title);
            $('#time').text(data.list.add_time);
            $('#click').text(data.list.click_sum);
            $('#contents').html(data.list.content);
            html +='<li>';
            html +='<p>标签：</p>	';
            html +='</li>';
            for(item in data.tips){
                html +='<li>';
                html +='<a href="###">'+data.tips[item]+'</a>';
                html +='</li>';
            }
            $("#biaoqiao").html(html);
		} else {
			$('.noAnyResult').show();
		}
        //上一页
        var hemlData = '';
		if(data.prev != null){
            $("#prev").show();
            $("#prev_2").hide();
            hemlData += '<a href="javascript:;" onclick="getDetails('+data.prev.article_id+')">'+data.prev.title+'</a>';
            $("#prev").html(hemlData);
        }else{
            $("#prev").hide();
            $("#prev_2").show();
        }
        //下一页
        var hemlDataN = '';
        if(data.nextN != null){
            $("#nets").show();
            $("#nets_2").hide();
            hemlDataN += '<a href="javascript:;" onclick="getDetails('+data.nextN.article_id+')">'+data.nextN.title+'</a>';
            $("#nets").html(hemlDataN);
        }else{
            $("#nets").hide();
            $("#nets_2").show();
        }
	});
}

function getDetailmeiti(id){
    var url = img_path+"/index.php/getDetailmeiti?id="+id;
    $.get(url,function(res) {
        var data = JSON.parse(res);
        var html = "";
        if (data.list != '') {
            $('#news').hide();
            $('.media').hide();
            $('#details').show();
            $('.newsD').show();
            $('.newsD').addClass('animated');

            $('#title').text(data.list.title);
            $('#time').text(data.list.add_time);
            $('#click').text(data.list.click_sum);
            $('#contents').html(data.list.content);
            html +='<li>';
            html +='<p>标签：</p>	';
            html +='</li>';
            for(item in data.tips){
                html +='<li>';
                html +='<a href="###">'+data.tips[item]+'</a>';
                html +='</li>';
            }
            $("#biaoqiao").html(html);
        } else {
            $('.noAnyResult').show();
        }
        //上一页
        var hemlData = '';
        if(data.prev != null){
            $("#prev").show();
            $("#prev_2").hide();
            hemlData += '<a href="javascript:;" onclick="getDetailmeiti('+data.prev.article_id+')">'+data.prev.title+'</a>';
            $("#prev").html(hemlData);
        }else{
            $("#prev").hide();
            $("#prev_2").show();
        }
        //下一页
        var hemlDataN = '';
        if(data.nextN != null){
            $("#nets").show();
            $("#nets_2").hide();
            hemlDataN += '<a href="javascript:;" onclick="getDetailmeiti('+data.nextN.article_id+')">'+data.nextN.title+'</a>';
            $("#nets").html(hemlDataN);
        }else{
            $("#nets").hide();
            $("#nets_2").show();
        }
    });
}

function getDetailBaokan(id){
    var url = img_path+"/index.php/getDetailBaokan?id="+id;
    $.get(url,function(res) {
        bao();
        var data = JSON.parse(res);
        var html = "";
        for(item in data.original_img){
            html +='<div class="swiper-slide">';
            html +='<img src="'+img_path+data.original_img[item].url+'" class="img-responsive"/>';
            html +='</div>';
        }
        $("#baokanpic").html(html);
    });
}