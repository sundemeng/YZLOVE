<?php
require_once 'sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,10}$",$id) || empty($id))callmsg("Forbidden","-1");
$rt = $db->query("SELECT * FROM ".__TBL_NEWS__." WHERE id=".$id);
if($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	$db->query("UPDATE ".__TBL_NEWS__." SET click=click+1 WHERE id=".$id);
} else {
	callmsg("Forbidden!","-1");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo strip_tags(stripslashes($row['title']));?></title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<table width="980" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="bottom" style="font-size:18px;font-family:黑体,宋体;color:#000"><?php echo stripslashes($row['title']);?></td>
  </tr>
</table>
<table width="950" height="40" border="00" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#efefef 1px solid">
  <tr>
    <td align="center" style="font-family:Verdana;color:#777">浏览：<font color="#FF0000"><?php echo $row['click']; ?></font>次　　发布时间：<?php echo date_format2($row['addtime'],'%Y年%m月%d日');?></td>
  </tr>
</table><br>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="dddddd" style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF" style="font-size:10.3pt;line-height:200%;COLOR:#000000"><?php echo stripslashes($row['content']);?></td>
  </tr>
</table>
<table width="950" height="40" border="00" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#efefef 1px solid">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<table width="200" height="68" border="00" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><span style="color:#999999;">
      <input name="button" type="button" class="buttonx" onClick="javascript:window.opener=null;window.close();" value="关闭窗口">
    </span></td>
  </tr>
</table>
<?php require_once YZLOVE.'bottom.php';?>
