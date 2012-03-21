<?PHP
/*
 * @Description: 快钱神州行支付网关接口范例
 * @Copyright (c) 上海快钱信息服务有限公司
 * @version 2.0
 */

/*
在本文件中，商家应从数据库中，查询到订单的状态信息以及订单的处理结果。给出支付人响应的提示。

本范例采用最简单的模式，直接从receive页面获取支付状态提示给用户。
*/

$orderId=trim($_REQUEST['orderId']);
$orderAmount=trim($_REQUEST['orderAmount']);
$msg=trim($_REQUEST['msg']);


?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en" >
<html>
	<head>
		<title>快钱支付结果</title>
		<meta http-equiv="content-type" content="text/html; charset=gb2312" >
	</head>
	
<BODY>
	
	<div align="center">
		<table width="259" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC" >
			<tr bgcolor="#FFFFFF">
				<td width="80">支付方式:</td>
				<td >快钱[99bill]</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td >订单编号:</td>
				<td ><?php echo $orderId; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td>订单金额:</td>
				<td><?php echo ($orderAmount)."分"; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td>支付结果:</td>
				<td><?php echo $msg; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
	  </table>
	</div>

</BODY>
</HTML>