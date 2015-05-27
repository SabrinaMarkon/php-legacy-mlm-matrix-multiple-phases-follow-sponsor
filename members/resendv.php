<?php

session_start();

include "../header.php";
include "../config.php";

$userid = $_POST['userid'];
$email = $_POST['email'];

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");

		$message = "Hello,\n\n"
               ."Please verify your email address by clicking this link ".$domain."/verify.php?userid=".$userid."&email=".$email."\n\n"
	           ."Thank you!\n\n\n"
	           .$sitename." Admin\n"
	           ."".$adminemail."\n\n\n\n";

		$from_address .= "$sitename<$adminemail>\n";
		$headers .= "Reply-To: <$adminemail>\n";
		$headers .= "X-Sender: <$adminemail>\n";
		$headers .= "X-Mailer: PHP4\n";
		$headers .= "X-Priority: 3\n";
		$headers .= "Return-Path: <$adminemail>\n";

		mail($email, $sitename." Email Verification", wordwrap(stripslashes($message)),"From: $from_address", "-f $from_address");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
    	echo "<br><center><p>A verification email has been sent to ".$email.", please click the verification link.</p></center>";
    	echo "</font></td></tr></table>";
    }
else
  { ?>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include "../footer.php";
mysql_close($dblink);
?>