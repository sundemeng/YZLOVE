<?php 
require_once '../sub/init.php';
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden","-1");
if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;}
if ( !ereg("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade)){header("Location: ".$Global['www_2domain']."/login.php");exit;}
if ($uid == $cook_userid)callmsg("不能和自已聊天。","0");
if ($cook_grade <= 1){
	callmsg("只有高级会员才可以聊天！",$Global['my_2domain']."/?k_vip.php");
} else {
	require_once YZLOVE.'sub/conn.php';
	
	$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_CHATIF__." WHERE senduserid=".$cook_userid);
	$rowonline = $db->fetch_array($rtonline);
	if ($rowonline[0] > 0)callmsg("不能同时发送多个聊天请求！","0");
	
	$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$uid);
	$rowonline = $db->fetch_array($rtonline);
	if ($rowonline[0] == 0)callmsg("对方暂时不在线，聊天失败！","0");
	if ($cook_grade != 10){
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1 LIMIT 1");
		if ($db->num_rows($rt)) {
			callmsg("对方已将你列为黑名单，聊天失败！","0");
			exit;
		}
	}
}
$rt = $db->query("SELECT nickname,grade,sex,photo_s,aboutus FROM ".__TBL_MAIN__." WHERE id=".$uid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$nickname= $row[0];
$grade= $row[1];
$sex= $row[2];
$photo_s= $row[3];
$aboutus = '　'.gylsubstr(htmlout(stripslashes($row[4])),160);
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息或用户不存在或未审核或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}

$addtime  = strtotime("now");
$db->query("INSERT INTO ".__TBL_CHATIF__."  (userid,senduserid,addtime) VALUES ($uid,$cook_userid,$addtime)");
$db->query("INSERT INTO ".__TBL_CHATIF__."  (userid,senduserid,ifagree,addtime) VALUES ($cook_userid,$uid,1,$addtime)");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>与 <?php echo $nickname; ?> 聊天中...<?php echo $Global['m_sitename']; ?></title>
<style type="text/css"> 
body{
font-size:12px;padding:0;margin:0px auto;text-align:center;background:#fff;color:#999;
SCROLLBAR-FACE-COLOR: #C4DFB7;/*拖条色*/
SCROLLBAR-TRACK-COLOR: #f0f0f0;/*拖条背景*/
SCROLLBAR-HIGHLIGHT-COLOR: #9FC989;/*拖条左上框色*/
SCROLLBAR-SHADOW-COLOR: #9FC989;/*拖条右下框色*/
SCROLLBAR-ARROW-COLOR: #ffffff;/*小三角*/
SCROLLBAR-3DLIGHT-COLOR: #ffffff;/*阴影(左上)*/
SCROLLBAR-DARKSHADOW-COLOR: #ffffff;/*阴影(右下)*/
}
a:link,a:visited,a:active {text-decoration:underline;color:#000;font-size:12px;}
a:hover {text-decoration:underline;color: #FF5f07;font-size:12px;} 
a.uDF2C91:link,a.uDF2C91:visited,a.uDF2C91:active {text-decoration:underline;color:#DF2C91;font-family:Arial,宋体;}
a.uDF2C91:hover {text-decoration:underline;color:#6F9F00;}
#chattips{color:#ffff00;background:#75AC58;font-size:20px;height:80px;width:434px;line-height:80px;font-family:黑体,宋体;text-align:center;margin-top:20px;margin-bottom:20px;border:#ff0 1px dotted}
.chatboxtitle {width:502px;height:28px;background-image:url(images/header_bg.gif);margin:0px auto;border-top:#9fc989 1px solid;border-left:#9fc989 1px solid;border-right:#9fc989 1px solid;margin-top:50px;text-align:left;color:#000;font-size:14px;font-weight:bold;line-height:32px}
.chatbox {width:502px;background-image:url(images/main_bg.gif);margin:0px auto;border:#9fc989 1px solid;padding:0 0 30px 0}
.chatbox .chatboxL{float:left;width:150px;text-align:right}
.chatbox .chatboxR{float:left;width:350px;text-align:left}
.clear{clear:both;height:0;width:1px;font-size:1px;visibility:hidden;}
</style>
</head>
<script language="javascript">
var gyltime;
function getObject(objectId) {
     if(document.getElementById && document.getElementById(objectId)){return document.getElementById(objectId);} 
     else if (document.all && document.all(objectId)){
       return document.all(objectId);
     }else if (document.layers && document.layers[objectId]){return document.layers[objectId];}else{return false;}
}
function createXMLHttpRequest(){ 
	if(window.XMLHttpRequest) {
	xmlHttp = new XMLHttpRequest();//mozilla浏览器 
	} else if(window.ActiveXObject) { 
	try{xmlHttp = new ActiveX0bject("Msxml2.XMLHTTP");} //IE老版本 
	catch(e) {} 
	try {xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}//IE新版本 
	catch(e) {} 
	if(!xmlHttp){ 
	window.alert("不能创建XMLHttpRequest对象实例"); 
	return false; 
	}}} 
function startRequest() {  
	createXMLHttpRequest();
	xmlHttp.open("GET","chksend_flag.php?uid=<?php echo $uid; ?>",true); 
	xmlHttp.onreadystatechange = handleStateChange; 
	xmlHttp.send(null); 
} 
function handleStateChange(){ 
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
		var returndate;
		returndate=xmlHttp.responseText;
		if(returndate == 1){
			getObject("chattips").innerHTML  = "Sorry!响应超时或Ta可能离开或拒绝了你。<input type=button value=重试 onclick=\"javascript:location.reload()\">";
			clearInterval(gyltime);
		} else if (returndate == 2){
			getObject("chattips").innerHTML  = "请求已发送,请等待对方响应...";
		} else if (returndate == 3){
			location.href =	"<?php echo './'.$uid.'.html'; ?>";
		}
	} 
}
window.onload = function(){
	gyltime=setInterval(startRequest,4000);	
}
</script>
<body>
<div class=chatboxtitle>&nbsp;正在等待“<?php echo $nickname; ?>”的聊天响应</div>
<div class=chatbox>
<div id="chattips" align="left">正在发送聊天请求...</div>
<div class=chatboxL><table width="116" height="141" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#b7d7a7 1px solid">
<tr>
<td width="530" align="center"><a href="<?php echo $Global['home_2domain'].'/'.$uid; ?>" target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $sex; ?>.gif border=0 title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> border=0 title="<?php echo $nickname.'的照片'; ?>"><?php }?></a></td>
</tr>
</table></div>
<div class=chatboxR>
<table width="298" height="73" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="24" valign="top"><b>
<?php geticon($sex.$grade); ?><a href="<?php echo $Global['home_2domain'].'/'.$uid; ?>" target=_blank><?php echo $nickname; ?></a></b></td>
</tr>
<tr>
<td style="line-height:200%"><?php echo gylsubstr($aboutus,200);?>……[ <a href="<?php echo $Global['home_2domain'].'/myarchive'.$uid; ?>.html" class="uDF2C91" target=_blank><b>查看详细</b></a>] </td>
</tr>
</table>
</div>
<div class="clear"></div>
</div><br />
<font color="#999999">&copy;版权所有<?php echo date("Y"); ?>　<?php echo $Global['m_sitename']; ?> (<a href="<?php echo $Global['www_2domain']; ?>" target="_blank"><?php echo $Global['m_siteurl']; ?></a>) </font>
</body>
</html>
<?php ob_end_flush();?>