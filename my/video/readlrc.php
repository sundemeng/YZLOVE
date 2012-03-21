<?php 
/*
+--------------------------------+
+ 本后台程序修改版权属于本人所有
+ Modified Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
require_once '../../sub/init.php';
require_once YZLOVE.'sub/conn.php';
$rt = $db->query("SELECT geci FROM oklist WHERE id=".$id);
if($db->num_rows($rt)) {
	$row = $db->fetch_array($rt);
	echo $row['geci'];
}
?>