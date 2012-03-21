<?php
require_once '../sub/init.php';
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)){
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT a.senduserid,b.nickname,b.sex,b.grade FROM ".__TBL_CHATIF__." a,".__TBL_MAIN__." b WHERE a.userid=".$cook_userid." AND a.ifagree=0 AND a.senduserid=b.id ORDER BY a.id DESC LIMIT 3");
	$total = $db->num_rows($rt);
	$content = "";
	if($total > 0){
		for($i=1;$i<=$total;$i++) {
			$row = $db->fetch_array($rt);
			if(!$row) break;
			$senduserid   = $row[0];
			$sendnickname = $row[1];
			$sex          = $row[2];
			$grade        = $row[3];
			$sexcolor = ($sex == 1)?' class=lan':' class=hong';
			$sexgrade = $sex.$grade;
			$content .= '<div class=li title=点此和Ta聊天>'.echoicon($sexgrade)."<a href=".$Global['home_2domain']."/".$senduserid." target=_blank $sexcolor>".$sendnickname."</a> 想和你聊天 <a href=".$Global['chat_2domain']."/chk.php?uid=".$senduserid." target=_blank><img src=".$Global['www_2domain']."/images/chat.gif align=absmiddle title=点此和Ta聊天 target=_blank /></a>　<a href=".$Global['chat_2domain']."/chk_denial.php?uid=".$senduserid." target=_blank class=clse title=点此拒绝Ta的这次聊天请求>关闭</a></div>";
		}
		$content .= "<bgsound src=".$Global['chat_2domain']."/images/security.wav loop=1>";
	} else {
		$content = "<div class=span>暂时还没有新的聊天请求！<br>选择更多人 <a href=".$Global['www_2domain']."/user/online.php class=CuDF2C91 target=_blank>点此聊天</a></div>";
	}
	$IFTIPS = ($total > 0)?1:0;
	echo "dataFeed('".$IFTIPS."|C|".$content."');";
}
ob_end_flush();
?>