<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="__CSS__/css_reset.css" type="text/css" rel="stylesheet" />
<link href="__CSS__/style.css" type="text/css" rel="stylesheet" />
<title>404错误</title>
<link rel="stylesheet" type="text/css" />

<style>
*{margin:0;padding:0}
body{font-family:"微软雅黑";background:#fff}
img{border:none}
a *{cursor:pointer}
ul,li{list-style:none}
table{table-layout:fixed;}
table tr td{word-break:break-all; word-wrap:break-word;}

a{text-decoration:none;outline:none}
a:hover{text-decoration:underline}

</style>
<script language="javascript">
var secs = 5; //倒计时的秒数
var URL ;
function Load(url){
URL = url;
for(var i=secs;i>=0;i--)
{
   window.setTimeout('doUpdate(' + i + ')', (secs-i) * 1000);
}
}
function doUpdate(num)
{
document.getElementById('ShowDiv').innerHTML = '将在 <span style="color:#000">'+num+'</span> 秒后自动跳转到诗尼曼官网' ;
if(num == 0) { window.location = URL; }
}
Load('http://www.snimay.com/');
</script>
</head>
<body>
<div class="error">
	<div class="cont">
		<div class="c1"><img src="__IMG__/01.png" class="img1" /></div>
		<h2>你访问的页面不存在</h2>
		<div class="c2"><a href="http://www.snimay.com/" class="home">返回首页</a></div>
		<div class="c3" id="ShowDiv"></div>
	</div>
	
</div>
</body>
</html>