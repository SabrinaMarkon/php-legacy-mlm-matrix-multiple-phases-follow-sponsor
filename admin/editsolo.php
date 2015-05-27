<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$id = $_GET['id'];
$done = $_POST['done'];
$id = $_POST['id'];
$added = $_POST['added'];
$sent = $_POST['sent'];
$approved = $_POST['approved'];
$userid = $_POST['userid'];
$adbody = $_POST['adbody'];
$subject = $_POST['subject'];
$url = $_POST['url'];
$userid= $_POST['userid'];

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";


    if ($done == "YES") {
		if (empty($adbody)){
       		?><center><p>No 'adbody' entered. Click <a href=viewallsolos.php>here</a> to go back<p></center> <?
       		include "../footer2.php";
       		exit;
    	}
		if (empty($subject)){
       		?><center><p>No 'subject' entered. Click <a href=viewallsolos.php>here</a> to go back<p></center> <?
       		include "../footer2.php";
       		exit;
    	}

    	$query = "update solos set subject='$subject', adbody='$adbody', sent='$sent', approved='$approved', added='$added', url='$url' where id=".$id;
    	$result = mysql_query ($query)
              or die(mysql_error()); 	     	



    	?>
      		<p><center>Solo ad has been edited, <a href="approveadds.php">click here</a> to go back.</center></p>
    	<?
    }
    else {

               
                $query2 .= "select * from solos WHERE id='".$_GET['id']."'"; 
    	$result2 = mysql_query ($query2)
	     	or die(mysql_error()); 
    	$line = mysql_fetch_array($result2);
       	$adbody = $line['adbody'];
                $subject = $line['subject'];               
                $url = $line['url'];
                $id = $line['id'];
                $sent = $line['sent'];
                $added = $line['added'];
                 $approved = $line['approved'];
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
    	<center><H2>Edit solo</H2><br>
    	<form method="POST" action="editsolo.php">
    	Subject:<br>
    	<input type="text" name="subject" maxsize="150" value="<? echo $subject; ?>"><br>
    	Ad body:<br>
    	<textarea name="adbody" cols=40 rows=15><? echo $adbody; ?></textarea><br>
URL:<br>
             <input type="text" name="url" maxsize="150" value="<? echo $url; ?>">
                <input type="hidden" name="sent" maxsize="1" value=0>
                <input type="hidden" name="approved" maxsize="1" value=0>
                <input type="hidden" name="added" maxsize="1" value=1><br><br>
               	<input type="hidden" name="id" value=<? echo $id; ?>>
               <input type="hidden" name="done" value="YES">
    	<input type="submit" value="Save">
    	</form></center>
    	<?
    }
	echo "</td></tr></table>";
  }
else
  { ?>

  <center><p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p></center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>