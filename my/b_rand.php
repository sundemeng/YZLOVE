<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {
require_once YZLOVE.'sub/conn.php';
$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
$rt = $db->query("SELECT userid,sex,photo_s,video_s,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse,ifcar,birthday1,birthday2,kind,area1,area2,area3,area4,love,heigh1,heigh2,weigh1,weigh2,house,car,edu,pay,field,job,smoking,drink FROM ".__TBL_REQUEST__." WHERE userid='$cook_userid'");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$userid = $row[0];
	$sex = $row[1];
	$photo_s = $row[2];
	$video_s = $row[3];
	$ifphoto = $row[4];
	$ifbirthday = $row[5];
	$ifheigh = $row[6];
	$ifedu = $row[7];
	$iflove = $row[8];
	$ifpay = $row[8];
	$ifhouse = $row[10];
	$ifcar = $row[11];
	$birthday1 = $row[12];
	$birthday2 = $row[13];
	$kind = $row[14];
	$area1 = $row[15];
	$area2 = $row[16];
	$area3 = $row[17];
	$area4 = $row[18];
	$love = $row[19];
	$heigh1 = $row[20];
	$heigh2 = $row[21];
	$weigh1 = $row[22];
	$weigh2 = $row[23];
	$house = $row[24];
	$car = $row[25];
	$edu = $row[26];
	$pay = $row[27];
	$field = $row[28];
	$job = $row[29];
	$smoking = $row[30];
	$drink = $row[31];
} else {
	//callmsg("Forbidden222!","-1");
	if ($cook_sex == 1)$tmpsex=2;
	if ($cook_sex == 2)$tmpsex=1;
	$db->query("INSERT INTO ".__TBL_REQUEST__." (userid,sex,kind) VALUES ($cook_userid,$tmpsex,0)");
	header("Location: b_rand.php");
}
$searchsql = "SELECT id FROM ".__TBL_MAIN__." WHERE ";
$tempsql = "";
if (!empty($sex))$tempsql      .= " sex='$sex' AND ";
if ($photo_s == 1)$tempsql     .= " photo_s<>'' AND ";
if ($video_s == 1)$tempsql     .= " video_s=1 AND ";
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
$searchsql .= $tempsql." flag > 0 ORDER BY rand() LIMIT 1";
$rt = $db->query($searchsql);
if ($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	$userid = $row[0];
	header("Location: ".$Global['home_2domain']."/".$userid);
} else {
	callmsg("没有找到符合你条件的Ta！","0");
}
?>
