<?php
require_once '../sub/init.php';
$uarray = explode("|",$uarray);
$uid = $uarray[0];
$userid = $uid;
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid)){echo 'Forbidden';exit;}
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)){echo 'Forbidden';exit;}
require_once YZLOVE.'sub/conn.php';
$senduserid = $cook_userid;
$content = $mess;
$addtime  = strtotime("now");
$content = '<font color='.$mfcolor.'>'.$content.'</font>';
if ($mfont == 1){
	$content = '<b>'.$content.'</b>';
} elseif ($mfont == 2){
	$content = '<i>'.$content.'</i>';
}
if (!empty($elist)){
	$content = '<img src=face/'.$elist.'>'.$content;
}
$db->query("INSERT INTO ".__TBL_CHATMAIN__." (userid,senduserid,content,addtime) VALUES ($userid,$senduserid,'$content',$addtime)");
?>
