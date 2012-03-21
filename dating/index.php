<?php require_once '../sub/init.php';$navvar = 6;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[0-7]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_area2']; ?>约会 私人约会网</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:258px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .left{float:left;width:732px;padding:5px;border:#ccc 1px solid}/* 744px */
.main .center{float:left;width:24px;height:440px;background-image:url(images/centerbg.gif);background-repeat:no-repeat}/* 24px */
.main .right{float:left;width:200px;height:440px;padding:5px;border:#ccc 1px solid}/* 212px */
.main .right .rbox{width:200px;height:419px;background-image:url(images/rightbg.gif);color:#666;padding:25px 0 0 0}
.main .right .rbox .Sli {width:200px;height:30px;color:#666}
.Sli1,.Sli2{float:left;height:30px}
.main .right .rbox .Sli .Sli1{width:84px;height:27px;text-align:right;padding:3px 5px 0 0;color:#FF3399}
.main .right .rbox .Sli .Sli2{width:111px;text-align:left;overflow:hidden}
.main .right .rbox .Sli .Sli2 select{width:85px}
.main .right .rbox .BB1 {width:200px;height:50px;padding:40px 0 0 0}
.main .right .rbox .BB2 {width:200px;height:40px;line-height:25px}
.main .right .rbox .BB2 a{text-decoration:underline;color:#f39}
.main .right .rbox .BB2 a:hover{color:#6F9F00}
.main .left .hr{width:710px;height:1px;margin:0px auto;font-size:0;overflow:hidden;background:#ddd;margin-top:10px;margin-bottom:10px;}
.main .left .ul{width:710px;min-height:135px;color:#444;margin:0px auto}/* height:135px; */
.DL,.DC,.DR{float:left}
.main .left .ul .DL{width:110px;height:135px;margin:0 10px 0 0;background:#fff;border:#ddd 1px solid;padding:2px}
.main .left .ul .DL img{width:110px;height:135px}
.main .left .ul .DC{width:460px;margin:0 10px 0 0}
.main .left .ul .DR{width:110px;height:135px;background-image:url(images/datebg.gif)}
.DC dl{text-align:left;font-family:Verdana}
.DC dl dd{line-height:22px}
.DC dl dt{height:22px;color:#666;font-weight:bold}
.DC dl dt a{color:#DF2C91;text-decoration:underline}
.DC dl dt a:hover{color:#6F9F00}
.DC dl dd a{text-decoration:underline}
.DC dl dt .red{color:#6F9F00}
.DC dl dd span{float:left;width:60px;text-align:right;padding:0 5px 0 0;color:#666}
.DC dl dd em{float:left;width:395px;color:#666}
.DR h1,.DR h2,.DR h3,.DR h4{display:block;font-weight:normal;color:#666;font-size:12px;font-family:Verdana}
.DR h1{height:30px;line-height:30px;margin:15px 0 0 0}
.DR h2{height:20px;line-height:20px}
.DR h3{height:24px;line-height:24px}
.DR h4{height:20px;margin:5px 0 0 0}
.DR h1 span{font-family:Verdana;color:#DF2C91;font-size:18px;font-weight:bold}
.DR h1 p{font-family:Verdana;color:#DF2C91;font-size:11px;font-weight:bold;display:inline}
.DR a{font-family:Verdana;text-decoration:underline;color:#DF2C91;font-size:11px;}
.DR a:hover{color:#6F9F00}
a.sex1{color:#06c}
a.sex2{color:#FF5494}
.main .left .page{width:710px;height:20px;padding:20px 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .left .page .Pl{float:left}
.main .left .page .Pr{float:right}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0 || $t==6 || $t==7)?'uTliSelect':'uTli'; ?>"><a href="./">约会1+1</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">喝茶小叙</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">共进晚餐</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">相约出游</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">看电影</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTli'; ?>"><a href="./?t=5">欢唱K歌</a></div>
	<div class="uTliBlank">输入约会名称(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('请输入约会名称!');
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
<!--loop start -->
		<?php 
		switch ($t){ 
			case 1:$tmpsubsql = " a.kind=1 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 2:$tmpsubsql = " a.kind=2 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 3:$tmpsubsql = " a.kind=3 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 4:$tmpsubsql = " a.kind=4 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 5:$tmpsubsql = " a.kind=5 AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 6:$k  = trimm($k);$tmpsubsql = " a.title LIKE '%".$k."%' AND ";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
			case 7:
			$tmpsubsql = '';
			$tmpsubsql .= preg_match("^[1-2]{1}$",$Ssex)?" b.sex=$Ssex AND ":'';
			if (preg_match("^[1-3]{1}$",$Syhtime)){
			if ($Syhtime == 1){
			$Syhtime = $Syhtime*86400*3;
			} elseif ($Syhtime == 2){
			$Syhtime = $Syhtime*86400*7;
			} elseif ($Syhtime == 3){
			$Syhtime = $Syhtime*86400*30;
			}
			$tmpsubsql .= " (a.yhtime - unix_timestamp()) <= $Syhtime AND ";
			}
			$tmpsubsql .= preg_match("^[1-5]{1}$",$Skind)?" a.kind=$Skind AND ":'';
			if (!empty($province) && !empty($city))$tmpsubsql .= " a.area1='$province' AND a.area2='$city' AND ";
			$tmpsubsql .= preg_match("^[1-4]{1}$",$Sprice)?" a.price=$Sprice AND ":'';
			$tmpsubsql .= preg_match("^[1-3]{1}$",$Smaidian)?" a.maidian=$Smaidian AND ":'';
			$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";
			break;
			default:$tmpsubsql = "";$tmpsort   = " ORDER BY a.jjloveb DESC,a.flag,a.yhtime ";break;
		}
		$rt=$db->query("SELECT a.id,a.userid,a.kind,a.title,a.area1,a.area2,a.price,a.yhtime,a.maidian,a.sex as sex2,a.birthday1,a.birthday2,a.heigh1,a.heigh2,a.love,a.edu,a.area3,a.area4,a.bmnum,a.click,a.flag,a.jjloveb,b.nickname,b.grade,b.sex,b.photo_s FROM ".__TBL_DATING__." a,".__TBL_MAIN__." b WHERE $tmpsubsql a.flag>0 AND a.userid=b.id AND b.flag=1 $tmpsort");
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
				$id = $rows[0];
				$userid = $rows[1];
				$kind = $rows[2];
				$title = badstr(stripslashes($rows[3]));
				$title = htmlout($title);
				if ($t == 6 && !empty($k))$title = str_replace($k,"<span class=red>".$k."</span>",$title);
				$area1 = $rows[4];
				$area2 = $rows[5];
				$price = $rows[6];
				$yhtime = $rows[7];
				$maidian = $rows[8];
				$sex2 = $rows[9];
				$birthday1 = $rows[10];
				$birthday2 = $rows[11];
				$heigh1 = $rows[12];
				$heigh2 = $rows[13];
				$love = $rows[14];
				$edu = $rows[15];
				$area3 = $rows[16];
				$area4 = $rows[17];
				$bmnum = $rows[18];
				$click = $rows[19];
				$flag = $rows[20];
				$jjloveb = $rows[21];
				$grade = $rows[23];
				$sex = $rows[24];
				$photo_s = $rows[25];
				$uhref = $Global['home_2domain']."/$userid";
				$nickname = "<a href=".$Global['home_2domain']."/$userid target=_blank class=sex$sex>".badstr($rows[22])."</a>";
				if ($flag == 1){
					$d1  = strtotime("now");
					$d2  = $yhtime;
					$totals  = ($d2-$d1);
					$day     = intval( $totals/86400 );
					$hour    = intval(($totals % 86400)/3600);
					$hourmod = ($totals % 86400)/3600 - $hour;
					$minute  = intval($hourmod*60);
					if (($totals) > 0) {
					if ($day > 0){
					$outtime = "报名还有<span>$day</span>天";
					} else {
					$outtime = "还有<p>$hour</p>小时<p>$minute</p> 分";
					}
					} else {
					$outtime = "约会已结束";
					}
					$did = $id*7+8848;
					if ($jjloveb > 0){
						$href = '../bidderdating'.$did.'.html';
					} else {
						$href = $Global['home_2domain']."/dating$id.html";
					}
				} else {
					$outtime = "约会已结束";
					$href = $Global['home_2domain']."/dating$id.html";
				}
		?>
		<div class="ul">
 			<div class="DL"><a href=<?php echo $uhref; ?> target=_blank><?php if (empty($photo_s)){?><img src=../images/nopic<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?>><?php }?></a></div>
			<div class="DC">
				<dl>
					<dt>约会主题：<a href="<?php echo $href; ?>" target=_blank><?php echo $title; ?></a></dt>
					<dd style="line-height:normal"><span>发 起 人:</span><em><?php geticon($sex.$grade);?><?php echo $nickname; ?></em></dd>
					<dd><span>约会时间:</span><em><?php echo date_format2($yhtime,'%Y年%m月%d日 %H时%M分').' '.getweek(date_format2($yhtime,'%Y-%m-%d'));?></em></dd>
					<dd><span>约会城市:</span><em><?php echo $area1.$area2 ?></em></dd>
					<dd><span>费用预算:</span><em><?php
	switch ($price){ 
	case 1:echo "100元以下";break;
	case 2:echo "100～300元";break;
	case 3:echo "300--500元";break;
	case 4:echo "500元以上";break;
	default :echo "约会费用不限";break;
	}?>  <?php
	switch ($maidian){ 
	case 1:echo "我来买单";break;
	case 2:echo "应约人买单";break;
	case 3:echo "AA制";break;
	default :echo "谁买单无所谓";break;
	}?></em></dd>
					<dd><span>约会对象:</span><em><?php if ($sex2==0){echo '性别不限';}elseif ($sex2 == 1){echo '男性';}else{echo '女性';} ?>，<?php if (!empty($birthday1) && !empty($birthday2)){echo $birthday1.'-'.$birthday2.'岁';}else{echo '年龄不限';} ?>，<?php echo $area3.$area4; ?>，身高<?php if (!empty($heigh1) && !empty($heigh2)){echo $heigh1.'-'.$heigh2.'厘米(cm)';}else{echo '不限';} ?>，<?php
	switch ($love){ 
	case 1:echo "未婚";break;
	case 2:echo "已婚";break;
	case 3:echo "离异有子女";break;
	case 4:echo "离异无子女";break;
	case 5:echo "丧偶有子女";break;
	case 6:echo "丧偶无子女";break;
	case 7:echo "婚姻保密";break;
	default :echo "婚姻不限";break;
	}?>，<?php
	switch ($edu){ 
	case 1:echo "初中及以下";break;
	case 2:echo "高中或中专及以上";break;
	case 3:echo "大专及以上";break;
	case 4:echo "本科及以上";break;
	case 5:echo "硕士及以上";break;
	case 6:echo "博士及以上";break;
	default:echo "学历不限";break;
	}?></em></dd>
				</dl>
			</div>
			<div class="DR">
				<h1><?php echo $outtime; ?></h1>
				<h2>有<a href="<?php echo $href; ?>" target=_blank><?php echo $bmnum ?></a>人联系TA</h2>
				<h3>有<a href="<?php echo $href; ?>" target=_blank><?php echo $click ?></a>人关注TA</h3>
				<h4><a href="<?php echo $href; ?>" target=_blank><img src="images/detail.gif" /></a></h4>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hr"></div>
		<?php }?>
		<div class=clear></div>
		<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
		<?php }?>
<!--loop end -->		
	</div>
	<div class="center"></div>
	<div class="right">
	<form method=get action="./" name=myform>
		<div class="rbox">
			<div class="Sli">
				<div class="Sli1">约会发起人:</div>
				<div class="Sli2"><select name="Ssex">
					<option value="0"<?php echo (empty($Ssex))?'selected':''; ?>>性别不限</option>
					<option value="1"<?php echo ($Ssex == 1)?'selected':''; ?>>男性</option>
					<option value="2"<?php echo ($Ssex == 2)?'selected':''; ?>>女性</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">约会时间:</div>
				<div class="Sli2">
					<select name="Syhtime">
					<option value="0"<?php echo (empty($Syhtime))?'selected':''; ?>>不限</option>
					<option value="1"<?php echo ($Syhtime == 1)?'selected':''; ?>>3天内</option>
					<option value="2"<?php echo ($Syhtime == 2)?'selected':''; ?>>1周内</option>
					<option value="3"<?php echo ($Syhtime == 3)?'selected':''; ?>>1月内</option>
					</select><script language="javascript" type="text/javascript">
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
</script>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">约会内容:</div>
				<div class="Sli2">
					<select name="Skind">
					<option value="0"<?php echo (empty($Skind))?'selected':''; ?>>不限</option>
					<option value="1"<?php echo ($Skind == 1)?'selected':''; ?>>喝茶小叙</option>
					<option value="2"<?php echo ($Skind == 2)?'selected':''; ?>>共进晚餐</option>
					<option value="3"<?php echo ($Skind == 3)?'selected':''; ?>>相约出游</option>
					<option value="4"<?php echo ($Skind == 4)?'selected':''; ?>>看电影</option>
					<option value="5"<?php echo ($Skind == 5)?'selected':''; ?>>欢唱K歌</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">约会城市:</div>
				<div class="Sli2">
					<select id="selProvince" name='province' onChange = "getCity(this.options[this.selectedIndex].value)">
<option value="">不限</option>
<option value="江苏"<?php echo ($province == '江苏')?'selected':''; ?>>江苏</option>
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
</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"></div>
				<div class="Sli2">
					<select id="selCity" name='city'>
					<option>不限</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">费用预算:</div>
				<div class="Sli2">
					<select name="Sprice">
					<option value="0"<?php echo (empty($Sprice))?'selected':''; ?>>不限</option>
					<option value="1"<?php echo ($Sprice == 1)?'selected':''; ?>>100元以下</option>
					<option value="2"<?php echo ($Sprice == 2)?'selected':''; ?>>100--300元</option>
					<option value="3"<?php echo ($Sprice == 3)?'selected':''; ?>>300--500元</option>
					<option value="4"<?php echo ($Sprice == 4)?'selected':''; ?>>500元以上</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1">谁来买单:</div>
				<div class="Sli2">
					<select name="Smaidian"> 
					<option value=0<?php echo (empty($Smaidian))?'selected':''; ?>>不限</option>
					<option value=1<?php echo ($Smaidian == 1)?'selected':''; ?>>我买单</option>
					<option value=2<?php echo ($Smaidian == 2)?'selected':''; ?>>应约人买单</option>
					<option value=3<?php echo ($Smaidian == 3)?'selected':''; ?>>AA制</option>
					</select>
				</div>
			</div>
			<div class="Sli">
				<div class="Sli1"><input type="hidden" name="t" value="7" /></div>
				<div class="Sli2" style="padding:5px 0 0 0"><input type="image" src="images/so.gif"></div>
			</div>
			<div class="BB1"><a href="../my/?e_dating_add.php"><img src="images/fb.gif" border="0" /></a></div>
			<div class="BB2"><a href="../my/?e_dating_list.php">我发布的约会</a><br><a href="../my/?e_dating_join.php">我参加的约会</a></div>
		</div>
	</form>
	</div>
	
	
	
</div>
<div class=clear></div>
<br style="line-height:1"/>
<div class=clear></div>
<?php require_once YZLOVE.'bottom.php';
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
}return $xingqi;}
?>
