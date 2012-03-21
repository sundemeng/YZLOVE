<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_loveb = $row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok == 'jjupdate'){
	if ( !ereg("^[0-9]{1,8}$",$fid) || $fid == 0 )callmsg("Forbidden!","-1");
	$rt = $db->query("SELECT userid FROM ".__TBL_DATING__." WHERE id=".$fid);
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		if ($memberid !== $cook_userid)callmsg("Forbidden!","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	if (!ereg("^[0-9]{1,5}$",$jjloveb) && !empty($jjloveb))callmsg("竞价love币必须填5位数以内的正整数或0","-1");
	$jjloveb = intval(abs($jjloveb));
	if ($jjloveb > $data_loveb) {
		callmsg("抱歉！你的Love币不足，竞价失败！请先获取Love币后再来申请！","k_getloveb.php");
	} else {
		$db->query("UPDATE ".__TBL_DATING__." SET jjloveb=".$jjloveb." WHERE id=".$fid);
	}
	callmsg("恭喜！竞价成功。你出的价为：".$jjloveb."个Love币","e_dating_price.php");
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
.main1_tselect {float:left;width:84px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:84px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;overflow:hidden;text-align:center;}
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_list.php" class="a333">我的约会</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_add.php" class="a333">发起约会</a></div>
	<div class="main1_tselect" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background='F0FAE9'"><a href="e_dating_price.php" class="a6F9F00">约会竞价排名</a></div>
	<div class="main1_t"  onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="e_dating_join.php" class="a333">我参加的约会</a></div>
</div>
<div class="main2">
  <div class="main2_frame">
<br />

<?php
//列表程序开始
	$rt=$db->query("SELECT id,title,bmnum,jjloveb FROM ".__TBL_DATING__." WHERE flag=1 AND userid=".$cook_userid." ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if ($total <= 0) {
	$jjok = 0;
?>
		<br><br><table width=392 height=176 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=dddddd>
		  <tr>
		    <td height="40" align=center bgcolor=#FFFFFF style="line-height:20px;color:#666"><i><font color="#FF0000" face="Arial Black" style="font-size:21px">Sorry!</font></i>　无法参与竞价，可能原因：</td>
		  </tr>
		  <tr>
		    <td align=left bgcolor=#f8f8f8 style="color:#666;padding-left:50px">① 你还没有发布约会信息　<img src=images/fb.gif hspace=3 vspace="15" align=absmiddle /><a href=e_dating_add.php class=uDF2C91><b>点此发布</b></a><br />
② 无有效的约会(未审核或结束后的约会不可以竞价排名)<br />
<br /></td>
	      </tr>
		</table><br><br><br><br>
<?php } else {
$jjok = 1;
?>
      <table width="670" height="55" border="0" cellpadding="5" cellspacing="0">
        <tr>
          <td width="23" align="right" valign="top" style="padding-top:5px;"><img src="images/tips.gif" width="23" height="21" /></td>
          <td align="left" valign="top" style="line-height:150%;color:#666666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />参与竞价后，根据您出的价格决定你在首页或约会频道的排名次序。<br />
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />有人点击一次将从你的个人财富中扣除相应竞价数额，点到你的Love币为0为止(不点不扣，只扣第一次点击)。<br />
            　<font color="#FF0000">请不要麻木出价，以导致不必要的浪费。</font>如人家出100，其实你只要出101就能排到他(她)前面。<br />
              <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />您要有足够多的Love币用来参与排名，必须大于你出的价格；如果你的Love币不够，请先 <a href="k_getloveb.php" class="uDF2C91"><b>获取Love币</b></a> 。</td>
        </tr>
      </table>
      <table width="98" height="15" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
    </table>
      <table width="650" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF" style="border:#EDD4F0 1px solid;color:#666;">
        <tr>
          <td height="22" colspan="3" align="left" valign="bottom" bgcolor="#FDEEF8" style="color:#DF2C91;font-weight:bold;padding-left:8px;font-size:14px">我的约会</td>
        </tr>
<?php
for($i=0;$i<$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
	$bg="bgcolor=#ffffff";
	$overbg="#ffffcc";
	$outbg="#ffffff";
} else {
	$bg="bgcolor=#f3f3f3";
	$overbg="#ffffcc";
	$outbg="#f3f3f3";
}
?>
<form action=e_dating_price.php method=post>
        <tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'">
          <td width="414" align="left" style="padding-left:5px;"><a href="<?php echo $Global['home_2domain'];?>/dating<?php echo $rows['id'].'.html';?>" class=333333 target="_blank" style='font-size:10.3pt;'><img src="images/groupren.gif" hspace="5" border="0" align="absmiddle"><?php echo stripslashes($rows['title']); ?></a><?php 
?>　(<font color="#FF0000"><?php echo $rows['bmnum'];?></font>人报名)<input type=hidden name=fid value="<?php echo $rows['id'];?>"></td>
          <td width="136" height="40" align="right" style="color:#666;font-size:14px">我出价：<input name="jjloveb" type="text" style="font-family:Verdana,Arial;text-align: center;color:#ff0000" value="<?php echo $rows['jjloveb']; ?>" size="8" maxlength="5" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
          <br /></td>
          <td width="92" align="left"><input type=image src=images/jjloveb.gif><input type=hidden name=submitok value="jjupdate"></td>
        </tr>
</form>		
        <?php }?>
    </table>
      <?php }if ($jjok  == 1) {?>
      <br />
      <table width="650" height="36" border="0" cellpadding="0" cellspacing="0" bgcolor="ffffcc" style="border:#EDD4F0 1px solid;color:#666;">
        <tr>
          <td align="center" style="color:#666"><b>我当前的<font color="#FF6699" face="Arial, Helvetica, sans-serif">Love币</font>为</b>：<font color="#FF0000"><?php echo $data_loveb; ?></font>个　　　<font style="font-size:9pt;">(请在上面文本框内填一个小于<font color="#FF0000"><?php echo $data_loveb; ?></font>的数字，停止竞价请填<font color="#FF0000">0</font></font>)</td>
        </tr>
      </table>
      <br />
<?php
}
$rt=$db->query("SELECT a.id,a.nickname,a.grade,a.sex,b.id as fid,b.title,b.bmnum,b.jjloveb FROM ".__TBL_MAIN__." a,".__TBL_DATING__." b WHERE a.id=b.userid AND b.flag=1 ORDER BY b.jjloveb DESC");
$total = $db->num_rows($rt);
if($total>0){
$pagesize=20;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?><table width="650" border="00" align="center" cellpadding="3" cellspacing="0" style="border:#EDD4F0 1px solid;">
<tr>
<td width="71" height="22" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>名　次</b></font></td>
<td width="134" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>竞价人</b></font></td>
<td width="307" align="center" bgcolor="#FDEEF8"><b><font color="#DF2C91">竞价约会主题</font></b></td>
<td width="112" align="center" bgcolor="#FDEEF8"><font color="#DF2C91"><b>当前出价</b></font></td>
</tr>
<?php
for($i=1;$i<=$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
		$bg="bgcolor=#f3f3f3";
		$overbg="#ffffcc";
		$outbg="#f3f3f3";
} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
}
?><tr <?php echo $bg;?> onMouseOver="this.style.background='<?php echo $overbg; ?>'" onMouseOut="this.style.background='<?php echo $outbg; ?>'" >
<td height="29" align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;">第<b><font color="ff6600" face="Geneva, Arial, Helvetica, sans-serif">
<?php
if ($i < 10)echo '0';
echo $i;
?>
</font></b> 名</td>
<td align="center" style="border-bottom:#DDDDDD 1px solid;color:#ff0000;">
<?php if ($rows['id'] == $cook_userid){ ?>
我自已
<?php }else{?>
<a href=<?php echo $Global['home_2domain'];?>/<?php echo $rows['id'];?> target=_blank class="u333333"><?php geticon($rows['sex'].$rows['grade']);?><?php echo htmlout(stripslashes($rows['nickname']));?></a>
<?php }?></td>
    <td align="left" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><a href="<?php echo $Global['home_2domain'];?>/dating<?php echo $rows['fid'].'.html';?>" class=333333 target="_blank" style='font-size:10.3pt;'><img src="images/groupren.gif" hspace="5" border="0" align="absmiddle"><?php echo stripslashes($rows['title']); ?></a><?php 
?>　(<font color="#FF0000"><?php echo $rows['bmnum'];?></font>人报名)</td>
    <td align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><font color="#FF0000" face="Geneva, Arial, Helvetica, sans-serif"><b><?php echo $rows['jjloveb']; ?></b></font><font color="#FF6699" face="Arial, Helvetica, sans-serif"> Love币</font></td>
    </tr>
<?php
}
?></table>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="587" height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
  </tr>
</table>
<?php
} else { ?>
..暂无内容..
<?php }?>
<br />
<br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
      <br />
      <br />
      <br />
      <br />
  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>