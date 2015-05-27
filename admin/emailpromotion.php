<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
	echo "Put %reflink% where the referral link should be<br><br>"; 
	
	if($_POST['action'] == "Create") {
		mysql_query("INSERT INTO email_promotion VALUES('', '".$_POST['subject1']."', '".$_POST['subject2']."', '".$_POST['text']."')");
		echo "<font color=\"red\">The promotion email has been added.</font><br>";
	} elseif($_POST['action'] == "Delete") {
		mysql_query("DELETE FROM email_promotion WHERE id = ".$_POST['id']);
		echo "<font color=\"red\">The promotion email has been deleted.</font><br>";
	} elseif($_POST['action'] == "Save") {
		mysql_query("UPDATE email_promotion SET subject1 = '".$_POST['subject1']."', subject2 = '".$_POST['subject2']."', text = '".$_POST['text']."' WHERE id = ".$_POST['id']);
		echo "<font color=\"red\">The promotion email has been saved.</font><br>";
	}

	$query = "select * from email_promotion";
	$result = mysql_query ($query)
	     or die ("Select failed");
	
	
    while ($line = mysql_fetch_array($result)) {

    	?>
    	<center>
		<form method="POST" action="emailpromotion.php">
        <input type="hidden" name="id" value="<? echo $line["id"]; ?>">
		Subject 1: <input type="text" name="subject1" value="<? echo $line["subject1"]; ?>"><br>
		Subject 2: <input type="text" name="subject2" value="<? echo $line["subject2"]; ?>"><br>
		<textarea rows=10 cols=50 name="text"><? echo $line["text"]; ?></textarea><br>
		<input type="submit" name="action" value="Delete"><input type="submit" name="action" value="Save">
		</form>
		</center>
		<br><br>
    	<?
    	}
    ?>
	
		
	    <center>
		<b>New</b>
		<form method="POST" action="emailpromotion.php">
		Subject 1: <input type="text" name="subject1"><br>
		Subject 2: <input type="text" name="subject2"><br>
		<textarea rows=10 cols=50 name="text"></textarea><br>
		<input type="submit" name="action" value="Create">
		</form>
		</center>
		<br><br>
	
	
    </center>
    </td>
    </tr>
    </table>
	<?
    }

else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>