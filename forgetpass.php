<?php
require_once 'sub/init.php';$navvar=1;
if ($submitok == 'addupdate') {
/* 	if (!preg_match('/(^[a-z]{1})([a-z0-9]{2,11}$)/', $form_username)) {
		callmsg("验证失败，请输入正确的用户名。","-1");
		exit;
	} */
	if (empty($form_username))callmsg("验证失败，请输入正确的用户名。","-1");
	require_once YZLOVE.'sub/liamiaez.php';
	require_once YZLOVE.'sub/conn.php';
	$rt = $db->query("SELECT id,password,email FROM ".__TBL_MAIN__." WHERE username='$form_username'");
	if ($db->num_rows($rt)) {
		$row = $db->fetch_array($rt);
		$tmpid = $row[0];
		$key = $row[1];
		$email = $row[2];
		if (empty($email) || !ereg("^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$",$email)) {
			callmsg("您当时注册时没填邮箱或邮箱不正确，请联系客服找回密码。","help");
			exit;
		}
		$Mserver=explode('@',$email);
		$Mserver='http://mail.'.$Mserver[1];
		$memberemail = $email;
		$mail = new zeaimail();
		$mail->setSmtp_accname("邮箱");//比如QQ邮箱,但要开通smtp，如kefu@qq.com
		$mail->setSmtp_password("邮箱密码");
		$mail->setLocalhost("YZLOVE.CoM");//可填邮箱的后面的域名，暂时没什么用
		$mail->setSmtp_host("邮箱smtp地址");//如smtp.qq.com
		$mail->setFrom("邮箱");//如kefu@qq.com
		$mail->setFromName($Global['m_sitename']."客服中心");
		$title = $Global['m_sitename'].'用户名密码找回！';
		$content = $title."<br>　　<b><a href=".$Global['www_2domain']."/findpass.php?uid=".$tmpid."&key=".$key." target=_blank>点此重置密码 ".$Global['www_2domain']."/findpass.php?uid=".$tmpid."&key=".$key."</a></b>";
		$err = $mail->send($memberemail,$title,$content);
		callmsg("密码信息已提交，请去邮箱 (".$memberemail.") 收信找回密码！","$Mserver");
	} else {
		callmsg("验证失败，用户不存在或参数有误！","-1");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>找回密码</title>
<link href="<?php echo $Global['www_2domain']; ?>/css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;height:350px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;height:348px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:670px;height:18px;text-align:left;padding:120px 0 10px 210px;font-family:Verdana;font-size:14px}
.main2 .box .line2{width:670px;height:150px;line-height:200%;text-align:left;padding:10px 0 0 210px;font-family:Verdana;font-size:14px}
.main2 .box .line2 input{height:20px;line-height:20px;border:#ddd 1px solid}
.buttonx{cursor:pointer!important;cursor:hand;background-image:url(/images/bg_btn2.gif);background-color:#FFF5E6; text-align:center; height:24px;padding:0px!important;padding-top:3px;border:1px solid #FF7E00;color:#000}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1"><img src="images/tips.gif" width="23" height="21" hspace="5" />请输入你当初注册时的用户名，系统会把密码发到当时注册邮箱：</div>
	    <div class="line2"><form action="forgetpass.php" method="post"><b>输入用户名:</b>
			<input name="form_username" type="text" size="50" maxlength="200" />
			<input name="button2" type="submit" value=" 提 交 " class="buttonx" style="height:22px">
			<input name="submitok" type="hidden" value="addupdate" />
			</form>
	  </div>
  </div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
