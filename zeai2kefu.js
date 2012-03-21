lastScrollY=0;
function heartBeat(){ 
var diffY;
if (document.documentElement && document.documentElement.scrollTop)
    diffY = document.documentElement.scrollTop;
else if (document.body)
    diffY = document.body.scrollTop
else
    {/*Netscape stuff*/}
    
//alert(diffY);
percent=.1*(diffY-lastScrollY); 
if(percent>0)percent=Math.ceil(percent); 
else percent=Math.floor(percent); 
document.getElementById("lovexin12").style.top=parseInt(document.getElementById("lovexin12").style.top)+percent+"px";

lastScrollY=lastScrollY+percent; 
//alert(lastScrollY);
}
suspendcode12="<DIV id=\"lovexin12\" style='right:12px;POSITION:absolute;TOP:350px;z-index:100'>";
var recontent='<table align="left" style="margin-right:12px;width:90px" border="0" cellpadding=0 cellspacing=0 height="32">' + 
'<tr>' + 
'<td style="padding:0;font-size:13px" height="32" ><table style="width:90px" border="0" cellspacing="0" cellpadding="0" height="1">' + 
'<tr>' + 
'<td style="padding:0;font-size:13px; background:none" height="20"><img src="images/kefu/head_103185.gif"  border="0" style="margin:0px; padding:0px;" usemap="#MapMapMap"></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;font-size:13px;padding-left:1px" background="images/kefu/center_1_103185.gif" height="19">' + 
'<table style="width:90px"  border="0" align="center" cellpadding="0" cellspacing="0" height="1">' + 
'<tr>' + 
'<td style="padding:0;background:#FFFFFF;font-size:13px" height="6"></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;background:#FFFFFF;font-size:13px" height="39">' + 
'<table  border="0" align="left" cellpadding="0" cellspacing="0" style="width:90px">' + 
'<!--begin-->' + 
'<tr>' + 
'<td align="left" width="10" height=20><img src="images/kefu/8_online.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=QQºÅ&Site=ÍøÕ¾Ãû³Æ&Menu=yes"><span style="text-decoration:underline;font-family:ËÎÌå;font-size:12px;color:#FF00FF;text-align:left">Éý¼¶×ÉÑ¯</span>' + 
'</td>' + 
'</tr>' + 
'<tr>' + 
'<td align="left" width="10" height=20><img src="images/kefu/8_online.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=QQºÅ&Site=ÍøÕ¾Ãû³Æ2&Menu=yes"><span style="text-decoration:underline;font-family:ËÎÌå;font-size:12px;color:#FF00FF;text-align:left">ÍøÂçºìÄï</span>' + 
'</td>' + 
'</tr>' + 
'<tr>' + 
'<td align="left" width="10" height=20><img src="images/kefu/8_online.gif"></td>' + 
'<td style="background-color: bgcolor; background-repeat: repeat; background-attachment: scroll; padding: 0; background-position: 0%" height="24" align="left">' + 
'&nbsp;<a style="text-decoration:none;" href="tencent://message/?uin=QQºÅ&Site=ÍøÕ¾Ãû³Æ&Menu=yes"><span style="text-decoration:underline;font-family:ËÎÌå;font-size:12px;color:#FF00FF;text-align:left">ÉÌÎñÇ¢Ì¸</span>' + 
'</td>' + 
'</tr>' + 
'<!--end-->' + 
'</table></td>' + 
'</tr>' + 
'</table></td>' + 
'</tr>' + 
'<tr>' + 
'<td style="padding:0;font-size:13px" height="1"><img src="images/kefu/end_103185.gif" style="margin:0px; padding:0px;"></td>' + 
'</tr>' + 
'</table>' + 
'</td>' + 
'</tr>' + 
'</table>' + 
'<map name="MapMapMap" onclick="far_close()" style="cursor:handle">' + 
'<area shape="rect" coords="71,8,102,30" href="#" title="¹Ø±Õ">' + 
'</map>';

document.write(suspendcode12); 
document.write(recontent); 
document.write("</div>"); 
window.setInterval("heartBeat()",1);

function far_close()
{
	document.getElementById("lovexin12").innerHTML="";
}

function setfrme()
{
	var tr=document.getElementById("lovexin12");
	var twidth=tr.clientWidth;
	var theight=tr.clientHeight;
	var fr=document.getElementById("frame55la");
	fr.width=twidth-1;
	fr.height=theight-30;
}
//setfrme()
