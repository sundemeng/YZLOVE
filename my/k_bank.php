<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}

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
font{font-family:Verdana}
</style>
</head>
<body>
<ul>
<li><a href="k_myloveb.php">我的帐户</a></li>
<li><a href="k_myloveb.php?submitok=list">消费清单</a></li>
<li class='liselect'><a href="k_vip.php">会员升级</a></li>
<li><a href="k_bidding.php">竞价排名</a></li>
<li><a href="k_homepage.php">装扮主页</a></li>
<li><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame">
  <br />
  <table width="650" height="42" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FBDDF1">
    <tr>
      <td bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:黑体,宋体;letter-spacing:1px"><img src="images/viptb.gif" width="30" height="42" hspace="5" align="absmiddle" />&nbsp;会员升级中心</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="line-height:200%;padding:20px;color:#666">①<b> 购买Love币</b>：一次数额必须大于<font color="#FF0000">￥20.00 </font>元以上，否则概不受理；
        
        换算比例：<font color="#FF0000">￥1.00</font> 元 ＝<font color="#FF0000">1000</font><font color="#FF6699"> love币</font><br />
        ②<b> 升级为高级会员</b>：<font color="#FF0000">(升为高级会员最多可送150000个<font color="#FF6699">Love币</font>。)</font></td>
    </tr>
  </table>
  <br />
  <?php require_once YZLOVE.'price.html';?>
  <?php require_once YZLOVE.'bank.html';?>
  <br />
  <br />
  <br />
  <br />
  <br />
    <br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>