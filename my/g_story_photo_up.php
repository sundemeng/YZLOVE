<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid) )callmsg("Forbidden!","-1");
if ($submitok == "upload"){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png'); 
	$max_file_size=900000;
	$watermark=1; //(1加,其他不加); 
	$watertype=2; //(1字,2图) 
	$waterstring = $Global['m_waterimg'];
	$waterimg = 'images/waterimg.png';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		if (empty($title))callmsg("照片说明不能为空","-1");
		$file = $_FILES["pic"];
		if($max_file_size < $file["size"])callmsg("照片太大，不得超过900K，请检查!","-1");
		if(!in_array($file["type"], $uptypes))callmsg("照片类型不符，只能是.jpg或.gif格式，请检查1","-1");
		$iinfo1=getimagesize($file[tmp_name],$iinfo1); 
		switch ($iinfo1[2]) { 
			case 1:$simage =imagecreatefromgif($file[tmp_name]);break; 
			case 2:$simage =imagecreatefromjpeg($file[tmp_name]);break; 
			case 3:$simage =imagecreatefrompng($file[tmp_name]);break; 
			case 6:$simage =imagecreatefromwbmp($file[tmp_name]);break; 
		} 
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic".$i];
		$filepath = YZLOVE."up/photo/".date("y")."/".date("md")."/";
		$dbpath = date("y")."/".date("md")."/";
		mkpath($filepath);
		$savename = $cook_userid."_".cdstr(20).".";
		$filename=$file["tmp_name"];
		$image_size = getimagesize($filename); 
		$pinfo=pathinfo($file["name"]); 
		$ftype=$pinfo['extension']; 
		$destination =  $filepath."b_".$savename.$ftype; 
		if(!move_uploaded_file ($filename, $destination)) callmsg("移动照片出错","-1");
		$path_s = $dbpath."s_".$savename.$ftype;
		$path_b = $dbpath."b_".$savename.$ftype;
		// 缩略开始
		$RESIZEWIDTH=140;
		$RESIZEHEIGHT=140;
		$RESIZEWIDTH2=500;
		$RESIZEHEIGHT2=500;
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH2,$RESIZEHEIGHT2,$destination,$ftype);
		imagedestroy ($im);
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH,$RESIZEHEIGHT,$filepath."s_".$savename.$ftype,$ftype);
		imagedestroy ($im);
		$image_size = getimagesize($destination);
		//大图水开始
		if($watermark==1) { 
			$iinfo=getimagesize($destination,$iinfo); 
			$nimage=imagecreatetruecolor($image_size[0],$image_size[1]); 
			$white=imagecolorallocate($nimage,255,255,255); 
			$black=imagecolorallocate($nimage,0,0,0); 
			$red=imagecolorallocate($nimage,255,0,0); 
			imagefill($nimage,0,0,$white); 
			switch ($iinfo[2]) { 
				case 1:$simage =imagecreatefromgif($destination);break; 
				case 2:$simage =imagecreatefromjpeg($destination);break; 
				case 3:$simage =imagecreatefrompng($destination);break; 
				case 6:$simage =imagecreatefromwbmp($destination);break; 
				default:callmsg("不支持的文件类型","-1");
			} 
			imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]); 
			switch($watertype) { 
			case 1: //字符 
				imagefilledrectangle($nimage,$image_size[0],$image_size[1],$image_size[0]-140,$image_size[1]-20,$white); 
				imagestring($nimage,5,$image_size[0]-130,$image_size[1]-20,$waterstring,$black); 
				break; 
			case 2: //图片 
				$simage1 =imagecreatefrompng($waterimg); 
				imagecopy($nimage,$simage1,$image_size[0]-160,$image_size[1]-70,0,0,160,70); 
				imagedestroy($simage1); 
				break; 
			} 
			switch ($iinfo[2]) { 
				case 1:imagegif($nimage, $destination);break; 
				case 2:imagejpeg($nimage, $destination);break; 
				case 3:imagepng($nimage, $destination);break; 
				case 6:imagewbmp($nimage, $destination);break; 
			} 
			imagedestroy($nimage); 
			imagedestroy($simage); 
		}
		//大图水结束
		$addtime = date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_STORY_PHOTO__." (fid,title,path_s,path_b,addtime) VALUES ('$fid','$title','$path_s','$path_b','$addtime')");
		$tmpphotoid = $db->insert_id();
		$rt = $db->query("SELECT picurl_s FROM ".__TBL_STORY__." WHERE id=".$fid);
		$total = $db->num_rows($rt);
		if($total > 0){
			$row = $db->fetch_array($rt);
			if (empty($row[0])) {
				$db->query("UPDATE ".__TBL_STORY__." SET picurl_s='$path_s' WHERE id='$fid'");
				$db->query("UPDATE ".__TBL_STORY_PHOTO__." SET ifmain=1 WHERE id='$tmpphotoid'");
			}
		} else {
			callmsg("成功故事参数错误1！!","-1");
		}
	}//upload end
	header("Location: g_story_photo_list.php?fid=".$fid."&storytitle=".$storytitle);
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
ul li a:link,li a:active,li a:visited{width:74px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:74px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:74px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:74px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list" || $submitok == "mod")echo "class='liselect'"; ?>><a href="g_story.php?submitok=list">我的故事</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="g_story.php?submitok=add">发布故事</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <br />
<table width="550" height="34" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><br>
            <font color="6699cc" style="font-size:10.3pt;"><b>...上传你们的甜蜜照片...</b></font><br>
            <br>
            <br>
          <img src="images/19.gif" width="16" height="16" hspace="3" align="absmiddle">【<?php echo $storytitle; ?>】<a href="g_story_photo_list.php?fid=<?php echo $fid; ?>&storytitle=<?php echo $storytitle;?>" class="uDF2C91">成功故事照片列表</a> <br>
          <br>
          <br></td>
        </tr>
    </table>
      <script language="javascript" src="images/chkphoto.js"></script>
      <table width="471" border="0" cellpadding="3" cellspacing="0" bgcolor="FFF0F7" style="border:#FFD0E7 1px solid;">
        <form action="" method="post" enctype="multipart/form-data" name="up" id="up" onSubmit="return showtype()">
          <tr>
            <td width="122" height="40" align="right"><font color="#999999"><br>
              <br>
              <font color="FF6C96">照片简单说明：</font></font></td>
            <td width="335" style="line-height:200%;font-size:10.3pt;color:33333;"><br>
            <input name="title" type="text" id="title" size="40" maxlength="50" class="input" style="background:#ffffff;"><input type=hidden name=submitok value="upload"><input type=hidden name=clubtitle value="<?php echo $clubtitle; ?>"><input type=hidden name=fid value="<?php echo $fid; ?>"></td>
          </tr>
          <tr>
            <td width="122" height="40" align="right"><font color="FF6C96">请选择本机照片：</font></td>
            <td width="335"">
              <input name="pic" type="file" id="inp"  size="42"  class="input" style="background:#ffffff;height:21px">
            </td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td><input type="submit" name="Submit" value="开始上传" class="button">
              <br>
              <br>
            <br></td>
          </tr>
        </form>
      </table>
      <br />
      <br />
      <br />
      <br />
      <br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';
function makexiao($im,$maxwidth,$maxheight,$name,$ftype){
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
$ratio = $widthratio;
}else{
$ratio = $heightratio;}
}elseif($RESIZEWIDTH){
$ratio = $widthratio;
}elseif($RESIZEHEIGHT){
$ratio = $heightratio;}
$newwidth = $width * $ratio;
$newheight = $height * $ratio;
if(function_exists("imagecopyresampled")){
$newim = imagecreatetruecolor($newwidth, $newheight);
imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
}else{
$newim = imagecreate($newwidth, $newheight);
imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);}
if ($ftype == "jpg" || $ftype == "JPG"){
imagejpeg($newim,$name);
} else {
imagegif($newim,$name);}	
imagedestroy ($newim);
}else{
if ($ftype == "jpg" || $ftype == "JPG"){
imagejpeg ($im,$name);
} else {
imagegif($im,$name);}	
imagedestroy ($im);}}
?>