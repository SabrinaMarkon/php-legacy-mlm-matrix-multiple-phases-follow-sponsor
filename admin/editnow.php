<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$useridpp = $_POST['userid'];
$passwordp = $_POST['password'];
$namep = $_POST['name'];
$lastnamep = $_POST['lastname'];
$contact_emailp = $_POST['contact_email'];
$subscribed_emailp = $_POST['subscribed_email'];
$paypal_emailp = $_POST['paypal_email'];
$payza_emailp = $_POST['payza_email'];
$egopay_accountp = $_POST["egopay_account"];
$perfectmoney_accountp = $_POST["perfectmoney_account"];
$okpay_accountp = $_POST["okpay_account"];
$solidtrustpay_accountp = $_POST["solidtrustpay_account"];
$moneybookers_emailp = $_POST['moneybookers_email'];
$statusp = $_POST['status'];
$referidp = $_POST['referid'];
$commissionp = $_POST['commission'];
$pointsp = $_POST['points'];
$surfcreditsp = $_POST['surfcredits'];
$vacationp = $_POST["vacation"];
$vacationold = $_POST["vacationold"];
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td  valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
	// errorchecking first:

	if (empty($password)) {
		echo "Error! Password field is empty.";
        ?>
            <center>
	        <form method="POST" action="edit.php">
	        <input type="hidden" name="userid" value="<? echo $userid; ?>">
            <input type="submit" value="Go Back">
	        </form>
	        </center>
	    <?
	    exit;
	    }
    if (empty($name)) {
        echo "Error! Name field is empty.";
        ?>
            <center>
	        <form method="POST" action="edit.php">
	        <input type="hidden" name="userid" value="<? echo $userid; ?>">
            <input type="submit" value="Go Back">
	        </form>
	        </center>
	    <?
        exit;
        }


   	$query = "UPDATE members SET ";
   	$query .= "name='$namep',lastname='$lastnamep',pword='$passwordp',contact_email='$contact_emailp',paypal_email='$paypal_emailp',";
   	$query .= "subscribed_email='$contact_emailp',payza_email='$payza_emailp',egopay_account='$egopay_accountp',perfectmoney_account='$perfectmoney_accountp',okpay_account='$okpay_accountp',solidtrustpay_account='$solidtrustpay_accountp',moneybookers_email='$moneybookers_emailp',";
   	$query .= "commission='$commissionp', points='$pointsp', surfcredits='$surfcreditsp', referid='$referidp' ";
   	$query .= "WHERE userid = '$useridpp'";
    $result = mysql_query ($query)
    	or die ("failed");
if ($vacationold != $vacationp)
	{
$q = "update members set vacation='$vacationp', vacation_date = '".time()."' where userid='$useridpp'";
$r = mysql_query($q);
	}

   	echo "<center>User Updated.</center>";
    ?>
    <center>
	<form method="POST" action="view.php">
    <input type="submit" value="Go Back">
	</form>
	</center>
	<?
    echo "</td></tr></table>";
}
else
	{
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>