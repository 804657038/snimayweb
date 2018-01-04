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
<link rel="stylesheet" href="__HOME__/css/demo.css" />
<link rel="stylesheet" href="__HOME__/css/ydui.css" />
<link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
<link rel="stylesheet" href="__HOME__/css/center.css" />


		<div id="bannerNext">
		<!--轮播图-->
			<div class="floatl">
				<div class="swiper-container swiper-container-index">
				    <div class="swiper-wrapper">
                        <?php if(is_array($dz)): foreach($dz as $key=>$dd): ?><div class="swiper-slide">
                                <img src="__PIC__/<?php echo ($dd["original_img"]); ?>" alt="<?php echo ($dd["title"]); ?>" class="img-responsive"/>
                            </div><?php endforeach; endif; ?>
				    </div>
				    <div class="swiper-pagination"></div>
				</div>
			</div>	
			<div class="floatl">
				<ul>
					<li>
						<img src="__HOME__/img/leaveWord.jpg"  class="word" />
						<p>定制留言</p>
					</li>
					<li>						
						<div>
							<img src="__HOME__/img/centers.png"/>
						</div>
						
						<input type="search" name="" id="name" value="" placeholder="您的姓名"/>
					</li>
					<li>
						<div class="phone">
							<img src="__HOME__/img/centers.png"/>
						</div>
						<input type="search" name="" id="phone" value="" placeholder="您的电话"/>
					</li>
					<li class="city">
						<div class="cityes">
							<img src="__HOME__/img/centers.png" />
						</div>
						<input type="search" name="" id="city" value="" placeholder="您的地址"/>
					</li>
					<li>
						<button onclick="addOrder()">提交</button>
					</li>
				</ul>
			</div>
			<div class="clearl"></div>
		</div>
		<!--全屋定制-->
		<div class="shopShow">
			<div class="sNav">
				<div class="floatl">
					<p>全屋定制攻略</p>
				</div>
				<div class="floatr">

					<ul class="childSelect">
                        <?php if(is_array($qw)): foreach($qw as $key=>$q): ?><li <?php if($caid == $q['cat_id']): ?>class="lsdn"<?php endif; ?>  >
							<a href="javascript:;" onclick="getQuanwu('<?php echo ($q["cat_id"]); ?>')"><?php echo ($q["cat_name"]); ?></a>
						</li><?php endforeach; endif; ?>
					</ul>

				</div>
				<div class="clearBoth"></div>
			</div>

			<div class="contentBox" >

				<div class="cLeft floatl" >
					<div class="cImgBox">
						<img id="q_img" src="__PIC__/<?php echo ($quan1["original_img"]); ?>" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1" id="q_title"><?php echo ($quan1["title"]); ?></p>
							</li>
							<li class="pSecond">
								<p class="p2" id="q_short"><?php echo ($quan1["short"]); ?></p>
							</li>
						</ul>
					</div>
				</div>
				<span id="quan">
                <?php if(is_array($quan)): foreach($quan as $key=>$qu): ?><div class="cRight floatl">
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__PIC__/<?php echo ($qu["original_img"]); ?>" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1"><?php echo ($qu["title"]); ?></p>
									</li>
									<li class="pRSecond">
										<p class="p2"><?php echo ($qu["short"]); ?></p>
									</li>
									<li>
										<div class="btnLeft floatl">
                                            <?php if(strstr($qu['tip'],",") != ''){ $tips = explode(',',$qu['tip']); }else{ $tips[] = $qu['tip']; } ?>
											<ul>
                                                <?php if(is_array($tips)): foreach($tips as $key=>$t): ?><li>
													<button><?php echo ($t); ?></button>
												</li><?php endforeach; endif; ?>

											</ul>
										</div>
										<div class="btnRight floatr">
											<a href="###">
												<span></span>
												<span></span>
											</a>
										</div>
										<div class="clearBoth"></div>
									</li>
								</ul>
							</div>
							<div class="clearl"></div>
						</div>
					</div>
                    </div><?php endforeach; endif; ?>
                    </span>


				</div>
				<div class="clearl"></div>
			</div>
		</div>
		<!--小户型拓展-->
		<div class="shopShow">
			<div class="sNav">
				<div class="floatl">
					<p>小户型扩展</p>
				</div>
				<div class="floatr">
					<ul class="childSelect">

                        <?php if(is_array($xhx)): foreach($xhx as $key=>$x): ?><li <?php if($xcaid == $x['cat_id']): ?>class="lsdn"<?php endif; ?>  >
                                <a href="javascript:;" onclick="getXiaohu('<?php echo ($x["cat_id"]); ?>')"><?php echo ($x["cat_name"]); ?></a>
                            </li><?php endforeach; endif; ?>

					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="contentBox">
				<div class="cLeft floatl">
					<div class="cImgBox">
						<img id="x_img" src="__PIC__/<?php echo ($xhux1["original_img"]); ?>" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1" id="x_title"><?php echo ($xhux1["title"]); ?></p>
							</li>
							<li class="pSecond">
								<p class="p2" id="x_short"><?php echo ($xhux1["short"]); ?></p>
							</li>
						</ul>
					</div>
				</div>
				<div class="cRight floatl" id="xiao">

                    <?php if(is_array($xhux)): foreach($xhux as $key=>$xh): ?><div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__PIC__/<?php echo ($xh["original_img"]); ?>" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1"><?php echo ($xh["title"]); ?></p>
									</li>
									<li class="pRSecond">
										<p class="p2"><?php echo ($xh["short"]); ?></p>
									</li>
									<li>
										<div class="btnLeft floatl">
                                            <?php if(strstr($xh['tip'],",") != ''){ $xtips = explode(',',$xh['tip']); }else{ $xtips[] = $xh['tip']; } ?>
											<ul>
                                                <?php if(is_array($xtips)): foreach($xtips as $key=>$xt): ?><li>
													<button><?php echo ($xt); ?></button>
												</li><?php endforeach; endif; ?>

											</ul>
										</div>
										<div class="btnRight floatr">
											<a href="###">
												<span></span>
												<span></span>
											</a>
										</div>
										<div class="clearBoth"></div>
									</li>
								</ul>
							</div>
							<div class="clearl"></div>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
				<div class="clearl"></div>
			</div>
		</div>
		<!--奇葩空间利用-->
		<div class="shopShow sRoom">
			<div class="sNav">
				<div class="floatl">
					<p>奇葩空间利用</p>
				</div>
				<div class="floatr">
					<ul class="childSelect">

                        <?php if(is_array($qp)): foreach($qp as $key=>$pa): ?><li <?php if($pid == $pa['cat_id']): ?>class="lsdn"<?php endif; ?>  >
                            <a href="javascript:;" onclick="getQiqa('<?php echo ($pa["cat_id"]); ?>')"><?php echo ($pa["cat_name"]); ?></a>
                            </li><?php endforeach; endif; ?>


					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="contentBox">
				<div class="cLeft floatl">
					<div class="cImgBox">
						<img id="qi_img" src="__PIC__/<?php echo ($qipa1["original_img"]); ?>" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1" id="qi_title"><?php echo ($qipa1["title"]); ?></p>
							</li>
							<li class="pSecond">
								<p class="p2" id="qi_short"><?php echo ($qipa1["short"]); ?></p>
							</li>
						</ul>
					</div>
				</div>
				<div class="cRight floatl" id="qipa">

                    <?php if(is_array($qipa)): foreach($qipa as $key=>$qi): ?><div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__PIC__/<?php echo ($qi["original_img"]); ?>" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1"><?php echo ($qi["title"]); ?></p>
									</li>
									<li class="pRSecond">
										<p class="p2"><?php echo ($qi["short"]); ?></p>
									</li>
									<li>
										<div class="btnLeft floatl">
                                            <?php if(strstr($qi['tip'],",") != ''){ $qtips = explode(',',$qi['tip']); }else{ $qtips[] = $qi['tip']; } ?>
                                            <ul>
                                                <?php if(is_array($qtips)): foreach($qtips as $key=>$qt): ?><li>
                                                        <button><?php echo ($qt); ?></button>
                                                    </li><?php endforeach; endif; ?>

                                            </ul>
										</div>
										<div class="btnRight floatr">
											<a href="###">
												<span></span>
												<span></span>
											</a>
										</div>
										<div class="clearBoth"></div>
									</li>
								</ul>
							</div>
							<div class="clearl"></div>
						</div>
					</div><?php endforeach; endif; ?>

				</div>
				<div class="clearl"></div>
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
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.citys.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.flexible.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.js" ></script>
<script type="text/javascript" src="__HOME__/js/center.js" ></script>