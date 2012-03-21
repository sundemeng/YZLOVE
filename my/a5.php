<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[1-6]{1}$",$a1) || empty($a1) )callmsg("请选择“第一次约会你希望双方能做什么”！","-1");
	if ( !ereg("^[1-6]{1}$",$a1) || empty($a2) )callmsg("请选择“约会中该谁买单”！","-1");
	if (strlen($a3)<2 || strlen($a3)>250)callmsg("“你喜欢的约会场所”请控制在2~127字内。","-1");
	if (strlen($a4)<2 || strlen($a4)>250)callmsg("“你喜欢的音乐”请控制在2~127字内。","-1");
	if (strlen($a5)<2 || strlen($a5)>250)callmsg("“你常参与的体育活动”请控制在2~127字内。","-1");
	if (strlen($a6)<2 || strlen($a6)>250)callmsg("“你喜欢谈论”请控制在2~127字内。","-1");
	if (strlen($a7)<2 || strlen($a6)>250)callmsg("“你认为浪漫是”请控制在2~127字内。","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,a1,a2,a3,a4,a5,a6,a7) VALUES ('$cook_userid','$a1','$a2','$a3','$a4','$a5','$a6','$a7')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET a1='$a1',a2='$a2',a3='$a3',a4='$a4',a5='$a5',a6='$a6',a7='$a7',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("修改成功！","a6.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET a1=0,a2=0,a3='',a4='',a5='',a6='',a7='' WHERE userid=".$cook_userid);
	callmsg("已经清空，你的个人主页将不再显示此类型资料，想要恢复显示请重新修改！","a5.php");
}
$rt = $db->query("SELECT a1,a2,a3,a4,a5,a6,a7 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:68px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:68px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:68px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:68px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:320px;background:#F8FCF5;height:150px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a5.js"></script>
<body>
<ul>
<li><a href="a1.php">基本资料</a></li>
<li><a href="a2.php">详细资料</a></li>
<li><a href="a3.php">内心独白</a></li>
<li><a href="a4.php">联系方法</a></li>
<li class="liselect"><a href="a5.php">约会交友</a></li>
<li><a href="a6.php">婚姻恋爱</a></li>
<li><a href="a7.php">红尘知己</a></li>
<li><a href="a8.php">以商会友</a></li>
<li><a href="a9.php">修改密码</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br /><br /><br />
  <table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">    <tr>
      <td width="229" height="35" align="right">第一次约会你希望双方能做什么:</td>
      <td width="413"><select name="a1" >
                <option value="">请选择</option>
                <option value=1 <?php if ($row['a1']==1)echo "selected"; ?>>先见一面相互认识。</option>
                <option value=2 <?php if ($row['a1']==2)echo "selected"; ?>>可以一起吃饭，喝茶。</option>
                <option value=3 <?php if ($row['a1']==3)echo "selected"; ?>>可以去看场电影，唱歌，跳舞。</option>
                <option value=4 <?php if ($row['a1']==4)echo "selected"; ?>>如果喜欢，可以拉拉手。</option>
                <option value=5 <?php if ($row['a1']==5)echo "selected"; ?>>如果喜欢，可以拥抱接吻。</option>
                <option value=6 <?php if ($row['a1']==6)echo "selected"; ?>>不排除更进一步的可能。</option>
          </select></td>
    </tr>
    <tr>
      <td height="35" align="right">约会中该谁买单:</td>
      <td><select name="a2">
                <option value="" selected>请选择</option>
                <option value=1 <?php if ($row['a2']==1)echo "selected"; ?>>当然是男的付</option>
                <option value=2 <?php if ($row['a2']==2)echo "selected"; ?>>男的多付一些</option>
                <option value=3 <?php if ($row['a2']==3)echo "selected"; ?>>谁有钱谁付</option>
                <option value=4 <?php if ($row['a2']==4)echo "selected"; ?>>随便，无所谓</option>
                <option value=5 <?php if ($row['a2']==5)echo "selected"; ?>>AA制</option>
                <option value=6 <?php if ($row['a2']==6)echo "selected"; ?>>看关系发展</option>
              </select></td>
    </tr>
    <tr>
      <td height="35" align="right">你喜欢的约会场所:</td>
      <td><input name="a3" type="text"  class=input id="a3" onFocus="setTagBehavior(this,'a3','tipinfo1');" value="<?php echo htmlout(stripslashes($row['a3']));?>" size="60" maxlength="240" ><div id="tipinfo1">ff</div>
	  </td>
    </tr>
    <tr>
      <td height="35" align="right">你喜欢的音乐:</td>
      <td><input name="a4" type="text"  class=input id="a4" onFocus="setTagBehavior(this,'a4','tipinfo2');" value="<?php echo htmlout(stripslashes($row['a4']));?>" size="60" maxlength="240" ><div id="tipinfo2"></div>
	  </td>
    </tr>
    <tr>
      <td height="35" align="right">你常参与的体育活动:</td>
      <td><input name="a5" type="text"  class=input id="a5" onFocus="setTagBehavior(this,'a5','tipinfo3');" value="<?php echo htmlout(stripslashes($row['a5']));?>" size="60" maxlength="240" ><div id="tipinfo3"></div>
    </tr>
    <tr>
      <td height="35" align="right">你喜欢谈论:</td>
      <td><input name="a6" type="text"  class=input id="a6" onFocus="setTagBehavior(this,'a6','tipinfo4');" value="<?php echo htmlout(stripslashes($row['a6']));?>" size="60" maxlength="240" ><div id="tipinfo4"></div>
    </tr>
    <tr>
      <td height="35" align="right">你认为浪漫是:</td>
      <td><input name="a7" type="text"  class=input id="a7" onFocus="setTagBehavior(this,'a7','tipinfo5');" value="<?php echo htmlout(stripslashes($row['a7']));?>" size="60" maxlength="240" ><div id="tipinfo5"></div>
    </tr>
    <tr>
      <td height="35" align="right">&nbsp;</td>
      <td><input type="hidden" name="submitok" value="modupdate" />
        <input type="submit" name="Submit" value=" 修 改 " class="button" />　
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('请慎重：\n\n★确认清空吗？ ')"><b>清空“约会交友”类别资料</b></a></td>
    </tr>
</form>
</table>
  <table width="600" height="55" border="0" align="center" cellpadding="10" cellspacing="0" style="margin:20px 0 0 0">
    <tr>
      <td width="27" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21" /></td>
      <td width="533" style="line-height:150%;color:#666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />资料修改后，本站客服人员对你的资料进行审核后方可显示。<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />遵守<a href="/law.html" target="_blank">互联网电子公告服务管理规定</a>以及中华人民共和国其他各项有关法律法规。<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>将对您的资料保留最终决定权。</td>
    </tr>
  </table>
  <br />
  <br /><br /><br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>