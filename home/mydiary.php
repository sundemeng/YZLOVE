<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$uid) )callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,alltime,logincount,mbkind,mbtitle,magic,bgpic,sex,photo_s,click,ifphoto,ifbirthday,ifedu,iflove,ifpay FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount  = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该用户不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
if (empty($bgpic)) {
	$tmpbg = "images/".$mbkind."/bg.jpg";
}else{ 
	$tmpbg = $bgpic;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>的日记 博客 日志 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/mydiary.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>我的日记</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?f_diary.php?submitok=add">>>我要发表</a><?php }?></div>
		<div class="rightContent">
<?php
$rt=$db->query("SELECT id,userid,title,ifjh,click,hfnum,stime FROM ".__TBL_DIARY__." WHERE userid=".$uid." AND flag=1 AND diaryopen=1 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 15;
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
			<div class="Tdataline">
				<div class="TdatalineL">标　题</div>
				<div class="TdatalineC">回复/人气</div>
				<div class="TdatalineR">日　期</div>
			</div>
			<div class="clear"></div>

<?php 
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
			<div class="dataline">
				<div class="datalineL"><img src="images/pen.gif" align="absmiddle" /><a href="diary<?php echo $rows['id'];?>.html" target="_blank"><?php echo htmlout(stripslashes($rows['title']));?></a></div>
				<div class="datalineC"><font color="#FF0000"><?php echo $rows['hfnum'];?></font> <font color="#999999">/</font> <font color="#FF0000"> <?php echo $rows['click'];?></font></div>
				<div class="datalineR"><?php echo date_format2($rows['stime'],'%Y-%m-%d');?></div>
			</div>	
<?php }?>
<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
			<div class="nodata">...暂无日记...<br />
			  <br />
			  <a href="<?php echo $Global['my_2domain']; ?>/?f_diary.php?submitok=add" class="A9BU_tiaose"><img src="images/pen.gif" hspace="5" border="0" align="absmiddle" /><b>立即发表</b></a>			</div>
            <?php }?>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php'?>