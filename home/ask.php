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
if ( !ereg("^[0-9]{1,9}$",$fid) || empty($fid) )callmsg("请求错误，该信息不存在或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
switch ($submitok){ 
	case 'bbsaddupdate':
		if ( !ereg("^[0-9]{1,9}$",$cook_userid) || empty($cook_userid) || !ereg("^[0-9]{1,9}$",$uid) || empty($uid)) {
		callmsg("只有本站会员才可以发表，请您先登录本站！","-1");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("只有本站会员才可以发表，请您先登录本站！","-1");
			exit;
		}}
		if ($cook_grade != 10){
			$rt = $db->query("SELECT id FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid." AND senduserid=".$uid." AND ifhmd=1");
			if ($db->num_rows($rt)) {
				callmsg("对方已将你列为黑名单，不需要你的帮助！","-1");
				exit;
			}
		}
		if (strlen($content)<1 || strlen($content)>4000)callmsg("“内容”请控制在1~4000字节以内。","-1");
		$rt = $db->query("SELECT userid,flag FROM ".__TBL_ASK__." WHERE flag>0 AND id=".$fid);
		if(!$db->num_rows($rt)) {
			callmsg("该问题不存在或已被删除！","0");
		} else {
			$rows = $db->fetch_array($rt);
			if ($rows[1]>1) {
				switch ($rows[1]){
					case '2':$tempvar = "已解决";break;
					case '3':$tempvar = "已过期";break;
					case '4':$tempvar = "已撤消";break;
					case '5':$tempvar = "无满意回答";break;
				}
				callmsg("该问题在以下状态不能回答：\\n 1。已解决\\n 2。已过期\\n 3。已撤消\\n 4。无满意回答\\n_________________\\n\\n当前状态：$tempvar","-1");
			}
			if ($rows[0]==$cook_userid)callmsg("自已不能回答自已，但可以修改问题补充说明。","-1");
			$rt = $db->query("SELECT id FROM ".__TBL_ASK_BBS__." WHERE userid=".$cook_userid." AND fid=".$fid);
			if($db->num_rows($rt))callmsg("你已经回答过了，现在只能修改你的回答！","-1");
			$addtime = date("Y-m-d H:i:s");
			$db->query("INSERT INTO ".__TBL_ASK_BBS__."  (fid,content,userid,addtime) VALUES ($fid,'$content',$cook_userid,'$addtime')");
			$db->query("UPDATE ".__TBL_ASK__." SET hfnum=hfnum+1 WHERE id=".$fid);
			header("Location: ask.php?fid=".$fid."&p=".$redirectpage);
		}
	break;
	case 'bbsmodupdate':
		if ( !ereg("^[0-9]{1,10}$",$bbsid) || $bbsid == 0 )callmsg("参数不正确！","-1");
		if (strlen(content)>4000 || strlen($content)<1)callmsg("回答内容过多或过少，请控制在1~4000字节以内","-1");
		$rt = $db->query("SELECT id,flag FROM ".__TBL_ASK__." WHERE flag>0 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除！","0");
		$row = $db->fetch_array($rt);
		if ($row[1]>1) {
			switch ($row[1]){
				case '2':$tempvar = "已解决";break;
				case '3':$tempvar = "已过期";break;
				case '4':$tempvar = "已撤消";break;
				case '5':$tempvar = "无满意回答";break;
			}
			callmsg("该问题在以下状态不能修改：\\n 1。已解决\\n 2。已过期\\n 3。已撤消\\n 4。无满意回答\\n_________________\\n\\n当前状态：$tempvar","-1");
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK_BBS__." WHERE id=".$bbsid);
		if(!$db->num_rows($rt))callmsg("该回答不存在或已被删除！","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET content='$content' WHERE id=".$bbsid);
		header("Location: ask.php?fid=".$fid."&p=".$p);
	break;
	case 'bbsbestupdate':
		if ( !ereg("^[0-9]{1,10}$",$bbsid) || $bbsid == 0 )callmsg("Forbidden","-1");
		$addtime=date("Y-m-d H:i:s");
		$rt = $db->query("SELECT userid,xsloveb FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$addbestloveb = $row[1];
		$addbestloveb = $addbestloveb+$Global['m_askloveb'];
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK_BBS__." WHERE id=".$bbsid);
		if(!$db->num_rows($rt))callmsg("该回答不存在或已被删除！","0");
		$row = $db->fetch_array($rt);
		$adduserid = $row[0];
		//$addnickname = $row[1];
		$tmploveb = $Global['m_askloveb'];
		$db->query("UPDATE ".__TBL_ASK__." SET flag=2 WHERE id=".$fid);
		$db->query("UPDATE ".__TBL_ASK_BBS__." SET ifbest=1 WHERE id=".$bbsid);
		$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb+".$addbestloveb." WHERE id=".$adduserid);
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$adduserid','$addnickname','回答被评最佳答案+系统奖励$tmploveb','$addbestloveb','$addtime')");
		header("Location: ask.php?fid=".$fid."&p=".$p);
	break;
	case 'bcupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
			callmsg("请您先登录本站！",$Global['www_2domain']);
			exit;
		} else {
			$cook_password = trimm($cook_password);
			$rtglobal = $db->query("SELECT mbkind FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
			if (!$db->num_rows($rtglobal)) {
				callmsg("请您先登录本站！",$Global['www_2domain']);
				exit;
			}
		}
		if (strlen($content2)>4000 || strlen($content2)<1)callmsg("问题补充说明内容过多或过少，请控制在1~4000字节以内","-1");
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag>0 AND id='$fid'");
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除！","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden!",$Global['www_2domain']);
		$db->query("UPDATE ".__TBL_ASK__." SET content2='$content2' WHERE id=".$fid);
		callmsg("问题补充成功！","ask".$fid.".html");
	break;
	case 'addxslovebupdate':
		if ( !ereg("^[0-9]{1,4}$",$num) || $num == 0 || $num>5000)callmsg("请输入一个大于0小于5000的有效数字！","-1");
		$str = intval($num);
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！",$Global['www_2domain']);
			exit;
		}
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$cook_userid);
		if(!$db->num_rows($rt))callmsg("Forbidden","-1");
		$row = $db->fetch_array($rt);
		$temploveb = $row[0];
		if ($temploveb<$str){
			callmsg("你的Love币不足".$str."个，增加悬赏失败！","-1");
		}else{
			$db->query("UPDATE ".__TBL_ASK__." SET xsloveb=xsloveb+".$str." WHERE id=".$fid);
			$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-".$str." WHERE id=".$cook_userid);
		}
		$addtime2=date("Y-m-d H:i:s");
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$cook_userid','$cook_username','增加悬赏','-$str','$addtime2')");
		header("Location: ask".$fid.".html");
	break;
	break;
	case 'passqustionupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！",$Global['www_2domain']);
			exit;
		}
		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=4 WHERE id=".$fid);
		header("Location: ask".$fid.".html");
	break;
	case 'nosatisfactoryupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！",$Global['www_2domain']);
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！",$Global['www_2domain']);
			exit;
		}		}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=5 WHERE id=".$fid);
		header("Location: ask".$fid.".html");
	break;
	default:
		$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.title,b.content,b.content2,b.xsloveb,b.addtime,b.click as askclick,b.hfnum,b.flag,b.ifjh FROM ".__TBL_MAIN__." a,".__TBL_ASK__." b WHERE a.id=b.userid  AND a.flag=1 AND b.ifopen=1 AND b.id=".$fid);
		if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$uid         = $row['id'];
		$username    = $row['username'];
		$nickname    = $row['nickname'];
		$grade       = $row['grade'];
		$loveb       = $row['loveb'];
		$alltime     = $row['alltime'];
		$logincount     = $row['logincount'];
		$mbkind      = $row['mbkind'];
		$mbtitle     = $row['mbtitle'];
		//$magic       = $row['magic'];
		$bgpic       = $row['bgpic'];
		$sex         = $row['sex'];
		$photo_s     = $row['photo_s'];
		$click       = $row['click'];
		$title           = htmlout(stripslashes($row['title']));
		$content         = htmlout(stripslashes($row['content']));
		$content2        = htmlout(stripslashes($row['content2']));
		$xsloveb         = $row['xsloveb'];
		$addtime         = $row['addtime'];
		$askclick        = '<font color=#ff0000>'.$row['askclick'].'</font>';
		$hfnum           = $row['hfnum'];
		$flag            = $row['flag'];
		$ifjh            = $row['ifjh'];
		} else {
		echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息或用户不存在或未审核或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
		exit;}
		$db->query("UPDATE ".__TBL_ASK__." SET click=click+1 WHERE id=".$fid);
		//--1待解决,2已解决,3已过期,4已撤消,5无满意答案--//
		$d1 =  strtotime("now");
		$d2 = strtotime($addtime);
		$totals  = ($d2+2592000-$d1);
		$day     = intval( $totals/86400 );
		$hour    = intval(($totals % 86400)/3600);
		$hourmod = ($totals % 86400)/3600 - $hour;
		$minute  = intval($hourmod*60);
		if ($flag==1){
			if (($d1-$d2) < 2592000) {
				$addtime = "离问题结束还剩 <font color=#ff0000>$day</font> 天 <font color=#ff0000>$hour</font> 小时 <font color=#ff0000>$minute</font> 分钟";
			} else {
				$db->query("UPDATE ".__TBL_ASK__." SET flag=3 WHERE id=".$fid);
				$rt8 = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$uid);
				if(!$db->num_rows($rt8))callmsg("Forbidden","-1");
				$row8 = $db->fetch_array($rt8);
				$myloveb = $row8[0];
				$subtractstudyb = $xsloveb*10;
				if ($myloveb>=$subtractstudyb){
					$addtime=date("Y-m-d H:i:s");
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=loveb-'$subtractstudyb' WHERE id=".$uid);
					$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('$uid','$username','求助过期未处理-$subtractstudyb','-$subtractstudyb','$addtime')");
				}else{
					$db->query("UPDATE ".__TBL_MAIN__." SET loveb=0 WHERE id=".$uid);
				}
				$addtime = "提问时间：".$addtime;
			}
		} else {
			$addtime = "提问时间：".$addtime;
		}
		if ( ($cook_userid == $uid) && ($flag==1) ){
			$ifmainedit=1;
		} else {$ifmainedit=0;}
	break;
}
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $title;?>,<?php echo $nickname;?>日记,<?php echo $nickname;?>博客">
<meta name="description" content="<?php echo $title;?>">
<title><?php echo $title;?> | <?php echo $nickname;?>的病历,求助</title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/ask.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4>我的病历</h4><a href="myask<?php echo $uid; ?>.html">>>更多病历</a></div>
<div class="rightContent ul2">
	<h5><?php if ($ifjh == 1)echo "<img src='images/jh.gif' />"; ?> <?php echo $title; ?> <?php 
