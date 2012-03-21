function oblog_Size(num)
{
	var obj=document.getElementById("oblog_Container");
	if (parseInt(obj.offsetHeight)+num>=300)
	{
		obj.height = (parseInt(obj.offsetHeight) + num);
	}
	if (num>0)
	{
		obj.width="98%";
	}
}
function oblog_Size2(num)
{
	var obj=document.getElementById("oblog_Container");
	if (parseInt(obj.offsetHeight)+num>=100)
	{
		obj.height = (parseInt(obj.offsetHeight) + num);
	}
	if (num>0)
	{
		obj.width="98%";
	}
}

function Editor(content){
	document.write('<iframe name="wrEditor" id="wrEditor" width="100%" height="100%" MARGINHEIGHT="0" MARGINWIDTH="0" border=0 frameborder=0 oncontextmenu=self.event.returnValue=false></iframe>');
	oEditor = document.wrEditor;
	var strHtml = '<html><style>body{font-size:14px;line-height: 20px; margin:2px;}\ntd, a{color:#0000FF; font-size:14px;}\n textarea{border:#cccccc 1px solid;}\n </style><body oncontextmenu=self.event.returnValue=false bgcolor=#F7FBFD>'+content+'</body></html>';
	
	oEditor.document.open();
	oEditor.document.write(strHtml);
	oEditor.document.close();
	oEditor.document.designMode="On";
	oEditor.focus();
}

