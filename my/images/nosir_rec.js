function J_get(name){
	var js_get  =self.window.document.location.href;
	var start	=js_get.indexOf(name + '=');
	if (start == -1) return '';
	var len = start + name.length + 1;
	var end = js_get.indexOf('&',len);
  	if (end == -1) end = js_get.length;
  	return unescape(js_get.substring(len,end));
}
function s2j_openFileModal(){
	$("InputFile").click();
}
function s2j_del(){
	ap.stop();
}
function s2j_stop(){
	ap.pause();
	ap.seek(0);
}
function s2j_play(s){
	if(!s)	{
		ap.stop();
		ap.play(src);
		//alert(src);//gyl
	}else{
		ap.play();
	}
}
function mPlay(songurl){
	ap.stop();
	ap.play(songurl);
}
function s2j_pause(){ap.pause();}
function s2j_seek(t){ap.seek(t);}
function isIE7(){
	var ver = parseFloat(navigator.appVersion.match(/MSIE (\d\.*\d*)/i)[1]);
	if(ver>=7){return true}else{return false};
}
//
var mm = (J_get("mm")=="yes"||J_get("mm")=="y")?"y":"n";
var ie7 = (isIE7())?"y":"n";
//
var vars = "mm=" + mm + "&ie7=" + ie7;

//$("Player").innerHTML = '' +
		'<object id="SwfMovieIE" width="725" height="410" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">' +
				'<param name="movie" value="images/record.swf">' +
				//'<param name="movie" value="site_recorder_v4.swf">' +
				'<param name="allowScriptAccess" value="always" />'+
				'<param name="FlashVars" value="'+ vars +'">' +
			'<embed name="SwfMovieFF" src="images/record.swff" FlashVars="'+ vars +'" >' +
			'</embed>' +
		'</object>';

var ap = new audioPlayer;
var swf = $("SwfMovieIE");
var timeInterval = null;
var src = "";

$("InputFile").onchange = function(){
	src = this.value;
	ap.stop();
	swf.j2s_getFilePath(src);
}
function checkPlayState(v){
	if(v == 3)	{
		timeInterval = window.setInterval('fireTimeInterval()',1000);	
		timeInterval1 = window.setInterval('addtime()',100);	
	}else{
		window.clearInterval(timeInterval);
	}
	if(v == 1){	swf.j2s_onPlayStopped();}
}
function fireTimeInterval(){
	swf.j2s_updateTime(ap.position(),ap.duration(),ap.truePosition(),ap.trueDuration());
}
function addtime(){
	swf.SetVariable("lrc.playtime",mediaPlayerObject.controls.currentPosition);
	swf.SetVariable("lrc.playbuff",mediaPlayerObject.network.bufferingprogress);
	swf.SetVariable("lrc.gm",mediaPlayerObject.currentMedia.getItemInfo("title"));
	swf.SetVariable("lrc.zz",mediaPlayerObject.currentMedia.getItemInfo("author"));
	//alert(mediaPlayerObject.currentMedia.getItemInfo("author"));
}
function copyInBoard(hahaUrl) { 			
	window.clipboardData.setData('text',hahaUrl)
	alert('ÍøÖ·¸´ÖÆ³É¹¦À²!');			
}
	