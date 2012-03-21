<?PHP
require_once "../../../sub/init.php";
require_once YZLOVE.'sub/conn.php';
if ( !ereg("^[0-9]{1,8}$",$cook_userid) || empty($cook_userid)){header("Location: ".$Global['www_2domain']."/login.php");exit;} else {$cook_password = trimm($cook_password);$rt = $db->query("SELECT email FROM ".__TBL_MAIN__." WHERE id='$cook_userid' AND password='$cook_password' AND flag>0");if ($db->num_rows($rt)) {$row = $db->fetch_array($rt);} else {header("Location: ".$Global['www_2domain']."/login.php");exit;}}
//人民币网关账户号
///请登录快钱系统获取用户编号，用户编号后加01即为人民币网关账户号。
$merchantAcctId="  ";
//人民币网关密钥
///区分大小写.请与快钱联系索取
$key=" ";
//字符集.固定选择值。可为空。
///1代表UTF-8; 2代表GBK; 3代表gb2312
$inputCharset="3";
//服务器接受支付结果的后台地址.与[pageUrl]不能同时为空。必须是绝对地址。
///快钱通过服务器连接的方式将交易结果发送到[bgUrl]对应的页面地址，在商户处理完成后输出的<result>如果为1，页面会转向到<redirecturl>对应的地址。
///如果快钱未接收到<redirecturl>对应的地址，快钱将把支付结果GET到[pageUrl]对应的页面。
$bgUrl= $Global['my_2domain']."/99bill/rmb/receive.php";
$version="v2.0";
///1代表中文；2代表英文
$language="1";
///1代表MD5签名
$signType="1";	
//支付人姓名
///可为中文或英文字符
$payerName=$payerName;
//支付人联系方式类型.固定选择值
///只能选择1
///1代表Email
$payerContactType="1";	
//支付人联系方式
///只能选择Email或手机号
$payerContact=htmlout(stripslashes($row['email']));
//商户订单号
///由字母、数字、或[-][_]组成
$orderId=$orderId;		
//订单金额
///以分为单位，必须是整型数字
///比方2，代表0.02元
$orderAmount=$orderAmount*100;//1元
//订单提交时间
///14位数字。年[4位]月[2位]日[2位]时[2位]分[2位]秒[2位]
///如；20080101010101
$orderTime=date('YmdHis');
//商品名称
///可为中文或英文字符
$productName=$productName;
//商品数量
///可为空，非空时必须为数字
$productNum="1";
//商品代码
///可为字符或者数字
$productId="";
//商品描述
$productDesc="";
//扩展字段1
///在支付结束后原样返回给商户
$ext1="";
//扩展字段2
///在支付结束后原样返回给商户
$ext2="";
//支付方式.固定选择值
///只能选择00、10、11、12、13、14
///00：组合支付（网关支付页面显示快钱支持的各种支付方式，推荐使用）10：银行卡支付（网关支付页面只显示银行卡支付）.11：电话银行支付（网关支付页面只显示电话支付）.12：快钱账户支付（网关支付页面只显示快钱账户支付）.13：线下支付（网关支付页面只显示线下支付方式）
$payType="00";
//同一订单禁止重复提交标志
///固定选择值： 1、0
///1代表同一订单号只允许提交1次；0表示同一订单号在没有支付成功的前提下可重复提交多次。默认为0建议实物购物车结算类商户采用0；虚拟产品类商户采用1
$redoFlag="0";
//快钱的合作伙伴的账户号
///如未和快钱签订代理合作协议，不需要填写本参数
$pid=""; ///合作伙伴在快钱的用户编号
//生成加密签名串
///请务必按照如下顺序和规则组成加密串！
	$signMsgVal=appendParam($signMsgVal,"inputCharset",$inputCharset);
	$signMsgVal=appendParam($signMsgVal,"bgUrl",$bgUrl);
	$signMsgVal=appendParam($signMsgVal,"version",$version);
	$signMsgVal=appendParam($signMsgVal,"language",$language);
	$signMsgVal=appendParam($signMsgVal,"signType",$signType);
	$signMsgVal=appendParam($signMsgVal,"merchantAcctId",$merchantAcctId);
	$signMsgVal=appendParam($signMsgVal,"payerName",$payerName);
	$signMsgVal=appendParam($signMsgVal,"payerContactType",$payerContactType);
	$signMsgVal=appendParam($signMsgVal,"payerContact",$payerContact);
	$signMsgVal=appendParam($signMsgVal,"orderId",$orderId);
	$signMsgVal=appendParam($signMsgVal,"orderAmount",$orderAmount);
	$signMsgVal=appendParam($signMsgVal,"orderTime",$orderTime);
	$signMsgVal=appendParam($signMsgVal,"productName",$productName);
	$signMsgVal=appendParam($signMsgVal,"productNum",$productNum);
	$signMsgVal=appendParam($signMsgVal,"productId",$productId);
	$signMsgVal=appendParam($signMsgVal,"productDesc",$productDesc);
	$signMsgVal=appendParam($signMsgVal,"ext1",$ext1);
	$signMsgVal=appendParam($signMsgVal,"ext2",$ext2);
	$signMsgVal=appendParam($signMsgVal,"payType",$payType);	
	$signMsgVal=appendParam($signMsgVal,"redoFlag",$redoFlag);
	$signMsgVal=appendParam($signMsgVal,"pid",$pid);
	$signMsgVal=appendParam($signMsgVal,"key",$key);
