<?php
require_once("conn.php");
require_once("liuyan\class.db.php");
session_start();
if(empty($_SESSION['pass'])){
	echo "<script>
        alert('不能非法登录奥。');
   window.location.href='admin_login.php';
     </script>";
    exit;
	}
$db=new me_db;
$page_size=2;
$sql="select count(*) from lm where lm1 !=''";
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
$sql="select * from lm where lm1!='' limit $star_value,$page_size";
$arr= $db->get_all_data($sql);

//3.计算页数
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>栏目操作</title>
<style>
body{
background:#396;
}
.main{
border:solid #000 1px;
width:900px;
background:#FFF;
}
#zeng_1,#zeng_2,#xinxi{
margin-left:100px;
margin-top:20px;
font-size:20px;
font-family:宋体;
}
p{
margin-left:100px;
font-size:20px;
font-family:宋体;
}
.submit{
width:60px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
}
.shuru{
width:160px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
}
a{
text-decoration:none;
}
.bian{
margin-left:400px;
font-size:30px;
font-weight:bold;
}
.xinxi{
margin-bottom:30px;
}
.ti{
margin-left:100px;
margin-bottom:10px;
}
</style>
   <script>
function test1(){
    if(document.biaodan1.lm1.value==''){
        alert('栏目不能为空。');
        return false;
    }
}
function test2(){
    if(document.biaodan2.lm_son.value==''){
        alert('栏目不能为空。');
        return false;
    }
}
</script> 
</head>
<body>
<div class="main">
<p class="bian">栏目编辑</p>
<form id="zeng_1" action="admin_add_lm.php" method="post" name="biaodan1" onsubmit="return test1()" accept-charset="utf-8">
   一级栏目
    <input type="text" name="lm1" value="" class="shuru">
    <input type="submit" class="submit" value="增加">
</form>
<p><?php

if (!empty($_GET['lmok'])) {
   echo $_GET['lmname'];
?></p>
<form id="zeng_2" action="admin_add_lm.php"  name="biaodan2" onsubmit="return test2()" method="post" accept-charset="utf-8">
<input type="hidden" name="lmgrade" value="<?php echo $_GET['lmok'];?>" > 
<input type="hidden" name="lmid" value="<?php echo $_GET['lmid'];?>" >  
  增加子栏目
  <input type="text" name="lm_son" value="" class="shuru">
    <input type="submit" value="增加" class="submit">
    <a href="admin_news_lm.php"  class="submit">取消</a>
</form>
<?php
}
?>
<div id="xinxi">
    <?php
/*$sql="select * from lm where lm1 !=''";*/
$query=mysql_query($sql) or die(mysql_error());
while($res=mysql_fetch_assoc($query)){
    //取出一级栏目
    echo $res['lm1']."<a href='admin_news_lm.php?lmok=lm2&lmname=$res[lm1]&lmid=$res[id]'>【增加二级】</a>"
        ."<a href='admin_edit_lm.php?lmid=$res[id]&lmname=$res[lm1]'>【修改】</a>"
        ."<a href='admin_lm_del.php?id=$res[id]'>【删除】</a>"
        ."<br />";
    //根据一级的id取出二级
    $sql2="select * from lm where lmid='$res[id]'";
    $query2=mysql_query($sql2) or die(mysql_error());
    while($res2=mysql_fetch_assoc($query2)){
        echo "------".$res2['lm2']."
            <a href='admin_news_lm.php?lmok=lm3&lmname=$res2[lm2]&lmid=$res2[id]'>【增加三级】</a>"
        ."<a href='admin_edit_lm.php?lmid=$res2[id]&lmname=$res2[lm2]&lmgrade=lm2'>【修改】</a>"
        ."<a href='admin_lm_del.php?id=$res2[id]&lmgrade=lm2'>【删除】</a>"
        ."<br />";
        //根据二级的id取出三级
        $sql3="select * from lm where lmid ='$res2[id]'";
        $query3=mysql_query($sql3) or die(mysql_error());
        while($res3=mysql_fetch_assoc($query3)){
            echo "------------------".$res3['lm3']."
          <a href='admin_edit_lm.php?lmid=$res3[id]&lmname=$res3[lm3]&lmgrade=lm3'>【修改】</a>"
        ."<a href='admin_lm_del.php?id=$res3[id]&lmgrade=lm3'>【删除】</a>"
        ."<br />";        
        }   
 }echo "<hr />";
}
?>
<div  class="ti">
<?php
if ($cur_page==1) {
?>
首页
上一页
<a href='admin_news_lm.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='admin_news_lm.php?page=<?php echo $pagecount;?>'>尾页</a>
<?php
}elseif ($cur_page==$pagecount) {
?>
<a href='admin_news_lm.php?page=1'>首页</a>
<a href='admin_news_lm.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
下一页
尾页
<?php
}else {
?>  <a href='admin_news_lm.php?page=1'>首页</a>
<a href='admin_news_lm.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
<a href='admin_news_lm.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
<a  href='admin_news_lm.php?page=<?php echo $pagecount?>'>尾页</a>
<?php
}
?>
<form action="admin_news_lm.php" method="get" accept-charset="utf-8" 
style="display:inline;">
    
<input type="text" name="page" value="" style='width:30px;color:green;border:solid 2px green;'>

<input type="submit" value="go">
</form>
</div>
</div>
</div>
</body>
</html>
