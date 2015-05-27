<?
if($verified == 0) {

include("../banners2.php");

if($_POST['resend']) {



	$message = "Hello,\n\n"

		   ."Please verify your email address by clicking this link ".$domain."/verify.php?userid=".$userid."&email=".$contact_email."\n\n"

		   ."Thank you!\n\n\n"

		   .$sitename." Admin\n"

		   ."".$adminemail."\n\n\n\n";



	$headers .= "From: $sitename<$adminemail>\n";

	$headers .= "Reply-To: <$adminemail>\n";

	$headers .= "X-Sender: <$adminemail>\n";

	$headers .= "X-Mailer: PHP4\n";

	$headers .= "X-Priority: 3\n";

	$headers .= "Return-Path: <$adminemail>\n";



	@mail($contact_email, $sitename." Email Verification", wordwrap(stripslashes($message)),$headers, "-f$adminemail");

	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

	echo "<center><p><font color=red>A verification email has been sent to ".$contact_email.", please click the verification link.</font></p></center>";



}


?>
<p align="center">&nbsp;

	<form method="POST">
	<input type="hidden" name="resend" value="1">
	<input type="image" src="../images/resend.gif" border="0" name="submit" alt="Click Here To Resend Email Verification Notice!">
	</form>

&nbsp;</p>
<?
include("../footer.php");
exit;
}
?>
<table align=center width="960" bgcolor=#F4D223><tr><td><center>
<b>Your Membership Level Is: <font color=RED>
<?
if(strpos($_SERVER['SCRIPT_NAME'], "members/")) {

		if ($memtype=="PRO") {

			echo $lowerlevel . " - <a href=\"upgrade.php\">Upgrade Here</a>";

		} elseif ($memtype=="JV Member") {

			echo $middlelevel . " - <a href=\"upgrade.php\">Upgrade to " . $toplevel . " Here</a>";

		}  elseif ($memtype=="SUPER JV") {

			echo $toplevel;

		}
}
?>
</font></b> 
&nbsp;&nbsp;&nbsp;

 <b><font color=RED>Your Points Balance: <font color=BLUE><? echo round($points, 3); ?></font></b>
&nbsp;&nbsp;&nbsp;

 <b>Your Commissions Balance: <font color=BLUE>$<? echo round($commission, 4); ?></font></font></b><br>
<b>You currently have<font color=BLUE> <? echo $surfcredits; ?> surf credits!  </font>SURF TO EARN MORE CREDITS!</b>

</center>
</td></tr></table>
<?php
####################################################################################### HOT HEADLINE ADZ + HOT HEADER AD COMBINATION July 11 2010 - SABRINA MARKON
if ($memtype=="SUPER JV")
{
$hheadlineadearn = $superjvhheadlineadearn;
$hheaderadearn = $superjvhheaderadearn;
}
if ($memtype=="JV Member")
{
$hheadlineadearn = $jvhheadlineadearn;
$hheaderadearn = $jvhheaderadearn;
}
if (($memtype!="SUPER JV") and ($memtype!="JV Member"))
{
$hheadlineadearn = $prohheadlineadearn;
$hheaderadearn = $prohheaderadearn;
}
###########
$hheadlinequeryexclude = "
			SELECT h.*
			FROM hheadlineads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheadlineadid FROM hheadlineadclicks WHERE userid = '$userid')
			ORDER BY RAND()
";
$hheadlineresult = mysql_query($hheadlinequeryexclude);
$hheadlinerows = mysql_num_rows($hheadlineresult);
###########
$hheaderqueryexclude = "
			SELECT h.*
			FROM hheaderads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheaderadid FROM hheaderadclicks WHERE userid = '$userid')
			ORDER BY RAND()
