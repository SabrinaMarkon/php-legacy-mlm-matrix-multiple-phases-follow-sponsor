<?php
 
 include "../config.php";
 
 $today = date('Y-m-d',strtotime("now"));
 $onemonthago = date('Y-m-d',strtotime("-1 month"));

## Sabrina - reset number of sites members have surfed. Remove this if you want sites surfed yesterday to count towards todays advertising.
$q = "update members set sitessurfedtoday=0";
$r = mysql_query($q);
##

 $query = "select * from members where memtype='PRO'";
 $result = mysql_query ($query)
 	      or die ("Query 1 failed");
 	while ($line = mysql_fetch_array($result)) {
         $subscribed = $line["subscribed"];
         $userid = $line["userid"];
         $id = $line["id"];
         $memtype = $line["memtype"];
         $referid = $line["referid"];
 
             if ($subscribed == $onemonthago) {
 
 	           $query4 = "update members set points=points+".$propointsmonthly." where userid='".$userid."'";
 	           $result4 = mysql_query ($query4)
 	                        or die ("Query 4 failed");
                echo $userid." has had ".$propointsmonthly." points added to their account.<br>";
 
 	            $queryref="select * from members where userid='$referid'";
 	            $resultref = mysql_query ($queryref)
 	                or die ("Query 1 failed");
 	            $lineref = mysql_fetch_array($resultref);
 	            $memtype = $line["memtype"];
 	            if ($memtype=="PRO") {
 	                $commission=$procommission;
 	            }
 	            elseif ($memtype=="JV Member") {
 	                $commission=$jvcommission;
 	            } elseif ($memtype=="SUPER JV") {
                                $commission=$superjvcommissions;
                            }
 
 	            if ($prointerval=="Yearly") {
 	                $oneyearago== date('Y-m-d',strtotime("-1 year"));
 	                if ($subscribed==$oneyearago) {
                 		$resultup="";
                     	$queryup="";
 	                    $queryup="update members set commission=commission+".$commission." where userid='$referid'";
 	                    $resultup=mysql_query($queryup);
 	                    echo "$".$commission." commission added to ".$referid;
 	                }
 	            }
 	            elseif ($prointerval=="Monthly") {
                 	$resultup="";
                     $queryup="";
 	                $queryup="update members set commission=commission+".$commission." where userid='$referid'";
 	                $resultup=mysql_query($queryup);
 	                echo "$".$commission." commission added to ".$referid;
 	            }
 
             }
     }
 	
 $query = "select * from members where memtype='JV Member'";
 $result = mysql_query ($query)
 	      or die ("Query 1 failed");
 	while ($line = mysql_fetch_array($result)) {
         $subscribed = $line["subscribed"];
         $userid = $line["userid"];
         $id = $line["id"];
         $memtype = $line["memtype"];
         $referid = $line["referid"];
 
             if ($subscribed == $onemonthago) {
 
 	           $query4 = "update members set points=points+".$jvpointsmonthly." where userid='".$userid."'";
 	           $result4 = mysql_query ($query4)
 	                        or die ("Query 4 failed");
                echo $userid." has had ".$jvpointsmonthly." points added to their account.<br>";
 
 	            $queryref="select * from members where userid='$referid'";
 	            $resultref = mysql_query ($queryref)
 	                or die ("Query 1 failed");
 	            $lineref = mysql_fetch_array($resultref);
 	            $memtype = $line["memtype"];
 	            if ($memtype=="PRO") {
 	                $commission=$projvcom;
 	            }
 	            elseif ($memtype=="JV Member") {
 	                $commission=$jvjvcom;
 	            } elseif ($memtype=="SUPER JV") {
                                $commission=$superjvjvcom;
                            }
 
 	            if ($jvinterval=="Yearly") {
 	                $oneyearago== date('Y-m-d',strtotime("-1 year"));
 	                if ($subscribed==$oneyearago) {
                 		$resultup="";
                     	$queryup="";
 	                    $queryup="update members set commission=commission+".$commission." where userid='$referid'";
 	                    $resultup=mysql_query($queryup);
 	                    echo "$".$commission." commission added to ".$referid;
 	                }
 	            }
 	            elseif ($jvinterval=="Monthly") {
                 	$resultup="";
                     $queryup="";
 	                $queryup="update members set commission=commission+".$commission." where userid='$referid'";
 	                $resultup=mysql_query($queryup);
 	                echo "$".$commission." commission added to ".$referid;
 	            }
 
             }
     }
 	
 	
 	$query = "select * from members where memtype='SUPER JV'";
