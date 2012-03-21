<?php
require_once "../../../../include/init.php";
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
	callmsg("会员登录后方可使用此功能！","0");
}else{
	$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
	if(!$db->num_rows($rt))callmsg("会员登录后方可使用此功能！","0");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>插入相册</title>
<link href="<?php echo $Global['www_2domain']; ?>/include/main.css" rel="stylesheet" type="text/css">
</head>
<script>name = "testwin"</script>
<body leftmargin="0" topmargin="10" marginheight="0">
<table width="200" height="33" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="../../tips3.gif" width="11" height="15" hspace="5" align="absmiddle"><b><font color="6699CC">请选择相册目录</font></b></td>
  </tr>
</table>
<?php
$rt = $db->query("SELECT * FROM ".__TBL_PHOTO_KIND__." WHERE userid='$cook_userid' ORDER BY px,id");
$total = $db->num_rows($rt);
if($total>0){
	if ($p<1)$p=1;
?>
<table width="540" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="EDF8FF" style="border:#B0D5F3 1px solid;">
  <tr>
    <?php
	for($i=1;$i<=$total;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	$rtmail = $db->query("SELECT COUNT(id) FROM ".__TBL_PHOTO__." WHERE userid='$cook_userid' AND kind='".$rows['id']."'");
		if($db->num_rows($rtmail)){
		$rowsmail = $db->fetch_array($rtmail);
		$photocount = $rowsmail[0];
	}
?>
    <td align="center" style="padding-top:20px;padding-bottom:20px;"><table width="130" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" style="font-size:10.3pt;"><a href="photo_list.php?photokind=<?php echo $rows['id'] ?>" target="testwin"><img src="<?php echo $Global['www_2domain']; ?>/images/photoroot.gif" width="37" height="30" hspace="5" vspace="5" border="0" align="absmiddle"><?php echo $rows['title'] ?></a></td>
      </tr>
      <tr>
        <td height="25" align="center" style="color:#999999;">共有<font color="#FF0000" style="font-size:9pt;color:#red"><?php echo $photocount; ?></font>张照片</td>
      </tr>
    </table></td>
    <?php if ($i % 3 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<br>
  <?php 
} else {
	echo "<br><br>...你的相册中没有照片，请返回个人管理中心上传...";
}?>
  <table width="200" height="79" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><input type="button" value="关闭窗口" onClick="javascript:window.close();" class="buttonx" /></td>
    </tr>
  </table>
</body>
</html>
<?php ob_end_flush();?>