";
$hheaderresult = mysql_query($hheaderqueryexclude);
$hheaderrows = mysql_num_rows($hheaderresult);
###########
if (($hheadlinerows > 0) or ($hheaderrows > 0))
{
?>
<table align="center" width="960" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
<?php
if ($hheadlinerows > 0)
{
$hheadlinequeryexclude2 = "
			SELECT h.*
			FROM hheadlineads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheadlineadid FROM hheadlineadclicks WHERE userid = '$userid')
			ORDER BY RAND() limit 1
";
$hheadlineresult2 = mysql_query($hheadlinequeryexclude2);
while($hheadlineinfo = mysql_fetch_array($hheadlineresult2))
{
mysql_query("update hheadlineads set views=views+1 where id='".$hheadlineinfo['id']."'");
?>
<tr>
<td width=480 bgcolor="<?php echo $hheaderadtopnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadtopnotefontcolor ?>; font-family: <?php echo $hheaderadtopnotefontface ?>; size: <?php echo $hheaderadtopnotefontsize ?>;">HOT Headline Adz! - Click To The Right for <b><?php echo $hheadlineadearn ?> points --></b></td>
<?php
if($hheadlineinfo['bold'])
	{
	echo "<td bgcolor=\"".$hheadlineinfo['bgcolor']."\" align=center><a href=\"./hheadlineclicks1.php?id=".$hheadlineinfo['id']."\" target=\"_blank\"><b><font color=\"".$hheadlineinfo['color']."\"><b>".$hheadlineinfo['title']."</font></b></a></td>";
	}
else
	{
	echo "<td bgcolor=\"".$hheadlineinfo['bgcolor']."\" align=center><a href=\"./hheadlineclicks1.php?id=".$hheadlineinfo['id']."\" target=\"_blank\"><b><font color=\"".$hheadlineinfo['color']."\">".$hheadlineinfo['title']."</font></b></a></td>";
	}
?>
</tr>
<?php
}
} # if ($hheadlinerows > 0)
if ($hheadlinerows < 1)
{
if ($hheaderrows > 0)
	{
?>
<tr>
<td colspan="2" bgcolor="<?php echo $hheaderadbottomnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadbottomnotefontcolor ?>; font-family: <?php echo $hheaderadbottomnotefontface ?>; size: <?php echo $hheaderadbottomnotefontsize ?>;">^ ^ ^ Featured HOT Header Ad! - Click the Hot Header Ad below for <b><?php echo $hheaderadearn ?> points ^ ^ ^</b> - <a href="advertise.php" style="text-decoration: underline;"><b>Order Yours Today!</b></a></font></b>
</td>
</tr>
<?php
	} # if ($hheaderrows > 0)
} # if ($hheadlinerows < 1)
###########
if ($hheaderrows > 0)
{
$hheaderqueryexclude2 = "
			SELECT h.*
			FROM hheaderads h
			WHERE	h.userid != '$userid' AND
					h.approved = 1 AND
					h.max > h.clicks AND
					h.id NOT IN (SELECT hheaderadid FROM hheaderadclicks WHERE userid = '$userid')
			ORDER BY RAND() limit 1
";
$hheaderresult2 = mysql_query($hheaderqueryexclude2);
while($hheaderinfo = mysql_fetch_array($hheaderresult2))
{
$hheaderid = $hheaderinfo['id'];
$hheaderbanner = $hheaderinfo['banner'];
$hheaderbgcolor = $hheaderinfo['bgcolor'];
$hheaderheading = $hheaderinfo['heading'];
$hheaderheadingfontcolor = $hheaderinfo['headingfontcolor'];
$hheaderdescription = $hheaderinfo['description'];
$hheaderdescriptionfontcolor = $hheaderinfo['descriptionfontcolor'];
mysql_query("update hheaderads set views=views+1 where id=\"$hheaderid\"");
?>
<tr>
<td width=480 bgcolor="<?php echo $hheaderbgcolor ?>" align="center"><a target="_blank" href="./hheaderadclicks.php?id=<?php echo $hheaderid ?>" target=\"_blank\">
<img src="<?php echo $hheaderbanner ?>" border="0" height="60" width="468"></a></td>
<td bgcolor="<?php echo $hheaderbgcolor ?>"><div style="width: 480px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hheaderheadingfontcolor ?>;"><b><a style="color:<?php echo $hheaderheadingfontcolor ?>" target="_blank" href="./hheaderadclicks.php?id=<?php echo $hheaderid ?>"><?php echo $hheaderheading ?></a></b></div><div style="width: 480px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hheaderdescriptionfontcolor ?>;"><?php echo $hheaderdescription ?></div></td>
</tr>
<?php
} # while($hheaderinfo = mysql_fetch_array($hheaderresult2))
?>
<tr>
<td colspan="2" bgcolor="<?php echo $hheaderadbottomnotebgcolor ?>" align="center"><b><font style="color: <?php echo $hheaderadbottomnotefontcolor ?>; font-family: <?php echo $hheaderadbottomnotefontface ?>; size: <?php echo $hheaderadbottomnotefontsize ?>;">^ ^ ^ Featured HOT Header Ad! - Click the Hot Header Ad above for <b><?php echo $hheaderadearn ?> points ^ ^ ^</b> - <a href="advertise.php" style="text-decoration: underline;"><b>Order Yours Today!</b></a></font></b>
</td>
</tr>
</table>
<?php
} # if ($hheaderrows > 0)
} # if (($hheadlinerows > 0) or ($hheaderrows > 0))
####################################################################################### END HOT HEADLINE ADZ + HOT HEADER AD COMBINATION July 11 2010 - SABRINA MARKON
?>
<br>
<table width=960><tr>
<td width="10%" valign=top id="navigation">
<?
if ($bonus_viewed=="0")
	{
	?>
	<center>
	<b>Click Banner</b><br>
	<a href="bonusframe.php" target="_blank">
	<img src="<?php echo $domain ?>/images/dailybonus.gif" border="0"></a><br>
	<font face="tahoma" size="2"><b>
	For Daily BONUS Points</b></font>
	</center>
	<br>
	<?php
	} 
