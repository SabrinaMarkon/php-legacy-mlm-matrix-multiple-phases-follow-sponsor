<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
//pick a random number and make sure it is not allready in the database....
do
{
    $random = rand(10000, 1000000);
    $query = "select * from adminlinks where number=".$random;
    $result = mysql_query ($query)
            or die ("Query failed");
    $numrows = @ mysql_num_rows($result);
} while (numrows == 1);

//get the next ad to send out....
$query2 = "select * from adminsolos where approved=1 and sent=0 limit 1";
$result2 = mysql_query ($query2)
        or die ("Query failed");
    $numrows2 = @ mysql_num_rows($result2);
    if ($numrows2 == 0) {
       echo "<p>No soloads to send.</p>";
       exit;
    } //end if ($numrows == 0)
	$line2 = mysql_fetch_array($result2);
    $subject = $line2["subject"];
    $adbody = $line2["adbody"];
    $id = $line2["id"];

//update the links table with the new random number.
$query3 = "insert into adminlinks set number=".$random.", adid=".$id;
$result3 = mysql_query ($query3)
    or die ("Query failed");
    
		
$query6 = "SELECT * FROM pages WHERE name='Solo footer ad'";
$result6 = mysql_query ($query6);

$line6 = mysql_fetch_array($result6);
$htmlcode = $line6["htmlcode"];
if($htmlcode) $htmlcode = "<br>$htmlcode<br><br>";	


//set the 'sent' in the database to 1
$query5 = "update adminsolos set sent=1 where id=".$id;
$result5 = mysql_query ($query5)
        or die ("Query failed");
	
//set the 'datesent' 
$query6 = "update adminsolos set datesent='".time()."' where id=".$id;

    	$result6 = mysql_query ($query6)

	     	or die ("Query failed");
	

//get all members details....
$query4 = "select * from members where status=1 and verified=1 and vacation=0";
$result4 = mysql_query ($query4)
        or die ("Query failed");
while ($line4 = mysql_fetch_array($result4)) {

    $email = $line4["subscribed_email"];
    $memtypeq = $line4["memtype"];
    $useridq = $line4["userid"];
	$nameq = $line4["name"];
    $passwordq = $line4["pword"];
	
//now we've got all we need, so blast the ad out!

    $Subject = "Admin Credit Email ".$subject;
    $Message = $adbody;
    $Message .= "<br><br>--------------------------------------------------------------<br><br>";
    if ($memtypeq == "JV Member") {
        $Message .= "Click the link to receive ".$adminjvclickearn." credits<br><br>";
    }
    elseif($memtypeq=="SUPER JV") {
         $Message .= "Click the link to receive ".$adminsuperjvclickearn." credits<br><br>";		
    }
    else {
         $Message .= "Click the link to receive ".$adminproclickearn." credits<br><br>";
    }     $Message .= "<a href=\"".$domain."/adminclicks.php?userid=".$useridq."&seed=".$random."&id=".$id."\">".$domain."/adminclicks.php?userid=".$useridq."&seed=".$random."&id=".$id."</a>";
    $Message .= ".<br><br>";
    $Message .= "--------------------------------------------------------------<br>$htmlcode<br>";
     $Message .= "This is not SP@M. You are receiving this because you are a member of '$sitename' and agreed to receive solo ads and admin news as part of our Terms & Conditions\n\n";
    $Message .= "You can opt out of receiving emails only by deleting your account, click here to delete your account.<br><br><a href=\"$domain/delete.php?userid=$useridq&code=".md5($passwordq)."\">$domain/delete.php?userid=$useridq&code=".md5($passwordq)."</a>.<br><br>";
	$Message .= "$adminname, $sitename, $adminaddress<br>";
	
    $headers = "From: $sitename<$adminemail>\n";
        $headers .= "Reply-To: <$adminemail>\n";
        $headers .= "X-Sender: <$adminemail>\n";
        $headers .= "X-Mailer: PHP4\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "Return-Path: <$adminemail>\nContent-type: text/html; charset=iso-8859-1\n";
		
	
	$nameq = trim($nameq);
	$firstnameq = substr($nameq , 0, strpos($nameq, " "));

	
	$Message = str_replace("~userid~",$useridq,$Message);
	$Message = str_replace("~fname~",$firstnameq,$Message);
	$Subject = str_replace("~userid~",$useridq,$Subject);
	$Subject = str_replace("~fname~",$firstnameq,$Subject);

    @mail($email, $Subject, wordwrap(stripslashes($Message)),$headers);

    $counter=$counter+1;

} // end while ($line4 = mysql_fetch_array($result))

echo "<p><b><center>email successfully posted to ".$counter." members.</p></b></center>";

mysql_close($dblink);

include "../footer.php";

?>