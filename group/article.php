<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
if ( !ereg("^[0-9]{1,8}$",$bkid) && !empty($bkid))callmsg("Forbidden!","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mbkind,title,ifsh,ifin,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mbkind = $row['mbkind'];
$maintitle = stripslashes($row['title']);
$ifsh = $row['ifsh'];
$ifin = $row['ifin'];
$userid = $row['userid'];
$userid1 = $row['userid1'];
$userid2 = $row['userid2'];
$userid3 = $row['userid3'];
if ($userid == $cook_userid || $userid1 == $cook_userid || $userid2 == $cook_userid || $userid3 == $cook_userid || $cook_grade == 10) {
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
<title><?php echo $bktitle; ?> <?php echo $maintitle; ?></title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="980" height="62" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#cccccc 1px solid;">
<tr>
<td valign="bottom" style="padding-top:2px;color:#cccccc;" class=tdbg2><img src="images/home.gif" hspace="5" vspace="2" align="absmiddle"><a href="<?php echo $Global['www_2domain']; ?>"><b><?php echo $Global['m_sitename']; ?>首页</b></a></td>
<td align="right" valign="bottom" class=tdbg2 style="padding-top:2px;color:#cccccc;padding-right:4px;"><a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a> | <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> | <a href="<?php echo $Global['www_2domain']; ?>/my" ><b>管理中心</b></a></td>
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
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="titleselected">圈内话题</a></td>
<td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="title">活动聚会</a></td>
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
<?php if (!empty($bktitle)){
echo " >> "."<a href=article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle." class=title>".$bktitle."</a>";
}
?></b></font></td>
<td width="7%" align="right" valign="bottom"><a href="article<?php echo $mainid; ?>.html"></a></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<?php
if (!empty($keyword)) {
$tmpkeyword = trimm($keyword);
$tmpkeyword = " title LIKE '%".$tmpkeyword."%'";
} else {
$tmpkeyword = " 1=1 ";
}
if (!empty($bkid)){
	$tmpbkid = "bkid='$bkid'";
}else{
	$tmpbkid = "1=1";
}
switch ($listtype){ 
	case 1:
		$tmplisttype = " AND ifjh=1 ORDER BY iftop DESC,endtime DESC";
	break;
	case 2:
		$tmplisttype = " AND iftop=1 ORDER BY endtime DESC";
	break;
	case 3:
		$tmplisttype = " ORDER BY click DESC";
	break;
	case 4:
		$tmplisttype = " ORDER BY addtime DESC";
	break;
	case 5:
		$tmplisttype = " ORDER BY bbsnum DESC";
	break;
	default:
		$tmplisttype = " ORDER BY iftop DESC,endtime DESC";
	break;
}
$rt=$db->query("SELECT id,bkid,bktitle,title,bbsnum,click,iftop,ifjh,flag,endtime,enduserid,endnicknamesexgradephoto_s,addtime,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_WZ__." WHERE mainid=".$mainid." AND ".$tmpbkid." AND ".$tmpkeyword.$tmplisttype);
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 20;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;">

<table width="950" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="106"><a href="post.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>"><img src="images/<?php echo $mbkind; ?>/fb.gif" alt="发表新话题" border="0" ></a></td>
<td width="510" align="center" valign="bottom"><table width="400" height="14" border="0" cellpadding="3" cellspacing="0">
  <form action="article.php"  method="get">
    <tr>
      <td width="100" align="right"><font color="#666666">按文章标题查询：</font></td>
      <td width="242"><input name="keyword" type="text" size="40" class=input>
          <input name="mainid" type="hidden" value=<?php echo $mainid; ?>>
        <input name="bkid" type="hidden" value=<?php echo $bkid; ?>>
        <input name="bktitle" type="hidden" value=<?php echo $bktitle; ?>></td>
      <td width="26"><input type="image" src=images/so.gif></td>
    </tr>
  </form>
</table></td>
<td width="334" align="right" valign="bottom" style="font-family:宋体;color:#999999;padding-bottom:4px;">[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=1" class=tiaose title=精华贴><b><?php if ($listtype == 1) {echo "<font class=fontselected>精华</font>";} else {echo "精华";} ?></b></a> ]　[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=2" class=tiaose title=固顶贴><b><?php if ($listtype == 2) {echo "<font class=fontselected>固顶</font>";} else {echo "固顶";} ?></b></a> ]　[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=3" class=tiaose title=按人气排序><b><?php if ($listtype == 3) {echo "<font class=fontselected>人气</font>";} else {echo "人气";} ?></b></a> ]　[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=4" class=tiaose title=按主题贴发表时间排序><b><?php if ($listtype == 4) {echo "<font class=fontselected>新贴</font>";} else {echo "新贴";} ?></b></a> ]　[ <a href="article.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>&listtype=5" class=tiaose title=按回复数目排序><b><?php if ($listtype == 5) {echo "<font class=fontselected>回复</font>";} else {echo "回复";} ?></b></a> ]</td>
</tr>
</table>
<?php
if (!empty($bkid)) {
	$rtbk = $db->query("SELECT content,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_BK__." WHERE id=".$bkid);
	if($db->num_rows($rtbk)){
		$rowbk = $db->fetch_array($rtbk);
		$bkcontent = htmlout(stripslashes($rowbk[0]));
		$bkuserid  = $rowbk[1];
		$bkinfo    = $rowbk[2];
		if (!empty($bkinfo)){
			$tmpnickname = explode("|",$bkinfo);
			$nickname = $tmpnickname[0];
			$sex = $tmpnickname[1];
			$grade = $tmpnickname[2];
			$photo_s = $tmpnickname[3];
		}
	} else {
		callmsg("Forbidden","-1");
	}
?>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="1" style="margin:0 0 9px 0" class=tdbg4>
  <tr>
    <td class=tdbg><table width="950" height="40" border="0" align="center" cellpadding="0" cellspacing="0" class=tdbg >
<tr>
<td width="50" height="60" align="center">
<?php if (!empty($bkuserid)) {?>
<?php 
echo "<a href=".$Global['home_2domain']."/".$bkuserid." target=_blank>";
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
//echo "<img src=http://up.yzlove.com/photo/".$photo_s." width=41 height=50 border=0>";
}
echo "</a>";
?>
<?php } else {?>
<table width="41" height="50" border="0" cellpadding="0" cellspacing="1" class=tdbg4>
  <tr>
    <td align="center" class=tdbg><font color="#999999">暂无<br>
      版主</font></td>
    </tr>
</table>
<?php }?></td>
<td width="198" style="line-height:200%;color:#666666;padding-left:5px">当前版块：<span style="font-size:14px" class=tiaose><?php echo $bktitle; ?></span>
  <table width="35" height="6" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td></td>
    </tr>
  </table>
  版　　组：<?php
if (!empty($bkuserid)) {
echo "<a href=".$Global['home_2domain']."/".$bkuserid." target=_blank>";
echo geticon($sex.$grade).$nickname;}
echo "</a>";
?></td>
<td width="22" align="center" bgcolor="#FFFFFF" class=tdbg2><span class=tiaose>版块说明</font></td>
<td width="684" style="line-height:200%;padding:10px;color:#666666"><?php echo $bkcontent; ?></td>
</tr>
</table></td>
  </tr>
</table>

<?php }?>
<table width="950" height="26" border="0" align="center" cellpadding="0" cellspacing="0" class=tdbg3>
<tr>
<td width="398" align="center" valign="bottom" class=tiaose><b>主　题</b></td>
<td width="111" align="center" valign="bottom"><b><a href="article<?php echo $mainid; ?>.html" title="点击查看全部贴子"><font class=tiaose><u>所属版块</u></font></a></b></td>
<td width="122" align="center" valign="bottom" class=tiaose><b>作 者</b></td>
<td width="100" align="center" valign="bottom" class=tiaose><b>回复 / 人气</b></td>
<td width="219" align="center" valign="bottom" class=tiaose><b>最后更新</b></td>
</tr>
</table></td>
</tr>
</table>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#ffffff";
$overbg="#FBF9F9";
$outbg="#ffffff";
} else {
$bg="bgcolor=#ffffff";
$overbg="#FBF9F9";
$outbg="#ffffff";
}
$wztitle = htmlout(stripslashes($rows['title']));
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="950" height="40" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#dddddd 1px solid;">
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'"><td width="398" style="font-size:10.3pt;padding-left:5px;">
<?php if ($rows['iftop'] == 1)echo "<img src=images/ding.gif alt=固顶贴>";?> 
<?php
$userid_bk="NO";
if ($ifin == 0) {
	$rtbk = $db->query("SELECT userid FROM ".__TBL_GROUP_BK__." WHERE id=".$rows['bkid']);
	if($db->num_rows($rtbk)){
		$rowbk = $db->fetch_array($rtbk);
		$userid_bk = $rowbk[0];
		if ( !ereg("^[0-9]{1,8}$",$userid_bk) || empty($userid_bk))$userid_bk="NO";
	} else {
		callmsg("版块验证失败!","-1");
	}
	if ($authority_main == "OK" || $userid_bk == $cook_userid) {
		echo "<a href=read".$rows['id'].".html class=333333>";
		echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".str_replace($keyword,"<font color=red><b>".$keyword."</b></font>",$wztitle);
		echo "</a>";
	} else {
		$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid='$cook_userid' AND mainid=".$mainid." AND flag=1");
		$row2 = $db->fetch_array($rt2);
		if ($row2[0] == 1){
			echo "<a href=read".$rows['id'].".html class=333333>";
			echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".str_replace($keyword,"<font color=red><b>".$keyword."</b></font>",$wztitle);
			echo "</a>";
		} else {
			echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0><font color=#999999>".str_replace($keyword,"<font color=red><b>".$keyword."</b></font>",$wztitle)."</font>";
		}
	}
} elseif ($ifin == 1) {
	echo "<a href=read".$rows['id'].".html class=333333>";
	echo "<img src=images/dian.gif hspace=6 align=absmiddle border=0>".str_replace($keyword,"<font color=red><b>".$keyword."</b></font>",$wztitle);
	echo "</a>";
}
if ($ifin == 0)echo " <a href=./?submitok=loginupdate&mainid=".$mainid."><img src=images/m.gif border=0 title=只有本圈子内成员才可以查看！点击加入本圈子。></a>";
$d1 = strtotime($rows['addtime']);
$d2 = strtotime(date("Y-m-d H:i:s"));
if (($d2-$d1) < 86400 )echo " <img src=images/new.gif border=0 title=当天发表>";
if ( $rows['flag'] == 0 && ($authority_main == "OK" || $userid_bk == $cook_userid) )echo " <a href=readoperate.php?submitok=flag1&fid=".$rows['id']." title=点击审核><font color=red><u>未审核</u></font></a>";
?> <?php if ($rows['ifjh'] == 1)echo "<img src=images/jh.gif alt=精华贴>";?></td>
  <td width="111" align="center"><?php echo "<a href=article.php?mainid=".$mainid."&bkid=".$rows[1]."&bktitle=".$rows[2]." class=tiaose>".$rows[2]."</a>";?></td>
  <td width="123" align="center"><?php
$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
$tmpgrade = $tmpnickname[1].$tmpnickname[2];
geticon($tmpgrade);
echo "<a href=".$Global['home_2domain']."/".$rows['userid']." target=_blank>".$tmpnickname[0]."</a>";
?></td>
<td width="99" align="center"><font color="#FF0000"><b><?php echo $rows['bbsnum'];?></b></font> <font color="#666666">/</font> <font color="#FF0000"> <?php echo $rows['click'];?></font></td>
<td width="219">
<?php
echo " <font color=#666666>".date_format2($rows['endtime'],'%Y-%m-%d %H:%M')."</font> <font color=#cccccc>|</font> ";
$tmpnicknameend = explode("|",$rows['endnicknamesexgradephoto_s']);
$tmpgradeend = $tmpnicknameend[1].$tmpnicknameend[2];
geticon($tmpgradeend);
echo "<a href=".$Global['home_2domain']."/".$rows['enduserid']." target=_blank>".$tmpnicknameend[0]."</a>";
?></td>
</tr>
</table></td>
</tr>
</table>
<?php }?>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;">
<style type="text/css"> 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style><table width="96%" height="49" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="right" style="color:#666666;"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table></td>
</tr>
</table>
<?php } else {?>
<table width="980" height="300" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td align="center" style="padding-top:2px;padding-bottom:2px;font-size:14px"><font color="#999999">..暂无信息..</font><br>
  <br>
  <img src="images/add.gif" width="20" height="20" align="absmiddle"><a href="post.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>"><b><u>发表新话题</u></b></a></td>
</tr>
</table>
<?php }?>
<table width="980" height="5" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg2.gif">
<tr>
<td valign="top"></td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td>
<td align="center"><font color="#999999">&copy;版权所有<?php echo date("Y"); ?>　<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php ob_end_flush();?>