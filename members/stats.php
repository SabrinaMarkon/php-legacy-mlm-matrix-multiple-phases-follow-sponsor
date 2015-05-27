<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners.php");

        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
        
		
		echo "<p><font size=6>Tools & Stats</font></p>";
		
        echo "<p><b>You currently have ".$points." points. If you wish to purchase extra points,<br>please click on 'Advertising' in the navigation menu.</p></b>";

        //current earnings.....
        if ($commission>0) {
        	echo "<p><b>You are owed $".round($commission,2).". Commissions are paid on the 15th of every month.  <br>Make sure you have your payment processor accounts filled out under Edit My Details.</p></b>";
        }

		echo "<p><b>Your referral url:</b><br><br>".$domain."/index.php?referid=".$_SESSION[uname]."<p></b>";
echo "<p><b>Splash Page:</b><br><br>".$domain."/splashpage.php?ref=".$_SESSION[uname]."<p></b>";

        $query = "SELECT * FROM advertise";
		$result = mysql_query ($query)
			or die ("Query failed");

        $num_rows = mysql_num_rows($result);

        if ($num_rows>0) {
        	//only if there were banners to show.
        	echo "<br><br><b>Promo Tools:</b><br><br><br> ";
        }

		while ($line = mysql_fetch_array($result)) {
			$bannerurl = $line["bannerurl"];
        	?>
            <img src="<? echo $bannerurl; ?>"><br><br>
            Banner Url: <br><? echo $bannerurl; ?><br><br>
			
		<textarea rows=4 cols=65 name="text"><a href="<? echo $domain."/index.php?referid=".$_SESSION[uname]; ?>" target=_blank"><img src="<? echo $bannerurl; ?>" border=0></a></textarea><br>
		<br>
			
			
			<br><br>
            <?
        }
		
	$query = "select * from email_promotion";
	$result = mysql_query ($query)
	     or die ("Select failed");
	
	if(@mysql_num_rows($result)) echo "Email copy for your own list, safelists or list building sites like List Bandit
(for use on advertising websites or your own double opt-in subscribers only - do not send to purchased bulk email lists including \"blasters\")<br><br>";
	
    while ($line = mysql_fetch_array($result)) {

    	?>
		Subject 1: <input type="text" value="<? echo $line['subject1']; ?>"><br>
		Subject 2: <input type="text" value="<? echo $line['subject2']; ?>"><br>
		<textarea rows=10 cols=50 name="text"><? echo str_replace("%reflink%", $domain."/index.php?referid=".$_SESSION[uname], $line["text"]); ?></textarea><br>
		<br>
    	<?
    	}

        $query = "SELECT * FROM members where referid='".$_SESSION[uname]."' and verified=1 ORDER BY joindate ASC";
		$result = mysql_query ($query);

		echo "<p><br>Members signed up from your referral url:<br></p>";
        ?><b> Please Note:&nbsp; PRO (Points) Upgrades Will reflect under your 
Referrals as PRO (Points),
        <br>but there will be NO Cash Commissions Paid for PRO (Points) Upgrades.</b></p><br>
        <table width=85% border=0 cellpadding=2 cellspacing=2>


  		<tr><td bgcolor="<? echo $contrastcolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"></font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Userid</font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Membership Type</font></center></td>
		  <td bgcolor="<? echo $contrastcolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Came From</font></center></td>
</tr>
<?
$count = 0;
while ($line = mysql_fetch_array($result)) {
$count++;
$name = $line["name"];
$userid = $line["userid"];
$memtype = $line["memtype"];

$referrer = $line["referrer"];

if(strlen($referrer) > 65) $referrer = substr($referrer,0,63)."..";
        	?>
  				<tr>
				<td bgcolor="<? echo $basecolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $count; ?></font></center></td>
          		<td bgcolor="<? echo $basecolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $name; ?></font></center></td>
          		<td bgcolor="<? echo $basecolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $userid; ?></font></center></td>
          		<td bgcolor="<? echo $basecolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $memtype; ?><? if($line['upgrade_points']==1) echo " (Points)"; ?></font></center></td>
          		<td bgcolor="<? echo $basecolour; ?>"><center><font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $referrer; ?></font></center></td>
                <TR>
            <?
        }
  		?>
        	</table>
			

       		</center>
        <?
    echo "</font></td></tr></table></font>";
 	}

else
  { ?>

  </p>

  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

  <? }

include "../footer.php";
mysql_close($dblink);
?>