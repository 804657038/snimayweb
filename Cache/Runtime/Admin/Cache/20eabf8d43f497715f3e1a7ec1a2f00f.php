<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>网站管理系统-诗尼曼</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
    <!--[if lte IE 6]>    <script src="__PUBLIC__/Admin/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script><script type="text/javascript">DD_belatedPNG.fix('*');</script><![endif]-->
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery(".current_click").each(function () {
                var list = jQuery(this).find("ul.c li");
                var liList = jQuery(".Container_Left ul");
                list.each(function () {
                    var o = jQuery(this);
                    o.click(function () {
                        list.removeClass('current');
                        o.addClass('current');
                    });
                    //显示相对应的左侧栏目
                    o.children("a").click(function () {
                        var a = jQuery(this);
                        var className = a.attr("class");
                        if (className == undefined) return;
                        var newlist = liList.find("." + className);
                        liList.children("li").hide();
                        newlist.show().eq(0).click();
                    });
                });
            });
        });
    </script>
</head>
<body>
    <div class="Header">
	<a class="logo" href="javascript:" onclick="document.location.reload();"></a>
	<div class="MenuDiv current_click">
		<ul class="c">
			
			<li><a href="<?php echo U('Articlecat/index');?>" target="main" class="show_a">栏目分类</a></li>
			

			
			<li><a href="<?php echo U('Articlecat/index2');?>" target="main" class="show_d">文章管理</a></li>
			

			<li><a href="<?php echo U('Goods/index',array('cat_id'=>1));?>" target="main" class="show_c">产品中心</a></li>

			
			<li><a href="<?php echo U('Ads/index',array('cat_id'=>2));?>" target="main" class="show_e">图片管理</a></li>
			

			<li><a href="<?php echo U('Feedback/index',array('type'=>1));?>" target="main" class="show_h">留言</a></li>

			<li><a href="<?php echo U('Survey/index');?>" target="main" class="show_i">简历查看</a></li>

			<!-- <li><a href="<?php echo U('User/index');?>" target="main" class="show_j">会员管理</a></li> -->

			
			<li><a href="<?php echo U('Webinfo/index');?>" target="main" class="show_y">系统设置</a></li>
			

			<li><a href="<?php echo U('Dealer/index');?>" target="main" class="show_f">招商管理</a></li>
			<li><a href="<?php echo U('Store/index',array('cat_id'=>2));?>" target="main" class="show_g">附近门店</a></li>
			<!-- <li><a href="<?php echo U('Privilege/index');?>" target="main" class="show_z">管理员设置</a></li> -->

		</ul>
	</div>
	<div class="itemBar">
		<ul>
			<li><a href="<?php echo U('Privilege/edit',array('id'=>$_SESSION['admin_id']));?>" class="name" target="main"><?php echo (session('admin_name')); ?> </a>，您好！</li>
			<li><a href="/" target="_blank" class="about">诗尼曼官网</a></li>
			<li><a href="<?php echo U('Index/clearCache');?>">清除缓存</a></li>
			<li><a href="<?php echo U('Public/loginOut');?>" class="out">退出</a></li>
		</ul>
	</div>
