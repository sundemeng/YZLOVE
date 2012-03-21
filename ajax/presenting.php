<?php
require_once '../sub/init.php';
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)){
	require_once YZLOVE.'sub/conn.php';
	$content = "";
	$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_PRESENT_USER__." WHERE new=1 AND userid=".$cook_userid);
	$row = $db->fetch_array($rt);
	$total = $row[0];
	$IFTIPS = ($total > 0)?1:0;
	$content = ($total > 0)?"ÐÂÀñÎï(<a href=".$Global['my_2domain']."/?b_present.php?submitok=list target=_blank>".$total."</a>)¸ö":'';
	echo "dataFeed('".$IFTIPS."|P|".$content."');";
}
ob_end_flush();
?>