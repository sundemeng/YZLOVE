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
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>屏蔽非法IP地址:</b></td>
      </tr>
    </table></td>
    <td width="53%" align="center">&nbsp;</td>
    <td width="31%" align="left">&nbsp;</td>
  </tr>
</table>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">	
<?php
//if(empty($_POST['action'])){

	if($_REQUEST['submitok']=="add"){
?>

<table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="dddddd">
  <form action=ip.php method=post>
    <tr>
      <td width="118" align="right" bgcolor="#FFFFFF">IP地址：</td>
      <td width="555" bgcolor="#FFFFFF"><font color="#666666">
        <input name="ipurl" type="text" class=input id="ipurl" size="30" maxlength="20">
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">备　注：</td>
      <td bgcolor="#FFFFFF"><font color="#666666">
        <textarea name="content" cols="50" rows="3" id="content"></textarea>
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value=" 提交 " class="buttonx"  onClick="return confirm('请 慎 重 ！\n\n★确认添加？ 请检查是否输入正确。')">
          <font color="#666666">
          <input name="submitok" type="hidden" value="addupdate">
        </font></td>
    </tr>
  </form>
</table>
    </table>
      <br>
      <br>
<?php

	}	
    //添加
	if($_REQUEST['submitok']=="addupdate"){
		$ipurl=trim($_REQUEST['ipurl']);
		$content=trim($_REQUEST['content']);
		if (strlen($ipurl)<1||strlen($content)<1){
			echo "<script language=\"javascript\">alert('IP或者备注不能为空，请重新输入！');history.go(-1)</script>";
			exit();
		}
		//判断是否已在
		$rt=$db->query("SELECT * FROM yzlove_ip WHERE ipurl='".$ipurl."'");
        $total = $db->num_rows($rt);
        if($total>0){
		  echo "<script language=\"javascript\">alert('IP已存在,添加失败！');window.location.href='adminuser.php'</script>";
		  exit();
		}
		else{
		$db->query("INSERT INTO yzlove_ip (ipurl,content)values('".$ipurl."','".$content."')");
		echo "<script language=\"javascript\">alert('添加成功！');window.location.href='ip.php'</script>";
		exit();
		}
	}
	//删除
	if($_REQUEST['submitok']=="delupdate"){
		$id=$_REQUEST['id'];
		//echo $username;
		$db->query("DELETE  FROM yzlove_ip where id='".$id."'");
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='ip.php'</script>";
		exit();
	}

	//修改
	if($_REQUEST['submitok']=="modupdate"){
		$ipurl=trim($_REQUEST['ipurl']);
		$content=trim($_REQUEST['content']);
		$id=$_REQUEST['id'];
		echo $id;
		if (strlen($content)<1||strlen($ipurl)<1){
			echo "<script language=\"javascript\">alert('P或者备注不能为空，请重新输入！');history.go(-1)</script>";
			exit();
		}
		$db->query("update yzlove_ip set ipurl='".$ipurl."',content='".$content."' where id=".$id);
		echo "<script language=\"javascript\">alert('修改成功！');window.location.href='ip.php'</script>";
		exit();
	}
?>

<table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12%"><input type="button"  value="添加IP" onClick="window.open('ip.php?submitok=add','_self')" class="buttonx"></td>
    <td align="right" style="padding-right:5px;"><table width="95%" border="0" cellpadding="0" cellspacing="0">
    </table></td>
  </tr>
</table></td></tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" >
    <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3">IP地址</td>
    <td width="318" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>备  注</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3">&nbsp;</td>
    <td width="90" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">删除</font></b></td>
  </tr>
  <?php
    $rs=$db->query("SELECT * FROM yzlove_ip ORDER BY id DESC");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rt,($p-1)*$pagesize);
       for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;
	//添加	

?>
<form action="ip.php" method=post>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
    <td width="29" height="26" align="center"><?php echo $rows['id']; ?></td>
    <td width="191" align="center" valign="top">
      <input name="ipurl" type="text" class="input" id="ipurl" value="<?php echo $rows['ipurl']; ?>" size="20" maxlength="20">
      <input type=hidden name=submitok value="modupdate"><input type=hidden name="id" value="<?php echo $rows['id']; ?>">      </td>
    <td align="left" valign="top" ><font color="#666666">
      <textarea name="content" cols="50" rows="2" id="content"><?php echo $rows['content']; ?></textarea>
    </font></td>
    <td width="86" align="center" ><font color="#666666">
      <input type="submit" name="Submit" value="修改" class="buttonx">
    </font></td>
    <td width="90" align="center" ><a href="ip.php?submitok=delupdate&id=<?php echo $rows['id']; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？')"><img src="images/drop.png" alt="删除" width="16" height="16" border="0"></a></td>
  </tr>
</form>

 <?php 
	 }

   } else{
	 echo "Sorry! 暂无屏蔽IP";
 }
?>
</table>
</body>
</html>
