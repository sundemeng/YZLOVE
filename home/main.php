<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("请求错误，该用户不存在或已被锁定或已被删除！",$Global['www_2domain']);
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,regtime,regip,logintime,alltime,loginip,logincount,mbkind,mbtitle,magic,bgpic,bgmusic,sex,birthday,love,kind,area1,area2,area3,area4,photo_s,video_s,click,heigh,weigh,tx,star,blood,zhongjiao,house,car,clothing,edu,school,field,job,pay,aboutus,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse FROM ".__TBL_MAIN__." WHERE id=".$uid." AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username = $row['username'];
$nickname = $row['nickname'];
$grade = $row['grade'];
$loveb = $row['loveb'];
$regtime = $row['regtime'];
$regip = $row['regip'];
$logintime = $row['logintime'];
$alltime = $row['alltime'];
$loginip = $row['loginip'];
$logincount = $row['logincount'];
$mbkind = $row['mbkind'];
$mbtitle = $row['mbtitle'];
$magic = $row['magic'];
$bgpic = $row['bgpic'];
$bgmusic = $row['bgmusic'];
$sex = $row['sex'];
$birthday = $row['birthday'];
$love = $row['love'];
$kind = $row['kind'];
$area1  = $row['area1'];
$area2  = $row['area2'];
$area3  = $row['area3'];
$area4  = $row['area4'];
$photo_s  = $row['photo_s'];
$click  = $row['click'];
$heigh  = $row['heigh'];
$weigh  = $row['weigh'];
$tx     = $row['tx'];
$star   = $row['star'];
$blood   = $row['blood'];
$zhongjiao   = $row['zhongjiao'];
$house   = $row['house'];
$car   = $row['car'];
$clothing   = $row['clothing'];
$edu   = $row['edu'];
$school   = $row['school'];
$field   = $row['field'];
$job   = $row['job'];
$pay   = $row['pay'];
$aboutus  = $row['aboutus'];
$aboutus = preg_replace("/[\r|\n]+/","\n",$aboutus); 
//$aboutus  = nl2br($aboutus);
$ifphoto     = $row['ifphoto'];
$ifbirthday  = $row['ifbirthday'];
$ifheigh  = $row['ifheigh'];
$ifedu  = $row['ifedu'];
$iflove  = $row['iflove'];
$ifpay  = $row['ifpay'];
$ifhouse  = $row['ifhouse'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
//callmsg("请求错误，该用户不存在或已被锁定或已被删除！","-1");
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该用户不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;
}
$db->query("UPDATE ".__TBL_MAIN__." SET click=click+1 WHERE id=".$uid);
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<!-- title -->
<title><?php echo $nickname;?>的个人博客,个人主页</title>
<meta name="keywords" content="<?php echo $nickname;?>的个人主页">
<meta name="description" content="<?php echo $nickname;?>的个人主页">
<meta name="description" content="<?php echo htmlout(gylsubstr(stripslashes($aboutus),200)); ?>,<?php echo $nickname;?>的个人博客">
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/index.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
</head>
<SCRIPT src="images/scrollpic.js" type=text/javascript></SCRIPT>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
<!-- 内心独白 -->
<?php if (!empty($aboutus)) {?>
		<div class="leftTitle"><h4>内心独白</h4>
		</div>
		<div class="leftContent">
		  <p>　<?php echo gylsubstr(htmlout(stripslashes($aboutus)),168);?>……[ <a href="myarchive<?php echo $uid; ?>.html" class="A9BU_tiaose">查看详细</a> ]</p>
		</div>
		<div class="clear"></div>
<?php }?>
<!-- 理想对象 -->
		<div class="leftTitle">
		  <h4>理想对象</h4>
		</div>
		<div class="leftContent"><p>
