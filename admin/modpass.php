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
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>修改密码:</b></td>
      </tr>
    </table></td>
    <td width="46%" align="center">&nbsp;</td>
    <td width="31%" align="left">&nbsp;</td>
  </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table width="700" height="116" border="0" align="center" cellpadding="6" cellspacing="1" bgcolor="#FFFFFF">
<?php
if(empty($_POST['action'])){
?>
  <form action=modpass.php method=post>
    <tr>
      <td width="192" align="right" bgcolor="E5E5E5">新　密　码：</td>
      <td width="478" bgcolor="E5E5E5"><font color="#666666">
        <input name="formpassword1" type="password"size="40" maxlength="20" class="input">
      6~20位</font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">确认新密码：</td>
      <td bgcolor="E5E5E5"><font color="#666666">
        <input name="formpassword2" type="password" size="40" maxlength="20" class="input">
        6~20位
        <input name="action" type="hidden" id="action" value="add"> 
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="E5E5E5">&nbsp;</td>
      <td bgcolor="E5E5E5"><input type="submit" name="Submit" value=" 提交 " onClick="return confirm('★确认修改？ 请牢记。')" class="buttonx"></td>
    </tr>
  </form>
 <?php 
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
			  if (strlen($formpassword1)<6||strlen($formpassword1)>20||strlen($formpassword2)<6||strlen($formpassword2)>20){
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
