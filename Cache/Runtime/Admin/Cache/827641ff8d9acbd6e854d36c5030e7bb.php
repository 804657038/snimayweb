<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>管理员管理=>权限管理</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/lhgdialog/skins/default.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.treeview.js"></script>
    <script src="__PUBLIC__/Admin/lhgdialog/lhgdialog.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
	<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.ui.datepicker-zh-CN.js"></script>
    <script src="__PUBLIC__/Admin/Js/ui.js"></script>
    <link href="__PUBLIC__/Layui/css/layui.css" rel="stylesheet" />
    <script src="__PUBLIC__/Layui/layui.js"></script>
    <!--[if lte IE 6]>    <script src="__PUBLIC__/Admin/Js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script><script type="text/javascript">DD_belatedPNG.fix('*');</script><![endif]-->
    <style>
        .calendar{
            width:115px !important;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="column_Box mainAutoHeight">
    <div class="tab">
        <ul>
            <li class="current"><a href="javascript:">广告图分类</a></li>
        </ul>
    </div>
    <div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
            <form method="post" action="<?php echo U('Ads/insert_cat');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td style="text-align:right;">上级分类：</td>
                        <td style="text-align:left;">
                            <select name="parentid" id="parentid" style="width: 283px;height: 30px;">
                                <option value="0">作为一级分类</option>
                                <?php echo ($data); ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="text-align:right;">分类名称：</td>
                        <td style="text-align:left;"><input type="text" name="catname" size="35" /><em>*</em></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td style="text-align:left;">
                            <input type="submit" value="提交"/>
                        </td>
                    </tr>
                    <tr><tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
</body>
</html>