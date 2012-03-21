<?php
/**************************************************
Copyright (C) 2008 　扬州交友 网  择交友友 2.0
作  者: supdes　
**************************************************/
function SingleDecToHex($dec){  
$tmp="";  
$dec=$dec%16;  
if($dec<10) return $tmp.$dec;  
$arr=array("A","B","C","D","E","F");  
return $tmp.$arr[$dec-10];}  
function SetToHexString($str){
if(!$str) return false;  
$tmp="";  
for($i=0;$i<strlen($str);$i++){  
$ord=ord($str[$i]);  
$tmp.=SingleDecToHex(($ord-$ord%16)/16);  
$tmp.=SingleDecToHex($ord%16);  
}return $tmp;}  
function qianqian_code($str){  
$s=strtolower($str);
$s=str_replace(" ","",$s);
$s=str_replace("'","",$s);
return SetToHexString(iconv('GBK','UTF-16LE',$s));}  
function conv($num){  
$tp = bcmod($num,4294967296);  
if(bccomp($num,0)>=0 && bccomp($tp,2147483648)>0)  
$tp=bcadd($tp,-4294967296);  
if(bccomp($num,0)<0 && bccomp($tp,2147483648)<0)  
$tp=bcadd($tp,4294967296);  
return $tp;}  
function CodeFunc($Id,$artist,$title){  
$Id=(int)$Id;  
$utf8Str=SetToHexString(iconv('GBK','UTF-8',$artist.$title));  
$length=strlen($utf8Str)/2;  
for($i=0;$i<=$length-1;$i++)  
eval('$song['.$i.'] = 0x'.substr($utf8Str,$i*2,2).';');  
$tmp2=0;  
$tmp3=0;  
$tmp1 = ($Id & 0x0000FF00) >> 8;
if ( ($Id & 0x00FF0000) == 0 ) {  
$tmp3 = 0x000000FF & ~$tmp1;
} else {  
$tmp3 = 0x000000FF & (($Id & 0x00FF0000) >> 16);}  
$tmp3 = $tmp3 | ((0x000000FF & $Id) << 8);
$tmp3 = $tmp3 << 8;
$tmp3 = $tmp3 | (0x000000FF & $tmp1);
$tmp3 = $tmp3 << 8; //tmp3 0x18015F00  
if ( ($Id & 0xFF000000) == 0 ) {  
$tmp3 = $tmp3 | (0x000000FF & (~$Id));
} else {  
$tmp3 = $tmp3 | (0x000000FF & ($Id >> 24));
}  
$i=$length-1;  
while($i >= 0){  
$char = $song[$i];  
if($char >= 0x80) $char = $char - 0x100;  
$tmp1 = ($char + $tmp2) & 0x00000000FFFFFFFF;  
$tmp2 = ($tmp2 << ($i%2 + 4)) & 0x00000000FFFFFFFF;  
$tmp2 = ($tmp1 + $tmp2) & 0x00000000FFFFFFFF;  
$i -= 1;}  
$i=0;  
$tmp1=0;  
while($i<=$length-1){  
$char = $song[$i];  
if($char >= 128) $char = $char - 256;  
$tmp7 = ($char + $tmp1) & 0x00000000FFFFFFFF;  
$tmp1 = ($tmp1 << ($i%2 + 3)) & 0x00000000FFFFFFFF;  
$tmp1 = ($tmp1 + $tmp7) & 0x00000000FFFFFFFF;  
$i += 1;}  
$t = conv($tmp2 ^ $tmp3);  
$t = conv(($t+($tmp1 | $Id)));  
$t = conv(bcmul($t , ($tmp1 | $tmp3)));  
$t = conv(bcmul($t , ($tmp2 ^ $Id)));  
if(bccomp($t , 2147483648)>0)  
$t = bcadd($t ,- 4294967296);  
return $t;

}  
//$artist="扬州";  
//$title="交友网";  
$artist = $_GET['zz'];
$title = $_GET['gm'];
$doc = new DOMDocument();
$doc->load("http://lrccnc.ttplayer.com/dll/lyricsvr.dll?sh?Artist=".qianqian_code($artist)."&Title=".qianqian_code($title)."&Flags=0");
$lrcNode = $doc->getElementsByTagName("lrc");
foreach($lrcNode as $lrc){  
$id=$lrc->getAttribute("id");
$artist=iconv('UTF-8','GBK',$lrc->getAttribute("artist"));  
$title=iconv('UTF-8','GBK',$lrc->getAttribute("title"));  
$code=CodeFunc($id,$artist,$title);  
$lrcstr=@iconv('UTF-8','GBK',@file_get_contents("http://lrccnc.ttplayer.com/dll/lyricsvr.dll?dl?Id=".$id."&Code=".$code));  
echo $lrcstr;
break;}
?> 
