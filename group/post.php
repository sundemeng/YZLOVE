<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid))header("Location: ".$Global['www_2domain']."/login.php");
if ( (!ereg("^[0-9]{1,8}$",$fid) || empty($fid)) && ($submitok == "mod" || $submitok == "modupdate") )callmsg("请求错误，该贴子不存在或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT mbkind,title,ifsh,ifin2,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mbkind = $row['mbkind'];
$maintitle = stripslashes($row['title']);
$ifsh = $row['ifsh'];
$ifin2 = $row['ifin2'];
$userid_main = $row['userid'];
$userid1_main = $row['userid1'];
$userid2_main = $row['userid2'];
$userid3_main = $row['userid3'];
$userid_bk="NO";
if (!empty($bkid)) {
	$tmpbk = explode(",",$bkid);
	$bktitle = $tmpbk[1];
	$bkid = $tmpbk[0];
	$rtbk = $db->query("SELECT userid FROM ".__TBL_GROUP_BK__." WHERE id=".$bkid);
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
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该圈子不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
$rt = $db->query("SELECT id FROM ".__TBL_GROUP_BK__." WHERE mainid=".$mainid);
if(!$db->num_rows($rt))callmsg("请求错误，该圈子还未创建圈子版块，发表失败！","-1");
if ($submitok == "addupdate" || $submitok == "modupdate") {
	if (empty($bkid))callmsg("请选择圈子版块/分类!","-1");
	if ( !ereg("^[0-9]{1,8}$",$bkid) || empty($bkid))callmsg("Forbidden!","-1");
	if (strlen($title)>80 || empty($title))callmsg("标题太长，请控制在80个字节以内","-1");
	if (strlen($content)>60000 || strlen($content)<10)callmsg("内容过多或过少，请控制在10~50000字节以内","-1");
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$nicknamesexgradephoto_s = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		header("Location: ".$Global['www_2domain']."/login.php");
	}
	if ($ifin2 == 0 && $submitok == "addupdate") {
		$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$cook_userid." AND mainid=".$mainid." AND flag=1");
		$row = $db->fetch_array($rt);
		if ($row[0] <= 0)callmsg("你不是本圈子的成员，发表失败，请先返回到圈子首页“加入到本圈子”","-1");
	}
	if ($authority_main == "OK"){
		$flag=1;
	} else {
		if ($ifsh == 1){
			$flag = 0;
		} else {
			$flag = 1;
		}
	}
}
if ($submitok == "addupdate") {
	$endtime = date("Y-m-d H:i:s");
	$addtime = $endtime;
	$endnicknamesexgradephoto_s = $nicknamesexgradephoto_s;
	$addloveb = $Global['m_group_add'];
	$db->query("INSERT INTO ".__TBL_GROUP_WZ__."  (mainid,maintitle,bkid,bktitle,title,content,flag,endtime,enduserid,endnicknamesexgradephoto_s,addtime,userid,nicknamesexgradephoto_s) VALUES ('$mainid','$maintitle','$bkid','$bktitle','$title','$content','$flag','$endtime','$cook_userid','$endnicknamesexgradephoto_s','$addtime','$cook_userid','$nicknamesexgradephoto_s')");
//
	$tmpid = $db->insert_id();
	$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1 AND b.grade>=3");
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows[0];
			$ugrade =  $rows[1];
			$uif2 =  $rows[2];
			if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
				$content = "在“".$maintitle."”圈子发表了一篇名为“".$title."”的帖子，<a href=".$Global['group_2domain']."/read".$tmpid.".html target=_blank  class=uDF2C91>点击查看</a>";
				$addtime = strtotime("now");
				$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
			}
		}
	}
