<?php require_once 'pubT.php';
	$rt=$db->query("SELECT id,title,bmnum,jjloveb FROM ".__TBL_DATING__." WHERE flag>0 ORDER BY jjloveb DESC,flag,yhtime LIMIT 7");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$id = $rows[0];
			$title = $rows[1];
			$bmnum = $rows[2];
			$jjloveb = $rows[3];
			$did = $id*7+8848;
			if ($jjloveb > 0){
				$href = 'bidderdating'.$did.'.html';
			} else {
				$href = $Global['home_2domain']."/dating$id.html";
			}
?>
	<div class="li"><div class="li1"><a href="<?php echo $href;?>" target="_blank"><?php echo gylsubstr(htmlout(stripslashes($title)),26);?></a> (<span><?php echo $bmnum; ?></span>人响应)</div><div class="li22"><a href="<?php echo $href;?>" target="_blank"><img src="images/dating_libt.gif" /></a></div></div>
<?php }}require_once 'pubB.php';?>