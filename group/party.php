<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mbkind,title,userid,nicknamesexgradephoto_s,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mbkind = $row['mbkind'];
$maintitle = stripslashes($row['title']);
$userid = $row['userid'];
$nicknamesexgradephoto_s = $row['nicknamesexgradephoto_s'];
if (!empty($nicknamesexgradephoto_s)){
$tmpnickname = explode("|",$nicknamesexgradephoto_s);
$nickname = $tmpnickname[0];
$sex = $tmpnickname[1];
$grade = $tmpnickname[2];
}
$userid1 = $row['userid1'];
$userid2 = $row['userid2'];
$userid3 = $row['userid3'];
if ($userid == $cook_userid || $userid1 == $cook_userid || $userid2 == $cook_userid || $userid3 == $cook_userid) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该圈子不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>圈子活动聚会 <?php echo $maintitle; ?></title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;">
<tr>
<td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>首页</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> | <a href="<?php echo $Global['my_2domain']; ?>" ><b>管理中心</b></a></td>
</tr>
<tr>
<td height="62" colspan="2" style="font-size:20px;color:#999999;">「<font color="#000000" face="黑体,宋体" style="letter-spacing:1px;"><?php echo $maintitle; ?></font>」<font color="#666666" style="font-size:9pt;"><a href=<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?> target=_blank class=666666><?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?></a></font></td>
</tr>
</table>
<table width="980" height="38" border="0" align="center" cellpadding="0" cellspacing="0" background="images/<?php echo $mbkind; ?>/1.gif" bgcolor="#FFFFFF">
<tr>
<td valign="top"><table height="36" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['www_2domain'];?>" class="title">交友首页</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $mainid; ?>" class=title>圈子首页</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">圈内话题</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="titleselected">活动聚会</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">圈子相册</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="title">圈子成员</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group_invite.php?mainid=".$mainid;?>" class="title">邀请他人</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="post<?php echo $mainid; ?>.html" class="title">发表新话题</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group.php";?>" class="title">圈子管理</a></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php
echo " >> "."<a href=party".$mainid.".html class=title>圈子活动聚会</a>";
?></b></font></td>
<td width="7%" align="right" valign="bottom"><a href="article<?php echo $mainid; ?>.html"></a></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;">
<?php if ($authority_main == "OK" ){ ?>
<table width="950" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="106">[ <a href="<?php echo $Global['my_2domain'];?>/?i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=add" class=tiaose><b>发起新活动</b></a> ]</td>
<td width="437" align="center" valign="bottom">&nbsp;</td>
<td width="407" align="right" valign="bottom" style="font-family:宋体;color:#999999;padding-bottom:4px;">[ <a href="<?php echo $Global['my_2domain'];?>/?i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=list" class=tiaose><b>活动管理</b></a> ]</td>
</tr>
</table>
<?php }?></td>
</tr>
</table>
<?php
$rt=$db->query("SELECT id,title,kind,hdtime,num_n,num_r,flag,jzbmtime,bmnum FROM ".__TBL_GROUP_CLUB__." WHERE mainid=".$mainid." AND flag>0 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 10;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td valign="top" style="padding-top:2px;padding-bottom:2px;"><table width="950" height="26" border="0" align="center" cellpadding="0" cellspacing="0" class=tdbg3 style="font-weight:bold">
          <tr>
            <td width="353" align="center" valign="bottom" class=tiaose>活 动 名 称</td>
            <td width="68" align="center" valign="bottom" class=tiaose>活动类型</td>
            <td width="94" align="center" valign="bottom" class=tiaose>活动时间</td>
            <td width="93" align="center" valign="bottom" class=tiaose>发起人</td>
            <td width="61" align="center" valign="bottom" class=tiaose>活动状态</td>
            <td width="45" align="center" valign="bottom" class=tiaose>已报名</td>
            <td width="55" align="center" valign="bottom" class=tiaose>邀请人数</td>
            <td width="181" align="center" valign="bottom" class=tiaose>开始报名</td>
          </tr>
      </table></td>
  </tr>
</table>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#FBF9F9";
$overbg="#ffffcc";
$outbg="#FBF9F9";
} else {
$bg="bgcolor=#ffffff";
$overbg="#ffffcc";
$outbg="#ffffff";
}
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="950" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#dddddd 1px solid">
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'"><td width="354" style="font-size:10.3pt;padding-left:5px;font-weight:bold;">
<?php
	echo "<a href=partyshow".$rows['id'].".html class=333333>";
	echo "<img src=images/party.gif hspace=6 border=0>".htmlout(stripslashes($rows['title']));
	echo "</a>";
