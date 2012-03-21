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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>管理员添加:</b></td>
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
if(empty($_POST['action'])){

	if($_REQUEST['submitok']=="add"){
?>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">      <br>
      <br>
      <table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="dddddd">
<form action="adminuser.php" method=post>
      <tr>
        <td width="123" align="right" bgcolor="#FFFFFF">用户名：</td>
        <td width="604" bgcolor="#FFFFFF">
          <font color="#666666">
          <input name="form_username" type="text" size="30" maxlength="20" class=input>
          </font></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#FFFFFF">密　码：</td>
        <td bgcolor="#FFFFFF"><font color="#666666">
          <input name="form_password" type="text" size="30" maxlength="20" class=input>
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
      <br>
      <br>
<?php

	}	
    //添加
	if($_REQUEST['submitok']=="addupdate"){
		$form_username=trim($_REQUEST['form_username']);
		$form_password=trim($_REQUEST['form_password']);
		if (strlen($form_password)<6||strlen($form_password)>20||strlen($form_username)<1){
			echo "<script language=\"javascript\">alert('密码长度必须在6-20位之间，或者用户名不能为空，请重新输入！');history.go(-1)</script>";
			exit();
		}
		//判断是否已在
		$rt=$db->query("SELECT * FROM yzlove_admin WHERE username='".$form_username."'");
        $total = $db->num_rows($rt);
        if($total>0){
		  echo "<script language=\"javascript\">alert('用户名已存在,添加失败！');window.location.href='adminuser.php'</script>";
		  exit();
		}
		else{
        $form_password2=md5($form_password);
		$datetime= date("Y-m-d H:i:s");
		$db->query("INSERT INTO yzlove_admin (username,password,grade,addtime,logincount)values('".$form_username."','".$form_password2."',1,'".$datetime."',0)");
		echo "<script language=\"javascript\">alert('添加成功！');window.location.href='adminuser.php'</script>";
		exit();
		}
	}
	//删除
	if($_REQUEST['submitok']=="delupdate"){
		$username=$_REQUEST['username'];
		//echo $username;
		$db->query("DELETE  FROM yzlove_admin where username='".$username."'");
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='adminuser.php'</script>";
		exit();
	}

	//修改
	if($_REQUEST['submitok']=="modupdate"){
		$form_password=trim($_REQUEST['form_password']);
		$id=$_REQUEST['id'];
		echo $id;
		if (strlen($form_password)<6||strlen($form_password)>20){
			echo "<script language=\"javascript\">alert('密码长度必须在6-20位之间！');history.go(-1)</script>";
			exit();
		}
		$db->query("update yzlove_admin set password='".md5($form_password)."' where id=".$id);
		echo "<script language=\"javascript\">alert('密码修改成功！');window.location.href='adminuser.php'</script>";
		exit();
	}
?>

<table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12%"><input type="button"  value="添加管理员" onClick="window.open('adminuser.php?submitok=add','_self')" class="buttonx"></td>
    <td align="right" style="padding-right:5px;"><table width="95%" border="0" cellpadding="0" cellspacing="0">
    </table></td>
  </tr>
</table></td></tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>用户名</b></font></td>
    <td width="257" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>密　码</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>最近登录时间</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>最近登录IP</b></font></td>
    <td width="159" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>创建时间</b></font></td>
    <td width="84" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">登录</font></b></td>
    <td width="35" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">删除</font></b></td>
  </tr>
  <?php
    $rs=$db->query("SELECT * FROM yzlove_admin ORDER BY id DESC");
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
<form action="adminuser.php" method=post>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
    <td width="30" height="26" align="center"><?php echo $rows[0]; ?></td>
    <td width="137" align="center"><?php echo $rows['username']; ?></td>
    <td align="center" ><input name="form_password" type="text" size="30" maxlength="20" class="input">
      <input type="submit" name="Submit" value="修改" class="buttonx"></td>
    <td width="167" align="center" ><?php echo $rows['endtime']; ?></td>
    <td width="95" align="center" ><?php echo $rows['endip']; ?></td>
    <td align="center"><input type=hidden name=submitok value="modupdate"><input type=hidden name="id" value="<?php echo $rows[0]; ?>"><?php echo $rows['addtime']; ?></td>
    <td align="center"><font color="#FF0000"><?php echo $rows['logincount']; ?></font> 次</td>
    <td width="35" align="center" ><a href="adminuser.php?submitok=delupdate&username=<?php echo $rows['username']; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？')"><img src="images/drop.png" alt="删除" width="16" height="16" border="0"></a></td>
  </tr>
</form>

 <?php 
	 }
   }
}
else{
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="10">
  <tr> 
    <td><table width="97%" border="0" align="center" cellpadding="0" cellspacing="15">
        <tr> 
          <td align="center"><table width="100%" border="0" cellpadding="6" cellspacing="0" class="border2">
              <tr>
                <td align="center">
    <?php
			  $formpassword1=trim($_POST['formpassword1']);
			  $formpassword2=trim($_POST['formpassword2']);
			  if ($formpassword1!=$formpassword2){
				 echo "<script language=\"javascript\">alert('两次密码不一样，请重新输入！');history.go(-1)</script>";
				 exit();
			  }
			  if (strlen($formpassword1)<6||strlen($formpassword1)>12||strlen($formpassword2)<6||strlen($formpassword2)>12){
				 echo "<script language=\"javascript\">alert('密码长度必须在6-20位之间，请重新输入！');history.go(-1)</script>";
				 exit();
			  }

			  //开始修改数据
			  $db->query("update yzlove_admin set password='".md5($formpassword1)."' where username='".$_SESSION['adminname']."'");
			  echo "<script language=\"javascript\">alert('密码修改成功！');history.go(-1)</script>";
		      exit();
?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php }?>
</table>
</body>
</html>
