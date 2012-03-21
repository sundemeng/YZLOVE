<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("请求错误，该用户不存在或已被锁定或已被删除！",$Global['www_2domain']);
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT username,nickname,grade,loveb,regtime,logintime,alltime,logincount,mbkind,mbtitle,magic,bgpic,ifmod,sex,birthday,love,kind,area1,area2,area3,area4,photo_s,click,heigh,weigh,tx,star,blood,zhongjiao,house,car,clothing,edu,school,field,job,pay,nianwang,xinyuan,smoking,drink,gexin,xinrong,youshi,xinqu,huoban,aboutus,ifphoto,ifbirthday,ifheigh,ifedu,iflove,ifpay,ifhouse,ifcar FROM ".__TBL_MAIN__." WHERE id='$uid' AND flag=1");
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$username = $row['username'];
$nickname = $row['nickname'];
$grade = $row['grade'];
$loveb = $row['loveb'];
$regtime = $row['regtime'];
$logintime = $row['logintime'];
$alltime = $row['alltime'];
$logincount = $row['logincount'];
$mbkind = $row['mbkind'];
$mbtitle = $row['mbtitle'];
$magic = $row['magic'];
$bgpic = $row['bgpic'];
$ifmod = $row['ifmod'];
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
$nianwang   = $row['nianwang'];
$xinyuan   = $row['xinyuan'];
$smoking   = $row['smoking'];
$drink   = $row['drink'];
$gexin   = $row['gexin'];
$xinrong   = $row['xinrong'];
$youshi   = $row['youshi'];
$xinqu   = $row['xinqu'];
$huoban   = $row['huoban'];
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
$ifcar  = $row['ifcar'];
$tmpx = 0;
if ($ifphoto == 1)$tmpx = $tmpx+1;
if ($ifbirthday == 1)$tmpx = $tmpx+1;
if ($ifedu == 1)$tmpx = $tmpx+1;
if ($iflove == 1)$tmpx = $tmpx+1;
if ($ifpay == 1)$tmpx = $tmpx+1;
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该用户不存在或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>_<?php
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
	?>_个人资料</title>
<meta name="keywords" content="<?php echo $nickname;?>,<?php
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
	?>,<?php
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
	?>交友,<?php
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
	?>征婚" />
<meta name="description" content="<?php echo $nickname;?>在<?php
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
	?>网上的个人详细资料信息" />
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/myarchive.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homed.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
	<div class="left">
		<?php require_once YZLOVE.'home/left.php'?>
	</div>
	<div class="right">
	<!-- 内心独白 -->
