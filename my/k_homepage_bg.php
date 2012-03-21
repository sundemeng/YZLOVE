<?php 
/**************************************************
Copyright (C) 2008 　扬州 交友网  择交友友 2.0
作  者: supdes　
**************************************************/
require_once '../sub/init.php';
$totalpage = 9;
$pagesize = 9;
$action = $_SERVER['PHP_SELF'];
$picdir = $Global['home_2domain'].'/images/bgpic/';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Yzlove.c o m图像选择器</title>
</head>
<style type="text/css"> 
body{background-color:#ffc;font-family:宋体,Arial;font-size:12px;padding:0px;margin:0px auto;color:#333;text-align:center;}
img,ul,li{margin: 0; padding: 0; border: 0; }
li{list-style-type:none;}
.clear{clear:both;height:0;width:1px;font-size:1px;visibility:hidden;} 
.main1 {margin:0px auto;text-align:center;margin-top:10px;}

.main1 ul {width:485px;display:block;padding:0 0 0 3px;}
.main1 ul li {float:left;margin:4px;display:inline;}
.main1 ul li a:link,li a:active,li a:visited {width:150px;height:110px;border:#999 1px solid;display:block;}
.main1 ul li a:hover {width:150px;height:110px;border:#f00 1px solid;display:block;filter:alpha(opacity=70);-moz-opacity:0.7;opacity:0.7;}

.pagebox {width:485px;height:30px;margin:0px auto;text-align:center;font-size:12px;padding:6px 0 0 0}
a.nextpage:link {text-decoration:none;color:#333; font-family:Arial,宋体;font-weight:bold}
a.nextpage:visited {text-decoration:none;color:#333; font-family:Arial,宋体;font-weight:bold}
a.nextpage:active {text-decoration:none;color:#333; font-family:Arial,宋体;font-weight:bold}
a.nextpage:hover {color:#f60;text-decoration:underline;font-weight:bold} 
</style>
<body>
<script language="javascript">
function dopic(str) {
parent.document.getElementById('bgpic').value= str;
parent.picshow(0);
}
</script>
<div class="main1">
<ul>
<?php
$n = 0;
for($i=1;$i<=$pagesize;$i++) {
if ($p == 1){
	$n = $n +1;
} else {
	$n = ($p-1)*$pagesize+$i;
}
if (strlen($n) == 1)$n = '00'.$n;
if (strlen($n) == 2)$n = '0'.$n;
?>
	<li><a href="###"><img src="<?php echo $picdir.$n.'_s.jpg' ?>" width="150" height="110" title="点击选择" onclick="dopic('<?php echo $picdir.$n?>'+'.jpg')" /></a></li>
<?php }?>
	<div class="clear"></div>
</ul>
</div>
<div class="pagebox">
  <table width="459" height="10" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="120" align="right" valign="bottom" style="font-weight:bold;"><a href="<?php echo $action ?>?p=<?php if ($p == 1){echo $p;}else{echo $p-1;} ?>" class="nextpage">上一页</a></td>
      <td align="center" style="color:#ccc">
	  <?php 
	  for($i=1;$i<=$totalpage;$i++) {
		echo "<a href=".$action."?p=".$i." class=nextpage>";
		if ($i == $p){
			echo "<font color=#ff0000 style='font-size:20px;'>".$i."</font>";
		} else {
			echo $i;
		}
		echo "</a>";
		if ($i !== $totalpage)echo ' | ';
	  }
	  ?></td>
      <td width="120" align="left" valign="bottom"><a href="<?php echo $action ?>?p=<?php if ($p == $totalpage){echo $p;}else{echo $p+1;} ?>" class="nextpage">下一页</a></td>
    </tr>
  </table>
</div>
</body>
</html>
<?php ob_end_flush();?>
