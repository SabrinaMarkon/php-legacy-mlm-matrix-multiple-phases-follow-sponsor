<?
session_start();
include "config.php";
include "header.php";
include "style.php";
?>
<br><br><br>
<center>
<b><font face="Tahoma" size="3">Forgot your password?</font></b><br><br>


<?
if($_POST['email']) {

	$sql = mysql_query("SELECT * FROM members WHERE contact_email = '".$_POST['email']."'");
	if(@mysql_num_rows($sql)) {
	
		$user = mysql_fetch_array($sql);
		
		$headers .= "From: $sitename<$adminemail>\n";
		$headers .= "Reply-To: <$adminemail>\n";
		$headers .= "X-Sender: <$adminemail>\n";
		$headers .= "X-Mailer: PHP4\n";
		$headers .= "X-Priority: 3\n";
		$headers .= "Return-Path: <$adminemail>\n";

		
		$message .= "Here's the information you requested\n\nYour Userid: ".$user['userid']."\nYour Password: ".$user['pword']."\n\n";
		$message .= "Log into your members area\n".$domain."/memberlogin.php\n\n\n$sitename Admin\n$adminemail\n";


			
		@mail($user['contact_email'], "Your password", $message,$headers);
	
		echo "<font color=\"red\">Your password has been sent to your contact email.</font><br><br>";
	} else {
		echo "<font color=\"red\">Invalid email.</font><br><br>";
	}


}

?>

<form action="forgot.php" method="post">
Your Contact Email Address:<br>
<input type="text" name="email"><br><br>
<input type="submit" value="Send me my password">
</form>

</center>

  
<br><br><br> 

  

<? 

include "footer.php";
mysql_close($dblink);
?>
