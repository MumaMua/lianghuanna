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
/*
 *
 *获取分页
 */
session_start();
require_once("class.db.php");
$db=new me_db;
/*********************正常回复分页****************************/
if(empty($_GET['sou'])){
$page_size=4;
$sql='select count(*) from user_message';
}
/**********************搜索分页**************************************/
else{
$page_size=2;
$sql="select count(*) from user_message where content like '%$_GET[sou]%'";
}
$arr=$db->get_all_data($sql,MYSQL_NUM);
$recordcount=$arr[0][0];
$pagecount=ceil($recordcount/$page_size);
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

if (!empty($_GET['sou'])) {
    $sql="select * from user_message where secret!=1 and content like '%$_GET[sou]%' order by id desc limit $star_value,$page_size";
    $res1=mysql_query($sql) or die(mysql_error());
    $num_rows1=mysql_num_rows($res1);
    if (empty($num_rows1)) {
        echo "<script>
            window.alert('您搜索的内容为空奥。');
            history.go(-1);
            </script>";
    }
}else{
    $sql="select * from user_message order by id desc limit $star_value,$page_size";
}
$query=mysql_query($sql) or die(mysql_error());
/*************************分页完毕*******************************/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="admin_replay.css" />
<link rel="shortcut icon" href="image/logo.png">
<title>Liang Huanna's Personal Website</title>
<script src="../js/jquery.min.js"/></script>
<!-------------------------------------------->


</head>
    
<body>
<div>
    
    <div class="gb_z">
    	<div class="gb_box">
        	<div class="wel">
                
            
                
                
                
            </div>
            <div class="gb_g">
            
            
            <div class="gb_visit">
            
                
            <div class="visitor">
 
            <p class="tong">留言(<?php echo $recordcount;?>)</p>
<!------------------while 循环开始啦------------------------------->
<?php
      $i=0;                    
    while($res=mysql_fetch_assoc($query))
    {
    $sqlh="select * from admin_replay where user_message_id=$res[id] limit 1";
    $queryh=mysql_query($sqlh) or die(mysql_error());
    $resh=mysql_fetch_assoc($queryh);
    $res['content']=str_replace($_GET[sou],"<font style='font-weight:bold;
     color:red;'>".$_GET[sou]."</font>",$res['content']);
?>
                <div class="content">
                <div class="visitor_left">
        <?php
if(empty($res['photo'])){
?>
<img  style="width:70px;height:70px;border-radius:50%;margin-top:10px;"src="image/1.jpg"/>
<?php
}else{
?>
<img  style="width:70px;height:70px;border-radius:50%;margin-top:10px;"src="<?php echo $res['photo']; ?>" />
<?php
}?>
                 <!--   <img style="width:70px;height:70px;border-radius:50%;margin-top:10px;" 
                    src=""/>-->
                </div>
         		<div class="visitor_right"> 
                	<div class="laifang">
                    <p class="visitor_top"><a><?php echo $res[name]?></a><span>                        
                    第<?php  echo $recordcount-$star_value-$i;  ?>楼</span></p>
                      <p class="visitor_content">&nbsp;
 <?php
                        if ($res[secret]==1) {
                            echo "<font style='color:#337ab7;
                            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);'>$res[content]</font>";
                        }else{
                 echo $res[content];
                        }
                    ?>
</p>
                        <p class="visitor_bottom"><?php echo $res[time]?>
                        <span>
                    <a href="replay_message.php?hid=<?php echo $res['id'];?>"> 回复</a></span>
                </p>
                        <hr />
                    </div>
                    <div class="huifu">
                        <div class="huifu_left">
                        <img src="image/logo.png"/>
                        </div>
                     <div class="huifu_right">
                        <p class="huifu_top"><a>管理员回复</a>
                       <span>
<?php  if ($res[secret]==1){
    echo "<font style='color:#337ab7;
                            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);'>欢迎来到我的空间奥。</font>";
}else{
    if(empty($resh[replay_content])) {
                         echo  '欢迎来到我的空间奥。';
     }else{            
                   echo $resh[replay_content];
     }
}?></span></p> 
                        <p class="huifu_bottom">
                  <?php if(empty($resh[replay_time])) {
                         echo  $res[time];
                     }else{            
                         echo $resh[replay_time];
                        
                      }?>             

                   
            <span><a href="del_message.php?id=<?php echo $res['id'];?>">删除 </a></span>
                </p>
                    </div>
                    </div>
                </div>
                </div>
<?php
 $i++;
    }
?>
                 
            </div>
        </div>
        <div class="form">
            <div class="d_left">
            <a>第<span><?php echo $cur_page;?></span>页</a>
            <a>共<span><?php echo $pagecount;?></span>页</a>
            </div>
            
            <div class="d_m">
<!-------------------------这里是分页的下边奥---------------------------------------->
<?php
    if(!empty($_GET[sou])){
    
              if ($cur_page==1) {
                ?>
                　　首页
                　　上一页
            <a href='replay.php?page=<?php echo $cur_page+1;?>&sou=<?php echo $_GET[sou];?>'>下一页</a>
             <a  href='replay.php?page=<?php echo $pagecount;?>&sou=<?php echo $_GET[sou];?>'>尾页</a>
                <?php
            }elseif ($cur_page==$pagecount){
            ?>
            <a href='replay.php?page=1'>首页</a>
            <a href='replay.php?page=<?php echo $cur_page-1;?>&sou=<?php echo $_GET[sou];?>'>上一页</a>
            下一页
            尾页
            <?php
            }else{
            ?>  <a href='replay.php?page=1'>首页</a>
            <a href='replay.php?page=<?php echo $cur_page-1;?>&sou=<?php echo $_GET[sou];?>'>上一页</a>
            <a href='replay.php?page=<?php echo $cur_page+1;?>&sou=<?php echo $_GET[sou];?>'>下一页</a>
            <a  href='replay.php?page=<?php echo $pagecount;?>&sou=<?php echo $_GET[sou];?>'>尾页</a>
            <?php
            }
            ?><form action="replay.php" method="get">
            转到<input type="text" class="ye" name="page"/>页
            <input type="submit" value="确定" class="sub">
           </form>
        <?php
} else{
            if ($cur_page==1) {
                ?>
                首页
                上一页
                <a href='replay.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
                <a  href='replay.php?page=<?php echo $pagecount;?>'>尾页</a>
                <?php
            }elseif ($cur_page==$pagecount) {
            ?>
            <a href='replay.php?page=1'>首页</a>
            <a href='replay.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
            下一页
            尾页
            <?php
            }else {
            ?>  <a href='replay.php?page=1'>首页</a>
            <a href='replay.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
            <a href='replay.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
            <a  href='replay.php?page=<?php echo $pagecount;?>'>尾页</a>
        <?php   
            }
?>           </div>
            <form action="replay.php" method="get">
            转到<input type="text" class="ye" name="page"/>页
            <input type="submit" value="确定" class="sub">
           </form>
<?php
}        
?>           </div>
        </div>
    </div>
	
</div>
</body>
</html>


