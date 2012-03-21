<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
ul {width:754px;height:28px;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;display:block;}
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
</style>
</head>
<body>
<ul>
<li><a href="h_ask.php?submitok=list">我的病历</a></li>
<li><a href="h_ask.php?submitok=add">挂号看病</a></li>
<li class='liselect'><a href="h_ask_bbsed.php">开过的处方</a></li>
<li><a href="h_ask_favorite.php">病历收藏  </a></li>
</ul>
<div class="main2">
<div class="main2_frame">
  <?php
//列表程序开始
	$rt=$db->query("SELECT id,fid,content,addtime FROM ".__TBL_ASK_BBS__." WHERE userid=".$cook_userid." ORDER BY id DESC");
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
  <table width="99" height="10" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td></td>
    </tr>
  </table>
  <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="499" height="30" align="center" valign="middle" style="border-bottom:#ddd 1px solid">开 过 的 处 方</td>
      <td width="147" align="center" valign="middle" style="border-bottom:#ddd 1px solid">回答时间</td>
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
?>
    <tr <?php echo $bg;?> onmouseover="this.style.background='<?php echo $overbg; ?>'" onmouseout="this.style.background='<?php echo $outbg; ?>'" >
      <td height="35" style="border-bottom:#E9E8E8 1px solid;line-height:150%"><a href="../clinic/detail<?php echo $rows['fid']; ?>.html" target="_blank" class="666666"><img src="images/zoom.gif" alt="查看详细" hspace="5" border="0" align="absmiddle" /><?php echo htmlout(stripslashes($rows['content'])); ?></a></td>
      <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#999999"><?php echo $rows['addtime'];?></font></td>
    </tr>
    <?php }?>
  </table>
  <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    </tr>
  </table>
  <?php
//lise end 
}
?>
  <br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>