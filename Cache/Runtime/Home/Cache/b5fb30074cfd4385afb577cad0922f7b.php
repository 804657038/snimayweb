<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
    <link rel="Shortcut Icon" href="/favicon.ico">
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

        var uaTest = /Android|webOS|Windows Phone|iPhone|ucweb|ucbrowser|iPod|BlackBerry/i.test(navigator.userAgent.toLowerCase());
        var touchTest = 'ontouchend' in document;
        if(uaTest && touchTest){
            window.location.href = 'http://m.snimay.com/mobile.php';
        }
    </script>
</head>
<body>
<div id="banner">

    <header class="hedr">
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
                        <?php if($vv['cat_id'] != 62): ?><div class="secondBox">
                            <div class="swiper-container swiper-container-nav">
                                <button><img src="__HOME__/img/leftb.png" class="prevLeft"/></button>
                                <button><img src="__HOME__/img/rightb.png" class="nextRight"/></button>
                                <div class="swiper-wrapper">

                                    <?php if(is_array($vv["chiled"])): foreach($vv["chiled"] as $key=>$c): ?><div class="swiper-slide">
                                        <div class="imgContent">
                                            <div class="navImg" style="overflow: hidden;">
                                                <img src="__PIC__/<?php echo ($c["cat_img"]); ?>" />
                                            </div>
                                            <div class="navContent">
                                                <p><?php echo ($c["cat_name"]); ?></p>
                                                <?php if($c['parent_id'] == 63): ?><a href="javascript:;" onclick="touzizhe()"><img src="__HOME__/img/circleB.png" /></a>
                                                    <?php else: ?>
                                                    <a href="<?php echo ($c["link"]); ?>"><img src="__HOME__/img/circleB.png" /></a><?php endif; ?>
                                            </div>
                                        </div>
                                    </div><?php endforeach; endif; ?>

                                </div>
                            </div>
                        </div><?php endif; ?>
                    </li><?php endforeach; endif; ?>

                    <li class="linkBoxs">
                        <a href="###" class="imgBtn"><img  src="__HOME__/img/more.png"/></a>
                        <div class="linkBox">
                            <ul>
                                <li>
                                    <a href="<?php echo ($arr["link3"]); ?>" target="_black">诗尼曼官网商城</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Business/index');?>" target="_black">诗尼曼全屋定制</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link7"]); ?>" target="_black">诗尼曼橱柜</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link4"]); ?>" target="_black">诗尼曼门窗</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link2"]); ?>" target="_black">天猫官方商城</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link1"]); ?>" target="_black">京东官方商城</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link5"]); ?>" target="_black">商学院学习系统</a>
                                </li>
                                <li>
                                    <a href="<?php echo ($arr["link6"]); ?>" target="_black">经锁商入口</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sBox">
                        <div class="swordBox">
                            <input type="search" id="search_key" placeholder="请输入关键词" class="sword"/>
                        </div>
                        <a href="javascript:;" onclick="searchs()" class="imgBtn searchBtn"><img  src="__HOME__/img/search.png"/></a>
                    </li>
                </ul>
            </div>
            <div class="clearBoth"></div>
        </nav>
        <script type="text/javascript">
            function searchs(){
                var key = $('#search_key').val();
                window.location.href = img_path+"index.php/search?key="+key;
            }
        </script>
    </header>
<link rel="stylesheet" href="__HOME__/lib/css/demo.css" />
<link rel="stylesheet" href="__HOME__/css/ydui.css" />
<link rel="stylesheet" href="__HOME__/css/about.css" />
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>
<script type="text/javascript" src="__HOME__/js/scrollReveal.js" ></script>
<script type="text/javascript">
	var lc_title = <?php echo ($lc_title); ?>;
	var lc_short = <?php echo ($lc_short); ?>;
	var lc_content = <?php echo ($lc_content); ?>;
</script>
<style>
	.pBottom ~ div p{
		line-height: 30px;
		color: #888888;
		font-size: 12px;
	}
    .pinpai ~ p span{
        line-height: 30px;
        color: #888888;
        font-size: 12px;
    }
    .pyuan + p>span{
        line-height: 30px;
        color: #888888;
        font-size: 12px;
    }
