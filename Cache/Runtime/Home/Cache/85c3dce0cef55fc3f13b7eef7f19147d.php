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
<link rel="stylesheet" href="__HOME__/css/join.css" />
<script type="text/javascript" src="__HOME__/lib/layui.js" ></script>

		<!--轮播图-->
			<img src="__PIC__/<?php echo ($jiaru["original_img"]); ?>" />
		</div>
		<div id="join">
			<div class="bigTitle">
				<ul>
					<li>
						<p class="bt">公司招聘</p>
					</li>
					<li>
						<p class="st">The company recruitment</p>
					</li>
					<li>
						<span></span>
					</li>
				</ul>
			</div>
			<div class="moreChoice">
				<div class="floatl short">
					<img src="__HOME__/img/ms.png" />
					<p isOpen='false' id="addr"><?php echo ($addr); ?></p>
					<div class="profess">
						<ul>
                            <?php if(is_array($location)): foreach($location as $key=>$vzp): ?><li>
								<p class="p1"><?php echo ($vzp["location"]); ?></p>
							</li><?php endforeach; endif; ?>

						</ul>
					</div>					
				</div>
				<div class="floatl short">
					<img src="__HOME__/img/ms.png" />
					<p isOpen='false' id="type"><?php echo ($type); ?></p>
					<div class="profess">
						<ul>
                            <?php if(is_array($fl)): foreach($fl as $key=>$fl): ?><li>
								<p class="p1"><?php echo ($fl["job_type"]); ?></p>
							</li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<div class="floatl long">
					<input type="search" id="seh" value="<?php echo ($title); ?>" placeholder="职位关键词" />
					<button onclick="searchs()">提交</button>
				</div>
				<div class="clearl"></div>
                <script type="text/javascript">
                    function searchs(){
                        var title = $("#seh").val();
                        var addr = $("#addr").text();
                        var type = $("#type").text();
                        window.location.href="__ROOT__/index.php/Join/index?title="+title+"&addr="+addr+"&type="+type;
                    }
                </script>
			</div>
			<div class="jobBox" >
                <?php if(is_array($zp)): foreach($zp as $key=>$xp): ?><div class="job floatl">
					<a href="javascript:;" onclick="details('<?php echo ($xp["article_id"]); ?>')" class="rc"><img src="__HOME__/img/redCrocss.png"/></a>
					<ul>
						<li>
							<p class="jobNameM p1"><?php echo ($xp["zw_name"]); ?></p>
						</li>
						<li>
							<p class="jobNameS p1"><?php echo ($xp["en_title"]); ?></p>
						</li>
						<li>
							<span class="rLine"></span>
						</li>
						<li>
                            <?php if($xp["description"] == ''): ?><p class="jobD p2">暂无描述</p><?php endif; ?>
							<p class="jobD p2"><?php echo ($xp["description"]); ?></p>
						</li>
					</ul>
				</div><?php endforeach; endif; ?>

				<div class="clearl"></div>
				<div class="page" align="center">
                        <?php echo ($page); ?>
				</div>
			</div>
			<div class="jobDetails" style="display: none;">
				<div class="return">
					<div class="rBtn">
						<button>&lt;RETURN</button>
					</div>					
				</div>
				<div class="details">
					<div class="topDetails">
						<div class="tdBtn">
							<button>立即申请</button>
						</div>					
						<ul>
							<li>
								<p class="jobNameM p1" id="t_name"></p>
							</li>
							<li>
								<p class="jobNameS p1" id="e_name"></p>
							</li>
							<li>
								<span class="rLine"></span>
							</li>
							<li>
								<div class="jobMoreM">
									<div class="floatl">
										<p style="background: none;"></p>
									</div>
									<div class="floatl">
										<p id="adr"></p>
									</div>
									<div class="floatl">
										<p id="time"></p>
									</div>
									<div class="clearl"></div>
								</div>
							</li>
						</ul>
					</div>
					<div class="bottomDetails">
						<p>职位描述</p>
						<ul id="ms">

						</ul>
					</div>
					<div class="bottomDetails">
						<p>任职要求</p>
						<ul id="yq">

						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--弹窗-->
		<div id="pop" style="display: none;">
			<div class="pop">
				<div class="popBox">
					<div class="bigTitle">
						<ul>
							<li>
								<p class="bt">申请职位</p>
							</li>
							<li>
								<p class="st">Apply for a position</p>
							</li>
							<li>
								<span></span>
							</li>
						</ul>
					</div>
					<div class="form">
						<ul>
							<li>
								<input type="search" id="uname" placeholder="姓名"/>
							</li>
							<li>
								<input type="search" id="phone" placeholder="手机号码"/>
							</li>
							<li>
								<textarea placeholder="自我描述" id="content"></textarea>
							</li>
							<li class="upLoad">
								<p>上传简历</p>
                                <input type="hidden" name="file" id="logo" value="">
								<div class="upBtnBox">
									<button id="logoBtn">选择文件</button>
									<!--<input type="file" />-->
								</div>
								<span class="p1" id="cltLogo"></span>
                                <div style="margin-top: -9px;margin-left: 2px;font-size: 12px;color: #888888;">请上传20兆之内的压缩文件</div>
							</li>
							<li>
								<button class="btn" onclick="addJL()">确认提交</button>
							</li>
						</ul>
					</div>
					<div class="close">
						<a href="###"><img src="__HOME__/img/redCrocss.png"/></a>
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
<script type="text/javascript" src="__HOME__/js/join.js" ></script>
<script type="text/javascript">
    function details(id){
        $.ajax({
            url:img_path+"/index.php/join_detail/id/"+id,
            type:"get",
            success:function(re){
                var re = JSON.parse(re);
                $("#t_name").html(re.zw_name);
                $("#e_name").html(re.en_title);
                $("#adr").html(re.location);
                $("#time").html(re.add_time);
                $("#ms").html(re.description);
                $("#yq").html(re.content);

            }
        });
    }
    layui.use(['form', 'layer','upload'], function () {
        var form = layui.form,layer = layui.layer,upload = layui.upload,$ = layui.jquery;
        //普通图片上传
        var uploadInst = upload.render({
            elem: '#logoBtn'
            ,url: img_path+'index.php/uploadFile_zp'
            ,accept: 'file'
            ,exts:'zip|rar|7z'
            ,size: 20480
            ,done: function(res){
                //上传成功
                if(res.code>0){
                    $('#logo').attr('value',res.file);
                    $('#cltLogo').html(res.name);
                }else{
                    //如果上传失败
                    return layer.msg('上传失败');
                }
            }
        });

    });
    var is_post = 0;
    function addJL(){
        var url =img_path+'index.php/addJL';
        var data = {};
        data.username = $("#uname").val();
        data.phone = $("#phone").val();
        data.content = $("#content").val();
        data.file = $("#logo").val();
        data.file_name = $("#cltLogo").text();
        data.name = $("#t_name").text();
        is_post++;
        layer.load(1);
        if (is_post == 1) {
            $.post(url, data, function(res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.info);
                    $('#pop').hide();
                    $('.pop').removeClass('animated bounceInDown');
                } else {
                    layer.msg(res.info,{time: 3000});
                    is_post = 0;
                }
            }, 'json');
        } else {
            layer.msg("请不要重复提交", {
                icon: 5,
                time: 1000
            });
            layer.closeAll();
        }
    }
</script>