else
	{
	?>
	<center><img src="<?php echo $domain ?>/images/dailybonusclicked.gif" border="0"></center><br>
	<?php
	}
?>

<?

$sql = mysql_query("SELECT * FROM topnav WHERE 1");
if(@mysql_num_rows($sql) < $topnavmax+1) {



echo "<font face=\"Tahoma\" size=\"2\"><center><b>TOP NAV LINKS</b><br><font size=\"1\">Earn&nbsp;";

if ($memtype=="PRO") {
					$earn = $pronavtopearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvnavtopearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvnavtopearn;
				}
echo "$earn Points Per Click</font></center>\n";

//first clear the database of expired links
	$queryd="delete from topnav where date<'".(time()-7*24*60*60)."' and status=1";
	$resultd=mysql_query($queryd);
	
		$navquery = "SELECT * FROM topnav WHERE added=1 AND status=1 ORDER BY rand() LIMIT $topnavmax";
	$navresult = mysql_query ($navquery)
	        or die ("Query failed");

 

    while ($navline = mysql_fetch_array($navresult)) {
	  	$navurl = $navline["targeturl"];
	    $navname = $navline["name"];
                                   $navid = $navline["id"];
$banbannerurl = $navline["targeturl"];

//update the banners displayed
    $upnavquery = "update topnav set shown=shown+1, show_views=show_views+1 where id=".$navid;
    $upnavresult = mysql_query ($upnavquery);
		
	        ?>

	        <BR><table border=1 cellpadding=0 cellspacing=0 width=165 height=26><tr valign=middle><td align="center" nowrap style="background="/images/button2.jpg" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="<? echo "topnavclicks.php?id=".$navid; ?>" target="_blank" class="button" onmouseover="window.status='<? echo $navname; ?>';return true" onMouseOut="window.status='';return true" target="_blank"><font color="#000000"><? echo $navname; ?></font></a></td></tr></table>
			<?
	}


 } else echo "<p><font face=\"Tahoma\" size=\"2\"><a href=\"advertise.php\"><center><b>Purchase A Top Navigational Link</b></center></a></font></p>";
		




?>
<br>
<?

	$navquery = "SELECT * FROM navigation where status='ON' ORDER BY seq";
	$navresult = mysql_query ($navquery)
	        or die ("Query failed");

    #echo "<TABLE BGCOLOR=\"".$nav_bg."\" border=0 width=165 cellpadding=\"1\" cellspacing=\"0\"><tr><td>";
	echo "<TABLE border=0 width=165 cellpadding=\"1\" cellspacing=\"0\"><tr><td>";


    while ($navline = mysql_fetch_array($navresult)) {
	  	$navurl = str_replace("%USERID%", urlencode($userid), $navline["url"]);
		$navname = $navline["name"];
			
	       if ($navline["memtype"]==$memtype OR $navline["memtype"]==""){



			
						if(strpos($navname, "%NEW%")) {
						
						$navname = str_replace("%NEW%", "", $navname);
				
					?>
					 
	        <center><table border=1 cellpadding=0 cellspacing=0 width=165 height=30><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundImage='url(<?php echo $domain ?>/images/button3.png)'" onMouseOver="this.style.backgroundImage='url(<?php echo $domain ?>/images/button3.png)'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="<? echo $navurl; ?>" class="button" target="_blank" onmouseover="window.status='<? echo $navname; ?>';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;<? echo $navname; ?>&nbsp;&nbsp;&nbsp;</font></a></td></tr></table>
			<?
				
							} else {
							
					?>
					 
	        <center><table border=0 cellpadding=0 cellspacing=0 width=165 height=30><tr valign=middle><td align="center" wrap style="background-image:url('<?php echo $domain ?>/images/button1.png')" onMouseDown="this.style.backgroundImage='url(<?php echo $domain ?>/images/button3.png)'" onMouseOver="this.style.backgroundImage='url(<?php echo $domain ?>/images/button3.png)'"onMouseOut="this.style.backgroundImage='url(<?php echo $domain ?>/images/button1.png)'"><a href="<? echo $navurl; ?>" class="button" onmouseover="window.status='<? echo $navname; ?>';return true" onMouseOut="window.status='';return true"><font color="#000000">&nbsp;&nbsp;&nbsp;<? echo $navname; ?>&nbsp;&nbsp;&nbsp;</font></a></td></tr></table>
			<?					
							
							}			
			
			

						}
	}
