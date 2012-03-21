<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="modupdate") {
if (strlen($d1)>255)callmsg("“以商会友目的”请控制在2~127个字内","-1");
if (strlen($d2)>100)callmsg("“公司/机构名称”请控制在2~50个字内","-1");
if ( !ereg("^[0-9]{1,2}$",$d3) || empty($d3) )callmsg("请选择“职务分类”","-1");
if ( !ereg("^[0-9]{1,2}$",$d4) || empty($d4) )callmsg("请选择“职位等级:”","-1");
if (strlen($d5)>100)callmsg("“职务名称”请控制在2~50个字内","-1");
if ( !ereg("^[0-9]{1,2}$",$d6) || empty($d4) )callmsg("请选择“产业类别:”","-1");
if (strlen($d7)>100)callmsg("“学校科系”请控制在2~50个字内","-1");
if (strlen($d8)>100)callmsg("“熟悉领域”请控制在2~50个字内","-1");
if (strlen($d9)>100)callmsg("“专长兴趣”请控制在2~50个字内","-1");
if (strlen($d10)>100)callmsg("“往来机构”请控制在2~50个字内","-1");
if (strlen($d11)>2000)callmsg("“工作经历”请控制在2000个字节，1000个汉字内","-1");
$rt = $db->query("SELECT userid FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
if (!$db->num_rows($rt)) {
$db->query("INSERT INTO ".__TBL_MAIN_DATA__."  (userid,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,c11) VALUES ('$cook_userid','$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9','$d10','$d11')");
} else {
$db->query("UPDATE ".__TBL_MAIN_DATA__." SET d1='$d1',d2='$d2',d3='$d3',d4='$d4',d5='$d5',d6='$d6',d7='$d7',d8='$d8',d9='$d9',d10='$d10',d11='$d11',ifmod=0 WHERE userid='$cook_userid'");
}
callmsg("修改成功！","c_photo_up.php");
} elseif ($submitok=="emptyupdate") {
$db->query("UPDATE ".__TBL_MAIN_DATA__." SET d1='',d2='',d3=0,d4=0,d5='',d6=0,d7='',d8='',d9='',d10='',d11='' WHERE userid=".$cook_userid);
callmsg("已经清空，你的个人主页将不再显示此类型资料，想要恢复显示请重新修改！","a8.php");
}
$rt = $db->query("SELECT d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11 FROM ".__TBL_MAIN_DATA__." WHERE userid=".$cook_userid);
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
#tipinfo1,#tipinfo2,#tipinfo3,#tipinfo4,#tipinfo5{display:none;width:230px;background:#F8FCF5;height:80px;margin:5px;line-height:200%;;overflow:scroll;overflow-x:hidden;}
--> 
</style>
</head>
<script language="JavaScript" type="text/javascript" src="a8.js"></script>
<body>
<ul>
<li><a href="a1.php">基本资料</a></li>
<li><a href="a2.php">详细资料</a></li>
<li><a href="a3.php">内心独白</a></li>
<li><a href="a4.php">联系方法</a></li>
<li><a href="a5.php">约会交友</a></li>
<li><a href="a6.php">婚姻恋爱</a></li>
<li><a href="a7.php">红尘知己</a></li>
<li class="liselect"><a href="a8.php">以商会友</a></li>
<li><a href="a9.php">修改密码</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
<br />
<table width="650" border="0" align="center" cellpadding="2" cellspacing="0" style="color:#666;">
<form action="" method="post" name=YZLOVEFORM onSubmit="return chkform()">
<tr> 
<td width="169" height="35" align="right">以商会友目的:</td>
<td width="473">
<input name="d1" type="text" class=input id="d1" onFocus="setTagBehavior(this,'d1','tipinfo1');" value="<?php echo htmlout(stripslashes($row['d1']));?>" size="40" maxlength="120" >
<div id="tipinfo1"></div></td>
</tr>
<tr> 
<td height="35" align="right">公司/机构名称:</td>
<td>  <input name="d2" type="text" id="d2" value="<?php echo htmlout(stripslashes($row['d2']));?>" size="40" maxlength="40" class=input></td>
</tr>
<tr> 
<td height="35" align="right">职务分类:</td>
<td>
<select name="d3" id="d3">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['d3']==1)echo "selected"; ?>>经营管理</option>
<option value="2" <?php if ($row['d3']==2)echo "selected"; ?>>项目管理</option>
<option value="3" <?php if ($row['d3']==3)echo "selected"; ?>>人力资源</option>
<option value="4" <?php if ($row['d3']==4)echo "selected"; ?>>行政后勤</option>
<option value="5" <?php if ($row['d3']==5)echo "selected"; ?>>财务/审计</option>
<option value="6" <?php if ($row['d3']==6)echo "selected"; ?>>信息/资料管理</option>
<option value="7" <?php if ($row['d3']==7)echo "selected"; ?>>工程师(计算机硬件)</option>
<option value="8" <?php if ($row['d3']==8)echo "selected"; ?>>工程师(计算机软件)</option>
<option value="9" <?php if ($row['d3']==9)echo "selected"; ?>>工程师(计算机网络)</option>
<option value="10" <?php if ($row['d3']==10)echo "selected"; ?>>工程师(系统与安全)</option>
<option value="11" <?php if ($row['d3']==11)echo "selected"; ?>>工程师(其他)</option>
<option value="12" <?php if ($row['d3']==12)echo "selected"; ?>>工程/技术助理</option>
<option value="13" <?php if ($row['d3']==13)echo "selected"; ?>>网站管理/策划/设计</option>
<option value="14" <?php if ($row['d3']==14)echo "selected"; ?>>建筑/园林/室内设计</option>
<option value="15" <?php if ($row['d3']==15)echo "selected"; ?>>商业设计/创意</option>
<option value="16" <?php if ($row['d3']==16)echo "selected"; ?>>研发</option>
<option value="17" <?php if ($row['d3']==17)echo "selected"; ?>>生产管理</option>
<option value="18" <?php if ($row['d3']==18)echo "selected"; ?>>工程管理</option>
<option value="19" <?php if ($row['d3']==19)echo "selected"; ?>>生产工艺/设备</option>
<option value="20" <?php if ($row['d3']==20)echo "selected"; ?>>质量控制</option>
<option value="21" <?php if ($row['d3']==21)echo "selected"; ?>>技工/施工/操作人员</option>
<option value="22" <?php if ($row['d3']==22)echo "selected"; ?>>工程造价/预决算</option>
<option value="23" <?php if ($row['d3']==23)echo "selected"; ?>>农林牧渔</option>
<option value="24" <?php if ($row['d3']==24)echo "selected"; ?>>市场营销/商务拓展</option>
<option value="25" <?php if ($row['d3']==25)echo "selected"; ?>>市场调查与分析</option>
<option value="26" <?php if ($row['d3']==26)echo "selected"; ?>>广告/公关/媒介</option>
<option value="27" <?php if ($row['d3']==27)echo "selected"; ?>>销售/贸易</option>
<option value="28" <?php if ($row['d3']==28)echo "selected"; ?>>报关/跟单</option>
<option value="29" <?php if ($row['d3']==29)echo "selected"; ?>>电子商务</option>
<option value="30" <?php if ($row['d3']==30)echo "selected"; ?>>客户服务</option>
<option value="31" <?php if ($row['d3']==31)echo "selected"; ?>>采购</option>
<option value="32" <?php if ($row['d3']==32)echo "selected"; ?>>运输/物流/仓储</option>
<option value="33" <?php if ($row['d3']==33)echo "selected"; ?>>金融保险专业人员</option>
<option value="34" <?php if ($row['d3']==34)echo "selected"; ?>>金融保险经纪人</option>
<option value="35" <?php if ($row['d3']==35)echo "selected"; ?>>律师/法务人员</option>
<option value="36" <?php if ($row['d3']==36)echo "selected"; ?>>猎头/人才中介</option>
<option value="37" <?php if ($row['d3']==37)echo "selected"; ?>>顾问</option>
<option value="38" <?php if ($row['d3']==38)echo "selected"; ?>>策划</option>
<option value="39" <?php if ($row['d3']==39)echo "selected"; ?>>培训师</option>
<option value="40" <?php if ($row['d3']==40)echo "selected"; ?>>翻译</option>
<option value="41" <?php if ($row['d3']==41)echo "selected"; ?>>记者/新闻工作者</option>
<option value="42" <?php if ($row['d3']==42)echo "selected"; ?>>编辑/文字/文案</option>
<option value="43" <?php if ($row['d3']==43)echo "selected"; ?>>传播/发行</option>
<option value="44" <?php if ($row['d3']==44)echo "selected"; ?>>文艺制作</option>
<option value="45" <?php if ($row['d3']==45)echo "selected"; ?>>演艺人员</option>
<option value="46" <?php if ($row['d3']==46)echo "selected"; ?>>演艺/体育经纪人</option>
<option value="47" <?php if ($row['d3']==47)echo "selected"; ?>>导游</option>
<option value="48" <?php if ($row['d3']==48)echo "selected"; ?>>教练/运动员</option>
<option value="49" <?php if ($row['d3']==49)echo "selected"; ?>>医生/医师/护理人员</option>
<option value="50" <?php if ($row['d3']==50)echo "selected"; ?>>美容/保健/营养师</option>
<option value="51" <?php if ($row['d3']==51)echo "selected"; ?>>兽医/动物管理/园艺</option>
<option value="52" <?php if ($row['d3']==52)echo "selected"; ?>>安全保卫</option>
<option value="53" <?php if ($row['d3']==53)echo "selected"; ?>>服务业管理</option>
<option value="54" <?php if ($row['d3']==54)echo "selected"; ?>>服务业技术人员</option>
<option value="55" <?php if ($row['d3']==55)echo "selected"; ?>>服务人员</option>
<option value="56" <?php if ($row['d3']==56)echo "selected"; ?>>教师/教育工作者</option>
<option value="57" <?php if ($row['d3']==57)echo "selected"; ?>>义工/社团工作者</option>
<option value="58" <?php if ($row['d3']==58)echo "selected"; ?>>公务员</option>
<option value="59" <?php if ($row['d3']==59)echo "selected"; ?>>私营企业主</option>
<option value="60" <?php if ($row['d3']==60)echo "selected"; ?>>自由职业者</option>
<option value="61" <?php if ($row['d3']==61)echo "selected"; ?>>培训生</option>
<option value="62" <?php if ($row['d3']==62)echo "selected"; ?>>在校学生</option>
<option value="63" <?php if ($row['d3']==63)echo "selected"; ?>>其他</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">职位等级:</td>
<td>
<select name="d4" id="d4">
<option value="" selected>请选择</option>
<option value="1" <?php if ($row['d4']==1)echo "selected"; ?>>初期阶段(2年以内工作经验)</option>
<option value="2" <?php if ($row['d4']==2)echo "selected"; ?>>中级阶段(2-5年工作经验)</option>
<option value="3" <?php if ($row['d4']==3)echo "selected"; ?>>高级阶段(5年以上工作经验/经理或专才)</option>
<option value="4" <?php if ($row['d4']==4)echo "selected"; ?>>总监</option>
<option value="5" <?php if ($row['d4']==5)echo "selected"; ?>>高级管理级别(CEO, EVP, GM)</option>
<option value="6" <?php if ($row['d4']==6)echo "selected"; ?>>其他</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">职务名称:</td>
<td> 
<input name="d5" type="text" id="d5" value="<?php echo htmlout(stripslashes($row['d5']));?>" size="40" maxlength="40" class="input">
(如：董事长,经理,销售顾问)</td>
</tr>
<tr> 
<td height="35" align="right">产业类别:</td>
<td>
<select name="d6" id="d6">
<option value='' selected>请选择</option>
<option value="1" <?php if ($row['d6']==1)echo "selected"; ?>>互联网/电子商务</option>
<option value="2" <?php if ($row['d6']==2)echo "selected"; ?>>计算机硬件</option>
<option value="3" <?php if ($row['d6']==3)echo "selected"; ?>>计算机软件</option>
<option value="4" <?php if ($row['d6']==4)echo "selected"; ?>>集成电路</option>
<option value="5" <?php if ($row['d6']==5)echo "selected"; ?>>电子</option>
<option value="6" <?php if ($row['d6']==6)echo "selected"; ?>>计算机外设</option>
<option value="7" <?php if ($row['d6']==7)echo "selected"; ?>>光电通信</option>
<option value="8" <?php if ($row['d6']==8)echo "selected"; ?>>光学精密</option>
<option value="9" <?php if ($row['d6']==9)echo "selected"; ?>>通讯</option>
<option value="10" <?php if ($row['d6']==10)echo "selected"; ?>>电机电工</option>
<option value="11" <?php if ($row['d6']==11)echo "selected"; ?>>多媒体</option>
<option value="12" <?php if ($row['d6']==12)echo "selected"; ?>>制药/医疗设备/生物工程</option>
<option value="13" <?php if ($row['d6']==13)echo "selected"; ?>>仪器/仪表/工业自动化</option>
<option value="14" <?php if ($row['d6']==14)echo "selected"; ?>>金融/投资/证券</option>
<option value="15" <?php if ($row['d6']==15)echo "selected"; ?>>法律/会计</option>
<option value="16" <?php if ($row['d6']==16)echo "selected"; ?>>人才中介</option>
<option value="17" <?php if ($row['d6']==17)echo "selected"; ?>>咨询/专业服务</option>
<option value="18" <?php if ($row['d6']==18)echo "selected"; ?>>市场/广告/公关</option>
<option value="19" <?php if ($row['d6']==19)echo "selected"; ?>>广播/影视</option>
<option value="20" <?php if ($row['d6']==20)echo "selected"; ?>>传媒/新闻出版</option>
<option value="21" <?php if ($row['d6']==21)echo "selected"; ?>>保险业</option>
<option value="22" <?php if ($row['d6']==22)echo "selected"; ?>>建筑/房地产</option>
<option value="23" <?php if ($row['d6']==23)echo "selected"; ?>>物业管理</option>
<option value="24" <?php if ($row['d6']==24)echo "selected"; ?>>娱乐/运动/休闲</option>
<option value="25" <?php if ($row['d6']==25)echo "selected"; ?>>批发/零售</option>
<option value="26" <?php if ($row['d6']==26)echo "selected"; ?>>医疗/保健/卫生服务</option>
<option value="27" <?php if ($row['d6']==27)echo "selected"; ?>>旅游/酒店/餐饮服务</option>
<option value="28" <?php if ($row['d6']==28)echo "selected"; ?>>贸易</option>
<option value="29" <?php if ($row['d6']==29)echo "selected"; ?>>运输/物流/快递</option>
<option value="30" <?php if ($row['d6']==30)echo "selected"; ?>>艺术/文化</option>
<option value="31" <?php if ($row['d6']==31)echo "selected"; ?>>中介/服务业</option>
<option value="32" <?php if ($row['d6']==32)echo "selected"; ?>>机械/机电/重工业</option>
<option value="33" <?php if ($row['d6']==33)echo "selected"; ?>>食品/饮料/烟酒</option>
<option value="34" <?php if ($row['d6']==34)echo "selected"; ?>>办公/文教/安防</option>
<option value="35" <?php if ($row['d6']==35)echo "selected"; ?>>农林畜牧渔</option>
<option value="36" <?php if ($row['d6']==36)echo "selected"; ?>>五金/金属制品业</option>
<option value="37" <?php if ($row['d6']==37)echo "selected"; ?>>环保</option>
<option value="38" <?php if ($row['d6']==38)echo "selected"; ?>>化工/橡塑/精细化工</option>
<option value="39" <?php if ($row['d6']==39)echo "selected"; ?>>纺织/服装/服饰</option>
<option value="40" <?php if ($row['d6']==40)echo "selected"; ?>>车辆/机械动力</option>
<option value="41" <?php if ($row['d6']==41)echo "selected"; ?>>家具/室内设计/装潢</option>
<option value="42" <?php if ($row['d6']==42)echo "selected"; ?>>玻璃/陶瓷</option>
<option value="43" <?php if ($row['d6']==43)echo "selected"; ?>>家电业</option>
<option value="44" <?php if ($row['d6']==44)echo "selected"; ?>>工艺品/玩具</option>
<option value="45" <?php if ($row['d6']==45)echo "selected"; ?>>纸品/印刷/包装</option>
<option value="46" <?php if ($row['d6']==46)echo "selected"; ?>>电力/电气/能源</option>
<option value="47" <?php if ($row['d6']==47)echo "selected"; ?>>矿产/冶金</option>
<option value="48" <?php if ($row['d6']==48)echo "selected"; ?>>航空/航天研究与制造</option>
<option value="49" <?php if ($row['d6']==49)echo "selected"; ?>>其他制造</option>
<option value="50" <?php if ($row['d6']==50)echo "selected"; ?>>培训机构/教育/科研院所</option>
<option value="51" <?php if ($row['d6']==51)echo "selected"; ?>>政府/公共事业</option>
<option value="52" <?php if ($row['d6']==52)echo "selected"; ?>>非盈利机构(协会/社团)</option>
<option value="53" <?php if ($row['d6']==53)echo "selected"; ?>>其他</option>
</select></td>
</tr>
<tr> 
<td height="35" align="right">学校科系:</td>
<td> 
<input name="d7" type="text" id="d7" value="<?php echo htmlout(stripslashes($row['d7']));?>" size="40" maxlength="40" class=input>
(如：扬州大学，计算机应用)</td>
</tr>
<tr> 
<td height="35" align="right">熟悉领域:</td>
<td> 
<input name="d8" type="text" id="d8" value="<?php echo htmlout(stripslashes($row['d8']));?>" size="40" maxlength="40" class=input>
(如：网络，房地产)</td>
</tr>
<tr> 
<td height="35" align="right">专长兴趣:</td>
<td> 
<input name="d9" type="text" id="d9" value="<?php echo htmlout(stripslashes($row['d9']));?>" size="40" maxlength="40" class=input>
(如：营销，策划)</td>
</tr>
<tr> 
<td height="35" align="right">往来机构:</td>
<td>  <input name="d10" type="text" id="d10" value="<?php echo htmlout(stripslashes($row['d10']));?>" size="40" maxlength="40" class=input></td>
</tr>
<tr> 
<td height="35" align="right">工作经历:</td>
<td> 
<textarea name="d11" cols="60" rows="5" id="d11"><?php echo htmlout(stripslashes($row['d11']));?></textarea>
<br>
请控制在2000字节，1000汉字。</td>
</tr>
<tr> 
<td height="35" align="right">&nbsp;</td>
<td bgcolor="#FFFFFF"><input type="hidden" name="submitok" value="modupdate" />
<input type="submit" name="Submit" value=" 修 改 " class="button" />　
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?submitok=emptyupdate" class="uDF2C91" onClick="return confirm('请慎重：\n\n★确认清空吗？ ')"><b>清空“以商会友”类别资料</b></a></td>
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