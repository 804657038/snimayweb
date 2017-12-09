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
			<li class="current"><a href="javascript:">广告图属性</a></li>
		</ul>
	</div>
	<div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
			<form method="post" action="<?php echo U('Ads/update');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
                        <tr>
                            <td style="text-align:right;">分类：</td>
                            <td style="text-align:left;">
                                <select name="cat_id" id="cat_id" onchange="mx()" style="width: 283px;height: 30px;">
                                    <option value="">请选择</option>
                                    <?php echo ($data); ?>
                                </select>
                                <em>*</em>
                            </td>
                        </tr>
						<tr>
							<td style="text-align:right;">外部链接：</td>
							<td style="text-align:left;"><input type="text" name="link" value="<?php echo ($info['link']); ?>" size="35" /></td>
						</tr>
						<tr>
							<td style="text-align:right;">广告图预览：</td>
							<td style="text-align:left;"><img src="__ROOT__/<?php echo ($info['original_img']); ?>" style='max-width:500px; max-height:200px;'/></td>
						</tr>
						
						<tr>
							<td style="text-align:right;">广告图图片：</td>
							<td style="text-align:left;"><input type="file" name="ads_img" size="35" /><em>*</em></td>
						</tr>
						
						<tr>
							<td style="text-align:right;">广告图标题：</td>
							<td style="text-align:left;"><input type="text" name="title" size="50" value="<?php echo ($info['title']); ?>" /></td>
						</tr>
						<tr>
							<td style="text-align:right;">广告图英文标题：</td>
							<td style="text-align:left;"><input type="text" name="en_title" size="50" value="<?php echo ($info['en_title']); ?>" /></td>
						</tr>
						<!--<tr>
							<td style="text-align:right;">文章简述：</td>
							<td style="text-align:left;"><textarea style="width:500px;height:300px;" name="description" id="content" ><?php echo ($info['description']); ?></textarea></td>
						</tr> -->


						<tr>
							<td style="text-align:right;">广告图简述：</td>
							<td style="text-align:left;">
								<?php if(($_GET['cat_id']) == "1"): ?><textarea cols="30" rows="5" name="description"><?php echo ($info['description']); ?></textarea>
								<?php else: ?>
								<input type="text" name="description" size="60" value="<?php echo ($info['description']); ?>"/><?php endif; ?>
							</td>
						</tr>
						
						<tr>
							<td style="text-align:right;">排序：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info['sort_order']); ?>" name="sort_order" size="5"  /><em>*</em> </td>
						</tr>
						
						<!-- <tr>
							<td style="text-align:right;">是否开启：</td>
							<td style="text-align:left;"><input type="radio" name="is_open" value="1" <?php if($info['is_open'] == 1): ?>checked="true"<?php endif; ?>/>是 <input type="radio" name="is_open" value="0" <?php if($info['is_open'] == 0): ?>checked="true"<?php endif; ?>/>否</td>
						</tr> -->

						<tr>
							<td style="text-align:right;">图片尺寸：</td>
							<td style="text-align:left;"><input type="text" name="img_size" value='<?php echo ($info["img_size"]); ?>' style='color:red;' /></td>
						</tr>


							<tr id="art" style="display: none">
								<td style="text-align:right;">关联内页：</td>
								<td style="text-align:left;">
									<select name="article_id" id="article_id">
										<option value="">请选择</option>
										<?php if(is_array($nav_list)): foreach($nav_list as $key=>$item): ?><option value="<?php echo ($item["cat_id"]); ?>" <?php if($item['cat_id'] == $info['article_id']): ?>selected<?php endif; ?>><?php echo ($item["cat_name"]); ?></option><?php endforeach; endif; ?>
									</select>
								</td>
							</tr>

						
						<tr>
							<td>&nbsp;</td>
							<td style="text-align:left;">
								<input type="hidden" name="ads_id" value="<?php echo ($info["ads_id"]); ?>"/>
								<input type="hidden" name="cat_id" value="<?php echo ($info["cat_id"]); ?>"/>
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
<script type="text/javascript">
    var cid = "<?php echo ($cat_id); ?>";
    if(cid == 17){
        $("#art").show();
    }
    function mx(){
        var cat_id = $("#cat_id").val();
        if(cat_id == 17){
            $("#art").show();
        }else{
            $("#art").hide();
        }
    }
</script>