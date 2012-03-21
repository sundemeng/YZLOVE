var tag_data = {};
tag_data["c8"] = "非常主动,以我为主,你快乐所以我快乐,善于配合,比较含羞、被动,需要对方引导";
tag_data["c9"] = "幽默有趣的伴侣,洁安全的性爱,传统的性爱伴侣,秘密情人,温柔伴侣,性幻想对象,经验丰富的伴侣,性爱老师,愿意和我一起尝试新东西的,没有占有欲，不会妒忌的,思想开放的,网上性爱";
tag_data["c10"] = "魔鬼的身材,一点点疼痛,摇滚乐,讲黄段子,浴室,同伴给我搽油,古典音乐,香味,按摩,亲热的时候蒙上眼睛,贴身舞,奇装异服,健壮的身体,挠痒痒,性爱电影,角色扮演,胡子,慢慢地彼此宽衣,湿吻,在灯光下,甜言蜜语,被偷窥,充分的前戏,在烛光下,野外,新奇的地方,辅助工具,耳边细语,色情小说,纹身,高个子,小个子";
tag_data["c11"] = "一起看性爱电影,一夜情,网上性爱聊天,电话性爱聊天,角色扮演,仅限普通正常的方式,只要不太奇怪都可以,同性恋";
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
		/*
		var h = oPopup.document.body.scrollHeight;
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, h, document.body);
		h = oPopup.document.body.scrollHeight;
		if (h >200) h=200;
		//*/
		oPopup.show(findPosX(ctl)+1,findPosY(ctl)+offsetHeight+2, offsetWidth+1, 200, document.body);
	}
	//*/
}
//生成选项html
function makeSelection(ns,flag){
	var t_html = "";
	if (typeof(tag_data[flag])!="undefined")	{
		var al = tag_data[flag].split(",");
		for(i=0;i<al.length;i++)		{
			if (al[i]!="|")			{
				t_html += "<a href='#' onclick='return setTag(\""+ns+"\", this.innerText);' class=u6699CC>"+al[i]+"</a>　";
			}else{
				t_html +="<br/>";
			}
		}
	}else{
		t_html = "";
	}
	//return "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+t_html+"</div>";
	return t_html;
}
//设置tag值
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
			}
		}
		return false;
	}
	catch(e){
		alert(e.description);
	}
}
function closeTip(){
	for(i=1;i<=4;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
}
//指定需要特效的控件
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
	//popw(obj,makeSelection(obj.name,flag));
}
function chkform(){
if(document.YZLOVEFORM.c1.value==""){
alert('请选择“你现在住在”');
document.YZLOVEFORM.c1.focus();
return false;}
if(document.YZLOVEFORM.c2.value==""){
alert('请选择“你认为自己性感吗”');
document.YZLOVEFORM.c2.focus();
return false;}
if(document.YZLOVEFORM.c3.value==""){
alert('请选择“你在性爱方面的经验”');
document.YZLOVEFORM.c3.focus();
return false;}
if(document.YZLOVEFORM.c4.value==""){
alert('请选择“你对待性爱的态度是”');
document.YZLOVEFORM.c4.focus();
return false;}
if(document.YZLOVEFORM.c5.value==""){
alert('请选择“你在性爱中乐于尝试吗”');
document.YZLOVEFORM.c5.focus();
return false;}
if(document.YZLOVEFORM.c6.value==""){
alert('请选择“你认为性和爱的关系是”');
document.YZLOVEFORM.c6.focus();
return false;}
if(document.YZLOVEFORM.c7.value==""){
alert('请选择“你认为性感主要体现在对方的”');
document.YZLOVEFORM.c7.focus();
return false;}
if(document.YZLOVEFORM.c8.value.length>127 || document.YZLOVEFORM.c8.value.length<2){
alert('“在性爱中，你往往是”请控制在2~127个字内');
document.YZLOVEFORM.c8.focus();
return false;}
if(document.YZLOVEFORM.c9.value.length>127 || document.YZLOVEFORM.c9.value.length<2){
alert('“你在寻找”请控制在2~127个字内');
document.YZLOVEFORM.c9.focus();
return false;}
if(document.YZLOVEFORM.c10.value.length>127 || document.YZLOVEFORM.c10.value.length<2){
alert('“什么比较能调动你的兴致”请控制在2~127个字内');
document.YZLOVEFORM.c10.focus();
return false;}
if(document.YZLOVEFORM.c11.value.length>127 || document.YZLOVEFORM.c11.value.length<2){
alert('“你能够接受(和你的伴侣)”请控制在2~127个字内');
document.YZLOVEFORM.c11.focus();
return false;}
}