<?php 
$rt = $db->query("SELECT sex,birthday1,birthday2,kind,area1,area2,area3,area4,love,heigh1,heigh2,weigh1,weigh2,house,car,edu,pay,field,job,smoking,drink FROM ".__TBL_REQUEST__." WHERE userid='$uid'");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
?>
你的交友目的<span class=tiaose><?php
switch ($row['kind']){ 
case 2:echo "为约会交友";break;
case 3:echo "为婚姻恋爱";break;
case 4:echo "为红尘知己";break;
case 5:echo "为以商会友";break;
default:echo "不限";break;
}?></span>，
性别<span class=tiaose><?php if (empty($row['sex'])){echo "不限";}elseif ($row['sex'] == 1){echo "为男性";}else{echo "为女性";}?></span>，
年龄<span class=tiaose><?php
if (empty($row['birthday1']) || empty($row['birthday2'])){
echo '不限';
}else{
echo '在';
//echobirthday($row['birthday1']).'-'.echobirthday($row['birthday2']);
echo $row['birthday1'].'-'.$row['birthday2'];
echo '岁之间';
}?></span>，
身高<span class=tiaose><?php
if (empty($row['heigh1']) || empty($row['heigh2'])){
echo '不限';
}else{
echo '在'.$row['heigh1'].'-'.$row['heigh2'].'厘米之间';
}?></span>，
体重<span class=tiaose><?php
if (empty($row['weigh1']) || empty($row['weigh2'])){
echo '不限';
}else{
echo '在'.$row['weigh1'].'-'.$row['weigh2'].'公斤之间';
}?></span>，
婚姻状况<span class=tiaose><?php
switch ($row['love']){ 
case 1:echo "单身";break;
case 2:echo "为已婚";break;
case 3:echo "为离异有子女";break;
case 4:echo "为离异无子女";break;
case 5:echo "为丧偶有子女";break;
case 6:echo "为丧偶无子女";break;
case 7:echo "保密";break;
default:echo "不限";break;
}?></span>，
学历<span class=tiaose><?php
switch ($row['edu']){ 
case 1:echo "为初中及以下";break;
case 2:echo "为高中或中专及以上";break;
case 3:echo "为大专及以上";break;
case 4:echo "为本科及以上";break;
case 5:echo "为硕士及以上";break;
case 6:echo "为博士及以上";break;
default:echo "不限";break;
}?></span>，
月收入<span class=tiaose><?php
switch ($row['pay']){ 
case 1:echo "600元以下";break;
case 2:echo "600-799元";break;
case 3:echo "800-999元";break;
case 4:echo "1000-1499元";break;
case 5:echo "1500-1999元";break;
case 6:echo "2000-2999元";break;
case 7:echo "3000-3999元";break;
case 8:echo "4000-4999元";break;
case 9:echo "5000-5999元";break;
case 10:echo "6000-6999元";break;
case 11:echo "7000-9999元";break;
case 12:echo "10000-19999元";break;
case 13:echo "20000元以上";break;
default:echo "不限";break;
}?></span>，
所在地区<span class=tiaose><?php
if (!empty($row['area1'])) {
echo '为'.$row['area1'].' >> '.$row['area2'];
}else{
echo '不限';
}?></span>，
你的故乡<span class=tiaose><?php
if (!empty($row['area3'])) {
echo '为'.$row['area3'].' >> '.$row['area4'];
}else{
echo '不限';
}?></span>，
住房<span class=tiaose><?php
switch ($row['house']){ 
case 1:echo "为有住房";break;
case 2:echo "为有能力购房";break;
case 3:echo "为无住房";break;
case 4:echo "为无住房但可解决";break;
case 5:echo "为无住房希望对方解决";break;
case 6:echo "为无住房希望双方解决";break;
default:echo "不限";break;
}?></span>，
交通工具<span class=tiaose><?php
switch ($row['car']){ 
case 1:echo "为汽车";break;
case 2:echo "为中档汽车";break;
case 3:echo "为高档汽车";break;
case 4:echo "为有能力购汽车";break;
case 5:echo "为其他";break;
default:echo "不限";break;
}?></span>，
从事的工作行业<span class=tiaose><?php
switch ($row['field']){ 
case 1:echo "为计算机/互联网";break;
case 2:echo "为邮电/通讯";break;
case 3:echo "为银行/金融/保险";break;
case 4:echo "为建筑/房地产";break;
case 5:echo "为商业/零售/批发";break;
case 6:echo "为影视/娱乐/体育";break;
case 7:echo "为艺术/音乐/舞蹈";break;
case 8:echo "为广告/媒体/出版";break;
case 9:echo "为美容/服装";break;
case 10:echo "为旅游/运输";break;
case 11:echo "为教育/培训/科研";break;
case 12:echo "为制造/化工/能源";break;
case 13:echo "为服务/宾馆/餐饮";break;
case 14:echo "为医疗/保健";break;
case 15:echo "为司法/律师/咨询";break;
case 16:echo "为宠物/公益组织";break;
case 17:echo "为警察/军人";break;
case 18:echo "为国家机构/机关";break;
case 19:echo "为农业";break;
case 20:echo "为在校学生";break;
case 21:echo "为其他";break;
default:echo "不限";break;
}?></span>，
职业<span class=tiaose><?php 
switch ($row['job']){ 
case 1:echo "为企业管理人员";break;
case 2:echo "为专家/教授";break;
case 3:echo "为工程/技术人员";break;
case 4:echo "为市场/销售人员";break;
case 5:echo "为行政人员/文职秘书";break;
case 6:echo "为普通职员";break;
case 7:echo "为机关干部/公务人员";break;
case 8:echo "为艺术家/演员";break;
case 9:echo "为教师";break;
case 10:echo "为工人";break;
case 11:echo "为农民";break;
case 12:echo "为军人";break;
case 13:echo "为学生";break;
case 14:echo "为自由职业者";break;
case 15:echo "为离/退休人员";break;
case 16:echo "为失业/无业";break;
case 17:echo "为其他";break;
default:echo "不限";break;
}
?></span>，
吸烟<span class=tiaose><?php 
switch ($row['smoking']){ 
case 1:echo "最好是不吸";break;
case 2:echo "最好是偶尔吸";break;
case 3:echo "最好是一天一包";break;
case 4:echo "最好是有烟就吸";break;
case 5:echo "最好是正在戒烟";break;
case 6:echo "最好是已经戒了";break;
default:echo "不限";break;
}?></span>，
喝酒<span class=tiaose><?php
switch ($row['drink']){ 
case 1:echo "最好是滴酒不沾";break;
case 2:echo "最好是有时喝一些";break;
case 3:echo "最好是喜欢来两杯";break;
case 4:echo "最好是好酒量，天天喝";break;
case 5:echo "最好是正在戒酒";break;
case 6:echo "最好是已经戒了";break;
default:echo "不限";break;
}?></span>。
<?php
} else {
echo '没有要求，都可以与我交友！';
}
?>
　<font color="#999999">( 此征友要求仅供参考，如果觉得我还不错，欢迎您给我留言。<a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=add&memberid=<?php echo $uid; ?>&membernickname=<?php echo $nickname; ?>&g=<?php echo $grade; ?>" target="_blank" class=A9BU_tiaose>发送留言</a> ) </font>
		</p>
		</div>
		<div class="leftTitle"><h4>社区行踪</h4>
		</div>
		<div class="leftContent">
		  <p style="height:100px;">
		  <?php if ($cook_grade>=2){?>
		  注册时间：<span class=tiaose><?php echo $regtime; ?></span><br />
		  注册IP：<span class=tiaose><?php echo $regip; ?></span><br />
		  最近登录：<span class=tiaose><?php echo $logintime; ?></span><br />
		  最近登录IP：<span class=tiaose><?php echo $loginip; ?></span>
		  <?php }else{?>
		  注册时间：高级会员可见 <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ 点此升级 ]</span></a><br />
		  注册IP：高级会员可见 <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ 点此升级 ]</span></a><br />
		  最近登录：高级会员可见 <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ 点此升级 ]</span></a><br />
		  最近登录IP：高级会员可见 <a href="<?php echo $Global['my_2domain'];?>/?k_vip.php"> <span class=tiaose>[ 点此升级 ]</span></a>
		  <?php }?>
		  </p>
	  </div>
	</div>
	<div class="right">
