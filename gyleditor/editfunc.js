var gSetColorType = ""; 
var gIsIE = document.all; 
var gIEVer = fGetIEVer();
var ev = null;
function fGetEv(e){
	ev = e;
}
function fGetIEVer(){
	var iVerNo = 0;
	var sVer = navigator.userAgent;
	if(sVer.indexOf("MSIE")>-1){
		var sVerNo = sVer.split(";")[1];
		sVerNo = sVerNo.replace("MSIE","");
		iVerNo = parseFloat(sVerNo);
	}
	return iVerNo;
}
function fSetEditable(){
	var f = window.frames["HtmlEditor"];
	f.document.designMode="on";
	if(!gIsIE)
		f.document.execCommand("useCSS",false, true);
}
function fSetFrmClick(){
	var f = window.frames["HtmlEditor"];
	f.document.onmousemove = function(){
		window.onblur();
	}
	f.document.onclick = function(){
		fHideMenu();
	}
}
window.onload = function(){
	fSetEditable();
	fSetFrmClick();
	//if(!gIsIE) fSetContent();
	//fSetContent();
}

function fSetContent(){
	var f = window.frames["HtmlEditor"];
	//alert(f);
	var foldmain = window.parent;
	var htext = foldmain.document.FORM.htext.value;
	var eBody = null;
	eBody = f.document.getElementsByTagName("BODY")[0];
	if(htext != "") 
		htext = "<br><br><br><br><br><br><br>" + htext;
	eBody.innerHTML = htext;
}
function fSetColor(){
	var dvForeColor =document.getElementById("dvForeColor");
	if(dvForeColor.getElementsByTagName("TABLE").length == 1){
		dvForeColor.innerHTML = drawCube() + dvForeColor.innerHTML;
	}
}
window.onblur =function(){
	var dvForeColor =document.getElementById("dvForeColor");
	var dvPortrait =document.getElementById("dvPortrait");
	dvForeColor.style.display = "none";
	if(dvPortrait){
		dvPortrait.style.display = "none";
	}
	fHideMenu();
}
window.onerror = function(){return true;}
document.onmousemove = function(e){
	if(gIsIE) var el = event.srcElement;
	else var el = e.target;
	var tdView = document.getElementById("tdView");
	var tdColorCode = document.getElementById("tdColorCode");
	var dvForeColor =document.getElementById("dvForeColor");
	var dvPortrait =document.getElementById("dvPortrait");
	var fontsize =document.getElementById("fontsize");
	var fontface =document.getElementById("fontface");
//	if(el.tagName == "IMG"){
//		el.style.borderRight="1px #cccccc solid";
//		el.style.borderBottom="1px #cccccc solid";
//	}else{
//		fSetImgBorder();
//	}
	if(el.tagName == "IMG"){
		try{
			if(fCheckIfColorBoard(el)){
				tdView.bgColor = el.parentNode.bgColor;
				tdColorCode.innerHTML = el.parentNode.bgColor
			}
		}catch(e){}
	}else{
		dvForeColor.style.display = "none";
		if(!fCheckIfPortraitBoard(el) && dvPortrait) dvPortrait.style.display = "none";
		if(!fCheckIfFontFace(el)) fontface.style.display = "none";
		if(!fCheckIfFontSize(el)) fontsize.style.display = "none";
	}
}
document.onclick = function(e){
	if(gIsIE) var el = event.srcElement;
	else var el = e.target;
	var dvForeColor =document.getElementById("dvForeColor");
	var dvPortrait =document.getElementById("dvPortrait");
	if(el.tagName == "IMG"){
		try{
			if(fCheckIfColorBoard(el)){
				format(gSetColorType, el.parentNode.bgColor);
				dvForeColor.style.display = "none";
				return;
			}
		}catch(e){}
		try{
			if(fCheckIfPortraitBoard(el)){
				format("InsertImage", el.src);
				if(dvPortrait){
					dvPortrait.style.display = "none";
				}
				return;
			}
		}catch(e){}
	}
}
function format(type, para){
	var f = window.frames["HtmlEditor"];
	var sAlert = "";
	if(!gIsIE){
		switch(type){
			case "Cut":
				sAlert = "你的浏览器安全设置不允许编辑器自动执行剪切操作,请使用键盘快捷键(Ctrl+X)来完成";
				break;
			case "Copy":
				sAlert = "你的浏览器安全设置不允许编辑器自动执行拷贝操作,请使用键盘快捷键(Ctrl+C)来完成";
				break;
			case "Paste":
				sAlert = "你的浏览器安全设置不允许编辑器自动执行粘贴操作,请使用键盘快捷键(Ctrl+V)来完成";
				break;
		}
	}
	if(sAlert != ""){
		alert(sAlert);
		return;
	}
	f.focus();
	if(!para)
		if(gIsIE)
			f.document.execCommand(type)
		else
			f.document.execCommand(type,false,false)
	else
		f.document.execCommand(type,false,para)
	f.focus();
}
function setMode(bStatus){
	var sourceEditor = document.getElementById("sourceEditor");
	var HtmlEditor = document.getElementById("tbhtmleditor");
	var f = window.frames["HtmlEditor"];
	var body = f.document.getElementsByTagName("BODY")[0];
	if(bStatus){
		sourceEditor.style.display = "";
		HtmlEditor.style.display = "none";
		sourceEditor.value = body.innerHTML;
	}else{
		sourceEditor.style.display = "none";
		HtmlEditor.style.display = "";
		body.innerHTML = sourceEditor.value;
		//body.innerHTML = clearAllFormat(sourceEditor.value);
		fSetEditable();
	}
}
function foreColor(e) {
	var sColor = fDisplayColorBoard(e);
	gSetColorType = "foreColor";
	if(gIEVer<=5.01 && gIsIE) format(gSetColorType, sColor);
}
function backColor(e){
	var sColor = fDisplayColorBoard(e);
	if(gIsIE)
		gSetColorType = "backcolor";
	else
		gSetColorType = "backcolor";
	if(gIEVer<=5.01 && gIsIE) format(gSetColorType, sColor);
}
function fDisplayColorBoard(e){
	if(gIsIE){
		var e = window.event;
	}
	if(gIEVer<=5.01 && gIsIE){
		var arr = showModalDialog("ColorSelect.htm", "", "font-family:Verdana; font-size:12; status:no; dialogWidth:21em; dialogHeight:21em");
		if (arr != null) return arr;
		return;
	}
	var dvForeColor =document.getElementById("dvForeColor");
	fSetColor();
	var iX = e.clientX;
	var iY = e.clientY;
	dvForeColor.style.display = "";
	dvForeColor.style.left = (iX-140) + "px";
	dvForeColor.style.top = (iY-10) + "px";
	return true;
}
function createLink() {
	var sURL=window.prompt("请输入链接网址 (如:http://www.abc.com/):", "http://");
	if ((sURL!=null) && (sURL!="http://")){
		format("CreateLink", sURL);
	}
}
function createImg()	{
	var sPhoto=prompt("请输入图片Url地址 (如:http://www.abc.com/images/logo.gif):", "http://");
	if ((sPhoto!=null) && (sPhoto!="http://")){
		format("InsertImage", sPhoto);
	}
}
function flash(){
	var arr = showModalDialog("/gyleditor/swf.htm", "", "dialogWidth:400px; dialogHeight:200px; status:0; help:0");
	if (arr != null)
	{
		var ss;
		ss=arr.split("*");
		path=ss[0];
		row=ss[1];
		col=ss[2];
		var string;
		string="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="+row+" height="+col+"><param name=movie value="+path+"><param name=quality value=high><embed src="+path+" pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width="+row+" height="+col+"></embed></object>"
		var s = window.frames["HtmlEditor"];
		var f = s.document.getElementsByTagName("BODY")[0];	
		f.innerHTML += string;
		f.focus();
	}
}
function wmv(){
	var arr = showModalDialog("/gyleditor/wmv.htm", window, "dialogWidth:400px; dialogHeight:240px; status:0;help:0;scroll:0;");
	if (arr != null){
		var ss;
		ss=arr.split("*");
		path=ss[0];
		autostart=ss[1];
		width=ss[2];
		height=ss[3];
		ran=rand();
		var string;
		//string="<object align=center classid=CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95 hspace=5 vspace=5 width="+ width +" height="+ height +"><param name=Filename value="+ path +"><param name=ShowStatusBar value=1><embed type=application/x-oleobject codebase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701 flename=mp src="+ path +"  width="+ width +" height="+ height +"></embed></object>";
		string="<EMBED id=MediaPlayer"+ran+" src="+ path +" width="+ width +" height="+ height +" autostart=\""+ autostart +"\" loop=\"false\"></EMBED><p></p>";
		var s = window.frames["HtmlEditor"];
		var f = s.document.getElementsByTagName("BODY")[0];	
		f.innerHTML += string;
		f.focus();
	}
}
function rand() {
	return parseInt((1000)*Math.random()+1);
}
function rm(){
	var arr = showModalDialog("/gyleditor/rm.htm", window, "dialogWidth:400px; dialogHeight:230px; status:0; help:0");
	if (arr != null)
	{
		var ss;
		ss=arr.split("*");
		path=ss[0];
		autostart=ss[3];
		row=ss[1];
		col=ss[2];
		var string;
		string="<object classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA' width='"+row+"' height='"+col+"'><param name='CONTROLS' value='ImageWindow'><param name='CONSOLE' value='Clip'><param name='AUTOSTART' value='"+ autostart +"'><param name=src value="+path+"></object><br><object classid='clsid:CFCDAA03-8BE4-11cf-B84B-0020AFBBCCFA'  width="+row+" height=32><param name='CONTROLS' value='ControlPanel,StatusBar'><param name='CONSOLE' value='Clip'></object>";
		var s = window.frames["HtmlEditor"];
		var f = s.document.getElementsByTagName("BODY")[0];	
		f.innerHTML += string;
		f.focus();
	}
}
function addPortrait(e){
	if(gIEVer<=5.01 && gIsIE){
		var imgurl = showModalDialog("portraitSelect.htm","", "font-family:Verdana; font-size:12; status:no; unadorned:yes; scroll:no; resizable:yes;dialogWidth:40em; dialogHeight:20em");
		if (imgurl != null)	format("InsertImage", imgurl);
		return;
	}
	var dvPortrait =document.getElementById("dvPortrait");
	var tbPortrait = document.getElementById("tbPortrait");
	var iX = e.clientX;
	var iY = e.clientY;
	dvPortrait.style.display = "";
	if(window.screen.width == 1024){
		dvPortrait.style.left = (iX-380) + "px";
	}else{
		if(gIsIE)
			dvPortrait.style.left = (iX-380) + "px";
		else
			dvPortrait.style.left = (iX-380) + "px";
	}
	dvPortrait.style.top = (iY-8) + "px";
	dvPortrait.innerHTML = '<table width="100%" border="0" cellpadding="5" cellspacing="1" style="cursor:hand" bgcolor="black" ID="tbPortrait"><tr align="left" bgcolor="#f8f8f8" class="unnamed1" align="center" ID="trContent">'+ drawPortrats() +'</tr>	</table>';
}
function fCheckIfColorBoard(obj){
	if(obj.parentNode){
		if(obj.parentNode.id == "dvForeColor") return true;
		else return fCheckIfColorBoard(obj.parentNode);
	}else{
		return false;
	}
}
function fCheckIfPortraitBoard(obj){
	if(obj.parentNode){
		if(obj.parentNode.id == "dvPortrait") return true;
		else return fCheckIfPortraitBoard(obj.parentNode);
	}else{
		return false;
	}
}
function fImgOver(el){
	if(el.tagName == "IMG"){
		el.style.borderRight="1px #cccccc solid";
		el.style.borderBottom="1px #cccccc solid";
	}
}
function fImgMoveOut(el){
	if(el.tagName == "IMG"){
		el.style.borderRight="1px #F3F8FC solid";
		el.style.borderBottom="1px #F3F8FC solid";
	}
}
String.prototype.trim = function(){
	return this.replace(/(^\s*)|(\s*$)/g, "");
}
function fSetBorderMouseOver(obj) {
	obj.style.borderRight="1px solid #aaa";
	obj.style.borderBottom="1px solid #aaa";
	obj.style.borderTop="1px solid #fff";
	obj.style.borderLeft="1px solid #fff";
	/*var sd = document.getElementsByTagName("div");
	for(i=0;i<sd.length;i++) {
		sd[i].style.display = "none";
	}*/
} 

