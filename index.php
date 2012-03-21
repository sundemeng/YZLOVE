<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once 'sub/init.php';$navvar=1;
require_once YZLOVE.'sub/conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?php echo $Global['m_keywords']; ?>" />
<meta name="description" content="<?php echo $Global['m_description']; ?>" />
<title><?php echo $Global['m_sitetitle']; ?></title>
<!-- 孙德猛 注释掉原来 -->
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css"> 
<script language="javascript" src="adv/indexAD.js"></script>
<script language="javascript" src="ajax/ZeaiXML.js"></script>
<script language="javascript" src="adv/ZeaiAdswf.js"></script>



<!-- 孙德猛 修改 
<link href="sun_css/main.css" rel="stylesheet" type="text/css">
<link href="sun_css/index.css" rel="stylesheet" type="text/css">
<link href="sun_css/header.css" rel="stylesheet" type="text/css" />
<link href="sun_css/style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="sun_js/ZeaiXML.js"></script>
<script language="javascript" src="sun_js/indexAD.js"></script>
<script language="javascript" src="sun_js/ZeaiAdswf.js"></script>
<SCRIPT type=text/javascript src="sun_js/jquery-1.3.2.min.js"></SCRIPT>
<SCRIPT language=javascript src="sun_js/jquery.blockUI.js"></SCRIPT>
<SCRIPT type=text/javascript src="sun_js/index_new.js"></SCRIPT>	

-->

</head>
<body>
<?php 
	require_once YZLOVE.'top.php';
?>


<!-- 第一部分 -->

<table width="980" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="right" valign="top">
		<DIV style="OVERFLOW: hidden" class=index_focus>
		<DIV class=imgbox>
			<DIV id=img1><a href="#" target="_blank"><img src="sun_images/001.jpg"  width="707" height="241" border="0"/></a></DIV>
			<DIV id=img2><a href="#"><img src="sun_images/002.jpg" border="0" /></a></DIV>
			<DIV id=img3><a href="#"><img src="sun_images/003.jpg" border="0" /></a></DIV>
			<DIV id=img4><a href="#"><img src="sun_images/004.jpg" border="0"/></a></DIV>
		</DIV>
		<UL class=photo_showbtn>
  			<LI id=icon01 class=current><A href="javascript:slidBox1.clickSlid(0)" title="佳音红人">佳音红人</a></LI>
  			<LI id=icon02><A href="javascript:slidBox1.clickSlid(1)" title="佳音活动">佳音活动</a></LI>
  			<LI id=icon03><A href="javascript:slidBox1.clickSlid(2)" title="相亲1+1">相亲1+1</a></LI>
  			<LI id=icon04><A href="javascript:slidBox1.clickSlid(3)" title="佳音VIP">佳音VIP</a></LI>
  		</UL>
  		</DIV>
		</td>
		<td valign="top">
		<table width="273" height="270" border="0" cellpadding="0" cellspacing="0" style="background:url(sun_images/index_29.jpg) repeat-x; border-left:1px solid #d4a7ef; border-bottom:1px solid #d4a7ef">
			<tr>
			<td valign="top">
            <form method=get action="user/searchlist.php" name=myform>
			<table width="250" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:8px;">
				<tr><td height="45"><img src="sun_images/gdf_03.gif"></td></tr>
				<tr><td height="35"><img src="sun_images/gdf_06.gif"></td></tr>
				<tr>
				<td><table width="250" border="0" cellspacing="0" cellpadding="0">
					<tr><td width="84" height="35"><img src="sun_images/gdf_08.gif"></td>
					<td width="191"><select name="sex" class=selw><option value="2">女士</option><option value="1">男士</option></select></td>
					</tr>
					</table>						
				</td>
			    </tr>
				<tr>
				<td height="49">
					<table width="250" border="0" cellspacing="0" cellpadding="0">
					<tr><td width="84" height="35"><img src="sun_images/gdf_11.gif"></td>
						<td width="192"><select name="birthday1" class=selwx><option value="">不限</option><option value="18">18岁</option><option value="19">19 岁</option><option value="20">20 岁</option><option value="21">21 岁</option><option value="22"selected>22 岁</option><option value="23">23 岁</option><option value="24">24 岁</option><option value="25">25 岁</option><option value="26">26 岁</option><option value="27">27 岁</option><option value="28">28 岁</option><option value="29">29 岁</option><option value="30">30 岁</option><option value="31">31 岁</option><option value="32">32 岁</option><option value="33">33 岁</option><option value="34">34 岁</option><option value="35">35 岁</option><option value="36">36 岁</option><option value="37">37 岁</option><option value="38">38 岁</option><option value="39">39 岁</option><option value="40">40 岁</option><option value="41">41 岁</option><option value="42">42 岁</option><option value="43">43 岁</option><option value="44">44 岁</option><option value="45">45 岁</option><option value="46">46 岁</option><option value="47">47 岁</option><option value="48">48 岁</option><option value="49">49 岁</option><option value="50">50 岁</option><option value="51">51 岁</option><option value="52">52 岁</option><option value="53">53 岁</option><option value="54">54 岁</option><option value="55">55 岁</option><option value="56">56 岁</option><option value="57">57 岁</option><option value="58">58 岁</option><option value="59">59 岁</option><option value="60">60 岁</option><option value="61">61 岁</option><option value="62">62 岁</option><option value="63">63 岁</option><option value="64">64 岁</option><option value="65">65 岁</option><option value="66">66 岁</option><option value="67">67 岁</option><option value="68">68 岁</option><option value="69">69 岁</option><option value="70">70 岁</option></select> ~ <select name="birthday2" class=selwx><option value="">不限</option><option value="18">18 岁</option><option value="19">19 岁</option><option value="20">20 岁</option><option value="21">21 岁</option><option value="22">22 岁</option><option value="23">23 岁</option><option value="24">24 岁</option><option value="25">25 岁</option><option value="26">26 岁</option><option value="27">27 岁</option><option value="28">28 岁</option><option value="29">29 岁</option><option value="30">30 岁</option><option value="31">31 岁</option><option value="32">32 岁</option><option value="33">33 岁</option><option value="34">34 岁</option><option value="35">35 岁</option><option value="36">36 岁</option><option value="37">37 岁</option><option value="38">38 岁</option><option value="39">39 岁</option><option value="40"selected>40 岁</option><option value="41">41 岁</option><option value="42">42 岁</option><option value="43">43 岁</option><option value="44">44 岁</option><option value="45">45 岁</option><option value="46">46 岁</option><option value="47">47 岁</option><option value="48">48 岁</option><option value="49">49 岁</option><option value="50">50 岁</option><option value="51">51 岁</option><option value="52">52 岁</option><option value="53">53 岁</option><option value="54">54 岁</option><option value="55">55 岁</option><option value="56">56 岁</option><option value="57">57 岁</option><option value="58">58 岁</option><option value="59">59 岁</option><option value="60">60 岁</option><option value="61">61 岁</option><option value="62">62 岁</option><option value="63">63 岁</option><option value="64">64 岁</option><option value="65">65 岁</option><option value="66">66 岁</option><option value="67">67 岁</option><option value="68">68 岁</option><option value="69">69 岁</option><option value="70">70 岁</option></select></td>
					</tr>
					</table>						
				</td>
				</tr>
				<tr><td><table width="250" border="0" cellspacing="0" cellpadding="0">
						<tr><td width="84" height="35"><img src="sun_images/gdf_13.gif"></td>
							<td width="191"><script language="javascript" src="sun_js/Jy_city.js"></script>
							<select onchange=setcity(); name='province' style="font-size:9pt;">
							<option value="">不限</option><option value=安徽>安徽</option><option value=北京>北京</option><option value=重庆>重庆</option><option value=福建>福建</option><option value=甘肃>甘肃</option><option value=广东>广东</option><option value=广西>广西</option><option value=贵州>贵州</option><option value=海南>海南</option><option value=河北>河北</option><option value=黑龙江>黑龙江</option><option value=河南>河南</option><option value=香港>香港</option><option value=湖北>湖北</option><option value=湖南>湖南</option><option value=江苏>江苏</option><option value=江西>江西</option><option value=吉林>吉林</option><option value=辽宁>辽宁</option><option value=澳门>澳门</option><option value=内蒙古>内蒙古</option><option value=宁夏>宁夏</option><option value=青海>青海</option><option value=山东>山东</option><option value=上海>上海</option><option value=山西>山西</option><option value=陕西>陕西</option><option value=四川>四川</option><option value=台湾>台湾</option><option value=天津>天津</option><option value=新疆>新疆</option><option value=西藏>西藏</option><option value=云南>云南</option><option value=浙江>浙江</option><option value=海外>海外</option>
							</select>
							<select name='city' style="font-size:9pt;width:100px;">
							</select>
							<script>initprovcity('重庆','重庆');</script>
							</td>
						</tr>
					    </table>						
					 </td>
				</tr>
				<tr><td><table width="250" border="0" cellspacing="0" cellpadding="0">
						<tr>
						<td width="85" height="55" align="right"><input type="image" src="sun_images/gdf_16.gif"  border="0" /></td>
						<td width="165" height="55" align="left"><a href="http://www.jiayinzh.com/reg.php"><img src="sun_images/xiangqi.gif" border="0"></a></td>
						</tr>
						</table>						
					</td>
				</tr>
		</table>
		</form>				
		</td>
	</tr>
	</table>
	</td>
	</tr>
