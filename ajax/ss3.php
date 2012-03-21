<?php
require_once 'pubT.php';
	$rt=$db->query("SELECT id,title,click FROM ".__TBL_NEWS__." WHERE kind=3 ORDER BY id DESC LIMIT 8");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
?>
<div class="li1"><img src="images/lid.gif" /> <a href=<?php echo 'news'.$rows[0].'.html'; ?> target=_blank><?php echo stripslashes($rows[1]); ?></a></div>
<div class="li2">浏览<span><?php echo $rows[2];?></span>次</div>
<?php }}require_once 'pubB.php';?>