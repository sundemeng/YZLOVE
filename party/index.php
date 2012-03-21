<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 5;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[1-5]{1}$",$t)?1:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>网友活动聚会 万人相亲大会 交友活动俱乐部</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:332px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:223px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif);margin-bottom:5px}
.title .uTliPage .Sinput{width:165px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .Pbox{float:left;width:473px;margin:0 30px 20px 0;border:#ddd 1px solid;color:#666;text-align:left;font-family:Verdana}
.main .marginR0{margin-right:0px}
.main .Pbox .Pt{width:468px;height:30px;background:#FBF9F9;line-height:30px;font-size:14px;padding:0 0 0 5px}/* 473px */
.main .Pbox .Pt .red{color:#6F9F00;font-size:14px}
.main .Pbox .Pt .red2{color:#f00;font-size:14px;font-weight:bold}
.main .Pbox .Pt a{text-decoration:none;color:#FF0090;font-weight:bold}
.main .Pbox .Pt a:hover{text-decoration:underline;color:#6F9F00}
.main .Pbox .Pt span{color:#666;font-size:12px}
.main .Pbox .Pc{width:463px;height:105px;padding:5px}/* 473px */
.main .Pbox .Pc .PL,.main .Pbox .Pc .PR{float:left;height:105px}
.main .Pbox .Pc .PL{width:140px;margin:0 10px 0 0;line-height:105px;background:#efefef;text-align:center;overflow:hidden;color:#aaa}
.main .Pbox .Pc .PL img{width:auto !important;height:105px !important}
.main .Pbox .Pc .PR{width:310px}
.pr1,.pr2,.pr3,.pr4{width:310px;height:25px;overflow:hidden;line-height:25px}
.pr3 span{color:#f00}
.pr4{width:300px}
.pr4 .pr4l{float:left;width:225px;height:25px}
.pr4 .pr4l span{color:#f00;font-weight:bold}
.pr4 .pr4r{float:left;width:75px;text-align:right;padding:2px 0 0 0}
.main .page{width:980px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">最新活动</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">推荐活动</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">活动进行</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">活动回顾</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTliK'; ?>"><?php echo ($t==5)?'搜索结果':''; ?></div>
	<div class="uTliBlank">输入活动名称(支持模糊查询)：</div>
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
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="50"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="5" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<div class="main">
	<?php 
	switch ($t){ 
		case 2:$tmpsubsql = " ifjh=1 AND ";$tmpsort   = " ORDER BY id DESC";break;
		case 3:$tmpsubsql = " flag=2 AND ";$tmpsort   = " ORDER BY id DESC ";break;
		case 4:$tmpsubsql = " flag=3 AND ";$tmpsort   = " ORDER BY id DESC";break;
		case 5:$k  = trimm($k);$tmpsubsql = " title LIKE '%".$k."%' AND ";$tmpsort   = " ORDER BY id DESC";break;
		default:$tmpsubsql = "";$tmpsort   = " ORDER BY id DESC";break;
	}
	$rt=$db->query("SELECT id,title,hdtime,address,num_n,num_r,flag,jzbmtime,bmnum,ifjh,picurl_s FROM ".__TBL_GROUP_CLUB__." WHERE $tmpsubsql flag>0 $tmpsort");
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
			$href = $Global['group_2domain']."/partyshow$id.html";
			$title = badstr(stripslashes($rows[1]));
			$title = htmlout($title);
			if ($t == 5 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",$title);
			$hdtime = $rows[2];
			$address = stripslashes($rows[3]);
			$num_n = $rows[4];
			$num_r = $rows[5];
			$yqnum = (($num_n+$num_r) <= 0)?'不限':'<span>'.($num_n+$num_r).'</span> 人';
			$flag = $rows[6];
			switch ($flag){case 0:$flagout="未审核";break;case 1:$flagout="报名中";break;case 2:$flagout="进行中";break;case 3:$flagout="圆满成功";break;}	
			$flagout = '<span>(状态:'.$flagout.')</span>';
			$jzbmtime = $rows[7];
			$bmnum = '<span>'.$rows[8].'</span>';
			$ifjh = $rows[9];
			$ifjh = !empty($ifjh)?' <span class=red2>推荐</span>':'';
			$picurl_s = $rows[10];
			$picurl_s = empty($picurl_s)?'·暂无主照片·':'<img src='.$Global['up_2domain'].'/photo/'.$picurl_s.'>';
			$d1  = strtotime("now");
			$d2  = strtotime($jzbmtime);
			$totals  = ($d2-$d1);
			$day     = intval( $totals/86400 );
			$hour    = intval(($totals % 86400)/3600);
			$hourmod = ($totals % 86400)/3600 - $hour;
			$minute  = intval($hourmod*60);
			if ($flag >2)$totals = -1;
			if (($totals) > 0) {
				if ($day > 0){
					$outtime = "<div class=pr4l>离报名结束还有 <span class=timestyle>$day</span> 天 ";
				} else {
					$outtime = "<div class=pr4l>离报名结束还有 ";
				}
				$outtime .= "<span>$hour</span> 小时 <span>$minute</span> 分</div>";
				$outtime .= "<div class=pr4r><a href=".$Global['group_2domain']."/partyshow".$rows['id'].".html target=_blank><img src='images/bm.gif'></a></div>";
			} else {
				$outtime = "<div class=pr4l>";
				$outtime .= "</div><div class=pr4r><a href=".$Global['group_2domain']."/partyshow".$id.".html target=_blank><img src='images/detail.gif'></a></div>";
			}
	?>
	<div class="Pbox<?php echo $tmpmargin ?>">
		<div class="Pt">〖<a href="<?php echo $href; ?>" target="_blank"><?php echo $title; ?></a>〗 <?php echo $flagout; ?> <?php echo $ifjh; ?></div>
		<div class="Pc">
			<div class="PL"><?php echo $picurl_s; ?></div>
			<div class="PR">
				<div class="pr1" title="<?php echo $hdtime; ?>">时间：<?php echo $hdtime; ?></div>
				<div class="pr2">地点：<?php echo $address; ?></div>
				<div class="pr3">邀请 <?php echo $yqnum; ?>　已报名 <?php echo $bmnum; ?> 人</div>
				<div class="pr4"><?php echo $outtime; ?></div>
			</div>
		</div>
	</div>
	<?php }?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
	<div class=clear></div>
</div>
<?php require_once YZLOVE.'bottom.php';?>