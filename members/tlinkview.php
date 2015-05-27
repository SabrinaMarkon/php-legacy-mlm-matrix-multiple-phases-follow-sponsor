<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

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

// -------------------------------------------------------------------
// To get here the user must be logged in.  Start performing link view
// operations here.  An ID for the link to view will be required.
// -------------------------------------------------------------------
include("navigation.php");
include("../banners2.php");

echo "<font size=3 face='$fonttype' color='$fontcolour'><center>";
echo "<p><font size=6>View Traffic Links</font></p>";
echo "<p><b><a href=\"$domain/trafficlink-info.php\" ";
echo "target=_new>Click The Links Below To Earn&nbsp;";

if ($memtype=="PRO") {
					$earn = $protrafficearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvtrafficearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvtrafficearn;
				}	




echo "$earn Points Each - Click Here To See How Traffic Links Work</a><BR>\n";

// Query up all the traffic link URL's this user has already viewed.  This
// let's us display only unviewed URL's at all times.
// -----------------------------------------------------------------------
$viewed=array();
if ( strcasecmp($_REQUEST['submit'],"View All Active")!= 0 )
{
   $sql  = "SELECT tlid\n";
   $sql .= "FROM   tlviews\n";
   $sql .= "WHERE  userid = '" . $userid . "'\n";
   $res  = mysql_query($sql) or die("Query failed");

   while ( $row = mysql_fetch_assoc($res) )
   {
      $tlid = $row['tlid'];
      $viewed[$tlid] = 1;
   }

   //echo "<!-- $userid has viewed " . count($viewed) . " tlink ads -->\n";
}


// Now query up all the links that are waiting for viewers.  As people view
// these links they will stop being selected.
// ------------------------------------------------------------------------
$sql  = "SELECT   *\n";
$sql .= "FROM     tlinks\n";
$sql .= "WHERE    sent < paid\n";
$sql .= "AND      approved = 1\n";
$sql .= "ORDER BY id\n";
//$sql .= "LIMIT    5\n";
if ( !$res=mysql_query($sql) )
   die("Query failed.");

$qty=0;
while ( $row=mysql_fetch_assoc($res) )
{
   if ( $viewed[$row['id']] )
   {
      //echo "<!-- already viewed tlid: " . $row['id'] . " -->\n";
      continue;
   }

   if ( $qty==0 )
   {
      echo "<br /><br />\n";
      echo "<table border=1 cellpadding=7 cellspacing=0 width=\"80%\">\n";
      echo "<tr><td><ol><br />\n";
   }
   echo "<p>\n";
   echo "<a target=\"_blank\" href=\"tlinkclick.php?url=";
   echo urlencode($row["url"]);
   echo "&adid=".$row["id"]."\">". $row["subject"] . "</a></li>\n";
   echo "</p>\n";

   $qty++;
}
mysql_free_result($res);

if ( $qty )
   echo "</ol></td></tr></table>\n";
echo "<p>$qty traffic link ad(s)  displayed...\n";

if ( strcasecmp($_REQUEST['submit'],"View All Active")!= 0 )
   echo "<form method=get action=\"?viewall=1\"><input type=submit name=submit value=\"View All Active\"></form>\n";
else
   echo "<form method=get action=\"?viewall=1\"><input type=submit name=submit value=\"View New Ads Only\"></form>\n";


// Close off the table created for main page display
// -------------------------------------------------
echo "</font></td></tr></table>";

include "../footer.php";
mysql_close($dblink);
?>