<?php
require_once 'pubT.php';
	$rt=$db->query("SELECT id,title,click,hfnum FROM ".__TBL_DIARY__." WHERE flag=1 AND ifjh=1 AND diaryopen=1 ORDER BY ifjh DESC,id DESC LIMIT 9");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
?>
<div class="li1"><img src="images/lid.gif" />　<a href=<?php echo $Global['home_2domain'].'/diary'.$rows[0].'.html'; ?> target=_blank><?php echo badstr(htmlout(stripslashes($rows[1]))); ?></a></div>
<div class="li2 hui"><span title="回复数目"><?php echo $rows[3];?></span> / <span title="点击次数"><?php echo $rows[2];?></span></div>
<?php }}require_once 'pubB.php';?>