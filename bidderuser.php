<?php require_once "sub/init.php";
require_once YZLOVE."sub/conn.php";
$uid = ($uid-8848)/7;
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden!","-1");
$rt = $db->query("SELECT username,loveb,zhenghun_jingjia FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$username = $row[0];
	$loveb = $row[1];
	$zhenghun_jingjia = $row[2];
} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该用户不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
	exit;
}
$zhenghun_jingjia = abs($zhenghun_jingjia);
if ($loveb < $zhenghun_jingjia) {
	$db->query("UPDATE ".__TBL_MAIN__." SET zhenghun_jingjia=0 WHERE id=".$uid);
} else {
	$jjpm_zh = 'yzlove__com_bidder'.$uid;
	if ($_COOKIE["$jjpm_zh"] != 'OK'){
		$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-$zhenghun_jingjia WHERE id=".$uid);
		$addtime=date("Y-m-d H:i:s");
		if (!empty($cook_nickname)) {
			$tmpname = ",浏览者:<a href=".$Global['home_2domain']."/".$cook_userid." target=_blank><u>".$cook_nickname."</u>(".$cook_username.")</a>";
		} else {
			$tmpname = ',浏览者:游客';
		}
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$uid','$username','竞价排名$tmpname','".-$zhenghun_jingjia."','$addtime')");
	}
	setcookie("$jjpm_zh",'OK');
}
header("Location: ".$Global['home_2domain']."/".$uid);
ob_end_flush();
?>