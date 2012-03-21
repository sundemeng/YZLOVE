function createXML(){ 
if(window.XMLHttpRequest) {
xmlHttp = new XMLHttpRequest();
} else if(window.ActiveXObject) { 
try{xmlHttp = new ActiveX0bject("Msxml2.XMLHTTP");}
catch(e) {} 
try {xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}
catch(e) {} 
if(!xmlHttp){ 
window.alert("No Create XML"); 
return false; 
}}} 
function getObj(objId) {
if(document.getElementById && document.getElementById(objId)){return document.getElementById(objId);} 
else if (document.all && document.all(objId)){
return document.all(objId);
}else if (document.layers && document.layers[objId]){return document.layers[objId];}else{return false;}
}
function getData(str) {
var str;
createXML();
xmlHttp.open("GET","ajax/"+str+".php",true); 
xmlHttp.onreadystatechange = showData; 
xmlHttp.send(null); 
} 
function showData(){ 
if (xmlHttp.readyState == 4 && xmlHttp.status == 200){
var returndate;
returndate = xmlHttp.responseText;
s = returndate.split("|GYL|"); 
c = s[0];
i = s[1];
getObj(i).innerHTML = c;
} 
}
function doparty(n) {
var a;
for(var i=1; i<=4; i++){
id="p"+i;
a = document.getElementById(id);
b = document.getElementById("pp"+i);
if (id==n.id){
//if (i != 1){getData(b.id);}
getData(b.id);
a.className="partyT1 partyTWH";
b.style.display = "block";
}else{
a.className="partyT0 partyTWH";
b.style.display = "none";
}
}
}
function doindexuser(n) {
var a;
for(var i=1; i<=5; i++){
id="u"+i;
a = document.getElementById(id);
b = document.getElementById("uu"+i);
if (id==n.id){
if (i != 1){getData(b.id);}
//getData(b.id);
if (i == 1){a.className="userJJT1";}else{a.className="userJJ1";}
b.style.display = "block";
}else{
if (i == 1){a.className="userJJT0";}else{a.className="userJJ0";}
b.style.display = "none";
}}}
function dodiary(n) {
var a;
for(var i=1; i<=4; i++){
id="d"+i;
a = document.getElementById(id);
b = document.getElementById("dd"+i);
if (id==n.id){
if (i != 1){getData(b.id);}
a.className="diaryT1 diaryTWH";
b.style.display = "block";
}else{
a.className="diaryT0 diaryTWH";
b.style.display = "none";
}}}
function doindexgrpup(n) {
var a;
for(var i=1; i<=5; i++){
id="g"+i;
a = document.getElementById(id);
b = document.getElementById("gg"+i);
if (id==n.id){
if (i != 1){getData(b.id);}
if (i == 1){a.className="groupJJT1";}else{a.className="groupJJ1";}
b.style.display = "block";
}else{
if (i == 1){a.className="groupJJT0";}else{a.className="groupJJ0";}
b.style.display = "none";
}}}
function dostory(n) {
var a;
for(var i=1; i<=4; i++){
id="s"+i;
a = document.getElementById(id);
b = document.getElementById("ss"+i);
if (id==n.id){
if (i != 1){getData(b.id);}
a.className="storyT1 storyTWH";
b.style.display = "block";
}else{
a.className="storyT0 storyTWH";
b.style.display = "none";}}}