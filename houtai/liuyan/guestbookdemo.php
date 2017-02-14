<?php
header("Content-Type:text/html;charset=utf-8");
require_once("conn.php");
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
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="stylesheet" href="guestbook.css" />
<link rel="shortcut icon" href="image/logo.png">
<title>Liang Huanna's Personal Website</title>
<script src="../../js/jquery.min.js"/></script>
<script src="../../js/change.js"></script>
<script src="../../js/fabhui.js"></script>
<!-------------------------------------------->


</head>
<body>
<div>
    <div class="header">
        <div class="my">
            <div><img src="image/logo.png" class="logo" /></div>
            <div class="biaoti"><img src="image/my_01_02.gif" class="biaoti_img" /></div>
        </div>
        <div class="top">
             <div class="daohang">
               <ul>
                  <li id="txt1"><a href="../../index.php" target="_self">首页</a></li>
                  <li id="txt2"><a href="../../about me.html" target="_self">学无止境</a></li>
                  <li id="txt3"><a href="../../happy.html" target="_self">小确幸</a></li>
                  <li id="txt4"><a href="../../doing.html" target="_self">文字心声</a></li>
                  <li id="txt5"><a href="../../resume.html" target="_self">求职简历</a></li>
                  <li id="txt6"><a href="../../calling.html" target="_self">联系我</a></li>
                  <li id="txt7"><a href="../../guestbook.html" target="_self" style="color:#396;">留言板</a></li>    
               </ul>
             </div> 
        </div>
    </div>
    <div class="gb_z">
    	<div class="gb_box">
        	<div class="wel">
                <p>欢迎来到绿子小姐的留言板</p>

                <!---------------------------搜索留言与管理员登录---------------------------------->
                <form action="guestbookdemo.php" method="get"  accept-charset="utf-8" class="ly">
    			搜索留言：	<input type="search" name="sou" value="search" onFocus="this.value='';" 
                    onBlur="if(this.value==''){this.value='search';}"  class="s" class="search"/>
    				<input type="submit" name="sousou" class="sl" value="搜"/>
   			   		
               </form>
            
                 
             
            </div>
            <div class="gb_g">
            <p class="tong">留言板<hr /></p></div>
            <div class="gb_home">
               <!----------------------主人寄语-------------------------------------->
                <p class="tong">主人寄语<hr /></p>
                <marquee  class="gundong1" align="center" behavior="scroll" direction="left"
                  hspace="4" vspace="1" loop="-1" scrollamount="2" 
                 scrolldelay="-1" onMouseOut="this.start()" onMouseOver="this.stop()">　
                 　<h3>在关于未来的相逢里，愿能蜕变成最精彩的模样。</h3>
				</marquee>
                <marquee  class="gundong2" align="center" behavior="scroll" direction="up"
                  hspace="4" vspace="1" loop="-1" scrollamount="2" 
                 scrolldelay="-1" onMouseOut="this.start()" onMouseOver="this.stop()">　
                   <a>行走的路人，没人喜欢平稳的泥土，无论泥土多芳香，再忙碌的人也会多看一眼风中的
                   百花。即使他们不像泥土那么稳稳的在那，但他们的努力绽放，毕竟给这世界带来了
                   难忘的片段。这个，是不是你我想要的呢？</a>
				</marquee>
            </div>
            <div class="gb_visit">
            <!-------------------留言提交开始啦------------------------------>
                <p class="tong">留言<hr /></p>
                <div class="visit">
                    <form action="input_message_ok.php" name="biaodan"
                     method="post" enctype="multipart/form-data"
                     onsubmit="return a()">
                    <div class="visit_left">                 
                    <input class="user"  name="user" type="text" placeholder="Your Name" 
                onFocus="this.placeholder = '';" onBlur="if (this.placeholder == '') 
                {this.placeholder = 'Your Name';}"/>
                     <br /><br /><br />
                    <textarea class="text" name="content" type="text"
                     placeholder="留下想对我说的话奥。" onfocus="this.placeholder = '';" 
                     onblur="if (this.placeholder == '') {this.placeholder = '留下想对我说的话奥。';}" 
                    ></textarea>
                        <br />
                    <input class="sm" name="sm" value="1" type="checkbox"/>
                    <label for="ly">私密留言&nbsp;</label>
                    <label for="ly">验证码：</label>
                   <input type="code" class="yanzhengma" name="yanzhengma" />
                     <img class="yz" src="yanzhengma.php " onclick="this.src=this.src+'?'+
        Math.random()"/><br />
                     <label for="ly"><input type="submit" value="发表" name="tijiao" class="tijiao"/>
                    </label>    </div>
                <!---------------右边的自定义头像奥------------------------------->


                    <div class="visit_right">
                    <label><img src="image/1.jpg"/>
                    <input class="user_1" type="radio" name="photo" value="image/1.jpg"/></label>
                    <label><img src="image/2.jpg"/>
                    <input class="user_2" type="radio" name="photo" value="image/2.jpg"/></label>
                    <label><img src="image/3.jpg"/>
                    <input class="user_3" type="radio" name="photo" value="image/3.jpg"/></label>
                    <label><img src="image/4.jpg"/>
                    <input class="user_4" type="radio" name="photo" value="image/4.jpg"/></label>
                    <label><img src="image/5.jpg"/>
                    <input class="user_5" type="radio" name="photo" value="image/5.jpg"/></label>
                    <label><img src="image/6.jpg"/>
                    <input class="user_6" type="radio" name="photo" value="image/6.jpg" /></label>                
                    <a class="shangchuan">（点击下面也可以上传你喜欢的头像奥。）</a>
                     <div class="visit_liulan">
                        
                        <input type="file" name="up"></div>
                    </div> </form>                       
                </div>                 
            </div>
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
                            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);'>这是悄悄话留言奥。</font>";
                        }else{
                 echo $res[content];
                        }
                    ?>
