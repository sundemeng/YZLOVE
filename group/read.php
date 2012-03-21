<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) && !empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("请求错误，该信息不存在或已被删除！","-1");
if ( !ereg("^[0-9]{1,8}$",$bkid) && !empty($bkid))callmsg("Forbidden!","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == "addupdate") {
	if (strlen($content)>20000 || strlen($content)<1)callmsg("回复内容过多或过少，请控制在1~20000字节以内","-1");
	$rt = $db->query("SELECT ifin2 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
	if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$ifin2 = $row[0];
	} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该圈子不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
	exit;
	}
//主表
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;}
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
	if($db->num_rows($rt) > 0){
		$row = $db->fetch_array($rt);
		$nicknamesexgradephoto_s = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		header("Location: ".$Global['www_2domain']."/login.php");
		exit;
	}
//成员
	if ($ifin2 == 0) {
		$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$cook_userid." AND mainid=".$mainid." AND flag=1");
		$row = $db->fetch_array($rt);
		if ($row[0] <= 0)callmsg("你不是本圈子的成员，发表失败，请先返回到圈子首页“加入到本圈子”",$Global['group_2domain']."/".$mainid);
	}
	$addtime = date("Y-m-d H:i:s");
	$addloveb = $Global['m_group_bbsadd'] ;
	$db->query("INSERT INTO ".__TBL_GROUP_WZ_BBS__." (mainid,fid,content,addtime,userid,nicknamesexgradephoto_s) VALUES ('$mainid','$fid','$content','$addtime','$cook_userid','$nicknamesexgradephoto_s')");
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET bbsnum=bbsnum+1,qloveb=qloveb+".$addloveb." WHERE id=".$mainid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET bbsnum=bbsnum+1,endtime='$addtime',enduserid='$cook_userid',endnicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE id=".$fid);
	header("Location: read.php?fid=".$fid."&p=".$redirectpage."#bbs");
}
$rt = $db->query("SELECT mainid,maintitle,bkid,bktitle,title,content,bbsnum,click,iftop,ifjh,flag,addtime,userid,nicknamesexgradephoto_s
 FROM ".__TBL_GROUP_WZ__." WHERE id=".$fid);
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mainid = $row['mainid'];
	$maintitle = $row['maintitle'];
	$bkid = $row['bkid'];
	$bktitle = $row['bktitle'];
	$title = htmlout(stripslashes($row['title']));
	$content = stripslashes($row['content']);
	$bbsnum = $row['bbsnum'];
	$click = $row['click'];
	$iftop = $row['iftop'];
	$ifjh = $row['ifjh'];
	$flag = $row['flag'];
	$addtime = $row['addtime'];
	$userid = $row['userid'];
	$nicknamesexgradephoto_s = $row['nicknamesexgradephoto_s'];
	if (!empty($nicknamesexgradephoto_s)){
	$tmpnickname = explode("|",$nicknamesexgradephoto_s);
	$nickname = $tmpnickname[0];
	$sex = $tmpnickname[1];
	$grade = $tmpnickname[2];
	$photo_s = $tmpnickname[3];
	}
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息不存在或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
$rt = $db->query("SELECT mbkind,title,ifsh,ifin,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$mbkind = $row['mbkind'];
	$maintitle = stripslashes($row['title']);
	$ifsh = $row['ifsh'];
	$ifin = $row['ifin'];
	$userid_main = $row['userid'];
	$userid1_main = $row['userid1'];
	$userid2_main = $row['userid2'];
	$userid3_main = $row['userid3'];
} else {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该圈子不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
	exit;
}
$userid_bk="NO";
if ( ereg("^[0-9]{1,8}$",$cook_userid) && !empty($cook_userid)){
	$rtbk = $db->query("SELECT userid FROM ".__TBL_GROUP_BK__." WHERE id='$bkid'");
	if($db->num_rows($rtbk)){
		$rowbk = $db->fetch_array($rtbk);
		$userid_bk = $rowbk[0];
		if ( !ereg("^[0-9]{1,8}$",$userid_bk) || empty($userid_bk))$userid_bk="NO";
	} else {
		callmsg("版块验证失败!","-1");
	}
}
if ($userid_main == $cook_userid || $userid1_main == $cook_userid || $userid2_main == $cook_userid || $userid3_main == $cook_userid || $cook_grade == 10 || $userid_bk == $cook_userid) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
if ( ($ifin == 0) && ($authority_main == "NO")) {
	$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid='$cook_userid' AND mainid=".$mainid." AND flag=1");
	$row2 = $db->fetch_array($rt2);
	if ($row2[0] != 1)callmsg("只有本圈子内成员才可以查看！请先“加入本圈子”！",$Global['group_2domain']."/".$mainid);
} 
if ($authority_main == "NO" && $flag == 0) {
	echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息不存在或者还未经过组长审核或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
	exit;
}
/*
$shuaxin_groupread = 'read'.$fid;
if ($_COOKIE["$shuaxin_groupread"] != 'OK'){
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET click=click+1 WHERE id='$fid'");
	setcookie("$shuaxin_groupread",'OK');
}
*/
$db->query("UPDATE ".__TBL_GROUP_WZ__." SET click=click+1 WHERE id=".$fid);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title; ?></title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<script language='javascript' type='text/javascript'>
<!--
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="我觉得这篇文章非常的不错，强烈建议你看一下！";
clipBoardContent+="\n";
clipBoardContent+="　文章标题：<?php echo $title; ?>";
clipBoardContent+="\n";
clipBoardContent+="　文章地址：<?php echo $Global['group_2domain']; ?>/read<?php echo $fid; ?>.html";
window.clipboardData.setData("Text",clipBoardContent);
alert("复制成功！你可以使用粘贴或(Ctrl+V)功能与其他好友一同分享！");
}
}
//-->
</script>
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
<td width="75%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php if (!empty($bktitle)){
echo " >> "."<a href=article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle." class=title>".$bktitle."</a>";
}
echo " >> </b>".$title;
?></font></td>
<td width="25%" align="right" valign="bottom" style="padding-bottom:2px;padding-right:8px;"><font class="tiaobgse"><b>>></b><a onclick=recommend() href="####"><font class=yq>复制本帖地址，发给好友分享！</font></a><b><<</b></font></td>
</tr>
</table></td>
</tr>
</table>
</td>
</tr></table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;"><table width="940" height="34" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="380" valign="bottom"><a href="post.php?mainid=<?php echo $mainid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>"><img src="images/<?php echo $mbkind; ?>/fb.gif" alt="发表新话题" border="0" ></a>　<a href="#bbs" onClick="javascript:oEditor.focus();"><img src="images/<?php echo $mbkind; ?>/hf.gif" alt="发表回复" border="0" ></a></td>
<td width="570" align="right" valign="bottom" style="padding-bottom:4px;color:#999999;font-family:宋体;"><?php if ($authority_main == "OK" && $flag == 0){ ?>[ <a href="readoperate.php?fid=<?php echo $fid;?>&submitok=flag1" class=tiaose onClick="return confirm('确认审核？')"><b>审核</b></a> ]　<?php }?><?php if ($authority_main == "OK"){ ?>[ <a href="readoperate.php?fid=<?php echo $fid;?>&submitok=delupdate" class=tiaose onClick="return confirm('×××××\n\n确认删除？\n\n操作后相关回复也将永久删除，无法恢复！')"><b>删除</b></a> ]　<?php }?><?php if ( ($userid == $cook_userid) || $authority_main == "OK" ){ ?>[ <a href="post.php?&submitok=mod&mainid=<?php echo $mainid; ?>&fid=<?php echo $fid; ?>&bkid=<?php echo $bkid;?>&bktitle=<?php echo $bktitle;?>" class=tiaose><b>修改</b></a> ]　<?php }?><?php if ($authority_main == "OK"){ ?>[ <?php if ($iftop == 0) {?><a href="readoperate.php?fid=<?php echo $fid;?>&submitok=iftop1" class=tiaose  onClick="return confirm('确认固顶？')"><b>固顶</b></a><?php } else {?><a href="readoperate.php?fid=<?php echo $fid;?>&submitok=iftop0" class=tiaose onClick="return confirm('确认取消固顶？')"><b>取消固顶</b></a><?php }?> ]　<?php }?><?php if ($authority_main == "OK"){ ?>[ <?php if ($ifjh == 0) {?><a href="readoperate.php?fid=<?php echo $fid;?>&submitok=ifjh1" class=tiaose onClick="return confirm('确认精华？')"><b>精华</b></a><?php } else {?><a href="readoperate.php?fid=<?php echo $fid;?>&submitok=ifjh0" class=tiaose onClick="return confirm('确认取消精华？')"><b>取消精华</b></a><?php }?> ]　<?php }?>[ <a href="<?php echo $Global['my_2domain']; ?>/i_group_favorite.php?fid=<?php echo $fid; ?>&submitok=addupdate" class=tiaose><b>收藏</b></a> ]</td>
</tr>
</table>
</td>
</tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr><td><table width="940" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4 style="margin-bottom:5px">
<tr>
  <td height="30" colspan="2" class=tdbg3 style="font-size:10.3pt;font-weight:bold;padding-left:5px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="83%" style="font-size:10.3pt;font-weight:bold;">
