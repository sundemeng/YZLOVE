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
//echo $_REQUEST['submitok']; exit;


//
if($_REQUEST['submitok']=="delupdate"){
  $fid=$_REQUEST['classid'];
  $p=$_REQUEST['p'];
  $db->query("DELETE FROM ".__TBL_DATING__." where id=".$fid);
   $db->query("DELETE FROM ".__TBL_DATING_USER__." where fid=".$fid);
  echo "<script language=\"javascript\">alert('删除成功！');window.location.href='dating_search.php?p=".$p."";
  echo "'</script>";
  exit();

}//
elseif($_REQUEST['submitok']=="allupdate"){
		$coun = count($_POST['list']);
		$kinds=$_REQUEST['kinds'];
		$p=$_REQUEST['p'];
		for ($i = 0; $i < $coun; $i++)
        {
         //
		  $db->query("update ".__TBL_DATING__." set flag=1 where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('审核成功！');window.location.href='dating_search.php?p=".$p."";
		echo $kinds;
		echo "'</script>";
		exit();
}
else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_DATING__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_DATING__." WHERE title like '%".$adminkeyword."%' ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>约会管理:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">记录总数 <font color="#FF0000">
      <?php echo $total?>    </font> 篇 </td>
    <td width="62%" align="right" style="padding-right:5px;"><table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>按标题搜索：
            <input name="adminkeyword" type="text" size="25" maxlength="25" class=input>
                <input type="submit" value=" 搜索 " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <form name="FORM" method="post" action="?submitok=allupdate">
<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="53"><input name="submit" type="submit" class=buttonx value="√批量审核" onClick="return confirm('√√√√√\n\n确认批量审核？')"></td>
    <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="53">&nbsp;</td>
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
</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="开始全选">    </td>
      <td width="283" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>约会主题</b></font></td>
    <td width="203" align="center" valign="bottom" bgcolor="D3DCE3"><b>约会时间</b></td>
    <td width="131" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>发布人</b></font></td>
    <td width="70" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>响应/人气</b></font></td>
    <td width="164" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>发布时间</b></font></td>
	<td width="35" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">删除</font></b></td>
  </tr>
<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['flag']==0){
	      $shenhe="<font color=red>未审核</font>";
	   }elseif($rows['flag']==1){
	      $shenhe="已审";
	   }elseif($rows['flag']==2){
	      $shenhe="<font color=blue>已结束</font>";
	   }

       $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
?>
 <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#9EDEFF'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="108"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>"  id="chk<?php echo $rows['id']; ?>" > <label for="chk1"><?php echo $rows['id']; ?></label></td>
     <td width="283"><a href="javascript:void(0);" onClick="showModalDialog('dating_mod.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src="images/fb.gif" alt="修改" hspace="5" vspace="5" border="0" align="absmiddle"></a> <a href="../home/dating<?php echo $rows['id']; ?>.html" target="_blank" class=u000000><?php echo $rows['title']; ?></a>&nbsp;[<?php echo $shenhe; ?>]</td>
    <td width="203" align="center" style="line-height:150%"><?php echo date_format2($rows['yhtime'],'%Y年%m月%d日 %H时%M分');?></td>
    <td width="131" align="center"><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $username; ?></a></td>
    <td align="center" ><font color="#FF0000"><?php echo $rows['bmnum']; ?></font> <font color="#999999">/</font> <font color="#FF0000"><?php echo $rows['click']; ?></font></td>
    <td width="164" align="center"><?php echo date_format2($rows['addtime'],'%Y年%m月%d日 %H时%M分');?></td>
	<td width="35" align="center" ><a href="?submitok=delupdate&classid=<?php echo $rows['id']; ?>&p=<?php echo $p;?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？。')"><img src="images/delx.gif" alt="删除" width="10" height="10" border="0"></a></td>
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
