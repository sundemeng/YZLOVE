<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT id,userid FROM ".__TBL_STORY__." WHERE id=".$fid);
$total = $db->num_rows($rt);
if($total > 0){
	$row = $db->fetch_array($rt);
	$memberid  = $row[1];
	if ($memberid !== $cook_userid)callmsg("用户验证错误，操作失败！","-1");
} else {
	callmsg("成功故事参数错误1！!","-1");
}
$tmpifmain = "YES";
if ($submitok=="delpicupdate") {
	if ( !ereg("^[0-9]{1,10}$",$classid) || empty($classid))callmsg("error1","-1");
	$rt = $db->query("SELECT fid,path_s,path_b,ifmain FROM ".__TBL_STORY_PHOTO__." WHERE id='$classid'");
	if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$fid   = $row[0];
	$path1    = $row[1];
	$path2    = $row[2];
	$ifmain   = $row[3];
	} else {
	callmsg("成功故事参数错误2","-1");
	}
	if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
	if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
	$db->query("DELETE FROM ".__TBL_STORY_PHOTO__." WHERE id='$classid'");
	if ($ifmain==1)$db->query("UPDATE ".__TBL_STORY__." SET picurl_s='' WHERE id='$fid'");
	header("Location: g_story_photo_list.php?fid=".$fid."&p=".$p."&storytitle=".$storytitle);
} elseif ($submitok=="mainphoto") {
	if ( !ereg("^[0-9]{1,10}$",$classid) || empty($classid))callmsg("error1","-1");
	$rt = $db->query("SELECT fid,path_s,ifmain FROM ".__TBL_STORY_PHOTO__." WHERE id='$classid'");
	if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$fid   = $row[0];
	$path1    = $row[1];
	$ifmain   = $row[2];
	} else {
	callmsg("成功故事参数错误3","-1");
	}
	$db->query("UPDATE ".__TBL_STORY_PHOTO__." SET ifmain=0 WHERE fid=".$fid);
	$db->query("UPDATE ".__TBL_STORY_PHOTO__." SET ifmain=1 WHERE id=".$classid);
	$db->query("UPDATE ".__TBL_STORY__." SET picurl_s='$path1' WHERE id=".$fid);
	header("Location: g_story_photo_list.php?fid=".$fid."&p=".$p."&storytitle=".$storytitle);
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
ul li a:link,li a:active,li a:visited{width:74px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:74px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:74px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:74px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list" || $submitok == "mod")echo "class='liselect'"; ?>><a href="g_story.php?submitok=list">我的故事</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="g_story.php?submitok=add">发布故事</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
<table width="700" height="34" border="0" cellpadding="0" cellspacing="0" style="border-bottom:#dddddd 1px solid">
<tr>
<td width="466" align="left" style="font-size:14px">【<?php echo $storytitle; ?>】幸福相册</td>
<td width="84" align="right"><a href="g_story_photo_up.php?fid=<?php echo $fid; ?>&storytitle=<?php echo $storytitle; ?>" class="u666666"><img src="images/lkup.gif" alt="上传你们的甜蜜照片" border="0" /></a></td>
</tr>
</table>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_STORY_PHOTO__." WHERE fid=".$fid." ORDER BY ifmain DESC,id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 12;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="700" border="0" align="center" cellpadding="2" cellspacing="0" style="border:#C9E2F7 0px solid;">
<tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($rows['ifmain']==1){
$bg="bgcolor=#FFFFCC";
} else {
$bg="bgcolor=#ECF8FB";
}
?>
<td align="center" valign="top" style="padding-top:10px;padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0" style="border:#dddddd 0px solid;">
<tr>
<td width="140" height="140" align="center" bgcolor="#FFFFFF"  style="border:#ddd 1px solid;" <?php echo  $bg; ?>><a href="#" onClick="window.location.href='../piczoom.php?picurl=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_b']; ?>'"><img src=../up/photo/<?php echo  $rows['path_s']; ?> alt="放大照片" border="0"></a></td>
</tr>
<tr>
<td height="18" align="center"  <?php echo  $bg; ?>><font color="#666666"><?php echo  $rows['title']; ?></font></td>
</tr>
<tr>
<td height="18" align="center"  <?php echo  $bg; ?>><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y.%m.%d');; ?></font></td>
</tr>
<tr>
<td height="20" align="center" <?php echo  $bg; ?>>
<?php if ($rows['ifmain']==1) {?>
<font color="#FF0000">★主照片</font>
<?php }else{  ?>
<?php if ($tmpifmain == "YES") {?>
<a href="g_story_photo_list.php?submitok=mainphoto&classid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>&fid=<?php echo $rows['fid'];?>&storytitle=<?php echo $storytitle;?>" class="uFF5494"><img src="images/ok2.gif" hspace="3" border="0" align="absmiddle">设为主照片</a>　
<?php }?>
<?php }?>
<a href="g_story_photo_list.php?submitok=delpicupdate&classid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>&fid=<?php echo $rows['fid'];?>&storytitle=<?php echo $storytitle;?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？ 此操作将永久删除，不得恢复！')"  class="u666666"><img src="images/delx.gif"  hspace="3" border="0" align="absmiddle">删除</a></td>
</tr>
</table></td>
<?php if ($i % 4 == 0) {?>
</tr>
<tr>
<?php } ?>
<?php 	} ?>
</tr>
</table>
<table width="700" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="587" height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php } else { ?>
<br>
<br>
<table width="380" height="150" border="0" cellpadding="10" cellspacing="1" bgcolor="#dddddd">
<tr>
<td bgcolor="#F7F7F7" style="color:#666666;line-height:20px;"> 你还没有为<font color="FF6C96">【<?php echo $storytitle; ?>】</font>上传甜蜜照片。</td>
</tr>
<tr>
  <td height="30" align="center" bgcolor="#F7F7F7"><a href="g_story_photo_up.php?fid=<?php echo $fid; ?>&storytitle=<?php echo $storytitle; ?>" class="u666666"><img src="images/lkup.gif" alt="上传你们的甜蜜照片" border="0"></a></td>
</tr>
</table>
<br>
<br>
<br>
<?php }?>

  <br />
      <br />
      <br />
      <br />
      <br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>