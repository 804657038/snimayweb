<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo (strip_tags($site_title)); ?></title>
    <meta name="keywords" content="<?php echo (strip_tags($site_keywords)); ?>">
    <meta name="description" content="<?php echo (strip_tags($site_description)); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
    <link rel="stylesheet" href="__HOME__/css/swiper-3.4.2.min.css" />
    <link rel="stylesheet" href="__HOME__/css/reset.css" />
    <link rel="stylesheet" href="__HOME__/css/public.css" />
    <script type="text/javascript" src="__HOME__/js/rem.js" ></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__HOME__/js/swiper-3.4.2.min.js" ></script>
    <script type="text/javascript">
        var MobileimgLink = '<?php echo ($mobile_img); ?>';
        var mobile_path = 'http://127.0.0.1/snimayweb/';

    </script>
</head>
<body>

<link rel="stylesheet" href="__HOME__/css/index.css" />
<script type="text/javascript">
    var jon_list = <?php echo ($jon_list); ?>;
    var eights_list = <?php echo ($eights_list); ?>;
</script>
		<!--轮播图+导航-->
		<div id="banner">
			<div class="swiper-container swiper-container-index">
			    <div class="swiper-wrapper">

					<?php if(is_array($banner_list)): $i = 0; $__LIST__ = $banner_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                        <a href="<?php echo ($vo["link"]); ?>"><img src="__ROOT__/<?php echo ($vo["original_img"]); ?>" class="img-responsive"></a>
			        </div><?php endforeach; endif; else: echo "" ;endif; ?>

			    </div>
			    <div class="swiper-pagination"></div>
			</div>
		</div>
		<!--业务中心-->
		<div id="business" class="box">
			<div class="titles">
				<ul>
					<li>
						<p>业务中心</p>
					</li>
					<li>
						<p>Business Center</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="sixPart">
                <?php if(is_array($acat)): foreach($acat as $k=>$vo): ?><a href="" class="sChild floatl">
                    <?php if($k == 0): ?><img src="__HOME__/img/busi01.png" /><?php endif; ?>
                    <?php if($k == 1): ?><img src="__HOME__/img/busi02.png" /><?php endif; ?>
                    <?php if($k == 2): ?><img src="__HOME__/img/busi03.png" /><?php endif; ?>
                    <?php if($k == 3): ?><img src="__HOME__/img/busi04.png" /><?php endif; ?>
                    <?php if($k == 4): ?><img src="__HOME__/img/busi05.png" /><?php endif; ?>
                    <?php if($k == 5): ?><img src="__HOME__/img/busi06.png" /><?php endif; ?>

					<p><?php echo ($vo["cat_name"]); ?></p>
				</a><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
		</div>
		<!--加入诗尼曼-->
		<div id="join" class="box">
			<div class="titles">
				<ul>
					<li>
						<p>加入诗尼曼</p>
					</li>
					<li>
						<p>Join The Poet Neiman</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="choice3">
                <?php if(is_array($jon_lt)): foreach($jon_lt as $k=>$vo): ?><div class="floatl">
					<button class="normalBtn <?php if($k == 0): ?>redmalBtn<?php endif; ?>" <?php if($k == 0): ?>index=1<?php elseif($k == 1): ?>index=2<?php else: ?>index=3<?php endif; ?> >
                        <?php echo ($vo["title"]); ?>
                    </button>
				</div><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
			<div class="joinIntro">
				<div class="joinImg">
					<img src="__ROOT__/<?php echo ($join_list["original_img"]); ?>" />
				</div>
				<div class="moreBtn">
					<button>了解更多</button>
				</div>
			</div>
		</div>
		<!--八大空间-->
		<div id="room8" class="box">
			<div class="titles">
				<ul>
					<li>
						<p>8大空间产品</p>
					</li>
					<li>
						<p>8 large space products</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="roomBox">
				<img src="__ROOT__/<?php echo ($e_list["original_img"]); ?>" />
				<div class="roomContent">
					<div class="rcLeft floatl">
						<ul>
                            <?php if(is_array($eights)): foreach($eights as $k=>$vo): ?><li>
								<p <?php if($k == 0): ?>class="pActive"<?php endif; ?> index=<?php echo ($k); ?>><?php echo ($k+1); ?> <?php echo ($vo["cat_name"]); ?></p>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>
					<div class="rcRight floatl">
						<div class="bigTitle">
							<p><?php echo ($eights[0]['cat_name']); ?></p>
						</div>
						<div class="smallContent">
							<p><?php echo ($eights[0]['cat_desc']); ?></p>
							<a href="###"><img src="__HOME__/img/morew.png" /></a>
						</div>
					</div>
					<div class="clearl"></div>
				</div>
			</div>
		</div>
		<!--资讯中心-->
		<div id="center" class="box">
			<div class="titles">
				<ul>
					<li>
						<p>资讯中心</p>
					</li>
					<li>
						<p>Information center</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="boxCenter">
                <?php if(is_array($zx)): foreach($zx as $k=>$vo): ?><div class="centerChild floatl" onclick="javascript:window.location.href='<?php echo ($vo["link2"]); ?>'">
					<div class="centerImg" style="overflow: hidden;">
						<img src="__ROOT__/<?php echo ($vo["original_img"]); ?>" width="170px" height="130px"/>
					</div>
					<div class="centerP">
						<p><?php echo ($vo["title"]); ?></p>
						<a href="<?php echo ($vo["link2"]); ?>"><img src="__HOME__/img/more.png"/></a>
					</div>
				</div><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
		</div>
