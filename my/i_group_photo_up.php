<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,userid FROM ".__TBL_GROUP_MAIN__." WHERE userid=".$cook_userid." AND id=".$mainid);
$total = $db->num_rows($rt);
if($total > 0){
	$row = $db->fetch_array($rt);
	$maintitle = $row[0];
	$memberid  = $row[1];
	if ($memberid !== $cook_userid)callmsg("用户验证错误，操作失败！","-1");
} else {
	callmsg("Forbidden!","-1");
}
if ($submitok == "upload"){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png'); 
	$max_file_size=900000;
	$watermark=1; //(1加,其他不加); 
	$watertype=2; //(1字,2图) 
	$waterstring = $Global['m_waterimg'];
	$waterimg = 'images/waterimg.png';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
		$file = $_FILES["pic".$i];
		if($max_file_size < $file["size"])callmsg("照片太大，不得超过900K，请检查!","-1");
		if(!in_array($file["type"], $uptypes))callmsg("照片类型不符，只能是.jpg或.gif格式，请检查1","-1");
		if (!is_numeric($photokind) || $title == "" )callmsg("照片说明不能为空","-1");
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
		$RESIZEWIDTH=240;
		$RESIZEHEIGHT=180;
		$RESIZEWIDTH2=700;
		$RESIZEHEIGHT2=700;
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
		$db->query("INSERT INTO ".__TBL_GROUP_PHOTO__." (kind,mainid,title,path_s,path_b,addtime) VALUES ('$photokind','$mainid','$title','$path_s','$path_b','$addtime')");
		$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET photonum=photonum+1 WHERE id=".$mainid);
		header("Location: i_group_photo_list.php?photokind=$photokind&mainid=".$mainid);
	}//upload end
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
ul .liselect a:hover{width:78px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
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
<div class="main2_frame"><br />
  <table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td width="493" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_photo.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”相册管理</td>
      <td width="177" bgcolor="FDEEF8"><a href=i_group_photo.php?submitok=add&mainid=<?php echo $mainid; ?>><img src="images/createroot.gif" title="创建目录" width="69" height="21" hspace="5" border="0" /></a> <a href="i_group_photo_up.php?photokind=<?php echo $photokind;?>&mainid=<?php echo $mainid; ?>"><img src="images/lkup.gif" title="上传照片" width="69" height="21" hspace="5" border="0" /></a></td>
    </tr>
  </table>
  <br /><br /><br />
  <script language="JavaScript" src="images/chkgroupphoto.js" type="text/javascript"></script>
  <table width="540" border="0" cellpadding="3" cellspacing="0" style="border:#dddddd 0px solid;">
    <form action="i_group_photo_up.php" method="post" enctype="multipart/form-data" name="up" id="up" onsubmit="return showtype()">
      <tr>
        <td width="158" height="40" align="right">目录分类:</td>
        <td width="390" ><select name="photokind" id="photokind">
            <?php
$rt2=$db->query("SELECT id,title FROM ".__TBL_GROUP_PHOTO_KIND__." WHERE mainid='$mainid' ORDER BY px DESC,id DESC");
$total2 = $db->num_rows($rt2);
if ($total2 <= 0) {
	header("Location: i_group_photo.php?mainid=".$mainid);
} else {
?>
<option value="">选择目录</option>
<?php
	for($j=0;$j<$total2;$j++) {
		$rows2 = $db->fetch_array($rt2);
		if(!$rows2) break;
		if ($rows2[0] == $photokind) {
			$tempselect = " selected ";
		} else {
			$tempselect = "";
		}
		echo "<option value=".stripslashes($rows2[0]).$tempselect.">".stripslashes($rows2[1])."</option>";
	}
}
?>
          </select>
            <input type="hidden" name="submitok" value="upload" />
          　<input type="hidden" name="mainid" value="<?php echo $mainid; ?>" />
          <img src="images/root.gif" align="absmiddle" /> <a href="i_group_photo.php?mainid=<?php echo $mainid; ?>" class="uDF2C91">圈子相册目录</a></td>
      </tr>
      <tr>
        <td width="158" height="40" align="right">简单说明:</td>
        <td width="390" style="line-height:200%;font-size:10.3pt;color:33333;"><input name="title" type="text" id="title" size="40" maxlength="50" class="input" /></td>
      </tr>
      <tr>
        <td width="158" height="40" align="right">选择照片:</td>
        <td width="390"">
          <input name="pic" type="file" id="inp"  size="42" class="input" style="height:21px"></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
        <td><input type="submit" name="Submit" value="开始上传" class="button" /></td>
      </tr>
    </form>
  </table>
  <br>
  <br>
<br>
<br>

  <br />
  <br>
<br />
  <br />
</div></div>
<?php
require_once YZLOVE.'my/bottommy.php';
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