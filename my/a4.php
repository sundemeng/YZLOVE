<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT ifopencontact,email,address,post,tel,qq,msn,popo,homepage FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="modupdate") {
if ( !ereg("^[1-3]{1}$",$ifopencontact) && !empty($ifopencontact) )callmsg("Forbidden","-1");
if ( strlen($address) > 50 )callmsg("地址(长度限50字节25汉字以内)","-1");
if ( strlen($post) > 6 )callmsg("邮政编码(长度限6个数字)","-1");
if ( strlen($tel) > 50 )callmsg("电话/手机(长度限50字节以内)","-1");
if ( !empty($form_email) && !ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$form_email))callmsg("请输入正确的E-mail。","-1");
if ( strlen($qq) > 50 )callmsg("QQ(长度限50字节以内)","-1");
if ( strlen($msn) > 50 )callmsg("msn(长度限50字节以内)","-1");
if ( strlen($popo) > 50 )callmsg("popo(长度限50字节以内)","-1");
if ( strlen($homepage) > 50 )callmsg("homepage(长度限100字节以内)","-1");
$db->query("UPDATE ".__TBL_MAIN__." SET ifopencontact='$ifopencontact',email='$form_email',address='$address',post='$post',tel='$tel',qq='$qq',msn='$msn',popo='$popo',homepage='$homepage' WHERE id='$cook_userid'");
callmsg("修改成功！","a5.php");
}
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
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a3.php" class="a333">内心独白</a></div>
<div class="main1_tselect">联系方法</div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a5.php" class="a333">约会交友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a6.php" class="a333">婚姻恋爱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a7.php" class="a333">红尘知己</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a8.php" class="a333">以商会友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="a9.php" class="a333">修改密码</a></div>
</div>
<div class="main2">
<div class="main2_frame"> <br />
<br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0">
<form action="" method="post" name="YZLOVEFORM" id="YZLOVEFORM">
<tr>
<td width="190" height="35" align="right"><font color="#666666">我的联系方式：</font></td>
<td width="452" style="color:#666;">
  <input name="ifopencontact" type="radio" value="1" id="gyl1" <?php if ($row['ifopencontact']==1)echo "checked"; ?> />
  <label for="gyl1">开放</label>
　
  <input type="radio" name="ifopencontact" value="2" id="gyl2" <?php if ($row['ifopencontact']==2)echo "checked"; ?> />
  <label for="gyl2">好友可见</label>
  
  　
  <input type="radio" name="ifopencontact" value="3" id="gyl3" <?php if ($row['ifopencontact']==3)echo "checked"; ?> />
  <label for="gyl3">保密</label>
    </td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">地址：</font></td>
<td width="452"><input name="address" type="text"  class="input" id="address" value="<?php echo stripslashes($row['address']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">邮政编码：</font></td>
<td width="452"><input name="post" type="text"  class="input" value="<?php echo $row['post'];?>" size="8" maxlength="6"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">电话/手机：</font></td>
<td width="452"><input name="tel" type="text"  class="input" value="<?php echo stripslashes($row['tel']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">电子邮箱：</font></td>
<td><input name="form_email" type="text" class="input" value="<?php echo $row['email'];?>" size="40" maxlength="25"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">QQ：</font></td>
<td><input name="qq" type="text"  class="input" value="<?php echo stripslashes($row['qq']);?>" size="40" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">MSN：</font></td>
<td><input name="msn" type="text"  class="input" value="<?php echo stripslashes($row['msn']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">POPO：</font></td>
<td><input name="popo" type="text"  class="input" value="<?php echo stripslashes($row['popo']);?>" size="60" maxlength="50"></td>
</tr>
<tr>
<td height="35" align="right"><font color="#666666">个人主页：</font></td>
<td><input name="homepage" type="text"  class="input" value="<?php echo stripslashes($row['homepage']);?>" size="60" maxlength="100"></td>
</tr>
<tr>
<td height="55" colspan="2" align="center"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" 修 改 " class="button" /></td>
</tr>
</form>
</table>
<br />
<br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>