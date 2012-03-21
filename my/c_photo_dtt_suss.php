<?php 
/***************************************************
Copyright (C) 2008  扬州交友网  择交友友2.0
作  者: supdes 
***************************************************/
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
$w = (int)$_POST['width'];
$h = (int)$_POST['height'];
$img = imagecreatetruecolor($w, $h);
imagefill($img, 0, 0, 0x669966);
$rows = 0;$cols = 0;
for($rows = 0; $rows < $h; $rows++){
$c_row = explode(",", $_POST['px' . $rows]);
for($cols = 0; $cols < $w; $cols++){
$value = $c_row[$cols];
if($value != ""){
$hex = $value;
while(strlen($hex) < 6){
$hex = "0" . $hex;}
$r = hexdec(substr($hex, 0, 2));
$g = hexdec(substr($hex, 2, 2));
$b = hexdec(substr($hex, 4, 2));
$test = imagecolorallocate($img, $r, $g, $b);
imagesetpixel($img, $cols, $rows, $test);
}}}
$filepath = YZLOVE."up/photo/".date("y")."/".date("md")."/";
mkpath($filepath);
$dbpath = date("y")."/".date("md")."/";
$filename = $cook_userid."_".cdstr(20).".jpg";
$destination =  $filepath."b_".$filename; 
imagejpeg($img,$destination,85);
imagedestroy($img);
$path_s = $dbpath."s_".$filename; 
$path_b = $dbpath."b_".$filename;
$RESIZEWIDTH=100;$RESIZEHEIGHT=100;
$im = imagecreatefromjpeg($destination);
makexiao($im,$RESIZEWIDTH,$RESIZEHEIGHT,$filepath.'s_'.$filename);
imagedestroy ($im);
$addtime = date("Y-m-d H:i:s");
$db->query("INSERT INTO ".__TBL_PHOTO__."  (userid,path_s,path_b,title,addtime) VALUES ('$cook_userid','$path_s','$path_b','$title','$addtime')");
//
	$tmpid = $db->insert_id();
	$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1");
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows[0];
			$ugrade =  $rows[1];
			$uif2 =  $rows[2];
			if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
				$content = "在线用摄像头拍了张照片<a href=".$Global['up_2domain']."/photo/".$path_b." target=_blank  class=uDF2C91><img src=".$Global['up_2domain']."/photo/".$path_s." width=40 height=30 align=absmiddle hspace=5>点击查看</a>";
				$addtime = strtotime("now");
				$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
			}
		}
	}
//
//header("Location: c_photo_list.php");
callmsg("拍照成功！请等待客服审核，通过后方可设置形象照和在个人主页显示。","c_photo_list.php");
function makexiao($im,$maxwidth,$maxheight,$name){
global $filepath;
$width = imagesx($im);
$height = imagesy($im);
if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
if($maxwidth && $width > $maxwidth){
$widthratio = $maxwidth/$width;
$RESIZEWIDTH=true;}
if($maxheight && $height > $maxheight){
$heightratio = $maxheight/$height;
$RESIZEHEIGHT=true;}
if($RESIZEWIDTH && $RESIZEHEIGHT){
if($widthratio < $heightratio){
$ratio = $widthratio;}else{
$ratio = $heightratio;}
}elseif($RESIZEWIDTH){
$ratio = $widthratio;
}elseif($RESIZEHEIGHT){
$ratio = $heightratio;}
$newwidth = $width * $ratio;
$newheight = $height * $ratio;
if(function_exists("imagecopyresampled")){
$newim = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);}else{
$newim = imagecreate($newwidth, $newheight);
imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);}
imagejpeg ($newim,$name);
imagedestroy ($newim);}else{
imagejpeg ($im,$name);
imagedestroy ($im);}}
?>
