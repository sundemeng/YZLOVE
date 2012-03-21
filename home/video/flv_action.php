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
$fms_ip = $Global['m_siteurl'];
$weburl= $Global['home_2domain']."/video";
$user_id=1;
//以下部份请不要改动，否则会发生异常
$user_name = "YZLOVE";
if($_GET['action']=="get_user_id"){
	echo "fcs_host=".$fms_ip."&action_host=".$weburl."&end=1&copyright=www.zeai.cn,www.yzlove.com";
}
ob_end_flush();
?>