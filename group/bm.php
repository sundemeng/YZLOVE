<?php 
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$mainid) && !empty($mainid))callmsg("请求错误，该圈子不存在或已被锁定或已被删除1！","-1");
if ( !ereg("^[0-9]{1,8}$",$fid) || empty($fid))callmsg("请求错误，该信息不存在或已被删除！","-1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>活动报名</title>
<link href="images/<?php echo $mbkind; ?>/group.css" rel="stylesheet" type="text/css">
</head>
<script language="javascript">
function chk(){
if(document.yzloveform.tel.value==""){
alert('请输入电话／手机！');
document.yzloveform.tel.focus();
return false;
}}
</script>
<body>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="0" style="border:#F4DCEE 1px solid;margin:60px 0 0 0">
<form method="post" action="partyshow.php" name=yzloveform onsubmit="return chk()">
<tr>
<td height="80" colspan="2" align="left" bgcolor="#FDF2F9"><img src="images/tips.gif" width="23" height="21" vspace="10" align="absmiddle" /><b><font color="#FF6C96">请留下你的电话或手机，我们会很快与您取得联系，确定报名人数和通知你参加活动，此电话手机我们只做为活动通知之用，绝对保密，不会公开，请放心填写。</font></b></td>
</tr>
<tr>
<td width="185" align="right" style="font-size:14px;color:#666666;font-weight:bold">电话／手机：</td>
<td width="373">
<label>
<input name="tel" type="text" class="input" size="50" maxlength="100" />
</label>    </td>
</tr>
<tr>
<td align="right">&nbsp;</td>
<td height="60" valign="top"><input type="submit" name="Submit" value="提交信息" class="button" <?php if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){echo "disabled='disabled'";} ?>><input name="submitok" type="hidden" value="bmupdate"><input name="mainid" type="hidden" value="<?php echo $mainid;?>">
<input name="fid" type="hidden" value="<?php echo $fid;?>"><input name="mbkind" type="hidden" value="<?php echo $mbkind;?>"></td>
</tr>
</form>
</table>
<table width="488" height="55" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="font-family:Verdana;"><font color="#999999">&copy;版权所有<?php echo date("Y"); ?>　<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font></td>
</tr>
</table>
</body>
</html>