</table>


<!-- 第二部分 -->
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>
    	<td height="90">
    	<div class="adv"><span id="zeai_JIAYIN_FAD"></span>
			<script type="text/javascript">
			ZeaiAd('zeai_JIAYIN_FAD',focus_ly,focus_width,swf_height,pics,links,texts);
			</script>	
			</div>
		</td>
	</tr>
</table>

<!-- 第三部分 -->
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="mg-t5">
  
  <tr>
    <td width="2" height="775" rowspan="2" valign="top"><img src="sun_images/z_03.gif" width="2" height="775" /></td>
    <td width="715" valign="top" style="border-top:1px solid #d4a7ef;"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="line21 F_4d4d4d F_BS" bgcolor="#FFFFFF">
        <tr>
          <td height="42"><div  class="F_B_TOP"><div style="font-weight:bold;font-size:16px;padding-left:15px; float:left;padding-top:12px; color:#db0063">佳音网推荐</span></div><div style="padding-left:15px; float:right;width:115px;padding-top:15px;"><a href="http://www.jiayinzh.com/my/?k_bidding.php"><img src="sun_images/hy_30.gif" border="0" align="absmiddle"> 我也要在此出现</a></span></div></div></td>
        </tr>
        <tr>
          <td colspan="8" style="border-bottom:1px solid #d4a7ef; border-left:1px solid #d4a7ef;"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="mg-b5">
		  		
            <tr>
              <td width="50%"  valign="top" >				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23077 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201009/23077.jpg title="徐紫怡的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23077 target=_blank>徐紫怡</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">23岁 163厘米 江北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">感谢那些浏览我的资料的人，感谢那些关注我...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
			  				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23615 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201009/23615.jpg title="英格玛的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23615 target=_blank>英格玛</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">28岁 163厘米 渝中</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">生活只是那一杯水，要靠自己慢慢去品味，细...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
			  				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23620 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201009/23620.jpg title="Dream的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23620 target=_blank>Dream</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">23岁 160厘米 渝北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">    我向往童话里的故事，也向往公主与王子...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
			  				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23852 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201011/23852.jpg title="单飞的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23852 target=_blank>单飞</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">22岁 160厘米 南岸</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">一次偶然的机会让我走进了佳音交友网，我是...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
			  				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23880 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201010/23880.jpg title="Amy的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23880 target=_blank>Amy</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">23岁 163厘米 南岸</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">热情、大方、活泼、开朗，善待他人也善待自...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
			  			  </td>
              <td width="50%" valign="top" >				<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY2">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/24613 target=_blank><img src=sun_images/nopic1.gif title="暂无照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/24613 target=_blank>嘻嘻</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">21岁，170厘米，江北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻嘻...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY2">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23344 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201011/23344.jpg title="假装潜水的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23344 target=_blank>假装潜水</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">27岁，175厘米，江北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">想了解我的人看日记嘛!~~~~~~~~~~~~~~~~~~~...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY2">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23456 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201009/23456.jpg title="Green的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23456 target=_blank>Green</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">28岁，172厘米，江北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">本人偏内向型，但是绝对不拘言谈。为人诚恳...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY2">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/23897 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201010/23897.jpg title="痞子式微笑的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/23897 target=_blank>痞子式微笑</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">25岁，176厘米，江北</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">有些话不是用言语能表达的，行动表达......</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
								<table width="100%" border="0" cellspacing="0" cellpadding="0" class="F_B_BODY2">
                <tr>
                  <td width="30%" rowspan="4" align="center" class="F_C_R"><div class="F_C_R_D"><a href=http://www.jiayinzh.com/home/24566 target=_blank><img src=http://www.jiayinzh.com/up/photo/m/201101/24566.jpg title="寂寞的玩具的照片" width="84" height="102"></a></div></td>
                  <td width="70%" height="25" valign="bottom" class="F_C_l"><b><a href=http://www.jiayinzh.com/home/24566 target=_blank>寂寞的玩具</a></b></td>
                </tr>
                <tr>
                  <td valign="bottom" class="F_C_l">30岁，175厘米，北碚</td>
                </tr>
                <tr>
                  <td class="F_C_l"><font color="#7F7F7F">我是一个极度缺乏自信的人，自身条件不好，...</font></td>
                </tr>
                <tr>
                  <td height="25" valign="top" class="F_C_l"><a href=../login.php><img src=sun_images/gbook.gif alt=点击发送邮件></a>　 <a href=../login.php><img src=sun_images/chat.gif alt=点击开始聊天></a></td>
                </tr>
              </table>
				</td>
            </tr>	
          </table></td>
        </tr>
    </table>    </td>
    <td width="265" valign="top" style="background:url(sun_images/index_53.jpg) repeat-y; border:1px solid #d4a7ef">
    <table width="235" cellpadding="0" cellspacing="0" class="mg-t12 mg-b15 mg-l20">
      <tr>
        <td height="142" style="border-bottom:1px dashed #cccccc">
	<script language="javascript">
