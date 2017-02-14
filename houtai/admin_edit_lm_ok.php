<?php
header("Content-Type:text/html;charset=utf-8");
require_once("conn.php");

if (empty($_POST[name])) {
    echo "<script> 
        alert('要输入修改信息奥。');
        history.go(-1);
        </script>";
     exit;
}
if ($_POST['grade']=='lm2') {
   $sql="update lm set lm2='$_POST[name]' where id=$_POST[lmid]";

}elseif ($_POST['grade']=='lm3') {
     $sql="update lm set lm3='$_POST[name]' where id=$_POST[lmid]";

}else{
$sql="update lm set lm1='$_POST[name]' where id=$_POST[lmid]";
}
$query=mysql_query($sql) or die(mysql_error());
header("Location:admin_news_lm.php");
?>
