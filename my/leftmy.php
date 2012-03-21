<?php if ( !ereg("^[0-9]{1,8}$",$_COOKIE['cook_userid']) || empty($_COOKIE['cook_userid'])){header("Location: ../login.php");exit;}
ob_start();
?>
<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css"> 
body{font-family:宋体;font-size:9pt;color:#333333;
SCROLLBAR-FACE-COLOR: #E1E1E1;/*拖条色*/
SCROLLBAR-TRACK-COLOR: #F2F2F2;/*拖条背景*/
SCROLLBAR-HIGHLIGHT-COLOR: #E1E1E1;/*拖条左上框色*/
SCROLLBAR-3DLIGHT-COLOR: #E1E1E1;/*阴影(左上)*/
SCROLLBAR-SHADOW-COLOR: #E1E1E1;/*拖条右下框色*/
SCROLLBAR-DARKSHADOW-COLOR: #878787;/*阴影(右下)*/
SCROLLBAR-ARROW-COLOR: #ffffff;/*小三角*/
}
a{text-decoration: none;color:#333333; font-family: 宋体}
a:hover{color:#6F9F00;text-decoration: none;} 
a.t{text-decoration:none;color:#810040}
a.t:hover{color:#BC2F75;position:relative;right:0px;top:1px} 
td{ FONT-SIZE: 9pt;color:#999999}
.td {FONT-SIZE: 12px; BACKGROUND-IMAGE: url(/images/1/35.gif); LINE-HEIGHT: 30px; FONT-STYLE: normal; HEIGHT: 30px}
.td2 {FONT-SIZE: 12px; BACKGROUND-IMAGE: url(/images/06/titlebg.gif); LINE-HEIGHT: 25px;}
.tblstyle{border-left:#F1BFD4 1px solid;border-right:#F1BFD4 1px solid;border-bottom:#F1BFD4 1px solid;}
</style>
<SCRIPT LANGUAGE="JScript">
function cancelLink() {
if (window.event.srcElement.tagName == "A" && window.event.shiftKey) 
window.event.returnValue = false;
}
</SCRIPT> 
<base target="main">
<SCRIPT LANGUAGE="JavaScript">
function expand(id){
Obj = eval(id);
if(Obj.style.display == 'none'){
Obj.style.display = 'block'
document.getElementById('d'+id).innerHTML = "<img src=images/b.gif>";
}else{
Obj.style.display = 'none'
document.getElementById('d'+id).innerHTML = "<img src=images/a.gif>";
}}
function gyl(){
//child0.style.display = 'none';
//child1.style.display = 'none'
//child2.style.display = 'none';
child3.style.display = 'none';
child4.style.display = 'none';
child5.style.display = 'none';
child6.style.display = 'none';
child7.style.display = 'none';
child8.style.display = 'none';
//child9.style.display = 'none';
document.getElementById("dchild0").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild1").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild2").innerHTML = "<img src=images/b.gif>";
document.getElementById("dchild3").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild4").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild5").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild6").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild7").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild8").innerHTML = "<img src=images/a.gif>";
document.getElementById("dchild9").innerHTML = "<img src=images/b.gif>";
}
</SCRIPT>
<base target="mainframe">
</HEAD>
<body onLoad="gyl()" bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgProperties=fixed oncontextmenu=self.event.returnValue=false onclick="cancelLink()">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td align="left" style="padding-left:5px;"><table width="150" height="31" border="0" cellpadding="0" cellspacing="0" background="images/left_top.gif" style="margin:0 0 1px 0">
<tr><td align="right" style="padding:8px 8px 0 0"><a href="mainmy.php" class="t">管理首页</a></td>
  <td width="2" align="center"><img src="images/e.gif" align="absmiddle"></td>
  <td align="left" style="padding:8px 0 0 8px"><a href="<?php echo $_COOKIE['home_2domain'].'/'.$_COOKIE['cook_userid']; ?>" target="_blank" class="t">我的主页</a></td>
</tr></table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr  style="CURSOR: hand" onClick="expand('child0');return">
<td width="16" align="right"><span id="dchild0"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的资料</b></td>
</tr></table></td></tr></table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child0' class="tblstyle">
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="a1.php" target="mainframe">基本资料</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_main.php" target="mainframe">形 象 照</a><img src="images/new.gif" width="28" height="11"></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a2.php" target="mainframe">详细资料</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="a3.php" target="mainframe">内心独白</a></td></tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="a4.php" target="mainframe">联系方法</a></td></tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a5.php">约会交友档案</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a6.php">婚姻恋爱档案</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a7.php">红尘知己档案</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" width="9" align="absmiddle" /><img src="images/none_normal.gif" align="absmiddle" /><a href="a8.php">以商会友档案</a></td>
</tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="a9.php">修改密码</a>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table></td>
</tr></table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child1');return">
<td width="16" align="right"><span id="dchild1"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>征友操作</b></td>
</tr></table></td></tr></table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child1'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="b_gbook.php?submitok=list">收 件 箱</a></td></tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_gbook2.php?submitok=list">发 件 箱</a></td></tr><tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_friend.php">我的好友</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_friend_news.php">好友动态</a><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="b_blacklist.php">黑 名 单</A><a href="b3.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_present.php?submitok=list">我的礼物</a><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_request.php">征友要求</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_user.php">速配结果</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="b_rand.php" target="_blank">弹出缘分</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="b_viewuser.php">最近访客</a>
  <table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table></td></tr></table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table><table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr><td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr  style="CURSOR: hand" onClick="expand('child2');return">
<td width="16" align="right"><span id="dchild2"></span></td><td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的相册</b></td>
</tr></table></td></tr></table><table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child2'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr><td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr></table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="c_photo_list.php">我的相册</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_up.php">上传照片</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="c_photo_dtt.php">在线拍照</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="c_photo_main.php">更新形象照</a><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child3');return">
<td width="16" align="right"><span id="dchild3"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的视频</b><img src="images/new.gif" width="28" height="11"></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child3'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="d_video_list.php">我的视频</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="d_video_record.php">录制视频</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="d_video_record.php">在线K歌</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="d_video_favorites.php">视频收藏</a></td>
</tr>
</table>

<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child4');return">
<td width="16" align="right"><span id="dchild4"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的约会</b><img src="images/new.gif" width="28" height="11"></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child4'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="e_dating_list.php">我的约会</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_add.php">发起约会</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_price.php">约会竞价排名</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="5"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="e_dating_join.php">赴约状态查询</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="e_dating_join.php">参加的约会</a></td>
</tr>
</table>

<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>


<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child5');return">
<td width="16" align="right"><span id="dchild5"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的日记</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child5'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><A href="f_diary.php?submitok=list">我的日记</A><a href="e1.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="f_diary.php?submitok=add">发表日记</A><a href="e2.php"></a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="f_diary_bbsed.php">我的评论</A><A href="b_diary_favorite.php"></A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="b_diary_bbsed.php"></A><a href="e7.php?submitok=list&kind=2"></a><A href="f_diary_favorite.php">日记收藏</A>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child6');return">
<td width="16" align="right"><span id="dchild6"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>成功故事</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child6'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="g_story.php?submitok=list">我的故事</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="g_story.php?submitok=add">发布故事</a></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
  </tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child7');return">
<td width="16" align="right"><span id="dchild7"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>爱情诊所</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child7'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask.php?submitok=list">我的病历</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask.php?submitok=add">挂号看病</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="h_ask_bbsed.php">开过的处方</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><a href="h_ask_favorite.php">病历收藏</a>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child8');return">
<td width="16" align="right"><span id="dchild8"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>我的圈子</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child8'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><A href="i_group.php">我的圈子</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_add.php">创建圈子</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_mylogin.php">加入的圈子</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="i_group_myblog.php">我的帖子</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="i_group_favorite.php">帖子收藏</A>
  <table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="76" height="8" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<table  width="150" height="24" border="0" cellpadding="0" cellspacing="0" background="images/22.gif" style="border:#F1BFD4 1px solid;">
