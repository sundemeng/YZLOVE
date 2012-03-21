<?php
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
header("content-type:text/html;charset=gb2312");
$tmpname = $_SERVER['PHP_SELF'];
$tmpname = explode(".",$tmpname);
$tmpname = explode("/",$tmpname[0]);
$tmpname = $tmpname[2];
?>