<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ($submitok == 'list'){
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
	$difftime = 2592000;//1 month
	$db->query("DELETE FROM ".__TBL_LOVEBHISTORY__." WHERE ((unix_timestamp() -  unix_timestamp(addtime) ) > $difftime) AND userid=".$cook_userid);
} else {
	if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$loveb=$row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_titile']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;width:70px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:70px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:70px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:70px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:70px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;}
.iframebox {margin:15px 0 0 0;border:#f60 1px solid;display:none}
.iframebox .iframeclose {text-align:right;height:25px;line-height:25px;background:#fc0;font-weight:bold;color:#000}
.iframebox .iframeclose .iframecloseL {float:left;padding:0 0 0 8px;}
.iframebox .iframeclose .iframecloseR {float:right;padding:5px 8px 0 0;height:20px;line-height:15px;}
.iframebox .iframeclose .iframecloseR a:link,.iframecloseR a:active,.iframecloseR a:visited {color:#000;}
.iframebox .iframeclose .iframecloseR a:hover {color:#f00;}
</style>
</head>
<body>
<ul>
<li <?php if ($submitok == "")echo "class='liselect'"; ?>><a href="k_myloveb.php">我的帐户</a></li>
<li <?php if ($submitok == "list")echo "class='liselect'"; ?>><a href="k_myloveb.php?submitok=list">消费清单</a></li>
<li><a href="k_vip.php">会员升级</a></li>
<li><a href="k_bidding.php">竞价排名</a></li>
<li><a href="k_homepage.php">装扮主页</a></li>
<li><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<?php if ($submitok !== 'list') {?>
<table width="540" height="399" border="0" align="center" cellpadding="4" cellspacing="0" bgcolor="F0EBE6" >
<tr>
<td width="170" valign="top" bgcolor="#FFFFFF" style="padding-left:12px;"><br>
  <br />
  <br />
  <br />
  <br />
  <img src="images/gold.gif" width="162" height="126" /> </td>
<td width="414" bgcolor="#FFFFFF" style="padding-left:5px;"><b><font face="Verdana, Arial, Helvetica, sans-serif"><br />
　&quot;<?php echo $cook_nickname; ?> </font></b><font face="Verdana, Arial, Helvetica, sans-serif">(<?php echo $cook_username; ?>，ID:<?php echo $cook_userid; ?>)<b>&quot;</b></font> 你好<i><font size="3">！</font></i><br />
<br />
<table width="300" height="88" border="0" cellpadding="5" cellspacing="0">
<tr>
<td align="center" bgcolor="#FFFFFF" style="padding-left:15px;color:666666;font-size:14px"><b><br />
您当前的<font color="FF89AC">Love币</font></b><img src="images/loveb.gif" hspace="3" border="0" align="absmiddle" />： <font color="#FF0000" size="3" face="Verdana, Arial, Helvetica, sans-serif"><b><?php echo $loveb; ?></b></font> 个<br />
<br /></td>
</tr>
<tr>
<td bgcolor="#FFFFFF" style="padding-left:15px;color:666666;"><a href="k_getloveb.php" class="u6699CC"><img src="images/ok.gif" width="14" height="14" hspace="3" border="0" align="absmiddle">获取love币</a>　<font color="#999999">|</font>　<a href="k_myloveb.php?submitok=list" class="u6699CC"><img src="images/ok.gif" width="14" height="14" hspace="3" border="0" align="absmiddle">love币消费记录明细查询</a></td>
</tr>
</table>
<br />
<br />
<br />
<br /></td>
</tr>
</table>
<?php } else {?>
<?php
//列表程序开始
$rt=$db->query("SELECT content,num,addtime FROM ".__TBL_LOVEBHISTORY__." WHERE  userid=".$cook_userid." ORDER BY id DESC");
$total = $db->num_rows($rt);
if ($total <= 0) {
	echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#CCCCCC><tr><td align=center bgcolor=#F2F8F1><font color=7E937E>..暂无信息..</font></td></tr></table>";
} else {
	$pagesize=20;
	require_once YZLOVE.'sub/class.php';
	if ($p<1)$p=1;
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
<br />
<table width="670" height="44" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="images/tips.gif" width="23" height="21" hspace="3" align="absmiddle">结算清单我们只保留最近的一个月的时间。</td>
        </tr>
    </table>
      <table width="670" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFE8F3" style="color:#666666">
        <tr>
          <td width="149" height="22" align="center" valign="bottom" style="font-size:10.3pt;"><b> 结算时间</b></td>
          <td width="401" align="center" valign="bottom" style="font-size:10.3pt;"><b>结算项目</b></td>
          <td width="114" align="center" valign="bottom" style="font-size:10.3pt;"><b>加 减</b></td>
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
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
	$content = $rows[0];
	$num = $rows[1];
	if ($num > 0) {
		$num = '+'.$num;
	} else {
		$num = '<font color=blue>'.$num.'</font>';
	}
	$addtime = $rows[2];
?>
<tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
<td height="32" align="center" style="border-bottom:#E9E8E8 1px solid;font-family:Verdana"><?php echo $addtime;?></td>
<td align="center" style="border-bottom:#E9E8E8 1px solid;font-family:Verdana"><?php echo $content;?></td>
<td align="center"style="font-size:12px;color:red;font-weight:bold;border-bottom:#E9E8E8 1px solid;font-family:Verdana"><?php echo $num;?></td>
</tr>
<?php }?>
</table>
<table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
</tr>
</table>
<br>
<br>
<br>
<?php //lise end
}?>
<?php }?>

</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>