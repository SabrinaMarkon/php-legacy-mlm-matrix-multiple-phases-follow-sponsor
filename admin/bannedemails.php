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

        echo "<center><H2>Banned Emails</H2></center>";
		
		if($_POST['action'] == "add") {
		
				$emails = explode("\n", $_POST['emails']);
				
				foreach($emails as $each) {
					if(trim($each) != "") {
						$sql = mysql_query("SELECT FROM banned_emails WHERE email='$each'");
						if(!@mysql_num_rows($sql)) {
							mysql_query("INSERT INTO banned_emails SET email = '".$each."'");
						}
					}
				}

				echo "<font color=red>The emails have been added.</font><br><br>";
			
		} else if($_POST['action'] == "delete") {
		
				mysql_query("DELETE FROM banned_emails WHERE id='".$_POST['id']."'");

				echo "<font color=red>The email has been deleted.</font><br><br>";
			
		}
		
		
		$sql = mysql_query("SELECT * FROM banned_emails");
		if(@mysql_num_rows($sql)) {
			echo "<table width=\"50%\" border=\"1\" cellpadding=\"5\"><tr><th>Email</th><th>Action</th></tr>";
			
			while($each = mysql_fetch_array($sql)) {
				echo "<tr><td>".$each['email']."</td><td align=center><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"delete\"><input type=\"submit\" value=\"Delete\"></form></td></tr>";
			}
			
			
			echo "</table>";
		}
		
	
		?>
		
		  <h2>Add</h2>
		  <form method="POST">
		  <input type="hidden" name="action" value="add">
		  One domain per line<br>
		  <textarea name="emails" cols=50 rows=15></textarea><br>
		  <input type="submit" value="submit">
          </form>
		
		<?
		
		
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>