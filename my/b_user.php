<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;}
.main1_tselect {float:left;width:64px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:64px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;text-align:center;}
.STYLE1 {background:#F8FCF5; border:#ccc 1px solid; height:17px; font-family:Arial,宋体; font-size: 9pt;}
--> 
</style>
</head>
<body>
<div class="main1">
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_gbook.php?submitok=list" class="a333">收 件 箱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_gbook2.php" class="a333">发 件 箱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend.php" class="a333">我的好友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend_news.php" class="a333">好友动态</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_blacklist.php" class="a333">黑 名 单</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">征友要求</a></div>
<div class="main1_tselect"><a href="b_user.php" class="a6F9F00">速配结果</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">弹出缘分</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">最近访客</a></div>
</div>
<div class="main2">
<div class="main2_frame"><br>
<?php 
$rt = $db->query("SELECT userid,sex,photo_s,video_s,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse,ifcar,birthday1,birthday2,kind,area1,area2,area3,area4,love,heigh1,heigh2,weigh1,weigh2,house,car,edu,pay,field,job,smoking,drink FROM ".__TBL_REQUEST__." WHERE userid='$cook_userid'");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$userid  = $row[0];
	$sex     = $row[1];
	$photo_s = $row[2];
	$video_s = $row[3];
	$ifphoto = $row[4];
	$ifbirthday = $row[5];
	$ifheigh = $row[6];
	$ifedu   = $row[7];
	$iflove  = $row[8];
	$ifpay   = $row[9];
	$ifhouse = $row[10];
	$ifcar = $row[11];
	$birthday1 = $row[12];
	$birthday2 = $row[13];
	$kind    = $row[14];
	$area1   = $row[15];
	$area2   = $row[16];
	$area3   = $row[17];
	$area4   = $row[18];
	$love    = $row[19];
	$heigh1  = $row[20];
	$heigh2  = $row[21];
	$weigh1  = $row[22];
	$weigh2  = $row[23];
	$house   = $row[24];
	$car     = $row[25];
	$edu     = $row[26];
	$pay     = $row[27];
	$field   = $row[28];
	$job     = $row[29];
	$smoking = $row[30];
	$drink   = $row[31];
}
$searchsql = "SELECT id,nickname,grade,sex,photo_s FROM ".__TBL_MAIN__." WHERE ";
$tempsql = "";
if (!empty($sex))$tempsql      .= " sex='$sex' AND ";
if ($photo_s == 1)$tempsql     .= " photo_s<>'' AND ";
if ($video_s == 1)$tempsql     .= " video_s<>'' AND ";
if ($ifphoto == 1)$tempsql     .= " ifphoto=1 AND ";
if ($ifbirthday == 1)$tempsql  .= " ifbirthday=1 AND ";
if ($ifheigh == 1)$tempsql     .= " ifheigh=1 AND ";
if ($ifedu == 1)$tempsql       .= " ifedu=1 AND ";
if ($iflove == 1)$tempsql      .= " iflove=1 AND ";
if ($ifpay == 1)$tempsql       .= " ifpay=1 AND ";
if ($ifhouse == 1)$tempsql     .= " ifhouse=1 AND ";
if ($ifcar == 1)$tempsql       .= " ifcar=1 AND ";
if (!empty($birthday1))$tempsql.= " ( YEAR(NOW()) - YEAR(birthday) >= '$birthday1' ) AND ";
if (!empty($birthday2))$tempsql.= " ( YEAR(NOW()) - YEAR(birthday) <= '$birthday2' ) AND ";
if (!empty($kind))$tempsql     .= " kind='$kind' AND ";
if (!empty($area1))$tempsql    .= " area1 = '$area1' AND area2 = '$area2' AND ";
if (!empty($area3))$tempsql    .= " area3 = '$area3' AND area4 = '$area4' AND ";
if (!empty($love))$tempsql     .= " love='$love' AND ";
if (!empty($heigh1))$tempsql   .= " ( heigh >= '$heigh1' ) AND ";
if (!empty($heigh2))$tempsql   .= " ( heigh <= '$heigh2' ) AND ";
if (!empty($weigh1))$tempsql   .= " ( weigh >= '$weigh1' ) AND ";
if (!empty($weigh2))$tempsql   .= " ( weigh <= '$weigh2' ) AND ";
if (!empty($house))$tempsql    .= " house='$house' AND ";
if (!empty($car))$tempsql      .= " car='$car' AND ";
if (!empty($edu))$tempsql      .= " edu='$edu' AND ";
if (!empty($pay))$tempsql      .= " pay='$pay' AND ";
if (!empty($field))$tempsql    .= " field='$field' AND ";
if (!empty($job))$tempsql      .= " job='$job' AND ";
if (!empty($smoking))$tempsql  .= " smoking='$smoking' AND ";
if (!empty($drink))$tempsql    .= " drink='$drink' AND ";
/*
$searchsql = "SELECT id,nickname,grade,sex,photo_s FROM `gsc_main` AS t1 
JOIN (	SELECT ROUND(RAND() * (		(SELECT MAX(id) FROM `gsc_main`)-(SELECT MIN(id) FROM `gsc_main`)	)+(SELECT MIN(id) FROM `gsc_main`)	) AS id2	) AS t2
WHERE t1.id >= t2.id2
ORDER BY t1.id LIMIT 20;"; 
*/
//	$searchsql .= $tempsql." flag=1 AND id >=  (	SELECT ROUND(	RAND()*((SELECT MAX(id) FROM gsc_main)-(SELECT MIN(id) FROM gsc_main)) + (SELECT MIN(id) FROM gsc_main)	)	)          ORDER BY id LIMIT 20";
$searchsql .= $tempsql." flag=1 ORDER BY rand() LIMIT 20";
?>
<?php
$rttop1 = $db->query($searchsql);
$totaltop1 = $db->num_rows($rttop1);
if($totaltop1>0){
?>
<table width="103" height="30" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="ffcc00">
  <tr>
    <td align="center" bgcolor="ffffcc"><a href="javascript:location.reload()" ><img src="images/refresh.gif" alt="重新筛选" hspace="3" border="0" align="absmiddle"><font color="#FF0000"><u>重新筛选</u></font></a></td>
  </tr>
</table>
<table width="650" height="44" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid;">
  <tr>
    <td align="center" style="color:#666;"><img src="images/tips3.gif" width="11" height="15" hspace="5" vspace="8" align="absmiddle" />下面显示的是系统根据您的“<a href="b_request.php" class="uDF2C91">征友要求</a>”随机速配筛选的<?php echo $totaltop1; ?>名会员。　　　　<img src="images/modx.gif" hspace="3" align="absmiddle" /><a href="b_request.php" class="u666666"><b>重新设置征友要求</b></a></td>
  </tr>
</table>
<br />
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
<?php
for($j=1;$j<=$totaltop1;$j++) {
	$rowstop1 = $db->fetch_array($rttop1);
	if(!$rowstop1) break;
	$userid = $rowstop1[0];
	$nickname = $rowstop1[1];	
	$grade = $rowstop1[2];
	$sex = $rowstop1[3];
	$photo_s = $rowstop1[4];
?>
    <td align="center" valign="top" style="padding-top:10px;padding-bottom:10px;"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid; ?>" target="_blank"><?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/nopic".$sex.".gif width=110 height=135 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=110 height=135 border=0>";
}
?></a></td>
      </tr>
    </table>
        <table width="50" height="5" border="0" align="center" cellpadding="0" cellspacing="0" >
          <tr>
            <td align="center" valign="top"></td>
          </tr>
        </table>
      <a href="<?php echo $Global['home_2domain']; ?>/<?php echo $userid;?>" target=_blank><?php echo geticon($sex.$grade).$nickname;?></a></td>
    <?php if ($j % 4 == 0) {?>
  </tr>
  <tr>
    <?php	} ?>
    <?php } ?>
  </tr>
</table>
<?php } else {?>
<br>
<br>
<font color="#999999">...没有找到，你可以放宽征友要求，这样机率会大一点...</font>
<?php }?>
  <br />
  <table width="650" height="44" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;">
    <tr>
      <td align="center" style="color:#666;"><br />
      <table width="103" height="30" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="ffcc00">
        <tr>
          <td align="center" bgcolor="ffffcc"><a href="javascript:location.reload()" ><img src="images/refresh.gif" alt="重新筛选" hspace="3" border="0" align="absmiddle"><font color="#FF0000"><u>重新筛选</u></font></a></td>
    </tr>
</table></td></tr>
  </table>
  <br>
<br />
<br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>