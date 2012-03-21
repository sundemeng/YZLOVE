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
<div class="main2_frame"><br />
  <table width="650" height="42" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FBDDF1">
<tr>
<td bgcolor="#FDEEF8" style="color:#FF6600;font-size:20px;font-family:黑体,宋体;letter-spacing:1px"><img src="images/viptb.gif" width="30" height="42" hspace="5" align="absmiddle" />&nbsp;会员升级中心</td>
</tr>
<tr>
  <td bgcolor="#FFFFFF" style="line-height:150%;padding:20px;color:#666"><b><font color="#FF6600">升级条件：</font></b><br>        
　　<img src="images/li.gif" width="3" height="5" hspace="3" />交纳一定的服务费用。为了保证网站能顺利办下去所带来的各项成本开销、服务器带宽费用、人员工资和对外宣传费用，我们只能收取部分服务费，望大家给予支持。<br>
　　<img src="images/li.gif" width="3" height="5" hspace="3" />残疾人士凭相关证明可免费直接升级至诚信会员，直到喜结良缘。<br>
　　<img src="images/li.gif" width="3" height="5" hspace="3" />女性55岁以上，男性60岁以上，凭相关证明可免费直接升级至诚信会员，直到喜结良缘。<br />　　<img src="images/li.gif" width="3" height="5" hspace="3" />个人积分达到太阳<img src="images/star160.gif" hspace="3" vspace="5" align="absmiddle"/>可免费升级至永久钻石会员。　　<a href="#" class="uDF2C91"  onclick="alert('积分就是在线总时长(单位为分钟)，换算方式：\n\n　　1个太阳 ＝ 160天\n\n　　1个月亮 ＝ 40天\n\n　　1个星星 ＝ 10天\n\n你只要每天登录本站，不要退出，系统会自动累加积分，1分钟1个，别忘了点右上角退出按钮哟，否则不会结算。\n\n\n积分的作用：\n\n　　1个太阳 ＝ 永久钻石会员 (此活动截止到2011年12月31日) \n\n　　1个月亮 ＝ 永久诚信会员 (此活动截止到2011年12月31日)  \n\n只要积分达到此标准可以向客服人员提出升级要求。')">查看详情</a><br />
　　<img src="images/li.gif" width="3" height="5" hspace="3" />个人积分达到月亮<img src="images/star40.gif" width="16" height="16" hspace="3" align="absmiddle"/>可免费升级至永久诚信会员。　　<a href="#" class="uDF2C91"  onclick="alert('积分就是在线总时长(单位为分钟)，换算方式：\n\n　　1个太阳 ＝ 160天\n\n　　1个月亮 ＝ 40天\n\n　　1个星星 ＝ 10天\n\n你只要每天登录本站，不要退出，系统会自动累加积分，1分钟1个，别忘了点右上角退出按钮哟，否则不会结算。\n\n\n积分的作用：\n\n　　1个太阳 ＝ 永久钻石会员 (此活动截止到2011年12月31日)  \n\n　　1个月亮 ＝ 永久诚信会员 (此活动截止到2010年12月31日) \n\n只要积分达到此标准可以向客服人员提出升级要求。')">查看详情</a></td>
</tr>
</table>
  <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center"><a href="k_bank.php"><img src="images/sj.gif" vspace="5" border="0" /></a></td>
    </tr>
  </table>
  <?php require_once YZLOVE.'price.html';?>
  <br>
<table width="650" border="0" align="center" cellpadding="8" cellspacing="1" bgcolor="#CCE1B5">
<tr bgcolor="#F9F9F9">
<td width="252" height="20" align="center" bgcolor="#F0FAE9" style="font-size:10.3pt;"><font color="FF3366"><b>功能特权</b></font></td>
<td width="114" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/13.gif" width="16" height="16" hspace="1" vspace="4" align="absmiddle"><img src="../images/grade/23.gif" width="17" height="16" hspace="2" vspace="4" align="absmiddle">钻石会员</b></font></td>
<td width="112" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/12.gif" width="13" height="18" hspace="3" align="absmiddle"><img src="../images/grade/22.gif" width="13" height="18" hspace="3" align="absmiddle">诚信会员<br>
</b></font></td>
<td width="103" height="20" align="center" bgcolor="#F0FAE9"><font color="FF3366"><b><img src="../images/grade/11.gif" width="8" height="12" hspace="2"><img src="../images/grade/21.gif" width="8" height="12" hspace="2">普通会员</b></font></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>尊贵会员标识</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center"><b>赠送<font color="#FF6699">Love币</font></b></td>
  <td align="center"><font color="#FF0000">20000</font>~<font color="#FF0000">150000</font>个</td>
  <td align="center"><font color="#FF0000">10000</font>~<font color="#FF0000">100000</font>个</td>
  <td align="center"><font color="#FF0000"><?php echo $Global['m_regloveb']; ?></font>个</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">发布交友档案</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="24" align="center">上传个人照片(含在线拍照) </td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000"><?php echo $Global['m_photo_num3']; ?></font> 张</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num2']; ?></font> 张</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num1']; ?></font> 张</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">客服协助处理照片</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">基本搜索</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">高级搜索</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">在线速配</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">随机弹出缘分</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">浏览会员资料</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center">不完整</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>查看联系方式</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center">不完整</td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>在线聊天 </b><font color="#FF0000"><i>new!</i></font> </td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center">保存聊天记录</td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" bgcolor="#FFFFFF">查看留言、发送留言、回复留言</td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">发送留言扣除Love币</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']; ?></font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']*2; ?></font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbookloveb']*3; ?></font></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF" style="line-height:150%">给超过一个月没登录的会员发送留言，会抄送一份发到对方邮箱<b> </b><font color="#FF0000"><i>new!</i></font> <br />
    <font color="#6F9F00">(仅永久会员)</font></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center">给对方留言，可知对方是否阅读</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>装扮个人主页 </b><span style="line-height:150%"><font color="#FF0000"><i>new!</i></font></span> </td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" style="line-height:150%"><b>创建超级圈子小论坛<br />