</p>
                        <p class="visitor_bottom"><?php echo $res[time]?>
                       
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
            <a href='guestbookdemo.php?page=<?php echo $cur_page+1; ?>&sou=<?php echo $_GET[sou];?>'>下一页</a>
             <a  href='guestbookdemo.php?page=<?php echo $pagecount;?>&sou=<?php echo $_GET[sou];?>'>尾页</a>
                <?php
            }elseif ($cur_page==$pagecount) {
            ?>
            <a href='guestbookdemo.php?page=1'>首页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page-1; ?>&sou=<?php echo $_GET[sou];?>'>上一页</a>
            下一页
            尾页
            <?php
            }else {
            ?>  <a href='guestbookdemo.php?page=1'>首页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page-1; ?>&sou=<?php echo $_GET[sou];?>'>上一页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page+1; ?>&sou=<?php echo $_GET[sou];?>'>下一页</a>
            <a  href='guestbookdemo.php?page=<?php echo $pagecount;?>&sou=<?php echo $_GET[sou];?>'>尾页</a>
            <?php
            }
            ?><form action="guestbookdemo.php" method="get">
            转到<input type="text" class="ye" name="page"/>页
            <input type="submit" value="确定" class="sub">
           </form>
        <?php
} else{
            if ($cur_page==1) {
                ?>
                首页
                上一页
                <a href='guestbookdemo.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
                <a  href='guestbookdemo.php?page=<?php echo $pagecount;?>'>尾页</a>
                <?php
            }elseif ($cur_page==$pagecount) {
            ?>
            <a href='guestbookdemo.php?page=1'>首页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
            下一页
            尾页
            <?php
            }else {
            ?>  <a href='guestbookdemo.php?page=1'>首页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page-1; ?>'>上一页</a>
            <a href='guestbookdemo.php?page=<?php echo $cur_page+1; ?>'>下一页</a>
            <a  href='guestbookdemo.php?page=<?php echo $pagecount;?>'>尾页</a>
        <?php   
            }
?>           </div>
            <form action="guestbookdemo.php" method="get">
            转到<input type="text" class="ye" name="page"/>页
            <input type="submit" value="确定" class="sub">
           </form>
<?php
}        
?>           </div>
        </div>
    </div>
	<div class="banquan">
    <div id="music_bg">
  	<audio src="../../music/tr.mp3" style="width:325px; height:42px;"  controls="true" autoplay="true"/> 
	</div><!--添加音乐-->
    <a>版权所有||梁欢娜个人网页||1643148250@qq.com</a></div>
    <div class="tbox" style="display: block;">
<a href="javascript:void(0)" id="gotop"><img src="../../image/top.jpg"</a>
</div>
</div>
</body>
</html>

