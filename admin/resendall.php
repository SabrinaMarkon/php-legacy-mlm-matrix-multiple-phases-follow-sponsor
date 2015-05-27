<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$userid = $_POST['userid'];
$email = $_POST['email'];

if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td  valign="top" align="center"><br><br> <?

    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

		$query = "SELECT userid, contact_email FROM members WHERE verified = '0'";
		$result = mysql_query ($query);
		$count = mysql_num_rows($result);
		
			$headers .= "From: $sitename<$adminemail>\n";
			$headers .= "Reply-To: <$adminemail>\n";
			$headers .= "X-Sender: <$adminemail>\n";
			$headers .= "X-Mailer: PHP4\n";
			$headers .= "X-Priority: 3\n";
			$headers .= "Return-Path: <$adminemail>\n";
		
		while($each = mysql_fetch_array($result)) {
		
			$message = "Hello,\n\n"
	               ."Please verify your email address by clicking this link ".$domain."/verify.php?userid=".$each['userid']."&email=".$each['contact_email']."\n\n"
		           ."Thank you!\n\n\n"
		           .$sitename." Admin\n"
		           .$adminemail."\n\n\n\n";



			@mail($each['contact_email'], "[".$sitename."] Email Verification", wordwrap(stripslashes($message)),$headers, "-f$adminemail");
		
		}

    	echo "<br><center><p>A verification email has been sent to ".$count." members.</p></center></td></tr></table>";
	}
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>