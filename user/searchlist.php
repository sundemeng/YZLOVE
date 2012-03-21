<?php require_once '../sub/init.php';
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
if ($t != 2){
if ($t == 1 && !empty($k)){
	if ($cook_grade < 1)callmsg("只有本站会员才能搜索!","../login.php");
} else {
	if ($cook_grade < 1)callmsg("只有本站会员才能搜索!","../login.php");
	if ( (!empty($heigh1) || !empty($weigh1) || !empty($edu) || !empty($pay)) && $cook_grade < 2 )callmsg("只有高级会员才享有此功能!","../my/?k_vip.php");
}}
$navvar = 11;
require_once YZLOVE.'sub/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?> 会员搜索结果</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main {width:980px;margin:0px auto;margin-top:5px}/* ;height:950px; */
.main .left{float:left;width:715px;}/* height:950px */
.main .left .title{width:715px;height:26px;margin:5px 0 0 0;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;height:18px;padding:8px 0 0 0;margin:0 2px 0 0}
.main .left .title .uTliSelect{width:80px;background-image:url(../images/uTliSelect.gif);font-weight:bold;color:#fff}
.main .left .title .uTli{width:350px;color:#999}
.main .left .title .uTliBlank{float:left;width:20px;height:26px;line-height:26px;color:#999}
.main .left .title .uTli a{text-decoration:underline;color:#DF2C91}
.main .left .title .uTli a:hover{color:#444}
.main .left .title .uTliPage{float:left;width:261px;height:26px;text-align:right}
.main .left .title .uTliPage .Pl{float:left}
.main .left .title .uTliPage .Pr{float:right}
.main .left .titleline{width:715px;height:9px;font-size:0;background-image:url(../images/titleline.gif);margin:0 0 10px 0}
.main .left .box{float:left;width:338px;height:135px;padding:6px;background:#fef7fa;margin-bottom:15px;background-image:url(../images/ulistbg.gif);text-align:left}
.main .left .margin_R{margin-right:15px}
.LL,.RR{float:left;height:135px}
.main .left .box .LL{width:110px;margin:0 10px 0 0;background:#F6DDE8}
.main .left .box .RR{width:218px;font-family:Verdana}
.main .left .box .RR .tt{width:218px;height:23px;border-bottom:#F6DDE8 1px solid;color:#999}
.main .left .box .RR .mm{width:213px;height:82px;line-height:18px;padding:5px 5px 0 0;color:#7e7e7e}
.main .left .box .RR .bb{width:203px;height:24px;padding:0 10px 0 0;text-align:right;color:#999}
.main .left .box .RR .bb a{text-decoration:none;color:#FF5494}
.main .left .box .RR .bb a:hover{color:#DF2C91}
.main .left .box .RR .tt a{font-weight:bold}
.main .left .box .RR .tt span{color:#666}
.main .left .box .RR .tt .red{color:#f00;font-weight:bold}
.main .left .page{width:715px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 25px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
.tips1,.tips2,.tips3{width:540px;margin:0px auto;}
.main .left .tips1 {height:30px;color:#666;padding:50px 0 0 0}
.main .left .tips1 span{color:#f00;font-family:Arial Black;font-size:21px;font-style:italic}
.main .left .tips2 {line-height:24px;color:#FF6C96;margin:0px auto;background:#FFF0F7;border:#FFD0E7 1px solid;padding:10px;margin-top:15px;margin-bottom:15px;text-align:left}
.main .left .tips3 {height:70px;line-height:24px;color:#666}
.main .right{float:right;width:250px}/* ;height:950px */
.main .right .T{width:250px;height:32px;background-image:url(../images/g_r_tbg.gif)}
.main .right .T .li1{float:left;width:76px;color:#982E00;font-weight:bold;padding:13px 0 0 9px}
.main .right .T .li2{float:left;width:65px;padding:8px 0 0 0}
.main .right .T .li3{float:left;width:91px;text-align:right;padding:8px 0 0 0}
.main .right .C {width:228px;border-left:1px #ddd solid;border-right:1px #ddd solid;border-bottom:1px #ddd solid;padding:10px}/* ;height:880px */
.main .right .margin5{margin:5px 0 0 0}
.main .right .C .box{width:220px;height:80px;padding:3px;border:#FAEBF2 1px solid;background:#FFF5F9;margin:0 0 10px 0}
.main .right .C .box .L{float:left;width:65px;height:80px;background:#ccc}
.main .right .C .box .L img{width:65px;height:80px}
.main .right .C .box .R{float:right;width:145px;height:80px;text-align:left}
.main .right .C .box .R .tt{width:140px;height:20px;color:#999}
.main .right .C .box .R .tt span{color:#f00}
.main .right .C .box .R .mm{width:140px;height:35px;color:#7e7e7e;line-height:18px}
.main .right .C .box .R .bb{width:140px;height:25px;text-align:center}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main">
	<div class="left">
		<?php
		$tempsql = '';
		if ($t == 1 && !empty($k)){
			$k  = trimm($k);
			$tmpsort  = " ORDER BY zhenghun_jingjia DESC,logintime DESC ";
			$tempsql .= " (username LIKE '%".$k."%' OR nickname LIKE '%".$k."%') AND ";
			$Tfield = "id,username,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
			$tmpsql .= "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE $tempsql flag=1 $tmpsort LIMIT 50";
		}elseif ($t ==2){
			$Tfield = "id,username,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
			$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE flag=1 ORDER BY id DESC LIMIT 500";
		
		} else {
			if ($sex == 1)$tempsql         .= " sex=1 AND ";
			if ($sex == 2)$tempsql         .= " sex=2 AND ";
			if ($photo == 1)$tempsql       .= " photo_s<>'' AND ";
			if ($video == 1)$tempsql       .= " video_s<>'' AND ";
			if ($ifphoto == 1)$tempsql     .= " ifphoto=1 AND ";
			if ($ifbirthday == 1)$tempsql  .= " ifbirthday=1 AND ";
			if ($ifheigh == 1)$tempsql     .= " ifheigh=1 AND ";
			if ($ifedu == 1)$tempsql       .= " ifedu=1 AND ";
			if ($iflove == 1)$tempsql      .= " iflove=1 AND ";
			if ($ifpay == 1)$tempsql       .= " ifpay=1 AND ";
			if ($ifhouse == 1)$tempsql     .= " ifhouse=1 AND ";
			if ($ifcar == 1)$tempsql       .= " ifcar=1 AND ";
			if ( preg_match("^[1-5]{1}$",$kind) && !empty($kind))$tempsql       .= " kind='$kind' AND ";
			if (!empty($province))$tempsql .= " area1 = '$province' AND ";
			if (!empty($city) && $city!='不限')$tempsql     .= " area2 = '$city' AND ";
			if (!empty($province2))$tempsql.= " area3 = '$province2' AND ";	
			if (!empty($city2))$tempsql    .= " area4 = '$city2' AND ";
			if (!empty($birthday1))$tempsql.= " ( YEAR(NOW()) - YEAR(birthday) >= '$birthday1' ) AND ";
			if (!empty($birthday2))$tempsql.= " ( YEAR(NOW()) - YEAR(birthday) <= '$birthday2' ) AND ";
			if ( preg_match("^[0-9]{1,3}$",$heigh1) && !empty($heigh1))$tempsql .= " heigh>='$heigh1' AND ";
			if ( preg_match("^[0-9]{1,3}$",$heigh2) && !empty($heigh2))$tempsql .= " heigh<='$heigh2' AND ";
			if ( preg_match("^[0-9]{1,3}$",$weigh1) && !empty($weigh1))$tempsql .= " weigh>='$weigh1' AND ";
			if ( preg_match("^[0-9]{1,3}$",$weigh2) && !empty($weigh2))$tempsql .= " weigh<='$weigh2' AND ";
			if ( preg_match("^[1-6]{1}$",$edu) && !empty($edu))$tempsql         .= " edu='$edu' AND ";
			if ( preg_match("^[1-7]{1}$",$love) && !empty($love))$tempsql       .= " love='$love' AND ";
			if ( preg_match("^[0-9]{1,2}$",$job) && !empty($job))$tempsql       .= " job='$job' AND ";
			if ( preg_match("^[0-9]{1,2}$",$field) && !empty($field))$tempsql   .= " field='$field' AND ";
			if ( preg_match("^[0-9]{1,2}$",$pay) && !empty($pay))$tempsql       .= " pay='$pay' AND ";
			if ( preg_match("^[1-6]{1}$",$house) && !empty($house))$tempsql     .= " house='$house' AND ";
			if ( preg_match("^[1-5]{1}$",$car) && !empty($car))$tempsql         .= " car='$car' AND ";
			if ( preg_match("^[1-6]{1}$",$smoking) && !empty($smoking))$tempsql .= " smoking='$smoking' AND ";
			if ( preg_match("^[1-6]{1}$",$drink) && !empty($drink))$tempsql     .= " drink='$drink' AND ";
			switch ($s){ 
			case 2:$tmpsort  = " ORDER BY grade DESC,logintime DESC ";break;
			case 3:$tmpsort  = " ORDER BY id DESC ";break;
			case 4:$tmpsort  = " ORDER BY logintime DESC ";break;
			case 5:
			$tempsql  .= " zhenghun_jingjia>0 AND loveb>0 AND grade>1 AND ";
			$tmpsort   = " ORDER BY zhenghun_jingjia DESC ";
			break;
			default:$tmpsort = " ORDER BY zhenghun_jingjia DESC,logintime DESC ";break;}
			$Tfield = "id,username,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
			$tmpsql .= "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE $tempsql flag=1 $tmpsort LIMIT 500";
		}
		$rt=$db->query($tmpsql);
		$total = $db->num_rows($rt);
		if ($total > 0){
			require_once YZLOVE.'sub/fundata.php';
			$data = new yzlove_data;
			require_once YZLOVE.'sub/classcool.php';
			$pagesize = 14;
			if ($p<1)$p=1;
			$mypage = new zeaipage($total,$pagesize);
			$pagelistX = $mypage->pagebar(3);
			$pagelist  = $mypage->pagebar();
			mysql_data_seek($rt,($p-1)*$pagesize);
		}
		?>
	 	<div class="title">
			<div class="uTliSelect">搜索结果</div>
			<div class="uTli">最多显示500名会员，如果没有找到请 <a href="search.php">重新设置搜索要求</a></div>
			<div class="uTliBlank"></div>
			<div class="uTliPage"><div class="Pl"></div><div class="Pr"><?php echo $pagelistX; ?></div></div>
		</div>
		<div class="titleline"></div>
		<?php	
		if ($total > 0){
			for($i=1;$i<=$pagesize;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$uid = $rows['id'];
				$id = $uid*7+8848;
				$username = badstr($rows['username']);
				$nickname = badstr($rows['nickname']);
				if ($t == 1 && !empty($k)){
					$username = str_replace($k,"<span class=red>".$k."</span>",stripslashes($username));
					$nickname = str_replace($k,"<span class=red>".$k."</span>",stripslashes($nickname));
				}
				$grade = $rows['grade'];
				$sex = $rows['sex'];
				$birthday = $rows['birthday'];
				$love = $rows['love'];
				$kind = $rows['kind'];
				$area1 = $rows['area1'];
				$area2 = $rows['area2'];
				$photo_s = $rows['photo_s'];
				$video_s = $rows['video_s'];
				$heigh = $rows['heigh'];
				$weigh = $rows['weigh'];
				$house = $rows['house'];
				$car = $rows['car'];
				$edu = $rows['edu'];
				$job = $rows['job'];
				$pay = $rows['pay'];
				$ifphoto = $rows['ifphoto'];
				$ifbirthday = $rows['ifbirthday'];
				$ifedu = $rows['ifedu'];
				$iflove = $rows['iflove'];
				$ifpay = $rows['ifpay'];
				$zhenghun_jingjia = $rows['zhenghun_jingjia'];
				$tmpx = 0;
				if ($ifphoto == 1)$tmpx = $tmpx+1;
				if ($ifbirthday == 1)$tmpx = $tmpx+1;
				if ($ifedu == 1)$tmpx = $tmpx+1;
				if ($iflove == 1)$tmpx = $tmpx+1;
				if ($ifpay == 1)$tmpx = $tmpx+1;
				if ($i % 2 !=0){$tmpmargin=' margin_R';}else{$tmpmargin='';}
				if ($zhenghun_jingjia > 0 && $t!=2){
					$href = '../bidderuser'.$id.'.html';
				} else {
					$href = $Global['home_2domain'].'/'.$uid;
				}
		?>
		<div class="box<?php echo $tmpmargin; ?>">
			<div class="LL"><a href=<?php echo $href; ?> target=_blank><?php if (empty($photo_s)){?><img src=../images/nopic<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> width="110" height="135" title="<?php echo $nickname.'的照片';?>"><?php }?></a></div>
			<div class="RR">
				<div class="tt"><?php geticon($sex.$grade);echo '<a href='.$href.' target=_blank>'.$nickname.'</a> (<span>'.$username.'</span>)';
if ($tmpx > 0)echo '(';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
echo "<image src=../images/sfz_x.gif align=absmiddle vspace=5 title='实名认证星级：当前".$tmpx."星，共5星'>";
}echo '</a>';if ($tmpx > 0)echo ')';
?></div>
				<div class="mm"><?php echo $data->getbirthday($birthday); ?>，<?php echo $data->getlove($love); ?>，<?php if ($heigh > 140)echo $heigh.'厘米，';?><?php if ($weigh > 20)echo $weigh.'公斤，'; ?><?php echo $area1.$area2; ?>，<?php $tmphouse = $data->gethouse($house);if (!empty($tmphouse))echo $tmphouse.'，'; ?><?php $tmpcar = $data->getcar($car);if (!empty($tmpcar))echo $tmpcar.'，'; ?><?php $tmpedu = $data->getedu($edu);if (!empty($tmpedu))echo $tmpedu.'，'; ?><?php $tmppay = $data->getpay($pay);if (!empty($tmppay))echo $tmppay.'，'; ?><?php $tmpjob = $data->getjob($job);if (!empty($tmpjob))echo $tmpjob.'，'; ?>交友目的为<?php echo $data->getkind($kind);?></div>
				<div class="bb"><a href=<?php echo $href; ?> target=_blank>+ 查看详细</a></div>
			</div>
		</div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php } else {?>
		<div class=clear></div>
		<div class="tips1"><span>Sorry!</span> 没有找到符合条件的会员。。。</div>
		<div class="tips2"><img src="../images/tips.gif" hspace="5" align="absmiddle" /><?php echo $Global['m_sitename']; ?>的会员数据库非常庞大，因此设置一个基本的搜索要求可以让您缩小范围，寻找到更合适的异性。每个人对未来的另一半都会有一些憧憬，但我们不要为幸福设置太高的门槛，也不要以貌取人，以财取人。要知道真正的幸福建立在双方共同的价值观和爱情观的基础上，建立在两个人一起奋斗，互相鼓励，共同创造美好生活的过程中。</div>
		<div class="tips3">你还可以采用模糊查询功能来检索单个会员。<br>　　如：你要查询“<b>新好男人</b>”这个会员，其实您只要输入“<b>好男人</b>”或“<b>男人</b>”也可以找到它哟！</div>
		<?php }?>
	</div>
<!-- 右侧 -->
	<div class="right">
		<div class="T margin5">
			<div class="li1" title="只显示在线的高级会员">在线会员</div>
			<div class="li2"><a href="/my/?e_dating_add.php"></a></div>
			<div class="li3"><a href="../user/online.php"><img src="../images/g_r_more.gif" border="0" /></a></div>
		</div>
		<div class="C">
			<?php
			$tmpsql = "SELECT a.userid,b.username,b.grade,b.sex,b.photo_s,b.birthday,b.love,b.kind,b.ifphoto,b.ifbirthday,b.ifedu,b.iflove,b.ifpay FROM ".__TBL_ONLINE__." a,".__TBL_MAIN__." b WHERE b.grade>1 AND a.stealth=0 AND a.userid=b.id  ORDER BY a.actiontime DESC LIMIT 9";
			$rt=$db->query($tmpsql);
			if (!$db->num_rows($rt)){
				echo '<h6>暂无信息</h6>';
			} else {
				require_once YZLOVE.'sub/fundata.php';
				$data = new yzlove_data;
				$total = $db->num_rows($rt);
				for($i=1;$i<=$total;$i++) {
					$rows = $db->fetch_array($rt);
					if(!$rows) break;
					$id = $rows['userid'];
					$nickname = $rows['username'];
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
					/*  
					if ( preg_match("^[0-9]{1,2}$",$cook_grade) && !empty($cook_grade)) {
						$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$id);
						$rowonline = $db->fetch_array($rtonline);
						if ($rowonline[0] > 0){
							$if_online = 'YES';$outonline = ' (<span>在线</span>)';
						} else {
							$if_online = 'NO';$outonline = '';
						}
					}*/
			?>
			<div class="box">
				<div class="L"><a href=<?php echo $Global['home_2domain'].'/'.$id;?> target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/65x80<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?> title="<?php echo $nickname.'的照片'; ?>"><?php }?></a></div>
				<div class="R">
				<div class="tt"><?php geticon($sex.$grade);echo '<a href='.$Global['home_2domain'].'/'.$id.' target=_blank>'.badstr($nickname).'</a> ';
if ($tmpx > 0)echo '(';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=../images/sfz_x.gif align=absmiddle vspace=5 title='实名认证星级：当前".$tmpx."星，共5星'>";
}echo '</a>';if ($tmpx > 0)echo ')';
?></div>
				<div class="mm"><?php echo $data->getbirthday($birthday); ?>，<?php echo $data->getlove($love); ?>，<?php echo $data->getkind($kind);?></div>
				<div class="bb">
				<?php if ( !preg_match("^[0-9]{1,2}$",$cook_grade) || empty($cook_grade)) {
				echo "<a href=../login.php><img src=../images/chat.gif /></a>　<a href=../login.php><img src=../images/gbook.gif /></a>";
				} else {
				echo "<a href=".$Global['chat_2domain']."/chksend".$id.".html target='_blank'><img src=../images/chat.gif /></a>　";
				echo "<a href=".$Global['my_2domain']."/?b_gbook.php?submitok=add&memberid=".$id."&membernickname=".$nickname."&g=".$grade." target='_blank'><img src=../images/gbook.gif /></a>";
				}?>
				</div>
				</div>
			</div>
			<?php }}?>
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="clear"></div>
<?php require_once YZLOVE.'bottom.php';?>
