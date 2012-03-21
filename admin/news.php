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
include_once("../FCKeditor/fckeditor.php");    //引用FCKeditor.php这个文件 
  $FCKeditor=new FCKeditor("myinfo");        //创建FCKeditor对象的实例 
  $FCKeditor->BasePath="FCKeditor/";          //FCKeditor所在的位置，这里它的位置就是"FCKeditor/"; 
  $FCkeditor->ToolbarSet="Default";           //工具按钮设置 
  $FCKeditor->Width="100%";                   //设置它的宽度 
  $FCKeditor->Height="300px";                 //设置它的高度 
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
</head>
<link href="main.css" rel="stylesheet" type="text/css">
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"  bgcolor=#ffffff>
<?php
$kind=$_GET['kind'];
if ($kind==1){
  $leibie="<a href='news.php?kind=1' class=uFF5494>网站公告</a>　|　<a href='news.php?kind=2' class=u333333>恋爱宝典</a>　|　<a href='news.php?kind=3' class=u333333>婚姻法规</a>";
  $title="网站公告";
}
elseif($kind==2){
  $leibie="<a href='news.php?kind=1' class=u333333>网站公告</a>　|　<a href='news.php?kind=2' class=uFF5494>恋爱宝典</a>　|　<a href='news.php?kind=3' class=u333333>婚姻法规</a>";
  $title="恋爱宝典";
}
else{
  $leibie="<a href='news.php?kind=1' class=u333333>网站公告</a>　|　<a href='news.php?kind=2' class=u333333>恋爱宝典</a>　|　<a href='news.php?kind=3' class=uFF5494>婚姻法规</a>";
  $title="婚姻法规";
}
?>
<?php
//echo $_REQUEST['submitok']; exit;


//添加
if($_REQUEST['submitok']=="add"){
  addmain();
}//删除
elseif($_REQUEST['submitok']=="delupdate"){
		$coun = count($_POST['list']);
		$kinds=$_REQUEST['kinds'];
		for ($i = 0; $i < $coun; $i++)
        {
         //删除操作
		  $db->query("DELETE  FROM yzlove_news where id='$list[$i]'");
		}
		echo "<script language=\"javascript\">alert('删除成功！');window.location.href='news.php?kind=";
		echo $kinds;
		echo "'</script>";
		exit();
}elseif($_REQUEST['submitok']=="addupdate"){
       $kindc=$_GET['kindc'];
	   $form_title=trim($_POST['form_title']);
	   $myinfo=$_POST['myinfo'];
	   $datetime = 0;
	   //echo $form_title;
	  // exit;
	   if (empty($form_title) ||empty($myinfo) ){
	      echo"<script language=\"javascript\">alert('请填写完必要的项目!');history.go(-1)</script>";
          exit();
	   }
	   //处理添加数据
       $db->query("INSERT INTO yzlove_news (kind,title,content,addtime,click)values(".$kindc.",'".$form_title."','".$myinfo."','".$datetime."',200)");
       echo "<script language=\"javascript\">alert('添加成功！');window.location.href='news.php?kind=";
	   echo $kindc;
	   echo "'</script>";
	   exit();

}elseif($_REQUEST['submitok']=="mod"){
      $kindb=$_REQUEST['kindb'];
	  $classid=$_REQUEST['classid'];
	  $rsb=$db->query("SELECT * FROM ".__TBL_STORY__." WHERE id=".$classid);
      $rowsb = $db->fetch_array($rsb);
?> 
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" >
<form name=FORM  method="POST" action="news.php?submitok=addupdate&kinde=<?php echo $kindb;?>" enctype="multipart/form-data"  onSubmit="return chkform()" onClick="clear2bx()">
<script language="javascript">
function chkform(){
	if(document.FORM.title.value==""){
	alert('请输入标题！');
	document.FORM.title.focus();
	return false;
	}
}
</script>
    <tr bgcolor="#FFFFFF">
      <td width="9%" height="0" align="right" bgcolor="efefef">标　　题：</td>
      <td width="91%" valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="form_title" type="text" id="form_title" value="<?php echo $rowsb['title']; ?>" style="font-size:9pt;" size="100" class="input">
      </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="9%" align="right" bgcolor="efefef">详细内容：</td>
      <td valign="bottom" bgcolor="#FFFFFF">
	     <INPUT id=content style="DISPLAY: none" type=hidden name="myinfo" value="<?php echo $rowsb['content']; ?>"> 
         <INPUT id=content___Config style="DISPLAY: none" type=hidden> 
         <IFRAME id=content___Frame src="../FCKeditor/editor/fckeditor.html?InstanceName=myinfo&amp;Toolbar=Default" frameBorder=0 width=100% scrolling=no height=400> 
         </IFRAME> 
      </td>
    </tr>
    <tr>
      <td height="13" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="50" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit222" value="　添加　" class=button>
        <font color="#999999">按“Enter回车键”空两行，按“Shift+Enter”键空一行</font></td>
    </tr>
  </form>
</table>
<?php
}
else
{
?>

<table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/g.gif" bgcolor="efefef" style="border:#dddddd 1px solid;">
  <tr>
    <td width="16%" align="left"><table width="157" height="17" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><b><img src="images/tips.gif" width="16" height="17" hspace="5" align="absmiddle"></b></td>
        <td width="130" style="font-size:10.3pt;padding-top:3px;font-weight:bold"><?php echo $title;?>:</td>
      </tr>
    </table></td>
    <td width="69%" align="center" valign="bottom" style="color:#999999;font-size:14px;padding-bottom:3px">
	<?php echo $leibie;?>
	</td>
    <td width="15%" align="left">&nbsp;</td>
  </tr>
</table>
<?php
     $rs=$db->query("SELECT * FROM yzlove_news where kind=".$kind." ORDER BY id DESC");
	$total = $db->num_rows($rs);
    if($total>0){
       require_once 'include/classx.php';
       $pagesize = 40;
       if ($p<1)$p=1;
       $mypage=new uobarpage($total,$pagesize);
       $pagelist = $mypage->pagebar(1);
       $pagelistinfo = $mypage->limit2();
       mysql_data_seek($rs,($p-1)*$pagesize);
?>
<table width="98%" height="29" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" >
  <form name="FORM" method="post" action="news.php?submitok=delupdate&p=1&kinds=<?php echo $kind;?>">
    <tr bgcolor="#FFFFFF">
      <td height="32" colspan="4" align="right" valign="bottom" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="53"><input type="button"  value="发布<?php echo $title;?>" class="buttonx" onClick="window.open('news.php?submitok=add&kindd=<?php echo $kind;?>','_self')"></td>
          <td align="center"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
          <td width="53"><input  type="submit" class=buttonx id="submitok" value="×删除" onClick="return confirm('×××××\n\n确认删除？')"></td>
        </tr>
      </table></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="66" height="20" align="center" valign="bottom" bgcolor="D3DCE3"><script LANGUAGE="JavaScript">
<!-- Begin
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
      <td width="623" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>标　题</b></font></td>
      <td width="60" align="center" valign="bottom" bgcolor="D3DCE3"><b>修改</b></td>
      <td width="203" align="center" valign="bottom" bgcolor="D3DCE3"><font color="#000000"><b>日期</b></font></td>
    </tr>
	<?php
  for($i=1;$i<=$pagesize;$i++) {
       $rows = $db->fetch_array($rs);
       if(!$rows) break;	

?>
        <tr bgcolor=#E5E5E5 onMouseOver="this.style.background='#ffffcc'" onMouseOut="this.style.background='#E5E5E5'">
      <td><input type=checkbox name=list[] value="<?php echo $rows['id']; ?>" >
      1</td>
      <td width="623"><a href="../newsshow.php?id=<?php echo $rows['id']; ?>" target="_blank"><img src="images/zoom.gif" width="13" height="13" hspace="3" border="0" align="absmiddle"><?php echo $rows['title']; ?></a><br></td>
      <td width="60" align="center"><a href="news.php?classid=1&submitok=mod&kindb=1"><img src="images/mod.gif" width="53" height="24" border="0"></a></td>
      <td width="203" align="center"><?php echo $rows['addtime']; ?></td>
    </tr>
	<?php
	}
}else{
  echo"Sorry! ...暂无内容...<a href=news.php?submitok=add&kindd=";
  echo $kind;
  echo "><b><u>点此添加";
  echo $title;
  echo "</u></b></a>";
}
}

