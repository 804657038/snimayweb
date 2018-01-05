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
<script type="text/javascript">
function delUser(id) {
	$.dialog.confirm('你确定要删除这个记录吗？', function(){
		window.location.href="<?php echo U('Role/del');?>/id/"+id;
	}, function(){
		//$.dialog.tips('执行取消操作');
	});
}
</script>
    <div class="column_Box mainAutoHeight">
        <div class="tab">
            <ul>
                <li class="current"><a href="javascript:">角色管理</a></li>
            </ul>
        </div>
        <div class="wrapBox mainAutoHeight">
		
			
            <!--管理员列表-->
            <div class="body User">
				<div class="item">
                    <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i><input type="button" value="添加角色" class="submitNoBg" onclick="window.location.href='<?php echo U('Role/add');?>'"/></i></a>
                </div>
				<table border="0" cellpadding="0" cellspacing="0" class="center">
					<thead>
						<tr>
							<th>角色名</th>
							<th>角色描述</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($admin_list)): foreach($admin_list as $key=>$vo): ?><tr>
							<td><?php echo ($vo["role_name"]); ?></td>
							<td><?php echo ($vo["role_describe"]); ?></td>
							<td>
								<span>
									<a title="编辑" href="<?php echo U('Role/edit',array('id'=>$vo['role_id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
									<a title="移除" onclick="delUser('<?php echo ($vo["role_id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif"></a>
								</span>
							</td>
						</tr><?php endforeach; endif; ?>
					</tbody>
				</table>
				
				
				<div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
				
            </div>
        </div>
    </div>
</body>
</html>