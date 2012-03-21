<?php require_once '../sub/init.php';$navvar = 4;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[1-6]{1}$",$t)?1:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>爱情诊所 网友求助</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:343px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .left{float:left;width:732px;padding:5px;border:#ccc 1px solid}/* 744px */
.main .center{float:left;width:24px;height:440px;background-image:url(images/centerbg.gif);background-repeat:no-repeat}/* 24px */
.main .right{float:left;width:200px;height:440px;padding:5px;border:#ccc 1px solid}/* 212px */
.main .right .rbox{width:200px;height:440px;background-image:url(images/rightbg.gif);color:#666}

.main .right .rbox .t{width:170px;height:120px;padding:15px 15px 10px 15px;font-size:14px;text-align:left;color:#FF3399;line-height:32px}
.main .right .rbox .m{width:200px;height:30px;padding:15px 0 0 0}
.main .right .rbox .p{width:200px;height:45px;padding:0 0 0 0}
.main .right .rbox .b{width:175px;height:195px;padding:0 5px 5px 20px;text-align:left;line-height:20px}
.main .right .rbox .m a{text-decoration:underline;color:#f00;font-family:Verdana;font-size:11px}
.main .right .rbox .m a:hover{color:#6F9F00}
.main .right .rbox .b .sp1{color:#f60;font-size:14px;font-weight:bold;line-height:28px}
.main .right .rbox .b .sp2{color:#FF3399}

/* .main .left .bnrbox{width:732px;height:110px} */
.main .left .ul{width:710px;height:36px;border-bottom:#efefef 1px solid;color:#999;margin:0px auto}
.li1,.li2,.li3,.li4,.li5,.li6{float:left;height:36px}
.main .left .ul .li1{width:24px;height:30px;padding:6px 0 0 0}
.main .left .ul .li2{width:311px;height:25px;padding:11px 0 0 10px;text-align:left}
.main .left .ul .li3{width:70px;line-height:36px}
.main .left .ul .li4{width:70px;height:26px;padding:10px 0 0 0}
.main .left .ul .li5{width:120px;height:26px;padding:10px 0 0 0}
.main .left .ul .li6{width:105px;height:25px;padding:11px 0 0 0;}
.main .left .ul .li2 a{font-size:14px}
.main .left .ul:hover{background:#F0FAE9}
.main .left .ul span{color:#f00;font-family:Verdana;font-size:11px}
.main .left .ul .li5 .lan{color:#06c;font-family:Verdana,宋体;font-size:12px}
.main .left .ul .li5 .hong{color:#FF5494;font-family:Verdana,宋体;font-size:12px}
.main .left .ul .li2 .red{color:#f00;font-weight:bold;font-family:Verdana,宋体;font-size:14px}
.main .left .ul .titlee{padding:0px;line-height:36px;color:#666;text-align:center}
.main .left .ul .paddingL10{padding-left:10px}

.main .left .page{width:710px;height:20px;padding:20px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">最新病历</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">推荐病历</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">待解决</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">已解决</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>"><a href="./?t=5">最高悬赏</a></div>
	<div class="uTliBlank">输入求助名称(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('请输入求助名称！');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="20"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="6" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<br style="line-height:0"/>
<div class="main">
	<div class="left">
		<img src="images/bnr.jpg" />
		<div class="ul">
			<div class="li1"></div>
			<div class="li2 titlee paddingL10">病　历　名　称</div>
			<div class="li3 titlee">处方 / 点击</div>
			<div class="li4 titlee">状　态</div>
			<div class="li5 titlee">求 助 人</div>
			<div class="li6 titlee">悬　赏</div>
		</div>
		<?php
		switch ($t){ 
			case 2:
				$tmpsubsql = " a.ifjh=1 AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			case 3:
				$tmpsubsql = " a.flag=1 AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			case 4:
				$tmpsubsql = " a.flag=2 AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			case 5:
				$tmpsubsql = " a.flag=1 AND ";
				$tmpsort   = " ORDER BY a.xsloveb DESC";
			break;
			case 6:
				$k  = trimm($k);
				$tmpsubsql = " a.title LIKE '%".$k."%' AND ";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
			default:
				$tmpsubsql = "";
				$tmpsort   = " ORDER BY a.id DESC";
			break;
		}
		$rt=$db->query("SELECT a.id,a.userid,a.title,a.xsloveb,a.click,a.hfnum,a.flag,a.ifopen,a.ifjh,b.nickname,b.grade,b.sex FROM ".__TBL_ASK__." a,".__TBL_MAIN__." b WHERE $tmpsubsql a.flag>0 AND a.userid=b.id AND b.flag=1 $tmpsort");
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
				$id = $rows['id'];
				$sex = $rows['sex'];
				if ($sex == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
				$title = badstr($rows['title']);
				$title = gylsubstr($title,40);
				if ($t == 6 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",stripslashes($title));
				$userid = $rows['userid'];
				$xsloveb = $rows['xsloveb'];
				$click = $rows['click'];
				$hfnum = $rows['hfnum'];
				$flag = $rows['flag'];
				$ifopen = $rows['ifopen'];
				$ifjh = $rows['ifjh'];
				$grade = $rows['grade'];
				if ($ifopen == 0){
					$title    = "<a href=detail$id.html target=_blank>".$title.'</a> <img src=images/m.gif title=匿名求助 />';
					$nickname = '匿名求助';
				} else {
					$title    = "<a href=".$Global['home_2domain']."/ask$id.html target=_blank>".$title.'</a>';
					$nickname = "<a href=".$Global['home_2domain']."/$userid target=_blank><span$sexcolor>".badstr($rows['nickname'])."</span></a>";
				}
				if ($ifjh==1)$title=$title." <img src=images/j.gif align=absmiddle title=推荐病历 />";
				switch ($flag){ 
				case 1:$flag = "<img src=images/56.gif>";break;
				case 2:$flag = "<img src=images/57.gif>";break;
				case 3:$flag = "<img src=images/58.gif>";break;
				case 4:$flag = "<img src=images/59.gif>";break;
				case 5:$flag = "<img src=images/60.gif>";break;
				}
				$xsloveb = "悬赏<span>$xsloveb</span><img src=images/loveb_x.gif title=悬赏love币:$xsloveb />";
		?>
		<div class="ul">
			<div class="li1"><img src="images/li.gif" /></div>
			<div class="li2"><?php echo $title; ?></div>
			<div class="li3"><span><?php echo $hfnum; ?></span> / <span><?php echo $click; ?></span></div>
			<div class="li4"><?php echo $flag; ?></div>
			<div class="li5"><?php if ($ifopen == 1)geticon($sex.$grade);?><?php echo $nickname; ?></div>
			<div class="li6"><?php echo $xsloveb; ?></div>
		</div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php }?>
	</div>
	<div class="center"></div>
	<div class="right">
		<div class="rbox">
			<div class="t">　当恋爱闪起了讯号，当爱情拉响了警报，快乐的，不快乐的，爱情诊所一一听诊营业，24小时全天侯服务！</div>
			<div class="m">已解决:<a href=./?t=4 title="点击查看已解决的求助，在左侧显示"><?php $rt = $db->query("SELECT COUNT(*) FROM ".__TBL_ASK__." WHERE flag=2");
		$row = $db->fetch_array($rt);
		$tmpcount = $row[0];
		echo $tmpcount;?></a>个　待解决:<a href=./?t=3 title="点击查看待解决的求助，在左侧显示"><?php $rt = $db->query("SELECT COUNT(*) FROM ".__TBL_ASK__." WHERE flag=1");
		$row = $db->fetch_array($rt);
		$tmpcount = $row[0];
		echo $tmpcount;?></a>个</div>
			<div class="p"><a href="../my/?h_ask.php?submitok=add"><img src="images/fb.gif" border="0" /></a></div>
			<div class="b"><span class="sp1">主 治：</span><br /><span class="sp2">1. 外　科</span><br />　  诊治爱情引起的外在伤痛<br /><span class="sp2">2. 内　科</span><br />　  诊治爱情引起的内在伤痛<br /><span class="sp2">3. 复建科</span><br />　  爱情伤痛后的身心重建工程<br /><span class="sp2">4. 保健科</span><br />　  爱情健康检查 
			</div>
		</div>
	</div>
</div>
<div class=clear></div>
<br style="line-height:1"/>
<div class=clear></div>
<?php require_once YZLOVE.'bottom.php';?>
