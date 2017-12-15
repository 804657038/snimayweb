<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo ($arr["title"]); ?></title>
    <meta name="keywords" content="<?php echo ($arr["keyword"]); ?>">
    <meta name="description" content="<?php echo ($arr["description"]); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__HOME__/css/swiper-3.4.2.min.css" />
    <link rel="stylesheet" href="__HOME__/css/reset.min.css" />
    <link rel="stylesheet" href="__HOME__/css/public.css" />
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="__HOME__/js/swiper-3.4.2.min.js" ></script>
    <script type="text/javascript">
        var logo1 = <?php echo ($logo1); ?>;
        var logo2 = <?php echo ($logo2); ?>;
        var imgLink = 'http://127.0.0.1/snimayweb/Home/Tpl/';
        var img_path = 'http://127.0.0.1/snimayweb/';
    </script>
</head>
<body>
<div id="banner">
    <!--导航-->
    <header>
        <nav>
            <div class="floatl logoL">
                <a href="http://127.0.0.1/snimayweb/">
                    <img src="<?php echo ($logo["original_img"]); ?>" />
                </a>
            </div>

            <div class="floatr navR">
                <ul>
                    <li <?php if($catid == 1): ?>class="nActive"<?php endif; ?> >
                        <a href="http://127.0.0.1/snimayweb/">首页</a>
                    </li>
                    <?php if(is_array($art)): foreach($art as $key=>$vv): ?><li <?php if($catid == $vv['cat_id']): ?>class="nActive"<?php endif; ?> >
                        <a href="<?php echo ($vv["link"]); ?>"><?php echo ($vv["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

                    <li>
                        <a href="###" class="imgBtn"><img  src="__HOME__/img/more.png"/></a>
                    </li>
                    <li>
                        <a href="###" class="imgBtn"><img  src="__HOME__/img/search.png"/></a>
                    </li>
                </ul>
            </div>
            <div class="clearBoth"></div>
        </nav>
    </header>
<link rel="stylesheet" href="__HOME__/css/social.css" />

		<!--轮播图-->
			<img src="__PIC__/<?php echo ($guanyu["original_img"]); ?>"/>
		</div>
		<section id="idea">
			<div class="bigTitle">
				<ul>
					<li>
						<p class="bt">公益理念</p>
					</li>
					<li>
						<p class="st">Good idea</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="heartBox">
				<img src="__PIC__/<?php echo ($gy["original_img"]); ?>" />
				<div class="hContent">
					<p><?php echo ($gy["description"]); ?></p>
				</div>
			</div>
		</section>
		<section id="road">
			<div class="bigTitle">
				<ul>
					<li>
						<p class="bt">公益之路</p>
					</li>
					<li>
						<p class="st">The road to public welfare</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div>
				<div class="loadBar">
					
				</div>
			</div>
			<div class="loveBox">
				<div class="loveLeft floatl">
					<img src="__HOME__/img/child.jpg" />
				</div>
				<div class="loveRight floatl">
					<ul>
						<li>
							<p class="lTitle">助力“小水滴新生”，积小爱成大善</p>
						</li>
						<li>
							<p class="date">2016-2017</p>
							<div class="line"></div>
						</li>
						<li>
							<p>小水滴新生专项基金” 是由China Little Flower发起，在中国华侨公益基金会注册的专项基金，专为患病的孤儿及贫困家庭患儿提供医疗救助、专业护理、术后寄养、监护人住宿及回访的全面服务。作为社会的爱心主体之一，诗尼曼与品牌形象代言人海清、媒体、公益机构携手，于2016年-2017年连续两年资助小水滴项目，让更多的患病孤儿及贫困家庭的患儿们得到更好的医疗救助。</p>
						</li>
					</ul>
				</div>
				<div class="clearl"></div>
			</div>
		</section>
		<section id="activity">
			<div class="bigTitle">
				<ul>
					<li>
						<p class="bt">公益活动</p>
					</li>
					<li>
						<p class="st">Public welfare activities</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="activityBox">
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">助力“小水滴新生”，积小爱成大善</p>
						</li>
						<li>
							<p class="aContent p2">“小水滴新生专项基金” 是由China Little Flower发起，在中国华侨公益基金会注册......</p>
						</li>
					</ul>
				</div>
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">关爱贫困人口 助力脱贫攻坚</p>
						</li>
						<li>
							<p class="aContent p2">作为广东省标杆企业，诗尼曼有责任和义务积极投身广东新时期脱贫攻坚事业......</p>
						</li>
					</ul>
				</div>
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">“国民媳妇衣柜日”,给孩子一个健康的家</p>
						</li>
						<li>
							<p class="aContent p2">“国民媳妇日”是诗尼曼首创健康居家的代言日，活动秉承“相知相伴诗尼曼......</p>
						</li>
					</ul>
				</div>
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">dream爱梦想，成立梦想读书站</p>
						</li>
						<li>
							<p class="aContent p2">为让每个爱读书、有理想的孩子有书可读，广东衣柜行业协会联合狮子会启动......</p>
						</li>
					</ul>
				</div>
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">“阳光天使，点燃梦想”慈善拍卖</p>
						</li>
						<li>
							<p class="aContent p2">2013年8月19日广东狮子会阳光天使服务队在广州珠江新城四季酒店举办以......</p>
						</li>
					</ul>
				</div>
				<div class="activityChild floatl">
					<ul>
						<li>
							<div class="aImg">
								<img src="__HOME__/img/activityImg.jpg" />
								<p>2016-2017</p>
							</div>
						</li>
						<li>
							<p class="aTitle p1">光头行动，用爱照亮明天</p>
						</li>
						<li>
							<p class="aContent p2">白血病是多少人的噩梦，它不仅摧残患者的身体，更使人在精神上承受无尽......</p>
						</li>
					</ul>
				</div>
				<div class="clearl"></div>
			</div>
		</section>
<!--侧边导航-->
<div id="rightNav">
    <div class="rNavChild">
        <ul>
            <li>
                <a href="###"><img src="__HOME__/img/circle.png" /></a>
                <p>最新消息</p>
            </li>
            <li>
                <img src="__HOME__/img/centers.png" />
            </li>
        </ul>
    </div>
    <div class="rNavChild">
        <ul>
            <li>
                <a href="###"><img src="__HOME__/img/circle.png" /></a>
                <p>在线咨询</p>
            </li>
            <li>
                <img src="__HOME__/img/centers.png" />
            </li>
        </ul>
    </div>
    <div class="rNavChild">
        <ul>
            <li>
                <a href="###"><img src="__HOME__/img/circle.png" /></a>
                <p>预约量尺</p>
            </li>
            <li>
                <img src="__HOME__/img/centers.png" />
            </li>
        </ul>
    </div>
    <div class="rNavChild">
        <ul>
            <li>
                <a href="###"><img src="__HOME__/img/circle.png" /></a>
                <p>加盟留言</p>
            </li>
        </ul>
    </div>
</div>
<!--回到顶部-->
<div id="goToTop">
    <a href="###"><img src="__HOME__/img/centers.png"/></a>
</div>
<!--尾部-->
<footer id="foot">
    <!--尾部上部-->
    <div class="fTop" align="center">
        <ul>
            <li>
                <a href="<?php echo ($arr["link2"]); ?>">诗尼曼天猫旗舰店</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link1"]); ?>">诗尼曼京东旗舰店</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link5"]); ?>">商学院学习系统</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link6"]); ?>">经销商登录</a>
            </li>
            <li>
                <a href="###">站点地图</a>
            </li>
            <li>
                <a href="###">企业营业执照</a>
            </li>
        </ul>
    </div>
    <!--尾部中部-->
    <div class="fMiddle">
        <div class="fMLeft floatl">
            <div class="allServer">
                <ul>
                    <li>
                        <p>业务中心</p>
                    </li>
                    <?php if(is_array($acat)): foreach($acat as $key=>$v1): ?><li>
                        <a href="<?php echo ($v1["link"]); ?>"><?php echo ($v1["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>品质服务</p>
                    </li>
                    <?php if(is_array($pzcat)): foreach($pzcat as $key=>$vp): ?><li>
                        <a href="<?php echo ($vp["link"]); ?>"><?php echo ($vp["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>加入诗尼曼</p>
                    </li>
                    <?php if(is_array($zpcat)): foreach($zpcat as $key=>$zp): ?><li>
                        <a href="<?php echo ($zp["link"]); ?>"><?php echo ($zp["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>社会责任</p>
                    </li>
                    <?php if(is_array($gyhd)): foreach($gyhd as $key=>$gy): ?><li>
                        <a href="<?php echo ($gy["link"]); ?>"><?php echo ($gy["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

                    <li>
                        <p>新闻中心</p>
                    </li>
                    <li>
                        <a href="###">公司新闻</a>
                    </li>
                    <li>
                        <a href="###">媒体报道</a>
                    </li>
                    <li>
                        <a href="###">家居常识</a>
                    </li>
                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>投资者关系</p>
                    </li>
                    <li>
                        <a href="###">最新公告</a>
                    </li>
                    <li>
                        <a href="###">战略投资价值</a>
                    </li>
                    <li>
                        <a href="###">投资者服务</a>
                    </li>
                    <li>
                        <a href="###">年报下载</a>
                    </li>
                    <li>
                        <a href="###">实时股价</a>
                    </li>
                    <li>
                        <a href="###">股东大会通知</a>
                    </li>
                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>关于诗尼曼</p>
                    </li>
                    <li>
                        <a href="###">公司简介</a>
                    </li>
                    <li>
                        <a href="###">品牌历程</a>
                    </li>
                    <li>
                        <a href="###">品牌荣誉</a>
                    </li>
                    <li>
                        <a href="###">营销网络</a>
                    </li>
                </ul>
            </div>
            <div class="clearl"></div>
        </div>

        <div class="fMRight floatl">
            <ul>
                <li>
                    <p>全国加盟热线</p>
                </li>
                <li>
                    <p><?php echo ($arr["tel_join"]); ?></p>
                </li>
                <li>
                    <p>全国服务热线</p>
                </li>
                <li>
                    <p><?php echo ($arr["tel_hot"]); ?></p>
                </li>
                <li>
                    <div class="floatl">
                        <a href="http://weibo.com/u/1763136224?topnav=1&wvr=6&topsug=1"></a>
                    </div>
                    <div class="floatl">
                        <a href="###" class="wechat">
                            <div class="zhanwei"></div>
                            <div class="wtBox">
                                <img src="__PIC__/<?php echo ($weixin["original_img"]); ?>" />
                                <div class="floatl">
                                    <p>诗尼曼服务号</p>
                                </div>
                                <div class="floatl">
                                    <p>诗尼曼订阅号</p>
                                </div>
                                <div class="clearl"></div>
                            </div>
                        </a>
                    </div>
                    <div class="clearl"></div>
                </li>
            </ul>
        </div>
        <div class="clearl"></div>
    </div>
    <!--尾部底部-->
    <div class="fBottom">
        <p>Copyright&copy;2017<?php echo ($arr["icp"]); ?></p>
    </div>
</footer>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
</body>
</html>
<script type="text/javascript" src="__HOME__/js/social.js" ></script>