</b><font color="#6F9F00">(仅永久会员)</font></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" style="line-height:150%"><b>隐身登录</b> <font color="#FF0000"><i>new!</i></font> <br />
    <font color="#6F9F00">(仅永久会员)</font></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center">&nbsp;</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF"><b>发布聚会活动</b></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">参加活动</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="11" align="center"><b>在线泡<font color="FF3366">Love币</font>/分钟</b></td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">10</font> 个</td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">2</font> 个</td>
<td align="center" bgcolor="#FFFFFF"><font color="#ff0000">1</font> 个</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="5" align="center" style="line-height:150%">在线泡Love币结算系统自动20分钟累加一次，不必担心突然断电、不小心关闭窗口、或忘记点击退出按钮等<b> </b><font color="#FF0000"><i>new!</i></font> </td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">自动</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">自动</font></td>
  <td align="center" bgcolor="#FFFFFF">手动</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="6" align="center">在线泡积分<span style="line-height:150%">结算</span>(同上) <span style="line-height:150%"><b> </b><font color="#FF0000"><i>new!</i></font> </span></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">自动</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">自动</font></td>
  <td align="center" bgcolor="#FFFFFF">手动</td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>排名推荐</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>定期奖励Love币</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>最近访客</b></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="11" align="center" bgcolor="#FFFFFF">发表日记</td>
<td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">直接通过</font></td>
<td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">直接通过</font></td>
<td align="center" bgcolor="#FFFFFF">需要审核</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="12" align="center" bgcolor="#FFFFFF">发表日记评论</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center" bgcolor="#FFFFFF">发布爱情诊所</td>
<td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">直接通过</font></td>
<td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">直接通过</font></td>
<td align="center" bgcolor="#FFFFFF">需要审核</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">发表爱情诊所评论</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF"><b>发布1+1个人约会 </b><font color="#FF0000"><i>new!</i></font> </td>
  <td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">直接通过</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="FD4F8E">直接通过</font></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td align="center" bgcolor="#FFFFFF">参加1+1约会</td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td align="center"><b>录制MTV视频</b></td>
<td align="center"><font color="FD4F8E">直接通过</font></td>
<td align="center"><font color="FD4F8E">直接通过</font></td>
<td align="center">需要审核</td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="2" align="center">录制MTV视频个数</td>
<td align="center"><font color="FF3366"><?php echo $Global['m_photo_num3']; ?></font> 个</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num2']; ?></font> 个</td>
<td align="center"><font color="#ff0000"><?php echo $Global['m_photo_num1']; ?></font> 个</td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="0" align="center">查看对方的朋友圈</td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center"><b>好友上线通知</b><span style="line-height:150%"> <font color="#FF0000"><i>new!</i></font></span></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center" style="line-height:150%"><b>好友动态</b> (你的好友只要发表日记，发布求助，在圈子论坛发表帖子，发布1+1私人约会，上传照片，在线拍照，录制视频后，你将在第一时间内知道，时刻关注对方动态) <font color="#FF0000"><i>new!<br />
  </i></font><font color="#6F9F00">(仅永久会员)</font></td>
  <td align="center"><img src="images/dui.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
  <td align="center"><img src="images/cuo.gif" width="16" height="16" /></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="2" align="center" bgcolor="#FFFFFF">查看对方行踪</td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/dui.gif" width="16" height="16"></td>
<td align="center" bgcolor="#FFFFFF"><img src="images/cuo.gif" width="16" height="16"></td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="1" align="center">好友数量</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_friend_num']; ?></font> 个</td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center">留言数量</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FF0000"><?php echo $Global['m_gbook_num']; ?></font> 条 </td>
</tr>
<tr bgcolor="#FFFFFF">
  <td height="0" align="center">发帖数量</td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
  <td align="center" bgcolor="#FFFFFF"><font color="#FD4F8E">不限</font></td>
</tr>
<tr bgcolor="#FFFFFF">
<td height="40" colspan="4" align="center"><br>
<a href="k_bank.php"><img src="images/sj.gif" border="0"></a><br>
<br>
<br>
<br></td>
</tr>
</table>
</div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>