</div>
    <div class="minlineheight"></div>
    <div class="Container">
        <div class="Container_Left autoHeight current_click">
	<ul class="c">
		<li class="show_a"><a href="<?php echo U('Articlecat/index');?>" target="main">栏目分类</a></li>

		<li class="show_d" style="display:none;"><a href="<?php echo U('Articlecat/index2');?>" target="main">分类文章列表</a></li>
		<li class="show_d" style="display:none;"><a href="<?php echo U('Article/index');?>" target="main">全部文章</a></li>
		<li class="show_d" style="display:none;"><a href="<?php echo U('Webinfo/index',array('type'=>1));?>" target="main">新闻标签</a></li>


		<li class="show_c" style="display:none;"><a href="<?php echo U('Goods/index',array('cat_id'=>1));?>" target="main">产品列表</a></li>
		<li class="show_c" style="display:none;"><a href="<?php echo U('Goodscat/index');?>" target="main">产品分类</a></li>
		<li class="show_c" style="display:none;"><a href="<?php echo U('Goodsgro/index');?>" target="main">产品属性</a></li>
		<li class="show_c" style="display:none;"><a href="<?php echo U('Goodscolor/index');?>" target="main">产品颜色</a></li>

		<li class="show_c" style="display:none;"><a href="<?php echo U('Goodsmesa/index');?>" target="main">橱柜台面</a></li>
		<li class="show_c" style="display:none;"><a href="<?php echo U('Goodstype/index');?>" target="main">产品类型</a></li>

        <li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index');?>" target="main">广告图管理</a></li>
        <li class="show_e" style="display:none;"><a href="<?php echo U('Ads/add');?>" target="main">添加广告图</a></li>
        <li class="show_e" style="display:none;"><a href="<?php echo U('Ads/catList');?>" target="main">分类管理</a></li>


		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>2));?>" target="main">首页Ban</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>3));?>" target="main">内页Ban</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>9));?>" target="main">首页Ban(手机)</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>6));?>" target="main">内页Ban(手机)</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>7));?>" target="main">首页广告图</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>8));?>" target="main">首页诚邀加盟</a></li>-->
		<!--&lt;!&ndash; <li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>6));?>" target="main">招商加盟</a></li> &ndash;&gt;-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>5));?>" target="main">品牌荣誉</a></li>-->
		<!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>4));?>" target="main">其他图片</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>10));?>" target="main">产品力</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>11));?>" target="main">营销力</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>12));?>" target="main">团队力</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>13));?>" target="main">名师团队</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>15));?>" target="main">明星阵容</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>16));?>" target="main">明星品质</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>17));?>" target="main">明星福利</a></li>-->
    <!--<li class="show_e" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>18));?>" target="main">明星直播</a></li>-->

    	<li class="show_g" style="display:none;"><a href="<?php echo U('Store/index',array('cat_id'=>2));?>" target="main">门店列表</a></li>
    	<li class="show_g" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>20));?>" target="main"> 列表Ban</a></li>
    	<li class="show_g" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>21));?>" target="main">下期预告</a></li>
    	<li class="show_g" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>22));?>" target="main">往期回顾</a></li>
    	<li class="show_g" style="display:none;"><a href="<?php echo U('Ads/index',array('cat_id'=>23));?>" target="main">统一活动</a></li>

		<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>1));?>" target="main">加盟留言</a></li>
		<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>4));?>" target="main">橱柜加盟</a></li>
		<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>2));?>" target="main">促销列表</a></li>
		<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>3));?>" target="main">量尺留言</a></li>
		<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>5));?>" target="main">明星活动留言</a></li>
    <li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>6));?>" target="main">全屋定制特惠季</a></li>
    	<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/post');?>" target="main">人数及链接</a></li>
		<li class="show_i" style="display:none;"><a href="<?php echo U('Survey/index');?>" target="main">文件列表</a></li>
		    	<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/index',array('type'=>7));?>" target="main">广点通加盟客户</a></li>
    	<li class="show_h" style="display:none;"><a href="<?php echo U('Feedback/post2');?>" target="main">广点通人数链接</a></li>

        <li class="show_h"><a href="<?php echo U('Service/order');?>" target="main">定制留言</a></li>
        <li class="show_h"><a href="<?php echo U('Service/feeback');?>" target="main">意见反馈留言</a></li>
        <li class="show_h"><a href="<?php echo U('Service/complain');?>" target="main">投诉留言</a></li>

    <li class="show_j" style="display:none;"><a href="<?php echo U('User/index');?>" target="main">会员列表</a></li>

		<li class="show_y" style="display:none;"><a href="<?php echo U('Webinfo/index');?>" target="main">站点配置</a></li>
		<!-- <li class="show_y" style="display:none;"><a href="<?php echo U('Webinfo/setEmailConfig');?>" target="main">邮件服务器</a></li> -->
    
    <li class="show_f" style="display:none;"><a href="<?php echo U('Dealer/index');?>" target="main">客户跟进表</a></li>
    <li class="show_f" style="display:none;"><a href="<?php echo U('Dealer/team');?>" target="main">招商团队管理</a></li>
    <li class="show_f" style="display:none;"><a href="<?php echo U('Dealer/emphasis');?>" target="main">重点招商区域</a></li>

		<li class="show_y"><a href="<?php echo U('Privilege/index');?>" target="main">管理员列表</a></li>
		<li class="show_y"><a href="<?php echo U('Role/index');?>" target="main">角色管理</a></li>


	</ul>
</div>
        <div class="ContainerMain autoHeight">
            <iframe src="<?php echo U('Index/main');?>" width="100%" height="100%" id="main" frameborder="0" scrolling="yes" name="main"></iframe>
        </div>
    </div>
    <div class="Footer">
	Copyright  &copy; <a href="http://www.snimay.com" target="_blank">snimay.com</a>
</div>
</body>
</html>