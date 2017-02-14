<?php
header("Content-Type:text/html;charset=utf-8");
require_once("houtai/conn.php");
$id=intval($_GET['id']);
$sql="select * from news where id=$id limit 1";
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_assoc($query);
/*function call_class($lm,$num)
{
    $n=0; 
    if ($lm=='lm1') {
        $sql="select * from news where $lm='".$num."' and lm2='0' and lm3='0'"; 
    }elseif ($lm=='lm2') {
         $sql="select * from news where $lm='".$num."' and lm3='0'"; 
    }elseif ($lm=='lm3') {
      //  $sql="select * from news where $lm='".$num"'";
        $sql="select * from news where $lm='".$num."' ";  
    }
    $query=mysql_query($sql);
    echo "<div>";
    while($res=mysql_fetch_array($query))
    {
        $n++;
		echo"<h2 style='text-align:center;'>$res[title]</h2>";
        echo"<div>$res[content]</div>";
    }
    echo "</div>";
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="shortcut icon" href="image/logo.png">
<link rel="stylesheet" href="css/news.css" />
<title>最新新闻</title>
<script src="js/jquery.min.js"/></script>
<script src="js/change.js"></script>
<script src="js/fabhui.js"></script>
</head>
    
<body>
<div>
<div class="header">
    <div class="my">
        <div><img src="image/logo.png" class="logo" /></div>
        <div class="biaoti"><img src="image/my_01_02.gif" class="biaoti_img" /></div>
    </div>
    <div class="top">
         <div class="daohang">
           <ul>
              <li id="txt1"><a href="index.php" target="_self">首页</a></li>
              <li id="txt2"><a href="about me.html" target="_self">学无止境</a></li>
              <li id="txt3"><a href="happy.html" target="_self">小确幸</a></li>
              <li id="txt4"><a href="doing.html" target="_self">文字心声</a></li>
              <li id="txt5"><a href="resume.html" target="_self">求职简历</a></li>
              <li id="txt6"><a href="calling.html" target="_self">联系我</a></li>
              <li id="txt7"><a href="houtai/liuyan/guestbookdemo.php" target="_self">留言板</a></li>    
           </ul>
         </div> 
    </div>
</div>
</div>
<div class="news">
<?php
echo"<h2 style='text-align:center;'>$res[title]</h2>";
        echo"<div class='content'>$res[content]</div>";
    ?>
    
</div>
<div class="banquan">
<div id="music_bg">
  	<audio src="music/tr.mp3" style="width:325px; height:42px;"  controls="true" autoplay="true"/> 
	</div><!--添加音乐-->
    <a>版权所有||梁欢娜个人网页||1643148250@qq.com</a></div>
<div class="tbox" style="display: block;">
<a href="javascript:void(0)" id="gotop"><img src="image/top.jpg"</a>
</div>
</body>
</html>