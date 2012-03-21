<?php
require_once 'sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
$kind=!ereg("^[1-3]{1}$",$kind)?1:$kind;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2'];?><?php switch ($kind) {case 1:echo  "网站公告";break;case 2:echo  "恋爱宝典";break;case 3:echo  "婚姻法规";break;}?></title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<br />
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0" background="images/user_tbg.gif" style="border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid">
<tr>
<td align="left" style="color:#B5266D;font-size:14px;font-weight:bold;padding-left:10px;padding-top:5px"><?php switch ($kind) {case 1:echo  "网站公告";break;case 2:echo  "恋爱宝典";break;case 3:echo  "婚姻法规";break;}?></td>
</tr>
</table>
<table width="980" height="10" border="0" align="center" cellpadding="5" cellspacing="0" style="border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid"><tr><td align="right"></td>
</tr></table>
<?php
$rt=$db->query("SELECT id,title,addtime FROM ".__TBL_NEWS__." WHERE kind=$kind ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/classx.php';
$pagesize = 40;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 != 0){
?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" style="border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid">
<tr>
<?php }?>
<td align="left" style="padding-left:15px"><table width="460" height="40" border="0" cellpadding="0" cellspacing="0" style="border-bottom:#efefef 1px solid;">
<tr>
<td width="346" align="left" style="padding-left:0px;color:#cccccc;font-size:10.3pt;"><font color="#666666">·</font><a href="news<?php echo $rows['id']; ?>.html" class=666666 target=_blank><?php echo $rows['title']; ?></a></td>
<td width="114" align="right" style="color:#999999;font-size:10.3pt;"><?php echo date_format2($rows['addtime'],'%Y-%m-%d');?></td>
</tr>
</table></td>
<?php if ($i % 2 == 0) {?>
</tr>
</table>
<?php }
}//end for
?>
<table width="980" height="10" border="0" align="center" cellpadding="5" cellspacing="0" style="border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid">
<tr>
<td height="30" align="right">&nbsp;</td>
</tr>
</table>
<table width="980" height="60" border="0" align="center" cellpadding="5" cellspacing="0" style="border-top:#F1BFD4 1px solid">
<tr>
<td height="30" align="right"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php
} else { ?>
<br>
<br>
<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
<tr>
<td align=center bgcolor=#f3f3f3><font color="666666">..暂无.. </font></td>
</tr>
</table>
<br>
<br>
<?php }?>
<?php require_once YZLOVE.'bottom.php';?>