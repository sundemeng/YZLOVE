<?php require_once "sub/init.php";
require_once YZLOVE."sub/conn.php";
$did = ($did-8848)/7;if ( !ereg("^[0-9]{1,8}$",$did) || empty($did))callmsg("Forbidden!","-1");
$rt = $db->query("SELECT a.jjloveb,b.id,b.username,b.loveb FROM ".__TBL_DATING__." a,".__TBL_MAIN__." b WHERE a.id=".$did." AND a.userid=b.id AND a.flag>0 AND b.flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$jjloveb = $row[0];
$uid = $row[1];
$username = $row[2];
$loveb = $row[3];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}$jjloveb = abs($jjloveb);
if ($loveb < $jjloveb) {
$db->query("UPDATE ".__TBL_DATING__." SET jjloveb=0 WHERE id=".$did);
} else {
$jjpm_yzlove = 'datingyzlove'.$did;
if ($_COOKIE["$jjpm_yzlove"] != 'OK'){
		$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-$jjloveb WHERE id=".$uid);
		$addtime=date("Y-m-d H:i:s");
		if (!empty($cook_nickname)) {
			$tmpname = ",浏览者:<a href=".$Global['home_2domain']."/".$cook_userid." target=_blank><u>".$cook_nickname."</u>(".$cook_username.")</a>";
		} else {
			$tmpname = ',浏览者:游客';
		}
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$uid','$username','约会竞价$tmpname','".-$jjloveb."','$addtime')");
}
setcookie("$jjpm_yzlove",'OK');
}header("Location: ".$Global['home_2domain']."/dating$did.html");ob_end_flush();
?>