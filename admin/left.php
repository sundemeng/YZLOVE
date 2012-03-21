<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';
require_once '../sub/conn.php';
require_once '../sub/fun.php';
require_once 'session.php';
session_start();
?>
<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<base target="mainframe">
<body bgcolor="#D5AAB3" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="118" height="25" border="0" align="center" cellpadding="1" cellspacing="0">
<tr>
<td align="center" bgcolor="#B13773"><a href="../" target="_blank"><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $_SESSION['adminname'];?></font></a><font color="#FFFFFF"> 您好<font size="3"><i>！</i></font></font></td>
</tr>
</table>
<table width="118" border="0" align="center" cellpadding="1" cellspacing="1">
<tr> 
<td height="20" align="center" bgcolor="#D879A7" style="padding-top:3px;"><a href="../" target="_blank"><font color="#FFFFFF"><b>网站首页</b></font></a></td>
</tr>
<tr> 
<td height="1"></td>
</tr>
<tr> 
<td height="140" bgcolor="#F5E8F1" style="line-height:25px;"><font color="#EA6A8D" face="Webdings">4</font><a href="user_search.php"><b>会员管理升级</b></a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="photo_search.php"><font color="#DD248A"><b>上传照片管理</b></font></a>
<br>
<font color="#EA6A8D" face="Webdings">4</font><a href="user_jb_list.php"><b><font color="#000000">基本资料审核</font></b></a><br>
<font color="#EA6A8D" face="Webdings">4</font><a href="user_kz_list.php"><b><font color="#000000">扩展资料审核</font></b></a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="supphoto_search.php"><font color="#DD248A">公共图片管理</font></a></td>
</tr>
<tr><td></td></tr>
<tr>
<td height="24" bgcolor="#FFFFFF" style="line-height:25px;"><font color="#EA6A8D" face="Webdings">4</font><a href="attestation_search.php"><b>实名认证</b></a><br>
<font color="#EA6A8D" face="Webdings">4</font><a href="attestation_userid.php">手动强制认证</a></td>
</tr>
<tr>
<td height="25" bgcolor="#F5E8F1" style="line-height:25px;"><font color="#EA6A8D" face="Webdings">4</font><a href="user_pass.php?kind=1">重置会员密码</a><br><font color="#EA6A8D" face="Webdings">4</font><a href="user_pass.php?kind=2">修改会员性别</a></td>
</tr>

<tr><td></td></tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="#EA6A8D" face="Webdings">4</font><a href="dating_search.php"><b>1+1约会管理</b></a><br>
<font color="#EA6A8D" face="Webdings">4</font><a href="dating_user_search.php">约会名单</a></td>
</tr>
<tr>
  <td height="25" bgcolor="#FFFFFF" style="line-height:24px;"><font color="#EA6A8D" face="Webdings">4</font><a href="video_search.php"><b><font color="#DD248A">视频管理</font></b></a><br><font color="#EA6A8D" face="Webdings">4</font><a href="videooklist_search.php">本地音乐库</a></td>
</tr>
<tr> 
<td height="25" bgcolor="#FFFFFF" style="line-height:150%;"><font color="#EA6A8D" face="Webdings">4</font><a href="diary_search.php"><b>日记管理</b></a>　<font color="#EA6A8D" face="Webdings">4</font><a href="diarybbs_search.php">评论</a></td>
</tr>
<tr> 
<td height="30" bgcolor="#FFFFFF"><font color="#EA6A8D" face="Webdings">4</font><a href="ask_search.php"><b>爱情诊所</b></a>　<font color="#EA6A8D" face="Webdings">4</font><a href="askbbs_search.php">回答</a></td>
</tr>
<tr> 
<td></td>
</tr>
<tr> 
<td height="30" bgcolor="F5E8F1"><font color="#EA6A8D" face="Webdings">4</font><a href="gbook_search.php" target="mainframe">会员留言管理</a></td>
</tr>
<tr>
<td height="140" bgcolor="#FFFFFF" style="line-height:20px;"><font color="#EA6A8D" face="Webdings">4</font><a href="group_total.php">大类</a>　<font color="#EA6A8D" face="Webdings">4</font><a href="group_total.php?submitok=add">增加</a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="group_list_search.php"><b>圈子列表</b></a><br>
<font color="#EA6A8D" face="Webdings">4</font><a href="group_photo.php"><font color="DD248A">群组照片</font></a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="group_club_search.php"><b>活动管理</b></a>　<font color="#EA6A8D" face="Webdings">4</font><a href="group_club_bbs_search.php">评论</a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="group_club_photo.php"><font color="DD248A">活动照片</font></a><br>      <font color="#EA6A8D" face="Webdings">4</font><a href="group_wz_search.php"><b>主题文章</b></a>　<font color="#EA6A8D" face="Webdings">4</font><a href="group_wz_bbs_search.php">评论</a></td>
</tr>

<tr>
<td height="80" bgcolor="F5E8F1" style="line-height:20px;"><font color="#EA6A8D" face="Webdings">4</font><a href="story_search.php"><b>成功故事</b></a><br>      
<font color="#EA6A8D" face="Webdings">4</font><a href="story_bbs_search.php">祝福留言</a><br>
<font color="#EA6A8D" face="Webdings">4</font><a href="story_photo.php"><font color="DD248A">成功故事照片</font></a></td>
</tr>

<tr>
<td height="25" bgcolor="#FFFFFF"><font color="#EA6A8D" face="Webdings">4</font><a href="present.php" target="mainframe"><b>礼物管理</b></a></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="#EA6A8D" face="Webdings">4</font><a href="news.php?kind=1" target="mainframe"><b>网站公告</b></a></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="news.php?kind=2" target="mainframe">恋爱宝典</a></font></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="news.php?kind=3" target="mainframe">婚姻法规</a></font></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="315.php" target="mainframe"><b>举报中心</b></a></font></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="lovebqd_search.php" target="mainframe"><b>Love币清单</b></a></font></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="vip_search.php" target="mainframe"><b>VIP会员管理</b></a></font></td>
</tr>
<tr>
<td height="25" bgcolor="#FFFFFF"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="top200.php" target="mainframe">最近登录TOP200</a><a href="site.php"></a></font></td>
</tr>
<tr> 
<td height="25" bgcolor="EBEDF5"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="ip.php" target="mainframe">非法IP屏蔽</a><a href="site.php"></a></font></td>
</tr>
<tr>
  <td height="25" bgcolor="EBEDF5"><font color="efefef"><font color="#EA6A8D" face="Webdings">4</font><a href="adminuser.php" target="mainframe">管理员添加</a><a href="site.php"></a></font></td>
</tr>
<tr> 
<td height="25" bgcolor="EBEDF5"><font color="#EA6A8D" face="Webdings">4</font><a href="modpass.php">管理员密码修改</a></td>
</tr>
<tr> 
<td height="30" align="center" bgcolor="F5E8F1"><a href="exit.php" target="_parent"><b>退 出</b></a></td>
</tr>
</table>
</body>
</html>

