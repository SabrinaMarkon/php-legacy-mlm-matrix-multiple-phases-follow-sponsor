<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
if ( !session_is_registered("ulogin") )
{
   ?>
   <!-- Not Logged In -->
   <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>
   <?
   include "../footer.php";
   exit;
}

if( session_is_registered("ulogin") )
   	{  // members only stuff!

if ($memtype == "SUPER JV")
{
$dailysurfsitestopostads = $superjvdailysurfsitestopostads;
}
if ($memtype == "JV Member")
{
$dailysurfsitestopostads = $jvdailysurfsitestopostads;
}
if (($memtype != "JV Member") and ($memtype != "SUPER JV"))
{
$dailysurfsitestopostads = $prodailysurfsitestopostads;
}
if (($dailysurfsitestopostads > 0) and ($dailysurfsitestopostads != ""))
{
if ($sitessurfedtoday < $dailysurfsitestopostads)
	{
?>
<p><center>You need to surf <?php echo $dailysurfsitestopostads ?> before being able to post advertising on this site. So far today you have only surfed <font color="#ff0000"><?php echo $sitessurfedtoday ?></font> surf pages. This count resets to 0 daily.<br><br><a href="surf.php">CLICK HERE TO SURF!</a></center></p>
<?
include "../footer.php";
exit;	
	}
}
   
   if($_POST['action'] = "resetbanner") {
	mysql_query("UPDATE banners SET show_clicks=0, show_views=0 WHERE id='".$_POST['id']."' AND userid='".$userid."'");
   }

if($_POST['action'] = "resetbuttons") {
	mysql_query("UPDATE buttons SET show_clicks=0, show_views=0 WHERE id='".$_POST['id']."' AND userid='".$userid."'");

   }
   
   if($_POST['dell']) {
	   $sql = mysql_query("DELETE FROM loginads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['dell'])."' LIMIT 1");
   }
   
   
   if($_POST['delt']) {
	   $sql = mysql_query("DELETE FROM tlinks where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delt'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM tlviews where tlid='".intval($_POST['delt'])."'");
   }
   
 if($_POST['delptc']) {
	   $sql = mysql_query("DELETE FROM ptcads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delptc'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM ptcadviews where tlid='".intval($_POST['delt'])."'");
   }
 if($_POST['delfullloginad']) {
	   $sql = mysql_query("DELETE FROM fullloginads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delfullloginad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM fullloginadviews where fullloginadid='".intval($_POST['delfullloginad'])."'");
   }
 if($_POST['delfeaturedad']) {
	   $sql = mysql_query("DELETE FROM ptcads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delfeaturedad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM featuredadclicks where featuredadid='".intval($_POST['delfeaturedad'])."'");
   }
  if($_POST['delhheadlinead']) {

	   $sql = mysql_query("DELETE FROM hheadlineads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delhheadlinead'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM hheadlineadclicks where hheadlineadid='".intval($_POST['delhheadlinead'])."'");
   }
 if($_POST['delhheaderad']) {

	   $sql = mysql_query("DELETE FROM hheaderads where userid='".$_SESSION[uname]."' and id = '".intval($_POST['delhheaderad'])."' LIMIT 1");
	   if(@mysql_num_rows($sql)) mysql_query("DELETE FROM hheaderadclicks where hheaderadid='".intval($_POST['delhheaderad'])."'");
   } 
################################################
if ($memtype == "SUPER JV")
{
$fullloginadprice = $superjvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricesuperjv;
$featuredadprice = $superjvfeaturedadprice;
$featuredadpointprice = $featuredadpointpricesuperjv;
$featuredadmaxhits = $superjvfeaturedadmaxhits;
$hheadlineadprice = $superjvhheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricesuperjv;
$hheadlineadmaxhits = $superjvhheadlineadmaxhits;
$hheaderadprice = $superjvhheaderadprice;
$hheaderadpointprice = $hheaderadpointpricesuperjv;
$hheaderadmaxhits = $superjvhheaderadmaxhits;
}
if ($memtype == "JV Member")
{
$fullloginadprice = $jvfullloginadprice;
$fullloginadpointprice = $fullloginadpointpricejv;
$featuredadprice = $jvfeaturedadprice;
$featuredadpointprice = $featuredadpointpricejv;
$featuredadmaxhits = $jvfeaturedadmaxhits;
$hheadlineadprice = $jvhheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricejv;
$hheadlineadmaxhits = $jvhheadlineadmaxhits;
$hheaderadprice = $jvhheaderadprice;
$hheaderadpointprice = $hheaderadpointpricejv;
$hheaderadmaxhits = $jvhheaderadmaxhits;
}
if (($memtype != "SUPER JV") and ($memtype != "JV Member"))
{
$fullloginadprice = $profullloginadprice;
$fullloginadpointprice = $fullloginadpointpricepro;
$featuredadprice = $profeaturedadprice;
$featuredadpointprice = $featuredadpointpricepro;
$featuredadmaxhits = $profeaturedadmaxhits;
$hheadlineadprice = $prohheadlineadprice;
$hheadlineadpointprice = $hheadlineadpointpricepro;
$hheadlineadmaxhits = $prohheadlineadmaxhits;
$hheaderadprice = $prohheaderadprice;
$hheaderadpointprice = $hheaderadpointpricepro;
$hheaderadmaxhits = $prohheaderadmaxhits;
}
$lastsolopost = $userrecord["lastsolopost"];
$today = date('Y-m-d');
################################################

		include("navigation.php");
      include("../banners2.php");

        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
        //banner and solo ad payment buttons.

        ?>
		<p><font size=6>Advertising</font><br>
<?
 echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        
		$query = "SELECT * FROM pages where name='Advertiser Instructions'";
		$result = mysql_query ($query)
			or die ("Query failed");
		while ($line = mysql_fetch_array($result)) {
			$htmlcode = $line["htmlcode"];
			echo $htmlcode;
        }

?>

		
		<p>
		<b>Redeem Promo Code</b><br>
		<form method="post" action="promo.php">
		Code: <input type="text" name="code"><br>
		<input type="submit" value="Redeem Promo Code">
		</form>
		</p>
		<br><HR ALIGN= "center" size= 5 WIDTH= 75% COLOR= "#000000" NO SHADE><br>

<? 
############################################################################## FULL PAGE LOGIN AD STATS - Sabrina Markon May 30 2010
	    $query3 = "select * from fullloginads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3) or die(mysql_error());
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any Full Page Login Ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $fullloginadadded = $line3["added"];
	        if ($fullloginadadded == 0) {
	            $fullloginadstoadd = 1;
	            $fullloginadcount = $fullloginadcount+1;
	        } //end if ($fullloginadadded == 0)
	        else {
	            $fullloginadstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($fullloginadstoadd == 1) {
	        ?><br>
	          <p><font color="red"><b>You have <? echo $fullloginadcount; ?> Full Page Login Ads to add. <a href="addfullloginad.php">Click here</a> to set one up now.</b></font></p>
	        <?
	    }
	    if ($fullloginadstatstoshow == 1) {
	        ?>		  
<br>

	          <p><b>Your Full Page Login Ad Statistics</b></p>

	          <CENTER>			  
			  
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Date</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Hits</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3) or die(mysql_error());
	          while ($line4 = mysql_fetch_array($result4)) {
	            $fullloginadurl = $line4["url"];
				$fullloginadrented = $line4["rented"];
	            $fullloginadid = $line4["id"];
				$fullloginadhits = $line4["hits"];
	            $fullloginadapproved = $line4["approved"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$fullloginadurl\" target=\"_blank\">$fullloginadurl</a>"; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $fullloginadrented ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $fullloginadhits ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($fullloginadapproved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($fullloginadapproved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($fullloginadapproved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if(date('Y-m-d') > $fullloginadrented) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delfullloginad\" value=\"$fullloginadid\"><input type=\"submit\" value=\"Delete\"></form>"; 	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($fullloginadstatstoshow == 1)	
############################################################################## END FULL PAGE LOGIN AD STATS - Sabrina Markon May 30 2010

############################################################################## FEATURED AD STATS - Sabrina Markon June 2 2010
	    $query3 = "select * from featuredads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3) or die(mysql_error());
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any Featured Ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $featuredadadded = $line3["added"];
	        if ($featuredadadded == 0) {
	            $featuredadstoadd = 1;
	            $featuredadcount = $featuredadcount+1;
	        } //end if ($featuredadadded == 0)
	        else {
	            $featuredadstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($featuredadstoadd == 1) {
	        ?><br>
	          <p><font color="red"><b>You have <? echo $featuredadcount; ?> Featured Ads to add. <a href="addfeaturedad.php">Click here</a> to set one up now.</b></font></p>
	        <?
	    }
	    if ($featuredadstatstoshow == 1) {
	        ?>		  
<br>

	          <p><b>Your Featured Ad Statistics</b></p>

	          <CENTER>			  
			  
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Heading</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Maximum Hits</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Hits</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3) or die(mysql_error());
	          while ($line4 = mysql_fetch_array($result4)) {
	            $featuredadurl = $line4["url"];
				$featuredadheading = $line4["heading"];
	            $featuredadid = $line4["id"];
				$featuredadviews = $line4["views"];
				$featuredadclicks = $line4["clicks"];
				$featuredadmax = $line4["max"];
	            $featuredadapproved = $line4["approved"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $featuredadheading ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$featuredadurl\" target=\"_blank\">$featuredadurl</a>"; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $featuredadmax ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $featuredadviews ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $featuredadclicks ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($featuredadapproved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($featuredadapproved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($featuredadapproved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($featuredadviews >= $featuredadmax) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delfeaturedad\" value=\"$featuredadid\"><input type=\"submit\" value=\"Delete\"></form>"; 	
						else echo "<form method=\"post\" action=\"addfeaturedad.php\"><input type=\"hidden\" name=\"id\" value=\"$featuredadid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($featuredadstatstoshow == 1)	
############################################################################## END FEATURED AD STATS - Sabrina Markon June 2 2010

############################################################################## HOT HEADLINE ADZ STATS - Sabrina Markon July 11 2010
	    $query3 = "select * from hheadlineads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3) or die(mysql_error());
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any Hot Headline Adz in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $hheadlineadadded = $line3["added"];
	        if ($hheadlineadadded == 0) {
	            $hheadlineadstoadd = 1;
	            $hheadlineadcount = $hheadlineadcount+1;
	        } //end if ($hheadlineadadded == 0)
	        else {
	            $hheadlineadstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($hheadlineadstoadd == 1) {
	        ?>
	          <p><font color="red"><b>You have <? echo $hheadlineadcount; ?> Hot Headline Adz to add. <a href="addhheadlinead.php">Click here</a> to set one up now.</b></font></p>
	        <?
	    }
	    if ($hheadlineadstatstoshow == 1) {
	        ?>		  
<br>
	          <p><b>Your Hot Headline Ad Statistics</b></p>
				<div style="width: 580px; padding: 2px; overflow:auto;">
				<table align="center" width="580" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Heading</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Maximum Clicks</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3) or die(mysql_error());
	          while ($line4 = mysql_fetch_array($result4)) {
	            $hheadlineadurl = $line4["url"];
				$hheadlineadheading = $line4["title"];
	            $hheadlineadid = $line4["id"];
				$hheadlineadviews = $line4["views"];
				$hheadlineadclicks = $line4["clicks"];
				$hheadlineadmax = $line4["max"];
	            $hheadlineadapproved = $line4["approved"];
				$hhcolor = $line4["color"];
				$hhbgcolor = $line4["bgcolor"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $hhbgcolor; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $hhcolor; ?>"><center>
	                  <p><? echo $hheadlineadheading ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$hheadlineadurl\" target=\"_blank\">$hheadlineadurl</a>"; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $hheadlineadmax ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $hheadlineadclicks ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($hheadlineadapproved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($hheadlineadapproved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($hheadlineadapproved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($hheadlineadviews >= $hheadlineadmax) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delhheadlinead\" value=\"$hheadlineadid\"><input type=\"submit\" value=\"Delete\"></form>"; 	
						else echo "<form method=\"post\" action=\"addhheadlinead.php\"><input type=\"hidden\" name=\"id\" value=\"$hheadlineadid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
</TABLE></div><br><br>
	          <?
    	} //end ($hheadlineadstatstoshow == 1)	
############################################################################## END HOT HEADLINE ADZ STATS - Sabrina Markon June 11 2010

############################################################################## HOT HEADER AD STATS - Sabrina Markon July 11 2010
	    $query3 = "select * from hheaderads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3) or die(mysql_error());
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any Hot Header Ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $hheaderadadded = $line3["added"];
	        if ($hheaderadadded == 0) {
	            $hheaderadstoadd = 1;
	            $hheaderadcount = $hheaderadcount+1;
	        } //end if ($hheaderadadded == 0)
	        else {
	            $hheaderadstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($hheaderadstoadd == 1) {
	        ?>
	          <p><font color="red"><b>You have <? echo $hheaderadcount; ?> Hot Header Ads to add. <a href="addhheaderad.php">Click here</a> to set one up now.</b></font></p>
	        <?
	    }
	    if ($hheaderadstatstoshow == 1) {
	        ?>		  
<br>
	          <p><b>Your Hot Header Ad Statistics</b></p>
			  <div style="width: 580px; padding: 2px; overflow:auto;">
	          <table align="center" width="580" cellpadding=2 cellspacing=0 bgcolor="#FFFFFF" border=1>
	            <tr>
				<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Banner</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Heading</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">URL</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Description</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Maximum Clicks</font></center></td>
				  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3) or die(mysql_error());
	          while ($line4 = mysql_fetch_array($result4)) {
	            $hheaderadurl = $line4["url"];
				$hheaderadheading = $line4["heading"];
				$hheaderdescription = $line4["description"];
				$hheaderadbanner = $line4["banner"];
	            $hheaderadid = $line4["id"];
				$hheaderadviews = $line4["views"];
				$hheaderadclicks = $line4["clicks"];
				$hheaderadmax = $line4["max"];
	            $hheaderadapproved = $line4["approved"];
				$hhheadingfontcolor = $line["headingfontcolor"];
				$hheaderbgcolor = $line4["bgcolor"];
				$hheaderdescriptionfontcolor = $line4["descriptionfontcolor"];
	          ?>
	            <TR>
<?php
if ($hheaderadbanner == "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div>&nbsp;</div></td>
<?php
}
if ($hheaderadbanner != "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><img src="<?php echo $hheaderadbanner ?>" border="0" width="200"></td>
<?php
}
###################
if ($hheaderadheading == "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div>&nbsp;</div></td>
<?php
}
if ($hheaderadheading != "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hhheadingfontcolor ?>;"><? echo $hheaderadheading; ?></div></td>
<?php
}
?>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$hheaderadurl\" target=\"_blank\">$hheaderadurl</a>"; ?></p></font>
	                </TD>
<?php
if ($hheaderdescription == "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center><div>&nbsp;</div></td>
<?php
}
if ($hheaderdescription != "")
{
?>
<td bgcolor="<? echo $basecolour; ?>"><center>
<div style="width: 300px; height: 60px; padding: 2px; overflow:auto; background: <?php echo $hheaderbgcolor ?>; color: <?php echo $hheaderdescriptionfontcolor ?>;"><? echo $hheaderdescription; ?></div></td>
<?php
}
?>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $hheaderadmax ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $hheaderadclicks ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($hheaderadapproved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($hheaderadapproved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($hheaderadapproved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($hheaderadviews >= $hheaderadmax) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delhheaderad\" value=\"$hheaderadid\"><input type=\"submit\" value=\"Delete\"></form>"; 	
						else echo "<form method=\"post\" action=\"addhheaderad.php\"><input type=\"hidden\" name=\"id\" value=\"$hheaderadid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
</TABLE></div><br><br>
	          <?
    	} //end ($hheaderadstatstoshow == 1)	
############################################################################## END HOT HEADER AD STATS - Sabrina Markon June 11 2010

       $query = "SELECT * FROM banners where userid='".$_SESSION[uname]."'";
	    $result = mysql_query ($query)
	            or die ("Query failed");
	    $numrows = @ mysql_num_rows($result);
	    if ($numrows == 0) {
	        ?>
	          <p>You currently do not have any banners in our system.</p>
	        <?
	    }
	    while ($line = mysql_fetch_array($result)) {
	        $added = $line["added"];
	        if ($added == 0) {
	            $bannerstoadd = 1;
	            $bannercount = $bannercount+1;
	        } //end if ($added == 0)
	        else {
	            $statstoshow = 1;
	        } // end else
	    } //end while ($line = mysql_fetch_array($result))
	    if ($bannerstoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $bannercount; ?> banner(s) to add. <a href="addbanners.php">Click here</a> to set these up now.<br>NO Banner Rings...NO Pop-Ups<br>Banners MUST Be 468x60 for Rotation.</font></p></b>
	        <?
	    }
	    if ($statstoshow == 1) {
	        ?>
	          <p><b>Your banner statistics</b></p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Max Displays</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Total Displays</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Displayed</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Edit</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	            </tr>
	          <?
	          $result1 = mysql_query ($query)
	             or die ("Query failed");
	          while ($line1 = mysql_fetch_array($result1)) {
	            $name = $line1["name"];
	            $id = $line1["id"];
	            $targeturl = $line1["targeturl"];
	            $bannerurl = $line1["bannerurl"];
	            $shown = $line1["shown"];
	            $clicks = $line1["clicks"];
	            $max = $line1["max"];
	            $status = $line1["status"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $name; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $max; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $shown; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $line1["show_views"]; ?></p></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $line1["show_clicks"]; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <form method="POST" action="editbanners.php">
	                    <input type="hidden" name="id" value="<? echo $id; ?>">
	                    <input type="hidden" name="name" value="<? echo $name; ?>">
	                    <input type="hidden" name="targeturl" value="<? echo $targeturl; ?>">
	                    <input type="hidden" name="bannerurl" value="<? echo $bannerurl; ?>">
	                    <input type="submit" value="Edit">
	                    </form>
						 <? if ($status == 1) { ?>
						<form method="POST">
	                    <input type="hidden" name="id" value="<? echo $id; ?>">
	                    <input type="hidden" name="action" value="resetbanner">
	                    <input type="submit" value="Reset">
	                    </form>
	                    <? } ?>
						<? if ($max <= $shown) { ?>
	                        <form method="POST" action="deletebanners.php">
	                        <input type="hidden" name="id" value="<? echo $id; ?>">
	                        <input type="submit" value="Delete">
	                        </form> </font>
	                    <? } ?>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($status == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($status == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($status == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>


 <?
	    } //end ($statstoshow == 1)



 

    $query = "SELECT * FROM buttons where userid='".$_SESSION[uname]."'";



	    $result = mysql_query ($query)



	            or die ("Query failed");



	    $numrows = @ mysql_num_rows($result);







	    if ($numrows == 0) {



	        ?>



	          <p>You currently do not have any button ads in our system.



	        <?



	    }



	    while ($line = mysql_fetch_array($result)) {



	        $added = $line["added"];







	        if ($added == 0) {



	            $buttonstoadd = 1;



	            $buttoncount = $buttoncount+1;



	        } //end if ($added == 0)



	        else {



	            $statstoshow = 1;



	        } // end else



	    } //end while ($line = mysql_fetch_array($result))







	    if ($buttonstoadd == 1) {



	        ?><br>
	          <p><b><font color="red">You have <? echo $buttoncount; ?> Button Ad(s) to add. <a href="addbuttons.php">Click here</a> to set these up now.<br>Buttons are 125x125 Banners...No Banner Rings...NO Pop-Ups</font></p></b>
	        <?
	    }
	    if ($statstoshow == 1) {
	        ?>
	          <p><b>Your Button Ad Statistics</b></p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Max Displays</font></center></td>
	                <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Displayed</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Edit</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	            </tr>
	          <?
	          $result1 = mysql_query ($query)
	             or die ("Query failed");
	          while ($line1 = mysql_fetch_array($result1)) {
	            $name = $line1["name"];
	            $id = $line1["id"];
	            $targeturl = $line1["targeturl"];
                            $bannerurl = $line1["bannerurl"];
	            $shown = $line1["shown"];
	            $clicks = $line1["clicks"];
	            $max = $line1["max"];
	            $status = $line1["status"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $name; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $max; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $shown; ?></p></font>
	                </TD>
	              					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $clicks; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <form method="POST" action="editbuttons.php">
	                    <input type="hidden" name="id" value="<? echo $id; ?>">
	                    <input type="hidden" name="name" value="<? echo $name; ?>">
	                    <input type="hidden" name="targeturl" value="<? echo $targeturl; ?>">
	                    <input type="hidden" name="bannerurl" value="<? echo $bannerurl; ?>">
	                    <input type="submit" value="Edit">
	                    </form>
						 <? if ($status == 1) { ?>
						<form method="POST">
	                    <input type="hidden" name="id" value="<? echo $id; ?>">
	                    <input type="hidden" name="action" value="resetbuttons">
	                    <input type="submit" value="Reset">
	                    </form>
	                    <? } ?>
						<? if ($max <= $shown) { ?>
	                        <form method="POST" action="deletebuttons.php">
	                        <input type="hidden" name="id" value="<? echo $id; ?>">
	                        <input type="submit" value="Delete">
	                        </form> </font>
	                    <? } ?>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($status == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($status == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($status == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
	            </TR>
	          <?
	          } //end while


	          ?>
	            </TABLE>
	            </CENTER>
	          




	          <?
	    } //end ($statstoshow == 1)

	    $query2 = "SELECT * FROM solos where userid='".$_SESSION[uname]."'";
	    $result2 = mysql_query ($query2)
	            or die ("Query failed");
	    $numrows2 = @ mysql_num_rows($result2);
	    if ($numrows2 == 0) {
	        ?>
	          <p>You currently do not have any solo ads in our system.</p>
	        <?
	    }
	    while ($line2 = mysql_fetch_array($result2)) {
	        $soloadded = $line2["added"];
	        if ($soloadded == 0) {
	            $solostoadd = 1;
	            $solocount = $solocount+1;
	        } //end if ($added == 0)
	        else {
	            $solostatstoshow = 1;
	        } // end else
	    } //end while ($line2 = mysql_fetch_array($result2))
	    if ($solostoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $solocount; ?> solo ad(s) to add. 
			  <?
				$query5 = "SELECT * FROM solos where userid='".$userid."' and added=1 and sent=0";
			    $result5 = mysql_query ($query5)
			            or die ("Query failed");
			    $numrows5 = @ mysql_num_rows($result5);
			    if ($numrows5 < 1)
					{
						if ($memtype == "PRO")
						{
							if ($lastsolopost != $today)
							{
							echo "<a href=\"addsolos.php\">Click here</a> to set these up now.";
							}
							if ($lastsolopost == $today)
							{
							echo "Pro members may post once per day, and you have already sent out a solo ad today.<br>Please return tomorrow or upgrade for unlimited daily solo sends!";
							}
						}
						if ($memtype != "PRO")
						{
						echo "<a href=\"addsolos.php\">Click here</a> to set these up now.";
						}
					} # if ($numrows5 < 1)
				if ($numrows5 > 0)
					{
					echo "But you have to wait until your last solo has been sent to submit another one.";
					}
			  ?>
			  </font></p></b>
	        <?
	    }
	    if ($solostatstoshow == 1) {
	        ?>
	          <p><b>Your solo ad statistics<br>Please note - Your Solo Ad May Take Up To 5 Days To Go Out Due To High Demand - We Do Not Send More Than 5 Solo Ads Out Per Day To Keep Ads Effective<br></b></p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Sent</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	            </tr>
	          <?
	          $result3 = mysql_query ($query2)
	             or die ("Query failed");
	          while ($line3 = mysql_fetch_array($result3)) {
	            $subject = $line3["subject"];
	            $sent = $line3["sent"];
	            $adid = $line3["id"];
	            $approved = $line3["approved"];
	            $counter = 0;
	            $query4 = "select * from clicks where adid=".$adid;
	            $result4 = mysql_query ($query4)
	                or die ("Query 4 failed");
	                while ($line4 = mysql_fetch_array($result4)) {
	                    $counter = $counter + 1;
	                }
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p>
	                    <? if ($sent == 1) {
	                          echo "Yes";
	                       }
	                       else {
	                          echo "Sending Soon";
	                       }
	                    ?>
	                    </p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $counter; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>

<?
    	} //end ($statstoshow == 1)

	     //Hot links
		$traffictoadd = 0;
		$trafficcount = 0;
		$query2 = "SELECT * FROM hotlinks where userid='".$_SESSION[uname]."'";

	    $result2 = mysql_query ($query2)

	            or die ("Query failed");

	    $numrows2 = @ mysql_num_rows($result2);

	    if ($numrows2 == 0) {

	        ?>

	          <p>You currently do not have any hot link ads in our system.</p>



	        <?

	    }

	    while ($line2 = mysql_fetch_array($result2)) {

	        $trafficadded = $line2["added"];

	        if ($trafficadded == 0) {

	            $traffictoadd = 1;

	            $trafficcount = $trafficcount+1;

	        } //end if ($added == 0)

	        else {

	            $trafficstatstoshow = 1;

	        } // end else

	    } //end while ($line2 = mysql_fetch_array($result2))

	    if ($traffictoadd == 1) {

	        ?><br>

	          <p><font face="tahoma" size="2" color="#d20000"><b>You have <? echo $trafficcount; ?> hot link(s) to add. <a href="addhotlink.php">Click here</a> to set these up now.</b></font></p>

	        <?

	    }

	    if ($trafficstatstoshow == 1) {

	        ?><br>

	          <p><b>Your hot link statistics</b></p>

	          <CENTER>

	            <table width=70% border=0 cellpadding=2 cellspacing=2>

	            <tr>

	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
				<td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Max Displays</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Displays</font></center></td>
                  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>

	            </tr>

	          <?

			  $query2 = "SELECT * FROM hotlinks where userid='".$_SESSION[uname]."'";

	          $result3 = mysql_query ("SELECT * FROM hotlinks where added !=0 and userid='".$_SESSION[uname]."'")

	             or die ("Query failed");

	          while ($line3 = mysql_fetch_array($result3)) {
			  
			  

	            $subject = $line3["subject"];

	            $adid = $line3["id"];

	            $approved = $line3["approved"];
				
				$views = $line3["views"];
				
				$max = $line3["max"];
				
				$clicks = $line3["clicks"];


	          ?>

	            <TR>

	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>

	                    <p><? echo $subject; ?></p></font>

	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>

	                    <p><? echo $max; ?></p></font>

	                </TD>

	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>

	                    <p><? echo $views; ?></p></font>

	                </TD>
					
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>

	                    <p><? echo $clicks; ?></p></font>

	                </TD>

	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>

	                    <? if ($approved == 1) {

	                          echo "Yes";

	                       }

	                       elseif ($approved == 0) {

	                          echo "Not yet";

	                       }

	                       elseif ($approved == 2) {

	                          echo "Denied *";

	                          $addnote = 1;

	                       }

	                    ?></font>

	                </TD>

	            </TR>



	          <?

	          } //end while

	          ?>

	            </TABLE>

				

				</div>

	            </CENTER>

<?
    	} //end ($statstoshow == 1)

      // ---------------------------------------------------------------
      // Grok: New area to display the Traffic Links details in a manner
      // Grok: VERY similar to the soloads above...
      // ---------------------------------------------------------------
	    $query3 = "SELECT * FROM tlinks where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3)
	            or die ("Query failed");
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any traffic link ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $tlinkadded = $line3["added"];
	        if ($tlinkadded == 0) {
	            $tlinkstoadd = 1;
	            $tlinkcount = $tlinkcount+1;
	        } //end if ($added == 0)
	        else {
	            $tlinkstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($tlinkstoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $tlinkcount; ?> Traffic Link ad(s) to add. <a href="addtlinks.php">Click here</a> to set these up now.</font></p></b>
	        <?
	    }
	    if ($tlinkstatstoshow == 1) {
	        ?>
	          <p><b>Your traffic link statistics</p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Paid For</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3)
	             or die ("Query failed");
	          while ($line4 = mysql_fetch_array($result4)) {
	            $subject = $line4["subject"];
	            $url = $line4["url"];
	            $paid = $line4["paid"];
	            $adid = $line4["id"];
	            $approved = $line4["approved"];
	            $counter = $line4["sent"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$url\" target=\"_blank\">ad page</a>"; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $paid; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $counter; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($paid <= $counter) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delt\" value=\"$adid\"><input type=\"submit\" value=\"Delete\"></form>"; 
						else echo "<form method=\"post\" action=\"addtlinks.php\"><input type=\"hidden\" name=\"id\" value=\"$adid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($statstoshow == 1)


   $query3 = "SELECT * FROM ptcads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3)
	            or die ("Query failed");
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any paid to click ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $ptclinkadded = $line3["added"];
	        if ($ptclinkadded == 0) {
	            $ptclinkstoadd = 1;
	            $ptclinkcount = $ptclinkcount+1;
	        } //end if ($added == 0)
	        else {
	            $ptclinkstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($ptclinkstoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $ptclinkcount; ?> Paid To Click ad(s) to add. <a href="addptclinks.php">Click here</a> to set these up now.</font></p></b>
	        <?
	    }
	    if ($ptclinkstatstoshow == 1) {
	        ?>
	          <p><b>Your paid to click link statistics</p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Destination</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Paid For</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3)
	             or die ("Query failed");
	          while ($line4 = mysql_fetch_array($result4)) {
	            $subject = $line4["subject"];
	            $url = $line4["url"];
	            $paid = $line4["paid"];
	            $adid = $line4["id"];
	            $approved = $line4["approved"];
	            $counter = $line4["sent"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$url\" target=\"_blank\">ad page</a>"; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $paid; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $counter; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($paid <= $counter) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"delptc\" value=\"$adid\"><input type=\"submit\" value=\"Delete\"></form>"; 
						else echo "<form method=\"post\" action=\"addptclinks.php\"><input type=\"hidden\" name=\"id\" value=\"$adid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($statstoshow == 1)

		
		
		    $query = "SELECT * FROM topnav where userid='".$_SESSION[uname]."'";
	    $result = mysql_query ($query)
	            or die ("Query failed");
	    $numrows = @ mysql_num_rows($result);
	    if ($numrows == 0) {
	        ?>
	          <p>You currently do not have any top navigation ads in our system.</p>
	        <?
	    }
	    while ($line = mysql_fetch_array($result)) {
	        $added = $line["added"];
	        if ($added == 0) {
	            $topnavtoadd = 1;
	            $topnavcount = $topnavcount+1;
	        } //end if ($added == 0)
	        else {
	            $topnavstatstoshow = 1;
	        } // end else
	    } //end while ($line = mysql_fetch_array($result))
	    if ($topnavtoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $topnavcount; ?> top navigation ads to add. <a href="addtopnav.php">Click here</a> to set these up now.</font></p></b>
	        <?
	    }
	    if ($topnavstatstoshow == 1) {
	        ?>
	          <p><b>Your top navigational ad statistics</b></p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
	                  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Total Displays</font></center></td>
	                     <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	                   <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	            </tr>
	          <?
	          $result1 = mysql_query ($query)
	             or die ("Query failed");
	          while ($line1 = mysql_fetch_array($result1)) {
	            $name = $line1["name"];
	            $id = $line1["id"];
	            $targeturl = $line1["targeturl"];
	            $shown = $line1["shown"];
	            $clicks = $line1["clicks"];
	            $max = $line1["max"];
	            $status = $line1["status"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $name; ?></p></font>
	                </TD>
	                       <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $shown; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $clicks; ?></p></font>
	                </TD>
	                	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($status == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($status == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($status == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>


 <?
	    } //end ($statstoshow == 1)



 

      $query = "SELECT * FROM botnav where userid='".$_SESSION[uname]."'";
	    $result = mysql_query ($query)
	            or die ("Query failed");
	    $numrows = @ mysql_num_rows($result);
	    if ($numrows == 0) {
	        ?>
	          <p>You currently do not have any bottom navigation ads in our system.</p>
	        <?
	    }
	    while ($line = mysql_fetch_array($result)) {
	        $added = $line["added"];
	        if ($added == 0) {
	            $botnavtoadd = 1;
	            $botnavcount = $botnavcount+1;
	        } //end if ($added == 0)
	        else {
	            $botnavstatstoshow = 1;
	        } // end else
	    } //end while ($line = mysql_fetch_array($result))
	    if ($botnavtoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $botnavcount; ?> bottom navigation ads to add. <a href="addbotnav.php">Click here</a> to set these up now.</font></p></b>
	        <?
	    }
	    if ($botnavstatstoshow == 1) {
	        ?>
	          <p><b>Your bottom navigational ad statistics</b></p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
	                  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Total Displays</font></center></td>
	                     <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	                   <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	            </tr>
	          <?
	          $result1 = mysql_query ($query)
	             or die ("Query failed");
	          while ($line1 = mysql_fetch_array($result1)) {
	            $name = $line1["name"];
	            $id = $line1["id"];
	            $targeturl = $line1["targeturl"];
	            $shown = $line1["shown"];
	            $clicks = $line1["clicks"];
	            $max = $line1["max"];
	            $status = $line1["status"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $name; ?></p></font>
	                </TD>
	                       <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $shown; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $clicks; ?></p></font>
	                </TD>
	                	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($status == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($status == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($status == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>


 <?
	    } //end ($statstoshow == 1)
	          

		
		
		
		$query3 = "SELECT * FROM loginads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3)
	            or die ("Query failed");
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any login ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $loginadded = $line3["added"];
	        if ($loginadded == 0) {
	            $loginstoadd = 1;
	            $logincount = $logincount+1;
	        } //end if ($added == 0)
	        else {
	            $loginstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($loginstoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $logincount; ?> login ad(s) to add. <a href="addlogin.php">Click here</a> to set these up now.</font></b></p>
	        <?
	    }
	    if ($loginstatstoshow == 1) {
	        ?>
	          <p><b>Your Login Ads Statistics</p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Paid For</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Views</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3)
	             or die ("Query failed");
	          while ($line4 = mysql_fetch_array($result4)) {
	            $subject = $line4["subject"];
	            $paid = $line4["max"];
	            $adid = $line4["id"];
	            $approved = $line4["approved"];
	            $counter = $line4["hits"];
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                  <p><? echo $paid; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $counter; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($paid <= $counter) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"dell\" value=\"$adid\"><input type=\"submit\" value=\"Delete\"></form>"; 
						else echo "<form method=\"post\" action=\"addlogin.php\"><input type=\"hidden\" name=\"id\" value=\"$adid\"><input type=\"submit\" value=\"Edit\"></form>";	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($statstoshow == 1)

$query3 = "SELECT * FROM footerads where userid='".$_SESSION[uname]."'";
	    $result3 = mysql_query ($query3)
	            or die ("Query 4 failed");
	    $numrows3 = @ mysql_num_rows($result3);
	    if ($numrows3 == 0) {
	        ?>
	          <p>You currently do not have any footer ads in our system.</p>
	        <?
	    }
	    while ($line3 = mysql_fetch_array($result3)) {
	        $footeradadded = $line3["added"];
	        if ($footeradadded == 0) {
	            $footeradstoadd = 1;
	            $footeradcount = $footeradcount+1;
	        } //end if ($added == 0)
	        else {
	            $footeradstatstoshow = 1;
	        } // end else
	    } //end while ($line3 = mysql_fetch_array($result3))
	    if ($footeradstoadd == 1) {
	        ?><br>
	          <p><b><font color="red">You have <? echo $footeradcount; ?> Solo Footer Ads to add. <a href="addfooterads.php">Click here</a> to set these up now.</font></p></b>
	        <?
	    }
	    if ($footeradstatstoshow == 1) {
	        ?>
	          <p><b>Your Solo Footer Ad Statistics</p>
	          <CENTER>
	            <table width=70% border=0 cellpadding=2 cellspacing=2>
	            <tr>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Subject</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Destination</font></center></td>
    <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Clicks</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Approved</font></center></td>
	              <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Delete</font></center></td>
	            </tr>
	          <?
	          $result4 = mysql_query ($query3)
	             or die ("Query failed");
	            while ($line4 = mysql_fetch_array($result4)) {
	            $subject = $line4["subject"];
	            $url = $line4["url"];
	            $paid = $line4["paid"];
	            $adid = $line4["id"];
	            $approved = $line4["approved"];
                            $clicks = $line4["clicks"];
	           
	          ?>
	            <TR>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $subject; ?></p></font>
	                </TD>
	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo "<a href=\"$url\" target=\"_blank\">ad page</a>"; ?></p></font>
	                </TD>
 <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <p><? echo $clicks; ?></p></font>
	                </TD>

	                <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? if ($approved == 1) {
	                          echo "Yes";
	                       }
	                       elseif ($approved == 0) {
	                          echo "Not yet";
	                       }
	                       elseif ($approved == 2) {
	                          echo "Denied *";
	                          $addnote = 1;
	                       }
	                    ?></font>
	                </TD>
					<td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center>
	                    <? 
						if($paid <= $clicks) echo "campaign completed<form method=\"post\"><input type=\"hidden\" name=\"dela\" value=\"$adid\"><input type=\"submit\" value=\"Delete\"></form>"; 	
						?>
						</font>
	                </TD>
	            </TR>
	          <?
	          } //end while
	          ?>
	            </TABLE>
	            </CENTER>
	          <?
    	} //end ($statstoshow == 1)	

echo "<br><br></font></td></tr></table>";
    }
else
  { ?>
  <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>
  <? }
include "../footer.php";
mysql_close($dblink);
?>