<?php
/*
+--------------------------------+
+ 本后台程序版权属于本人所有
+ Author：林小先，lyixian@126.com www.linxiaoxian.com，QQ：6154041
+ 本文件最后修改日期：2010年1月
+ 如有修改，请保留本段信息，对您站没有影响
+--------------------------------+
*/
session_start();
/*
判断SESSION是否存在,不存在则是非法状态,跳转;
*/
if (empty($_SESSION['adminpass'])||empty($_SESSION['adminname']))
  {
  echo "<script language=javascript>location.href='login.php';</script>";//
  exit();
 }
?>
