<?php
/***************************************************
Copyright (C) 2008  扬州交友网  择交友友2.0
作  者: supdes　
***************************************************/
require_once '../sub/init.php';
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trim($cook_password);$rt = $db->query("SELECT sex,ifphoto FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);$data_sex=$row[0];$data_ifphoto=$row[1];} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
if ($data_ifphoto==1) {
	callmsg("您的形象照已经过认证，无法更改，如果要删除或更改请先取消形象照认证!","k_sfz.php");
	exit;
}
if ($submitok=="delpicupdate") {
	if (file_exists(YZLOVE."up/photo/".$cook_photo_s))unlink(YZLOVE."up/photo/".$cook_photo_s);
	$db->query("UPDATE ".__TBL_MAIN__." SET photo_s='' WHERE id=".$cook_userid);
	$db->query("UPDATE ".__TBL_ONLINE__." SET p=0 WHERE userid=".$cook_userid);
	//$db->query("DELETE FROM ".__TBL_PHOTO__." WHERE path_s='$cook_photo_s' AND userid=".$cook_userid);
	setcookie("cook_photo_s",'',null,"/",$Global['m_cookdomain']); 
	$nicknamesexgradephoto_s = $cook_nickname."|".$cook_sex."|".$cook_grade."|";
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s1='$nicknamesexgradephoto_s' WHERE userid1=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s2='$nicknamesexgradephoto_s' WHERE userid2=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_MAIN__." SET nicknamesexgradephoto_s3='$nicknamesexgradephoto_s' WHERE userid3=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_USER__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_BK__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ__." SET endnicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE enduserid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_WZ_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_CLUB_USER__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_GROUP_CLUB_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY__." SET nicknamesexgradephoto_s2='$nicknamesexgradephoto_s' WHERE userid2=".$cook_userid);
	$db->query("UPDATE ".__TBL_STORY_BBS__." SET nicknamesexgradephoto_s='$nicknamesexgradephoto_s' WHERE userid=".$cook_userid);
	
	header("Location: c_photo_main.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<link href="my.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
/* main1maker */
.main1maker{ width: 770px;margin-left:28px;position: relative;z-index:101;}
.main1 {width:754px;height:28px;overflow:hidden;margin-top:15px;padding-left:16px;background-image:url(images/sontgg.gif);z-index: 100; position: absolute;}
.main1_tselect {float:left;width:74px;height:27px;background:#F0FAE9;border-left:#CCE1B5 1px solid;border-top:#CCE1B5 1px solid;border-right:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;color:#6F9F00;}
.main1_t {float:left;width:74px;height:26px;border:#CCE1B5 1px solid;margin-right:11px;text-align:center;line-height:26px;}
/* main2 */
.main2 {width:770px;height:214px;margin-left:28px;background-image:url(images/cj_tmptopbg.gif);top:43px;z-index:101;position: relative;}

.main2_frame_maink {width:700px;height:150px;margin:0px auto;padding-top:10px;}/*框frame*/
	.main2_frame_k {float:left;width:106px;height:145px;margin:14px;margin-bottom:0px;}/*框*/
		.main2_frame_k1 {width:100px;height:100px;background:#fff;border:#ddd 1px solid;padding:2px;color:#666;}
		.main2_frame_k2 {width:106px;height:15px;text-align:center;color:#666;padding-top:3px;}
.main2_frame_page {width:644px;height:26px;text-align:center;margin:0px auto;}/*page*/
img{border:0;} 
table{border-collapse:collapse;border-spacing:0;} 



/* cjabs */
.cjabs{width:770px;height:650px;margin-left:28px;top:43px;z-index:100;position: relative;}
.photomaker_mask{ width:770px;height:666px;position: absolute; top:0px; left:0; z-index: 100;background:url(images/cj_k.gif) no-repeat;}/*大有背景*/
.photomaker_wapper{width:433px;height:462px;float:left;overflow:hidden;margin-left:36px;display:inline;margin-top:10px;margin-bottom:10px;}/*含按钮和box*/
.photomakerinbox  {width:433px;height:350px;float:left;background:transparent;overflow:hidden;}/*Box*/

.transbox{ filter:alpha(opacity=70); -moz-opacity:0.7; opacity: 0.7; background: white; }
.transboxin{width:110px;height:135px;border:2px solid #D63101;overflow:hidden}

.cj{width:410px;height:20px;padding:5px;padding-top:10px;text-align:center;float: left;}
/* overflow: hidden; */
.photoreview{ float: left;width: 250px; float: left; height: 420px;margin-top: 9px; margin-left:10px;}
--> 
</style>
</head>
<script type="text/javascript">
var div_move	=	0;
var IE = document.all?true:false;
var tempX,tempY,oldX,oldY;
var have_move	=	0;
function grasp(){
	div_move	=	1;
	if(IE)	{
		document.getElementById("source_div").setCapture();
	}
}
function free(){
	div_move	=	0;
	have_move	=	0;
	if(IE)	{
		document.getElementById("source_div").releaseCapture();
	}
}
function getMouseXY(e){
	if (IE)	{ // grab the x-y pos.s if browser is IE
		tempX = event.clientX + document.body.scrollLeft
		tempY = event.clientY + document.body.scrollTop
	}	else	{
		// grab the x-y pos.s if browser is NS
		tempX = e.pageX
		tempY = e.pageY
	}	
	// catch possible negative values in NS4
	if (tempX < 0){tempX = 0}
	if (tempY < 0){tempY = 0}	
}
function move_it(e){
	getMouseXY(e);
	if(div_move	==	1){
		if(have_move	==	0){
			//alert('a');
			oldX	=	tempX;
			oldY	=	tempY;
			have_move	=	1;
		}
		var left	=	parseInt(document.getElementById("source_div").style.left);
		var top		=	parseInt(document.getElementById("source_div").style.top);
		document.getElementById("source_div").style.left	=	(left	+	tempX	-	oldX)	+	'px';
		document.getElementById("source_div").style.top	=	(top	+	tempY	-	oldY)	+	'px';
		oldX	=	tempX;
		oldY	=	tempY;
	}
}
function change_size(method){
	if(method	==	1)	{
		var per	=	1.25;
	}else{
		var per	=	0.8;
	}
	document.getElementById("show_img").width	=	document.getElementById("show_img").width*per;
	//document.getElementById("show_img").height	=	document.getElementById("show_img").height*per;
}
function load_move(){
	var left	=	parseInt(document.getElementById("source_div").style.left);
	document.getElementById("source_div").style.left	=	left	+	150;
}
function micro_move(method){
	switch (method)
	{
		case "up":
			var top	=	parseInt(document.getElementById("source_div").style.top);
			document.getElementById("source_div").style.top	=	top	-	5;
			break;
		case "down":
			var top	=	parseInt(document.getElementById("source_div").style.top);
			document.getElementById("source_div").style.top	=	top	+	5;
			break;
		case "left":
			var left	=	parseInt(document.getElementById("source_div").style.left);
			document.getElementById("source_div").style.left	=	left	-	5;
			break;
		case "right":
			var left	=	parseInt(document.getElementById("source_div").style.left);
			document.getElementById("source_div").style.left	=	left	+	5;
			break;
	}
}
i = 0;
function turn(method){
	//var i=document.getElementById('show_img').style.filter.match(/\d/)[0];
	i=parseInt(i)+parseInt(method);
	//alert(i);
	if(i<0)	{i	+=	4;}
	if(i>=4){i	-=	4;}
	document.getElementById('show_img').style.filter='progid:DXImageTransform.Microsoft.BasicImage(Rotation='+i+')'
}
function mysub(){
	//if( !(document.getElementById("show_img").src.indexOf('.jpg')>0) && !(document.getElementById("show_img").src.indexOf('.gif')>0)  )	{
	if( (document.getElementById("show_img").src.indexOf('d.gif')>0) )	{
		alert('请先在上面选择一张照片！');
		return;
	}
	var photo = document.getElementById("photo").value;
	var left = document.getElementById("source_div").style.left;
	var top = document.getElementById("source_div").style.top;
	var width = document.getElementById("show_img").width;
	var height = document.getElementById("show_img").height;
	document.getElementById('imgCreat' ).src= "c_photo_main_temp.php?photo=" + photo + "&left=" + left + "&top=" + top + "&width=" + width + "&height=" + height + "&i=" + i + "&" + Math.random();
	//window.open("c_photo_main_temp.php?photo=" + photo + "&left=" + left + "&top=" + top + "&width=" + width + "&height=" + height + "&i=" + i + "&" + Math.random());
}
function get_sc_width(){
	document.getElementById('scwidth').value	=	screen.width;
}

function jump(){
	<?php if (empty($cook_photo_s)) {?>
	if(document.getElementById('imgCreat' ).src == "<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $data_sex; ?>.gif"){
	<?php } else {?>
	if(document.getElementById('imgCreat' ).src == "<?php echo $Global['up_2domain'];?>/photo/<?php echo $cook_photo_s;?>"){
	<?php }?>
		alert("您还没有裁切出您的形象照，不能保存！\n\n解决方案：\n1、请选择最上方照片。\n2、鼠标拖动左侧照片，将您需要的部分拖到红色形象框内。\n3、利用“缩放键”或“旋转键”调整照片大小及方向。\n4、再点击左侧下面的“裁切形象照”按钮进行裁切，或双击红框裁剪，最后点击“保存形象照”按钮");
		return;
	}else{
		var photo = document.getElementById("photo").value;
		var left = document.getElementById("source_div").style.left;
		var top = document.getElementById("source_div").style.top;
		var width = document.getElementById("show_img").width;
		var height = document.getElementById("show_img").height;
		location.href =	"c_photo_main_temp.php?photo=" + photo + "&left=" + left + "&top=" + top + "&width=" + width + "&height=" + height + "&i=" + i + "&j=o&" + Math.random();
		return;
	}
}
</script>
<body>
<div class="main">
<div class="main1maker">
	<div class="main1">
		<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_list.php" class="a333">我的相册</a></div>
		<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_up.php" class="a333">上传照片</a></div>
		<div class="main1_t" onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''"><a href="c_photo_dtt.php" class="a333">在线拍照</a></div>
		<div class="main1_tselect">更新形象照</div>
	</div>
</div>

	<div class="main2">
	  <?php
	$rt=$db->query("SELECT path_s,path_b FROM ".__TBL_PHOTO__." WHERE userid='$cook_userid' AND flag=1 ORDER BY id DESC");
	$total = $db->num_rows($rt);
	if($total>0){
		require_once YZLOVE.'sub/class.php';
		$pagesize = 5;
		if ($p<1)$p=1;
		$mypage=new uobarpage($total,$pagesize);
		$pagelist = $mypage->pagebar(1);
		$pagelistinfo = $mypage->limit2();
		mysql_data_seek($rt,($p-1)*$pagesize);
	?>
	<div class=main2_frame_maink>
	<?php
		for($i=1;$i<=$pagesize;$i++) {
		$rows = $db->fetch_array($rt);
		if(!$rows) break;
	?>
		<div class=main2_frame_k>
			<div class=main2_frame_k1><table width="100" height="100" border="0" cellpadding="0" cellspacing="0">
			  <tr><td align="center" valign="middle"  onclick="javascript:document.getElementById('show_img').src=document.getElementById('big<?php echo $i; ?>').value;document.getElementById('photo').value='<?php echo $rows['path_b'];?>'" style="cursor:pointer"><img src=../up/photo/<?php echo  $rows['path_s']; ?> title="选择这个照片进行裁切" border="0"></td>
			  </tr></table></div>
			<div class=main2_frame_k2>
			<label for="sid<?php echo $i; ?>">
				<input id="big<?php echo $i; ?>" value="<?php echo  $Global['up_2domain'].'/photo/'.$rows['path_b']; ?>" type="hidden">
				<input name="select_avatar" id=sid<?php echo $i; ?> onclick="javascript:document.getElementById('show_img').src=document.getElementById('big<?php echo $i; ?>').value;document.getElementById('photo').value='<?php echo $rows['path_b'];?>'" type="radio">&nbsp;设为形象照
			</label>
			</div>
		</div>
	<?php }?>
	</div>
	<div class=main2_frame_page><?php echo $pagelist; ?>　<?php echo $pagelistinfo; ?></div>
	<?php }else{?>
	<br /><br />
	<table width="281" height="147" border="0" align="center" cellpadding="10" cellspacing="0" bgcolor="#dddddd" style="border:#dddddd 1px solid">
			<tr>
			  <td align="left" bgcolor="#F7F7F7" style="color:#666666;line-height:200%">
				　　<img src="images/tips.gif" align="absmiddle" />您的相册中还没有照片，或照片还未通过审核，暂时无法设置形象照。<br />
				　　请点击下面按钮增加照片：</td>
			</tr>
			<tr>
			  <td align="center" valign="top" bgcolor="#F7F7F7" ><a href="c_photo_dtt.php"><img src="images/12.gif" alt="在线拍照片" width="69" height="21" hspace="5" border="0" /></a>　　<a href="c_photo_up.php"><img src="images/lkup.gif" alt="本地上传" width="69" height="21" hspace="5" border="0" /></a></td>
	  </tr>
	  </table>
	
	<?php }?>
	
		<br />
	  <div class="clear"></div>
	</div>


<?php if($total>0){?>
<div class="cjabs">
		<br />
		
		
		
<div class="photomaker_mask">
	<div class="photomaker_wapper">
		<h3 style="margin: 20px;">
		<a href="javascript:change_size(1);"><img src="images/reg_bn03.jpg" width="60" height="21" ></a>
		<a href="javascript:change_size(-1);"><img src="images/reg_bn04.jpg" width="60" height="21"></a>
		<a href="javascript:turn(1);"><img src="images/reg_bn05.jpg" width="100" height="21"></a>
		<a href="javascript:turn(-1);"><img src="images/reg_bn06.jpg" width="100" height="21"></a>
		</h3>		
		<div class="photomakerinbox">
			<table class="photomaker_table" onmouseup="free();" onmousedown="grasp();" style="cursor: move;" width="100%" border="0" cellpadding="0" cellspacing="0">
				  <tbody><tr>
					<td class="transbox" width="160"></td>
					<td class="transbox" height="100"></td>
					<td class="transbox" width="160"></td>
				  </tr>
				  <tr>
					<td class="transbox"></td>
					<td class="transboxin" ondblclick="javascript:mysub();"></td>
					<td class="transbox"></td>
				  </tr>
				  <tr>
					<td class="transbox"></td>
					<td class="transbox" height="115"></td>
					<td class="transbox"></td>
				  </tr>
				</tbody></table>	
		</div>
		<div class="cj"><a href="javascript:mysub();"><img src="images/reg_bn09.jpg" width="100" height="21" /></a></div>
	</div>
	<div class="photoreview">
	  <table width="211" height="174" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top" style="line-height:200%;color:#666;"><font color="#FF0000"><b>只有已经审核的照片才能设置</b></font></td>
        </tr>
        <tr>
          <td align="left" valign="top" style="line-height:200%;color:#666;"><b>操作步骤</b>：<br />
            1、请选择上方照片，并设置形象照。<br />
2、鼠标拖动左侧照片，将您需要的部分拖到红框内，双击红框即可裁剪。<br />
          3、利用“缩放键”或“旋转键”调整照片大小及方向。</td>
        </tr>
      </table>
	  <table width="147" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" style="font-size:10.3pt;color:#666;">形象照预览</td>
        </tr>
      </table>
	  <table border="0" align="center" cellpadding="2" cellspacing="0" style="border:#D0D0D0 1px solid;">
        <tr>
          <td align="center" bgcolor="#FFFFFF"><?php if (empty($cook_photo_s)) {?><img src="../images/nopic<?php echo $data_sex; ?>.gif" id=imgCreat />
            <?php } else {?>
          <img src="<?php echo $Global['up_2domain'];?>/photo/<?php echo $cook_photo_s;?>" id=imgCreat /><?php }?></td>
        </tr>
      </table>
	  <table width="147" height="43" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><a href="javascript:jump();"><img src="images/savephoto.gif" vspace="8" border="0" /></a><br />
		    <?php if (!empty($cook_photo_s)) {?><a href="c_photo_main.php?submitok=delpicupdate" onClick="return confirm('确认删除？')"><img src="images/delphoto.gif" width="114" height="26" vspace="7" border="0" /></a><?php }?></td>
        </tr>
      </table>
	</div><table width="694" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="348" valign="top" style="line-height:150%;color:#666;"><b>形象照标准</b>：<br />
      1、须为您本人真实照片，五官清晰。<br />
      2、勿上传带有色情、暴力、血腥，或涉及政治色彩的照片。<br />
      3、勿上传婴儿时期或与真实年龄相差甚远的照片。<br />      </td>
    <td width="346" valign="top" style="line-height:150%;color:#666;"><br />
      4、勿上传合影。<br />
5、勿上传模糊、微小的照片。</td>
  </tr>
</table>
<div class="clear"></div>
</div>
<div class="big1129img" id="source_div" onmouseup="free();" onmousedown="return false;" style="position: absolute; top:76px; left:35px;">
	<img src="images/d.gif" id="show_img">
</div>
<script type="text/javascript">
document.onmousemove = move_it;
document.onmouseup	=	free;
</script>	
<FORM name=myform action=c_photo_main_temp.php target=run_fra>
	<INPUT type=hidden name=width>
	<INPUT type=hidden name=height>
	<INPUT type=hidden name=left>
	<INPUT type=hidden name=top>
	<INPUT type=hidden name=turn>
	<INPUT id=photo type=hidden value=d.jpg name=photo>
	<INPUT id=scwidth type=hidden name=scwidth> 
</FORM>
</div>
<?php }?>
<?php require_once YZLOVE.'my/bottommy.php';?>