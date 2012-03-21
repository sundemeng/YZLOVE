<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 12;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[0-5]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>爱情故事 成功故事 恋爱故事</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:277px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:183px;height:23px;text-align:right;padding:3px 10px 0 0}
.title .uTliPage a{text-decoration:underline;font-weight:bold}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif);margin-bottom:5px}
.title .uTliPage .Sinput{width:165px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .Pbox{float:left;width:473px;margin:0 30px 20px 0;border:#F7E4ED 1px solid;color:#666;text-align:left;font-family:Verdana}
.main .marginR0{margin-right:0px}
.main .Pbox .Pc{width:463px;height:105px;padding:5px}/* 473px */
.main .Pbox .Pc .PL,.main .Pbox .Pc .PR{float:left;height:105px}
.main .Pbox .Pc .PL{width:140px;margin:0 10px 0 0;line-height:105px;background:#ffeef2;text-align:center;overflow:hidden;color:#F18DB0}
.main .Pbox .Pc .PL img{width:auto !important;height:105px !important}
.main .Pbox .Pc .PR{width:310px}
.pr1,.pr2,.pr3{width:310px;height:25px;overflow:hidden;text-align:center}
.pr1{font-size:14px;color:#333;height:30px;line-height:30px;padding:10px 0 0 0}
.pr1 a{font-weight:bold;color:#DF2C91}
.pr1 a:hover{color:#FF6C96}
.pr2{height:25px;padding:5px 0 0 0}
.pr3 span{color:#FF40BF;font-size:12px}
.main .Pbox .Pb{width:453px;height:40px;background:#FFF9FB;color:#666;line-height:20px;font-size:12px;padding:8px 10px 5px 10px}/* 473px */
.main .Pbox .Pb span{color:#f00;font-size:11px}
.main .Pbox .Pb em{color:#888}
.main .Pbox .Pb a{color:#444;text-decoration:underline}
.main .Pbox .Pb a:hover{color:#DF2C91}


.main .page{width:980px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
.main .tips{width:918px;line-height:24px;padding:15px 30px 15px 30px;margin:0px auto;margin-bottom:10px;border:#F4DCEE 1px solid;background:#FDF2F9;font-family:Verdana;text-align:left;color:#FF6C96}
.main .tips span{color:#FF6699;font-weight:bold}
.main .tips .red{color:#f00;font-weight:normal}
.main .tips a{text-decoration:underline;font-weight:bold}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0)?'uTliSelect':'uTli'; ?>"><a href="./?t=0">成功故事</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">我们约会了</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">我们恋爱了</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">我们热恋了</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">我们订婚了</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>"><a href="./?t=5">我们结婚了</a></div>
	<div class="uTliBlank">品尝爱情的甜蜜，回味寻爱的旅程……</div>
	<div class="uTliPage"><img src="images/jt.gif" hspace="5" align="absmiddle" /><a href="/my/?g_story.php?submitok=add">上传我的成功故事</a></div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<div class="main">
	<?php 
	switch ($t){ 
		case 1:$tmpsubsql = " sussflag=1 AND ";$tmpsort   = " ORDER BY id DESC";break;
		case 2:$tmpsubsql = " sussflag=2 AND ";$tmpsort   = " ORDER BY id DESC";break;
		case 3:$tmpsubsql = " sussflag=3 AND ";$tmpsort   = " ORDER BY id DESC ";break;
		case 4:$tmpsubsql = " sussflag=4 AND ";$tmpsort   = " ORDER BY id DESC";break;
		case 5:$tmpsubsql = " sussflag=5 AND ";$tmpsort   = " ORDER BY id DESC";break;
		default:$tmpsubsql = "";$tmpsort   = " ORDER BY id DESC";break;
	}
	$rt=$db->query("SELECT id,nicknamesexgradephoto_s,nicknamesexgradephoto_s2,sussflag,title,content,addtime,bbsnum,picurl_s FROM ".__TBL_STORY__." WHERE $tmpsubsql flag>0 $tmpsort");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/classcool.php';
		$pagesize = 10;
		if ($p<1)$p=1;
		$mypage = new zeaipage($total,$pagesize);
		$pagelist  = $mypage->pagebar();
		mysql_data_seek($rt,($p-1)*$pagesize);
		for($i=1;$i<=$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
			$id = $rows[0];
			$nicknamesexgradephoto_s = $rows[1];
			$tmpnickname = explode("|",$nicknamesexgradephoto_s);
			$nickname = $tmpnickname[0];
			$sex = $tmpnickname[1];
			$nicknamesexgradephoto_s2 = $rows[2];
			$tmpnickname2 = explode("|",$nicknamesexgradephoto_s2);
			$nickname2 = $tmpnickname2[0];
			$sex2 = $tmpnickname2[1];
			$sussflag = $rows[3];
			$title    = htmlout(stripslashes($rows[4]));
			$content  = $rows[5];
			$addtime  = $rows[6];
			$bbsnum   = $rows[7];
			$picurl_s = $rows[8];
			switch ($sussflag){case 1:$flagout="我们约会了";break;case 2:$flagout="我们恋爱了";break;case 3:$flagout="我们热恋了";break;case 4:$flagout="我们订婚了";break;case 5:$flagout="我们结婚了";break;}	
			$href = "detail$id.html";
			//$Global['up_2domain'] = 'http://up.yzlove.com';
			$picurl_s = empty($picurl_s)?'·暂无照片·':'<img src='.$Global['up_2domain'].'/photo/'.$picurl_s.'>';
	?>
	<div class="Pbox<?php echo $tmpmargin ?>">
		<div class="Pc">
			<div class="PL"><a href="<?php echo $href; ?>" target="_blank"><?php echo $picurl_s; ?></a></div>
			<div class="PR">
				<div class="pr1">〖<span><a href="<?php echo $href; ?>" target="_blank"><?php echo $title; ?></a></span>〗</div>
				<div class="pr2"><?php echo date_format2($addtime,'%Y年%m月%d日');?> 　<?php echo $flagout; ?></div>
				<div class="pr3"><span><?php echo $nickname;?></span><img src="images/x.gif" hspace="8" /><span><?php echo $nickname2;?></span></div>
			</div>
		</div>
		<div class="Pb">　<?php echo htmlout(str_replace("\r\n","",gylsubstr(stripslashes($content),110)));?>……　　<em>收到<span><?php echo $bbsnum; ?></span>个祝福，<a href="<?php echo $href; ?>" target="_blank">我要祝福</a></em></div>
		
	</div>
	<?php }?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
<div class="tips">　　记录你们在<?php echo $Global['m_sitename']; ?>相识相知相爱的每一行足迹，为人生增添一抹最亮的色彩！用您的成功去鼓舞更多仍在寻觅的朋友，让大家一起见证你们的爱情！ 品尝爱情的甜蜜，回味寻爱的旅程。<?php echo $Global['m_sitename']; ?>期待您分享幸福、传递幸福。　　　　　<img src="images/up.gif" hspace="5" align="absmiddle" /><a href="/my/?g_story.php?submitok=add">上传我的成功故事</a></div>
	<div class=clear></div>
</div>
<?php require_once YZLOVE.'bottom.php';?>