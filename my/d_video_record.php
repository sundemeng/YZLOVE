<?php require_once '../sub/init.php';
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT grade FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_grade=$row[0];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
$rtt = $db->query("SELECT COUNT(*) FROM ".__TBL_VIDEO__." WHERE userid=".$cook_userid);
$rowss = $db->fetch_array($rtt);
$tmpvideocount = $rowss[0];
$outinfo = 'YES';
if ($data_grade ==1 ) {
	if ($tmpvideocount >= $Global['m_photo_num1'])$outinfo = 'SORRY';
} elseif ($data_grade == 2) {
	if ($tmpvideocount >= $Global['m_photo_num2'] )$outinfo = 'SORRY';
} elseif ($data_grade == 3) {
	if ($tmpvideocount >= $Global['m_photo_num3'] )$outinfo = 'SORRY';
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
	<div class="main1_tselect"><a href="d_video_record.php" class="a6F9F00">录制视频</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="d_video_favorites.php" class="a333">视频收藏</a></div>
</div>
<div class="main2">
  <div class="main2_frame"><br />
<?php if ($outinfo == 'SORRY') {?>
  
<br /><br /><br /><br /><br /><br />
<table width=392 height=176 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd>
  <tr>
    <td align=center bgcolor=#f3f3f3 style="line-height:20px;"><i><font color="#FF0000" face="Arial Black" style="font-size:21px;">Sorry!</font></i><font color="666666"> 视频个数已到极限，你可以删除部分！　 <a href="d_video_list.php">进入删除</a><br>
         <br>
      普通会员最多<font color="#FF0000"><?php echo $Global['m_photo_num1'];?></font>个<br>
      诚信会员最多<font color="#FF0000"><?php echo $Global['m_photo_num2'];?></font>个<br>
      钻石会员最多<font color="#FF0000"><?php echo $Global['m_photo_num3'];?></font>个<br>
      </font><br>
      <img src="images/yes.gif" width="16" height="14" hspace="3"><a href="k_bank.php" class="u666666"><b>立即升级会员</b></a>　　<img src="images/diamond.gif" width="20" height="16" hspace="3" align="absmiddle"><a href="k_vip.php" class="u666666">高级会员还有哪些特权？</a></td>
  </tr>
</table>
<?php } else { ?>
<div id="Player">
<SCRIPT Language="JavaScript" src="images/lrcsys.js"></SCRIPT>
<SCRIPT language=JScript event=playStateChange(ns)  for=mediaPlayerObject>evtPSChg(ns);</SCRIPT>
  <object id="SwfMovieIE" height="410" width="725" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
    <param NAME="_cx" VALUE="19182"  />
    <param NAME="_cy" VALUE="10848" />
    <param NAME="FlashVars" VALUE="" />
    <param NAME="Movie" VALUE="images/record.swf" />
    <param NAME="Src" VALUE="images/record.swf" />
    <param NAME="WMode" VALUE="Window" />
    <param NAME="Play" VALUE="0" />
    <param NAME="Loop" VALUE="-1" />
    <param NAME="Quality" VALUE="High" />
    <param NAME="SAlign" VALUE="LT" />
    <param NAME="Menu" VALUE="-1" />
    <param NAME="Base" VALUE />
    <param NAME="AllowScriptAccess" VALUE="always" />
    <param NAME="Scale" VALUE="NoScale" />
    <param NAME="DeviceFont" VALUE="0" />
    <param NAME="EmbedMovie" VALUE="0" />
    <param NAME="BGColor" VALUE />
    <param NAME="SWRemote" VALUE />
    <param NAME="MovieData" VALUE />
    <param NAME="SeamlessTabbing" VALUE="1" />
    <param NAME="Profile" VALUE="0" />
    <param NAME="ProfileAddress" VALUE />
    <param NAME="ProfilePort" VALUE="0" /><embed src="images/record.swf" height="410" width="725" FlashVars="">
  </object>
  </div>
<?php }?>
  <div id="MusicPlayer" style="DISPLAY: none">

</div>
<form id="FormFile" style="DISPLAY: none">
  <input id="InputFile" type="file" name="InputFile" />
</form>
<script language="javascript" src="images/player_rec.js"></script>
<script language="javascript" src="images/nosir_rec.js"></script>
<table width="669" height="55" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td width="23" align="right" valign="top" style="padding-top:8px;"><img src="images/tips.gif" width="23" height="21" /></td>
    <td width="606" align="left" valign="bottom" style="line-height:150%;color:#666;"><b><font color="#FF0000">温馨提示:</font></b></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding-top:8px;">&nbsp;</td>
    <td width="606" align="left" style="line-height:150%;color:#666;"><img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" />录制完毕请点击“保存视频”，进入下一步。否则您录制的视频将会丢失。 <br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><span style="line-height:200%;color:#666">您应保证您录制的内容正当、合法，同时不侵犯他人的肖像权、名誉权、知识产权等任何合法权益。 </span><br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><span style="line-height:200%;color:#666">您的录制代表您同意<?php echo $Global['m_sitename']; ?>以任何方式使用您录制的内容并且不需要支付费用，除非双方另有约定。</span><br />
        <img src="images/li.gif" width="3" height="5" hspace="5" vspace="8" align="absmiddle" /><span style="line-height:200%;color:#666"><?php echo $Global['m_sitename']; ?>如果认为您录制的内容不适当，有权删除或者修改。</span><br />
        <br /></td>
  </tr>
</table>
<br /><br />
<br /><br /><br />
  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>