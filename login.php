<?php require_once 'sub/init.php';$navvar=1;
if ($submitok=="checkuser") {
	$ifnext=true;
	if (strlen($form_password) > 20 || strlen($form_password) < 6) {
	$varmsg.="● 密码长度必须在6~20个字之间！\\n";
	$ifnext=false;
	}
	if (!$ifnext) {
	setcookie("cook_userid","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_username","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_nickname","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_password","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_grade","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_sex","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_photo_s","",null,"/",$Global['m_cookdomain']);  
	setcookie("cook_if2","",null,"/",$Global['m_cookdomain']);
	setcookie("cook_stealth","",null,"/",$Global['m_cookdomain']); 
	callmsg($varmsg,"-1");
	}
	$password=trim($form_password);
	$password=md5($password);
	require_once YZLOVE.'sub/conn.php';
	$loginip=getip();
	$rt = $db->query("SELECT ipurl FROM ".__TBL_IP__);
	$total = $db->num_rows($rt);
	if($total > 0){
		for($i=1;$i<=$total;$i++) {
			$row = $db->fetch_array($rt);
			if(!$row) break;
			if ($loginip == $row[0]){
				callmsg("本站拒绝你的访问","0");
				break;
			}
			
		}
	}
	$rt = $db->query("SELECT id,username,nickname,grade,password,sex,logintime,photo_s,if2 FROM ".__TBL_MAIN__." WHERE username='$form_username' AND password='$password' AND flag>0");
	if(!$db->num_rows($rt)){
	callmsg("● 用户名/密码错误！\\n● 或用户名不存在或已被删除或锁定！","-1");
	} else {
	$row = $db->fetch_array($rt);
	$stealth = (empty($stealth))?0:1;
	setcookie("cook_userid",$row[0],null,"/",$Global['m_cookdomain']);
	setcookie("cook_username",$row[1],null,"/",$Global['m_cookdomain']);
	setcookie("cook_nickname",$row[2],null,"/",$Global['m_cookdomain']);
	setcookie("cook_grade",$row[3],null,"/",$Global['m_cookdomain']);
	setcookie("cook_password",$row[4],null,"/",$Global['m_cookdomain']);
	setcookie("cook_sex",$row[5],null,"/",$Global['m_cookdomain']);
	setcookie("cook_photo_s",$row[7],null,"/",$Global['m_cookdomain']);
	setcookie("cook_if2",$row[8],null,"/",$Global['m_cookdomain']);
	setcookie("cook_stealth",$stealth,null,"/",$Global['m_cookdomain']);
	$logintime=date("Y-m-d H:i:s");
	$d1 = date_format2($row[6],'%Y-%m-%d');
	$d2 = date("Y-m-d");
	if ($d1 != $d2){
		$db->query("UPDATE ".__TBL_MAIN__." SET logintime='$logintime',loginip='$loginip',logincount=logincount+1,ifonline=1,loveb=loveb+".$Global['m_firstlogin']." WHERE id=".$row[0]);
		$db->query("INSERT INTO ".__TBL_LOVEBHISTORY__."  (userid,username,content,num,addtime) VALUES ('".$row[0]."','".$row[1]."','每天第一次登录','".$Global['m_firstlogin']."','$logintime')");
	} else {
		$db->query("UPDATE ".__TBL_MAIN__." SET logintime='$logintime',loginip='$loginip',logincount=logincount+1,ifonline=1 WHERE id=".$row[0]);
	}
	setcookie("m_sitename",$Global['m_sitename'],null,"/",$Global['m_cookdomain']);
	setcookie("home_2domain",$Global['home_2domain'],null,"/",$Global['m_cookdomain']);  
//
	$rt = $db->query("SELECT a.userid,b.nickname,b.grade FROM ".__TBL_FRIEND__." a,".__TBL_MAIN__." b WHERE a.senduserid=".$row[0]." AND a.userid=b.id AND b.grade>=3 AND a.ifagree=1");
	$total = $db->num_rows($rt);
	if ($total > 0 ) {
		for($i=0;$i<$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			$uid = $rows[0];
			$uname =  $rows[1];
			$ugrade =  $rows[2];
			if ( $ugrade >= 3 ){
				$rtonline = $db->query("SELECT COUNT(*) FROM ".__TBL_ONLINE__." WHERE userid=".$uid);
				$rowonline = $db->fetch_array($rtonline);
				if ($rowonline[0] > 0){
					$addtime=$logintime;
					$title   = "我上线了，特来和你打个招呼！";
					$content = $title;
					$db->query("INSERT INTO ".__TBL_GBOOK__."  (userid,nickname,senduserid,sendnickname,title,content,addtime) VALUES ($uid,'$uname',$row[0],'".$row[2]."','$title','$content','$addtime')");
				}
			}//end ugrade
		}
	}
//
	header("Location: http://10.14.11.163/YZLOVE");
	}
} elseif ($submitok=="checkuseradmin") {
	if ( !ereg("^[0-9]{1,9}$",$uid) || $uid == 0 )callmsg("Forbidden1!","-1");
		$password = trim($pwd);
		require_once YZLOVE.'sub/conn.php';
		$rt = $db->query("SELECT id,username,nickname,grade,password,sex,logintime,photo_s,if2 FROM ".__TBL_MAIN__." WHERE id=".$uid." AND password='$password' AND flag>0");
		if(!$db->num_rows($rt)){
		callmsg("● 用户名/密码错误！\\n● 或用户名不存在或已被删除或锁定！","-1");
	} else {
		$row = $db->fetch_array($rt);
		setcookie("cook_userid",$row[0],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_username",$row[1],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_nickname",$row[2],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_grade",$row[3],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_password",$row[4],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_sex",$row[5],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_photo_s",$row[7],null,"/",$Global['m_cookdomain']);  
		setcookie("cook_if2",$row[8],null,"/",$Global['m_cookdomain']); 
		setcookie("cook_stealth",0,"/",$Global['m_cookdomain']);
		setcookie("m_sitename",$Global['m_sitename'],null,"/",$Global['m_cookdomain']);
		setcookie("home_2domain",$Global['home_2domain'],null,"/",$Global['m_cookdomain']);  
		$tmpurl = (empty($tmpurl))?'':$tmpurl;
		header("Location: http://10.14.11.163/YZLOVE/?$tmpurl");
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?php echo $Global['m_sitetitle'];?></title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(../images/login1.gif)}
.main2 {width:922px;height:296px;margin:0px auto;background-image:url(../images/login2.gif)}
.main2 .box{width:882px;height:296px;margin:0px auto;background-image:url(../images/loginbg.jpg)}
.main2 .box .L{float:left;width:384px;height:296px;}
.main2 .box .R{float:left;width:498px;height:246px;padding:50px 0 0 0;text-align:left}
.main2 .box .R .line1{width:490px;height:30px;margin:5px 0 0 0}
.main2 .box .R .line1 .left,.main2 .box .R .line1 .center,.main2 .box .R .line1 .chkbox,.main2 .box .R .line1 .right{float:left;height:30px}
.main2 .box .R .line1 .left {width:54px;line-height:26px}
.main2 .box .R .line1 .center {width:168px}
.main2 .box .R .line1 .right {width:100px;line-height:25px;padding:0 0 0 5px}
.main2 .box .R .line1 .chkbox {width:15px;height:28px;padding:2px 0 0 0}
.main2 .box .R .line2,.main2 .box .R .line3{width:436px;height:30px;padding:25px 0 0 52px}
.main2 .box .R .line3{padding:15px 0 0 52px;color:#577157}
.input{color:#444;background:#fff;border:#bbb 1px solid;height:19px;font-family:Arial,宋体;width:160px}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(../images/login3.gif);margin-bottom:20px}
</style>
</head>
<script language="javascript">
function checkform(){
if(document.zeaiform.form_username.value==""){
alert('请输入登录用户名！');
document.zeaiform.form_username.focus();
return false;
}
if(document.zeaiform.form_username.value.length>12 || document.zeaiform.form_username.value.length<2){
alert('用户名必须由3~12位组成。');
document.zeaiform.form_username.focus();
return false;
}
if(document.zeaiform.form_password.value==""){
alert('请输入密码！');
document.zeaiform.form_password.focus();
return false;
}}
function window_onload(){
	with (document.zeaiform){
		form_username.focus();
	}
}
</script>
<body>
<?php require_once YZLOVE.'topx.php';?>
<div class="top_login">
	<div class="left_right"><img src="/images/nav_l.gif" /></div>
	<div class="top_login_c">
		<div class="L">欢迎登录<?php echo $Global['m_sitename'] ?>！</div>
		<div class="R">如果您还不是会员，请点此 <a href="reg.php">免费注册</a></div>
	</div>
	<div class="left_right"><img src="/images/nav_r.gif" /></div>
</div>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="L"></div>
		<form action="<?php echo $Global['www_2domain']; ?>/login.php" method="post"  name="zeaiform" onsubmit="return checkform()">
		<div class="R">
			<div class="line1">
				<div class="left">用户名：</div>
			  <div class="center"><input  name="form_username" type="text" class="input" value="<?php echo $cook_username; ?>" maxlength="12" />
				</div>
				<div class="chkbox"><input name="stealth" type="checkbox" value="1" id=savepass /></div>
				<div class="right" title="只有永久钻石会员才享有此功能"><label for="savepass">隐身登录</label></div>
			</div>
			<div class="line1">
				<div class="left">密　码：</div>
			  <div class="center"><input name="form_password" type="password" class="input" maxlength="20" />
				</div>
				<div class="right" title="点此找回密码，系统会自动把密码发送您注册时的邮箱"> <a href="forgetpass.php" class="uDF2C91">忘记密码？</a></div>
			</div>
			<div class="line1">
				<div class="left"><input type="hidden" name="submitok" value="checkuser" /></div>
				<div class="center"><input type="image" src="images/loginb.gif" /></div>
				<div class="right"></div>
			</div>
			<div class="line2"><img src="images/logintip.gif" />　 <a href="reg.php"><img src="images/regb.gif" border="0" /></a></div>
			<div class="line3">只有注册成为会员，才可以浏览其他会员的资料，并且联系对方。</div>
		</div>
		</form>
	</div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
