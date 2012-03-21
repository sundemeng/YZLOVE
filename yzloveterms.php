<?php
require_once 'sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<style type="text/css"> 
.top_login .top_login_c .L,.top_login .top_login_c .R{float:left;height:41px;line-height:41px;color:#FFCCD9}
.top_login .top_login_c .L{width:320px;padding:0 0 0 80px;text-align:left}
.top_login .top_login_c .R{width:497px;padding:0 75px 0 0;text-align:right}
.top_login .top_login_c .R a{text-decoration:underline;color:#ff0;font-weight:bold}
.top_login .top_login_c .R a:hover{color:#cf0}
.main1 {width:922px;height:20px;margin:0px auto;margin-top:15px;background-image:url(images/login1.gif)}
.main2 {width:922px;margin:0px auto;background-image:url(images/login2.gif)}
.main2 .box{width:880px;margin:0px auto;background:#FFF5F9;border:#F7E4ED 1px solid}
.main2 .box .line1{width:880px;height:60px;line-height:60px;padding:20px 0 0 0;font-size:18px;font-family:黑体,宋体;color:#6F9F00}
.main2 .box .line2{width:680px;line-height:200%;text-align:left;padding:10px 100px 80px 100px;font-family:Verdana;font-size:14px}
.main3 {width:922px;height:20px;margin:0px auto;background-image:url(images/login3.gif);margin-bottom:20px}
</style>
</head>
<body>
<?php require_once YZLOVE.'top.php';?>
<div class="main1"></div>
<div class="main2">
	<div class="box">
		<div class="line1">《<?php echo $Global['m_sitename']; ?>会员注册服务条款和免责声明》</div>
	  <div class="line2">
　　注册前请先阅读<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)服务条款和声明 <br>
          　　欢迎加入<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)这个大家庭，为维护网上公共秩序和社会稳定，请您自觉遵守以下条款：<br />
          <font color="#2E7CD3">
一、不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益，会员同意遵守《中华人民共和国合同法》、《中华人民共和国著作权法》、《全国人民代表大会常务委员会关于维护互联网安全的决定》、《中华人民共和国保守国家秘密法》、《中华人民共和国电信条例》、《中华人民共和国计算机信息系统安全保护条例》、《中华人民共和国计算机信息网络国际联网管理暂行规定》及其实施办法、《计算机信息系统国际联网保密管理规定》、《互联网信息服务管理办法》、《计算机信息网络国际联网安全保护管理办法》、《互联网电子公告服务管理规定》等相关中国法律法规的任何及所有的规定。
不得利用本站制作、复制和传播下列信息：</font> <font color="#666666"><br>
      <font color="#2E7CD3">　　(一)</font>煽动抗拒、破坏宪法和法律、行政法规实施的；<br>
      <font color="#2E7CD3">　　(二)</font>煽动颠覆国家政权，推翻社会主义制度的；<br>
      <font color="#2E7CD3">　　(三)</font>煽动分裂国家、破坏国家统一的；<br>
      <font color="#2E7CD3">　　(四)</font>煽动民族仇恨、民族歧视，破坏民族团结的；<br>
      <font color="#2E7CD3">　　(五)</font>捏造或者歪曲事实，散布谣言，扰乱社会秩序的；<br>
      <font color="#2E7CD3">　　(六)</font>宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的；<br>
      <font color="#2E7CD3">　　(七)</font>公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的；<br>
      <font color="#2E7CD3">　　(八)</font>损害国家机关信誉的；<br>
      <font color="#2E7CD3">　　(九)</font>其他违反宪法和法律行政法规的；<br>
      <font color="#2E7CD3">　　(十)</font>进行商业广告行为的。 </font><br>
      <font color="#2E7CD3">二、互相尊重，对自己的言论和行为负责。</font><br>
      <font color="#2E7CD3">三、会员义务：</font><font color="#666666"><br>
       　　 1.遵守本网站的网站章程。<br>
       　　 2.如实、详细地提供个人资料，发布真实的照片。<br>
       　　 3.遵守国家的法律法规，严禁利用本网站从事宗教活动或其他违法、违规活动。<br>
       　　 4.未经当事人同意，不随意泄露其他会员的资料。<br>
       　　 5.积极参加本网站的各项活动，并为网站的各项活动献计献策。<br>
       　　 6.会员有义务维护本网站的声誉，不做有损本网站形象的事。</font><br>
      <font color="#2E7CD3">四、<?php echo $Global['m_sitename'] ?>(<?php echo $Global['m_siteurl'] ?>)属服务性质，不负责对信息进行核实，不承担因此带来的任何责任。</font>
	  <br />
	  　 　<font color="#666666">1.您应保证您的上传的内容正当、合法，同时不侵犯他人的肖像权、名誉权、知识产权等任何合法权益。<br />
	  　 　2.本站如果认为您的资料不适当，有权删除或者修改。<br />
	  　　 3.对于1年以上没有登录的会员，我们有权收回、删除、修改、注销资料，不再另行通知。</font><br />
	  </div>
	</div>
	<div class="clear"></div>
</div>
<div class="main3"></div>
<?php require_once YZLOVE.'bottom.php';?>