//
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET wznum=wznum+1,qloveb=qloveb+".$addloveb." WHERE id=".$mainid);
	header("Location: article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle);
} elseif ($submitok == "modupdate") {
	$addtime = date("Y-m-d H:i:s");
	$content = $content."<p align=right style=font-size:9pt;color:#999999;>该贴于 ".$addtime." 被修改过。</p>";
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET mainid='$mainid',maintitle='$maintitle',bkid='$bkid',bktitle='$bktitle',title='$title',content='$content',flag='$flag' WHERE id=".$fid);
	header("Location: article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle);
}
if ($submitok == "mod") {
	if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("请求错误，该贴子不存在或已被删除！","-1");
	$rt = $db->query("SELECT bkid,title,content,userid FROM ".__TBL_GROUP_WZ__." WHERE id=".$fid);
	if($db->num_rows($rt)) {
		$row_wz = $db->fetch_array($rt);
		$userid_wz = $row_wz[3];
		if ( ($userid_wz !== $cook_userid) && $authority_main == "NO" )callmsg("请求错误，没有操作权限!","-1");
		$bkid_wz = $row_wz[0];
		$title_wz = $row_wz[1];
		$content_wz = $row_wz[2];
	} else {
		callmsg("请求错误，该贴子不存在或已被删除1！","-1");
		exit;
	}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $maintitle; ?><?php if ($submitok == "mod") {echo " >> 修改贴子"; }else{echo " >> 发表贴子";} ?></title>
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
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="article<?php echo $mainid; ?>.html" class="title">圈内话题</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="party<?php echo $mainid; ?>.html" class="title">活动聚会</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="photo<?php echo $mainid; ?>.html" class="title">圈子相册</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="user<?php echo $mainid; ?>.html" class="title">圈子成员</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group_invite.php?mainid=".$mainid;?>" class="title">邀请他人</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/3.gif" style="padding-top:5px;"><a href="post<?php echo $mainid; ?>.html" class="titleselected">发表新话题</a></td>
        <td width="104" align="center" background="images/<?php echo $mbkind; ?>/2.gif" style="padding-top:5px;"><a href="<?php echo $Global['my_2domain']."/?i_group.php";?>" class="title">圈子管理</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F9F8F9" style="border-left:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td valign="top" style="padding-top:2px;padding-bottom:2px;"><table width="968" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-top:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr>
<td height="23" background="images/<?php echo $mbkind; ?>/5.gif" style="border-left:#ffffff 2px solid;border-right:#ffffff 2px solid;"><table width="100%" height="23" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="93%" style="padding-top:3px;"><img src="images/<?php echo $mbkind; ?>/li.gif" width="5" height="15" hspace="5" align="absmiddle"> <font color="#FFFFFF"><b><?php echo "<a href=".$Global['group_2domain']."/".$mainid." class=title>".$maintitle."</a>"; ?>
<?php if (!empty($bktitle)){
echo " >> "."<a href=article.php?mainid=".$mainid."&bkid=".$bkid."&bktitle=".$bktitle." class=title>".$bktitle."</a>";
}
?> >></b> <?php if ($submitok == "mod") {echo "修改贴子"; }else{echo "发表贴子";} ?></font></td>
<td width="7%" align="right" valign="bottom"><a href="article<?php echo $mainid; ?>.html"><img src="images/<?php echo $mbkind; ?>/more.gif" width="36" height="11" hspace="7" border="0"></a></td>
</tr>
</table></td>
</tr>
</table>
<?php if ($submitok == "mod") {?>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	if(document.FORM.bkid.value=="")	{
	alert('请选择版块/类别！');
	document.FORM.bkid.focus();
	return false;
	}
	if(document.FORM.title.value=="")	{
	alert('请输入标题！');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<10 || document.FORM.content.value.length>20000){
	alert('正文内容请控制在10~20000字节！');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
<form action="post.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()" style="margin:0px">
<input type="hidden" name="content" value="">
<table width="968" height="165" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-bottom:#dddddd 1px solid;border-right:#dddddd 1px solid;">
<tr><td width="111" align="right">&nbsp;</td>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td align="right"><b>标　　题</b>：</td>
<td colspan="2">
<select name="bkid" style="font-size:14px">
<?php
$rt2=$db->query("SELECT id,title FROM ".__TBL_GROUP_BK__." WHERE mainid='$mainid' ORDER BY px DESC,id DESC");
$total2 = $db->num_rows($rt2);
if ($total2 <= 0) {
	echo "暂无";
} else {
?>
<option value="">选择版块/分类</option>
<?php
	for($j=0;$j<$total2;$j++) {
		$rows2 = $db->fetch_array($rt2);
		if(!$rows2) break;
		if ($rows2[0] == $bkid_wz) {
			$tempselect = " selected ";
		} else {
			$tempselect = "";
		}
		echo "<option value=".$rows2[0].",".stripslashes($rows2[1]).$tempselect.">".stripslashes($rows2[1])."</option>";
	}
}
?>
</select>
<input name="title" type="text" class="input" size="89" maxlength="60" style="font-size:10.3pt;height:25px" value="<?php echo stripslashes($title_wz); ?>"></td>
</tr>
<tr>
<td align="right" valign="top" style="padding-top:40px"><b>    正文内容</b>：</td>
<td colspan="2"><iframe src="/gyleditor/gyleditor_party.htm" id="htmlletter" name="htmlletter" style="height:420px; width:90%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
</tr>
<tr>
<td align="right" style="padding-top:10px"><b>上传照片</b>：</td>
<td height="30" colspan="2" align="left"><iframe src="up.php" frameborder="0" allowTransparency="true" width="620" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
</tr>
<tr>
  <td align="right" valign="top"></td>
  <td width="377" height="30" align="right"><input name="submitok" type="hidden" value="modupdate">
    <input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
    <input name="fid" type="hidden" value="<?php echo $fid; ?>">
    <input type="submit" name="Submit" value=" 提交 " class="button"></td>
  <td width="448"><input type="hidden" id="htext" name="text" value='<?php echo stripslashes($content_wz); ?>'></td>
</tr>
<tr>
<td align="right">&nbsp;</td>
<td colspan="2"><table width="764" height="55" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="23" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif"></td>
    <td valign="top" class="tiaose" style="line-height:150%;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">遵守<a href="<?php echo $Global['www_2domain']; ?>/law.html" target="_blank"><font class=666666><u>互联网电子公告服务管理规定</u></font></a>以及中华人民共和国其他各项有关法律法规。<br>
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁在内容里公布任何形式的联系方式，包括QQ、邮箱、电话、地址、网址等。<br>
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁开展非法、商业性推广活动。<br>
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁灌水，乱发或发布相同信息，杜绝无聊话语。<br>
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">违反以上规定的一经发现，将扣除Love币1000以上，情节严重的将永久性删除会员资格及所有资料，不再另行通知。如有疑问，请与我们联系。 </td>
  </tr>
</table>
  <br>
<br></td>
</tr>
</table>
</form>
<?php }else{  ?>
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	if(document.FORM.bkid.value=="")	{
	alert('请选择版块/类别！');
	document.FORM.bkid.focus();
	return false;
	}
	if(document.FORM.title.value=="")	{
	alert('请输入标题！');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<10 || document.FORM.content.value.length>20000){
	alert('正文内容请控制在10~20000字节！');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
<form action="post.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()" style="margin:0px">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<table width="968" height="165" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#dddddd 1px solid;border-bottom:#dddddd 1px solid;border-right:#dddddd 1px solid;">
    <tr>
      <td width="111" align="right">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td align="right"><b>标　　题</b>：</td>
      <td colspan="2"><select name="bkid" style="font-size:14px">
        <?php
$rt2=$db->query("SELECT id,title FROM ".__TBL_GROUP_BK__." WHERE mainid='$mainid' ORDER BY px DESC,id DESC");
$total2 = $db->num_rows($rt2);
if ($total2 <= 0) {
	echo "暂无";
} else {
?>
        <option value="">选择版块/分类</option>
        <?php
	for($j=0;$j<$total2;$j++) {
		$rows2 = $db->fetch_array($rt2);
		if(!$rows2) break;
		if ($rows2[0] == $bkid) {
			$tempselect = " selected ";
		} else {
			$tempselect = "";
		}
		echo "<option value=".$rows2[0].",".stripslashes($rows2[1]).$tempselect.">".stripslashes($rows2[1])."</option>";
	}
}
?>
      </select>
          <input name="title" type="text" class="input" id="title" size="89" maxlength="60" style="font-size:10.3pt;height:25px">      </td>
    </tr>
    <tr>
      <td align="right" valign="top" style="padding-top:40px"><b> 正文内容</b>：</td>
      <td colspan="2"><iframe src="/gyleditor/gyleditor_party.htm" id="htmlletter" name="htmlletter" style="height:420px; width:90%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
    </tr>
    <tr>
      <td align="right" valign="top" style="padding-top:10px"><b>上传照片</b>：</td>
      <td colspan="2" align="left"><iframe src="up.php" frameborder="0" allowTransparency="true" width="620" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
      </tr>
    <tr>
      <td align="right" valign="top" style="padding-top:10px">&nbsp;</td>
      <td colspan="2" align="left"><font color="#FF0000">（<?php echo $Global['m_area2']; ?>公安局网监郑重提醒：涉黄、涉政言论请勿发表，否则后果自负）</font></td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td width="389" height="60" align="right"><input name="submitok" type="hidden" value="addupdate">
        <input name="mainid" type="hidden" value="<?php echo $mainid; ?>">
        <input type="submit" name="Submit" value=" 开始发表 " class="button"></td>
      <td width="436">&nbsp;</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td colspan="2"><table width="764" height="55" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="23" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif"></td>
          <td valign="top" class="tiaose" style="line-height:150%;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">遵守<a href="<?php echo $Global['www_2domain']; ?>/law.html" target="_blank"><font class=666666><u>互联网电子公告服务管理规定</u></font></a>以及中华人民共和国其他各项有关法律法规。<br>
                <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁在内容里公布任何形式的联系方式，包括QQ、邮箱、电话、地址、网址等。<br>                <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁开展非法、商业性推广活动。<br>                <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">严禁灌水，乱发或发布相同信息，杜绝无聊话语。<br>                
                <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle">违反以上规定的一经发现，将扣除Love币1000以上，情节严重的将永久性删除会员资格及所有资料，不再另行通知。如有疑问，请与我们联系。 </td>
        </tr>
      </table>
          <br>
          <br></td>
    </tr>
</table>
</form>
<?php } ?></td>
</tr></table><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td><img src="images/<?php echo $mbkind; ?>/4.gif" width="980" height="4"></td></tr></table><table width="980" height="34" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="21">&nbsp;</td>
<td align="center"><font color="#999999">&copy;版权所有<?php echo date("Y"); ?>　<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td>
<td width="22"><a href="#top"><img src="images/bl_top.gif" alt="返回页顶" width="22" height="15" border="0"></a></td></tr></table><br><br></body></html><?php ob_end_flush();?>