<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="addupdate") {
	if ($Temp_diarynum >=1 )callmsg("一天只能发一篇","-1");
	if (empty($title))callmsg("标题不能为空","-1");
	if (empty($content))callmsg("内容不能为空","-1");
	if (strlen($title)>100)callmsg("标题太长，请控制在100个字节以内","-1");
	if (strlen($content)>30000 || strlen($content)<20)callmsg("内容过多或过少，请控制在20~20000字节以内","-1");
	if (!ereg("^[1-6]{1}$",$weather))callmsg("请选择正确格式的“天气”","-1");
	if (!ereg("^[0-9]{1,2}$",$feel))callmsg("请选择正确格式的“心情”","-1");
	if (!ereg("^[0-1]{1}$",$diaryopen))callmsg("请选择正确格式的“这篇日记是否公开、保密”","-1");
	$addtime = date("Y-m-d H:i:s");
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2请输入正确格式的日期“时”和“分”如：18:30","-1");
	$yhtime1 = $year8.'-'.$month8.'-'.$day8;
	$yhtime2 = ' '.$hour8.':'.$minute8.':00'; 
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $yhtime1) )callmsg("请输入正确的格式的日期$yhtime1","-1");
	$stime = $yhtime1.$yhtime2;
	$flag = ($cook_grade > 1 )?1:0;
	setcookie("Temp_diarynum",$Temp_diarynum+1,null,"/",$Global['m_cookdomain']);  
	$db->query("INSERT INTO ".__TBL_DIARY__."  (userid,weather,feel,title,content,diaryopen,flag,stime,addtime) VALUES ('$cook_userid','$weather','$feel','$title','$content','$diaryopen',$flag,'$stime','$addtime')");
//
	if ($flag == 1 ){
		$tmpid = $db->insert_id();
		$rt = $db->query("SELECT a.userid,b.grade,b.if2 FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifagree=1 AND b.grade>=3");
		$total = $db->num_rows($rt);
		if ($total > 0 ) {
			for($i=0;$i<$total;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$uid = $rows[0];
				$ugrade =  $rows[1];
				$uif2 =  $rows[2];
				if ( ($uif2 == 2 || $uif2 == 3 || $uif2 == 4) && $ugrade >= 3 ){
					$content = "发表了一篇名为“".$title."”的日记，<a href=".$Global['home_2domain']."/diary".$tmpid.".html target=_blank  class=uDF2C91>点击查看</a>";
					$addtime = strtotime("now");
					$db->query("INSERT INTO ".__TBL_FRIEND_NEWS__."  (userid,senduserid,content,addtime) VALUES ($uid,$cook_userid,'$content',$addtime)");
				}
			}
		}
	}
