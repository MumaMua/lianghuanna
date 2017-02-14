<?php 
header("Content-Type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION['pass'])){
	echo "<script>
        alert('不能非法登录奥。');
   window.location.href='admin_login.php';
     </script>";
    exit;
	}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>Admin_top</title>
    <head>
<style>
*{
border:0;
margin:0;
}
body{

color:#000;
}
#news,#guestbook,#code,#outlogin,#message{
border:solid 3px #396;
border-radius:8px;
/*background:#396;*/
width:200px;
height:50px;
line-height:50px;
}
#news,#guestbook{
font-size:30px;
font-family:宋体;
margin-left:20px;
margin-bottom:10px;
}
#news{
margin-top:30px;
}
#news:hover{
cursor:pointer;}
#guestbook:hover{
cursor:pointer;}
ul li{
list-style:none;
}
ul li a{
font-size:20px;
font-family:宋体;
}
a{
text-decoration:none;
color:#000;
}
#code,#outlogin,#message{
font-size:30px;
font-family:宋体;
margin-bottom:10px;
margin-left:20px;
}
</style>
</head>
<body>
<div id="news" onclick="document.all.news_son.style.display=(document.all.news_son.style.
display=='none')?'':'none'">新闻管理系统</div>
<div id="news_son" style="display:none;">
<ul>
<li><a href="admin_news_lm.php" target="right">栏目编辑</a></li>
<li><a href="admin_news_add.php" target="right">添加新闻</a></li>
<li><a href="admin_news_list.php" target="right">新闻编辑</a></li>
</ul>
</div>
<div id="guestbook" onclick="document.all.replay_del.style.display=(document.all.replay_del.style.
display=='none')?'':'none'">

<a href="liuyan/replay.php" target="right">留言管理</a>

</div>
<div id="code">
<a href="liuyan/update_admin.php" target="right">修改密码</a>
</div>
<div id="message">
<a href="backup.php" target="right">备份信息</a>
</div>
<div id="outlogin"><a href="liuyan/out_login.php" onclick="if(confirm('您确定要退出吗？'))
    {return true;}else{return false;}" >退出登录</a></div>
    <div style="background:url(liuyan/image/r.png) 0 0 no-repeat;width:200px;height:300px;"></div>
</body>
</html>
