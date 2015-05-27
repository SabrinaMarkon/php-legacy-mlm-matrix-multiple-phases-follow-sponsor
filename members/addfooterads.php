<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$done = $_POST['done'];
$id = $_POST['id'];
$subject = $_POST['subject'];
$url = $_POST['url'];
$desc1 = $_POST['desc1'];
$desc2 = $_POST['desc2'];


if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    if ($done == "YES") {
		if (empty($subject)){
       		?><p>No subject entered. Click <a href=addfooterads.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
                               if (empty($desc1)){
       		?><p>No description line 1 entered. Click <a href=addfooterads.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
                               if (empty($desc2)){
       		?><p>No description line 2 entered. Click <a href=addfooterads.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($url)){
       		?><p>No url entered. Click <a href=addfooterads.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}

		//$url = mysql_real_escape_string($url);
		// $subject = mysql_real_escape_string($subject);
		//$adbody = mysql_real_escape_string($adbody);

    	$query = "update footerads set subject='$subject', desc1='$desc1', desc2='$desc2', added=1, url='$url' where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed 1");
    	?>
      		<p><center>Your footer ad has been added, and has been placed in the queue for approval. <a href="advertise.php">Click here</a> to go back.</p></center>
    	<?
    }
    else {
		if($_POST['id']) $query = "SELECT * FROM footerads where userid='".$_SESSION[uname]."' AND id='".$_POST['id']."' limit 1";
    	else $query = "SELECT * FROM footerads where added=0 and userid='".$_SESSION[uname]."' limit 1";
		
		
		$result = mysql_query ($query)
			or die ("Query failed 2");
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $subject = $line["subject"];
            $desc1 = $line["desc1"];
            $desc2 = $line["desc2"];
            $url = $line["url"];
            ?>
              <center><H2>Add Your Solo Footer Ad</H2>
              <p><br />No adult, offensive or illegal ads (including pyramid schemes and chainletters).<BR><BR>
	  <b>Limit of 50 Characters Per Line</b><br><B></p>
              <form method="POST" action="addfooterads.php">
              Subject Line & Text Lines:<br><input type="text" name="subject" maxsize="50" size="50" value="<? echo $subject; ?>"><br>
  Description Line 1:<br>
              <input type="text" name="desc1" maxsize="50" size="50" value="<? echo $desc1; ?>"><br>
  Description Line 2:<br>
              <input type="text" name="desc2" maxsize="50" size="50" value="<? echo $desc2; ?>"><br>

			  Ad URL:<br>
              <input type="text" name="url" maxsize="250" size="50" value="<? echo $url; ?>"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
              <p>Enter the page you want traffic to view above, include
				<span style="background-color: #FFFF00">http://</span></B><br />Double check your paid ad, as it cannot be edited once submitted.</p>
              <input type="submit" value="Save">
              </form></center>
            <?
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