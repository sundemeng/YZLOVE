<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[1-7]{1}$",$c1) || empty($c1) )callmsg("请选择“你现在住在”","-1");
	if ( !ereg("^[1-7]{1}$",$c2) || empty($c2) )callmsg("请选择“你认为自己性感吗”","-1");
	if ( !ereg("^[1-7]{1}$",$c3) || empty($c3) )callmsg("请选择“你在性爱方面的经验”","-1");
	if ( !ereg("^[1-7]{1}$",$c4) || empty($c4) )callmsg("请选择“你对待性爱的态度是”","-1");
	if ( !ereg("^[1-7]{1}$",$c5) || empty($c5) )callmsg("请选择“你在性爱中乐于尝试吗”","-1");
	if ( !ereg("^[1-7]{1}$",$c6) || empty($c6) )callmsg("请选择“你认为性和爱的关系是”","-1");
	if ( !ereg("^[1-7]{1}$",$c7) || empty($c7) )callmsg("请选择“你认为性感主要体现在对方的”","-1");
	if (strlen($c8)<2 || strlen($c8)>250)callmsg("“在性爱中，你往往是”请控制在2~127字内。","-1");
	if (strlen($c9)<2 || strlen($c9)>250)callmsg("“你在寻找”请控制在2~127字内。","-1");
	if (strlen($c10)<2 || strlen($c10)>250)callmsg("“什么比较能调动你的兴致”请控制在2~127字内。","-1");
	if (strlen($c11)<2 || strlen($c11)>250)callmsg("“你能够接受(和你的伴侣)：”请控制在2~127字内。","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11) VALUES ('$cook_userid','$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9','$c10','$c11')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET c1='$c1',c2='$c2',c3='$c3',c4='$c4',c5='$c5',c6='$c6',c7='$c7',c8='$c8',c9='$c9',c10='$c10',c11='$c11',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("修改成功！","a8.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET c1=0,c2=0,c3=0,c4=0,c5=0,c6=0,c7=0,c8='',c9='',c10='',c11='' WHERE userid=".$cook_userid);
	callmsg("已经清空，你的个人主页将不再显示此类型资料，想要恢复显示请重新修改！","a7.php");
}
$rt = $db->query("SELECT c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:320px;background:#F8FCF5;height:100px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a7.js"></script>
<body>
<ul>
<li><a href="a1.php">基本资料</a></li>
<li><a href="a2.php">详细资料</a></li>
<li><a href="a3.php">内心独白</a></li>
<li><a href="a4.php">联系方法</a></li>
<li><a href="a5.php">约会交友</a></li>
<li><a href="a6.php">婚姻恋爱</a></li>
<li class="liselect"><a href="a7.php">红尘知己</a></li>
<li><a href="a8.php">以商会友</a></li>
<li><a href="a9.php">修改密码</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
  <tr>
    <td width="242" height="35" align="right">你现在住在:</td>
    <td width="400"><select name="c1">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c1']==1)echo "selected"; ?>>一个人住，很方便</option>
      <option value="2" <?php if ($row['c1']==2)echo "selected"; ?>>和父母住</option>
      <option value="3" <?php if ($row['c1']==3)echo "selected"; ?>>和别人合住，不方便</option>
      <option value="4" <?php if ($row['c1']==4)echo "selected"; ?>>和别人住，但找间房子很容易</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你认为自己性感吗:<br />    </td>
    <td width="400"><select name="c2">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c2']==1)echo "selected"; ?>>一定迷住你，挺性感的</option>
      <option value="2" <?php if ($row['c2']==2)echo "selected"; ?>>虽然不漂亮，但有魅力</option>
      <option value="3" <?php if ($row['c2']==3)echo "selected"; ?>>一般</option>
      <option value="4" <?php if ($row['c2']==4)echo "selected"; ?>>有人这么说，不知道你觉得怎么样</option>
      <option value="5" <?php if ($row['c2']==5)echo "selected"; ?>>不知道</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你在性爱方面的经验:</td>
    <td height="26"><select name="c3">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c3']==1)echo "selected"; ?>>从没有经验</option>
      <option value="2" <?php if ($row['c3']==2)echo "selected"; ?>>试过几次</option>
      <option value="3" <?php if ($row['c3']==3)echo "selected"; ?>>算是过来人</option>
      <option value="4" <?php if ($row['c3']==4)echo "selected"; ?>>很有经验</option>
      <option value="5" <?php if ($row['c3']==5)echo "selected"; ?>>行家里手</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你对待性爱的态度是:</td>
    <td height="19"><select name="c4">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c4']==1)echo "selected"; ?>>人生最快乐的事</option>
      <option value="2" <?php if ($row['c4']==2)echo "selected"; ?>>生活中最重要的事之一</option>
      <option value="3" <?php if ($row['c4']==3)echo "selected"; ?>>食，色性也，没有不行</option>
      <option value="4" <?php if ($row['c4']==4)echo "selected"; ?>>宁缺无滥</option>
      <option value="5" <?php if ($row['c4']==5)echo "selected"; ?>>喜欢才要</option>
      <option value="6" <?php if ($row['c4']==6)echo "selected"; ?>>可有可无</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你在性爱中乐于尝试吗:</td>
    <td><select name="c5">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c5']==1)echo "selected"; ?>>羞于主动尝试，愿意配合对方</option>
      <option value="2" <?php if ($row['c5']==2)echo "selected"; ?>>传统，保守</option>
      <option value="3" <?php if ($row['c5']==3)echo "selected"; ?>>只接受正常方式</option>
      <option value="4" <?php if ($row['c5']==4)echo "selected"; ?>>只要喜欢，可以试试</option>
      <option value="5" <?php if ($row['c5']==5)echo "selected"; ?>>喜欢新奇</option>
      <option value="6" <?php if ($row['c5']==6)echo "selected"; ?>>没有我没试过的</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你认为性和爱的关系是:<br />    </td>
    <td><select name="c6">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c6']==1)echo "selected"; ?>>有性才有爱</option>
      <option value="2" <?php if ($row['c6']==2)echo "selected"; ?>>有爱才有性</option>
      <option value="3" <?php if ($row['c6']==3)echo "selected"; ?>>性和爱无关</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">你认为性感主要体现在对方的:<br />    </td>
    <td height="28"><select name="c7">
      <option value="">请选择</option>
      <option value="1" <?php if ($row['c7']==1)echo "selected"; ?>>脸蛋</option>
      <option value="2" <?php if ($row['c7']==2)echo "selected"; ?>>身材</option>
      <option value="3" <?php if ($row['c7']==3)echo "selected"; ?>>表情</option>
      <option value="4" <?php if ($row['c7']==4)echo "selected"; ?>>语言</option>
      <option value="5" <?php if ($row['c7']==5)echo "selected"; ?>>动作</option>
      <option value="6" <?php if ($row['c7']==6)echo "selected"; ?>>打扮</option>
      <option value="7" <?php if ($row['c7']==7)echo "selected"; ?>>态度</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="35" align="right">在性爱中，你往往是:</td>
    <td height="28"><input name="c8" type="text"  class=input id="c8" onFocus="setTagBehavior(this,'c8','tipinfo1');" value="<?php echo htmlout(stripslashes($row['c8']));?>" size="60" maxlength="240" >
<div id="tipinfo1"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">你在寻找:</td>
    <td height="28"><input name="c9" type="text"  class=input id="c9" onFocus="setTagBehavior(this,'c9','tipinfo2');" value="<?php echo htmlout(stripslashes($row['c9']));?>" size="60" maxlength="240" >
<div id="tipinfo2"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">什么比较能调动你的兴致:</td>
    <td height="28"><input name="c10" type="text"  class=input id="c10" onFocus="setTagBehavior(this,'c10','tipinfo3');" value="<?php echo htmlout(stripslashes($row['c10']));?>" size="60" maxlength="240" >
<div id="tipinfo3"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">你能够接受(和你的伴侣):</td>
    <td height="28"><input name="c11" type="text"  class=input id="c11" onFocus="setTagBehavior(this,'c11','tipinfo4');" value="<?php echo htmlout(stripslashes($row['c11']));?>" size="60" maxlength="240" >
<div id="tipinfo4"></div></td>
  </tr>
  <tr>
    <td height="35" align="right">&nbsp;</td>
    <td height="28"><input type="hidden" name="submitok" value="modupdate" />
      <input type="submit" name="Submit" value=" 修 改 " class="button" />　
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('请慎重：\n\n★确认清空吗？ ')"><b>清空“红尘知己”类别资料</b></a></td>
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
<br /><br /><br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>