<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
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
switch ($submitok){ 
	case 'addupdate':
		if (strlen($title)<1 || strlen($title)>50)callmsg("“目录名称”请控制在1~20字节以内。","-1");
		if ( !ereg("^[0-9]{1,4}$",$num) )callmsg("排序的值只能为1~4位的整数数字！","-1");
		$db->query("INSERT INTO ".__TBL_GROUP_PHOTO_KIND__."  (mainid,title,px) VALUES ('$mainid','$title','$num')");
		header("Location: i_group_photo.php?mainid=".$mainid);
	break;
	case 'modupdate':
		if ( !ereg("^[0-9]{1,9}$",$classid) )callmsg("Forbidden！","-1");
		if (strlen($title)<1 || strlen($title)>50)callmsg("“目录名称”请控制在1~20字节以内。","-1");
		if ( !ereg("^[0-9]{1,4}$",$num) )callmsg("排序的值只能为1~4位的整数数字！","-1");
		$db->query("UPDATE ".__TBL_GROUP_PHOTO_KIND__." SET title='$title',px='$num' WHERE id='$classid'");
		header("Location: i_group_photo.php?mainid=".$mainid);
	break;
	case 'delupdate':
		if ( !ereg("^[0-9]{1,9}$",$classid) )callmsg("Forbidden！","-1");
		$rt = $db->query("SELECT id,path_s,path_b,ifmain FROM ".__TBL_GROUP_PHOTO__." WHERE kind='$classid' AND mainid='$mainid'");
		$total = $db->num_rows($rt);
		if($total>0){
			for($i=1;$i<=$total;$i++) {
				$row = $db->fetch_array($rt);
				if(!$row) break;
				$picid    = $row[0];
				$path1    = $row[1];
				$path2    = $row[2];
				$ifmain   = $row[3];
				if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
				if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
				$db->query("DELETE FROM ".__TBL_GROUP_PHOTO__." WHERE id='$picid'");
				if ($ifmain==1)$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET picurl_s='',picurl_b='' WHERE id='$mainid'");
			}
		}
		$db->query("DELETE FROM ".__TBL_GROUP_PHOTO_KIND__." WHERE id='$classid'");
		header("Location: i_group_photo.php?mainid=".$mainid);
	break;
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
  <table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td width="493" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_photo.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”相册管理</td>
      <td width="177" bgcolor="FDEEF8"><a href=i_group_photo.php?submitok=add&mainid=<?php echo $mainid; ?>><img src="images/createroot.gif" title="创建目录" width="69" height="21" hspace="5" border="0" /></a> <a href="i_group_photo_up.php?photokind=<?php echo $photokind;?>&mainid=<?php echo $mainid; ?>"><img src="images/lkup.gif" title="上传照片" width="69" height="21" hspace="5" border="0" /></a></td>
    </tr>
  </table>
  <br />
<?php if ($submitok == 'add') {?>
      <br>
      <br>
      <br>
      <table width="165" height="124" border="0" cellpadding="0" cellspacing="0" background="images/rootbig.gif">
        <form action="i_group_photo.php" method="post">
          <tr>
            <td height="30" align="center" valign="bottom"><font color="#FF6600">名称： </font>
            <input name="title" type="text" class="input" style="background:#ffffff;border:#cccccc 1px solid;" size="12" maxlength="50"></td>
          </tr>
          <tr>
            <td height="30" align="center"><font color="#FF6600">排序：</font>
            <input name="num" type="text" class="input" style="background:#ffffff;border:#cccccc 1px solid;" value="0" size="12" maxlength="8"></td>
          </tr>
          <tr>
            <td align="center" valign="top" >　　
            <input type="submit" name="Submit" value="添加目录" class=buttonx></td>
          </tr>
          <tr>
            <td align="center" valign="top" ><input name="submitok" type="hidden" value="addupdate"><input name="mainid" type="hidden" value="<?php echo $mainid; ?>"></td>
          </tr>
        </form>
      </table>
      <br />
      <br />
      <br />      
      <img src="images/tips.gif" width="23" height="21" hspace="3" align="absmiddle" /><font color="#FF0000">排序值(从大到小排列)，必须为1~4位的整数数字，排序值越大越靠前。</font>
<?php
} else {
$rt = $db->query("SELECT * FROM ".__TBL_GROUP_PHOTO_KIND__." WHERE mainid=".$mainid." ORDER BY px DESC,id DESC");
$total = $db->num_rows($rt);
if($total>0){
	if ($p<1)$p=1;
?>
      <table width="650" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
<?php
	for($i=1;$i<=$total;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	
	$rtmail = $db->query("SELECT COUNT(id) FROM ".__TBL_GROUP_PHOTO__." WHERE kind='".$rows['id']."' AND mainid='$mainid'");
	if($db->num_rows($rtmail)){
		$rowsmail = $db->fetch_array($rtmail);
		$photocount = $rowsmail[0];
	}
	
?>
          <td align="center" style="padding-top:20px;padding-bottom:20px;"><table width="165" height="124" border="0" cellpadding="0" cellspacing="0" background="images/rootbig.gif">
              <form action="i_group_photo.php" method="post">
                <tr>
                  <td height="35" align="center" valign="bottom"><font color="#FF6600">名称： </font>
                      <input name="title" type="text" class="input" id="title" style="background:#ffffff;border:#cccccc 1px solid;" value="<?php echo stripslashes($rows['title']); ?>" size="12" maxlength="20"></td>
                </tr>
                <tr>
                  <td height="25" align="center"><font color="#FF6600">排序：</font>
                      <input name="num" type="text" class="input" style="background:#ffffff;border:#cccccc 1px solid;" value="<?php echo $rows['px'];?>" size="12" maxlength="20"></td>
                </tr>
                <tr>
                  <td align="center" valign="top" >　　　　
                   <input type="submit" name="Submit" value="修改" class=buttonx>　<a href="i_group_photo.php?submitok=delupdate&classid=<?php echo $rows['id']; ?>&mainid=<?php echo $mainid; ?>"  class="u333333" onClick="return confirm('确认删除？\n\n此操作将联动删除该分类下的所有内容。')"><img src="images/delx.gif" hspace="2" border="0">删除</a></td>
                </tr>
                <tr>
                  <td height="40" align="center" > 共有 <a href="i_group_photo_list.php?photokind=<?php echo $rows['id'] ?>&mainid=<?php echo $mainid; ?>" class="u2265B2"><font color="#FF0000" style="font-size:9pt;color:#red"><?php echo $photocount; ?></font></a> 张照片 <a href="i_group_photo_list.php?photokind=<?php echo $rows['id'] ?>&mainid=<?php echo $mainid; ?>"><img src="images/enter.gif" hspace="5" border="0" align="absmiddle"></a>
                      <input name="classid" type="hidden" value="<?php echo $rows['id'] ?>">
                      <input name="submitok" type="hidden" value="modupdate"><input name="mainid" type="hidden" value="<?php echo $mainid; ?>"></td>
                </tr>
              </form>
          </table></td>
          <?php if ($i % 3 == 0) {?>
        </tr>
        <tr>
          <?php } ?>
          <?php 	} ?>
        </tr>
    </table>
<br><br><br>
<img src="images/tips.gif" width="23" height="21" hspace="3" align="absmiddle" /><font color="#FF0000">排序值(从大到小排列)，必须为1~4位的整数数字，排序值越大越靠前。</font><br>
<?php 
} else {
?>
<br>
<br>
<br>
<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
    <td align=center bgcolor=#f3f3f3><font color="666666">..暂无圈子相册目录..<br>
          <br>
          <img src="images/add2.gif" width="11" height="12" hspace="3" align="absmiddle" /><b><a href=i_group_photo.php?submitok=add&mainid=<?php echo $mainid; ?>  onClick="return createroot()" class=uff6600>创建目录</a></b></font></td>
  </tr>
</table>
<br>
<br>
<?php }}?>
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