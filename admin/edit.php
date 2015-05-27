<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$useridp = $_POST['userid'];

if( session_is_registered("alogin") ) {

    $query = "SELECT * FROM members where userid='".$useridp."'";

    $result = mysql_query ($query)
	         or die ("Query failed");
	while ($line = mysql_fetch_array($result)) {
$namep = $line["name"];
$lastnamep = $line["lastname"];
$contact_emailp = $line["contact_email"];
$subscribed_emailp = $line["subscribed_email"];
$passwordp = $line["pword"];
$verifiedp = $line["verified"];
$referidp= $line["referid"];
$pointsp= $line["points"];
$commissionp= $line["commission"];
$memtypep = $line["memtype"];
if ($memtypep == "SUPER JV")
{
$nicememtype = $toplevel;
}
if ($memtypep == "JV Member")
{
$nicememtype = $middlelevel;
}
if (($memtypep != "SUPER JV") and ($memtypep != "JV Member"))
{
$nicememtype = $lowerlevel;
}
$paypal_emailp = $line["paypal_email"];
$payza_emailp = $line["payza_email"];
$egopay_accountp = $line["egopay_account"];
$perfectmoney_accountp = $line["perfectmoney_account"];
$okpay_accountp = $line["okpay_account"];
$solidtrustpay_accountp = $line["solidtrustpay_account"];
$moneybookers_emailp = $line["moneybookers_email"];
$surfcreditsp = $line["surfcredits"];
$vacationp = $line["vacation"];
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td  valign="top" align="center"><br><br> <?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        ?>

            <center>
	        <form method="POST" action="editnow.php">
            Userid:&nbsp;<font color=BLUE><b><? echo $userid; ?></b></font><br><br>
            <input type="hidden" name="userid" value="<? echo $useridp; ?>">
	        Name:<br><input type="text" name="name" value="<? echo $namep; ?>"><br>
            Last Name:<br><input type="text" name="lastname" value="<? echo $lastnamep; ?>"><br>
	        Password:<br><input type="text" name="password" value="<? echo $passwordp; ?>"><br>
	        Email:<br><input type="text" name="contact_email" value="<? echo $contact_emailp; ?>"><br>
            Referid:<br><input type="text" name="referid" value="<? echo $referidp; ?>"><br>
 <? if ($paypal<>"") { ?>
	        Paypal:<br><input type="text" name="paypal_email" value="<?echo $paypal_emailp; ?>">
<? }
		  if ($adminpayza<>"") { ?><br>
			Payza:<br><input type="text" name="payza_email" value="<?echo $payza_emailp; ?>">
<? }
		  if (($egopay_store_id<>"") and ($egopay_store_password<>"")) { ?><br>
			EgoPay:<br><input type="text" name="egopay_account" value="<?echo $egopay_accountp; ?>">
<? }
		  if ($adminperfectmoney<>"") { ?><br>
			Perfect Money:<br><input type="text" name="perfectmoney_account" value="<?echo $perfectmoney_accountp; ?>">
<? }
		  if ($adminokpay<>"") { ?><br>
			OKPay:<br><input type="text" name="okpay_account" value="<?echo $okpay_accountp; ?>">
<? }
		  if ($adminsolidtrustpay<>"") { ?><br>
			Solid Trust Pay:<br><input type="text" name="solidtrustpay_account" value="<?echo $solidtrustpay_accountp; ?>">
<? }
		  if ($adminmoneybookers<>"") { ?><br>
			Moneybookers:<br><input type="text" name="moneybookers_email" value="<?echo $moneybookers_emailp; ?>"><? } ?>
<br>	
			Commission owed:<br><input type="text" name="commission" value="<? echo $commissionp; ?>"><br>
            Points:<br><input type="text" name="points" value="<? echo $pointsp; ?>"><br>
			Surf Credits:<br><input type="text" name="surfcredits" value="<? echo $surfcreditsp; ?>"><br>
<br>
Vacation: <select name="vacation"><option value="1" <?php if ($vacationp == "1") { echo "selected"; } ?>>ON</option>
<option value="0" <?php if ($vacationp != "1") { echo "selected"; } ?>>OFF</option></select>
<input type="hidden" name="vacationold" value="<?php echo $vacationp ?>"><br><br>
            Membership Type:&nbsp;<font color=BLUE><b>
            <? echo $nicememtype; ?></b></font>
            <br>
    Verified:  <? if ($verifiedp == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($verifiedp == 0) {
	                          echo "Not yet";
	                       }
	                       	                    ?>
            <br>
	        <br><input type="submit" value="Save">
	        </form>
      <? if ($memtypep=="PRO") { ?>


	            <form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="JV MEMBER">


                <input type="submit" value="Upgrade to <?php echo $middlelevel ?> Member">


	            <br>


	            </form>


				 <form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="SUPER JV">


                <input type="submit" value="Upgrade to <?php echo $toplevel ?> Member">


	            <br>


	            </form>
				
				<?


            } elseif ($memtypep=="SUPER JV") { ?>


				<form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="PRO">


                <input type="submit" value="Set to <?php echo $lowerlevel ?>">


	            <br>


	            </form>
			
			
	            <form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="JV MEMBER">


                <input type="submit" value="Set to <?php echo $middlelevel ?> Member">


	            <br>


	            </form>

				
				<?


            }


            else { ?>


	            <form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="PRO">


                <input type="submit" value="Set to <?php echo $lowerlevel ?>">


	            <br>


	            </form> <form method="POST" action="upgradenow.php">


	            <input type="hidden" name="userid" value="<? echo $userid; ?>">


                <input type="hidden" name="memtype" value="SUPER JV">


                <input type="submit" value="Upgrade to <?php echo $toplevel ?> Member">


	            <br>


	            </form> <?


            }


              ?>





	              <form method=POST action=deletethismember.php>


	              <input type="hidden" name="userid" value="<? echo $userid; ?>">


	              <input type="submit" value="Delete">


	              </form>


            </center>


	    <?


    }


     echo "</td></tr></table>";


    }


else  {


	echo "Unauthorised Access!";


    }





include "../footer.php";


mysql_close($dblink);


?>