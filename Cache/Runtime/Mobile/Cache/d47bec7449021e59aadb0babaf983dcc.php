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
    <link rel="Shortcut Icon" href="/favicon.ico">
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

<link rel="stylesheet" href="__HOME__/css/about.css" />

		<!--轮播图+导航-->
		<div id="banner">
			<img src="__HOME__/img/aboutBanner.jpg" />
			<nav>
				<div class="navBox box">
					<a class="rNavBtn"><img src="__HOME__/img/return.png"/></a>
					<a class="moreNav"><img src="__HOME__/img/moreNav.png"/></a>
					<p>公司招聘</p>					
				</div>
			</nav>
		</div>
		<div id="selectBox">
			<div class="fSelect">
				<div class="fSBox">
					<div class="floatl">
						<button class="activeBtn" index=1>公司简介</button>
					</div>
					<div class="floatl">
						<button index=2>品牌历程</button>
					</div>
					<div class="floatl">
						<button index=3>品牌荣誉</button>
					</div>
					<div class="floatl">
						<button index=4>营销网络</button>
					</div>
					<div class="clearl"></div>
				</div>
			</div>
		</div>
		<!--公司简介-->
		<div id="Introduction">			
			<div class="cContent box">
				<div class="titles">
					<ul>
						<li>
							<p>公司简介</p>
						</li>
						<li>
							<p>Company profile</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<div class="imgAndText">
					<ul>
						<li>
							<img src="__HOME__/img/company01.jpg" />
						</li>
						<li>
							<p>诗尼曼品牌创立于2003年，公司总部位于广东省广州市番禺区，是中国领军定制品牌之一，旗下拥有“诗尼曼全屋定制”、“诗尼曼门窗”、“诗尼曼橱柜”三大定制核心体系，涵盖衣柜、橱柜、门窗、沙发、餐桌椅、床等全品类家居产品，形成多元化、全方位的大家居生态格局。其品牌形象代言人为中国著名女演员、联合国妇女署亲善大使海清，是国内极具竞争力的一站式家装定制服务品牌。</p>
						</li>
						<li>
							<p>诗尼曼引进德国豪迈生产线，并在广东广州和湖北荆门布局千余亩智能生产基地，产能接轨国际。与此同时，全国品牌专卖店超千家，覆盖30余省、市、自治区，连续十余年保持超70%的盈利增长，创造行业黄金增长法则，2017年以42.58亿品牌价值入榜中国500最具价值品牌。</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="cContent box">
				<div class="titles">
					<ul>
						<li>
							<p>品牌使命</p>
						</li>
						<li>
							<p>Corporate Mission</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<div class="imgAndText">
					<ul>
						<li>
							<img src="__HOME__/img/company01.jpg" />
						</li>
						<li>
							<p>诗尼曼家居始终肩负着为现代家庭创造国际化、年轻化、时尚化、个性化的绿色定制生活为使命，秉承“人无我有、人有我变”的创新原理，推出满分空间定制原则，从八大空间系统与八大生活方式的多维视角，打破冰冷的为屋而定制，用科学的方法把空间交给消费者，让消费者享受国际化的家居体验。</p>
						</li>
						<li>
							<p>诗尼曼优选大自然农作物秸秆为原材料的禾香板，关爱家有老人、小孩、孕妇、新婚夫妇的“四类家庭”，引领时尚家居，打造健康生活。</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="cContent box">
				<div class="titles">
					<ul>
						<li>
							<p>品牌愿景</p>
						</li>
						<li>
							<p>Brand Vision</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<div class="imgAndP">
					<ul>
						<li>
							<img src="__HOME__/img/company03.jpg" />
						</li>
						<li>
							<p>红塔创新与诗尼曼家具战略合作签约仪式</p>
						</li>
						<li>
							<img src="__HOME__/img/company04.jpg" />
						</li>
						<li>
							<p>红塔创新与诗尼曼家具战略合作签约仪式</p>
						</li>
						<li>
							<img src="__HOME__/img/company05.jpg" />
						</li>
						<li>
							<p>红塔创新与诗尼曼家具战略合作签约仪式</p>
						</li>
					</ul>
				</div>
				<div class="imgAndText vision">
					<ul>
						<li>
							<p>诗尼曼家居始终肩负着为现代家庭创造国际化、年轻化、时尚化、个性化的绿色定制生活为使命，秉承“人无我有、人有我变”的创新原理，推出满分空间定制原则，从八大空间系统与八大生活方式的多维视角，打破冰冷的为屋而定制，用科学的方法把空间交给消费者，让消费者享受国际化的家居体验。</p>
						</li>
						<li>
							<p>诗尼曼优选大自然农作物秸秆为原材料的禾香板，关爱家有老人、小孩、孕妇、新婚夫妇的“四类家庭”，引领时尚家居，打造健康生活。</p>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--品牌历程-->
		<div id="development" style="display: none;">
			<div class="titles">
				<ul>
					<li>
						<p>品牌历程</p>
					</li>
					<li>
						<p>development history</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="developBox">
				
			</div>
		</div>
		<!--营销网络-->
		<div id="net" class="box" style="display: none;">
			<div class="titles">
				<ul>
					<li>
						<p>品牌历程</p>
					</li>
					<li>
						<p>development history</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="choice2">
				<div class="floatl flr">
					<p>职业分类</p>
					<select>
						<option>职业类型1</option>
						<option>职业类型1</option>
						<option>职业类型1</option>
						<option>职业类型1</option>
					</select>
				</div>
				<div class="floatr flr">
					<p>选择地区</p>
					<select>
						<option>地区1</option>
						<option>地区1</option>
						<option>地区1</option>
						<option>地区1</option>
					</select>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="searchBox">
				<input type="search" placeholder="职业关键词" />
			</div>
			<div class="storeBox" style="display: none;">
				<div class="storeChild">
					<div class="sName">
						<p>番禺钟村诗尼曼专卖店</p>
					</div>
					<div class="sAddress">
						<p>广东省广州市番禺区钟村镇雄峰装饰材料城A1栋102-105</p>
					</div>
					<div class="sTime">
						<p>10:00—21:00</p>
					</div>
				</div>
			</div>
			<div class="noResult">
				<img src="__HOME__/img/nomore.png" />
				<p>很抱歉！没有更多结果！</p>
			</div>
		</div>
		<div id="honor" class="box"  style="display: none;">
			<div class="titles">
				<ul>
					<li>
						<p>品牌历程</p>
					</li>
					<li>
						<p>development history</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="oneImg" data-scroll-reveal="enter top and move 50px">
				<img src="__HOME__/img/honor01.jpg" />
			</div>
			<div class="oneImg" data-scroll-reveal="enter top and move 50px">
				<img src="__HOME__/img/honor02.jpg" />
			</div>
			<div class="oneImg" data-scroll-reveal="enter top and move 50px">
				<img src="__HOME__/img/honor03.jpg" />
			</div>
			<div class="TwoImg">
				<div class="tLeft floatl" style="width: 45.5%;" data-scroll-reveal="enter left and move 50px">
					<img src="__HOME__/img/honor04.jpg" />
				</div>
				<div class="tRight floatr" data-scroll-reveal="enter right and move 50px">
					<img src="__HOME__/img/honor05.jpg" />
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="TwoImg">
				<div class="tLeft floatl" data-scroll-reveal="enter left and move 50px">
					<img src="__HOME__/img/honor06.jpg" />
				</div>
				<div class="tRight floatr" data-scroll-reveal="enter right and move 50px">
					<img src="__HOME__/img/honor07.jpg" />
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="honorp" data-scroll-reveal="enter bottom and move 50px">
				<p>荣誉源自实力，用心铸就辉煌，诗尼曼深耕定制14年，深受市场肯定，先后荣获“全国工商联定制家居专委会执行会长单位”、“大雁奖之中国定制家居领军品牌”、“中国门窗行业金奖”、“定制家居领军品牌+低碳环保示范品牌”、“高新技术企业”、“企业信用评价AAA级信用企业”、“广东省著名商标”、“广州市著名商标”、“番禺高成长企业三十强”、“番禺区先进制造业五十强企业”等多项荣誉。</p>
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
        <div class="floatl" onclick="javascript:window.location.href=''">
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
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>
<script type="text/javascript">
    layui.use('layer', function(){
        var layer = layui.layer;
    });
    function touzizhe(){
        layer.msg('该功能暂未开放');
    }
</script>
<script type="text/javascript" src="__HOME__/js/scrollReveal.js" ></script>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/about.js" ></script>