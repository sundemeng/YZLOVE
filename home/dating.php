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
if ( !ereg("^[0-9]{1,8}$",$fid) )callmsg("请求错误，该信息不存在或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
if ($submitok == 'addupdate'){
	if ( !ereg("^[0-9]{1,9}$",$uid) || empty($uid))callmsg("Forbidden","-1");
	if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid)) {
	callmsg("只有本站会员才可以应约，请您先登录本站！","-1");
	exit;
	} else {
	$cook_password = trimm($cook_password);
	$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
	if (!$db->num_rows($rtglobal)) {
		callmsg("只有本站会员才可以应约，请您先登录本站！","-1");
		exit;
	}}
	if ($cook_grade != 10){
		$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
		if ($db->num_rows($rt)) {
			callmsg("对方已将你列为黑名单，你不能参加Ta的约会！","-1");
			exit;
		}
	}
	$rtglobal = $db->query("SELECT userid,flag FROM ".__TBL_DATING__." WHERE id=".$fid);
	if ($db->num_rows($rtglobal)) {
		$row = $db->fetch_array($rtglobal);
		if ($row[0] == $cook_userid)callmsg("不能操作自已！","-1");
		if ($row[1] != 1)callmsg("此约会已经结束或未审核！","-1");
	} else {
		callmsg("Forbidden","-1");
	}
	if (strlen($content)>1000 || strlen($content)<3)callmsg("信息内容过多或过少，请控制在3~1000字节以内","-1");
	$rt = $db->query("SELECT id FROM ".__TBL_DATING_USER__." WHERE userid=".$cook_userid." AND fid=".$fid);
	if($db->num_rows($rt))callmsg("你已经报了名，请不要重复操作！","-1");
	$addtime = strtotime(date("Y-m-d H:i:s"));
	$db->query("INSERT INTO ".__TBL_DATING_USER__."  (fid,userid,content,addtime) VALUES ($fid,$cook_userid,'$content','$addtime')");
	$db->query("UPDATE ".__TBL_DATING__." SET bmnum=bmnum+1 WHERE id=".$fid);
	//header("Location: dating".$fid.'.html');
	callmsg("报名成功！请等候发起人的通知。","dating".$fid.".html");
}
$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.kind,b.title,b.area1,b.area2,b.price,b.yhtime,b.maidian,b.contact,b.content,b.sex as sex2,b.birthday1,b.birthday2,b.heigh1,b.heigh2,b.love,b.edu,b.area3,b.area4,b.addtime,b.bmnum,b.click as datingclick,b.flag FROM ".__TBL_MAIN__." a,".__TBL_DATING__." b WHERE a.id=b.userid  AND a.flag=1 AND b.id=".$fid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$uid         = $row['id'];
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];

