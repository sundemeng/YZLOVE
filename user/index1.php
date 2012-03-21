<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 2;
if ( (!ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$k=!ereg("^[1-5]{1}$",$k)?$k=3:$k;
$s=!ereg("^[1-6]{1}$",$s)?$s=1:$s;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>征婚 网上征婚启事</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main {width:980px;margin:0px auto;margin-top:5px}/* height:1300px; */
.main .left{float:left;width:715px}/* ;height:1200px */
.main .left .title{width:715px;height:26px;margin:5px 0 0 0;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.main .left .title .uTli{background-image:url(../images/uTli.gif)}
.main .left .title .uTliSelect{background-image:url(../images/uTliSelect.gif)}
.main .left .title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.main .left .title .uTliSelect a:hover{color:#ff0}
.main .left .title .uTliBlank{float:left;width:135px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.main .left .title .uTliPage{float:left;width:155px;height:26px;text-align:right}
.main .left .title .uTliPage .Pl{float:left}
.main .left .title .uTliPage .Pr{float:right}
.main .left .titleline{width:715px;height:9px;font-size:0;background-image:url(../images/titleline.gif)}
.main .left .Ctop {width:715px;height:34px;border-bottom:#ddd 1px solid;text-align:left;margin:0 0 10px 0}
.main .left .Ctop .L,.main .left .Ctop .M,.main .left .Ctop .R{float:left;height:34px;}
.main .left .Ctop .L{width:85px;height:25px;padding:9px 0 0 0}
.main .left .Ctop .M{width:560px;line-height:34px;color:#ccc;padding:0 0 0 5px}
.main .left .Ctop .R{width:65px;height:28px;padding:6px 0 0 0;text-align:right}
.main .left .Ctop .M a{text-decoration:none;color:#444}
.main .left .Ctop .M a:hover{text-decoration:none;color:#6F9F00;border-bottom:#6F9F00 2px solid}
.main .left .Ctop .M a.aselect{text-decoration:none;color:#6F9F00;border-bottom:#6F9F00 2px solid}
.main .left .Ctop .M a.aselect:hover{color:#f60;border-bottom:#f60 2px solid}
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
.main .left .page{width:715px;height:20px;padding:10px 0 0 0;margin:0px auto;margin:0 0 25px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
.main .right{float:right;width:250px/* ;height:1200px */}
.main .right .T{width:250px;height:32px;background-image:url(../images/g_r_tbg.gif)}
.main .right .T .li1{float:left;width:76px;color:#982E00;font-weight:bold;padding:13px 0 0 9px}
.main .right .T .li2{float:left;width:65px;padding:8px 0 0 0}
.main .right .T .li3{float:left;width:91px;text-align:right;padding:8px 0 0 0}
.main .right .C {width:228px;height:235px;border-left:1px #ddd solid;border-right:1px #ddd solid;border-bottom:1px #ddd solid;padding:10px}
.main .right .C .li{width:206px;height:30px;line-height:30px;text-align:left;background-image:url(../images/dating_libg.gif);padding:0 0 0 22px}
.main .right .C .bgli{background-image:url(../images/g_p_libg.gif)}
.main .right .C .li .li1{float:left;width:173px;color:#666}
.main .right .C .li .li22{float:left;width:33px;height:25px;padding-top:5px}
.main .right .margin5{margin:5px 0 0 0}
.main .right .Csearch {height:400px}
.main .right .Csearch .Sli {width:228px;height:26px;color:#666}
.Sli1,.Sli2{float:left;height:26px;line-height:26px}
.main .right .Csearch .Sli .Sli1{width:63px;text-align:right;padding:0 5px 0 0}
.main .right .Csearch .Sli .Sli2{width:160px;text-align:left;overflow:hidden}
.main .right .Csearch .form{height:20px;padding:10px 0 10px 0}
.main .right .Csearch .Sinput{border:#ddd 1px solid;background:#FAFAFA;height:17px;line-height:17px;color:#999}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main">
<!-- 左侧 -->
	<div class="left">
		<?php
		switch ($s){ 
		case 1:$tmpsubsql = "";break;
		case 2:$tmpsubsql = " grade>1 AND ";break;
		case 3:$tmpsubsql = " sex=1 AND ";break;
		case 4:$tmpsubsql = " sex=2 AND ";break;
		case 5:$tmpsubsql = " photo_s<>'' AND ";break;
		case 6:$tmpsubsql = " video_s<>'' AND ";break;
		}
		$Tfield = "id,username,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
		$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE kind=$k AND $tmpsubsql flag=1 ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 500";
		$rt=$db->query($tmpsql);
		if ($db->num_rows($rt)){
			$total = $db->num_rows($rt);
			require_once YZLOVE.'sub/fundata.php';
			$data = new yzlove_data;
			require_once YZLOVE.'sub/classcool.php';
			$pagesize = 14;
			if ($p<1)$p=1;
			$mypage = new zeaipage($total,$pagesize);
			$pagelistX = $mypage->pagebar(2);
			$pagelist  = $mypage->pagebar();
			mysql_data_seek($rt,($p-1)*$pagesize);
		}
		?>
	 	<div class="title">
			<div class="<?php echo ($k==3)?'uTliSelect':'uTli'; ?>" title="交友目的：婚姻恋爱"><a href="./?k=3">婚姻恋爱</a></div>
			<div class="<?php echo ($k==2)?'uTliSelect':'uTli'; ?>" title="交友目的：约会交友"><a href="./?k=2">约会交友</a></div>
			<div class="<?php echo ($k==4)?'uTliSelect':'uTli'; ?>" title="交友目的：红尘知己"><a href="./?k=4">红尘知己</a></div>
			<div class="<?php echo ($k==5)?'uTliSelect':'uTli'; ?>" title="交友目的：以商会友"><a href="./?k=5">以商会友</a></div>
			<div class="<?php echo ($k==1)?'uTliSelect':'uTli'; ?>" title="交友目的：都可以"><a href="./?k=1">不限类型</a></div>
			<div class="uTliBlank">默认显示前500名会员</div>
			<div class="uTliPage"><div class="Pl"></div><div class="Pr"><?php echo $pagelistX; ?></div></div>
		</div>
		<div class="titleline"></div>
		<div class="Ctop">
			<div class="L"><img src="../images/g_r_px.gif" align="absmiddle" /> 排序方式：</div>
			<div class="M"><a href="./?k=<?php echo $k; ?>&s=1" title="默认排序规则：竞价排名->活跃程度" <?php echo ($s==1)?'class=aselect':''; ?>>默认排序</a>　|　<a href="./?k=<?php echo $k; ?>&s=2"  <?php echo ($s==2)?'class=aselect':''; ?>>高级会员</a>　|　<a href="./?k=<?php echo $k; ?>&s=3" <?php echo ($s==3)?'class=aselect':''; ?>>男士</a>　|　<a href="./?k=<?php echo $k; ?>&s=4" <?php echo ($s==4)?'class=aselect':''; ?>>女士</a>　|　<a href="./?k=<?php echo $k; ?>&s=5" <?php echo ($s==5)?'class=aselect':''; ?>>有照片</a>　|　<a href="./?k=<?php echo $k; ?>&s=6" <?php echo ($s==6)?'class=aselect':''; ?>>有视频</a></div>
			<div class="R"><a href="search.php"><img src="../images/gdpx.gif" border="0" /></a></div>
		</div>
		<?php	
		if ($total > 0){
			for($i=1;$i<=$pagesize;$i++) {
				$rows = $db->fetch_array($rt);
				if(!$rows) break;
				$uid = $rows['id'];
				$id = $uid*7+8848;
				$username = badstr($rows['username']);
				$nickname = badstr($rows['nickname']);
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
				if ($zhenghun_jingjia > 0){
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
		<?php }} else {echo '<h6>暂无信息</h6>';}?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	</div>
<!-- 右侧 -->
	<div class="right">
	  <div class="T margin5">
			<div class="li1">快速搜索</div>
			<div class="li2"><a href="/my/?e_dating_add.php"></a></div>
			<div class="li3"><a href="/user/search.php"><img src="../images/g_r_detail.gif" border="0" /></a></div>
	  </div>
		<div class="C Csearch">
			<div class="form">
			<form action="searchlist.php" method="get" name="yzloveform">
			<input type="hidden" name="t" value="1" /><input name="k" type="text" class="Sinput" maxlength="50" onClick="javascript:yzloveform.k.value=''" value="按用户名/昵称搜索"> <input type="image" src="../images/sox.gif" align=absmiddle />
			</form>
			</div>
			<form method=get action="searchlist.php" name=myform>
			<div class="Sli">
				<div class="Sli1">我要找:</div>
				<div class="Sli2"><input type="radio" name="sex" id="sex1" value="1" />
			    <label for="sex1">男朋友</label><input name="sex" id="sex2" type="radio" value="2" checked="checked" /><label for="sex2">女朋友</label></div>
			</div>
			<div class="Sli">
				<div class="Sli1">照　片:</div>
				<div class="Sli2"><input name="photo" id="photo" type="checkbox" value="1" checked="checked" /><label for="photo">有照片</label><script language="javascript" type="text/javascript">
cityArray = new Array();
cityArray[0] = new Array("北京","东城|西城|崇文|宣武|朝阳|丰台|石景山|海淀|门头沟|房山|通州|顺义|昌平|大兴|平谷|怀柔|密云|延庆");
cityArray[1] = new Array("上海","黄浦|卢湾|徐汇|长宁|静安|普陀|闸北|虹口|杨浦|闵行|宝山|嘉定|浦东|金山|松江|青浦|南汇|奉贤|崇明");
cityArray[2] = new Array("天津","和平|东丽|河东|西青|河西|津南|南开|北辰|河北|武清|红挢|塘沽|汉沽|大港|宁河|静海|宝坻|蓟县");
cityArray[3] = new Array("重庆","万州|涪陵|渝中|大渡口|江北|沙坪坝|九龙坡|南岸|北碚|万盛|双挢|渝北|巴南|黔江|长寿|綦江|潼南|铜梁 |大足|荣昌|壁山|梁平|城口|丰都|垫江|武隆|忠县|开县|云阳|奉节|巫山|巫溪|石柱|秀山|酉阳|彭水|江津|合川|永川|南川");
cityArray[4] = new Array("河北","石家庄|邯郸|邢台|保定|张家口|承德|廊坊|唐山|秦皇岛|沧州|衡水");
cityArray[5] = new Array("山西","太原|大同|阳泉|长治|晋城|朔州|吕梁|忻州|晋中|临汾|运城");
cityArray[6] = new Array("内蒙古","呼和浩特|包头|乌海|赤峰|呼伦贝尔盟|阿拉善盟|哲里木盟|兴安盟|乌兰察布盟|锡林郭勒盟|巴彦淖尔盟|伊克昭盟");
cityArray[7] = new Array("辽宁","沈阳|大连|鞍山|抚顺|本溪|丹东|锦州|营口|阜新|辽阳|盘锦|铁岭|朝阳|葫芦岛");
cityArray[8] = new Array("吉林","长春|吉林|四平|辽源|通化|白山|松原|白城|延边");
cityArray[9] = new Array("黑龙江","哈尔滨|齐齐哈尔|牡丹江|佳木斯|大庆|绥化|鹤岗|鸡西|黑河|双鸭山|伊春|七台河|大兴安岭");
cityArray[10] = new Array("江苏","扬州|高邮|江都|仪征|宝应|南京|镇江|苏州|南通|扬州|盐城|徐州|连云港|常州|无锡|宿迁|泰州|淮安");
cityArray[11] = new Array("浙江","杭州|宁波|温州|嘉兴|湖州|绍兴|金华|衢州|舟山|台州|丽水");
cityArray[12] = new Array("安徽","合肥|芜湖|蚌埠|马鞍山|淮北|铜陵|安庆|黄山|滁州|宿州|池州|淮南|巢湖|阜阳|六安|宣城|亳州");
cityArray[13] = new Array("福建","福州|厦门|莆田|三明|泉州|漳州|南平|龙岩|宁德");
cityArray[14] = new Array("江西","南昌|景德镇|九江|鹰潭|萍乡|新馀|赣州|吉安|宜春|抚州|上饶");
cityArray[15] = new Array("山东","济南|青岛|淄博|枣庄|东营|烟台|潍坊|济宁|泰安|威海|日照|莱芜|临沂|德州|聊城|滨州|菏泽");
cityArray[16] = new Array("河南","郑州|开封|洛阳|平顶山|安阳|鹤壁|新乡|焦作|濮阳|许昌|漯河|三门峡|南阳|商丘|信阳|周口|驻马店|济源");
cityArray[17] = new Array("湖北","武汉|宜昌|荆州|襄樊|黄石|荆门|黄冈|十堰|恩施|潜江|天门|仙桃|随州|咸宁|孝感|鄂州");
cityArray[18] = new Array("湖南","长沙|常德|株洲|湘潭|衡阳|岳阳|邵阳|益阳|娄底|怀化|郴州|永州|湘西|张家界");
cityArray[19] = new Array("广东","广州|深圳|珠海|汕头|东莞|中山|佛山|韶关|江门|湛江|茂名|肇庆|惠州|梅州|汕尾|河源|阳江|清远|潮州|揭阳|云浮");
cityArray[20] = new Array("广西","南宁|柳州|桂林|梧州|北海|防城港|钦州|贵港|玉林|南宁地区|柳州地区|贺州|百色|河池");
cityArray[21] = new Array("海南","海口|三亚");
cityArray[22] = new Array("四川","成都|绵阳|德阳|自贡|攀枝花|广元|内江|乐山|南充|宜宾|广安|达川|雅安|眉山|甘孜|凉山|泸州");
cityArray[23] = new Array("贵州","贵阳|六盘水|遵义|安顺|铜仁|黔西南|毕节|黔东南|黔南");
cityArray[24] = new Array("云南","昆明|大理|曲靖|玉溪|昭通|楚雄|红河|文山|思茅|西双版纳|保山|德宏|丽江|怒江|迪庆|临沧");
cityArray[25] = new Array("西藏","拉萨|日喀则|山南|林芝|昌都|阿里|那曲");
cityArray[26] = new Array("陕西","西安|宝鸡|咸阳|铜川|渭南|延安|榆林|汉中|安康|商洛");
cityArray[27] = new Array("甘肃","兰州|嘉峪关|金昌|白银|天水|酒泉|张掖|武威|定西|陇南|平凉|庆阳|临夏|甘南");
cityArray[28] = new Array("宁夏","银川|石嘴山|吴忠|固原");
cityArray[29] = new Array("青海","西宁|海东|海南|海北|黄南|玉树|果洛|海西");
cityArray[30] = new Array("新疆","乌鲁木齐|石河子|克拉玛依|伊犁|巴音郭勒|昌吉|克孜勒苏柯尔克孜|博尔塔拉|吐鲁番|哈密|喀什|和田|阿克苏");
cityArray[31] = new Array("香港","香港特别行政区");
cityArray[32] = new Array("澳门","澳门特别行政区");
cityArray[33] = new Array("台湾","台北|高雄|台中|台南|屏东|南投|云林|新竹|彰化|苗栗|嘉义|花莲|桃园|宜兰|基隆|台东|金门|马祖|澎湖");
cityArray[34] = new Array("海外","海外");
function getCity(currProvince){
var currProvince = currProvince;
var i,j,k;
document.getElementsByTagName("*").selCity.length = 0 ;
for (i = 0 ;i <cityArray.length;i++){  
if(cityArray[i][0]==currProvince){  
tmpcityArray = cityArray[i][1].split("|")
for(j=0;j<tmpcityArray.length;j++){
document.getElementsByTagName("*").selCity.options[document.getElementsByTagName("*").selCity.length] = new Option(tmpcityArray[j],tmpcityArray[j]);

}}}}
</script></div>
			</div>
			<div class="Sli">
				<div class="Sli1">地　区:</div>
				<div class="Sli2">
			    <select id="selProvince" name='province' onChange = "getCity(this.options[this.selectedIndex].value)">
<option value="">不限</option>
<option value="江苏">江苏</option>
<option value="北京">北京</option>
<option value="上海">上海</option>
<option value="天津">天津</option>
<option value="重庆">重庆</option>
<option value="河北">河北</option>
<option value="山西">山西</option>
<option value="辽宁">辽宁</option>
<option value="吉林">吉林</option>
<option value="浙江">浙江</option>
<option value="安徽">安徽</option>
<option value="福建">福建</option>
<option value="江西">江西</option>
<option value="山东">山东</option>
<option value="河南">河南</option>
<option value="湖北">湖北</option>
<option value="湖南">湖南</option>
<option value="广东">广东</option>
<option value="广西">广西</option>
<option value="海南">海南</option>
<option value="四川">四川</option>
<option value="贵州">贵州</option>
<option value="云南">云南</option>
<option value="西藏">西藏</option>
<option value="陕西">陕西</option>
<option value="甘肃">甘肃</option>
<option value="宁夏">宁夏</option>
<option value="青海">青海</option>
<option value="新疆">新疆</option>
<option value="内蒙古">内蒙古</option>
<option value="黑龙江">黑龙江</option>
<option value="香港">香港</option>
<option value="澳门">澳门</option>
<option value="台湾">台湾</option>
<option value="海外">海外</option>
</select><select id="selCity" name='city' style="width:62px">
<option>不限</option>
</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">年　龄:</div>
				<div class="Sli2"><select name="birthday1" style="width:50px"><option value="">不限</option><?php for($i=18;$i<=75;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 到 <select name="birthday2" style="width:50px"><option value="">不限</option><?php for($i=18;$i<=75;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 岁</div>
			</div>
			<div class="Sli">
				<div class="Sli1">身　高:</div>
				<div class="Sli2"><select name="heigh1" style="width:50px"><option value="">不限</option><?php for($i=140;$i<=200;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 到 <select name="heigh2" style="width:50px"><option value="">不限</option><?php for($i=140;$i<=200;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 厘米(cm)</div>
			</div>
			<div class="Sli">
				<div class="Sli1">体　重:</div>
				<div class="Sli2"><select name="weigh1" style="width:50px"><option value="">不限</option><?php for($i=30;$i<=100;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 到 <select name="weigh2" style="width:50px"><option value="">不限</option><?php for($i=30;$i<=100;$i++) {?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select> 公斤</div>
			</div>
			<div class="Sli">
				<div class="Sli1">学　历:</div>
				<div class="Sli2">
			    <select name="edu" style="width:124px">
                <option value="">不限</option>
                <option value="1">初中及以下</option>
                <option value="2">高中或中专及以上</option>
                <option value="3">大专及以上</option>
                <option value="4">本科及以上</option>
                <option value="5">硕士及以上</option>
                <option value="6">博士及以上</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">婚　姻:</div>
				<div class="Sli2">
			    <select name="love" style="width:124px">
                <option value="">不限</option>
                <option value="1">未婚</option>
                <option value="2">已婚</option>
                <option value="3">离异有子女</option>
                <option value="4">离异无子女</option>
                <option value="5">丧偶有子女</option>
                <option value="6">丧偶无子女</option>
                <option value="7">保密</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">职　业:</div>
				<div class="Sli2">
			    <select name="job" style="width:124px">
                <option value="">不限</option>
                <option value="1">企业管理人员</option>
                <option value="2">专家/教授</option>
                <option value="3">工程/技术人员</option>
                <option value="4">市场/销售人员</option>
                <option value="5">行政人员/文职秘书</option>
                <option value="6">普通职员</option>
                <option value="7">机关干部/公务人员</option>
                <option value="8">艺术家/演员</option>
                <option value="9">教师</option>
                <option value="10">工人</option>
                <option value="11">农民</option>
                <option value="12">军人</option>
                <option value="13">学生</option>
                <option value="14">自由职业者</option>
                <option value="15">离/退休人员</option>
                <option value="16">失业/无业</option>
                <option value="17">其他</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">收　入:</div>
				<div class="Sli2">
				<select name="pay" style="width:124px">
				<option value="">不限</option>
				<option value="1">600元以下</option>
				<option value="2">600-799元</option>
				<option value="3">800-999元</option>
				<option value="4">1000-1499元</option>
				<option value="5">1500-1999元</option>
				<option value="6">2000-2999元</option>
				<option value="7">3000-3999元</option>
				<option value="8">4000-4999元</option>
				<option value="9">5000-5999元</option>
				<option value="10">6000-6999元</option>
				<option value="11">7000-9999元</option>
				<option value="12">10000-19999元</option>
				<option value="13">20000元以上</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">住　房:</div>
				<div class="Sli2">
			    <select name=house style="width:124px">
                <option value="">不限</option>
                <option value="1">有婚房</option>
                <option value="2">有能力购房</option>
                <option value="3">无婚房</option>
                <option value="4">无婚房但可解决</option>
                <option value="5">无婚房希望对方解决</option>
                <option value="6">无婚房希望双方解决</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">目　的:</div>
				<div class="Sli2">
				<select name="kind" style="width:124px">
				<option value="">不限</option>
				<option value="1">都可以</option>
				<option value="2">约会交友</option>
				<option value="3">婚姻恋爱</option>
				<option value="4">浪漫情人</option>
				<option value="5">以商会友</option>
				</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"></div>
				<div class="Sli2" style="padding:5px 0 0 0"><input type="image" src="../images/so.gif"></div>
			</div>
			</form>
		</div>
  </div>
</div>
<div class="clear"></div>









<?php require_once YZLOVE.'bottom.php';?>