<footer>
    <div class="moreLink">
        <ul>
            <li>
                <a href="<?php echo ($arr["link2"]); ?>">诗尼曼天猫旗舰店<span>&bull; </span></a>
            </li>
            <li>
                <a href="<?php echo ($arr["link1"]); ?>">诗尼曼京东旗舰店<span>&bull; </span></a>
            </li>
            <li>
                <a href="<?php echo ($arr["link5"]); ?>">商学院学习系统</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="<?php echo ($arr["link6"]); ?>">经销商登录<span>&bull; </span></a>
            </li>
            <li>
                <a href="<?php echo ($arr["link7"]); ?>">橱柜加盟<span>&bull; </span></a>
            </li>
            <li>
                <a href="https://www.tianyancha.com/company/3093933522">企业营业执照</a>
            </li>
        </ul>
    </div>
    <div class="moreFun">
        <div class="floatl" onclick="javascript:window.location.href='http://p.qiao.baidu.com//im/index?siteid=2911356&ucid=6160127'">
            <div class="funBox">
                <img src="__HOME__/img/onLine.png" />
            </div>
            <div class="funP">
                <p>在线咨询</p>
            </div>
        </div>
        <a class="floatl" href="tel:<?php echo ($arr["tel_hot"]); ?>">
            <div class="funBox">
                <img src="__HOME__/img/phoneAsk.png" />
            </div>
            <div class="funP">
                <p>电话咨询</p>
            </div>
        </a>
        <div class="floatl">
            <div class="funBox">
                <img src="__HOME__/img/order.png" />
            </div>
            <div class="funP">
                <p>订单查询</p>
            </div>
        </div>
        <div class="clearl"></div>
    </div>
    <div class="chatBox">
        <ul>
            <li>
                <a href="###"><img src="__HOME__/img/weibo.png"/></a>
            </li>
            <li>
                <a href="###"><img src="__HOME__/img/wechat.png"/></a>
            </li>
        </ul>
    </div>
    <div class="case">
        <p>Copyright&copy;2017<?php echo ($arr["icp"]); ?> 广州诗尼曼家居股份有限公司</p>
    </div>
</footer>
</body>
</html>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function touzizhe(){
        layer.msg('该功能暂未开放');
    }
</script>
<script type="text/javascript" src="__HOME__/js/index.js" ></script>