<?php if (!empty($aboutus)) {?>
	  <div class="rightTitle"><h4>内心独白</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a3.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent ul2"><p>　<?php echo htmlout(stripslashes($aboutus));?></p></div>
		<div class="wspace"></div>
<?php }?>
		<!-- 我的资料 -->
	  <div class="rightTitle"><h4>我的资料</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a1.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent">
			<div class="userdataL">
				<div class="userdata_l">用　　户：</div>
				<div class="userdata_r"><?php echo $username;?> <?php if ($ifphoto == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='形象照已认证'>"; }?></div>
				<div class="userdata_l">性　　别：</div>
				<div class="userdata_r"><?php if ($sex==1){echo "男";}else{echo "女";} ?></div>			
				<div class="userdata_l">身　　高：</div>
				<div class="userdata_r"><?php echo $heigh;?>厘米 <?php if ($ifheigh == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='身高已认证'>"; }?></div>	
				<div class="userdata_l">体　　形：</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">婚姻状况：</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">学　　历：</div>
				<div class="userdata_r"><?php
	switch ($edu){ 
	case 1:echo "初中及以下";break;
	case 2:echo "高中或中专及以上";break;
	case 3:echo "大专及以上";break;
	case 4:echo "本科及以上";break;
	case 5:echo "硕士及以上";break;
	case 6:echo "博士及以上";break;
	}
	?> <?php if ($ifedu == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='学历已认证'>"; }?></div>
				<div class="userdata_l">所在地区：</div>
				<div class="userdata_r"><?php echo $area1; ?>&nbsp;&gt;&gt; <?php echo $area2; ?></div>
				<div class="userdata_l">我的故乡：</div>
				<div class="userdata_r"><?php echo $area3; ?>&nbsp;&gt;&gt; <?php echo $area4; ?></div>
				<div class="userdata_l">着　　装：</div>
				<div class="userdata_r"><?php
switch ($clothing){ 
case 1:echo "休闲";break;
case 2:echo "正统";break;
case 3:echo "前卫";break;
case 4:echo "随便";break;
}
?></div>
				<div class="userdata_l">血　　型：</div>
				<div class="userdata_r"><?php
switch ($blood){ 
case 1:echo "A";break;
case 2:echo "B";break;
case 3:echo "AB";break;
case 4:echo "O";break;
case 5:echo "其他或未知";break;
}
?> 型</div>
				<div class="userdata_l">是否吸烟：</div>
				<div class="userdata_r"><?php
switch ($smoking){ 
case 1:echo "不吸";break;
case 2:echo "偶尔吸";break;
case 3:echo "一天一包";break;
case 4:echo "有烟就吸";break;
case 5:echo "正在戒烟";break;
case 6:echo "已经戒了";break;
}
?></div>
			</div>
			<div class="userdataR">
				<div class="userdata_l">交友目的：</div>
				<div class="userdata_r"><?php
	switch ($kind){ 
	case 1:echo "都可以";break;
	case 2:echo "约会交友";break;
	case 3:echo "婚姻恋爱";break;
	case 4:echo "红尘知己";break;
	case 5:echo "以商会友";break;
	}
	?></div>
				<div class="userdata_l">年　　龄：</div>
				<div class="userdata_r"><?php 
$tmpbirthday1 = substr($birthday,0,4);
$tmpbirthday2 = date("Y");
$tmpbirthday  = $tmpbirthday2 - $tmpbirthday1;
echo $tmpbirthday;
?>岁 <font color="#999999">(<?php echo $birthday; ?>)</font> <?php if ($ifbirthday == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='年龄已认证'>"; }?></div>			
				<div class="userdata_l">体　　重：</div>
				<div class="userdata_r"><?php echo $weigh;?>公斤</div>	
				<div class="userdata_l">月 收 入：</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">行　　业：</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">职　　业：</div>
				<div class="userdata_r"><?php
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
				<div class="userdata_l">住　　房：</div>
				<div class="userdata_r"><?php
	switch ($house){ 
	case 1:echo "有婚房";break;
	case 2:echo "有能力购房";break;
	case 3:echo "无婚房";break;
	case 4:echo "无婚房但可解决";break;
	case 5:echo "无婚房希望对方解决";break;
	case 6:echo "无婚房希望双方解决";break;
	}
	?> <?php if ($ifhouse == 1){echo "<img src=images/$mbkind/sfz.gif hspace=3 align=absmiddle  title='住房已认证'>"; }?></div>
				<div class="userdata_l">星　　座：</div>
				<div class="userdata_r">
					<?php
					switch ($star){ 
					case 1:echo "魔羯座";break;
					case 2:echo "水瓶座";break;
					case 3:echo "双鱼座";break;
					case 4:echo "白羊座";break;
					case 5:echo "金牛座";break;
					case 6:echo "双子座";break;
					case 7:echo "巨蟹座";break;
					case 8:echo "狮子座";break;
					case 9:echo "处女座";break;
					case 10:echo "天秤座";break;
					case 11:echo "天蝎座";break;
					case 12:echo "射手座";break;
					}?></div>
				<div class="userdata_l">宗教信仰：</div>
				<div class="userdata_r"><?php
switch ($zhongjiao){ 
case 1:echo "无神论者";break;
case 2:echo "佛教";break;
case 3:echo "基督教";break;
case 4:echo "道教";break;
case 5:echo "伊斯兰教";break;
case 6:echo "天主教";break;
case 7:echo "有神论者";break;
case 8:echo "其他";break;
}
?></div>
				<div class="userdata_l">交通工具：</div>
				<div class="userdata_r"><?php
switch ($car){ 
case 1:echo "汽车";break;
case 2:echo "中档汽车";break;
case 3:echo "高档汽车";break;
case 4:echo "有能力购汽车";break;
case 5:echo "其他";break;
}
?> <?php if ($ifcar == 1){echo "<font color=#009900><img src=images/ok.gif hspace=3 align=absmiddle>已认证</font>"; }?></div>
				<div class="userdata_l">是否饮酒：</div>
				<div class="userdata_r"><?php
switch ($drink){ 
case 1:echo "滴酒不沾";break;
case 2:echo "有时喝一些";break;
case 3:echo "喜欢来两杯";break;
case 4:echo "好酒量，天天喝";break;
case 5:echo "正在戒酒";break;
case 6:echo "已经戒了";break;
}
?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="rightContent ul2" style="padding:0 0 15px 0">
			<?php if ($ifmod == 1) {?>
			<div class="userdata_Ml">毕业院校：</div>
			<div class="userdata_Mr"><?php echo stripslashes($school);?>&nbsp;</div>
			<div class="userdata_Ml">最难忘的事：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($nianwang));?>&nbsp;</div>
			<div class="userdata_Ml">近期的心愿：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinyuan));?>&nbsp;</div>
			<div class="userdata_Ml">我的个性：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($gexin));?>&nbsp;</div>
			<div class="userdata_Ml">朋友形容我：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinrong));?>&nbsp;</div>
			<div class="userdata_Ml">我的优势：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($youshi));?>&nbsp;</div>
			<div class="userdata_Ml">兴趣爱好：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($xinqu));?>&nbsp;</div>
			<div class="userdata_Ml">我要寻找：</div>
			<div class="userdata_Mr"><?php echo htmlout(stripslashes($huoban));?>&nbsp;</div>
			<?php }?>
			<div class="clear"></div>
		</div>
		<!-- 扩展资料开始 -->	