function checkform(){
if(document.zeaiform.form_username.value==""){
alert('请输入登录邮箱地址！');
document.zeaiform.form_username.focus();return false;}
if(document.zeaiform.form_password.value==""){
alert('请输入密码！');
document.zeaiform.form_password.focus();return false;}}
</script>
<table width="84" border="0" cellpadding="0" cellspacing="0" class="F_14 F_B F_ee2c70 mg-t5">
            <tr>
              <td width="18"><img src="sun_images/x_03.gif" width="13" height="13" /></td>
              <td><a href="/login.php" target="_blank">会员登录</a></td>
            </tr>
          </table>
            <table width="235" border="0" cellpadding="0" cellspacing="0" class=" line26 F_13 F_4d4d4d mg-t20">
            <form action="http://www.jiayinzh.com/login.php" method="post"  name="zeaiform" onsubmit="return checkform()" target="_self">
              <tr>
                <td width="89" height="35">注册邮箱：</td>
                <td width="176"><input name="form_username" type="text" tabindex="1" class=top_login_input /></td>
              </tr>
              <tr>
                <td height="35">登录密码：</td>
                <td><input name="form_password" type="password" tabindex="2" class=top_login_input /></td>
              </tr>
			  <tr>
			  	<td colspan="2" align="center"><input type="image" src="sun_images/index_58.jpg" width="83" height="42" tabindex="3" /></td>
			  </tr>
			  <tr>
			  <td height="35" colspan="2" align="center" valign="top" class="F_e7609e mg-b20">
					<a href="http://www.jiayinzh.com/reg.php"><img src="sun_images/index_61.jpg" border="0" align="absmiddle"  />  免费注册</a>     <a href="http://www.jiayinzh.com/forgetpass.php"><img src="sun_images/index_63.jpg" border="0" align="absmiddle" />  忘记密码？</a>				</td>
			  </tr>
			  <input type="hidden" name="submitok" value="checkuser" />
              </form>
            </table>     
            
            
                      </td>
      </tr>
    </table>
      <table width="250" border="0" cellpadding="0" cellspacing="0" class="mg-l20  mg-b15" style="border-bottom:#CCCCCC 1px dotted;">
        <tr>
          <td>
          <table width="78" border="0" cellpadding="0" cellspacing="0" class="F_14 F_B F_ee2c70  mg-b10">
            <tr>
              <td width="18"><img src="sun_images/x_03.gif" width="13" height="13" /></td>
              <td><a href="/party/" target="_blank">交友活动</a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
        <tr>
                <td height="120" align="left"><div class="main1">
<div class="right">
<div class="partyC">
<div id="pp1"><h6><img src="sun_images/loading.gif" /> Loading...</h6></div>
<script type='text/javascript'>pppt = getObj('p1');pppc = getObj('pp1');pppt.className = 'partyT1 partyTWH';pppc.style.display = 'block';getData('pp1');</script></div>
</div></div></td>
        </tr>
      </table>
      <table width="250" border="0" cellpadding="0" cellspacing="0" class="mg-l20">
        <tr>
          <td>
          <table width="108" border="0" cellpadding="0" cellspacing="0" class="F_14 F_B F_ee2c70">
              <tr>
                <td width="18"><img src="sun_images/x_03.gif" width="13" height="13" /></td>
                <td><a href="news.php" target="_blank">佳音网公告</a></td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td valign="top">
			  <div class="main2">
  <div class="right">
		<div class="diaryC">
			<div class="dd" id="dd1">
								<div class="li1"><img src="sun_images/lid.gif" style="margin-right:10px;"/><a href=http://www.jiayinzh.com/news156.html target=_blank title="会员须知">会员须知</a></div>
				<div class="li2">2011-05-21</div>
                <div class="li2s">会员须知：
