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
require_once("conn.php");
if(empty($_GET['id'])) {
    exit;
}
$sql="delete from news where id=$_GET[id] ";
$query=mysql_query($sql) or die(mysql_error());
header("Location:admin_news_list.php");
?>
