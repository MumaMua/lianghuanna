<?php
header("Content-type:image/png");

session_start();
//定义header。声明图片文件，最好是png，无版权之扰。
//生成新的四位数验证码
$authnum_session='';
$str='1234567890';
//定义用来显示在图片上的字母和数字
$l=strlen($str);//得到字符串的长度
//循环随机抽取四位前面定义的字母和数字
for($i=1;$i<=4;$i++){
    $num=rand(0,$l-1);
    //每次随机抽取一位数字，从第一个字到该字串最大长度
    //-1是因为截取数字从0开始算起，这样34字符都可能排在其中
    $authnum_session.=$str[$num];
    //将通过数字得来的字符连起来一共是四位
}
$_SESSION['code']= $authnum_session;
//用session来做验证也不错注册session，名称为authnum_session
//其他页面只要包含了该图片
//即可以通过$_SESSION['authnum_session']来调用
//生成验证码图片
$im=imagecreate(60,30);
//主要用到黑白灰三种色
$balck=imagecolorallocate($im,255,255,255);
$white=imagecolorallocate($im,253,3,3);
$gray=imagecolorallocate($im,4,116,62);
//将四位数验证码绘入图片
imagefill($im,600,400,$black);
//如不加干扰线，注释即可
$li=imagecolorallocate($im,173,237,173);
for($i=0;$i<40;$i++){
    //加入三条干扰线，视情况而定
 //  imageline($im,rand(0,20),rand(0,41),rand(20,40),rand(0,21),$li);
}
//字符在图片的位置
    imagestring($im,25,13,7,$authnum_session,$white);
for($i=0;$i<80;$i++){
   //加入干扰像素
    imagesetpixel($im,rand()%70,rand()%30,$gray);
}
imagepng($im);
imagedestroy($im);

?>
