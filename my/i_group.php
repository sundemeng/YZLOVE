<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade = $row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

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
<li class="liselect"><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
<?php if ($data_grade <2 ) {?>
  <br>
  <br>
  <table width=300 height=150 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
    <tr>
      <td align=center bgcolor=#f3f3f3><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i><font color="666666"> 只有高级会员才可以创建。<br>
            <br>
        </font><br>
        <img src="images/ok.gif" width="14" height="14"><a href="k_bank.php" class="u666666"><b>立即升级</b></a>　　<img src="images/tips3.gif" width="11" height="15" hspace="5" align="absmiddle"><a href="k_vip.php" class="u666666">高级会员还有哪些特权？</a></td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <?php } else {?>
<?php
$rt=$db->query("SELECT id,title,flag,picurl_s,addtime FROM ".__TBL_GROUP_MAIN__." WHERE userid=".$cook_userid." ORDER BY id DESC");
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
<table width="680" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
<?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	if ($rows['flag']==1){
		$bg="bgcolor=#FDEEF8";
	} else {
		$bg="bgcolor=#FFFF88";
	}
?>
    <td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="265" border="0" cellpadding="4" cellspacing="0" bgcolor="cccccc" style="border:#eea7c5 1px dotted;">
      <tr>
        <td height="50" colspan="2" align="center" <?php echo  $bg; ?> style="line-height:150%"><a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank" class="u666666"><font style="font-size:10.3pt;">〖<b><?php echo  $rows['title']; ?></b>〗</font></a><?php
if ($rows['flag']==0){
	echo " (<font color=blue>未审核</font>)";
} elseif ($rows['flag'] == -1){
	echo " (<font color=blue>隐藏中</font>)";
}
?><br><font color="#999999" face="Arial, Helvetica, sans-serif">创建时间：<?php echo $rows['addtime']; ?></font></td>
        </tr>
      <tr>
        <td width="160" height="150" align="center" bgcolor="#FFFFFF" <?php echo  $bg; ?>><a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank">
<?php if (empty($rows['picurl_s'])) {?><img src="images/noqzphoto.gif" border="0"><?php }else{?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['picurl_s']; ?> alt="放大照片" border="0" class="img"><?php }?></a></td>
        <td width="87" height="200" align="center" bgcolor="#FFFFFF" style="line-height:200%;color:#cccccc;font-size:14px">
[ <a href="i_group_club.php?mainid=<?php echo $rows['id'];?>&submitok=list" class="uDF2C91">活动聚会</a> ]<br>

		[ <a href="i_group_modify.php?mainid=<?php echo $rows['id'];?>&maintitle=<?php echo  $rows['title']; ?>" class="uDF2C91">基本设置</a> ]<br>
          [ <a href="i_group_bk.php?mainid=<?php echo $rows['id'];?>" class="u6699cc">版块管理</a> ]<br>
[ <a href="i_group_photo.php?mainid=<?php echo $rows['id'];?>" class="u6699cc">群组相册</a> ]<br>
  
[ <a href="i_group_user.php?mainid=<?php echo $rows['id'];?>&submitok=list" class="u6699cc">成员管理</a> ]<br>

[ <a href="i_group_invite.php?mainid=<?php echo $rows['id'];?>" class="u6699cc">邀人加入</a> ]<br>

[ <a href="i_group_loveb.php?mainid=<?php echo $rows['id'];?>" class="u6699cc">群组充值</a> ]</td>
      </tr>
    </table></td>
    <?php if ($i % 2 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<table width="680" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="587" height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php } else { ?>
<br>
<br>
<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr>
  <td align=center bgcolor=#f3f3f3><font color="666666">..暂无群组..<br>
    <br>
    <img src="images/add2.gif" width="11" height="12" hspace="3" align="absmiddle"></font><b><a href="i_group_add.php" class="u666666">点此创建</a></b></td>
</tr></table>
<br>
<br>
<?php }?>
<?php }?>

  <br />
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>