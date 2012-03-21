<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
  include_once('session.php');
  require_once ('../sub/init.php');$navvar=1;
  require_once ('../sub/conn.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>后台管理</title>
</head>
	<STYLE>
.navPoint{FONT-SIZE:9pt;CURSOR:hand;COLOR:white;FONT-FAMILY:Webdings}   
body{font-size:9pt;}
td{font-size:9pt; COLOR:   white;}
a {
	color: #B13773;
	text-decoration:none;
}
</STYLE><SCRIPT>   
function   switchSysBar() {   
if (switchPoint.innerText==3){ 
	switchPoint.innerText=4   
	document.all("frmTitle").style.display="none" 
	document.getElementById("ImgArrow").src="images/switch_right.gif";
	document.getElementById("ImgArrow").title="打开左侧导航栏";
} else {
	document.getElementById("ImgArrow").src="images/switch_left.gif";
	document.getElementById("ImgArrow").title="隐藏左侧导航栏";
	switchPoint.innerText=3   
	document.all("frmTitle").style.display=""   

}   
}   
</SCRIPT>
</HEAD>   
<BODY scroll=no bgProperties=fixed  oncontextmenu=self.event.returnValue=false topmargin="0" leftmargin="0">   
<TABLE   height="100%"   cellSpacing=0   cellPadding=0   width="100%"   border=0>   
<TR>   
<TD width="150" noWrap id=frmTitle name="frmTitle" style="border-right:#dddddd 2px solid;">
	<iframe width="150" height=100% name=menu scrolling=auto target=main src="left.php" frameborder=0 marginheight=0 marginwidth=0 framespacing=0 ></iframe>
</TD>   
<TD width="11" valign="middle"   bgColor=#B13773   style="WIDTH:11px;cursor:hand:"  title="关闭/打开左栏"><!--  onClick="switchSysBar()"-->
	<!-- <font color="#FFFFFF" style="CURSOR:hand;">收缩</font>
	<TABLE   height="19"   cellSpacing=0   cellPadding=0   border=0>   
	<TR>   
	<TD height="40" style="CURSOR:hand;">   
	<SPAN class=navPoint id=switchPoint title=关闭/打开左栏>3</SPAN></TD>   
	
	</TR>   
	</TABLE> 
	 <font color="#FFFFFF" style="CURSOR:hand;">展开</font> -->
	 
	<a href="javascript:switchSysBar()" class=navPoin><input type="hidden" class=navPoint id=switchPoint>3</input><img src="images/switch_left.gif" title="隐藏左侧导航栏" id="ImgArrow" /></a>
</TD>
<TD style="border-left:#dddddd 2px solid;">
	<iframe name=mainframe src='welcome.php' width=100% height=100% scrolling=auto frameborder=no marginheight=0 marginwidth=0 framespacing=0 style='padding-bottom:5px;'></iframe>
</TD>   
</TR>   
</TABLE>   
	<noframes>
		<body>很遗憾，你的浏览器不支持框架。</body>
	</noframes>
</html>
