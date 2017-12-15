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
<link rel="stylesheet" href="__HOME__/css/server.css" />
<link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>
<script src="http://cache.amap.com/lbs/static/es5.min.js"></script>
<script src="http://webapi.amap.com/maps?v=1.3&key=5433dcc2bc76f4bfae5b9b20179efac5"></script>
<script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
		<!--轮播图-->
			<img src="__PIC__/<?php echo ($fuwu["original_img"]); ?>" />
		</div>
		<!--联系我们-->
		<div id="contact" >
			<div class="contact">
				<div class="bigTitle">
					<ul>
						<li>
							<p class="bt">联系我们</p>
						</li>
						<li>
							<p class="st">Contact us</p>
						</li>
						<li>
							<span></span>
						</li>
					</ul>
				</div>
				<div class='methods'>
					<div class="floatl ercode">
						<ul>
							<li>
								<div class="code">
									<img src="<?php echo ($wx["original_img"]); ?>" />
								</div>
							</li>
							<li>
								<p>微信二维码</p>
							</li>
							<li>
								<span></span>
							</li>
						</ul>
					</div>
					<div class="floatl apBox">
						<ul>
							<li>
								<div class="pbBox">
									<img src="__HOME__/img/phones0.png" />
								</div>
							</li>
							<li>
								<p class="pT">服务热线</p>
							</li>
							<li>
								<span></span>
							</li>
							<li>
								<p class="sT">全国加盟热线：<?php echo ($arr["tel_join"]); ?></p>
							</li>
							<li>
								<p class="sT">全国服务热线：<?php echo ($arr["tel_hot"]); ?></p>
							</li>
						</ul>
					</div>
					<div class="floatl apBox aBox">
						<ul>
							<li>
								<div class="abBox">
									<img src="__HOME__/img/contact.png" />
								</div>
							</li>
							<li>
								<p class="pT">服务热线</p>
							</li>
							<li>
								<span></span>
							</li>
							<li>
								<p class="sT">在线服务时间：<?php echo ($arr["tel_time"]); ?></p>
							</li>
							<li>
                                <button>点击咨询</button>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="company">
					<div class="map floatl">
						<div id="companyMap"></div>
					</div>
					<div class="message floatl">
						<ul>
							<li>
								<p class="mt"><?php echo ($arr["name"]); ?></p>
							</li>
							<li>
								<span class="st">Guangzhou poetry neiman household co. LTD</span>
							</li>
							<li class="redLine">	
							</li>
							<li>
								<p class="p1">地址：<?php echo ($arr["address"]); ?></p>
							</li>
							<li>
								<p class="p2">电话：<?php echo ($arr["tel"]); ?></p>
							</li>
							<li>
								<p class="p3">传真：<?php echo ($arr["fax"]); ?></p>
							</li>
							<li>
								<p class="p4">官方网站：<a href="<?php echo ($arr["gf"]); ?>"><?php echo ($arr["gf"]); ?></a></p>
							</li>
							<li>
								<p class="p5">手机官方网站：<a href="<?php echo ($arr["sj"]); ?>"><?php echo ($arr["sj"]); ?></a></p>
							</li>
							<li class="huiLine">
								
							</li>
							<li>
								<p class="p6">公司邮箱：<a href="<?php echo ($arr["c_email"]); ?>"><?php echo ($arr["c_email"]); ?></a></p>
							</li>
							<li>
								<p class="p7">服务监督邮箱：<a href="<?php echo ($arr["f_email"]); ?>"><?php echo ($arr["f_email"]); ?></a></p>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
			</div>
			
		</div>
		<!--服务-->
		<div id="server">
			<div class="choice">
				<ul>
					<li>
						<button class="wbtn iWant">我要定制</button>
					</li>
					<li>
						<button class="iProgrem">我要投诉</button>
					</li>
					<li>
						<button class="iSuggest">意见反馈</button>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="serverBox">
				<div class="threeBox">
					<div class="sBLeft floatl">
						<div class="woWant">
							<div class="title">
								<p>我要定制</p>
							</div>
							<div class="radioChoices">
								<div class="radioBox">
									<div class="pLeft floatl">
										<p><span>*</span>类型：</p>
									</div>
									<div class="rMiddle floatl">
										<div class="layui-form">
											<!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
											<div class="layui-form-item">
												<div class="layui-input-block dingzhi">
                                                    <?php if(is_array($goodscat)): foreach($goodscat as $k=>$g): ?><input type="radio" name="types" value="<?php echo ($g["cat_name"]); ?>" title="<?php echo ($g["cat_name"]); ?>"<?php if($k == 0): ?>checked="checked"<?php endif; ?> ><?php endforeach; endif; ?>

												</div>
											</div>
										</div>		
									</div>
									<div class="rRight floatl">
										<a href="###" isOpen='false'><img src="__HOME__/img/ms.png" /></a>
									</div>
									<div class="clearl"></div>
								</div>
							</div>
							
							<div class="twoInput">
								<div class="twoInputIn floatl">
									<p><span>*</span>客户姓名：</p>
									<input type="text" id="name1" />
								</div>
								<div class="twoInputIn floatl">
									<p><span>*</span>手机号码：</p>
									<input type="text" maxlength="11" id="phone1" />
								</div>
								<div class="clearl"></div>
							</div>
							<div class="twoInput">
								<div class="twoInputIn floatl">
									<p><span>*</span>购买城市：</p>
									<input type="text" id="city" />
								</div>
								<div class="twoInputIn floatl">
									<p><span>*</span>联系时间：</p>
									<input type="text" class="date" id="date1"/>
								</div>
								<div class="clearl"></div>
							</div>
							<div class="oneInput">
								<p><span>*</span>安装地址：</p>
								<input type="text" id="addr1"/>
							</div>
							<div class="textarea">
								<p><span>*</span>留言备注：</p>
								<textarea id="content1"></textarea>
							</div>
							<div class="btnBox">
								<button class="btn" onclick="add_order()">提交</button>
							</div>
						</div>
						<div class="proBlem"  style="display: none;">
							<div class="title">
								<p>我要投诉</p>
							</div>
							<div class="radioChoices">
								<div class="radioBox">
									<div class="pLeft floatl">
										<p><span>*</span>类型：</p>
									</div>
									<div class="rMiddle floatl">
										<div class="layui-form">
											<!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
											<div class="layui-form-item">
												<div class="layui-input-block tousu">
                                                    <?php if(is_array($goodscat)): foreach($goodscat as $k1=>$gg): ?><input type="radio" name="type" value="<?php echo ($gg["cat_name"]); ?>" title="<?php echo ($gg["cat_name"]); ?>"<?php if($k1 == 0): ?>checked="checked"<?php endif; ?> ><?php endforeach; endif; ?>
												</div>
											</div>
										</div>		
									</div>
									<div class="rRight floatl">
										<a href="###" isOpen='false'><img src="__HOME__/img/ms.png" /></a>
									</div>
									<div class="clearl"></div>
								</div>
							</div>
							
							<div class="twoInput">
								<div class="twoInputIn floatl">
									<p><span>*</span>客户姓名：</p>
									<input type="text" id="name2"/>
								</div>
								<div class="twoInputIn floatl">
									<p><span>*</span>手机号码：</p>
									<input type="text" maxlength="11" id="phone2" />
								</div>
								<div class="clearl"></div>
							</div>
							<div class="twoInput">
								<div class="twoInputIn floatl">
									<p><span>*</span>购买城市：</p>
									<input type="text" id="cityP" />
								</div>
								<div class="twoInputIn floatl">
									<p><span>*</span>联系时间：</p>
									<input type="text" class="dateT" id="date2"/>
								</div>
								<div class="clearl"></div>
							</div>
							<div class="oneInput">
								<p><span>*</span>安装地址：</p>
								<input type="text" id="addr2"/>
							</div>
							<div class="textarea">
								<p><span>*</span>问题描述：</p>
								<textarea id="content2"></textarea>
							</div>
							<div class="file" style="height: 75px;">
								<p><span>*</span>上传附件：</p>
                                <input type="hidden" name="file" id="logo" value="">
                                <button type="button" class="layui-btn layui-btn-primary" id="logoBtn">
                                    <i class="icon icon-upload3"></i>点击上传
                                </button>
                                <span id="cltLogo"></span>
                                <div style="margin-top: 50px;margin-left: 25px;font-size: 12px;color: #888888;">请上传20兆之内的压缩文件</div>
							</div>
							<div class="btnBox">
								<button class="btn" onclick="add_complain()">提交</button>
							</div>
						</div>	
						<div class="suggest"  style="display: none;">
							<div class="title">
								<p>意见反馈</p>
							</div>
							<div class="oneInput">
								<p><span>*</span>您的姓名：</p>
								<input type="text" id="name3" />
							</div>	
							<div class="oneInput">
								<p><span>*</span>联系方式：</p>
								<input type="text" id="phone3"/>
							</div>
							<div class="oneInput">
								<p><span>*</span>所在城市：</p>
								<input type="text" id="cty"/>
							</div>
							<div class="textarea">
								<p><span>*</span>留言备注：</p>
								<textarea id="content3"></textarea>
							</div>
							<div class="btnBox">
								<button class="btn" onclick="add_feeback()">提交</button>
							</div>
						</div>
					</div>
					
					<div class="sBRight floatl">
						<img src="__PIC__/<?php echo ($goodImg[0]['original_img']); ?>" />
					</div>
					<div class="clearl"></div>
				</div>
			</div>
		</div>
		<!--定制服务-->
		<div id="specialServer">
			<div class="bigTitle">
				<ul>
					<li>
						<p class="bt">服务流程</p>
					</li>
					<li>
						<p class="st">Contact us</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="stepBox">
				<div class="stepChild floatl">
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k0]['original_img']); ?>" />
					</div>
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox1" src="__HOME__/img/sv1.png" />
							</li>
							<li>
								<p>网上预约时间</p>
							</li>
							<li>
								<span>01</span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="stepChild floatl">					
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox2" src="__HOME__/img/sv2.png" />
							</li>
							<li>
								<p>免费量尺</p>
							</li>
							<li>
								<span>02</span>
							</li>
						</ul>
					</div>
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k1]['original_img']); ?>" />
					</div>
					<div class="clearl"></div>
				</div>
				<div class="stepChild floatl">
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k2]['original_img']); ?>" />
					</div>
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox3" src="__HOME__/img/sv3.png" />
							</li>
							<li>
								<p>免费设计方案</p>
							</li>
							<li>
								<span>03</span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="stepChild floatl">					
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox4" src="__HOME__/img/sv4.png" />
							</li>
							<li>
								<p>签约合同</p>
							</li>
							<li>
								<span>04</span>
							</li>
						</ul>
					</div>
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k3]['original_img']); ?>" />
					</div>
					<div class="clearl"></div>
				</div>
				<div class="stepChild floatl">
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k4]['original_img']); ?>" />
					</div>
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox5" src="__HOME__/img/sv5.png" />
							</li>
							<li>
								<p>免费送货上门</p>
							</li>
							<li>
								<span>05</span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="stepChild floatl">					
					<div class="stepContent floatl">
						<ul>
							<li>
								<img class="iBox6" src="__HOME__/img/sv6.png" />
							</li>
							<li>
								<p>网上预约时间</p>
							</li>
							<li>
								<span>06</span>
							</li>
						</ul>
					</div>
					<div class="stepImg floatl">
						<img src="__PIC__/<?php echo ($goodImgArr[k5]['original_img']); ?>" />
					</div>
					<div class="clearl"></div>
				</div>
				<div class="clearl"></div>
			</div>
		</div>

		<!--10环-->
		<div id="tenServer">
			<div class="tenVideoOut">
				<div class="tenVideo">
					<div class="videoBox floatl">
						<video preload="auto" id="tVideo">
							<source></source>
						</video>
						<div class="vImg">
							<img src="__HOME__/img/ten.jpg"/>
						</div>
						<div class="playVideo">
							<img src="__HOME__/img/play.png" class="playv" />
						</div>
					</div>
					<div class="videoContent floatl">
						<ul>
							<li>
								<p class="jobNameM p1"><span>10</span>环服务</p>
							</li>
							<li>
								<p class="jobNameS p1">Ten ring service</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
							<li>
								<p class="jobD">诗尼曼品牌创立于2003年，公司总部位于广东省广州市番禺区，是中国领军定制品牌之一，旗下拥有“诗尼曼全屋定制”、“诗尼曼门窗”、“诗尼曼橱柜”三大定制核心体系，涵盖衣柜、橱柜、门窗、沙发、餐桌椅、床等全品类家居产品，形成多元化、全方位的大家居生态格局。其品牌形象代言人为中国著名女演员、联合国妇女署亲善大使海清，是国内极具竞争力的一站式家装定制服务品牌。</p>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
			</div>
			<div class="tenServers">
				<div class="tenServerOut floatl ti1">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">理念</p>
							</li>
							<li>
								<p class="jobNameS p1">全屋高端，绿色环保</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti2">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">设计</p>
							</li>
							<li>
								<p class="jobNameS p1">全屋方案，快速设计</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti3">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">制造</p>
							</li>
							<li>
								<p class="jobNameS p1">全屋产品，智能制造</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti4">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">产品 </p>
							</li>
							<li>
								<p class="jobNameS p1">全屋高端，绿色环保</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti5">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">查询</p>
							</li>
							<li>
								<p class="jobNameS p1">全屋订单，一键查询</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti6">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">物流</p>
							</li>
							<li>
								<p class="jobNameS p1">全球物流，使命必达</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti7">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">安装</p>
							</li>
							<li>
								<p class="jobNameS p1">全屋安装，专业信赖</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti8">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">服务</p>
							</li>
							<li>
								<p class="jobNameS p1">4S管理，标准服务</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti9">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">售后</p>
							</li>
							<li>
								<p class="jobNameS p1">全球售后，随时随地</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
				</div>
				<div class="tenServerOut floatl ti10">
					<div class="floatl tsImg">	
					</div>
					<div class="floatl tsTitle">
						<ul>
							<li>
								<p class="jobNameM p1">体验</p>
							</li>
							<li>
								<p class="jobNameS p1">全心全意，尊崇体验</p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
						</ul>
					</div>
					<div class="clearl"></div>
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
<script type="text/javascript" src="__HOME__/js/server.js?v=1" ></script>