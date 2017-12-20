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
KindEditor.ready(function(K) {
	K.create('#content1', {
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
			<li class="current"><a href="javascript:">文章属性</a></li>
		</ul>
	</div>
	<div class="column_Box mainAutoHeight wrapBox">
        <div class="body">
			<form method="post" action="<?php echo U('Article/update');?>" id="submitForm" name="submitForm" enctype="multipart/form-data">
				<table border="0" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td style="text-align:right;" width="100">文章名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" name="title" value="<?php echo ($info["title"]); ?>" size='60'/><em>*</em></td>
						</tr>
						<tr>
							<td style="text-align:right;">英文名称：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info["en_title"]); ?>" name="en_title" size='60' /></td>
						</tr>
						<tr>
							<td style="text-align:right;">文章分类：</td>
							<td style="text-align:left;">
								<select name="cat_id">
									<option value="0">请选择...</option>
									<?php echo ($cat_select); ?>
								</select>
							<em>*</em></td>
						</tr>
						<tr>
							<td style="text-align:right;">排序：</td>
							<td style="text-align:left;"><input type="text" class="txt" value="<?php echo ($info["sort_order"]); ?>" name="sort_order"  /><em>*</em> </td>
						</tr>
						<tr>
							<td style="text-align:right;">是否置顶：</td>
							<td style="text-align:left;">
						      <input type="radio" name="is_top" value="1" <?php if(($info["is_top"]) == "1"): ?>checked<?php endif; ?>/>是&nbsp;&nbsp;
							  <input type="radio" name="is_top" value="0" <?php if(empty($info["is_top"])): ?>checked<?php endif; ?>/>否
							</td>
						</tr>
						<?php if($cat_id == 16 || $cat_id == 17 || $cat_id == 18 || $cat_id > 89 && $cat_id < 111): ?><tr>
							<td style="text-align:right;">新闻标签：</td>
							<td style="text-align:left;">
							  <?php if(is_array($tag_list)): $i = 0; $__LIST__ = $tag_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="tip[]" value="<?php echo ($vo); ?>" <?php if(in_array($vo,$info['list'])): ?>checked<?php endif; ?> /><?php echo ($vo); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
							</td>
						</tr><?php endif; ?>
						<!-- <tr>
							<td style="text-align:right;">是否显示：</td>
							<td style="text-align:left;">
						      <input type="radio" name="is_open" value="1" checked="checked"/>是&nbsp;&nbsp;
						      <input type="radio" name="is_open" value="0"/>否
							</td>
						</tr> -->
						<?php if($cat_id == 4): ?><tr>
								<td style="text-align:right;">职位名称：</td>
								<td style="text-align:left;">
									<input type="text" name='zw_name' value="<?php echo ($info["zw_name"]); ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">工作类型：</td>
								<td style="text-align:left;">
									<input type="text" name='job_type' value="<?php echo ($info["job_type"]); ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">工作地点：</td>
								<td style="text-align:left;">
									<input type="text" name='location' value="<?php echo ($info["location"]); ?>">
								</td>
							</tr>

							<tr>
								<td style="text-align:right;">添加时间：</td>
								<td style="text-align:left;">
									<input type="text" name='add_time' value="<?php echo (date('Y-m-d',$info["add_time"])); ?>" onclick="WdatePicker();">&nbsp;<font color='red'>留空为当前时间</font>
								</td>
							</tr>

							
						<?php elseif($cat_id == 5): ?>
							<tr>
								<td style="text-align:right;">地区：</td>
								<td style="text-align:left;">
									<select name='province' id='province' onchange="getRegion(this.value,'city');">
										
									</select>
									<select name='city' id='city' style="display:none";>
										
									</select>
									<script type="text/javascript">
									var province = parseInt('[province]') || parseInt('<?php echo ($info["province"]); ?>');
									var city = parseInt('[city]') || parseInt('<?php echo ($info["city"]); ?>');
									function getRegion(region_id, container){
										var url = "<?php echo U('Control/getRegion');?>";
										$.get(url,{'region_id':region_id},function(res){
											$('#'+container+' option:gt(0)').remove();
											$('#'+container).append(res);
											$('#'+container).show();
											if(container == 'province' && province>0){
												document.getElementById('province').value = province;
												getRegion(province, 'city');
											}
											if(container == 'city' && city>0){
												document.getElementById('city').value = city;
												//getRegion(city, 'district');
											}
											/*if(container == 'district' && district>0){
												document.getElementById('district').value = district;
											}*/
										},'html')
									}
									getRegion(1, 'province');
									</script>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">专卖店名称：</td>
								<td style="text-align:left;">
									<input type="text" name='z_name' size="50" value="<?php echo ($info["z_name"]); ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">专卖店地址：</td>
								<td style="text-align:left;">
									<input type="text" name='z_loca' size="50" value="<?php echo ($info["z_loca"]); ?>">
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">营业时间：</td>
								<td style="text-align:left;">
									<input type="text" name='z_tel' size="50" value="<?php echo ($info["z_tel"]); ?>">
								</td>
							</tr>
						<?php else: ?>
							<tr>
								<td style="text-align:right;">首页推荐：</td>
								<td style="text-align:left;">
							      <input type="radio" name="is_recommend" value="1" <?php if(($info["is_recommend"]) == "1"): ?>checked<?php endif; ?>/>是&nbsp;&nbsp;
							      <input type="radio" name="is_recommend" value="0" <?php if(empty($info["is_recommend"])): ?>checked<?php endif; ?>/>否
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">定时发布时间：</td>
								<td style="text-align:left;">
									<input type="text" name='f_time' value="<?php echo (date('Y-m-d H:i:5',$info["f_time"])); ?>">&nbsp;<font color='red'></font>
								</td>
							</tr>
							<tr>
								<td style="text-align:right;">添加时间：</td>
								<td style="text-align:left;">
									<input type="text" name='add_time' value="<?php echo (date('Y-m-d',$info["add_time"])); ?>" onclick="WdatePicker();">&nbsp;<font color='red'>留空为当前时间</font>
								</td>
							</tr>
							<?php if(!empty($info['thumb_img']) || !empty($info['original_img'])): ?><tr>
								<td style="text-align:right;">图片预览：</td>
								<td style="text-align:left;"><img src="__ROOT__/<?php if(empty($info["original_img"])): echo ($info["thumb_img"]); else: echo ($info["original_img"]); endif; ?>" style='max-height:300px;'/></td>
							</tr><?php endif; ?>
							<tr>
								<td style="text-align:right;">文章图片：</td>
								<td style="text-align:left;">
									<input type="file" name="article_img" size="35" /><br/>
									<font color="#ff0000">
									 新闻中心 ：400px * 250px<br/>
									 加盟支持 ：296px * 196px<br/>
									 促销活动 ：618px * 403px<br/>
									</font>
								</td>
							</tr>
							<?php if($cat_id == 19): ?><if condition="!empty($info['thumb_img1']) || !empty($info['original_img1'])">
								<tr>
									<td style="text-align:right;">图片预览：</td>
									<td style="text-align:left;"><img src="__ROOT__/<?php if(empty($info["original_img1"])): echo ($info["thumb_img1"]); else: echo ($info["original_img1"]); endif; ?>" style='max-height:300px;'/></td>
								</tr><?php endif; ?>
								 <tr>
									<td style="text-align:right;">促销底图：</td>
									<td style="text-align:left;">
										<input type="file" name="article_img1" size="35" /><br/>
										<font color="#ff0000">
										 1920px * 374px<br/>
										</font>
									</td>	
								</tr> 
								<tr>
								<td style="text-align:right;">是否进行中：</td>
								<td style="text-align:left;">
							      <input type="radio" name="is_ing" value="1" <?php if(($info["is_ing"]) == "1"): ?>checked<?php endif; ?>/>是&nbsp;&nbsp;
							      <input type="radio" name="is_ing" value="0" <?php if(empty($info["is_ing"])): ?>checked<?php endif; ?>/>否
								</td>
							</tr><?php endif; ?>
              <?php if($cat_id == 51): ?><tr>
                  <td style="text-align:right;">视频上传：</td>
                  <td style="text-align:left;"><input type="hidden" name="video" id="video" value=""></td>
                </tr><?php endif; ?>
              <?php if(($cat_id == 56) or ($cat_id == 58) or ($cat_id == 59) or ($cat_id == 60) or ($cat_id == 75)): ?><tr>
                  <td style="text-align:right;">视频上传：</td>
                  <td style="text-align:left;"></td>
                </tr>
                <tr>
                  <td style="text-align:right;">外部视频：</td>
                  <td style="text-align:left;"><input type="text" name="video" id="video" value="<?php echo ($info["video"]); ?>">若上传视频请勿修改此处，若外部视频直接将链接填入此处即可</td>
                </tr><?php endif; ?>
							<tr>
								<td style="text-align:right;">文章简述：</td>
								<td style="text-align:left;"><textarea style="width:530px;height:100px;font-size:12px;" name="short" ><?php echo ($info["short"]); ?></textarea></td>
							</tr>
							<tr>
								<td style="text-align:right;">文章内容：</td>
								<td style="text-align:left;"><textarea style="width:880px;height:400px;" name="content" id="content" ><?php echo ($info["content"]); ?></textarea></td>
							</tr>
							<?php if($cat_id == 2 || $cat_id == 19 || $cat_id == 24 ): ?><tr>
								<td style="text-align:right;">(手机端)文章内容：</td>
								<td style="text-align:left;"><textarea style="width:880px;height:400px;" name="content1" id="content1" ><?php echo ($info["content1"]); ?></textarea></td>
							</tr><?php endif; ?>
							<tr>
								<td style="text-align:right;">网站标题：</td>
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
						</if>
							<!-- <tr>
								<td style="text-align:right;">附件：</td>
								<td style="text-align:left;"><input name='file_url' type='file'/>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($info["file_url"])): ?><font color='green'>✔</font><?php endif; ?></td>
							</tr> -->
						<tr>
							<td>&nbsp;</td>
							<td style="text-align:left;" >
								<input type="hidden" name="id" value="<?php echo ($info["article_id"]); ?>"/>
								<input type="submit" value="提交"/>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
      <script>
        $(function(){
          $('#video_name').on('change', function(){
            $('#video').val($(this).val());
          })
        })
      </script>
    </div>
  </div>
</div>
</body>
</html>