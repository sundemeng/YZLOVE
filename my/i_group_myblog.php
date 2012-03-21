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
ul li {float:left;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
ul li a:link,li a:active,li a:visited{width:84px;height:26px;display:block;text-decoration:none;color:#333;background:#fff;}
ul li a:hover{width:84px;height:26px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect {float:left;width:84px;height:26px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-bottom:#F0FAE9 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
ul .liselect a:link,.liselect a:active,.liselect a:visited{width:84px;display:block;text-decoration:none;color:#6F9F00;background:#F0FAE9;}
ul .liselect a:hover{width:84px;display:block;text-decoration:none;color:#DF2C91;background:#F0FAE9;}
/* main2 */
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;text-align:center}
table{text-align:left;color:#666;}
.img {
max-width: 150px;max-height: 150px;

width: expression(this.width > 150 && this.width > this.height ? 150 : auto);
height: expression(this.height > 150 ? 150 : auto);

}
</style>
</head>
<body>
<ul>
<li><a href="i_group.php">我的圈子</a></li>
<li><a href="i_group_add.php">创建圈子</a></li>
<li><a href="i_group_mylogin.php">加入的圈子</a></li>
<li class="liselect"><a href="i_group_myblog.php">我的帖子 </a></li>
<li><a href="i_group_favorite.php">帖子收藏 </a></li>
</ul>
<div class="main2">
<div class="main2_frame"><br>
  <?php
$rt=$db->query("SELECT id,mainid,maintitle,title,bbsnum,click,ifjh,flag,addtime FROM ".__TBL_GROUP_WZ__." WHERE userid=".$cook_userid." ORDER BY id DESC");
$total = $db->num_rows($rt);
if ($total <= 0) {
echo "<br><br><table width=200 height=100 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#dddddd><tr><td align=center bgcolor=#efefef><font color=666666>..暂无信息..</font></td></tr></table>";
} else {
$pagesize=15;
require_once YZLOVE.'sub/class.php';
if ($p<1)$p=1;
$mypage=new uobarpage($total,$pagesize);
$pagelist = $mypage->pagebar(1);
$pagelistinfo = $mypage->limit2();
mysql_data_seek($rt,($p-1)*$pagesize);
?>
  <table width="670" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td width="112" height="22" align="center" valign="bottom" style="border-bottom:#ddd 1px solid;">所属群组</td>
      <td width="279" align="center" valign="bottom" style="border-bottom:#ddd 1px solid;">标　题</td>
      <td width="65" align="center" valign="bottom" style="border-bottom:#ddd 1px solid;">回复/人气</td>
      <td width="86" align="center" valign="bottom" style="border-bottom:#ddd 1px solid;">发表时间</td>
    </tr>
    <?php
for($i=0;$i<$pagesize;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0){
$bg="bgcolor=#ffffff";
$overbg="#ffffcc";
$outbg="#ffffff";
} else {
$bg="bgcolor=#ffffff";
$overbg="#ffffcc";
$outbg="#ffffff";
}?>
    <tr <?php echo $bg;?> onmouseover="this.style.background='<?php echo $overbg; ?>'" onmouseout="this.style.background='<?php echo $outbg; ?>'" >
      <td height="35" align="center" style="border-bottom:#E9E8E8 1px solid;">[ <?php echo "<a href=".$Global['group_2domain']."/".$rows['mainid']." target=_blank>".$rows['maintitle']."</a>";?> ]</td>
      <td style="border-bottom:#E9E8E8 1px solid;"><a href="<?php echo $Global['group_2domain']."/read".$rows['id'].".html"; ?>" target="_blank" class="666666"><img src="images/zoom.gif" alt="查看详细" hspace="5" border="0" align="absmiddle" /><?php echo htmlout(stripslashes($rows['title'])); ?></a>
          <?php if ($rows['ifjh'] == 1)echo " <img src=images/jh.gif alt=精华贴>";
if ( $rows['flag'] == 0 )echo " <font color=red>未审核</font>";?></td>
      <td align="center" style="border-bottom:#E9E8E8 1px solid;"><font color="#FF0000"><b><?php echo $rows['bbsnum'];?></b></font> <font color="#999999">/</font> <font color="#FF0000"> <?php echo $rows['click'];?></font></td>
      <td style="border-bottom:#E9E8E8 1px solid;"><font color="#999999"><?php echo date_format2($rows['addtime'],'%y-%m-%d %H:%M');?></font></td>
    </tr>
    <?php }?>
  </table>
  <table width="670" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="34" align="right" valign="bottom" style="color:#666666"><?php echo $pagelist; ?><?php echo $pagelistinfo; ?></td>
    </tr>
  </table>
  <?php }?>
<br />
<br /><br />
</div></div>
<?php require_once YZLOVE.'my/bottommy.php';?>