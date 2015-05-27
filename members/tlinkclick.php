<?php


session_start();
include "../config.php";

// ----------------------------------------------------------
// Check for a login and fail out immediately if not present!
// ----------------------------------------------------------
if( !session_is_registered("ulogin") )
{
?>
  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font><center>
<?
   include "../footer.php";
   exit;
}

// ----------------------------------
// Do some simple parameter debugging
// ----------------------------------
if (empty($userid)) {
	$message = "Invalid click link";
}
if (empty($id)) {
	$message = "Invalid click link";
}

$query = "select * from tlinks where id='".$adid."'";
$result = mysql_query ($query)
           		or die ("Query failed <!-- " .mysql_error() . " / $message -->");
$numrows = @ mysql_num_rows($result);

if ($numrows == 1) {

	$url = mysql_result(mysql_query("select url from tlinks where id='".$adid."' LIMIT 1"), 0, 'url');

	mysql_query("UPDATE tlinks SET sent = sent +1 where id='".$adid."' LIMIT 1");
	
    $query1 = "select * from tlviews where userid='".$userid."' and tlid=".$adid;
    $result1 = mysql_query ($query1) or die ("Query failed");
    $numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 >= 1)
    {
    	$message = "You have already received credit for this link";
    }  //end if ($numrows1 ==1)

} //end if ($numrows == 1)
else {
	$message = "Invalid click link.";
}

$message = urlencode($message);

if(empty($url)) $url = $domain;

mysql_close($dblink);
?>

<frameset ROWS="185,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
<frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="tlinkclicks2.php?message=<? echo $message; ?>&adid=<? echo $adid; ?>&url=<? echo urlencode($url); ?>">
<frame name="main" src="<? echo $url; ?>">
</frameset>