<?php if ($iftop == 1)echo "<img src=images/ding.gif  alt=固顶贴>";?> 
<?php if ($ifjh == 1)echo "<img src=images/jh.gif alt=精华贴>";?> 	
<font class=tiaose >标题：<?php echo $title; ?></font>
<?php if ($ifin == 0)echo " <img src=images/m.gif border=0 alt=只有本圈子内成员才可以查看！>";?>
<?php 
$d1 = strtotime($addtime);
$d2 = strtotime(date("Y-m-d H:i:s"));
if (($d2-$d1) < 86400 )echo " <img src=images/new.gif border=0 alt=当天发表>";
if ( $flag == 0 && $authority_main == "OK")echo " <a href=readoperate.php?submitok=flag1&fid=".$fid." title=点击审核><font color=red><u>未审核</u></font></a>";
?>
</td>
<td width="17%" align="center"><font style="font-size:9pt;">阅读 <font color="#FF0000"><b><?php echo $click; ?></b></font> 次　回贴 <font color="#FF0000"><b><?php echo $bbsnum; ?></b></font> 条</font></td>
      </tr>
    </table></td>
  </tr>
<?php if ($p == 1 || empty($p)) {?>  
<tr>
  <td width="100" align="center" valign="top" class=tdbg style="padding:10px 0 10px 0">
    <table width="69" height="84" border="0" cellpadding="2" cellspacing="1" bgcolor="#dddddd" style="margin:0 0 8px 0">
    <tr>
      <td align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid; ?>" target=_blank>
<?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/65x80".$sex.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s."  width=65 height=80 border=0>";
}
?></a></td>
    </tr>
  </table>
    <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid; ?>" target=_blank class=333333><?php echo geticon($sex.$grade).$nickname; ?></a> </td>
  <td valign="top" bgcolor="#FFFFFF" style="padding:15px;padding-top:0px;"><table width="100%" height="32" border="0" cellpadding="0" cellspacing="0" style="border-bottom:#dddddd 1px solid  ;">
    <tr>
      <td width="30%" height="27" valign="bottom" style="color:#666666;">发表时间: <?php echo date_format2($addtime,'%Y-%m-%d %H:%M'); ?></td>
      <td width="57%" align="right" valign="bottom"><a href="<?php echo $Global['www_2domain']; ?>/315.php" target="_blank" class=tiaose><img src="images/jubao.gif" hspace="3" border="0">举报</a></td>
      <td width="9%" align="center" valign="bottom"><font color="#FF0000">[ 楼主 ]</font></td>
      <td width="4%" align="right" valign="bottom"><a href="#top" class=tiaose><b>TOP</b></a></td>
    </tr>
  </table>
