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
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff >
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>最近登录Top200:</b></td>
      </tr>
    </table></td>
    <td width="46%" align="center">&nbsp;</td>
    <td width="31%" align="left">&nbsp;</td>
  </tr>
</table>
 <?php
    $rs=$db->query("SELECT * FROM yzlove_main ORDER BY logintime DESC");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="9%">&nbsp;</td>
    <td width="10%" align="center" style="padding-right:5px;">&nbsp;</td>
    <td width="59%" align="center" style="padding-right:5px;"><font color=red><?php echo $pagelist; ?></font> 显示<font color=red><?php echo $total; ?></font>条记录。<?php echo $pagelistinfo; ?></td>
    <td width="22%" align="right" style="padding-right:5px;">&nbsp;</td>
  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID号</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>用户名</b></font></td>
    <td width="46" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>照片</b></font></td>
    <td width="42" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>等级</b></font></td>
    <td width="50" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>Love币</b></font></td>
    <td width="131" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>注册IP</b></font></td>
    <td width="118" align="center" valign="bottom" bgcolor="D3DCE3"><font color="D84895"><b>最近IP</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>注册时间</b></font></td>
    <td width="123" align="center" valign="bottom" bgcolor="D3DCE3"><font color="D84895"><b>最近登录时间</b></font></td>
	<?php
 for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
  </tr>
      <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="44" height="26" align="center"><b><?php echo $rows[0]; ?></b></td>
      <td width="82" align="center"><a href="../home/<?php echo $rows[0]; ?>" class=u333333 target=_blank><?php echo $rows['username']; ?></a><br>
        　　<font color="#999999">(<?php echo $rows['nickname']; ?>)</font></td>
      <td align="center" style="line-height:150%;">
	   <?php 
	   if (empty($rows['photo_s'])){
           echo "";
       }
	   else{
		?>
	       <a href="javascript:void(0);"   onClick="showModalDialog('piczoom.php?picurl=../up/photo/<?php echo $rows['photo_s']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src=images/pic.gif border=0>
	 <?php
	   }
	  ?>
	  </td>
      <td align="center" ><font color="#FF0000"><?php echo $rows['grade']; ?></font></td>
      <td align="center"><font color="#FF0000"><?php echo $rows['loveb']; ?></font></td>
      <td align="center"><?php echo $rows['regip']; ?></td>
      <td align="center"><font color="D84895"><?php echo $rows['loginip']; ?></font></td>
      <td align="center"><?php echo $rows['regtime']; ?></td>
      <td align="center"><font color="D84895"><?php echo $rows['logintime']; ?></font></td>
    </tr>
 <?php
      }
	}
?>
  </table>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
