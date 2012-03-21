var scripts=document.getElementsByTagName("script");var pbtime = 1200000;
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
return function(){return args;}})();var u = getArgs()["u"];var zeai_supdes_ext='php';
function ZeaiPB(){
var lastJsObj = null;
var headID = document.getElementsByTagName("head")[0];
var newScript = document.createElement("script");
if ( lastJsObj != null ){
headID.removeChild(lastJsObj);}
newScript.type = "text/javascript";
newScript.src = u+'/pb'+'.'+zeai_supdes_ext;
lastJsObj = newScript;
headID.appendChild(newScript);
}setInterval("ZeaiPB()",pbtime);