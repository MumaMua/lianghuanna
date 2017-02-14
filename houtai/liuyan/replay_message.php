<?php
header("Content-Type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <title>留言回复</title>
   <link rel="stylesheet" href="replay.css" />
</head>
<body>

    <form action="replay_message_ok.php" method="post">
    <h2 style="text-align:center;font-size:40px;margin-bottom:20px;">Replay</h2>
       <textarea name="content" class="replay"
             placeholder="Your replay message "
          onfocus="this.placeholder='';" onblur="if(this.placeholder=='')
            {this.placeholder='Your replay message';}"         
></textarea>
    
<input type="hidden" value="<?php echo $_GET['hid'];?>" name="id">
    <input type="submit" value="提交" class="tijiao" name="replay"/>
    </form>
<a href="replay.php"><img src="image/fh.png" style="margin-left:700px;"/></a>
</body>
</html>