switch ($flag){ 
	case 0:echo "<font color=#ff0000>(未审)</font>";break;
	case 1:echo "<img src=images/$mbkind/56.gif>";break;
	case 2:echo "<img src=images/$mbkind/57.gif>";break;
	case 3:echo "<img src=images/$mbkind/58.gif>";break;
	case 4:echo "<img src=images/$mbkind/59.gif>";break;
	case 5:echo "<img src=images/$mbkind/60.gif>";break;
}
?></h5>
	<div class="diaryTips">悬赏分<img src="images/loveb.gif" hspace="3" align="absmiddle">：<font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $xsloveb; ?></b>Love币</font>　<img src="images/ask_clock.gif" width="12" height="12" hspace="3" align="absmiddle"><?php echo $addtime; ?></div>
	<div class="diaryTips" style="margin:8px 0 0 0">( 处方 <font color="#FF0000"> <?php echo $hfnum; ?></font> 个　浏览<font color="#FF0000"> <?php echo $askclick; ?></font> 次 )　<img src="images/pl.gif" width="20" height="20" align="absmiddle"><?php if ( $flag == 1) {echo "<a href='#content' class=ub666>开处方拿悬赏</a>";}else{echo "<a href='#contentbbs' class=ub666>查看处方</a>";}?></div>
	<!--操 -->