<?php 
$rt = $db->query("SELECT * FROM ".__TBL_MAIN_DATA__." WHERE ifmod=1 AND userid=".$uid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
if (!empty($row['a2'])) {?>
		<!-- 约会交友 -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>约会交友资料</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a5.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0;">
			<div class="userdata_extMl">第一次约会我希望双方能做什么：</div>
			<div class="userdata_extMr"><?php
switch ($row['a1']){ 
case 1:echo "先见一面相互认识。";break;
case 2:echo "可以一起吃饭，喝茶。";break;
case 3:echo "可以去看场电影，唱歌，跳舞。";break;
case 4:echo "如果喜欢，可以拉拉手。";break;
case 5:echo "如果喜欢，可以拥抱接吻。";break;
case 6:echo "不排除更进一步的可能。";break;
}
?>&nbsp;</div>
			<div class="userdata_extMl">约会中该谁买单：</div>
			<div class="userdata_extMr"><?php
switch ($row['a2']){ 
case 1:echo "当然是男的付";break;
case 2:echo "男的多付一些";break;
case 3:echo "谁有钱谁付";break;
case 4:echo "随便，无所谓";break;
case 5:echo "AA制";break;
case 6:echo "看关系发展";break;
}
?>&nbsp;</div>
			<div class="userdata_extMl">我喜欢的约会场所：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a3']));?></div>
			<div class="userdata_extMl">我喜欢的音乐：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a4']));?></div>
			<div class="userdata_extMl">我常参与的体育活动：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a5']));?></div>
			<div class="userdata_extMl">我喜欢谈论：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a6']));?></div>
			<div class="userdata_extMl">我认为浪漫是：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['a7']));?></div>
			<div class="clear"></div>
		</div>
<?php } if (!empty($row['b2'])) {?>
		<!-- 婚姻恋爱 -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>婚姻恋爱资料</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a6.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">有子女吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b1']){ 
case 1:echo "无子女";break;
case 2:echo "有子女，不住在一起";break;
case 3:echo "有子女，偶尔在一起";break;
case 4:echo "有子女，同住一起";break;
case 5:echo "我没有，你有也没关系";break;
}?>&nbsp;</div>
			<div class="userdata_extMl">结婚后想要小孩吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b2']){ 
