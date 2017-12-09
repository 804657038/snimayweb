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
                    
                    <tbody>
                    <tr>
                        <th align='right'>已有人数：</th>
                        <td><input class="input" name="num1" type="text" size="40" value="<?php echo ($info["num1"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>还剩余多少人 ：</th>
                        <td><input class="input" name="num2" type="text" size="40" value="<?php echo ($info["num2"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>更多活动链接 ：</th>
                        <td><input class="input" name="url2" type="text" size="40" value="<?php echo ($info["url2"]); ?>" /></td>
                    </tr>
                    <tr>
                        <th align='right'>抽奖链接 ：</th>
                        <td><input class="input" name="url" type="text" size="40" value="<?php echo ($info["url"]); ?>" /></td>
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