&nbsp;&nbsp; 1：相亲1+1，你主动发布相亲，就会有中意的人来应征，还可以查询TA的联系方式哟。
&nbsp;&nbsp; 2：&ldquo;和我相亲&rdquo;：若你看上佳音网某个会员，点击&ldquo;和我相亲&rdq...<a href=http://www.jiayinzh.com/news156.html target=_blank title="会员须知">[查看详情]</a></div>
							</div>
		</div>
	</div>
</div></td>
        </tr>
        <tr>
          <td valign="top" ><span id="AD3"></span><script language="JavaScript">zeai_getbyid('AD3').innerHTML = AD3;</script></td>
        </tr>
    </table></td>
  </tr>
</table>


<!--第四部分-->
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="mg-t1 mg-b5">
        <tr>
          <td><div class="adv">
<span id="AD4"></span><script language="JavaScript">zeai_getbyid('AD4').innerHTML = AD4;</script>	
</div></td>
        </tr>
</table>


<!-- 第五部分 -->
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="huod">
  <tr class="huod_head">
    <td width="976" height="28" >活动回顾                                                                                                                       <a href="http://www.jiayinzh.com/party">活动报名 <img src="sun_images/huod_more.gif" align="absmiddle"></a></td>
  </tr>
  <tr>
    <td colspan="2" class="huod_main" width="976"><div id="demo" style="width:950px; height:170px; overflow:hidden; margin-left:14px;margin-right:10px;">
      <div id="demo1" style="float:left; width:200%; height:170px; overflow:hidden;">
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_63294309636169478381.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_65230923876927892749.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_47696149250903212369.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_12701270347810987030.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_32543050189252323630.JPG" alt="2010年12月26日佳音网交友活动-会员介绍" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动-会员介绍</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_23456181612307816169.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_65230923876927892749.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_09630367058341892327.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_65212947614961470721.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_98985658729418747254.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_32543050189252323630.JPG" alt="2010年12月26日佳音网交友活动-会员介绍" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动-会员介绍</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_29854327874961212505.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_85432987452345014163.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_58327818943218327894.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_98985658729418747254.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_29892509414749010569.JPG" alt="2010年12月26日佳音网交友活动个人介绍" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动个人介绍</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_98947498185232325830.JPG" alt="2010年12月26日佳音网交友活动" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_01616589674165292723.JPG" alt="2010年12月26日佳音网交友活动现场-游戏环节" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场-游戏环节</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_41270305012383676769.JPG" alt="2010年12月26日佳音网交友活动会员才艺展示" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动会员才艺展示</a> </div>
                <div class="imgshow"> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank"><img src="http://www.jiayinzh.com/up/photo/10/1227/s_26_12701270347810987030.JPG" alt="2010年12月26日佳音网交友活动现场" border="0" class="img" /></a> <a href="http://www.jiayinzh.com/group/partyphoto.php?fid=17" target="_blank">2010年12月26日佳音网交友活动现场</a> </div>
              </div>
      <div id="demo2"></div>
    </div>
      <script> 
var speed=20
var demo1 = document.getElementById("demo1");
var demo2 = document.getElementById("demo2");
var demo = document.getElementById("demo");

demo2.innerHTML=demo1.innerHTML 
function Marquee(){ 
if(demo2.offsetWidth-demo.scrollLeft<=0) 
demo.scrollLeft-=demo1.offsetWidth 
else{ 
demo.scrollLeft++ 
} 
} 
var MyMar=setInterval(Marquee,speed) 
demo.onmouseover=function() {clearInterval(MyMar)} 
demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)} 
</script></td>
  </tr>
  <tr>
  <td colspan="2" height="1"><img src="sun_images/h_bottom_line.jpg" /></td>
  </tr>
</table>  

<!-- 第一方正   孙德猛注释掉的 -->
<div class="main1">
<div class="left">
<div class="advsearch">
<div class="adv">
<span id="zeai_yzlove_FAD"></span>
<script type="text/javascript">
ZeaiAd('zeai_yzlove_FAD',focus_ly,focus_width,swf_height,pics,links,texts);
</script>	
</div>

