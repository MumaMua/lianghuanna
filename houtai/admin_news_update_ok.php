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
date_default_timezone_set('Etc/GMT-8'); 
require_once("conn.php");
if($_POST['button']!="发布新闻"){
 echo "<script>
        alert('不要这样非法登录奥。');
   window.location.href='admin_news_update.php';
     </script>";
    exit;
}
$id=$_POST[id];
$name=$_POST[name];
$lm=explode("|",$_POST[lm]);
$lm1=$lm[0];
$lm2=$lm[1];
$lm3=$lm[2];
$user=$_POST[user];
$content=$_POST[content1];
$riqi=date("Y-m-d H:i:s");
if(empty($name)){
echo "<script>
        alert('标题不为空奥。');
   history.go(-1);
     </script>";
    exit;
}
if(empty($user)){
echo "<script>
        alert('作者不为空奥。');
   history.go(-1);
     </script>";
    exit;
}
if(empty($content)){
echo "<script>
        alert('新闻内容不为空奥。');
   history.go(-1);
     </script>";
    exit;
}
$sql="update news set lm1='$lm1',lm2='$lm2',lm3='$lm3',title='$name',content='$content',time='$riqi',
    adduser='$user' where id=$id"; 

$query=mysql_query($sql) or die(mysql_error());
if ($query) {
if (mysql_affected_rows()>0) {
      echo "<script> 
        alert('新闻修改成功了奥。');
        window.location.href='admin_news_list.php';
        </script>";
}
}
?>

