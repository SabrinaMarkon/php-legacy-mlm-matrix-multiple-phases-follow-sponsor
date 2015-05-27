<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    $count= mysql_query("select * from members WHERE verified='1'");

    $rowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from members WHERE memtype='PRO' and verified='1'");
    $prorowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from members WHERE memtype='JV Member' and verified='1'");
    $jvrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from members WHERE memtype='SUPER JV' and verified='1'");
    $superjvrowcount = @ mysql_num_rows($count);



$count= mysql_query("select * from members WHERE verified='0'");
    $unverifiedrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from members WHERE vacation='1'");
    $vacationrowcount = @ mysql_num_rows($count);

$pointsTotQuery = "SELECT SUM(points) as total_points 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($pointsTotQuery)); 
$total = $sRow['total_points']; 

$commissionTotQuery = "SELECT SUM(commission) as total_commission 
FROM 
members"; 
$sRow = mysql_fetch_array(mysql_query($commissionTotQuery)); 
$totalc = $sRow['total_commission']; 



$count= mysql_query("select * from solos WHERE sent='0'");
    $solorowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from banners WHERE status='0'");
    $bannersrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from banners WHERE status='1'");
    $bannersarowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from buttons WHERE status='0'");
    $buttonsrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from buttons WHERE status='1'");
    $buttonsarowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from tlinks WHERE added='0'");
    $tlinksrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from tlinks WHERE added='1'");
    $tlinksarowcount = @ mysql_num_rows($count);




$shownTotQuery = "SELECT SUM(shown) as total_shown FROM banners"; 
$sRow = mysql_fetch_array(mysql_query($shownTotQuery)); 
$shown = $sRow['total_shown']; 

$clicksTotQuery = "SELECT SUM(clicks) as total_clicks FROM banners"; 
$sRow = mysql_fetch_array(mysql_query($clicksTotQuery)); 
$clicks = $sRow['total_clicks']; 


$maxTotQuery = "SELECT SUM(max) as total_max FROM banners WHERE status='1'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$max = $sRow['total_max']; 

$maxTotQuery = "SELECT SUM(max) as total_max FROM banners WHERE status='0'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$maxu = $sRow['total_max']; 

$maxTotQuery = "SELECT SUM(max) as total_max FROM banners"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$maxt = $sRow['total_max']; 

$shownTotQuery = "SELECT SUM(shown) as total_shown FROM buttons"; 
$sRow = mysql_fetch_array(mysql_query($shownTotQuery)); 
$bshown = $sRow['total_shown']; 

$clicksTotQuery = "SELECT SUM(clicks) as total_clicks FROM buttons"; 
$sRow = mysql_fetch_array(mysql_query($clicksTotQuery)); 
$bclicks = $sRow['total_clicks']; 


$maxTotQuery = "SELECT SUM(max) as total_max FROM buttons WHERE status='1'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$bmax = $sRow['total_max']; 

$maxTotQuery = "SELECT SUM(max) as total_max FROM buttons WHERE status='0'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$bmaxu = $sRow['total_max']; 

$maxTotQuery = "SELECT SUM(max) as total_max FROM buttons"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$bmaxt = $sRow['total_max']; 



$maxTotQuery = "SELECT SUM(paid) as total_paid FROM tlinks WHERE added='0'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$tlinksmaxu = $sRow['total_paid'];

$maxTotQuery = "SELECT SUM(paid) as total_paid FROM tlinks WHERE added='1'"; 
$sRow = mysql_fetch_array(mysql_query($maxTotQuery)); 
$tlinksmax = $sRow['total_paid'];

$clicksTotQuery = "SELECT SUM(sent) as total_sent FROM tlinks"; 
$sRow = mysql_fetch_array(mysql_query($clicksTotQuery)); 
$tlinksclicks = $sRow['total_sent'];



$count= mysql_query("select * from post");
    $postrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from clicks");
    $clicksrowcount = @ mysql_num_rows($count);


$count= mysql_query("select * from viewed");
    $viewedrowcount = @ mysql_num_rows($count);


$count= mysql_query("select * from post_html");
    $post_htmlrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from viewed_html");
    $viewed_htmlrowcount = @ mysql_num_rows($count);

$count= mysql_query("select * from adminclicks");
    $adminclicksrowcount = @ mysql_num_rows($count);



    	?>






<table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> 
    <table width=70% border=0 cellpadding=2 cellspacing=2>
<tr><td>
Member Count: <? echo $rowcount; ?></p>
<?php echo $lowerlevel ?> Members: <? echo $prorowcount; ?></p>
<?php echo $middlelevel ?> Members: <? echo $jvrowcount; ?></p>
<?php echo $toplevel ?> Members: <? echo $superjvrowcount; ?></p>
Unverified Members: <? echo $unverifiedrowcount; ?></p>
Members On Vacation Status: <? echo $vacationrowcount; ?></p>
Total Member Points Balance: <? echo $total; ?></p>
Total Commissions Due Balance: <? echo $totalc; ?></p>
Unused Solo Ads: <? echo $solorowcount; ?></p>
Total Unactive Banners: <? echo $bannersrowcount; ?></p>
Total Active Banners: <? echo $bannersarowcount; ?></p>
Total Banners Shown: <? echo $shown; ?></p>
Total Banners Clicks: <? echo $clicks; ?></p>
Total Active Banners Impressions to be delivered: <? echo $max; ?></p>
Total UnActive Banners Impressions to be delivered: <? echo $maxu; ?></p>
Total Banners Impressions to be delivered: <? echo $maxt; ?></p>
Total Unactive Buttons: <? echo $buttonsrowcount; ?></p>
Total Active Buttons: <? echo $buttonsarowcount; ?></p>
Total Buttons Shown: <? echo $bshown; ?></p>
Total Buttons Clicks: <? echo $bclicks; ?></p>
Total Active Buttons Impressions to be delivered: <? echo $bmax; ?></p>
Total UnActive Buttons Impressions to be delivered: <? echo $bmaxu; ?></p>
Total Buttons Impressions to be delivered: <? echo $bmaxt; ?></p>
Total Unactive Traffic Links: <? echo $tlinksrowcount; ?></p>
Total Active Traffic Links: <? echo $tlinksarowcount; ?></p>
Total UnActive Traffic Views to be delivered: <? echo $tlinksmaxu; ?></p>
Total Active Traffic Views to be delivered: <? echo $tlinksmax; ?></p>
Total Traffic Link Clicks: <? echo $tlinksclicks; ?></p>
Active Text Post: <? echo $postrowcount; ?></p>
Active Html Post: <? echo $post_htmlrowcount; ?></p>
Viewed Text Post: <? echo $viewedrowcount; ?></p>
Viewed Html Post: <? echo $viewed_htmlrowcount; ?></p>
Solo Ads Clicked: <? echo $clicksrowcount; ?></p>
Admin Solo Ads Clicked: <? echo $adminclicksrowcount; ?></p>
<?
     echo "</td></tr></table></td></tr></table>";
  	}
else  {
	echo "Unauthorised Access!";
    }
