<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>内容管理=>文章管理</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/lhgdialog/skins/default.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.treeview.js"></script>
    <script src="__PUBLIC__/Admin/lhgdialog/lhgdialog.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
	<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
	<script src="__PUBLIC__/Admin/Js/My97DatePicker/WdatePicker.js"></script>
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
			<li class="current"><a href="javascript:">产品属性</a></li>
		</ul>
	</div>
	<div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
			<form method="post" action="<?php echo U('Goodsgro/insert');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td style="text-align:right;">属性名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="title"  size='60'/></td>
						</tr>
						<tr>
							<td style="text-align:right;">排序：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="sort_order"  size='30'/></td>
						</tr>
						<tr>
							<td style="text-align:right;">产品分类：</td>
							<td style="text-align:left;">
								<div id="do_nima">
								<select name="cat_id" class="dot_Item" >
									<option value="0">请选择...</option>
									<?php if(is_array($gc_select)): $i = 0; $__LIST__ = $gc_select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['cat_id']); ?>" ><?php echo ($vo['cat_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								</div>
								
							</td>

						</tr>
                        <tr>
                            <td style="text-align:right;">上级绑定：</td>
                            <td style="text-align:left;">
                                <input type="hidden" name="p_id" value="<?php echo ($ground[0][cat_id]); ?>"/>
                                <div id="do_nima">
                                    <select name="parent_id" class="dot_Item" >
                                        <option value="0">不绑定</option>
                                        <?php if(is_array($ground)): $i = 0; $__LIST__ = $ground;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>" <?php if($info['parent_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <span>*只能绑定第一个产品分类</span>
                                </div>
                            </td>
                        </tr>
						<script type="text/javascript">
							/*$(function(){
								$('.dot_Item').change(function(){
									$('.add_select').remove();
									$.ajax({
									  type: "GET",
						              dataType: "text",
						              url: "<?php echo U('Goodsgro/select_cat');?>",
						              data: {cat_id:$(this).val()}, //参数信息，采用ＪＳ对象的形式，也可以使用URL地址比较传统的&将参数分隔
						              success: function (data) {
						                  $("#do_nima").append(data);
						              }
									})
								})
							})*/
						</script>
						<tr>
							<td>&nbsp;</td>
							<td style="text-align:left;" >
								
								<input type="submit" value="提交"/>
							</td>
					</tbody>
				</table>
			</form>
        </div>
    </div>
</div>
</body>
</html>