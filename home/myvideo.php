<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
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
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>的视频 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/myvideo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>我的视频</h4></div>
<?php
$rt=$db->query("SELECT id,path_s,title,addtime FROM ".__TBL_VIDEO__." WHERE flag=1 AND userid=".$uid." ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
	require_once YZLOVE.'sub/class.php';
	$pagesize = 12;
	if ($p<1)$p=1;
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>	
		<div class="rightContent">

<?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
?>
	<div class=frame_k <?php if ($rows['ifmain']==1)echo "style='background:#FFFF90;'";?>>
		<div class=frame_k1 ><a href="v<?php echo $rows['id']; ?>.html" target="_blank"><img src=<?php echo $Global['up_2domain']; ?>/<?php echo $Global['m_flvpath'];?>/<?php echo  $rows['path_s']; ?> alt="查看详细" width="120" height="90" border="0"></a></div>
		<div class=frame_k2 title="<?php echo  htmlout(stripslashes($rows['title'])); ?>" ><?php echo  htmlout(stripslashes($rows['title'])); ?></div>
		<div class=frame_k2><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M');?></div>
	</div>
	<?php }?>
	
		<div class="clear"></div>
		</div>
		<div class="rightContent ul2">
		<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
		</div>
<?php } else {?>
		<div class="rightContent ul2">
		  <div class="nodata">...暂无视频...<br>
		    <br>
		    <a href="<?php echo $Global['my_2domain']; ?>/?d_video_record.php" target="_blank" class="A9BU_tiaose">点此录制</a></div>
		</div>
<?php }?>
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php'?>