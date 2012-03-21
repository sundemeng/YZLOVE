<?php 
/**************************************************
Copyright (C) 2008 　扬 州交友 网  择交友友 2.0
作  者: supdes　
**************************************************/
require_once '../sub/init.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid))exit;
$a = explode('px',$left);$left = $a[0];$a = explode('px',$top);$top = $a[0];
$x = $left;$y = $top;//left,top
$w = $width;$h = $height;//最终宽度，高度
$Pic = '../up/photo/'.$photo;
$ext_name = getfiletype($Pic);
if (empty($j)){
	if ($ext_name == 'gif' || $ext_name == 'GIF'){
		header("Content-type:image/gif");
	} else {
		header("Content-type:image/jpeg");  
	}
}
$PicWidth = 429;
$PicHeight = 346;
$end_w = 110;$end_h = 135;$end_x = 168;$end_y = 101;
//画出原始大图
if ($ext_name == 'gif' || $ext_name == 'GIF'){
	$im = imagecreatefromgif($Pic);
} else {
	$im = imagecreatefromjpeg($Pic);
}
$Width=imagesx($im);
$Height=imagesy($im);
//缩略
if ( ($Width < $w) && ($Height < $h) ){
	if ($h < $w){$t = $h;}else {$t = $w;}
	$im = makebig2($im,$t,$t,$ext_name);
} elseif ( ($Width > $w) && ($Height > $h) ) {
	if ($h > $w){$t = $h;}else {$t = $w;}
	$im = makexiao2($im,$t,$t,$ext_name);
}
switch ($i) {
case 1:$im=imagerotate($im,-90,0);break;
case 2:$im=imagerotate($im,180,0);break;
case 3:$im=imagerotate($im,90,0);break;}
//操作后角度和宽,高
$w=imagesx($im);$h=imagesy($im);
//获取框内图
if ($ext_name == 'gif' || $ext_name == 'GIF'){
	$newim = imagecreate($PicWidth, $PicHeight);
	imagecopyresized($newim, $im, $x-30, $y-76, 0, 0, $w, $h, $w, $h);
	$endim = imagecreate($end_w, $end_h);
	imagecopyresized($endim, $newim, 0, 0, $end_x, $end_y, $end_w, $end_h, $end_w, $end_h);
} else {
	$newim = imagecreatetruecolor($PicWidth, $PicHeight);
	imagecopyresampled($newim, $im, $x-30, $y-76, 0, 0, $w, $h, $w, $h);
	$endim = imagecreatetruecolor($end_w, $end_h);
	imagecopyresampled($endim, $newim, 0, 0, $end_x, $end_y, $end_w, $end_h, $end_w, $end_h);
}
imagedestroy($im);
imagedestroy($newim);
if ($j == 'o'){
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT photo_s FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
	if ($db->num_rows($rt)) {
		$row = $db->fetch_array($rt);
		$data_photo_s=$row[0];
	} else {
		callmsg("Forbidden","-1");
	}
	if (!empty($data_photo_s)){
		//if (file_exists(YZLOVE."up/photo/".$data_photo_s))unlink(YZLOVE."up/photo/".$data_photo_s);
		//$db->query("DELETE FROM ".__TBL_PHOTO__." WHERE path_s='$data_photo_s' AND userid=".$cook_userid);
	}
	$filepath = YZLOVE."up/photo/m/".date("Ym")."/";
	$dbpath = 'm/'.date("Ym")."/";
	mkpath($filepath);
	$savename = $cook_userid.".".$ext_name;
	$destinationname = $filepath.$savename;
	$path_s = $dbpath.$savename;
	imagejpeg($endim,$destinationname);
	imagedestroy ($endim);
	$db->query("UPDATE ".__TBL_MAIN__." SET photo_s='$path_s' WHERE id=".$cook_userid);
	$db->query("UPDATE ".__TBL_ONLINE__." SET p=1 WHERE userid=".$cook_userid);
	setcookie("cook_photo_s",$path_s,null,"/",$Global['m_cookdomain']);  
	//同步
	$rt = $db->query("SELECT nickname,grade,sex,photo_s FROM ".__TBL_MAIN__." WHERE id=".$cook_userid);
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		$row = $db->fetch_array($rt);
		$data_nickname= $row[0];
		$data_grade= $row[1];
		$data_sex= $row[2];
		$data_photo_s= $row[3];
		$nicknamesexgradephoto_s = $data_nickname."|".$data_sex."|".$data_grade."|".$data_photo_s;
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s1='$nicknamesexgradephoto_s' WHERE userid1=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s2='$nicknamesexgradephoto_s' WHERE userid2=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s3='$nicknamesexgradephoto_s' WHERE userid3=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_USER__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_BK__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET endnicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE enduserid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_CLUB_USER__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_CLUB_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY__." SET nicknamesexgradephoto_s2='$nicknamesexgradephoto_s' WHERE userid2=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	//同步end
	callmsg("保存形象照成功!","c_photo_main.php");
} else {
	imagejpeg($endim);imagedestroy ($endim);
}
function makebig2($im,$maxwidth,$maxheight,$ext_name){
	$width = imagesx($im);
	$height = imagesy($im);
	if(($maxwidth && $width < $maxwidth) || ($maxheight && $height < $maxheight)){
		if($maxwidth && $width < $maxwidth){
			$widthratio = $maxwidth/$width;
			$RESIZEWIDTH=true;
		}
		if($maxheight && $height < $maxheight){
			$heightratio = $maxheight/$height;
			$RESIZEHEIGHT=true;
		}
		if($RESIZEWIDTH && $RESIZEHEIGHT){
			if($widthratio > $heightratio){
				$ratio = $widthratio;
			}else{
				$ratio = $heightratio;
			}
		}elseif($RESIZEWIDTH){
			$ratio = $widthratio;
		}elseif($RESIZEHEIGHT){
			$ratio = $heightratio;
		}
		$newwidth = $width * $ratio;
		$newheight = $height * $ratio;
		if ($ext_name == 'gif' || $ext_name == 'GIF'){
			$newim = imagecreate($newwidth, $newheight);
			imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}else{
			$newim = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}
	}
	return $newim;
}
function makexiao2($im,$maxwidth,$maxheight,$ext_name){
	$width = imagesx($im);
	$height = imagesy($im);
	if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
		if($maxwidth && $width > $maxwidth){
			$widthratio = $maxwidth/$width;
			$RESIZEWIDTH=true;
		}
		if($maxheight && $height > $maxheight){
			$heightratio = $maxheight/$height;
			$RESIZEHEIGHT=true;
		}
		if($RESIZEWIDTH && $RESIZEHEIGHT){
			if($widthratio < $heightratio){
				$ratio = $widthratio;
			}else{
				$ratio = $heightratio;
			}
		}elseif($RESIZEWIDTH){
			$ratio = $widthratio;
		}elseif($RESIZEHEIGHT){
			$ratio = $heightratio;
		}
		$newwidth = $width * $ratio;
		$newheight = $height * $ratio;
		if ($ext_name == 'gif' || $ext_name == 'GIF'){
			$newim = imagecreate($newwidth, $newheight);
			imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}else{
			$newim = imagecreatetruecolor($newwidth, $newheight);
			imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}
	}
	return $newim;
}
function getfiletype($fname){
    $farray=explode(".",$fname);
    $type=array_pop($farray);
    return $type;
}
?>
