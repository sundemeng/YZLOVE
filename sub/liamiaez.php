<?php 
//if ($err) {echo "发送邮件失败，原因：<br>";foreach($err as $a){echo $a."<br>";}}
/**************************************************
Copyright (C) 2008 　扬 州交友 网  择交友友 2.0
作  者: supdes　
Zeai2.0发邮件类 如需转载,请保留版权
**************************************************/
class zeaimail {
/* 	var $localhost;
	var $smtp_accname;
	var $smtp_password;
	var $smtp_host;
	var $from;
	var $fromname;
 */	function send($to, $subject = 'No subject', $body) {
	$localhost = $this->localhost;
	$smtp_accname = $this->smtp_accname;
	$smtp_password = $this->smtp_password;
	$smtp_host = $this->smtp_host;
	$from = $this->from;
	$fromname = $this->fromname;
	$lb = "\r\n";
	$headers = "Content-type: text/html;charset=\"gbk\"";
	$headers.= $lb;
	$headers.= "Content-Transfer-Encoding: base64";
	$hdr = explode($lb, $headers);
	if ($body) {
	$bdy = preg_replace("/^\./", "..", explode($lb, $body));}
	$smtp[] = array("EHLO ".$localhost.$lb, "220,250", "EHLO error: ");
	$smtp[] = array("AUTH LOGIN".$lb, "334", "AUTH error: ");
	$smtp[] = array(base64_encode($smtp_accname).$lb, "334", "AUTHENTIFICATION error: ");
	$smtp[] = array(base64_encode($smtp_password).$lb, "235", "AUTHENTIFICATION error: ");
	$smtp[] = array("MAIL FROM: <".$from.">".$lb, "250", "MAIL FROM error: ");
	$smtp[] = array("RCPT TO: <".$to.">".$lb, "250", "RCPT TO error: ");
	$smtp[] = array("DATA".$lb, "354", "DATA error: ");
	$smtp[] = array("From: ".$fromname." <".$from.">".$lb, "", "");
	$smtp[] = array("Subject: ".$subject.$lb, "", "");
	$smtp[] = array("To: ".$to.$lb, "", "");
	foreach ($hdr as $h) {
	$smtp[] = array($h.$lb, "", "");}
	$smtp[] = array($lb, "", "");
	if ($bdy) {
	foreach ($bdy as $b) {
	$smtp[] = array(base64_encode($b.$lb).$lb, "", "");}}
	$smtp[] = array(".".$lb, "250", "DATA(end)error: ");
	$smtp[] = array("QUIT".$lb, "221", "QUIT error: ");
	$fp = @fsockopen($smtp_host, 25);
	if (!$fp)
	return "Error: Cannot conect to '".$smtp_host."' by port 25";
	while ($result = @fgets($fp, 1024)) {
	if (substr($result, 3, 1) == " ") {
	break;}}
	$result_str;
	foreach ($smtp as $req) {
	@fputs($fp, $req[0]);
	if ($req[1]) {
	while ($result = @fgets($fp, 1024)) {
	if (substr($result, 3, 1) == " ") {
	break;}};
	if (!strstr($req[1], substr($result, 0, 3))) {
	$result_str[] = $req[2].$result;}}}
	@fclose($fp);
	return $result_str;}
	function setLocalhost($localhost) {$this->localhost = $localhost;}
	function setSmtp_accname($smtp_accname) {$this->smtp_accname = $smtp_accname;}
	function setSmtp_password($smtp_password) {$this->smtp_password = $smtp_password;}
	function setSmtp_host($smtp_host) {$this->smtp_host = $smtp_host;}
	function setFrom($from) {$this->from = $from;}
	function setFromName($fromname) {$this->fromname = $fromname;}
}
//unset
?>