<?php !function_exists('cdstr') && exit('Forbidden');?>
<?php require_once YZLOVE.'bottom.html';?>
<?php 
	if (preg_match ("^[0-9]{1,9}$",$cook_userid) && !empty($cook_userid)) {//ereg()函数被替代
?>
<script charset="gb2312" language="javascript" src="<?php echo $Global['www_2domain']; ?>/ajax/YzlovePOP.js?t=<?php echo $Global['m_sitename']; ?>提醒您-&u=<?php echo $Global['www_2domain']; ?>&c=<?php echo $cook_nickname; ?>" id="zeai2_1"></script>
<?php if ( $cook_grade == 2 || $cook_grade == 3 || $cook_grade == 10 ){?>
<script language="javascript" src="<?php echo $Global['www_2domain']; ?>/ajax/Zeai2PB.js?u=<?php echo $Global['my_2domain']; ?>" id="zeai2_2"></script>
<?php }?>
<?php }?>
</body></html>
<?php ob_end_flush();?>