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
		$coun = count($_POST['list']);
		for ($i = 0; $i < $coun; $i++)
        {
         //删除操作
		  $rt = $db->query("SELECT fid,path_s,path_b,ifmain FROM ".__TBL_STORY_PHOTO__." WHERE id=".$list[$i]);
		  if($db->num_rows($rt)){
		 	 $row = $db->fetch_array($rt);
			 $fid      = $row[0];
			 $path1    = $row[1];
			 $path2    = $row[2];
			 $ifmain   = $row[3];
			 if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
			 if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
			 if ($ifmain==1)$db->query("UPDATE ".__TBL_STORY__." SET picurl_s='' WHERE id='$fid'");
		   }
		   $db->query("DELETE  FROM ".__TBL_STORY_PHOTO__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='story_photo.php'</script>";
		exit();
}
     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_STORY_PHOTO__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_STORY_PHOTO__." WHERE content like '%".$adminkeyword."%' ORDER BY id DESC");
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
<form name="FORM" method="post" action="?submitok=allupdate">
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="66" height="35"><script LANGUAGE="JavaScript">
var checkflag = "false";
function check(field) {
	if (checkflag == "false") {
		for (i = 0; i < field.length; i++) {
			field[i].checked = true;
		}
		checkflag = "true";
		return "取消全选"; 
	} else {
		for (i = 0; i < field.length; i++) {
			field[i].checked = false;
		}
		checkflag = "false";
		return "开始全选"; 
	}
}
</script>
      <input type="button" style="border:#cccccc 1px solid;padding-top:1px;height:18;font-size:9pt;background:#ffffff;color:#333333;" onClick="this.value=check(this.form)" value="开始全选"></td>
    <td width="94" align="right">&nbsp;</td>
    <td width="734" align="center" valign="bottom"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    <td width="79"><input name="submit" type="submit" class=buttonx id="submitok" value="×批量删除" onClick="return confirm('×××××\n\n确认删除？')"></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<?php
  $iii=1;
     while($rows=$db->fetch_array($rs)){
?>
        <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;">
		<table width="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">
          <tr>
            <td height="140" weight="140" colspan="2" align="center" bgcolor=#ffffff><a href="###"   onClick="showModalDialog('piczoom.php?picurl=../up/photo/<?php echo $rows['path_b']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') ">
			<img src=../up/photo/<?php echo $rows['path_s']; ?> alt="放大照片" border="0"></a></td>
          </tr>
          <tr>
             <td height="18" colspan="2" align="center"  bgcolor=#ffffff><font color="#666666"><?php echo $titles; ?></font></td>
          </tr>
          <tr>
             <td height="18" colspan="2" align="center"><font color="#666666"><?php echo $titles; ?></font></td>
          </tr>
          <tr>
             <td colspan="2" bgcolor="#efefef" bgcolor=#ffffff>来自故事：<b><a href="../story/detail.php?fid=<?php echo $rows['fid']; ?>" target="_blank"><img src="images/zoom.gif" hspace="5" border="0" align="absmiddle" ><font color="#FF0000"><u><?php echo $rows['title']; ?></u></font></a></b></td>
          <tr>
             <td width="60" height="5" align="right" bgcolor="#efefef"  style="color:#ff0000" title="主照片"></td>
             <td width="90" align="right" bgcolor="#efefef"><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" id="chk34" style="border:0px"><label for="chk<?php echo $rows['id']; ?>"><font color="#999999">选择</font></label></td>
          </tr>
        </table>
		</td>
<?php	
	if ($iii%5==0){
       echo '</tr>' ;
    }
    $iii=$iii+1;
         
  }
  
}
    else{
       echo"<br/><br/><br/>&nbsp;&nbsp;&nbsp;Sorry! ...暂无内容...";
 	}


?>
 </table></form>
<?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
<br>
<br>
<br>

<br>
</body>
</html>
 
