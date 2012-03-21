<div class="leftTitle">
	<div class="gradeicon"><?php echo geticon($sex.$grade);?></div>
	<div class="gradeicon2">
	<?php
	echo $nickname;
	if ( ereg("^[0-9]{1,2}$",$cook_grade) && !empty($cook_grade)) {
	$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$uid);
	$rowonline = $db->fetch_array($rtonline);
	if ($rowonline[0] > 0){
		$if_online = 'YES';
		echo ' <font color=#ff0000 style=font-size:12px>(在线)</font>';
	} else {
		$if_online = 'NO';
		echo ' <font color=#666666 style=font-size:12px>(不在线)</font>';
	}
} ?></div>
	<div class="gradeicon3"><?php $totalday = intval($alltime/1440);
$ty  = intval($totalday/160);
$ty_ = intval($totalday % 160);
$yl  = intval($ty_/40);
$yl_ = intval($ty_ % 40);
$xx  = intval($yl_/10);
$jftotals  = $alltime*60;
$jfday     = intval( $jftotals/86400 );
$jfhour    = intval(($jftotals % 86400)/3600);
$jfhourmod = ($jftotals % 86400)/3600 - $jfhour;
$jfminute  = intval($jfhourmod*60);
$timetips = '在线时长：';
if ($jfday > 0)$timetips .= $jfday.' 天 ';
if ($jfhour > 0)$timetips     .= $jfhour.' 小时 ';
if ($jfminute > 0)$timetips   .= $jfminute.' 分钟 ';
for($t=1;$t<=$ty;$t++){echo "<image src=images/$mbkind/star160.gif title='$timetips'>";}
for($y=1;$y<=$yl;$y++) {echo "<image src=images/$mbkind/star40.gif title='$timetips'>";}
for($x=1;$x<=$xx;$x++) {echo "<image src=images/$mbkind/star10.gif title='$timetips'>";}
?></div>
</div>
<ul>
	<div class="userphoto1"><?php if (empty($row['photo_s'])){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $row['sex']; ?>.gif border=0 title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $row['photo_s']; ?> border=0 title="<?php echo $nickname.'的照片'; ?>" width="110"><?php }?></div>
	<div class="userphoto2">
		<div class="userphoto2L">登　录：</div>
		<div class="userphoto2R"><?php echo $logincount; ?> 次</div>
		<div class="userphoto2L">人　气：</div>
		<div class="userphoto2R"><?php echo $click; ?></div>
		<div class="userphoto2L">认　证：</div>
		<div class="userphoto2R"><a href="<?php echo $Global['my_2domain']; ?>/?k_sfz.php" ><?php
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=images/$mbkind/sfz_x.gif align=absmiddle vspace=5 border=0 title='实名认证星级：当前".$tmpx."星，共5星'>";
}
for($x2=1;$x2<=(5-$tmpx);$x2++) {
echo "<image src=images/$mbkind/sfz_hx.gif align=absmiddle vspace=5 border=0  title='实名认证星级：当前".$tmpx."星，共5星'>";
}
?></a></div>
		<div class="userphoto2L">Love币：</div>
		<div class="userphoto2R"><?php echo $loveb; ?></div>
		<div class="userphoto2B"><?php if ( !ereg("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade)) {
echo "<a href=".$Global['www_2domain']."/login.php><img src='images/".$mbkind."/chat.gif' border=0 /></a>";
} else {
	if ($if_online == 'YES') {
		echo "<a href=".$Global['chat_2domain']."/chksend".$uid.".html target='_blank'><img src='images/".$mbkind."/chat.gif' border=0 title='点击开始聊天' /></a>";
	} else {
		echo "<a href=".$Global['my_2domain']."/?b_gbook.php?submitok=add&memberid=".$uid."&membernickname=".$nickname." target='_blank' onClick=\"return confirm('对方不在线无法聊天，给Ta留言条言吧')\"><img src='images/".$mbkind."/chatno.gif' border=0 title='对方不在线，点击留言给Ta' /></a>";
	}
} ?></div>
	</div>
	<div class="clear"></div>
</ul>
<ul style="padding-top:0px;margin-bottom:5px;" class="ul2">
	<li><a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=add&memberid=<?php echo $uid; ?>&membernickname=<?php echo $nickname; ?>&g=<?php echo $grade; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt1.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/?b_present.php?submitok=add&uid=<?php echo $uid; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt2.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/super.php?submitok=friend&uid=<?php echo $uid; ?>&g=<?php echo $grade; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt3.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/super.php?submitok=hmd&uid=<?php echo $uid; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt4.gif" border="0"/></a></li>
	<li><a href="mycontact<?php echo $uid; ?>.html" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt5.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['www_2domain']; ?>/315.php" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt6.gif" border="0"/></a></li>
	<div class="clear"></div>
</ul>
<div class="clear"></div>