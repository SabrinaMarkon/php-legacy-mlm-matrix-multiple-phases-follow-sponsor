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

        echo "<center><H2>Navigation banners</H2></center>";
		
		if($_POST['action'] == "update") {
		
				mysql_query("UPDATE navbanner SET banner = '".$_POST['banner']."', target = '".$_POST['target']."' WHERE id='".$_POST['id']."'");

				echo "<font color=red>The banner has been updated.</font><br><br>";
			
		} else if($_POST['action'] == "add") {
		
				mysql_query("INSERT INTO navbanner SET banner = '".$_POST['banner']."', target = '".$_POST['target']."'");

				echo "<font color=red>The banner has been added.</font><br><br>";
			
		} else if($_POST['action'] == "delete") {
		
				mysql_query("DELETE FROM navbanner WHERE id='".$_POST['id']."'");

				echo "<font color=red>The banner has been deleted.</font><br><br>";
			
		}
		
		
		$sql = mysql_query("SELECT * FROM navbanner");
		if(@mysql_num_rows($sql)) {
			echo "<table width=\"50%\" border=\"1\" cellpadding=\"5\"><tr><th>Banner</th><th>Action</th></tr>";
			
			while($each = mysql_fetch_array($sql)) {
				echo "<tr><td><a href=\"".$each['target']."\"><img border=\"0\" src=\"".$each['banner']."\"></a></td><td align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"edit\"><input type=\"submit\" value=\"Edit\"></form><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"delete\"><input type=\"submit\" value=\"Delete\"></form></td></tr>";
			}
			
			
			echo "</table><br><br>";
		}
		
		
			
		
		if($_POST['action'] == "edit") {
			$sql = mysql_query("SELECT * FROM navbanner WHERE id='".$_POST['id']."' LIMIT 1");
			
			if(@mysql_num_rows($sql)) {
			$info = mysql_fetch_array($sql);
		?>
			<h2>Edit</h2>
		
		  <form method="POST">
		  <input type="hidden" name="action" value="update">
		  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
		  <table>
		   <tr><td>Banner:</td><td><input type="text" name="banner" value="<? echo $info['banner']; ?>"></td></tr>
		   <tr><td>Url:</td><td><input type="text" name="target" value="<? echo $info['target']; ?>"></td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>
		  </table>
          </form>
		
		
		
		<?
			} else echo "<font color=red>That banner doesn't exist anymore.</font><br><br>";
		} else {
		?>
		
			<h2>Add</h2>
		  <form method="POST">
		  <input type="hidden" name="action" value="add">
		  <table>
		   <tr><td>Banner:</td><td><input type="text" name="banner" value=""></td></tr>
		   <tr><td>Url:</td><td><input type="text" name="target" value=""></td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Add"></td></tr>
		  </table>
          </form>
		
		<?
		}
		
		
        echo "<br><br></td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>