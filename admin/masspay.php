<?php

session_start();
include "../config.php";

if( session_is_registered("alogin") ) {
if(count($pay_with) == 1) {

if($pay_with['paypal'] == 1) $gateway = 'paypal';
if($pay_with['payza'] == 1) $gateway = 'payza';
if($pay_with['egopay'] == 1) $gateway = 'egopay';
if($pay_with['perfectmoney'] == 1) $gateway = 'perfectmoney';
if($pay_with['okpay'] == 1) $gateway = 'okpay';
if($pay_with['solidtrustpay'] == 1) $gateway = 'solidtrustpay';
if($pay_with['moneybookers'] == 1) $gateway = 'moneybookers';

$query = "select * from members where commission>0 and ".$gateway."_email != ''";
$result = mysql_query ($query)
	or die ("Query failed");
	
if(@mysql_num_rows($result)) {

	header("Content-type: text/plain" );

	   if(preg_match('/msie|(microsoft internet explorer)/i', $_SERVER['HTTP_USER_AGENT']))
	   {
	      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	      header('Pragma: public');
	   }
	   else header('Pragma: no-cache');
	   
	header('Content-Disposition: attachment; filename="masspay-'.date("Y-m-d").'.txt"');
	
	while($each = mysql_fetch_array($result)) {
		echo $each[$gateway.'_email']."	".$each['commission']."	USD	".$each['userid']." ".$sitename." Commissions\r\n";
	}


} else echo "No commission found!";

} else echo "You need to select one 1 payment method.";

  }
else
	echo "Unauthorised Access!";
?>