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
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>Admin_index</title>
    <frameset rows="10%,*" cols="*" frameborder="0">
    <frame src="admin_top.php" noresize scrolling="no" />
    <frameset cols="17%,70%" border="10">
        <frame src="admin_left.php" noresize scrolling="no"/>
        <frame src="admin_right.php" name="right"/>
    </frameset>
    <!--<frame src="admin_bottom.php" noresize scrolling="no" />-->
    <frame src="UntitledFrame-4"></frameset><noframes></noframes>
</head>
<body>
    
</body>
</html>

