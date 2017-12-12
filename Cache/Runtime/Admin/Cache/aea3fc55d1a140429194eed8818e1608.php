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
function delStore(id) {
	$.dialog.confirm('你确定要删除这个门店吗？', function(){
		window.location.href="<?php echo U('Store/del');?>/store_id/"+id;
	}, function(){
		//$.dialog.tips('执行取消操作');
	});
}
</script>
    <div class="column_Box mainAutoHeight">
        <div class="tab">
            <ul>
                <li class="current"><a href="javascript:">门店列表</a></li>
            </ul>
        </div>
        <div class="wrapBox mainAutoHeight">
		
			
            <!--广告图列表-->
            <div class="body User">
                <div class="item">
                    <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i><input type="button" value="新建门店" class="submitNoBg" onclick="window.location.href='<?php echo U('Store/add',array('cat_id'=>$cat_id));?>'"/></i></a>
                   	<div class="searchBar">
						<form action="<?php echo U('Store/index');?>">
							<!-- 所属分组：
							<select name="group_id" class="dot_Item">
								<option value="">全部分组</option>
								<?php if(is_array($group_id)): $i = 0; $__LIST__ = $group_id;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["group_id"]); ?>" <?php if($vo['group_id'] == $filter['group_id']): ?>selected=""<?php endif; ?>><?php echo ($vo["group_id"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

							</select> -->
							
							门店名称 ：
							<input type="text" class="txt" name="keyword" value="<?php echo ($filter["keyword"]); ?>"/>&nbsp;&nbsp;<input type="submit" class="submit btn_search" value="搜索" />
						</form>
					</div>
                </div>
				
				<form method="POST" action="<?php echo U('Store/batch');?>" name="listForm">
					<table border="0" cellpadding="0" cellspacing="0" class="center">
						<thead>
							<tr>
								<th style="width:70px;">编号</th>
								<!-- <th>广告图标题</th> -->
								<th style="width:200px;">门店名称</th>
								<th style="width:200px;">门店地址</th>
								<th>营业时间</th>
								<th>联系方式</th>
								<th>门店图片</th>
								<th>排序</th>
								<!-- <th>是否显示</th> -->
								<!-- <th>图片尺寸</th> -->
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($storeList)): foreach($storeList as $key=>$vo): ?><tr>
								<td><?php echo ($vo["id"]); ?></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td><?php echo ($vo["address"]); ?></td>
								<td><?php echo ($vo["time"]); ?></td>
								<td><?php echo ($vo["phone"]); ?></td>
								<td><img src="__ROOT__/<?php echo ($vo["original_img"]); ?>" style='max-width:200px; max-height:100px;'/></td>
								<td><?php echo ($vo["sort_order"]); ?></td>
								<td>
									<span>
										<a title="编辑" href="<?php echo U('Store/edit',array('id'=>$vo['id'],'cat_id'=>$vo['cat_id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
										<a title="移除" onclick="delStore('<?php echo ($vo["id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif">
										</a>
									</span>
								</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
						<div class="f_r">
							<div class="pagination"><?php echo ($page); ?></div>
						</div>
					
					<div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
				</form>
            </div>
        </div>
    </div>
</body>
</html>