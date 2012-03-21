<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT aboutus FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
if ( strlen($aboutus) > 500 || strlen($aboutus) < 20)callmsg("内心独白(长度限20~500个字节之间或10~250个汉字之间)","-1");
$db->query("UPDATE ".__TBL_MAIN__." SET aboutus='$aboutus',ifmod=0 WHERE id='$cook_userid'");
callmsg("修改成功！","a4.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;}
.main1_tselect {float:left;width:70px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<body>
<div class="main1">
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a1.php" class="a333">基本资料</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a2.php" class="a333">详细资料</a></div>
<div class="main1_tselect">内心独白</div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a4.php" class="a333">联系方法</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a5.php" class="a333">约会交友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a6.php" class="a333">婚姻恋爱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a7.php" class="a333">红尘知己</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a8.php" class="a333">以商会友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a9.php" class="a333">修改密码 </a></div>
</div>
<div class="main2">
<div class="main2_frame"><br />
<table width="522" height="85" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="16">&nbsp;</td>
<td width="506" style="line-height:150%;"><font color="FF6C96"><img src="images/tips.gif" width="23" height="21" hspace="3" vspace="4" align="absmiddle">可以是一篇日记、一段歌词、一句座右铭、一个有趣的签名档……<br>
　　 建议您完善内心独白，更充分地表达自己。</font></td>
</tr>
</table>
<table width="603" height="114" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF" bordercolorlight="#dddddd" bordercolordark="#ffffff">
<script language="JavaScript" type="text/javascript">
function chkform(){
	if(document.FORM.aboutus.value.length>500 || document.FORM.aboutus.value.length<20){
	alert('内容请控制在20~500字节之间。');
	document.FORM.aboutus.focus();
	return false;}
}
</script>
<form action="" method="post" name=FORM onSubmit="return chkform()">
<tr>
<td width="60" align="right" valign="top" bgcolor="#FFFFFF"><font color="#666666">内心独白：</font></td>
<td width="523" valign="top" bgcolor="#FFFFFF"><font color="#666666">
<textarea name="aboutus" cols="80" rows="15" id="aboutus"><?php echo htmlout(stripslashes($row['aboutus']));?></textarea>
</font></td>
</tr>
<tr>
<td height="80" colspan="2" align="center" valign="top" bgcolor="#FFFFFF">　　　　　　　　　　　　
<input type=hidden name=submitok value="modupdate">
<input type="submit" name="Submit" value=" 提 交 " class="button">
<font color="#666666">　　　( 20~500字节之间)</font></td>
</tr>
</form>
</table>
<br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>