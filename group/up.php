<?php
require_once '../sub/init.php';
$errout = "<div style='margin:5px 0 0 0;font-size:12px;color:#666666'><a href=".$Global['www_2domain']."/login.php target=_top><font color=#666666><b>请先登录本站</b></font></a></div>";
if (empty($cook_grade)){echo $errout;exit;}
/***********************************************
Copyright (C) 2009 　扬州交友网  择交友友 版本2.0
作  者: supdes　
**********************************************/
if (!empty($path_b)){
	if ($cook_grade == 1){
		echo "<div style='font-size:12px;color:#666666'>只有高级会员才可以上传照片！　　";
		echo "<img src='images/diamond.gif'><a href=".$Global['my_2domain']."/?k_vip.php target=_top><font color=#666666><b>升为高级会员</b></font></a></div>";
		exit;
	} elseif ($cook_grade == 2){
		if ($Temp_photonum > $Global['m_group_tempphoto']){
		echo '诚信会员一天最多上传 ('.$Global['m_group_tempphoto'].') 张照片，钻石会员以上级别不限！';
		echo "<a href=".$Global['my_2domain']."/?k_bank.php target=_top><font color=#666666><b>升为钻石会员</b></font></a></div>";
		exit;
		}
	}
	require_once YZLOVE.'sub/conn.php';
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){echo $errout;;exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {echo $errout;exit;}}
?>
<style type="text/css"> 
a{text-decoration:underline;color:#0000ff;font-family:宋体;font-weight:bold}
a:hover {text-decoration:underline;color:#FF6600} 
body{font-family:宋体;font-size:12px}
TD{ font-size:12px}
</style>
<script language="javascript">
var htmlletter = parent.window.frames["htmlletter"];
var fContent = htmlletter.frames["HtmlEditor"];
fContent.focus();
var sText = fContent.document.selection.createRange();
var str;
str = '<br><center><img src='+'<?php echo $Global['up_2domain'];?>/wzphoto/<?php echo  $path_b; ?>'+'></center><br>';
sText.pasteHTML(str);
</script> 
<?php
	echo "<div style='margin:5px 0 0 0'><font color=#ff0000>上传成功！</font>　<a href=up.php>继续上传</a></div>";
	setcookie("Temp_photonum",$Temp_photonum+1,null,"/",$Global['m_cookdomain']);  
	exit;
}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<SCRIPT LANGUAGE="JavaScript">
var img=null; 
function showtype()
{ 
var fsize=0;
if(img)img.removeNode(true); 
img=document.createElement("img"); 
img.style.position="absolute"; 
img.style.visibility="hidden"; 
document.body.insertAdjacentElement("beforeend",img); 
img.src=FORM.inp.value; 
var ftype=img.src.substring(img.src.length-4,img.src.length) 
ftype=ftype.toUpperCase();
fsize=img.fileSize;
if((ftype.indexOf('JPG',0)==-1) && (ftype.indexOf('GIF', 0)==-1))
	{ alert("Sorry!上传失败！\n\n①请选择您要上传的照片\n\n②且只能是.JPG或.GIF图片类型。");
	return false;
	}
alert("您确定要上传此文件吗？");
}
</script> 
<style type="text/css"> 
 body{font-family:宋体;font-size:9pt;background-color:transparent}
 TD{ FONT-SIZE: 9pt}
 .input{font-size:12px;color:#333;background:#F8FCF5;border:#ccc 1px solid;height:21px;font-family:Arial,宋体}
 .buttonx{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn2.gif);background-color:#FFF5E6; text-align:center; height:22px;padding:0px!important;padding-top:3px; border:1px solid #FF7E00;color:#000;}
</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" bgProperties=fixed  marginwidth="0" marginheight="0"  <?php echo $Global['m_body']; ?> scroll="no"  oncontextmenu=self.event.returnValue=false>
<form method="post" enctype="multipart/form-data" action="<?php echo $Global['my_2domain']."/up_group.php"; ?>" name="FORM" id="up" onSubmit="return showtype()">
<input name="pic" type="file" id="inp" size="60" class="input">
<input type="submit" name="image" value="上传图片" class=buttonx><input name="submitok" type="hidden" value="upload" />
</td>
</form>
</body>
</html>
<?php require_once YZLOVE."bottom.php";?>