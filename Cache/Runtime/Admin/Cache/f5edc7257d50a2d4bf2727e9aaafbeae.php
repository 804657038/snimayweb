<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>内容管理=>网站设置</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/lhgdialog/skins/default.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.treeview.js"></script>
    <script src="__PUBLIC__/Admin/lhgdialog/lhgdialog.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
	<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
    <!--[if lte IE 6]>    <script src="__PUBLIC__/Admin/Js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script><script type="text/javascript">DD_belatedPNG.fix('*');</script><![endif]-->
</head>
<body>
<script type="text/javascript">
$(function(){
	autoHeight(jQuery('.autoHeight'));
	jQuery(".column_Box").each(function () {
		var t = jQuery(this);
		if (t.length < 1) return;
		Tab_click(t.find('.tab ul li'), t.find(".wrapBox .body"));
	});
});
</script>

<div class="column_Box mainAutoHeight">
	<div class="tab">
		<ul>
			<li class="current"><a href="javascript:">站点配置</a></li>
		</ul>
	</div>
	<div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
			<form action="" method="post">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table1">
                    
                    <tbody <?php if($_GET['type'] != 1): ?>style="display:none"<?php endif; ?>>
                    <tr>
                        <th align='right'>新闻标签设置：</th>
                        <td><input class="input" name="tag_list" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["tag_list"]); ?>" />多个请用逗号（，）隔开</td>
                    </tr>
                    <tr>
                        <th align='right'>新闻内链设置 ：</th>
                        <td><textarea name="article_link" cols="50" rows="5"><?php echo ($site["SITE_INFO"]["article_link"]); ?></textarea></td>
                    </tr>
                    </tbody>
                   <tbody <?php if($_GET['type'] == 1): ?>style="display:none"<?php endif; ?>>
                   <tr>
                    <th align='right'>网站标题：</th>
                        <td><input name="title" class="input" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["title"]); ?>"/></td>
                    </tr>
                    <tr>
                        <th align='right'>网站关键字：</th>
                        <td><input class="input" name="keyword" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["keyword"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>网站简介：</th>
                        <td><textarea name="description" cols="100" rows="3"><?php echo ($site["SITE_INFO"]["description"]); ?></textarea></td>
                    </tr>
                    <tr>
                        <th align='right'>ICP备案：</th>
                        <td><input class="input" name="icp" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["icp"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>服务热线：</th>
                        <td><input class="input" name="tel_hot" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["tel_hot"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>加盟热线：</th>
                        <td><input class="input" name="tel_join" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["tel_join"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>在线服务时间：</th>
                        <td><input class="input" name="tel_time" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["tel_time"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th width="130" align='right'>公司名称：</th>
                        <td><input name="name" type="text" class="input" size="40" value="<?php echo ($site["SITE_INFO"]["name"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>地址：</th>
                        <td><input class="input" name="address" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["address"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>电话：</th>
                        <td><input class="input" name="tel" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["tel"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>传真：</th>
                        <td><input class="input" name="fax" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["fax"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>官方网站：</th>
                        <td><input class="input" name="gf" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["gf"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>手机官方网站：</th>
                        <td><input class="input" name="sj" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["sj"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>公司邮箱 ：</th>
                        <td><input class="input" name="c_email" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["c_email"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>服务监督邮箱 ：</th>
                        <td><input class="input" name="f_email" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["f_email"]); ?>" /></td>
                    </tr>
                  
                    <tr>
                        <th align='right'>友情链接 ：</th>
                        <td><textarea name="friendly_link" cols="50" rows="5"><?php echo ($site["SITE_INFO"]["friendly_link"]); ?></textarea></td>
                    </tr>
                    <tr>
                        <th align='right'>京东官方商城 ：</th>
                        <td><input class="input" name="link1" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link1"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>天猫官方商城 ：</th>
                        <td><input class="input" name="link2" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link2"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>诗尼曼官方商城 ：</th>
                        <td><input class="input" name="link3" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link3"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>诗尼曼门窗 ：</th>
                        <td><input class="input" name="link4" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link4"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>商学院学习系统 ：</th>
                        <td><input class="input" name="link5" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link5"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>经销商登录 ：</th>
                        <td><input class="input" name="link6" type="text" size="40" value="<?php echo ($site["SITE_INFO"]["link6"]); ?>" /></td>
                    </tr>
                    </tbody>
                    
					<tr align="center">
                        <td>&nbsp;</td>
                        <td align='left'><input type="submit" value="提交"></td>
                    </tr>
                </table>
			</form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".submit").click(function(){
        commonAjaxSubmit();
    });
</script>
</body>
</html>