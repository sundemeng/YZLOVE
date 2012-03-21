<?php 
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid))callmsg("Forbidden","-1");
$db->query("DELETE FROM ".__TBL_CHATIF__." WHERE (senduserid=$cook_userid AND userid=$uid) OR (senduserid=$uid AND userid=$cook_userid)");
callmsg("已经成功拒绝了Ta的这次聊天请求！","0");
exit;
ob_end_flush();
?>