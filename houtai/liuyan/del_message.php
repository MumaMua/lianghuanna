<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
if(empty($_SESSION['pass'])){
	echo "<script>
        alert('不能非法登录奥。');
   window.location.href='../admin_login.php';
     </script>";
    exit;
	}
//接到传递过来的值进行删除,使用interval包装传递过来的值
$id=intval($_GET['id']);
//2.连接数据库 
$coon=mysql_connect('localhost','root','123456') or die('数据库链接失败');
$query=mysql_select_db("webhuan") or die (mysql_error());
//3.构建sql语句
$sql="delete from user_message where id='$id' limit 1";
$query=mysql_query($sql) or die (mysql_error());
if($query){
if (mysql_affected_rows()>0) {
    echo "<script>
        alert('数据删除成功。');
        window.location.href='replay.php';    
        </script>";
}else {
    echo "<script>
        alert('数据删除失败。');
        window.location.href='replay.php';    
        </script>";
}
}
//header("Location:getdata.php");//使用header前不能有任何输出
?>

