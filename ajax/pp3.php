<?php
require_once 'pubT.php';
	$rt=$db->query("SELECT id,nickname,grade,sex,birthday,area2,love FROM ".__TBL_MAIN__." WHERE flag=1 ORDER BY id DESC LIMIT 8");
	if (!$db->num_rows($rt)){
		echo '<h6>‘›Œﬁ–≈œ¢</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/fundata.php';
		$data = new yzlove_data;
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
?>
<div class="li1"><?php geticon($rows['sex'].$rows['grade']);echo '<a href='.$Global['home_2domain'].'/'.$rows['id'].' target=_blank>'.$rows['nickname']; ?></a></div>
<div class="li2"><?php echo $data->getbirthday($rows['birthday']); ?> ÀÍ</div>
<div class="li3"><?php echo $rows['area2']; ?></div>
<div class="li4"><?php echo $data->getlove($rows['love']);?></div>
<?php }}require_once 'pubB.php';?>