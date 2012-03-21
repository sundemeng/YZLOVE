<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：PSY，wjxxw@vip.qq.com www.linxiaoxian.com，QQ：8437645
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';
require_once '../sub/conn.php';
require_once '../sub/fun.php';
require_once 'session.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
if($_REQUEST['submitok']=="allupdate"){
		$coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //删除操作
		  $db->query("DELETE  FROM ".__TBL_STORY_BBS__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='story_bbs_search.php'</script>";
		exit();
}
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_STORY_BBS__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_STORY_BBS__." WHERE content like '%".$adminkeyword."%' ORDER BY id DESC");
	 }
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 30;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="20%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>祝福留言:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" valign="bottom">记录总数 <font color="#FF0000">
      <?php echo $total?>    </font> 条</td>
    <td width="62%" align="right" style="padding-right:5px;"><table height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="story_bbs_search.php">
        <tr>
          <td>按内容搜索：
            <input name="adminkeyword" type="text" size="25" maxlength="25" class=input>
                <input type="submit" value=" 搜索 " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
<form name="FORM" method="post" action="story_bbs_search.php?submitok=allupdate">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="6" align="right" valign="bottom" bgcolor="#FFFFFF"><table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="53">&nbsp;</td>
        <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        <td width="53"><input name="submit" type="submit" class=buttonx value="×批量删除" onClick="return confirm('×××××\n\n确认批量删除？')"></td>
      </tr>
    </table></td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3">
<script LANGUAGE="JavaScript">
<!-- Begin
var checkflag = "false";
function check(field) {
	if (checkflag == "false") {
		for (i = 0; i < field.length; i++) {
			field[i].checked = true;
		}
		checkflag = "true";
		return "取消全选"; 
	} else {
		for (i = 0; i < field.length; i++) {
			field[i].checked = false;
		}
		checkflag = "false";
		return "开始全选"; 
	}
}
//  End -->
var checkflag = "false";
function checkadmin(field) {
	if (checkflag == "false") {
	for (i = 0; i < field.length; i++) {
	field[i].checked = true;}
	checkflag = "true";
	return "NO"; }
	else {
	for (i = 0; i < field.length; i++) {
	field[i].checked = false; }
	checkflag = "false";
	return "YES"; }
}
</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="开始全选">    </td>
    <td width="96" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>来自故事</b></font></td>
    <td width="470" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>祝福留言</b></font></td>
    <td width="28" align="center" valign="bottom" bgcolor="D3DCE3"><b>改</b></td>
    <td width="121" align="center" valign="bottom" bgcolor="D3DCE3"><b>作者</b></td>
    <td width="170" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">祝福时间</font></b></td>
    </tr>
	<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
	 
?>
  <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffffcc'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="66"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" > <?php echo $rows['id']; ?></td>
    <td width="96" align="center"><a href="/story/detail.php?fid=<?php echo $rows['fid']; ?>" target="_blank" class=u000000><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0" align="absmiddle"><?php echo $rows['fid']; ?></a></td>
<td width="470"><a href="../story/detail.php?fid=<?php echo $rows['fid']; ?>" target="_blank" class=u000000><font color="#FF9900">●</font><?php echo $rows['content']; ?></a></td>
    <td width="28"><a href="####" onClick="showModalDialog('story_bbs_mod.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src="images/fb.gif" hspace="5" vspace="5" border="0" align="absmiddle"></a></td>
    <td width="121" align="center"><a href="../home/<?php echo $rows['userid']; ?>"  target=_blank><font color=#0066CC><?php echo $username; ?></font></a></td>
    <td width="170" align="center">
<b><font color=red><?php echo $rows['addtime']; ?></td>
    </tr>
	 <?php
	}
}else{
  echo"Sorry! ...暂无内容...";
}


?>
</form>
</table>
<br></form>
<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
<br>
<br>
<br>

<br>
</body>
</html>
 
