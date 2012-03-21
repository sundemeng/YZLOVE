document.write('<DIV id="MagicFace" style="Z-INDEX:299;VISIBILITY:hidden;margin:50px 0 0 0;POSITION:absolute;width:800px;height:600px" ></DIV>');
var obj = document.getElementById("MagicFace");
function ShowMagicFace(MagicFaceUrl)
{
	if(MagicFaceUrl !="")
	{
		obj.innerHTML = '<object codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+(screen.Width-30)+'" height="800" ><param name="movie" value="'+ MagicFaceUrl +'"><param name="menu" value="false"><param name="quality" value="high"><param name="play" value="true"><param name="wmode" value="transparent"><embed src="' + MagicFaceUrl +'" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="'+(screen.Width-30)+'" height="800"></embed></object>';
		obj.style.visibility = 'visible';
		obj.style.top = '0px';obj.style.left= '0px';
	}
	else
	{
	obj.innerHTML=''
	}
}
var getDefaultID=0;
ShowMagicFace('images/magic/<?php echo $_GET['magicid'] ?>.swf');
