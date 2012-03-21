<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* .main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:84px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:84px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;text-align:center;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
.timestyle {color:#f00;font-size:12px;font-weight:bold}
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_list.php" class="a333">我的约会</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_add.php" class="a333">发起约会</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_price.php" class="a333">约会竞价排名</a></div>
	<div class="main1_tselect"><a href="e_dating_join.php" class="a6F9F00">我参加的约会</a></div>
</div>
<div class="main2">
  <div class="main2_frame">
<br />
<br />
<?php
$rt=$db->query("SELECT a.id,a.nickname,a.grade,a.sex,b.id as fid,b.title,b.yhtime,b.contact,b.bmnum,b.click,b.flag,c.flag as bmflag FROM ".__TBL_MAIN__." a,".__TBL_DATING__." b,".__TBL_DATING_USER__." c WHERE a.id=b.userid AND b.id=c.fid AND c.userid=".$cook_userid." ORDER BY b.id DESC");
$total = $db->num_rows($rt);
if($total>0){
$pagesize=20;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?><table width="700" border="00" align="center" cellpadding="3" cellspacing="0" style="color:#666666;">
<tr>
<td width="114" height="22" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>发起人</b></font></td>
<td width="204" align="left" bgcolor="#FDEEF8"><b><font color="#DF2C91">　　参加的约会主题</font></b></td>
<td width="174" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>约会时间</b></font></td>
<td width="61" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>报名/人气</b></font></td>
<td width="117" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>赴约状态</b></font></td>
</tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
		$bg="bgcolor=#f3f3f3";
		$overbg="#ffffcc";
		$outbg="#f3f3f3";
} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
}
?><tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
<td height="29" align="center" style="border-bottom:#DDDDDD 1px solid;color:#ff0000;">
<a href=<?php echo $Global['home_2domain'];?>/<?php echo $rows['id'];?> target=_blank class="u333333"><?php geticon($rows['sex'].$rows['grade']);?><?php echo htmlout(stripslashes($rows['nickname']));?></a></td>
    <td align="left" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><a href="<?php echo $Global['home_2domain'];?>/dating<?php echo $rows['fid'].'.html';?>" class=333333 target="_blank" ><img src="images/groupren.gif" hspace="5" border="0" align="absmiddle"><?php echo stripslashes($rows['title']); ?></a><?php 
if ($rows['flag']==0)echo " <font color=red>未审</font>";
?></td>
    <td height="70" align="center" style="border-bottom:#DDDDDD 1px solid;"><?php echo date_format2($rows['yhtime'],'%Y-%m-%d %H:%M').' '.getweek(date_format2($rows['yhtime'],'%Y-%m-%d'));?><br />
<?php
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = $rows['yhtime'];
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "还剩<span class=timestyle>$day</span>天";
	} else {
		$outtime = "还剩";
	}
	$outtime .= "<span class=timestyle>$hour</span>小时<span class=timestyle>$minute</span>分";
} else {
	$outtime = "　<font color=#999999><b>已经结束</b></font>";
}
echo '<font color=#6F9F00>'.$outtime.'</font>';
?>		  </td>
    <td height="70" align="center" style="border-bottom:#DDDDDD 1px solid;"><font color="#FF0000"><?php echo $rows['bmnum']; ?></font> / <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
    <td align="left" style="border-bottom:#DDDDDD 1px solid;">
<?php
if ($rows['bmflag'] == 1){
	echo '<font color=#ff0000><b>恭喜你</b>！</font>';
	echo '<font color=#6F9F00>发起人已正式同意你的赴约，</font>';
	echo '<font color=#6F9F00>Ta的联系方法为：<b>'.htmlout(stripslashes($rows['contact'])).'</b></font>';
}else{
	if ($rows['flag'] == 1){
		echo '<font color=#ff6600>发起人正在考虑您的应约，请等候佳音...</font>';
	} else {
		echo '<font color=#999999>已经落选，下次还有机会哟 ^_^</font>';
	}
}
?></td>
</tr>
<?php
}
?></table>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php
} else { 
echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#f3f3f3><font color=666666>..暂无信息..</font></td></tr></table>";
}?>
<br />
<br />
<br />
<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
      <br />
      <br />
      <br />
      <br />
  </div>
</div>
<?php
require_once YZLOVE.'my/bottommy.php';
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