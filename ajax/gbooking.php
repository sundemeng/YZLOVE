<?php
require_once '../sub/init.php';
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)){
	require_once YZLOVE.'sub/conn.php';
	$content = "";
	$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GBOOK__." WHERE new=1 AND userid=".$cook_userid);
	$row = $db->fetch_array($rt);
	$total = $row[0];
	$IFTIPS = ($total > 0)?1:0;
	$content = ($total > 0)?"пбаТят(<a href=".$Global['my_2domain']."/?b_gbook.php?submitok=list target=_blank>".$total."</a>)лУ║║<bgsound src=".$Global['www_2domain']."/images/ring.wav loop=1>":'';
	echo "dataFeed('".$IFTIPS."|G|".$content."');";
}
ob_end_flush();
?>