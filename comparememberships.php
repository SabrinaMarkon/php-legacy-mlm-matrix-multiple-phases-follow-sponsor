<?php
include "config.php";
include "header.php";
include "style.php";
if ($referid=="")
{
$referid="fcbteam";
}
if(!$jvsignup) 
{
?>
<br><br>
<table border="6" cellpadding="20" cellspacing="0" bordercolor="#000000" align="center" width="75%">
<tr><td bgcolor="#ffffff">
<br>
<h3 align="center"><font size="4"><?php echo $toplevel ?> Membership</font></h3>
<br><br>
<?php
if ($superjvpoints<>0)
{
echo "<p>".$superjvpoints." points on joining</p>";
}
if ($superjvreadearn<>0)
{
 echo "<p>".$superjvreadearn." points for every text ad read</p>";
}
if ($superjvhtmlearn<>0)
{
echo "<p>".$superjvhtmlearn." points for every html ad read</p>";
}
if ($superjvbannerclick<>0)
{
echo "<p>".$superjvbannerclick." points for every banner clicked</p>";
}
if ($superjvbuttonclickearn<>0)
{
echo "<p>".$superjvbuttonclickearn." points for every button banner clicked</p>";
}
if ($superjvhotlinkearn<>0)
{
echo "<p>".$superjvhotlinkearn." points for every hotlink ad clicked</p>";
}
if ($superjvptcearn<>0)
{
echo "<p>".$superjvptcearn." commissions for every paid to click ad read</p>";
}
if ($superjvtrafficearn<>0)
{
echo "<p>".$superjvtrafficearn." points for every traffic link clicked</p>";
}
if ($superjvtopnavearn<>0)
{
echo "<p>".$superjvtopnavearn." points for every top navigation link clicked</p>";
}
if ($superjvbotnavearn<>0)
{
echo "<p>".$superjvbotnavearn." points for every bottom navigation link clicked</p>";
}
if ($superjvclickearn<>0)
{
echo "<p>".$superjvclickearn." points for every solo ad click</p>";
}
if ($adminsuperjvclickearn<>0)
{
echo "<p>".$adminsuperjvclickearn." points for every admin ad clicked</p>";
}
if ($superjvpost<>0)
{
echo "<p>Post ".$superjvpost." text ads per day</p>";
}
if ($superjvposthtml<>0)
{
echo "<p>Post ".$superjvposthtml." html ads per day</p>";
}
if ($superjvsave<>0)
{
echo "<p>Save ".$superjvsave." text ads</p>";
}
if ($superjvsavehtml<>0)
{
echo "<p>Save ".$superjvsavehtml." html ads</p>";
}
if ($superjvsavesolos<>0)
{
echo "<p>Save ".$superjvsavesolos." solo ads</p>";
}
if ($superjvurls<>0)
{
echo "<p>Have ".$superjvurls." links in the Viral Link Cloaker</p>";
}
if ($superjvrefpoints<>0)
{
echo "<p>".$superjvrefpoints." points for every referral</p>";
}
if ($superjvreflogin<>0)
{
echo "<p>".$superjvreflogin." points when a referral logs in</p>";
}
if ($superjvpercent<>0)
{
echo "<p>When a referral earns points you earn ".$superjvpercent." percent in points</p>";
}
if ($superjvbuycom<>0)
{
echo "<p>When a referral purchases advertising you earn ".$superjvbuycom." percent in commissions</p>";
}
if ($superjvcommission<>0)
{
echo "<p>$".$superjvcommission." for every ".$lowerlevel." member referred</p>";
}
if ($superjvjvcom<>0)
{
echo "<p>$".$superjvjvcom." for every ".$middlelevel." Member referred</p>";
}
if ($superjv2supercom<>0)
{
echo "<p>$".$superjv2supercom." for every ".$toplevel." Member referred</p>";
}
?>
<p>Price: <b>$<? echo $superjvprice; ?> <? echo $superjvinterval; ?></b>
<center><br><br><b>Sign Up Free, Then Upgrade Inside!</b></center></p>
<br>
</td></tr>
</table>

<br><br>
<table border="6" cellpadding="20" cellspacing="0" bordercolor="#000000" align="center" width="75%">
<tr><td bgcolor="#ffffff">
<br>
<h3 align="center"><font size="4"><?php echo $middlelevel ?> Membership</font></h3>
<br><br>
<?php
if ($jvpoints<>0)
{
echo "<p>".$jvpoints." points on joining</p>";
}
if ($jvreadearn<>0)
{
echo "<p>".$jvreadearn." points for every text ad read</p>";
}
if ($jvhtmlearn<>0)
{
echo "<p>".$jvhtmlearn." points for every html ad read</p>";
}
if ($jvbannerearn<>0)
{
echo "<p>".$jvbannerearn." points for every banner clicked</p>";
}
if ($jvbuttonclickearn<>0)
{
echo "<p>".$jvbuttonclickearn." points for every button banner clicked</p>";
}
if ($jvhotlinkearn<>0)
{
echo "<p>".$jvhotlinkearn." points for every hotlink ad clicked</p>";
}
if ($jvptcearn<>0)
{
echo "<p>".$jvptcearn." commissions for every paid to click ad read</p>";
}
if ($jvtrafficearn<>0)
{
echo "<p>".$jvtrafficearn." points for every traffic link clicked</p>";
}
if ($jvtopnavearn<>0)
{
echo "<p>".$jvtopnavearn." points for every top navigation link clicked</p>";
}
if ($jvbotnavearn<>0)
{
echo "<p>".$jvbotnavearn." points for every bottom navigation link clicked</p>";
}
if ($jvclickearn<>0)
{
echo "<p>".$jvclickearn." points for every solo ad click</p>";
}
if ($adminjvclickearn<>0)
{
echo "<p>".$adminjvclickearn." points for every admin ad clicked</p>";
}
if ($jvpost<>0)
{
echo "<p>Post ".$jvpost." text ads per day</p>";
}
if ($jvposthtml<>0)
{
echo "<p>Post ".$jvposthtml." html ads per day</p>";
}
if ($jvsave<>0)
{
echo "<p>Save ".$jvsave." text ads</p>";
}
if ($jvsavehtml<>0)
{
echo "<p>Save ".$jvsavehtml." html ads</p>";
}
if ($jvsavesolos<>0)
{
echo "<p>Save ".$jvsavesolos." solo ads</p>";
}
if ($jvurls<>0)
{
echo "<p>Have ".$jvurls." links in the Viral Link Cloaker</p>";
}
if ($jvrefpoints<>0)
{
echo "<p>".$jvrefpoints." points for every referral</p>";
}
if ($jvreflogin<>0)
{
echo "<p>".$jvreflogin." points when a referral logs in</p>";
}
if ($jvpercent<>0)
{
echo "<p>When a referral earns points you earn ".$jvpercent." percent in points</p>";
}
if ($jvbuycom<>0)
{
echo "<p>When a referral purchases advertising you earn ".$jvbuycom." percent in commissions</p>";
}
if ($jvcommission<>0)
{
echo "<p>$".$jvcommission." for every ".$lowerlevel." member referred</p>";
}
if ($jvjvcom<>0)
{
echo "<p>$".$jvjvcom." for every ".$middlelevel." Member referred</p>";
}
if ($jvsupercom<>0)
{
echo "<p>$".$jvsupercom." for every ".$toplevel." Member referred</p>";
}
?>
<p>Price: <b>$<? echo $jvprice; ?> <? echo $jvinterval; ?></b>
<center><br><br><b>Sign Up Free, Then Upgrade Inside!</b></center></p>
<br>
</td></tr>
</table>

<br><br>
<table border="6" cellpadding="20" cellspacing="0" bordercolor="#000000" align="center" width="75%">
<tr><td bgcolor="#ffffff">
<br>
<h3 align="center"><font size="4"><?php echo $lowerlevel ?> Membership</font></h3>
<br><br>
<?
if ($propoints<>0)
{
echo "<p>".$propoints." points on joining</p>";
}
if ($proreadearn<>0)
{
echo "<p>".$proreadearn." points for every text ad read</p>";
}
if ($prohtmlearn<>0)
{
echo "<p>".$prohtmlearn." points for every html ad read</p>";
}
if ($probannerearn<>0)
{
echo "<p>".$probannerearn." points for every banner clicked</p>";
}
if ($probuttonclickearn<>0)
{
echo "<p>".$probuttonclickearn." points for every button banner clicked</p>";
}
if ($prohotlinkearn<>0)
{
echo "<p>".$prohotlinkearn." points for every hotlink ad clicked</p>";
}
if ($proptcearn<>0)
{
echo "<p>".$proptcearn." commissions for every paid to click ad read</p>";
}
if ($protrafficearn<>0)
{
echo "<p>".$protrafficearn." points for every traffic link clicked</p>";
}
if ($protopnavearn<>0)
{
echo "<p>".$protopnavearn." points for every top navigation link clicked</p>";
}
if ($probotnavearn<>0)
{
echo "<p>".$probotnavearn." points for every bottom navigation link clicked</p>";
}
if ($proclickearn<>0)
{
echo "<p>".$proclickearn." points for every solo ad click</p>";
}
if ($adminproclickearn<>0)
{
echo "<p>".$adminproclickearn." points for every admin ad clicked</p>";
}
if ($propost<>0)
{
echo "<p>Post ".$propost." text ads per day</p>";
}
if ($proposthtml<>0)
{
echo "<p>Post ".$proposthtml." html ads per day</p>";
}
if ($prosave<>0)
{
echo "<p>Save ".$prosave." text ads</p>";
}
if ($prosavehtml<>0)
{
echo "<p>Save ".$prosavehtml." html ads</p>";
}
if ($prosavesolos<>0)
{
echo "<p>Save ".$prosavesolos." solo ads</p>";
}
if ($prourls<>0)
{
echo "<p>Have ".$prourls." links in the Viral Link Cloaker</p>";
}
if ($prorefpoints<>0)
{
echo "<p>".$prorefpoints." points for every referral</p>";
}
if ($proreflogin<>0)
{
echo "<p>".$proreflogin." points when a referral logs in</p>";
}
if ($propercent<>0)
{
echo "<p>When a referral earns points you earn ".$propercent." percent in points</p>";
}
if ($probuycom<>0)
{
echo "<p>When a referral purchases advertising you earn ".$probuycom." percent in commissions</p>";
}
if ($procommission<>0)
{
echo "<p>$".$procommission." for every ".$lowerlevel." member referred</p>";
}
if ($projvcom<>0)
{
echo "<p>$".$projvcom." for every ".$middlelevel." Member referred</p>";
}
if ($prosupercom<>0)
{
echo "<p>$".$prosupercom." for every ".$toplevel." Member referred</p>";
}
?>        
<p>Price: <b>FREE</b></p>

<p align="center"><br><br><b><?php echo $lowerlevel ?> Members Signup</b>
<center><form method="POST" action="join.php">
<input type="hidden" name="referrer" value="<? echo $_SERVER['HTTP_REFERER']; ?>">
<br>For security reasons, your password will be randomly generated<br>
<br>Username (no spaces):<br>
<input type="text" size="25" value name="new_password">
<br>First Name:(required)<br>
<input type="text" size="25" name="new_fullname">
<br>Last Name:(required)<br>
<input type="text" size="25" name="new_lastname">
<br>Email:<br>
<input type="text" size="25" name="new_contact">
<br><br>
Member Type:&nbsp;<b><?php echo $lowerlevel ?> Membership</b>
<br><br><br>
<input type="checkbox" name="terms" value=1> By joining you agree to receive emails from <? echo $sitename; ?>.  You are also agreeing to the rest of our <a href="<? echo $domain; ?>/terms.php" target=_blank"><font color="#000000"><u>Terms and Conditions</u></font></a>. You can view the list of banned emails <a href="<? echo $domain; ?>/bannedlist.php" target=_blank"><font color="#000000"><u>here</u></font></a>.
<br><br><br>
<input type="hidden" size="25" name="referid" value="<? echo $referid; ?>">
<input type="hidden" name="mtY" value="PRO">
<input type="submit" value="Create Account">
</form></center>
</p>
<br>
</td></tr>
</table>
<br><br>
<?php
} # if(!$jvsignup)
###################################
else
{
?>
<br><br>
<table border="6" cellpadding="20" cellspacing="0" bordercolor="#000000" align="center" width="75%">
<tr><td bgcolor="#ffffff">
<br>
<h3 align="center"><font size="4"><?php echo $toplevel ?> Membership</font></h3>
<br><br>
<?php
if ($superjvpoints<>0)
{
echo "<p>".$superjvpoints." points on joining</p>";
}
if ($superjvreadearn<>0)
{
 echo "<p>".$superjvreadearn." points for every text ad read</p>";
}
if ($superjvhtmlearn<>0)
{
echo "<p>".$superjvhtmlearn." points for every html ad read</p>";
}
if ($superjvbannerclick<>0)
{
echo "<p>".$superjvbannerclick." points for every banner clicked</p>";
}
if ($superjvbuttonclickearn<>0)
{
echo "<p>".$superjvbuttonclickearn." points for every button banner clicked</p>";
}
if ($superjvhotlinkearn<>0)
{
echo "<p>".$superjvhotlinkearn." points for every hotlink ad clicked</p>";
}
if ($superjvptcearn<>0)
{
echo "<p>".$superjvptcearn." commissions for every paid to click ad read</p>";
}
if ($superjvtrafficearn<>0)
{
echo "<p>".$superjvtrafficearn." points for every traffic link clicked</p>";
}
if ($superjvtopnavearn<>0)
{
echo "<p>".$superjvtopnavearn." points for every top navigation link clicked</p>";
}
if ($superjvbotnavearn<>0)
{
echo "<p>".$superjvbotnavearn." points for every bottom navigation link clicked</p>";
}
if ($superjvclickearn<>0)
{
echo "<p>".$superjvclickearn." points for every solo ad click</p>";
}
if ($adminsuperjvclickearn<>0)
{
echo "<p>".$adminsuperjvclickearn." points for every admin ad clicked</p>";
}
if ($superjvpost<>0)
{
echo "<p>Post ".$superjvpost." text ads per day</p>";
}
if ($superjvposthtml<>0)
{
echo "<p>Post ".$superjvposthtml." html ads per day</p>";
}
if ($superjvsave<>0)
{
echo "<p>Save ".$superjvsave." text ads</p>";
}
if ($superjvsavehtml<>0)
{
echo "<p>Save ".$superjvsavehtml." html ads</p>";
}
if ($superjvsavesolos<>0)
{
echo "<p>Save ".$superjvsavesolos." solo ads</p>";
}
if ($superjvurls<>0)
{
echo "<p>Have ".$superjvurls." links in the Viral Link Cloaker</p>";
}
if ($superjvrefpoints<>0)
{
echo "<p>".$superjvrefpoints." points for every referral</p>";
}
if ($superjvreflogin<>0)
{
echo "<p>".$superjvreflogin." points when a referral logs in</p>";
}
if ($superjvpercent<>0)
{
echo "<p>When a referral earns points you earn ".$superjvpercent." percent in points</p>";
}
if ($superjvbuycom<>0)
{
echo "<p>When a referral purchases advertising you earn ".$superjvbuycom." percent in commissions</p>";
}
if ($superjvcommission<>0)
{
echo "<p>$".$superjvcommission." for every ".$lowerlevel." member referred</p>";
}
if ($superjvjvcom<>0)
{
echo "<p>$".$superjvjvcom." for every ".$middlelevel." Member referred</p>";
}
if ($superjv2supercom<>0)
{
echo "<p>$".$superjv2supercom." for every ".$toplevel." Member referred</p>";
}
?>
<p>Price: <b>$<? echo $superjvprice; ?> <? echo $superjvinterval; ?></b>
<center><br><br><b>Sign Up Free, Then Upgrade Inside!</b></center></p>
<br>
</td></tr>
</table>

<br><br>
<table border="6" cellpadding="20" cellspacing="0" bordercolor="#000000" align="center" width="75%">
<tr><td bgcolor="#ffffff">
<br>
<h3 align="center"><font size="4"><?php echo $middlelevel ?> Membership</font></h3>
<br><br>
<?php
if ($jvpoints<>0)
{
echo "<p>".$jvpoints." points on joining</p>";
}
if ($jvreadearn<>0)
{
echo "<p>".$jvreadearn." points for every text ad read</p>";
}
if ($jvhtmlearn<>0)
{
echo "<p>".$jvhtmlearn." points for every html ad read</p>";
}
if ($jvbannerearn<>0)
{
echo "<p>".$jvbannerearn." points for every banner clicked</p>";
}
if ($jvbuttonclickearn<>0)
{
echo "<p>".$jvbuttonclickearn." points for every button banner clicked</p>";
}
if ($jvhotlinkearn<>0)
{
echo "<p>".$jvhotlinkearn." points for every hotlink ad clicked</p>";
}
if ($jvptcearn<>0)
{
echo "<p>".$jvptcearn." commissions for every paid to click ad read</p>";
}
if ($jvtrafficearn<>0)
{
echo "<p>".$jvtrafficearn." points for every traffic link clicked</p>";
}
if ($jvtopnavearn<>0)
{
echo "<p>".$jvtopnavearn." points for every top navigation link clicked</p>";
}
if ($jvbotnavearn<>0)
{
echo "<p>".$jvbotnavearn." points for every bottom navigation link clicked</p>";
}
if ($jvclickearn<>0)
{
echo "<p>".$jvclickearn." points for every solo ad click</p>";
}
if ($adminjvclickearn<>0)
{
echo "<p>".$adminjvclickearn." points for every admin ad clicked</p>";
}
if ($jvpost<>0)
{
echo "<p>Post ".$jvpost." text ads per day</p>";
}
if ($jvposthtml<>0)
{
echo "<p>Post ".$jvposthtml." html ads per day</p>";
}
if ($jvsave<>0)
{
echo "<p>Save ".$jvsave." text ads</p>";
}
if ($jvsavehtml<>0)
{
echo "<p>Save ".$jvsavehtml." html ads</p>";
}
if ($jvsavesolos<>0)
{
echo "<p>Save ".$jvsavesolos." solo ads</p>";
}
if ($jvurls<>0)
{
echo "<p>Have ".$jvurls." links in the Viral Link Cloaker</p>";
}
if ($jvrefpoints<>0)
{
echo "<p>".$jvrefpoints." points for every referral</p>";
}
if ($jvreflogin<>0)
{
echo "<p>".$jvreflogin." points when a referral logs in</p>";
}
if ($jvpercent<>0)
{
echo "<p>When a referral earns points you earn ".$jvpercent." percent in points</p>";
}
if ($jvbuycom<>0)
{
echo "<p>When a referral purchases advertising you earn ".$jvbuycom." percent in commissions</p>";
}
if ($jvcommission<>0)
{
echo "<p>$".$jvcommission." for every ".$lowerlevel." member referred</p>";
}
if ($jvjvcom<>0)
{
echo "<p>$".$jvjvcom." for every ".$middlelevel." Member referred</p>";
}
if ($jvsupercom<>0)
{
echo "<p>$".$jvsupercom." for every ".$toplevel." Member referred</p>";
}
?>
<p>Price: <b>FREE</b></p>

<p align="center"><br><br><b><?php echo $middlelevel ?> Members Signup</b>
<center><form method="POST" action="join.php">
<input type="hidden" name="referrer" value="<? echo $_SERVER['HTTP_REFERER']; ?>">
<br>For security reasons, your password will be randomly generated<br>
<br>Username (no spaces):<br>
<input type="text" size="25" value name="new_password">
<br>First Name:(required)<br>
<input type="text" size="25" name="new_fullname">
<br>Last Name:(required)<br>
<input type="text" size="25" name="new_lastname">
<br>Email:<br>
<input type="text" size="25" name="new_contact">
<br><br>
Member Type:&nbsp;<b><?php echo $middlelevel ?> Membership</b>
<br><br><br>
<input type="checkbox" name="terms" value=1> By joining you agree to receive emails from <? echo $sitename; ?>.  You are also agreeing to the rest of our <a href="<? echo $domain; ?>/terms.php" target=_blank"><font color="#000000"><u>Terms and Conditions</u></font></a>. You can view the list of banned emails <a href="<? echo $domain; ?>/bannedlist.php" target=_blank"><font color="#000000"><u>here</u></font></a>.
<br><br><br>
<input type="hidden" size="25" name="referid" value="<? echo $referid; ?>">
<input type="hidden" name="mtY" value="JV Member">
<input type="submit" value="Create Account">
</form></center>
</p>
<br>
</td></tr>
</table>
<br><br>
<?php
}
include "footer.php";
exit;
?>