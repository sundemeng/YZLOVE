<?php !function_exists('cdstr') && exit('Forbidden');$tmpnav = 'nav'.$navvar;$$tmpnav = $lst;
?>
<div class=top_fav><a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $Global['www_2domain']; ?>');" href="javascript:">设为主页</a> - <a href="<?php echo $Global['www_2domain']; ?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo $Global['m_sitename']; ?>' rel="sidebar">收藏</a><?php if (empty($cook_userid)){?> - <a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a><?php }?> - <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> - <a href="<?php echo $Global['www_2domain']; ?>/help">帮助</a></div>
<div class=top_nav>
<div class=top_nav_left><a href="<?php echo $Global['www_2domain']; ?>"><img src="<?php echo $Global['www_2domain']; ?>/images/logo.gif"></a></div>
<div class=top_nav_right>
<ul>
<li<?php echo $nav1; ?>><a href="<?php echo $Global['www_2domain']; ?>">首页</a></li>
<li<?php echo $nav2; ?>><a href="<?php echo $Global['www_2domain']; ?>/user">征婚</a></li>
<li<?php echo $nav3; ?>><a href="<?php echo $Global['group_2domain']; ?>">圈子</a></li>
<li<?php echo $nav4; ?>><a href="<?php echo $Global['www_2domain']; ?>/clinic">诊所</a></li>
<li<?php echo $nav5; ?>><a href="<?php echo $Global['www_2domain']; ?>/party">活动</a></li>
<li<?php echo $nav6; ?>><a href="<?php echo $Global['www_2domain']; ?>/dating">约会</a></li>
<li<?php echo $nav7; ?>><a href="<?php echo $Global['www_2domain']; ?>/user/online.php">聊天</a></li>
<li<?php echo $nav8; ?>><a href="<?php echo $Global['www_2domain']; ?>/video">视频</a></li>
<li<?php echo $nav9; ?>><a href="<?php echo $Global['www_2domain']; ?>/diary">博客</a></li>
<li<?php echo $nav10; ?>><a href="<?php echo $Global['www_2domain']; ?>/photo">相册</a></li>
<li<?php echo $nav11; ?>><a href="<?php echo $Global['www_2domain']; ?>/user/search.php">搜索</a></li>
<li<?php echo $nav12; ?>><a href="<?php echo $Global['www_2domain']; ?>/story">故事</a></li>
</ul>
</div>
</div>