$result = mysql_query ($query)
	      or die ("Query 1 failed");
	while ($line = mysql_fetch_array($result)) {
        $subscribed = $line["subscribed"];
        $userid = $line["userid"];
        $id = $line["id"];
        $memtype = $line["memtype"];
        $referid = $line["referid"];

            if ($subscribed == $onemonthago) {

	           $query4 = "update members set points=points+".$superjvpointsmonthly." where userid='".$userid."'";
	           $result4 = mysql_query ($query4)
	                        or die ("Query 4 failed");
               echo $userid." has had ".$superjvpointsmonthly." points added to their account.<br>";

	            $queryref="select * from members where userid='$referid'";
	            $resultref = mysql_query ($queryref)
	                or die ("Query 1 failed");
	            $lineref = mysql_fetch_array($resultref);
	            $memtype = $line["memtype"];
	         
                                 if ($memtype=="PRO") {
 	                $commission=$prosupercom;
 	            }
 	            elseif ($memtype=="JV Member") {
 	                $commission=$jvsupercom;
 	            } elseif ($memtype=="SUPER JV") {
                                $commission=$superjv2supercom;
                            }


	            if ($superjvinterval=="Yearly") {
	                $oneyearago== date('Y-m-d',strtotime("-1 year"));
	                if ($subscribed==$oneyearago) {
                		$resultup="";
                    	$queryup="";
	                    $queryup="update members set commission=commission+".$commission." where userid='$referid'";
	                    $resultup=mysql_query($queryup);
	                    echo "$".$commission." commission added to ".$referid;
	                }
	            }
	            elseif ($superjvinterval=="Monthly") {
                	$resultup="";
                    $queryup="";
	                $queryup="update members set commission=commission+".$commission." where userid='$referid'";
	                $resultup=mysql_query($queryup);
	                echo "$".$commission." commission added to ".$referid;
	            }

            }
    }	
 	
 	
 //Prune
 $sql = mysql_query("SELECT * FROM `members` WHERE `verified` = 0 AND `joindate` < '".date('Y-m-d',time()-24*60*60)."'");
 
 while($each = mysql_fetch_array($sql)) {  
 
		delete_account($each['userid']);
 
 }
 
 //Delete expired solos
 $sql = mysql_query("SELECT * FROM solos WHERE added=1 AND sent=1 AND date<='".(time()-31*24*60*60)."'");
 
 while($each = mysql_fetch_array($sql)) {
 
     $query2 = "delete from clicks where adid='".$each['id']."'";
 	$result2 = mysql_query ($query2);
 
     $query3 = "delete from solos where id='".$each['id']."'";
 	$result3 = mysql_query ($query3);
 
 }
 

 //Autoresponder
 $sql = mysql_query("SELECT * FROM autoresponder WHERE message != '' AND subject != ''");
 while($auto = mysql_fetch_array($sql)) {
 
 	if($auto['memtype'] == "Free") $sql2 = mysql_query("SELECT * FROM members WHERE confirmed = '".date('Y-m-d',time()-$auto['days']*24*60*60-60*60)."' AND memtype='FREE'");
 	elseif($auto['memtype'] == "Pro") $sql2 = mysql_query("SELECT * FROM members WHERE confirmed = '".date('Y-m-d',time()-$auto['days']*24*60*60-60*60)."' AND memtype='PRO'");
 	else $sql2 = mysql_query("SELECT * FROM members WHERE confirmed = '".date('Y-m-d',time()-$auto['days']*24*60*60-60*60)."'");
 	
 	$Subjectold = $auto['subject'];
     $Messageold = $auto['message'];
 
     while ($line = mysql_fetch_array($sql2)) {
 		$name = $line["name"];
         $userid = $line['userid'];
         $password = $line['pword'];
         $contactemail = $line["contact_email"];
 
         //reset values.
         $headers = "";
         $Subject = $Subjectold;
         $Message = $Messageold;
 
         //replace the merge fields.
         $Subject = stripslashes($Subject);
 	$Subject = str_replace("~userid~",$userid,$Subject);
         $Subject = str_replace("~name~",$name,$Subject);
         $Subject = str_replace("~password~",$password,$Subject);
 
         $Message = stripslashes($Message);
 	$Message = str_replace("~userid~",$userid,$Message);
         $Message = str_replace("~name~",$name,$Message);
         $Message = str_replace("~password~",$password,$Message);
         $Message = str_replace("~email~",$contactemail,$Message);
 		
 		$name = trim($name);
 		if(strpos($name, " ")) $firstname = substr($name , 0, strpos($name, " "));
 		else $firstname = $name;
 		
 		$Message = str_replace("~fname~",$firstname,$Message);
         $Subject = str_replace("~fname~",$firstname,$Subject);
 		
 		$Message = "*********************\nAs a valued member of $sitename you have agreed to receive\ncontact from us. If you no longer want our messages, follow the instructions at the bottom.\n*********************\n\n".$Message."\n\n*********************\nYou are receiving this as you are a member of $sitename. You can opt out of receiving emails only by deleting your account, click here to delete your account.\n\n$domain/delete.php?userid=$userid&code=".md5($password)."\n\n$sitename\n$adminaddress";
 
         $headers .= "From: $sitename<$adminemail>\n";
 		$headers .= "Reply-To: <$adminemail>\n";
 		$headers .= "X-Sender: <$adminemail>\n";
 		$headers .= "X-Mailer: PHP4\n";
 		$headers .= "X-Priority: 3\n";
 		$headers .= "Return-Path: <$adminemail>\n";
		
		echo "Emailed $userid";
 
 		mail($contactemail, $Subject, $Message,$headers);
 	}
 	
 }

 
