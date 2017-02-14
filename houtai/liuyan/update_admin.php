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
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>修改密码</title>
<link rel="stylesheet" href="update.css" />
<body>
<form action="update_admin_ok.php" method="post" accept-charset="utf-8">
<p>Code</p>
    <input type="password" name="pwd1" value="" class="pwd1"
         placeholder="请输入原密码"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='请输入原密码';}"  /><br />
    <input type="password" name="pwd2" value="" class="pwd2"
placeholder="请输入新密码"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='请输入新密码';}"  /><br />
<input type="password" name="pwd3" value="" class="pwd3"
placeholder="请再次输入新密码"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='请再次输入新密码';}"  /><br />
     <input type="code" class="yanzhengma" name="yanzhengma"
placeholder="验证码"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='验证码';}"  />
   <img class="yz" src="yanzhengma.php " onclick="this.src=this.src+'?'+
        Math.random()"/><br />
<input type="submit" value="确定" name="xiugai" class="xiugai">
</form>

</body>

</head>
</html>