function fSetBorderMouseOut(obj) {
	obj.style.border="none";
}

function fSetBorderMouseDown(obj) {
	obj.style.borderRight="1px #F3F8FC solid";
	obj.style.borderBottom="1px #F3F8FC solid";
	obj.style.borderTop="1px #cccccc solid";
	obj.style.borderLeft="1px #cccccc solid";
}
function fDisplayElement(element,displayValue) {
	if(gIEVer<=5.01 && gIsIE){
		if(element == "fontface"){
			var sReturnValue = showModalDialog("FontFaceSelect.htm","", "font-family:Verdana; font-size:12; status:no; unadorned:yes; scroll:no; resizable:yes;dialogWidth:112px; dialogHeight:271px");;
			format("fontname",sReturnValue);
		}else{
			var sReturnValue = showModalDialog("FontSizeSelect.htm","", "font-family:Verdana; font-size:12; status:no; unadorned:yes; scroll:no; resizable:yes;dialogWidth:130px; dialogHeight:250px");;
			format("fontsize",sReturnValue);
		}
		return;
	}
	if(element == "fontface"){
		var fontsize = document.getElementById("fontsize");
		fontsize.style.display = "none";
	}else if(element == "fontsize"){
		var fontface = document.getElementById("fontface");
		fontface.style.display = "none";
	}
	if ( typeof element == "string" )
		element = document.getElementById(element);
	if (element == null) return;
	element.style.display = displayValue;
	if(gIsIE){
		var e = event;
	}else{
		var e = ev;
	}
	var iX = e.clientX;
	var iY = e.clientY;
	element.style.display = "";
	element.style.left = (iX-40) + "px";
	element.style.top = (iY-10) + "px";
	return true;
}
function fSetModeTip(obj){
	var x = f_GetX(obj);
	var y = f_GetY(obj);
	var dvModeTip = document.getElementById("dvModeTip");
	if(!dvModeTip){
		var dv = document.createElement("DIV");
		dv.style.position = "absolute";
		dv.style.top = (y+20) + "px";
		dv.style.left = (x-40) + "px";
		dv.style.zIndex = "999";
		dv.style.fontSize = "12px";
		dv.id = "dvModeTip";
		dv.style.padding = "2 2 0 2px";
		dv.style.border = "1px #000000 solid";
		dv.style.backgroundColor = "#FFFFCC";
		dv.style.height = "12px";
		dv.innerHTML = "编辑源码";
		document.body.appendChild(dv);
	}else{
		dvModeTip.style.display = "";
	}
}
function fHideTip(){
	document.getElementById("dvModeTip").style.display = "none";
}
function f_GetX(e)
{
	var l=e.offsetLeft;
	while(e=e.offsetParent){				
		l+=e.offsetLeft;
	}
	return l;
}
function f_GetY(e)
{
	var t=e.offsetTop;
	while(e=e.offsetParent){
		t+=e.offsetTop;
	}
	return t;
}
function fHideMenu(){
	var fontface = document.getElementById("fontface");
	var fontsize = document.getElementById("fontsize");
	fontface.style.display = "none";
	fontsize.style.display = "none";
}