echo "<br>";
############################################################################################################### FEATURED ADS - Sabrina Markon - June 2 2010
$featuredadq1 = "select * from featuredads where views<=max and approved=1 order by rand() limit $featuredadnumberofboxes";
$featuredadr1 = mysql_query($featuredadq1);
$featuredadrows1 = mysql_num_rows($featuredadr1);
if ($featuredadrows1 > 0)
{
echo "<font size=2 face='$fonttype' color='$fontcolour'><center>";
echo "<br><font face=\"Tahoma\" size=\"2\"><center><b>FEATURED ADS</b><br><font size=\"1\">";
if ($memtype == "SUPER JV")
{
$featuredadearn = $superjvfeaturedadearn;
}
if ($memtype == "JV Member")
{
$featuredadearn = $jvfeaturedadearn;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$featuredadearn = $profeaturedadearn;
}
echo "Earn $featuredadearn Points Per Click</font></center><br>";
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"$featuredadwidth\" align=\"center\">";
$topborder = 0;
while ($featuredadrowz1 = mysql_fetch_array($featuredadr1))
	{
	$featuredadid = $featuredadrowz1["id"];
	$featuredaduserid = $featuredadrowz1["userid"];
	if ($featuredaduserid != $userid)
	{
	$featuredviewq = "update featuredads set views=views+1 where id=\"$featuredadid\"";
	$featuredviewr = mysql_query($featuredviewq);
	}
	$featuredadheading = $featuredadrowz1["heading"];
	$featuredadheading = stripslashes($featuredadheading);
	$featuredadheadinghighlight = $featuredadrowz1["headinghighlight"];
	if ($featuredadheadinghighlight == "")
	{
	$featuredadheadinghighlight = $featuredadheadingbgcolor;
	}
	$featuredaddescription = $featuredadrowz1["description"];
	$featuredaddescription = stripslashes($featuredaddescription);
	$featuredaddescription = trim($featuredaddescription);
	$featuredaddescription = nl2br($featuredaddescription);
	$featuredadredircturl = "../featuredadclicks1.php?id=" . $featuredadid;
	if ($topborder != 0)
	{
	$onepixeltopborder = " border-top: 0px;";
	}
	$topborder = $topborder+1;
?>
<tr><td align="center">
<div onclick="window.open('<?php echo $featuredadredircturl ?>','_blank');" id="featuredadpanetop" style="text-align: left; font-weight: bold; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; background: <?php echo $featuredadheadinghighlight ?>; border: 1px solid <?php echo $featuredadheadingbordercolor ?>; border-bottom: 0px; overflow: visible; padding: 4px; color: <?php echo $featuredadheadingfontcolor ?>; font-family: '<?php echo $featuredadheadingfontface ?>'; font-size: <?php echo $featuredadheadingfontsize ?>; overflow: hidden; cursor: pointer;<?php echo $onepixeltopborder ?>">
<div id="featuredadpanetitle" style="width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; text-align: center; overflow: hidden; cursor: pointer;">
<?php
echo $featuredadheading;
?>
</div>
</div>
<div onclick="window.open('<?php echo $featuredadredircturl ?>','_blank');" id="featuredadpane" style="text-align: left; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheight ?>px; background: <?php echo $featuredaddescbgcolor ?>; border: 1px solid <?php echo $featuredaddescbordercolor ?>; overflow: hidden; padding: 4px; color: <?php echo $featuredaddescfontcolor ?>; font-family: '<?php echo $featuredaddescfontface ?>'; font-size: <?php echo $featuredaddescfontsize ?>; text-align: center; cursor: pointer;">
<div id="featuredaddescpane" style="padding: 4px; cursor: pointer;">
<?php
echo $featuredaddescription;
?>
</div>
</div>
</td></tr>
<?php
	} # while ($featuredadrowz1 = mysql_fetch_array($featuredadr1))
if ($featuredadadsbytext != "")
{
?>
<tr><td align="center">
<div onclick="window.open('<?php echo $featuredadadsbyurl ?>','_blank');" id="featuredadadsby" style="text-align: left; font-weight: bold; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadadsbyheight ?>px; background: <?php echo $featuredadadsbybgcolor ?>; border: 1px solid <?php echo $featuredadadsbybordercolor ?>; overflow: hidden; padding: 4px; color: <?php echo $featuredadadsbyfontcolor ?>; font-family: '<?php echo $featuredadadsbyfontface ?>'; font-size: <?php echo $featuredadadsbyfontsize ?>; overflow: hidden; cursor: pointer; border-bottom: 1px solid  <?php echo $featuredadadsbybordercolor ?>; border-top: 0px;">
<div id="featuredadadsbytext" style="width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadadsbyheight ?>px; text-align: center; overflow: hidden; cursor: pointer;">
<?php
echo $featuredadadsbytext;
?>
</div>
</div>
<?php
}
echo "</table><br>";
} # if ($featuredadrows1 > 0)
############################################################################################################### END FEATURED ADS - Sabrina Markon - June 2 2010

