<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>跳转提示</title>
        <style type="text/css">
            * {
                padding: 0;
                margin: 0;
            }
            body {
                background: #f9f9f9;
                font-family: '微软雅黑';
                color: #333;
                font-size: 16px;
            }
            .box {
                margin: 100px auto;
                width: 600px;
                background: #fff;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding: 10px;
                box-shadow: inset 0 0 3px #eee;
                min-height:150px;
            }
            .system-message { padding: 12px 24px; min-height:200px; }
            .system-message h1 {
                font-size: 36px;
                line-height: 40px;
                margin-bottom: 12px;
                text-shadow: 0 0 5px #9FB1BF;
                border-bottom:1px solid #ddd;
                padding-bottom:10px;
            }
            .jump { padding: 12px 24px; font-size:12px; }
            .jump a { color: #333; font-size:12px; }
            .system-message .success, .system-message .error {
                line-height: 1.8em;
                font-size: 16px
            }
            .system-message .detail {
                font-size: 12px;
                line-height: 20px;
                margin-top: 12px;
                display: none;
            }
            footer{ text-align:center; padding:5px 12px; color:#333; font-size:12px;border-top:1px solid #ddd;}
        </style>
    </head>
    <body>
        <div class="box">
            <div class="system-message">
                <?php if(isset($message)): ?><h1>操作成功！</h1>
                    <p class="success"><?php echo($message); ?></p>
                    <?php else: ?>
                    <h1>操作失败！</h1>
                    <p class="error"><?php echo($error); ?></p><?php endif; ?>
                <p class="detail"></p>                
            </div>
            <p class="jump">等待 <b id="wait" style="color:#f00;"><?php echo($waitSecond); ?></b> 秒后页面将自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> </p>
            <footer>Powered by <a href="http://www.hunuo.com/" target="_blank">www.hunuo.com</a></footer>
        </div>
        <script type="text/javascript">
            (function(){
                var wait = document.getElementById('wait'),href = document.getElementById('href').href;
                var interval = setInterval(function(){
                    var time = --wait.innerHTML;
                    if(time <= 0) {
                        location.href = href;
                        clearInterval(interval);
                    };
                }, 1000);
            })();
        </script>
    </body>
</html>