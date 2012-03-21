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
		  $rt = $db->query("SELECT userid,path_s,path_b,ifmain FROM ".__TBL_PHOTO__." WHERE id=".$list[$i]);
		if($db->num_rows($rt)){
			$row = $db->fetch_array($rt);
			$memberid = $row[0];
			$path1    = $row[1];
			$path2    = $row[2];
			$ifmain   = $row[3];
			if (file_exists(YZLOVE."up/photo/".$path_s))unlink(YZLOVE."up/photo/".$path1);
			if (file_exists(YZLOVE."up/photo/".$path_b))unlink(YZLOVE."up/photo/".$path2);
			if ($ifmain==1)$db->query("UPDATE ".__TBL_MAIN__." SET video_s='' WHERE id=".$memberid);
		   }
		   $db->query("DELETE  FROM ".__TBL_PHOTO__." where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='photo_search.php'</script>";
		exit();
}

if($_REQUEST['submitok']=="sh1"){
       $classid=$_REQUEST['classid'];
	   $p=$_REQUEST['p'];
	   $rst=$db->query("SELECT flag FROM ".__TBL_PHOTO__."  where id=".$classid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==0){
	      $flag=1;
	   }else{
		  $flag=0;
	   }
       $db->query("update  ".__TBL_PHOTO__."  set flag=".$flag." where id=".$classid);
       header("Location: photo_search.php?p=".$p."");
	   exit();
}
if($_REQUEST['submitok']=="loveb"){
       $classid=$_REQUEST['classid'];
	   $p=$_REQUEST['p'];
	   $fenshu=$_REQUEST['fenshu'];
	   $userid=$_REQUEST['userid'];
	   $datetime= date("Y-m-d H:i:s");
	   $content="上传图片并已通过审核奖励";
	   $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$userid);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];

       $db->query("update  ".__TBL_MAIN__."  set loveb=loveb+".$fenshu." where id=".$userid);
	   $db->query("INSERT INTO ".__TBL_LOVEBHISTORY__." (userid,username,content,num,addtime)values(".$userid.",'".$username."','".$content."','".$fenshu."','".$datetime."')");
       $db->query("update  ".__TBL_PHOTO__."  set flag=1 where id=".$classid);
       header("Location: photo_search.php?p=".$p."");
	   exit();
}



     $adminkeyword=$_REQUEST['adminkeyword'];
     if (empty($adminkeyword)){
       $rs=$db->query("SELECT * FROM ".__TBL_PHOTO__."  ORDER BY id DESC");
	 }else{
	   $rs=$db->query("SELECT * FROM ".__TBL_PHOTO__." WHERE userid=".$adminkeyword." ORDER BY id DESC");
	 }
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 20;
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
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>相册审核:</b></td>
      </tr>
    </table></td>
    <td width="26%" align="center" style="padding-top:6px;">记录总数 <font color="#FF0000"><?php echo $total;?>  </font> 张</td>
    <td width="54%" align="center" style="padding-right:5px;">&nbsp;</td>
  </tr>
</table>
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
 
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	


	   if ($rows['flag']==0){
		  $color="#ffff00";
	      $shenhe="<a href=?submitok=sh1&classid=".$rows['id']."&p=".$p."><font color=blue>点击审核</font></a>";
		  $fenshu="<tr><td height='5' colspan='2' align='center' style='border-top:#dddddd 1px solid;color:#cccccc;' bgcolor=#ffffaa><a href='?classid=".$rows['id']."&submitok=loveb&fenshu=0&userid=".$rows['userid']."&p=1'><u><b><font color='#FFcc00'>0</font></b></u></a>　|　<a href='?classid=".$rows['id']."&submitok=loveb&fenshu=500&userid=".$rows['userid']."&p=1'><u><b><font color='ff6600'>500</font></b></u></a>　|　<a href='?classid=".$rows['id']."&submitok=loveb&fenshu=1000&userid=".$rows['userid']."&p=1'><u><b><font color='cc0000'>1000</font></b></u></a></td></tr>";
	   }else{
		  $color="#ffffff";
	      $shenhe="<a href=?submitok=sh1&classid=".$rows['id']."&p=".$p."><font color=red>已审核</font></a>";
		  $fenshu="";
	   }
	   $rss=$db->query("SELECT username FROM ".__TBL_MAIN__."  WHERE id=".$rows['userid']);
       $rowss = $db->fetch_array($rss);
       $username=$rowss[0];
?>
        <td align="center" valign="top" bgcolor="#FFFFFF" style="padding-top:10px;">
		<table width="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style="border:#dddddd 1px solid;">
          <tr>
            <td height="140" weight="140" colspan="2" align="center" bgcolor=<?php echo $color;?>><a href="###"   onClick="showModalDialog('piczoom.php?picurl=../up/photo/<?php echo $rows['path_b']; ?>', window, 'dialogWidth:800px; dialogHeight:600px;status:0;help:0;scroll:auto;') "><img src=../up/photo/<?php echo $rows['path_s']; ?> alt="放大照片" border="0" width="120"></a></td>
          </tr>
          <tr>
             <td height="18" colspan="2" align="center"  bgcolor=<?php echo $color;?>><font color="#666666"><?php echo $rows['title']; ?></font>&nbsp;<?php echo $shenhe;?></td>
          </tr>
		  <tr>
        <td height="18" colspan="2" align="center"  bgcolor=<?php echo $color;?>><font color="#999999"><?php echo $rows['addtime']; ?></font></td>
      </tr>
        <tr>
        <td height="17" colspan="2" bgcolor=<?php echo $color;?>>&nbsp;&nbsp;发布人：&nbsp;<a href="../home/<?php echo $rows['userid']; ?>" class=u333333 target=_blank><b><?php echo $username;?></b></a></td>
      </tr>
      <tr>

        <td width="52" align="right" bgcolor="efefef" bgcolor=#ffffff><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" id="chk<?php echo $rows['id']; ?>" class="input"><label for="chk<?php echo $rows['id']; ?>"><font color="#999999">选择</font></label>
          </td>
      </tr>
         <?php echo $fenshu;?>
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
 
