<?php
require_once '../sub/init.php';
$uarray = explode("|",$uarray);
$uid_to      = $uarray[0];
$nickname_to = $uarray[1];
$sex_to      = $uarray[2];
if ( !ereg("^[0-9]{1,9}$",$uid_to) || empty($uid_to)){echo 'Forbidden';exit;}
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)){echo 'Forbidden';exit;}
require_once YZLOVE.'sub/conn.php';
header("content-type:text/html;charset=gb2312");
$rt=$db->query("SELECT id,userid,senduserid,content,addtime,ifme,ifhe FROM ".__TBL_CHATMAIN__." WHERE (senduserid=".$cook_userid." AND userid=".$uid_to.")  OR  (userid=".$cook_userid." AND senduserid=".$uid_to.") ");
if ($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	$classid    =  $row['id'];
	$userid     =  $row['userid'];
	$senduserid =  $row['senduserid'];
	$content    = "<div style='font-size:13px;color:#333333;padding:0px 15px 0px 15px'>".stripslashes($row['content'])."</div>";
	$addtime    = date_format2($row['addtime'],'%H:%M:%S');
	$ifme       =  $row['ifme'];
	$ifhe       =  $row['ifhe'];
	if ( ($senduserid == $cook_userid) && ( $userid == $uid_to) && ($ifme == 0) ){
		$nickname        = $cook_nickname;
		$sex             = $cook_sex;
		if ($sex == 1){$tmpnicknamecolor = '#0066CC';} else {$tmpnicknamecolor = '#FF6C96';}
		echo "<font color=$tmpnicknamecolor>".$nickname." ".$addtime."</font>".$content;
		$db->query("UPDATE ".__TBL_CHATMAIN__." SET ifme=1 WHERE id=".$classid);
	} elseif ( ($senduserid == $uid_to) && ($userid == $cook_userid) && ($ifhe == 0) ){
		$nickname        = $nickname_to;
		$sex             = $sex_to;
		if ($sex == 1){$tmpnicknamecolor = '#0066CC';} else {$tmpnicknamecolor = '#FF6C96';}
		echo "<font color=$tmpnicknamecolor>".$nickname." ".$addtime."</font>".$content;
		$db->query("UPDATE ".__TBL_CHATMAIN__." SET ifhe=1 WHERE id=".$classid);
	}
	if ($ifme == 1 && $ifhe == 1){
		$db->query("DELETE FROM ".__TBL_CHATMAIN__." WHERE (UNIX_TIMESTAMP()-addtime)>300 OR id=".$classid);
	}
}
?>