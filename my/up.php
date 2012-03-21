<?php
/**************************************************
Copyright (C) 2009 　都市情缘交友网 V2.0
作  者: pan　
**************************************************/
require_once '../sub/init.php';
$errout = "<div style='margin:5px 0 0 0;font-size:12px;color:#666666'><a href=".$Global['www_2domain']."/login.php target=_top><font color=#666666><b>请先登录本站</b></font></a></div>";
if ($cook_grade<=0){
echo $errout;
exit;
}elseif ($cook_grade == 1){
echo "<div style='font-size:12px;color:#666666'>只有高级会员才可以上传照片！　　";
echo "<img src='images/diamond.gif'><a href=".$Global['my_2domain']."/?k_vip.php target=_top><font color=#666666><b>升为高级会员</b></font></a></div>";
exit;
} elseif ($cook_grade == 2){
if ($Temp_photonum > $Global['m_group_tempphoto']){
echo '诚信会员一天最多上传 ('.$Global['m_group_tempphoto'].') 张照片，钻石会员以上级别不限！';
echo "<a href=".$Global['my_2domain']."/?k_bank.php target=_top><font color=#666666><b>升为钻石会员</b></font></a></div>";
exit;
}}
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){echo $errout;;exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade=$row[0];} else {echo $errout;exit;}}
if ($submitok == "upload"){
	$uptypes=array('image/jpg','image/jpeg','image/png','image/pjpeg','image/gif','image/x-png'); 
	$max_file_size=900000;
	$waterstring = $Global['m_waterimg'];
	$waterimg = 'images/waterimg.png';
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_uploaded_file($_FILES["pic"][tmp_name])){ 
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
		$file = $_FILES["pic"];
		$filepath = YZLOVE."up/wzphoto/".date("Ym")."/";
		$dbpath = date("Ym")."/";
		mkpath($filepath);
		$savename = $cook_userid."_".cdstr(20).".";
		$filename=$file["tmp_name"];
		$image_size = getimagesize($filename); 
		$pinfo=pathinfo($file["name"]); 
		$ftype=$pinfo['extension']; 
		$destination =  $filepath."b_".$savename.$ftype; 
		if(!move_uploaded_file ($filename, $destination)) callmsg("移动照片出错","-1");
		$path_b = $dbpath."b_".$savename.$ftype;
		// 略
		$RESIZEWIDTH2=700;
		$RESIZEHEIGHT2=700;
		if ($ftype == "jpg" || $ftype == "JPG"){
			$im = imagecreatefromjpeg($destination);
		} else {
			$im = imagecreatefromgif($destination);
		}	
		makexiao($im,$RESIZEWIDTH2,$RESIZEHEIGHT2,$destination,$ftype);
		imagedestroy ($im);
		$image_size = getimagesize($destination);
		//水
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
		$simage1 =imagecreatefrompng($waterimg); 
		imagecopy($nimage,$simage1,$image_size[0]-160,$image_size[1]-70,0,0,160,70); 
		imagedestroy($simage1); 
		switch ($iinfo[2]) { 
			case 1:imagegif($nimage, $destination);break; 
			case 2:imagejpeg($nimage, $destination);break; 
			case 3:imagepng($nimage, $destination);break; 
			case 6:imagewbmp($nimage, $destination);break; 
		} 
		imagedestroy($nimage); 
		imagedestroy($simage); 
		//水束
		$addtime = strtotime(date("Y-m-d H:i:s"));
		$db->query("INSERT INTO ".__TBL_SUPPHOTO__."  (userid,path_b,addtime) VALUES ($cook_userid,'$path_b',$addtime)");
	}//upload end
	?>
	<style type="text/css"> 
	 a{text-decoration:underline;color:#0000ff;font-family:宋体;font-weight:bold}
	 a:hover {text-decoration:underline;color:#FF6600} 
	 body{font-family:宋体;font-size:12px}
	 TD{ font-size:12px}
	</style>
	<script language="javascript">
		var htmlletter = parent.window.frames["htmlletter"];
		var fContent = htmlletter.frames["HtmlEditor"];
		fContent.focus();
		var sText = fContent.document.selection.createRange();
		var str;
		str = '<br><center><img src='+'<?php echo $Global['up_2domain'];?>/wzphoto/<?php echo  $path_b; ?>'+'></center><br>';
		sText.pasteHTML(str);
	</script> 
<?php
	echo "<div style='margin:5px 0 0 0'><font color=#ff0000>上传成功！</font>　<a href=up.php>继续上传</a></div>";
	setcookie("Temp_photonum",$Temp_photonum+1,null,"/",$Global['m_cookdomain']);  
	exit;
}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<SCRIPT LANGUAGE="JavaScript">
var img=null; 
function showtype()
{ 
var fsize=0;
if(img)img.removeNode(true); 
img=document.createElement("img"); 
img.style.position="absolute"; 
img.style.visibility="hidden"; 
document.body.insertAdjacentElement("beforeend",img); 
img.src=FORM.inp.value; 
var ftype=img.src.substring(img.src.length-4,img.src.length) 
ftype=ftype.toUpperCase();
fsize=img.fileSize;
if((ftype.indexOf('JPG',0)==-1) && (ftype.indexOf('GIF', 0)==-1))
	{ alert("Sorry!上传失败！\n\n①请选择您要上传的照片\n\n②且只能是.JPG或.GIF图片类型。");
	return false;
	}
alert("您确定要上传此文件吗？");
}
</script> 
<style type="text/css"> 
 body{font-family:宋体;font-size:9pt;background-color:transparent}
 TD{ FONT-SIZE: 9pt}
 .input{font-size:12px;color:#333;background:#F8FCF5;border:#ccc 1px solid;height:21px;font-family:Arial,宋体}
 .buttonx{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn2.gif);background-color:#FFF5E6; text-align:center; height:22px;padding:0px!important;padding-top:3px; border:1px solid #FF7E00;color:#000;}
</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" bgProperties=fixed  marginwidth="0" marginheight="0"  <?php echo $Global['m_body']; ?> scroll="no"  oncontextmenu=self.event.returnValue=false>
<form method="post" enctype="multipart/form-data" action="up.php" name="FORM" id="up" onSubmit="return showtype()">
<input name="pic" type="file" id="inp" size="60" class="input">
<input type="submit" name="image" value="上传图片" class=buttonx><input name="submitok" type="hidden" value="upload" /></td>
</form>
</body>
</html><?php 
ob_end_flush();
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