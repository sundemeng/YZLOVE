<?php
require_once 'sub/init.php';$navvar=1;
if ( !ereg("^[0-9]{1,8}$",$uid) || empty($uid) || strlen($key)!=32){
	callmsg("验证失败，请检查你的地址是否有误！","-1");
} else {
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT id FROM ".__TBL_MAIN__." WHERE id=".$uid." AND password='$key'");
	if ($db->num_rows($rt)) {
		$tmprandpass = cdnumletters(10);
		$randpass    = $tmprandpass;
		$randpass    = md5($randpass);
		$db->query("UPDATE ".__TBL_MAIN__." SET password='$randpass' WHERE id=".$uid);
	} else {
		callmsg("验证失败，用户不存在或参数有误！","-1");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>恭喜你！密码设定成功</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;height:350px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;height:348px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:670px;height:18px;text-align:left;padding:120px 0 10px 210px;font-family:Verdana;font-size:14px;font-weight:bold;color:#f00}
.main2 .box .line2{width:620px;height:150px;line-height:200%;text-align:left;padding:10px 0 0 260px;font-family:Verdana;font-size:14px;color:#000}
.main2 .box .line2 input{height:20px;line-height:20px;border:#ddd 1px solid}

.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1"><img src="images/tips.gif" width="23" height="21" hspace="5" />恭喜！您的密码设定成功！　　请牢记，最好用个小本子记录下来。</div>
	    <div class="line2"><b>您的新密码为</b>：<?php echo $tmprandpass; ?>　　<a href="login.php" class="uDF2C91"><img src="images/19.gif" width="16" height="16" />点此用新密码登录本站</a></div>
  </div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
