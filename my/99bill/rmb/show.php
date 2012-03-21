<?PHP
/*
 * @Description: 快钱人民币支付网关接口范例
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
	
	<table width="700" height="65" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="199" height="65"><a href="../"><img src="../../../images/logo.gif" border="0" /></a></td>
        <td width="412" valign="bottom" style="font-size:10.3pt;font-weight:bold;padding-bottom:8px;">·支 付 中 心</td>
        <td width="89" valign="bottom" style="padding-bottom:8px;"><a href="../../../"><u><font color="B970A6"><b>交友网首页</b></font></u></a></td>
      </tr>
    </table>
	<table width="700" height="288" border="0" align="center" cellpadding="4" cellspacing="0" style="border:#EAC0F1 1px solid;">
      <tr>
        <td colspan="2" align="center" bgcolor="FDF5FE" style="padding-bottom:6px;"><table width="583" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" >
          <tr bgcolor="#FFFFFF">
            <td width="105" align="right" bgcolor="#FFFFFF">支付方式:</td>
            <td width="435" >快钱[99bill]</td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td align="right" bgcolor="#FFFFFF" >订单编号:</td>
            <td ><?php echo $orderId; ?></td>
          </tr>
          <tr bgcolor="#FFFFFF">
            <td align="right" bgcolor="#FFFFFF">订单金额:</td>
            <td><font color="#FF0000" style="font-family:Verdana, Arial, Helvetica, sans-serif">￥<strong><?php echo intval($orderAmount/100); ?></strong></font> 元。</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </table>
          <br>
            <br>
            <br>

        请速联系<a target="blank" href="http://wpa.qq.com/msgrd?V=1&Uin=7144100&amp;Site=都市情缘&Menu=yes"><img src="../../images/qq.gif" alt="点击发消息给客服QQ" border="0" /></a>QQ:8437645或发短信至：<strong>13862511478</strong>，申请开通。
          <br>
            <br>
        </td>
      </tr>
    </table>
    <script language="javascript" src="/ajax/zeai2kefu.js"></script>
</BODY>
</HTML>