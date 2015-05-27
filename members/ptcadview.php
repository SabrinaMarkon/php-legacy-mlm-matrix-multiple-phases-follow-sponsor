<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";


if( !session_is_registered("ulogin") )
{
?>
  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font><center>
<?
   include "../footer.php";
   exit;
}


include("navigation.php");
include("../banners2.php");

echo "<font size=3 face='$fonttype' color='$fontcolour'><center>";
echo "<p><font size=6>View Paid To Click Ad Links</font></p>";
echo "<p><b><a href=\"$domain/ptcadsinfo.php\" ";
echo "target=_new>Click The Links Below To Earn&nbsp;";

if ($memtype=="PRO") {
					$earn = $proptcearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvptcearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvptcearn;
				}	




echo "$earn Cents Commissions For Each Click - See How Paid To Click Links Work</a><BR>\n";

// Query up all the ptc link URL's this user has already viewed.  This
// let's us display only unviewed URL's at all times.
// -----------------------------------------------------------------------
$viewed=array();
if ( strcasecmp($_REQUEST['submit'],"View All Active")!= 0 )
{
   $sql  = "SELECT tlid\n";
   $sql .= "FROM   ptcadviews\n";
   $sql .= "WHERE  userid = '" . $userid . "'\n";
   $res  = mysql_query($sql) or die("Query 1 failed");

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
$sql .= "FROM     ptcads\n";
$sql .= "WHERE    sent < paid\n";
$sql .= "AND      approved = 1\n";
$sql .= "ORDER BY id\n";
//$sql .= "LIMIT    5\n";
if ( !$res=mysql_query($sql) )
   die("Query 2 failed.");

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
      echo "<table bgcolor=#FFFFFF border=1 cellpadding=7 cellspacing=0 width=\"80%\">\n";
      echo "<tr><td><ol><br />\n";
   }
   echo "<p>\n";
   echo "<a target=\"_blank\" href=\"ptcadclick.php?url=";
   echo urlencode($row["url"]);
   echo "&adid=".$row["id"]."\">". $row["subject"] . "</a></li>\n";
   echo "</p>\n";

   $qty++;
}
mysql_free_result($res);

if ( $qty )
   echo "</ol></td></tr></table>\n";
echo "<p>$qty paid to click ad(s)  displayed...\n";

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