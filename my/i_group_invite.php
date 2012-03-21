<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,9}$",$mainid) || empty($mainid) )callmsg("Forbidden!","-1");
$rt = $db->query("SELECT title,useropen,userid,userid1,userid2,userid3 FROM ".__TBL_GROUP_MAIN__." WHERE id=".$mainid." AND flag=1");
if($db->num_rows($rt)){
	$row = $db->fetch_array($rt);
	$maintitle = stripslashes($row['title']);
	$useropen = $row['useropen'];
	$userid_main = $row['userid'];
	$userid1_main = $row['userid1'];
	$userid2_main = $row['userid2'];
	$userid3_main = $row['userid3'];
} else {
	callmsg("请求错误，没有操作权限!","-1");
}
if ($userid_main == $cook_userid || $userid1_main == $cook_userid || $userid2_main == $cook_userid || $userid3_main == $cook_userid || $cook_grade == 10) {
	$authority_main = "OK";
} else {
	$authority_main = "NO";
}
if ($submitok == "adduser"){
	if ($authority_main == "NO"){
		if ($useropen == 1) {
			$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$cook_userid." AND mainid=".$mainid." AND flag=1");
			$row2 = $db->fetch_array($rt2);
			if ($row2[0] != 1)callmsg("只有本圈子成员才可以操作此功能！","-1");
		} else {
			callmsg("只有会长才可以操作此功能！","-1");
		}
	}
	if ( !ereg("^[0-9]{1,9}$",$form_userid) || empty($form_userid) )callmsg("会员ID格式错误，请输入数字!","-1");
	$rt = $db->query("SELECT nickname FROM ".__TBL_MAIN__." WHERE id=".$form_userid." AND flag=1");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$membernickname = $row[0];
	} else {
		callmsg("此会员不存在，请重新输入！","-1");
	}
	$rt2 = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_USER__." WHERE userid=".$form_userid." AND mainid=".$mainid." AND flag=1");
	$row2 = $db->fetch_array($rt2);
	if ($row2[0] >= 1)callmsg("此人已经是该圈子中的一员，请不要重复邀请！","-1");
	
	$addtime=date("Y-m-d H:i:s");
	$title   = $cook_nickname." 邀请你加入“".$maintitle."”这个圈子！";
	$content = "赶快加入我们“".$maintitle."”圈子吧，好多惊喜等着你！　<br>";
	$content .= "<a href=".$Global['group_2domain']."/groupmain.php?submitok=loginupdate&mainid=".$mainid." target=_blank><u><font color=red>立即加入该圈子</font></u></a>";
	$content .= "　|　<a href=".$Global['group_2domain']."/".$mainid." target=_blank><u><font color=green>先进去看看再说</font></u></a>";
	$db->query("INSERT INTO ".__TBL_GBOOK__."  (userid,nickname,senduserid,sendnickname,title,content,addtime) VALUES ('$form_userid','$membernickname','".$Global['m_gbookadminuid']."','客服中心','$title','$content','$addtime')");
	callmsg("邀请已发送成功！","i_group_invite.php?mainid=".$mainid);
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
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;
/*
width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);
*/
}
</style>
</head>
<body>
<ul>
<li class="liselect"><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
<table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”邀人加入</td>
      <td width="109" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;">&nbsp;</td>
    </tr>
  </table>
<br />
<table width="670" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#f9d5e4 1px solid;">
        <form method=post action="i_group_invite.php">
          <tr bgcolor="#ECFAFF">
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="border-bottom:#f9d5e4 1px solid;"><font color="6699CC"><b><font color="#FF0000">　方法一</font></b></font>：邀请本站会员加入到“<?php echo $maintitle; ?>”这个圈子。</td>
          </tr>
          <tr bgcolor="#ECFAFF">
            <td width="312" height="80" align="right" valign="bottom" bgcolor="#FFFFFF" style="color:#DF2C91;font-size:14px">
            请输入Ta在交友网的ID号：</td>
            <td width="344" height="0" valign="bottom" bgcolor="#FFFFFF"><input name="form_userid" type="text" class="input" id="form_userid" size="8" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
              　
            [<a href="#" title=" ● 在左边的框中填入Ta的ID号，不是用户名也不是昵称哟。<br> ● 例如：你所设置的会员个人主页地址为 “ <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font> ”<br> ● 那么这个人的ID号就是这个网址最后面的那个数字 “ <font color=blue>1688</font> ” 。<br> ● 删除此副组长请填0。" class="uDF2C91">帮助</a>]</td>
          </tr>

          <tr bgcolor="#ECFAFF">
            <td height="80" align="center" bgcolor="#FFFFFF"><input type=hidden value="<?php echo $mainid; ?>" name="mainid">
            <input type=hidden value="adduser" name="submitok"></td>
            <td width="344" height="13" valign="top" bgcolor="#FFFFFF"><input type="submit" class="buttonx" value="开始邀请" >
            <br>
            <br></td>
          </tr>
        </form>
    </table>
      <br>