$kind        = $row['kind'];
$title       = htmlout(stripslashes($row['title']));
$area1       = $row['area1'];
$area2       = $row['area2'];
$price       = $row['price'];
$yhtime      = $row['yhtime'];
$maidian     = $row['maidian'];
$contact     = htmlout(stripslashes($row['contact']));
$content     = htmlout(stripslashes($row['content']));
$sex2        = $row['sex2'];
$birthday1   = $row['birthday1'];
$birthday2   = $row['birthday2'];
$heigh1      = $row['heigh1'];
$heigh2      = $row['heigh2'];
$love        = $row['love'];
$edu         = $row['edu'];
$area3       = $row['area3'];
$area4       = $row['area4'];
$addtime     = $row['addtime'];
$bmnum       = $row['bmnum'];
$datingclick = '<font color=#ff0000>'.$row['datingclick'].'</font>';
$flag        = $row['flag'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息或用户不存在或未审核或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
$db->query("UPDATE ".__TBL_DATING__." SET click=click+1 WHERE id=".$fid);
if ( ereg("^[0-9]{1,8}$",$cook_userid) ) {
	$rt = $db->query("SELECT flag FROM ".__TBL_DATING_USER__." WHERE userid=".$cook_userid." AND fid=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$ifbest = $row[0];
	}
}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $title;?>,<?php echo $nickname;?>日记,<?php echo $nickname;?>博客">
<meta name="description" content="<?php echo $title;?>">
<title><?php echo $title;?> | <?php echo $nickname;?>的约会,私人约会,1+1约会</title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/dating.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4>1+1约会：<?php echo $title; ?><?php if ($flag == 0)echo '<font color=#ff0000> (未审) </font>'; ?></h4><a href="mydating<?php echo $uid.'.html'; ?>">>>更多约会</a></div>
<div class="rightContent">
	<div class="rightContentL">
		<div class="LR">
			<div class="L1">约会内容：</div>
			<div class="R1 tiaose"><?php
	switch ($kind){ 
	case 1:echo "喝茶小叙";break;
	case 2:echo "共进晚餐";break;
	case 3:echo "相约出游";break;
	case 4:echo "看电影";break;
	case 5:echo "欢唱K歌";break;
	case 6:echo "其他";break;
	default:echo "不限";break;
	}?>&nbsp;</div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">约会主题：</div>
			<div class="R1 tiaose"><?php echo $title; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">约会时间：</div>
			<div class="R1 tiaose"><b><?php echo date_format2($yhtime,'%Y 年 %m 月 %d 日 %H 时 %M 分').' '.getweek(date_format2($yhtime,'%Y-%m-%d'));?></b></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">约会城市：</div>
			<div class="R1 tiaose"><?php echo $area1.' >> '.$area2; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">费用预算：</div>
			<div class="R1 tiaose"><?php
	switch ($price){ 
	case 1:echo "100元以下";break;
	case 2:echo "100～300元";break;
	case 3:echo "300--500元";break;
	case 4:echo "500元以上";break;
	default :echo "不限";break;
	}?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">谁来买单：</div>
			<div class="R1 tiaose"><?php
	switch ($maidian){ 
	case 1:echo "我来买单";break;
	case 2:echo "应约人买单";break;
	case 3:echo "AA制";break;
	default :echo "不限";break;
	}?></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">联系方法：</div>
			<div class="R1 tiaose"><b><?php if ($ifbest == 1){echo $contact;}else{echo '只有发起人设定的最佳人选才可以看见！';} ?></b></div>
		</div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">约会安排：</div>
			<div class="R1 tiaose"><?php echo $content; ?></div>
		</div>
		<div class="clear"></div>
		<div class="LR" style="margin:0 0 10px 0;padding-left:20px"><hr size=1 align=center width=90% class="hr"></div>
		<div class="clear"></div>
		<div class="LR">
			<div class="L1">约会对象：</div>
			<div class="R1">
			您的性别为<span class=tiaose><?php if ($sex2==0){echo '不限';}elseif ($sex2 == 1){echo '男性';}else{echo '女性';} ?></span>，年龄<span class=tiaose><?php if (!empty($birthday1) && !empty($birthday2)){echo '必须在'.$birthday1.'到'.$birthday2.'岁之间';}else{echo '不限';} ?></span>，身高<span class=tiaose><?php if (!empty($heigh1) && !empty($heigh2)){echo '必须在'.$heigh1.'到'.$heigh2.'厘米之间';}else{echo '不限';} ?></span>，婚姻状况<span class=tiaose><?php
	switch ($love){ 
	case 1:echo "为未婚";break;
	case 2:echo "为已婚";break;
	case 3:echo "为离异有子女";break;
	case 4:echo "为离异无子女";break;
	case 5:echo "为丧偶有子女";break;
	case 6:echo "为丧偶无子女";break;
	case 7:echo "保密";break;
	default :echo "不限";break;
	}?></span>，学历<span class=tiaose><?php
	switch ($edu){ 
	case 1:echo "为初中及以下";break;
	case 2:echo "为高中或中专及以上";break;
	case 3:echo "为大专及以上";break;
	case 4:echo "为本科及以上";break;
	case 5:echo "为硕士及以上";break;
	case 6:echo "为博士及以上";break;
	default:echo "不限";break;
	}?></span>，所在地区<span class=tiaose>为<?php echo $area3.$area4; ?></span>			</div>
		</div>
		<div class="clear"></div>

	</div>
	<div class="rightContentR">
		<div class="box">
			<div class="box1">离约会时间还有：</div>
			<div class="box1"><?php
if ($flag == 1){
	$d1  = strtotime(date("Y-m-d H:i:s"));
	$d2  = $yhtime;
	$totals  = ($d2-$d1);
	$day     = intval( $totals/86400 );
	$hour    = intval(($totals % 86400)/3600);
	$hourmod = ($totals % 86400)/3600 - $hour;
	$minute  = intval($hourmod*60);
	if (($totals) > 0) {
		if ($day > 0){
			$outtime = "<span class=timestyle>$day</span> 天 ";
		} else {
			$outtime = "";
		}
		$outtime .= "<span class=timestyle>$hour</span> 小时 <span class=timestyle>$minute</span> 分";
	} else {
		$db->query("UPDATE ".__TBL_DATING__." SET flag=2,jjloveb=0 WHERE id=".$fid);
		$outtime = "　<font color=#999999><b>已经结束</b></font>";
	}
} else {
	$outtime = "　<font color=#999999><b>已经结束</b></font>";
}
echo $outtime;
?></div>
			<div class="box1">响应人数 <font color="#FF0000"><?php echo $bmnum; ?></font> 人 </div>
			<div class="box1"><?php if ($flag == 1){echo "<a href=#content><img src=images/$mbkind/datingbm.gif></a>";}else{echo "<img src=images/$mbkind/datingbmno.gif>";} ?></div>
			<div class="box1" style="padding:10px 0 0 0;">人气 <?php echo $datingclick; ?></div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="rightTitle" style="margin:10px 0 0 0">
  <h4>请填写真实联系方式，以便发起人能及时联系到你</h4>
</div>
<div class="rightContent">


<div class="bbsaddT">
	<div class="bbsaddTL"><img src="images/pl.gif" hspace="3" align="absmiddle">我来赴约</div>
	<div class="bbsaddTR">只有会员才可以赴约，<a href="<?php echo $Global['www_2domain'].'/login.php' ?>" class=ub666>登录</a> / <a href="<?php echo $Global['www_2domain'].'/reg.php' ?>"  class=ub666>注册</a></div>
</div>
<script language="javascript">
function chkform(){
	if(document.www_yzlove_com.content.value==""){
	alert('请输入内容！');
	document.www_yzlove_com.content.focus();
	return false;
	}
	var str;
	str = document.www_yzlove_com.content.value;
	str=str.replace(/\n/ig,""); 
	str=str.replace(/\r/ig,"");
	if(str =="联系方法：应约说明："){
	alert('请输入联系方法或应约说明！');
	document.www_yzlove_com.content.focus();
	return false;}
}
</script>
		<form action="dating<?php echo $fid.'.html'; ?>" method="post" name=www_yzlove_com onSubmit="return chkform()" >
		<?php if ($flag == 1) {?>
		<textarea name="content" cols="95" rows="8" id="content" class="datingtextarea">联系方法：
应约说明：</textarea>
		<?php } else {?>
		<textarea name="content" cols="95" rows="8" id="content" class="datingtextarea" disabled="disabled">此约会已经结束或已有最佳人选，报名终止。</textarea>
		<?php }?>
		<?php if ($flag == 1) {?>
		<input type="submit" class="button" value="开始赴约">
		<input type="hidden" name="fid" value="<?php echo $fid; ?>">
		<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<input type="hidden" name="submitok" value="addupdate">
		<?php } else {?>
		<input type="submit" class="button" value="开始赴约" disabled="disabled">
		<?php }?>
		</form>
	<div class="bbsTips"><img src="images/tips.gif" width="23" height="21" hspace="5" />填写真实联系方式，以便发起人能及时联系到你，此联系方式不会公开，只有约会发起人才能看见，请放心填写。</div>


</div>
</div>
<div class="clear"></div>
</div>
<?php require_once YZLOVE.'home/foot.php';
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