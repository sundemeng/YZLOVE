<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../sub/init.php';$navvar = 10;
if ( (!preg_match("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)) && $p>=2 ){
	header("Location: ".$Global['www_2domain']."/login.php");exit;
}
require_once YZLOVE.'sub/conn.php';
$t=!preg_match("^[0-5]{1}$",$t)?0:$t;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta content="<?php echo $Global['m_area2']; ?>美女帅哥相册,写真,自拍,个人影集" name="keywords">
<meta name="description" content="<?php echo $Global['m_area2']; ?>美女帅哥相册,写真,自拍,个人影集">
<title><?php echo $Global['m_area2']; ?>美女帅哥相册 写真 自拍 个人影集</title>
<link href="../css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.title{width:980px;height:26px;margin:0px auto;margin-top:10px;background-image:url(../images/uTlibg.gif)}
.uTli,.uTliSelect,.uTliK{float:left;width:80px;height:18px;padding:8px 0 0 0;margin:0 5px 0 0}
.title .uTli{background-image:url(../images/uTli.gif)}
.title .help{cursor:help}
.title .uTliSelect{background-image:url(../images/uTliSelect.gif);color:#fff;font-weight:bold}
.title .uTliSelect a{text-decoration:none;color:#fff;font-weight:bold}
.title .uTliSelect a:hover{color:#ff0}
.title .uTliBlank{float:left;width:258px;height:26px;line-height:26px;text-align:right;color:#999;font-family:Verdana}
.title .uTliPage{float:left;width:212px;height:26px;text-align:right}
.titleline{width:980px;height:9px;margin:0px auto;font-size:0;background-image:url(../images/titleline.gif)}
.title .uTliPage .Sinput{width:154px;border:#ddd 1px solid;background:#fff;height:19px;line-height:19px;margin:0 3px 0 0}
.main{width:980px;margin:0px auto;padding:10px 0 0 0}
.main .Vbox{float:left;width:120px;height:165px;margin-right:52px;color:#666;font-family:Verdana}
.main .Vbox:hover{background:#F0FAE9}
.main .marginR0{margin-right:0px}
.main .Vbox .pic{width:110px;height:135px;padding:4px;border:#CCE1B5 1px solid;background:#F0FAE9}
.main .Vbox .pic img{width:110px;height:135px}
.main .Vbox .text{width:110px;text-align:left;padding:5px 0 0 0;text-align:center}
.main .Vbox .text .red{color:#f00;font-weight:bold}

.main .hr{width:980px;height:1px;margin:0px auto;font-size:0;overflow:hidden;background:#fff;margin-top:15px;margin-bottom:15px}
.main .page{width:980px;height:20px;padding:0 0 0 0;margin:0px auto;margin:0 0 30px 0;text-align:right}
.main .page .Pl{float:left}
.main .page .Pr{float:right}
.main .tips{width:978px;line-height:24px;padding:5px 0 0 0;margin:0px auto;margin-bottom:10px;border:#F4DCEE 1px solid;background:#FDF2F9;font-family:Verdana}
.main .tips span{color:#FF6699;font-weight:bold}
.main .tips .red{color:#f00;font-weight:normal}
.main .tips a{text-decoration:underline}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="title">
	<div class="<?php echo ($t==0)?'uTliSelect':'uTli'; ?>"><a href="./">网友相册</a></div>
	<div class="<?php echo ($t==1)?'uTliSelect':'uTli'; ?>"><a href="./?t=1">男士靓照</a></div>
	<div class="<?php echo ($t==2)?'uTliSelect':'uTli'; ?>"><a href="./?t=2">女士靓照</a></div>
	<div class="<?php echo ($t==3)?'uTliSelect':'uTli'; ?>"><a href="./?t=3">认证会员</a></div>
	<div class="<?php echo ($t==4)?'uTliSelect':'uTli'; ?>"><a href="./?t=4">最新相册</a></div>
	<div class="<?php echo ($t==5)?'uTliSelect':'uTliK'; ?>"><?php echo ($t==5)?'搜索结果':''; ?></div>
	<div class="uTliBlank">输入昵称(支持模糊查询)：</div>
	<div class="uTliPage">
	<script language="javascript">
		function chk(){
			if(document.yzloveform.k.value==""){
			alert('请输入昵称!');
			document.yzloveform.k.focus();
			return false;
			}
		}
	</script>
	<form action="./" method="get" name=yzloveform onsubmit="return chk()"><input name="k" type="text" class="Sinput" maxlength="20"><input type="image" src="../images/sox.gif" align=absmiddle /><input type="hidden" name="t" value="5" /></form>
	</div>
</div>
<div class="titleline"></div>
<div class=clear></div>
<br style="line-height:0"/>
<div class="main">
	<?php 
	switch ($t){ 
		case 1:$tmpsubsql = " sex=1 AND ";$tmpsort   = " ORDER BY logintime DESC";break;
		case 2:$tmpsubsql = " sex=2 AND ";$tmpsort   = " ORDER BY logintime DESC ";break;
		case 3:$tmpsubsql = " ifphoto=1 AND ";$tmpsort = " ORDER BY id DESC";break;
		case 4:$tmpsubsql = "";$tmpsort = " ORDER BY id DESC";break;
		case 5:$k  = trimm($k);$tmpsubsql = " nickname LIKE '%".$k."%' AND ";$tmpsort   = " ORDER BY id DESC";break;
		default:$tmpsubsql = "";$tmpsort   = " ORDER BY logintime DESC";break;
	}
$tmpsql = "SELECT id,nickname,grade,sex,photo_s,ifphoto FROM ".__TBL_MAIN__." WHERE $tmpsubsql flag=1 AND photo_s<>'' $tmpsort LIMIT 1000";
$rt=$db->query($tmpsql);
	if (!$db->num_rows($rt)){
		echo '<h6>暂无信息</h6>';
	} else {
		$total = $db->num_rows($rt);
		require_once YZLOVE.'sub/classcool.php';
		$pagesize = 24;
		if ($p<1)$p=1;
		$mypage = new zeaipage($total,$pagesize);
		$pagelist  = $mypage->pagebar();
		mysql_data_seek($rt,($p-1)*$pagesize);
		for($i=1;$i<=$pagesize;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			if ($i % 6 == 0){$tmpmargin=' marginR0';}else{$tmpmargin='';}
			$id        = $rows[0];
			$nickname  = $rows[1];
			$grade     = $rows[2];
			$sex       = $rows[3];
			$photo_s   = $rows[4];
			$ifphoto   = $rows[5];
			$nickname = badstr($nickname);
			$href = $Global['home_2domain']."/myphoto$id.html";
			$ifphoto = ($ifphoto==1)?" <img src=images/rz.gif align=absmiddle title=形象照已认证 /> ":'';
			//$Global['up_2domain']='http://up.yzlove.com';
			if ($t == 5 && !empty($k))$nickname = str_replace($k,"<span class=red>".$k."</span>",$nickname);
			$photo_s = '<img src='.$Global['up_2domain'].'/photo/'.$photo_s.'>';
	?>
	<div class="Vbox<?php echo $tmpmargin;?>">
		<div class="pic"><a href="<?php echo $href; ?>" target="_blank"><?php echo $photo_s;?></a></div>
		<div class="text"><?php geticon($sex.$grade);?><a href="<?php echo $Global['home_2domain'].'/'.$id; ?>" target="_blank"><?php echo $nickname; ?></a><?php echo $ifphoto; ?></div>
		<div class="text3"></div>
	</div>
	<?php if ($i % 6 == 0){?>
	<div class="clear"></div>
	<div class="hr"></div>
	<?php }}?>
	<div class=clear></div>
	<div class="page"><div class="Pl"></div><div class="Pr"><?php echo $pagelist; ?></div></div>
	<?php }?>
<div class="tips"><img src="images/tips.gif" align="absbottom" />只显示前<span class="red">1000</span>名有照片(且设定形象照片)的会员，排序规则：<span>活跃程度</span> -> <span>会员等级</span> -> <span>注册时间</span><br />
  如果在这里看不到你，请： <img src="images/gx.gif" hspace="5" vspace="8" align="absmiddle" /><a href="../my/?c_photo_main.php">更新形象照</a>　　<img src="images/pic.gif" hspace="5" align="absmiddle" /><a href="/my/?c_photo_up.php">上传照片</a>　　<img src="images/zxpz.gif" hspace="5" align="absmiddle" /><a href="../my/?c_photo_dtt.php">在线拍照</a>　　<img src="images/sfz.gif" hspace="5" align="absmiddle" /><a href="../my/?k_sfz.php">实名认证</a></div>
</div>
<div class=clear></div>
<?php require_once YZLOVE.'bottom.php';?>