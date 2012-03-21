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
		  $db->query("DELETE  FROM oklist where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='videooklist_search.php'</script>";
		exit();
}elseif($_REQUEST['submitok']=="jh1"){
       $classid=$_GET['classid'];
	   $rst=$db->query("SELECT IsGood FROM oklist  where id=".$classid);
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
       $db->query("update  oklist  set IsGood=".$ifjh." where id=".$classid);
       header("Location: videooklist_search.php");
	   exit();

}
elseif($_REQUEST['submitok']=="add"){
?>
<br /><br />
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" >
<form name=FORM  method="POST" action="?submitok=addupdate" onSubmit="return chkform()">
<script language="javascript">
function chkform(){
	if(document.FORM.okName.value==""){
	alert('请输入歌曲名称！');
	document.FORM.okName.focus();
	return false;
	}
	if(document.FORM.Singer.value==""){
	alert('请输入歌手名字！');
	document.FORM.Singer.focus();
	return false;
	}
	if(document.FORM.movie1.value==""){
	alert('请输入歌曲网址！');
	document.FORM.movie1.focus();
	return false;
	}
	if(document.FORM.geci.value==""){
	alert('请输入歌词！');
	document.FORM.geci.focus();
	return false;
	}
}
</script>
    <tr bgcolor="#FFFFFF">
      <td width="9%" height="0" align="right" bgcolor="efefef">歌曲名称：</td>
      <td width="91%" valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="okName" type="text" id="okName" style="font-size:9pt;" size="40" maxlength="100" class="input">
      </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="9%" align="right" bgcolor="efefef">歌手名字：</td>
      <td valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="Singer" type="text" id="Singer" style="font-size:9pt;" size="20" maxlength="50" class="input">
      </font></td>
    </tr>
    <tr>
      <td height="6" align="right" bgcolor="efefef">歌曲网址：</td>
      <td valign="top" bgcolor="#FFFFFF"><font color="#666666">
        <input name="movie1" type="text" id="movie1" style="font-size:9pt;" size="100" maxlength="100" class="input">
      </font></td>
    </tr>
    <tr>
      <td height="6" align="right" bgcolor="efefef">歌　　词：</td>
      <td valign="top" bgcolor="#FFFFFF"><font color="#666666">
        <textarea name="geci" cols="100" rows="20" id="geci" style="font-size:9pt;"></textarea>
      </font></td>
    </tr>
    <tr>
      <td height="13" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="50" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit222" value="　添加　" class=button>
        <font color="#999999">按“Enter回车键”空两行，按“Shift+Enter”键空一行</font></td>
    </tr>
  </form>
</table>



<?php
}

elseif($_REQUEST['submitok']=="addupdate"){
       $okName=trim($_REQUEST['okName']);
	   $Singer=trim($_REQUEST['Singer']);
	   $movie1=trim($_REQUEST['movie1']);
	   $geci=trim($_REQUEST['geci']);
	   if (empty($okName)||empty($Singer)||empty($movie1)||empty($geci)){
			echo "<script language=\"javascript\">alert('所有项目都不能为空，请重新输入！');history.go(-1)</script>";
			exit();
		}
       $db->query("INSERT INTO oklist (okName,Singer,movie1,geci)values('".$okName."','".$Singer."','".$movie1."','".$geci."')");
		echo "<script language=\"javascript\">alert('添加成功！');window.location.href='videooklist_search.php'</script>";
		exit();

}else{

     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM oklist  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM oklist WHERE okName like '%".$adminkeyword."%' or Singer like '%".$adminkeyword."%' ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>本站音乐库:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" valign="bottom">记录总数 <font color="#FF0000">
      <?php echo $total?>    </font> 首</td>
    <td width="62%" align="right" style="padding-right:5px;"><table height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>按歌曲名称或歌手名搜索：
            <input name="adminkeyword" type="text" size="25" maxlength="25" class=input>
                <input type="submit" value=" 搜索 " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
<form name="FORM" method="post" action="?submitok=allupdate">
  <tr bgcolor="#FFFFFF">
    <td height="32" colspan="6" align="right" valign="bottom" bgcolor="#FFFFFF"><table width="100%" height="40" border="0" cellpadding="0" cellspacing="0">
      <tr>
         <td width="53"><input type="button" class=buttonx value="添加音乐"  onClick="window.open('?submitok=add&p=1','_self')"></td>
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
</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="开始全选">    </td>
    <td width="90" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>精华</b></font></td>
    <td width="794" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>歌手名字 / 歌曲名称</b></font></td>
    </tr>
	<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	   if ($rows['IsGood']==0){
	      $jinghua="设为精华";
	   }else{
	      $jinghua="<img src='images/jh.gif' width='15' height='15' hspace='3' border='0' align='absmiddle'><font color='#FF0000'>取消</font>";
	   }
	 
?>
 <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#9EDEFF'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="66"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>"  id="chk<?php echo $rows['id']; ?>" > <label for="chk<?php echo $rows['id']; ?>"><?php echo $rows['id']; ?></label></td>
    <td width="90" align="center">
<a href="?classid=<?php echo $rows['id']; ?>&submitok=jh1&p=1"><font color="#006600"><?php echo $jinghua;?></font></a></td>
<td width="794">
<a href="####" onClick="showModalDialog('videooklist_mod.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:800px; dialogHeight:700px;status:0;help:0;scroll:auto;') "><img src="images/fb.gif" alt="修改" hspace="5" vspace="5" border="0" align="absmiddle"></a>
<?php echo $rows['okName']; ?> － <b><?php echo $rows['Singer']; ?></b>
　<?php echo $rows['geci']; ?></td>
    </tr>
	 <?php
	}
}else{
  echo"<br /><br />Sorry! ...暂无内容...";
  ?>
  <input type="button" class=buttonx value="添加音乐"  onClick="window.open('?submitok=add&p=1','_self')">
  <?php
}
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
 
