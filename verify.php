<?php

$message = "";

include "config.php";


if (empty($userid)) {

	$message = "Invalid link";

}

if (empty($email)) {

	$message = "Invalid link";

}







$query = "select * from members where userid='".$userid."' and contact_email='".$email."'";

$result = mysql_query ($query)

           		or die ("Query failed");

echo "$result";

$numrows = @ mysql_num_rows($result);

if ($numrows == 1) {

	$userinfo=mysql_query ("select * from members where userid='".$userid."'");

    $userrecord=mysql_fetch_array($userinfo);

	$query2 = "update members set verified=1 where userid='".$userid."'";

    $result2 = mysql_query ($query2)

           		or die ("Query failed");				

				

	if($userrecord['confirmed'] == 0) {

		$userinfo2=mysql_query ("select * from members where userid='".$userrecord['referid']."'");

	    $userrecord2=mysql_fetch_array($userinfo2);

		

		$today = date('Y-m-d',strtotime("now"));

		$query2 = "update members set confirmed='".$today."' where userid='".$userid."'";

		$result2 = mysql_query ($query2)

           		or die ("Query failed");	

				
		// Referral points		


                                 if ($userrecord2['memtype']=="SUPER JV") {



			$referpoints=$superjvrefpoints;



		} elseif ($userrecord2['memtype']=="JV Member") {



			$referpoints=$jvrefpoints;



		} else {



			$referpoints=$prorefpoints;



		}



		mysql_query("UPDATE members SET points=points+".$referpoints." WHERE userid='".$userrecord['referid']."'");






		// Referral commission
              if ($jvsignup=="1") {

                                if ($userrecord2['memtype']=="SUPER JV") {



			$commission=$superjvjvcom;



		} elseif ($userrecord2['memtype']=="JV Member") {



			$commission=$jvjvcom;



		} else {



			$commission=$projvcom;



		}

              } //endif jvsignup
                else {
		if ($userrecord2['memtype']=="SUPER JV") {



			$commission=$superjvcommission;



		} elseif ($userrecord2['memtype']=="JV Member") {



			$commission=$jvcommission;



		} else {



			$commission=$procommission;



		}



		} //end else



		mysql_query("UPDATE members SET commission=commission+".$commission." WHERE userid='".$userrecord['referid']."'");







		

	if($userrecord2['userid']) {

	

		if($commission) mysql_query("INSERT INTO transactions VALUES ('id', '".$userrecord2['userid']."','Referral Signup Commissions ($userid)','".time()."','$commission$')");

		
if($referpoints) mysql_query("INSERT INTO transactions VALUES ('id', '".$userrecord2['userid']."','Referral Signup Points ($userid)','".time()."','$referpoints points')");

				
		

		$headers = "From: $sitename<$adminemail>\n";

		$headers .= "Reply-To: <$adminemail>\n";

		$headers .= "X-Sender: <$adminemail>\n";

		$headers .= "X-Mailer: PHP4\n";

		$headers .= "X-Priority: 3\n";

		$headers .= "Return-Path: <$adminemail>\n";

			
			
			if($userrecord2['memtype'] == "FREE") 

			mail($userrecord2['contact_email'], "New referral at ". $sitename, "Hi ".$userrecord2['userid']." ,\n\nYou just got a signup on $sitename!\n\n

Great Job!\n\n

Login today to view your stats and to browse some text ads.\n\n

$domain/memberlogin.php\n\n

To your success,\n\n

$adminname\n\n

---------------------------------------------------------\n\n

You are receiving this as you are a member of $sitename. If you wish to remove yourself, please login and delete your membership.\n\nUserid: ".$userrecord2['userid'].", Password: ".$userrecord2['pword']."\n\n$sitename\n$adminaddress", $headers);

			else

			mail($userrecord2['contact_email'], "New referral at ". $sitename, "Hi ".$userrecord2['userid']." ,\n\nYou just got a signup on $sitename!\n\n

Great Job!\n\n

Login today to view your stats and browse some text ads.\n\n

$domain/memberlogin.php\n\n

To your success,\n\n

$adminname\n\n

---------------------------------------------------------\n\n

You are receiving this as you are a member of $sitename. You can opt out of receiving emails only by deleting your account, click here to delete your account.\n\n$domain/delete.php?userid=".$userrecord['referid']."&code=".md5($userrecord2['pword']).".\n\n$sitename\n$adminaddress", $headers);

			
		}	
		
		
	}



    $message = "<br><br><center><p><b><font size=2 face='$fonttype' color='$fontcolour'><b><center><font size=5>Your email address has been verified.  You will be redirected to a special ONE-TIME OFFER</font></b></p></center><br><br>";

	?>

	<head>

	<META HTTP-EQUIV="Refresh"

      CONTENT="3; URL=oto.php?id=<? echo $userid; ?>">

	</head>

	<?

	

} //end if ($numrows == 1)

else {

	 $message =  "Invalid link.";

}



include "header.php";

include("banners.php");

echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

echo $message;

include "footer.php";

mysql_close($dblink);

?>