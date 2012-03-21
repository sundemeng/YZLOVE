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
		  $db->query("delete from  ".__TBL_GBOOK__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('DELETE成功！');window.location.href='gbook_search.php";
		echo $kinds;
		echo "'</script>";
		exit();

}else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_GBOOK__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_GBOOK__." WHERE nickname like '%".$adminkeyword."%' or sendnickname like '%".$adminkeyword."%' ORDER BY id DESC");
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>留言管理:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">记录总数 <font color="#FF0000">
      <?php echo $total;?>    </font> 条 </td>
    <td width="62%" align="right" style="padding-right:5px;"><table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>按昵称搜索：
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
    <td width="242" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>发收方 - </b>-&gt; </font><b>接送方</b></td>
    <td width="276" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>留言标题</b></font></td>
    <td width="32" align="center" valign="bottom" bgcolor="D3DCE3">NEW</td>
    <td width="143" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">留言时间</font></b></td>
    </tr>
	<?php
     for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
?>
 <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffff88'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="66"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" > <?php echo $rows['id']; ?></td>
    <td align="right" style="color:#999999;"><a href="../home/<?php echo $rows['senduserid']; ?>" class=u333333 target=_blank><?php echo $rows['sendnickname']; ?></a> (<?php echo $rows['senduserid']; ?>)<b>对</b><a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $rows['nickname']; ?></a> (<?php echo $rows['userid']; ?>)说：</td>
    <td width="276"><a href="javascript:;" onClick="showModalDialog('gbook_show.php?classid=<?php echo $rows['id']; ?>', window, 'dialogWidth:510px; dialogHeight:360px;status:0;help:0;scroll:0;') "><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0"><?php echo $rows['title']; ?></a></td>
    <td width="32" align="center"></td>
    <td width="143" align="center"><?php echo $rows['addtime']; ?></td>
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