<div class="search">
<form method=get action="user/searchlist.php" name=yzlove>
<div class="sli1">
<select name="sex" class=selw>
<option value="2">找女朋友</option>
<option value="1">找男朋友</option>
<option value="">男女不限</option>
</select>
<select name="kind" class=selw>
<option value="">不限</option>
<option value="1">都可以</option>
<option value="2">约会交友</option>
<option value="3" selected="selected">婚姻恋爱</option>
<option value="4">红尘知已</option>
<option value="5">以商会友</option>
</select>
<select name="birthday1" class=selwx><option value="">不限</option><?php for($i=18;$i<=70;$i++) {?><option value="<?php echo $i; ?>"<?php if ($i == 22)echo 'selected'; ?>><?php echo $i; ?> 岁</option><?php }?></select> 到 <select name="birthday2" class=selwx><option value="">不限</option><?php for($i=18;$i<=70;$i++) {?><option value="<?php echo $i;?>"<?php if ($i == 40)echo 'selected'; ?>><?php echo $i; ?> 岁</option><?php }?>
</select></div>
<div class="sli2"><img src="images/zoomx.gif" hspace="4" align="absmiddle" /><a href="user/search.php">高级搜索</a></div>
<div class="sli1">
<select name="province" class=selw>
<option value="" selected="selected">地区不限</option>
<option value=安徽>安徽</option>
<option value=北京>北京</option>
<option value=重庆>重庆</option>
<option value=福建>福建</option>
<option value=甘肃>甘肃</option>
<option value=广东>广东</option>
<option value=广西>广西</option>
<option value=贵州>贵州</option>
<option value=海南>海南</option>
<option value=河北>河北</option>
<option value=黑龙江>黑龙江</option>
<option value=河南>河南</option>
<option value=香港>香港</option>
<option value=湖北>湖北</option>
<option value=湖南>湖南</option>
<option value=江苏>江苏</option>
<option value=江西>江西</option>
<option value=吉林>吉林</option>
<option value=辽宁>辽宁</option>
<option value=澳门>澳门</option>
<option value=内蒙古>内蒙古</option>
<option value=宁夏>宁夏</option>
<option value=青海>青海</option>
<option value=山东>山东</option>
<option value=上海>上海</option>
<option value=山西>山西</option>
<option value=陕西>陕西</option>
<option value=四川>四川</option>
<option value=台湾>台湾</option>
<option value=天津>天津</option>
<option value=新疆>新疆</option>
<option value=西藏>西藏</option>
<option value=云南>云南</option>
<option value=浙江>浙江</option>
<option value=海外>海外</option>
</select> <input name="photo" type="checkbox" value="1" checked="checked" id="ifphoto" /><label for="ifphoto">有照片</label > <input name="video" type="checkbox" value="1" id="ifvideo" /><label for="ifvideo">有视频</label>
<input name="s" type="checkbox" id="sgrade" value="2" checked="checked" /><label for="sgrade">高级会员优先</label>
</div>
<div class="sli2"><input type="image" src="images/so.gif"></div>
<div class="clear"></div>
</form>
</div>
</div>
<div class="ask">
<div class="title"><a href="<?php echo $Global['my_2domain'];?>/?h_ask.php?submitok=add" class="ub9_800040">发布</a>　<a href="clinic" class="ub9_800040">更多</a></div>
<?php
$rt=$db->query("SELECT id,title,ifopen FROM ".__TBL_ASK__." WHERE flag>0 AND ifjh=1 ORDER BY id DESC LIMIT 8");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$rows = $db->fetch_array($rt);
$id=$rows[0];$title=badstr($rows[1]);$ifopen=$rows[2];
if ($ifopen == 0){
$href = "clinic/detail$id.html";
} else {
$href = $Global['home_2domain']."/ask$id.html";
}
?>
<div class="jh"><h4><a href="<?php echo $href;?>" target="_blank"><?php echo $title; ?></a></h4></div>
<ul>
<?php 
$total = $db->num_rows($rt);
for($i=1;$i<$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
if ($i % 2 == 0 && $i != $total){$liclass = ' class=libg';} else {$liclass = '';}
$id=$rows[0];$title=badstr($rows[1]);$ifopen=$rows[2];
if ($ifopen == 0){
$href = "clinic/detail$id.html";
} else {
$href = $Global['home_2domain']."/ask$id.html";
}
echo "<li$liclass>·<a href=$href target=_blank>".$rows[1]."</a></li>";
}?>
</ul>
<?php }?>
</div>
</div>
<div class="right">
<div class="partyT">
<div class="partyT0 partyTWH" id="p1" onmouseover="doparty(this)"><a href="party">交友活动</a></div>
<div class="partyT0 partyTWH" id="p2" onmouseover="doparty(this)"><a href="dating">约会1+1</a></div>
<div class="partyT0 partyTWH" id="p3" onmouseover="doparty(this)"><a href="user/searchlist.php?t=2">最新会员</a></div>
<div class="partyT0 partyTWH" id="p4" onmouseover="doparty(this)" style="margin:0"><a href="news.php">本站公告</a></div>
</div>
<div class="partyC">
<div id="pp1"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div id="pp2"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div id="pp3"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div id="pp4"><h6><img src="images/loading.gif" /> Loading...</h6></div>

</div>
</div>



</div>

<br style="line-height:0"/> 

