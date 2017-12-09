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
function delDealer(id) {
  if(confirm('你确定要删除这个客户吗？')){
    window.location.href="<?php echo U('Dealer/del_dealer');?>/id/"+id;
  }
}
function exportdata(){
  if(confirm('你确定要导出吗？')){
    window.location.href="<?php echo U('Dealer/export_data');?>";
  }
}
</script>
<div class="column_Box mainAutoHeight">
  <div class="tab">
    <ul>
      <li class="current"><a href="javascript:">文章列表</a></li>
    </ul>
  </div>
  <div class="wrapBox mainAutoHeight">
    <!--文章列表-->
    <div class="body User">
      <div class="item" style="height: 60px;">
        <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i style="height: 24px;"><input type="button" value="新建客户" class="submitNoBg" onclick="window.location.href='<?php echo U('Dealer/add_dealer');?>'"/></i></a>
        <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_import"></span><i style="height: 24px;"><input type="button" value="导入经销商" class="submitNoBg" onclick="$('#excel').click();"/></i></a>
        <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_export"></span><i style="height: 24px;"><input type="button" value="导出经销商" class="submitNoBg" onclick="exportdata()"/></i></a>
        <div id="excel_name"></div>
        <div style="display: none;">
          <form action="<?php echo U('Dealer/import_data');?>" method="post" enctype="multipart/form-data" id="excel_from">
            <input type="file" name="excel" id="excel">
          </form>
        </div>
        <script>
          var clear_btn = '<a href="javascript:;" id="clear_btn">清除</a>';
          if($('#excel').val()){
            $('#excel_name').html($('#excel').val()+'&nbsp;&nbsp;&nbsp;'+clear_btn);
          }
          $('#excel').change(function(){
            $('#excel_name').html($(this).val()+'&nbsp;&nbsp;&nbsp;'+clear_btn);
            // alert('修改了表字段，导入需要修改，暂时别用');
            $('#excel_from').submit();
          })
          $('#clear_btn').live('click', function(){
            $('#excel').val('');
            $('#excel_name').empty();
          })
        </script>

        <div class="searchBar" style="text-align: right;line-height: 30px;">
          <form action="<?php echo U('Dealer/index');?>">
            店面类型：
            <select name="store_type" class="dot_Item">
              <option value="">选择类型</option>
              <option value="1" <?php if($filter["store_type"] == 1): ?>selected<?php endif; ?>>衣柜</option>
              <option value="2" <?php if($filter["store_type"] == 2): ?>selected<?php endif; ?>>厨柜</option>
              <!-- <option value="3" <?php if($filter["store_type"] == 3): ?>selected<?php endif; ?>>衣柜+厨柜</option> -->
            </select>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            地区
            <select name="province" id="province" class="dot_Item" style="width: 100px;">
              <option value="">省</option>
              <?php if(is_array($province_list)): foreach($province_list as $key=>$item): ?><option value="<?php echo ($item["province_id"]); ?>" <?php if($item['province_id'] == $filter['province']): ?>selected<?php endif; ?>><?php echo ($item["province_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            <select name="city" id="city" class="dot_Item" style="width: 100px;">
              <option value="">市</option>
              <?php if(!empty($city_list)): if(is_array($city_list)): foreach($city_list as $key=>$item): ?><option value="<?php echo ($item["city_id"]); ?>" <?php if($item['city_id'] == $filter['city']): ?>selected<?php endif; ?>><?php echo ($item["city_name"]); ?></option><?php endforeach; endif; endif; ?>
            </select>
            <select name="district" id="district" class="dot_Item" style="width: 100px;">
              <option value="">区</option>
              <?php if(!empty($district_list)): if(is_array($district_list)): foreach($district_list as $key=>$item): ?><option value="<?php echo ($item["country_id"]); ?>" <?php if($item['country_id'] == $filter['district']): ?>selected<?php endif; ?>><?php echo ($item["country_name"]); ?></option><?php endforeach; endif; endif; ?>
            </select>
            <!-- &nbsp;&nbsp;|&nbsp;&nbsp;
            分部：
            <select name="team" id="team" class="dot_Item" style="width: 100px;">
              <option value="">选择分部</option>
              <?php if(is_array($team_list)): foreach($team_list as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>" <?php if($item['id'] == $filter['team']): ?>selected<?php endif; ?>><?php echo ($item["t_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            开发人：
            <select name="principal" id="principal" class="dot_Item" style="width: 100px;">
              <option value="">选择开发人</option>
              <?php if(!empty($principal_list)): if(is_array($principal_list)): foreach($principal_list as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>" <?php if($item['id'] == $filter['principal']): ?>selected<?php endif; ?>><?php echo ($item["p_name"]); ?></option><?php endforeach; endif; endif; ?>
            </select> -->
            &nbsp;&nbsp;|&nbsp;&nbsp;
            进度：
            <select name="schedule" class="dot_Item">
              <option value="">选择进度</option>
              <option value="1" <?php if($filter["store_type"] == 1): ?>selected<?php endif; ?>>已下厂</option>
              <option value="2" <?php if($filter["store_type"] == 2): ?>selected<?php endif; ?>>正在设计平面图</option>
              <option value="3" <?php if($filter["store_type"] == 3): ?>selected<?php endif; ?>>正在设计施工图</option>
              <option value="4" <?php if($filter["store_type"] == 4): ?>selected<?php endif; ?>>正在设计样柜图</option>
              <option value="14" <?php if($filter["store_type"] == 14): ?>selected<?php endif; ?>>未回传图纸</option>
              <option value="5" <?php if($filter["store_type"] == 5): ?>selected<?php endif; ?>>待客户确认平面图</option>
              <option value="6" <?php if($filter["store_type"] == 6): ?>selected<?php endif; ?>>待客户确认施工图</option>
              <option value="7" <?php if($filter["store_type"] == 7): ?>selected<?php endif; ?>>待客户确认样柜图</option>
              <option value="8" <?php if($filter["store_type"] == 8): ?>selected<?php endif; ?>>待审核图纸</option>
              <option value="9" <?php if($filter["store_type"] == 9): ?>selected<?php endif; ?>>待审核报价</option>
              <option value="10" <?php if($filter["store_type"] == 10): ?>selected<?php endif; ?>>正在计料</option>
              <option value="11" <?php if($filter["store_type"] == 11): ?>selected<?php endif; ?>>待优化</option>
              <option value="12" <?php if($filter["store_type"] == 12): ?>selected<?php endif; ?>>已退出</option>
              <option value="13" <?php if($filter["store_type"] == 13): ?>selected<?php endif; ?>>已开店</option>
            </select>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <br>
            排序方式：
            <select name="sort_by" class="dot_Item">
              <option value="">请选择排序方式</option>
              <option value="id" <?php if($filter["sort_by"] == 'id'): ?>selected<?php endif; ?>>编号</option>
              <option value="join_time" <?php if($filter["sort_by"] == 'join_time'): ?>selected<?php endif; ?>>加盟时间</option>
              <option value="postback_time" <?php if($filter["sort_by"] == 'postback_time'): ?>selected<?php endif; ?>>回传图纸日期</option>
              <option value="specimen_time" <?php if($filter["sort_by"] == 'specimen_time'): ?>selected<?php endif; ?>>样柜下场日期</option>
              <option value="update_time" <?php if($filter["sort_by"] == 'update_time'): ?>selected<?php endif; ?>>更新时间</option>
            </select>
            排序：
            <select name="sort_order" class="dot_Item">
              <option value="">请选择排序</option>
              <option value="DESC" <?php if($_GET['sort_order'] == 'DESC'): ?>selected<?php endif; ?>>倒序</option>
              <option value="ASC" <?php if(($filter["sort_order"] == 'ASC') or empty($_GET['sort_order'])): ?>selected<?php endif; ?>>顺序</option>
            </select>
            <select name="key_type" class="dot_Item">
              <option value="3" <?php if($filter["key_type"] == 3): ?>selected<?php endif; ?>>专卖店名称</option>
              <option value="1" <?php if($filter["key_type"] == 1): ?>selected<?php endif; ?>>开发人</option>
              <option value="2" <?php if($filter["key_type"] == 2): ?>selected<?php endif; ?>>招商部门</option>
            </select> ：
            <input type="text" class="txt" name="keyword" value="<?php echo ($filter["keyword"]); ?>"/>&nbsp;&nbsp;<input type="submit" class="submit btn_search" value="搜索" />
          </form>
        </div>
      </div>
        
      <form method="POST" action="<?php echo U('Dealer/batch');?>" name="listForm">
        <table border="0" cellpadding="0" cellspacing="0" class="center">
          <thead>
            <tr>
              <th style="width:70px;"><input type="checkbox" name="checkBox_All" class="checkBox_All" />编号</th>
              <!-- <th>项目</th> -->
              <th>店面类型</th>
              <th>加盟时间</th>
              <th>省份</th>
              <th>城市</th>
              <th>区/县</th>
              <th>专卖店名称</th>
              <th>姓名</th>
              <th>分部</th>
              <th>开发人</th>
              <th>回传图纸日期</th>
              <th>样柜下场日期</th>
              <th>更新时间</th>
              <th>进度</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                <td><input type="checkbox" name="checkboxes[]" class="checkBox_list" value="<?php echo ($vo["id"]); ?>" /><?php echo ($vo["id"]); ?></td>
                <!-- <td><?php echo ($vo["project"]); ?></td> -->
                <td><?php echo ($vo["store_type_name"]); ?></td>
                <td><?php if(empty($vo["join_time"])): ?>无<?php else: echo (date('Y-m-d',$vo["join_time"])); endif; ?></td>
                <td><?php echo ($vo["province_name"]); ?></td>
                <td><?php echo ($vo["city_name"]); ?></td>
                <td><?php echo ($vo["district_name"]); ?></td>
                <td><?php echo ($vo["shopname"]); ?></td>
                <td><?php echo ($vo["u_name"]); ?></td>
                <td><?php echo ($vo["team_id"]); ?></td>
                <td><?php echo ($vo["principal_id"]); ?></td>
                <td><?php if(empty($vo["postback_time"])): ?>无<?php else: echo (date('Y-m-d',$vo["postback_time"])); endif; ?></td>
                <td><?php if(empty($vo["specimen_time"])): ?>无<?php else: echo (date('Y-m-d',$vo["specimen_time"])); endif; ?></td>
                <td><?php if(empty($vo["update_time"])): ?>无<?php else: echo (date('Y-m-d',$vo["update_time"])); endif; ?></td>
                <td><?php echo ($vo["schedule_name"]); ?></td>
                <td>
                  <span>
                    <a title="编辑" href="<?php echo U('Dealer/edit_dealer',array('id'=>$vo['id']));?>"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_edit.gif"></a>&nbsp;
                    <a title="移除" onclick="delDealer('<?php echo ($vo["id"]); ?>')" href="javascript:;"><img width="16" height="16" border="0" src="__PUBLIC__/Admin/Img/icon_drop.gif"></a>
                  </span>
                </td>
              </tr><?php endforeach; endif; ?>
          </tbody>
        </table>
          
          
        <div class="lineHeight" style="border-bottom:1px dashed #cccccc;"></div>
        <div class="batchChange">
          <!-- <div class="f_l">
            <select onchange="changeAction()" id="selAction" name="type">
              <option value="">请选择...</option>
              <option value="button_remove">批量删除</option>
              <option value="button_hide">批量隐藏</option>
              <option value="button_show">批量显示</option>
              <option value="button_recommend_yes">批量推荐</option>
              <option value="button_recommend_no">取消推荐</option>
              <option value="move_to">转移到分类</option>
            </select>
            <select name="target_cat" style="display:none">
              <option value="0">请选择...</option>
              <?php echo ($cat_select); ?>
            </select>
            <input type="submit" class="button" name="btnSubmit" id="btnSubmit" value=" 确定 "/>
          </div> -->
          <div class="f_r">
            <div class="pagination"><?php echo ($page); ?></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(function(){
    $('#team').change(function(){
      var url = '<?php echo U("Dealer/ajax_team");?>';
      var data = 't_id='+$(this).val();
      
      ajax_post(url, data, teamResult);
    });

    $('#province').change(function(){
      var url = '<?php echo U("Dealer/ajax_region");?>';
      var data = 'province='+$(this).val()+'&type=province';

      ajax_post(url, data, regionResult);
    });
    $('#city').change(function(){
      var url = '<?php echo U("Dealer/ajax_region");?>';
      var data = 'city='+$(this).val()+'&type=city';

      ajax_post(url, data, regionResult);
    });
  })
  function teamResult(data){
    $('#principal').empty();
    $('#principal').append(data.html);
  }
  function regionResult(data){
    if(data.error){
      alert(data.msg);
    }else{
      switch(data.type){
        case 'province':
          $('#city').empty();
          $('#city').append(data.html);
          $('#district').empty();
          $('#district').append('<option value="">区</option>');
          $('#town').empty();
          $('#town').append('<option value="">镇</option>');
          break; 
        case 'city':
          $('#district').empty();
          $('#district').append(data.html);
          $('#town').empty();
          $('#town').append('<option value="">镇</option>');
          break; 
        case 'district':
          $('#town').empty();
          $('#town').append(data.html);
          break; 
      }
    }
  }
  function ajax_post(url, data, resultFunction, type){
    if(!type){
      type = 'json';
    }
    $.post(url, data, resultFunction, type);
  }
</script>
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
</body>
</html>