case 1:echo "不要，不喜欢";break;
case 2:echo "结婚后马上就要";break;
case 3:echo "过几年再要";break;
case 4:echo "顺其自然";break;
case 5:echo "暂时不考虑";break;
}?>&nbsp;</div>
			<div class="userdata_extMl">愿意为爱情迁居别处吗:：</div>
			<div class="userdata_extMr"><?php
switch ($row['b3']){ 
case 1:echo "不会";break;
case 2:echo "还是对方搬到我这来吧";break;
case 3:echo "如果决定结婚就行";break;
case 4:echo "如果关系已经较稳定，可以考虑";break;
case 5:echo "要看搬去哪里，不喜欢的地方不行";break;
case 6:echo "为了爱情，当然可以";break;
}?></div>
			<div class="userdata_extMl">婚后我会承担多少家务：</div>
			<div class="userdata_extMr"><?php
switch ($row['b4']){ 
case 1:echo "全部他(她)做";break;
case 2:echo "10%";break;
case 3:echo "20%";break;
case 4:echo "30%";break;
case 5:echo "40%";break;
case 6:echo "50%";break;
case 7:echo "60%";break;
case 8:echo "70%";break;
case 9:echo "80%";break;
case 10:echo "90%";break;
case 11:echo "全部我做";break;
case 12:echo "看情况，谁有时间谁做";break;
}?></div>
			<div class="userdata_extMl">喜欢旅游吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b5']){ 
case 1:echo "喜欢";break;
case 2:echo "每年都去旅游度假";break;
case 3:echo "没时间，很少去";break;
case 4:echo "工作就是最大乐趣";break;
case 5:echo "存够钱就旅游";break;
case 6:echo "只在附近玩玩";break;
}?></div>
			<div class="userdata_extMl">婚恋中双方的关系应该是：</div>
			<div class="userdata_extMr"><?php
switch ($row['b6']){ 
case 1:echo "彼此完全占有";break;
case 2:echo "亲密无间，不分你我";break;
case 3:echo "完全依赖";break;
case 4:echo "彼此关心但保持距离";break;
case 5:echo "满足对方需要，同时有独立空间";break;
}?></div>
			<div class="userdata_extMl">我的婚恋态度：</div>
			<div class="userdata_extMr"><?php
switch ($row['b7']){ 
case 1:echo "不会同意离婚";break;
case 2:echo "希望能有比较长久的关系";break;
case 3:echo "相信真正的爱情能永恒";break;
case 4:echo "不在乎天长地久，只在乎曾经拥有";break;
case 5:echo "顺其自然，感情不能强求";break;
}?></div>
			<div class="userdata_extMl">我的经济状况：</div>
			<div class="userdata_extMr"><?php
switch ($row['b8']){ 
case 1:echo "除了钱，什么都有";break;
case 2:echo "目前什么都没有，以后会有的";break;
case 3:echo "有些存款";break;
case 4:echo "有存款，有房";break;
case 5:echo "有存款，有房有车";break;
case 6:echo "钱不用担心，我很富裕";break;
}?></div>
			<div class="userdata_extMl">对方的家庭重要吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b9']){ 
case 1:echo "最好有富裕的家庭";break;
case 2:echo "大家处得来就行";break;
case 3:echo "不能负担太重";break;
case 4:echo "无所谓，和我无关";break;
case 5:echo "只要相爱，什么样都行";break;
}?></div>
			<div class="userdata_extMl">我的消费观：</div>
			<div class="userdata_extMr"><?php
switch ($row['b10']){ 
case 1:echo "吃光用光花光";break;
case 2:echo "用一些，存一些";break;
case 3:echo "买些必需品，其余存起来";break;
case 4:echo "能省则省，该花则花";break;
case 5:echo "有人说我吝啬，我觉得是节省";break;
}?></div>
			<div class="userdata_extMl">我对现在工作的态度：</div>
			<div class="userdata_extMr"><?php
switch ($row['b11']){ 
case 1:echo "工作狂";break;
case 2:echo "积极，认真";break;
case 3:echo "上进，有事业心";break;
case 4:echo "8小时内尽心尽力";break;
case 5:echo "挣钱的手段而已";break;
case 6:echo "混日子，糊弄领导";break;
case 7:echo "盼着退休";break;
case 8:echo "目前的工作不适合我";break;
case 9:echo "现在没工作";break;
}?></div>
			<div class="userdata_extMl">会打小孩吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b12']){ 
