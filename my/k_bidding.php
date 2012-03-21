<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT loveb,zhenghun_jingjia FROM ".__TBL_MAIN__." WHERE id=".$cook_userid." AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_loveb = $row[0];$data_zhenghun_jingjia = $row[1];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($data_zhenghun_jingjia > $data_loveb || $data_loveb <= 0) {
	$db->query("UPDATE ".__TBL_MAIN__." SET zhenghun_jingjia=0 WHERE id=".$cook_userid);
}
if ($submitok == 'modupdate'){
	if (!ereg("^[0-9]{1,8}$",$jjloveb) && !empty($jjloveb))callmsg("竞价love币必须填8位数以内的正整数或0","-1");
	$jjloveb = intval(abs($jjloveb));
	if ($jjloveb > $data_loveb) {
		callmsg("抱歉！你的Love币不足，竞价失败！请先获取Love币后再来申请！","k_getloveb.php");
	} else {
		$db->query("UPDATE ".__TBL_MAIN__." SET zhenghun_jingjia=".$jjloveb." WHERE id=".$cook_userid);
	}
	callmsg("恭喜！竞价成功。你出的价为：".$jjloveb."个Love币","k_bidding.php");
}
if ( ($data_zhenghun_jingjia <= $data_loveb) &&  ($data_loveb > 0) && ($data_zhenghun_jingjia > 0) ){
	$rt=$db->query("SELECT id FROM ".__TBL_MAIN__." WHERE flag=1 AND zhenghun_jingjia>0 AND loveb>0 ORDER BY zhenghun_jingjia DESC,grade DESC");
	$total = $db->num_rows($rt);
	if($total>0){
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			$tmpid = $rows[0];
			if(!$rows) break;
			if ($tmpid == $cook_userid){
				$mc = $i;
				break;
			}
		}
	}
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
<li><a href="k_myloveb.php">我的帐户</a></li>
<li><a href="k_myloveb.php?submitok=list">消费清单</a></li>
<li><a href="k_vip.php">会员升级</a></li>
<li class='liselect'><a href="k_bidding.php">竞价排名</a></li>
<li><a href="k_homepage.php">装扮主页</a></li>
<li><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="650" height="42" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FBDDF1">
<tr>
<td height="40" bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:黑体,宋体;letter-spacing:1px"><img src="images/bidding.gif" width="24" height="24" hspace="5" align="absmiddle" />&nbsp;竞价排名</td>
</tr>
<tr>
  <td align="center" bgcolor="#FFFFFF" style="line-height:150%;padding:20px;"><table width="670" height="55" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td width="23" align="right" valign="top" style="padding-top:5px;"><img src="images/tips.gif" width="23" height="21" /></td>
      <td align="left" valign="top" style="line-height:150%;color:#666666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />参与竞价后，你将脱颖而出，所有排名，将显示在最前面，个人主页的访问量将大增，资料被关注率将是没有参与竞价者的<font color="#FF0000">50倍</font>以上。根据你出的价格决定你在首页和被他人搜索出来的排名次序<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />建议上传形象照和完善资料以达到最佳效果　　<a href="c_photo_up.php" class="uDF2C91">上传照片</a>　<a href="c_photo_dtt.php" class="uDF2C91">在线拍照</a>　 <a href="a1.php" class="uDF2C91">修改资料</a> <br />
          <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />有人点击一次将从你的个人财富中扣除相应竞价数额，点一次扣一次，点到你的Love币为0为止(不点不扣，每天只扣第一次点击)。<font color="#FF0000">请不要麻木出价，以导致不必要的浪费。</font>如人家出100，其实你只要出101就能排到他(她)前面，对于出价相同的会员则按会员等级--&gt;活跃程度来排<br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />必须要有足够多的Love币用来参与竞价排名，你帐户中的Love币必须大于你出的价格<br />                　如果你的Love币不够，请先 <a href="k_getloveb.php" class="uDF2C91">获取Love币</a></td>
    </tr>
  </table>
  <?php if ( ($data_zhenghun_jingjia <= $data_loveb) &&  ($data_loveb > 0) && ($data_zhenghun_jingjia > 0) ){?>
    <table width="243" height="72" border="0" align="center" cellpadding="8" cellspacing="0">
      <tr>
        <td align="center" style="color:#666666;font-size:20px;font-family:黑体,宋体;letter-spacing:1px;font-weight:normal">你排在第 <span style="font-family:Verdana,Arial;font-size:24px;color:#ff0000;font-weight:bold"><?php echo $mc; ?></span> 位</td>
      </tr>
    </table>
	<?php }?>
    <br />
    <table width="500" height="89" border="00" align="center" cellpadding="8" cellspacing="1" bgcolor="EDD4F0">
  <form action="k_bidding.php" method="post">
    <tr>
      <td align="center" bgcolor="#ffffcc" style="font-size:14px"><b>我当前的<font color="#FF6699" face="Arial, Helvetica, sans-serif">Love币</font>为</b>：<font color="#FF0000"><?php echo $data_loveb; ?></font>个　　　<b>竞价状态</b>：<?php 
