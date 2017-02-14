<?php
header("Content-Type:text/html;charset=utf-8");
if(is_uploaded_file($_FILES['up']['tmp_name'])){
    $upfile=$_FILES['up'];
    $name=$upfile['name'];
     $type=$upfile['type'];
    $size=$upfile['size'];
    $tmp_name=$upfile['tmp_name'];
    $error=$upfile['error'];
    switch($type){
    case"image/jpg" : $ok=1;
    break;
    case"image/png" : $ok=1;
    break;
     case"image/jpeg" : $ok=1;
    break; 
     case"image/gif" : $ok=1;
    break;
     default : $ok=0;
    break;
    
    }
    if($ok && $error=='0'){//如果文件符合要求并且上传过程中没有错误
        move_uploaded_file($tmp_name,'up/'.'2015'.$name);//进行
        $url='up/'.'2015'.$name;
    
    }
}
?>
