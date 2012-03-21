<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade=$row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
$rtt = $db->query("SELECT COUNT(*) FROM ".__TBL_PHOTO__." WHERE userid=".$cook_userid);
$rowss = $db->fetch_array($rtt);
$tmpvideocount = $rowss[0];
$outinfo = 'YES';
if ($data_grade ==1 ) {
	if ($tmpvideocount >= $Global['m_photo_num1'])$outinfo = 'SORRY';
} elseif ($data_grade == 2) {
	if ($tmpvideocount >= $Global['m_photo_num2'] )$outinfo = 'SORRY';
} elseif ($data_grade == 3) {
	if ($tmpvideocount >= $Global['m_photo_num3'] )$outinfo = 'SORRY';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* .main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:74px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:74px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_list.php" class="a333">我的相册</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_up.php" class="a333">上传照片</a></div>
	<div class="main1_tselect">在线拍照</div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_main.php" class="a333">更新形象照 </a></div>
</div>
<div class="main2">
  <div class="main2_frame"><br />
    <br />
<?php if ($outinfo == 'SORRY') {?>
<br /><br /><br />
<table width=392 height=176 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
    <td align=center bgcolor=#f3f3f3 style="line-height:20px;"><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i><font color="666666"> 照片个数已到极限，你可以删除部分！　 <a href="c_photo_list.php">进入删除</a><br>
         <br>
      普通会员最多<font color="#FF0000"><?php echo $Global['m_photo_num1'];?></font>张<br>
      诚信会员最多<font color="#FF0000"><?php echo $Global['m_photo_num2'];?></font>张<br>
      钻石会员最多<font color="#FF0000"><?php echo $Global['m_photo_num3'];?></font>张<br>
      </font><br>
      <img src="images/yes.gif" width="16" height="14" hspace="3"><a href="h_bank.php" class="u666666"><b>立即升级会员</b></a>　　<img src="images/diamond.gif" width="20" height="16" hspace="3" align="absmiddle"><a href="h_vip.php" class="u666666">高级会员还有哪些特权？</a></td>
  </tr>
</table>
<br /><br /><br /><br /><br />
<?php } else { ?>
<table border="0" align="center" cellpadding="5" cellspacing="0" style="border:#ddd 1px solid;">
  <tr>
    <td align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="420" height="413">
      <param name="movie" value="images/dtt.swf" />
      <param name="quality" value="high" />
      <embed src="images/dtt.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="420" height="413"></embed>
    </object></td>
  </tr>
</table>
<br />
    <table width="600" height="55" border="0" align="center" cellpadding="10" cellspacing="0">
        <tr>
          <td width="27" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21"></td>
          <td width="533" style="line-height:150%;color:#666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><font color="#FF6699">点击“保存”后，系统自动上传，可能有点慢，请不要再次操作或关闭窗口！</font><br />
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><font color="#FF6699">你的电脑必须安装有视频摄像头才能在线拍照！</font><br />
            <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle"><font color="#FF6699">经过审核后的照片我们将给予Love币奖励！</font><br>
            <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><font color="#FF6699"><?php echo $Global['m_sitename']; ?>努力营造真实、纯洁的交友空间。一旦发现上传非本人照片，系统将立即删除。</font> <br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />遵守<a href="/law.html" target="_blank">互联网电子公告服务管理规定</a>以及中华人民共和国其他各项有关法律法规。<br>
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>将对您的照片保留最终决定权。<br>
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />如果您盗用他人图片，所产生的一切后果由您自己承担，一经发现，将扣除Love币<font color="#FF0000">1000</font>以上，情节严重的将永久性删除会员资格及所有资料，不再另行通知。如有疑问，请与我们联系。 </td>
        </tr>
    </table><br /><br /><br />
<?php }?>
  </div></div>
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