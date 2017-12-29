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
<link rel="stylesheet" href="__HOME__/lib/css/layui.css" />
<link rel="stylesheet" href="__HOME__/css/video-js.css" />
<link rel="stylesheet" href="__HOME__/css/centerFour.css" />
<script type="text/javascript" src="__HOME__/js/video.min.js" ></script>
<style>
    .img-responsive{
        width:450px;
        height:640px;
    }
</style>
			<img src="__PIC__/<?php echo ($cen["original_img"]); ?>" />
		</div>
		<!--新闻中心-->
		<div id="news">
			<div class="sNav">
				<div class="floatl">
					<p>新闻中心</p>
				</div>
				<div class="floatr">
					<ul class="childSelect">
						<li index=0  class="lsdn">
							<a href="###">公司动态</a>
						</li>
						<li index=1>
							<a href="###">媒体报道</a>
						</li>
						<li index=2>
							<a href="###">视频中心</a>
						</li>
						<li index=3>
							<a href="###">电子报刊</a>
						</li>
					</ul>
				</div>
				<div class="clearBoth"></div>
			</div>
			<!--电子报刊-->
			<div class="newsList email" style="display: none;">
                <?php if(is_array($baokan)): foreach($baokan as $key=>$b): ?><div class="newsBox floatl" onclick="getDetailBaokan('<?php echo ($b["article_id"]); ?>')">
					<div class="nImg">
						<img src="__PIC__/<?php echo ($b["original_img"]); ?>" />
						<a class="lookMore" href="###"></a>
					</div>
					<div class="nIntro">
						<p class="np1"><?php echo ($b["title"]); ?></p>
						<p class="np2"><?php echo ($b["short"]); ?></p>
					</div>
				</div><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
			<!--视频中心-->
			<div class="newsList videoCenter" style="display: none;">
                <?php if(is_array($video)): foreach($video as $key=>$v): ?><div class="newsBox floatl">
					<div class="nImg">
						<video id="my-video1" class="video-js" controls preload="auto" width="340" height="250" poster="__PIC__/<?php echo ($v["original_img"]); ?>" data-setup="{}">
							<source <?php echo ($v["video"]); ?> type="video/mp4"></source>
						</video>
						<a href="###" class="pVideo1"></a>
					</div>
					<div class="nIntro">
						<p class="np1"><?php echo ($v["title"]); ?></p>
						<p class="np2"><?php echo ($v["short"]); ?></p>
					</div>
				</div><?php endforeach; endif; ?>

				<div class="clearl"></div>
			</div>
			<!--公司动态-->
			<div class="report company">
                <?php if(is_array($xinwen)): foreach($xinwen as $key=>$x): ?><div class="reportBox" onclick="getDetails('<?php echo ($x["article_id"]); ?>')">
					<div class="cLeft floatl">
						<img src="__PIC__/<?php echo ($x["original_img"]); ?>" />
					</div>
					<div class="cMiddle floatl">
						<p class="cMTitle p1">
                            <?php echo ($x["title"]); ?>
						</p>
						<p class="cMContent p2"><?php echo ($x["short"]); ?></p>
					</div>
					<div class="cRight floatl">
						<a href="###" class="readMore"><img src="__HOME__/img/redCrocss.png"/></a>
                        <?php $addtime = date('Y-m-d',$x['add_time']); $time = explode('-',$addtime); ?>
						<p class="month"><?php echo ($time[1]); ?>-<?php echo ($time[2]); ?></p>
						<p class="year"><?php echo ($time[0]); ?></p>
					</div>
					<div class="clearl"></div>
				</div><?php endforeach; endif; ?>

				<div class="page" align="center">
                    <?php echo ($page1); ?>
				</div>
			</div>
			<!--媒体报道-->
			<div class="report media" style="display: none;">

                <?php if(is_array($meiti)): foreach($meiti as $key=>$m): ?><div class="reportBox" onclick="getDetailmeiti('<?php echo ($m["article_id"]); ?>')">
					<div class="cLeft floatl">
						<img src="__PIC__/<?php echo ($m["original_img"]); ?>" />
					</div>
					<div class="cMiddle floatl">
						<p class="cMTitle p1">
                            <?php echo ($m["title"]); ?>
						</p>
						<p class="cMContent p2"><?php echo ($m["short"]); ?></p>
					</div>
					<div class="cRight floatl">
						<a href="###" class="readMore"><img src="__HOME__/img/redCrocss.png"/></a>
                        <?php $addtime1 = date('Y-m-d',$m['add_time']); $time1 = explode('-',$addtime1); ?>
						<p class="month"><?php echo ($time1[1]); ?>-<?php echo ($time1[2]); ?></p>
						<p class="year"><?php echo ($time1[0]); ?></p>
					</div>
					<div class="clearl"></div>
				</div><?php endforeach; endif; ?>
				<div class="page" align="center">
                    <?php echo ($page2); ?>
				</div>
			</div>
			<!--没有结果-->
			<div class="noAnyResult" style="display: none;">
				<div class="cry">					
				</div>
				<p>很抱歉，没有相关的结果！</p>
			</div>
		</div>
		<!--详情-->
		<div id="details">
			<!--新闻详情-->
			<div class="newsD" style="display: none;">
				<div class="ndTitle">
					<div class="return">
						<div class="rBtn newsReturn">
							<button>&lt;RETURN</button>
						</div>					
					</div>
					<div class="ndBigTitle">
						<p id="title">新手加盟全屋定制家具，这些注意事项不能忽视</p>
					</div>
					<div class="ndTimeNumber" align="center">
						<ul>
							<li>
								<p class="ndTime" id="time">2017-11-20</p>
							</li>
							<li>
								<p class="ndNumber" id="click">148</p>
							</li>
						</ul>
					</div>
				</div>
				<!--富文本-->
				<div class="ndContent" id="contents">
					<p>定制家具的火爆，从各大品牌转向全屋定制以及市场强大的需求令不少行外新手意欲加盟。作为门外汉来说，行业的整体趋势利好意味着加盟有望分享市场蛋糕，而经验不足则成为新手加盟商的一大难题。想要加盟定制家居品牌，这些注意事项一定不能忽视。</p>
					<p>首先，加盟一家全屋定制品牌，其品牌影响力已经成为影响顾客选择的重要因素。无论是线下实体门店，随处可见的品牌广告宣传，无时无刻都在加深消费者对品牌的印象。品牌影响力往往和品牌资本、技术、管理等息息相关。如果一个品牌资金力量雄厚，其对品牌广告的投入相应也会增加，从而消费者购买选择印象也会大有提升。作为定制家具企业，技术研发和生产实力也是品牌影响力的表现之一。以消费者需求为导向，满足消费者的个性化需求和实际需要，保证良好的产品研发能力，这样才能长久在市场中保持良好竞争力。</p>
				</div>
				<!--标签与分享-->
				<div class="bsBox">
					<div class="bsLeft floatl">
						<ul id="biaoqiao">
							<li>
								<p>标签：</p>	
							</li>
							
						</ul>
					</div>
					<div class="bsRight floatr bdsharebuttonbox">
						<ul>
                            <li>
                                <a href="#" class="bds_more" data-cmd="more"></a>
                            </li>
                            <li>
                                <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                            </li>
                            <li>
                                <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                            </li>
                            <li>
                                <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                            </li>
						</ul>
					</div>
					<div class="clearBoth"></div>

				</div>
				<!--上一篇下一篇-->
				<div class="npBox">
					<div class="ndPrev floatl" id="prev">
						<a href="###">诗尼曼湖北荆门基地顺利试产，品牌“大家居”战略格局渐显!</a>
					</div>
                    <div class="ndPrev floatl" id="prev_2" style="display: none">
                        <a href="javascript:;">No More</a>
                    </div>
					<div class="ndNext floatl" id="nets">
						<a href="###">诗尼曼：新品发布会洞见行业未来，掀起全屋定制新风范!</a>
					</div>
                    <div class="ndNext floatl" id="nets_2" style="display: none">
                        <a href="javascript:;">No More</a>
                    </div>
					<div class="clearl"></div>
				</div>
			</div>
			<!--电子报刊详情-->
			<div class="emailDetails" style="display: none;">
				<div class="emailTitle">
					<div class="bigTitle">
						<ul>
							<li>
								<p class="bt">电子报刊</p>
							</li>
							<li>
								<p class="st">Electronic newspapers</p>
							</li>
							<li>
								<span></span>
							</li>
						</ul>
					</div>
					<div class="return">
						<div class="rBtn emailReturn">
							<button class="rSearch">&lt;RETURN</button>
						</div>
					</div>
				</div>
				<div class="emailContent">
					<div id='certify'>
						<div class="swiper-container">
							<div class="swiper-wrapper" id="baokanpic">

								<div class="swiper-slide">
									<p>第一版</p>
									<img src="__HOME__/img/email1.jpg"/>
								</div>


							</div>							
						</div>
						<div class="swiper-button-prev"></div>
    					<div class="swiper-button-next"></div>
					</div>
				</div>
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
<script type="text/javascript" src="__HOME__/js/public.js" ></script>
</body>
</html>
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>
<script type="text/javascript" src="__HOME__/js/centerFour.js" ></script>
<script type="text/javascript" id="bdshare_js" data="type=tools&uid=6478904" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script>
    window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>