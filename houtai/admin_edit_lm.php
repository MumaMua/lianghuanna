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
$id=$_GET['lmid'];
$name=$_GET['lmname'];
$grade=$_GET['lmgrade'];
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>Admin_edit_lm</title>
    <style>
body{
background:#396;
}
.main{
border:solid #000 1px;
width:900px;
background:#FFF;
}
form{
margin-left:100px;
margin-top:30px;
font-size:20px;
font-family:宋体;
color:#000;
}
.bian{
margin-left:400px;
font-family:宋体;
font-size:30px;
font-weight:bold;

}
.submit1{
width:100px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
}
.submit{
width:60px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
margin-bottom:30px;
}
</style>
</head>
<body>
<div class="main">
<p class="bian">栏目修改</p>
    <form action="admin_edit_lm_ok.php" method="post" accept-charset="utf-8">
    <input type="hidden" name="lmid" value="<?php echo $id?>">
<input type="hidden" name="grade" value="<?php echo $grade?>">
    <input type="text" name="name" value="<?php echo $name?>" class="submit1">    
    
    <p><input type="submit" value="修改" class="submit"></p>
    </form>
</div>
</body>
</html>
