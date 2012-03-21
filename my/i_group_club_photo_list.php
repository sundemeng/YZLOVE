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
$rt = $db->query("SELECT id FROM ".__TBL_GROUP_CLUB__." WHERE id=".$clubid);
$total = $db->num_rows($rt);
if($total <= 0){
callmsg("活动已被删除！!","-1");
}
$tmpifmain = "YES";
if ($submitok=="delpicupdate") {
if ( !ereg("^[0-9]{1,10}$",$classid) )callmsg("error1","-1");
$rt = $db->query("SELECT mainid,clubid,path_s,path_b,ifmain FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE id=".$classid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mainid   = $row[0];
$clubid   = $row[1];
$path1    = $row[2];
$path2    = $row[3];
$ifmain   = $row[4];
} else {
callmsg("Forbidden!","-1");
}
if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
$db->query("DELETE FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE id=".$classid);
if ($ifmain==1)$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET picurl_s='' WHERE id=".$clubid);
header("Location: i_group_club_photo_list.php?clubid=".$clubid."&mainid=".$mainid."&p=".$p."&clubtitle=".$clubtitle);
} elseif ($submitok=="mainphoto") {
if ( !ereg("^[0-9]{1,10}$",$classid) )callmsg("error1","-1");
$rt = $db->query("SELECT mainid,clubid,path_s,ifmain FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE id=".$classid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$mainid   = $row[0];
$clubid   = $row[1];
$path1    = $row[2];
$ifmain   = $row[3];
} else {
callmsg("Forbidden!","-1");
}
$db->query("UPDATE ".__TBL_GROUP_CLUB_PHOTO__." SET ifmain=0 WHERE clubid=".$clubid);
$db->query("UPDATE ".__TBL_GROUP_CLUB_PHOTO__." SET ifmain=1 WHERE id=".$classid);
$db->query("UPDATE ".__TBL_GROUP_CLUB__." SET picurl_s='$path1' WHERE id=".$clubid);
header("Location: i_group_club_photo_list.php?clubid=".$clubid."&mainid=".$mainid."&p=".$p."&clubtitle=".$clubtitle);
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
      <td bgcolor="#FDEEF8" style="color:#999;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" /><b><a href="i_group.php"><?php echo $maintitle; ?></a></b> >> <a href="i_group_club.php?mainid=<?php echo $mainid; ?>&submitok=list" class="u666666"><b>活动管理</b></a> >> <font color="#333333"><?php echo $clubtitle; ?>的活动照片</font></td>
      <td width="105" bgcolor="#FDEEF8" style="color:#999;font-size:10.3pt;"><img src="images/pic.gif" width="14" height="13" hspace="3" align="absmiddle"><a href="i_group_club_up.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid;?>&clubtitle=<?php echo $clubtitle; ?>" class="u666666"><b>上传照片</b></a></td>
    </tr>
  </table>
  <br>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_CLUB_PHOTO__." WHERE mainid=".$mainid." AND clubid=".$clubid." ORDER BY ifmain DESC,id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 16;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="670" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($rows['ifmain']==1){
$bg="bgcolor=#FFFF88";
} else {
$bg="bgcolor=#f3f3f3";
}
?>
<td align="center" valign="top" style="padding-top:10px;padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0" bgcolor="cccccc" style="border:#dddddd 0px solid;">
<tr>
<td width="140" height="140" align="center" bgcolor="#FFFFFF"  style="border:#ddd 1px solid;" <?php echo  $bg; ?>><a href="<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['path_b']; ?>" target="_blank"><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['path_s']; ?> alt="放大照片" border="0"></a></td>
</tr>
<tr>
<td height="18" align="center"  <?php echo  $bg; ?>><font color="#666666"><?php echo  $rows['title']; ?></font></td>
</tr>
<tr>
<td height="18" align="center"  <?php echo  $bg; ?>><font color="#999999"><?php echo $rows['addtime']; ?></font></td>
</tr>
<tr>
<td height="20" align="center" <?php echo  $bg; ?>>
<?php if ($rows['ifmain']==1) {?>
<font color="#FF0000">★主照片</font>
<?php }else{  ?>
<?php if ($tmpifmain == "YES") {?>
<a href="i_group_club_photo_list.php?submitok=mainphoto&classid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>&clubid=<?php echo $rows['clubid'];?>&mainid=<?php echo $mainid;?>&clubtitle=<?php echo $clubtitle;?>"><u><font color="#F01271">设为主要</font></u></a>
<?php }?>
<?php }?>　<img src="images/delx.gif" width="10" height="10" hspace="3" /><a href="i_group_club_photo_list.php?submitok=delpicupdate&classid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>&clubid=<?php echo $rows['clubid'];?>&mainid=<?php echo $mainid;?>&clubtitle=<?php echo $clubtitle;?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？ 此操作将永久删除，不得恢复！')"  class="u666666">删除</a></td>
</tr>
</table></td>
<?php if ($i % 4 == 0) {?>
</tr>
<tr>
<?php } ?>
<?php 	} ?>
</tr>
</table>
<table width="670" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php } else { ?>
<br>
<br>
<table width="281" height="115" border="0" cellpadding="0" cellspacing="1" bgcolor="#dddddd">
<tr>
<td align="center" bgcolor="#F7F7F7" style="color:#666666;"><br />
此活动还没有照片<br />
<br />
<a href="i_group_club_up.php?mainid=<?php echo $mainid; ?>&clubid=<?php echo $clubid;?>&clubtitle=<?php echo $clubtitle; ?>"><img src="images/lkup.gif" alt="本地上传" width="69" height="21" hspace="5" border="0" /></a> <br />
<br />
<br />          </td>
</tr>
</table>
<br>
<br>
<br>
<?php }?>
<br>

  <br />
  <br>
<br />
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>