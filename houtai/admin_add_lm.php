<?php
header("Content-Type:text/html;charset=utf-8");
require_once("conn.php");
session_start();
if(empty($_SESSION['pass'])){
	echo "<script>
        alert('不能非法登录奥。');
   window.location.href='admin_login.php';
     </script>";
    exit;
	}
/*if (empty($_POST[lm1_son])) {
   echo "<script> 
        alert('要输入增加栏目信息奥。');
        history.go(-1);
        </script>";
     exit;
}*/

/*if (empty($_POST[lm1])) {
   echo "<script> 
        alert('要输入增加栏目信息奥。');
        history.go(-1);
        </script>";
     exit;
}*/
 
if(!empty($_POST[lm1])){
   
$sql1="insert into lm(lm1) values('$_POST[lm1]')";
$query=mysql_query($sql1) or die(mysql_error());
header("location:admin_news_lm.php");
}
//判断传递的值级别
if ($_POST['lmgrade']=='lm2') {
    $sql2="insert into lm(lm2,lmid) values('$_POST[lm_son]','$_POST[lmid]')";
    $query2=mysql_query($sql2) or die(mysql_error());
    header("location:admin_news_lm.php");
}elseif ($_POST['lmgrade']=='lm3') {
     $sql3="insert into lm(lm3,lmid) values('$_POST[lm_son]','$_POST[lmid]')";
    $query3=mysql_query($sql3) or die(mysql_error());
    header("location:admin_news_lm.php");
}


/*if(!empty($_POST[lm2])){
$sql1="insert into lm(lm2) values('$_POST[lm2]' where )";
$query=mysql_query($sql1) or die(mysql_error());
header("location:admin_news_lm.php");
}
 */
?>
