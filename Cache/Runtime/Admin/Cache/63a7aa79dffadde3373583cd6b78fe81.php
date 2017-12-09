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
function delRecruitment(id) {
	$.dialog.confirm('你确定要删除这个吗？', function(){
		window.location.href="<?php echo U('Goodscolor/del');?>/id/"+id;
	}, function(){
		//$.dialog.tips('执行取消操作');
	});
}
</script>
    <div class="column_Box mainAutoHeight">
        <div class="tab">
            <ul>
                <li class="current"><a href="javascript:">属性列表</a></li>
            </ul>
        </div>
        <div class="wrapBox mainAutoHeight">
            <!--招聘列表-->
            <div class="body User">
            	<div class="item">
                   <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i><input type="button" value="添加属性" class="submitNoBg" onclick="window.location.href='<?php echo U('Goodscolor/add');?>'"/></i></a>
                   <div class="searchBar">
						<form action="<?php echo U('Goodscolor/index');?>">
							所属分类：
							<select name="cat" class="dot_Item">
								<option value="0">全部分类</option>
								<?php if(is_array($catlist)): $i = 0; $__LIST__ = $catlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cat_id"]); ?>"><?php echo ($vo["cat_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							属性名称 ：
							<input type="text" class="txt" name="keyword" value="<?php echo ($filter["keyword"]); ?>"/>&nbsp;&nbsp;<input type="submit" class="submit btn_search" value="搜索" />
						</form>
                    </div>
                </div>
				<form method="POST" action="<?php echo U('Goodscolor/batch');?>" name="listForm">
					<table border="0" cellpadding="0" cellspacing="0" class="center">
						<thead>
							<tr>
								<th style="width:70px;"><input type="checkbox" name="checkBox_All" class="checkBox_All" />编号</th>
								
								<th>属性名称</th>
								<th>示例图片</th>
								<!-- <th>排序</th> -->
								<th>查看详情</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($recruitmentList)): foreach($recruitmentList as $key=>$vo): ?><tr>
								<td><input type="checkbox" name="checkboxes[]" class="checkBox_list" value="<?php echo ($vo["goods_id"]); ?>" /><?php echo ($vo["id"]); ?></td>
								
								<th><?php echo ($vo["title"]); ?></th>
								<th><img src="__ROOT__/<?php echo ($vo["img"]); ?>" style="top:5px;position:relative"></th>
								<!-- <th><?php echo ($vo["sort_order"]); ?></th> -->
								<td>
									<span>
										<a title="查看详情" href="<?php echo U('Goodscolor/edit',array('id'=>$vo['id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
										<a title="移除" onclick="delRecruitment('<?php echo ($vo["id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif"></a>
									</span>
								</td>
							</tr><?php endforeach; endif; ?>
						</tbody>
					</table>
						<div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
						<div class="batchChange">
							<div class="f_l">
								<select onchange="changeAction()" id="selAction" name="type">
								<option value="">请选择...</option>
								<option value="button_remove">批量删除</option>
								<!--<option value="button_hide">批量隐藏</option>
								<option value="button_show">批量显示</option>
								 <option value="move_to">转移到分类</option> -->
								</select>
								<!-- <select name="target_cat" style="display:none">
									<option value="0">请选择...</option>
									<?php echo ($cat_select); ?>
								</select> -->
								<input type="submit" class="button" name="btnSubmit" id="btnSubmit" value=" 确定 "/>
							</div>
							<div class="f_r">
								<div class="pagination"><?php echo ($page); ?></div>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
        <script type="text/javascript">
        	/**
			   * @param: bool ext 其他条件：用于转移分类
			   */
			  function confirmSubmit(frm, ext){
				  if (frm.elements['type'].value == 'button_remove'){
					  return confirm('您确定要删除产品吗');
				  }else if (frm.elements['type'].value == 'not_on_sale'){
					  return confirm('您确定要隐藏产品吗');
				  }else if (frm.elements['type'].value == 'move_to'){
					  ext = (ext == undefined) ? true : ext;
					  return ext && frm.elements['target_cat'].value != 0;
				  }else if (frm.elements['type'].value == ''){
					  return false;
				  }else{
					  return true;
				  }
			  }
        	function changeAction(){
			  var frm = document.forms['listForm'];
			  // 切换分类列表的显示
			  frm.elements['target_cat'].style.display = frm.elements['type'].value == 'move_to' ? '' : 'none';
			  if (!document.getElementById('btnSubmit').disabled &&
				  confirmSubmit(frm, false)){
				  frm.submit();
			  }
		  }
        </script>
    </div>
</body>
</html>