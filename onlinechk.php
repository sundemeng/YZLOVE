<?php
require_once "sub/init.php";
require_once YZLOVE.'sub/conn.php';
require_once YZLOVE."sub/online.php";
$online = new online_yzlove;
$online->chk();
ob_end_flush();
?>