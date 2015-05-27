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

	if (empty($userid)) {
		echo "Invalid link";
	}
	if (empty($email)) {
		echo "Invalid link";
	}

		$message = "Hello,\n\n"
               ."Please verify your email address by clicking this link ".$domain."/verify.php?userid=".$userid."&email=".$email."\n\n"
	           ."Thank you!\n\n\n"
	           .$sitename." Admin\n"
	           .$adminemail."\n\n\n\n";

		$from_address .= "$sitename<$adminemail>\n";
		$headers .= "Reply-To: <$adminemail>\n";
		$headers .= "X-Sender: <$adminemail>\n";
		$headers .= "X-Mailer: PHP4\n";
		$headers .= "X-Priority: 3\n";
		$headers .= "Return-Path: <$adminemail>\n";

		mail($email, "[".$sitename."] Email Verification", wordwrap(stripslashes($message)),"From: $from_address", "-f $from_address");

    	echo "<br><center><p>A verification email has been sent to ".$email.".</p></center></td></tr></table>";
	}
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>