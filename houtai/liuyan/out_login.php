<?php
header("Content-Type:text/html;charset=utf-8");
session_start();//开启session
unset($_SESSION);//清空全局数组的值$_SESSION
session_destroy();//删除整个session环境
echo "<script>
 alert('您安全退出了奥。');  
window.parent.location.href='guestbookdemo.php';
</script>";
?>

