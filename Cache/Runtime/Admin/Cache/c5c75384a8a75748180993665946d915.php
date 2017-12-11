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
<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
<script type="text/javascript">
    $(function(){
        autoHeight(jQuery('.autoHeight'));
        jQuery(".column_Box").each(function () {
            var t = jQuery(this);
            if (t.length < 1) return;
            Tab_click(t.find('.tab ul li'), t.find(".wrapBox .body"));
        });
    });

    KindEditor.ready(function(K) {
        K.create('#content', {
            allowFileManager : false,
            pasteType : 2,
            newlineTag : 'p',
            urlType : 'absolute'
        });
    });
</script>

<div class="column_Box mainAutoHeight">
    <div class="tab">
        <ul>
            <li class="current"><a href="javascript:">联系我们</a></li>
        </ul>
    </div>
    <div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
            <form method="post" action="<?php echo U('Service/insert_contact');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>

                    <tr>
                        <td style="text-align:right;">标题：</td>
                        <td style="text-align:left;"><input type="text" name="title" value="" size="35" /></td>
                    </tr>

                    <tr>
                        <td style="text-align:right;">图片：</td>
                        <td style="text-align:left;"><input type="file" name="image" size="35" /><em>*</em></td>
                    </tr>

                    <tr>
                        <td style="text-align:right;">内容：</td>
                        <td style="text-align:left;"><textarea cols="37" rows="5" name="content"></textarea></td>
                    </tr>

                    <tr>
                        <td style="text-align:right;">排序：</td>
                        <td style="text-align:left;"><input type="text" class="txt" value="50" name="sort_order" size="5"  /><em>*</em> </td>
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