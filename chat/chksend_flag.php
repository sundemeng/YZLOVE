<?php 
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid))callmsg("Forbidden","-1");
$difftime = 300;
$rtchat = $db->query("SELECT id,ifagree,addtime FROM ".__TBL_CHATIF__." WHERE senduserid=".$cook_userid." AND userid=".$uid);
if ($db->num_rows($rtchat)) {
	$rowchat = $db->fetch_array($rtchat);
	$classid = $rowchat[0];
	$ifagree = $rowchat[1];
	$addtime = $rowchat[2];
	if ($ifagree == 0){
		$nowtime  = strtotime("now");
		if (($nowtime - $addtime) > $difftime){
			$db->query("DELETE FROM ".__TBL_CHATIF__." WHERE senduserid=".$cook_userid." OR userid=".$cook_userid." AND (UNIX_TIMESTAMP()-addtime)>300");
			$sendflag = 1;//³¬
		} else {
			$sendflag = 2;//µÈ
		}
	} elseif ($ifagree == 1){
		$sendflag = 3;//¹¦
	}
} else {
	$sendflag = 1;
}
echo $sendflag;
?>