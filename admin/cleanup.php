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
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        echo "<center><H2>Clean Database</H2></center>";
       
$count= mysql_query("select * from banners WHERE status='1' AND added='1' AND max=shown");
    $bannersrowcount = @ mysql_num_rows($count);

		if($_POST['prune']) {
			mysql_query("delete from banners WHERE status=1 AND added=1 AND max=shown");

			echo "<font color=red>The completed banners have been deleted.</font><br><br>";
		}
		?>
Total Completed Banner Campaigns: <? echo $bannersrowcount; ?></p>

		<form method=post>
		<input type="submit" name="prune" value="Delete completed banners">
		</form>

<?

$count= mysql_query("select * from buttons WHERE status='1' AND added='1' AND max=shown");
    $buttonsrowcount = @ mysql_num_rows($count);

		if($_POST['prune2']) {
			mysql_query("delete from buttons WHERE status=1 AND added=1 AND max=shown");


			echo "<font color=red>The completed button banners have been deleted.</font><br><br>";
		}
		?>
Total Completed Button Banner Campaigns: <? echo $buttonsrowcount; ?></p>

		<form method=post>
		<input type="submit" name="prune2" value="Delete completed button banners">
		</form>

<?

$count= mysql_query("select * from hotlinks WHERE approved='1' AND added='1' AND max=views");
    $hotlinkrowcount = @ mysql_num_rows($count);

		if($_POST['prune3']) {
			mysql_query("delete from hotlinks WHERE approved=1 AND added=1 AND max=views");
			echo "<font color=red>The completed hot links have been deleted.</font><br><br>";
		}
		?>
Total Completed Hot Link Campaigns: <? echo $hotlinkrowcount; ?></p>

		<form method=post>
		<input type="submit" name="prune3" value="Delete completed hot links">
		</form>

<?

$count= mysql_query("select * from tlinks WHERE approved='1' AND added='1' AND paid=sent");
    $tlinkrowcount = @ mysql_num_rows($count);

		if($_POST['prune4']) {
			mysql_query("delete from tlinks WHERE approved=1 AND added=1 AND paid=sent");
			echo "<font color=red>The completed traffic links have been deleted.</font><br><br>";
		}
		?>
Total Completed Traffic Link Campaigns: <? echo $tlinkrowcount; ?></p>

		<form method=post>
		<input type="submit" name="prune4" value="Delete completed traffic links">
		</form>


<?

$count= mysql_query("select * from ptcads WHERE approved='1' AND added='1' AND paid=sent");
    $tlinkrowcount = @ mysql_num_rows($count);

		if($_POST['prune4']) {
			mysql_query("delete from ptcads WHERE approved=1 AND added=1 AND paid=sent");
			echo "<font color=red>The completed paid to click links have been deleted.</font><br><br>";
		}
		?>
Total Completed Paid To Click Campaigns: <? echo $tlinkrowcount; ?></p>

		<form method=post>
		<input type="submit" name="prune5" value="Delete completed ptc links">
		</form>

<?


        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>