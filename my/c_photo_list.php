<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if (!$db->num_rows($rt)) {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($submitok=="delpicupdate") {
	if ( !ereg("^[0-9]{1,10}$",$classid) )callmsg("error1","-1");
	$rt = $db->query("SELECT userid,path_s,path_b FROM ".__TBL_PHOTO__." WHERE id='$classid'");
	if($db->num_rows($rt)){
		$row = $db->fetch_array($rt);
		$memberid = $row[0];
		$path1    = $row[1];
		$path2    = $row[2];
		if ($memberid !== $cook_userid)callmsg("用户验证错误，操作失败！","-1");
	} else {
		callmsg("Forbidden!","-1");
	}
	if (file_exists(YZLOVE."up/photo/".$path1))unlink(YZLOVE."up/photo/".$path1);
	if (file_exists(YZLOVE."up/photo/".$path2))unlink(YZLOVE."up/photo/".$path2);
	$db->query("DELETE FROM ".__TBL_PHOTO__." WHERE id='$classid'");
	header("Location: c_photo_list.php?p=".$p);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/*.main1*/
.main1 {width:754px;height:28px;overflow:hidden;margin-left:28px;margin-top:15px;background-image:url(images/sontgg.gif);padding-left:16px;z-index: 100;}
.main1_tselect {float:left;width:74px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:74px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/*.main2*/
.main2 {width:754px;background:#F0FAE9;margin-left:28px;border-left:#CCE1B5 1px solid;border-bottom:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;padding:7px;}
.main2_frame {width:752px;background:#fff;border:#D8EAC4 1px solid;}

.main2_frame_maink {width:700px;margin:0px auto;}/*框frame*/
	.main2_frame_k {float:left;width:106px;height:176px;margin:14px;margin-top:10px;margin-bottom:0px;}/*框*/
		.main2_frame_k1 {width:100px;height:100px;background:#fff;border:#ddd 1px solid;padding:2px;color:#666;margin-bottom:5px;}
		.main2_frame_k2 {width:106px;height:18px;text-align:center;color:#666;overflow:hidden;}
		.main2_frame_k22 {width:106px;height:15px;text-align:center;color:#666;background:#F7F7F7;padding-top:5px;}
.main2_frame_page1 {width:700px;height:35px;text-align:center;margin:0px auto;border-bottom:#ddd 1px solid;margin-top:5px;margin-bottom:10px;padding-top:15px;}/*page*/
.main2_frame_page2 {width:700px;height:35px;text-align:center;margin:0px auto;border-top:#ddd 1px solid;line-height:50px;margin-top:10px;padding-top:15px;}/*page*/
img{border:0;} 
</style>
</head>
<body>
<div class="main1">
	<div class="main1_tselect" >我的相册</div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_up.php" class="a333">上传照片</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_dtt.php" class="a333">在线拍照</a></div>
	<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_main.php" class="a333">更新形象照 </a></div>
</div>
<div class="main2">
  <div class="main2_frame"><br />
<?php
$rt=$db->query("SELECT * FROM ".__TBL_PHOTO__." WHERE userid='$cook_userid' ORDER BY id DESC");
$total = $db->num_rows($rt);
if($total>0){
	require_once YZLOVE.'sub/class.php';
	$pagesize = 20;
	if ($p<1)$p=1;
	$mypage=new uobarpage($total,$pagesize);
	$pagelist = $mypage->pagebar(1);
	$pagelistinfo = $mypage->limit2();
	mysql_data_seek($rt,($p-1)*$pagesize);
?>
<?php if($total>$pagesize){?><div class=main2_frame_page1><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
<div class=main2_frame_maink>
<?php
	for($i=1;$i<=$pagesize;$i++) {
	$rows = $db->fetch_array($rt);
	if(!$rows) break;
?>
	<div class=main2_frame_k>
		<div class=main2_frame_k1><table width="100" height="100" border="0" cellpadding="0" cellspacing="0">
		  <tr><td align="center" valign="middle"><a href="#" onClick="window.location.href='../piczoom.php?picurl=../up/photo/<?php echo  $rows['path_b']; ?>'"><img src=../up/photo/<?php echo  $rows['path_s']; ?> alt="放大照片" border="0"></a></td>
		  </tr></table></div>
		<div class=main2_frame_k2 title="<?php echo  htmlout(stripslashes($rows['title'])); ?>"><?php echo  htmlout(stripslashes($rows['title'])); ?></div>
		<div class=main2_frame_k2><?php echo date_format2($rows['addtime'],'%Y-%m-%d %H:%M');?></div>
		<div class=main2_frame_k22 <?php if ($rows['flag']==0)echo "style='background:#ffffcc;color:#ff0000'";?>><?php if ($rows['flag']==0)echo '未审核　';?><a href="c_photo_list.php?submitok=delpicupdate&classid=<?php echo $rows['id'];?>&p=<?php echo $p; ?>" onClick="return confirm('请 慎 重 ！\n\n★确认删除？ 此操作将永久删除，不得恢复！')"  class="a666"><img src="images/delx.gif" width="10" height="10" hspace="3" border="0">删除</a></div>
	</div>

<?php }?>
</div>
<?php if($total>$pagesize){?><div class=main2_frame_page2><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div><?php }?>
<?php }else{?>
<br /><br /><br />
<table width="281" height="147" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#dddddd">
        <tr>
          <td align="center" bgcolor="#F7F7F7" style="color:#666666;"><br />
            ...暂无照片...<br />
            <br />
            <a href="c_photo_dtt.php"><img src="images/12.gif" alt="在线拍大头贴/照片" width="69" height="21" hspace="5" border="0" /></a> <a href="c_photo_up.php"><img src="images/lkup.gif" alt="本地上传" width="69" height="21" hspace="5" border="0" /></a> <br />
            <br />
            <br />          </td>
        </tr>
    </table>
<br /><br /><br />
<?php }?>
<div class="clear"></div>
<br />
<br />
  </div>
  <div class="clear"></div>
</div>
<?php require_once YZLOVE.'my/bottommy.php';?>