<?php
/*
+--------------------------------+
+ 本程序原版权属于原作者
+ 修改人：林小先，lyixian@126.com www.linxiaoxian.com
+ 修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
function getip() {
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
		$onlineip = getenv('HTTP_CLIENT_IP');
	} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
		$onlineip = getenv('REMOTE_ADDR');
	} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	$onlineip = preg_replace("/^([\d\.]+).*/", "\\1", $onlineip);
	return $onlineip;
}
// date_format2($rs['time'],'%Y年%m月%d日%H时%M分%S秒');
function date_format2($string, $format='%b %e, %Y', $default_date=null)
{
    if (substr(PHP_OS,0,3) == 'WIN') {
           $_win_from = array ('%e',  '%T',       '%D');
           $_win_to   = array ('%#d', '%H:%M:%S', '%m/%d/%y');
           $format = str_replace($_win_from, $_win_to, $format);
    }
    if($string != '') {
        return strftime($format, smarty_make_timestamp($string));
    } elseif (isset($default_date) && $default_date != '') {
        return strftime($format, smarty_make_timestamp($default_date));
    } else {
        return;
    }
}
function smarty_make_timestamp($string){
    if(empty($string)) {
        $string = "now";
    }
    $time = strtotime($string);
    if (is_numeric($time) && $time != -1)
        return $time;
    if (PReg_match('/^\d{14}$/', $string)) {
        $time = mktime(substr($string,8,2),substr($string,10,2),substr($string,12,2),
               substr($string,4,2),substr($string,6,2),substr($string,0,4));

        return $time;
    }
    $time = (int) $string;
    if ($time > 0)
        return $time;
    else
        return time();
}

function callmsg ($v,$gourl) {
	switch ($gourl) {
	case "-1":
		echo "<html><title>提示：".$v."</title><body background=images/md2.gif><script Language=javascript>alert('".$v."');history.go(-1);</script></body></html>";
		break;
	case "0":
		echo "<script Language=javascript>alert('".$v."');</script></body></html>";
		echo "<Script language=Javascript>window.opener=null;window.close();</Script>";
		break;
	default: 
		echo "<script Language=javascript>alert('".$v."');window.location.href='".$gourl."';</script></body></html>";
		break;
	}
	exit;
}
function htmlout($str){
	$guest=$str;
	$guest=str_replace("&","&amp;",$guest);
	$guest=str_replace("  ","　",$guest);
	//$guest=str_replace(" ","&nbsp;",$guest);
	$guest=str_replace(" ","　",$guest);
	//$guest=htmlspecialchars($Guest);
	$guest=str_replace(">","&gt;",$guest);
	$guest=str_replace("<","&lt;",$guest);
	$guest=str_replace("\r\n","<br>",$guest);
	$guest=str_replace("'","&#039;",$guest);
	$guest=str_replace("\"","&quot;",$guest);
	return($guest);
}
function badstr ($str,$to='*') {
	global $Global;
	$from = $str;
	$rg_banname=$Global['m_badwords'];
	$rg_banname=explode(',',$rg_banname);
	foreach($rg_banname as $value){
		if(strpos($str,$value)!==false){
			//$from = strtr($str,$value,$to);
			$from = str_replace($value,$to,$from);
		}
	}
	return($from);
}
function mkpath($mkpath,$mode=0777){
    $path_arr=explode('/',$mkpath);
    foreach ($path_arr as $value){
        if(!empty($value)){
            if(empty($path))$path=$value;
            else $path.='/'.$value;
            is_dir($path) or mkdir($path,$mode) or chmod($path,$mode);
        }
    }
    if(is_dir($mkpath))return true;
    return false;
}
function daddslashes($string, $force = 0) {
	global $magic_quotes_gpc;
	if(!$GLOBALS['magic_quotes_gpc'] || $force || $magic_quotes_gpc) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}
function trimm ($str) {
	$str = trim(str_replace(" ","　",$str));
	//$str = str_replace("'","‘",$str);
	return $str;
}
function cdstr($length) {
	$possible = "0123456789";
	$str = "";
	while(strlen($str) < $length) $str .= substr($possible, (rand() % strlen($possible)), 1);
	return($str);
}
function cdstrletters($length) {
	$possible = "abcdefghijklmnopqrstuvwxyz";
	$str = "";
	while(strlen($str) < $length) $str .= substr($possible, (rand() % strlen($possible)), 1);
	return($str);
}
function cdnumletters($length) {
	$possible = "0123456789abcdefghijklmnopqrstuvwxyz";
	$str = "";
	while(strlen($str) < $length) $str .= substr($possible, (rand() % strlen($possible)), 1);
	return($str);
}
function gylsubstr($title,$length){
if($length!=0){
if (strlen($title)>$length) {
$temp = 0;
for($i=0;$i<$length;$i++)
if (ord($title[$i]) > 128)
$temp++;
if ($temp%2 == 0)
$title = substr($title,0,$length);
else
$title = substr($title,0,$length+1);
}return $title;
}else{return $title;}} 
function getgradetext($grade) {
	switch ($grade) {
	case 1:
		$string = "普通会员";
		break;
	case 2:
		$string = "诚信会员";
		break;
	case 3:
		$string = "钻石会员";
		break;
	case 10:
		$string = "管理员";
		break;
	default: 
		$string = "等级不明";
		break;
	}
	echo $string;
}
function geticon($str) {
	$string = $str;
	global $Global;
	switch ($string) {
	case 11:
		$showalt = '普通会员';
		break;
	case 21:
		$showalt = '普通会员';
		break;
	case 12:
		$showalt = '诚信会员';
		break;
	case 22:
		$showalt = '诚信会员';
		break;
	case 13:
		$showalt = '钻石会员';
		break;
	case 23:
		$showalt = '钻石会员';
		break;
	case 110:
		$showalt = '管理员';
		break;
	case 210:
		$showalt = '管理员';
		break;
	}
	$icon = "<img src=".$Global['www_2domain']."/images/grade/".$string.".gif hspace=4 align=absmiddle border=0 title=$showalt>";
	echo $icon;
}
function echoicon($str) {
	$string = $str;
	global $Global;
	switch ($string) {
	case 11:
		$showalt = '普通会员';
		break;
	case 21:
		$showalt = '普通会员';
		break;
	case 12:
		$showalt = '诚信会员';
		break;
	case 22:
		$showalt = '诚信会员';
		break;
	case 13:
		$showalt = '钻石会员';
		break;
	case 23:
		$showalt = '钻石会员';
		break;
	case 110:
		$showalt = '管理员';
		break;
	case 210:
		$showalt = '管理员';
		break;
	}
	$icon = "<img src=".$Global['www_2domain']."/images/grade/".$string.".gif hspace=4 align=absmiddle border=0 title=$showalt>";
	return $icon;
}
?>