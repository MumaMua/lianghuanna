<?php
header("Content-Type:text/html;charset=utf-8");
require_once("conn.php");
session_start();
if(empty($_SESSION['pass'])){
	echo "<script>
        alert('不能非法登录奥。');
   window.location.href='admin_login.php';
     </script>";
    exit;
	}
function call_class($lm,$num)
{
    $n=0; 
    if ($lm=='lm1') {
        $sql="select * from news where $lm='".$num."' and lm2='0' and lm3='0'"; 
    }elseif ($lm=='lm2') {
         $sql="select * from news where $lm='".$num."' and lm3='0'"; 
    }elseif ($lm=='lm3') {
      //  $sql="select * from news where $lm='".$num"'";
        $sql="select * from news where $lm='".$num."' ";  
    }
    $query=mysql_query($sql);
    echo "<ul>";
    while($res=mysql_fetch_array($query))
    {
        $n++;
        echo "<br />";
        echo"<li>
            $n.<a href='new_content.php?id=$res[id]' target='_blank'>$res[title]</a>
            </li>";
    }
    echo "</ul>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="demo.css" />
    <title>Demo</title>
    
</head>
<body>
<div class="new">
    <div class="new1">
    <h2>西安新闻</h2>
    <?php
    call_class("lm2","4");
    ?>
    </div>
    <div class="new1">
     <h2>灞桥区新闻</h2>
    <?php
    call_class("lm3","9");
    ?>
    </div>
</div>
</body>
</html>
