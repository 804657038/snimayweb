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
<link rel="stylesheet" type="text/css" href="//minishiningride.mizone.cc/resources/admin/ui.css"/>

<div class="column_Box mainAutoHeight">
    <div class="tab">
        <ul>
            <li class="current"><a href="javascript:">意见反馈列表</a></li>
        </ul>
    </div>
    <div class="wrapBox mainAutoHeight">


        <!--招聘列表-->
        <div class="body User">
            <form action="<?php echo U('Service/feeback');?>" id="header_form">
                <div class="item" style="height: 60px;">
                    <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_export"></span><i style="height: 24px;"><input type="button" value="导出数据" class="submitNoBg" onclick="$('#is_excel').val('1');$('#header_form').submit();"></i></a>
                    <div id="excel_name"></div>
                    <div style="display: none;">
                        <form action="/system.php/Dealer/import_data" method="post" enctype="multipart/form-data" id="excel_from">
                            <input type="file" name="excel" id="excel">
                        </form>
                    </div>

                    <div class="searchBar" style="text-align: right;line-height: 30px;">

                        添加时间:
                        <input class="calendar txt" type="text" name="start_date" value="<?php echo $_GET['start_date'];?>"/>
                        -
                        <input class="calendar txt" type="text" name="end_date" value="<?php echo $_GET['end_date'];?>"/>
                        &nbsp;&nbsp;
                        <input type="hidden" name="is_excel" id="is_excel" value="0"/>
                        <input type="button" onclick="$('#is_excel').val('0');$('#header_form').submit();" class="submit btn_search" value="搜索"/>

                    </div>
                </div>
            </form>
            <form method="POST" action="<?php echo U('Service/batch');?>" name="listForm">
                <table border="0" cellpadding="0" cellspacing="0" class="center">
                    <thead>
                    <tr>
                        <th style="width:70px;">编号</th>
                        <th>姓名</th>
                        <th>手机号码</th>
                        <th>地址</th>
                        <th>问题描述</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td><?php echo ($vo["phone"]); ?></td>
                            <td><?php echo ($vo["addr"]); ?></td>
                            <td><?php echo ($vo["content"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></td>
                            <td>
								<span>
                                    <a title="移除" onclick="del('<?php echo ($vo["id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif"></a>
								</span>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>


                <div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
                <div class="batchChange">
                    <div class="f_r">
                        <div class="pagination"><?php echo ($page); ?></div>
                    </div>
                </div>
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
    function del(id){
        layer.confirm('确认要删除吗？',function(index){
            window.location.href="<?php echo U('Service/del_feeback');?>?id="+id;
        });
    }
</script>