//文字加粗
function bold(){
	var sText = oEditor.document.selection.createRange();
	if(sText!=""){
		oEditor.document.execCommand("bold");
	}
}
//倾斜
function italic(){
	var sText = oEditor.document.selection.createRange();
	if(sText!=""){
		oEditor.document.execCommand("italic");
	}
}
//下划线
function underline(){
	var sText = oEditor.document.selection.createRange();
	if(sText!=""){
		oEditor.document.execCommand("underline");
	}
}
//超链接
function url(){
	var sText = oEditor.document.selection.createRange();
	if(sText!=""){
		oEditor.document.execCommand("createLink");
		oEditor.document.execCommand("ForeColor", "false", "#0000ff");
	}
}
//取消链接
function unurl(){
	var sText = oEditor.document.selection.createRange();
	if(sText!=""){
		oEditor.document.execCommand("unlink");
	}	
}
//插入图片
function image(){
	var arr = showModalDialog("/group/images/Editor/include/img.htm", window, "dialogWidth:600px; dialogHeight:250px;status:0;help:0;scroll:0;");
	if (arr)
	{
		oEditor.document.body.innerHTML+=arr;
	}
	oEditor.focus();
}
//插入Flash
function flash(){
	var arr = showModalDialog("/group/images/Editor/include/swf.htm", "", "dialogWidth:400px; dialogHeight:180px; status:0; help:0");
	if (arr != null)
	{
		var ss;
		ss=arr.split("*");
		path=ss[0];
		row=ss[1];
		col=ss[2];
		var string;
		string="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="+row+" height="+col+"><param name=movie value="+path+"><param name=quality value=high><embed src="+path+" pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width="+row+" height="+col+"></embed></object>"
		//string="[flash="+row+","+col+"]"+path+"[/flash]";
		oEditor.document.body.innerHTML+=string;
	}
	oEditor.focus();
}
//插入 MediaPlayer 播放器
function wmv(){
	var arr = showModalDialog("/group/images/Editor/include/wmv.htm", window, "dialogWidth:400px; dialogHeight:240px; status:0;help:0;scroll:0;");
	if (arr != null)
	{
		var ss;
		ss=arr.split("*");
		path=ss[0];
		autostart=ss[1];
		width=ss[2];
		height=ss[3];
		ran=rand();
		var string;
		string="<object align=center classid=CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95 hspace=5 vspace=5 width="+ width +" height="+ height +"><param name=Filename value="+ path +"><param name=ShowStatusBar value=1><embed type=application/x-oleobject codebase=http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701 flename=mp src="+ path +"  width="+ width +" height="+ height +"></embed></object>";
		string="<EMBED id=MediaPlayer"+ran+" src="+ path +" width="+ width +" height="+ height +" autostart=\""+ autostart +"\" loop=\"false\"></EMBED><p></p>";
		//string="[wmv="+ width +","+ height +","+ autostart +"]"+ path +"[/wmv]";
		oEditor.document.body.innerHTML+=string;
	}
	oEditor.focus();
}
function rand() {
	return parseInt((1000)*Math.random()+1);
}
//插入 RealPlayer 播放器
function rm(){
	var arr = showModalDialog("/group/images/Editor/include/rm.htm", window, "dialogWidth:400px; dialogHeight:220px; status:0; help:0");
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
		//string="[rm="+ width +","+ height +","+ autostart +"]"+ path +"[/rm]";
		oEditor.document.body.innerHTML+=string;
	}
	oEditor.focus();
}
/*
参数：left/center/right
*/
function ralign(aStr){
	switch(aStr){
	case "left":
		oEditor.document.execCommand("JustifyLeft");
		break;
	case "center":
		oEditor.document.execCommand("JustifyCenter");
		break;
	case "right":
		oEditor.document.execCommand("JustifyRight");
		break;
	default:
		return false;
	}
}
/*
字体颜色
*/
function FontColor(){
	var arr = showModalDialog("/group/images/Editor/include/selcolor.htm", window, "dialogWidth:300px; dialogHeight:300px; status:0; help:0");
	if (arr)
	{
		var sText = oEditor.document.selection.createRange();
		if(sText){
			oEditor.document.execCommand("ForeColor", "false", arr);
		}
	}
	oEditor.focus();
}
/*
字体背景颜色
*/
function BackColor(){
	var arr = showModalDialog("/group/images/Editor/include/selcolor.htm", window, "dialogWidth:300px; dialogHeight:300px; status:0; help:0");
	if (arr)
	{
		var sText = oEditor.document.selection.createRange();
		if(sText){
			oEditor.document.execCommand("BackColor", "false", arr);
		}
	}
	oEditor.focus();
}
/*

*/
function FontSize(value){
	var sText = oEditor.document.selection.createRange();
	if(sText){
		oEditor.document.execCommand("FontSize", "false", value);
	}	
}
/*

*/
function FontName(value){
	var sText = oEditor.document.selection.createRange();
	if(sText){
		oEditor.document.execCommand("FontName", "false", value);
	}	
}
//取消格式
function unformat(){
	var sText = oEditor.document.selection.createRange();
	if(sText){
		oEditor.document.execCommand("RemoveFormat", false, "");
	}	
}
function getContent()
{
	return correctUrl(oEditor.document.body.innerHTML);
}
function correctUrl(cont)
{
	var regExp;
	regExp = /<a([^>]*) href\s*=\s*([^\s|>]*)([^>]*)/gi
	cont = cont.replace(regExp, "<a href=$2 target=\"_blank\"");
	regExp = /<a([^>]*)><\/a>/gi
	cont = cont.replace(regExp, "");
	//test
	cont = clearAllFormat(cont);
	//end test
	return cont;
}
function emott(urll) {
	//var arr = "<img src=http://127.0.0.1/Editor/emot/01.gif>";
	var arr;
	var urll;
	arr = "<img src=Editor/emot/"+urll+".gif hspace=5>";
	if (arr)
	{
		oEditor.document.body.innerHTML+=arr;
	}
	oEditor.focus();
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
	//去除标签中的class, style, lang属性
	c = c.replace(/<(\w[^>]*) class=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onclick=([^ |>]*)([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onerror="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onload="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) onmouseover="([^"]*)"([^>]*)/ig, "<$1$3");
	//c = c.replace(/<(\w[^>]*) style="([^"]*)"([^>]*)/ig, "<$1$3");
	c = c.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/ig, "<$1$3");
	//去除word粘贴中的特殊标签
	c = c.replace(/<\\?\?xml[^>]*>/ig, "");
	c = c.replace(/<\/?\w+:[^>]*>/ig, "");
	//处理图片
	//c = c.replace(/<img.*?src=([^ |>]*)[^>]*>/ig,"<img src=$1 border=0>");
	//去掉链接中的无用参数
	c = c.replace(/<a.*?href="([^"]*)"[^>]*>/ig,"<a href=\"$1\">");
	//格式文本
	c = c.replace(/<center>\s*<center>/ig, '<center>');
	c = c.replace(/<\/center>\s*<\/center>/ig, '</center>');
	c = c.replace(/<center>/ig, '<center>');
	c = c.replace(/<\/center>/ig, '</center>');
	sTxt = c;
	return sTxt;
}
function fh(){
	var arr = showModalDialog("/group/images/Editor/include/emot.htm", window, "dialogWidth:310px; dialogHeight:225px;status:0;help:0;scroll:0;");
	if (arr)
	{
		oEditor.document.body.innerHTML+=arr;
	}
	oEditor.focus();
}
function photo(){
	var arr = showModalDialog("/group/images/Editor/include/photo.php", window, "dialogWidth:600px; dialogHeight:400px;status:0;help:0;scroll:auto;");
	if (arr)
	{
		oEditor.document.body.innerHTML+=arr;
	}
	oEditor.focus();
}
function video(){
	var arr = showModalDialog("/group/images/Editor/include/video.php", window, "dialogWidth:600px; dialogHeight:400px;status:0;help:0;scroll:auto;");
	if (arr)
	{
		oEditor.document.body.innerHTML+=arr;
	}
	oEditor.focus();
}