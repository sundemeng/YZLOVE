<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 12;
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("请求错误，该信息不存在或已被删除！","-1");
if ($submitok == 'addupdate') {
	//
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
	//
	if (strlen($content)<2 || strlen($content)>500)callmsg("“祝福内容”请控制在2~500字节以内。","-1");
	$addtime=date("Y-m-d H:i:s");
	$nicknamesexgradephoto_s = $cook_nickname."|".$cook_sex."|".$cook_grade."|".$cook_photo_s;
	$db->query("INSERT INTO ".__TBL_STORY_BBS__."  (fid,content,userid,nicknamesexgradephoto_s,addtime) VALUES ('$fid','$content','$cook_userid','$nicknamesexgradephoto_s','$addtime')");
	$db->query("UPDATE ".__TBL_STORY__." SET bbsnum=bbsnum+1 WHERE id='$fid'");
	//header("Location: detail.php?fid=".$fid);
	header("Location: detail.php?fid=".$fid."&p=".$redirectpage."#content");
}
$rt=$db->query("SELECT userid,nicknamesexgradephoto_s,userid2,nicknamesexgradephoto_s2,sussflag,title,content,addtime,bbsnum,picurl_s FROM ".__TBL_STORY__." WHERE flag=1 AND id=".$fid);
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$title = htmlout(stripslashes($row['title']));
	$content = htmlout(stripslashes($row['content']));
	$bbsnum = $row['bbsnum'];
	$sussflag = $row['sussflag'];
	$addtime = $row['addtime'];
	$userid = $row['userid'];
	$nicknamesexgradephoto_s = $row['nicknamesexgradephoto_s'];
	$tmpnickname = explode("|",$nicknamesexgradephoto_s);
	$nickname = $tmpnickname[0];
	$sex = $tmpnickname[1];
	$grade = $tmpnickname[2];
	$photo_s = $tmpnickname[3];
	$userid2 = $row['userid2'];
	$nicknamesexgradephoto_s2 = $row['nicknamesexgradephoto_s2'];
	$tmpnickname2 = explode("|",$nicknamesexgradephoto_s2);
	$nickname2 = $tmpnickname2[0];
	$sex2 = $tmpnickname2[1];
	$grade2 = $tmpnickname2[2];
	$photo_s2 = $tmpnickname2[3];
	$picurl_s = $row['picurl_s'];
	$picurl_b = substr($picurl_s,9);
	$picurl_b = 'b'.$picurl_b;
	$tmppicurl_s = substr($picurl_s,0,8);
	$picurl_b =  $tmppicurl_s.$picurl_b;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息不存在或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>爱情故事 成功故事 恋爱故事</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.photo62X62 img{width:65px;height:80px}


.main .page{width:778px;height:20px;padding:10px 0 0 0;margin:0px auto;margin-bottom:30px;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}