if ( ($data_zhenghun_jingjia <= $data_loveb) &&  ($data_loveb > 0) && ($data_zhenghun_jingjia > 0) ){
	echo '<img src=images/jj.gif align=absmiddle><font color=#008200>正在竞价</font>';
} else {
	echo '<img src=images/jj2.gif align=absmiddle>已停止竞价';
}	
?></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#FDEEF8" style="color:#666666"><br />
          <span style="font-size:12pt;font-weight:bold;"> <font color="#000000" style="font-size:20px;font-family:黑体,宋体;letter-spacing:1px;font-weight:normal">我出价：</font><input name="jjloveb" type="text" style="height:28px;font-family:Verdana,Arial;font-size:16pt;color:#ff0000;text-align:center" value="<?php echo $data_zhenghun_jingjia; ?>" size="10" maxlength="8" onkeypress="if (event.keyCode &lt; 45 || event.keyCode &gt; 57) event.returnValue = false;">
          <font color="FF6699" face="Arial, Helvetica, sans-serif">love</font><font color="FF6699">币</font></span><br />
          <img src="images/hehe.gif" width="10" height="8" /><br />
          <input type="image" src="images/zh_price.gif" />
          <input type="hidden" name="submitok" value="modupdate" />
          <br />
          <font style="font-size:9pt;">( 请在上面文本框内填一个小于<font color="#FF0000"><?php echo $data_loveb; ?></font>的数字，停止竞价请填0 </font>)<br />
          <br />
          <table width="381" height="22" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td colspan="2" align="left"><img src="images/tips3.gif" width="11" height="15" hspace="3" align="absmiddle" /><font color="#FF0000">友情提醒：</font></td>
              </tr>
            <tr>
              <td width="31">&nbsp;</td>
              <td width="335" align="left">　1.竞价之前一定要认真阅读上面的说明<br />
                　2.你最好填写100以内的数字，根据你的财富实力出价，否则你帐户中的Love币会很快被扣光直到为0<br /> 
                　<font color="#FF0000">3.建议设置形象照和完善资料以达到最佳效果</font><br />　　
                <a href="c_photo_main.php" class="uDF2C91">设置形象照</a>　　<a href="a1.php" class="uDF2C91">完善资料</a></td>
            </tr>
          </table>
          <font color="#FF0000"><br />
          </font></td>
    </tr>
  </form>
</table>
    <br />
    [ 下面是系统列出的前20名竞价者供你参考 ]<br />
    <br />
    <?php
$rt=$db->query("SELECT id,nickname,grade,sex,zhenghun_jingjia FROM ".__TBL_MAIN__." WHERE flag=1 AND zhenghun_jingjia>0 AND loveb>0 ORDER BY zhenghun_jingjia DESC,grade DESC LIMIT 20");
$total = $db->num_rows($rt);
if($total>0){
?>
<table width="500" border="00" align="center" cellpadding="3" cellspacing="0" style="border:#EDD4F0 1px solid;">
  <tr>
    <td width="151" height="29" align="center" bgcolor="FDEEF8"><font color="FF40BF"><b>名　次</b></font></td>
    <td width="151" align="center" bgcolor="FDEEF8"><font color="FF40BF"><b>竞价者</b></font></td>
    <td width="142" align="center" bgcolor="FDEEF8"><font color="FF40BF"><b>当前出价</b></font></td>
  </tr>
  <?php
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
	if ($rows['id'] == $cook_userid){
		$bg="bgcolor=#ffffcc";
		$overbg="#ffffcc";
		$outbg="#ffff00";
	} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
} else {
	if ($rows['id'] == $cook_userid){
		$bg="bgcolor=#ffffcc";
		$overbg="#ffffcc";
		$outbg="#ffff00";
	} else {
		$bg="bgcolor=#ffffff";
		$overbg="#ffffcc";
		$outbg="#ffffff";
	}
}
?>
  <tr <?php echo $bg;?> onmouseover="this.style.background='<?php echo $overbg; ?>'" onmouseout="this.style.background='<?php echo $outbg; ?>'" >
    <td height="29" align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;">第<b><font color="#ff6600" face="Geneva, Arial, Helvetica, sans-serif">
      <?php
if ($i < 10)echo '0';
echo $i;
?>
    </font></b>名</td>
    <td style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><a href="<?php echo $Global['home_2domain'];?>/<?php echo $rows['id'];?>" target="_blank" class="u333333">
      <?php geticon($rows['sex'].$rows['grade']);?><?php echo htmlout(stripslashes($rows['nickname']));?></a>　　<b><font color="#FF0000"><?php 	if ($rows['id'] == $cook_userid){
echo '我自已';}  ?></font></b></td>
    <td align="center" style="border-bottom:#DDDDDD 1px solid;color:#7E7E7E;"><font color="#FF0000" face="Geneva, Arial, Helvetica, sans-serif"><b><?php echo $rows['zhenghun_jingjia']; ?></b></font><font color="#FF6699" face="Arial, Helvetica, sans-serif"> Love币</font></td>
  </tr>
  <?php
}
?>
</table>
<?php
} else { ?>
..暂无内容..
<?php }?>
<br /></td>
</tr>
</table>
  <br />
  <br />
  <br>
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>