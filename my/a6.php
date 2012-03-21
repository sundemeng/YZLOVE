<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1}$",$b1) || empty($b1) )callmsg("请选择“你有子女吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b2) || empty($b2) )callmsg("请选择“结婚后想要小孩吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b3) || empty($b3) )callmsg("请选择“你愿意为爱情迁居别处吗”！","-1");
	if ( !ereg("^[0-9]{1,2}$",$b4) || empty($b4) )callmsg("请选择“婚后你会承担多少家务”！","-1");
	if ( !ereg("^[0-9]{1}$",$b5) || empty($b5) )callmsg("请选择“喜欢旅游吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b6) || empty($b6) )callmsg("请选择“婚恋中双方的关系应该是”！","-1");
	if ( !ereg("^[0-9]{1}$",$b7) || empty($b7) )callmsg("请选择“你的婚恋态度”！","-1");
	if ( !ereg("^[0-9]{1}$",$b8) || empty($b8) )callmsg("请选择“你的经济状况”！","-1");
	if ( !ereg("^[0-9]{1}$",$b9) || empty($b9) )callmsg("请选择“对方的家庭重要吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b10) || empty($b10) )callmsg("请选择“你的消费观”！","-1");
	if ( !ereg("^[0-9]{1}$",$b11) || empty($b11) )callmsg("请选择“你对现在工作的态度”！","-1");
	if ( !ereg("^[0-9]{1}$",$b12) || empty($b12) )callmsg("请选择“你会打小孩吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b13) || empty($b13) )callmsg("请选择“家庭卫生”！","-1");
	if ( !ereg("^[0-9]{1}$",$b14) || empty($b14) )callmsg("请选择“爱养宠物吗”！","-1");
	if ( !ereg("^[0-9]{1}$",$b15) || empty($b15) )callmsg("请选择“异性密友”！","-1");
	if (strlen($b16)<2 || strlen($b16)>250)callmsg("“希望婚后的家庭关系”请控制在2~127字内。","-1");
	if (strlen($b17)<2 || strlen($b17)>250)callmsg("“你觉得两人相处最重要的是”请控制在2~127字内。","-1");
	if (strlen($b18)<2 || strlen($b18)>250)callmsg("“你希望的结婚后的生活圈”请控制在2~127字内。","-1");
	if (strlen($b19)<2 || strlen($b19)>250)callmsg("“你最看重对方的？”请控制在2~127字内。","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
	if (!$db->num_rows($rt)) {
		$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17,b18,b19) VALUES ('$cook_userid','$b1','$b2','$b3','$b4','$b5','$b6','$b7','$b8','$b9','$b10','$b11','$b12','$b13','$b14','$b15','$b16','$b17','$b18','$b19')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN_DATA__." SET b1='$b1',b2='$b2',b3='$b3',b4='$b4',b5='$b5',b6='$b6',b7='$b7',b8='$b8',b9='$b9',b10='$b10',b11='$b11',b12='$b12',b13='$b13',b14='$b14',b15='$b15',b16='$b16',b17='$b17',b18='$b18',b19='$b19',ifmod=0 WHERE userid='$cook_userid'");
	}
	callmsg("修改成功！","a7.php");
} elseif ($submitok=="emptyupdate") {
	$db->query("UPDATE ".__TBL_MAIN_DATA__." SET b1=0,b2=0,b3=0,b4=0,b5=0,b6=0,b7=0,b8=0,b9=0,b10=0,b11=0,b12=0,b13=0,b14=0,b15=0,b16='',b17='',b18='',b19='' WHERE userid=".$cook_userid);
	callmsg("已经清空，你的个人主页将不再显示此类型资料，想要恢复显示请重新修改！","a6.php");
}
$rt = $db->query("SELECT b1,b2,b3,b4,b5,b6,b7,b8,b9,b10,b11,b12,b13,b14,b15,b16,b17,b18,b19 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
<script language="JavaScript" type="text/javascript" src="a6.js"></script>
<body>
<ul>
<li><a href="a1.php">基本资料</a></li>
<li><a href="a2.php">详细资料</a></li>
<li><a href="a3.php">内心独白</a></li>
<li><a href="a4.php">联系方法</a></li>
<li><a href="a5.php">约会交友</a></li>
<li class="liselect"><a href="a6.php">婚姻恋爱</a></li>
<li><a href="a7.php">红尘知己</a></li>
<li><a href="a8.php">以商会友</a></li>
<li><a href="a9.php">修改密码</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <br />
<table width="650" border="0" align="center" cellPadding="2" cellSpacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
<tr>
<td width="228" height="30" align="right"> 你有子女吗:</td>
<td width="414"><select id="b1" name="b1">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b1']==1)echo "selected"; ?>>无子女</option>
<option value="2" <?php if ($row['b1']==2)echo "selected"; ?>>有子女，不住在一起</option>
<option value="3" <?php if ($row['b1']==3)echo "selected"; ?>>有子女，偶尔在一起</option>
<option value="4" <?php if ($row['b1']==4)echo "selected"; ?>>有子女，同住一起</option>
<option value="5" <?php if ($row['b1']==5)echo "selected"; ?>>我没有，你有也没关系</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 结婚后想要小孩吗:</td>
<td width="414"><select id="b2" name="b2">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b2']==1)echo "selected"; ?>>不要，不喜欢</option>
<option value="2" <?php if ($row['b2']==2)echo "selected"; ?>>结婚后马上就要</option>
<option value="3" <?php if ($row['b2']==3)echo "selected"; ?>>过几年再要</option>
<option value="4" <?php if ($row['b2']==4)echo "selected"; ?>>顺其自然</option>
<option value="5" <?php if ($row['b2']==5)echo "selected"; ?>>暂时不考虑</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你愿意为爱情迁居别处吗:</td>
<td><select  id="b3" name="b3">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b3']==1)echo "selected"; ?>>不会</option>
<option value="2" <?php if ($row['b3']==2)echo "selected"; ?>>还是对方搬到我这来吧</option>
<option value="3" <?php if ($row['b3']==3)echo "selected"; ?>>如果决定结婚就行</option>
<option value="4" <?php if ($row['b3']==4)echo "selected"; ?>>如果关系已经较稳定，可以考虑</option>
<option value="5" <?php if ($row['b3']==5)echo "selected"; ?>>要看搬去哪里，不喜欢的地方不行</option>
<option value="6" <?php if ($row['b3']==6)echo "selected"; ?>>为了爱情，当然可以</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 婚后你会承担多少家务:</td>
<td><select id="b4" name="b4">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b4']==1)echo "selected"; ?>>全部他(她)做</option>
<option value="2" <?php if ($row['b4']==2)echo "selected"; ?>>10%</option>
<option value="3" <?php if ($row['b4']==3)echo "selected"; ?>>20%</option>
<option value="4" <?php if ($row['b4']==4)echo "selected"; ?>>30%</option>
<option value="5" <?php if ($row['b4']==5)echo "selected"; ?>>40%</option>
<option value="6" <?php if ($row['b4']==6)echo "selected"; ?>>50%</option>
<option value="7" <?php if ($row['b4']==7)echo "selected"; ?>>60%</option>
<option value="8" <?php if ($row['b4']==8)echo "selected"; ?>>70%</option>
<option value="9" <?php if ($row['b4']==9)echo "selected"; ?>>80%</option>
<option value="10" <?php if ($row['b4']==10)echo "selected"; ?>>90%</option>
<option value="11" <?php if ($row['b4']==11)echo "selected"; ?>>全部我做</option>
<option value="12" <?php if ($row['b4']==12)echo "selected"; ?>>看情况，谁有时间谁做</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 喜欢旅游吗:</td>
<td><select  id="b5" name="b5">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b5']==1)echo "selected"; ?>>喜欢</option>
<option value="2" <?php if ($row['b5']==2)echo "selected"; ?>>每年都去旅游度假</option>
<option value="3" <?php if ($row['b5']==3)echo "selected"; ?>>没时间，很少去</option>
<option value="4" <?php if ($row['b5']==4)echo "selected"; ?>>工作就是最大乐趣</option>
<option value="5" <?php if ($row['b5']==5)echo "selected"; ?>>存够钱就旅游</option>
<option value="6" <?php if ($row['b5']==6)echo "selected"; ?>>只在附近玩玩</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 婚恋中双方的关系应该是:</td>
<td><select  id="b6" name="b6">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b6']==1)echo "selected"; ?>>彼此完全占有</option>
<option value="2" <?php if ($row['b6']==2)echo "selected"; ?>>亲密无间，不分你我</option>
<option value="3" <?php if ($row['b6']==3)echo "selected"; ?>>完全依赖</option>
<option value="4" <?php if ($row['b6']==4)echo "selected"; ?>>彼此关心但保持距离</option>
<option value="5" <?php if ($row['b6']==5)echo "selected"; ?>>满足对方需要，同时有独立空间</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你的婚恋态度:<img height="5" src width="1"></td>
<td><select id="b7" name="b7">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b7']==1)echo "selected"; ?>>不会同意离婚</option>
<option value="2" <?php if ($row['b7']==2)echo "selected"; ?>>希望能有比较长久的关系</option>
<option value="3" <?php if ($row['b7']==3)echo "selected"; ?>>相信真正的爱情能永恒</option>
<option value="4" <?php if ($row['b7']==4)echo "selected"; ?>>不在乎天长地久，只在乎曾经拥有</option>
<option value="5" <?php if ($row['b7']==5)echo "selected"; ?>>顺其自然，感情不能强求</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你的经济状况:</td>
<td><select  id="b8" name="b8">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b8']==1)echo "selected"; ?>>除了钱，什么都有</option>
<option value="2" <?php if ($row['b8']==2)echo "selected"; ?>>目前什么都没有，以后会有的</option>
<option value="3" <?php if ($row['b8']==3)echo "selected"; ?>>有些存款</option>
<option value="4" <?php if ($row['b8']==4)echo "selected"; ?>>有存款，有房</option>
<option value="5" <?php if ($row['b8']==5)echo "selected"; ?>>有存款，有房有车</option>
<option value="6" <?php if ($row['b8']==6)echo "selected"; ?>>钱不用担心，我很富裕</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 对方的家庭重要吗:</td>
<td><select  id="b9" name="b9">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b9']==1)echo "selected"; ?>>最好有富裕的家庭</option>
<option value="2" <?php if ($row['b9']==2)echo "selected"; ?>>大家处得来就行</option>
<option value="3" <?php if ($row['b9']==3)echo "selected"; ?>>不能负担太重</option>
<option value="4" <?php if ($row['b9']==4)echo "selected"; ?>>无所谓，和我无关</option>
<option value="5" <?php if ($row['b9']==5)echo "selected"; ?>>只要相爱，什么样都行</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你的消费观:</td>
<td><select  id="b10" name="b10">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b10']==1)echo "selected"; ?>>吃光用光花光</option>
<option value="2" <?php if ($row['b10']==2)echo "selected"; ?>>用一些，存一些</option>
<option value="3" <?php if ($row['b10']==3)echo "selected"; ?>>买些必需品，其余存起来</option>
<option value="4" <?php if ($row['b10']==4)echo "selected"; ?>>能省则省，该花则花</option>
<option value="5" <?php if ($row['b10']==5)echo "selected"; ?>>有人说我吝啬，我觉得是节省</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你对现在工作的态度:</td>
<td><select  id="b11" name="b11">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b11']==1)echo "selected"; ?>>工作狂</option>
<option value="2" <?php if ($row['b11']==2)echo "selected"; ?>>积极，认真</option>
<option value="3" <?php if ($row['b11']==3)echo "selected"; ?>>上进，有事业心</option>
<option value="4" <?php if ($row['b11']==4)echo "selected"; ?>>8小时内尽心尽力</option>
<option value="5" <?php if ($row['b11']==5)echo "selected"; ?>>挣钱的手段而已</option>
<option value="6" <?php if ($row['b11']==6)echo "selected"; ?>>混日子，糊弄领导</option>
<option value="7" <?php if ($row['b11']==7)echo "selected"; ?>>盼着退休</option>
<option value="8" <?php if ($row['b11']==8)echo "selected"; ?>>目前的工作不适合我</option>
<option value="9" <?php if ($row['b11']==9)echo "selected"; ?>>现在没工作</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 你会打小孩吗:</td>
<td><select  id="b12" name="b12">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b12']==1)echo "selected"; ?>>不赞成，不会打</option>
<option value="2" <?php if ($row['b12']==2)echo "selected"; ?>>很少，除非太过份</option>
<option value="3" <?php if ($row['b12']==3)echo "selected"; ?>>轻轻打，警告一下</option>
<option value="4" <?php if ($row['b12']==4)echo "selected"; ?>>打是一种教育手段</option>
<option value="5" <?php if ($row['b12']==5)echo "selected"; ?>>棍棒出孝子</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 家庭卫生:</td>
<td><select  id="b13" name="b13">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b13']==1)echo "selected"; ?>>不太在乎</option>
<option value="2" <?php if ($row['b13']==2)echo "selected"; ?>>不太乱就行</option>
<option value="3" <?php if ($row['b13']==3)echo "selected"; ?>>喜欢整洁</option>
<option value="4" <?php if ($row['b13']==4)echo "selected"; ?>>喜欢别人打扫干净</option>
<option value="5" <?php if ($row['b13']==5)echo "selected"; ?>>有洁癖</option>
<option value="6" <?php if ($row['b13']==6)echo "selected"; ?>>先弄乱再收拾</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 爱养宠物吗:</td>
<td><select  id="b14" name="b14">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b14']==1)echo "selected"; ?>>最好不要</option>
<option value="2" <?php if ($row['b14']==2)echo "selected"; ?>>只喜欢鱼、鸟等</option>
<option value="3" <?php if ($row['b14']==3)echo "selected"; ?>>喜欢狗，猫等</option>
<option value="4" <?php if ($row['b14']==4)echo "selected"; ?>>最好办个动物园</option>
<option value="5" <?php if ($row['b14']==5)echo "selected"; ?>>你可以养，别让我照顾</option>
</select></td>
</tr>
<tr>
<td height="30" align="right"> 异性密友:</td>
<td height="32"><select  id="b15" name="b15">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['b15']==1)echo "selected"; ?>>婚后最好不要有了</option>
<option value="2" <?php if ($row['b15']==2)echo "selected"; ?>>你可以有，让我知道就行</option>
<option value="3" <?php if ($row['b15']==3)echo "selected"; ?>>你可以有，但别让我知道</option>
<option value="4" <?php if ($row['b15']==4)echo "selected"; ?>>可以，只要别冷落我</option>
<option value="5" <?php if ($row['b15']==5)echo "selected"; ?>>各有各的，互不干涉</option>
<option value="6" <?php if ($row['b15']==6)echo "selected"; ?>>成为共同的朋友</option>
</select></td>
</tr>
<tr>
<td height="30" align="right">希望婚后的家庭关系:</td>
<td height="32"><input name="b16" type="text"  class=input id="b16" onFocus="setTagBehavior(this,'b16','tipinfo1');" value="<?php echo htmlout(stripslashes($row['b16']));?>" size="60" maxlength="240" >
<div id="tipinfo1"></div></td>
</tr>
<tr>
<td height="30" align="right">你觉得两人相处最重要的是:</td>
<td height="32"><input name="b17" type="text"  class=input id="b17" onFocus="setTagBehavior(this,'b17','tipinfo2');" value="<?php echo htmlout(stripslashes($row['b17']));?>" size="60" maxlength="240" >
<div id="tipinfo2"></div></td>
</tr>
<tr>
<td height="30" align="right">你希望的结婚后的生活圈:</td>
<td height="32"><input name="b18" type="text"  class=input id="b18" onFocus="setTagBehavior(this,'b18','tipinfo3');" value="<?php echo htmlout(stripslashes($row['b18']));?>" size="60" maxlength="240" >
<div id="tipinfo3"></div></td>
</tr>
<tr>
<td height="30" align="right">你最看重对方的:</td>
<td height="32"><input name="b19" type="text"  class=input id="b19" onFocus="setTagBehavior(this,'b19','tipinfo4');" value="<?php echo htmlout(stripslashes($row['b19']));?>" size="60" maxlength="240" >
<div id="tipinfo4"></div></td>
</tr>
<tr>
<td height="35" align="right">&nbsp;</td>
<td height="32"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" 修 改 " class="button" />　
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('请慎重：\n\n★确认清空吗？ ')"><b>清空“婚姻恋爱”类别资料</b></a></td>
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