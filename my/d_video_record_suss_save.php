<?php 
/**************************************************
Copyright (C) 2008 　扬 州交友 网  择交友友 2.0
作  者: supdes　
**************************************************/
require_once '../sub/init.php';
if (empty($flvname))callmsg("Forbidden!","-1");
$oldpic = $flvname.".jpg";
$oldflv = $flvname.".flv";
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
$flvname  = $_GET['flvname'];
$w = (int)$_POST['width'];
$h = (int)$_POST['height'];
$img = imagecreatetruecolor($w, $h);
imagefill($img, 0, 0, 0x669966);
$rows = 0;
$cols = 0;
for($rows = 0; $rows < $h; $rows++){
	$c_row = explode(",", $_POST['px' . $rows]);
	for($cols = 0; $cols < $w; $cols++){
		$value = $c_row[$cols];
		if($value != ""){
			$hex = $value;
			while(strlen($hex) < 6){
				$hex = "0" . $hex;
			}
			$r = hexdec(substr($hex, 0, 2));
			$g = hexdec(substr($hex, 2, 2));
			$b = hexdec(substr($hex, 4, 2));
			$test = imagecolorallocate($img, $r, $g, $b);
			imagesetpixel($img, $cols, $rows, $test);
		}
	}
}
$filepath = YZLOVE."up/".$Global['m_flvpath']."/".date("y")."/".date("md")."/";
$dbpath = date("y")."/".date("md")."/";
mkpath($filepath);
$tmpname = $cook_userid."_".cdstr(20);
$newpic = $tmpname.".jpg";
$newflv = $tmpname.".flv";
$destinationJPG = $filepath.$newpic;
imagejpeg($img,$destinationJPG,85);
imagedestroy($img);
$destinationFLV = $filepath.$newflv;
$addtime = date("Y-m-d H:i:s");
$path_s  = $dbpath.$newpic;
$path_b  = $dbpath.$newflv;
$flag = ($cook_grade > 1 )?1:0;
$db->query("INSERT INTO ".__TBL_VIDEO__."  (userid,path_s,path_b,title,content,flag,addtime,effectid,frameid) VALUES ('$cook_userid','$path_s','$path_b','$title','$content','$flag','$addtime','$effectID','$frameID')");
copy(YZLOVE."FMS/record/streams/_definst_/".$oldflv,$filepath.$newflv);
if (file_exists(YZLOVE."FMS/record/streams/_definst_/".$oldflv))unlink(YZLOVE."FMS/record/streams/_definst_/".$oldflv);
//
if ($flag == 1 ){
	$tmpid = $db->insert_id();
	$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1 AND b.grade>=3");
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows[0];
			$ugrade =  $rows[1];
			$uif2 =  $rows[2];
			if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
				$content = "在线录制了个视频<a href=".$Global['home_2domain']."/v".$tmpid.".html target=_blank  class=uDF2C91><img src=".$Global['up_2domain']."/photo/".$path_s." width=40 height=30 align=absmiddle hspace=5>点击查看</a>";
				$addtime = strtotime("now");
				$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
			}
		}
	}
}
//
//header("Location: d_video_list.php");
callmsg("视频录制成功！请等待客服中心审核，如果您是高级会员则直接通过!","d_video_list.php");
?>