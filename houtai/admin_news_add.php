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
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="bianjiqi/themes/default/default.css" />
	<link rel="stylesheet" href="bianjiqi/plugins/code/prettify.css" />
	<script charset="utf-8" src="bianjiqi/kindeditor.js"></script>
	<script charset="utf-8" src="bianjiqi/lang/zh_CN.js"></script>
	<script charset="utf-8" src="bianjiqi/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : 'bianjiqi/plugins/code/prettify.css',
				uploadJson : 'bianjiqi/php/upload_json.php',
				fileManagerJson : 'bianjiqi/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
    </script>
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

}
form{
margin-left:100px;
margin-top:30px;
font-size:20px;
font-family:宋体;
color:#000;
}
.submit1{
width:100px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
}
.submit{
width:60px;
height:30px;
background:#FFF;
font-size:18px;
font-family:宋体;
margin-bottom:30px;
}
.bian{
margin-left:400px;
font-family:宋体;
font-size:30px;
font-weight:bold;

}
</style>
</head>
<body>
<div class="main">
<p class="bian">添加新闻</p>
    <form method="post" action="admin_news_add_ok.php">
    标题:<input type="text" name="name" value="" /><br />
    分类:<select name="lm" id="some_name">
    <?php
        $sql="select id,lm1 from lm where lm1 !=''";
        $query=mysql_query($sql) or die(mysql_error());
        while($res1=mysql_fetch_assoc($query))
        {
    ?>

     <option value="<?php echo $res1['id'].'|0|0';?>" ><?php echo $res1['lm1'].'(一级)';?></option>
        <?php
          $sql2="select id,lm2 from lm where lmid =$res1[id]";
          $query2=mysql_query($sql2) or die(mysql_error());
        while($res2=mysql_fetch_assoc($query2)) 
            {
            echo "<option value='$res1[id]|$res2[id]|0' >------$res2[lm2](二级)</option>";
                $sql3="select id,lm3 from lm where lmid =$res2[id]";
          $query3=mysql_query($sql3) or die(mysql_error());
            while($res3=mysql_fetch_assoc($query3)) {
             echo "<option value='$res1[id]|$res2[id]|$res3[id]' >******$res3[lm3](三级)</option>";
            
            }

            }
        

        ?>      
<?php
}
?>  
    </select></br />
    作者:<input type="text" name="user" value="" /><br />
新闻内容:
		<textarea name="content1" style="width:700px;height:200px;visibility:hidden;"></textarea>
		<br />
        <input type="submit" name="button" value="发布新闻" class="submit1" />
	<input type="reset"  value="重置" class="submit"/>
    </form>
</div>
</body>
</html>


