<?php
header("Content-Type:text/html;charset=utf-8");
session_start();//开启session
date_default_timezone_set('Etc/GMT-8');  
$coon=mysql_connect('localhost','root','123456') or die('数据库链接失败');
$query=mysql_select_db("webhuan") or die (mysql_error());
 mysql_query('set names utf8');
$id=htmlspecialchars($_POST['id']);
$content=htmlspecialchars($_POST['content']);
$time=date("Y-m-d H:i:s");
if (empty($content)) {
     echo "<script>
        alert('要输入回复内容奥。');
   history.go(-1);
     </script>";
    exit;
}
$sql="insert into admin_replay(replay_time,replay_content,user_message_id ) values('$time','$content','$id')";
$query=mysql_query($sql) or die(mysql_error());
if(mysql_insert_id()>0){
echo "<script>
        alert('回复成功了奥。');
   window.location.href='replay.php';
     </script>";
}
?>
