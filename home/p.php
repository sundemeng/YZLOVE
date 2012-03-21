<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$fid) )callmsg("请求错误，该信息不存在或已被删除！","-1");
if ( !ereg("^[1-2]{1}$",$act) && !empty($act))callmsg("Forbidden!","-1");
require_once YZLOVE.'sub/conn.php';
if ($act == 1){
	$tmpsql = " AND b.id > $fid AND b.userid=$uid ORDER BY b.id ASC LIMIT 1 ";
} elseif ($act == 2){
	$tmpsql = " AND b.id < $fid AND b.userid=$uid ORDER BY b.id DESC LIMIT 1";
} else {
	$tmpsql = " AND b.id = $fid ";
}
$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.id as fid,b.path_b,b.title,b.addtime FROM ".__TBL_MAIN__." a,".__TBL_PHOTO__." b WHERE a.id=b.userid  AND a.flag=1 AND b.flag=1 ".$tmpsql);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$uid         = $row['id'];
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
$fid         = $row['fid'];
$path_b      = $row['path_b'];
$title       = htmlout(stripslashes($row['title']));
$addtime     = $row['addtime'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息或用户不存在或未审核或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
$rt=$db->query("SELECT MAX(id) FROM ".__TBL_PHOTO__." WHERE userid=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$maxfid = $row[0];
}
$rt=$db->query("SELECT MIN(id) FROM ".__TBL_PHOTO__." WHERE userid=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$minfid = $row[0];
}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title.' | '.$nickname;?>照片</title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/p.css" rel="stylesheet" type="text/css" />
</head>
<SCRIPT src="images/scrollpic.js" type=text/javascript></SCRIPT>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left" style="width:140px;">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
	<div class="rightTitle"><h4><?php echo $title; ?></h4><a href="myphoto<?php echo $uid; ?>.html">>>查看更多</a></div>
	<div class="rightContent ul2">
		<div class="pContent" style="padding:20px 0 0 0"><h2>照片标题：</h2><?php echo $title; ?>　　<h2>上传时间：</h2><?php echo $addtime; ?><a name="zeai"></a></div>
		<div class="pContent">
			<div class="ps">
				<div class="psC">
					<div class="psL"><?php if ($maxfid == $fid){echo '';} else { ?><a href="<?php echo '1p'.$fid.'u'.$uid.'.html'; ?>#zeai"><img src="images/prep.gif" border="0"/></a><?php }?></div>
					<div class="psM"></div>
					<div class="psR"><?php if ($minfid == $fid){echo '';} else { ?><a href="<?php echo '2p'.$fid.'u'.$uid.'.html'; ?>#zeai"><img src="images/nextp.gif" border="0"/></a><?php }?></div>
					<div class="clear"></div>
				</div>
				<div class="psC" <?php if ($minfid != $fid){ ?> onClick="window.open('<?php echo '2p'.$fid.'u'.$uid.'.html'; ?>#zeai','_self')"  style="cursor:pointer" title="点击查看下一张" <?php }?>><img src=<?php echo $Global['up_2domain'].'/photo/'.$path_b; ?> id=big /></div>
			</div>
		</div>
	</div>
<?php
$rt=$db->query("SELECT id,path_s FROM ".__TBL_PHOTO__." WHERE userid=".$uid." AND flag=1 ORDER BY id DESC LIMIT 10");
$total = $db->num_rows($rt);
if($total>0){
?>
	<div class="rightTitle" style="margin:10px 0 0 0"><h4>其他照片</h4><a href="myphoto<?php echo $uid; ?>.html">>>查看全部</a></div>
	<div class="rightContent" style="padding:15px 0 0 0">
			<div class="photoLeft" id="photoLeft"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_L.gif" width="34" height="34" border="0" title="向向翻滚" /></a></div>
			<div class="photoCenter" id="photoCenter">
				<ul>
				<?php
				for($i=1;$i<=$total;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				?>
				<li><div class="pbox"><a href="p<?php echo $rows['id']; ?>.html"><img src="<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?>" border=0 class="img"></a></div></li>
				<?php }?>
				</ul>
			</div>
			<div class="photoRight" id="photoRight"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_R.gif" width="34" height="34" border="0" title="向左翻滚" /></a></div>
			<div class="clear"></div>
	</div>
	<script language=javascript type=text/javascript>
			var scrollPic_02 = new ScrollPic();
			scrollPic_02.scrollContId   = "photoCenter";//内容容器ID
			scrollPic_02.arrLeftId      = "photoLeft";//左箭头ID
			scrollPic_02.arrRightId     = "photoRight"; //右箭头ID
			scrollPic_02.frameWidth     = 580;//显示框宽度
			scrollPic_02.pageWidth      = 116; //翻页宽度
			scrollPic_02.speed          = 20; //移动速度(单位毫秒，越小越快)
			scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
			scrollPic_02.autoPlay       = true; //自动播放
			scrollPic_02.autoPlayTime   = 1.5; //自动播放间隔时间(秒)
			scrollPic_02.initialize(); //初始化
			</script>
<?php }?>		
	<div class="rightContent ul2">
		<div class="pContent" style="text-align:center;height:60px;line-height:60px;"><input type="button"  value="关闭窗口" onClick="javascript:window.opener=null;window.close();" class="buttonx"></div>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php'?>