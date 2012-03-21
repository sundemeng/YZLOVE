var tag_data = {};
tag_data["b16"] = "可以和自己父母住,可以和对方父母住,两口子自己住，经常回父母家看看,自己住，过年过节才回家";
tag_data["b17"] = "坦诚相待,彼此充分了解,能为对方分忧,互相尊重,彼此依赖,相互给予一定的空间,天天相守,保持浪漫情调,共同的信仰,相互信任,善待对方,共同的人生追求,能彼此包容,相当的教育水平,从不相互责怪,共同的生活爱好";
tag_data["b18"] = "两人世界,喜欢和大家庭在一起,三、两好友,很多朋友,保持彼此婚前的生活圈";
tag_data["b19"] = "事业成就,家庭背景,真诚,感觉,头脑,外表,幽默感,前途,善解人意,个性,良心,性能力,经济能力,学识,性感的身材,强壮的身体";
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
	}
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
if(document.YZLOVEFORM.b1.value==""){
alert('请选择“你有子女吗”！');
document.YZLOVEFORM.b1.focus();
return false;}
if(document.YZLOVEFORM.b2.value==""){
alert('请选择“结婚后想要小孩吗”！');
document.YZLOVEFORM.b2.focus();
return false;}
if(document.YZLOVEFORM.b3.value==""){
alert('请选择“你愿意为爱情迁居别处吗”！');
document.YZLOVEFORM.b3.focus();
return false;}
if(document.YZLOVEFORM.b4.value==""){
alert('请选择“婚后你会承担多少家务”！');
document.YZLOVEFORM.b4.focus();
return false;}	
if(document.YZLOVEFORM.b5.value==""){
alert('请选择“喜欢旅游吗”！');
document.YZLOVEFORM.b5.focus();
return false;}
if(document.YZLOVEFORM.b6.value==""){
alert('请选择“婚恋中双方的关系应该是”！');
document.YZLOVEFORM.b6.focus();
return false;}
if(document.YZLOVEFORM.b7.value==""){
alert('请选择“你的婚恋态度”！');
document.YZLOVEFORM.b7.focus();
return false;}
if(document.YZLOVEFORM.b8.value==""){
alert('请选择“你的经济状况”！');
document.YZLOVEFORM.b8.focus();
return false;}	
if(document.YZLOVEFORM.b9.value==""){
alert('请选择“对方的家庭重要吗”！');
document.YZLOVEFORM.b9.focus();
return false;}
if(document.YZLOVEFORM.b10.value==""){
alert('请选择“你的消费观”！');
document.YZLOVEFORM.b10.focus();
return false;}
if(document.YZLOVEFORM.b11.value==""){
alert('请选择“你对现在工作的态度”！');
document.YZLOVEFORM.b11.focus();
return false;}
if(document.YZLOVEFORM.b12.value==""){
alert('请选择“你会打小孩吗”！');
document.YZLOVEFORM.b12.focus();
return false;}	
if(document.YZLOVEFORM.b13.value==""){
alert('请选择“家庭卫生”！');
document.YZLOVEFORM.b13.focus();
return false;}
if(document.YZLOVEFORM.b14.value==""){
alert('请选择“爱养宠物吗”！');
document.YZLOVEFORM.b14.focus();
return false;}
if(document.YZLOVEFORM.b15.value==""){
alert('请选择“异性密友”！');
document.YZLOVEFORM.b15.focus();
return false;}	
if(document.YZLOVEFORM.b16.value.length>127 || document.YZLOVEFORM.b16.value.length<2){
alert('“希望婚后的家庭关系”请控制在2~127个字内！');
document.YZLOVEFORM.b16.focus();
return false;}
if(document.YZLOVEFORM.b17.value.length>127 || document.YZLOVEFORM.b17.value.length<2){
alert('“觉得两人相处最重要的是”请控制在2~127个字内！');
document.YZLOVEFORM.b17.focus();
return false;}
if(document.YZLOVEFORM.b18.value.length>127 || document.YZLOVEFORM.b18.value.length<2){
alert('“你希望的结婚后的生活圈”请控制在2~127个字内！');
document.YZLOVEFORM.b18.focus();
return false;}
if(document.YZLOVEFORM.b19.value.length>127 || document.YZLOVEFORM.b19.value.length<2){
alert('“你最看重对方的？”请控制在2~127个字内！');
document.YZLOVEFORM.b19.focus();
return false;}	
}