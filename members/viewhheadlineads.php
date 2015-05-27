<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners.php");

$queryexclude = "
			SELECT h.*
			FROM hheadlineads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheadlineadid FROM hheadlineadclicks WHERE userid = '$userid')
			ORDER BY RAND()
";
#################### Hot Header/Headline Ads copyright 2010 Sabrina Markon, PearlsOfWealth.com webmaster@pearlsofwealth.com only.
$sql = mysql_query($queryexclude);
if(@mysql_num_rows($sql))
{
echo "<font size=3 face='$fonttype' color='$fontcolour'><center>";
echo "<p><font size=4>View Hot Headline Adz</font><br><br>";
echo "<font size=2 color=RED>Click The Links Below To Earn ";
if ($memtype=="JVPARTNER")
{
$earn = $jvhheadlineadearn;
}
if ($memtype=="PRO")
{
$earn = $prohheadlineadearn;
}
if (($memtype!="JVPARTNER") and ($memtype!="PRO"))
{
$earn = $freehheadlineadearn;
}
echo "$earn Points For Each Click</font><br><br>";
echo "<table align=\"center\" width=\"700\" cellpadding=2 cellspacing=0 bgcolor=\"#FFFFFF\" border=1><tr>";

while($info = mysql_fetch_array($sql))
{
	if($count==4)
	{
		echo "</tr><tr>";
		$count=0;
	}

	$count++;
	mysql_query("update hheadlineads set views=views+1 where id='".$info['id']."'");

	if($info['bold'])
		echo "<td bgcolor=\"".$info['bgcolor']."\" align=center><a href=\"./hheadlineclicks1.php?id=".$info['id']."\" target=\"_blank\"><font color=\"".$info['color']."\"><b>".$info['title']."</b></font></a></td>";
	else
		echo "<td bgcolor=\"".$info['bgcolor']."\" align=center><a href=\"./hheadlineclicks1.php?id=".$info['id']."\" target=\"_blank\"><font color=\"".$info['color']."\">".$info['title']."</font></a></td>";
}

echo "</tr></table><br><br>";
}
	}
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../memberlogin.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>