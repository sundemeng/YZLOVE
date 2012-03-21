<?php
require_once '../sub/init.php';
if ( ereg("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)){
require_once YZLOVE.'sub/conn.php';
$IFTIPS = 0;
$rt = $db->query("SELECT  COUNT(*) FROM ".__TBL_CHATIF__." WHERE userid=".$cook_userid." AND ifagree=0");
$row = $db->fetch_array($rt);
if ($row[0] > 0){$IFTIPS=1;}
if ($IFTIPS == 0){
$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_PRESENT_USER__." WHERE new=1 AND userid=".$cook_userid);
$row = $db->fetch_array($rt);
if ($row[0] > 0){$IFTIPS=1;}
}
if ($IFTIPS == 0){
$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GBOOK__." WHERE new=1 AND userid=".$cook_userid);
$row = $db->fetch_array($rt);
if ($row[0] > 0){$IFTIPS=1;}
}	
if ($IFTIPS == 10){
$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE new=1 AND ifhmd=0 AND userid=".$cook_userid);
$row = $db->fetch_array($rt);
if ($row[0] > 0){$IFTIPS=1;}
}
$content = '';
echo "dataFeed('".$IFTIPS."|S|".$content."');";
}
ob_end_flush();
?>