<?php
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
if ( !preg_match("^[0-9]{1,9}$",$_COOKIE['cook_userid']) || empty($_COOKIE['cook_userid'])){header("Location: ../login.php");exit;}
$fromurl = $_SERVER['REQUEST_URI'];
$fromurlarr = explode('?',$fromurl);
if (empty($fromurlarr[1]) && empty($fromurlarr[1])){
	$url = 'mainmy.php';
} else {
	if (empty($fromurlarr[2])){
	$url = $fromurlarr[1];
	} else {
		$url = $fromurlarr[1].'?'.$fromurlarr[2];
	}
	if (!empty($url)){
	$iffromurl = strpos($url,".php");
		if (!$iffromurl){
			echo $url;
			sleep(5);
			exit;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="gb2312">
<head>
<meta http-equiv="ContentType" content="text/html; charset=gb2312" />
<meta http-equiv="contentlanguage" content="gb2312" />
<title><?php echo $_COOKIE['m_sitename'].'　'.$_COOKIE['cook_nickname'].'的管理中心'; ?></title>
</head>
<frameset rows="82,*" cols="*" frameborder="no" border="0" framespacing="0">
	<frame src="topmy.php" name="topframe" scrolling="no" noresize="noresize" id="topframe" title="leftframe"></frame>
	<frameset cols="173,*" frameborder="no" border="0" framespacing="0">
		<frame src="leftmy.php" name="leftframe" scrolling="yes" noresize="noresize" id="leftframe" title="leftframe"></frame>
		<frame src="<?php echo $url;?>" name="mainframe" scrolling="yes" id="mainframe" title="mainframe" style="padding-right:5px;"></frame>
	</frameset>
</frameset>
<noframes><body>
请使用IE浏览器!
</body>
</noframes></html>