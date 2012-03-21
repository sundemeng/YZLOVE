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
if($_REQUEST['submitok']=="allupdate"){
        $userid=$_REQUEST['userid'];
		$if2=$_REQUEST['if2'];
		$grade=$_REQUEST['grade'];
		$db->query("update ".__TBL_MAIN__." set if2=".$if2.",grade=".$grade." where id=".$userid);
		echo "<script language=\"javascript\">alert('修改成功！');window.location.href='vip_search.php";
		echo "'</script>";
		exit();
}

    $adminkeyword=$_REQUEST['adminkeyword'];
	if (empty($adminkeyword)){
      $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE grade<>1 ORDER BY logintime ASC");
	}else{
	  $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE grade<>1 and username like '%".$adminkeyword."%' ");
	}
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
      
	//添加	

?>
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>VIP升级中心:</b></td>
      </tr>
    </table></td>
    <td width="22%" align="center">记录总数 <font color="#FF0000"><?php echo $total; ?>    </font> 人</td>
    <td width="55%" align="right"><table width="278" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="vip_search.php">
        <tr>
          <td width="224">按用户名/昵称搜索：
            <input name="adminkeyword" type="text" size="15" maxlength="15" class="input">          </td>
          <td width="54" align="right"><input type="submit" value=" 搜索 " class=buttonx></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%">&nbsp;</td>
    <td width="65%" align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?>&nbsp;</td>
  </tr>
</table>

<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>ID</b></font></td>
    <td align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">用户名</font></b></td>
    <td width="355" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">会　员　等　级</font></b></td>
    <td width="59" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">Love币</font></b></td>
    <td width="31" align="center" valign="bottom" bgcolor="D3DCE3"><b><font color="#000000">状态</font></b></td>
    <td width="46" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>经验值</b></font></td>
    <td width="48" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>登录</b></font></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
  <tr bgcolor=E5E5E5  onmouseover=this.className='Hand_On'; onmouseout=this.className='Hand_Off';>
      <td width="44" height="26" align="center"><label for="chk2"><b><?php echo $rows['id']; ?></b></label></td>
      <td width="167" align="left"><a href="../home/<?php echo $rows['id']; ?>" class=u333333 target=_blank><?php echo $rows['username']; ?></a>　(<font color="#999999"><?php echo $rows['nickname']; ?></font>)</td>
      <td style="line-height:150%;"><table width="100%" height="22" border="0" cellpadding="0" cellspacing="0">
     <form action="?submitok=allupdate" method="post" name=lovebhihi>
     <tr>
        <td><input name="sjtime" type="text" id="sjtime" value="<?php echo $rows['sjtime']; ?>" size="19">
        <select name="if2">
          <option value="0"  <?php if ($rows['if2']==0) echo "selected"; ?> style="color:#cccccc;">－－</option>
          <option value="1"  <?php if ($rows['if2']==1) echo "selected"; ?> style="color:#FF6600">包年</option>
          <option value="2"  <?php if ($rows['if2']==2) echo "selected"; ?> style="color:#999999">临时</option>
          <option value="3"  <?php if ($rows['if2']==3) echo "selected"; ?> style="color:#FF6600">永久</option>
          <option value="4"  <?php if ($rows['if2']==4) echo "selected"; ?> style="color:#999999">积分</option>
          <option value="5"  <?php if ($rows['if2']==5) echo "selected"; ?> style="color:#FF6600">包月</option>
        </select>
		<select name="grade" style="font-size:9pt;">
          <option value="1" <?php if ($rows['grade']==1) echo "selected"; ?>>普通</option>
          <option value="2" <?php if ($rows['grade']==2) echo "selected"; ?>>诚信</option>
          <option value="3" <?php if ($rows['grade']==3) echo "selected"; ?>>钻石</option>
          <option value="10" <?php if ($rows['grade']==10) echo "selected"; ?>>管理员</option>
        </select>
		<input type="submit" name="Submit22" value="改变" class="buttonx">
        <input name="userid" type="hidden" value=<?php echo $rows['id']; ?>>
        <input name="sjtimeold" type="hidden" value="2009-12-23 13:15:09">还剩<font color=red>365</font>天</td>
     </tr>
     </form>
    </table></td>
      <td align="center"><font color="#FF0000"><?php echo $rows['loveb']; ?></font></td>
      <td align="center">
	  <?php 
	   if ($rows['flag']==1){
           echo "正常";
       }
	   else{
	       echo"<font color=red>已锁定</font>";
	   }
	   ?>
	  </td>
      <td align="center"><font color="#FF0000"><?php echo $rows['alltime']; ?></font></td>
      <td align="center"><font color="#FF0000"><?php echo $rows['logincount']; ?></font> 次</td>
    </tr>
<?php
	}
?>
  </table>

   <?php
 
	}
?>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
 
