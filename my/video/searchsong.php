<?php
require_once '../../sub/init.php';
require_once YZLOVE.'sub/conn.php';
//$key=request("key",2,2);
if(empty($key)){
	$rt = $db->query("SELECT id,okName,movie1,Singer FROM oklist ORDER BY IsGood DESC,id DESC");
	$total = $db->num_rows($rt);
	echo "count=".$total;
	if($total>0){
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			echo "&mid".$i."=".$rows['id']."&songname".$i."=".$rows['okName']."-".$rows['Singer']."&songurl".$i."=".$rows['movie1'];
		}
	}

}else{
	$rt = $db->query("SELECT id,okName,movie1,Singer FROM oklist WHERE okName LIKE '%".$key."%' OR Singer LIKE '%".$key."%' ORDER BY id DESC");
	$total = $db->num_rows($rt);
	echo "count=".$total;
	if($total>0){
		for($i=1;$i<=$total;$i++) {
			$rows = $db->fetch_array($rt);
			if(!$rows) break;
			echo "&mid".$i."=".$rows['id']."&songname".$i."=".$rows['okName']."-".$rows['Singer']."&songurl".$i."=".$rows['movie1'];
		}
	}
}
function request($str,$types,$num){
	if($types==1){
		if(isset($_GET[$str]))
			$str1=$_GET[$str];
		if(empty($str1))
			$str1=null;
	}elseif($types==2){
		if(isset($_POST[$str]))
			$str1=$_POST[$str];
		if(empty($str1))
			$str1=null;
	}
	if($num==1){
		if(empty($str1)||!is_numeric($str1)){
			echo $str." Not is Num!";
			exit();
		}else{
			$str1=floor($str1);
		}
	}
	return $str1;
}
/**************************************************
Copyright (C) 2008 　扬 州交友 网  择交友友 2.0
作  者: supdes　
**************************************************/
?>