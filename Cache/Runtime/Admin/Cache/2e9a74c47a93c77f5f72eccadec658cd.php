<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>内容管理=>产品管理</title>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <link href="__PUBLIC__/Admin/lhgdialog/skins/default.css" rel="stylesheet" />
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jquery.treeview.js"></script>
    <script src="__PUBLIC__/Admin/lhgdialog/lhgdialog.min.js"></script>
    <script src="__PUBLIC__/Admin/Js/jQueryPlugin.js"></script>
    <script src="__PUBLIC__/Admin/Js/JavaScript.js"></script>
	<script src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
    <!--[if lte IE 6]>    <script src="__PUBLIC__/Admin/Js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script><script type="text/javascript">DD_belatedPNG.fix('*');</script><![endif]-->
	
	<link rel="stylesheet" href="__PUBLIC__/Admin/colorpicker/css/jquery.bigcolorpicker.css" type="text/css" />
	<script type="text/javascript" src="__PUBLIC__/Admin/Js/imglist.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Admin/colorpicker/js/jquery.bigcolorpicker.js"></script>
	<style type="text/css">textarea{font-size: 12px; line-height: 20px;}</style>
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
	
	// 筛选出分类属性
	$('#cat_id').change(function(){
		var id=$(this).val();
		$.ajax({
			url:"<?php echo U('Goods/cat_attr');?>",
			type:'post',
			data:'cat_id='+id,
			async:false,
			timeout:15000,
			beforeSend:function(XMLHttpRequest){
				$("#loading").html("<img src='__PUBLIC__/Admin/Img/loading.gif' />");
			}, 
			complete:function(XMLHttpRequest,textStatus){
				$("#loading").empty();
			}, 
			success:function(msg){
				$('#cat_attr').html(msg);
			}
	   });
	});
	
	
	$(".f1").bigColorpicker(function(el,color){
		$(el).val(color);
	});
	
});

KindEditor.ready(function(K) {
	K.create('.content', {
		allowFileManager : false,
		pasteType : 2,
		newlineTag : 'p'
	});
});

