<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT grade,loveb FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade = $row[0];$data_loveb = $row[1];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div class="main1_tselect" ><a href="b_gbook2.php" class="a6F9F00">发 件 箱</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend.php" class="a333">我的好友</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend_news.php" class="a333">好友动态</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_blacklist.php" class="a333">黑 名 单</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">征友要求</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_user.php" class="a333">速配结果</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">弹出缘分</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">最近访客</a></div>
</div>
<div class="main2">
<div class="main2_frame"><br>
  <br />
<?php if ($data_grade <2 ) {?>
<br>
<br>
<table width=300 height=150 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd style="margin-bottom:35px;">
  <tr>
    <td align=center bgcolor=#f3f3f3><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i> <font color="666666">只有高级会员才可以查看。<br>
          <br>
    </font><br>
    <img src="images/ok.gif"><a href="k_bank.php" class="u666666"><b>立即升级</b></a>　　<img src="images/diamond.gif" hspace="5" align="absmiddle"><a href="k_vip.php" class="u666666">高级会员还有哪些特权？</a></td>
  </tr>
</table>
<?php } else {?>

<?php if ($submitok == "show") { ?>
<?php 
if ( !ereg("^[0-9]{1,10}$",$aid) || empty($aid))callmsg("参数不正确！","-1");
if ( !ereg("^[0-9]{1,3}$",$g) || empty($g))callmsg("参数不正确！","-1");
$rt = $db->query("SELECT * FROM ".__TBL_GBOOK__." WHERE id='$aid'");
if($db->num_rows($rt))$row = $db->fetch_array($rt);
?>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="60" valign="top" style="color:#666;line-height:150%;padding:6px;"><font color="#666666">发信人：</font>
<?php 
if ($row['userid'] == $Global['m_gbookadminuid']) {
	echo "<font color=red>客服中心</font>";
} else {
?>
<a href="<?php echo $Global['home_2domain'];?>/<?php echo $row['userid']; ?>"  target=_blank><?php echo geticon($g).$row['nickname']; ?></a>
<?php
 }?>
　      <font color="666666">发信时间：</font><?php echo $row['addtime'];?>
<table width="75" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<font color="666666">标　题：</font><b><?php echo htmlout(stripslashes($row['title'])); ?></b><?php if ($row['new'] == 1)echo " <font color=red>(对方未阅)</font>";?></td>
    </tr>
  <tr>
    <td valign="top" bgcolor="#F7F7F7"  style="TABLE-LAYOUT: fixed; WORD-BREAK: break-all;font-size:10.3pt;line-height:200%;padding:20px;border:#ddd 1px solid;"><?php echo stripslashes($row['content']); ?></td>
  </tr>
  <tr>
    <td height="41" align="right"><a href="javascript:history.back()"><img src="images/backx.gif" width="16" height="14" hspace="10" vspace="10" border="0" align="absmiddle" /><b>返回发件箱</b></a></td>
  </tr>
</table>
<?php } else { ?><?php
//列表程序开始
	$rt=$db->query("SELECT a.id,a.userid,a.nickname,a.title,a.new,a.addtime,b.sex,b.grade FROM ".__TBL_GBOOK__." a , ".__TBL_MAIN__." b  WHERE  a.senduserid='$cook_userid' AND a.userid=b.id ORDER BY a.id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#efefef><font color=666666>..暂无信息..</font></td></tr></table>";
	} else {
		$pagesize=15;
		require_once YZLOVE.'sub/class.php';
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
?>
<table width="700" height="38" border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid;margin-bottom:10px;">
<tr>
<td height="30" align="center" valign="top" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
<?php
for($i=0;$i<$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
	$id = $rows[0];
	$userid = $rows[1];
	$nickname = $rows[2];
	$title = $rows[3];
	$new = $rows[4];
	$addtime = $rows[5];
	$sex = $rows[6];
	$grade = $rows[7];
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
          <td height="35"  style="border-bottom:#E9E8E8 1px solid;padding-left:5px;color:#666666;">我于<font color="#999999"> <?php echo date_format2($addtime,'%Y-%m-%d %H:%M');?></font> 对
          <?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $nickname;?></font></a> 说：<a href="b_gbook2.php?aid=<?php echo $id; ?>&submitok=show&g=<?php echo $sex.$grade;?>" class=u666666><?php if ($senduserid == $Global['m_gbookadminuid'])echo "<font color=red>";?><?php echo htmlout(stripslashes($title)); ?></a>
</td>
          <td  style="border-bottom:#E9E8E8 1px solid;padding-left:5px;color:#666666;"><?php if ($new == 1)echo " <font color=red>(对方未阅)</font>";?></td>
      </tr>
        <?php }?>
    </table>
      <table width="700" height="60" border="0" align="center" cellpadding="0" cellspacing="0" style="border-top:#ddd 1px solid;margin-top:20px;">
        <tr>
          <td height="34" align="center" valign="middle" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
<?php
//lise end 
}
?>
<?php }?><?php }?>	    <br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>