function getObject(objectId) {
     if(document.getElementById && document.getElementById(objectId)){return document.getElementById(objectId);} 
     else if (document.all && document.all(objectId)){
       return document.all(objectId);
     }else if (document.layers && document.layers[objectId]){return document.layers[objectId];}else{return false;}
}
function CreateXMLHttpRequest(){
var xmlHttp;
if (window.XMLHttpRequest){
xmlHttp = new XMLHttpRequest();
} 
else if (window.ActiveXObject)   {
try
{
xmlHttp = new ActiveXObject("Msxml2.XMLHTTP.3.0");
}catch (e){
try
{
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch(e){
newsstring = "对不起，您的浏览器不支持XMLHttpRequest对象！";}
}}
return xmlHttp;
}
function getDataTimes(){
	var strDate,strTime;
	strDate = new Date();
	strTime = strDate.getTime();
	return strTime;
}
function SendMess(){
	var mess = document.getElementById('mess').value;
	var uarray = document.getElementById('uarray').value;
	var mfont = document.getElementById('mfont').value;
	var mfcolor = document.getElementById('mfcolor').value;
	var elist = document.getElementById('elist').value;
	if (trim(mess)==""){
	alert("不能发空信息！");
	document.getElementById('mess').value="";
	document.getElementById('mess').focus();
	return false;
	}
	var url="sendmess.php?mess="+mess+"&uarray="+uarray+"&mfont="+mfont+"&mfcolor="+mfcolor+"&elist="+elist;
	var xmlHttp=CreateXMLHttpRequest();
    xmlHttp.open("get",url,true);
    xmlHttp.send(null);  
	document.getElementById('mess').value="";
	document.getElementById('elist').value="";
}
function ShowMess(uarray){
	var uarray;
	var url="mess.php?uarray="+uarray;
	var requestType = "mess_box";
	var xmlHttp=CreateXMLHttpRequest();
    xmlHttp.open("GET",url,true);
	xmlHttp.onreadystatechange = function(){
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
			var oScroll=document.getElementById(requestType);
			getObject(requestType).innerHTML += xmlHttp.responseText;
			var scrollDown = (oScroll.scrollHeight - oScroll.scrollTop > oScroll.offsetHeight  );
			oScroll.scrollTop = scrollDown ? oScroll.scrollHeight : oScroll.scrollTop;
		}
	}
	xmlHttp.setRequestHeader("If-Modified-Since","0");
    xmlHttp.send(null); 
}
function getmess(uarray){
	var uarray;
	window.setInterval("ShowMess('"+uarray+"')",1000);	
}
function clearAllFormat(sTxt) {
	var c = sTxt.replace(/\n/ig, "");
	//var c = sTxt;
	c = c.replace(/<script.*?>.*?<\/scrip[^>]*>/ig,"");
	c = c.replace(/<[^>]*?javascript:[^>]*>/ig,"");
	c = c.replace(/<style.*?>.*?<\/styl[^>]*>/ig,"");
	c = c.replace(/<\/?(div|code|h\d)[^>]*>/ig,'<br>');
	c = c.replace(/<\/?(span|form|input|select|textarea|iframe|SUB|SUP|table|tr|th|td|tbody|module|OPTION|onload|bgsound|font)(\s[^>]*)?>/ig,"");
	c = c.replace(/<\?xml[^>]*>/ig,'');
	c = c.replace(/<\!--.*?-->/ig,'');
	c = c.replace(/<(\w[^>]*) class=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onerror="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onload="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onmouseover="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) style="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<\\?\?xml[^>]*>/ig, "");
	c = c.replace(/<\/?\w+:[^>]*>/ig, "");
	c = c.replace(/<img.*?src=([^ |>]*)[^>]*>/ig,"<img src=$1 border=0>");
	c = c.replace(/<a.*?href="([^"]*)"[^>]*>/ig,"<a href=\"$1\">");
	c = c.replace(/<center>\s*<center>/ig, '<center>');
	c = c.replace(/<\/center>\s*<\/center>/ig, '</center>');
	c = c.replace(/<center>/ig, '<center>');
	c = c.replace(/<\/center>/ig, '</center>');
	sTxt = c;
	return sTxt;
}
function savechat(){
	var savetext = getObject("mess_box").innerHTML;
	savetext = clearAllFormat(savetext);
	location.href="save.php?savetext="+savetext;
}
function getWidth()
{
    var strWidth,clientWidth,bodyWidth;
    clientWidth = document.documentElement.clientWidth;
    bodyWidth = document.body.clientWidth;
    if(bodyWidth > clientWidth){
        strWidth = bodyWidth + 20;
    } else {
        strWidth = clientWidth;
    }
    return strWidth;
}
function getHeight()
{
    var strHeight,clientHeight,bodyHeight;
    clientHeight = document.documentElement.clientHeight;
    bodyHeight = document.body.clientHeight;
    if(bodyHeight > clientHeight){
        strHeight = bodyHeight + 30;
    } else {
        strHeight = clientHeight;
    }
    return strHeight;
}
function showScreen()
{
    var Element = getObject('Message');
    var Elements = getObject('Screen');
    Elements.style.width = getWidth();
    Elements.style.height = getHeight();
    Element.style.display = 'block';
    Elements.style.display = 'block';
	getObject('mfont').disabled   =   true;  
	getObject('mfcolor').disabled   =   true;
	getObject('elist').disabled   =   true;
}
function hideScreen()
{
    var Element = getObject('Message');
    var Elements = getObject('Screen');
    Element.style.display = 'none';
    Elements.style.display = 'none';
	getObject('mfont').disabled   =   false;  
	getObject('mfcolor').disabled   =   false;
	getObject('elist').disabled   =   false;

}
function trim(s){
	return s.replace(/(^\s+)|(\s+$)/g,"")
}
document.onkeydown=function()
{
if ((window.event.keyCode==116)|| //屏蔽 F5
(window.event.keyCode==122)|| //屏蔽 F11
(window.event.shiftKey && window.event.keyCode==121) //shift+F10
)
{ 
window.event.keyCode=0;
window.event.returnValue=false;
} 
if ((window.event.altKey)&&(window.event.keyCode==115)){ //屏蔽Alt+F4
window.showModelessDialog("about:blank","","dialogWidth:1px;dialogheight:1px");
return false;
}}
if (window.Event) 
document.captureEvents(Event.MOUSEUP); 
function nocontextmenu(){ 
event.cancelBubble = true 
event.returnValue = false; 
return false; 
} 
function norightclick(e){ 
if (window.Event){ 
if (e.which == 2 || e.which == 3) 
return false; 
} 
else 
if (event.button == 2 || event.button == 3){ 
event.cancelBubble = true 
event.returnValue = false; 
return false; 
} } 
document.oncontextmenu = nocontextmenu; // for IE5+ 
document.onmousedown = norightclick; // for all others  