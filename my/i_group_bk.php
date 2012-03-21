<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ( !ereg("^[0-9]{1,8}$",$mainid) || empty($mainid) )callmsg($mainid,"-1");
if ($submitok == "addupdate") {
	if (strlen($title)<1 || strlen($title)>50)callmsg("版块名称请控制在1~50字节！","-1");
	if (strlen($content)<10 || strlen($content)>400)callmsg("版块介绍请控制在10~400字节！","-1");
	$addtime  = date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_GROUP_BK__." (mainid,maintitle,title,content,addtime) VALUES ('$mainid','$maintitle','$title','$content','$addtime')");
	header("Location: i_group_bk.php?mainid=".$mainid);
} elseif ($submitok == "modupdate") {
	if ( !ereg("^[0-9]{1,9}$",$bkid) || empty($bkid) )callmsg("Forbidden1!","-1");
	if ( !ereg("^[0-9]{1,9}$",$userid) )callmsg("版主ID号格式不对，请检查!","-1");
	$rt = $db->query("SELECT nickname,sex,grade,photo_s FROM ".__TBL_MAIN__." WHERE id=".$userid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$userid = intval($userid);
		$nicknamesexgradephoto_s = $row[0]."|".$row[1]."|".$row[2]."|".$row[3];
	} else {
		$userid = 0;
		$nicknamesexgradephoto_s = "";
	}
	$db->query("UPDATE ".__TBL_GROUP_BK__." SET title='$title',content='$content',px='$px',userid='$userid',nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE id=".$bkid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET bktitle='$title' WHERE bkid=".$bkid);
	//header("Location: i_group_bk.php?mainid=".$mainid."&p=".$p);
	callmsg("修改成功!","i_group_bk.php?mainid=".$mainid."&p=".$p);
} elseif ($submitok == "delupdate") {
	if ( !ereg("^[0-9]{1,9}$",$bkid) || empty($bkid) )callmsg("Forbidden1!","-1");
	$rt = $db->query("SELECT id FROM ".__TBL_GROUP_WZ__." WHERE bkid='$bkid'");
	if($db->num_rows($rt)){
		$total = $db->num_rows($rt);
		$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET wznum=wznum-$total WHERE id=".$mainid);
		for($j=1;$j<=$total;$j++) {
			$row = $db->fetch_array($rt);
			$fid = $row[0];
				$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_GROUP_WZ_BBS__." WHERE fid=".$fid);
				if($db->num_rows($rt)){
					$row = $db->fetch_array($rt);
					$tmpbbsnum = intval($row[0]);
					$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET bbsnum=bbsnum-$tmpbbsnum WHERE  id=".$mainid);

				}
			$db->query("DELETE FROM ".__TBL_GROUP_WZ_BBS__." WHERE fid='$fid'");
		}
	}
	$db->query("DELETE FROM ".__TBL_GROUP_WZ__." WHERE bkid='$bkid'");
	$db->query("DELETE FROM ".__TBL_GROUP_BK__." WHERE id='$bkid'");
	header("Location: i_group_bk.php?mainid=".$mainid);
}
$rt = $db->query("SELECT title FROM ".__TBL_GROUP_MAIN__." WHERE userid='$cook_userid' AND  id=".$mainid);
$total = $db->num_rows($rt);
if($total > 0){
	$row = $db->fetch_array($rt);
	$maintitle = $row[0];
} else {
	callmsg("Forbidden!","-1");
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
ul .liselect a:hover{width:78px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li><a href="i_group.php">我的圈子</a></li>
<li class="liselect"><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="670" height="40" border="0" cellpadding="0" cellspacing="0" bgcolor="F3FAFE" >
    <tr>
      <td bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/qzlist.gif" width="21" height="18" hspace="5" />“<b><a href="i_group_bk.php?mainid=<?php echo $mainid;?>"><?php echo $maintitle; ?></a></b>”子版块管理</td>
      <td width="109" bgcolor="FDEEF8" style="color:#333;font-size:10.3pt;"><img src="images/add2.gif" width="11" height="12" hspace="3" align="absmiddle"><a href="i_group_bk.php?submitok=add&mainid=<?php echo $mainid;?>"><b>增加子版块</b></a></td>
    </tr>
  </table>
  <?php if ($submitok == "add") {?>
<br>
<br>
<table width="509" height="116" border="0" align="center" cellpadding="6" cellspacing="0" bgcolor="dddddd">
  <form action=<?php echo $_SERVER['PHP_SELF'];?> method=post>
    <tr>
      <td width="92" align="right" valign="top" bgcolor="#FFFFFF">版块名称:</td>
      <td width="393" bgcolor="#FFFFFF"><font color="#666666">
        <input name="title" type="text" class=input id="title" size="30" maxlength="20">
        <br />
      版块名称请控制在1~50字节！</font></td>
    </tr>
    <tr>
      <td align="right" valign="top" bgcolor="#FFFFFF">版块说明:</td>
      <td bgcolor="#FFFFFF"><font color="#666666">
        <textarea name="content" cols="50" rows="6" id="content" ></textarea>
        <br />
      版块介绍请控制在10~400字节！</font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><input name="submitok" type="hidden" value="addupdate">
        <input name="mainid" type="hidden" value="<?php echo $mainid; ?>"><input name="maintitle" type="hidden" value="<?php echo $maintitle; ?>"></td>
      <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value=" 提交 " class="buttonx"  onClick="return confirm('请 慎 重 ！\n\n★确认添加？ 请检查是否输入正确。')"></td>
    </tr>
  </form>
</table>
<br>
<br>
<?php } else {?>
<?php
$rt = $db->query("SELECT * FROM ".__TBL_GROUP_BK__." WHERE mainid='$mainid' ORDER BY px DESC,id DESC");
$total = $db->num_rows($rt);
if ($total <= 0 ) {
?>
<br>
<br>
<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
    <td align=center bgcolor=#f3f3f3><font color="666666">..暂无版块..<br>
          <br>
          <img src="images/add.gif" width="20" height="20" hspace="3" align="absmiddle"><b><a href="i_group_bk.php?submitok=add&mainid=<?php echo $mainid;?>" class="uff6600">点此增加</a></b></font></td>
  </tr>
</table>
<?php
} else {    
	$pagesize=10;
	if ($p<1)$p=1;
	require_once YZLOVE.'sub/class.php';
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="670" height="29" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
  <tr bgcolor="#FFFFFF">
    <td width="200" height="22" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">版块名称 / 版主 </td>
    <td width="212" height="30" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">版块说明</td>
    <td width="31" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">排序</td>
    <td width="46" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">&nbsp;</td>
    <td width="79" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">创建时间</td>
    <td width="42" align="center" bgcolor="#FFFFFF" style="border-bottom:#ddd 1px solid;">&nbsp;</td>
  </tr>
  <?php
//For循环开始输出
	for($i=1;$i<=$pagesize;$i++) {
		$rows = $db->fetch_array($rt);
		if(!$rows) break;
		if ($i % 2 == 0){
			$bg="bgcolor=#ffffff";
			$overbg="#ffff88";
			$outbg="#ffffff";
		} else {
			$bg="bgcolor=#f3f3f3";
			$overbg="#ffff88";
			$outbg="#f3f3f3";
		}
?>
  <form action="i_group_bk.php?p=<?php echo $p; ?>" method=post>
    <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
      <td height="26" valign="top" style="padding-left:5px;"><font color="#666666">版块名称:
          <input name="title" type="text" class="input" id="title" value="<?php echo stripslashes($rows['title']); ?>" size="18" maxlength="50">
          <br />
          版主ID号: </font>
        <input name="userid" type="text" class="input" id="userid" value="<?php echo $rows['userid']; ?>" size="3" maxlength="9">
　[<a href="#" title=" ● 在左边的框中填入Ta的ID号，不是用户名也不是昵称哟。<br> ● 例如：你所设置的会员个人主页地址为 “ <?php echo $Global['home_2domain']; ?>/<font color=blue>1688</font> ”<br>那么这个人的ID号就是这个网址最后面的那个数字 “ <font color=blue>1688</font> ” 。<br> ● 删除此版主请填0。" class="uDF2C91">帮助</a>]
 <?php
if (!empty($rows['nicknamesexgradephoto_s'])){
$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
$tmpgrade = $tmpnickname[1].$tmpnickname[2];
echo "<br>　　　　";
geticon($tmpgrade);
echo "<a href=".$Global['home_2domain']."/".$rows['userid']."  target=_blank>".$tmpnickname[0]."</a>";
}?></td>
      <td height="26" align="center"><textarea name="content" cols="30" rows="4" id="content"><?php echo stripslashes($rows['content'])?></textarea></td>
      <td align="center"><input name="px" type="text" class="input" id="px" value="<?php echo $rows['px']; ?>" size="3" maxlength="5" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;"></td>
      <td align="center"><input type="submit" name="Submit" value="修改" class=buttonx></td>
      <td align="center"><font color="#999999"><?php echo $rows['addtime'];?></font>
        <input type="hidden" name="submitok" value="modupdate" >
        <input type="hidden" name="bkid" value="<?php echo $rows['id']; ?>" >
		<input type="hidden" name="mainid" value="<?php echo $mainid; ?>" >		</td>
      <td width="42" align="center" ><a href="i_group_bk.php?submitok=delupdate&bkid=<?php echo $rows['id']; ?>&mainid=<?php echo $mainid; ?>" class="u666666" onClick="return confirm('请 慎 重 ！\n\n★确认删除？\n\n此操作将联动删除该分类下的所有贴子。建议修改。')"><font color="#00FFFF"><img src="images/delx.gif" hspace="3" border="0" align="absmiddle"></font>删除</a></td>
    </tr>
  </form>
<?php } ?>
</table>
<table width="670" height="49" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    </tr>
</table>
<br>
<?php }} ?>
  <table width="670" height="55" border="0" cellpadding="5" cellspacing="0" style="color:#666">
    <tr>
      <td width="36" align="right" valign="top" style="padding-top:5px;"><img src="images/tips.gif" width="23" height="21" /></td>
      <td valign="top" style="line-height:150%"><img src="images/li.gif"  hspace="5" vspace="8" align="absmiddle" />版块“排序”值，越大越靠前。请填写正整数。<br /></td>
    </tr>
  </table>
  <br />
  <br />
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