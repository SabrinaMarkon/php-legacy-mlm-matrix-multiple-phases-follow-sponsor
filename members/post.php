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
		your account is now active again and you will begin to receive emails again, however - to prevent cheating of the system, you will not be able to advertise on the site for 24 hours.  Please come back after 24 hours to advertise
		</center>

		</p></td></tr></table>
		<?
		include("../footer.php");
		exit;
		}
		
		echo "<p><font size=6>Post Your Text Ad</font><br>";


        //first check whether a post is due, and whether user has at least 1 point.
	    $today = strtotime("12:00 am");
		
		
		if ($memtype=="PRO") {
            $numpost = $propost;
			$numsave = $prosave;
        }
        elseif ($memtype=="JV Member"){
            $numpost = $jvpost;
			$numsave = $jvsave;
        }
		elseif ($memtype=="SUPER JV"){
            $numpost = $superjvpost;
			$numsave = $superjvsave;
        }						
		if($action == "Delete") {
			mysql_query("DELETE FROM saved_post WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			echo "<center><p><b>The ad has been deleted successfully.</b></p></center>";
		}elseif($action == "Doedit") {
			mysql_query("UPDATE saved_post SET adbody='$message',url='$url' WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			$message="";
			$url="";
			echo "<center><p><b>The ad has been edited.</b></p></center>";
		}elseif($action == "Reset") {
			mysql_query("UPDATE saved_post SET hits=0 WHERE id='".$_POST['id']."' AND userid = '".$userid."'");
			echo "<center><p><b>The ad has been reset.</b></p></center>";
		}
		
	$query = mysql_query("SELECT COUNT(*) FROM post where userid='$userid' and posted > '$today'");
	$todaycount = mysql_result($query, 0);
	
	$sql = mysql_query("SELECT * FROM saved_post WHERE userid = '$userid'");
	$savedcount = @mysql_num_rows($sql);
	if($savedcount) {
		echo "<font size=3><b>Your saved posts</b></font><br><br>You can save up to $numsave posts.";
		
		echo "<table border=1 cellpadding=5><tr align=\"center\"><td><b>Ad</b></td><td><b>Hits</b><td><b>Action</b></td></tr>";
		
		while($each = mysql_fetch_array($sql)) {
			if(strlen($each['adbody']) > 25) $adbody = substr($each['adbody'],0,24)."..";
			else $adbody = $each['adbody'];
			
			echo "<tr><td>".$adbody."</td><td align=\"center\">".$each['hits']."</td><td>";
			
			if ($todaycount < $numpost AND $points>0) {
				?>
				          <form method="POST" action="post.php">
						  <input type="hidden" name="id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Edit">
	                      <input type="submit" value="Edit Ad"></p>
	                      </form>
						  
				          <form method="POST" action="post.php">
						  <input type="hidden" name="url" value="<? echo $each['url']; ?>">
	                      <input type="hidden" name="message" value="<? echo $each['adbody']; ?>">
						  <input type="hidden" name="saved_id" value="<? echo $each['id']; ?>">
	                      <input type="hidden" name="action" value="Post">
	                      <input type="submit" value="Post Ad"></p>
	                      </form>
						  
						  <? if($each['hits']) { ?>
				          <form method="POST" action="post.php">
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
	
	
		$sql = mysql_query("SELECT * FROM saved_post WHERE id='".$_POST['id']."'");
		if(@mysql_num_rows($sql)) {
			$info = mysql_fetch_array($sql);

			?>
			

			  <center>
			  <h3>Edit saved ad</h3>
			  <form method="POST" action="post.php">
			  <br>
			  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $info['url']; ?>"></p>
			  <p>Text Ad Up To 100 Characters Including Spaces:<br><input name="message" size="65" maxlength="100" value="<? echo $info['adbody']; ?>"></p>
			  <br>
			  <input type="hidden" name="action" value="Doedit">
			  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
			  <input type="submit" value="Edit Ad"></p>
			  </form></center>
			
			
			
			<?
		} else echo "<p><font color=\"red\"><b>Invalid post.</b></font></p>";
	
	} else {
		
		
	        if ($points>0){
	            if ($todaycount < $numpost) {
		            if ($action=="Post") {
		                if ($message=="") {
		                    ?><center>
		                      <p><font color="red"><b>ERROR. You forgot to fill in a message.</b></font></p>
		                      <form method="POST" action="post.php">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Text Ad Up To 100 Characters Including Spaces:<br><input name="message" size="65" maxlength="100" value="<? echo $message; ?>"></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Ad"></p>
		                      </form></center>
		                    <?
		                } elseif ($url=="") {
						?>
		                      <center>
		                      <p><font color="red"><b>ERROR. You forgot to fill in a url.</b></font></p>
		                      <form method="POST" action="post.php">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Text Ad Up To 100 Characters Including Spaces:<br><input name="message" size="65" maxlength="100" value="<? echo $message; ?>"></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Ad"></p>
		                      </form></center>
		                    <?							
		                } elseif (substr($url, 0,7)!= 'http://') {
						?>
		                      <center>
		                      <p><font color="red"><b>ERROR. You must put a valid url.</b></font></p>
		                      <form method="POST" action="post.php">
		                      <br>
							  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                      <p>Text Ad Up To 100 Characters Including Spaces:<br><input name="message" size="65" maxlength="100" value="<? echo $message; ?>"></p>
		                      <br>
		                      <input type="hidden" name="action" value="Post">
		                      <input type="submit" value="Post Ad"></p>
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
								mysql_query("insert into saved_post (adbody,userid,url) values('$message','$userid','$url')");
								$saved_id = mysql_insert_id();
							}
							
			                $qpost="insert into post (adbody,userid,posted,url,saved_id) values('$message','$userid','".time()."','$url','$saved_id')";
							
							
		                    $rpost=mysql_query($qpost);
		                    echo "<center><p><b>Your message has been added successfully. You have ".($numpost - $todaycount - 1)." post left today.</b></p></center>";





			           
						}

				   }
		            else {
		            ?>

		                  <p align="center">
							<font size="2" face="Tahoma" color="#000080">Your ad remains active in our system for 24 hours. 1 point will be deducted for every time your website is viewed.</font></p>
		                  <p align="center">
							<font size="2" face="Tahoma" color="#000080">Your may post <? echo $numpost; ?> text ad(s) per day.</font></p>
<P align="center"><br>
	      <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool
Below! <br>

(Opens in New Window)</font></h3></center>

<center>
<FORM NAME='urtotest' target="_blank" ACTION='sitecheck.php'
METHOD='GET' >

<input type='text' value="http://" size="50" name='url' />

<input type='submit' value='Check URL' />
<br>
</FORM>
</center><p>

		                  <form method="POST" action="post.php">
		                  <br>
						  
						  <p>URL:<br><input name="url" size="65" maxlength="75" value="<? echo $url; ?>"></p>
		                  <p>Text Ad Up To 100 Characters Including Spaces:<br><input name="message" size="65" maxlength="100" value="<? echo $message; ?>"></p>
		                  <br>
						  
						  <?
						  if($savedcount < $numsave) echo "<input type=\"checkbox\" name=\"save\" value=\"1\"> Save ad <br>";
						  ?>
						  
		                  <input type="hidden" name="action" value="Post">
		                  <input type="submit" value="Post Ad"></p>
		                  </form></center>
		            <? }

	          	}
	            else {
					echo "<center><p><b>You have made $todaycount post today. $numpost post everyday day allowed.</b></p></center>";
	                echo "<center><p><b>Current server date/time: ".date('Y-m-d H:i:s')."</b></p></center>";
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