$sql = mysql_query("SELECT * FROM botnav WHERE 1");
if(@mysql_num_rows($sql) < $navmax+1) {



echo "<font face=\"Tahoma\" size=\"2\"><center><b>BOTTOM NAV LINKS</b><br><font size=\"1\">Earn&nbsp;";

if ($memtype=="PRO") {
					$earn = $probotnavearn;
				}
				elseif ($memtype=="JV Member"){
					$earn = $jvbotnavearn;
				}
				elseif ($memtype=="SUPER JV"){
				$earn = $superjvbotnavearn;
				}
echo "$earn Points Per Click</font></center>\n";

//first clear the database of expired links
	$queryd="delete from botnav where date<'".(time()-7*24*60*60)."' and status=1";
	$resultd=mysql_query($queryd);
	
		$navquery = "SELECT * FROM botnav WHERE added=1 AND status=1 ORDER BY rand() LIMIT $navmax";
	$navresult = mysql_query ($navquery)
	        or die ("Query failed");

 

    while ($navline = mysql_fetch_array($navresult)) {
	  	$navurl = $navline["targeturl"];
	    $navname = $navline["name"];
                                   $navid = $navline["id"];
$banbannerurl = $navline["targeturl"];

//update the banners displayed
    $upnavquery = "update botnav set shown=shown+1, show_views=show_views+1 where id=".$navid;
    $upnavresult = mysql_query ($upnavquery);
		
	        ?>

	        <BR><table border=1 cellpadding=0 cellspacing=0 width=165 height=26><tr valign=middle><td align="center" nowrap style="background:white" onMouseDown="this.style.backgroundColor='#FFFFFF'" onMouseOver="this.style.backgroundColor='<? echo $nav_hover; ?>'" onMouseOut="this.style.backgroundColor='#FFFFFF'"><a href="<? echo "botnavclicks.php?id=".$navid; ?>" target="_blank" class="button" onmouseover="window.status='<? echo $navname; ?>';return true" onMouseOut="window.status='';return true" target="_blank"><font color="#000000"><? echo $navname; ?></font></a></td></tr></table>
			<?
	}


 } else echo "<p><font face=\"Tahoma\" size=\"2\"><a href=\"advertise.php\"><center><b>Purchase A Bottom Navigational Link</b></center></a></font></p>";
		




echo "<br><br>";

include("../buttons.php");


    ?>

<br>
</center></td>
</tr>
</table>
<td width="85%" valign="top">

<?
if($vacation == 1 ) {

include("../banners.php");
?>

<center>
<br><br>
<form method="POST" action="vacation.php?action=back">
<input type="image" src="../images/vacation.gif" border="0" name="submit" alt="Click Here To Set Your Vacation Status to OFF!">
</form>
<br><br>
</center>

</td></tr></table>
<?
include("../footer.php");
exit;
}
?>