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

<link rel="stylesheet" href="__HOME__/css/joinUs.css" />

		<!--轮播图+导航-->
		<div id="banner">
			<img src="__HOME__/img/JoinUsBanner.jpg" />
			<nav>
				<div class="navBox box">
					<a class="rNavBtn"><img src="__HOME__/img/return.png"/></a>
					<a class="moreNav"><img src="__HOME__/img/moreNav.png"/></a>
					<p>公司招聘</p>					
				</div>
			</nav>
		</div>
		<!--公司招聘-->
		<div id="companyJob" class="box">
			<div class="titles">
				<ul>
					<li>
						<p>公司招聘</p>
					</li>
					<li>
						<p>The company recruitment</p>
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
			<div class="jobList">
				<div class="joinBox">
					<div class="joinTop">
						<ul>
							<li>
								<p class="jobName">平面设计师</p>
							</li>
							<li>
								<p class="jobNameE">Graphic designer</p>
							</li>
						</ul>
						<div class="applyBtn">
							<button>申请</button>
						</div>
					</div>
					<div class="joinBottom">
						<div class="floatl">
							<p>1人</p>
						</div>
						<div class="floatl">
							<p>广州番禺区</p>
						</div>
						<div class="floatl">
							<p>2017-11-25</p>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="joinBox">
					<div class="joinTop">
						<ul>
							<li>
								<p class="jobName">平面设计师</p>
							</li>
							<li>
								<p class="jobNameE">Graphic designer</p>
							</li>
						</ul>
						<div class="applyBtn">
							<button>申请</button>
						</div>
					</div>
					<div class="joinBottom">
						<div class="floatl">
							<p>1人</p>
						</div>
						<div class="floatl">
							<p>广州番禺区</p>
						</div>
						<div class="floatl">
							<p>2017-11-25</p>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="joinBox">
					<div class="joinTop">
						<ul>
							<li>
								<p class="jobName">平面设计师</p>
							</li>
							<li>
								<p class="jobNameE">Graphic designer</p>
							</li>
						</ul>
						<div class="applyBtn">
							<button>申请</button>
						</div>
					</div>
					<div class="joinBottom">
						<div class="floatl">
							<p>1人</p>
						</div>
						<div class="floatl">
							<p>广州番禺区</p>
						</div>
						<div class="floatl">
							<p>2017-11-25</p>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="choice2 pn">
					<div class="floatl flr">
						<button>上一页</button>
					</div>
					<div class="floatr flr">
						<button>下一页</button>
					</div>
					<div class="clearBoth"></div>
				</div>
			</div>
			<div class="noResult" style="display: none;">
				<img src="__HOME__/img/nomore.png" />
				<p>很抱歉！没有更多结果！</p>
			</div>
		</div>
		<!--详情-->
		<div id="jobDetails">
			<nav>
				<div class="navBox box">
					<a class="rNavBtn closeDetails"><img src="__HOME__/img/return.png"/></a>
					<p>职位详情</p>					
				</div>
			</nav>
			<div class="jdTop box">
				<div class="joinTop">
					<p class="jobName">平面设计师</p>
				</div>
				<div class="joinBottom">
					<div class="floatl">
						<p>1人</p>
					</div>
					<div class="floatl">
						<p>广州番禺区</p>
					</div>
					<div class="floatl">
						<p>2017-11-25</p>
					</div>
					<div class="clearl"></div>
				</div>
			</div>
			<div class="jdContent box">
				<ul>
					<li>
						<p class="jobTitle">职位描述</p>
					</li>
					<li>
						<p>1、负责品牌的视觉形象设计，VI手册的设计制定，产品包装设计、文化形象设计；</p>
					</li>
					<li>
						<p>2、负责品牌终端活动及产品宣传推广应用的各种物料设计、制作、物料下单及收取工作；</p>
					</li>
					<li>
						<p>3、负责品牌网络传播渠道(微信、网站)所需画面形象设计工作；</p>
					</li>
					<li>
						<p>4、负责终端经销商专卖店、广告画面等设计需求;</p>
					</li>
					<li>
						<p>5、负责对接外协支持部门，指导平面视觉符合品牌规范;</p>
					</li>
					<li>
						<p>6、配合经理及其他部门完成各项设计工作；</p>
					</li>
				</ul>
			</div>
			<div class="jdContent jdBottom box ">
				<ul>
					<li>
						<p class="jobTitle">任职要求</p>
					</li>
					<li>
						<p>1、大专以上学历，设计相关专业；</p>
					</li>
					<li>
						<p>2、三年以上相关工作经验；</p>
					</li>
					<li>
						<p>3、熟悉使用CDR、AI、PS等相关设计软件;</p>
					</li>
					<li>
						<p>4、了解印刷工艺、有相关案例(画册、户外、POP促销)等；</p>
					</li>
					<li>
						<p>5、知名广告设计公司或知名家居建材企业工作经验；</p>
					</li>
				</ul>
			</div>
			<div class="applyBox">
				<button class="redmalBtn">申请职位</button>
			</div>
		</div>
		<!--职位弹窗-->
		<div id="jobPop" style="display: none;">
			<div class="jobPop box">
				<img src="__HOME__/img/joinPop.png" />
				<a href="###" class="redClose"><img src="__HOME__/img/redClose.png"/></a>
				<div class="getJob">
					<div class="titles">
						<ul>
							<li>
								<p>申请职位</p>
							</li>
							<li>
								<p>Apply for a position</p>
							</li>
							<li>
								<span></span>
							</li>
						</ul>
					</div>
					<div class="joberMessage">
						<ul>
							<li>
								<input type="text" placeholder="姓名" />
							</li>
							<li>
								<input type="text" placeholder="手机号码" maxlength="11"/>
							</li>
							<li>
								<textarea placeholder="自我描述"></textarea>
							</li>
						</ul>
					</div>
					<div class="selectFile">
						<p class="filesrc p1"></p>
						<p class="fliep">上传简历</p>
						<button>
							选择文件
							<input type="file" class="file" />
						</button>
					</div>
					<div class="submitBtn">
						<button class="redmalBtn">提交</button>
					</div>
				</div>
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
<script src="https://cdn.bootcss.com/touchjs/0.2.14/touch.min.js"></script>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/joinUs.js" ></script>