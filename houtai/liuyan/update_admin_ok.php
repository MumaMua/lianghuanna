<?php
header("Content-Type:text/html;charset=utf-8");
session_start();
require_once("conn.php");
if($_POST['xiugai']!="确定"){
 echo "<script>
        alert('不要这样非法登录奥。');
   window.location.href='../admin_login.php';
     </script>";
    exit;
}
$pwd1=htmlspecialchars($_POST['pwd1']);
$pwd2=htmlspecialchars($_POST['pwd2']);
$pwd3=htmlspecialchars($_POST['pwd3']);
$yanzhengma=htmlspecialchars($_POST['yanzhengma']);
if(empty($pwd1)){
echo "<script>
        alert('原密码不为空奥。');
   history.go(-1);
     </script>";
    exit;
}elseif(empty($pwd2)){
echo "<script>
        alert('输入密码不为空奥。');
   history.go(-1);
     </script>";
    exit;
}elseif(empty($pwd3)){
echo "<script>
        alert('与修改密码不一样奥。');
   history.go(-1);
     </script>";
    exit;
}elseif(empty($yanzhengma)){
echo "<script>
        alert('验证码不为空奥。');
   history.go(-1);
     </script>";
    exit;
}
if($yanzhengma!=$_SESSION['code']){
echo "<script>
        alert('输入正确的验证码奥。');
   history.go(-1);
     </script>";
    exit;
}
$sql="select * from admin where password='$pwd1' limit 1";
$query=mysql_query($sql) or die(mysql_error());
$res=mysql_fetch_row($query);
if(empty($res)){
echo "<script>
        alert('原密码有错奥。');
   history.go(-1);
     </script>";
    exit;
}
if ($pwd2!=$pwd3) {
    echo "<script>
        alert('两次输入的密码不一样奥。');
   history.go(-1);
     </script>";
    exit;
}
$sql="update admin set password='$pwd2' limit 1";
$query=mysql_query($sql) or die(mysql_error());
if (mysql_affected_rows()>0) {
     echo "<script>
         alert('您的密码修改成功了奥。');
     history.go(-1);
     </script>";
    exit;
}else{
echo "<script>
        alert('您的密码修改失败了奥。');
   history.go(-1);
     </script>";
    exit;
}
/* window.location.href='../admin_index.php';*/
?>
