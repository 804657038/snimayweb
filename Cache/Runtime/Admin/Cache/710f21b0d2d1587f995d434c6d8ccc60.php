<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>橱柜专题-内容添加</title>
    <script src="__PUBLIC__/Admin/Js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/Cg/layui/css/layui.css">
    <script type="text/javascript" src="__PUBLIC__/Cg/layui/layui.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Cg/layui/common.js"></script>
    <link href="__PUBLIC__/Admin/Css/Style.css" rel="stylesheet" />
    <script type="text/javascript" src="__PUBLIC__/Admin/kindeditor/kindeditor.js"></script>
    <script type="text/javascript">
        KindEditor.ready(function(K) {
            K.create('#content', {
                allowFileManager: false,
                pasteType: 2,
                newlineTag: 'p',
                urlType: 'absolute',
                afterBlur: function () {
                    this.sync();
                }
            });
        });
//        KindEditor.sync();
    </script>
</head>
<body>
<div class="column_Box mainAutoHeight">
    <div class="tab">
        <ul>
            <li class="current"><a href="javascript:">文章属性</a></li>
        </ul>
    </div>
    <div class="column_Box mainAutoHeight wrapBox">
        <div style="height: 10px"></div>
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input layui-width40">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">副标题</label>
                <div class="layui-input-block">

                    <input type="text" name="en_title" value=""   class="layui-input layui-width40">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">文章分类</label>
                <div class="layui-input-block layui-width30">
                    <select name="cat_id" lay-verify="required">
                        <?php echo ($cat_select); ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">拓展属性</label>
                <div class="layui-input-block">
                    <div class="add_attr" style="clear: both">

                    </div>
                    <a class="layui-btn layui-btn-primary" onclick="add_attr('add_attr')"><i class="layui-icon">&#xe61f;</i> 添加</a>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">排序</label>
                <div class="layui-input-block">
                    <input type="text" name="sort_order" value="50" lay-verify="number" class="layui-input layui-width10">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否置顶</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_top" value="1" title="是">
                    <input type="radio" name="is_top" value="0" title="否" checked>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">首页推荐</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_recommend" value="1" title="是">
                    <input type="radio" name="is_recommend" value="0" title="否" checked>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">定时发布时间</label>
                <div class="layui-input-block">
                    <input type="text" name="f_time" placeholder="留空为当前时间" class="layui-input layui-width30" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">添加时间</label>
                <div class="layui-input-block">
                    <input type="text" name="add_time" placeholder="留空为当前时间" class="layui-input layui-width30" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD hh:mm:ss'})">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="link" class="layui-form-label">
                    <span class="x-red"></span>文章封面
                </label>
                <div class="layui-input-inline">
                    <div class="file_box" style="width:111px;position: relative">
                        <div class="lay-close" title="删除图片" onclick="rmimg()"></div>
                        <img id="img" src="__PUBLIC__/upload.jpeg" width="111"  alt=""/>
                        <input type="hidden" name="original_img" value="" id="article_img" autocomplete="off" class="layui-input" />
                    </div>
                    <div class="site-demo-upbar">
                        <input type="file" name="file" class="layui-upload-file" id="file">
                    </div>
                    <div>
                        <span class="x-gray"></span>
                    </div>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">文章简介</label>
                <div class="layui-input-block">
                    <textarea name="short" placeholder="请输入内容" class="layui-textarea"></textarea>
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">文章内容</label>
                <div class="layui-input-block">
                    <textarea style="width: 880px;height: 400px" name="content" id="content" placeholder="请输入内容" ></textarea>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    //Demo
    layui.use(['form','layer','laydate','upload'], function(){
        var form = layui.form();
        var laydate = layui.laydate;

        //图片上传接口
        layui.upload({
            elem:"#file",
            url: "<?php echo U('Upload/index');?>" //上传接口
            ,success: function(res){ //上传成功后的回调
                if(res.status==0){
                    layer.msg(res.msg, {icon: 5,time:1000});

                }else{

                    $('#img').attr('src',res.img);
                    $('#article_img').val(res.url);
                }
            }
        });



        //监听提交
        form.on('submit(formDemo)', function(data){
            var url="<?php echo U('Article/insert');?>";
            var attr=[];
            $('[name="attr_key[]"]').each(function(){
                attr.push($(this).val());
            });

            data.field.content=$('#content').val();
            data.field.attr=attr;

            $.post(url,data.field,function(res){
                if(res.status==1){
                    layer.msg(res.info, {icon: 6,time:2000});
                    setTimeout(function(){
                        window.location.href=res.url
                    },2000);
                }else{
                    layer.msg(res.info, {icon: 5,time:1000});
                }
            },"JSON");
            return false;

        });
    });
    rmimg=function(){
        var url="<?php echo U('Upload/rmimg');?>";
        var img_url=$('#article_img').val();
        if(img_url){
            $.post(url,{img_url:img_url},function(res){
                if(res.status==1){
                    $('#img').attr("src","__PUBLIC__/upload.jpeg");
                    $('[name="original_img"]').attr("value"," ");
                }else{
                    layer.msg(res.msg, {icon: 5,time:1000});
                }
            },"JSON")
        }
    };
    $(function(){
        $(".file_box,.imgs_box").hover(function(){
                $(this).children(".lay-close").show();
            },
            function(){
                $(".lay-close").hide();
            })
    })
</script>

</body>
</html>