<!-- 第2方正 
<div class="main2">
	<div class="left">
		<div class="title">
			<div class="userJJT1" id="u1" onmouseover="doindexuser(this)" title="点击查看更多交友目的为“婚姻恋爱”的会员"><a href=user target=_blank>征婚榜</a></div>
			<div class="nbsp10"></div>
			<div class="userJJ0" id="u2" onmouseover="doindexuser(this)" title="点击查看更多交友目的为“约会交友”的会员"><a href=user/?k=2 target=_blank>约会交友</a></div>
			<div class="userJJ0" id="u3" onmouseover="doindexuser(this)" title="点击查看更多交友目的为“红尘知己”的会员"><a href=user/?k=4 target=_blank>红尘知己</a></div>
			<div class="userJJ0" id="u4" onmouseover="doindexuser(this)" title="点击查看更多交友目的为“以商会友”的会员"><a href=user/?k=5 target=_blank>以商会友</a></div>
			<div class="userJJ0" id="u5" onmouseover="doindexuser(this)" title="点击查看更多交友目的为“都可以”的会员" style="letter-spacing:4px"><a href=user/?k=1 target=_blank>都可以</a></div>
			<div class="nbsp116"></div>
			<div class="userJJ0"><span>+ </span><a href=user>更多会员</a></div>
			<div class="rj"><img src="images/main2_rj.gif" /></div>
		</div>
		<div class="content">
			<div class="uu" id="uu1">
				<div class="sexselect">
					<div class="yzlove1"><a href="user/?k=3&s=4"><img src="images/yzlove1.gif" title="显示更多女士征婚" border="0" /></a>　<a href="user/?k=3&s=3"><img src="images/yzlove2.gif" title="显示更多男士征婚" border="0" /></a></div>
					<div class="yzlove2">( 只显示有照片会员 )　<a href="<?php echo $Global['my_2domain'].'/?k_bidding.php'; ?>">我也要在这里显示</a></div>
				</div>
				<?php
				$sexxx = ($cook_sex == 1 || empty($cook_sex))?" AND sex=2 ":" AND sex=1 ";
				$Tfield = "id,nickname,grade,sex,birthday,love,kind,area1,area2,photo_s,video_s,heigh,weigh,house,car,edu,job,pay,ifphoto,ifbirthday,ifedu,iflove,ifpay,zhenghun_jingjia ";
				$tmpsql = "SELECT $Tfield FROM ".__TBL_MAIN__." WHERE kind=3 AND flag=1 AND photo_s<>'' $sexxx ORDER BY zhenghun_jingjia DESC,logintime DESC LIMIT 6";
				$rt=$db->query($tmpsql);
				if (!$db->num_rows($rt)){
					echo '<h6>暂无信息</h6>';
				} else {
					require_once YZLOVE.'sub/fundata.php';
					$data = new yzlove_data;
					$total = $db->num_rows($rt);
					for($i=1;$i<=$total;$i++) {
						$rows = $db->fetch_array($rt);
						if(!$rows) break;
						$uid = $rows['id'];
						$id = $uid*7+8848;
						$nickname = $rows['nickname'];
						$grade = $rows['grade'];
						$sex = $rows['sex'];
						$birthday = $rows['birthday'];
						$love = $rows['love'];
						$kind = $rows['kind'];
						$area1 = $rows['area1'];
						$area2 = $rows['area2'];
						$photo_s = $rows['photo_s'];
						$video_s = $rows['video_s'];
						$heigh = $rows['heigh'];
						$weigh = $rows['weigh'];
						$house = $rows['house'];
						$car = $rows['car'];
						$edu = $rows['edu'];
						$job = $rows['job'];
						$pay = $rows['pay'];
						$ifphoto = $rows['ifphoto'];
						$ifbirthday = $rows['ifbirthday'];
						$ifedu = $rows['ifedu'];
						$iflove = $rows['iflove'];
						$ifpay = $rows['ifpay'];
						$zhenghun_jingjia = $rows['zhenghun_jingjia'];
						$tmpx = 0;
						if ($ifphoto == 1)$tmpx = $tmpx+1;
						if ($ifbirthday == 1)$tmpx = $tmpx+1;
						if ($ifedu == 1)$tmpx = $tmpx+1;
						if ($iflove == 1)$tmpx = $tmpx+1;
						if ($ifpay == 1)$tmpx = $tmpx+1;
						if ($zhenghun_jingjia > 0){
							$href = 'bidderuser'.$id.'.html';
						} else {
							$href = $Global['home_2domain'].'/'.$uid;
						}
				?>
				<div class="frame">
					<div class="L"><a href=<?php echo $href; ?> target=_blank><?php if (empty($photo_s)){?><img src=<?php echo $Global['www_2domain'];?>/images/nopic<?php echo $sex; ?>.gif title="暂无照片"><?php } else {?><img src=<?php echo $Global['up_2domain'];?>/photo/<?php echo $photo_s; ?>  title="<?php echo $nickname.'的照片'; ?>"><?php }?></a></div>
					<div class="R">
						<div class="top"><?php geticon($sex.$grade);echo '<a href='.$href.' target=_blank>'.badstr($nickname).'</a>';
if ($tmpx > 0){echo ' ( ';
echo '<a href='.$Global['my_2domain'].'/?k_sfz.php>';
for($x2=1;$x2<=$tmpx;$x2++) {
	echo "<image src=images/sfz_x.gif align=absmiddle vspace=5 title='实名认证星级：当前".$tmpx."星，共5星'>";
}echo '</a>';if ($tmpx > 0)echo ' )';}
?></div>
						<div class="middle"><?php echo $data->getbirthday($birthday); ?>，<?php echo $data->getlove($love); ?>，<?php if ($heigh > 140)echo $heigh.'厘米，';?><?php if ($weigh > 20)echo $weigh.'公斤，'; ?><?php echo $area1.$area2; ?>，<?php $tmphouse = $data->gethouse($house);if (!empty($tmphouse))echo $tmphouse.'，'; ?><?php $tmpcar = $data->getcar($car);if (!empty($tmpcar))echo $tmpcar.'，'; ?><?php $tmpedu = $data->getedu($edu);if (!empty($tmpedu))echo $tmpedu.'，'; ?><?php $tmppay = $data->getpay($pay);if (!empty($tmppay))echo $tmppay.'，'; ?><?php $tmpjob = $data->getjob($job);if (!empty($tmpjob))echo $tmpjob.'，'; ?>交友目的为<?php echo $data->getkind($kind);?></div>
						<div class="bottom">+ <a href=<?php echo $href;?> target=_blank>查看详细</a></div>
					</div>
				</div>
				<?php }?>
				<?php }?>
			</div>
			<div class="uu" id="uu2"><h6><img src="images/loading.gif" /> Loading...</h6></div>
			<div class="uu" id="uu3"><h6><img src="images/loading.gif" /> Loading...</h6></div>
			<div class="uu" id="uu4"><h6><img src="images/loading.gif" /> Loading...</h6></div>
			<div class="uu" id="uu5"><h6><img src="images/loading.gif" /> Loading...</h6></div>
		</div>
	</div>
	<div class="right">
		<div class="adv"><span id="AD1"></span><script language="JavaScript">zeai_getbyid('AD1').innerHTML = AD1;</script></div>
		<div class="diaryT">
			<div class="diaryT1 diaryTWH" id="d1" onmouseover="dodiary(this)"><a href="diary">最新日记</a></div>
			<div class="diaryT0 diaryTWH" id="d2" onmouseover="dodiary(this)"><a href="diary/?t=1">精品日记</a></div>
			<div class="diaryT0 diaryTWH" id="d3" onmouseover="dodiary(this)" title="最近一个月按回复排序"><a href="diary/?t=2">焦点日记</a></div>
			<div class="diaryT0 diaryTWH" id="d4" onmouseover="dodiary(this)" style="margin:0" title="最近一个月按人气排序"><a href="diary/?t=3">热点日记</a></div>
		</div>
		<div class="diaryC">
			<div class="dd" id="dd1">
				<?php 
				$rt=$db->query("SELECT id,title,addtime FROM ".__TBL_DIARY__." WHERE flag=1 AND diaryopen=1 ORDER BY id DESC LIMIT 9");
				if (!$db->num_rows($rt)){
					echo '<h6>暂无信息</h6>';
				} else {
					$total = $db->num_rows($rt);
					for($i=1;$i<=$total;$i++) {
						$rows = $db->fetch_array($rt);
						if(!$rows) break;
				?>
				<div class="li1"><img src="images/lid.gif" />　<a href=<?php echo $Global['home_2domain'].'/diary'.$rows[0].'.html'; ?> target=_blank title="<?php echo badstr(htmlout(stripslashes($rows[1]))); ?>"><?php echo gylsubstr(badstr(htmlout(stripslashes($rows[1]))),32); ?></a></div>
				<div class="li2"><?php echo date_format2($rows[2],'%Y-%m-%d');?></div>
				<?php }}?>
			</div>
			<div class="dd" id="dd2"><h6><img src="images/loading.gif" /> Loading...</h6></div>
			<div class="dd" id="dd3"><h6><img src="images/loading.gif" /> Loading...</h6></div>
			<div class="dd" id="dd4"><h6><img src="images/loading.gif" /> Loading...</h6></div>
		</div>
		<div class="diaryB">
			<div class="box">
				<a href="my/?f_diary.php?submitok=list">我的日记</a>　|　<a href="my/?f_diary.php?submitok=add">我要发表</a>　|　<a href="diary">查看更多</a>
			</div>
		</div>
		<div class="adv2"><span id="AD2"></span><script language="JavaScript">zeai_getbyid('AD2').innerHTML = AD2;</script></div>
	</div>