<tr>
<td height="10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr  style="CURSOR: hand" onClick="expand('child9');return">
<td width="16" align="right"><span id="dchild9"></span></td>
<td style="padding-top:2px;color:#000000;padding-left:5px;"><b>其他服务</b></td>
</tr>
</table></td>
</tr>
</table>
<table  width="150" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" id='child9'class=tblstyle>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''" >
<td height="10"><table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" width="16" height="22" align="absmiddle" /><a href="k_myloveb.php">我的帐户</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_myloveb.php?submitok=list">消费清单</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_vip.php">会员升级</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_bidding.php">竞价排名</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="k_homepage.php">装扮主页</A><img src="images/new.gif" width="28" height="11"></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><A href="k_sfz.php">实名认证</A></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="k_getloveb.php">获取Love币</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
  <td height="10"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_normal.gif" alt=" " width="16" height="22" align="absmiddle" /><a href="../news.php" target="_blank">本站动态</a></td>
</tr>
<tr onMouseOver="this.style.background='#F0FAE9'" onMouseOut="this.style.background=''">
<td height="20"><img src="images/line_v.gif" alt=" " width="9" height="22" align="absmiddle" /><img src="images/none_end.gif" align="absmiddle" /><A href="<?php echo $Global['www_2domain']; ?>/help" target="_blank">客服中心</A>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td><img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" /></td>
</tr>
</table></td>
</tr>
</table>
<table width="150" height="10" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 20px 0">
<tr>
<td><img src="images/c.gif" alt=" " width="150" height="10" align="absmiddle" /></td>
</tr>
</table>
</td>
</tr>
</table>
<img src="images/line_v.gif" alt=" " width="9" height="5" align="absmiddle" />
</BODY>
</HTML>
<?php ob_end_flush();?>