case 1:echo "不赞成，不会打";break;
case 2:echo "很少，除非太过份";break;
case 3:echo "轻轻打，警告一下";break;
case 4:echo "打是一种教育手段";break;
case 5:echo "棍棒出孝子";break;
}?></div>
			<div class="userdata_extMl">家庭卫生：</div>
			<div class="userdata_extMr"><?php
switch ($row['b13']){ 
case 1:echo "不太在乎";break;
case 2:echo "不太乱就行";break;
case 3:echo "喜欢整洁";break;
case 4:echo "喜欢别人打扫干净";break;
case 5:echo "有洁癖";break;
case 6:echo "先弄乱再收拾";break;
}?></div>
			<div class="userdata_extMl">爱养宠物吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['b14']){ 
case 1:echo "最好不要";break;
case 2:echo "只喜欢鱼、鸟等";break;
case 3:echo "喜欢狗，猫等";break;
case 4:echo "最好办个动物园";break;
case 5:echo "你可以养，别让我照顾";break;
}?></div>
			<div class="userdata_extMl">异性密友：</div>
			<div class="userdata_extMr"><?php
switch ($row['b15']){ 
case 1:echo "婚后最好不要有了";break;
case 2:echo "你可以有，让我知道就行";break;
case 3:echo "你可以有，但别让我知道";break;
case 4:echo "可以，只要别冷落我";break;
case 5:echo "各有各的，互不干涉";break;
case 6:echo "成为共同的朋友";break;
}?></div>
			<div class="userdata_extMl">希望婚后的家庭关系：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b16']));?></div>
			<div class="userdata_extMl">我觉得两人相处最重要的是：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b17']));?></div>
			<div class="userdata_extMl">我希望的结婚后的生活圈：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b18']));?></div>
			<div class="userdata_extMl">我最看重对方的：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['b19']));?></div>
			<div class="clear"></div>
		</div>
<?php } if (!empty($row['c2']) && $cook_grade > 2) {?>
		<!-- 红尘知己 -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>红尘知己资料</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a7.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">我现在住在：</div>
			<div class="userdata_extMr"><?php
switch ($row['c1']){ 
case 1:echo "一个人住，很方便";break;
case 2:echo "和父母住";break;
case 3:echo "和别人合住，不方便";break;
case 4:echo "和别人住，但找间房子很容易";break;
}?></div>
			<div class="userdata_extMl">认为自己性感吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['c2']){ 
case 1:echo "一定迷住你，挺性感的";break;
case 2:echo "虽然不漂亮，但有魅力";break;
case 3:echo "一般";break;
case 4:echo "有人这么说，不知道你觉得怎么样";break;
case 5:echo "不知道";break;
}?></div>
			<div class="userdata_extMl">我在性爱方面的经验：</div>
			<div class="userdata_extMr"><?php
switch ($row['c3']){ 
case 1:echo "从没有经验";break;
case 2:echo "试过几次";break;
case 3:echo "算是过来人";break;
case 4:echo "很有经验";break;
case 5:echo "行家里手";break;
}?></div>
			<div class="userdata_extMl">我对待性爱的态度是：</div>
			<div class="userdata_extMr"><?php
switch ($row['c4']){ 
case 1:echo "人生最快乐的事";break;
case 2:echo "生活中最重要的事之一";break;
case 3:echo "食，色性也，没有不行";break;
case 4:echo "宁缺无滥";break;
case 5:echo "喜欢才要";break;
case 6:echo "可有可无";break;
}?></div>
			<div class="userdata_extMl">在性爱中乐于尝试吗：</div>
			<div class="userdata_extMr"><?php
switch ($row['c5']){ 
case 1:echo "羞于主动尝试，愿意配合对方";break;
case 2:echo "传统，保守";break;
case 3:echo "只接受正常方式";break;
case 4:echo "只要喜欢，可以试试";break;
case 5:echo "喜欢新奇";break;
case 6:echo "没有我没试过的";break;
}?></div>
			<div class="userdata_extMl">我认为性和爱的关系是：</div>
			<div class="userdata_extMr"><?php
