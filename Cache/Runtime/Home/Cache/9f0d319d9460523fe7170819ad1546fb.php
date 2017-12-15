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
<link rel="stylesheet" href="__HOME__/css/demo.css" />
<link rel="stylesheet" href="__HOME__/css/ydui.css" />
<link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
<link rel="stylesheet" href="__HOME__/css/center.css" />
<script type="text/javascript">
    var logoo = <?php echo ($logoo); ?>;
</script>
		<div id="banner">	
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
							<a href="<?php echo U('Center/index');?>?qid=<?php echo ($q["cat_id"]); ?>"><?php echo ($q["cat_name"]); ?></a>
						</li><?php endforeach; endif; ?>


					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="contentBox">
				<div class="cLeft floatl">
					<div class="cImgBox">
						<img src="__HOME__/img/cImgLeft.jpg" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
							</li>
							<li class="pSecond">
								<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越多......</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="cRight floatl">
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
						<li class="lsdpn">
							<a href="###">入户空间</a>
						</li>
						<li class="lsdn">
							<a href="###">厨房空间</a>
						</li>
						<li>
							<a href="###">餐厅空间</a>
						</li>
						<li>
							<a href="###">客厅空间</a>
						</li>
						<li>
							<a href="###">阳台空间</a>
						</li>
						<li>
							<a href="###">卧室空间</a>
						</li>
						<li>
							<a href="###">儿童空间</a>
						</li>
						<li>
							<a href="###">多功能空间</a>
						</li>
					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="contentBox">
				<div class="cLeft floatl">
					<div class="cImgBox">
						<img src="__HOME__/img/cImgLeft.jpg" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
							</li>
							<li class="pSecond">
								<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越多......</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="cRight floatl">
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
						<li class="lsdpn">
							<a href="###">转角空间</a>
						</li>
						<li class="lsdn">
							<a href="###">梁柱空间</a>
						</li>
						<li>
							<a href="###">凹凸空间</a>
						</li>
						<li>
							<a href="###">狭长空间</a>
						</li>
						<li>
							<a href="###">畸形空间</a>
						</li>
					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<div class="contentBox">
				<div class="cLeft floatl">
					<div class="cImgBox">
						<img src="__HOME__/img/cImgLeft.jpg" />
					</div>
					<div class="cIntroBox">
						<ul>
							<li class="pFirst">
								<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
							</li>
							<li class="pSecond">
								<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越多......</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="cRight floatl">
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
					<div class="cRightList">
						<div class="cRLBox">
							<div class="cRLLeft floatl">
								<img src="__HOME__/img/cImgRight.jpg" />
								<div class="best">
									<p>推荐</p>
								</div>
							</div>
							<div class="cRLRight floatl">
								<ul>
									<li class="pRFirst">
										<p class="p1">客餐厅隔断这样设计，创意十足，美到嗨起来！</p>
									</li>
									<li class="pRSecond">
										<p class="p2">隔断的用途不仅可以将客厅和餐厅进行分区，还起到遮挡的作用。随着时代的演变，隔断的种类越来越多，功能也越来越......</p>
									</li>
									<li>
										<div class="btnLeft floatl">
											<ul>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
												<li>
													<button>整体衣柜</button>
												</li>
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
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.citys.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.flexible.js" ></script>
<script type="text/javascript" src="__HOME__/js/ydui.js" ></script>
<script type="text/javascript" src="__HOME__/js/center.js" ></script>