<?php require_once '../sub/init.php';$navvar = 7;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$t=!preg_match("^[0-2]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>交友网 聊天</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:482px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliBlank span{color:#f00}
.title .uTliPage{float:left;width:158px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif);margin-bottom:5px}
.title .uTliPage .Sinput{width:100px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}

.title .uTliPage .Pl{float:left}
.title .uTliPage .Pr{float:right}

.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .box{float:left;width:222px;height:80px;padding:3px;border:#f7e4ed 1px solid;margin:0 20px 20px 0;background:#fff9fb;}/* ;background:#FFF5F9;border:#FAEBF2 1px solid; */
.main .marginR0{margin-right:0px}
.main .box .L{float:left;width:65px;height:80px;background:#ccc}
.main .box .L img{width:65px;height:80px}
.main .box .R{float:right;width:147px;height:80px;text-align:left}
.main .box .R .tt{width:142px;height:20px;color:#999;padding:5px 0 0 0}
.main .box .R .tt span{color:#f00}
.main .box .R .tt a{text-decoration:underline;font-weight:bold}
.main .box .R .mm{width:145px;height:25px;color:#7e7e7e;line-height:20px;text-align:center}
.main .box .R .bb{width:142px;height:30px;text-align:center}

.main .page{width:980px;height:20px;padding:10px 0 0 0;margin:0px auto;margin-bottom:30px;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
.main .tips{width:948px;height:45px;line-height:24px;padding:15px;margin:0px auto;margin-bottom:10px;border:#F4DCEE 1px solid;background:#FDF2F9}
.main .tips span{color:#FF6699;font-weight:bold}
.main .tips a{text-decoration:underline}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<?php 
$tmpsubsql = '';
$tmpsubsql .= preg_match("^[1-2]{1}$",$t)?"a.sex=$t AND ":'';
$tmpsql = "SELECT a.id,a.nickname,a.grade,a.sex,a.photo_s,a.birthday,a.love,a.kind,a.ifphoto,a.ifbirthday,a.ifedu,a.iflove,a.ifpay FROM ".__TBL_MAIN__." a,".__TBL_ONLINE__." b WHERE $tmpsubsql a.flag=1 AND a.id=b.userid AND b.rnd=0 AND b.stealth=0 ORDER BY b.p DESC,b.g DESC,b.actiontime DESC";
$rt=$db->query($tmpsql);
$total = $db->num_rows($rt);
if ($total > 0){
	require_once YZLOVE.'sub/fundata.php';
	$data = new yzlove_data;
	require_once YZLOVE.'sub/classcool.php';
	$total = $db->num_rows($rt);
	$pagesize = 24;
	if ($p<1)$p=1;
	$mypage = new zeaipage($total,$pagesize);
	$pagelistX = $mypage->pagebar(2);
	$pagelist  = $mypage->pagebar();
	mysql_data_seek($rt,($p-1)*$pagesize);
}?>
<div class="title">
	<div class="<?php echo ($t==0)?'uTliSelect':'uTli'; ?>"><a href="online.php?t=0">在线会员</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="online.php?t=1">在线帅哥</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="online.php?t=2">在线美女</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTliK'; ?>"></div>
	<div class="uTliBlank">当前在线 <span><?php $online->num(); ?></span> 人 (游客和隐身会员不显示)</div>
	<div class="uTliPage"><div class="Pl"></div><div class="Pr"><?php echo $pagelistX; ?></div></div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<div class="main">
<?php
if ($total > 0){
	for($i=1;$i<=$pagesize;$i++) {
		$rows = $db->fetch_array($rt);
		if(!$rows) break;
		if ($i % 4 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
		$id = $rows['id'];
		$nickname = $rows['nickname'];
		$grade = $rows['grade'];
		$sex = $rows['sex'];
		$birthday = $rows['birthday'];
		$love = $rows['love'];
		$kind = $rows['kind'];
		$photo_s = $rows['photo_s'];
		$ifphoto = $rows['ifphoto'];
		$ifbirthday = $rows['ifbirthday'];
		$ifedu = $rows['ifedu'];
		$iflove = $rows['iflove'];
		$ifpay = $rows['ifpay'];
		$tmpx = 0;
		if ($ifphoto == 1)$tmpx = $tmpx+1;
		if ($ifbirthday == 1)$tmpx = $tmpx+1;
		if ($ifedu == 1)$tmpx = $tmpx+1;
		if ($iflove == 1)$tmpx = $tmpx+1;
		if ($ifpay == 1)$tmpx = $tmpx+1;
			?>
			<div class="box<?php echo $tmpmargin ?>">
				<div class="L"><a href=<?php echo $Global['home_2domain'].'/'.$id;?> target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> title="<?php echo $nickname.'的照片'; ?>"><?php }?></a></div>
				<div class="R">
				<div class="tt"><?php geticon($sex.$grade);echo '<a href='.$Global['home_2domain'].'/'.$id.' target=_blank>'.badstr($nickname).'</a> ';
if ($tmpx > 0)echo '(';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=../images/sfz_x.gif align=absmiddle vspace=5 title='实名认证星级：当前".$tmpx."星，共5星'>";
}echo '</a>';if ($tmpx > 0)echo ')';
?></div>
				<div class="mm"><?php echo $data->getbirthday($birthday); ?>,<?php echo $data->getloveX($love);?>,<?php echo $data->getkind($kind);?></div>
				<div class="bb" title="点击开始聊天">
				<?php if ( !preg_match("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade)) {
				echo "<a href=../login.php><img src=../images/gbook.gif /></a>　 <a href=../login.php><img src=../images/chat.gif /></a>";
				} else {
				echo "<a href=".$Global['chat_2domain']."/chksend".$id.".html target='_blank'><img src=../images/chat.gif /></a>　 ";
				echo "<a href=".$Global['my_2domain']."/?b_gbook.php?submitok=add&memberid=".$id."&membernickname=".$nickname."&g=".$cook_grade." target='_blank'><img src=../images/gbook.gif /></a>";
				}?>
				</div>
				</div>
			</div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php } else {echo '<h6>暂无信息</h6>';}?>
	<div class=clear></div>
	<div class="tips">
<img src="../images/tips.gif" hspace="5" align="absmiddle" />只显示前在线会员，游客和隐身会员不显示，排序规则：<span>有照片(形象照)</span> -> <span>会员等级</span> -> <span>活跃程度</span><br>
我要：　 <a href="../my/?c_photo_up.php">上传照片</a>　　<a href="../my/?c_photo_dtt.php">在线拍照</a>　　<a href="../my/?c_photo_main.php">更新形象照</a>　　<a href="../my/?k_vip.php">升级会员</a></div>
	<div class=clear></div>
</div>
<?php
$online->chk();
$db->query("DELETE FROM ".__TBL_CHATIF__." WHERE (UNIX_TIMESTAMP()-addtime)>60");
require_once YZLOVE.'bottom.php';?>