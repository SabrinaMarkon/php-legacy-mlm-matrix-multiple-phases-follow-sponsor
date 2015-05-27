<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";



if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    if ($done == "YES") {
		if (empty($subject)){
       		?><p>No subject entered. Click <a href=addlogin.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($adbody)){
       		?><p>No adbody entered. Click <a href=addlogin.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}


    	$query = "update loginads set subject='$subject',adbody='$adbody', added=1, approved=0 where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
    	?>
      		<p><center>Your login ad has been set up, and has been placed in the queue for approval. <a href="advertise.php">Click here</a> to go back.</p></center>
    	<?
    }
    else {
		if($_POST['id']) $query = "SELECT * FROM loginads where userid='".$_SESSION[uname]."' AND id='".$_POST['id']."' limit 1";
    	else $query = "SELECT * FROM loginads where added=0 and userid='".$_SESSION[uname]."' limit 1";
		
		
		$result = mysql_query ($query)
			or die ("Query failed");
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $subject = $line["subject"];
            $adbody = $line["adbody"];
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

			
              <center><H2>Add your login ad</H2>
              <p><br />No adult, offensive or illegal ads (including pyramid schemes and chainletters).<BR><B></p>
              <form method="POST" action="addlogin.php">
              Subject:<br>
              <input type="text" name="subject" maxsize="70" size="40" value="<? echo $subject; ?>"><br>
			  Ad body:<br>
			  <textarea name="adbody" rows=15 cols=60><? echo $adbody; ?></textarea><br>
			  
              <input type="hidden" name="id" value="<? echo $id; ?>">
			  
              <input type="hidden" name="done" value="YES">
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