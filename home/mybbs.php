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
<title><?php echo $nickname;?>的圈子 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg; ?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/mygroup.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
		<?php require_once YZLOVE.'home/left_ad.html'?>
	</div>
	<div class="right">
		<div class="rightTitle"><h4>我的圈子</h4></div>
<?php
$rt=$db->query("SELECT  id,title,picurl_s,addtime FROM ".__TBL_GROUP_MAIN__." WHERE  userid=".$uid." AND flag=1 ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
?>	
		<div class="rightContent">
<?php
	for($i=1;$i<=$total;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
?>
	<div class=frame_k>
	<div class=frame_k1><font style="font-size:14px">〖<a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank" class="A9BU_tiaose"><?php echo  $rows['title']; ?></a>〗</font><br>
<?php echo $rows['addtime']; ?></div>
	<div class=frame_k2><a href="<?php echo $Global['group_2domain'];?>/<?php echo $rows['id'] ?>" target="_blank">
<?php if (empty($rows['picurl_s'])) {echo "<img src='images/noqzphoto.gif' border=0>"; }else{?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows['picurl_s']; ?> alt="放大照片" border="0"><?php }?></a></div>
	</div>
	<?php }?>
		<div class="clear"></div>
		</div>
		<div class="rightContent ul2"></div>
        <?php } else {?>
		<div class="rightContent ul2">
		  <div class="nodata">“<?php echo $nickname; ?>”暂无圈子<br />
		      <br />
	          <a href="<?php echo $Global['my_2domain']; ?>/?i_group_add.php" target="_blank" class="A9BU_tiaose">我要创建</a><br />
		  </div>
		</div>
<?php }?>
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php';?>