<!-- 最新相册 -->
<?php
$rt=$db->query("SELECT id,path_s FROM ".__TBL_PHOTO__." WHERE userid=".$uid." AND flag=1 ORDER BY id DESC LIMIT 10");
$total = $db->num_rows($rt);
if($total>0){
?>	
	  <div class="rightTitle"><h4>最新相册</h4>
	  <a href="myphoto<?php echo $uid; ?>.html">>>更多</a></div>
		<div class="rightContent">
			<div class="photoLeft" id="photoLeft"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_L.gif" border="0" /></a></div>
			<div class="photoCenter" id="photoCenter">
	<ul>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
	<li><div class="pbox"><a href="p<?php echo $rows['id']; ?>.html"><img src="<?php echo $Global['up_2domain']; ?>/photo/<?php echo  $rows['path_s']; ?>" border=0 class="img" ></a></div></li>
<?php }?>
	</ul>
			</div>
			<div class="photoRight" id="photoRight"><a href="###"><img src="images/<?php echo $mbkind; ?>/play_R.gif" border="0" /></a></div>
			<div class="clear"></div>
		</div>
		<script language=javascript type=text/javascript>
		var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "photoCenter";//内容容器ID
		scrollPic_02.arrLeftId      = "photoLeft";//左箭头ID
		scrollPic_02.arrRightId     = "photoRight"; //右箭头ID
		scrollPic_02.frameWidth     = 500;//显示框宽度
		scrollPic_02.pageWidth      = 126; //翻页宽度
		scrollPic_02.speed          = 20; //移动速度(单位毫秒，越小越快)
		scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
		scrollPic_02.autoPlay       = true; //自动播放
		scrollPic_02.autoPlayTime   = 1.5; //自动播放间隔时间(秒)
		scrollPic_02.initialize(); //初始化
		</script>
		<div class="wspace"></div>
