<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,10}$",$photokind) )callmsg("Forbidden!","-1");
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
$tmpifmain = "YES";
if ($submitok=="delpicupdate") {
	if ( !ereg("^[0-9]{1,10}$",$classid) )callmsg("error1","-1");
	$rt = $db->query("SELECT mainid,path_s,path_b,ifmain FROM ".__TBL_GROUP_PHOTO__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$mainid   = $row[0];
		$path1    = $row[1];
		$path2    = $row[2];
		$ifmain   = $row[3];
	} else {
		callmsg("Forbidden!","-1");
	}
	if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
	if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
	$db->query("DELETE FROM ".__TBL_GROUP_PHOTO__." WHERE id=".$classid);
	if ($ifmain==1)$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET picurl_s='',picurl_b='' WHERE id=".$mainid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET photonum=photonum-1 WHERE id=".$mainid);
	header("Location: i_group_photo_list.php?photokind=".$photokind."&mainid=".$mainid."&p=".$p);
} elseif ($submitok=="mainphoto") {
	if ( !ereg("^[0-9]{1,10}$",$classid) )callmsg("error1","-1");
	$rt = $db->query("SELECT mainid,path_s,path_b,ifmain FROM ".__TBL_GROUP_PHOTO__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$mainid   = $row[0];
		$path1    = $row[1];
		$path2    = $row[2];
		$ifmain   = $row[3];
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("UPDATE ".__TBL_GROUP_PHOTO__." SET ifmain=0 WHERE mainid=".$mainid);
	$db->query("UPDATE ".__TBL_GROUP_PHOTO__." SET ifmain=1 WHERE id=".$classid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET picurl_s='$path1',picurl_b='$path2' WHERE id=".$mainid);
	header("Location: i_group_photo_list.php?photokind=".$photokind."&mainid=".$mainid."&p=".$p);
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
.img {
max-width:100px;max-height:100px;
width: expression(this.width > 100 && this.width > this.height ? 100 : auto);
height: expression(this.height > 100 ? 100 : auto);
}
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
  <table width="670" height="40" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td width="493" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_photo.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”相册管理</td>
      <td width="177" bgcolor="FDEEF8"><a href=i_group_photo.php?submitok=add&mainid=<?php echo $mainid; ?>><img src="images/createroot.gif" title="创建目录" width="69" height="21" hspace="5" border="0" /></a> <a href="i_group_photo_up.php?photokind=<?php echo $photokind;?>&mainid=<?php echo $mainid; ?>"><img src="images/lkup.gif" title="上传照片" width="69" height="21" hspace="5" border="0" /></a></td>
    </tr>
  </table>
  <br /><br />
  <?php
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_PHOTO__." WHERE mainid=".$mainid." AND kind=".$photokind." ORDER BY ifmain DESC,id DESC");
$total = $db->num_rows($rt);
if($total>0){
	require_once YZLOVE.'sub/class.php';
	$pagesize = 25;
	if ($p<1)$p=1;
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
  <table width="650" border="0" align="center" cellpadding="2" cellspacing="0" >
    <tr>
      <?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	if ($rows['ifmain']==1){
		$bg="bgcolor=#FFFF88";
	} else {
		$bg="bgcolor=#ECF8FB";
	}
?>
      <td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="100" border="0" cellpadding="0" cellspacing="0" bgcolor="cccccc" style="border:#dddddd 0px solid;">
          <tr>
            <td width="100" height="100" align="center" bgcolor="#FFFFFF"  style="border:#A8D3DE 1px solid;" <?php echo  $bg; ?>><a href="#" onclick="window.location.href='../piczoom.php?picurl=../up/photo/<?php echo  $rows['path_b']; ?>'"><img src="<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['path_s']; ?>" alt="放大照片" border="0" class="img" /></a></td>
          </tr>
          <tr>
            <td height="18" align="center"  <?php echo  $bg; ?>><font color="#666666"><?php echo  $rows['title']; ?></font></td>
          </tr>
          <tr>
            <td height="18" align="center"  <?php echo  $bg; ?>><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y.%m.%d');; ?></font></td>
          </tr>
          <tr>
            <td height="20" align="center" <?php echo  $bg; ?>><?php if ($rows['ifmain']==1) {?>
                <font color="#FF0000">★主照片</font>
                <?php }else{  ?>
                <?php if ($tmpifmain == "YES") {?>
                <a href="i_group_photo_list.php?submitok=mainphoto&classid=<?php echo $rows['id'];?>&amp;p=<?php echo $p; ?>&photokind=<?php echo $rows['kind'];?>&mainid=<?php echo $mainid;?>"><u><font color="#F01271">设为主要</font></u></a>
                <?php }?>
                <?php }?>
              <a href="i_group_photo_list.php?submitok=delpicupdate&classid=<?php echo $rows['id'];?>&amp;p=<?php echo $p; ?>&photokind=<?php echo $rows['kind'];?>&mainid=<?php echo $mainid;?>" onclick="return confirm('请 慎 重 ！\n\n★确认删除？ 此操作将永久删除，不得恢复！')"  class="u666666">删除</a></td>
          </tr>
      </table></td>
      <?php if ($i % 5 == 0) {?>
    </tr>
    <tr>
      <?php } ?>
      <?php 	} ?>
    </tr>
  </table>
  <table width="530" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="587" height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    </tr>
  </table>
  <?php } else { ?>
  <br />
  <br />
  <table width="281" height="115" border="0" cellpadding="0" cellspacing="1" bgcolor="#dddddd">
    <tr>
      <td align="center" bgcolor="#F7F7F7" style="color:#666666;"><br />
        “<?php echo $maintitle; ?>”相册目录还没有照片<br />
        <br />
        <a href="i_group_photo_up.php?photokind=<?php echo $photokind;?>&amp;mainid=<?php echo $mainid; ?>"><img src="images/lkup.gif" alt="本地上传" width="69" height="21" hspace="5" border="0" /></a> <br />
        <br />
        <br />
      </td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <?php }?>
<br>
  <br>
<br>
<br>

  <br />
  <br>
<br />
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>