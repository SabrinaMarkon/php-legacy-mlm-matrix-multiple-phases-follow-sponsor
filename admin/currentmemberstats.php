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
                elseif($sort == "textad_clicks")
	{
		
                              $query = "SELECT * FROM members where textad_clicks ORDER BY `members`.`textad_clicks` DESC";
	}

	elseif($sort == "htmlad_clicks")
	{
		$query = "SELECT * FROM members where htmlad_clicks ORDER BY `members`.`htmlad_clicks` DESC";
	}
	elseif($sort == "solo_clicks")
	{
		$query = "SELECT * FROM members where solo_clicks ORDER BY `members`.`solo_clicks` DESC";
	}
	elseif($sort == "banner_clicks")
	{
		$query = "SELECT * FROM members where banner_clicks ORDER BY `members`.`banner_clicks` DESC";
	}
	elseif($sort == "button_clicks")
	{
		$query = "SELECT * FROM members where button_clicks ORDER BY `members`.`button_clicks` DESC";
	}
	elseif($sort == "hotlink_clicks")
	{
		$query = "SELECT * FROM members where hotlink_clicks ORDER BY `members`.`hotlink_clicks` DESC";
	}
                  elseif($sort == "navtop_clicks")
	{
		$query = "SELECT * FROM members where navtop_clicks ORDER BY `members`.`navtop_clicks` DESC";
	}
                elseif($sort == "navbot_clicks")
	{
		$query = "SELECT * FROM members where navbot_clicks ORDER BY `members`.`navbot_clicks` DESC";
	}
                elseif($sort == "ptc_clicks")
	{
		$query = "SELECT * FROM members where ptc_clicks ORDER BY `members`.`ptc_clicks` DESC";
	}
                elseif($sort == "traffic_clicks")
	{
		$query = "SELECT * FROM members where traffic_clicks ORDER BY `members`.`traffic_clicks` DESC";
	}
	else
	{
		$query = "SELECT * FROM members where textad_clicks ORDER BY `members`.`textad_clicks` DESC";
	}
	$result = mysql_query ($query)
	     or die ("Query failed");
       $num_rows = mysql_num_rows($result);


$textlinksTotQuery = "SELECT SUM(textad_clicks) as total_textad_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($textlinksTotQuery)); 
$texttotal = $sRow['total_textad_clicks']; 

$htmllinksTotQuery = "SELECT SUM(htmlad_clicks) as total_htmlad_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($htmllinksTotQuery)); 
$htmltotal = $sRow['total_htmlad_clicks']; 

$sololinksTotQuery = "SELECT SUM(solo_clicks) as total_solo_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($sololinksTotQuery)); 
$solototal = $sRow['total_solo_clicks']; 

$bannerlinksTotQuery = "SELECT SUM(banner_clicks) as total_banner_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($bannerlinksTotQuery)); 
$bannertotal = $sRow['total_banner_clicks']; 

$buttonlinksTotQuery = "SELECT SUM(button_clicks) as total_button_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($buttonlinksTotQuery)); 
$buttontotal = $sRow['total_button_clicks']; 

$hotlinklinksTotQuery = "SELECT SUM(hotlink_clicks) as total_hotlink_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($hotlinklinksTotQuery)); 
$hotlinktotal = $sRow['total_hotlink_clicks']; 

$trafficlinksTotQuery = "SELECT SUM(traffic_clicks) as total_traffic_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($trafficlinksTotQuery)); 
$total = $sRow['total_traffic_clicks']; 

$navtopTotQuery = "SELECT SUM(navtop_clicks) as total_navtop_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($navtopTotQuery)); 
$navtoptotal = $sRow['total_navtop_clicks']; 

$navbotTotQuery = "SELECT SUM(navbot_clicks) as total_navbot_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($navbotTotQuery)); 
$navbottotal = $sRow['total_navbot_clicks']; 

$ptcTotQuery = "SELECT SUM(ptc_clicks) as total_ptc_clicks 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($ptcTotQuery)); 
$ptctotal = $sRow['total_ptc_clicks']; 


    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> 


<?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

        echo "<center><H2>Today's Active Member Stats</H2><br>(Page loads with text ads sorted -  To view full stats click on each sort link)</center>";

?>
<br>
<center>The member has clicked on this many ads today. (Only members that have clicked on ads will show)
<table width=100% border=0 cellpadding=2 cellspacing=2>
<tr>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=userid">Userid</a></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=textad_clicks">Text<a><br><? echo $texttotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=htmlad_clicks">Html</a><br><? echo $htmltotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=solo_clicks">Solo</a><br><? echo $solototal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=banner_clicks">Banner</a><br><? echo $bannertotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=button_clicks">Button</a><br><? echo $buttontotal; ?></font></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=hotlink_clicks">Hot Link</a></font><br><? echo $hotlinktotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=navtop_clicks">Nav Top</a></font><br><? echo $navtoptotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=navbot_clicks">Nav Bot</a></font><br><? echo $navbottotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=ptc_clicks">PTC</a></font><br><? echo $ptctotal; ?></center></td>
<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><a href="currentmemberstats.php?sortby=traffic_clicks">Traffic</a><br><? echo $total; ?></font></center></td>
</tr>
<?
    	while ($line = mysql_fetch_array($result)) {
        		$id = $line["id"];
                $adbody = $line["adbody"];
				$userid = $line["userid"];
                $textad_clicks = $line["textad_clicks"]; 
                $htmlad_clicks = $line["htmlad_clicks"];
                $solo_clicks = $line["solo_clicks"];
                $banner_clicks = $line["banner_clicks"];
                $button_clicks = $line["button_clicks"];
                $hotlink_clicks = $line["hotlink_clicks"];
                $navtop_clicks = $line["navtop_clicks"];
                $navbot_clicks = $line["navbot_clicks"];
                $ptc_clicks = $line["ptc_clicks"];
                $traffic_clicks = $line["traffic_clicks"];

?><tr>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $textad_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $htmlad_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $solo_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $banner_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $button_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $hotlink_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $navtop_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $navbot_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $ptc_clicks; ?></font></center></td>
<td bgcolor="<? echo $basecolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $traffic_clicks; ?></font></center></td>

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