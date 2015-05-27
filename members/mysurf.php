<?php

session_start();

include "../config.php";
if (isset($_POST['action'])) {
	$action = $_POST['action'];
}
if($action == "Delete") {
	mysql_query("DELETE FROM surfurls WHERE id='".$_POST['id']."' AND userid = '".$userid."' LIMIT 1");
	if(mysql_affected_rows()> 0){
		$surfcredits = $surfcredits + intval($_POST['currentpoints']);
		mysql_query("UPDATE members SET surfcredits=$surfcredits WHERE userid = '".$userid."'");
		$action = 'DeleteSuccess';
	}
}elseif(isset($_POST['addcredit'])){
	$surfpointp = (!is_numeric($_POST['surfpointp'])) ? 0 : $_POST['surfpointp'];
	if($surfcredits >= $surfpointp){
		$addcredit = true;
		if($surfpointp <0){
			$cuc = mysql_query("SELECT * FROM surfurls WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			$currentcredit = mysql_result($cuc,0,'surfpoint');
			if($currentcredit + $surfpointp < 0) $addcredit = false;
		}
		if($addcredit){
			$surfcredits = $surfcredits-$surfpointp;
			mysql_query("UPDATE members SET surfcredits=$surfcredits WHERE userid = '".$userid."'");
			mysql_query("UPDATE surfurls SET surfpoint=surfpoint+$surfpointp WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			if(mysql_affected_rows()>0){
				$action = 'addcreditsuccess';
			}
		}
	}
}
include "../header.php";
include "../style.php";

if( ($userid<>"")&&($password<>"") )
{  // members only stuff!

	include("navigation.php");
	include("../banners2.php");


	//first double check the user exists - security.
	$query = "SELECT * FROM members where userid='$userid' and pword='$password' and status=1";
	$result = mysql_query ($query);

	$num_rows = mysql_num_rows($result);

	if($num_rows==0)
	{
		echo "<center>Error. Invalid login.<br><br></center>";
		exit;
	}

	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

	if($vacation_date > time()-24*60*60 ) {
		?>

		<br><br>
		Your account is now active again and you will begin to receive emails again. However, to prevent cheating of the system, you will not be able to advertise on the site for 24 hours.  Please come back after 24 hours to advertise
		</center>

		</p></td></tr></table>
		<?
		include("../footer.php");
		exit;
	}

	echo "<p><font size=6>Post Your Surf Pages</font><br>";


	//first check whether a post is due, and whether user has at least 1 point.
	$today = strtotime("12:00 am");


	if ($memtype=="PRO") {
		$numsurfurl = $prosurfurls;
		$mysuftcreditamount = $prosurfcreditspersite;
		$surfratio = $prosurfratio;
		$dailysurfsitestopostads = $prodailysurfsitestopostads;
	}elseif ($memtype=="JV Member"){
		$numsurfurl = $jvsurfurls;
		$mysuftcreditamount = $jvsurfcreditspersite;
		$surfratio = $jvsurfratio;
	    $dailysurfsitestopostads = $jvdailysurfsitestopostads;
	}elseif ($memtype=="SUPER JV"){
		$numsurfurl = $superjvsurfurls;
		$mysuftcreditamount = $superjvsurfcreditspersite;
		$surfratio = $superjvsurfratio;
		$dailysurfsitestopostads = $superjvdailysurfsitestopostads;
	}

	if($action == "DeleteSuccess") {
		echo "<center><p><b>The surf page has been deleted successfully.</b></p></center>";
	}
	elseif($action == "Doedit") {
		if($surfnamep == "") $error[] = "ERROR. Surf Name can not be empty.";
		if($surfurlp == "") $error[] = "ERROR. Surf URL can not be empty.";
		elseif (substr($surfurlp, 0,7)!= 'http://') $error[] = "ERROR. You must put a valid url.";
		if(count($error) ==0){
if ($autoapproveenablesurf == "yes")
{
$udextra = ($surfurloldp != $surfurlp) ? " ,surfurl='$surfurlp', surfview='0', surfclicks='0', approved='1' " : '';
}
if ($autoapproveenablesurf != "yes")
{
$udextra = ($surfurloldp != $surfurlp) ? " ,surfurl='$surfurlp', surfview='0', surfclicks='0', approved='0' " : '';
}
			mysql_query("UPDATE surfurls SET surfname='$surfnamep' $udextra WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			$surfnamep="";
			$surfurlp="";
			$surfurloldp="";
			echo "<center><p><b>The surf url has been edited.</b></p></center>";
		}else{
			echo "<center><p><b><font color=red>".join('<br>',$error)."</font></b></p></center>";
			$error = array();
		}
	}elseif($action == "Reset") {
		mysql_query("UPDATE surfurls SET surfview=0 WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
		echo "<center><p><b>The surf url has been reset.</b></p></center>";
	}elseif($action == 'addcreditsuccess'){
		echo "<center><p><b>Credit added to the surf page.</b></p></center>";
	}

	$sql = mysql_query("SELECT * FROM surfurls WHERE userid = '$userid' ORDER BY surfname");
	$mysurfurlcount = @mysql_num_rows($sql);
	if($mysurfurlcount >0) {
		echo "<font size=5><b>Your Surf URLs</b></font>		                  
							<br><br><font size=3 face=Tahoma color=#000080>Here you can assign and transfer credits to your surf urls for our Traffic Exchange.<br><br><font color=green><b>As a $memtype Member, you will earn $mysuftcreditamount credits per every $surfratio sites you view, for a 1:$surfratio ratio.</b></font></font><br><br>




<br><br>You can add up to $numsurfurl surf urls.";

		echo "<table border=1 cellpadding=5><tr align=\"center\"><td><b>Name</b></td><td><b>URL</b></td><td><b>Views</b><td><b>Surf Credits</b></td><td><b>Approved</b></td><td><b>Action</b></td></tr>";
		$approvearray = array('No','Yes');
		$addcreditselect = '';

		while($each = mysql_fetch_array($sql)) {
			$addcreditselect .= '<option value="'.$each['id'].'">'.$each['surfname'].'</option>';
			echo "<tr><td>".$each['surfname']."</td><td>".$each['surfurl']."</td><td align=\"center\">".$each['surfview']."</td><td align=\"center\">".$each['surfpoint']."</td><td align=\"center\">".$approvearray[$each['approved']]."</td><td>";

			?>
						  <? if($each['surfview']) { ?>
				          <form method="POST">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Reset">
	                      <input type="submit" value="Reset"></p>
	                      </form>
						  <? } ?>				          
						  <form method="POST">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Edit">
	                      <input type="submit" value="Edit Surf"></p>
	                      </form>
	                      <form method="POST">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
						  <input type="hidden" name="currentpoints" value="<? echo $each['surfpoint']; ?>">
	                      <input type="submit" name="action" value="Delete">
	                      </form>
	
				<?
				echo "</td></tr>";
		}

		echo "</table><br><br>";

		echo "<p><b>You currently have ".$surfcredits." surf credits.</b></p>";
		echo "<form method=\"POST\"><table border=1 cellpadding=5><tr align=\"center\"><td><b>Add Credit</b></td><td><select name='id' style='width:150px;'>$addcreditselect</select></td><td align='left'><input type='text' name='surfpointp' size='10' maxlength='15' value='$surfcredits'>surf credits</td><td><input type='submit' name='addcredit' value='Add Credit'></td></tr></table></form><br><br>";

	}

	if($action=="Edit") {


		$sql = mysql_query("SELECT * FROM surfurls WHERE id='".$_POST['id']."'");
		if(@mysql_num_rows($sql)) {
			$info = mysql_fetch_array($sql);

			?>
			

			  <center>
			  <h3>Edit Surf Page</h3>
			  <form method="POST">
			  <br>
<P align="center"><br>
	      <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool Below! <br>(Opens in New Window)</font></h3></center><center><FORM NAME='urtotest' target="_blank" ACTION='sitecheck.php' METHOD='GET' ><input type='text' value="http://" size="50" name='url' /><input type='submit' value='Check URL' /><br></FORM></center>			  
<p>URL:<br><input name="surfurlp" size="65" maxlength="255" value="<? echo $info['surfurl']; ?>"></p>
<p>Name:<br><input name="surfnamep" size="65" maxlength="15" value="<? echo $info['surfname']; ?>"></p>
			  <br>
			  <input type="hidden" name="surfurloldp" value="<? echo $info['surfurl']; ?>">
			  <input type="hidden" name="action" value="Doedit">
			  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
			  <input type="submit" value="Edit Surf Page"></p>
			  </form></center>
			
			
			
			<?
		} else echo "<p><font color=\"red\"><b>Invalid Surf Page.</b></font></p>";

	} else {


		#if ($surfcredits>0){
			if ($numsurfurl > $mysurfurlcount) {
				if ($action=="add") {
					if($surfnamep == "") $error[] = "ERROR. You forgot to fill surf name.";
					if($surfurlp == "") $error[] = "ERROR. You forgot to fill surf url.";
					elseif (substr($surfurlp, 0,7)!= 'http://') $error[] = "ERROR. You must put a valid url.";
					if ($surfpointp > $surfcredits) $error[] = "ERROR. You don't have enough surf credits.";
					if (!is_numeric($surfpointp)) $error[] = "ERROR. Invalid value for surf credits. Surf credits must be a number.";

					if (count($error) > 0) {
		                    ?><center>
		                      <p><font color="red"><b><?php echo join("<br>",$error);?></b></font></p>
		                      <form method="POST">
		                      <br>
							  <p>URL:<br><input name="surfurlp" size="65" maxlength="255" value="<? echo $surfurlp; ?>"></p>
							  <p>Name:<br><input name="surfnamep" size="65" maxlength="15" value="<? echo $surfnamep; ?>"></p>
							  <p>Credit:(You currently have <? echo $surfcredits; ?> surf credits)<br><input name="surfpointp" size="65" maxlength="15" value="<? echo $surfpointp; ?>"></p>
		                      <br>
		                      <input type="hidden" name="action" value="add">
		                      <input type="submit" value="Add Surf Page"></p>
		                      </form></center>
		                    <?
					} else {
						$surfpointp = (!is_numeric($surfpointp) || $surfpointp<0) ? 0 : $surfpointp;
if ($autoapproveenablesurf == "yes")
{
$qadd="insert into surfurls (userid,surfname,surfurl,surfpoint,approved) values('$userid','$surfnamep','$surfurlp','$surfpointp','1')";
$radd=mysql_query($qadd);
}
if ($autoapproveenablesurf != "yes")
{
$qadd="insert into surfurls (userid,surfname,surfurl,surfpoint) values('$userid','$surfnamep','$surfurlp','$surfpointp')";
$radd=mysql_query($qadd);
}
						mysql_query("UPDATE members SET surfcredits=$surfcredits-$surfpointp WHERE userid = '".$userid."'");
						echo "<center><p><b>Your surf url has been added successfully. You  have ".($numsurfurl - $mysurfurlcount - 1)." surf urls left. <br><br><a href='$domain/members/mysurf.php'>Click here</a> to return to the Surf Area.</b></p></center>";

					}
				}
				else {
		            ?>

		                  </center><p>
							<center><font size="5" face="Tahoma" color="#000000"><b>How It Works</b></font></center><br><font size=3>
<?php
if (($dailysurfsitestopostads > 0) and ($dailysurfsitestopostads != ""))
{
?>
To be able to post any kind of advertising to this website, you need to surf a minimum of <font color="#ff0000"><?php echo $dailysurfsitestopostads ?></font> pages per day.
<?php
}
?>
Surf credits are awarded to you as you surf based on the ratio for your membership level. You are a <font color="#ff0000"><?php echo $memtype ?></font> member with a surf ratio of <font color="#ff0000">1:<?php echo $surfratio ?></font>. This means that you must surf <?php echo $surfratio ?> pages in the exchange to gain one surf credit. When your own site is shown, one surf credit will be deducted from your url.</font></p><center>
<p align="center">
<font size="3" face="Tahoma" color="#000080">Your may add up to <? echo $numsurfurl; ?> Surf URLs.</font></p>
<P align="center"><br><center><h3><font color=#000080>Check Your URLS for Frame Breaking Before You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool Below! <br>(Opens in New Window)</font></h3></center><center><FORM NAME='urtotest' target="_blank" ACTION='sitecheck.php' METHOD='GET' ><input type='text' value="http://" size="50" name='url' /><input type='submit' value='Check URL' /><br></FORM></center>			  

<p>

		                  <form method="POST">
		                  <br>
						  
							  <p>URL:<br><input name="surfurlp" size="65" maxlength="255" value="<? echo $surfurlp; ?>"></p>
							  <p>Name:<br><input name="surfnamep" size="65" maxlength="15" value="<? echo $surfnamep; ?>"></p>
							  <p>Surf Credits:(You currently have <? echo $surfcredits; ?> surf credits)<br><input name="surfpointp" size="65" maxlength="15" value="<? echo $surfpointp; ?>"></p>
		                  <br>
					  
		                  <input type="hidden" name="action" value="add">
		                  <input type="submit" value="Add Surf Page"></p>
		                  </form></center>
		            <? }

			}else {
				echo "<center><p><b>You can add a maximum of $mysurfurlcount surf urls</b></p></center>";
			}
		#}
		#else {
		#	echo "<center><p><b>You have no surf credits.</p></b></center>";
		#}

	}
	echo "</font></td></tr></table>";
}
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

  include "../footer.php";
  mysql_close($dblink);
?>