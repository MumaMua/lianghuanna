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
if ($_GET['lmgrade']=='lm3') {
    $sql3="delete from lm where id=$_GET[id]";
    $query3=mysql_query($sql3) or die(mysql_error());
    header("location:admin_news_lm.php");

}elseif ($_GET['lmgrade']=='lm2') {
    $sql2="delete from lm where id=$_GET[id] ";
    mysql_query($sql2) or die(mysql_error());
    //如果有三级，则删除。
    $sql3="delete from lm where lmid=$_GET[id] ";
    mysql_query($sql3);
    header("location:admin_news_lm.php");
}else{
$sql2="select * from lm where lmid=$_GET[id] ";
$query2=mysql_query($sql2);
//根据二级admin_lm_del.phpid删除一级
 $sql1="delete from lm where id=$_GET[id]";
$query1=mysql_query($sql1) or die(mysql_error());
//删除二级
 $sql2="delete from lm where lmid=$_GET[id]";
mysql_query($sql2);
while($res2=mysql_fetch_assoc($query2)){
//删除三级
 $sql3="delete from lm where lmid=$res2[id] ";
    mysql_query($sql3);
}
header("location:admin_news_lm.php");
}

?>
