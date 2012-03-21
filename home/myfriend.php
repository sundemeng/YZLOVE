<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid) )callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
if ( !ereg("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade) )callmsg("请先登录！",$Global['www_2domain']."/login.php");
if ($cook_grade <= 1)callmsg("只有高级会员才能查看！",$Global['my_2domain']."/?k_vip.php");
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
<title><?php echo $nickname;?>的朋友 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/myfriend.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>我的朋友</h4></div>
<?php
$rt=$db->query("SELECT b.id as senduserid,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_FRIEND__." a , ".__TBL_MAIN__." b  WHERE  a.userid=".$uid." AND a.senduserid=b.id AND a.ifhmd=0 AND a.ifagree=1 ORDER BY a.id DESC");
$total = $db->num_rows($rt);
if($total>0){
	require_once YZLOVE.'sub/class.php';
	$pagesize = 36;
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
	<div class=frame_k>
	<div class=frame_k1>
<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $rows['senduserid']; ?>" target=_blank>
<?php if (empty($rows['photo_s'])){?><img src=<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $rows['sex']; ?>.gif border=0 alt="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $rows['photo_s']; ?> width="65" height="80" border=0 alt="<?php echo $rows['nickname'].'的照片'; ?>"><?php }?>
</a></div>
	<div class=frame_k2><?php echo  htmlout(stripslashes($rows['nickname'])); ?></div>
	</div>
	<?php }?>
		<div class="clear"></div>
		</div>
		<div class="rightContent ul2">
		<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
		</div>
<?php } else {?>
		<div class="rightContent">
		  <div class="nodata">“<?php echo $nickname; ?>”暂无朋友<br />
		      <br />
	          <a href="<?php echo $Global['my_2domain']; ?>/super.php?submitok=friend&uid=<?php echo $uid; ?>&g=<?php echo $grade; ?>" target="_blank"><img src="images/friend.gif" border="0" /></a><br />
		  </div>
		</div>
<?php }?>
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php';?>