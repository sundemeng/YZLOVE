<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,9}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
if ($submitok == "addloveb"){
	if ( !ereg("^[0-9]{1,9}$",$form_loveb) || empty($form_loveb) )callmsg("请输入数字。","-1");
	$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND flag>0");
	if ($db->num_rows($rt)) {
		$row = $db->fetch_array($rt);
		$loveb = $row[0];
	}
	if (abs($form_loveb) > $loveb)callmsg("你的个人帐户没有这么多Love币。充值失败！","-1");
	$addtime = date("Y-m-d H:i:s");
	$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-".$form_loveb." WHERE id=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET qloveb=qloveb+".$form_loveb." WHERE id=".$mainid);
	$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$cook_userid','$cook_username','圈子充值扣除','-$form_loveb','$addtime')");
	header("Location: i_group_loveb.php?mainid=".$mainid);
}
$rt = $db->query("SELECT title,qloveb FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$maintitle = stripslashes($row[0]);
$qloveb = $row[1];
} else {
	callmsg("请求错误，没有操作权限!","-1");
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
      <td width="489" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />给“<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”圈子财富充值</td>
      <td width="181" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;">&nbsp;</td>
    </tr>
  </table>
<br />
<table width="392" height="49" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" style="font-size:10.3pt;font-weight:bold;color:#999999;">“<?php echo $maintitle; ?>”当前财富<img src="images/loveb.gif" width="16" height="16" hspace="2" />: <font color="#FF0000"><?php echo $qloveb; ?></font> 个Love币</td>
  </tr>
</table>
<br />
<table width="389" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="F3FAFE" style="border:#ddd 1px solid;">
  <form method="post" action="i_group_loveb.php">
    <tr bgcolor="#ECFAFF">
      <td width="208" height="3" align="right" bgcolor="#f8f8f8"><br />
            <br />
        请输入要充值数额：</td>
      <td width="332" height="0" bgcolor="#f8f8f8"><br />
          <br />
          <input name="form_loveb" type="text" class="input" id="form_loveb" size="8" maxlength="9" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;">
        个Love币。</td>
    </tr>
    <tr bgcolor="#ECFAFF">
      <td height="13" align="center" bgcolor="#f8f8f8"><input type="hidden" value="<?php echo $mainid; ?>" name="mainid" />
          <input type="hidden" value="addloveb" name="submitok" /></td>
      <td width="332" height="13" bgcolor="#f8f8f8"><img src="images/tips3.gif" width="11" height="15" hspace="3" vspace="10" align="absmiddle" />将从你的个人帐户中扣除给当前圈子。<br />
          <input type="submit" class="buttonx" value="开始充值">
          <br />
          <br />
          <br /></td>
    </tr>
  </form>
</table>
<br />
<br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>