<?php if ($uid == $cook_userid && $flag == 1) {?>
	<div class="askManage">
	<div class="askManageT">相关操作:</div>
	<div class="askManageD">
	<a href="#content2" class=A9BU_tiaose>补充问题</a>　|　<a href=ask.php?submitok=addxsloveb&fid=<?php echo $fid;?> class="A9BU_tiaose"><?php if ($submitok == 'addxsloveb') {echo '<b><font color=#ff6600>增加悬赏</font></b>';} else {echo '<b>增加悬赏</b>';}?></a>　|　<a href="ask.php?submitok=passqustionupdate&fid=<?php echo $fid; ?>" onClick="return confirm('请 慎 重 ！\n\n★你真的要撤消该问题吗？')" class=A9BU_tiaose>撤销问题</a>　|　<a href="ask.php?submitok=nosatisfactoryupdate&fid=<?php echo $fid; ?>" onClick="return confirm('请 慎 重 ！\n\n★你真的把该问题设为无满意回答吗？')" class=A9BU_tiaose>无满意回答</a>
	<?php if ($submitok == 'addxsloveb') {?>
	<div class="askManageForm">
		<form action="ask<?php echo $fid;?>.html" method="post">
		输入悬赏数量:
		  <input name="num" type="text" id="num" style="border:#ccc 1px solid;" size="5" maxlength="5" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" >
		<input type="submit" value="增加悬赏" class="buttonx">
		<input name="submitok" type="hidden" value="addxslovebupdate">
		</form>
	</div>
	<?php }?>
	<div class="clear"></div>
	</div>
	</div>
<?php }?>
	<!-- 操完 -->
	<div class="diaryContent"><?php echo $content; ?></div>
	<?php if ($ifmainedit==1) { ?>
	<div class="askAnswer">
		<h1>问题补充：</h1>
		<div align=center style="margin:0 0 20px 0;">
			<form action="ask<?php echo $fid; ?>.html" method="post">
			<textarea name="content2" rows="8" class="asktareamod"><?php echo $content2; ?></textarea><br>
			<input name="submitok" type="hidden" value="bcupdate">
			<input type="submit" class="buttonx" value=" 修 改 ">
			</form>
		</div>
	</div>
	<?php } else {  ?>
	<div class="askAnswer" style="margin-bottom:20px">
		<h1>问题补充：</h1>
		<?php
		if (empty($content2)) {
			echo "暂无补充内容";
		} else {
			echo $content2;
		}
		?>
	</div>
	<?php }?>
	
	<div class="diaryAd">
		<div class="diaryAdL">点击地址复制：</div>
		<div class="diaryAdR">
	<script>
	function copyCode(o){o.select();var js=o.createTextRange();js.execCommand("Copy");alert("复制成功，发给QQ上的好友吧！");}document.write("<textarea onfocus=this.select() style='width:294px;height:14px;overflow-y:hidden;font-size:9pt;' class='copyCode' onclick=copyCode(this) rows=1>");document.write(self.location+"</textarea>");
	</script>
		</div>
	</div>
	<div class="clear"></div>
	<div class="diaryAd">
	<div class="diaryAdL"></div>
	<div class="diaryAdR">[↑本页地址↑,通过QQ或MSN发给你朋友]</div>
	</div>
	<div class="clear"></div>
	<div class="diaryAd" style="margin-top:10px;margin-bottom:20px">
