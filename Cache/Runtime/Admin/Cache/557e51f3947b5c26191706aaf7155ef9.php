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
<script type="text/javascript">
function delRecruitment(id) {
	$.dialog.confirm('你确定要删除这个留言吗？', function(){
		window.location.href="<?php echo U('Feedback/del');?>/guestbook_id/"+id;
	}, function(){
		//$.dialog.tips('执行取消操作');
	});
}
</script>
    <div class="column_Box mainAutoHeight">
        <div class="tab">
            <ul>
                <li class="current"><a href="javascript:"><?php if($_GET['type'] == 1): ?>加盟<?php elseif($_GET['type'] == 3): ?>量尺<?php else: ?>促销<?php endif; ?>列表</a></li>
            </ul>
        </div>
        <div class="wrapBox mainAutoHeight">
            <!--招聘列表-->
            <div class="body User">
            	<form action="<?php echo U('Feedback/index');?>" id="header_form">
	            	<div class="item" style="height: 60px;">
				        <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_export"></span><i style="height: 24px;"><input type="button" value="导出留言" class="submitNoBg" onclick="$('#is_excel').val('1');$('#header_form').submit();"></i></a>
				        <div id="excel_name"></div>
				        <div style="display: none;">
				          <form action="/system.php/Dealer/import_data" method="post" enctype="multipart/form-data" id="excel_from">
				            <input type="file" name="excel" id="excel">
				          </form>
				        </div>

				        <div class="searchBar" style="text-align: right;line-height: 30px;">
				          
				            留言时间:
				            <input class="calendar txt" type="text" name="start_date" value="<?php echo $_GET['start_date'];?>"/>
							-
							<input class="calendar txt" type="text" name="end_date" value="<?php echo $_GET['end_date'];?>"/>
							&nbsp;&nbsp;
							<input type="hidden" name="is_excel" id="is_excel" value="0"/>
							<input type="button" onclick="$('#is_excel').val('0');$('#header_form').submit();" class="submit btn_search" value="搜索"/>
							<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
							
				        </div>
				    </div>	
			    </form>
				<form method="POST" action="<?php echo U('Feedback/f_batch');?>" name="listForm">
					<table border="0" cellpadding="0" cellspacing="0" class="center">
						<thead>
							<tr>
								<th style="width:70px;"><input type="checkbox" name="checkBox_All" class="checkBox_All" />编号</th>
								<th>姓名</th>
								<th>联系电话</th>
                                <?php if($_GET['type'] == 4): ?><th>来源地区</th><?php endif; ?>
								<?php if($_GET['type'] == 3): ?><th>地址</th><?php endif; ?>
								<?php if($_GET['type'] == 2 || $_GET['type'] == 6 || $_GET['type'] == 7): ?><th>促销活动</th><?php endif; ?>
								<?php if($_GET['type'] == 2 || $_GET['type'] == 1 || $_GET['type'] == 4 || $_GET['type'] == 5 || $_GET['type'] == 6 || $_GET['type'] == 7): ?><th>地区</th><?php endif; ?>
								<th>留言时间</th>
								<?php if($_GET['type'] == 1 || $_GET['type'] == 3): endif; ?><th>查看详情</th>
							</tr>
						</thead>
						<tbody>
							<?php if(is_array($recruitmentList)): foreach($recruitmentList as $key=>$vo): ?><tr>
								<td><input type="checkbox" name="checkboxes[]" class="checkBox_list" value="<?php echo ($vo["guestbook_id"]); ?>" /><?php echo ($vo["guestbook_id"]); ?></td>
								<th><?php echo ($vo["name"]); ?></th>
								<th><?php echo ($vo["phone"]); ?></th>
								<?php if($_GET['type'] == 3): ?><th><?php echo ($vo["province"]); ?>--<?php echo ($vo["city"]); ?>--<?php echo ($vo['district']); ?></th><?php endif; ?>
								<?php if($_GET['type'] == 2 || $_GET['type'] == 6 || $_GET['type'] == 7): ?><th><?php echo ($vo["hd_name"]); ?></th><?php endif; ?>

                                <?php if($_GET['type'] == 4): ?><th><?php echo ($vo["address"]); ?></th><?php endif; ?>
								<?php if($_GET['type'] == 2 || $_GET['type'] == 1 || $_GET['type'] == 4 || $_GET['type'] == 5 || $_GET['type'] == 6 || $_GET['type'] == 7): ?><th><?php echo ($vo["province"]); ?>--<?php echo ($vo["city"]); ?>--<?php echo ($vo['district']); ?></th><?php endif; ?>
								<th><?php echo ($vo["add_time"]); ?></th>
								<?php if($_GET['type'] == 1 || $_GET['type'] == 3): endif; ?><td>
									<span>
										<a title="查看详情" href="<?php echo U('Feedback/edit',array('id'=>$vo['guestbook_id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
										<a title="移除" onclick="delRecruitment('<?php echo ($vo["guestbook_id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif"></a>
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
							<!-- <option value="button_hide">批量隐藏</option>
							<option value="button_show">批量显示</option> -->
							<!-- <option value="button_recommend_yes">批量推荐</option>
							<option value="button_recommend_no">取消推荐</option>
							<option value="move_to">转移到分类</option> -->
							</select>
							<select name="target_cat" style="display:none">
								<option value="0">请选择...</option>
								<?php echo ($cat_select); ?>
							</select>
							<input type="submit" class="button" name="btnSubmit" id="btnSubmit" value=" 确定 "/>
						</div>
						<div class="f_r">
							<div class="pagination"><?php echo ($page); ?></div>
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
				  return confirm('您确定要删除文章吗');
			  }else if (frm.elements['type'].value == 'not_on_sale'){
				  return confirm('您确定要隐藏文章吗');
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