<?php require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)){header("Location: ".$Global['www_2domain']."/login.php");exit;}}
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
<li><a href="k_bidding.php">竞价排名</a></li>
<li><a href="k_homepage.php">装扮主页</a></li>
<li><a href="k_sfz.php">实名认证</a></li>
<li><a href="../news.php" target="_blank">本站动态</a></li>
<li class='liselect'><a href="k_getloveb.php">获取Love币</a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br />
  <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="left" style="line-height:200%;color:#666666"><b><font color="FF3366" style="font-size:14px">如何获得Love币？</font></b><br>
        　　１、<b><font color="#009900">通过人民币来充值Love币。</font></b><font color="#009900">换算比例：￥<b><font color="#FF0000">1.00</font></b>元 <b>＝</b><b><font color="#FF0000">1000</font> </b>个</font><font color="#FF6699">love币</font></td>
      </tr>
    </table>
    <table width="600" height="63" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="center"><a href="k_bank.php"><img src="images/saleloveb.gif" alt="购买love币" width="121" height="34" border="0" /></a></td>
      </tr>
    </table>
    <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="left" style="line-height:200%;color:#666666">        　　２、升级高级会员，最多可送Love币<font color="red">150000</font>个。升为高级会员泡币效率大大提高，达到<font color="red">双倍</font>或<font color="red"><b>10</b></font>倍之多，而且全部消费可打<font color="red">3~5</font>折，还可直接查看对方联系方法和在线聊天等。</td>
      </tr>
    </table>
    <table width="600" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="752" align="center"><img src="images/diamond.gif" width="20" height="16" hspace="3" vspace="5" border="0" align="absmiddle" /><a href="k_bank.php" class="uDF2C91"><b>立即升为高级会员</b></a>　　　　<img src="images/ok.gif" width="16" height="14" hspace="3" vspace="5" border="0" align="absmiddle" /><a href="k_vip.php" class="uDF2C91"><b>高级会员还有哪些特权</b>？</a></td>
      </tr>
    </table>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td style="line-height:200%;color:#666666">　　３、在线泡币，只要您每天登录本站，不要退出，系统将从你登录的那一刻起开始记时，然后每分钟你将会得到<font color="red">1~10</font>个Love币。钻石会员<font color="#FF0000">10</font>个，诚信会员<font color="#FF0000">2</font>个，普通会员<font color="#FF0000">1</font>个，别忘了点退出哟，要不然不会加币。<br />　　　
          (注：高级会员不需要点退出，每隔20分钟自动累加一次)<br>
                        　　４、上传照片，在线拍照，录制视频；根据上传、拍摄的效果将给予<font color="red">1000</font>个左右的奖励；每天第一次登录，系统将给予<font color="#FF0000"><?php echo $Global['m_firstlogin'] ?></font>个Love币的奖励。<br>      
            　　５、发表日记、求助、1+1约会、圈子文章和录制视频等并被本站设为精华的。将给予<font color="red">1000</font>个的奖励。<br>      
            　　６、如果您的回答被求助人设为最佳答案，您将会得到<font color="red">100~50000</font>不等的悬赏奖励以及系统额外奖励<font color="#FF0000"><?php echo $Global['m_askloveb']; ?></font>。<br>
      　　７、对于经过身份认证过的会员，管理员将给予<font color="red">1000~10000</font>个Love币的奖励。<br>
      　　８、如果对本站有好的的建议和批评，将给予<font color="red">1000~10000</font>的奖励。<br />
      <br>
      <b><font color="FF3366" style="font-size:14px">什么是Love币？ </font></b><br>
　　为了更好的管理，为了更好的为大家服务，我们引入了“Love币”，它是在本站里可用来消费的虚拟货币。<br />
<br>
<b><font color="FF3366" style="font-size:14px">Love币用来做什么？ </font></b><br>
　　Love币具备神秘功能。还可购买本站提供的相关服务，使收费的服务变成免费服务。<br>
　　我们会定期举行一些活动和赠送礼品让大家享受Love币带来的诸多乐趣。<br>
　　Love币主要用来发送留言、竞价个人排名、竞价圈子排名、竞价约会排名、竞价搜索排名、挂号看病、参与速配、圈内留言群发、给圈子财富充值、购买虚拟物品等。<br>
　　其他神秘功能请大家期待！<br />
<br>
       <b><font color="FF3366" style="font-size:14px">Love币惩罚：</font></b><br>
      　　为了使大家能更好享受交友的乐趣，请遵守相关的条款和规则。否则视情况轻重给予不同的Love币惩罚。<br> 　　
      <font color="red">注：连续1个月Love币为零或超过6个月不登录本站的，系统将定期删除其帐号，不得恢复。<br />
      </font></td>
      </tr>
    </table>
<br /><br />
<br /><br />
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>