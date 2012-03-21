<?php 
require_once '../../sub/init.php';
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT geci FROM oklist WHERE id=".$id);
if($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	echo $row['geci'];
}
?>