<?php


session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$done = $_POST['done'];
$id = $_POST['id'];
$targeturl = $_POST['subject'];
$bannerurl = $_POST['adbody'];

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    if ($done == "YES") {
		if (empty($subject)){
       		?><p>No subject entered. Click <a href=addtlinks.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if ( 0 && empty($adbody)){
       		?><p>No adbody entered. Click <a href=addtlinks.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($url)){
       		?><p>No url entered. Click <a href=addtlinks.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}

		//$url = mysql_real_escape_string($url);
		//$subject = mysql_real_escape_string($subject);
		//$adbody = mysql_real_escape_string($adbody);

    	$query = "update tlinks set subject='$subject', added=1, approved=0, url='$url' where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
    	?>
      		<p><center>Your traffic link ad has been set up, and has been placed in the queue for approval. <a href="advertise.php">Click here</a> to go back.</p></center>
    	<?
    }
    else {
		if($_POST['id']) $query = "SELECT * FROM tlinks where userid='".$_SESSION[uname]."' AND id='".$_POST['id']."' limit 1";
    	else $query = "SELECT * FROM tlinks where added=0 and userid='".$_SESSION[uname]."' limit 1";
		
		
		$result = mysql_query ($query)
			or die ("Query failed");
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $subject = $line["subject"];
            $adbody = $line["adbody"];
			$url = $line["url"];
            ?>
              <center><H2>Add your traffic link ad</H2>
              <p><br />No adult, offensive or illegal ads (including pyramid schemes and chainletters).<BR><B></p>
              <form method="POST" action="addtlinks.php">
              Subject:<br>
              <input type="text" name="subject" maxsize="70" size="40" value="<? echo $subject; ?>"><br>
              <!-- Ad body:<br>
              <textarea  name="adbody" cols="65" rows="30"></textarea>
              <br> -->
			  Ad URL:<br>
              <input type="text" name="url" maxsize="1250" size="40" value="<? echo $url; ?>"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
              <p>Enter the page you want traffic to view above, include
				<span style="background-color: #FFFF00">http://</span></B><br />Double check your traffic link ad, as it cannot be edited once submitted.</p>
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