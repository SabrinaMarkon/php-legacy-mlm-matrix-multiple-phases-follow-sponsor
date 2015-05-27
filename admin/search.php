<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$userid = $_POST['userid'];

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td  valign="top" align="center"><br><br> <?

    	echo "<font size=4 face='$fonttype' color='$fontcolour'><p>Search For Members<center>";?>
	        <center><?

$query = "SELECT ip, COUNT(ip) AS NumOccurrences FROM members GROUP BY ip HAVING ( COUNT(ip) > 1 )";


$result = mysql_query ($query)
	     or die ("Query failed");

?>
<table align=center><tr>
           <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>Multiple Ip Addresses</font></center></td></tr></table>

<?

  while ($line = mysql_fetch_array($result)) {
		        $userid = $line["userid"];
	           $ip = $line["ip"];
     
?>
<table><tr>
                 <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $ip; ?></font></center></td>
</tr></table>
<?

}
   
?>
	        <form method="POST" action="searchnow.php">
            <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
	        Userid:<br><input type="text" name="userid" maxLength="50" size="40" value=""><br>
	        Name:<br><input type="text" name="name" maxLength="50" size="40" value=""><br>
                Last Name:<br><input type="text" name="lastname" maxLength="50" size="40" value=""><br>
	        Contact Email:<br><input type="text" name="contactemail" maxLength="50" size="40" value=""><br>
            Refered By:<br><input type="text" name="refered" maxLength="20" size="40" value=""><br>
   IP Address:<br><input type="text" name="ip" maxLength="30" size="40" value=""><br>


            <? if ($paypal <> "") { ?>
	            Paypal:<br><input type="text" name="paypalemail" maxLength="50" size="40" value="">
	         <? }
		  if ($adminpayza<>"") { ?><br>
			Payza:<br><input type="text" name="payza_email" maxLength="50"  size="40" value="">
<? }
		  if (($egopay_store_id<>"") and ($egopay_store_password<>"")) { ?><br>
			EgoPay:<br><input type="text" name="egopay_account" maxLength="50"  size="40" value="">
<? }
		  if ($adminperfectmoney<>"") { ?><br>
			Perfect Money:<br><input type="text" name="perfectmoney_account" maxLength="50"  size="40" value="">
<? }
		  if ($adminokpay<>"") { ?><br>
			OKPay:<br><input type="text" name="okpay_account" maxLength="50"  size="40" value="">
<? }
		  if ($adminsolidtrustpay<>"") { ?><br>
			Solid Trust Pay:<br><input type="text" name="solidtrustpay_account" maxLength="50"  size="40" value="">
<? }
		  if ($adminmoneybookers<>"") { ?><br>
			Moneybookers:<br><input type="text" name="moneybookers_email" maxLength="50"  size="40" value=""><br><? } ?><br>
				Membership type:<br>
                <select name="memtype">
                              <option></option>
	              <option value="PRO"><?php echo $lowerlevel ?></option>
	              <option value="JV Member"><?php echo $middlelevel ?></option>
                              <option value="SUPER JV"><?php echo $toplevel ?></option>
            </select>
	        <br><input type="submit" value="Search">
	        </form>
            </font>
	        </center>
        </td>
      	</tr>
    	</table>
	    <?
    }

else {
 	echo "Unauthorised Access!";
}


include "../footer.php";
mysql_close($dblink);
?>