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
require_once("conn.php");
require_once("liuyan\class.db.php");
$db=new me_db;
$page_size=4;
$sql="select count(*) from news";
$arr= $db->get_all_data($sql,MYSQL_NUM);
$pagecount=ceil($arr[0][0]/$page_size);
if (empty($_GET['page'])) {
   $cur_page=1;
}else {if ($_GET['page']>=$pagecount) {
     $cur_page=$pagecount;
}elseif ($_GET['page']<=1) {
    $cur_page=1;
}else {
     $cur_page=$_GET['page'];
}
   
}
$star_value=($cur_page-1)*$page_size;
//6.构建sql语句
$sql="select * from news limit $star_value,$page_size";
$arr= $db->get_all_data($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>新闻列表的修改</title>
 <style>
body{
background:#396;
}
.main{
border:solid #000 1px;
width:900px;
background:#FFF;
}
body{
font-size:20px;
font-family:宋体;
}
h2{
font-size:30px;
font-family:宋体;
}
table{
margin-bottom:30px;
}
.ti{
margin-left:180px;
margin-bottom:10px;
}
</style>
</head>
<body>
<div class="main">
<h2 style="text-align:center;">新闻编辑</h2>
    <table border="1" cellpadding="0" width="600" align="center">
        <tr><th>标题</th><th>栏目</th><th>操作1</th><th>操作2</th></tr>
        <?php
/*$sql="select * from news";*/
$query=mysql_query($sql) or die(mysql_error());
while($res=mysql_fetch_assoc($query)){
    if (!empty($res['lm3'])) {
        $grade='lm3';
        $lmid=$res['lm3'];
    }elseif (!empty($res['lm2'])) {
        $grade='lm2';
        $lmid=$res['lm2'];
    }else {
        $grade='lm1';
        $lmid=$res['lm1'];
    }
  $sql1="select $grade from lm where id=$lmid ";
   $query1=mysql_query($sql1) or die(mysql_error());
   $res1=mysql_fetch_assoc($query1);
        ?>

            <tr>
            <td><?php echo $res['title'];?></td>
            <td><?php echo $res1[$grade];?></td>
            <td><a href="admin_news_del.php?id=<?php echo $res[id];?>"
    onclick="if(confirm('您确定删除吗?')){return true;}else{return false;}">删除</a></td>
    <td><a href="admin_news_update.php?id=<?php echo $res[id];
    ?>&lmname=<?php echo $res1[$grade];?>">修改</a></td>
            </tr>
<?php
}
?>
    </table>

 <div class="ti">
<?php
if ($cur_page==1) {
?>
首页
上一页
<a href='admin_news_list.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='admin_news_list.php?page=<?php echo $pagecount;?>'>尾页</a>
<?php
}elseif ($cur_page==$pagecount) {
?>
<a href='admin_news_list.php?page=1'>首页</a>
<a href='admin_news_list.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
下一页
尾页
<?php
}else {
?>  <a href='admin_news_list.php?page=1'>首页</a>
<a href='admin_news_list.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
<a href='admin_news_list.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='admin_news_list.php?page=<?php echo $pagecount?>'>尾页</a>
<?php
}
?>
<form action="admin_news_list.php" method="get" accept-charset="utf-8" 
style="display:inline;">
    
<input type="text" name="page" value="" style='width:30px;color:green;border:solid 2px green;'>

<input type="submit" value="go">
</form>
</div>

</div>
</body>
</html>
