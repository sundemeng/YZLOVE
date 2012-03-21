<?php
require_once 'pubT.php';
$Tfield = "id,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
switch ($kind){ 
	case 4:
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE (kind=4 OR kind=1) AND sex=2 AND flag=1 AND photo_s<>'' ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 6";
		$sex1href = "user/?k=4&s=3";
		$sex2href = "user/?k=4&s=4";
	break;
	case 5:
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE (kind=5 OR kind=1) AND sex=2 AND flag=1 AND photo_s<>'' ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 6";
		$sex1href = "user/?k=5&s=3";
		$sex2href = "user/?k=5&s=4";
	break;
	default:
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE (kind=2 OR kind=1) AND sex=2 AND flag=1 AND photo_s<>'' ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 6";
		$sex1href = "user/?k=2&s=3";
		$sex2href = "user/?k=2&s=4";
	break;
	case 12345:
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE flag=1 AND grade>1 AND photo_s<>'' ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 6";
		$sex1href = "user/searchlist.php?s=5&sex=1";
		$sex2href = "user/searchlist.php?s=5&sex=2";
	break;
}
	$rt=$db->query($tmpsql);
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
?>
	<div class="sexselect">
		<div class="yzlove1"><a href="<?php echo $sex2href; ?>"><img src="images/yzlove1.gif" title="显示更多女士" border="0" /></a>　<a href="<?php echo $sex1href; ?>"><img src="images/yzlove2.gif" title="显示更多男士" border="0" /></a></div>
		<div class="yzlove2">( 只显示有照片会员 )　<a href="<?php echo $Global['my_2domain'].'/?k_bidding.php'; ?>">我也要在这里显示</a></div>
	</div>
<?php
		require_once YZLOVE.'sub/fundata.php';
		$data = new yzlove_data;
		$total = $db->num_rows($rt);
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows['id'];
			$id = $uid*7+8848;
			$nickname = $rows['nickname'];
			$grade = $rows['grade'];
			$sex = $rows['sex'];
			$birthday = $rows['birthday'];
			$love = $rows['love'];
			$kind = $rows['kind'];
			$area1 = $rows['area1'];
			$area2 = $rows['area2'];
			$photo_s = $rows['photo_s'];
			$video_s = $rows['video_s'];
			$heigh = $rows['heigh'];
			$weigh = $rows['weigh'];
			$house = $rows['house'];
			$car = $rows['car'];
			$edu = $rows['edu'];
			$job = $rows['job'];
			$pay = $rows['pay'];
			$ifphoto = $rows['ifphoto'];
			$ifbirthday = $rows['ifbirthday'];
			$ifedu = $rows['ifedu'];
			$iflove = $rows['iflove'];
			$ifpay = $rows['ifpay'];
			$zhenghun_jingjia = $rows['zhenghun_jingjia'];
			$tmpx = 0;
			if ($ifphoto == 1)$tmpx = $tmpx+1;
			if ($ifbirthday == 1)$tmpx = $tmpx+1;
			if ($ifedu == 1)$tmpx = $tmpx+1;
			if ($iflove == 1)$tmpx = $tmpx+1;
			if ($ifpay == 1)$tmpx = $tmpx+1;
			if ($zhenghun_jingjia > 0){
				$href = 'bidderuser'.$id.'.html';
			} else {
				$href = $Global['home_2domain'].'/'.$uid;
			}
?>
		<div class="frame">
			<div class="L"><a href=<?php echo $href;?> target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> width="110" height="135" title="<?php echo $nickname.'的照片'; ?>"><?php }?></a></div>
			<div class="R">
				<div class="top"><?php geticon($sex.$grade);echo '<a href='.$href.' target=_blank>'.badstr($nickname).'</a>';
if ($tmpx > 0)echo ' ( ';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=images/sfz_x.gif align=absmiddle vspace=5 title='实名认证星级：当前".$tmpx."星，共5星'>";
}echo '</a>';if ($tmpx > 0)echo ' )';
?></div>
				<div class="middle"><?php echo $data->getbirthday($birthday); ?>，<?php echo $data->getlove($love); ?>，<?php if ($heigh > 140)echo $heigh.'厘米，';?><?php if ($weigh > 20)echo $weigh.'公斤，'; ?><?php echo $area1.$area2; ?>，<?php $tmphouse = $data->gethouse($house);if (!empty($tmphouse))echo $tmphouse.'，'; ?><?php $tmpcar = $data->getcar($car);if (!empty($tmpcar))echo $tmpcar.'，'; ?><?php $tmpedu = $data->getedu($edu);if (!empty($tmpedu))echo $tmpedu.'，'; ?><?php $tmppay = $data->getpay($pay);if (!empty($tmppay))echo $tmppay.'，'; ?><?php $tmpjob = $data->getjob($job);if (!empty($tmpjob))echo $tmpjob.'，'; ?>交友目的为<?php echo $data->getkind($kind);?></div>
				<div class="bottom">+ <a href=<?php echo $href;?> target=_blank>查看详细</a></div>
			</div>
		</div>
<?php }}require_once 'pubB.php';?>