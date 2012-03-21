<?php
require_once 'pubT.php';
	$rt=$db->query("SELECT id,title,qgrade,wznum FROM ".__TBL_GROUP_MAIN__." WHERE flag=1 ORDER BY wznum DESC,id DESC LIMIT 15");
	if (!$db->num_rows($rt)){
		echo '<h6>ÔÝÎÞÐÅÏ¢</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
	?>
	<li><img src="images/groupico.gif" align="absmiddle" /> <a href=<?php echo $Global['group_2domain'].'/'.$rows[0]; ?> target=_blank<?php if ($rows[2] > 3)echo ' class=grade';?>><?php echo $rows[1]; ?></a> (<span><?php echo $rows[3]; ?></span>Æª)</li>
<?php }}require_once 'pubB.php';?>