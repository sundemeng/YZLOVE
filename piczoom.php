<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
if ($_GET['picurl']==""){
	$picurl = "没有预览。";
} else {
	$picurl = trim($_GET['picurl']);
	$picurl = "<img src=".$picurl." alt=点击返回>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="images/main.css" rel="stylesheet" type="text/css" />
<style type="text/css"> 
<!--
.photo800X800
{
width: 800;
height: 800;
overflow: hidden;
text-align:center;
}
.photo800X800 img, .resultImg img {
width: 800px !important;
height: auto !important;
} 
TD{ FONT-SIZE: 9pt;color:#333333}

--> 
</style>
</head>
<body bgcolor="#FFFFFF" background="images/md.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="CURSOR: hand"  oncontextmenu=self.event.returnValue=false onClick="javascript:history.back()" >
<br>
<table width="98%" height="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="efefef">
  <tr>
    <td align="center" bgcolor="#FFFFFF"><table width="98%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><font color="999999">点击返回</font></td>
        <td align="right"><font color="999999">点击返回</font></td>
      </tr>
    </table>
      <table width="100" height="100" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd">
        <tr>
          <td align="center" bgcolor="#FFFFFF" style="CURSOR: hand"><?php echo $picurl; ?></td>
        </tr>
      </table>
      <table width="98%" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><font color="999999">点击返回</font></td>
          <td align="right"><font color="999999">点击返回</font></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>

<br>
<br>
</body>
</html>