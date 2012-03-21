<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="addupdate") {
	if ( !ereg("^[0-9]{1,10}$",$fid) || empty($fid) )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT title FROM ".__TBL_VIDEO__." WHERE id=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$tmptitle = $row[0];
	} else {
		callmsg("Forbidden!","-1");
	}
	$addtime=date("Y-m-d H:i:s");
	$tmpurl = $fid;
	$db->query("INSERT INTO ".__TBL_FAVORITE__."  (userid,kind,title,url,addtime) VALUES ($cook_userid,1,'$tmptitle','$tmpurl','$addtime')");
	//header("Location: b_video_favorite.php");
	callmsg("收藏成功!","-1");
	exit;
} elseif ($submitok=="delupdate") {
	$tmeplist = $list;
	if (empty($tmeplist))callmsg("请选择您要删除的信息！","-1");
	if (!is_array($tmeplist))callmsg("Forbidden!","-1");
	if (count($tmeplist) >= 1){
		foreach ($tmeplist as $value) {
			$db->query("DELETE FROM ".__TBL_FAVORITE__." WHERE id=".$value);
		}
	}
	header("Location: d_video_favorites.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* .main1 */
.main1 {width:754px;height:28px;margin-left:28px;overflow:hidden;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:74px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:74px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;text-align:center;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="d_video_list.php" class="a333">我的视频</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="d_video_record.php" class="a333">录制视频</a></div>
	<div class="main1_tselect"><a href="d_video_favorites.php" class="a6F9F00">视频收藏</a></div>
</div>
<div class="main2">
  <div class="main2_frame">
<br />
<?php
//列表程序开始
	$rt=$db->query("SELECT * FROM ".__TBL_FAVORITE__." WHERE userid=".$cook_userid." AND kind=1 ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
		echo "<table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd style='margin:60px'><tr><td align=center bgcolor=#f3f3f3><font color=666666>..暂无信息..</font></td></tr></table>";
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
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
<form name=MYFORM method=post action=d_video_favorites.php>
<SCRIPT LANGUAGE="JavaScript">
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
          <td width="54" height="22" valign="top"><input name="button" type="button" style="border:#D6D6D6 1px solid;padding-top:1px;height:18;background:#FAF8F8;color:#999999;width:52px;" onClick="this.value=check(this.form)" value="√全选"></td>
          <td width="446" height="28" align="center"><input type=hidden name=submitok value=delupdate></td>
          <td width="144" align="right" valign="top"><input type="submit" style="border:#D6D6D6 1px solid;padding-top:1px;height:18;background:#FAF8F8;color:#999999;width:52px;"  value="×删除"></td>
        </tr>
        <?php
		for($i=0;$i<$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 2 == 0){
				$bg="bgcolor=#FCF9FD";
				$overbg="#ffffcc";
				$outbg="#FCF9FD";
			} else {
				$bg="bgcolor=#ffffff";
				$overbg="#EDF8FF";
				$outbg="#ffffff";
			}
?>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
          <td height="28" align="center" style="border-bottom:#dddddd 1px dotted;"><input type="checkbox" name="list[]" value="<?php echo $rows['id']; ?>"></td>
          <td align="left" style="border-bottom:#dddddd 1px dotted;"><a href="<?php echo $Global['home_2domain']."/v".$rows['url'].".html"; ?>" target=_blank class=666666><img src="images/zoom.gif" alt="查看详细" hspace="5" border="0" align="absmiddle"><?php echo htmlout(stripslashes($rows['title'])); ?></a>　</td>
          <td style="border-bottom:#dddddd 1px dotted;"><font color="#999999"><?php echo $rows['addtime'];?></font></td>
        </tr>
        <?php }?>
</form>
    </table>
      <table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
        </tr>
    </table>
<?php
//lise end 
}
?>
<br />

  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>