<br>
    <table width="810" border="0" cellspacing="0" cellpadding="0" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;">
      <tr>
        <td style="font-size:10.3pt;line-height:200%;"><font color="#000000"><?php echo badstr($content); ?></font></td>
      </tr>
    </table></td>
</tr>
<?php }?>
</table></td>
</tr>
</table>
<style type="text/css"> 
.photo140X105{width: 140px;height: 105px;overflow: hidden;text-align:center;}
.photo140X105 img, .resultImg img {height: 105px !important;width: auto !important;} 
.page1{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;cursor: pointer;padding-top:2px;background:#FBF9F9;}
.page2{border:#cccccc 1px solid;width:22px;height:20px;text-align:center;background-color:#ffffcc;color:red;padding-top:2px;}
</style>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_WZ_BBS__." WHERE fid=".$fid." ORDER BY id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 20;
if ($p<1)$p=1;
$pagemax = ceil($total / $pagesize);
if ($total % $pagesize == 0){
	$redirectpage = $pagemax+1;
} else {
	$redirectpage = $pagemax;
}
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($p == 1){
	$n = $i;
} else {
	$n = $i+$pagesize*($p-1);
}
?>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
  <td valign="top"><table width="940" height="40" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4 style="margin-top:5px;margin-bottom:5px;">

    <tr>
      <td width="100" align="center" valign="top" class=tdbg  style="padding:10px 0 10px 0">
          <table width="69" height="84" border="0" cellpadding="0" cellspacing="0" style="border:#ddd 1px solid;margin:0 0 8px 0">
            <tr>
              <td align="center" bgcolor="#FFFFFF"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target=_blank>
<?php 
$nicknamesexgradephoto_swzbbs = $rows['nicknamesexgradephoto_s'];
$tmpnicknamewzbbs = explode("|",$nicknamesexgradephoto_swzbbs);
$nicknamewzbbs = $tmpnicknamewzbbs[0];
$sexwzbbs = $tmpnicknamewzbbs[1];
$gradewzbbs = $tmpnicknamewzbbs[2];
$photo_swzbbs = $tmpnicknamewzbbs[3];
if (empty($photo_swzbbs)){
echo "<img src=".$Global['www_2domain']."/images/65x80".$sexwzbbs.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_swzbbs." width=65 height=80 border=0>";
}
?></a></td>
            </tr>
          </table>
          <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target=_blank class=333333><?php echo geticon($sexwzbbs.$gradewzbbs).$nicknamewzbbs; ?></a></td>
      <td valign="top" bgcolor="#FFFFFF" style="padding:15px;padding-top:0px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom:#cccccc 1px dotted;">
          <tr>
            <td width="30%" height="27" valign="bottom" style="color:#666666;">发表时间: <?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M'); ?></td>
            <td width="57%" align="right" valign="bottom" style="color:#999999;"><?php if ($authority_main == "OK"){ ?>[ <a href="readoperate.php?bbsid=<?php echo $rows['id'];?>&submitok=bbsdelupdate&p=<?php echo $redirectpage; ?>" class=tiaose onClick="return confirm('确认删除？')"><b>删除</b></a> ]　　<?php }?><a href="<?php echo $Global['www_2domain']; ?>/315.php" target="_blank" class=tiaose><img src="images/jubao.gif" hspace="3" border="0">举报</a></td>
            <td width="9%" align="center" valign="bottom" style="color:#999999">[ <b><font color="#FF0000"><?php echo $n;?></font></b> 楼 ]</td>
            <td width="4%" align="right" valign="bottom"><a href="#top" class=tiaose><b>TOP</b></a></td>
          </tr>
</table>
<br>
<table width="810" border="0" cellspacing="0" cellpadding="0" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;">
<tr>
<td style="font-size:14px;line-height:200%;"><font color="#000000">
<?php
if ($rows['flag'] == 1) {
echo badstr(stripslashes($rows['content']));
} else {
echo "<font color=#999999>该贴已被冻结或删除！</font>";
}
?>
</font></td>
</tr>
</table></td>
</tr>
</table></td>
</tr>
</table>
<?php }?>
<?php } else { ?>
<table width="980" height="46" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td height="31" align="center" valign="bottom"><font color="#999999" style=font-size:10.3pt;>...暂无回贴...</font> </td>
  </tr>
</table>
<?php } ?>

