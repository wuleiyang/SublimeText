<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
date_default_timezone_set('Asia/Shanghai');
@session_start();
$host="localhost";
$user="verydeals";
$pass="webthink";
$db="verydeals";
$conn=@mysql_connect($host,$user,$pass) or die("数据库连接失败");
$db=@mysql_select_db($db,$conn);
mysql_query("set names gb2312");
?>
