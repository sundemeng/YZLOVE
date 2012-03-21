<div class="leftTitle">
	<div class="gradeicon"><?php echo geticon($sex.$grade);?></div>
	<div class="gradeicon2"><?php echo $nickname; ?></div>
</div>
<ul>
	<div class="userphoto1"><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $sex; ?>.gif border=0 title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> border=0 title="<?php echo $nickname.'的照片'; ?>"><?php }?></div>
	<div class="clear"></div>
</ul>
<ul style="padding-top:0px;margin-bottom:5px;" class="ul2">
<?php
if ( ereg("^[0-9]{1,2}$",$cook_grade) && !empty($cook_grade)) {
	$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$uid);
	$rowonline = $db->fetch_array($rtonline);
	if ($rowonline[0] > 0){
		$if_online = 'YES';
	} else {
		$if_online = 'NO';
	}
}
?>
	<li><?php if ( !ereg("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade)) {
echo "<a href=".$Global['www_2domain']."/login.php><img src='images/".$mbkind."/chatno.gif' border=0 /></a>";
} else {
	if ($if_online == 'YES') {
		echo "<a href=".$Global['chat_2domain']."/chksend".$uid.".html target='_blank'><img src='images/".$mbkind."/chat.gif' border=0 title='点击开始聊天' /></a>";
	} else {
		echo "<a href=".$Global['my_2domain']."/?b_gbook.php?submitok=add&memberid=".$uid."&membernickname=".$nickname." target='_blank' onClick=\"return confirm('对方不在线无法聊天，给Ta留言条言吧')\"><img src='images/".$mbkind."/chatno.gif' border=0 title='对方不在线，点击留言给Ta' /></a>";
	}
} ?></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=add&memberid=<?php echo $uid; ?>&membernickname=<?php echo $nickname; ?>&g=<?php echo $grade; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt1.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/?b_present.php?submitok=add&uid=<?php echo $uid; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt2.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/super.php?submitok=friend&uid=<?php echo $uid; ?>&g=<?php echo $grade; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt3.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['my_2domain']; ?>/super.php?submitok=hmd&uid=<?php echo $uid; ?>" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt4.gif" border="0"/></a></li>
	<li><a href="mycontact<?php echo $uid; ?>.html" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt5.gif" border="0"/></a></li>
	<li><a href="<?php echo $Global['www_2domain']; ?>/315.php" target="_blank"><img src="images/<?php echo $mbkind; ?>/bt6.gif" border="0"/></a></li>
	<div class="clear"></div>
</ul>
<div class="clear"></div>