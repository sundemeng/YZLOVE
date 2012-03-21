<?php require_once '../sub/init.php';$navvar = 4;
require_once YZLOVE.'sub/conn.php';
switch ($submitok){ 
	case 'bcupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
			callmsg("请您先登录本站！","../login.php");
			exit;
		} else {
			$cook_password = trimm($cook_password);
			$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
			if (!$db->num_rows($rtglobal)) {
				callmsg("请您先登录本站！","../login.php");
				exit;
			}
		}
		if (strlen($content2)>4000 || strlen($content2)<1)callmsg("问题补充说明内容过多或过少，请控制在1~4000字节以内","-1");
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag>0 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除！","0");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden!","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET content2='$content2' WHERE id=".$fid);
		callmsg("问题补充成功！","detail".$fid.".html");
	break;
	case 'addxslovebupdate':
		if ( !ereg("^[0-9]{1,4}$",$num) || $num == 0 || $num>5000)callmsg("请输入一个大于0小于5000的有效数字！","-1");
		$str = intval($num);
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！","../login.php");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！","../login.php");
			exit;
		}}
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
		header("Location: detail".$fid.".html");
	break;
	case 'passqustionupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！","../login.php");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！","../login.php");
			exit;
		}}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=4 WHERE id=".$fid);
		header("Location: detail".$fid.".html");
	break;
	case 'nosatisfactoryupdate':
		if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) {
		callmsg("请您先登录本站！","../login.php");
		exit;
		} else {
		$cook_password = trimm($cook_password);
		$rtglobal = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");
		if (!$db->num_rows($rtglobal)) {
			callmsg("请您先登录本站！","../login.php");
			exit;
		}}
		$rt = $db->query("SELECT userid FROM ".__TBL_ASK__." WHERE flag=1 AND id=".$fid);
		if(!$db->num_rows($rt))callmsg("该问题不存在或已被删除或已被处理！","-1");
		$row = $db->fetch_array($rt);
		if($row[0]!==$cook_userid)callmsg("Forbidden","-1");
		$db->query("UPDATE ".__TBL_ASK__." SET flag=5 WHERE id=".$fid);
		header("Location: detail".$fid.".html");
	break;
	default:
		$rt = $db->query("SELECT a.username,a.nickname,a.grade,a.loveb,a.sex,b.userid,b.title,b.content,b.content2,b.xsloveb,b.addtime,b.click,b.hfnum,b.flag,b.ifopen,b.ifjh FROM ".__TBL_MAIN__." a,".__TBL_ASK__." b WHERE a.id=b.userid  AND a.flag=1 AND b.id=".$fid);
		if($db->num_rows($rt)){
			$row = $db->fetch_array($rt);
			$uid       = $row['userid'];
			$username  = $row['username'];
			$nickname  = badstr($row['nickname']);
			$grade     = $row['grade'];
			$loveb     = $row['loveb'];
			$sex       = $row['sex'];
			$click     = $row['click'];
			$title     = htmlout(stripslashes($row['title']));
			$content   = htmlout(stripslashes($row['content']));
			$content2  = badstr(trimm(stripslashes($row['content2'])));
			$xsloveb   = $row['xsloveb'];
			$addtime   = $row['addtime'];
			$click     = $row['click'];
			$hfnum     = $row['hfnum'];
			$flag      = $row['flag'];
			$ifopen    = $row['ifopen'];
			$ifjh      = $row['ifjh'];
			if (empty($content2))$content2 = '<h1>暂无补充内容</h1>';
			$ifjh=($ifjh==1)?' <img src=images/j.gif title=推荐病历 />':'';
			switch ($flag){ 
				case 1:$flagP = "<img src=images/56.gif>";break;
				case 2:$flagP = "<img src=images/57.gif>";break;
				case 3:$flagP = "<img src=images/58.gif>";break;
				case 4:$flagP = "<img src=images/59.gif>";break;
				case 5:$flagP = "<img src=images/60.gif>";break;
			}
		} else {
			callmsg("请求错误，该提问不存在或已被锁定或已被删除！","-1");
		}
		$db->query("UPDATE ".__TBL_ASK__." SET click=click+1 WHERE id=".$fid);
		//--1待解决,2已解决,3已过期,4已撤消,5无满意答案--//
		$d1 = strtotime("now");
		$d2 = strtotime($addtime);
		$totals  = ($d2+2592000-$d1);
		$day     = intval( $totals/86400 );
		$hour    = intval(($totals % 86400)/3600);
		$hourmod = ($totals % 86400)/3600 - $hour;
		$minute  = intval($hourmod*60);
		if ($flag==1){
			if (($d1-$d2) < 2592000) {
				$addtime = "离问题结束还剩 $day 天 $hour 小时 $minute 分钟";
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $title; ?></title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.main{width:980px;margin:0px auto;padding:5px 0 0 0}
.main .left{float:left;width:732px;padding:5px;border:#ccc 1px solid;border-bottom:0px}/* 744px */
.main .left .title{width:660px;height:23px;padding:7px 0 0 0;margin:0px auto;color:#666;font-size:18px;font-family:黑体,宋体}
.main .left .title span{color:#FF3399}
.main .left .titleinfo{width:660px;height:23px;padding:7px 0 0 0;margin:0px auto;color:#f60;font-family:Verdana,宋体}
.main .left .titleinfo span{color:#f00}
.main .left .titleinfo .sp1{color:#f00;}
.main .left .titleinfo .sp2{color:#f60}
.main .left .content{width:660px;margin:0px auto;color:#444;line-height:30px;background-image:url(images/cbg.gif);text-align:left;margin-top:15px}
.main .left .content2{width:660px;margin:0px auto;color:#FF3399;line-height:24px;text-align:left;margin-top:15px}
.main .left .content2 span{color:#f60;font-weight:bold}
.main .left .content2 h1{color:#999;display:inline}
.main .left .content2 .asktareamod{width:550px;height:60px;background:#f8f8f8}
.main .left .askManage {width:400px;background:#ffe;border:#ebebad 1px solid;margin:0px auto;margin-top:10px;margin-bottom:10px;}
.main .left .askManage .askManageT {width:395px;height:20px;line-height:20px;background:#f6f6c8;border-bottom:#ebebad 1px solid;text-align:left;color:#f00;padding-left:5px;font-weight:bold}
.main .left .askManage .askManageD {width:400px;line-height:50px;color:#999}
.main .left .askManage .askManageD a{text-decoration:underline}
.main .left .askManageForm {width:300px;height:50px;color:#f60;margin:0px auto;font-weight:normal;position:relative;border-top:#ebebad 1px solid}
.main .left .askManageForm input{height:18px;border:#ccc 1px solid}
.main .center{float:left;width:24px;height:200px;background-image:url(images/centerbg.gif);background-repeat:no-repeat}/* 24px */
.main .right{float:left;width:200px;height:280px;padding:5px;border:#ccc 1px solid}/* 212px */
.main .right .rbox{width:200px;height:280px;background-image:url(images/rightbg.gif);color:#666}
.main .right .rbox .rb1{width:200px;height:32px;padding:35px 0 0 0}
.main .right .rbox .rb2{width:200px;height:48px;padding:16px 0 0 0}
.main .right .rbox .rb3{width:200px;height:40px;line-height:24px;padding:20px 0 0 0}
.main .right .rbox .rb4{width:200px;height:30px;padding:40px 0 0 0}
.main .right .rbox .rb3 a{text-decoration:none;color:#f39}
.main .right .rbox .rb3 a:hover{text-decoration:underline;color:#f60}
.main .right .rbox .rb4 a{text-decoration:underline;color:#f00}
.main .right .rbox .rb4 a:hover{color:#6F9F00}
.maincopy{width:980px;margin:0px auto;text-align:left;font-family:Verdana,宋体}
.maincopy .left{width:742px;height:130px;border-left:#ccc 1px solid;border-right:#ccc 1px solid;text-align:center;padding:20px 0 0 0;display:inline-block}
.cp1,.cp2,.cp3,.cp4{width:640px;height:20px;margin:0px auto}
.maincopy .left .cp1{}
.maincopy .left .cp1 .copyCode{width:294px;height:16px;font-size:11px;overflow-y:hidden;background:#f8f8f8;color:#666;font-family:Verdana,宋体}
.maincopy .left .cp2{color:#999;padding:2px 0 0 5px}
.maincopy .left .cp3{height:40px;line-height:40px;color:#999}
.maincopy .left .cp3 a{text-decoration:underline;color:#FF4B7E}
.maincopy .left .cp3 a:hover{color:#6F9F00}
.maincopy .left .cp4{text-align:right;color:#999}
.maincopy .left .cp4 span{color:#f00;font-size:11px}
.main2{width:980px;height:48px;margin:0px auto;text-align:left}
.main2 .left{width:744px;height:48px;background-image:url(images/linksx.gif)}
.main3{width:980px;margin:0px auto;text-align:left}/* height:500px; */
.main3 .left{width:742px;border-left:#ccc 1px solid;border-right:#ccc 1px solid;text-align:center}/* height:500px; */
.main3 .left #zeaibbs{width:100%;height:100%}
.main4{width:980px;height:16px;margin:0px auto;text-align:left}
.main4 .left{width:744px;height:16px;background-image:url(images/b.gif)}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main">
	<div class="left">
		<img src="images/bnr2.jpg" />
		<div class=clear></div>
		<div class="title">大家帮帮我，<span><?php echo $title; ?></span> <?php echo $flagP.$ifjh; ?></div>
		<div class="titleinfo">悬赏分<img src="images/lovebx.gif" />：<span class="sp1"><b><?php echo $xsloveb; ?></b> 个love币</span> <img src="images/clock.gif" hspace="3" align="absmiddle" /><span class="sp2"><?php echo $addtime; ?></span></div>
		
		
		
	<!--操 -->
<?php if ($uid == $cook_userid && $flag == 1) {?>
	<div class="askManage">
	<div class="askManageT">相关操作:</div>
	<div class="askManageD">
	<a href="#content2">补充问题</a>　|　<a href=detail.php?submitok=addxsloveb&fid=<?php echo $fid;?>><?php if ($submitok == 'addxsloveb') {echo '<font color=#ff6600>增加悬赏</font>';} else {echo '增加悬赏';}?></a>　|　<a href="detail.php?submitok=passqustionupdate&fid=<?php echo $fid; ?>" onClick="return confirm('请 慎 重 ！\n\n★你真的要撤消该问题吗？')">撤销问题</a>　|　<a href="detail.php?submitok=nosatisfactoryupdate&fid=<?php echo $fid; ?>" onClick="return confirm('请 慎 重 ！\n\n★你真的把该问题设为无满意回答吗？')">无满意回答</a>
	<?php if ($submitok == 'addxsloveb') {?>
	<div class="askManageForm">
		<form action="detail<?php echo $fid;?>.html" method="post">
		输入悬赏数量:
		  <input name="num" type="text" id="num" size="5" maxlength="5" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;" >
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
		
		
		
		
		
		<div class="content"><?php echo $content; ?></div>
		<div class="content2"><span>问题补充: </span>
		<?php if ($ifmainedit==1) { ?>
		<form action="detail<?php echo $fid; ?>.html" method="post">
		<textarea name="content2" rows="8" class="asktareamod"><?php echo $content2; ?></textarea>
		<input name="submitok" type="hidden" value="bcupdate"><input type="submit" class="buttonx" value=" 修 改 ">
		</form>
		<?php } else {echo $content2;}?>
		</div>
		
	</div>
	<div class="center"></div>
	<div class="right">
		<div class="rbox">
			<div class="rb1"><?php if ($flag==1){ ?><a href="#content"><?php }?><img src="images/imanswer.gif" border="0" /><?php if ($flag==1){ ?></a><?php }?></div>
			<div class="rb2"><a href="../my/?h_ask.php?submitok=add"><img src="images/imhelp.gif" width="123" height="32" border="0" /></a></div>
			<div class="rb3"><a href="../my/?h_ask.php?submitok=list">我发表过的求助</a><br />
		      <a href="../my/?h_ask_bbsed.php">我回答过的求助</a></div>
			<div class="rb4"><script language='javascript' type='text/javascript'>
function recommend() {
if (document.all){
var clipBoardContent="";
clipBoardContent+="我觉得这个爱情病历不错，强烈建议你看一下！";
clipBoardContent+="\n";
clipBoardContent+="　病历名称：<?php echo $title; ?>";
clipBoardContent+="\n";
clipBoardContent+="　查看网址：<?php echo $Global['www_2domain'];?>/clinic/detail<?php echo $fid; ?>.html";
window.clipboardData.setData("Text",clipBoardContent);
alert("复制成功！你可以使用粘贴或(Ctrl+V)功能发到QQ上与其他好友一同分享！");
}}
</script><a onclick=recommend() href="####">推荐给好友一起分享</a></div>
		</div>
	</div>
</div>
<div class="clearboth"></div>
<div class="maincopy">
	<div class="left">
		<div class="cp1">点击地址复制：<script>
	function copyCode(o){o.select();var js=o.createTextRange();js.execCommand("Copy");alert("复制成功，发给QQ上的好友吧！");}document.write("<textarea onfocus=this.select() class='copyCode' onclick=copyCode(this) rows=1>");document.write(self.location+"</textarea>");
	</script></div>
		<div class="cp2">[↑本页地址↑,通过QQ或MSN发给你朋友]</div>
		<div class="cp3"><a href="#content">我来开处方</a> | <a href="../my/?h_ask_favorite.php?fid=<?php echo $fid; ?>&submitok=addupdate">收藏此病历</a> | <a href="../my/?h_ask.php?submitok=add">挂号看病</a> </div>
		<div class="cp4">提问者: <?php if ($ifopen == 1){?>
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $uid;?>" target="_blank"><?php geticon($sex.$grade);?><?php echo $nickname; ?></a>
<?php } elseif ($ifopen == 0) {?>
匿名求助
<?php }?>　处方:<span><?php echo $hfnum; ?></span>个　点击:<span><?php echo $click; ?></span>次</div>
	</div>
</div>
<div class="clearboth"></div>
<div class="main2"><div class="left"></div></div>
<div class="main3">
	<div class="left">
		<iframe id="zeaibbs" src="detail_bbs.php?fid=<?php echo $fid; ?>" frameborder="0" scrolling="no"></iframe>
	</div>
	<a name="#content"></a>
</div>
<div class="main4"><div class="left"></div></div>
<div class=clear></div>
<br style="line-height:1"/>
<div class=clear></div>



<?php require_once YZLOVE.'bottom.php';?>