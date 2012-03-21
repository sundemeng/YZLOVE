<?php require_once '../sub/init.php';$navvar = 8;
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
<title><?php echo $Global['m_area2']; ?>播客 视频交友 自拍翻唱</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:258px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:10px 0 0 0}
.main .Vbox{float:left;width:130px;height:165px;margin:0 40px 0 0;color:#666;font-family:Verdana}
.main .Vbox:hover{background:#F0FAE9}
.main .marginR0{margin-right:0px}
.main .Vbox .pic{width:120px;height:90px;padding:4px;border:#CCE1B5 1px solid;background:#F0FAE9}
.main .Vbox .text1,.text2,.text3{width:130px;text-align:left;padding:5px 0 0 0}
.main .Vbox .text1{text-align:center}
.text1 a{text-decoration:underline;color:#DF2C91;font-weight:bold}
.text1 a:hover{color:#6F9F00}
.text2 a{text-decoration:underline;color:#666}
.text2 a:hover{color:#DF2C91}
.text2 .red{color:#f00;font-weight:bold}
.text3 span{color:#f00;font-size:11px}
.main .hr{width:980px;height:1px;margin:0px auto;font-size:0;overflow:hidden;background:#efefef;margin-top:15px;margin-bottom:15px}
.main .page{width:980px;height:20px;padding:20px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
.main .tips{color:#FF6699;width:948px;line-height:24px;padding:15px;margin:0px auto;margin-bottom:10px;border:#F4DCEE 1px solid;background:#FDF2F9}
.main .tips span{color:#FF6699;font-weight:bold}
.main .tips a{text-decoration:underline}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0)?'uTliSelect':'uTli'; ?>"><a href="./">最新视频</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">最高人气</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">美女视频</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">帅哥视频</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">推荐视频</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTliK'; ?>"><?php echo ($t==5)?'搜索结果':''; ?></div>
	<div class="uTliBlank">输入用户名/昵称(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('请输入用户名/昵称!');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="20"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="5" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<br style="line-height:0"/>
<div class="main">
	<?php 
	switch ($t){ 
		case 1:$tmpsubsql = "";$tmpsort   = " ORDER BY b.click DESC";break;
		case 2:$tmpsubsql = " a.sex=2 AND ";$tmpsort   = " ORDER BY b.id DESC";break;
		case 3:$tmpsubsql = " a.sex=1 AND ";$tmpsort   = " ORDER BY b.id DESC ";break;
		case 4:$tmpsubsql = " b.ifjh=1 AND ";$tmpsort   = " ORDER BY b.id DESC";break;
		case 5:$k  = trimm($k);$tmpsubsql = " a.nickname LIKE '%".$k."%' AND ";$tmpsort   = " ORDER BY b.id DESC";break;
		default:$tmpsubsql = "";$tmpsort   = " ORDER BY b.id DESC";break;
	}
$tmpsql = "SELECT a.nickname,a.grade,a.sex,b.id,b.userid,b.path_s,b.title,b.addtime,b.click,b.ifjh FROM ".__TBL_MAIN__." a,".__TBL_VIDEO__." b WHERE $tmpsubsql a.flag=1 AND b.flag=1 AND a.id=b.userid $tmpsort";
$rt=$db->query($tmpsql);
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/classcool.php';
		$pagesize = 24;
		if ($p<1)$p=1;
		$mypage = new zeaipage($total,$pagesize);
		$pagelist  = $mypage->pagebar();
		mysql_data_seek($rt,($p-1)*$pagesize);
		for($i=1;$i<=$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 6 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
			$nickname = $rows[0];
			$grade = $rows[1];
			$sex = $rows[2];
			$id = $rows[3];
			$userid = $rows[4];
			$path_s = $rows[5];
			$title = $rows[6];
			$addtime = $rows[7];
			$addtime = date_format2($addtime,'%m月%d日 %H:%M');
			$click = $rows[8];
			$ifjh	 = $rows[9];
			$nickname = badstr($nickname);
			$href = $Global['home_2domain']."/v$id.html";
			$title = badstr(stripslashes($rows[6]));
			$title = htmlout($title);
			$title = gylsubstr($title,16);
			$ifjh = ($ifjh==1)?"<img src=images/j.gif align=absmiddle title=推荐视频 /> ":'';
			//$Global['up_2domain']='http://up.yzlove.com/'.$Global['m_flvpath'];
			if ($t == 5 && !empty($k))$nickname = str_replace($k,"<span class=red>".$k."</span>",$nickname);
			$path_s = '<img src='.$Global['up_2domain'].'/'.$Global['m_flvpath'].'/'.$path_s.'>';
	?>
	<div class="Vbox<?php echo $tmpmargin;?>">
		<div class="pic"><a href="<?php echo $href; ?>" target="_blank"><?php echo $path_s;?></a></div>
		<div class="text1"><?php echo $ifjh; ?><a href="<?php echo $href; ?>" target="_blank"><?php echo $title;?></a></div>
		<div class="text2">网友:<?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'].'/'.$userid; ?>" target="_blank"><?php echo $nickname; ?></a></div>
		<div class="text3"><?php if (empty($t)){ ?>时间:<?php echo $addtime; ?><?php }else{?>人气:<span><?php echo $click; ?></span>次<?php }?></div>
	</div>
	<?php if ($i % 6 == 0){?>
	<div class="clear"></div>
	<div class="hr"></div>
	<?php }}?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
<div class="tips">[ <a href="../my/?d_video_record.php">我要录制视频</a> ]　　[ <a href="../my/?d_video_favorites.php">我收藏的视频</a> ]　　[ <a href="../my/?d_video_list.php">我自已的视频</a> ]</div>
</div>
<div class=clear></div>
<?php require_once YZLOVE.'bottom.php';?>
