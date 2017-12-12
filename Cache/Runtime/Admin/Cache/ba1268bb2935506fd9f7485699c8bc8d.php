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
function delEmphasis(store_type, ar) {
  if(confirm('你确定要删除此处所选吗？')){
    window.location.href="<?php echo U('Dealer/del_emphasis');?>/store_type/"+store_type+"/ar/"+ar;
  }
}
</script>
<div class="column_Box mainAutoHeight">
  <div class="tab">
    <ul>
      <li class="current"><a href="javascript:">重点区域列表</a></li>
    </ul>
  </div>
  <style>
    .column_Box .body .store_type { width: 100%; }
    .column_Box .body .store_type li { float: left;padding: 10px;font-size: 16px;font-family: '微软雅黑'; }
    .column_Box .body .store_type li.on { border-bottom: 2px solid #da251d; }
    .column_Box .body table { text-align: center;width: 80%;margin-top: 50px; }
    .column_Box .body table td.b { font-weight: bold; }
  </style>
  <div class="wrapBox mainAutoHeight">
    <!--文章列表-->
    <div class="body User">
      <div class="item">
        <a href="javascript:void(0);" class="dot_Item"><span class="Icon_item icon_xingjian"></span><i><input type="button" value="添加重点区域" class="submitNoBg" onclick="window.location.href='<?php echo U('Dealer/emphasis_info',array('type'=>$store_type));?>'"/></i></a>
      </div>
        
      <ul class="store_type">
        <li <?php if($store_type == 1): ?>class="on"<?php endif; ?>><a href="<?php echo U('Dealer/emphasis',array('type'=>1));?>">衣柜</a></li>
        <li <?php if($store_type == 2): ?>class="on"<?php endif; ?>><a href="<?php echo U('Dealer/emphasis',array('type'=>2));?>">橱柜</a></li>
        <!-- <li <?php if($store_type == 3): ?>class="on"<?php endif; ?>><a href="<?php echo U('Dealer/emphasis',array('type'=>3));?>">衣柜+橱柜</a></li> -->
        <div style="clear: both;"></div>
      </ul>
      <table>
        <tr>
          <td class="b" width="150px">省级区域</td>
          <td>
            <?php if(empty($province_list)): ?>未选择任何省份！
            <?php else: ?>
              <?php if(is_array($province_list)): foreach($province_list as $key=>$item): echo ($item["province_name"]); ?> &nbsp;&nbsp;&nbsp;<?php endforeach; endif; endif; ?>
          </td>
          <td width="150px"><a href="<?php echo U('Dealer/emphasis_info',array('type'=>$store_type,'filtrate'=>'province'));?>">修改</a> &nbsp; | &nbsp; <a href="javascript:;" onclick="delEmphasis(<?php echo ($store_type); ?>, 'province')">删除</a></td>
        </tr>
      </table>
      <table>
        <tr>
          <td class="b" width="150px">市级区域</td>
          <td>
            <?php if(empty($city_list)): ?>未选择任何城市！
            <?php else: ?>
              <?php if(is_array($city_list)): foreach($city_list as $key=>$item): echo ($item["city_name"]); ?> &nbsp;&nbsp;&nbsp;<?php endforeach; endif; endif; ?>
          </td>
          <td width="150px"><a href="<?php echo U('Dealer/emphasis_info',array('type'=>$store_type,'filtrate'=>'city'));?>">修改</a> &nbsp; | &nbsp; <a href="javascript:;" onclick="delEmphasis(<?php echo ($store_type); ?>, 'city')">删除</a></td>
        </tr>
      </table>
      <table>
        <tr>
          <td class="b" width="150px">县级区域</td>
          <td>
            <?php if(empty($district_list)): ?>未选择任何县区！
            <?php else: ?>
              <?php if(is_array($district_list)): foreach($district_list as $key=>$item): echo ($item["district_name"]); ?> &nbsp;&nbsp;&nbsp;<?php endforeach; endif; endif; ?>
          </td>
          <td width="150px"><a href="<?php echo U('Dealer/emphasis_info',array('type'=>$store_type,'filtrate'=>'district'));?>">修改</a> &nbsp; | &nbsp; <a href="javascript:;" onclick="delEmphasis(<?php echo ($store_type); ?>, 'district')">删除</a></td>
        </tr>
      </table>
      <table>
        <tr>
          <td class="b" width="150px">镇级区域</td>
          <td>
            <?php if(empty($town_list)): ?>未选择任何乡镇！
            <?php else: ?>
              <?php if(is_array($town_list)): foreach($town_list as $key=>$item): echo ($item["town_name"]); ?> &nbsp;&nbsp;&nbsp;<?php endforeach; endif; endif; ?>
          </td>
          <td width="150px"><a href="<?php echo U('Dealer/emphasis_info',array('type'=>$store_type,'filtrate'=>'town'));?>">修改</a> &nbsp; | &nbsp; <a href="javascript:;" onclick="delEmphasis(<?php echo ($store_type); ?>, 'town')">删除</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
</body>
</html>