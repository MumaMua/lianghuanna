<?php
header("Content-Type:text/html;charset=utf-8");
require_once("houtai/conn.php");

   
$page_size=6;
$sql="select count(*) from news order by id desc";
$query=mysql_query($sql);
$res=mysql_fetch_row($query);
$recordcount=$res[0];
$pagecount=ceil($recordcount/$page_size);
if (empty($_GET['page'])) {
    $cur_page=1;
}else {if ($_GET['page']>=$pagecount) {
    $cur_page=$pagecount;
}else if ($_GET['page']<=1) {
    $cur_page=1;
}else{
$cur_page=$_GET['page'];
}

}
$star_value=($cur_page-1)*$page_size;
//6.构建sql语句
$sql="select * from news limit $star_value,$page_size ";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="shortcut icon" href="image/logo.png">
<link rel="stylesheet" href="css/more.css" />
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
<div class="news">
<div class="table">
 <a class="left">标题</a><a class="right">时间</a>
        <?php
/*$sql="select * from news";*/
$query=mysql_query($sql) or die(mysql_error());
while($res=mysql_fetch_assoc($query)){
    if (!empty($res['lm3'])) {
        $grade='lm3';
        $lmid=$res['lm3'];
    }elseif (!empty($res['lm2'])) {
        $grade='lm2';
        $lmid=$res['lm2'];
    }else {
        $grade='lm1';
        $lmid=$res['lm1'];
    }
  $sql1="select $grade from lm where id=$lmid ";
   $query1=mysql_query($sql1) or die(mysql_error());
   $res1=mysql_fetch_assoc($query1);
        ?>
        <ul>
		<a href='news_content.php?id=<?php echo $res[id]?>' target='_blank'>
			<li><?php echo $res[title];?>
			<span><?php echo $res[time];?></span>
            </li></a>
        </ul>
            <?php
}
?>
    

 <div class="ti">
<?php
if ($cur_page==1) {
?>
首页
上一页
<a href='more.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='more.php?page=<?php echo $pagecount;?>'>尾页</a>
<?php
}elseif ($cur_page==$pagecount) {
?>
<a href='more.php?page=1'>首页</a>
<a href='more.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
下一页
尾页
<?php
}else {
?>  <a href='more.php?page=1'>首页</a>
<a href='more.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
<a href='more.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='more.php?page=<?php echo $pagecount?>'>尾页</a>
<?php
}
?>
</div>
</div>
</div>
<div class="banquan">
<div id="music_bg">
  	<audio src="music/tr.mp3" style="width:325px; height:42px;"  controls autoplay="true"/> 
	</div><!--添加音乐-->
<a>版权所有||梁欢娜个人网页||1643148250@qq.com</a></div>
</div>
</body>
</html>
