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
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="image/logo.png">
    <title>Admin_right</title>
    <style>
*{
border:0;
margin:0;
}
body{
	width:98%;
background:#396;
}
#main{
width:98%;
background:#396;
margin:0;
margin-left:16px;
}
p{
font-size:30px;
padding-top:200px;
position:absolute;
padding-left:200px;
text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}
</style>
</head>
<body>
<div id="main">
    <p style="font-family:宋体;margin:0 auto;">这是绿子小姐的简微留言系统，
<br />欢迎你们的到来。</p>
<!--<marquee  class="gundong2" align="center" behavior="scroll" direction="up"
                  hspace="4" vspace="1" loop="-1" scrollamount="2" 
                 scrolldelay="-1" onMouseOut="this.start()" onMouseOver="this.stop()">　
                
  <a>这是绿子小姐的简微留言系统，欢迎你们的到来。
        </a>
				</marquee> -->
</div>
</body>
</html>
