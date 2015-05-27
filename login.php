<?php
session_start();
include "config.php";
include "header.php";
include "style.php";
// errorchecking first:

if (empty($password)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Password field is empty, please click your browsers 'back' button.</font></b></p>";
   exit;
   }

if (empty($userid)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Userid  field is empty, please click your browsers 'back' button.</font></b></p>";
   exit;
   }

$query = "SELECT * FROM members where userid='$userid' and pword='$password' and status=1";
$result = mysql_query ($query);

$num_rows = mysql_num_rows($result);

if($num_rows==0)
  {
    echo "<center>Error. Could not login.  <BR><BR><B><font size=3>If You Know For Sure, Your Username and Password Are Correct, Your Account May Have Been Deleted Due To Bounced Emails Or An Unverified Account - Unverified Accounts Get Deleted After 24 Hours.  <br><br>Please Sign Up Again And If You Can, Use A GMail Account.  If You Were A Upgraded Member, Simply Contact Me $adminname ($adminemail) With Your Payment Receipt Info And I Will Upgrade Your New Account</font><br><br><br></center>";
    exit;
  }
else
  {
  
$info = mysql_fetch_array($result);
if($info['lastlogin']!=date('Y-m-d') AND $info['referid']!='admin') {
	$sql = mysql_query("SELECT * FROM members WHERE userid='".$info['referid']."'");
	if(@mysql_num_rows($sql)) {
		$info2 = mysql_fetch_array($sql);
		
	if($info2['memtype']=="SUPER JV") $earn = $superjvreflogin;
	elseif($info2['memtype']=="JV Member") $earn = $jvreflogin;
		else $earn = $proreflogin;	
		if($earn) {
		
	$headers = "From: $sitename<$adminemail>\n";
	$headers .= "Reply-To: <$adminemail>\n";
	$headers .= "X-Sender: <$adminemail>\n";
	$headers .= "X-Mailer: PHP4\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "Return-Path: <$adminemail>\n";		
		
		
			mail($info2['contact_email'], "Bonus Points at ". $sitename, "

Congratulations ".$info2['name']."!  You just earned $earn points for referring an active member!\n
Userid \"$userid\" just logged in and we awarded you with $earn bonus points.\n
Keep referring active members and you'll keep getting bonus points every time they login!

To your success,\n

$adminname\n

$domain/memberlogin.php\n\n

You are receiving this as you are a member of $sitename. \n
You can opt out of receiving emails only by deleting your account, click here to delete your account.\n\n$domain/delete.php?userid=".$info['referid']."&code=".md5($info2['pword']).".\n\n$sitename\n$adminaddress", $headers);


			mysql_query("UPDATE members SET points=points+$earn WHERE userid='".$info['referid']."'");
			mysql_query("INSERT INTO transactions VALUES ('id', '".$info2['userid']."','Referral Login $userid','".time()."','$earn points')");
		}
		
		
		
	}
}  

  mysql_query("UPDATE members set lastlogin = '".date('Y-m-d')."' where userid='$userid'");
  session_register("ulogin");
  $login = true;
  session_register("uname");
  $_SESSION['uname'] = $userid;
  session_register("pw");
  $_SESSION['pw'] = $password;
  //header("Location: /members/index.php");
  
	$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");
	$offer = mysql_fetch_array($sql);
	$memtype = mysql_result($result, 0, "memtype");

############################################################################################## Sabrina Markon May 30 2010
$today = date('Y-m-j');
$lastloginq = "select * from members where userid=\"$userid\" and lastfullloginadseen=\"$today\"";
$lastloginr = mysql_query($lastloginq);
$lastloginrows = mysql_num_rows($lastloginr);
if ($lastloginrows < 1)
{
$flq = "select * from fullloginads where approved=\"1\" and rented=\"$today\" order by rand() limit 1";
$flr = mysql_query($flq);
$flrows = mysql_num_rows($flr);
if ($flrows > 0)
{
$flid = mysql_result($flr,0,"id");
$url = mysql_result($flr,0,"url");
}
} # if ($lastloginrows > 0)
##########################################
if($offer['enable']) 
{
	if($offer['memtype'] == $memtype OR $offer['memtype'] == "ALL")
	{
		if ($flid == "")
		{
		$url = $domain."/offerpage.php";
		}
		if ($flid != "")
		{
		$url = $domain."/offerpage.php?flid=".$flid."&url=".urlencode($url);
		}
	} # if($offer['memtype'] == $memtype OR $offer['memtype'] == "ALL")
	else 
	{
		if ($flid == "")
		{
		$url = $domain."/members/index.php";
		}
		if ($flid != "")
		{
		$url = $domain."/fullloginad.php?flid=".$flid."&url=".urlencode($url);
		}
	} # else 
} # if($offer['enable']) 
else
{
if ($flid == "")
{
$url = $domain."/members/index.php";
}
if ($flid != "")
{
$url = $domain."/fullloginad.php?flid=".$flid."&url=".urlencode($url);
}
}
############################################################################################## End Sabrina Markon May 30 2010

  echo '<META HTTP-EQUIV="Refresh" Content="10;URL='.$url.'">';
  ?>
    <div style="text-align: center;"><br>
    <b>You will be redirected to your account in 10 seconds..Please visit our sponsor below..Your click will open in a new window.</b>
<center>
<BR>
	<?
	echo "<font size=3 face='$fonttype' color='$fontcolour'>";

	$count = mysql_num_rows(mysql_query("SELECT * FROM loginads WHERE approved=1 AND hits<max"));
	
	$rand = rand(1,$count+10);
	
	if($rand > 10) {
	
	    $query1 = "SELECT * FROM loginads WHERE approved=1 AND hits<max ORDER BY rand() LIMIT 1";
	    $result1 = mysql_query ($query1);
		
		$line1 = mysql_fetch_array($result1);
		mysql_query("UPDATE loginads SET hits=hits+1 WHERE id='".$line1['id']."'");
		echo $line1['adbody'];
	} else {

	    $query1 = "SELECT * FROM pages WHERE name='Login #".rand(1,10)."'";
	    $result1 = mysql_query ($query1);

	    $line1 = mysql_fetch_array($result1);
	    echo $line1["htmlcode"];

	
	}	

	echo "</font>";
	?>
	
	
	</center><br>
    <a href="<? echo $url; ?>">Click
    here to skip this advertisment.....</a><BR><BR><BR><BR><div>
    <?
  }
  
include "footer.php";
mysql_close($dblink);
?>