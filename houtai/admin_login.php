<?php
header("Content-Type:text/html;charset=utf-8");
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>后台登录</title>
<!--<link rel="stylesheet" href="admin.css" />-->
<link rel="stylesheet" href="liuyan\admin1.css" />
<body>
<div class="denglu">
<p>Login  Form</p>
    <form action="admin_login_ok.php" method="POST">
        <input type="text" name="name" class="name" placeholder="User Name"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='User Name';}"  ><br />
        <input type="password" name="key" class="mima" placeholder="Password"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='Password';}" ><br /> 
        <input type="code" class="yanzhengma" name="yanzhengma" placeholder="Code"
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='Code';}" />
         <img class="yz" src="liuyan\yanzhengma.php " onclick="this.src=this.src+'?'+
        Math.random()"/><br />  
    <input type="submit" name="tijiao" value="Submit" class="tijiao">
    </form>
 <a href="..\index.php"><img src="image/fh.png" class='fanhui'/></a>
</div>
<!--
<div class="denglu">
<p>管理员登录</p>
    <form action="admin_login_ok.php" method="POST">
        用户名：<input type="text" name="name" class="name"><br />
        密&nbsp;码:<input type="password" name="key" class="mima"><br /> 
        验证码：<input type="code" class="yanzhengma" name="yanzhengma" />
         <img class="yz" src="yanzhengma.php " onclick="this.src=this.src+'?'+
        Math.random()"/><br />  
    <p><input type="submit" name="tijiao" value="登录" class="tijiao"></p>
    </form>
</div>-->
</body>    
</head>
</html>

