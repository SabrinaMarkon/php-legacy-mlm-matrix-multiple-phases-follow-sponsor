<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$sort = $_GET["sortby"];

if( session_is_registered("alogin") ) {



if($sort == "userid")
	{
		$query = "SELECT * FROM `members`";
	}
                elseif($sort == "textad1_clicks")
	{
		
                              $query = "SELECT * FROM members where textad1_clicks>1 ORDER BY `members`.`textad1_clicks` DESC";
	}

	elseif($sort == "htmlad1_clicks")
	{
		$query = "SELECT * FROM members where htmlad1_clicks>1 ORDER BY `members`.`htmlad1_clicks` DESC";
	}
	elseif($sort == "solo1_clicks")
	{
		$query = "SELECT * FROM members where solo1_clicks>1 ORDER BY `members`.`solo1_clicks` DESC";
	}
	elseif($sort == "banner1_clicks")
	{
		$query = "SELECT * FROM members where banner1_clicks>1 ORDER BY `members`.`banner1_clicks` DESC";
	}
	elseif($sort == "button1_clicks")
	{
		$query = "SELECT * FROM members where button1_clicks>1 ORDER BY `members`.`button1_clicks` DESC";
	}
	elseif($sort == "hotlink1_clicks")
	{
		$query = "SELECT * FROM members where hotlink1_clicks>1 ORDER BY `members`.`hotlink1_clicks` DESC";
	}
                elseif($sort == "navtop1_clicks")
	{
		$query = "SELECT * FROM members where navtop1_clicks>1 ORDER BY `members`.`navtop1_clicks` DESC";
	}
                elseif($sort == "navbot1_clicks")
	{
		$query = "SELECT * FROM members where navbot1_clicks>1 ORDER BY `members`.`navbot1_clicks` DESC";
	}
                elseif($sort == "ptc1_clicks")
	{
		$query = "SELECT * FROM members where ptc1_clicks>1 ORDER BY `members`.`ptc1_clicks` DESC";
	}
                elseif($sort == "traffic1_clicks")
	{
		$query = "SELECT * FROM members where traffic1_clicks>1 ORDER BY `members`.`traffic1_clicks` DESC";
	}
	else
	{
		$query = "SELECT * FROM members where traffic1_clicks>1 ORDER BY `members`.`traffic1_clicks` DESC";
	}
	$result = mysql_query ($query)
	     or die ("Query failed");
       $num_rows = mysql_num_rows($result);



$textlinksTotQuery = "SELECT SUM(textad1_clicks) as total_textad1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($textlinksTotQuery)); 
$texttotal = $sRow['total_textad1_clicks']; 

$htmllinksTotQuery = "SELECT SUM(htmlad1_clicks) as total_htmlad1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($htmllinksTotQuery)); 
$htmltotal = $sRow['total_htmlad1_clicks']; 

$sololinksTotQuery = "SELECT SUM(solo1_clicks) as total_solo1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($sololinksTotQuery)); 
$solototal = $sRow['total_solo1_clicks']; 

$bannerlinksTotQuery = "SELECT SUM(banner1_clicks) as total_banner1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($bannerlinksTotQuery)); 
$bannertotal = $sRow['total_banner1_clicks']; 

$buttonlinksTotQuery = "SELECT SUM(button1_clicks) as total_button1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($buttonlinksTotQuery)); 
$buttontotal = $sRow['total_button1_clicks']; 

$hotlinklinksTotQuery = "SELECT SUM(hotlink1_clicks) as total_hotlink1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($hotlinklinksTotQuery)); 
$hotlinktotal = $sRow['total_hotlink1_clicks']; 

$navtopTotQuery = "SELECT SUM(navtop1_clicks) as total_navtop1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($navtopTotQuery)); 
$navtoptotal = $sRow['total_navtop1_clicks']; 

$navbotTotQuery = "SELECT SUM(navbot1_clicks) as total_navbot1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($navbotTotQuery)); 
$navbottotal = $sRow['total_navbot1_clicks']; 

$ptcTotQuery = "SELECT SUM(ptc1_clicks) as total_ptc1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($ptcTotQuery)); 
$ptctotal = $sRow['total_ptc1_clicks']; 

$trafficlinksTotQuery = "SELECT SUM(traffic1_clicks) as total_traffic1_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($trafficlinksTotQuery)); 
$total = $sRow['total_traffic1_clicks']; 

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> 


<?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

        echo "<center><H2>Active Member Stats</H2></center>";

                ?>


<center><a href="resetactivemember.php"><b>RESET MEMBER STATS</b></a><br>(Only You Can Reset These Stats - They Do Not Reset Automatically)</center><br>
        <center>The member has clicked on this many ads (these stats are updated at midnight)<br>Only members that have clicked ads will show.
          <table width=100% border=0 cellpadding=1 cellspacing=1>
<tr>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=userid">Userid</a></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=textad1_clicks">Text<a><br><? echo $texttotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=htmlad1_clicks">Html</a><br><? echo $htmltotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=solo1_clicks">Solo</a><br><? echo $solototal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=banner1_clicks">Banner</a><br><? echo $bannertotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=button1_clicks">Button</a><br><? echo $buttontotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=hotlink1_clicks">Hot Link</a></font><br><? echo $hotlinktotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=navtop1_clicks">Nav Top</a></font><br><? echo $navtoptotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=navbot1_clicks">Nav Bot</a></font><br><? echo $navbottotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=ptc1_clicks">PTC</a></font><br><? echo $ptctotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="activememberstats.php?sortby=traffic1_clicks">Traffic</a><br><? echo $total; ?></font></center></td>
</tr>
        <?
    	while ($line = mysql_fetch_array($result)) {
        		$id = $line["id"];
                $adbody = $line["adbody"];
				$userid = $line["userid"];
                $textad1_clicks = $line["textad1_clicks"]; 
                $htmlad1_clicks = $line["htmlad1_clicks"];
                $solo1_clicks = $line["solo1_clicks"];
                $banner1_clicks = $line["banner1_clicks"];
                $button1_clicks = $line["button1_clicks"];
                $hotlink1_clicks = $line["hotlink1_clicks"];
                $navtop1_clicks = $line["navtop1_clicks"];
                $navbot1_clicks = $line["navbot1_clicks"];
                $ptc1_clicks = $line["ptc1_clicks"];
                $traffic1_clicks = $line["traffic1_clicks"];
?><tr>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $textad1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $htmlad1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $solo1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $banner1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $button1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $hotlink1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $navtop1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $navbot1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $ptc1_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $traffic1_clicks; ?></font></center></td>  
</tr> <?
        }
        echo "</table></center>" ;
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>