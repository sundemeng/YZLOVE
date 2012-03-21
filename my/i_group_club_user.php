<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,10}$",$clubid) || empty($clubid) )callmsg("Forbidden!","-1");
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,userid FROM ".__TBL_GROUP_MAIN__." WHERE userid=".$cook_userid." AND id=".$mainid);
$total = $db->num_rows($rt);
if($total > 0){
	$row = $db->fetch_array($rt);
	$maintitle = $row[0];
	$memberid  = $row[1];
	if ($memberid !== $cook_userid)callmsg("用户验证错误，操作失败！","-1");
} else {
	callmsg("Forbidden!","-1");
}
if ($submitok=="flag1") {
	if ( !ereg("^[0-9]{1,9}$",$classid) || empty($classid))callmsg("Forbidden!","-1");
	$db->query("UPDATE ".__TBL_GROUP_CLUB_USER__." SET flag=1 WHERE  id=".$classid);
	header("Location: i_group_club_user.php?mainid=".$mainid."&clubid=".$clubid."&clubtitle=".$clubtitle."&p=".$p);
} elseif ($submitok=="flag0") {
	if ( !ereg("^[0-9]{1,9}$",$classid) || empty($classid))callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT clubid FROM ".__TBL_GROUP_CLUB_USER__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$clubid = $row[0];
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET bmnum=bmnum-1 WHERE id='$clubid'");
	$db->query("DELETE FROM ".__TBL_GROUP_CLUB_USER__." WHERE id=".$classid);
	header("Location: i_group_club_user.php?mainid=".$mainid."&clubid=".$clubid."&clubtitle=".$clubtitle."&p=".$p);
} elseif ($submitok=="flagupdate") {
	$addtime = date("Y-m-d H:i:s");
	$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET flag=3,jzbmtime='$addtime' WHERE id=".$clubid);
	header("Location: i_group_club_user.php?mainid=".$mainid."&clubid=".$clubid."&clubtitle=".$clubtitle);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:78px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.timestyle {color:#f00;font-size:18pt;font-weight:bold}
.timestyletext {color:#6F9F00;font-size:14px}
</style>
</head>
<body>
<ul>
<li class="liselect"><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="670" height="40" border="0" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <td bgcolor="#FDEEF8" style="color:#999;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" align="absmiddle" /><b><a href="i_group.php"><?php echo $maintitle; ?></a></b> >> <a href="i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=list" class="u666666"><b>活动管理</b></a> >> <font color="#333333"><?php echo $clubtitle; ?>的报名管理</font></td>
      <td width="105" bgcolor="#FDEEF8" style="color:#999;font-size:10.3pt;">&nbsp;</td>
    </tr>
  </table>
  <br>
<?php 
$rt = $db->query("SELECT flag,jzbmtime FROM ".__TBL_GROUP_CLUB__." WHERE id=".$clubid);
if($db->num_rows($rt))$row = $db->fetch_array($rt);
$mainflag = $row['flag'];
?>
<table width="358" height="37" border="0" cellpadding="0" cellspacing="0" bgcolor="#f3f3f3" style="border:#ddd 1px solid;">
<form method="post" action="i_group_club_user.php">
<tr>
<td height="70" align="center">
<?php
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = strtotime($row['jzbmtime']);
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($row['flag'] >2)$totals = -1;
echo '<br><br>你设定的截止报名时间为：'.date_format2($row['jzbmtime'],'%Y-%m-%d %H:%M').'　'.getweek(date_format2($row['jzbmtime'],'%Y-%m-%d')).'<br><br>';
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "报名还有 <span class=timestyle>$day</span> 天 ";
	} else {
		$outtime = "报名还有 ";
	}
	$outtime .= "<span class=timestyle>$hour</span> 小时 <span class=timestyle>$minute</span> 分";
} else {
	$outtime = "　<font color=#999999><b>已经结束</b></font>";
	if ($row['flag'] == 1)$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET flag=3 WHERE id=".$clubid);
	$mainflag = 3;
}
echo '<span class=timestyletext>'.$outtime.'</span>';
if ($mainflag == 1){
echo '<br><br><a href=i_group_club.php?mainid='.$mainid.'&submitok=mod&fid='.$clubid.' class=u666666><img src=images/modx.gif valign=absmiddle hspace=5 border=0><b>修改截止报名时间</b></a><br><br>';
} else {
echo '<br><br><font color=#999999><img src=images/modx.gif valign=absmiddle hspace=5 border=0><b>修改截止报名时间</b></font><br><br>';
}
?>
</td>
</tr>
<tr>
  <td height="70" align="center">
<input name="submitok" type="hidden" value="flagupdate">
<input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
<input name="clubid" type="hidden" value="<?php echo $clubid;?>">
<input name="clubtitle" type="hidden" value="<?php echo $clubtitle;?>">	<input type="submit" value=" 我要结束此活动 " class="button" onClick="return confirm('★您真的要结束此活动吗，结束后，你就无法修改此活动！\n如果是误操作请与管理员联系开通。')" style="width:130px" <?php if ($mainflag == 3)echo "disabled='disabled'";?>>
<br>
    <br></td>
  </tr>
</form>
</table>
      <br>
      <table width="670" height="23" border="0" cellpadding="0" cellspacing="0" bgcolor="FDEEF8">
        <tr>
          <td width="126" height="30"><b>　报名人员管理：</b></td>
          <td width="414" align="right" valign="top"><table width="325" border="0" cellpadding="0" cellspacing="3">
            <tr>
              <td width="15" bgcolor="#FFFF00" style="border:#ffcc00 1px solid;">&nbsp;</td>
              <td valign="bottom"><font color="#999999">边框黄色表示未审或未缴费</font></td>
              <td width="15" valign="bottom" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">&nbsp;</td>
              <td valign="bottom"><font color="#999999">边框白色表示正式通过</font></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <?php
$rttop1 = $db->query("SELECT id,flag,userid,nicknamesexgradephoto_s,addtime,tel FROM ".__TBL_GROUP_CLUB_USER__." WHERE clubid=".$clubid." ORDER BY id DESC");
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
	require_once YZLOVE.'sub/class.php';
	$pagesize = 25;
	if ($p<1)$p=1;
	$mypage=new uobarpage($totaltop1,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rttop1,($p-1)*$pagesize);
?>
    <table width="670" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F7FBFD" style="border:#efefef 1px solid;">
      <tr>
        <?php
for($j=1;$j<=$pagesize;$j++) {
	$rowstop1 = $db->fetch_array($rttop1);
	if(!$rowstop1) break;
?>
        <td align="center" valign="top" style="padding-top:10px"><table width="45" height="54" border="0" cellpadding="2" cellspacing="0" bgcolor="dddddd">
            <tr>
              <td height="50" align="center" <?php if ($rowstop1[1] == 0){echo "bgcolor=#ffff00";}else{echo "bgcolor=#ffffff";} ?> style="border:#<?php if ($rowstop1[1] == 0){echo "ffcc00";}else{echo "dddddd";} ?> 1px solid;"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[2]; ?>" target=_blank>
<?php 
if (!empty($rowstop1[2])){
$tmpusr = explode("|",$rowstop1[3]);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
}
if (empty($photo_susr)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sexusr.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_susr." width=41 height=50 border=0>";
}
?>
</a></td>
            </tr>
          </table>
            <table width="50" height="5" border="0" align="center" cellpadding="0" cellspacing="0" >
              <tr>
                <td align="center" valign="top"></td>
              </tr>
            </table>
<?php if ($mainflag == 1) {?>
          <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rowstop1[2];?>" target=_blank><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a>
          <table width="150" height="23" border="0" align="center" cellpadding="0" cellspacing="0" >
            <tr>
              <td align="left" valign="bottom" bgcolor="#efefef" style="line-height:200%"><?php echo $rowstop1[4]; ?><br />
              电话：<?php echo badstr(htmlout(stripslashes($rowstop1[5]))); ?></td>
            <tr>
              <td align="center" bgcolor="#efefef"><?php if ($rowstop1[1] == 0){ ?>
<a href=i_group_club_user.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid; ?>&classid=<?php echo $rowstop1[0] ; ?>&submitok=flag1&clubtitle=<?php echo $clubtitle; ?>&p=<?php echo $p; ?>>
<u><font color=red>开始审核</font></u></a>　
<a href=i_group_club_user.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid; ?>&classid=<?php echo $rowstop1[0] ; ?>&submitok=flag0&clubtitle=<?php echo $clubtitle; ?>&p=<?php echo $p; ?> onClick="return confirm('★确认踢除？')">
<u><font color=green>踢除</font></u></a>　
<?php }else{ ?>
<a href=i_group_club_user.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid; ?>&classid=<?php echo $rowstop1[0] ; ?>&submitok=flag0&clubtitle=<?php echo $clubtitle; ?>&p=<?php echo $p; ?> onClick="return confirm('★确认踢除？')">
<u><font color=green>踢除</font></u></a>
<?php } ?></td>
            </table>
<?php }?>
          <br></td>
        <?php if ($j % 4 == 0) {?>
      </tr>
      <tr>
        <?php	} ?>
        <?php } ?>
      </tr>
    </table>
    <table width="670" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
      </tr>
    </table>
    <?php } else {?>
    <br>
    <br>
    <font color="#999999">...暂时还没有人报名...</font>
    <?php }?>
    
  <br />
  <br>
<br />
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';
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