var editor;
KindEditor.ready(function(K) {
	editor = K.create('.s_content', {
		resizeType : 1,
		allowPreviewEmoticons : false,
		allowImageUpload : true,
		items : [
			'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link']
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
			<form method="post" action="<?php echo U('Goods/update');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td style="text-align:right;" width="100">产品名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="title" value="<?php echo ($info["title"]); ?>"  size="50"/><em>*</em></td>
						</tr>
						<tr>
							<td style="text-align:right;">产品分类：</td>
							<td style="text-align:left;">
								<!-- <select name="cat_id" id="cat_id">
									<option value="0">请选择...</option>
									<?php echo ($cat_select); ?>
								</select><em>*</em> -->
							</td>
						</tr>
                        <?php $num=1; ?>
						<?php if(is_array($cat_list)): $i = 0; $__LIST__ = $cat_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td style="text-align:right;"><?php echo ($vo["cat_name"]); ?>:</td>
							<td>

								<?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i; if($num > 1): ?><label class="label_i parent_<?php echo ($vo2['parent_id']); ?>" <?php if($vo2['parent_id'] != 0): ?>style="display: none"<?php endif; ?>>
                                        <input type="checkbox" name="cat_id[]" value="<?php echo ($vo2["id"]); ?>" <?php if(in_array($vo2['id'],$check_cat)): ?>checked<?php endif; ?>>
                                        <?php echo ($vo2["title"]); ?>
                                        <?php if($vo2['parent_id']!=0){ $ptitle=M('goods_ground')->where('id='.$vo2['parent_id'])->getField('title'); ?>
                                            (<?php echo ($ptitle); ?>专属)
                                        <?php } ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                    </label>
                                    <?php else: ?>
                                        <input type="checkbox" name="cat_id[]" onclick="parent_(this)" value="<?php echo ($vo2["id"]); ?>" <?php if(in_array($vo2['id'],$check_cat)): ?>checked<?php endif; ?>>
                                        <?php echo ($vo2["title"]); ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
							</td>
						</tr>
                            <?php $num++; endforeach; endif; else: echo "" ;endif; ?>
						<tr>
							<td style="text-align:right;">颜色：</td>
							<td style="text-align:left;">
								<?php if(is_array($goods_color)): $i = 0; $__LIST__ = $goods_color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="color[]" value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$check_color)): ?>checked<?php endif; ?>> <img src="__ROOT__/<?php echo ($vo['img']); ?>" style="position:relative;top:5px"> &nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;">可选板材：</td>
							<td style="text-align:left;">
								<input type="checkbox" name="mucai[]" value="1" <?php if(in_array('1',$info['mucai_list'])): ?>checked<?php endif; ?>> 禾香板 
								<input type="checkbox" name="mucai[]" value="2" <?php if(in_array('2',$info['mucai_list'])): ?>checked<?php endif; ?>> E0级实木颗粒板 
							</td>
						</tr>
                        <tr>
                            <td style="text-align:right;">
                                橱柜台面 <br/>
                                (不选不展示)：</td>
                            <td style="text-align:left;">
                                <?php if(is_array($goods_mesa)): $i = 0; $__LIST__ = $goods_mesa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="mesa[]" value="<?php echo (intval($vo["id"])); ?>" <?php if(in_array($vo['id'],$check_mesa)): ?>checked<?php endif; ?>> <img src="__ROOT__/<?php echo ($vo['img']); ?>" width="64" height="21" title="<?php echo ($vo["title"]); ?>" style="position:relative;top:5px"> &nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                            </td>
                        </tr>

						<tr>
							<td style="text-align:right;">商城购买链接：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="link" value="<?php echo ($info["link"]); ?>"  size="50"/></td>
						</tr>
						<!-- <tr>
							<td style="text-align:right;">预约量尺链接：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="link1" value="<?php echo ($info["link1"]); ?>"  size="50"/></td>
						</tr> -->
						<tr>
							<td style="text-align:right;">排序：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info["sort_order"]); ?>" name="sort_order" /></td>
						</tr>
						<tr>
							<td style="text-align:right;">是否显示：</td>
							<td style="text-align:left;">
						      <input type="radio" name="is_open" value="1" <?php if(($info["is_open"]) == "1"): ?>checked<?php endif; ?>/>是&nbsp;&nbsp;
						      <input type="radio" name="is_open" value="0" <?php if(($info["is_open"]) == "0"): ?>checked<?php endif; ?>/>否
							</td>
						</tr>
						<tr>
							<td style="text-align:right;">首页推荐：</td>
							<td style="text-align:left;">
						      <input type="radio" name="is_recommend" value="1" <?php if(($info["is_recommend"]) == "1"): ?>checked<?php endif; ?> />是&nbsp;&nbsp;
						      <input type="radio" name="is_recommend" value="0" <?php if(($info["is_recommend"]) == "0"): ?>checked<?php endif; ?>/>否
							</td>
						</tr>
						<?php if(!empty($info['goods_img'])): ?><tr>
							<td style="text-align:right;">图片预览：</td>
							<td style="text-align:left;"><img src="__ROOT__/<?php echo ($info["goods_img"]); ?>" style='max-height:300px;'/></td>
						</tr><?php endif; ?>
						<tr>
							<td style="text-align:right;">产品图片：</td>
							<td style="text-align:left;">
						      <input type='file' name='goods_img'/>&nbsp;&nbsp;&nbsp;<font color='red'>350px * 233px</font>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"><em>*</em>&nbsp;&nbsp;产品简介</td>
							<td style="text-align:left;"><textarea style="width:580px;height:120px;" name="short"><?php echo ($info["short"]); ?></textarea></td>
						</tr>
						<tr>
							<td style="text-align:right;"><em>*</em>&nbsp;&nbsp;详细介绍</td>
							<td style="text-align:left;"><textarea style="width:880px;height:400px;" name="content" class="content" ><?php echo ($info["content"]); ?></textarea></td>
						</tr>

						<!-- <tr>
							<td style="text-align:right;">扩展内容(产品介绍)<br/><font color='red'>标题为必填，标题为空则不保存内容</font></td>
							<td style="text-align:left;" id='ex_goods_content_td'>
								<?php if(is_array($goods_excontent_list)): foreach($goods_excontent_list as $key=>$item): ?><div>
										<table>
											<tr>
												<td width='270'>
													图片：<input type='file' name='old_ex_img_url[]'/><?php if(!empty($item["img_url"])): ?>&nbsp;<font color='green'>√</font><?php endif; ?><br/>
													标题：<input type='text' name='old_ex_title[]' value='<?php echo ($item["title"]); ?>'/><br/>
													排序：<input type='text' name='old_ex_sort_order[]' size='10' value='<?php echo ($item["sort_order"]); ?>'>
													<input type='hidden' value='<?php echo ($item["id"]); ?>' name='old_ex_id[]'/>
												</td>
												<td width='520'>
													<textarea name='old_ex_content[]' cols='60' rows='3'><?php echo ($item["content"]); ?></textarea>
												</td>
												<td valign='middle'>&nbsp;&nbsp;&nbsp;
													<input type='button' value='删除' onclick="del_ex_content(<?php echo ($item["id"]); ?>,this)";>
												</td>
											</tr>
										</table>
									</div><?php endforeach; endif; ?>

								<div id='ex_goods_content_div' style='display:none;'>
									<table>
										<tr>
											<td width='270'>
												图片：<input type='file' name='ex_img_url[]'/><br/>
												标题：<input type='text' name='ex_title[]'/><br/>
												排序：<input type='text' name='ex_sort_order[]' size='10' value='50'>
											</td>
											<td width='520'>
												<textarea name='ex_content[]' cols='60' rows='3'></textarea>
											</td>
											<td valign='middle'>&nbsp;&nbsp;&nbsp;
												<input type='button' value='添加一个' onclick="add_one();">
												<input type='button' value='取消' onclick="remove_one(this);">
											</td>
										</tr>
									</table>
								</div>
						
								<script type="text/javascript">
								function add_one(){
									var html = $('#ex_goods_content_div').html();
									$('#ex_goods_content_td').append("<div>"+ html +"</div>");
								}

								add_one();
						
								function remove_one(_this){
									var target = $(_this).parent('td').parent('tr');
									if(target.parent('tbody')) target = target.parent('tbody');
									target.parent('table').parent('div').remove();
								}

								function del_ex_content(ex_id,_this){
									var tt = window.confirm('删除不可恢复,你要删除?');
									if(!tt)return false;
									$.get("__URL__/del_ex_content",{'id':ex_id},function(res){
										if(res==1){
											remove_one(_this);
										}else{
											alert(res);
										}
									},'html');
								}
								</script>
							</td>
						</tr> -->

						<!-- <tr>
							<td style="text-align:right;"><em>*</em>&nbsp;&nbsp;产品参数</td>
							<td style="text-align:left;"><textarea style="width:880px;height:200px;" name="content1" class="s_content" ><?php echo ($info["content1"]); ?></textarea></td>
						</tr>
						<tr>
							<td style="text-align:right;"><em>*</em>&nbsp;&nbsp;相关下载</td>
							<td style="text-align:left;">
								<?php if(is_array($related_downloads)): foreach($related_downloads as $key=>$item): ?><div>
										<?php echo ($item["file_desc"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' value='删除' onclick="del_download(<?php echo ($item["id"]); ?>,this);">
									</div><?php endforeach; endif; ?>
						
								<script type="text/javascript">
								function del_download(id,_this){
									$.get('__URL__/del_download',{'id':id},function(res){
										if(res==1){
											$(_this).parent('div').remove();
										}
									});
								}
								</script>
						
								<div>
									<input type='file' name='related_downloads[]'/>
									<input type='button' value='添加一个' onclick="add_one(this);">
									<input type='button' value='取消' onclick="remove_one(this);">
								</div>
						
								<script type="text/javascript">
								function add_one(_this){
									var html = $(_this).parent('div').html();
									$(_this).parent('div').after("<div>"+ html +"</div>");
								}
						
								function remove_one(_this){
									$(_this).parent('div').remove();
								}
								</script>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"><em>*</em>&nbsp;&nbsp;立即购买</td>
							<td style="text-align:left;"><textarea style="width:880px;height:200px;" name="content2" class="s_content" ><?php echo ($info["content2"]); ?></textarea></td>
						</tr> -->
						<tr>
							<td style="text-align:right;">标题：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info["web_title"]); ?>" name="web_title"  /> 	关键字为选填项，其目的在于方便外部搜索引擎搜索</td>
						</tr>
						<tr>
							<td style="text-align:right;">关键字：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info["keywords"]); ?>" name="keywords"  /> 	关键字为选填项，其目的在于方便外部搜索引擎搜索</td>
						</tr>
						<tr>
							<td style="text-align:right;">描述：</td>
							<td style="text-align:left;"><textarea style="width:400px;height:100px;" name="description" ><?php echo ($info["description"]); ?></textarea></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td align='left'>
								<input type='hidden' name='goods_id' value='<?php echo ($info["goods_id"]); ?>'/>
								<input type="submit" value="提交"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
        </div>
    </div>
</div>
<script type="text/javascript" src="__PUBLIC__/Admin/Js/goods.js"></script>
</body>
</html>