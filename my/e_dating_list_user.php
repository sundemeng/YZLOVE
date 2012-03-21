<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("Forbidden","-1");
if ($submitok == 'modupdate') {
	if ( !ereg("^[0-9]{1,8}$",$bbsid) || empty($bbsid))callmsg("Forbidden","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_DATING__." WHERE id=".$fid);
	if(!$db->num_rows($rt))callmsg("不存在！","-1");
	$row = $db->fetch_array($rt);
	if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
	$db->query("UPDATE ".__TBL_DATING__." SET flag=2,jjloveb=0 WHERE id=".$fid);
	$db->query("UPDATE ".__TBL_DATING_USER__." SET flag=1 WHERE id=".$bbsid);
	header("Location: e_dating_list_user.php?fid=".$fid."&p=".$p);
}
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

.main2_frame_maink {width:700px;margin:0px auto;}/*框frame*/
	.main2_frame_k {float:left;width:106px;height:176px;margin:14px;margin-top:10px;margin-bottom:0px;}/*框*/
		.main2_frame_k1 {width:100px;height:100px;background:#fff;border:#ddd 1px solid;padding:2px;color:#666;margin-bottom:5px;}
		.main2_frame_k2 {width:106px;height:18px;text-align:center;color:#666;overflow:hidden;}
		.main2_frame_k22 {width:106px;height:15px;text-align:center;color:#666;background:#F7F7F7;padding-top:5px;}
.main2_frame_page1 {width:700px;height:35px;text-align:center;margin:0px auto;border-bottom:#ddd 1px solid;margin-top:5px;margin-bottom:10px;padding-top:15px;}/*page*/
.main2_frame_page2 {width:700px;height:35px;text-align:center;margin:0px auto;border-top:#ddd 1px solid;line-height:50px;margin-top:10px;padding-top:15px;}/*page*/

img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
.timestyle {color:#f00;font-size:12px;font-weight:bold}
</style>
</head>
<body>
<div class="main1">
	<div class="main1_tselect"><a href="e_dating_list.php" class="a6F9F00">我的约会</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_add.php" class="a333">发起约会</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_price.php" class="a333">约会竞价排名</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_join.php" class="a333">我参加的约会</a></div>
</div>
<div class="main2">
  <div class="main2_frame">
<br />
<table width="670" height="41" border="0" cellpadding="0" cellspacing="0" bgcolor="#FDEEF8" style="margin:0 0 5px 0">
  <tr>
    <td align="left" style="font-size:14px"><img src="images/groupren.gif" hspace="5" />参加 <a href="e_dating_list.php"><b><?php echo $datingTitle; ?></b></a> 约会报名人员管理：</td>
  </tr>
</table>
<?php
$rt=$db->query("SELECT a.id,a.nickname,a.grade,a.sex,a.photo_s,b.id as bbsid,b.content,b.addtime,b.flag as bbsflag,c.flag FROM ".__TBL_MAIN__." a,".__TBL_DATING_USER__." b,".__TBL_DATING__." c WHERE a.id=b.userid AND c.id=".$fid." AND b.fid=".$fid." ORDER BY b.id DESC");
$total = $db->num_rows($rt);
if ($total <= 0) {
echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#f3f3f3><font color=666666>..暂无信息..</font></td></tr></table>";
} else {
$pagesize=15;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="670" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<?php
for($i=0;$i<$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$userid    = $rows[0];
$nickname  = $rows[1];
$grade     = $rows[2];
$sex       = $rows[3];
$photo_s   = $rows[4];
$bbsid     = $rows[5];
$content   = htmlout(stripslashes($rows[6]));
$addtime   = $rows[7];
$bbsflag   = $rows[8];
$flag      = $rows[9];
if ($i % 2 == 0){
	$bg="bgcolor=#ffffff";
	$overbg="#ffffcc";
	$outbg="#ffffff";
} else {
	$bg="bgcolor=#f3f3f3";
	$overbg="#ffffcc";
	$outbg="#f3f3f3";
}
?>
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
  <td width="43" height="28" align="center"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid; ?>" target="_blank">
<?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
}
?>
  </a></td>
  <td width="123" align="left"><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $nickname.'</font>';?></a></td>
<td width="347" align="left" style="color:#666"><?php echo $content; ?></td>
<td width="141" align="center" style="font-size:14px;font-weight:bold;color:#FF0000">
<?php if ($flag == 1) {?>
<a href="e_dating_list_user.php?fid=<?php echo $fid; ?>&bbsid=<?php echo $bbsid; ?>&submitok=modupdate&p=<?php echo $p; ?>" onClick="return confirm('★确认邀请此人？\n\n① 操作后本约会将自动变为“结束状态”，截止报名，不能修改！\n\n② “<?php echo $nickname; ?>”将看到你在约会中的联系方法\n\n③ 请速与“<?php echo $nickname; ?>”联系进行线下约会\n\n交友网祝你们约会成功，交友愉快！')"><img src="images/yqcr.gif" width="75" height="20" border="0" title="邀请此人" /></a>
<?php } else {
if ($bbsflag == 1){
echo "<img src='images/nb.gif' hspace='4'/>最佳人选";
}
}?></td>
</tr>
<?php }?>
</table>
<table width="670" height="20" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:10px;">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php }//lise end ?>
<br />
<br />
<br />
<br />
<br />
<br />
  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>