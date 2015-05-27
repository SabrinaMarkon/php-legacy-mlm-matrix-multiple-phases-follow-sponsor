<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$id = mysql_real_escape_string( $_POST['id']);


if (isset($_POST['action'])) {
   $action = mysql_real_escape_string( $_POST['action']);
}

if (isset($_POST['save'])) {
   $save = 1;
} else $save = 0;

if ($memtype=="PRO") {
            $savesolos = $prosavesolos;
        }
        elseif ($memtype=="JV Member"){
           $savesolos = $jvsavesolos;
        }
		elseif ($memtype=="SUPER JV"){
            $savesolos = $superjvsavesolos;
        }

if( session_is_registered("ulogin") ) {

$lastsolopost = $userrecord["lastsolopost"];
$today = date('Y-m-d');

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";	
	$savedsql = mysql_query("SELECT * FROM saved_solos WHERE userid = '$userid'");
	$savedcount = @mysql_num_rows($savedsql);
	
?>
		<!-- tinyMCE -->
		<script language="javascript" type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
		<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "textareas",
			theme : "advanced",
			extended_valid_elements : "a[href|target|name],font[face|size|color|style],span[class|align|style]"
		});
		</script>
		<!-- /tinyMCE --> 
<?
    if ($action == "send") {
	
	
		$subject = mysql_real_escape_string( $_POST['subject']);
		$adbody = mysql_real_escape_string( $_POST['adbody']);
		$url = mysql_real_escape_string( $_POST['url']);
		
		if (empty($subject)){
       		?><p>No subject entered. Click <a href=addsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($adbody)){
       		?><p>No adbody entered. Click <a href=addsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($url)){
       		?><p>No url entered. Click <a href=addsolos.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		

		if ($autoapproveenable == "yes")
		{
    	$query = "update solos set subject='$subject', adbody='$adbody', added=1, approved=1, sent=0, url='$url',date='".time()."' where id=".$id;
    	$result = mysql_query ($query) or die(mysql_error());
		}
		if ($autoapproveenable != "yes")
		{
    	$query = "update solos set subject='$subject', adbody='$adbody', added=1, approved=0, sent=0, url='$url',date='".time()."' where id=".$id;
    	$result = mysql_query ($query) or die(mysql_error());
		}
		$lastadpostq = "update members set lastsolopost='".date('Y-m-d')."' where userid='$userid'";
		$lastadpostr = mysql_query($lastadpostq);
		
		if($save AND $savedcount < $savesolos) {
			mysql_query("insert into saved_solos (subject,adbody,userid,url) values('$subject','$adbody','$userid','$url')");
		}	
		
    	?>
      		<p><center>Your solo ad has been set up, and has been placed in the queue for sending. <a href="advertise.php">Click here</a> to go back.</center></p><BR><BR>
					
    	<?
		
		
		
		
    } else if($action == "Delete") {
			mysql_query("DELETE FROM saved_solos WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			echo "<center><p><b>The saved ad has been deleted successfully.</b></p></center><br><br>";
	} else {

if(($lastsolopost != $today) or ($memtype != "PRO"))
{	
	//Solo available
	$query = "SELECT * FROM solos where added=0 and userid='".$_SESSION[uname]."' limit 1";
	$result = mysql_query ($query)
		or die ("Query failed");
	while ($line = @mysql_fetch_array($result)) {
	
			
        $id = $line["id"];
		

		if($savedcount) {
			echo "<font size=3><b>Your saved ads</b></font><br><br>You can save up to $savesolos ads.";
			
			echo "<table border=1 cellpadding=5><tr align=\"center\"><td><b>Subject</b><td><b>Action</b></td></tr>";
			
			while($each = mysql_fetch_array($savedsql)) {
				
				echo "<tr><td>".$each['subject']."</td><td>";
				
					?>
						  <form method="POST" action="addsolos.php">
						  <input type="hidden" name="id" value="<? echo $id; ?>">
						  <input type="hidden" name="subject" value="<? echo htmlspecialchars($each['subject']); ?>">
						  <input type="hidden" name="adbody" value="<? echo htmlspecialchars($each['adbody']); ?>">
						  <input type="hidden" name="url" value="<? echo $each['url']; ?>">
						  <input type="hidden" name="action" value="send">
						  <input type="submit" value="Post Solo"></p>
						  </form>
				
					<?
				
				
				echo "<form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"submit\" name=\"action\" value=\"Delete\"></form></td></tr>";
			}
			
			echo "</table><br><br>";
		}
		
		

            $subject = $line["subject"];
            $adbody = $line["adbody"];
            ?>
              <center><H2>Submit Your Solo Ad</H2>
              <p><B>YOU ARE LIMITED TO 1 SOLO AD POSTING PER DAY.  </B><br>No adult, offensive or illegal ads (including pyramid schemes and chainletters).  <BR>
<table width="550"><tr><td>
<b><font size=3></font></p><p align="center"><font color="#000000" face="tahoma" size="2"><b>
<font size="2"><span style="background-color: #FFFF00">DO NOT INCLUDE 
URLS IN THE BODY OF YOUR SOLO AD - MANY WEBSITES BEING PROMOTED 
ARE &quot;BLACKLISTED&quot; AT THE TOP ISP'S AND IT CAUSES SOLO ADS TO BOUNCE - ONLY PLACE THE URL IN THE CREDIT LINK BOX AT THE BOTTOM</span></font></b></font></p>
<BR><BR>You may use the tags ~fname~ for the FIRST name and ~userid~ for the USERID in the body and/or the subject line.
</td></tr></table>
<br><br>
              <form method="POST" action="addsolos.php">
              Subject:<br>
              <input type="text" name="subject" maxsize="70"><br>
              Ad body:<br>
              <textarea  name="adbody" cols="65" rows="30">
DO NOT INCLUDE 
URLS IN THE BODY OF YOUR SOLO AD - MANY WEBSITES BEING PROMOTED 
ARE &quot;BLACKLISTED&quot; AT THE TOP ISP'S AND IT CAUSES SOLO ADS TO BOUNCE - ONLY PLACE THE URL IN THE CREDIT LINK BOX AT THE BOTTOM]

PLEASE DELETE THIS TEXT BEFORE POSTING YOUR SOLO AD</textarea>
              <br>


			  Ad URL:<br>
              <input type="text" name="url" maxsize="1250"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="action" value="send">
              <p>Enter the website address you want traffic to go to above, include 
				<span style="background-color: #FFFF00">http://</span> <br>  Double check your solo ad, as it cannot be edited once submitted.</p>
				<? if($savedcount < $savesolos) echo "<input type=\"checkbox\" name=\"save\" value=\"1\"> Save ad <br>"; ?>
              <input type="submit" value="Send">
              </form></center>
<br>
 <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool
Below! <br>

(Opens in New Window)</font></h3></center>

<center>
<FORM NAME='urtotest' target="_blank" ACTION='<? echo $domain; ?>/members/sitecheck.php'
METHOD='GET' >

<input type='text' value="http://" size="50" name='url' />

<input type='submit' value='Check URL' />
</FORM>

            <?
    	}
} # if(($lastsolopost != $today) or ($memtype != "PRO"))
else
{
echo "Pro members may post once per day, and you have already sent out a solo ad today.<br>Please return tomorrow or upgrade for unlimited daily solo sends!";
}
    }
    echo "</td></tr></table>";
  }
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>