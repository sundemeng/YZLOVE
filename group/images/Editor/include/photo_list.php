<?php
require_once "../../../../include/init.php";
if ( !ereg("^[0-9]{1,8}$",$photokind) || empty($photokind))callmsg("Forbidden!","0");
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
	callmsg("会员登录后方可使用此功能1！","0");
}else{
	$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
	if(!$db->num_rows($rt))callmsg("会员登录后方可使用此功能2！","0");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>插入照片</title>
<link href="<?php echo $Global['www_2domain']; ?>/include/main.css" rel="stylesheet" type="text/css">
</head>
<script>name = "testwinson"</script>
<base target=testwinson>
<SCRIPT LANGUAGE="JavaScript">
function emott2(str,str2) {
	var str;
	var str2;
	str = "<br><br><img src=<?php echo $Global['up_2domain']; ?>/photo/"+str+"><br>"+str2+"<br><br>";
	window.returnValue = str;
	window.close();
}
</SCRIPT>
<body leftmargin="0" topmargin="10" marginheight="0">
<table width="540" height="33" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="123"><a href="photo.php" ><img src="../images/ht.gif" width="16" height="14" hspace="3" border="0" align="absmiddle"><b><u>后退</u></b></a></td>
    <td width="311" align="center"><img src="../../tips3.gif" width="11" height="15" hspace="5" align="absmiddle"><b><font color="6699CC">请选择照片</font></b></td>
    <td width="106" align="center">&nbsp;</td>
  </tr>
</table>
<?php
$rt=$db->query("SELECT * FROM ".__TBL_PHOTO__." WHERE userid='$cook_userid' AND kind='$photokind' AND flag=1 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
	require_once YZLOVE.'include/class.php';
	$pagesize = 12;
	if ($p<1)$p=1;
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="540" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#ECF8FB" style="border:#dddddd 1px solid;">
  <tr>
    <?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	if ($rows['ifmain']==1){
		$bg="bgcolor=#FFFFCC";
	} else {
		$bg="bgcolor=#ECF8FB";
	}
?>
    <td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="100" border="0" cellpadding="0" cellspacing="0" bgcolor="cccccc" style="border:#dddddd 0px solid;">
      <tr>
        <td height="100" align="center" bgcolor="#FFFFFF"  style="border:#dddddd 1px solid;" <?php echo  $bg; ?> onClick="emott2('<?php echo $rows['path_b'];?>','<?php echo  $rows['title']; ?>')" onMouseOver="this.style.background='#ffff00'" onMouseOut="this.style.background='#ffffff'"><a href="#"><img src=<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?> alt="点击选择" border="0"></a></td>
      </tr>
      <tr>
        <td height="18" align="center"  <?php echo  $bg; ?>><font color="#666666"><?php echo  $rows['title']; ?></font></td>
      </tr>
      <tr>
        <td height="18" align="center"  <?php echo  $bg; ?>><font color="#999999"><?php echo date_format2($rows['addtime'],'%Y.%m.%d');; ?></font></td>
      </tr>
    </table></td>
    <?php if ($i % 4 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<table width="530" height="54" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="587" height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php } else { ?>
<br>
<br>
<table width="281" height="115" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#dddddd">
  <tr>
    <td align="center" bgcolor="#F7F7F7" style="color:#666666;"><br />
      ..此相册目录没有照片..<br />
      <br />
      请到管理中心上传</td>
  </tr>
</table>
<?php }?>
<table width="200" height="79" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><input type="button" value="关闭窗口" onClick="javascript:window.close();" class="buttonx" /></td>
    </tr>
  </table>
</body>
</html>
<?php ob_end_flush();?>