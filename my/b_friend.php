<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="yes") {
	if ( !ereg("^[0-9]{1,10}$",$classid) || empty($classid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT senduserid FROM ".__TBL_FRIEND__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
	} else {
		callmsg("Forbidden!","-1");
	}
	if ( !ereg("^[0-9]{1,10}$",$memberid) || empty($memberid) )callmsg("Forbidden!","-1");
	$addtime=date("Y-m-d H:i:s");
	$db->query("INSERT INTO ".__TBL_FRIEND__."  (userid,senduserid,new,ifagree,addtime) VALUES ($memberid,$cook_userid,0,1,'$addtime')");
	$db->query("UPDATE ".__TBL_FRIEND__." SET ifagree=1,new=0 WHERE id=".$classid);
	header("Location: b_friend.php");
} elseif  ($submitok=="no") {
	$tmeplist = $list;
	if (empty($tmeplist))callmsg("请选择您要删除的信息！","-1");
	if (!is_array($tmeplist))callmsg("Forbidden!","-1");
	if (count($tmeplist) >= 1){
		foreach ($tmeplist as $value) {
			$rt = $db->query("SELECT senduserid FROM ".__TBL_FRIEND__." WHERE id=".$value);
			if($db->num_rows($rt)){
				$row = $db->fetch_array($rt);
				$memberid = $row[0];
			} else {
				callmsg("Forbidden!","-1");
			}
			$db->query("DELETE FROM ".__TBL_FRIEND__." WHERE (userid=".$cook_userid." AND senduserid=".$memberid.") OR (userid=".$memberid." AND senduserid=".$cook_userid.")  ");
		}
	}
	header("Location: b_friend.php");
} elseif  ($submitok=="no2") {
	if ( !ereg("^[0-9]{1,10}$",$classid) || empty($classid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT senduserid FROM ".__TBL_FRIEND__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
	} else {
		callmsg("Forbidden!","-1");
	}
	$db->query("DELETE FROM ".__TBL_FRIEND__." WHERE (userid=".$cook_userid." AND senduserid=".$memberid.") OR (userid=".$memberid." AND senduserid=".$cook_userid.")  ");
	header("Location: b_friend.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;}
.main1_tselect {float:left;width:64px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:64px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
--> 
</style>
</head>
<body>
<div class="main1">
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_gbook.php?submitok=list" class="a333">收 件 箱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_gbook2.php" class="a333">发 件 箱</a></div>
<div class="main1_tselect"><a href="b_friend.php" class="a6F9F00">我的好友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend_news.php" class="a333">好友动态</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_blacklist.php" class="a333">黑 名 单</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">征友要求</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_user.php" class="a333">速配结果</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">弹出缘分</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">最近访客</a></div>
</div>
<div class="main2">
<div class="main2_frame"><table width="200" height="20" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php 
if ($cook_grade == 1){
	$tmpgbookcount = 0;
	$rt = $db->query("SELECT COUNT(*) FROM ".__TBL_FRIEND__." WHERE userid=".$cook_userid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmpgbookcount = $row[0];
	}
	if ($tmpgbookcount >= $Global['m_friend_num']){
?>
<table width="650" height="40" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#ffcc00" style="margin-bottom:20px">
  <tr>
    <td align="center" bgcolor="#ffffcc" ><img src="images/tips.gif" width="23" height="21" hspace="3" align="absmiddle" />您的好友容量已满(已达极限<font color="#FF0000"><?php echo $Global['m_friend_num']; ?></font>个)，别人将无法加你为好友，请速删除部分。　　高级会员则不限容量　<a href="k_vip.php" class="uff6600"><b>点此升级</b></a></td>
  </tr>
</table>
<?php }}?>
<?php
	$rt=$db->query("SELECT a.id,a.senduserid,a.new,a.ifagree,a.addtime,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_FRIEND__." a , ".__TBL_MAIN__." b  WHERE  a.userid=".$cook_userid." AND a.senduserid=b.id AND a.ifhmd=0 ORDER BY a.new DESC,b.logintime DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#f3f3f3><font color=666666>..暂无信息..</font></td></tr></table>";
	} else {
		$pagesize=15;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<form name=MYFORM method=post action=b_friend.php>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="60" align="center" valign="bottom" style="color:#666666"><script LANGUAGE="JavaScript">
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "×取消"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "√全选"; }
}
</script>
  <input name="button" type="button" class="buttonx" onclick="this.value=check(this.form)" value="√全选" />
</td>
<td width="545" align="center" valign="bottom" style="color:#666666"><?php if ($total > $pagesize) {?>
  <?php echo $pagelist; ?><?php echo $pagelistinfo; ?>
  <?php }?></td>
<td width="95" align="center" valign="bottom" style="color:#666666">
  <input type="hidden" name="submitok" value="no" />
  <input type="submit" class="buttonx" value="×批量拒绝"  onclick="return confirm('确认批量拒绝？')" />
</td>
</tr>
</table>

      <table width="650" height="20" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:10px;">
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="650" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
        <?php
for($i=0;$i<$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	$id          =  $rows[0];
	$senduserid  =  $rows[1];
	$new         =  $rows[2];
	$ifagree     =  $rows[3];
	$addtime     =  $rows[4];
	$sendnickname=  $rows[5];
	$sex         =  $rows[6];
	$grade       =  $rows[7];
	$photo_s     =  $rows[8];
if ($new == 1){ 	
	if ($i % 2 == 0){
		$bg="bgcolor=#ffffcc";
		$overbg="#FFFF90";
		$outbg="#ffffcc";
	} else {
		$bg="bgcolor=#ffffcc";
		$overbg="#FFFF90";
		$outbg="#ffffcc";
	}
} else {	
	if ($i % 2 == 0){
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
}	
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
          <td width="50" height="28" align="center"><input type="checkbox" name="list[]" value="<?php echo $id; ?>"><?php 
$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$senduserid);
$rowonline = $db->fetch_array($rtonline);
if ($rowonline[0] > 0){
	echo '<font color=red>在线</font>';
}
?></td>
          <td width="28"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>" target="_blank"><?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
}
?></a></td>
          <td width="134" ><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $sendnickname;?></font></a>          <?php if ($new == 1)echo " <img src=images/new2.gif align=absmiddle alt='新朋友'>";?></td>
          <td width="147" align="center"><font color="#999999"><?php echo $addtime;?></font></td>
          <td width="271" align="right"><?php if ($ifagree == 0) {?>
            <a href="b_friend.php?submitok=yes&classid=<?php echo $id;?>" class="u2265B2"><img src="images/ok2.gif" width="16" height="14" hspace="3" align="absmiddle" />通过验证</a><?php }?>　　<a href="b_friend.php?submitok=no2&classid=<?php echo $id;?>" class="u666666" onclick="return confirm('确认拒绝？')"><img src="images/no.gif" width="16" height="16" hspace="3" border="0" align="absmiddle">拒绝此人</a>　　<a href="b_gbook.php?submitok=add&memberid=<?php echo $senduserid; ?>&membernickname=<?php echo $sendnickname; ?>&g=<?php echo $grade; ?>" class="u666666"><img src="images/sendmail.gif" hspace="3" border="0" align="absmiddle"></a></td>
        </tr>
        <?php }?>
    </table>
</form>
      <table width="650" height="20" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:10px;">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php
//lise end 
}
?><br>
<br>
<table width="398" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="11" align="right" valign="top"><img src="images/tips.gif" width="23" height="21"></td>
    <td width="509" valign="top" style="line-height:150%;color:#999999;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle"><font color="#999999">想和你成为朋友的申请！点击“通过验证”或“拒绝此人”。</font></td>
  </tr>
</table>
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>