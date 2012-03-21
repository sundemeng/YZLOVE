<?php
require_once "../sub/init.php";
if ( !ereg("^[0-9]{1,8}$",$fid) )callmsg("请求错误，该信息不存在或已被删除！","-1");
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT a.id,a.username,a.nickname,a.grade,a.loveb,a.alltime,a.logincount,a.mbkind,a.mbtitle,a.magic,a.bgpic,a.sex,a.photo_s,a.click,b.path_b,b.title,b.content,b.addtime,b.click as videoclick,b.effectid,b.frameid FROM ".__TBL_MAIN__." a,".__TBL_VIDEO__." b WHERE a.id=b.userid  AND a.flag=1 AND b.id=".$fid);
if($db->num_rows($rt)){
$row = $db->fetch_array($rt);
$uid         = $row['id'];
$username    = $row['username'];
$nickname    = $row['nickname'];
$grade       = $row['grade'];
$loveb       = $row['loveb'];
$alltime     = $row['alltime'];
$logincount  = $row['logincount'];
$mbkind      = $row['mbkind'];
$mbtitle     = $row['mbtitle'];
$magic       = $row['magic'];
$bgpic       = $row['bgpic'];
$sex         = $row['sex'];
$photo_s     = $row['photo_s'];
$click       = $row['click'];
$path_b      = $row['path_b'];
$title       = htmlout(stripslashes($row['title']));
$content     = htmlout(stripslashes($row['content']));
$addtime     = $row['addtime'];
$videoclick  = '<font color=#ff0000>'.$row['videoclick'].'</font>';
$effectid    = $row['effectid'];
$frameid     = $row['frameid'];
} else {
echo "&nbsp;&nbsp;<font color='#999999' style='font-size: 9pt'>".$Global['m_sitename']."( <a href=".$Global['www_2domain'].">".$Global['www_2domain']."</a> )提示：</FONT><BR><BR>&nbsp;&nbsp;<font color='#FF0000' style='font-size: 9pt'>请求错误，该信息或用户不存在或未审核或已被锁定或已被删除！</FONT><BR><BR><p align=center><input onclick='history.back();' type='button' value='返回'></p>";
exit;}
$db->query("UPDATE ".__TBL_VIDEO__." SET click=click+1 WHERE id=".$fid);
if (empty($bgpic)) {$tmpbg = "images/".$mbkind."/bg.jpg";}else{$tmpbg = $bgpic;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $nickname;?>的视频 | <?php echo $Global['m_sitename'] ?></title>
<style type="text/css">
body{background-image:url("<?php echo $tmpbg;?>")}
</style>
<link href="images/<?php echo $mbkind; ?>/v.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/home.css" rel="stylesheet" type="text/css" />
<link href="images/<?php echo $mbkind; ?>/homex.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php require_once YZLOVE.'home/head.php'?>
<div class="main">
<div class="left">
<?php require_once YZLOVE.'home/leftx.php'?>
<?php require_once YZLOVE.'home/left_ad.html'?>
</div>
<div class="right">
<div class="rightTitle"><h4><?php echo $title; ?></h4><a href="myvideo<?php echo $uid; ?>.html">>>更多视频</a></div>
<div class="rightContent">
<div class="videoContent"><h2>视频标题：</h2><?php echo $title; ?><br /><h2>人　　气：</h2><?php echo $videoclick; ?><br><h2>录制时间：</h2><?php echo $addtime; ?><br><h2>视频简介：</h2><?php echo $content; ?></div>
<div id="flash_55178ae7-6f77-47e3-b10e-5792afca5c17" style="FLOAT: center; WIDTH: 550px; HEIGHT: 452px;margin:0px auto;"></div>
<script language="JavaScript" src="video/swfobject.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript">
var orginFlash = {init:false,isFullScreen:false,position:"",top:"",left:"",width:"",height:""};
function writeFlash(){
var so = new SWFObject("images/play.swf", "fplayer", "100%", "100%", 8, "#FFFFFF");
so.addParam("quality", "high");
so.addParam("swLiveConnect", "true");
so.addParam("menu", "false");
so.addParam("allowScriptAccess", "sameDomain");
so.addParam("allowFullScreen", "true");
so.addVariable("flv_path","<?php echo $Global['up_2domain'].'/'.$Global['m_flvpath'].'/'.$row["path_b"]?>");
so.addVariable("effectID", "f<?php echo $effectid;?>");
so.addVariable("frameID", "f<?php echo $frameid;?>");
so.addVariable("flvid", "<?php echo $fid;?>");		
so.write("flash_55178ae7-6f77-47e3-b10e-5792afca5c17");
}window.onresize = reSize;writeFlash();</script>
<div class="videoContent">
<h2>视频地址</h2>：<font  class=tiaose>(点击地址复制)</font><br>
<script>
function copyCode(o){o.select();var js=o.createTextRange();js.execCommand("Copy");alert("复制成功，发给QQ上的好友吧！");}
document.write("<table align=center cellpadding=1 cellspacing=0><tr>");
document.write("<td width=10% nowrap class=tablebody1></td></tr>");
document.write("<tr><td class=tablebody1><textarea onfocus=this.select() style='width:99%;overflow-y:hidden;font-size:9pt;' class='copyCode' onclick=copyCode(this) rows=1>");
document.write(self.location+"</textarea></td></tr></table>");
</script>
<font color="#666666">[↑本页地址↑,通过QQ或MSN发给你朋友]</font>
</div>
<div class="videoContent" style="text-align:center;color:#999;padding:0px"><a href="<?php echo $Global['my_2domain']; ?>/?d_video_favorites.php?fid=<?php echo $fid; ?>&submitok=addupdate" class=A9BU_tiaose>收藏该视频</a>　|　<a href="<?php echo $Global['my_2domain']; ?>/?d_video_record.php" class=A9BU_tiaose>我要录制</a></div>
<div class="videoContent" style="text-align:right;margin:0 0 20px 0"><a href="myvideo<?php echo $uid; ?>.html" class=A9BU_tiaose>查看我的更多视频</a></div>
</div>
</div>
<div class="clear"></div>
</div>
<?php
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
require_once YZLOVE.'home/foot.php'?>