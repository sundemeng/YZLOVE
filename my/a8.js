var tag_data = {};
tag_data["d1"] = "正职工作,兼职工作,专业顾问,挖角对象,创业伙伴,产业情报,同业人士,合作机会,兴趣同好,灵感商机";
var oPopup;
oPopup = window.createPopup();
function popw(ctl,content){
content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
//ctl = document.getElementById(ctl);
if (typeof(content)!="string")	{
content = content.toString();
}
if (oPopup==null)	{
oPopup = window.createPopup();
}
var oPopBody = oPopup.document.body;
var bc,gc;
gc = "";
bc = "#ccc";
oPopBody.style.fontFamily = "Tahoma";
oPopBody.style.fontSize = "12px";
oPopBody.style.margin = "4px";
oPopBody.style.backgroundColor = gc;
oPopBody.style.border = "solid "+bc+" 1px";
oPopBody.innerHTML = content; //" 测试内容.Test";
with(ctl)	{
oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, 200, document.body);
}}
function makeSelection(ns,flag){
var t_html = "";
if (typeof(tag_data[flag])!="undefined")	{
var al = tag_data[flag].split(",");
for(i=0;i<al.length;i++)		{
if (al[i]!="|")			{
t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>　";
}else{
t_html +="<br/>";
}}
}else{
t_html = "";
}
return t_html;
}
function setTag(ns,tag){
try	{
var o = document.all[ns];
var s = o.value;
if (s == "") {o.value = tag;}
else {
switch(s.indexOf(tag)){
case -1:
o.value += " " + tag;
break;
case 0:
if (s.replace(tag,"")!="") o.value = s.replace(tag+" ","") + " "+ tag;
break;
default:
o.value = s.replace(" "+tag,"") + " "+ tag;
break;
}}
return false;
}
catch(e){
alert(e.description);
}}
function closeTip(){
for(i=1;i<=1;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
}
function setTagBehavior(obj,ns,div_id){
if (obj==null) return;
if (typeof(tag_data[ns])=="undefined") return;
var tip_obj = document.getElementById(div_id);
if (tip_obj==null) return;
obj.onblur = function() { this.style.backgroundColor = "#ffffff"; }
closeTip();
obj.style.backgroundColor = "#FFFBD1";
tip_obj.innerHTML = makeSelection(obj.name,ns);
tip_obj.style.display = "block";
}
function chkform(){
if(document.YZLOVEFORM.d1.value.length>127 || document.YZLOVEFORM.d1.value.length<2){
alert('“以商会友目的”请控制在2~127个字内');
document.YZLOVEFORM.d1.focus();
return false;}
if(document.YZLOVEFORM.d2.value.length>50 || document.YZLOVEFORM.d2.value.length<2){
alert('“公司/机构名称”请控制在2~50个字内');
document.YZLOVEFORM.d2.focus();
return false;}
if(document.YZLOVEFORM.d3.value==""){
alert('请选择“职务分类”');
document.YZLOVEFORM.d3.focus();
return false;}
if(document.YZLOVEFORM.d4.value==""){
alert('请选择“职位等级”');
document.YZLOVEFORM.d4.focus();
return false;}
if(document.YZLOVEFORM.d5.value.length>50 || document.YZLOVEFORM.d5.value.length<2){
alert('“职务名称”请控制在2~50个字内');
document.YZLOVEFORM.d5.focus();
return false;}
if(document.YZLOVEFORM.d6.value==""){
alert('请选择“产业类别”');
document.YZLOVEFORM.d6.focus();
return false;}
if(document.YZLOVEFORM.d7.value.length>50 || document.YZLOVEFORM.d7.value.length<2){
alert('“学校科系”请控制在2~50个字内');
document.YZLOVEFORM.d7.focus();
return false;}
if(document.YZLOVEFORM.d8.value.length>50 || document.YZLOVEFORM.d8.value.length<2){
alert('“熟悉领域”请控制在2~50个字内');
document.YZLOVEFORM.d8.focus();
return false;}	
if(document.YZLOVEFORM.d9.value.length>50 || document.YZLOVEFORM.d9.value.length<2){
alert('“专长兴趣”请控制在2~50个字内');
document.YZLOVEFORM.d9.focus();
return false;}		
if(document.YZLOVEFORM.d10.value.length>50 || document.YZLOVEFORM.d10.value.length<2){
alert('“往来机构”请控制在2~50个字内');
document.YZLOVEFORM.d10.focus();
return false;}		
if(document.YZLOVEFORM.d11.value.length>2000 || document.YZLOVEFORM.d11.value.length<2){
alert('“工作经历”请控制在2~50个字内');
document.YZLOVEFORM.d11.focus();
return false;}	
}