<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ($submitok == 'delupdate'){
	if ( !ereg("^[1-8]{1}$",$rzid) || empty($rzid) )callmsg("Forbidden","-1");
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
	$rt = $db->query("SELECT path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=".$rzid);
	if ($db->num_rows($rt)) {
		$row = $db->fetch_array($rt);
		$path_b = $row[0];
	}
	if (!empty($path_b)){
		if (file_exists(YZLOVE."up/papers/".$path_b))unlink(YZLOVE."up/papers/".$path_b);
	}
	$db->query("DELETE FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=".$rzid);
	switch ($rzid) {
		case 1:$tmpsql = " ifphoto=0 ";break;
		case 2:$tmpsql = " ifbirthday=0 ";break;
		case 3:$tmpsql = " ifheigh=0 ";break;
		case 4:$tmpsql = " iflove=0 ";break;
		case 5:$tmpsql = " ifpay=0 ";break;
		case 6:$tmpsql = " ifedu=0 ";break;
		case 7:$tmpsql = " ifhouse=0 ";break;
		case 8:$tmpsql = " ifcar=0 ";break;
	}
	$db->query("UPDATE ".__TBL_MAIN__." SET ".$tmpsql." WHERE id=".$cook_userid);
}
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse,ifcar FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
if ($db->num_rows($rt)) {
$row = $db->fetch_array($rt);
$ifphoto       =$row[0];
$ifbirthday    =$row[1];
$ifheigh       =$row[2];
$ifedu         =$row[3];
$iflove        =$row[4];
$ifpay         =$row[5];
$ifhouse       =$row[6];
$ifcar         =$row[7];
} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
$tmprzflag = '<font color=#6F9F00>认证核实中</font>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:70px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:70px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:70px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
.iframebox {margin:15px 0 0 0;border:#f60 1px solid;display:none}
.iframebox .iframeclose {text-align:right;height:25px;line-height:25px;background:#fc0;font-weight:bold;color:#000}
.iframebox .iframeclose .iframecloseL {float:left;padding:0 0 0 8px;}
.iframebox .iframeclose .iframecloseR {float:right;padding:5px 8px 0 0;height:20px;line-height:15px;}
.iframebox .iframeclose .iframecloseR a:link,.iframecloseR a:active,.iframecloseR a:visited {color:#000;}
.iframebox .iframeclose .iframecloseR a:hover {color:#f00;}
</style>
</head>
<body>
<ul>
<li><a href="k_myloveb.php">我的帐户</a></li>
<li><a href="k_myloveb.php?submitok=list">消费清单</a></li>
<li><a href="k_vip.php">会员升级</a></li>
<li><a href="k_bidding.php">竞价排名</a></li>
<li><a href="k_homepage.php">装扮主页</a></li>
<li class='liselect'><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
  <br />
  <table width="670" height="30" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FBDDF1">
    <tr>
      <td width="41" align="right" bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:黑体,宋体"><img src="images/sfz2.gif" width="34" height="20" align="absmiddle" /></td>
      <td width="609" align="left" valign="top" bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:黑体,宋体;padding-top:6px">&nbsp;实名认证中心</td>
    </tr>
  </table>
  <br />
  <table width="670" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr>
      <td width="23" align="right" valign="top"><img src="images/tips.gif" width="23" height="21" /></td>
      <td width="627" valign="top" style="line-height:150%;color:#666666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />( 形象照、出生日期、婚姻状况、月收入、学历 )认证一项为一星，共五星(<img src="images/sfz_x.gif" width="9" height="9" /><img src="images/sfz_x.gif" width="9" height="9" /><img src="images/sfz_x.gif" width="9" height="9" /><img src="images/sfz_x.gif" width="9" height="9" /><img src="images/sfz_x.gif" width="9" height="9" />)，此星级会出现在你的个人主页中；最后三项( 身高、住房、汽车 )为附加认证，虽然没有星级，但在个人主页中会出现已认证标识。<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />您所上传的证件照片我们会替你严格保密，只核实您的身份标识之用，请放心上传。<br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />认证必要但不是必须的，凡经过认证的，您的真实诚信度将大大提高，您的受众率是没有经过认证的<font color="#FF0000">20倍</font>以上。<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />一旦认证后相关资料即被冻结，无法修改，如果要修改，请取消认证即可修改。<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />一经认证通过，我们将给予Love币的奖励。</td>
    </tr>
  </table>
  <br />
  <table width="670" height="64" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="FFF0F7">
    <tr>
      <td width="153" align="center"><b>认证项目</b></td>
      <td width="198" align="center"><b>证件图片</b></td>
      <td width="164" align="center"><b>当前状态</b></td>
      <td width="75" align="center"><b>相关操作</b></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=1");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>        
        <span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span>形 象 照<span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span></font></b></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid">
<?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?>	  </td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid">
<?php
if ($ifphoto == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid">
<?php if ($flag == 0 || $ifphoto == 1){ ?>
<a href="k_sfz.php?rzid=1&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
<?php } else {?>
<a href="k_sfz_up.php?rzid=1"><img src="images/sfzup.gif" /></a>
<?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=2");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        <span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span>出生日期<span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span><br />
      </font></b></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php
if ($ifbirthday == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid;font-size:14px">
        <?php if ($flag == 0 || $ifbirthday == 1){ ?>
        <a href="k_sfz.php?rzid=2&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=2"><img src="images/sfzup.gif" /></a>
        <?php }?>      </td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=4");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        <span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span>婚姻状况<span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span><br />
      </font></b></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php
if ($iflove == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid">
        <?php if ($flag == 0 || $iflove == 1){ ?>
        <a href="k_sfz.php?rzid=4&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=4"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=5");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        <span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span>月 收 入<span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span><br />
      </font></b></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php
if ($ifpay == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if ($flag == 0 || $ifpay == 1){ ?>
        <a href="k_sfz.php?rzid=5&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=5"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=6");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        <span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span>学　　历<span style="line-height:150%;color:#666666;"><img src="images/sfz_x.gif" width="9" height="9" /></span><br />
      </font></b></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php
if ($ifedu == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php if ($flag == 0 || $ifedu == 1){ ?>
        <a href="k_sfz.php?rzid=6&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=6"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=3");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        身　　高<br />
      </font></b></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php
if ($ifheigh == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if (empty($flag)){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if ($flag == 0 || $ifheigh == 1){ ?>
        <a href="k_sfz.php?rzid=3&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=3"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=7");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        住　　房<br />
      </font></b></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php
if ($ifhouse == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#FFFFFF" style="border-bottom:#dddddd 1px solid"><?php if ($flag == 0 || $ifhouse == 1){ ?>
        <a href="k_sfz.php?rzid=7&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=7"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid;font-size:14px"><b><font color="#DF2C91">
        <?php
$rtmail = $db->query("SELECT flag,path_b FROM ".__TBL_ATTESTATION__." WHERE userid=".$cook_userid." AND rzid=8");
if($db->num_rows($rtmail)){
	$rowsmail = $db->fetch_array($rtmail);
	$flag   = $rowsmail[0];
	$path_b = $rowsmail[1];
} else {
	$flag   = -1;
	$path_b = '';
}
?>
        汽　　车</font></b></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if (!empty($path_b)){
echo "<a href=".$Global['up_2domain']."/papers/".$path_b." target=_blank><img src=".$Global['up_2domain']."/papers/".$path_b." width=100 height=75 title='点击查看大图'></a>";
}
?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php
if ($ifcar == 1){
	echo "<img src='images/ok.gif' hspace='3'>已认证";
} else {
	$outflag = "<img src='images/delx.gif' hspace='3'>未认证";
	 if ($flag == 0){
	 	$outflag = $tmprzflag;
	 }
	 echo $outflag;
}?></td>
      <td align="center" bgcolor="#f3f3f3" style="border-bottom:#dddddd 1px solid"><?php if ($flag == 0 || $ifcar == 1){ ?>
        <a href="k_sfz.php?rzid=8&submitok=delupdate" onClick="return confirm('★真的要取消吗？ ')"><img src="images/sfzdel.gif" /></a>
        <?php } else {?>
        <a href="k_sfz_up.php?rzid=8"><img src="images/sfzup.gif" /></a>
        <?php }?></td>
    </tr>
  </table>
  <br />
  <br />
  <br />
  <br />
    <br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>