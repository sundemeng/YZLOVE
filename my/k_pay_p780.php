<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

if ($submitok == 'addupdate'){
	switch ($kind){ 
	case 1:$a = "29";$b=$cook_username.'____'.'诚信会员_包月';break;
	case 2:$a = "99";$b=$cook_username.'____'.'诚信会员_包年';break;
	case 3:$a = "199";$b=$cook_username.'____'.'诚信会员_永久';break;
	case 4:$a = "49";$b=$cook_username.'____'.'钻石会员_包月';break;
	case 5:$a = "199";$b=$cook_username.'____'.'钻石会员_包年';break;
	case 6:$a = "299";$b=$cook_username.'____'.'钻石会员_永久';break;
	}
	$c= "http://www.99bill.com/1690003328/$a/$b";
?>
	<META HTTP-EQUIV=REFRESH CONTENT="0;URL='<?php echo $c; ?>'">
<?php	
	exit;
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
ul li {float:left;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a{width:130px;display:block;text-decoration:none;color:#333;background:#fff}
ul li a:hover{text-decoration:none;color:#6F9F00;background:#F0FAE9}

ul .liselect {float:left;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a{width:130px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{text-decoration:none;color:#DF2C91;background:#F0FAE9;}

.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
font,td{font-family:Verdana}
.title{background:#FDEEF8;color:#FF6600;font-size:20px;font-family:黑体,宋体;letter-spacing:1px}
</style>
</head>
<body>

<ul>
	<li class='liselect'><a href="k_pay.php">在线支付</a></li>
<!--	<li><a href="k_pay2.phpt">银行转帐</a></li>
	<li><a href="99bill/szx/send.php?orderAmount=1" target="_blank">神州行支付</a></li>
	<li><a href="k_pay4.php">其它方式</a></li> -->
</ul>

<div class="main2">
<div class="main2_frame">
<br />
<table width="690" height="170" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="left" class="title">　请选择支付项目:</td>
  </tr>
  <tr>
    <td height="200" align="center"><br />
        <br />
            <br />
			 <form method=post name=myform action="k_pay_p780.php">
          <table width="430" border="0" cellspacing="0" cellpadding="10" style="border:#dddddd 1px solid;font-weight:bold;font-size:14px">
 
    <tr>
      <td width="125" align="right"><img src="../images/grade/12.gif" width="13" height="18" hspace="3" align="absmiddle" /><img src="../images/grade/22.gif" width="13" height="18" hspace="3" align="absmiddle" /></td>
      <td width="263" align="left">
  <input name="kind" type="radio" id="kind2" value="1" /><label for="kind2">包月-诚信会员</label><br /><br />
  <input name="kind" type="radio" id="kind3" value="2" /><label for="kind3">包年-诚信会员</label><br /><br />
  <input name="kind" type="radio" id="kind4" value="3"  /><label for="kind4">永久-诚信会员</label>  </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#f8f8f8"><img src="../images/grade/13.gif" width="16" height="16" hspace="1" vspace="4" align="absmiddle" /><img src="../images/grade/23.gif" width="17" height="16" hspace="2" vspace="4" align="absmiddle" /></td>
      <td align="left" bgcolor="#f8f8f8">
  <input name="kind" type="radio" id="kind5" value="4" /><label for="kind5">包月-钻石会员</label><br /><br />
  <input name="kind" type="radio" id="kind6" value="5" checked="checked" /><label for="kind6">包年-钻石会员</label><br /><br />
  <input name="kind" type="radio" id="kind7" value="6" /><label for="kind7">永久-钻石会员</label><input name="submitok" type="hidden" value="addupdate"></td>
    </tr>
        </table> 
          <br />
              <span style="line-height:200%;padding:20px;font-family:Verdana"><strong>支付成功后请立即把<font color="#FF0000">登录用户名</font>告知我们</strong>，<br />
        可通过<a target="blank" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=8437645&amp;Site=都市情缘交友网&amp;Menu=yes"><img src="images/qq.gif" alt="点击发消息给客服QQ" border="0" /></a>QQ:8437645或发短信至：13862511478 手机上。</span><br />
        <br />
        <br />
      <input type="submit" name="Submit" value=" 确认付费 " class="button" />
      <br />
			 <br />
			 <br />
			 <br />
			 <br />
			 </form></td>
    </tr>
</table>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
</div>
</div>
<script language="javascript" src="/ajax/zeai2kefu.js"></script>
<div class="clear"></div>
<?php require_once YZLOVE.'my/bottommy.php';?>