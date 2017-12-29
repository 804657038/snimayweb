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
    <link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
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
                    <li <?php if($catid == 0): ?>class="nActive"<?php endif; ?> >
                        <a href="http://127.0.0.1/snimayweb/">首页</a>
                    </li>
                    <?php if(is_array($art)): foreach($art as $key=>$vv): ?><li <?php if($catid == $vv['cat_id']): ?>class="nActive"<?php endif; ?> >
                        <?php if($vv['cat_id'] == 63): ?><a href="javascript:;" onclick="touzizhe()"><?php echo ($vv["cat_name"]); ?></a>
                            <?php else: ?>
                        <a href="<?php echo ($vv["link"]); ?>"><?php echo ($vv["cat_name"]); ?></a><?php endif; ?>
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
<link rel="stylesheet" href="__HOME__/css/business.css" />

		<!--轮播图-->
			<img src="__PIC__/<?php echo ($guanyu["original_img"]); ?>" />
		</div>
		<a id="threeD" href="####">
			<img src="__HOME__/img/3D.png" />
		</a>
		<div id="choiceBox">
			<div class="cType">
				<div class="typeBox">
					<div class="tTitle">
						<p>全部</p>
					</div>
					<div class="tBox all">
					</div>
					<div class="clearl"></div>
				</div>

                <?php if(is_array($goodscat)): foreach($goodscat as $k=>$vo): ?><div class="typeBox">
					<div class="tTitle">
						<p><?php echo ($vo["cat_name"]); ?></p>
					</div>

                    <div class="tBox <?php if($k == 0): ?>room <?php elseif($k == 1): ?> style <?php elseif($k == 2): ?>series<?php else: endif; ?>">
						<div class="clBox">
                            <?php $ground = $vo['ground']; ?>
                            <?php if(is_array($ground)): foreach($ground as $k1=>$vv): ?><a href="javascript:;" class="choiceList cl<?php echo ($k1+1); ?>" index='<?php echo ($k1+1); ?>' catid="<?php echo ($vv["id"]); ?>">
								<p><?php echo ($vv["title"]); ?></p>
								<span></span>
							</a><?php endforeach; endif; ?>

							<div class="clearl"></div>
						</div>
					</div>
				</div><?php endforeach; endif; ?>


				<!--<div class="typeBox">-->
					<!--<div class="tTitle">-->
						<!--<p>风格</p>-->
					<!--</div>-->
					<!--<div class="tBox style">-->
						<!--<div class="clBox">-->
							<!--<a href="###" class="choiceList cl1" index='1'>-->
								<!--<p>简欧风格</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl2" index='2'>-->
								<!--<p>欧式风格</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl3" index='3'>-->
								<!--<p>都市时尚风格</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl4" index='4'>-->
								<!--<p>现代简约风格</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl5" index='5'>-->
								<!--<p>新中式风格</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<div class="clearl"></div>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->
				<!--<div class="typeBox">-->
					<!--<div class="tTitle">-->
						<!--<p>系列</p>-->
					<!--</div>-->
					<!--<div class="tBox series">-->
						<!--<div class="clBox">-->
							<!--<a href="###" class="choiceList cl1" index='1'>-->
								<!--<p>Basic贝思科</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl2" index='2'>-->
								<!--<p>唐顿庄园</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl3" index='3'>-->
								<!--<p>印象极简</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl4" index='4'>-->
								<!--<p>星光系列</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl5" index='5'>-->
								<!--<p>都市梦想</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl6" index='6'>-->
								<!--<p>E灵动</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<div class="clearl"></div>-->
						<!--</div>-->
						<!--<div class="clBox">-->
							<!--<a href="###" class="choiceList cl7" index='7'>-->
								<!--<p>米谨利</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl8" index='8'>-->
								<!--<p>优生活系列</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl9" index='9'>-->
								<!--<p>风尔赛系列</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl10" index='10'>-->
								<!--<p>洛可可</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl11" index='11'>-->
								<!--<p>D调奢华</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl12" index='12'>-->
								<!--<p>凯撒</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<div class="clearl"></div>-->
						<!--</div>-->
						<!--<div class="clBox">-->
							<!--<a href="###" class="choiceList cl13" index='13'>-->
								<!--<p>凯旋门</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl14" index='14'>-->
								<!--<p>埃菲尔</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl15" index='15'>-->
								<!--<p>榻榻米</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl16" index='16'>-->
								<!--<p>月亮宝盒</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl17" index='17'>-->
								<!--<p>配套产品 -沙发</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl18" index='18'>-->
								<!--<p>配套产品-床</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<div class="clearl"></div>-->
						<!--</div>-->
						<!--<div class="clBox">-->
							<!--<a href="###" class="choiceList cl19" index='19'>-->
								<!--<p>配套产品-床垫</p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<a href="###" class="choiceList cl20" index='20'>-->
								<!--<p>其他配套产品 </p>-->
								<!--<span></span>-->
							<!--</a>-->
							<!--<div class="clearl"></div>-->
						<!--</div>-->
					<!--</div>-->
				<!--</div>-->
			</div>
		</div>
		<div id="results">
			<div class="resultBox">

                <?php if(is_array($good)): foreach($good as $key=>$go): ?><div class="result floatl" onclick="details('<?php echo ($go["goods_id"]); ?>')">
                        <div class="rImg">
                            <img src="__PIC__/<?php echo ($go["goods_img"]); ?>" alt="" />
                        </div>
                        <div class="rContent">
                            <div class="floatl rp">
                                <p><?php echo ($go["title"]); ?><span></span></p>
                            </div>
                            <div class="floatl rm">
                                <a href="javascript:;"><img src="__HOME__/img/circleB.png"/></a>
                            </div>
                            <div class="clearl"></div>
                        </div>
                    </div><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
			<div class="page" align="center">
                <?php echo ($page); ?>
			</div>
		</div>

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
                <a href="<?php echo U('Book/index');?>"><img src="__HOME__/img/circle.png" /></a>
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
                <a href="<?php echo U('JoinMessage/index');?>"><img src="__HOME__/img/circle.png" /></a>
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
                        <a href="<?php echo U('Center/center_four');?>">公司新闻</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Center/center_four');?>">媒体报道</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Center/center_four');?>">家居常识</a>
                    </li>
                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>投资者关系</p>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">最新公告</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">战略投资价值</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">投资者服务</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">年报下载</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">实时股价</a>
                    </li>
                    <li>
                        <a href="javascript:;" onclick="touzizhe()">股东大会通知</a>
                    </li>
                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>关于诗尼曼</p>
                    </li>
                    <?php if(is_array($join)): foreach($join as $key=>$j): ?><li>
                        <a href="<?php echo ($j["link"]); ?>"><?php echo ($j["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

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
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
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
<script type="text/javascript" src="__HOME__/js/business.js" ></script>