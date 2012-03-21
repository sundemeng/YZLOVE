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
//
if($_REQUEST['submitok']=="delupdate"){
  $coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //
		  $db->query("delete from  ".__TBL_GROUP_WZ__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('DELETE成功！');window.location.href='group_wz_search.php";
		echo $kinds;
		echo "'</script>";
		exit();

}//
elseif($_REQUEST['submitok']=="sh1"){
       $classid=$_GET['classid'];
	   $rst=$db->query("SELECT flag FROM ".__TBL_GROUP_WZ__."  where id=".$classid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==0){
	      $flag=1;
	   }else{
		  $flag=0;
	   }
       $db->query("update  ".__TBL_GROUP_WZ__."  set flag=".$flag." where id=".$classid);
       header("Location: group_wz_search.php");
	   exit();
}elseif($_REQUEST['submitok']=="jh1"){
       $classid=$_GET['classid'];
	   $rst=$db->query("SELECT ifjh FROM ".__TBL_GROUP_WZ__."  where id=".$classid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==0){
	      $ifjh=1;
	   }else{
		  $ifjh=0;
	   }
	 //  echo $ifjh."<br>";
	 //  echo $rowst[0];
	//	   exit;
	   //处
       $db->query("update  ".__TBL_GROUP_WZ__."  set ifjh=".$ifjh." where id=".$classid);
       header("Location: group_wz_search.php");
	   exit();

}
else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_GROUP_WZ__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_GROUP_WZ__." WHERE title like '%".$adminkeyword."%' ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>群组主题文章管理:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">记录总数 <font color="#FF0000">
      <?php echo $total;?>    </font> 篇 </td>
    <td width="62%" align="right" style="padding-right:5px;"><table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="group_wz_search.php">
        <tr>
          <td>按标题搜索：
            <input name="adminkeyword" type="text" size="25" maxlength="25" class=input>
                <input type="submit" value=" 搜索 " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="53">&nbsp;</td>

	<form name="FORM" method="post" action="?submitok=delupdate">
    <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="53"><input name="submit2" type="submit" class=buttonx value="×批量删除" onClick="return confirm('×××××\n\n确认批量删除？')"></td>

  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
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
		return "取消"; 
	} else {
		for (i = 0; i < field.length; i++) {
			field[i].checked = false;
		}
		checkflag = "false";
		return "全选"; 
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
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="全选">    </td>
    <td width="48" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>精华</b></font></td>
    <td width="88" align="center" valign="bottom" bgcolor="D3DCE3"><b>来自群组</b></td>
    <td width="93" align="center" valign="bottom" bgcolor="D3DCE3"><b>子版块</b></td>
    <td width="227" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>标　题</b></font></td>
    <td width="58" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>状态</b></font></td>
    <td width="73" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>作者</b></font></td>
    <td width="66" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>评论/浏览</b></font></td>
    <td width="64" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>日期</b></font></td>
    </tr>
	<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['flag']==0){
	      $shenhe="点击审核";
	   }else{
	      $shenhe="<font color=red>已审</font>";
	   }
	   if ($rows['ifjh']==0){
	      $jinghua="设为精华";
	   }else{
	      $jinghua="<img src='images/jh.gif' width='15' height='15' hspace='3' border='0' align='absmiddle'><font color='#FF0000'>取消</font>";
	   }
       $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];

?>
  <tr bgcolor=#ffffff onMouseOver="this.style.background='#9EDEFF'" onMouseOut="this.style.background='#ffffff'">
    <td width="53"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>"  id="chk<?php echo $rows['id']; ?>" > <label for="chk<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></label></td>
    <td width="48" align="center">
<a href="group_wz_search.php?classid=<?php echo $rows['id']; ?>&submitok=jh1" class="uFF5494"><?php echo $jinghua; ?></a></td>
<td width="88" align="center">
<a href=../group/groupmain.php?mainid=<?php echo $rows['mainid']; ?> class=uFF5494 target=_blank><?php echo $rows['maintitle']; ?></a></td>
    <td width="93" align="center"><a href=../group/article.php?mainid=1&bkid=1&bktitle=<?php echo $rows['bktitle']; ?>: class=u6699CC target=_blank><?php echo $rows['bktitle']; ?>:</a></td>
    <td width="227"><a href="####" onClick="showModalDialog('group_wz_mod.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:800px; dialogHeight:700px;status:0;help:0;scroll:auto;') "><img src="images/fb.gif" alt="修改" hspace="5" vspace="5" border="0" align="absmiddle"></a> <a href="../group/read<?php echo $rows['id']; ?>.html" target="_blank" class=u000000><?php echo $rows['title']; ?></a></td>
    <td width="58" align="center"><a href="group_wz_search.php?classid=<?php echo $rows['id']; ?>&submitok=sh1" class="uFF5494"><?php echo $shenhe; ?></a></td>
    <td width="73" align="center">
<a href="http://.huizhoulove.com/home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $username; ?></a></td>
    <td align="center" ><font color="#FF0000"><?php echo $rows['bbsnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
    <td width="64" align="center">
<b><font color=red><?php echo $rows['addtime']; ?></td>
    </tr>
	 <?php
	}
}else{
  echo"Sorry! ...暂无内容...";
}


?>
</table>
</form>
</table>
<?php
	}	
?>
<br><br><br>
</body>
</html>