</div>
-->
<!-- 第3方正
<div class="main3">
<div class="left">
<div class="title">
<div class="groupJJT1" id="g1" onmouseover="doindexgrpup(this)"><a href=<?php echo $Global['group_2domain'].'/grouplist.php'; ?> target=_blank>圈子榜</a></div>
<div class="nbsp10"></div>
<div class="groupJJ0" id="g2" onmouseover="doindexgrpup(this)"><a href=<?php echo $Global['group_2domain'].'/grouplist.php?t=2'; ?> target=_blank>最新创建</a></div>
<div class="groupJJ0" id="g3" onmouseover="doindexgrpup(this)"><a href=<?php echo $Global['group_2domain'].'/grouplist.php?t=3'; ?> target=_blank>成员最多</a></div>
<div class="groupJJ0" id="g4" onmouseover="doindexgrpup(this)"><a href=<?php echo $Global['group_2domain'].'/grouplist.php?t=4'; ?> target=_blank>帖子排行</a></div>
<div class="groupJJ0" id="g5" onmouseover="doindexgrpup(this)"><a href=<?php echo $Global['group_2domain'].'/grouplist.php?t=5'; ?> target=_blank>人气排行</a></div>
<div class="nbsp116"></div>
<div class="groupJJ0"><span>+ </span><a href=<?php echo $Global['group_2domain']; ?>>更多圈子</a></div>
<div class="rj"><img src="images/main2_rj.gif" /></div>
</div>
<div class="content">
<div class="gg" id="gg1">
<?php 
//$rt=$db->query("SELECT id,title,qgrade,allusrnum FROM ".__TBL_GROUP_MAIN__." WHERE flag=1 AND jjpmprice>0 AND qloveb>0 ORDER BY jjpmprice DESC,id DESC LIMIT 15");
$rt=$db->query("SELECT id,title,qgrade,allusrnum FROM ".__TBL_GROUP_MAIN__." WHERE flag=1 ORDER BY jjpmprice DESC,id DESC LIMIT 15");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$total = $db->num_rows($rt);
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$mainid = $rows[0]*7+8848;
?>
<li><img src="images/groupico.gif" align="absmiddle" /> <a href=<?php echo 'biddergroup'.$mainid.'.html'; ?> target=_blank<?php if ($rows[2] > 3)echo ' class=grade';?>><?php echo $rows[1]; ?></a> (<span><?php echo $rows[3]; ?></span>人)</li>
<?php }}?>
</div>
<div class="gg" id="gg2"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div class="gg" id="gg3"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div class="gg" id="gg4"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div class="gg" id="gg5"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<ul>
<li><span id="AD4"></span><script language="JavaScript">zeai_getbyid('AD4').innerHTML = AD4;</script></li>
<li><span id="AD5"></span><script language="JavaScript">zeai_getbyid('AD5').innerHTML = AD5;</script></li>
<li><span id="AD6"></span><script language="JavaScript">zeai_getbyid('AD6').innerHTML = AD6;</script></li>
<li><span id="AD7"></span><script language="JavaScript">zeai_getbyid('AD7').innerHTML = AD7;</script></li>
<li><span id="AD8"></span><script language="JavaScript">zeai_getbyid('AD8').innerHTML = AD8;</script></li>
</ul>
<div class="clear"></div>
<div class="wzbox wzbox1"></div>
<div class="wzbox wzbox2">
<div class="wzT">
<div class="wzTl"><img src="images/group_t_d.gif" /></div>
<div class="wzTm">最新话题</div>
<div class="wzTr"><a href=<?php echo $Global['group_2domain'].'/articlelist.php?t=2'; ?> target="_blank"><img src="images/group_t_more.gif" border="0" /></a></div>
<div class="clear"></div>
</div>
<div class="wzC"><?php 
$rt=$db->query("SELECT id,title,addtime FROM ".__TBL_GROUP_WZ__." WHERE flag=1 ORDER BY id DESC LIMIT 5");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$total = $db->num_rows($rt);
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
?>
<div class="wzli1"><a href=<?php echo $Global['group_2domain'].'/read'.$rows[0].'.html'; ?> target=_blank><?php echo badstr(htmlout(stripslashes($rows[1]))); ?></a></div>
<div class="wzli2"><?php echo date_format2($rows[2],'%Y-%m-%d');?></div>
<?php }}?>