<?php }?>		
<!-- 基本资料 -->
	<div class="rightTitle"><h4>基本资料</h4>
	<a href="myarchive<?php echo $uid; ?>.html" >>>更多</a></div>
	<div class="rightContent2">
		<div class="userdataL">
			<div class="userdataL_l">用　　户：</div>
			<div class="userdataL_r"><?php echo $username;?> <?php if ($ifphoto == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='形象照已认证'>";}?></div>
			<div class="userdataL_l">性　　别：</div>
			<div class="userdataL_r"><?php if ($sex==1){echo "男";}else{echo "女";} ?></div>			
			<div class="userdataL_l">身　　高：</div>
			<div class="userdataL_r"><?php echo $heigh;?>厘米 <?php if ($ifheigh == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='身高已认证'>"; }?></div>	
			<div class="userdataL_l">体　　形：</div>
			<div class="userdataL_r"><?php
switch ($tx){ 
case 1:echo "清瘦";break;
case 2:echo "苗条";break;
case 3:echo "中等";break;
case 4:echo "健壮";break;
case 5:echo "略胖";break;
case 6:echo "匀称";break;
case 7:echo "瘦小";break;
case 8:echo "矮胖";break;
case 9:echo "大个";break;
case 10:echo "肥胖";break;
case 11:echo "性感";break;
}
?></div>
			<div class="userdataL_l">婚姻状况：</div>
			<div class="userdataL_r"><?php
switch ($love){ 
case 1:echo "未婚";break;
case 2:echo "已婚";break;
case 3:echo "离异有子女";break;
case 4:echo "离异无子女";break;
case 5:echo "丧偶有子女";break;
case 6:echo "丧偶无子女";break;
case 7:echo "保密";break;
}
?> <?php if ($iflove == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='婚姻状况已认证'>"; }?></div>			
			<div class="userdataL_l">学　　历：</div>
			<div class="userdataL_r"><?php
switch ($edu){ 
case 1:echo "初中及以下";break;
case 2:echo "高中或中专及以上";break;
case 3:echo "大专及以上";break;
case 4:echo "本科及以上";break;
case 5:echo "硕士及以上";break;
case 6:echo "博士及以上";break;
}
?> <?php if ($ifedu == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='学历已认证'>"; }?></div>
			<div class="userdataL_l">所在地区：</div>
			<div class="userdataL_r"><?php echo $area1; ?>&nbsp;&gt;&gt; <?php echo $area2; ?>　<font color="#999999">(故乡：<?php echo $area3; ?>&nbsp;&gt;&gt; <?php echo $area4; ?>)</font></div>		
		</div>
		<div class="userdataR">
			<div class="userdataL_l">交友目的：</div>
			<div class="userdataL_r"><?php
switch ($kind){ 
case 1:echo "都可以";break;
case 2:echo "约会交友";break;
case 3:echo "婚姻恋爱";break;
case 4:echo "红尘知己";break;
case 5:echo "以商会友";break;
}
?></div>
			<div class="userdataL_l">年　　龄：</div>
			<div class="userdataL_r"><?php 
$tmpbirthday1 = substr($birthday,0,4);
$tmpbirthday2 = date("Y");
$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
echo $tmpbirthday;
?>岁 <font color="#999999">(<?php echo $birthday; ?>)</font> <?php if ($ifbirthday == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='年龄已认证'>"; }?></div>			
			<div class="userdataL_l">体　　重：</div>
			<div class="userdataL_r"><?php echo $weigh;?>公斤</div>	
			<div class="userdataL_l">月 收 入：</div>
			<div class="userdataL_r"><?php
switch ($pay){ 
case 1:echo "600元以下";break;
case 2:echo "600-799元";break;
case 3:echo "800-999元";break;
case 4:echo "1000-1499元";break;
case 5:echo "1500-1999元";break;
case 6:echo "2000-2999元";break;
case 7:echo "3000-3999元";break;
case 8:echo "4000-4999元";break;
case 9:echo "5000-5999元";break;
case 10:echo "6000-6999元";break;
case 11:echo "7000-9999元";break;
case 12:echo "10000-19999元";break;
case 13:echo "20000元以上";break;
}
?> <?php if ($ifpay == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='月收入已认证'>"; }?></div>
			<div class="userdataL_l">行　　业：</div>
			<div class="userdataL_r"><?php
switch ($field){ 
case 1:echo "计算机/互联网";break;
case 2:echo "邮电/通讯";break;
case 3:echo "银行/金融/保险/证券";break;
case 4:echo "建筑/房地产";break;
case 5:echo "商业/零售/批发";break;
case 6:echo "影视/娱乐/体育";break;
case 7:echo "艺术/音乐/舞蹈";break;
case 8:echo "广告/媒体/出版";break;
case 9:echo "美容/服装";break;
case 10:echo "旅游/运输";break;
case 11:echo "教育/培训/科研";break;
case 12:echo "制造/化工/能源";break;
case 13:echo "服务/宾馆/餐饮";break;
case 14:echo "医疗/保健";break;
case 15:echo "司法/律师/咨询";break;
case 16:echo "宠物/公益组织";break;
case 17:echo "警察/军人";break;
case 18:echo "国家机构/机关";break;
case 19:echo "农业";break;
case 20:echo "在校学生";break;
case 21:echo "其他";break;
}
?></div>			
			<div class="userdataL_l">职　　业：</div>
			<div class="userdataL_r"><?php
switch ($job){ 
case 1:echo "企业管理人员";break;
case 2:echo "专家/教授";break;
case 3:echo "工程/技术人员";break;
case 4:echo "市场/销售人员";break;
case 5:echo "行政人员/文职秘书";break;
case 6:echo "普通职员";break;
case 7:echo "机关干部/公务人员";break;
case 8:echo "艺术家/演员";break;
case 9:echo "教师";break;
case 10:echo "工人";break;
case 11:echo "农民";break;
case 12:echo "军人";break;
case 13:echo "学生";break;
case 14:echo "自由职业者";break;
case 15:echo "离/退休人员";break;
case 16:echo "失业/无业";break;
case 17:echo "其他";break;
}
?></div>
			<div class="userdataL_l">婚　　房：</div>
			<div class="userdataL_r"><?php
switch ($house){ 
case 1:echo "有婚房";break;
case 2:echo "有能力购房";break;
case 3:echo "无婚房";break;
case 4:echo "无婚房但可解决";break;
case 5:echo "无婚房希望对方解决";break;
case 6:echo "无婚房希望双方解决";break;
}
?> <?php if ($ifhouse == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='住房已认证'>"; }?></div>
			<div class="userdataL_l"></div>
			<div class="userdataL_r" style="text-align:right;font-size:14px"><a href="myarchive<?php echo $uid; ?>.html" class="A9BU_tiaose">详细资料</a></div>

		</div>
	  </div>
	<div class="wspace"></div>
<!-- 我的日记 -->
<?php
$rt = $db->query("SELECT id,title,content,click,hfnum,stime FROM ".__TBL_DIARY__." WHERE flag=1 AND diaryopen=1 AND userid=".$uid." ORDER BY id DESC LIMIT 11");
$total = $db->num_rows($rt);
if($total>0){
$rows = $db->fetch_array($rt);
?>
	<div class="rightTitle">
	  <h4>最新日记</h4>
	  <a href="mydiary<?php echo $uid; ?>.html">>>更多</a></div>
	<div class="rightContent">
		<div class="userdata">
			<div class="diaryTitle">[ <?php echo date_format2($rows['stime'],'%Y-%m-%d');?> <?php echo htmlout(stripslashes($rows['title'])); ?> ]</div>
			<div class="diaryContent">　　<?php
			$s =gylsubstr(stripslashes($rows['content']),200); 
			echo strip_tags($s);
			//echo htmlout(gylsubstr(stripslashes($rows['content']),200));
			?>……</div>
			<div class="diaryHf">
		  回复:[<font color="#FF0000"><?php echo $rows['hfnum']; ?></font>]　阅读:[<font color="#FF0000"><?php echo $rows['click']; ?></font>]　<a href="diary<?php echo $rows['id']; ?>.html" target="_blank" class="A9BU_tiaose">阅读全文</a>
			</div>
		</div>
		<div class="userdata"><?php 
for($i=1;$i<$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
				<div class="diaryList">·<?php echo date_format2($rows['stime'],'%m/%d');?> <a href="diary<?php echo $rows['id']; ?>.html" target="_blank"><?php echo $rows['title']; ?></a></div>
<?php }?>
		</div>
		<div class="wspace"></div>
	</div>
	<div class="wspace"></div>
<?php }?>
<!-- 我的约会 -->
<?php
$rt=$db->query("SELECT id,kind,title,area1,area2,price,yhtime,maidian,contact,content,birthday1,birthday2,heigh1,heigh2,love,edu,area3,area4,addtime,bmnum,click,flag FROM ".__TBL_DATING__." WHERE userid=".$uid." AND flag=1 ORDER BY id DESC LIMIT 1");
$total = $db->num_rows($rt);
if($total>0){
$row = $db->fetch_array($rt);
?>
	<div class="rightTitle">
	  <h4>最新约会</h4>
	  <a href="mydating<?php echo $uid; ?>.html">>>更多</a></div>
	<div class="rightContent">
		<div class="userdata">
			<div class="datingTitle"><?php echo htmlout(stripslashes($row['title'])); ?></div>
			<div class="datingList">约会内容：<span class=tiaose><?php
	switch ($row['kind']){ 
	case 1:echo "喝茶小叙";break;
	case 2:echo "共进晚餐";break;
	case 3:echo "相约出游";break;
	case 4:echo "看电影";break;
	case 5:echo "欢唱K歌";break;
	case 6:echo "其他";break;
	default:echo "不限";break;
	}?></span></div>
			<div class="datingList">约会主题：<span class=tiaose><?php echo htmlout(stripslashes($row['title'])); ?></span></div>
			<div class="datingList">约会时间：<span class=tiaose><?php echo date_format2($row['yhtime'],'%Y年%m月%d日 %H时 %M分').' '.getweek(date_format2($row['yhtime'],'%Y-%m-%d'));?></span></div>
			<div class="datingList">约会城市：<span class=tiaose><?php echo $row['area1'].' >> '.$row['area2']; ?></span></div>
			<div class="datingList">费用预算：<span class=tiaose><?php
	switch ($row['price']){ 
	case 1:echo "100元以下";break;
	case 2:echo "100～300元";break;
	case 3:echo "300--500元";break;
	case 4:echo "500元以上";break;
	default :echo "不限";break;
	}?></span></div>
			<div class="datingList">谁来买单：<span class=tiaose><?php
	switch ($row['maidian']){ 
	case 1:echo "我来买单";break;
	case 2:echo "应约人买单";break;
	case 3:echo "AA制";break;
	default :echo "不限";break;
	}?></span></div>
			<div class="datingContent">约会安排：<span class=tiaose><?php echo htmlout(stripslashes($row['content'])); ?></span></div>
			<div class="datingContent">约会对象：您的年龄<span class=tiaose><?php if (!empty($row['birthday1']) && !empty($row['birthday2'])){echo '必须在'.$row['birthday1'].'到'.$row['birthday2'].'岁之间';}else{echo '不限';} ?></span>，身高<span class=tiaose><?php if (!empty($row['heigh1']) && !empty($row['heigh2'])){echo '必须在'.$row['heigh1'].'到'.$row['heigh2'].'厘米之间';}else{echo '不限';} ?></span>，	婚姻状况<span class=tiaose><?php
	switch ($row['love']){ 
	case 1:echo "为未婚";break;
	case 2:echo "为已婚";break;
	case 3:echo "为离异有子女";break;
	case 4:echo "为离异无子女";break;
	case 5:echo "为丧偶有子女";break;
	case 6:echo "为丧偶无子女";break;
	case 7:echo "保密";break;
	default :echo "不限";break;
	}?></span>，学历<span class=tiaose><?php
	switch ($row['edu']){ 
	case 1:echo "为初中及以下";break;
	case 2:echo "为高中或中专及以上";break;
	case 3:echo "为大专及以上";break;
	case 4:echo "为本科及以上";break;
	case 5:echo "为硕士及以上";break;
	case 6:echo "为博士及以上";break;
	default:echo "不限";break;
	}?></span>，所在地区<span class=tiaose>为<?php echo $row['area3'].' >> '.$row['area4']; ?></span>
			</div>
			<div class="datingContent" style="font-size:14px;font-family:'宋体';text-align:right;height:40px;padding-top:5px">响应人数:[<font color="#FF0000"><?php echo $row['bmnum']; ?></font>]　人气:[<font color="#FF0000"><?php echo $row['click']; ?></font>]　<a href="dating<?php echo $row['id']; ?>.html" target="_blank" class="A9BU_tiaose">我来赴约</a></div>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>


<?php $rt=$db->query("SELECT b.picurl FROM ".__TBL_PRESENT_USER__." a,".__TBL_PRESENT__." b WHERE a.kid=b.id AND a.userid=".$uid." ORDER BY b.id DESC LIMIT 6");
$total = $db->num_rows($rt);
if($total>0){
?>	
	<div class="rightTitle">
	  <h4>收到礼物 <?php
$rtmail = $db->query("SELECT COUNT(*) FROM ".__TBL_PRESENT_USER__." WHERE userid=".$uid);
if($db->num_rows($rtmail)){
$rowsmail = $db->fetch_array($rtmail);
echo '<font style=font-weight:normal;font-size:12px;font-family:Verdana>( '.$rowsmail[0].' ) 个，只显示最新6个礼物，Ta本人可以查看更多。</font>';
}
?></h4>
	  <a href="<?php echo $Global['my_2domain'];?>/?b_present.php?submitok=list">>>更多</a>
	  </div>
	<div class="rightContent">
	<div class="clear"></div>
<table width="610" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
<?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
    <td align="center" style="padding-top:10px;padding-bottom:10px;"><table width="50" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td height="50" align="center" style="border:#fff 0px solid;position:relative;"><?php echo "<img src=".$Global['up_2domain']."/present/".$rows[0]." border=0 width=64 height=64>";?></td>
      </tr>
    </table>
        </td>
    <?php if ($i % 6 == 0) {?>
  </tr>
  <tr>
    <?php } ?>
    <?php 	} ?>
  </tr>
</table>
<?php }?>


	</div>
	<div class="clear"></div>
</div>
<?php
$shuaxin_homeclick = 'homeclick'.$uid;
if ( $cook_userid != $uid && ereg("^[0-9]{1,9}$",$cook_userid) && $_COOKIE["$shuaxin_homeclick"] != 'OK') {
	$addtime = date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_CLICKHISTORY__."  (userid,senduserid,sendnickname,sex,grade,photo_s,addtime) VALUES ('$uid',$cook_userid,'$cook_nickname','$cook_sex','$cook_grade','$cook_photo_s','$addtime')");
	setcookie("$shuaxin_homeclick",'OK');
}
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
require_once YZLOVE.'home/foot.php';
function getweek($date) {
$dateArr = explode("-", $date);
$weeknum = date("w", mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]));
switch ($weeknum){
case 0:$xingqi='星期日';break;
case 1:$xingqi='星期一';break;
case 2:$xingqi='星期二';break;
case 3:$xingqi='星期三';break;
case 4:$xingqi='星期四';break;
case 5:$xingqi='星期五';break;
case 6:$xingqi='星期六';break;
}
return $xingqi;
} 
?>