if ($rows['flag'] == 1)echo "<img src=images/new2.gif hspace=6 border=0>";
?></td>
  <td width="67" align="center" style="color:#666666"><?php echo $rows['kind'];?></td>
  <td width="94" align="center" style="padding-top:5px;padding-bottom:5px;color:#666666"><?php echo $rows['hdtime'];?></td>
  <td width="94" align="center"><?php
geticon($sex.$grade);
echo "<a href=".$Global['home_2domain']."/".$userid." target=_blank>".$nickname."</a>";
?></td>
<td width="61" align="center"><?php 
switch ($rows['flag']){ 
	case 0:
		echo "<font color=red>还未审核</font>";
	break;
	case 1:
		echo "<font color=0066CC>报名中</font>";
	break;
	case 2:
		echo "<font color=ff6600>进行中</font>";
	break;
	case 3:
		echo "<font color=349933>圆满成功</font>";
	break;
}
?></td>
<td width="45" align="center"><a href=<?php echo $Global['group_2domain'];?>/partyuser.php?fid=<?php echo $rows['id'];?> target=_blank><u><font color="#ff6600"><?php echo $rows['bmnum'];?></font></u></a>　人</td>
<td width="50" align="center"><?php if (($rows['num_n']+$rows['num_r']) <= 0){echo '<font color=red>不限</font>';}else{echo '<font color=red>'.($rows['num_n']+$rows['num_r'])."</font> 人";}?></td>
<td width="185" align="center" style="color:#999999;padding-top:5px;padding-bottom:5px">
<style type="text/css"> 
.timestyle {color:#f00;font-size:12px;font-weight:bold}
</style>
<?php 
$d1  = strtotime(date("Y-m-d H:i:s"));
$d2  = strtotime($rows['jzbmtime']);
$totals  = ($d2-$d1);
$day     = intval( $totals/86400 );
$hour    = intval(($totals % 86400)/3600);
$hourmod = ($totals % 86400)/3600 - $hour;
$minute  = intval($hourmod*60);
if ($rows['flag'] >2)$totals = -1;
//echo '<br><br>你设定的截止报名时间为：'.date_format2($row['jzbmtime'],'%Y-%m-%d %H:%M').'　'.getweek(date_format2($row['jzbmtime'],'%Y-%m-%d')).'<br><br>';
if (($totals) > 0) {
	if ($day > 0){
		$outtime = "报名还有 <span class=timestyle>$day</span> 天 ";
	} else {
		$outtime = "报名还有 ";
	}
	$outtime .= "<span class=timestyle>$hour</span> 小时 <span class=timestyle>$minute</span> 分";
	$outtime .= "<br><a href=partyshow".$rows['id'].".html><img src='images/bm2.gif' vspace=5 border=0></a>";
} else {
	$outtime = "<img src='images/jzbm.gif' border=0 align=absmiddle><font color=#999999><b>报名已经结束</b></font>";
	if ($rows['flag'] == 1)$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET flag=3 WHERE id=".$rows['id']);
	//$mainflag = 3;
}
echo '<span class=timestyletext>'.$outtime.'</span>';
?>
</td>
</tr>
</table></td>
</tr>
</table>
<?php
}
} else {
?>
<table width="980" height="248" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td align="center" style="padding-top:2px;padding-bottom:2px;"><br>
    <br>
      <table width="325" height="135" border="0" cellpadding="0" cellspacing="1" bgcolor="dddddd">
  <tr>
    <td align="center" bgcolor="efefef"><font color="#999999">..本圈子暂无活动..<br>
        <br>


<?php 
if ($authority_main == 'OK'){
?>
如果您是会长可以点击下面发布活动。<br>
<br>
    </font><img src="images/party.gif" width="17" height="12" hspace="3" align="absmiddle"><a href="<?php echo $Global['my_2domain']; ?>/?i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=add" style="font-size:10.3pt;font-weight:bold;"><u>发布活动</u></a>
<?php }?>



	</td>
  </tr>
</table>  
    <br>
    <br></td>
</tr>
</table>
<?php }?>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;"><style type="text/css"> 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style><table width="96%" height="49" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="right" style="color:#666666;"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td>
<td align="center"><font color="#999999">&copy;版权所有<?php echo date("Y"); ?>　<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php ob_end_flush();?>