.main .tips{width:918px;line-height:24px;padding:15px 30px 15px 30px;margin:0px auto;margin-bottom:10px;border:#F4DCEE 1px solid;background:#FDF2F9;font-family:Verdana;text-align:left;color:#FF6C96}
.main .tips span{color:#FF6699;font-weight:bold}
.main .tips .red{color:#f00;font-weight:normal}
.main .tips a{text-decoration:underline;font-weight:bold}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<table width="200" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="778" height="246" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="543" valign="top"><table width="540" border="0" cellpadding="0" cellspacing="1" bgcolor="#F7E4ED">
  <tr>
    <td height="30" align="left" valign="middle" background="images/4.gif" bgcolor="#FFFFFF" style="color:#FF3399;font-weight:bold;font-size:14px;padding:0 0 0 10px"><?php echo $title; ?></td>
</tr>
<tr>
<td align="center" valign="top" bgcolor="#FFFFFF" style="padding:10px;">
<?php if (empty($picurl_s)){ ?>
  <table width="500" height="375" border="0" cellpadding="0" cellspacing="1" bgcolor="efefef">
    <tr>
      <td align="center" bgcolor="f9f9f9"><font color="#999999">...暂无幸福照片...</font></td>
    </tr>
  </table>
<?php }else{?>
<table width="500" height="375" border="0" cellpadding="0" cellspacing="0" bgcolor="dddddd">
  <tr>
    <td align="center" bgcolor="#FFFFFF"><img src="<?php echo $Global['up_2domain']; ?>/photo/<?php echo $picurl_b; ?>"></td>
  </tr>
</table>
<?php }?></td>
</tr>
</table>  </td>
<td align="right" valign="top"><table width="230" height="156" border="0" cellpadding="0" cellspacing="1" bgcolor="#F7E4ED">
<tr>
<td height="30" align="left" valign="middle" background="images/4.gif" bgcolor="FEF5FE" style="color:#FF3399;font-weight:bold;font-size:14px;padding:0 0 0 10px"><?php 
switch ($sussflag){
case 1:echo "我们约会了";break;
case 2:echo "我们恋爱了";break;
case 3:echo "我们热恋了";break;
case 4:echo "我们订婚了";break;
case 5:echo "我们结婚了";break;
}
?></td>
</tr>
<tr>
  <td height="140" align="right" bgcolor="#FDF2F9" style="color:#FF6699;line-height:25px;padding-right:15px;font-family:Verdana">在这里 王子公主 童话每天上演 <br>
在这里 众里寻她 只需鼠标轻点 <br>
在这里 爱与被爱 缘来如此简单 <br>
<?php echo date_format2($addtime,'%Y年%m月%d日');?> <br>
他们宣布：“<?php 
switch ($sussflag){
case 1:echo "我们约会了";break;
case 2:echo "我们恋爱了";break;
case 3:echo "我们热恋了";break;
case 4:echo "我们订婚了";break;
case 5:echo "我们结婚了";break;
}
?>
”</td>
</tr>

</table>
  <table width="122" height="5" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"></td>
    </tr>
</table>
<table width="230" height="117" border="0" cellpadding="0" cellspacing="0" bgcolor="#FDF2F9" style="border:#F7E4ED 1px solid;">
<tr>
<td height="120" align="center"><table border="0" cellpadding="2" cellspacing="1" bgcolor="FECCCB" style="margin:0 0 5px 0">
<tr>
<td align="center"><div class="photo62X62">
<?php 
if (empty($photo_s)){
	echo "<img src=".$Global['www_2domain']."/images/65x80".$sex.".gif title=暂无照片>";
} else {
	echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." title=$nickname.'的照片'>";
}
?></div></td>
          </tr>
        </table>
        <?php echo $nickname; ?></td>
      <td align="center" valign="top" style="padding-top:50px;"><img src="images/heartIcon.jpg" width="15" height="11"></td>
      <td align="center"><table border="0" cellpadding="2" cellspacing="1" bgcolor="FECCCB" style="margin:0 0 5px 0">
          <tr>
            <td align="center"><div class="photo62X62"><?php 
if (empty($photo_s2)){
	echo "<img src=".$Global['www_2domain']."/images/65x80".$sex2.".gif title=暂无照片>";
} else {
	echo "<img src=".$Global['up_2domain']."/photo/".$photo_s2." title=$nickname2.'的照片'>";
}
?></div></td>
          </tr>
        </table>
        <?php echo $nickname2; ?></td>
    </tr>
  </table>
  <table width="122" height="5" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td align="center"></td>
    </tr>
  </table>
  <table width="230" border="0" cellpadding="0" cellspacing="1" bgcolor="#F7E4ED">
    <tr>
      <td height="30" align="left" valign="middle" background="images/4.gif" bgcolor="FEF5FE" style="color:#FF3399;font-weight:bold;font-size:14px;padding:0 0 0 10px">祝福他们</td>
    </tr>
    <tr>
      <td height="80" align="center" bgcolor="#FDF2F9" style="padding-top:10px;font-family:Verdana"><font color="FF6699">已收到 <font color="#FF0000"><?php echo $bbsnum; ?></font> 个祝福</font><br>
        <a href="#content"><img src="images/zf.gif" width="125" vspace="5" border="0"></a></td>
    </tr>
  </table></td>

</tr>
</table>
<table width="122" height="8" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#F7E4ED">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" class=10_3 style="padding:20px;line-height:30px;font-size:14px"><?php echo $content; ?></td>
  </tr>
</table>
<table width="122" height="8" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center"></td>
  </tr>
</table>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#F7E4ED">
  <tr>
    <td width="507" height="30" align="left" valign="middle" background="images/4.gif" style="color:#FF3399;font-weight:bold;font-size:14px;padding:0 0 0 10px">幸福相册</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF" style="padding:10px;"><?php
$rt=$db->query("SELECT title,path_s,path_b FROM ".__TBL_STORY_PHOTO__." WHERE fid='$fid' ORDER BY id DESC LIMIT 5");
$total = $db->num_rows($rt);
if($total>0){
?>
        <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
<?php
for($j=1;$j<=$total;$j++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
<td width="960" align="center" bgcolor="#FFFFFF"><table width="140" height="140" border="0" cellpadding="0" cellspacing="0" style="border:#dddddd 1px solid;"><tr>
<td align="center" bgcolor="#FFFFFF"><a href="#" onClick="window.location.href='<?php echo $Global['www_2domain']; ?>/piczoom.php?picurl=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_b']; ?>'"><img src=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?> alt="放大照片" border="0"></a></td>
</tr>
</table>
  <table width="140" height="23" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><font color="#666666"><?php echo htmlout(stripslashes($rows['title'])); ?> </font></td>
    </tr>
  </table>
  </td>
<?php if ($j % 5 == 0) {?>
</tr>
<tr>
<?php	} ?>
<?php } ?>
</tr>
</table>
<?php } else {?>
<br>
<br>
<table width="186" height="96" border="0" cellpadding="0" cellspacing="1" bgcolor="efefef">
<tr>
<td align="center" bgcolor="f9f9f9"><font color="#999999">...暂无幸福相册...</font></td>
</tr>
</table>
<font color="#999999">.</font><br>
<br>
<br>
<?php }?></td>
</tr>
</table>
<table width="122" height="8" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="center"></td>
  </tr>
</table>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_STORY_BBS__." WHERE fid='$fid' ORDER BY id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classcool.php';
$pagesize = 20;
if ($p<1)$p=1;
$pagemax = ceil($total / $pagesize);
if ($total % $pagesize == 0){
	$redirectpage = $pagemax+1;
} else {
	$redirectpage = $pagemax;
}
$mypage = new zeaipage($total,$pagesize);
$pagelist  = $mypage->pagebar();
mysql_data_seek($rt,($p-1)*$pagesize);
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
	$userid_bbs = $rows['userid'];
	$content_bbs = htmlout(stripslashes($rows['content']));
	$addtime_bbs = $rows['addtime'];
	$nicknamesexgradephoto_s_bbs = $rows['nicknamesexgradephoto_s'];
	$tmpnickname_bbs = explode("|",$nicknamesexgradephoto_s_bbs);
	$nickname_bbs = $tmpnickname_bbs[0];
	$sex_bbs = $tmpnickname_bbs[1];
	$grade_bbs = $tmpnickname_bbs[2];
	$photo_s_bbs = $tmpnickname_bbs[3];
?>
<table width="778" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FDF2F9" style="border:#F7E4ED 1px solid;">
  <tr>
    <td width="60" align="center"><table width="60" height="60" border="0" cellpadding="2" cellspacing="1" bgcolor="dddddd">
      <tr>
        <td align="center" bgcolor="#FFFFFF"><div class="photo62X62"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>" target="_blank"><?php 
if (empty($photo_s_bbs)){
	echo "<img src=".$Global['www_2domain']."/images/65x80".$sex_bbs.".gif title=暂无照片>";
} else {
	echo "<img src=".$Global['up_2domain']."/photo/".$photo_s_bbs." title=$nickname.'的照片'>";
}
?></a></div></td>
      </tr>
    </table></td>
<td valign="top"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="bottom" style="color:#666666"><?php echo geticon($sex_bbs.$grade_bbs);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid_bbs; ?>"  target=_blank><?php if ( $sex_bbs == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $nickname_bbs;?></font></a> 祝福于：<span style="font-family:Verdana;font-size:11px"><?php echo $addtime_bbs;?></span></td>
<td align="right" valign="top">&nbsp;</td>
</tr>
</table>
    <br>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;font-size:10.3pt;line-height:150%;color:#FF6C96;"><?php
echo $content_bbs;
?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100" height="8" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<?php }?>
<div class="main">
<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
</div>
<?php 	} else {
	echo "<center><br><br><font style=font-size:10.3pt;color:#999999;>...暂无祝福...</font></center><br><br>";
}?>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F4DCEE" style="border:#F7E4ED 1px solid">
  <tr>
    <td width="77" height="30" align="left" valign="middle" background="images/4.gif" style="color:#FF3399;font-weight:bold;font-size:14px;padding:0 0 0 10px;">发表祝福</td>
    <td width="699" align="left" valign="middle" background="images/4.gif" style="color:#FF6C96;">(内容请控制在500个字母或250个汉字以内)<script language="javascript">
function chkform(){
	if(document.myform.content.value.length>500 || document.myform.content.value.length<2){
	alert('祝福内容请控制在2~500个字节内！');
	document.myform.content.focus();
	return false;
	}
	document.myform.Submit.disabled=true;
}
</script></td>
  </tr>
</table>
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
<form action="" method="post" onSubmit="return chkform()" name="myform">
<tr>
<td align="center"><textarea name="content" cols="95" rows="8" style="border:#F7E4ED 1px solid;width:774px;font-size:9pt;background:#f8f8f8;"></textarea>
<br>
<input type="Submit" class="button" value=" 提 交 " name="Submit">
<input type="hidden" name="fid" value="<?php echo $fid; ?>">
<input type="hidden" name="submitok" value="addupdate">
<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
</td>
</tr>
</form>
</table>
<br>
<div class=main>
	<div class="tips">　　记录你们在<?php echo $Global['m_sitename']; ?>相识相知相爱的每一行足迹，为人生增添一抹最亮的色彩！用您的成功去鼓舞更多仍在寻觅的朋友，让大家一起见证你们的爱情！ 品尝爱情的甜蜜，回味寻爱的旅程。<?php echo $Global['m_sitename']; ?>期待您分享幸福、传递幸福。　　　<img src="images/up.gif" hspace="5" align="absmiddle" /><a href="/my/?g_story.php?submitok=add">上传我的成功故事</a></div>
	<div class=clear></div>
</div>
<?php require_once YZLOVE.'bottom.php';?>