//
	header("Location: f_diary.php?submitok=list");
} elseif ($submitok=="modupdate") {
	if (empty($title))callmsg("标题不能为空","-1");
	if (empty($content))callmsg("内容不能为空","-1");
	if (strlen($title)>100)callmsg("标题太长，请控制在100个字节以内","-1");
	if (strlen($content)>30000 || strlen($content)<20)callmsg("内容过多或过少，请控制在20~20000字节以内","-1");
	if (!ereg("^[1-6]{1}$",$weather))callmsg("请选择正确格式的“天气”","-1");
	if (!ereg("^[0-9]{1,2}$",$feel))callmsg("请选择正确格式的“心情”","-1");
	if (!ereg("^[0-1]{1}$",$diaryopen))callmsg("请选择正确格式的“这篇日记是否公开、保密”","-1");
	if ($hour8 <0 || $hour8 >24 || $minute8<0 || $minute8>59)callmsg("$jzbmtime2请输入正确格式的日期“时”和“分”如：18:30","-1");
	$yhtime1 = $year8.'-'.$month8.'-'.$day8;
	$yhtime2 = ' '.$hour8.':'.$minute8.':00'; 
	if ( !preg_match('/(^((((1[6-9]|[2-9]\d)\d{2})-(0?[13578]|1[02])-(0?[1-9]|[12]\d|3[01]))|(((1[6-9]|[2-9]\d)\d{2})-(0?[13456789]|1[012])-(0?[1-9]|[12]\d|30))|(((1[6-9]|[2-9]\d)\d{2})-0?2-(0?[1-9]|1\d|2[0-8]))|(((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))-0?2-29-))$)/', $yhtime1) )callmsg("请输入正确的格式的日期$yhtime1","-1");
	$stime = $yhtime1.$yhtime2;
	$flag = ($cook_grade > 1 )?1:0;
	$db->query("UPDATE ".__TBL_DIARY__." SET weather='$weather',feel='$feel',title='$title',content='$content',diaryopen='$diaryopen',flag='$flag',stime='$stime' WHERE id='$aid'");
	header("Location: f_diary.php?submitok=list&p=".$p);
} elseif ($submitok=="delupdate") {
	if ( !ereg("^[0-9]{1,10}$",$aid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_DIARY__." WHERE id=".$aid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		if ($memberid !== $cook_userid)callmsg("Forbidden!","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("DELETE FROM ".__TBL_DIARY__." WHERE id=".$aid);
	$db->query("DELETE FROM ".__TBL_DIARY_BBS__." WHERE fid=".$aid);
	header("Location: f_diary.php?submitok=list&p=".$p);
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
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:74px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:74px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:74px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:74px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:68px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "list" || $submitok == "mod")echo "class='liselect'"; ?>><a href="f_diary.php?submitok=list">我的日记</a></li>
<li <?php if ($submitok == "add")echo "class='liselect'"; ?>><a href="f_diary.php?submitok=add">发表日记</a></li>
<li><a href="f_diary_bbsed.php">我的评论</a></li>
<li><a href="f_diary_favorite.php">日记收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<?php if ($submitok=="add") { ?>
<br>
<form action="f_diary.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var year8 = document.FORM.year8.value;
	var month8 = document.FORM.month8.value;
	var day8 = document.FORM.day8.value;
	var hour8 = document.FORM.hour8.value;
	var minute8 = document.FORM.minute8.value;
	var dateerr = '请输入正确格式日期！';
	if(year8 == "")	{
	alert(dateerr);
	document.FORM.year8.focus();
	return false;
	}
	if(month8 == ""){
	alert(dateerr);
	document.FORM.month8.focus();
	return false;
	}
	if(day8 == "" )	{
	alert(dateerr);
	document.FORM.day8.focus();
	return false;
	}
	if(hour8 == "")	{
	alert(dateerr);
	document.FORM.hour8.focus();
	return false;
	}
	if(minute8 == "" )	{
	alert(dateerr);
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.weather.value=="")
	{
	alert('请选择天气！');
	document.FORM.weather.focus();
	return false;
	}
	if(document.FORM.feel.value=="")
	{
	alert('请选择心情！');
	document.FORM.feel.focus();
	return false;
	}
	if(document.FORM.title.value=="")
	{
	alert('请输入日记标题！');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('日记内容请控制在20~20000字节！');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
      <table width="650" height="204" border="0" align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td width="69" height="15" align="right">&nbsp;</td>
            <td colspan="3"><font color="#FF0000">（<?php echo $Global['m_area2']; ?>公安局网监郑重提醒：涉黄、涉政言论请勿发表，否则后果自负）</font></td>
          </tr>
          <tr>
            <td height="15" align="right">日　　期:</td>
            <td colspan="3"><input name="year8" type="text" class="input" id="year8" style="width:40px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("Y"); ?>" size="4" maxlength="4" />
年
  <input name="month8" type="text" class="input" id="month8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("m"); ?>" size="2" maxlength="2" />
月
<input name="day8" type="text" class="input" id="day8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("d"); ?>" size="2" maxlength="2" />
日　
<input name="hour8" type="text" class="input" id="hour8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("H"); ?>" size="2" maxlength="2" style="width:20px;" />
时
<input name="minute8" type="text" class="input" id="minute8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo date("i"); ?>" size="2" maxlength="2" style="width:20px;" />
分 </td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">天　　气:</td>
            <td width="66"><select name="weather" id="weather">
			<option value="" selected>选择</option>
              <option value="1">晴</option>
			  <option value="2">阴</option>
			  <option value="3">多云</option>
			  <option value="4">雨</option>
			  <option value="5">雷阵雨</option>
			  <option value="6">雪</option>
            </select></td>
            <td width="62" align="right">心　　情:</td>
            <td width="413"><select name="feel">
              <option value="" selected>选择</option>
              <option value="1">开心</option>
              <option value="2">吃惊</option>
              <option value="3">抓狂</option>
              <option value="4">伤心</option>
              <option value="5">动心</option>
              <option value="6">愤怒</option>
              <option value="7">傻笑</option>
              <option value="8">疑惑</option>
              <option value="9">感叹</option>
              <option value="10">郁闷</option>
              <option value="11">沮丧</option>
              <option value="12">一般</option>
            </select></td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">这篇日记:</td>
            <td colspan="3"><input name="diaryopen" type="radio" value="1" checked="checked" />
              公开
              <input name="diaryopen" type="radio" value="0" />
保密</td>
          </tr>
          <tr>
            <td width="69" height="30" align="right">标　　题:</td>
            <td colspan="3">              <input name="title" type="text" class="input" id="title" size="90" maxlength="60" />            </td>
          </tr>
          <tr>
            <td align="right">正　　文:</td>
            <td colspan="3" align="center" valign="top"><iframe src="/gyleditor/gyleditor500.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td height="27" align="right" bgcolor="#FFFFFF">上传照片:</td>
            <td height="27" colspan="3" align="left" bgcolor="#FFFFFF"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td height="28" colspan="4" align="center" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="addupdate" />
              <input name="Submit" type="submit" class="button" value=" 提交 " /></td>
          </tr>
    </table>
	</form>
      <br>
      <table width="600" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td width="36" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21"></td>
          <td valign="top"><img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">遵守<a href="/law.html" target="_blank" class=u666666>互联网电子公告服务管理规定</a>以及中华人民共和国其他各项有关法律法规。<br>
          <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">严禁在内容里公布任何形式的联系方式，包括QQ、邮箱、电话、地址、网址等。<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">严禁开展非法、商业性推广活动。<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">严禁灌水，乱发或发布相同信息，杜绝无聊话语。<br>            <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle">违反以上规定的一经发现，将扣除Love币1000以上，情节严重的将永久性删除会员资格及所有资料，不再另行通知。如有疑问，请与我们联系。 <br />
          <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>将对您的日记保留最终决定权。</td>
        </tr>
    </table>
      <br>
      <br>
<?php } elseif ($submitok=="mod") {?>
<?php
if ( !ereg("^[0-9]{1,8}$",$aid) || $aid == 0 ){
	callmsg("参数不正确！","-1");
} else {
	$rt = $db->query("SELECT weather,feel,title,content,diaryopen,stime FROM ".__TBL_DIARY__." WHERE id=".$aid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$weather = $row[0];
		$feel = $row[1];
		$title = $row[2];
		$content = $row[3];
		$diaryopen = $row[4];
		$stime = $row[5];
		$year8  = date_format2($stime,'%Y');
		$month8 = date_format2($stime,'%m');
		$day8   = date_format2($stime,'%d');
		$hour8  = date_format2($stime,'%H');
		$minute8= date_format2($stime,'%M');
	} else {
		callmsg("该日记不存在或已被删除！","./");
		exit;
	}
}
?>
      <br>
<form action="f_diary.php" method="post" name="FORM"  onSubmit="return chkform()" onClick="clear2bx()">
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	var year8 = document.FORM.year8.value;
	var month8 = document.FORM.month8.value;
	var day8 = document.FORM.day8.value;
	var hour8 = document.FORM.hour8.value;
	var minute8 = document.FORM.minute8.value;
	var dateerr = '请输入正确格式日期！';
	if(year8 == "")	{
	alert(dateerr);
	document.FORM.year8.focus();
	return false;
	}
	if(month8 == ""){
	alert(dateerr);
	document.FORM.month8.focus();
	return false;
	}
	if(day8 == "" )	{
	alert(dateerr);
	document.FORM.day8.focus();
	return false;
	}
	if(hour8 == "")	{
	alert(dateerr);
	document.FORM.hour8.focus();
	return false;
	}
	if(minute8 == "" )	{
	alert(dateerr);
	document.FORM.minute8.focus();
	return false;
	}
	if(document.FORM.weather.value=="")
	{
	alert('请选择天气！');
	document.FORM.weather.focus();
	return false;
	}
	if(document.FORM.feel.value=="")
	{
	alert('请选择心情！');
	document.FORM.feel.focus();
	return false;
	}
	if(document.FORM.title.value=="")
	{
	alert('请输入日记标题！');
	document.FORM.title.focus();
	return false;
	}
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0].innerHTML;
	sContent = clearAllFormat(sContent);
	document.FORM.content.value = sContent;
	if(document.FORM.content.value.length<20 || document.FORM.content.value.length>30000){
	alert('日记内容请控制在20~20000字节！');
	oEditor = document.htmlletter;
	fContent.focus();
	return false;
	}}
</script>
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text" value='<?php echo stripslashes($row['content']);?>'>
      <table width="650" height="204" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="efefef" style="border:#dddddd 0px solid;">
          <tr>
            <td width="67" height="30" align="right" bgcolor="#FFFFFF">日　　期:</td>
            <td colspan="3" bgcolor="#FFFFFF"><font color="#666666">
              <input name="year8" type="text" class="input" id="year8" style="width:40px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $year8; ?>" size="4" maxlength="4" />
年
<input name="month8" type="text" class="input" id="month8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $month8; ?>" size="2" maxlength="2" />
月
<input name="day8" type="text" class="input" id="day8" style="width:20px;" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $day8; ?>" size="2" maxlength="2" />
日　
<input name="hour8" type="text" class="input" id="hour8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $hour8; ?>" size="2" maxlength="2" style="width:20px;" />
时
<input name="minute8" type="text" class="input" id="minute8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" value="<?php echo $minute8; ?>" size="2" maxlength="2" style="width:20px;" />
            </font></td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">天　　气:</td>
            <td width="74" bgcolor="#FFFFFF"><select name="weather" id="weather">
                <option value="1" <?php if ($weather==1)echo "selected";?>>晴</option>
                <option value="2" <?php if ($weather==2)echo "selected";?>>阴</option>
                <option value="3" <?php if ($weather==3)echo "selected";?>>多云</option>
                <option value="4" <?php if ($weather==4)echo "selected";?>>雨</option>
                <option value="5" <?php if ($weather==5)echo "selected";?>>雷阵雨</option>
                <option value="6" <?php if ($weather==6)echo "selected";?>>雪</option>
            </select></td>
            <td width="55" align="right" bgcolor="#FFFFFF">心　　情:</td>
            <td width="414" bgcolor="#FFFFFF"><select name="feel">
                <option value="1" <?php if ($feel==1)echo "selected";?>>开心</option>
                <option value="2" <?php if ($feel==2)echo "selected";?>>吃惊</option>
                <option value="3" <?php if ($feel==3)echo "selected";?>>抓狂</option>
                <option value="4" <?php if ($feel==4)echo "selected";?>>伤心</option>
                <option value="5" <?php if ($feel==5)echo "selected";?>>动心</option>
                <option value="6" <?php if ($feel==6)echo "selected";?>>愤怒</option>
                <option value="7" <?php if ($feel==7)echo "selected";?>>傻笑</option>
                <option value="8" <?php if ($feel==8)echo "selected";?>>疑惑</option>
                <option value="9" <?php if ($feel==9)echo "selected";?>>感叹</option>
                <option value="10" <?php if ($feel==10)echo "selected";?>>郁闷</option>
                <option value="11" <?php if ($feel==11)echo "selected";?>>沮丧</option>
                <option value="12" <?php if ($feel==12)echo "selected";?>>一般</option>
            </select></td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">这篇日记:</td>
            <td colspan="3" bgcolor="#FFFFFF"><input name="diaryopen" type="radio" value="1" <?php if ($diaryopen==1)echo "checked";?>>
                公开
                <input name="diaryopen" type="radio" value="0" <?php if ($diaryopen==0)echo "checked";?>>
                保密</td>
          </tr>
          <tr>
            <td height="30" align="right" bgcolor="#FFFFFF">标　　题:</td>
            <td colspan="3" bgcolor="#FFFFFF">              <input name="title" type="text" class="input" id="title" value="<?php echo stripslashes($title)?>" size="90" maxlength="60" >            </td>
          </tr>
          <tr>
            <td align="right" valign="middle" bgcolor="#FFFFFF">正　　文: </td>
            <td colspan="3" align="center" valign="top" bgcolor="#FFFFFF"><iframe src="/gyleditor/gyleditor500.htm" id="htmlletter" name="htmlletter" style="height:421px; width:100%;" scrolling="no" border="0" frameborder="0" tabindex="3" ></iframe></td>
          </tr>
          <tr>
            <td height="27" align="right" bgcolor="#FFFFFF">上传照片:</td>
            <td height="27" colspan="3" align="left" bgcolor="#FFFFFF"><iframe src="<?php echo $Global['my_2domain'].'/up.php'; ?>" frameborder="0" allowTransparency="true" width="500" height="24" border=0 marginWidth="0" marginHeight="0" scroll="no"></iframe></td>
          </tr>
          <tr>
            <td height="28" colspan="4" align="center" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="modupdate" />
              <input name="aid" type="hidden" value="<?php echo $aid; ?>" />
              <input name="p" type="hidden" value="<?php echo $p; ?>" />
              <input type="submit" name="Submit" value=" 提交 " class="button" /></td>
          </tr>
    </table>
</form>      <br>
<table width="600" height="55" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="36" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21" /></td>
    <td valign="top"><img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />遵守<a href="/law.html" target="_blank" class="u666666">互联网电子公告服务管理规定</a>以及中华人民共和国其他各项有关法律法规。<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />严禁在内容里公布任何形式的联系方式，包括QQ、邮箱、电话、地址、网址等。<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />严禁开展非法、商业性推广活动。<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />严禁灌水，乱发或发布相同信息，杜绝无聊话语。<br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" />违反以上规定的一经发现，将扣除Love币1000以上，情节严重的将永久性删除会员资格及所有资料，不再另行通知。如有疑问，请与我们联系。 <br />
        <img src="images/li.gif" hspace="5" vspace="8" align="absmiddle" /><?php echo $Global['m_sitename']; ?>将对您的日记保留最终决定权。</td>
  </tr>
</table>
<br>
      <?php } elseif ($submitok=="list") {?>
      <?php
//列表程序开始
	$rt=$db->query("SELECT id,title,diaryopen,ifjh,click,hfnum,flag,stime FROM ".__TBL_DIARY__." WHERE  userid='$cook_userid' ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd><tr><td align=center bgcolor=efefef><font color=#999999>..暂无信息..</font><br><br><img src=images/add.gif hspace=3 align=absbottom><a href=f_diary.php?submitok=add class=u666666>点此发布</a></td></tr></table>";
	} else {
		$pagesize=10;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
      <table width="99" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
    </table>
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="461" height="30" align="center" valign="middle" style="border-bottom:#ddd 1px solid;"> 标　题</td>
          <td width="73" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">评论/浏览</td>
          <td width="53" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">修改</td>
          <td width="55" align="center" valign="middle" style="border-bottom:#ddd 1px solid;">删除</td>
        </tr>
        <?php
		for($i=0;$i<$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){
				$bg="bgcolor=#ffffff";
				$overbg="#FBF9F9";
				$outbg="#ffffff";
			} else {
				$bg="bgcolor=#ffffff";
				$overbg="#FBF9F9";
				$outbg="#ffffff";
			}
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td height="35" style="border-bottom:#E9E8E8 1px solid;padding-left:5px;"><font color="#999999"><?php echo date_format2($rows['stime'],'%Y-%m-%d');?></font> <a href="<?php echo $Global['home_2domain'];?>/diary<?php echo $rows['id'];?>.html" class=333333 target="_blank"><?php echo htmlout(stripslashes($rows['title'])); ?></a><?php 
if ($rows['flag']==0)echo " <font color=red>未审</font>";
if ($rows['diaryopen']==0)echo " <img src=images/m.gif title='密'>";
if ($rows['ifjh']==1)echo " <img src=images/jh.gif title='精华'>";
?></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><?php echo $rows['hfnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="f_diary.php?submitok=mod&aid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" class=666666><img src="images/modx.gif" hspace="3" border="0" align="absmiddle">修改</a></td>
          <td align="center" style="border-bottom:#E9E8E8 1px solid;"><a href="f_diary.php?submitok=delupdate&aid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？\n\n此操作将关联删除所属的全部评论。永久不得恢复！\n\n建议修改。')" class=666666><img src="images/delx.gif" hspace="3" border="0">删除</a></td>
        </tr>
        <?php }?>
    </table>
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
    <?php //lise end
			 }}?>
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>