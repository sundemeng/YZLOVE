<?php
require_once '../sub/init.php';
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)){
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE new=1 AND ifhmd=0 AND userid=".$cook_userid);
	$row = $db->fetch_array($rt);
	$total = $row[0];
	$IFTIPS = ($total > 0)?1:0;
	$content = ($total > 0)?"пбеСся(<a href=".$Global['my_2domain']."/?b_friend.php target=_blank>".$total."</a>)╦Ж║║":'';
	echo "dataFeed('".$IFTIPS."|F|".$content."');";
}
ob_end_flush();
?>