</style>



		<!--轮播图-->
			<img src="__PIC__/<?php echo ($guanyu["original_img"]); ?>" />
		</div>
		<!--公司介绍 品牌历程 品牌荣誉 营销网络-->
		<div id="fourPart">
			<!--选择-->
			<div class="netNavs">
				<ul>
					<li>
						<button class="btnActive" eq='0'><span style="font-size: 20px">公司介绍</span></button>
					</li>
					<li>
						<button eq='1'><span style="font-size: 20px">品牌历程</span></button>
					</li>
					<li>
						<button eq='2'><span style="font-size: 20px">品牌荣誉</span></button>
					</li>
					<li>
						<button eq='3'><span style="font-size: 20px">营销网络</span></button>
					</li>
				</ul>
				<div class="clearl"></div>
			</div>
			<!--营销网络-->
			<div class="net" style="display: none;">								
				<div class="bigTitle">
					<ul>
						<li>
							<p class="bt">网络营销</p>
						</li>
						<li>
							<p class="st">Network marketing</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<script type="text/javascript" src="__HOME__/js/map/jquery-1.7.1.min.js" ></script>
				<script type="text/javascript" src="__HOME__/js/map/map.js" ></script>
				<script type="text/javascript" src="__HOME__/js/map/raphael-min.js" ></script>
				<div class="map">
		            <div id="map_container"></div>
				</div>  
				<div class="moreChoice">

					<div class="floatl short area1">

						<img src="__HOME__/img/ms.png" />
						<p isOpen='false' class="provice">省份</p>

					</div>

					<div class="floatl short area2">

						<img src="__HOME__/img/ms.png" />
						<p isOpen='false' class="city_dy">城市</p>

					</div>
					<div class="floatl long">
						<input type="search" id="zw_name" placeholder="请输入关键字" />
						<button onclick="searchData()"></button>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="storeList">
					<table class="more" id="shop_y">
						<tr>
							<td>专卖店名称</td>
							<td>专卖店地址</td>
							<td>营业时间</td>
						</tr>
						<?php if(is_array($men)): foreach($men as $key=>$vo): ?><tr>
                                <td><?php echo ($vo["z_name"]); ?></td>
                                <td><?php echo ($vo["z_loca"]); ?></td>
                                <td><?php echo ($vo["z_tel"]); ?></td>
                            </tr><?php endforeach; endif; ?>

					</table>
					<table class="nomore" id="shop_n" style="display: none;">
						<tr>
							<td>专卖店名称</td>
							<td>专卖店地址</td>
							<td>营业时间</td>
						</tr>
						<tr>
							<td colspan="3">
								<div class="nomored">
									<img src="__HOME__/img/centers.png" />
								</div>
								<p>很抱歉，该地区暂时没有门店！</p>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<!--公司简介-->
			<div class="profile">				
				<div class="proBox">
					<div class="proImg floatl">
						<div class="floatl">
							<img src="__PIC__/<?php echo ($gsImg['k0']['original_img']); ?>" />
						</div>
						<div class="floatl">
							<img src="__PIC__/<?php echo ($gsImg['k1']['original_img']); ?>" />
						</div>
					</div>
					<div class="proContent floatl">
						<ul>
							<li>
								<p class="jobNameM p1"><span style="font-size: 20px"><?php echo ($gs["title"]); ?></span></p>
							</li>
							<li>
								<p class="jobNameS p1">Company profile</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
							<li>
								<p class="pTop"><?php echo ($gs["short"]); ?></p>
							</li>
							<li>
								<p class="pBottom"><?php echo ($gs["content"]); ?></p>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
					<div class="imgSmallBox">
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($gsImg['k2']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($gsImg['k3']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($gsImg['k4']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($gsImg['k5']['original_img']); ?>" />
						</div>
						<div class="clearl"></div>
					</div>
				</div>	
				<div class="proBox brand">					
					<div class="proContent floatl">
						<ul>
							<li>
								<p class="jobNameM p1"><span style="font-size: 20px"><?php echo ($pinpai["title"]); ?></span></p>
							</li>
							<li>
								<p class="jobNameS p1">Corporate Mission</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
							<li>
								<p class="pTop"><?php echo ($pinpai["short"]); ?></p>
							</li>
							<li>
								<p class="pBottom pinpai"><?php echo ($pinpai["content"]); ?></p>
							</li>
						</ul>
					</div>
					<div class="proImg floatl">
						<div class="floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k0']['original_img']); ?>" />
						</div>
						<div class="floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k1']['original_img']); ?>" />
						</div>
					</div>
					<div class="clearl"></div>
					<div class="imgSmallBox">
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k2']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k3']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k4']['original_img']); ?>" />
						</div>
						<div class="imgSmall floatl">
							<img src="__PIC__/<?php echo ($pinpaiImg['k5']['original_img']); ?>" />
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="hope">
					<div class="bigTitle">
						<ul>
							<li>
								<p class="bt"><font style="font-size: 20px"><?php echo ($yuanj["title"]); ?></font></p>
							</li>
							<li>
								<p class="st">Brand Vision</p>
							</li>
							<li>
								<span></span>
							</li>
						</ul>
					</div>
					<div class="hopeBox">
						<div class="hopeTitle">
							<p class="pyuan"><?php echo ($yuanj["content"]); ?></p>
						</div>
						<div class="hBox">
							<div class="hImg floatl">
								<div class="hImgBox">
									<img src="__PIC__/<?php echo ($yuanImg['k0']['original_img']); ?>" />
								</div>
								<p class="p1"><?php echo ($yuanImg['k0']['title']); ?></p>
							</div>
							<div class="hImg floatl">
								<div class="hImgBox">
									<img src="__PIC__/<?php echo ($yuanImg['k1']['original_img']); ?>" />
								</div>
								<p class="p1"><?php echo ($yuanImg['k1']['title']); ?></p>
							</div>
							<div class="hImg floatl">
								<div class="hImgBox">
									<img src="__PIC__/<?php echo ($yuanImg['k2']['original_img']); ?>" />
								</div>
								<p class="p1"><?php echo ($yuanImg['k2']['title']); ?></p>
							</div>
							<div class="clearl"></div>
						</div>
					</div>
				</div>
			</div>
			<!--公司荣誉-->
			<div class="honor"style="display: none;">
				<div class="honorBox">
					<div class="hTBox">
						<ul>
							<li>
								<p class="jobNameM p1"><?php echo ($rongy["title"]); ?></p>
							</li>
							<li>
								<p class="jobNameS p1">Brand honor</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="honorIntro">
						<p><?php echo ($rongy["short"]); ?></p>
					</div>
					<div class="honorImg">
						<img src="__PIC__/<?php echo ($rongy["original_img"]); ?>" />
					</div>
				</div>
			</div>
			<!--发展历程-->
			<div class="development"style="display: none;">
				<div class="bigTitle">
					<ul>
						<li>
							<p class="bt">发展历程</p>
						</li>
						<li>
							<p class="st">Development history</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<div class="moreYear"><div class="dashed"></div></div>
			</div>
		</div>


<!--侧边导航-->
<div id="rightNav">
    <div class="rNavChild">
        <ul>
            <li>
                <a href="<?php echo U('Center/center_four');?>" target="_black"><img src="__HOME__/img/circle.png" /></a>
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
                <a href="http://p.qiao.baidu.com//im/index?siteid=2911356&ucid=6160127" target="_black"><img src="__HOME__/img/circle.png" /></a>
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
                <a href="<?php echo U('Book/index');?>" target="_black"><img src="__HOME__/img/circle.png" /></a>
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
                <a href="<?php echo U('JoinMessage/index');?>" target="_black"><img src="__HOME__/img/circle.png" /></a>
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
                <a href="<?php echo ($arr["link2"]); ?>" target="_black">诗尼曼天猫旗舰店</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link1"]); ?>" target="_black">诗尼曼京东旗舰店</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link5"]); ?>" target="_black">商学院学习系统</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link6"]); ?>" target="_black">经销商登录</a>
            </li>
            <li>
                <a href="<?php echo ($arr["link7"]); ?>" target="_black">橱柜加盟</a>
            </li>
            <li>
                <a href="https://www.tianyancha.com/company/3093933522" target="_black">企业营业执照</a>
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
                        <a href="<?php echo U('Social/index');?>"><p>社会责任</p></a>
                    </li>


                    <li>
                        <p>资讯中心</p>
                    </li>
                    <li>
                        <a href="<?php echo U('Center/center_four');?>">家装攻略</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Center/center_four');?>">新闻中心</a>
                    </li>

                </ul>
            </div>
            <div class="allServer">
                <ul>
                    <li>
                        <p>投资者关系</p>
                    </li>
                    <?php if(is_array($touzi)): foreach($touzi as $key=>$tu): ?><li>
                        <a href="javascript:;" onclick="touzizhe()"><?php echo ($tu["cat_name"]); ?></a>
                    </li><?php endforeach; endif; ?>

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
        <p>Copyright&copy;2017<?php echo ($arr["icp"]); ?> 广州诗尼曼家居股份有限公司</p>
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
<script type="text/javascript" src="__HOME__/js/about.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.citys.js" ></script>