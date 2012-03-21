<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
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
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;

width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);

}
</style>
</head>
<body>
<ul>
<li><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li class="liselect"><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
<?php
$rt=$db->query("SELECT a.addtime,b.id,b.title,b.picurl_s FROM ".__TBL_GROUP_USER__." a,".__TBL_GROUP_MAIN__." b WHERE a.mainid=b.id AND a.userid=".$cook_userid." AND b.flag=1 ORDER BY a.id DESC");
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
<table width="670" border="0" align="center" cellpadding="2" cellspacing="0">
<tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
<td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="150" border="0" cellpadding="4" cellspacing="0" style="border:#dddddd 1px solid;">
<tr>
<td width="150" height="150" align="center" bgcolor="#FFFFFF" <?php echo  $bg; ?>><a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank"><?php if (empty($rows['picurl_s'])) {?><img src="images/noqzphoto.gif" border="0"><?php }else{?><img src=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['picurl_s']; ?> title="放大照片" border="0" class="img"><?php }?></a></td>
</tr>
<tr>
<td height="60" align="center" bgcolor="#FFFFFF"><font color="#666666" style="font-size:10.3pt;">〖<b><a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank"><?php echo  $rows['title']; ?></a></b>〗</font><br>
  <font color="#999999"><?php echo $rows['addtime']; ?></font><br>
[ <a href="i_group_loveb.php?mainid=<?php echo $rows['id'];?>" class="uff6600">圈子充值</a> ]</td>
</tr>
</table></td>
<?php if ($i % 4 == 0) {?>
</tr>
<tr>
<?php }} ?>
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
<table width=300 height=150 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
<td align=center bgcolor=#f3f3f3><font color="666666">..暂无圈子..<br>
<br>
<img src="images/add.gif" width="20" height="20" hspace="3" align="absmiddle"><b><a href="i_group_add.php" class="uff6600">我来创建一个</a></b></font></td>
</tr></table>
<br>
<br>
<?php }?>

<br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>