<?php

session_start();

include "../header.php";
if ($userid<>"") {
	include "../configpost.php";
}
else {
    include "../config.php";
}
include "../style.php";

if (isset($_POST['url'])) {
   $url = $_POST['url'];
}
if (isset($_POST['message'])) {
   $message = $_POST['message'];
}
if (isset($_POST['action'])) {
   $action = $_POST['action'];
}

if( ($userid<>"")&&($password<>"") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");

?>

				<!-- tinyMCE -->
		<script language="javascript" type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
		<script language="javascript" type="text/javascript">
			tinyMCE.init({
				theme : "advanced",
				mode : "textareas",
				//save_callback : "customSave",
				content_css : "advanced.css",
				extended_valid_elements : "a[href|target|name],font[face|size|color|style],span[class|align|style]",
				theme_advanced_toolbar_location : "top",
				plugins : "table",
				theme_advanced_buttons3_add_before : "tablecontrols,separator",
				//invalid_elements : "a",
				theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1", // Theme specific setting CSS classes
				debug : false
			});


		</script>
		<!-- /tinyMCE --> 

<?
        //first double check the user exists - security.
        $query = "SELECT * FROM members where userid='$userid' and pword='$password'";
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
		your account is now active again and you will begin to receive emails again, however - to prevent cheating of the system, you will not be able to advertise on the site for 24 hours.  Please come back after 24 hours to advertise
		</center>

		</p></td></tr></table>
		<?
		include("../footer.php");
		exit;
		}
		
		echo "<p><font size=6>Post Your Html Ad</font><br>";


        //first check whether a post is due, and whether user has at least 1 point.
	    $today = strtotime("12:00 am");
		
		
		if ($memtype=="PRO") {
            $numpost = $proposthtml;
			$numsave = $prosavehtml;
        }
        elseif ($memtype=="JV Member"){
            $numpost = $jvposthtml;
			$numsave = $jvsavehtml;
        }
		elseif ($memtype=="SUPER JV"){
            $numpost = $superjvposthtml;
			$numsave = $superjvsavehtml;
        }					
		if($action == "Delete") {
			mysql_query("DELETE FROM saved_html WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			echo "<center><p><b>The html ad has been deleted successfully.</b></p></center>";
		}elseif($action == "Doedit") {
			mysql_query("UPDATE saved_html SET adbody='$message',url='$url' WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			$message="";
			$url="";
			echo "<center><p><b>The html ad has been edited.</b></p></center>";
		}elseif($action == "Reset") {
			mysql_query("UPDATE saved_html SET hits=0 WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			echo "<center><p><b>The html ad has been reset.</b></p></center>";
		}
		
	$query = mysql_query("SELECT COUNT(*) FROM post_html where userid='$userid' and posted > '$today'");
	$todaycount = mysql_result($query, 0);
	
	$sql = mysql_query("SELECT * FROM saved_html WHERE userid = '$userid'");
	$savedcount = @mysql_num_rows($sql);
	if($savedcount) {
		echo "<font size=3><b>Your saved html ads</b></font><br><br>You can save up to $numsave html ads.";
		
		echo "<table border=1 cellpadding=5><tr align=\"center\"><td><b>Ad</b></td><td><b>Hits</b><td><b>Action</b></td></tr>";
		
		while($each = mysql_fetch_array($sql)) {
			
			echo "<tr><td>".$each['adbody']." &nbsp;</td><td align=\"center\">".$each['hits']."</td><td>";
			
			if (($todaycount < $numpost OR $numpost == 0) AND $points>0) {
				?>
				          <form method="POST" action="post_html.php">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Edit">
	                      <input type="submit" value="Edit Ad"></p>
	                      </form>
						  
				          <form method="POST" action="post_html.php">
						  <input type="hidden" name="url" value="<? echo $each['url']; ?>">
	                      <input type="hidden" name="message" value="<? echo htmlspecialchars($each['adbody']); ?>">
						  <input type="hidden" name="saved_id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Post">
	                      <input type="submit" value="Post html Ad"></p>
	                      </form>
						  
						  <? if($each['hits']) { ?>
				          <form method="POST" action="post_html.php">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Reset">
	                      <input type="submit" value="Reset Hits"></p>
	                      </form>
						  <? } ?>
			
				<?
			}
			
			
			echo "<form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"submit\" name=\"action\" value=\"Delete\"></form></td></tr>";
		}
		
		echo "</table><br><br>";
	} 
	
	if($action=="Edit") {
	
	
		$sql = mysql_query("SELECT * FROM saved_html WHERE id='".$_POST['id']."'");
		if(@mysql_num_rows($sql)) {
			$info = mysql_fetch_array($sql);

			?>
			

			  <center>
			  <h3>Edit saved html ad</h3>
			  <form method="POST">
			  <br>
			  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $info['url']; ?>"></p>
			  <p>Ad Body:<br><textarea name="message" rows="10" cols="65"><? echo $info['adbody']; ?></textarea></p>
			  <br>
			  <input type="hidden" name="action" value="Doedit">
			  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
			  <input type="submit" value="Edit Html Ad"></p>
			  </form></center>
			
			
			
			<?
		} else echo "<p><font color=\"red\"><b>Invalid post.</b></font></p>";
	
	} else {
		
		
	        if ($points>0){
	            if ($todaycount < $numpost OR $numpost == 0) {
		            if ($action=="Post") {
		                if ($message=="") {
		                    ?><center>
		                      <p><font color="red"><b>ERROR. You forgot to fill in a message.</b></font></p>
		                      <form method="POST">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Ad Body:<br><textarea name="message" rows="14" cols="65"><? echo $message; ?></textarea></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Html Ad"></p>
		                      </form></center>
		                    <?
		                } elseif ($url=="") {
						?>
		                      <center>
		                      <p><font color="red"><b>ERROR. You forgot to fill in a url.</b></font></p>
		                      <form method="POST">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Ad Body:<br><textarea name="message" rows="14" cols="65"><? echo $message; ?></textarea></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Html Ad"></p>
		                      </form></center>
		                    <?
		                } elseif (substr($url, 0,7)!= 'http://') {
						?>
		                      <center>
		                      <p><font color="red"><b>ERROR. You must put a valid url.</b></font></p>
		                      <form method="POST">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Ad Body:<br><textarea name="message" rows="14" cols="65"><? echo $message; ?></textarea></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Html Ad"></p>
		                      </form></center>
		                    <?							
						} else {

			                //all clear - go ahead and post it....
			           ###     $qdelete="delete from post where userid='".$userid."'";
			          ###      $rdelete= mysql_query ($qdelete);

							//$url = strip_tags(mysql_real_escape_string($url));
							//$message = strip_tags(mysql_real_escape_string($message));
							
							$saved_id = 0;
							if($_POST['saved_id']) $saved_id = $_POST['saved_id'];
							
							
							if($save AND $savedcount < $numsave) {
								mysql_query("insert into saved_html (adbody,userid,url) values('$message','$userid','$url')");
								$saved_id = mysql_insert_id();
							}
							
			                $qpost="insert into post_html (adbody,userid,posted,url,saved_id) values('$message','$userid','".time()."','$url','$saved_id')";
							
							
		                    $rpost=mysql_query($qpost);
		                    echo "<center><p><b>Your message has been added successfully.";
							if($numpost) echo "You have ".($numpost - $todaycount - 1)." html ads left today.</b></p></center>";
							else  echo "You can post unlimited html ads.</b></p></center>";



				}
					}
		            else {
		            ?>

		                  <p align="center">
							<font size="2" face="Tahoma" color="#000080">Your ad remains active in our system for 24 hours. 1 point will be deducted for every time your website is viewed.</font></p>
		                  <p align="center">
							<font size="2" face="Tahoma" color="#000080">Your may post 
							<? if($numpost) echo $numpost." html ad(s) per day"; 
							else echo "unlimited html ads";
							?>
							.</font></p>
<P align="center"><br>
	      <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool
Below! <br>

(Opens in New Window)</font></h3></center>

<center>
<FORM target="_blank" ACTION='sitecheck.php'
METHOD='FWR' >

<input type='text' value="http://" size="50" name='url' />

<input type='submit' value='Check URL' />
<br>
</FORM>


<p>

		                  <form method="POST">
		                  <br>
						  
						  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                  <p>Ad Body:<br><textarea name="message" rows="14" cols="65"><? echo $message; ?></textarea></p>
		                  <br>
						  
						  <?
						  if($savedcount < $numsave) echo "<input type=\"checkbox\" name=\"save\" value=\"1\"> Save ad <br>";
						  ?>
						  
		                  <input type="hidden" name="action" value="Post">
		                  <input type="submit" value="Post Html Ad"></p>
		                  </form></center>

		            <? }

	          	}
	            else {
					if($numpost) {
						echo "<center><p><b>You posted $todaycount html ads today. $numpost html ads everyday day allowed.</b></p></center>";
		                echo "<center><p><b>Current server date/time: ".date('Y-m-d H:i:s')."</b></p></center>";
					} else echo "<center><p><b>You posted $todaycount html ads today. You may post as many html ads as you want.</b></p></center>";
	            }
	        }
	        else {
	            echo "<center><p><b>You have no points left.</p></b></center>";
	        }
		
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