$signMsg= strtoupper(md5($signMsgVal));
	
	//功能函数。将变量值不为空的参数组成字符串
	Function appendParam($returnStr,$paramId,$paramValue){

		if($returnStr!=""){
			
				if($paramValue!=""){
					
					$returnStr.="&".$paramId."=".$paramValue;
				}
			
		}else{
		
			If($paramValue!=""){
				$returnStr=$paramId."=".$paramValue;
			}
		}
		
		return $returnStr;
	}
	//功能函数。将变量值不为空的参数组成字符串。结束
	
?>

<!doctype html public "-//w3c//dtd html 4.0 transitional//en" >
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=gb2312" >
	</head>
	<link href="../../my.css" rel="stylesheet" type="text/css">
	<style type="text/css"> 
font,td{font-family:Verdana;font-size:12px}
	</style>
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
        <td colspan="2" align="center" bgcolor="FDF5FE" style="padding-bottom:6px;"><br>
          <br>
            <br>
          <table width="438" border="0" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC" >
			<tr bgcolor="#FFFFFF">
				<td width="80" align="right" bgcolor="#FFFFFF">支付方式:</td>
				<td >快钱[99bill]</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF" >订单编号:</td>
				<td ><?php echo $orderId; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">订单金额:</td>
				<td style="font-size:14px"><font color="#FF0000" style="font-family:Verdana, Arial, Helvetica, sans-serif">￥<strong><?php echo intval($orderAmount/100); ?></strong></font> 元。</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">支 付 人:</td>
				<td><?php echo $payerName; ?></td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align="right" bgcolor="#FFFFFF">商品名称:</td>
				<td><?php echo $productName; ?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
	  </table>
          <br>
          <form name="kqPay" method="post" action="https://www.99bill.com/gateway/recvMerchantInfoAction.htm">
			<input type="hidden" name="inputCharset" value="<?php echo $inputCharset; ?>"/>
			<input type="hidden" name="bgUrl" value="<?php echo $bgUrl; ?>"/>
			<input type="hidden" name="version" value="<?php echo $version; ?>"/>
			<input type="hidden" name="language" value="<?php echo $language; ?>"/>
			<input type="hidden" name="signType" value="<?php echo $signType; ?>"/>
			<input type="hidden" name="signMsg" value="<?php echo $signMsg; ?>"/>
			<input type="hidden" name="merchantAcctId" value="<?php echo $merchantAcctId; ?>"/>
			<input type="hidden" name="payerName" value="<?php echo $payerName; ?>"/>
			<input type="hidden" name="payerContactType" value="<?php echo $payerContactType; ?>"/>
			<input type="hidden" name="payerContact" value="<?php echo $payerContact; ?>"/>
			<input type="hidden" name="orderId" value="<?php echo $orderId; ?>"/>
			<input type="hidden" name="orderAmount" value="<?php echo $orderAmount; ?>"/>
			<input type="hidden" name="orderTime" value="<?php echo $orderTime; ?>"/>
			<input type="hidden" name="productName" value="<?php echo $productName; ?>"/>
			<input type="hidden" name="productNum" value="<?php echo $productNum; ?>"/>
			<input type="hidden" name="productId" value="<?php echo $productId; ?>"/>
			<input type="hidden" name="productDesc" value="<?php echo $productDesc; ?>"/>
			<input type="hidden" name="ext1" value="<?php echo $ext1; ?>"/>
			<input type="hidden" name="ext2" value="<?php echo $ext2; ?>"/>
			<input type="hidden" name="payType" value="<?php echo $payType; ?>"/>
			<input type="hidden" name="redoFlag" value="<?php echo $redoFlag; ?>"/>
			<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
			<input type="submit" name="submit" value="开始支付" class=button>
	  </form>
            <br> <br>
        </td></tr>
    </table>
	<div align="center">
		
	</div>

	<div align="center" style="font-size=12px;font-weight: bold;color=red;">
				
	</div>
	
</BODY>
</HTML>