if(date('w') == 0) {

	mysql_query("DELETE FROM drawing WHERE 1");
	
	$sql = mysql_query("SELECT * FROM members");
	while($each = mysql_fetch_array($sql)) {
		$i = 25;
		while($i > 0) {
			mysql_query("INSERT INTO drawing VALUES('".$each['userid']."')");
			$i--;
		}
	}

}
 
if($drawing == 1 AND date('w') == 0) {

	$sql = mysql_query("SELECT * FROM drawing ORDER BY rand()");
	$winner = mysql_fetch_array($sql);
	$count = mysql_num_rows($sql);
	
	mysql_query("DELETE FROM drawing WHERE 1");
	
	$sql = mysql_query("SELECT * FROM members");
	while($each = mysql_fetch_array($sql)) {
		$i = 25;
		while($i > 0) {
			mysql_query("INSERT INTO drawing VALUES('".$each['userid']."')");
			$i--;
		}
	}

	mysql_query("update settings set setting='".$winner['userid']."' where name='drawwinner'");
		
	echo "Drawing Winner: ".$winner['userid']." \n";
	echo "Total credits: ".($count*$drawprice);

}

mysql_query("DELETE FROM drawing WHERE 1");

mysql_query("UPDATE members SET textad1_clicks=textad1_clicks+textad_clicks, solo1_clicks=solo1_clicks+solo_clicks, banner1_clicks=banner1_clicks+banner_clicks, button1_clicks=button1_clicks+button_clicks, 
hotlink1_clicks=hotlink1_clicks+hotlink_clicks, 
htmlad1_clicks=htmlad1_clicks+htmlad_clicks, traffic1_clicks=traffic1_clicks+traffic_clicks, ptc1_clicks=ptc1_clicks+ptc_clicks, navtop1_clicks=navtop1_clicks+navtop_clicks, navbot1_clicks=navbot1_clicks+navbot_clicks, surf1_clicks=surf1_clicks+surf_clicks WHERE 1");
echo "\n\n";
 
 
mysql_query("UPDATE members SET textad_clicks=0, banner_clicks=0, button_clicks=0, hotlink_clicks=0, htmlad_clicks=0, solo_clicks=0, traffic_clicks=0, ptc_clicks=0, navtop_clicks=0, navbot_clicks=0, surf_clicks=0 WHERE 1");
echo "\n\n";

mysql_query("UPDATE members SET bonus_viewed=0 WHERE 1"); 

$sql = mysql_query("SELECT * FROM prizes_won");
while($each = mysql_fetch_array($sql)) {
	echo $each['userid']." won ".$each['won']."\n";
} 
mysql_query("DELETE FROM prizes_won WHERE 1");

################################################	  SABRINA - START MONTHLY BONUSES	    ########################################################################
$todaysdate = date("m-d");
$mbq1 = "select * from members where nextmonthlybonus like '%-$todaysdate%'";
$mbr1 = mysql_query($mbq1);
$mbrow1 = mysql_num_rows($mbr1);
if ($mbrow1 > 0)
{
while ($mbrowz1 = mysql_fetch_array($mbr1))
	{
	$mbuserid = $mbrowz1["userid"];
	$mbmemtype = $mbrowz1["memtype"];
	$paypal_email = $mbrowz1["paypal_email"];
	$payza_email = $mbrowz1["payza_email"];
	$egopay_account = $mbrowz1["egopay_account"];
	$perfectmoney_account = $mbrowz1["perfectmoney_account"];
	$okpay_account = $mbrowz1["okpay_account"];
	$solidtrustpay_account = $mbrowz1["solidtrustpay_account"];
	$moneybookers_email = $mbrowz1["moneybookers_email"];
	if ($mbmemtype == "SUPER JV")
	{
	$monthlybonusestable = "monthlybonusessuperjv";
	}
	if ($mbmemtype == "JV Member")
	{
	$monthlybonusestable = "monthlybonusesjv";
	}
	if (($mbmemtype != "SUPER JV") and ($mbmemtype != "JV Member"))
	{
	$monthlybonusestable = "monthlybonusespro";
	}
	###################################################
	$mbq2 = "select * from $monthlybonusestable";
	$mbr2 = mysql_query($mbq2) or die(mysql_error());
	$mbrow2 = mysql_num_rows($mbr2);
	if ($mbrow2 > 0)
	{
$points = mysql_result($mbr2,0,"points");
$surfcredits = mysql_result($mbr2,0,"surfcredits");
$banner_num = mysql_result($mbr2,0,"banner_num");
$banner_views = mysql_result($mbr2,0,"banner_views");
$solo_num = mysql_result($mbr2,0,"solo_num");
$traffic_num = mysql_result($mbr2,0,"traffic_num");
$traffic_views = mysql_result($mbr2,0,"traffic_views");
$nav_num = mysql_result($mbr2,0,"nav_num");
$login_num = mysql_result($mbr2,0,"login_num");
$login_views = mysql_result($mbr2,0,"login_views");
$hotlink_num = mysql_result($mbr2,0,"hotlink_num");
$hotlink_views = mysql_result($mbr2,0,"hotlink_views");
$button_num = mysql_result($mbr2,0,"button_num");
$button_views = mysql_result($mbr2,0,"button_views");
$ptc_num = mysql_result($mbr2,0,"ptc_num");
$ptc_views = mysql_result($mbr2,0,"ptc_views");
$topnav_num = mysql_result($mbr2,0,"topnav_num");
$botnav_num = mysql_result($mbr2,0,"botnav_num");
$featuredad_num = mysql_result($mbr2,0,"featuredad_num");
$featuredad_views = mysql_result($mbr2,0,"featuredad_views");
$hheaderad_num = mysql_result($mbr2,0,"hheaderad_num");
$hheaderad_views = mysql_result($mbr2,0,"hheaderad_views");
$hheadlinead_num = mysql_result($mbr2,0,"hheadlinead_num");
$hheadlinead_views = mysql_result($mbr2,0,"hheadlinead_views");
$mbq6 = "update $monthlybonusestable set lastbonusdate=NOW()";
$mbr6 = mysql_query($mbq6);
############################################
## POINTS BONUS
$mbq3 = "update members set points=points+".$points." where userid=\"$mbuserid\"";
$mbr3 = mysql_query($mbq3);
$tq3 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $points points','".time()."','1')";
$tr3 = mysql_query($tq3);
############################################
## SURF CREDITS BONUS
$mbq3 = "update members set surfcredits=surfcredits+".$surfcredits." where userid=\"$mbuserid\"";
$mbr3 = mysql_query($mbq3);
$tq3 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $surfcredits surf credits','".time()."','1')";
$tr3 = mysql_query($tq3);
############################################
## BANNER BONUS
if ($banner_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $banner_num; $i++)
	{
	$mbq4 = "insert into banners (userid,max) values(\"$mbuserid\",\"$banner_views\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq4 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $banner_views banner impressions','".time()."','$banner_num')";
$tr4 = mysql_query($tq4);
} # if ($banner_num > 0)
############################################
## HOTLINKS BONUS
$i = "";
if ($hotlink_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $hotlink_num; $i++)
	{
	$mbq4 = "insert into hotlinks (userid,max,purchase) values(\"$mbuserid\",\"$hotlink_views\",'".time()."')";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $hotlink_views hotlink views','".time()."','$hotlink_num')";
$tr5 = mysql_query($tq5);
} # if ($hotlink_num > 0)
############################################
## FEATURED AD BONUS
$i = "";
if ($featuredad_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $featuredad_num; $i++)
	{
	$mbq4 = "insert into featuredads (userid,max,purchase) values(\"$mbuserid\",\"$featuredad_views\",NOW())";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $featuredad_views featured ad views','".time()."','$featuredad_num')";
$tr5 = mysql_query($tq5);
} # if ($featuredad_num > 0)
############################################
## HOT HEADLINE AD BONUS
$i = "";
if ($hheadlinead_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $hheadlinead_num; $i++)
	{
	$mbq4 = "insert into hheadlineads (userid,max,purchase) values(\"$mbuserid\",\"$hheadlinead_views\",NOW())";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $hheadlinead_views hot headline ad clicks','".time()."','$hheadlinead_num')";
$tr5 = mysql_query($tq5);
} # if ($hheadlinead_num > 0)
############################################
## HOT HEADER AD BONUS
$i = "";
if ($hheaderad_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $hheaderad_num; $i++)
	{
	$mbq4 = "insert into hheaderads (userid,max,purchase) values(\"$mbuserid\",\"$hheaderad_views\",NOW())";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $hheaderad_views hot header ad clicks','".time()."','$hheaderad_num')";
$tr5 = mysql_query($tq5);
} # if ($hheaderad_num > 0)
############################################
## LOGIN AD BONUS
$i = "";
if ($login_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $login_num; $i++)
	{
	$mbq4 = "insert into loginads (userid,max) values(\"$mbuserid\",\"$login_views\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $login_views login ad views','".time()."','$login_num')";
$tr5 = mysql_query($tq5);
} # if ($login_num > 0)
############################################
## TRAFFIC LINK AD BONUS
$i = "";
if ($traffic_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $traffic_num; $i++)
	{
	$mbq4 = "insert into tlinks (userid,paid) values(\"$mbuserid\",\"$traffic_views\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq5 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $traffic_views trafficlink views','".time()."','$traffic_num')";
$tr5 = mysql_query($tq5);
} # if ($trafficlink_num > 0)
############################################
## PTC BONUS
$i = "";
if ($ptc_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $ptc_num; $i++)
	{
	$mbq4 = "insert into ptcads (userid,paid) values(\"$mbuserid\",\"$ptc_views\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq6 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $ptc_views ptc ad views','".time()."','$ptc_num')";
$tr6 = mysql_query($tq6);
} # if ($ptc_num > 0)
############################################
## BUTTON AD BONUS
$i = "";
if ($button_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $button_num; $i++)
	{
	$mbq4 = "insert into buttons (userid,max) values(\"$mbuserid\",\"$button_views\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq6 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - $button_views button ad views','".time()."','$button_num')";
$tr6 = mysql_query($tq6);
} # if ($button_num > 0)
############################################
## SOLO AD BONUS
$i = "";
if ($solo_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $solo_num; $i++)
	{
	$mbq4 = "insert into solos (userid) values(\"$mbuserid\")";
	$mbr4 = mysql_query($mbq4);
	}
$tq8 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - solo ad','".time()."','$solo_num')";
$tr8 = mysql_query($tq8);
} # if ($solo_num > 0)
############################################
## TOP NAV LINK BONUS
$i = "";
if ($topnav_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $topnav_num; $i++)
	{
	$mbq4 = "insert into topnav (userid, date) VALUES ('$mbuserid','".time()."')";
	$mbr4 = mysql_query($mbq4);
	}
$tq8 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - top nav link','".time()."','$topnav_num')";
$tr8 = mysql_query($tq8);
} # if ($topnav_num > 0)
############################################
## BOTTOM NAV LINK BONUS
$i = "";
if ($botnav_num > 0)
{
	$i = "";
	for ($i = 1; $i <= $botnav_num; $i++)
	{
	$mbq4 = "insert into botnav (userid, date) VALUES ('$mbuserid','".time()."')";
	$mbr4 = mysql_query($mbq4);
	}
$tq8 = "insert into monthly_transactions values ('id','$mbuserid','$mbmemtype Monthly Bonus - bottom nav link','".time()."','$botnav_num')";
$tr8 = mysql_query($tq8);
} # if ($botnav_num > 0)
############################################
$mbq5 = "update members set lastmonthlybonus=NOW(), nextmonthlybonus=DATE_ADD(NOW(), INTERVAL 1 MONTH) where userid=\"$mbuserid\"";
$mbr5 = mysql_query($mbq5);
############################################
	} # if ($mbrow2 > 0)
	###################################################
	} # while ($mbrowz1 = mysql_fetch_array($mbr1))
} # if ($mbrow1 > 0)
################################################	  SABRINA - END MONTHLY BONUSES	    ######################################################################## 

mysql_close($dblink);
?>