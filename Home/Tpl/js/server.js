$(function(){
	//打开选择
	$('.rRight a').click(function(){
		if($(this).attr('isOpen')=='false')
		{
			$(this).css('transform','rotate(-180deg)');
			$(this).attr('isOpen','true');
			var h = $(this).parent('.rRight').siblings('.rMiddle').height();
			$(this).parent('.rRight').parent('.radioBox').stop().animate({height:h+'px'},50);
		}else{
			$(this).attr('isOpen','false');
			$(this).css('transform','rotate(0deg)');
			$(this).parent('.rRight').parent('.radioBox').stop().animate({height:'60px'},50);
		}
	});
	//日期
	layui.use('laydate', function(){
	  	var laydate = layui.laydate;
	  	laydate.render({
		  elem: '.date'
		  ,calendar: true
		  ,position: 'abolute'
		  ,change: function(value, date){ //监听日期被切换
		    lay('#testView').html(value);
		  }
		});
		laydate.render({
		  elem: '.dateT'
		  ,calendar: true
		  ,position: 'abolute'
		  ,change: function(value, date){ //监听日期被切换
		    lay('#testView').html(value);
		  }
		});
	});
	$('.date').focus(function(){
		$(this).blur();
	});
	$('.dateT').focus(function(){
		$(this).blur();
	});
	layui.use('form', function(){
		  var form = layui.form;
		  
		  //监听提交
		  form.on('submit(formDemo)', function(data){
		    layer.msg(JSON.stringify(data.field));
		    return false;
		  });
		});
	//省市区
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
    !function () {
        var $target = $('#cityP');

        $target.citySelect();

        $target.on('click', function (event) {
            event.stopPropagation();
            $target.citySelect('open');
        });

        $target.on('done.ydui.cityselect', function (ret) {
            $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
        });
    }();
    $('#city').focus(function(){
		$(this).blur();
	});
	$('#cityP').focus(function(){
		$(this).blur();
	});
	//选择文件
	$('.files').change(function(){
		if($(this).val()=="")
		{
			$(this).siblings('span').text("未选择文件");
		}else{
			$(this).siblings('span').text($(this).val());
		}
		
	});
	//我要定制
	$('.iWant').click(function(){
		$(this).addClass('wbtn');
		$('.iProgrem').removeClass('wbtn');
		$('.iSuggest').removeClass('wbtn');
		$('.woWant').show();
		$('.proBlem').hide();
		$('.suggest').hide();
		$('.woWant').addClass('animated bounceInDown');
	});
	$('.iSuggest').click(function(){
		$(this).addClass('wbtn');
		$('.iProgrem').removeClass('wbtn');
		$('.iWant').removeClass('wbtn');
		$('.suggest').show();
		$('.proBlem').hide();
		$('.woWant').hide();
		$('.suggest').addClass('animated bounceInUp');
	});
	$('.iProgrem').click(function(){
		$(this).addClass('wbtn');
		$('.iWant').removeClass('wbtn');
		$('.iSuggest').removeClass('wbtn');
		$('.proBlem').show();
		$('.woWant').hide();
		$('.suggest').hide();
		$('.proBlem').addClass('animated flipInY');
	});
	//电话
	var pt = 0;
	var pTween = setInterval(function(){
		pt++;
		if(pt==3)
		{
			pt=0;
		}
		$('.pbBox img').attr('src',imgLink+'img/phones'+pt+'.png');
	},500);
	//步骤
	var stepTween;
	var sn = 0;
	stepTween = setInterval(function(){
		
		$('.stepChild').eq(sn).addClass('stepActive');
		$('.stepChild').eq(sn).siblings('.stepChild').removeClass('stepActive');
		sn++;
		if(sn==6)
		{
			sn=0;
		}
	},1000);
	
	$('.stepChild').mousemove(function(){
		sn = $(this).index()+1;
		if(sn==6)
		{
			sn = 0;
		}
		clearInterval(stepTween);
		$('.stepChild').siblings('.stepChild').removeClass('stepActive');
	});
	$('.stepChild').mouseout(function(){
		stepTween = setInterval(function() {
		
			$('.stepChild').eq(sn).addClass('stepActive');
			$('.stepChild').eq(sn).siblings('.stepChild').removeClass('stepActive');
			sn++;
			if(sn == 6) {
				sn = 0;
			}
		}, 1000);
	});
	//弹窗
//	popWindow("信息提醒","Information to remind","您的反馈意见已经发送成功。",'感谢您对诗尼曼的支持！');
	//播放视频
	
	//播放视频
	var myPlayer1 = videojs('my-video1');
	videojs("my-video1").ready(function(){
		var myPlayer = this;
		$('.playv').click(function(){
			myPlayer.play();
			$('.playVideo').hide();
		});
	});
});
var map = new AMap.Map('companyMap', {
    resizeEnable: true,
    zoom:15,
    center: [113.499548,22.951488]
});
var marker = new AMap.Marker({
    position: map.getCenter(),
    draggable: true,
    cursor: 'move',
    icon: imgLink+"img/addressIcon.png"
});
marker.setMap(map);
// 设置点标记的动画效果，此处为弹跳效果
//marker.setAnimation('AMAP_ANIMATION_BOUNCE');
marker.setTitle('点击我，打开地图，广州诗尼曼家居股份有限公司欢迎您的到来！');
marker.on('click',function(e){
    marker.markOnAMAP({
    name:'广州诗尼曼家居股份有限公司',
    position:marker.getPosition()
    })
});
//打开更多
	$('.short p').click(function(){
		if($(this).attr('isOpen')=='false')
		{
			$(this).attr('isOpen',true);
			$(this).siblings('.profess').stop().slideDown();
			$(this).siblings('img').stop().css('transform','rotate(180deg)');
		}else{
			$(this).attr('isOpen',false);
			$(this).siblings('.profess').slideUp();
			$(this).siblings('img').stop().css('transform','rotate(0deg)');
		}
	});
	$('.profess ul li').click(function(){
		$(this).parents(".short").children('p').text($(this).children('p').text());
		$(this).parents(".short").children('p').attr('isOpen',false);
		$(this).parents(".short").children('p').siblings('.profess').slideUp();
		$(this).parents(".short").children('p').siblings('img').stop().css('transform','rotate(0deg)');
	});


