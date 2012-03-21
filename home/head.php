<?php 
$currfilename = basename($_SERVER['PHP_SELF']);
function tselect($str) {
	global $currfilename;
	$strarr = explode(',',$str);
	foreach($strarr as $value){
		if(strpos($currfilename,$value)!==false){
			$t = 'class=navSelectA';
			break;
			exit;
		}
	}
	echo $t;
}
?>
<div class="home">
	<div class="homeleft">·<a href="<?php echo $Global['www_2domain'] ?>">交友首页</a>　·<a href="<?php echo $Global['www_2domain']; ?>/user">征婚</a>·<a href="<?php echo $Global['www_2domain']; ?>/dating">约会</a>·<a href="<?php echo $Global['www_2domain']; ?>/party">活动</a>·<a href="<?php echo $Global['www_2domain'] ?>/clinic">诊所</a>·<a href="<?php echo $Global['www_2domain'] ?>/video">视频</a>·<a href="<?php echo $Global['www_2domain'] ?>/diary">博客</a>·<a href="<?php echo $Global['www_2domain']; ?>/user/online.php">聊天</a>·<a href="<?php echo $Global['group_2domain'] ?>">圈子</a>·<a href="<?php echo $Global['www_2domain'] ?>/photo">相册</a></div>
	<div class="homeright"><?php if (empty($cook_userid)) {?>
来宾你好，欢迎来到<?php echo $Global['m_sitename'] ?>！ <a href="<?php echo $Global['www_2domain']; ?>/reg.php" target="_parent">注册</a> <a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a>
<?php } else {  ?>
<font color="#666666" style="font-family:Arial,宋体;">“<?php echo $cook_nickname;?>”你好<i>！</i></font> <a href="<?php echo $Global['my_2domain']; ?>" target="_parent">个人管理中心</a>
<?php }?></div>
</div>
<div class="top">
	<div class="topkbox1"><h4><?php echo $nickname;?> | (<?php echo $username;?>)的个人主页</h4>
	<h3><?php echo $Global['home_2domain'] ?>/<?php echo $uid ?></h3>
	</div>
	<div class="topkbox2"><h3><?php 
	
	if (!empty($mbtitle)) {
	echo htmlout($mbtitle);
	} else {
	echo '交友有网络 / 爱情更精彩，欢迎光临我的主页!';
	}
	?></h3>
	</div>
</div>
<div class="nav">
	<ul>
	<li><a href="<?php echo $uid; ?>" <?php tselect('index.php,mycontact.php');?>>首页</a></li>
	<li><a href="myarchive<?php echo $uid; ?>.html" <?php tselect('myarchive.php');?>>资料</a></li>
	<li><a href="myvideo<?php echo $uid; ?>.html" <?php tselect('myvideo.php,v.php');?>>视频</a></li>
	<li><a href="myphoto<?php echo $uid; ?>.html" <?php tselect('myphoto.php,p.php');?>>相册</a></li>
	<li><a href="mydiary<?php echo $uid; ?>.html" <?php tselect('mydiary.php,diary.php');?>>日记</a></li>
	<li><a href="myask<?php echo $uid; ?>.html" <?php tselect('myask.php,ask.php');?>>求助</a></li>
	<li><a href="mydating<?php echo $uid; ?>.html" <?php tselect('mydating.php,dating.php');?>>约会</a></li>
	<li><a href="myfriend<?php echo $uid; ?>.html" <?php tselect('myfriend.php');?>>朋友</a></li>
	<li><a href="mybbs<?php echo $uid; ?>.html" <?php tselect('mybbs.php');?>>圈子</a></li>
	<li><a href="<?php echo $Global['my_2domain'];?>/?k_homepage.php">管理</a></li>
	</ul>
</div>
<div class="navbg"></div>