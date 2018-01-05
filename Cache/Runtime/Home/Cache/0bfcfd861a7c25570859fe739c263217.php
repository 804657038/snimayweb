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
<!--<link rel="stylesheet" href="__HOME__/lib/css/layui.css" />-->
<link rel="stylesheet" href="__HOME__/css/book.css" />
		<!--轮播图-->
            <img src="__PIC__/<?php echo ($guanyu["original_img"]); ?>" />
			<div class="step">
				<div class="stepBox">
					<div class="stepChild scActive1">
						<div class="spl">
							
						</div>
						<div class="spm">
							<p class="spm1">个性搭配</p>
							<p class="spm2">功能化模版任意搭配</p>
						</div>
						<div class="spr">
							<p>01</p>
						</div>
					</div>
					<div class="stepChild scActive2">
						<div class="spl">
							
						</div>
						<div class="spm">
							<p class="spm1">提升收纳</p>
							<p class="spm2">70m² 装出 100m² 的感觉</p>
						</div>
						<div class="spr">
							<p>02</p>
						</div>
					</div>
					<div class="stepChild scActive3">
						<div class="spl">
							
						</div>
						<div class="spm">
							<p class="spm1">创意设计</p>
							<p class="spm2">70m² 装出 100m² 的感觉</p>
						</div>
						<div class="spr">
							<p>03</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!--预约-->
		<div id="book">
			<div class="bookTop">
				<div class="btBox floatl btb1">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">网上预约时间</p>
						</li>
						<li>
							<p class="bpt2">01</p>
						</li>
					</ul>
				</div>
				<div class="btBox floatl btb2">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">免费量尺</p>
						</li>
						<li>
							<p class="bpt2">02</p>
						</li>
					</ul>
				</div>
				<div class="btBox floatl btb3">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">免费设计方案</p>
						</li>
						<li>
							<p class="bpt2">03</p>
						</li>
					</ul>
				</div>
				<div class="btBox floatl btb4">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">签约合同</p>
						</li>
						<li>
							<p class="bpt2">04</p>
						</li>
					</ul>
				</div>
				<div class="btBox floatl btb5">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">免费送货上门</p>
						</li>
						<li>
							<p class="bpt2">05</p>
						</li>
					</ul>
				</div>
				<div class="btBox floatl btb6">
					<ul>
						<li>
							<div class="btImg"></div>
						</li>
						<li>
							<p class="bpt1">终身维护</p>
						</li>
						<li>
							<p class="bpt2">06</p>
						</li>
					</ul>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="bookTitle">
				<div class="bigTitle">
					<ul>
						<li>
							<p class="bt">预约量尺</p>
						</li>
						<li>
							<p class="st">Book you free home measuring service</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
			</div>
			<div class="bookForm">
				<ul>
					<li class="type">
						<div class="typeBox">
							<div class="typeList">
                                <?php if(is_array($goodscat)): foreach($goodscat as $k1=>$gg): ?><div class="floatl types">
									<button <?php if($k1 == 0): ?>class="btnActive"<?php endif; ?>><?php echo ($gg["type_name"]); ?></button>
								</div><?php endforeach; endif; ?>

								<div class="clearl"></div>
							</div>
							<p>品类选择</p>
                            <?php $count = count($goodscat); ?>
                            <?php if($count > 4): ?><a href="###" class="moreType" isOpen = 'false'><img src="__HOME__/img/ms.png"/></a><?php endif; ?>
						</div>	
					</li>
					<li class="name">
						<input type="search" id="name" placeholder="您的姓名"/>
					</li>
					<li class="phone">
						<input type="search" id="phone" placeholder="您的电话"/>
					</li>
					<li class="city">
						<div class="floatl area1">
							<p>请选择省</p>						
						</div>
						<div class="floatl area2">
							<p>请选择市</p>
						</div>
						<div class="floatr area3">
							<p>请选择区</p>
						</div>
						<div class="clearBoth"></div>
					</li>
					<li>
						<button class="btn" onclick="add_order()">确定提交</button>
					</li>
				</ul>
				<p class="titleWarm">温馨提示：已交付定金的客户请勿申请，谢谢~</p>
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
<script type="text/javascript" src="__HOME__/js/ydui.citys.js" ></script>
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
<script type="text/javascript" src="__HOME__/js/book.js" ></script>