function addmain(){
	$kindd=$_GET['kindd'];
?> 
<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="dddddd" >
<form name=FORM  method="POST" action="news.php?submitok=addupdate&kindc=<?php echo $kindd;?>" enctype="multipart/form-data"  onSubmit="return chkform()" onClick="clear2bx()">
<input type="hidden" name="content" value="">
<input type="hidden" id="htext" name="text">
<script language="javascript" src="/gyleditor/gyleditor.js"></script>
<script language="javascript">
function chkform(){
	if(document.FORM.title.value==""){
	alert('请输入标题！');
	document.FORM.title.focus();
	return false;
	}
}
</script>
    <tr bgcolor="#FFFFFF">
      <td width="9%" height="0" align="right" bgcolor="efefef">标　　题：</td>
      <td width="91%" valign="bottom" bgcolor="#FFFFFF"><font color="#666666">
        <input name="form_title" type="text" id="form_title" style="font-size:9pt;" size="100" class="input">
      </font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="9%" align="right" bgcolor="efefef">详细内容：</td>
      <td valign="bottom" bgcolor="#FFFFFF">
	     <INPUT id=content style="DISPLAY: none" type=hidden name="myinfo"> 
         <INPUT id=content___Config style="DISPLAY: none" type=hidden> 
         <IFRAME id=content___Frame src="../FCKeditor/editor/fckeditor.html?InstanceName=myinfo&amp;Toolbar=Default" frameBorder=0 width=100% scrolling=no height=400> 
         </IFRAME> 
      </td>
    </tr>
    <tr>
      <td height="13" align="right" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="50" valign="top" bgcolor="#FFFFFF"><input type="submit" name="Submit222" value="　添加　" class=button>
        <font color="#999999">按“Enter回车键”空两行，按“Shift+Enter”键空一行</font></td>
    </tr>
  </form>
</table>


<?php
}	
?>
      </form>
</table>
<br><br><br>
</body>
</html>
 
