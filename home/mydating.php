<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$uid) )callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,alltime,logincount,mbkind,mbtitle,magic,bgpic,sex,photo_s,click,ifphoto,ifbirthday,ifedu,iflove,ifpay FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount  = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该用户不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
if (empty($bgpic)) {
	$tmpbg = "images/".$mbkind."/bg.jpg";
}else{ 
	$tmpbg = $bgpic;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>的约会 私人约会 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind ?>/mydating.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>我的约会</h4><a href="<?php echo $Global['my_2domain']; ?>/?e_dating_add.php">>>发起约会</a></div>
		<div class="rightContent">
<?php
$rt=$db->query("SELECT id,kind,title,yhtime,bmnum,click,flag FROM ".__TBL_DATING__." WHERE userid=".$uid." AND flag>0 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 15;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
			<div class="Tdataline">
				<div class="Tdataline1">约会主题</div>
				<div class="Tdataline2">约会时间</div>
				<div class="Tdataline3">人气</div>
				<div class="Tdataline4">响应人数</div>
				<div class="Tdataline5">详细</div>
			</div>
<?php 
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
			<div class="dataline">
				<div class="dataline1"><img src="images/dating.gif" align="absmiddle" /><a href="dating<?php echo $rows['id'].'.html';?>" target="_blank"><?php echo htmlout(stripslashes($rows['title']));?></a> <?php if ($rows['ifjh'] == 1)echo "<img src=images/jh.gif>";?></div>
				<div class="dataline2"><?php echo date_format2($rows['yhtime'],'%Y-%m-%d %H:%M').' '.getweek(date_format2($rows['yhtime'],'%Y-%m-%d'));?><br />
<?php
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = $rows['yhtime'];
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($rows['flag'] == 2)$totals = -1;
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "还剩 <span class=timestyle>$day</span> 天 ";
	} else {
		$outtime = "还剩 ";
	}
	$outtime .= "<span class=timestyle>$hour</span> 小时<span class=timestyle>$minute</span>分";
} else {
	$outtime = "　<font color=#999999><b>已经结束</b></font>";
}
echo '<span class=outtime>'.$outtime.'</font>';
?></div>
				<div class="dataline3"><font color="#FF0000"><?php echo $rows['click']; ?></font></div>
				<div class="dataline4">( <font color="#FF0000"><?php echo $rows['bmnum']; ?></font> 人 )</div>
				<div class="dataline5"><a href="dating<?php echo $rows['id'].'.html';?>" class="A9BU_tiaose"><?php if ($rows['flag'] == 1){echo '我要赴约';} else {echo '查看详细';} ?></a></div>
			</div>	
<?php }?>
<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
			<div class="nodata">...暂无约会...<br />
			  <br />
			  <a href="<?php echo $Global['my_2domain']; ?>/?e_dating_add.php" class="A9BU_tiaose"><img src="images/pen.gif" hspace="5" border="0" align="absmiddle" /><b>立即发起约会</b></a>			</div>
            <?php }?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
require_once YZLOVE.'home/foot.php';
function getweek($date) {
$dateArr = explode("-", $date);
$weeknum = date("w", mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]));
switch ($weeknum){
case 0:$xingqi='星期日';break;
case 1:$xingqi='星期一';break;
case 2:$xingqi='星期二';break;
case 3:$xingqi='星期三';break;
case 4:$xingqi='星期四';break;
case 5:$xingqi='星期五';break;
case 6:$xingqi='星期六';break;
}
return $xingqi;
} 
?>