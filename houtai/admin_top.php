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

    <title>Admin_top</title>
    <head>
    <style>
	*{
border:0;
margin:0;
}
    .top{font-family:宋体;
	color:#396;
	text-align:center;
	font-size:30px;
	margin:0;
	margin-bottom:16px;
	text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
		}
    </style>
</head>
<body style="background:#FFF;border-bottom:#000 solid 3px;">
    <p class="top">绿子小姐的简微留言系统</p>
</body>
</html>