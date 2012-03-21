var IsIE;
function fInitMSIE(){
	if (navigator.userAgent.indexOf("MSIE") != -1){
		IsIE = true;
	}else{
		IsIE = false;
	}
}
fInitMSIE();
var fObj = null;
function adjustEditorAtStart(){
	var htmlletter = window.frames["htmlletter"];
	fObj = htmlletter.frames["HtmlEditor"];
	fSetContent(fObj);
}
function fSetContent(obj){
	var eBody = null;
	var sHtml = document.FORM.htext.value;
	try{	
		eBody = obj.document.getElementsByTagName("BODY")[0];
		if(sHtml != ""  && typeof(document.FORM.setreplyflag)!="undefined"){
			sHtml = "<br><br><br><br><br><br><br>" + sHtml;
		}
		obj.parent.fSetEditable();
		eBody.innerHTML = sHtml;
		if(IsIE && obj.document.body.innerHTML) ; // IE5 显示空白Bug解决方法 Surj
		document.FORM.htext.value = sHtml;
	}catch(e){
		window.setTimeout("fSetContent(fObj)",100);
	}
}

window.onload = fBodyOnload;
function fBodyOnload(){	
	var form = document.FORM;		
	adjustEditorAtStart();
}
function fInitEditor(){
	if(!IsIE){
		var htmlletter = document.getElementById("htmlletter");
		htmlletter.src = "/gyleditor/gyleditor.htm";
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
	var htmlletter = window.frames["htmlletter"];
	var fContent = htmlletter.frames["HtmlEditor"];
	var sContent = fContent.document.getElementsByTagName("BODY")[0];	
	sContent.innerHTML = clearAllFormat(sContent.innerHTML);
}