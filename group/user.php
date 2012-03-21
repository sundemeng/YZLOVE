<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mbkind,title,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mbkind = $row['mbkind'];
$maintitle = stripslashes($row['title']);
$userid_main = $row['userid'];
$userid1_main = $row['userid1'];
$userid2_main = $row['userid2'];
$userid3_main = $row['userid3'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该圈子不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><title><?php echo $maintitle; ?> 圈子成员</title><link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head><body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;"><tr><td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>首页</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> | <a href="<?php echo $Global['www_2domain']; ?>/my" ><b>管理中心</b></a></td></tr><tr><td height="62" colspan="2" style="font-size:18pt;color:#999999;">「<font color="#000000" face="黑体,宋体"><?php echo $maintitle; ?></font>」<font color="#666666" style="font-size:9pt;"><a href=<?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?> target=_blank class=666666><?php echo $Global['group_2domain'];?>/<?php echo $mainid; ?></a></font></td>
</tr>
</table>
<table width="980" height="38" border="0" align="center" cellpadding="0" cellspacing="0" background="images/<?php echo $mbkind; ?>/1.gif" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table height="36" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['www_2domain'];?>" class="title">交友首页</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $mainid; ?>" class=title>圈子首页</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">圈内话题</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="title">活动聚会</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">圈子相册</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="titleselected">圈子成员</a></td>
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
<td width="71%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php
echo " >> "."</b>圈子成员";
?></font></td>
<td width="29%" align="right" valign="bottom"></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<table width="980" height="8" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td>
<?php $rt=$db->query("SELECT * FROM ".__TBL_GROUP_USER__." WHERE mainid=".$mainid." ORDER BY id DESC");
$total = $db->num_rows($rt);?>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<tr>
<td height="30" align="center" background="images/<?php echo $mbkind; ?>/tdbg.gif" style="font-size:10.3pt;padding-left:5px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;"><font class=tiaose>:: <b>本圈子所有成员，共 <font color=#ff0000><?php echo $total; ?></font> 个</b> :: </font></td>
</tr>
<tr>
<td height="350" valign="top" bgcolor="#FFFFFF" style="padding:20px;"><br>
<?php
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 24;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
for($j=1;$j<=$pagesize;$j++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
<td align="center" valign="top" style="padding-top:10px;"><table border="0" cellpadding="0" cellspacing="0" style="border:#dddddd 0px solid;">
<tr>
<td width="114" height="139" align="center" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid']; ?>" target=_blank>
<?php 
$tmpusr = explode("|",$rows['nicknamesexgradephoto_s']);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
if (empty($photo_susr)){
echo "<img src=".$Global['www_2domain']."/images/nopic".$sexusr.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_susr." border=0>";
}
?>
</a></td>
</tr>
<tr>
<td height="22" align="center" class=tiaose><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target=_blank><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a></td>
</tr>
<tr>
<td height="4" align="center" ><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M'); ?></font></td>
</tr>
<tr>
<td height="5" align="center" ><?php getauthority($rows['userid']); ?></td>
</tr>

</table></td>
<?php if ($j % 6 == 0) {?>
</tr>
<tr>
<?php	} ?>
<?php } ?>
</tr>
</table>
<table width="96%" height="93" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="64" align="center" style="color:#666666;"><style type="text/css"> 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php } else {?>
<br>
<br>  <font color="#999999">...暂无会员...</font><br>
<br>
<br>
<br>
<?php }?></td>
</tr>
</table></td>
</tr>
</table>
<table width="980" height="20" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:8px;"><br></td>
</tr>
</table>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td><td align="center"><font color="#999999">版权所有 &copy; 2002-2009 <?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td><td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php
function getauthority($str) {
global $db,$mainid,$userid_main,$userid1_main,$userid2_main,$userid3_main;
$rtauthority = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_BK__." WHERE mainid='$mainid' AND userid=".$str);
$rowauthority = $db->fetch_array($rtauthority);
$tmpcntauthority = $rowauthority[0];
if ($str == $userid_main) {
echo "<font color=red><b>会长(创始人)</b></font>";
} elseif ($str == $userid1_main || $str == $userid2_main || $str == $userid3_main) {
echo "<font color=red>副会长</font>";
} elseif ($tmpcntauthority >0 ) {
echo "<font color=ff6600>版 主</font>";
}
}
ob_end_flush();?>