layui.use(['form', 'layer','upload'], function () {
    var form = layui.form,layer = layui.layer,upload = layui.upload,$ = layui.jquery;
    //普通图片上传
    var uploadInst = upload.render({
        elem: '#logoBtn'
        ,url: img_path+'index.php/uploadFile'
        ,accept: 'file'
        ,exts:'zip|rar|7z'
        ,size: 20480
        ,done: function(res){
            //上传成功
            if(res.code>0){
                $('#logo').attr('value',res.file);
                $('#cltLogo').html(res.name);
            }else{
                //如果上传失败
                return layer.msg('上传失败');
            }
        }
    });

});

var is_post = 0;
//我要定制
function add_order() {
	var url = img_path+"index.php/insert_order";
	var data = {};
	data.type = $('.dingzhi input:radio[name="types"]:checked').val();
	data.username = $("#name1").val();
	data.phone = $("#phone1").val();
	data.J_Address = $("#city").val();
	data.contact_time = $("#date1").val();
	data.addr = $("#addr1").val();
	data.content = $("#content1").val();
	is_post++;
	layer.load(1);
	if (is_post == 1) {
		$.post(url, data, function(res) {
			layer.closeAll();
			if (res.code == 1) {
				popWindow("信息提醒","Information to remind","您的订单已经提交成功。",'感谢您对诗尼曼的支持！');
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
//我要投诉
function add_complain(){
    var url = img_path+"index.php/insert_complain";
    var data = {};
    data.type = $('.tousu input:radio[name="type"]:checked').val();
    data.username = $("#name2").val();
    data.phone = $("#phone2").val();
    data.J_Address = $("#cityP").val();
    data.contact_time = $("#date2").val();
    data.addr = $("#addr2").val();
    data.content = $("#content2").val();
    data.file = $("#logo").val();
    is_post++;
    layer.load(1);
    if (is_post == 1) {
        $.post(url, data, function(res) {
            layer.closeAll();
            if (res.code == 1) {
				popWindow("信息提醒","Information to remind","您的投诉已经发送成功。",'感谢您对诗尼曼的支持！');
            } else {
                layer.msg(res.info);
                is_post = 0;
            }
        }, 'json');
    } else {
        layer.msg("请不要重复提交", {icon: 5, time: 1000});
        layer.closeAll();
    }
}

//意见反馈
function add_feeback(){
    var url = img_path+"index.php/insert_feeback";
    var data = {};
    data.username = $("#name3").val();
    data.phone = $("#phone3").val();
    data.addr = $("#cty").val();
    data.content = $("#content3").val();
    is_post++;
    layer.load(1);
    if (is_post == 1) {
        $.post(url, data, function(res) {
            layer.closeAll();
            if (res.code == 1) {
				popWindow("信息提醒","Information to remind","您的反馈意见已经发送成功。",'感谢您对诗尼曼的支持！');
            } else {
                layer.msg(res.info);
                is_post = 0;
            }
        }, 'json');
    } else {
        layer.msg("请不要重复提交", {icon: 5, time: 1000});
        layer.closeAll();
    }
}