var scripts=document.getElementsByTagName("script");
var curJS=scripts[scripts.length-1];
var getArgs=(function(){
var sc=document.getElementsByTagName('script');
var paramsArr=sc[sc.length-1].src.split('?')[1].split('&');
var args={},argsStr=[],param,t,name,value;
for(var i=0,len=paramsArr.length;i<len;i++){
param=paramsArr[i].split('=');
name=param[0],value=param[1];
if(typeof args[name]=="undefined"){
args[name]=value;
}else if(typeof args[name]=="string"){
args[name]=[args[name]]
args[name].push(value);
}else{
args[name].push(value);}}
args.toString=function(){
for(var i in args) argsStr.push(i+':'+showArg(args[i]));
return '{'+argsStr.join(',')+'}';}
return function(){return args;}})();
var t = getArgs()["t"];var u = getArgs()["u"];var c = getArgs()["c"];
t='½»ÓÑÍøÌáÐÑÄú:';
document.write("<style type='text/css'>");
document.write("#YzloveTips {position:absolute; z-index: 100;width:256px;height:159px;BACKGROUND: url("+u+"/images/YzloveTips.gif) no-repeat;display:none}");
document.write("#qqtitle {float:left;height:15px;width:182px;font-family:Verdana;font-weight:bold;color:#225400;padding:5px 0 0 40px;text-align:left;cursor:pointer}");
document.write("#closebt {float:left;height:20px;width:30px;cursor:pointer}");
document.write("#tipchat {height:88px;width:236px;padding:10px;line-height:18px;text-align:left;font-size:12px}");
document.write("#tipchat img{border:0}");
document.write("#tipchat a.lan{color:#06c;font-family:Verdana;font-size:12px;text-decoration:none}");
document.write("#tipchat a.lan:hover{color:#f00;text-decoration:underline}");
document.write("#tipchat a.hong{color:#FF5494;font-family:Verdana;font-size:12px;text-decoration:none}");
document.write("#tipchat a.hong:hover{color:#f00;text-decoration:underline}");
document.write("#tipchat a.clse{text-decoration:underline;color:#DF2C91}");
document.write("#tipchat a.clse:hover{color:#6F9F00}");
document.write("#tipchat .span{width:236px;height:58px;padding:30px 0 0 0;color:#999;text-align:center}");
document.write("#tipchat .li{width:236px;height:24px;padding:4px 0 1px 0;color:#666;text-align:left;border-bottom:#ddd 1px solid}");
document.write("#tipbottom {height:26px;width:240px;color:#225400;padding:5px 0 0 0;text-align:center}");
document.write("#tipbottom a{text-decoration:underline;color:#f00;font-family:Verdana;font-weight:bold}");
document.write("#tipbottom a:hover{color:#000}");
document.write("a.CuDF2C91{text-decoration:underline;color:#DF2C91;font-weight:bold}");
document.write("a.CuDF2C91:hover{color:#6F9F00}");
document.write("</style>");
document.write("<div id='YzloveTips'>");
document.write("<div id='qqtitle' onclick='CloseIt()'>"+t+c+":</div>");
document.write("<div id='closebt' onclick='CloseIt()'><a href='javascript:CloseIt();' class='spacebt'>&nbsp;&nbsp;&nbsp;</a></div>");
document.write("<div class='clear'></div>");
document.write("<div id='tipchat'></div>");
document.write("<div class='clear'></div>");
document.write("<div id='tipbottom'><span id=gbook></span><span id=friend></span><span id=present></span></div>");
document.write("</div>");
var loadtime=200;var loadtime2=15000;var SUPDES;
var ingbook=u+'/ajax/gbooking';
var infriend=u+'/ajax/friending';
var inpresent=u+'/ajax/presenting';
var inchat=u+'/ajax/chating';
var insupdes=u+'/ajax/supdes';
var moveYzlove,loop1,loop2,loop3,loop4;
var w_body = 256;var h_body = 159;var w_cursor = 0;var h_cursor = 0;var l_cursor = 0;var t_cursor = 0;
var Yzlovefrm = ( document.compatMode.toLowerCase()=="css1compat" ) ? document.documentElement : document.body;
var Yzlovest = document.getElementById("YzloveTips").style;
Yzlovest.top = ( Yzlovefrm.clientHeight - h_body ) + "px";
Yzlovest.left = ( Yzlovefrm.clientWidth - w_body ) + "px";
function moveYzloveTips() {Yzlovest.top = ( Yzlovefrm.scrollTop + Yzlovefrm.clientHeight - h_body ) + "px";Yzlovest.left = ( Yzlovefrm.scrollLeft + Yzlovefrm.clientWidth - w_body ) + "px";}
function CloseIt(){clearInterval(loop1);clearInterval(loop2);clearInterval(loop3);clearInterval(loop4);clearInterval(SUPDES);clearInterval(moveYzlove);Yzlovest.display='none';}
function dataFeed(value){
var IFTIPS;var kind;var content;
s=value.split("|"); 
IFTIPS=s[0];kind=s[1];content=s[2];
switch (kind){ 
case 'G':
var obj = document.getElementById("gbook");
var objout = (content == "")?"":content;
obj.innerHTML = objout;
break;
case 'P':
var obj = document.getElementById("present");
var objout = (content == "")?"":content;
obj.innerHTML = objout;
break;
case 'C':
var obj = document.getElementById("tipchat");
var objout = (content == "")?"":content;
obj.innerHTML = objout;
break;
case 'S':
if (IFTIPS==1){loadSUPDES();} else {clearInterval(moveYzlove);Yzlovest.display='none';}
break;}}
function loadData(str){
var lastJsObj = null;
var headID = document.getElementsByTagName("head")[0];
var newScript = document.createElement("script");
if ( lastJsObj != null ){
headID.removeChild(lastJsObj);}
newScript.type = "text/javascript";
newScript.src = str+'.php';
lastJsObj = newScript;
headID.appendChild(newScript);}
function loadSUPDES(){
Yzlovest.display='block';
moveYzlove = setInterval("moveYzloveTips();",100);
loop1 = setTimeout("loadData('"+ingbook+"')",loadtime);
loop3 = setTimeout("loadData('"+inpresent+"')",loadtime);
loop4 = setTimeout("loadData('"+inchat+"')",100);
}SUPDES = setInterval("loadData('"+insupdes+"')",loadtime2);