<table width="980" height="33" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
  <tr>
    <td width="961" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="19" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="980" height="64" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bkbg.gif">
<tr>
<td valign="top" style="padding-top:8px;"><a name=#bbs></a>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<1 || document.FORM.content.value.length>30000){
	alert('回复内容请控制在1~20000字节！');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script><form action="read.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()" style="margin:0px">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<input name="submitok" type="hidden" value="addupdate">
<input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
<input name="bkid" type="hidden" value="<?php echo $bkid; ?>">
<input name="fid" type="hidden" value="<?php echo $fid; ?>">
<input name="bktitle" type="hidden" value="<?php echo $bktitle; ?>">
<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
<table width="940" height="40" border="0" align="center" cellpadding="0" cellspacing="1" class=tdbg4>
<tr>
<td height="30" class=tdbg3 style="padding-left:10px;border-left:#ffffff 1px solid;border-top:#ffffff 1px solid;border-right:#ffffff 1px solid;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96%" style="font-size:10.3pt;"><font class=tiaose >
<?php echo "<b>快速发帖：<a href=".$Global['group_2domain']."/".$mainid." style=font-size:10.3pt><font class=tiaose>".$maintitle."</font></a>";
if (!empty($bktitle))echo " >> "."<a href=article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle." style=font-size:10.3pt><font class=tiaose>".$bktitle."</font></a>";
echo " >> </b>".$title."";
?></font></td>
    <td width="4%"><a href="#top" class=tiaose><b>TOP</b></a></td>
  </tr>
