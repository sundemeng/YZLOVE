<?php !function_exists('cdstr') && exit('Forbidden');$tmpnav = 'nav'.$navvar;$$tmpnav = $lst;?>
<div class=top_fav>
<a onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $Global['www_2domain']; ?>');" href="javascript:">设为主页</a>
 - <a href="<?php echo $Global['www_2domain']; ?>" onclick="window.external.addFavorite(this.href,this.title);return false;" title='<?php echo $Global['m_sitename']; ?>' rel="sidebar">收藏</a>
<?php if (empty($cook_userid)){?> 
- <a href="<?php echo $Global['www_2domain']; ?>/login.php">登录</a><?php }?> 
- <a href="<?php echo $Global['www_2domain']; ?>/reg.php">注册</a> 
- <a href="<?php echo $Global['www_2domain']; ?>/help">帮助</a>
</div>

<table width="980" border="0" cellspacing="0" cellpadding="0" style="background:url(sun_images/reg_bj_04_c.png) repeat-x" height="21" class="jy_top" align="center">
  <tr>
    <td width="1%">&nbsp;</td>
    <td width="46%" style="color:#595757">佳音网祝福您交友成功！</td>
    <td width="53%" align="center" style="color:#595757;text-align:right; padding-right:19px;"><a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayinzh.com');" href="#">设为主页</a> / <a href="javascript:void(0);" onClick="window.external.AddFavorite(document.location.href,document.title)">收藏</a> / <a href="/login.php">登录</a> / <a href="/reg.php" target="_blank">注册</a></td>
  </tr>
</table>

<table width="980" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td >
	<table width="980" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="181" height="70" valign="middle"><a href=".."><img src="sun_images/logo.gif" /></a></td>
		<td width="799" height="70" align="right" valign="middle" style="padding-top:2px;"><img src="sun_images/index_08.gif" /></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<table width="980" border="0" cellspacing="0" cellpadding="0" height="47">
			  <tr>
				<td width="6" ><img src="sun_images/index_16.jpg" width="6" height="34" /></td>
				<td style="background:url(sun_images/index_18.jpg) repeat-x center">
					<table width="968" border="0" cellspacing="0" cellpadding="0" >
					  <tr>
						<td width="92" align="center"  class="jy_menu "><a href="../" target="_parent" class="top_title" title="重庆交友网">佳音首页</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/my" class="top_title" title="重庆交友网_我的佳音">我的佳音</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/dating/index.php" class="top_title" title="重庆交友网_相亲1+1">相亲1+1</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/party" class="top_title" title="重庆交友网_交友活动">交友活动</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/user/online.php" class="top_title" title="在线聊天">在线聊天</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/diary/index.php" class="top_title" title="情感社区">情感博客</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/my/yfjy.php">缘分交友</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="/game/index.php">投票抽奖</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/group">会员俱乐部</a></td>
						<td width="5" align="center" style="color:#FFFFFF">|</td>
						<td width="92" align="center" class="jy_menu_c"><a href="http://www.jiayinzh.com/yule/" class="top_title" title="重庆征婚网_佳音娱乐">佳音娱乐</a></td>
					  </tr>
				  </table>
				</td>
				<td width="6"><img src="sun_images/index_21.jpg" /></td>
			  </tr>
			</table>
		</td>
		</tr>
	</table>
</td>
</tr>
</table>


<!-- 
	孙德猛 注释掉原来的 -->

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
</div></div>
<div class="top_login">
<div class="left_right"><img src="<?php echo $Global['www_2domain']; ?>/images/nav_l.gif" /></div>
<div class="top_login_c" <?php if (!empty($cook_nickname))echo 'lineheight';?>	>
<?php if (!empty($cook_nickname)) {?>	
<a href="<?php echo $Global['home_2domain']; ?>/<?php echo $cook_userid;?>" target=_blank class="uff0">“<?php echo $cook_nickname; ?>”</a>(<?php echo $cook_username; ?>)你好！　　　　<a href="<?php echo $Global['my_2domain']; ?>" class="nav">管理中心</a>　　<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />　　<a href="<?php echo $Global['my_2domain']; ?>/?b_gbook.php?submitok=list" class="nav">收件箱</a>　　<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />　　<a href="<?php echo $Global['my_2domain']; ?>/?a2.php" class="nav">修改资料</a>　　<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />　　<a href="<?php echo $Global['my_2domain']; ?>/?c_photo_up.php" class="nav">上传照片</a>　　<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />　　<a href="<?php echo $Global['my_2domain']; ?>/?k_vip.php" class="nav">会员升级</a>　　<img src="<?php echo $Global['www_2domain']; ?>/images/top_login_cl.gif" align="absmiddle" />　　<a href="<?php echo $Global['www_2domain']; ?>/exit.php" class="nav">安全退出</a>
<?php } else {?>
<script language="javascript">
function checkform(){
if(document.zeaiform.form_username.value==""){
alert('请输入登录用户名！');
document.zeaiform.form_username.focus();return false;}
if(document.zeaiform.form_username.value.length>12 || document.zeaiform.form_username.value.length<2){
alert('用户名必须由3~12位组成。');
document.zeaiform.form_username.focus();return false;}
if(document.zeaiform.form_password.value==""){
alert('请输入密码！');
document.zeaiform.form_password.focus();return false;}}
</script>
<form action="<?php echo $Global['www_2domain']; ?>/login.php" method="post"  name="zeaiform" onsubmit="return checkform()">
<div class="top_login_c_rows">
<div class="top_login_c_rows1">用户名：</div>
<div class="top_login_c_rows2"><input name="form_username" type="text" class=top_login_input /></div>
<div class="top_login_c_rows3">密码：</div>
<div class="top_login_c_rows4"><input name="form_password" type="password" class=top_login_input /></div>
<div class="top_login_c_rows5"><input name="stealth" type="checkbox" value="1" id=savepass /></div>
<div class="top_login_c_rows6"><label for="savepass">隐身登录</label></div>
<div class="top_login_c_rows7"><input type="image" src="<?php echo $Global['www_2domain']; ?>/images/login.gif"/></div>
<div class="top_login_c_rows8"><a href="<?php echo $Global['www_2domain']; ?>/reg.php"><img src="<?php echo $Global['www_2domain']; ?>/images/reg.gif" border="0" /></a></div>
<div class="top_login_c_rows9"><a href="<?php echo $Global['www_2domain']; ?>/forgetpass.php">忘记密码？</a></div>
</div>
<input type="hidden" name="submitok" value="checkuser" />
</form>
<?php }?>
</div>
<div class="left_right"><img src="<?php echo $Global['www_2domain']; ?>/images/nav_r.gif" /></div>
</div>


