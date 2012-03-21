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
		$p=$_REQUEST['p'];
		$if2=$_REQUEST['if2'];
		$grade=$_REQUEST['grade'];
		$db->query("update ".__TBL_MAIN__." set if2=".$if2.",grade=".$grade." where id=".$userid);
		echo "<script language=\"javascript\">alert('修改成功！');window.location.href='user_search.php?p=".$p."";
		echo "'</script>";
		exit();
}
if($_REQUEST['submitok']=="loveb"){
        $userid=$_REQUEST['userid'];
		$p=$_REQUEST['p'];
		$username=$_REQUEST['username'];
		$loveb=$_REQUEST['lovebb'];
		$num=$_REQUEST['num'];
		$kind=$_REQUEST['kind'];
	//	if ($loveb>"999999"){
	//		   echo "<script language=\"javascript\">alert('大哥，你也加得太多了吧？要少于999999哦，你可以分开来加！');history.go(-1)</script>";
	//	       exit();
	//	   }
	    if (empty($loveb)){
     	   echo "<script language=\"javascript\">alert('大哥，您不填写，怎么修改?');history.go(-1)</script>";
           exit();
        }
		if ($kind=="-"){
		   if ($loveb<$num){
			   echo "<script language=\"javascript\">alert('大哥，他都没那么多金币，你这样减少，都变负数了，太残忍了吧？！');history.go(-1)</script>";
		       exit();
		   }
		}
		//LOVE B 记录
		$datetime= date("Y-m-d H:i:s");
	    $content="管理员操作";
		//$renshu=.$kind."".$num.;
        $db->query("INSERT INTO ".__TBL_LOVEBHISTORY__." (userid,username,content,num,addtime)values(".$userid.",'".$username."','".$content."','".$kind."".$num."','".$datetime."')");
		//
		$db->query("update ".__TBL_MAIN__." set loveb=loveb".$kind."".$num." where id=".$userid);
		echo "<script language=\"javascript\">alert('修改成功！');window.location.href='user_search.php?p=".$p."";
		echo "'</script>";
		exit();
}
if($_REQUEST['submitok']=="suoding"){
       $userid=$_REQUEST['userid'];
	   $p=$_REQUEST['p'];
	   $rst=$db->query("SELECT flag FROM ".__TBL_MAIN__."  where id=".$userid);
	   $rowst = $db->fetch_array($rst);
       if ($rowst[0]==-1){
	      $flag=1;
	   }else{
		  $flag=-1;
	   }
       $db->query("update  ".__TBL_MAIN__."  set flag=".$flag." where id=".$userid);
       header("Location: user_search.php?p=".$p."");
	   exit();
}
    $adminkeyword=$_REQUEST['adminkeyword'];
	if (empty($adminkeyword)){
      $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." ORDER BY id desc");
	}else{
	  $rs=$db->query("SELECT * FROM ".__TBL_MAIN__." WHERE username like '%".$adminkeyword."%' or and nickname like '%".$adminkeyword."%' ");
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
<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="23%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;"><b>会员管理/升级</b></td>
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
     <td width="54" height="20" align="center" valign="bottom" background="images/22.gif"><font color="#000000">ID 号<br>    
    </font></td>
    <td width="132" align="center" valign="bottom" background="images/22.gif"><font color="#000000">用户名</font></td>
    <td height="22" align="center" valign="bottom" background="images/22.gif" bgcolor="#FFFFFF"><font color="#000000">地　区</font></td>
    <td width="201" align="center" valign="bottom" background="images/22.gif"><font color="#000000">Love币</font></td>
    <td width="167" align="center" valign="bottom" background="images/22.gif"><font color="#000000">会员等级</font></td>
    <td width="58" align="center" valign="bottom" background="images/22.gif"><font color="#000000">状 态</font></td>
    <td width="55" align="center" valign="bottom" background="images/22.gif"><font color="#000000">经 验</font></td>
    <td width="33" align="center" valign="bottom" background="images/22.gif"><font color="#000000">照片</font></td>
    <td width="68" align="center" valign="bottom" background="images/22.gif"><font color="#000000">登 录</font></td>
  </tr>
  <?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
<tr bgcolor=#ebf0f2 onMouseOver="this.style.background='#ffff88'" onMouseOut="this.style.background='#ebf0f2'">
    <td width="54" align="center"><a href="../login.php?submitok=checkuseradmin&uid=<?php echo $rows['id']; ?>&pwd=<?php echo $rows['password']; ?>" target="_blank"title="点击直接进入管理" class="u000" ><b><?php echo $rows['id']; ?></b></a></td>
    <td align="center"  title="<span style=line-height:200%;>用户名：<?php echo $rows['username']; ?> (昵称：<?php echo $rows['nickname']; ?>)<br>注册时间：<?php echo $rows['regtime']; ?><br>最后登录：<?php echo $rows['logintime']; ?><br>注册IP：<?php echo $rows['regip']; ?><br>最后登录IP：<?php echo $rows['loginip']; ?><br>初始电话：<?php echo $rows['yctel']; ?></span>"><a href="../home/4" class=u333333 target=_blank><?php echo $rows['username']; ?></a><br><img src="images/line_null.gif" width="16" height="12" vspace="5" align="absmiddle">( <font color="#999999"><?php echo $rows['nickname']; ?></font> )</td>
	<td width="137" align="center"><?php echo $rows['area1']; ?><?php echo $rows['area2']; ?></td>
	<td align="center" >
	  <table width="99%" height="22" border="0" cellpadding="0" cellspacing="0">
         <form action=?submitok=loveb&p=1 method="post" name=form>
         <tr>
           <td width="55" align="center"><font color="#FF0000"><?php echo $rows['loveb']; ?></font> </td>
           <td>
		     <input name="num" type="text" size="6" maxlength="9" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
             <select name="kind" id="kind" >
               <option value="+" selected>+</option>
               <option value="-">-</option>
             </select>
			 <input type="submit" name="Submit2" value="OK" class="buttonx">
             <input name="userid" type="hidden" value=<?php echo $rows['id']; ?>>
             <input name="username" type="hidden" value=<?php echo $rows['username']; ?>>
             <input name="lovebb" type="hidden" value=<?php echo $rows['loveb']; ?>></td>
         </tr>
         </form>
      </table>
	</td>
    <td style="line-height:150%;">
	    <table width="100%" height="22" border="0" cellpadding="0" cellspacing="0">
        <form action="?submitok=allupdate" method="post" name=lovebhihi>
        <tr>
          <td>
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
       </tr>
       </form>
      </table>
	  </td>
      <td align="center"><a href="?submitok=suoding&userid=<?php echo $rows['id']; ?>&p=1" title="点击锁定或者解开此用户" class="u000">
	  <?php 
	   if ($rows['flag']==1){
           echo "正常";
       }
	   else{
	       echo"<font color=red><b>已锁定</b></font>";
	   }
	   ?></a>
	  </td>
	  <td align="center"><font color="#FF0000"><?php echo $rows['alltime']; ?></font></td>
      <td align="center">
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
 
