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
            <li class="current"><a href="javascript:">联系我们列表</a></li>
        </ul>
    </div>
    <div class="wrapBox mainAutoHeight">


        <!--广告图列表-->
        <div class="body User">
            <div class="item">
                <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i><input type="button" value="新建联系我们" class="submitNoBg" onclick="window.location.href='<?php echo U('Service/add_contact');?>'"/></i></a>
            </div>
            <form method="POST" action="<?php echo U('Service/batch');?>" name="listForm">
                <table border="0" cellpadding="0" cellspacing="0" class="center">
                    <thead>
                    <tr>
                        <th style="width:70px;">编号</th>
                        <th>标题</th>
                        <th>预览</th>
                        <th>内容</th>
                        <th>添加时间</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($adsList)): foreach($adsList as $key=>$vo): ?><tr>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><font color='red'><?php echo ($vo["title"]); ?></font></td>
                            <td><img src="__ROOT__/<?php echo ($vo["image"]); ?>" style='max-width:300px; max-height:200px;'/></td>
                            <td><?php echo (nl2br($vo["content"])); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
                            <td><?php echo ($vo["sort_order"]); ?></td>
                            <td>
									<span>
										<a title="编辑" href="<?php echo U('Service/edit_contact',array('id'=>$vo['id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
										<a title="移除" onclick="delAds('<?php echo ($vo["id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif">
                                        </a>
									</span>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>


                <div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    layui.use(['layer'], function(){
        var layer = layui.layer;
    });
    function delAds(id) {
        layer.confirm('确认要删除吗？',function(index){
            window.location.href="<?php echo U('Service/del_contact');?>?id="+id;
        });
    }
</script>