<a href="#content" class=A9BU_tiaose>我来开处方</a> | <a href="<?php echo $Global['my_2domain']; ?>/?h_ask_favorite.php?fid=<?php echo $fid; ?>&submitok=addupdate" class=A9BU_tiaose>收藏此病历</a>  | <a href="<?php echo $Global['my_2domain']; ?>/?h_ask.php?submitok=add" class=A9BU_tiaose>挂号看病</a>
	</div>
	<div class="clear"></div>
</div>
<div class="rightTitle" style="margin:10px 0 0 0"><h4>网友处方</h4><a href="#content">>>我来回答</a></div>
<a name="#contentbbs"></a>
<div class="rightContent<?php if ($flag!=1)echo " ul2";?>">
<?php
$rt=$db->query("SELECT a.nickname,a.grade,a.sex,a.photo_s,b.id,b.content,b.userid,b.addtime,b.ifbest,b.flag FROM ".__TBL_MAIN__." a,".__TBL_ASK_BBS__." b WHERE b.fid=".$fid." AND a.id=b.userid ORDER BY b.id");
$total = $db->num_rows($rt);
if($total>0){
require_once YZLOVE.'sub/class.php';
$pagesize = 20;
if ($p<1)$p=1;
$pagemax = ceil($total / $pagesize);
if ($total % $pagesize == 0){
	$redirectpage = $pagemax+1;
} else {
	$redirectpage = $pagemax;
}
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($p == 1){$n = $i;} else {$n = $i+$pagesize*($p-1);}
?>
	<div class="bbs">
		<div class="bbsL">
		
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>" target="_blank">
<?php 
if (empty($rows['photo_s'])){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$rows['sex'].".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$rows['photo_s']." width=41 height=50 border=0>";
}
?></a>		</div>
		<div class="bbsR">
			<div class="bbsR1"><?php echo geticon($rows['sex'].$rows['grade']);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['userid']; ?>"  target=_blank><?php if ( $rows['sex'] == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $rows['nickname'];?></font></a>　发表于：<?php echo $rows['addtime'];?></div>
			<div class="bbsR2">第<font color="#FF0000"><?php echo $n;?></font>楼</div>
			<div class="bbsR3">
			<?php if ( ($rows['userid'] == $cook_userid) && ($flag == 1) ) {?>
				<div align=center style="margin:0 0 20px 0">
					<form action="ask<?php echo $fid; ?>.html" method="post">
					<textarea name="content" rows="8" class="asktareamod"><?php echo $rows['content']; ?></textarea><br>
					<input name="fid" type="hidden" value="<?php echo $fid; ?>" />
					<input name="uid" type="hidden" value="<?php echo $uid; ?>" />
					<input name="bbsid" type="hidden" value="<?php echo $rows['id']; ?>" />
					<input name="p" type="hidden" value="<?php echo $p; ?>" />
					<input name="submitok" type="hidden" value="bbsmodupdate" />
					<input type="submit" class="buttonx" value=" 修 改 ">
					</form>
				</div>
			<?php
			} else {
				if ($rows['ifbest']==1)echo "<img src=images/$mbkind/nb.gif title=最佳答案><b><font color=red style=font-size:10.3pt;>(最佳答案)</font></b>";
				if ($rows['flag'] == 1) {
					echo htmlout(stripslashes($rows['content']));
				} else {
					echo "<font color=#999999>该处方已被冻结或删除！</font>";
				}
			}
			?>
			</div>
			<?php if ( ($uid == $cook_userid) && ($flag == 1) ) {?>
			<div class="bbsR3" style="text-align:right;display:block;CURSOR:hand">
<form action="ask<?php echo $fid; ?>.html" method="post" onClick="return confirm('请 慎 重 ！\n\n★你真的把该处方设为最佳答案吗？')">
<input name="bbsid" type="hidden" value="<?php echo $rows['id']; ?>" />
<input name="p" type="hidden" value="<?php echo $p; ?>" />
<input name="fid" type="hidden" value="<?php echo $fid; ?>" />
<input name="addnickname" type="hidden" value="<?php echo $rows['nickname']; ?>" />
<input name="submitok" type="hidden" value="bbsbestupdate" />
<input type="image" src="images/<?php echo $mbkind; ?>/best.gif" />
</form>
			</div>
			<?php }?>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>
	<?php if($total>$pagesize){?><div class=pageshow><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
<?php } else {?>
	<div class="nodata">...暂无处方...</div>
<?php }?>
</div>
<?php if ( $flag == 1) {?>
<div class="rightContent ul2">
		<div class="bbsaddT">
			<div class="bbsaddTL"><img src="images/pl.gif" hspace="3" align="absmiddle">我来开处方</div>
			<div class="bbsaddTR">只有会员才可以发表观点，<a href="<?php echo $Global['www_2domain'].'/login.php' ?>" class=ub666>登录</a> / <a href="<?php echo $Global['www_2domain'].'/reg.php' ?>"  class=ub666>注册</a></div>
		</div>
	  <div class="bbsaddT2">
<script language="javascript">
function chkform(){
	if(document.www_yzlove_com.content.value==""){
	alert('请输入内容！');
	document.www_yzlove_com.content.focus();
	return false;
	}
}
</script>
		<form action="" method="post" name=www_yzlove_com onSubmit="return chkform()">
		<textarea name="content" cols="95" rows="8" id="content" class="asktarea"></textarea>
		<input type="submit" class="button" value=" 提 交 ">
		<input type="hidden" name="fid" value="<?php echo $fid; ?>">
		<input type="hidden" name="uid" value="<?php echo $uid; ?>">
		<input type="hidden" name="submitok" value="bbsaddupdate">
		<input type="hidden" name="redirectpage" value="<?php echo $redirectpage; ?>">
		</form><br><br><a name="#bottom"></a>
	</div>
	</div>
<?php }?>
</div>
<div class="clear"></div>
</div>
<?php
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
}return $xingqi;} 
?>