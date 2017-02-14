<?php
header("Content-Type:text/html;charset=utf-8");
require_once("houtai/conn.php");
function call_class($lm,$num)
{
    $n=0; 
    if ($lm=='lm1') {
        $sql="select * from news where $lm='".$num."' and lm2='0' and lm3='0' order by id desc"; 
    }elseif ($lm=='lm2') {
         $sql="select * from news where $lm='".$num."' and lm3='0' order by id desc"; 
    }elseif ($lm=='lm3') {
      //  $sql="select * from news where $lm='".$num"'";
        $sql="select * from news where $lm='".$num."' order by id desc";  
    }
    $query=mysql_query($sql);
    echo "<ul>";
    while($res=mysql_fetch_array($query))
    {
        $n++;
		
        echo"
            <a href='news_content.php?id=$res[id]' target='_blank'>
			<li>$res[title]
			<span>$res[time]</span>
            </li></a>";
			if($n>5){break;}
    }
    echo "</ul>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<link rel="shortcut icon" href="image/logo.png">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/shijian.css"/>
<link rel="stylesheet" href="css/shou.css"/>
<title>Liang Huanna's Personal Website</title>
<script src="js/jquery.min.js"/></script>
<script src="js/change.js"></script>
<script src="js/lunbo.js"></script>
<script src="js/qianming.js"></script>
<script src="js/shijian1.js"></script>
<script src="js/shijian2.js"></script>
<script src="js/shou.js"></script>
<script src="js/yqlj.js"></script>
<script src="js/fabhui.js"></script>
<style>
.xy a{
	text-decoration:none;
	font-size:13px;
	text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
	color:#000;}
.xy a:hover{
	text-decoration:underline;
	color:red;
	}
#xy{
	font-size:13px;
	text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
	color:#000;}
#xy:hover{
	text-decoration:underline;
	cursor:pointer;
	color:red;
	}
#news_son{
	margin-left:18px;}
</style>
</head>
    
<body>




<div style="float:left;position:fixed;left:0;bottom:30px;" class="xy">
<ul>


<li><a href="mobile/iphone/index.html" target="_blank">iphone</a></li>
<li><a href="mobile/bootstrap/boot.html" target="_blank">bootstrap</a></li>
<li>
    <div id="xy" onclick="document.all.news_son.style.display=(document.all.news_son.style.
    display=='none')?'':'none'">Responsible</div>
    <div id="news_son" style="display:none;">
    <ul>
    <li><a href="mobile/responsive/first.html" target="_blank">One</a></li>
    <li><a href="mobile/responsive/xy.html" target="_blank">Two</a></li>
    <li><a href="mobile/responsive/xys3.html" target="_blank">Three</a></li>
    </ul>
    </div>
    </li>

</ul>
</div>
<div style="float:right;position:fixed;right:0;top:0;" class="xy">
<ul>
 
<li class="gl"> <img src="image/gl.png" style="width:30px;height:30px;"/></li>
<li class="gl1"><a href="houtai/admin_login.php"> <img src="image/gl1.png" style="width:30px;height:30px;"/></a></li>
</ul>
</div>

