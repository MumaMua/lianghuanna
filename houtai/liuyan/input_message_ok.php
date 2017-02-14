<?php
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Etc/GMT-8');     //这里设置了时区
require_once("upload.php");
require_once("conn.php");
require_once("class.db.php");
session_start();
$user=$_POST['user'];
$content=$_POST['content'];
$sm=$_POST['sm'];
$yanzhengma=$_POST['yanzhengma'];
$photo=$_POST['photo'];
$up=$_POST['up'];
$riqi=date("Y-m-d H:i:s");

//进行入户前的验证工作

if(empty($_FILES['up']['tmp_name'])){
$dizhi=$photo;
}else{
$dizhi=$url;
}

if (empty($user)){
   echo "<script> 
        alert('要输入名字奥。');
        history.go(-1);
        </script>";
     exit;
}else if(empty($content)){
       echo "<script> 
        alert('要输入想给我说的话奥。');
        history.go(-1);
        </script>";
     exit;
}else if(empty($yanzhengma)){
echo "<script> 
        alert('要输入验证码奥。');
        history.go(-1);
        </script>";
     exit;
}else if($yanzhengma !=$_SESSION['code']) {
    echo "<script> 
        alert('要输入正确的验证码奥。');
        history.go(-1);
        </script>";
     exit;
}
/*if (empty($dizhi)) {
$dizhi='up/'.'2015'.'1.jpg';    
}*/
    $sql="insert into user_message(name,time,content,photo,secret) 
        values('$user','$riqi','$content','$dizhi','$sm')";

$query=mysql_query($sql) or die(mysql_error("00000"));

if(mysql_insert_id()>0) {
    echo "<script> 
        alert('谢谢你的留言奥。');
        window.location.href='guestbookdemo.php';
        </script>";
}
?>
