var tag_data = {};
tag_data["a3"] = "家中,海滩,保龄球馆,喝茶,迪厅,英语角,网吧,电影院,逛街,卡拉OK,参加公益活动,朋友聚会,展览厅,剧院,书店,看球赛,户外,咖啡厅,看演唱会,图书馆,宾馆酒店,博物馆,公园,餐厅,舞厅,酒吧,夜总会,体育活动,其他请在上面文本框中输入";
tag_data["a4"] = "流行,怀旧,乡村,摇滚,古典,爵士,DJ/舞曲,戏曲,民歌,原声,轻音乐";
tag_data["a5"] = "篮球,排球,羽毛球,滑冰,兵兵球,足球,划船,跑步,攀岩,游泳,网球,探险,骑自行车,散步,爬山,保龄球,练健美,滑雪,郊游,散打,跆拳道,气功,武术,拳击,截拳道,体操";
tag_data["a6"] = "什么都爱谈,国家大事,高科技,艺术,星座,汽车,明星,时装/打扮,经济/生意,股票,装修,电脑/网络,生活琐事,时事/新闻,电影,音乐,我的小孩,我的梦,我的朋友,我的工作,世界/旅游,上一次恋情,动物,哲学,流行读物,文学/诗歌,宗教,黄段子,体育运动,电视节目,没什么特别的";
tag_data["a7"] = "写情书,小礼物,见面的拥抱和亲吻,牵手,看日出（日落）,慢舞,同听一首歌,一起看演出,一首情诗,乡间漫步,月光下跳舞,野炊,一处秘密的约会点,午夜狂欢,音乐卡,一个惊喜,纪念日,沙滩嬉戏,烛光晚餐,不需要理由的鲜花,一起做饭,不期而遇";
var oPopup;
oPopup = window.createPopup();
function popw(ctl,content){
content = "<div id='co' style='height:200px;overflow-y:hidden;overflow-y:auto;'>"+content+"</div>";
content += "<style>a:link{color:#01297E;text-decoration:underline;}a:visited{color:#01297E;text-decoration:underline;}a:hover{color:red;text-decoration:none;}</style>";
//ctl = document.getElementById(ctl);
if (typeof(content)!="string")	{
content = content.toString();}
if (oPopup==null)	{
oPopup = window.createPopup();}
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
}}}else{
t_html = "";
}return t_html;}
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
}}
return false;
}
catch(e){
alert(e.description);
}}
function closeTip(){
for(i=1;i<=5;i++){document.getElementById('tipinfo'+i).style.display = "none";	}
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
if(document.YZLOVEFORM.a1.value==""){
alert('请选择“第一次约会你希望双方能做什么”！');
document.YZLOVEFORM.a1.focus();
return false;}
if(document.YZLOVEFORM.a2.value==""){
alert('请选择“约会中该谁买单”！');
document.YZLOVEFORM.a2.focus();
return false;}
if(document.YZLOVEFORM.a3.value.length>127 || document.YZLOVEFORM.a3.value.length<2){
alert('“你喜欢的约会场所”请控制在2~127个字内！');
document.YZLOVEFORM.a3.focus();
return false;}
if(document.YZLOVEFORM.a4.value.length>127 || document.YZLOVEFORM.a4.value.length<2){
alert('“你喜欢的音乐”请控制在2~127个字内！');
document.YZLOVEFORM.a4.focus();
return false;}
if(document.YZLOVEFORM.a5.value.length>127 || document.YZLOVEFORM.a5.value.length<2){
alert('“你常参与的体育活动”请控制在2~127个字内！');
document.YZLOVEFORM.a5.focus();
return false;}
if(document.YZLOVEFORM.a6.value.length>127 || document.YZLOVEFORM.a6.value.length<2){
alert('“你喜欢谈论”请控制在2~127个字内！');
document.YZLOVEFORM.a6.focus();
return false;}
if(document.YZLOVEFORM.a7.value.length>127 || document.YZLOVEFORM.a7.value.length<2){
alert('“你认为浪漫是”请控制在2~127个字内！');
document.YZLOVEFORM.a7.focus();
return false;}
}