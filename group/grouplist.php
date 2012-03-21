<?php require_once '../sub/init.php';$navvar = 3;
require_once YZLOVE.'sub/conn.php';
$t=!ereg("^[1-7]{1}$",$t)?$t=1:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>圈子 群组 朋友圈</title>
<link href="<?php echo $Global['www_2domain'];?>/css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:247px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:223px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(images/titleline.gif);margin-bottom:5px}
<?php if (!empty($kt)){ ?>
.titlenav{width:975px;padding:0 0 0 5px;height:30px;line-height:30px;margin:0px auto;margin-bottom:10px;text-align:left;color:#666;font-size:14px;background:#FCF0F5}
.titlenav span{color:#FF5494;font-weight:bold}
<?php }?>
.title .uTliPage .Sinput{width:165px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .box{float:left;width:158px;height:206px;margin:0 45px 20px 0;border:#ddd 1px solid;color:#666}
.main .marginR0{margin-right:0px}
.main .box .tt{width:158px;height:30px;font-size:14px;line-height:30px;background:#FBF9F9;overflow:hidden}
.main .box .tt a{text-decoration:none;color:#666;font-weight:bold}
.main .box .tt a:hover{text-decoration:underline;color:#DF2C91}
.main .box .tt .red{color:#f00;font-weight:bold}
.main .box .mm{width:150px;height:115px;margin:4px;background:#eee}
.main .box .mm img{width:150px;height:115px}
.main .box .bb{width:148px;height:40px;background:#FBF9F9;text-align:left;line-height:20px;padding:5px}
.main .box .bb span{color:#f00}
.main .box .bb .lan{color:#06c}
.main .box .bb .hong{color:#FF5494}
.main .page{width:980px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="grouplist.php?t=1">推荐圈子</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="grouplist.php?t=2">最新创建</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="grouplist.php?t=3">成员最多</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="grouplist.php?t=4">帖子排行</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>"><a href="grouplist.php?t=5">人气排行</a></div>
	<div class="<?php echo ($t==6)?'uTliSelect':'uTli'; ?>">搜索结果</div>
	<div class="uTliBlank">输入圈子名称(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('输入圈子名称！');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="grouplist.php" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="50"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="6" /></form>
	</div>
</div>
<div class="titleline"></div>
<?php if (!empty($kt)){ ?><div class="titlenav">圈子分类:<span><?php echo $kt; ?></span></div>
<?php }?>
<div class=clear></div>
<div class="main">
	<?php 
	switch ($t){ 
		case 2:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY id DESC";
		break;
		case 3:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY allusrnum DESC ";
		break;
		case 4:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY wznum DESC";
		break;
		case 5:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY click DESC";
		break;
		case 6:
			$k  = trimm($k);
			$tmpsubsql = " title LIKE '%".$k."%' AND ";
			$tmpsort   = " ORDER BY id DESC";
		break;
		case 7:
			$kid=intval($kid);
			$tmpsubsql = " totalid='$kid' AND ";
			$tmpsort   = " ORDER BY jjpmprice DESC";
		break;
		default:
			$tmpsubsql = "";
			$tmpsort   = " ORDER BY jjpmprice DESC";
		break;
	}
	$rt=$db->query("SELECT id,title,allusrnum,wznum,picurl_s,userid,nicknamesexgradephoto_s,jjpmprice FROM ".__TBL_GROUP_MAIN__." WHERE $tmpsubsql flag=1 $tmpsort LIMIT 500");
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/classcool.php';
		$pagesize = 15;
		if ($p<1)$p=1;
		$mypage = new zeaipage($total,$pagesize);
		$pagelist  = $mypage->pagebar();
		mysql_data_seek($rt,($p-1)*$pagesize);
		for($i=1;$i<=$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 5 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
			$nicknamesexgradephoto_s = $rows['nicknamesexgradephoto_s'];
			$tmpnickname = explode("|",$nicknamesexgradephoto_s);
			$nickname = $tmpnickname[0];
			$sex = $tmpnickname[1];
			$grade = $tmpnickname[2];
			if ($sex == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
			$id = $rows[0];
			$mainid = $id*7+8848;
			if ($rows[7] > 0){
				$href = $Global['www_2domain'].'/biddergroup'.$mainid.'.html';
			} else {
				$href = $Global['group_2domain'].'/'.$id;
			}
			$title = badstr(stripslashes($rows[1]));
			$title = gylsubstr($title,16);
			$title = htmlout($title);
			if ($t == 6 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",$title);
	?>
	<div class="box<?php echo $tmpmargin ?>">
		<div class="tt">〖<a href="<?php echo $href; ?>" target="_blank"><?php echo $title; ?></a>〗</div>
		<div class="mm">
		<a href="<?php echo $href; ?>" target="_blank">
		<?php if (!empty($rows['picurl_s'])) {?>
		<img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows[4]; ?> title="点击进入">
		<?php } else {?>
		<img src="images/noqzphoto.gif" title="点击进入">
		<?php }?></a>
		</div>
		<div class="bb">创始人:<?php echo geticon($sex.$grade)."<a href=".$Global['home_2domain']."/".$rows[5]." target=_blank><span$sexcolor>".$tmpnickname[0]."</span></a>";?><br>成员:<span><?php echo $rows[2]; ?></span>人 主题:<span><?php echo $rows[3]; ?></span>篇</div>
	</div>
	<?php }?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
	<div class=clear></div>
</div>
<?php require_once YZLOVE.'bottom.php';?>