<script language='javascript' type='text/javascript'>
<!--
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="快快加入我的圈子，我在这里等你哟！";
clipBoardContent+="\n";
clipBoardContent+="　圈子名称：<?php echo $maintitle; ?>";
clipBoardContent+="\n";
clipBoardContent+="　圈子地址：<?php echo $Global['group_2domain']; ?>/<?php echo $mainid; ?>";
window.clipboardData.setData("Text",clipBoardContent);
alert("复制成功！你可以使用粘贴或(Ctrl+V)功能发给QQ或MSN上的好友，邀请他们来加入！");
}
}
//-->
</script>
      <table width="670" border="0" align="center" cellpadding="3" cellspacing="0" style="border:#f9d5e4 1px solid;">
        <form method=post action="i_group_invite.php">
          <tr bgcolor="#ECFAFF">
            <td height="30" bgcolor="#FFFFFF" style="border-bottom:#f9d5e4 1px solid;"><font color="6699CC"><b><font color="#FF0000">　方法二</font></b></font>：邀请其他朋友加入到“<?php echo $maintitle; ?>”这个圈子。</td>
          </tr>
          <tr bgcolor="#ECFAFF">
            <td height="110" align="center" bgcolor="#FFFFFF" style="color:#DF2C91;font-size:14px"><b><br>
              <br>
            >> </b><a onclick=recommend() href="####"><font color="#333333">复制本群地址，发给QQ或MSN上的好友，邀请他们来加入！</font></a><b> <<<br>
            <br>
            <br>
            <br>
            </b></td>
          </tr>
        </form>
    </table>
<br /><br />
<br /><br />
</div></div>
<script Language="JavaScript">
tPopWait=0;
tPopShow=20000;
showPopStep=1000;
popOpacity=99;
sPop=null;
curShow=null;
tFadeOut=null;
tFadeIn=null;
tFadeWaiting=null;
document.write("<style type='text/css'id='defaultPopStyle'>");
document.write(".cPopText {  background-color: #ffffcc;color:#ff0000; border: 1px #ffcc00 solid;font-color: font-size: 12px; padding-right: 4px; padding-left: 4px; height: 70px; padding-top: 3px; padding-bottom: 2px; filter: Alpha(Opacity=0)}");
document.write("</style>");
document.write("<div id='dypopLayer' style='position:absolute;z-index:3;' class='cPopText'></div>");
function showPopupText(){
var o=event.srcElement;
	MouseX=event.x;
	MouseY=event.y;
	if(o.alt!=null && o.alt!=""){o.dypop=o.alt;o.alt=""};
        if(o.title!=null && o.title!=""){o.dypop=o.title;o.title=""};
	if(o.dypop!=sPop) {
			sPop=o.dypop;
			clearTimeout(curShow);
			clearTimeout(tFadeOut);
			clearTimeout(tFadeIn);
			clearTimeout(tFadeWaiting);	
			if(sPop==null || sPop=="") {
				dypopLayer.innerHTML="";
				dypopLayer.style.filter="Alpha()";
				dypopLayer.filters.Alpha.opacity=0;	
				}
			else {
				if(o.dyclass!=null) popStyle=o.dyclass 
					else popStyle="cPopText";
				curShow=setTimeout("showIt()",tPopWait);
			}
			
	}
}
function showIt(){
		dypopLayer.className=popStyle;
		dypopLayer.innerHTML=sPop;
		popWidth=dypopLayer.clientWidth;
		popHeight=dypopLayer.clientHeight;
		if(MouseX+12+popWidth>document.body.clientWidth) popLeftAdjust=-popWidth-24
			else popLeftAdjust=0;
		if(MouseY+12+popHeight>document.body.clientHeight) popTopAdjust=-popHeight-24
			else popTopAdjust=0;
		dypopLayer.style.left=MouseX+12+document.body.scrollLeft+popLeftAdjust;
		dypopLayer.style.top=MouseY+12+document.body.scrollTop+popTopAdjust;
		dypopLayer.style.filter="Alpha(Opacity=0)";
		fadeOut();
}
function fadeOut(){
	if(dypopLayer.filters.Alpha.opacity<popOpacity) {
		dypopLayer.filters.Alpha.opacity+=showPopStep;
		tFadeOut=setTimeout("fadeOut()",1);
		}
		else {
			dypopLayer.filters.Alpha.opacity=popOpacity;
			tFadeWaiting=setTimeout("fadeIn()",tPopShow);
			}
}

function fadeIn(){
	if(dypopLayer.filters.Alpha.opacity>0) {
		dypopLayer.filters.Alpha.opacity-=1;
		tFadeIn=setTimeout("fadeIn()",1);
		}
}
document.onmouseover=showPopupText;
</script>
<?php require_once YZLOVE.'my/bottommy.php';?>