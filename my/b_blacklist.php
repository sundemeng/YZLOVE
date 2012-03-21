<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="jc") {
	if ( !ereg("^[0-9]{1,10}$",$classid) || empty($classid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT senduserid FROM ".__TBL_FRIEND__." WHERE id=".$classid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmpsenduserid = $row[0];
	} else {
		callmsg("Forbidden!","-1");
	}
	if ($cook_userid !== $tmpsenduserid)callmsg("Forbidden!","-1");
	$db->query("DELETE FROM ".__TBL_FRIEND__." WHERE id=".$classid);
	header("Location: b_blacklist.php");
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
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_friend_news.php" class="a333">好友动态</a></div>
<div class="main1_tselect"><a href="b_blacklist.php" class="a6F9F00">黑 名 单</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_request.php" class="a333">征友要求</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_user.php" class="a333">速配结果</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_rand.php" target="_blank" class="a333">弹出缘分</a></div>
<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="b_viewuser.php" class="a333">最近访客</a></div>
</div>
<div class="main2">
<div class="main2_frame"><br />
<?php
	$rt=$db->query("SELECT a.id,a.userid,a.addtime,b.nickname,b.sex,b.grade,b.photo_s FROM ".__TBL_FRIEND__." a , ".__TBL_MAIN__." b  WHERE  a.senduserid=".$cook_userid." AND a.userid=b.id AND a.ifhmd=1 ORDER BY a.id DESC");
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
<table width="100" height="5" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
    </table>
      <table width="700" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
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
			$id = $rows[0];
			$userid = $rows[1];
			$nickname = $rows[3];
			$addtime = $rows[2];
			$sex = $rows[4];
			$grade = $rows[5];
			$photo_s = $rows[6];
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
<form method=post action=b_blacklist.php>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
          <td width="53" height="28" align="center"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $senduserid; ?>" target="_blank"><?php 
if (empty($photo_s)){
echo "<img src=".$Global['www_2domain']."/images/noxpic".$sex.".gif width=41 height=50 border=0>";
} else {
echo "<img src=".$Global['up_2domain']."/photo/".$photo_s." width=41 height=50 border=0>";
}
?>
          </a></td>
          <td width="163" ><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'];?>/<?php echo $userid; ?>"  target=_blank><?php if ( $sex == 1 ) {echo "<font color=#0066CC>";} else {echo "<font color=#FB2E7B>";} ?><?php echo $nickname;?></font></a></td>
          <td width="214" align="center"><font color="#666666">列入时间：<?php echo $addtime;?></font></td>
          <td width="204" align="right">
            <input type="submit" style="border:#D6D6D6 1px solid;padding-top:1px;height:18;background:#FAF8F8;color:#999;width:52px;"  value="×解除" />
            <input type="hidden" name="submitok" value="jc" />
            <input type="hidden" name="classid" value="<?php echo $id; ?>" />
         </td>
        </tr>
</form>
        <?php }?>
    </table>
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
<br />
<br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>