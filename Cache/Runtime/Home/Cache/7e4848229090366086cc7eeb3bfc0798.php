<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <link href="__PUBLIC__/Layui/css/layui.css" rel="stylesheet" />
    <script src="__PUBLIC__/Layui/layui.js"></script>
</head>
<body>
        <h1>投诉</h1>
<div>
    <form action="__ROOT__/index.php/Service/insert_complain" method="post" enctype="multipart/form-data">
        <div>
            类型：
            <input type="radio" name="type" value="1">大家居
            <input type="radio" name="type" value="2">衣柜
            <input type="radio" name="type" value="3">橱柜
            <input type="radio" name="type" value="4">门窗
            <input type="radio" name="type" value="5">沙发
        </div>
        <div>
            姓名：<input type="text" name="username">
        </div>
        <div>
            电话：<input type="text" name="phone">
        </div>
        <div>
            城市：<input type="text" name="J_Address">
        </div>
        <div>
            联系时间：<input type="text" name="contact_time">
        </div>
        <div>
            地址：<input type="text" name="addr">
        </div>
        <div>
            问题描述：<textarea name="content"></textarea>
        </div>
        <div>
            上传附件：<input type="file" name="file">
        </div>
        <div>
            <!--<button onclick="add_order()">提交</button>-->
            <!--<button onclick="add_feeback()">提交</button>-->
            <input type="submit" value="提交">
        </div>
    </form>

</div>
</body>
</html>
<script type="text/javascript">
    layui.use('layer', function() {
        var layer = layui.layer;
    });
    var is_post = 0;
    function add_order() {
        var url = "__ROOT__/index.php/Service/insert_order";
        var data = {};
        data.type = $('input:radio[name="type"]:checked').val();
        data.username = $("[name='username']").val();
        data.phone = $("[name='phone']").val();
        data.J_Address = $("[name='J_Address']").val();
        data.contact_time = $("[name='contact_time']").val();
        data.addr = $("[name='addr']").val();
        data.content = $("[name='content']").val();
        is_post++;
        layer.load(1);
        if (is_post == 1) {
            $.post(url, data, function(res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.info);
                    window.location.reload();
                } else {
                    layer.msg(res.info);
                    is_post = 0;
                }
            }, 'json');
        } else {
            layer.msg("请不要重复提交", {
                icon: 5,
                time: 1000
            });
        }
    }

    function add_feeback(){
        var url = "__ROOT__/index.php/Service/insert_feeback";
        var data = {};
        data.username = $("[name='username']").val();
        data.phone = $("[name='phone']").val();
        data.addr = $("[name='addr']").val();
        data.content = $("[name='content']").val();
        is_post++;
        layer.load(1);
        if (is_post == 1) {
            $.post(url, data, function(res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.info);
                    window.location.reload();
                } else {
                    layer.msg(res.info);
                    is_post = 0;
                }
            }, 'json');
        } else {
            layer.msg("请不要重复提交", {
                icon: 5,
                time: 1000
            });
        }
    }

    function add_complain(){
        var url = "__ROOT__/index.php/Service/insert_complain";
        var data = {};
        data.type = $('input:radio[name="type"]:checked').val();
        data.username = $("[name='username']").val();
        data.phone = $("[name='phone']").val();
        data.J_Address = $("[name='J_Address']").val();
        data.contact_time = $("[name='contact_time']").val();
        data.addr = $("[name='addr']").val();
        data.content = $("[name='content']").val();
        data.enclosure = $("[name='file']").val();
        is_post++;
        layer.load(1);
        if (is_post == 1) {
            $.post(url, data, function(res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.info);
                    window.location.reload();
                } else {
                    layer.msg(res.info);
                    is_post = 0;
                }
            }, 'json');
        } else {
            layer.msg("请不要重复提交", {
                icon: 5,
                time: 1000
            });
        }
    }
</script>