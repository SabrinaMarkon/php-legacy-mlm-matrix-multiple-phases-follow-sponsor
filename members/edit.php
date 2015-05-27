<?php

session_start();

include "../header.php";
if ($userid<>"") {
	include "../configpost.php";
}
else {
    include "../config.php";
}
include "../style.php";

if( ($userid<>"")&&($password<>"") ) {

        include("navigation.php");
        include("../banners2.php");

            echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
	        ?>

	        <center>
            <p><font size=6>Edit My Details</font></p>
	        <form method="POST" action="editnow.php"><br>
	        First Name:<br><input type="text" name="Name" value="<? echo $name; ?>"><br>
                Last Name:<br><input type="text" name="lastname" value="<? echo $lastname; ?>"><br>
	        <input type="hidden" name="Userid" value="<? echo $userid; ?>">
	        Password:<br><input type="password" name="Password" value="<? echo $password; ?>"><br>
	        Password Verification:<br><input type="password" name="Password2" value="<? echo $password; ?>"><br>
	        Email:<br><input type="text" name="ContactEmail" value="<? echo $contact_email; ?>"><br>
<?php
$cq = "select * from countries order by country_id";
$cr = mysql_query($cq);
$crows = mysql_num_rows($cr);
if ($crows > 0)
{
?>
<br>Country:<br>
<select name="update_country">
<?php
	while ($crowz = mysql_fetch_array($cr))
	{
	$country_name = $crowz["country_name"];
?>
<option value="<?php echo $country_name ?>" <?php if ($country == $country_name) { echo "selected"; } ?>><?php echo $country_name ?></option>
<?php
	}
?>
</select>
<?php
}
?>
            <? if ($pay_with['paypal']) { ?>
	            Paypal:<br><input type="text" name="PaypalEmail" value="<? echo $paypal_email; ?>"><br>
                <? } ?>
	    <? if ($pay_with['payza']) { ?>
	            Payza:<br><input type="text" name="PayzaEmail" value="<? echo $payza_email; ?>"><br>
	            <? } ?>
	    <? if ($pay_with['egopay']) { ?>
	            EgoPay:<br><input type="text" name="EgoPayAccount" value="<? echo $egopay_account; ?>"><br>
	            <? } ?>
	    <? if ($pay_with['perfectmoney']) { ?>
	            Perfect Money:<br><input type="text" name="PerfectMoneyAccount" value="<? echo $perfectmoney_account; ?>"><br>
	            <? } ?>
	    <? if ($pay_with['okpay']) { ?>
	            OKPay:<br><input type="text" name="OKPayAccount" value="<? echo $okpay_account; ?>"><br>
	            <? } ?>
	    <? if ($pay_with['solidtrustpay']) { ?>
	            Solid Trust Pay:<br><input type="text" name="SolidTrustPayAccount" value="<? echo $solidtrustpay_account; ?>"><br>
	            <? } ?>
	    <? if ($pay_with['moneybookers']) { ?>
	            Moneybookers:<br><input type="text" name="MoneybookersEmail" value="<? echo $moneybookers_email; ?>"><br>
	            <? } ?>
            <br><br><br>

            <input type="hidden" name="oldemail" value="<? echo $contact_email; ?>">
	        <input type="submit" value="Update">
	        </form>
	        </center>
            <? if ($verified != 1) { ?>
            	<center><p>Your account is unverified, click this button to have your verification email resent.</p>
                <form method="POST" action="resendv.php">
                <input type="hidden" name="userid" value="<? echo $userid; ?>">
                <input type="hidden" name="email" value="<? echo $contact_email; ?>">
                <input type="submit" value="Resend">
	        	</form>
                </center>
            <? } else {?>		
			
			    <form method="POST" action="vacation.php?action=go">
                <input type="submit" value="Go on vacation">
	        	</form>
                </center>
			
	        <?
			  }
			  
         echo "</font></td></tr></table>";

	}
else
  { ?>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include "../footer.php";
mysql_close($dblink);
?>