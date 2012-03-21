function zeai_getbyid(id)
{
   itm = null;
   if (document.getElementById){itm = document.getElementById(id);}
   else if (document.all){itm = document.all[id];}else if (document.layers){itm = document.layers[id];}
   return itm;
  }
function ZeaiAd(element,url,width,height,images,links,texts){
	if (!zeai_getbyid(element)) return;
	var borderwidth = width + 2;
	var borderheight = height + 2;
	var str = '';
	str += '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,9,0" width="'+ width +'" height="'+ height +'">';
	str += '<param name="allowScriptAccess" value="sameDomain"><param name="movie" value="'+url+'"><param name="quality" value="high"><param name="bgcolor" value="#ffffff">';
	str += '<param name="menu" value="false"><param name=wmode value="opaque">';
	str += '<param name="FlashVars" value="pics='+images+'&links='+links+'&texts='+texts+'&borderwidth='+borderwidth+'&borderheight='+borderheight+'&textheight=0">';
	str += '<embed src="'+url+'" wmode="opaque" FlashVars="pics='+images+'&links='+links+'&texts='+texts+'&borderwidth='+borderwidth+'&borderheight='+borderheight+'&textheight=0" menu="false" bgcolor="#ffffff" quality="high" width="'+ width +'" height="'+ height +'" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
	str += '</object>';
	zeai_getbyid(element).innerHTML = str;
}
var focus_width=980;
var focus_height=90;
var text_height=0;
var swf_height = focus_height+text_height;
var texts = '';
var focus_ly = 'images/yzlove.swf';