switch ($row['c6']){ 
case 1:echo "有性才有爱";break;
case 2:echo "有爱才有性";break;
case 3:echo "性和爱无关";break;
}?></div>
			<div class="userdata_extMl">我认为性感主要体现在对方的：</div>
			<div class="userdata_extMr"><?php
switch ($row['c7']){ 
case 1:echo "脸蛋";break;
case 2:echo "身材";break;
case 3:echo "表情";break;
case 4:echo "语言";break;
case 5:echo "动作";break;
case 6:echo "打扮";break;
case 7:echo "态度";break;
}?></div>
			<div class="userdata_extMl">在性爱中，我往往是：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c8']));?></div>
			<div class="userdata_extMl">我在寻找：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c9']));?></div>
			<div class="userdata_extMl">什么比较能调动我的兴致：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c10']));?></div>
			<div class="userdata_extMl">我能够接受(和我的伴侣)：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['c11']));?></div>
			<div class="clear"></div>
		</div>	
<?php } if (!empty($row['d3'])) {?>
		<!-- 以商会友 -->
		<div class="wspace"></div>
	  <div class="rightTitle"><h4>以商会友资料</h4><?php if ($cook_userid == $uid){ ?><a href="<?php echo $Global['my_2domain']; ?>/?a8.php" target="_blank" >>>修改</a><?php }?></div>
		<div class="rightContent ul2" style="padding:10px 0 10px 0">
			<div class="userdata_extMl">以商会友目的：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d1']));?></div>
			<div class="userdata_extMl">公司/机构名称：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d2']));?></div>
			<div class="userdata_extMl">职务分类：</div>
			<div class="userdata_extMr"><?php
switch ($row['d3']){ 
case 1:echo "经营管理";break;
case 2:echo "项目管理";break;
case 3:echo "人力资源";break;
case 4:echo "行政后勤";break;
case 5:echo "财务/审计";break;
case 6:echo "信息/资料管理";break;
case 7:echo "工程师(计算机硬件)";break;
case 8:echo "工程师(计算机软件)";break;
case 9:echo "工程师(计算机网络)";break;
case 10:echo "工程师(系统与安全)";break;
case 11:echo "工程师(其他)";break;
case 12:echo "工程/技术助理";break;
case 13:echo "网站管理/策划/设计";break;
case 14:echo "建筑/园林/室内设计";break;
case 15:echo "商业设计/创意";break;
case 16:echo "研发";break;
case 17:echo "生产管理";break;
case 18:echo "工程管理";break;
case 19:echo "生产工艺/设备";break;
case 20:echo "质量控制";break;
case 21:echo "技工/施工/操作人员";break;
case 22:echo "工程造价/预决算";break;
case 23:echo "农林牧渔";break;
case 24:echo "市场营销/商务拓展";break;
case 25:echo "市场调查与分析";break;
case 26:echo "广告/公关/媒介";break;
case 27:echo "销售/贸易";break;
case 28:echo "报关/跟单";break;
case 29:echo "电子商务";break;
case 30:echo "客户服务";break;
case 31:echo "采购";break;
case 32:echo "运输/物流/仓储";break;
case 33:echo "金融保险专业人员";break;
case 34:echo "金融保险经纪人";break;
case 35:echo "律师/法务人员";break;
case 36:echo "猎头/人才中介";break;
case 37:echo "顾问";break;
case 38:echo "策划";break;
case 39:echo "培训师";break;
case 40:echo "翻译";break;
case 41:echo "记者/新闻工作者";break;
case 42:echo "编辑/文字/文案";break;
case 43:echo "传播/发行";break;
case 44:echo "文艺制作";break;
case 45:echo "演艺人员";break;
case 46:echo "演艺/体育经纪人";break;
case 47:echo "导游";break;
case 48:echo "教练/运动员";break;
case 49:echo "医生/医师/护理人员";break;
case 50:echo "美容/保健/营养师";break;
case 51:echo "兽医/动物管理/园艺";break;
case 52:echo "安全保卫";break;
case 53:echo "服务业管理";break;
case 54:echo "服务业技术人员";break;
case 55:echo "服务人员";break;
case 56:echo "教师/教育工作者";break;
case 57:echo "义工/社团工作者";break;
case 58:echo "公务员";break;
case 59:echo "私营企业主";break;
case 60:echo "自由职业者";break;
case 61:echo "培训生";break;
case 62:echo "在校学生";break;
case 63:echo "其他";break;
}?></div>
			<div class="userdata_extMl">职位等级：</div>
			<div class="userdata_extMr"><?php
switch ($row['d4']){ 
case 1:echo "初期阶段(2年以内工作经验)";break;
case 2:echo "中级阶段(2-5年工作经验)";break;
case 3:echo "高级阶段(5年以上工作经验/经理或专才)";break;
case 4:echo "总监";break;
case 5:echo "高级管理级别(CEO, EVP, GM)";break;
case 6:echo "其他";break;
}?></div>
			<div class="userdata_extMl">职务名称：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d5']));?></div>
			<div class="userdata_extMl">产业类别：</div>
			<div class="userdata_extMr"><?php
switch ($row['d6']){ 
case 1:echo "互联网/电子商务";break;
case 2:echo "计算机硬件";break;
case 3:echo "计算机软件";break;
case 4:echo "集成电路";break;
case 5:echo "电子";break;
case 6:echo "计算机外设";break;
case 7:echo "光电通信";break;
case 8:echo "光学精密";break;
case 9:echo "通讯";break;
case 10:echo "电机电工";break;
case 11:echo "多媒体";break;
case 12:echo "制药/医疗设备/生物工程";break;
case 13:echo "仪器/仪表/工业自动化";break;
case 14:echo "金融/投资/证券";break;
case 15:echo "法律/会计";break;
case 16:echo "人才中介";break;
case 17:echo "咨询/专业服务";break;
case 18:echo "市场/广告/公关";break;
case 19:echo "广播/影视";break;
case 20:echo "传媒/新闻出版";break;
case 21:echo "保险业";break;
case 22:echo "建筑/房地产";break;
case 23:echo "物业管理";break;
case 24:echo "娱乐/运动/休闲";break;
case 25:echo "批发/零售";break;
case 26:echo "医疗/保健/卫生服务";break;
case 27:echo "旅游/酒店/餐饮服务";break;
case 28:echo "贸易";break;
case 29:echo "运输/物流/快递";break;
case 30:echo "艺术/文化";break;
case 31:echo "中介/服务业";break;
case 32:echo "机械/机电/重工业";break;
case 33:echo "食品/饮料/烟酒";break;
case 34:echo "办公/文教/安防";break;
case 35:echo "农林畜牧渔";break;
case 36:echo "五金/金属制品业";break;
case 37:echo "环保";break;
case 38:echo "化工/橡塑/精细化工";break;
case 39:echo "纺织/服装/服饰";break;
case 40:echo "车辆/机械动力";break;
case 41:echo "家具/室内设计/装潢";break;
case 42:echo "玻璃/陶瓷";break;
case 43:echo "家电业";break;
case 44:echo "工艺品/玩具";break;
case 45:echo "纸品/印刷/包装";break;
case 46:echo "电力/电气/能源";break;
case 47:echo "矿产/冶金";break;
case 48:echo "航空/航天研究与制造";break;
case 49:echo "其他制造";break;
case 50:echo "培训机构/教育/科研院所";break;
case 51:echo "政府/公共事业";break;
case 52:echo "非盈利机构(协会/社团)";break;
case 53:echo "其他";break;
}?></div>
			<div class="userdata_extMl">学校科系：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d7']));?></div>
			<div class="userdata_extMl">熟悉领域：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d8']));?></div>
			<div class="userdata_extMl">专长兴趣：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d9']));?></div>
			<div class="userdata_extMl">往来机构：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d10']));?></div>
			<div class="userdata_extMl">工作经历：</div>
			<div class="userdata_extMr"><?php echo htmlout(stripslashes($row['d11']));?></div>
			<div class="clear"></div>
		</div>	
<?php }}?>
		<!-- 扩展资料结束 -->	
	</div>
	<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php'?>