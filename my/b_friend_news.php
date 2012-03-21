<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT grade,loveb,if2 FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade = $row[0];$data_loveb = $row[1];$data_if2 = $row[2];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if  ($submitok=="delupdate") {
	$tmeplist = $list;
	if (empty($tmeplist))callmsg("请选择您要删除的信息！","-1");
	if (!is_array($tmeplist))callmsg("Forbidden!","-1");
	if (count($tmeplist) >= 1){
		foreach ($tmeplist as $value) {
			$db->query("DELETE FROM ".__TBL_FRIEND_NEWS__." WHERE id=".$value);
		}
	}
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
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend.php" class="a333">我的好友</a></div>
<div class="main1_tselect"><a href="b_friend_news.php" class="a6F9F00">好友动态</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_blacklist.php" class="a333">黑 名 单</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">征友要求</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_user.php" class="a333">速配结果</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">弹出缘分</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">最近访客</a></div>
</div>
<div class="main2">
<div class="main2_frame">
<?php if ( ($data_if2 == 2 || $data_if2 == 3 || $cook_if2 == 4) && $data_grade >= 3 ){  ?>
<?php
$difftime = 2592000*3;//3 month
$db->query("DELETE FROM ".__TBL_FRIEND_NEWS__." WHERE ((unix_timestamp() - addtime) > $difftime) AND userid=".$cook_userid);
//列表程序开始
	$rt=$db->query("SELECT a.id,a.senduserid,a.content,a.addtime,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_FRIEND_NEWS__." a,".__TBL_MAIN__." b WHERE a.userid=$cook_userid AND a.senduserid=b.id ORDER BY a.id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd style='margin:60px'><tr><td align=center bgcolor=#f3f3f3><font color=666666>..暂无信息..</font></td></tr></table>";
	} else {
		$pagesize=20;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="700" height="37" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr>
          <td align="center" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
<form name=MYFORM method=post action=b_friend_news.php>
<table width="670" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
<script LANGUAGE="JavaScript">
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
        <tr>
          <td height="28" colspan="5" valign="top"><table width="660" height="30" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid;">
<tr>
<td width="54" align="left" valign="top"><input name="button" type="button" class="buttonx" onclick="this.value=check(this.form)" value="√全选" />
<input type=hidden name=submitok value=delupdate /></td>
<td width="547" align="center"><font color="#999999">由于好友动态的数据库极为庞大，系统只保留3个月时间。</font></td>
<td width="59" align="right" valign="top"><input type="submit" class="buttonx" value="×删除" /></td>
</tr>
</table></td>
        </tr>
<?php
for($i=0;$i<$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#ffffff";
$overbg="#ffffcc";
$outbg="#ffffff";
} else {
$bg="bgcolor=#f1f1f1";
$overbg="#ffffcc";
$outbg="#f1f1f1";
}
$sendnickname = $rows['nickname'];
$senduserid = $rows['senduserid'];
$content = $rows['content'];
$sex = $rows['sex'];
$grade = $rows['grade'];
$photo_s = $rows['photo_s'];
$addtime = date_format2($rows['addtime'],'%Y-%m-%d %H:%M');
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
          <td width="46" height="28" align="center"><input type="checkbox" name="list[]" value="<?php echo $rows['id']; ?>"></td>
          <td width="31" height="28" align="center"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>" target="_blank"><?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
}
?></a></td>
          <td width="86" align="left"><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $sendnickname;?></font></a></td>
          <td width="111" align="right" style="padding-right:0px"><font color="#666666"><?php echo $addtime;?>：</font></td>
          <td width="346" align="left" style="padding-left:0px"><?php echo $content; ?></td>
        </tr>
        <?php }?>
</table>
</form>
      <table width="670" height="20" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:10px;">
<tr>
<td>&nbsp;</td>
</tr>
</table>
<table width="700" height="50" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="top" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<?php }?>
<?php }else{  ?>
<table width="300" height="150" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#dddddd" style="margin:60px">
  <tr>
    <td align="center" bgcolor="#f3f3f3"><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i>　<font color="666666">只有永久钻石会员才享有此功能。<br />
          <br />
      </font><br />
      <img src="images/ok.gif" width="14" height="14" /><a href="k_vip.php" class="u666666"><b>立即升级</b></a>　　<img src="images/tips3.gif" width="11" height="15" hspace="5" align="absmiddle" /><a href="k_vip.php">永久钻石会员还有哪些特权？</a></td>
  </tr>
</table>

<?php }?>
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>