</div>
</div>
<div class="wzbox wzbox3"></div>
<div class="wzbox wzbox4">
<div class="wzT">
<div class="wzTl"><img src="images/group_t_d.gif" /></div>
<div class="wzTm">推荐话题</div>
<div class="wzTr"><a href=<?php echo $Global['group_2domain'].'/articlelist.php'; ?> target="_blank"><img src="images/group_t_more.gif" border="0" /></a></div>
<div class="clear"></div>
</div>
<div class="wzC">
<?php 
$rt=$db->query("SELECT id,title,userid,nicknamesexgradephoto_s FROM ".__TBL_GROUP_WZ__." WHERE flag=1 AND ifjh=1 ORDER BY id DESC LIMIT 5");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$total = $db->num_rows($rt);
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$tmpnickname = explode("|",$rows['nicknamesexgradephoto_s']);
$sexcolor = $tmpnickname[1];
if ($sexcolor == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
?>
<div class="wzli3"><a href=<?php echo $Global['group_2domain'].'/read'.$rows[0].'.html'; ?> target=_blank><?php echo gylsubstr(badstr(htmlout(stripslashes($rows[1]))),34); ?></a> |<?php

echo "<a href=".$Global['home_2domain']."/".$rows[2]." target=_blank><span$sexcolor>".$tmpnickname[0]."</span></a>";
?>
</div>
<?php }}?>
</div>
</div>
<div class="wzbox wzbox3"></div>
</div>
</div>
<div class="right">
<div class="storyT">
<div class="storyT1 storyTWH" id="s1" onmouseover="dostory(this)"><a href="story">成功故事</a></div>
<div class="storyT0 storyTWH" id="s2" onmouseover="dostory(this)"><a href="news.php?kind=2">恋爱宝典</a></div>
<div class="storyT0 storyTWH" id="s3" onmouseover="dostory(this)"><a href="news.php?kind=3">婚姻法规</a></div>
<div class="storyT0 storyTWH" id="s4" onmouseover="dostory(this)" style="margin:0"><a href="help">联系客服</a></div>
</div>
<div class="storyC">
<div class="ss" id="ss1">
<?php 
$rt=$db->query("SELECT id,title,bbsnum FROM ".__TBL_STORY__." WHERE flag=1 ORDER BY ifjh DESC,id DESC LIMIT 8");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$total = $db->num_rows($rt);
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$storyid = $rows[0];
$title = $rows[1];
$bbsnum = $rows[2];
?>
<div class="li1"><img src="images/storyX.gif" hspace="3" /> <a href=<?php echo'story/detail'.$storyid.'.html'; ?> target=_blank><?php echo stripslashes($title); ?></a></div><div class="li2" title="共收到网友的祝福"><span><?php echo $bbsnum; ?></span>个祝福</div>
<?php }}?>
</div>
<div class="ss" id="ss2"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div class="ss" id="ss3"><h6><img src="images/loading.gif" /> Loading...</h6></div>
<div class="ss" id="ss4"><h6><img src="images/loading.gif" /> Loading...</h6></div>
</div>
<div class="storyB">
<div class="box">
<a href="my/?g_story.php?submitok=list">我的故事</a>　|　<a href="my/?g_story.php?submitok=add">上传故事</a>　|　<a href="story">更多故事</a>
</div>
</div>
<div class="adv"><span id="AD3"></span><script language="JavaScript">zeai_getbyid('AD3').innerHTML = AD3;</script></div>

</div>
</div> -->
<!-- 第4方正
<div class="main4">
<div class="left">
<div class="title">
<div class="t1"><img src="images/main4_lj.gif" /></div>
<div class="t2"><a href="video">最新视频</a></div>
<div class="t3"><span>+ </span><a href="video">更多视频</a></div>
<div class="t4"><img src="images/main4_rj.gif" /></div>
</div>
<div class="content">
<?php 
$rt=$db->query("SELECT id,title,path_s FROM ".__TBL_VIDEO__." WHERE flag=1 AND userid<>41074 ORDER BY id DESC LIMIT 5");
if (!$db->num_rows($rt)){
echo '<h6>暂无信息</h6>';
} else {
$total = $db->num_rows($rt);
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$id = $rows[0];
$title = $rows[1];
$path_s = $rows[2];
?>
<div class="box">
<div class="C"><a href="<?php echo $Global['home_2domain'];?>/v<?php echo  $id.'.html';?>" target="_blank"><img src=<?php echo $Global['up_2domain'];?>/<?php echo $Global['m_flvpath'].'/'.$path_s; ?>></a></div>
<div class="T"><a href=<?php echo $Global['home_2domain'].'/v'.$id.'.html'; ?> target=_blank><?php echo stripslashes($title); ?></a></div>
</div>
<?php }}?>	
</div>
</div>
<div class="right">
<div class="onlineT">
<div class="onlineT1 onlineTWH"><a href="user/online.php">在线之星</a></div>
<div class="onlineT0 onlineTWH"><a href="user/online.php">查看更多</a></div>
<div class="onlineTWH num">当前在线 <a href="user/online.php" title="含游客和隐身会员，点击查看全部在线会员">
<?php 
require_once YZLOVE.'sub/online.php';
$online = new online_yzlove;
$online->chk();
$online->num();
?></a> 人</div>
</div>
<div class="onlineC">
<div class="C">
<?php 
$rt=$db->query("SELECT a.userid,b.username,b.sex FROM ".__TBL_ONLINE__." a,".__TBL_MAIN__." b WHERE a.rnd=0 AND a.userid=b.id ORDER BY a.actiontime DESC LIMIT 20");
$total = $db->num_rows($rt);
if($total>0){
for($i=1;$i<=$total;$i++) {
$rows = $db->fetch_array($rt);
if(!$rows) break;
$sexcolor = $rows[2];
if ($sexcolor == 1){$sexcolor=' class=lan';}else{$sexcolor=' class=hong';}
?>
<a href=<?php echo $Global['home_2domain'];?>/<?php echo $rows[0];?> <?php echo $sexcolor; ?> target=_blank><?php echo stripslashes($rows[1]);?></a> <?php if ($i != $total)echo '|'; ?> 
<?php }}?>
</div>
</div>
</div>
</div>
-->
<?php require_once YZLOVE.'links.html';?>
<?php require_once YZLOVE.'bottom.php';?>