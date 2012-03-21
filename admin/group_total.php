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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>圈子大类管理:</b></td>
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
<form action="?submitok=addupdate" method=post>
      <tr>
      <td width="123" align="right" bgcolor="#FFFFFF"><b>圈子大类名称</b>：</td>
      <td width="604" bgcolor="#FFFFFF"><font color="#666666">
        <input name="form_title" type="text" class=input id="form_title" size="30" maxlength="20">
      </font></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value=" 提交 " class="buttonx">
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
		$form_title=trim($_REQUEST['form_title']);
		if (empty($form_title)){
			echo "<script language=\"javascript\">alert('标题不能为空！');history.go(-1)</script>";
			exit();
		}
		//判断是否已在
		$rt=$db->query("SELECT * FROM ".__TBL_GROUP_TOTAL__."  WHERE title='".$form_title."'");
        $total = $db->num_rows($rt);
        if($total>0){
		  echo "<script language=\"javascript\">alert('大类名已存在,添加失败');history.go(-1)</script>";
		  exit();
		}
		else{
		$addtime= date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_GROUP_TOTAL__." (title,addtime)values('".$form_title."','".$addtime."')");
		echo "<script language=\"javascript\">alert('添加成功！');window.location.href='group_total.php'</script>";
		exit();
		}
	}
	//删除
	if($_REQUEST['submitok']=="delupdate"){
		$classid=$_REQUEST['classid'];
		//echo $username;
		$db->query("DELETE  FROM ".__TBL_GROUP_TOTAL__." where id=".$classid);
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='group_total.php'</script>";
		exit();
	}

	//修改
	if($_REQUEST['submitok']=="modupdate"){
		$ifflag=trim($_REQUEST['ifflag']);
		$form_title=trim($_REQUEST['form_title']);
		$classid=$_REQUEST['classid'];
		echo $id;
		if (empty($form_title)){
			echo "<script language=\"javascript\">alert('标题不能为空！');history.go(-1)</script>";
			exit();
		}
		$db->query("update ".__TBL_GROUP_TOTAL__." set title='".$form_title."',flag=".$ifflag." where id=".$classid);
		echo "<script language=\"javascript\">alert('修改成功！');window.location.href='group_total.php'</script>";
		exit();
	}
?>

<table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="12%"><input type="button"  value="添加圈子大类" onClick="window.open('?submitok=add','_self')" class="buttonx"></td>
    <td align="right" style="padding-right:5px;"><table width="95%" border="0" cellpadding="0" cellspacing="0">
    </table></td>
  </tr>
</table></td></tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" >
   <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td width="60" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">状态</font></b></td>
    <td width="263" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">大类名称</font></b></td>
    <td width="128" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">圈子数量</font></b></td>
    <td width="215" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">创建时间</font></b></td>
    <td width="35" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">删除</font></b></td>
  </tr>
  <?php
    $rs=$db->query("SELECT * FROM ".__TBL_GROUP_TOTAL__." ORDER BY id DESC");
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
<form action="?submitok=modupdate" method=post>
    <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffffcc'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="61" height="26" align="center">
      <font color="#666666"><b><?php echo $rows['id']; ?></b></font></td>
    <td align="right" >
      <select name="ifflag" style="font-size:9pt;">
<option value="0" style="color:red;" <?php if ($rows['flag']==0) echo "selected";?>>未审</option>
<option value="1" style="color:green;" <?php if ($rows['flag']==1) echo "selected";?>>正常</option>
<option value="-1" style="color:blue;" <?php if ($rows['flag']==-1) echo "selected";?>>隐藏</option>
</select>
	  </td>
    <td >&nbsp;&nbsp;<input name="form_title" type="text" class="input" id="form_title" value="<?php echo $rows['title']; ?>" size="30" maxlength="20">
      <input type="submit" name="Submit" value="修改" class=buttonx>
	 <input type="hidden" name="classid" value="<?php echo $rows['id']; ?>" ></td>
    <td align="center" ><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $rows['bknum']; ?></b></font></td>
    <td align="center" ><?php echo $rows['addtime']; ?></td>
    <td width="35" align="center" ><a href="?submitok=delupdate&classid=<?php echo $rows['id']; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？\n\n请先删除它下面的所有圈子。')"><img src="images/delx.gif" alt="删除" width="10" height="10" border="0"></a></td>
  </tr>
</form>

 <?php 
	 }
   } else{
       echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...暂无内容...";
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