<div class="main">

    <!----------Logo，标题，导航开始--------------->
    <div class="i_top">
    	<!--<div class="my">
        	<img src="../image/my.jpg" />
        </div>-->
          <div class="my">
            <div><img src="image/logo.png" class="logo"></div>
            <div class="biaoti"><img src="image/my_01_02.gif" class="biaoti_img"></div>
           
          </div>
          <div class="top">
                <div class="daohang">
                    <ul>
                    <li id="txt1" class="dhl"><a href="index.php" target="_self" style="color:#396;">首页</a></li>
                    <li id="txt2"><a href="about me.html" target="_self">学无止境</a></li>
                    <li id="txt3"><a href="happy.html"target="_self">小确幸</a></li>
                    <li id="txt4"><a href="doing.html" target="_self">文字心声</a></li>
                    <li id="txt5"><a href="resume.html" target="_self">求职简历</a></li>
                    <li id="txt6"><a href="calling.html" target="_self">联系我</a></li>
                    <li id="txt7"><a href="houtai/liuyan/guestbookdemo.php" target="_self">留言板</a></li>    
                    </ul>
               </div> 
          </div>
    </div>
     <!----------Logo，标题，导航结束----------------> 
     <!-----------心情签名,大图轮播开始-------------->
    <div class="middle">
    	   <div class="dong">
          	 <div class="middle_right1">
            <h1>一句心情签名</h1>
          </div>
           	 <div class="middle_right2">
              	<div class="1">
               	<p1> 梦想还是要有的</p1>
               	<p2>万一实现了呢</p2>
               	<p3>人生应该有梦想</p3>
               	<p4>敢于去梦想</p4>
                <p5>你要去相信</p5>
                <p6>只要你敢于努力</p6>
                <p7>梦想终究会成为现实<br />，加油<br />！</p7>
             </div>
               	<div class="2">
               <a1>在关于未来的那个相逢里<br />，</a1>
               <a2>愿能蜕变成最精彩的模样<br />。</a2>
               <a3>致自己</a3>
               </div>
               	<div class="3"> 
              	 <span1>你身边是否有这么几个人<br />？</span1>
                 <span2>不是路人<br />，不是亲人<br />，</span2>
                 <span3>也不是恋人<br />，情人<br />，爱人<br />。</span3>
                 <span4>是友人<br />，却又不仅仅是友人<br />，</span4>
                 <span5>更像是家人<br />。</span5>
                 <span6>这一世自己为自己选的家人<br />。</span6>
               </div>
              <div class="anniu">
              	  <div id="bt1" style="width:30px;height:30px;background:#396;border-radius:50%;50%;"><a>1</a></div>
                  <div id="bt2" style="width:30px;height:30px;background:#396;border-radius:50%;50%;"><a>2</a></div> 
                  <div id="bt3" style="width:30px;height:30px;background:#396;border-radius:50%;50%;"><a>3</a></div>
              </div>           
              
           </div>
           </div>
    	   <div class="middle_left">
         	 <div id="ibanner">
             <div id="ibanner_pic">
                <a href=""><img src="image/1.jpg"/></a>
                <a href=""><img src="image/2.jpg"alt="" /></a>
                <a href=""><img src="image/3.jpg" alt="" /></a>
            </div>
   	      </div>
    <!--ibanner end-->
       	   </div>
    </div>
    <!-------大图轮播，心情签名结束------->
    <!--------微小说，动画，时间，个人动态开始-------->
   
    <div class="buttom">
     	<div class="buttom1"><img src="image微小说.gif"></div>
    	<div class="buttom2">
        <div id="slider">
            <div class="slide">
                <img class="diapo" src="image/01.gif" alt="">
                <div class="text">
                     对于一个吃货来说，幸福或许就是饿的时候正好有人送来香脆可口的煎饼。
                </div>
            </div>
            <div class="slide">
                <img class="diapo" src="image/02.gif" alt="">
                <div class="text">
                     开心的时候，吃好吃的庆祝一下；紧张的时候，吃好吃的放松一下；
   					 
   					 难过的时候，吃好吃的调节一下；
   					 郁闷的时候，吃好吃的发泄一下；
    				 这辈子唯一拿得起放不下的就是筷子。<br /> 
                </div>
            </div>
            <div class="slide">
                <img class="diapo" src="image/03.gif" alt="">
                <div class="text">
                    要坚信
    				没有什么事情是碗救不了的，
    				胃是这样，爱情也是这样。
   				    生活亦是如此。
                </div>
            </div>
        </div>
		<script type="text/javascript">
        /* ==== start script ==== */
        slider.init();
        </script>
         </div>
    	<div class="buttom3">
             <div class='clock'>
                 <div class='h shake shake-slow'></div>
                 <div class='m shake shake-slow'></div>
                 <div class='s shake shake-slow'></div>
             </div>
    <!--<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
    </div>-->
    	</div>
     	<div class="buttom4">
        <div class="ge">
        <img class="wo" src="image/person.png" width="260" height="261"/>
        <marquee  class="gundong" align="center" behavior="scroll" direction="up"
                  hspace="4" vspace="1" loop="-1" scrollamount="2" 
                 scrolldelay="-1" onMouseOut="this.start()" onMouseOver="this.stop()">　
                   <p>Name:梁欢娜<br /><br />
       				 Major:数学与应用数学<br /><br />
                     Motto:人生至善，就是对生活乐观，对工作愉快，对事业兴奋。</p>
		</marquee>
        </div>
               
                
        </div>
    </div>
    <!-----------微小说，动画，时间，个人动态结束------->
    <!--------版权开始-------->
    
	<div class="person">
    <div id="news">
    　　<?php
    call_class("lm2","81");
	
    ?>
    
             
             <div class="more"><a href="more.php" target="_blank">更多</a></div>
   </div>
    </div>
   <!--------版权开始-------->
    <div class="banquan">
    <div id="music_bg">
  	<audio src="music/tr.mp3" style="width:325px; height:42px;"  controls="true" autoplay="true"/> 
	</div><!--添加音乐-->

    
    <a>版权所有||梁欢娜个人网页||1643148250@qq.com</a></div>
   <!--------版权开始-------->
    
    

</div>
<div class="tbox" style="display: block;">
<a href="javascript:void(0)" id="gotop"><img src="image/top.jpg"/></a>
</div>
</div>
</body>
</html>
