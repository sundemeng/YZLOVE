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
<base target=testwinson><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<script>name = "testwinson"</script>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="2" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
  $classid=$_REQUEST['classid'];
  $rs=$db->query("SELECT * FROM ".__TBL_GBOOK__." WHERE id=".$classid);
  $rows = $db->fetch_array($rs);
?>
   <table width="500" height="67" border="0" align="center" cellpadding="0" cellspacing="0"  style="border-left:#cccccc 1px solid;border-top:#cccccc 1px solid;border-right:#cccccc 1px solid;">
  <tr>
    <td width="23" height="30" valign="bottom" bgcolor="F5EAF4">&nbsp;</td>
    <td bgcolor="F5EAF4"><a href="../home/<?php echo $rows['senduserid']; ?>" class=u333333 target=_blank><?php echo $rows['sendnickname']; ?></a> (<?php echo $rows['senduserid']; ?>)
	 <b>对</b>
    <a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><?php echo $rows['nickname']; ?></a> (<?php echo $rows['userid']; ?>)说：</td>
    <td width="21" valign="bottom" bgcolor="F5EAF4">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" bgcolor="#DBF4DE">&nbsp;</td>
    <td bgcolor="#DBF4DE"  style="font-size:10.3pt;line-height:200%;"><?php echo $rows['title']; ?></td>
    <td valign="bottom" bgcolor="#DBF4DE">&nbsp;</td>
  </tr>
</table>
<table width="500" height="63" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#cccccc 1px solid;border-right:#cccccc 1px solid;">
  <tr>
    <td valign="top" style="padding-top:15px;padding-left:30px;padding-right:30px;padding-bottom:30px;line-height:200%;"><?php echo $rows['content']; ?></td>
  </tr>
</table>
<table width="500" height="43" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border-left:#cccccc 1px solid;border-bottom:#cccccc 1px solid;border-right:#cccccc 1px solid;">
  <tr>
    <td align="center" valign="top"><input type="button" value="关闭窗口" onClick="javascript:window.close();" class="buttonx" /></td>
  </tr>
</table>
</body>
</html>
