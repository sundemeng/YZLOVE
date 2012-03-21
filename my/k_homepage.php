<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id,grade,mbkind,mbtitle,magic,bgpic,bgmusic FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_userid=$row[0];$data_grade=$row[1];$data_mbkind=$row[2];$data_mbtitle=$row[3];$data_magic=$row[4];$data_bgpic=$row[5];$data_bgmusic=$row[6];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//
if ($submitok=="modupdate") {
	if ( !ereg("^[0-9]{1,2}$",$mbkind) )callmsg("Forbidden!","-1");
	if ($data_grade <2 )callmsg("只有高级会员才享有此功能！","k_vip.php");
	if (strlen($mbtitle) > 200)callmsg("主页标题请控制在200字节以内！","-1");
	$db->query("UPDATE ".__TBL_MAIN__." SET mbkind='$mbkind',mbtitle='$mbtitle',magic='$magic',bgpic='$bgpic',bgmusic='$bgmusic' WHERE id=".$data_userid);
	callmsg("修改成功！","-1");
}?>
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
<li><a href="k_bidding.php">竞价排名</a></li>
<li class="liselect"><a href="k_homepage.php">装扮主页</a></li>
<li><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
<table width="650" height="103" border="0" align="center" cellpadding="8" cellspacing="0" style="margin-top:15px;">
<form action="" method="post" name="YZLOVEFORM">
  <tr>
    <td width="102" align="right">主页地址:</td>
    <td width="516" style="font-weight:bold;"><a href="<?php echo $Global['home_2domain'] ?>/<?php echo $cook_userid ?>" target="_blank" class="u666"><?php echo $Global['home_2domain'] ?>/<?php echo $cook_userid ?></a></td>
    </tr>
  <tr>
    <td width="102" align="right">主页标题:</td>
    <td style="font-weight:bold;"><font color="#666666">
      <input name="mbtitle" type="text" class="input" value="<?php echo $data_mbtitle;?>" size="70" maxlength="100" />
    </font></td>
  </tr>
  <tr>
    <td align="right">主页风格:</td>
    <td><table border="0" cellspacing="10">
      <tr>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#DB8AB0"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="1" <?php if ($data_mbkind == 1)echo "checked";?> />
          粉色</font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#CB96F5" style=""><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="2" <?php if ($data_mbkind == 2)echo "checked";?> />
          紫色</font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#FF2668"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="3" <?php if ($data_mbkind == 3)echo "checked";?> />
          红色</font></td>
        </tr>
      <tr>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#FF822F">
          <input type="radio" name="mbkind" value="4" <?php if ($data_mbkind == 4)echo "checked";?> />
          <font color="#FFFFFF">橙色</font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#009900"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="5" <?php if ($data_mbkind == 5)echo "checked";?> />
          绿色</font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#B55609"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="6" <?php if ($data_mbkind == 6)echo "checked";?> /> 
          棕色</font></td>
        </tr>
      <tr>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#083C93"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="7" <?php if ($data_mbkind == 7)echo "checked";?> />
          蓝色</font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#000000"><font color="#FFFFFF">
          <input type="radio" name="mbkind" value="8" <?php if ($data_mbkind == 8)echo "checked";?> />
          黑色
        </font></td>
        <td width="108" height="50" align="center" valign="bottom" bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
    </table></td>
    </tr>
  <tr>
    <td align="right">主页特效:</td>
    <td><select name="magic" size="1" id="magic">
<option value="0" <?php if ($data_magic == 0)echo 'selected'; ?>>无特效</option>
<option value="1" <?php if ($data_magic == 1)echo 'selected'; ?>>细雨蒙蒙</option>
<option value="2" <?php if ($data_magic == 2)echo 'selected'; ?>>金鱼</option>
<option value="3" <?php if ($data_magic == 3)echo 'selected'; ?>>青蛙</option>
<option value="4" <?php if ($data_magic == 4)echo 'selected'; ?>>蚂蚁</option>
<option value="5" <?php if ($data_magic == 5)echo 'selected'; ?>>蜻蜓</option>
<option value="6" <?php if ($data_magic == 6)echo 'selected'; ?>>花瓣</option>
<option value="7" <?php if ($data_magic == 7)echo 'selected'; ?>>桃心</option>
<option value="8" <?php if ($data_magic == 8)echo 'selected'; ?>>薄公英</option>
<option value="9" <?php if ($data_magic == 9)echo 'selected'; ?>>落叶纷飞</option>
<option value="10" <?php if ($data_magic == 10)echo 'selected'; ?>>烟花</option>
<option value="11" <?php if ($data_magic == 11)echo 'selected'; ?>>唇唇欲动</option>
<option value="12" <?php if ($data_magic == 12)echo 'selected'; ?>>天高任鸟飞</option>
<option value="13" <?php if ($data_magic == 13)echo 'selected'; ?>>萤火缭绕</option>
<option value="14" <?php if ($data_magic == 14)echo 'selected'; ?>>水滴露珠</option>
	    </select></td>
    </tr>
  <tr>
    <td align="right" valign="top" style="padding-top:10px;"><script language="javascript">
function picshow(n) {
	a = document.getElementById("iframebox");
	if (n == 1){
		a.style.display = "block";
	}else{
		a.style.display = "none";
	}
}
    </script>
      背景图片:      </td>
    <td>
      <input name="bgpic" type="text" class="input" id="bgpic" value="<?php echo $data_bgpic;?>" size="70" maxlength="100" onfocus="picshow(1)"/>
      <img src="images/ok.gif" width="16" height="14" align="absmiddle" />
      <a href="#" onclick="picshow(1)">点此选择</a>
      <div class="iframebox" id="iframebox">
	<div class="iframeclose">
		<div class="iframecloseL">请选择背景图片</div>
		<div class="iframecloseR">
			<img src="images/close.gif" width="17" height="17" hspace="3" align="absmiddle" /><a href="#" onclick="picshow(0)">关闭</a></div>
		</div>
	<div class="iframecontent">
	 	<iframe border=0 scrolling=no frameborder=no marginheight=0 marginwidth=0 framespacing=0 src="k_homepage_bg.php?p=1" width=485 height=410></iframe>
	</div>
</div></td>
</tr>
  <tr>
    <td align="right" valign="top" style="padding-top:10px;">背景音乐:</td>
    <td><font color="#666666">
      <input name="bgmusic" type="text" class="input" id="bgmusic" value="<?php echo $data_bgmusic;?>" size="70" maxlength="100" />
      <br />
      <img src="images/tips.gif" width="23" height="21" hspace="3" vspace="3" align="absmiddle" />背景音乐url地址，只支持.wma或.mp3相关音频格式。<br />
    　　 格式如：http://www.abc.com/music/123.wma</font></td>
    </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>　　　　　　　　
      <input type="submit" name="Submit" value=" 更新主页 " class="button" /><input type=hidden name=submitok value="modupdate">            　　
      <img src="images/home.gif" width="12" height="13" hspace="3" /><a href="<?php echo $_COOKIE['home_2domain'].'/'.$_COOKIE['cook_userid']; ?>" target="_blank" class="uDF2C91" style="font-size:14px"><b>主页预览</b></a></td>
  </tr>
</form>
</table>
<p>&nbsp;</p>
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>