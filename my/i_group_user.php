<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,9}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE userid=".$cook_userid." AND id=".$mainid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$maintitle = stripslashes($row['title']);
$userid_main = $row['userid'];
$userid1_main = $row['userid1'];
$userid2_main = $row['userid2'];
$userid3_main = $row['userid3'];
} else {
	callmsg("Forbidden!","-1");
}
if ($submitok == "delupdate"){
	if ( !ereg("^[0-9]{1,9}$",$classid) || empty($classid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_GROUP_USER__." WHERE id=".$classid);
	if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$memberid = $row[0];
	if ($memberid == $cook_userid)callmsg("创始人不能踢除！","-1");
	} else {
		callmsg("请求错误，没有操作权限!","-1");
	}
	$rt = $db->query("SELECT id FROM ".__TBL_GROUP_MAIN__." WHERE userid1=".$memberid." AND id=".$mainid);
	if($db->num_rows($rt)){
		$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET userid1=0,nicknamesexgradephoto_s1='' WHERE id=".$mainid);
	}
	$rt = $db->query("SELECT id FROM ".__TBL_GROUP_MAIN__." WHERE userid2=".$memberid." AND id=".$mainid);
	if($db->num_rows($rt)){
		$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET userid2=0,nicknamesexgradephoto_s2='' WHERE id=".$mainid);
	}
	$rt = $db->query("SELECT id FROM ".__TBL_GROUP_MAIN__." WHERE userid3=".$memberid." AND id=".$mainid);
	if($db->num_rows($rt)){
		$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET userid3=0,nicknamesexgradephoto_s3='' WHERE id=".$mainid);
	}
	$rt = $db->query("SELECT id FROM ".__TBL_GROUP_BK__." WHERE userid=".$memberid." AND mainid=".$mainid);
	if($db->num_rows($rt)){
		$db->query("UPDATE ".__TBL_GROUP_BK__." SET userid=0,nicknamesexgradephoto_s='' WHERE mainid=".$mainid);
	}
	$db->query("DELETE FROM ".__TBL_GROUP_USER__." WHERE id=".$classid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET allusrnum=allusrnum-1 WHERE id=".$mainid);
	header("Location: i_group_user.php?mainid=".$mainid."&p=".$p);
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
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;
/*
width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);
*/
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
<table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td width="498" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”成员管理</td>
      <td width="172" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/mail.gif" width="14" height="10" hspace="5" /><a href="i_group_gbookgf.php?mainid=<?php echo $mainid; ?>" class="u666666"><b>向圈内成员群发留言</b></a></td>
    </tr>
  </table>
<br />
<?php
$rt=$db->query("SELECT * FROM ".__TBL_GROUP_USER__." WHERE mainid=".$mainid." ORDER BY id DESC");
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
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
<?php
for($j=1;$j<=$pagesize;$j++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
    <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;border:#efefef 1px solid;"><table border="0" cellpadding="2" cellspacing="0" style="margin-bottom:5px">
      <tr>
        <td align="center" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;"><a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid']; ?>" target="_blank">
<?php 
$tmpusr = explode("|",$rows['nicknamesexgradephoto_s']);
$nicknameusr = $tmpusr[0];
$sexusr = $tmpusr[1];
$gradeusr = $tmpusr[2];
$photo_susr = $tmpusr[3];
if (empty($photo_susr)){
echo "<img src=".$Global['www_2domain']."/images/65x80".$sexusr.".gif border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_susr." width=65 height=80 border=0>";
}
?>
</a></td>
      </tr>
    </table>
        <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['userid'];?>" target="_blank"><?php echo geticon($sexusr.$gradeusr).$nicknameusr;?></a>
<table width="100" border="0" cellspacing="0" cellpadding="0" height="15">
          <tr>
            <td align="center"><font color="#999999"><?php echo $rows['addtime']; ?></font></td>
          </tr>
        </table>
        <table width="90" border="0" cellspacing="0" cellpadding="0" height="15">
          <tr>
            <td align="center"><?php getauthority($rows['userid']); ?></td>
          </tr>
        </table>
      <table width="91" height="20" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td align="center" valign="bottom"><a href="i_group_user.php?mainid=<?php echo $mainid; ?>&classid=<?php echo $rows['id'] ; ?>&submitok=delupdate&p=<?php echo $p; ?>" onclick="return confirm('确认踢除 “<?php echo $nicknameusr; ?>”？')" class="u666666"> <img src="images/delx.gif" hspace="3" border="0" align="absmiddle" />踢 除</a></td>
          </tr>
      </table>
      <br /></td>
    <?php if ($j % 5 == 0) {?>
  </tr>
  <tr>
    <?php	} ?>
    <?php } ?>
  </tr>
</table>
<table width="670" height="64" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="64" align="right" style="color:#666666;"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php } else {?>
<br />
<br />
<font color="#999999">...暂无会员...</font><br />
<br />
<br />
<br />
<?php }?>
<br />
<br />
<br /><br />
</div></div>
<?php
function getauthority($str) {
global $db,$mainid,$userid_main,$userid1_main,$userid2_main,$userid3_main;
$rtauthority = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_BK__." WHERE mainid=".$mainid." AND userid=".$str);
$rowauthority = $db->fetch_array($rtauthority);
$tmpcntauthority = $rowauthority[0];
if ($str == $userid_main) {
echo "<font color=red>会长(创始人)</font>";
} elseif ($str == $userid1_main || $str == $userid2_main || $str == $userid3_main) {
echo "<font color=red>副会长</font>";
} elseif ($tmpcntauthority >0 ) {
echo "<font color=ff6600>版主</font>";
}
}
require_once YZLOVE.'my/bottommy.php';?>