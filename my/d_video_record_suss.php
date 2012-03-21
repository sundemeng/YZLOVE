<?php require_once '../sub/init.php';
if ($submittok !== 'add'){
	exit;
}
//
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
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
<table width="600" height="81" border="0" cellpadding="0" cellspacing="0" style="border-bottom:#ddd 1px solid;margin-bottom:20px;color:#666;">
  <tr>
    <td align="center"><font style="color:#f00;font-size:20px;font-family:黑体,宋体;letter-spacing:1px;font-weight:bold;">第二步，截取一个视频封面：</font><br />
      <br />
      <img src="images/tips.gif" width="23" height="21" hspace="5" align="absmiddle" />摆好你的姿势，点击“截取”按钮获取一个视频封面，填好标题和简介，最后点击“保存”按钮。</td>
  </tr>
</table>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="420" height="413">
  <param name="movie" value="images/record_save.swf?flvname=<?php echo $flvname; ?>&effectID=<?php echo $effectID; ?>&frameID=<?php echo $frameID; ?>" />
  <param name="quality" value="high" />
  <embed src="images/record_save.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="420" height="413"></embed>
</object>
<br /><br /><br />
    <br />
  </div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>