function fCheckIfFontFace(obj){
	if(obj.parentNode){
		if(obj.parentNode.id == "fontface") return true;
		else return fCheckIfFontFace(obj.parentNode);
	}else{
		return false;
	}
}
function fCheckIfFontSize(obj){
	if(obj.parentNode){
		if(obj.parentNode.id == "fontsize") return true;
		else return fCheckIfFontSize(obj.parentNode);
	}else{
		return false;
	}
}
function clearAllFormat(sTxt) {
	var c = sTxt.replace(/\n/ig, "");
	//var c = sTxt;
	c = c.replace(/<script.*?>.*?<\/scrip[^>]*>/ig,"");
	c = c.replace(/<[^>]*?javascript:[^>]*>/ig,"");
	c = c.replace(/<style.*?>.*?<\/styl[^>]*>/ig,"");
	c = c.replace(/<\/?(div|code|h\d)[^>]*>/ig,'<br>');
	c = c.replace(/<\/?(span|sohu|form|input|select|textarea|iframe|SUB|SUP|table|tr|th|td|tbody|module|OPTION|onload)(\s[^>]*)?>/ig,"");
	c = c.replace(/<\?xml[^>]*>/ig,'');
	c = c.replace(/<\!--.*?-->/ig,'');
	c = c.replace(/<(\w[^>]*) class=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onerror="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onload="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onmouseover="([^"]*)"([^>]*)/ig, "<$1$3");
	//c = c.replace(/<(\w[^>]*) style="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<\\?\?xml[^>]*>/ig, "");
	c = c.replace(/<\/?\w+:[^>]*>/ig, "");
	//处理图片
	//c = c.replace(/<img.*?src=([^ |>]*)[^>]*>/ig,"<img src=$1 border=0>");
	c = c.replace(/<a.*?href="([^"]*)"[^>]*>/ig,"<a href=\"$1\">");
	c = c.replace(/<center>\s*<center>/ig, '<center>');
	c = c.replace(/<\/center>\s*<\/center>/ig, '</center>');
	c = c.replace(/<center>/ig, '<center>');
	c = c.replace(/<\/center>/ig, '</center>');
	sTxt = c;
	return sTxt;
}
function clear2bx(){
	var g = window.frames["HtmlEditor"];
	var body = g.document.getElementsByTagName("BODY")[0];
	body.innerHTML = clearAllFormat(body.innerHTML);
}