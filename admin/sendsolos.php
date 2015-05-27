<?php
include "../config.php";
//pick a random number and make sure it is not allready in the database....
do
{
    $random = rand(10000, 1000000);
    $query = "select * from links where number=".$random;
    $result = mysql_query ($query)
            or die ("Query failed");
    $numrows = @ mysql_num_rows($result);
} while (numrows == 1);

//get the next ad to send out....
$query3 = "select * from solos where approved=1 and sent=0 limit 1";
$result3 = mysql_query ($query3)
        or die ("Query failed");
    $numrows2 = @ mysql_num_rows($result3);
    if ($numrows2 == 0) {
       echo "<p>No soloads to send.</p>";
       exit;
    } //end if ($numrows == 0)
	$line3 = mysql_fetch_array($result3);
    $subject = $line3["subject"];
    $adbody = $line3["adbody"];
    $id = $line3["id"];

//update the links table with the new random number.
$query2 = "insert into links set number=".$random.", adid=".$id;
$result2 = mysql_query ($query2)
    or die ("Query failed");
    
//set the 'sent' in the database to 1
$query5 = "update solos set sent=1 where id=".$id;
$result5 = mysql_query ($query5)
        or die ("Query failed");    
	
//set the 'datesent' 
$query6 = "update solos set datesent='".time()."' where id=".$id;

    	$result6 = mysql_query ($query6)

	     	or die ("Query failed 6");
	
		
$sql = mysql_query("SELECT * FROM footerads WHERE approved=1 ORDER BY rand()");
if(@mysql_num_rows($sql)) {
	$info = mysql_fetch_array($sql);
	$footerads = "<b><font face=\"Tahoma\" size=\"3\"><a href=\"$domain/footerclick.php?id=".$info['id']."\" target=\"_blank\"><u><font face=\"Tahoma\" size=\"3\">".$info['subject']."</font></u></a><br>".$info['desc1']."<br>".$info['desc2']."</b>";
} else {

    $query1 = "SELECT * FROM pages WHERE name='Solo footer ad'";

    $result1 = mysql_query ($query1);


    $line1 = mysql_fetch_array($result1);

    $footerads =  $line1["htmlcode"];


}
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

    $Subject = "(Flash Solo) ".$subject;
    $Message = $platinumads;
    $Message .= ".<br><br>";
    $Message .= $adbody;
    $Message .= "<br><br>--------------------------------------------------------------<br><br>";
    if ($memtypeq == "JV Member") {
        $Message .= "Click the link to receive ".$jvclickearn." credits<br><br>";
    }
    elseif($memtypeq=="SUPER JV") {
         $Message .= "Click the link to receive ".$superjvclickearn." credits<br><br>";		
    }
    else {
         $Message .= "Click the link to receive ".$proclickearn." credits<br><br>";
    } 
$Message .= "<br><br>";
$Message .= "This Credit Link is Active for <b>".$linkgood."</b> Days from the date of this email.";
 $Message .= "<br><br>";
$Message .= "<a href=\"".$domain."/clicks.php?userid=".$useridq."&seed=".$random."&id=".$id."\">".$domain."/clicks.php?userid=".$useridq."&seed=".$random."&id=".$id."</a>";
    $Message .= ".<br><br>";
    $Message .= "--------------------------------------------------------------<br>  <span style=\"background-color: yellow;\"><b>Please Visit Our Featured  Advertiser</b></span><br><br>";
    $Message .= "$footerads";
    $Message .= "<br><br>";
    $Message .= "--------------------------------------------------------------<br><br>";
    $Message .= "This is a solo ad advertisement from a member of ".$sitename.". You are receiving this because you are a member of '$sitename'.<br>";
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

    @mail($email, $Subject, wordwrap(stripslashes($Message)),$headers, "-f$adminemail");

    $counter=$counter+1;

} // end while ($line4 = mysql_fetch_array($result))

echo "<p><b><center>email successfully posted to ".$counter." members.</p></b></center>";

mysql_close($dblink);



?>