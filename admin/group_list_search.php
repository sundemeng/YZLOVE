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
//
if($_REQUEST['submitok']=="delupdate"){
        $classid = $_REQUEST['classid'];
		$db->query("delete from  ".__TBL_GROUP_MAIN__." where id=".$classid );
		exit();

}elseif($_REQUEST['submitok']=="allupdate"){
       $classid=$_REQUEST['classid'];
	   $qkind=$_REQUEST['qkind'];
	   $ifflag=$_REQUEST['ifflag'];
	   $qgrade=$_REQUEST['qgrade'];
	   $title=$_REQUEST['title'];
	   $content=$_REQUEST['content'];
	   $qloveb=$_REQUEST['qloveb'];	 
	   //处
       $db->query("update  ".__TBL_GROUP_MAIN__."  set flag=".$ifflag.",qgrade=".$qgrade.",title='".$title."',content='".$content."',qloveb=".$qloveb." where id=".$classid);
       header("Location: group_list_search.php");
	   exit();

}
else
{
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_GROUP_MAIN__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_GROUP_MAIN__." WHERE title like '%".$adminkeyword."%' ORDER BY id DESC");
	 }
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 30;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
?>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" style="border:#dddddd 1px solid;">
  <tr>
    <td width="20%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>圈子列表管理:</b></td>
      </tr>
    </table></td>
    <td width="18%" align="center" style="padding-top:6px;">共有圈子 <font color="#FF0000">
      <?php echo $total;?>    </font> 个 </td>
    <td width="62%" align="right" style="padding-right:5px;">
	 <table width="306" height="22" border="0" cellpadding="0" cellspacing="0">
      <form name="form1" method="post" action="">
        <tr>
          <td>按圈子名称搜索：
            <input name="adminkeyword" type="text" size="20" maxlength="25" class=input>
            <input type="submit" value=" 搜索 " class=buttonx>
		  </td>
        </tr>
      </form>
    </table>
  </td>
  </tr>
</table>

<table width="98%" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="53">&nbsp;</td>

    <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="53">&nbsp;</td>

  </tr>
</table>
<table width="98%" height="29" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#FFFFFF" >
  <tr bgcolor="#FFFFFF">
    <td height="20" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">MainID</font></td>
    <td width="37" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">类别</font></td>
    <td width="55" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">状态</font></td>
    <td width="37" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">等级</font></td>
    <td width="169" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>圈子名称<font color="#000000">/ 说明</font></b></font></td>
    <td width="74" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">组 长</font></td>
    <td width="49" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">财 富</font></td>
    <td width="36" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">成 员</font></td>
    <td width="43" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">主 题</font></td>
    <td width="34" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"> 回 贴</font></td>
    <td width="40" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">Click</font></td>
    <td width="30" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">修改</font></td>
    <td width="77" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">创建时间</font></td>
    <td width="26" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000">删除</font></td>
  </tr>
<form action="?submitok=allupdate" method=post>
<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);	
	   if(!$rows) break;
  ?>
  <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffff88'" onMouseOut="this.style.background='#E5E5E5'">
    <td width="36" height="26" align="center"><font color="#666666"><?php echo $rows['id']; ?></font></td>
    <td align="center" valign="top" >
      <select name="qkind" id="qkind" style="font-size:9pt;">
         <option value=4,55>55</option>
		 <option value=3,00000>00000</option>
		 <option value=1,11 selected>11</option>
	  </select>
	</td>
    <td align="center" valign="top" ><select name="ifflag" style="font-size:9pt;">
      <option value="0" style="color:red;" <?php if ($rows['flag']==0) echo "selected"?>>未审</option>
      <option value="1" style="color:green;" <?php if ($rows['flag']==1) echo "selected"?>>正常</option>
      <option value="-1" style="color:blue;" <?php if ($rows['flag']==-1) echo "selected"?>>隐藏</option>
    </select>
      <br>
    <a href="../group/groupmain.php?mainid=<?php echo $rows['id']; ?>" target="_blank" class="u333333"><img src="images/zoom.gif" border="0" align="absmiddle"><font color="#FF0000">浏览</font></a></td>
    <td align="center" valign="top" >
	  <select name="qgrade">
        <option value="1" <?php if ($rows['qgrade']==1) echo "selected"?>>1</option>
        <option value="2" <?php if ($rows['qgrade']==2) echo "selected"?>>2</option>
        <option value="3" <?php if ($rows['qgrade']==3) echo "selected"?>>3</option>
        <option value="4" <?php if ($rows['qgrade']==4) echo "selected"?>>4</option>
        <option value="5" <?php if ($rows['qgrade']==5) echo "selected"?>>5</option>
      </select>
	</td>
    <td align="center" valign="top" ><input name="title" type="text" class="input" value="<?php echo $rows['title']; ?>" size="16" maxlength="50" style="color:#000000;font-weight:bold;"> 
      <textarea name="content" cols="25" rows="4" id="content"><?php echo $rows['content']; ?></textarea>
      <input type="hidden" name="classid" value="<?php echo $rows['id']; ?>" >
	</td>
    <td align="center" valign="top" ><?php echo $rows['id']; ?>
    </td>
    <td align="center" valign="top" >
      <input name="qloveb" type="text" class="input" id="qloveb" value="<?php echo $rows['qloveb']; ?>" size="6" maxlength="8"></td>
    <td align="center" valign="top" ><font color="#FF0000"><?php echo $rows['allusrnum']; ?></font></td>
    <td align="center" valign="top" ><font color="#FF0000"><?php echo $rows['wznum']; ?></font></td>
    <td align="center" valign="top" ><font color="#FF0000"><?php echo $rows['bbsnum']; ?></font></td>
    <td align="center" valign="top" ><font color="#FF0000"><?php echo $rows['click']; ?></font></td>
    <td align="center" valign="top" ><font color="#FF0000"><input type="submit" name="Submit1" value="改" class=buttonx></font></td>
    <td align="center" valign="top" ><?php echo $rows['addtime']; ?></td>
    <td width="26" align="center" valign="top" ><a href="?submitok=delupdate&classid=<?php echo $rows['id']; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？\n\n此操作将联动删除该分类下的所有组和贴子。建议修改。')"><img src="images/delx.gif" alt="删除" border="0"></a></td>
  </tr>
  <?php
	
	  }
	} else{
       echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...暂无内容...";
 	}
	}
?>
</form>
</table>

<br>
</body>
</html>
