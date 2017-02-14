<?php
header("Content-Type:text/html;charset=utf-8");
mysql_connect("localhost","root","123456") or die(mysql_error());
mysql_select_db("webhuan") or die(mysql_error());
mysql_query("set names utf8");
?>