</table></td>
        </tr>
      <tr>
        <td align="center" valign="top" class=tdbg style="padding-top:20px"><iframe src="/gyleditor/gyleditor.htm" id="htmlletter" name="htmlletter" style="height:320px; width:90%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe>
          <br>
          <table width="844" height="105" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="61" height="60" align="left"><font class=tiaose >上传照片：</font></td>
              <td width="783" align="left"><iframe src="up.php" frameborder="0" allowTransparency="true" width="620" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
            </tr>
            <tr>
              <td height="80" colspan="2" align="center" valign="top"><font color="#FF0000">（<?php echo $Global['m_area2']; ?>公安局网监郑重提醒：涉黄、涉政言论请勿发表，否则后果自负）</font><br>
                <br>
<input type="submit" name="Submit" value=" 开始发表 " class="button" <?php if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){echo "disabled='disabled'";} ?>></td>
            </tr>
          </table></td>
      </tr>
    </table>
</form><br>
</td>
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
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br>
<?php
if ( ereg("^[0-9]{1,8}$",$cook_userid) && !empty($cook_userid)) {
	$rtmail = $db->query("SELECT COUNT(id) FROM ".__TBL_GBOOK__." WHERE new=1 AND userid=".$cook_userid);
	if($db->num_rows($rtmail) > 0){
		$rowsmail = $db->fetch_array($rtmail);
		$rowsmailcount = $rowsmail[0];
	}
?>
<?php if ($rowsmailcount > 0) {?>
<bgsound src="<?php echo $Global['www_2domain'];?>/images/ring.wav" loop="1">
<script FOR=window EVENT=onload language="javascript">initAd2();</script>
<script language="javascript">
	function initAd2() {
		document.all.AdLayer2.style.posTop = -200;
		document.all.AdLayer2.style.visibility = 'visible'//设置层为可见
		MoveLayer2('AdLayer2');
	}
	function MoveLayer2(layerName) {
		var x = 30;//x
		var y = 160;//y
		var diff = (document.body.scrollTop + y - document.all.AdLayer2.style.posTop)*.40;
		var y = document.body.scrollTop + y - diff;
		eval("document.all." + layerName + ".style.posTop = y");
		eval("document.all." + layerName + ".style.posRight = x");
		setTimeout("MoveLayer2('AdLayer2');", 50);//设置20毫秒后再调用函数MoveLayer()
	}
</script>
<div id=AdLayer2 style='position:absolute; width:70px; height:66px; z-index:21; visibility:hidden;right:2px;top:300px;color:#666666;' align=center>
<a href="<?php echo $Global['my_2domain'];?>/?b_gbook.php?submitok=list" class=u666666><img src='<?php echo $Global['www_2domain'];?>/images/newgbook.gif' border="0">新留言</a> <font style="color:red;"><?php echo $rowsmailcount; ?></font> 条</div> 
<?php
	}
}
?>
<div style="visibility:hidden;"></div>
</body></html><?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
ob_end_flush();?>