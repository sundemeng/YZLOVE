<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once "sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
} else {
	require_once YZLOVE.'sub/conn.php';
	$cook_password = trim($cook_password);
	$rt = $db->query("SELECT id,grade,logintime,ifonline FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag=1");
	if ($db->num_rows($rt) > 0){
		$row = $db->fetch_array($rt);
		$date_id = $row[0];
		$date_grade = $row[1];
		$date_logintime = $row[2];
		$date_ifonline = $row[3];
	} else {
		header("Location: ".$Global['www_2domain']."/login.php");
		exit;
	}
}
switch ($date_grade){ 
	case 1:
		if ($date_ifonline == 1){
			$d1 = strtotime($date_logintime);
			$d2 = strtotime("now");
			$tmpsecond  = ($d2-$d1);
			$tmpminute  = round( $tmpsecond/60 );
			if ($tmpminute > 0){
				$addtime = date("Y-m-d H:i:s");
				$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$tmpminute,alltime=alltime+$tmpminute,ifonline=0 WHERE id=".$date_id);
				$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','泡币结算','$tmpminute','$addtime')");

			}
		}
	break;
	case 2:
		if ($date_ifonline == 1) {
			$d1 = strtotime($date_logintime);
			$d2 = strtotime("now");
			$tmpsecond = ($d2-$d1);
			$tmpalltime = round( $tmpsecond/60 );
			$tmpminute = $tmpalltime;
			$tmpminute = $tmpminute*2;
			if ($tmpminute > 0){
				$addtime = date("Y-m-d H:i:s");
				$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$tmpminute,alltime=alltime+$tmpalltime,ifonline=0 WHERE id=".$date_id);
				$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','泡币结算(2倍)','$tmpminute','$addtime')");

			}
		}
	break;
	case 3:
		if ($date_ifonline == 1){
			$d1 = strtotime($date_logintime);
			$d2 = strtotime("now");
			$tmpsecond = ($d2-$d1);
			$tmpalltime = round( $tmpsecond/60 );
			$tmpminute = $tmpalltime;
			$tmpminute = $tmpminute*10;
			if ($tmpminute > 0){
				$addtime = date("Y-m-d H:i:s");
				$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$tmpminute,alltime=alltime+$tmpalltime,ifonline=0 WHERE id=".$date_id);
				$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','泡币结算(10倍)','$tmpminute','$addtime')");
			}
		}
	break;
	case 10:
		if ($date_ifonline == 1){
			$d1 = strtotime($date_logintime);
			$d2 = strtotime("now");
			$tmpsecond = ($d2-$d1);
			$tmpalltime = round( $tmpsecond/60 );
			$tmpminute = $tmpalltime;
			$tmpminute = $tmpminute*10;
			if ($tmpminute > 0){
				$addtime = date("Y-m-d H:i:s");
				$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+$tmpminute,alltime=alltime+$tmpalltime,ifonline=0 WHERE id=".$date_id);
				$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ($date_id,'$cook_username','泡币结算(10倍)','$tmpminute','$addtime')");
			}
		}
	break;
}
$db->query("DELETE FROM ".__TBL_ONLINE__." WHERE userid=".$date_id);
setcookie("cook_userid","",null,"/",$Global['m_cookdomain']);
setcookie("cook_username","",null,"/",$Global['m_cookdomain']);
setcookie("cook_nickname","",null,"/",$Global['m_cookdomain']);
setcookie("cook_password","",null,"/",$Global['m_cookdomain']);
setcookie("cook_grade","",null,"/",$Global['m_cookdomain']);
setcookie("cook_sex","",null,"/",$Global['m_cookdomain']);
setcookie("cook_photo_s","",null,"/",$Global['m_cookdomain']);
setcookie("cook_if2","",null,"/",$Global['m_cookdomain']);
setcookie("cook_stealth","",null,"/",$Global['m_cookdomain']); 
header("Location: ".$Global['www_2domain']);
?>