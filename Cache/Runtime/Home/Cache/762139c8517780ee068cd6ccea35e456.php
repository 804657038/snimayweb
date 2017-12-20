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
                    <li <?php if($catid == 0): ?>class="nActive"<?php endif; ?> >
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
<link rel="stylesheet" href="__HOME__/css/index.css" />

		<!--轮播图-->
			<div class="swiper-container swiper-container-index">
			    <div class="swiper-wrapper">
                    <?php if(is_array($ads)): foreach($ads as $key=>$vo): ?><div class="swiper-slide">
			        	<a href="<?php echo ($vo["link"]); ?>"><img src="<?php echo ($vo["original_img"]); ?>" alt="<?php echo ($vo["title"]); ?>" class="img-responsive"/></a>
			        </div><?php endforeach; endif; ?>

			    </div>
			    <div class="swiper-pagination"></div>
			</div>
		</div>

		<!--业务中心-->
		<div id="businessCenter">
			<div class="floatl">
				<p>业务中心</p>
				<p>Business Center</p>
			</div>
            <?php if(is_array($acat)): foreach($acat as $key=>$v1): ?><div class="floatl">
				<a href="###">
					<div>
						<div>
							<img src="__HOME__/img/centers.png" />
						</div>
					</div>
					<p><?php echo ($v1["cat_name"]); ?></p>
				</a>
			</div><?php endforeach; endif; ?>
			<div class="clearl"></div>
		</div>
		<!--诗尼曼介绍-->
		<div id="introduce">
			<div class="introBox">
				<div class="floatl imgBox">
					<div class="moreFun">
						<img alt="<?php echo ($soreArr['k0']['title']); ?>" src="<?php echo ($soreArr['k0']['original_img']); ?>" />
						<a href="<?php echo ($soreArr['k0']['link']); ?>">
							<div class="joiningBox">
								<img src="__HOME__/img/centers.png" />
							</div>
							<p><?php echo ($soreArr['k0']['title']); ?></p>
						</a>
					</div>
				</div>
				<div class="floatl imgAndContent">
					<div class="icTop">
						<ul>
							<li>
								<p>加入诗尼曼</p>
							</li>
							<li>
								<p>Join The Poet Neiman</p>
							</li>
							<li>
								<p></p>
							</li>
							<li>
								<p><?php echo ($soreArr['k0']['description']); ?></p>
							</li>
						</ul>
					</div>
					<div class="icBottom">
						<div class="floatl">
							<div class="moreFun">
								<img alt="<?php echo ($soreArr['k1']['title']); ?>" src="<?php echo ($soreArr['k1']['original_img']); ?>" />
								<a href="<?php echo ($soreArr['k1']['link']); ?>">
									<div class="businessBox">
										<img src="__HOME__/img/centers.png" />
									</div>		
									<p><?php echo ($soreArr['k1']['title']); ?></p>
								</a>
							</div>
						</div>
						<div class="floatl">
							<div class="moreFun">
								<img alt="<?php echo ($soreArr['k2']['title']); ?>" src="<?php echo ($soreArr['k2']['original_img']); ?>" />
								<a href="<?php echo ($soreArr['k2']['link']); ?>">
									<div class="findBox businessBox">
										<img src="__HOME__/img/centers.png" />
									</div>
									<p><?php echo ($soreArr['k2']['title']); ?></p>
								</a>
							</div>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="clearl"></div>
			</div>
			<div class="introBox introBox1">
				<div class="floatl imgAndContent">
					<div class="icTop">
						<ul>
							<li>
								<p><?php echo ($soreArr['k5']['title']); ?></p>
							</li>
							<li>
								<p><?php echo ($soreArr['k5']['en_title']); ?></p>
							</li>
							<li>
								<p></p>
							</li>
							<li>
								<p><?php echo ($soreArr['k5']['description']); ?></p>
							</li>
						</ul>
					</div>
					<div class="icBottom">
						<div class="floatl">
							<div class="moreFun">
								<img alt="<?php echo ($soreArr['k3']['title']); ?>" src="<?php echo ($soreArr['k3']['original_img']); ?>" />
								<div class="imgPop">
									<div class="orderBox">
										<img src="__HOME__/img/centers.png" />
									</div>
									<p><?php echo ($soreArr['k3']['title']); ?></p>
									<div align="center">
										<ul class="od">
											<li>
												<a href="###">入户空间</a>
											</li>
											<li>
												<a href="###">多功能房</a>
											</li>
											<li>
												<a href="###">餐厅</a>
											</li>
											<li>
												<a href="###">卧房</a>
											</li>
										</ul>
										<ul class="od">
											<li>
												<a href="###">阳台空间</a>
											</li>
											<li>
												<a href="###">儿 童 房</a>
											</li>
											<li>
												<a href="###">客厅</a>
											</li>
											<li>
												<a href="###">厨房</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="floatl">
							<div class="moreFun">
								<img alt="<?php echo ($soreArr['k4']['title']); ?>" src="<?php echo ($soreArr['k4']['original_img']); ?>" />
								<a href="<?php echo ($soreArr['k4']['link']); ?>">
									<div class="serverBox businessBox">
										<img src="__HOME__/img/centers.png" />
									</div>
									<p><?php echo ($soreArr['k4']['title']); ?></p>
								</a>
							</div>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="floatl imgBox">
					<div class="moreFun">
						<img alt="<?php echo ($soreArr['k5']['title']); ?>" src="<?php echo ($soreArr['k5']['original_img']); ?>" />
						<a href="<?php echo ($soreArr['k5']['link']); ?>">
							<div class="loveOrderBox">
								<img src="__HOME__/img/centers.png" />
							</div>
							<p><?php echo ($soreArr['k5']['title']); ?></p>
						</a>
					</div>
				</div>
				<div class="clearl"></div>
			</div>
		</div>
		<!--咨询中心-->
		<div id="consultCenter">
			<div class="ccTitle">
				<ul>
					<li>
						<p>资讯中心</p>
					</li>
					<li>
						<p>Information center</p>
					</li>
					<li>
						<p></p>
					</li>
				</ul>
			</div>
			<div class="ccBox">
				<div class="floatl">
					<div class="ccImg01 ccImg">
						<img src="<?php echo ($zxArr['k0']['original_img']); ?>" />
						<div class="ccOn">
							<ul>
								<li>
									<p><?php echo ($zxArr['k0']['title']); ?></p>
								</li>
								<li>
									<p><?php echo ($zxArr['k0']['en_title']); ?></p>
								</li>
								<li>
									<p></p>
								</li>
								<li>
                                    <?php $content = mb_substr($zxArr['k0']['description'],0,30,'utf-8').'...'; ?>
									<p><?php echo ($content); ?></p>
								</li>
								<li>
									<a href="<?php echo ($zxArr['k0']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="ccImg02">
						<div class="floatl ccImg">
							<img src="<?php echo ($zxArr['k1']['original_img']); ?>" />
							<div class="ccOn">
								<ul>
									<li>
										<p><?php echo ($zxArr['k1']['title']); ?></p>
									</li>
									<li>
										<p><?php echo ($zxArr['k1']['en_title']); ?></p>
									</li>
									<li>
										<p></p>
									</li>
									<li>
                                        <?php $content = mb_substr($zxArr['k1']['description'],0,10,'utf-8').'...'; ?>
										<p><?php echo ($content); ?></p>
										<p>2017-06-04</p>
									</li>
									<li>
										<a href="<?php echo ($zxArr['k1']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="floatl ccImg">
							<img src="<?php echo ($zxArr['k2']['original_img']); ?>" />
							<div class="ccOn">
								<ul>
									<li>
										<p><?php echo ($zxArr['k2']['title']); ?></p>
									</li>
									<li>
										<p><?php echo ($zxArr['k2']['en_title']); ?></p>
									</li>
									<li>
										<p></p>
									</li>
									<li>
                                        <?php $content = mb_substr($zxArr['k2']['description'],0,10,'utf-8').'...'; ?>
										<p><?php echo ($content); ?></p>
										<p>2017-06-04</p>
									</li>
									<li>
										<a href="<?php echo ($zxArr['k2']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="clearl"></div>
					</div>
				</div>
				<div class="floatl">
					<div class="ccImg03 ccImg">
						<img src="<?php echo ($zxArr['k3']['original_img']); ?>" />
						<div class="ccOn">
							<ul>
								<li>
									<p><?php echo ($zxArr['k3']['title']); ?></p>
								</li>
								<li>
									<p><?php echo ($zxArr['k3']['en_title']); ?></p>
								</li>
								<li>
									<p></p>
								</li>
								<li>
									<p><?php echo ($zxArr['k3']['description']); ?></p>
								</li>
								<li>
									<a href="<?php echo ($zxArr['k3']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="floatl">
					<div class="ccImg04 ccImg">
						<img src="<?php echo ($zxArr['k4']['original_img']); ?>" />
						<div class="ccOn">
							<ul>
								<li>
									<p><?php echo ($zxArr['k4']['title']); ?></p>
								</li>
								<li>
									<p><?php echo ($zxArr['k4']['en_title']); ?></p>
								</li>
								<li>
									<p></p>
								</li>
								<li>
                                    <?php $content = mb_substr($zxArr['k4']['description'],0,30,'utf-8').'...'; ?>
									<p><?php echo ($content); ?></p>
								</li>
								<li>
									<a href="<?php echo ($zxArr['k4']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="ccImg04 ccImg">
						<img src="<?php echo ($zxArr['k5']['original_img']); ?>" />
						<div class="ccOn">
							<ul>
								<li>
									<p><?php echo ($zxArr['k5']['title']); ?></p>
								</li>
								<li>
									<p><?php echo ($zxArr['k5']['en_title']); ?></p>
								</li>
								<li>
									<p></p>
								</li>
								<li>
                                    <?php $content = mb_substr($zxArr['k5']['description'],0,30,'utf-8').'...'; ?>
									<p><?php echo ($content); ?></p>
								</li>
								<li>
									<a href="<?php echo ($zxArr['k5']['link']); ?>"><img src='__HOME__/img/readMore.png'></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clearl"></div>
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
<script type="text/javascript" src="__HOME__/js/index.js?v=1" ></script>