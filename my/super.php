<?php
/***************************************************
Copyright (C) 2008  都市情缘交友网  v2.0
作  者: PAN　
***************************************************/
require_once "../sub/init.php";
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,10}$",$uid) || empty($uid) )callmsg("Forbidden!",$Global['www_2domain']);
$rt = $db->query("SELECT nickname,grade FROM ".__TBL_MAIN__." WHERE flag>0  AND id=".$uid);
if (!$db->num_rows($rt)) {
	callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
	exit;
} else {
	$row = $db->fetch_array($rt);
	$membernickname = $row[0];
	$membergrade    = $row[1];
}
switch ($submitok) {
	case 'friend':
		if ($uid == $cook_userid)callmsg("请求错误，不能操作自已！","0");
		if ( !ereg("^[0-9]{1,2}$",$g) || empty($g) )callmsg("Forbidden","-1");
		if ($g == 1) {
		$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE userid=".$uid);
		if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmpgbookcount = $row[0];
		}else{$tmpgbookcount = 0;}
		if ($tmpgbookcount >= $Global['m_friend_num'])callmsg("Sorry! 对方好友数目已满，发送失败！","0");}
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$uid." AND senduserid=".$cook_userid);
		if ($db->num_rows($rt)) {
			callmsg("①该用户已经是你好友\\n②他(她)已将你列为黑名单中的一员\\n③正在处于对方验证中。。。","0");
		} else {
			$addtime=date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_FRIEND__."  (userid,senduserid,addtime) VALUES ($uid,$cook_userid,'$addtime')");
			callmsg("你的好友申请已发送给".$membernickname."，请静候佳音。。。","0");
		}
	break;
	case 'hmd':
		if ($uid == $cook_userid)callmsg("请求错误，不能操作自已！","0");
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$uid." AND senduserid=".$cook_userid);
		if ($db->num_rows($rt)) {
			callmsg("①已处于你的黑名单当中\\n②或该用户正是你好友！\\n③正在处于对方验证中。。。","0");
		} else {
			if ($membergrade == 10)callmsg("请求错误，不能将管理员列为黑名单！","-1");
			$addtime=date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_FRIEND__."  (userid,senduserid,ifhmd,addtime) VALUES ($uid,$cook_userid,1,'$addtime')");
			header("Location: ".$Global['my_2domain']."/?b_blacklist.php");
		}
	break;
}
?>