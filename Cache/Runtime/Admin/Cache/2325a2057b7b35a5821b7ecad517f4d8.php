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
function delPrincipal(id) {
  if(confirm('你确定要删除这个开发人吗？')){
    window.location.href="<?php echo U('Dealer/del_principal');?>/id/"+id;
  }
}
</script>
<div class="column_Box mainAutoHeight">
  <div class="tab">
    <ul>
      <li class="current"><a href="javascript:">文章列表</a></li>
    </ul>
  </div>
  <style>
    .column_Box .body table { text-align: center;width: 50%; }
    .column_Box .body table + table { margin-top: 50px; }
    .column_Box .body table td.b { font-weight: bold; }
    .column_Box .body table td.l { text-align: left; }
    .column_Box .body table tr.title { text-align: left; }
    .column_Box .body table .dot_Item { position: static;float: none;padding: 0 0 0 10px;display: inline-block;line-height: normal; }
    .column_Box .body table .dot_Item i { line-height: normal; }
    .column_Box .body table .dot_Item i input { height: 24px; }
  </style>
  <div class="wrapBox mainAutoHeight">
    <!--文章列表-->
    <div class="body User">
      <?php if(is_array($team_list)): foreach($team_list as $key=>$vo): ?><table>
          <tr class="title">
            <td colspan="7"><?php echo ($vo["t_name"]); ?> &nbsp;&nbsp; <a href="javascript:void(0);" class="dot_Item"><i><input type="button" class="add_principal submitNoBg" data-id="<?php echo ($vo["id"]); ?>" value="添加开发人" class="submitNoBg"></i></a></td>
          </tr>
          <?php if(is_array($vo["sub"])): foreach($vo["sub"] as $key=>$item): ?><tr>
              <td class="b" width="10%">开发人：</td>
              <td width="15%" class="p_name_td_<?php echo ($item["id"]); ?>"><?php echo ($item["p_name"]); ?></td>
              <td class="b" width="10%">电话：</td>
              <td width="15%" class="tel_td_<?php echo ($item["id"]); ?>"><?php echo ($item["tel"]); ?></td>
              <td class="b" width="10%">密码：</td>
              <td width="15%" class="pwd_td_<?php echo ($item["id"]); ?>"><?php echo ($item["pwd"]); ?></td>
              <td width="20%" class="edit_wrap_<?php echo ($item["id"]); ?>"><a href="javascript:;" onclick="editPrincipal('<?php echo ($item["id"]); ?>', '<?php echo ($vo["id"]); ?>')">修改</a> &nbsp; | &nbsp; <a title="移除" onclick="delPrincipal('<?php echo ($item["id"]); ?>')" href="javascript:;">删除</a></td>
            </tr><?php endforeach; endif; ?>
          <tr class="add_wrap_<?php echo ($vo["id"]); ?>">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table><?php endforeach; endif; ?>
    </div>
  </div>
</div>
<script>
  $(function(){
    $('.add_principal').click(function(){
      var id = $(this).attr('data-id');
      var html = '<td>开发人：</td><td class="l"><input name="p_name_'+id+'" class="p_name_'+id+'"></td><td>电话：</td><td class="l"><input name="tel_'+id+'" class="tel_'+id+'"></td><td>密码：</td><td class="l"><input name="pwd_'+id+'" class="pwd_'+id+'"></td><td><a data-id="'+id+'" href="javascript:;" class="add_new">添加</a></td>';
      var tr = $('.add_wrap_' + id);
      tr.empty();
      tr.append(html);
    })

    $('.add_new').live('click', function(){
      var id = $(this).attr('data-id');
      var p_name = $('.p_name_'+id).val();
      var tel = $('.tel_'+id).val();
      var pwd = $('.pwd_'+id).val();
      var tr = $('.add_wrap_' + id);

      if(!p_name || !tel){
        alert('信息不完整！');
        return false;
      }
      $.post('<?php echo U("Dealer/add_team");?>', 'team_id='+id+'&p_name='+p_name+'&tel='+tel+'&pwd='+pwd, function(data){
        if(data.error){
          alert(data.msg);
        }else{
          tr.before(data.html);
          tr.empty();
          tr.append('<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>');
        }
      }, 'json');
    })

    $('.edit_new').live('click', function(){
      var t_id = $(this).attr('t-id');
      var p_id = $(this).attr('p-id');
      var p_name = $('.edit_p_name_'+t_id+'_'+p_id).val();
      var tel = $('.edit_tel_'+t_id+'_'+p_id).val();
      var pwd = $('.edit_pwd_'+t_id+'_'+p_id).val();

      window.location.href="<?php echo U('Dealer/edit_principal');?>/t_id/"+t_id+"/p_id/"+p_id+"/p_name/"+p_name+"/tel/"+tel+"/pwd/"+pwd;
    })

    $('.cancel').live('click', function(){
      var t_id = $(this).attr('t-id');
      var p_id = $(this).attr('p-id');
      var p_name_html = $(this).attr('p_name_html');
      var tel_html = $(this).attr('tel_html');
      var p_name = $('.p_name_td_'+p_id);
      var tel = $('.tel_td_'+p_id);
      var td = $('.edit_wrap_'+p_id);

      p_name.html(p_name_html);
      tel.html(tel_html);
      td.html('<a href="javascript:;" onclick="editPrincipal(\''+p_id+'\', \''+t_id+'\')">修改</a> &nbsp; | &nbsp; <a title="移除" onclick="delPrincipal(\''+p_id+'\')" href="javascript:;">删除</a>')
    })
  })
  function editPrincipal(p_id, t_id){
    var p_name = $('.p_name_td_'+p_id);
    var p_name_html = p_name.html();
    var tel = $('.tel_td_'+p_id);
    var tel_html = tel.html();
    var pwd = $('.pwd_td_'+p_id);
    var pwd_html = pwd.html();
    var td = $('.edit_wrap_'+p_id);

    p_name.html('<input name="edit_p_name_'+t_id+'_'+p_id+'" class="edit_p_name_'+t_id+'_'+p_id+'" value="'+p_name_html+'">');
    tel.html('<input name="edit_tel_'+t_id+'_'+p_id+'" class="edit_tel_'+t_id+'_'+p_id+'" value="'+tel_html+'">');
    pwd.html('<input name="edit_pwd_'+t_id+'_'+p_id+'" class="edit_pwd_'+t_id+'_'+p_id+'" value="'+pwd_html+'">');
    td.html('<a p-id="'+p_id+'" t-id="'+t_id+'" href="javascript:;" class="edit_new">修改</a> &nbsp; | &nbsp; <a p-id="'+p_id+'" t-id="'+t_id+'" p_name_html="'+p_name_html+'" tel_html="'+tel_html+'"  href="javascript:;" class="cancel">取消</a>');
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