<?php require_once '../sub/init.php';$navvar = 3;
require_once YZLOVE.'sub/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>圈子 朋友圈</title>
<link href="<?php echo $Global['www_2domain'];?>/css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main {width:980px;margin:0px auto;margin-top:5px;height:880px}
.main .left{float:left;width:715px;height:800px}
.main .left .title{width:715px;height:26px;margin:5px 0 0 0;background-image:url(images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.main .left .title .uTli{background-image:url(images/uTli.gif)}
.main .left .title .uTliSelect{background-image:url(images/uTliSelect.gif);color:#fff;font-weight:bold}
.main .left .title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.main .left .title .uTliSelect a:hover{color:#ff0}
.main .left .title .uTliBlank,.uTliBlank2,.uTliBlank3{float:left;height:26px;text-align:right;color:#666;font-family:Verdana}
.uTliBlank{width:195px;padding:7px 0 0 0}
.uTliBlank2{width:110px;padding:7px 0 0 0}
.uTliBlank3{width:630px}
.main .left .title .uTliPage{float:left;width:180px;height:24px;text-align:right;padding:2px 0 0 0}
.main .left .title .uTliPage .Sinput{width:120px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.help{cursor:help}
.main .left .titleline{width:715px;height:9px;font-size:0;background-image:url(images/titleline.gif)}
.main .left ul{width:715px;margin:5px 0 0 0}
.main .left ul li{float:left;width:350px;height:29px;text-align:left;border-bottom:#efefef 1px solid;line-height:29px}
.main .left ul li a{font-size:14px}

.main .left ul li span{color:#ccc}
.main .left ul .marginR5{margin:0 15px 0 0}
.main .left ul li .lan{color:#06c}
.main .left ul li .hong{color:#FF5494}
.main .left .marginT15{margin:15px 0 0 0}
.main .left .C{width:714px;padding:10px 1px 0 0}
.main .left .C .box{float:left;width:106px;height:121px;margin:0 46px 10px 0}
.main .left .C .marginR0{margin-right:0px}
.main .left .C .box .tt{width:100px;height:75px;border:#ddd 1px solid;padding:2px}
.main .left .C .box .mm{width:106px;height:15px;padding:5px 0 0 0;overflow:hidden}
.main .left .C .box .bb{width:106px;height:20px;line-height:20px;color:#999}
.main .left .C .box .tt img{width:100px;height:75px}
.main .left .C .box .bb span{color:#f00}
.main .left .C2{width:715px;margin:5px 0 0 0}
.main .left .C2 .linebox{float:left;width:143px;height:30px;line-height:30px;text-align:left;color:#999}
.main .left .C2 .linebox span{color:#f00}
.main .left .C2 .linebox a{font-size:14px}

.main .right{float:right;width:250px;height:800px}
.main .right .T{width:250px;height:32px;background-image:url(images/g_r_tbg.gif)}
.main .right .T .li1{float:left;width:76px;color:#982E00;font-weight:bold;padding:13px 0 0 9px}
.main .right .T .li2{float:left;width:65px;padding:8px 0 0 0}
.main .right .T .li3{float:left;width:91px;text-align:right;padding:8px 0 0 0}
.main .right .C {width:228px;height:294px;border-left:1px #ddd solid;border-right:1px #ddd solid;border-bottom:1px #ddd solid;padding:10px}
.main .right .margin5{margin:5px 0 0 0}
.main .right .margin10{margin:10px 0 0 0}
.main .right .height430{height:450px}
.main .right .height50{height:50px}
.main .right .C .pT{width:228px;height:26px;line-height:26px;font-size:14px;font-weight:bold;text-align:left}
.main .right .C .pT a{text-decoration:none;color:#FF0090}.main .right .C .pT a:hover{text-decoration:underline;color:#f60}
.main .right .C .pC{width:228px;height:75px;margin:0 0 10px 0}
.main .right .C .pC .left{width:100px;height:75px;margin:0 10px 0 0;background-image:url(images/nopic.gif)}
.main .right .C .pC .left img{width:100px;height:75px}
.main .right .C .pC .right{width:118px;height:75px;color:#7f7f7f;text-align:left}
.main .right .C .pC .right .tt{width:110px;height:50px;line-height:18px;border-left:#ddd 3px solid;padding:0 0 0 5px}
.main .right .C .pC .right .tt span{color:#f00;font-family:Verdana}
.main .right .C .pC .right .bb{width:118px;height:15px;padding:10px 0 0 0;text-align:right}
.main .right .C .pC .right .bb a{text-decoration:underline;color:#6F9F00}.main .right .C .pC .right a:hover{color:#f60}
.main .right .C .li{width:206px;height:30px;line-height:30px;text-align:left;background-image:url(images/dating_libg.gif);padding:0 0 0 22px}
.main .right .C .bgli{background-image:url(../images/g_p_libg.gif)}
.main .right .C .li .li1{float:left;width:173px;color:#666}
.main .right .C .li .li22{float:left;width:33px;height:25px;padding-top:5px}
.main .right .C ul{width:228px}
.main .right .C ul li{width:228px;height:26px;text-align:left;border-bottom:#efefef 1px solid;color:#999;padding:3px 0 0 0}
.main .right .C ul li a.grade{color:#FF5494}
.main .right .C ul li a.grade:hover{color:#6F9F00}
.main .right .C ul li span{color:#f00}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main">
<!-- 左侧 -->
	<div class="left">
		<div class="title">
			<div class="uTliSelect"><a href="articlelist.php?t=1">推荐话题</a></div>
			<div class="uTli"><a href="articlelist.php?t=2">最新话题</a></div>
			<div class="uTli help" title="最近一个月按回复排序的帖子"><a href="articlelist.php?t=3">焦点话题</a></div>
			<div class="uTli help" title="最近一个月按人气排序的帖子"><a href="articlelist.php?t=4">热门话题</a></div>
			<div class="uTliBlank">输入文章标题：</div>
			<div class="uTliPage"><script language="javascript">
			function chk1(){
				if(document.yzloveform1.k.value==""){
				alert('请输入文章标题！');
				document.yzloveform1.k.focus();
				return false;
				}
			}
			function chk2(){
				if(document.yzloveform2.k.value==""){
				alert('请输入圈子名称！');
				document.yzloveform2.k.focus();
				return false;
				}
			}
			</script><form action="articlelist.php" method="get" name="yzloveform1" onsubmit="return chk1()"><input type="hidden" name="t" value="5" /><input name="k" type="text" class="Sinput" id="k" maxlength="50"><input type="image" src="../images/sox.gif" align=absmiddle /></form></div>
		</div>
		<div class="titleline"></div>
		<div class="clear"></div>
		<ul>
			<?php
			$rt=$db->query("SELECT id,title,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_WZ__." WHERE ifjh=1 AND flag=1 ORDER BY id DESC LIMIT 20");
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
					$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
					$sexcolor = $tmpnickname[1];
					if ($sexcolor == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
					if ($i % 2 !=0){$tmpmargin=' class=marginR5';}else{$tmpmargin='';}
			?>
			<li<?php echo $tmpmargin; ?>><img src=images/wzli.gif align="absmiddle"><a href="<?php echo $Global['group_2domain'];?>/read<?php echo $rows['id']; ?>.html" target=_blank><?php echo gylsubstr(htmlout(stripslashes(badstr($rows['title']))),36); ?></a> <span>|</span><?php echo "<a href=".$Global['home_2domain']."/".$rows[2]." target=_blank><span$sexcolor>".$tmpnickname[0]."</span></a>";?></li>
			<?php }}?>
		</ul>
		<div class="clear"></div>
		<div class="title marginT15">
			<div class="uTliSelect" title="只显示有照片的圈子"><a href="grouplist.php?t=1">推荐圈子</a></div>
			<div class="uTli"><a href="grouplist.php?t=2">最新创建</a></div>
			<div class="uTli"><a href="grouplist.php?t=3">成员最多</a></div>
			<div class="uTli"><a href="grouplist.php?t=4">帖子排行</a></div>
			<div class="uTli"><a href="grouplist.php?t=5">人气排行</a></div>
			<div class="uTliBlank2">输入圈子名称：</div>
			<div class="uTliPage"><form action="grouplist.php" method="get" name=yzloveform2 onsubmit="return chk2()"><input name="k" type="text" class="Sinput" id="k" maxlength="50"><input type="hidden" name="t" value="6" /><input type="image" src="../images/sox.gif" align=absmiddle /></form></div>
		</div>
		<div class="titleline"></div>
		<div class="clear"></div>
		<div class="C">
			<?php 
			$rt=$db->query("SELECT id,title,allusrnum,picurl_s,jjpmprice FROM ".__TBL_GROUP_MAIN__." WHERE qloveb>=jjpmprice AND flag=1 AND picurl_s<>'' ORDER BY jjpmprice DESC,px DESC LIMIT 10");
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
					if ($i % 5 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
					$id = $rows[0];
					$mainid = $id*7+8848;
					if ($rows[4] > 0){
						$href = $Global['www_2domain'].'/biddergroup'.$mainid.'.html';
					} else {
						$href = $Global['group_2domain'].'/'.$id;
					}
			?>
			<div class="box<?php echo $tmpmargin ?>">
				<div class="tt"><a href="<?php echo $href; ?>" target="_blank"><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows[3]; ?> title="点击进入"></a></div>
				<div class="mm"><a href="<?php echo $href;?>" target="_blank"><?php echo htmlout(stripslashes($rows[1])); ?></a></div>
				<div class="bb">成员数:<span><?php echo $rows[2]; ?></span>人</div>
			</div>
		<?php }}?>
		</div>
		<div class="clear"></div>
		<div class="title">
			<div class="uTliSelect">圈子分类</div>
			<div class="uTliBlank3"></div>
		</div>
		<div class="titleline"></div>
		<div class="C2">
			<?php 
			$rt=$db->query("SELECT id,title,bknum FROM ".__TBL_GROUP_TOTAL__." WHERE flag=1 ORDER BY px DESC");
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
			?>
			<div class="linebox"><img src="images/dot.gif" align="absmiddle" /><a href="grouplist.php?t=7&kid=<?php echo $rows[0]; ?>&kt=<?php echo $rows[1]; ?>"><?php echo $rows['title']; ?></a>(<span><?php echo $rows['bknum']; ?></span>)</div>
			
			<?php }}?>
		</div>
	</div>
	<!-- 右侧 -->
	<div class="right">
		<div class="T margin5">
			<div class="li1">最新活动</div>
			<div class="li2"></div>
			<div class="li3"><a href="<?php echo $Global['www_2domain'];?>/party"><img src="../images/g_r_more.gif" border="0" /></a></div>
		</div>
		<div class="C">
			<?php 
			$rt=$db->query("SELECT id,title,kind,num_n,num_r,bmnum,picurl_s FROM ".__TBL_GROUP_CLUB__." WHERE flag>0 ORDER BY ifjh DESC,id DESC LIMIT 7");
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				$rows = $db->fetch_array($rt);
			?>
			<div class="pT"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><?php echo $rows[1]; ?></a></div>
			<div class="pC">
				<div class="left"><?php if (!empty($rows[6])){ ?><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><img src="<?php echo $Global['up_2domain'];?>/photo/<?php echo  $rows[6]; ?>" /></a><?php }?></div>
				<div class="right">
					<div class="tt">
						邀　请：<span><?php echo $rows[3]+$rows[4]; ?></span> 人<br /> 
						已报名：<span><?php echo $rows[5]; ?></span> 人<br />
						主　题：<?php echo $rows[2]; ?><br /> 
				  </div>
				  <div class="bb"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><img src="images/Pd.gif" hspace="5" align="absmiddle" />详细活动信息</a></div>
				</div>
			</div>
			<?php 
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
			?>
				<div class="li bgli"><div class="li1"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows[0]; ?>.html" target="_blank"><?php echo gylsubstr(htmlout(stripslashes($rows[1])),28);?></a></div>
				<div class="li22"><a href="<?php echo $Global['group_2domain'];?>/partyshow<?php echo $rows['id']; ?>.html" target="_blank"><img src="../images/g_detail.gif" /></a></div>
				</div>
			<?php }}?>
		</div>
		

		<div class="T margin10">
			<div class="li1">圈子榜</div>
			<div class="li2"><a href="<?php echo $Global['my_2domain'];?>/?e_dating_add.php"></a></div>
			<div class="li3"><a href="grouplist.php?t=1"><img src="../images/g_r_more.gif" border="0" /></a></div>
		</div>
		<div class="C height430">
			<ul>
			<?php 
			$rt=$db->query("SELECT id,title,qgrade,allusrnum,jjpmprice FROM ".__TBL_GROUP_MAIN__." WHERE flag=1 ORDER BY jjpmprice DESC,id DESC LIMIT 15");
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
					$id = $rows[0];
					$mainid = $id*7+8848;
					if ($rows[4] > 0){
						$href = $Global['www_2domain'].'/biddergroup'.$mainid.'.html';
					} else {
						$href = $Global['group_2domain'].'/'.$id;
					}
			?>
			<li><img src="../images/groupico.gif" align="absmiddle" /> <a href=<?php echo $href; ?> target=_blank<?php if ($rows[2] > 3)echo ' class=grade';?>><?php echo $rows[1]; ?></a>(<?php for($i=1;$i<=$rows[2];$i++) {echo "<image src=images/xx.gif align=absmiddle>";}for($i=1;$i<=(5-$rows[2]);$i++) {echo "<image src=images/hhxx.gif align=absmiddle>";}?>)(<span><?php echo $rows[3]; ?></span>人)</li>
			<?php }}?>
			</ul>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php require_once YZLOVE.'bottom.php';?>
