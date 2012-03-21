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

if($_REQUEST['submitok']=="modupdate"){
  $memberid=trim($_REQUEST['memberid']);
  $ifphoto=trim($_REQUEST['ifphoto']);
  if (empty($ifphoto)) $ifphoto=0 ;
  $ifbirthday=trim($_REQUEST['ifbirthday']);
  if (empty($ifbirthday)) $ifbirthday=0 ;
  $iflove=trim($_REQUEST['iflove']);
  if (empty($iflove)) $iflove=0 ;
  $ifpay=trim($_REQUEST['ifpay']);
  if (empty($ifpay)) $ifpay=0 ;
  $ifedu=trim($_REQUEST['ifedu']);
  if (empty($ifedu)) $ifedu=0 ;
  $ifhouse=trim($_REQUEST['ifhouse']);
  if (empty($ifhouse)) $ifhouse=0 ;
  $ifcar=trim($_REQUEST['ifcar']);
  if (empty($ifcar)) $ifcar=0 ;

  //检测ID存在性
  $rt=$db->query("SELECT * FROM ".__TBL_MAIN__." where id=".$memberid);
  $total = $db->num_rows($rt);
  if($total==0){
     echo "<script language=\"javascript\">alert('用户ID不存在,修改失败！');history.go(-1)</script>";
	 exit();
  }
  //


  $db->query("update ".__TBL_MAIN__." set ifphoto=".$ifphoto.",ifbirthday=".$ifbirthday.",iflove=".$iflove.",ifpay=".$ifpay.",ifedu=".$ifedu.",ifhouse=".$ifhouse.",ifcar=".$ifcar." where id=".$memberid);
  echo "<script language=\"javascript\">alert('认证成功');history.go(-1)</script>";
  exit();
}
?>


<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;font-weight:bold">手动强制认证:</td>
      </tr>
    </table></td>
    <td width="69%" align="center" valign="bottom" style="color:#999999;font-size:14px;padding-bottom:3px">
	</td>
    <td width="15%" align="left">&nbsp;</td>
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
  <form action=attestation_userid.php method=post>
    <tr>
      <td width="257" align="right" bgcolor="#efefef">&nbsp;</td>
      <td width="416" bgcolor="#efefef">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#efefef">ＩＤ　号：</td>
      <td width="416" bgcolor="#efefef"><font color="#666666">
        <input name="memberid" type="text" class="input" id="memberid"size="6" maxlength="20">
      请填写数字</font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#f3f3f3"><b>认证项目</b>：<br>
      <br>
      <font color=red>打勾为通过认证，不打勾为删除认证</font></td>
      <td bgcolor="#f3f3f3"><input name="ifphoto" type="checkbox" value="1">
        形 象 照<br>
        <input name="ifbirthday" type="checkbox" value="1" >
          出生日期<br>
        <input name="ifheigh" type="checkbox" value="1">
          身　　高<br>
          <input name="iflove" type="checkbox" value="1">
          婚　　姻<br />
          <input name="ifpay" type="checkbox" value="1">
          收　　入
          <br>
          <input name="ifedu" type="checkbox" value="1">
          学　　历<br>
        <input name="ifhouse" type="checkbox" value="1">
          房　　产<br>
        <input name="ifcar" type="checkbox" value="1">
      汽　　车</td>
    </tr>
    <tr>
      <td height="50" align="right" bgcolor="#efefef">&nbsp;</td>
      <td bgcolor="#efefef"><input type="submit" name="Submit" value=" 提交 " class="buttonx">
        <font color="#666666">
        <input name="submitok" type="hidden" value="modupdate" />
      </font></td>
    </tr>
  </form>
</table>
</body>
</html>
 
