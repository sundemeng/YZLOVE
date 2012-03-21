<?php require_once '../sub/init.php';$navvar = 3;
require_once YZLOVE.'sub/conn.php';
$t=!ereg("^[1-5]{1}$",$t)?$t=1:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>圈子 群组 朋友圈</title>
<link href="<?php echo $Global['www_2domain']; ?>/css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:247px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:308px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:250px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .li{float:left;width:480px;height:30px;border-bottom:#efefef 1px solid;text-align:left;line-height:30px;color:#f60}
.main .li a{font-size:14px}
.main .li:hover{background:#F0FAE9}
.main .li span{color:#ccc}
.main .li .lan{color:#06c;font-size:14px}
.main .li .hong{color:#FF5494;font-size:14px}
.main .marginR20{margin:0 20px 0 0}
.main .li .li1,.li2{float:left;height:30px}
.main .li .li1{width:380px}
.main .li .li1 .red{color:#f00;font-weight:bold}
.main .li .li2{width:100px;color:#999;text-align:right}
.main .li .li2 span{color:#f00}
.main .kg{float:left;width:950px;height:20px}
.main .page{width:980px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="articlelist.php?t=1">推荐话题</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="articlelist.php?t=2">最新话题</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?> help" title="最近一个月按回复排序的帖子"><a href="articlelist.php?t=3">焦点话题</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?> help" title="最近一个月按人气排序的帖子"><a href="articlelist.php?t=4">热门话题</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>">搜索结果</div>
	<div class="uTliBlank">输入文章标题(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('请输入文章标题！');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="articlelist.php" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="50"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="5" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>

<div class="main">
	<?php
	switch ($t){ 
		case 2:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY id DESC";
		break;
		case 3:
			$tmpsubsql = "  (unix_timestamp(now()) - unix_timestamp(addtime)) < 2592000  AND ";
			$tmpsort   = " ORDER BY bbsnum DESC,id DESC";
		break;
		case 4:
			$tmpsubsql = "  (unix_timestamp(now()) - unix_timestamp(addtime)) < 2592000  AND ";
			$tmpsort   = " ORDER BY click DESC,id DESC";
		break;
		case 5:
			$k  = trimm($k);
			$tmpsubsql = " title LIKE '%".$k."%' AND ";
			$tmpsort   = " ORDER BY id DESC";
		break;
		default:
			$tmpsubsql = " ifjh=1 AND ";
			$tmpsort   = " ORDER BY id DESC";
		break;
	}
	$rt=$db->query("SELECT id,title,bbsnum,click,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_WZ__." WHERE $tmpsubsql flag=1 $tmpsort LIMIT 500");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/classcool.php';
		$pagesize = 40;
		if ($p<1)$p=1;
		$mypage = new zeaipage($total,$pagesize);
		$pagelist  = $mypage->pagebar();
		mysql_data_seek($rt,($p-1)*$pagesize);
		for($i=1;$i<=$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
			$sexcolor = $tmpnickname[1];
			if ($sexcolor == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
			if ($i % 2 !=0){$tmpmargin=' marginR20';}else{$tmpmargin='';}
			$title = badstr($rows['title']);
			$title = gylsubstr($title,38);
			if ($t == 5 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",stripslashes($title));
	?>
	<div class="li<?php echo $tmpmargin; ?>">
		<div class="li1"><img src=images/wzli.gif align="absmiddle"><a href="<?php echo $Global['group_2domain'];?>/read<?php echo $rows['id']; ?>.html" target=_blank><?php echo $title; ?></a> <span>|</span><?php echo "<a href=".$Global['home_2domain']."/".$rows[2]." target=_blank><span$sexcolor>".$tmpnickname[0]."</span></a>";?></div>
		<div class="li2">回复<span><?php echo $rows['bbsnum']; ?></span>/阅读<span><?php echo $rows['click']; ?></span></div>
	</div>
	<?php 	if ($i % 10 == 0){echo '<div class=kg></div>';}	?>
	<?php }?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
</div>
<?php require_once YZLOVE.'bottom.php';?>