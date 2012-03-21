//function stopError() {return true;};window.onerror = stopError;
var isInternetExplorer = navigator.appName.indexOf("Microsoft") != -1;
function lrc_DoFSCommand(command, args) {
var lrcObj = isInternetExplorer ? document.all.SwfMovieIE : document.SwfMovieIE;
if(command=="showTLab"){showl();}
}
if (navigator.appName && navigator.appName.indexOf("Microsoft") != -1 && navigator.userAgent.indexOf("Windows") != -1 && navigator.userAgent.indexOf("Windows 3.1") == -1) {
	document.write('<script language=\"VBScript\"\>\n');
	//document.write('On Error Resume Next\n');
	document.write('Sub lrc_FSCommand(ByVal command, ByVal args)\n');
	document.write('	Call lrc_DoFSCommand(command, args)\n');
	document.write('End Sub\n');
	document.write('</script\>\n');
}
function showl(){
//cp=mediaPlayerObject.controls.currentPositionString;
//cps=mediaPlayerObject.controls.currentPosition;
//all=mediaPlayerObject.currentMedia.durationString;
//buff=mediaPlayerObject.network.bufferingprogress;

//SwfMovieIE.SetVariable("lrc.playtime", cps);
//SwfMovieIE.SetVariable("lrc.playbuff", buff);
alert('À¬»ø');
}  
function evtPSChg(f){
//SwfMovieIE.SetVariable("lrc.State", f);
//SwfMovieIE.TCallLabel("_root","mState");
}