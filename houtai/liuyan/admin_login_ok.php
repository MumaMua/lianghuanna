<?php
header("Content-Type:text/html;charset=utf-8");
session_start();//开启session
require_once("upload.php");
require_once("class.db.php");
if($_POST['tijiao']!="Submit"){
 echo "<script>
        alert('不要这样非法登录奥。');
   window.location.href='guestbook.php';
     </script>";
    exit;
}
$db=new me_db;
$user= $_POST['name'];
$pwd= $_POST['key'];
$yanzhengma=$_POST['yanzhengma'];
if(!get_magic_quotes_gpc())
{
    $user=addslashes($user);
    $pwd=addslashes($pwd);
    $yanzhengma=addslashes($yanzhengma);
}

   if(empty($user)){
    echo"<script> 
               alert('要输入用户名奥。');
           history.go(-1);
            </script>";
            exit;
   }else if(empty($pwd)){
    echo"<script> 
               alert('要输入密码奥。');
           history.go(-1);
            </script>";
            exit;
   
   }else if(empty($yanzhengma)){
   echo"<script> 
               alert('要输入验证码码奥。');
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
   $sql="select * from admin where admin='$user' and password='$pwd' limit 1";
   $res=$db->get_all_data($sql,MYSQL_NUM);
if(empty($res)){
echo"<script> 
               alert('用户名或密码有误');
           history.go(-1);
            </script>";
            exit;
}else{
    $_SESSION['admin']="ok";
header('location:guestbook.php');
}

     
?>

