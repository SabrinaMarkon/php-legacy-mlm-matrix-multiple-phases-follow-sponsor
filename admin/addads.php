<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?>
<script type="text/javascript" src="../jscripts/calendarDateInput.js">

/***********************************************
* Jason's Date Input Calendar- By Jason Moon http://calendar.moonscript.com/dateinput.cfm
* Script featured on and available at http://www.dynamicdrive.com
* Keep this notice intact for use.
***********************************************/

</script>
<table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
        echo "<center><H2>Add ads to a specific user</H2></center>";
        ?>
         <p>
          <form method="POST" action="addsolos.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add a blank solo ad to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>

		<p>
		<form method="POST" action="addhheadlinead.php">
		<table border=1><tr><td>
		<table border=0 cellpadding=3 cellspacing=0>
		<tr><td colspan=2 align=center><b>Add a HOT Headline Ad to a users account</b></td></tr>
		<tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
		<tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
		<tr><td width=110 align=right>Max Clicks:</td><td><input type="text" name="max"></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
		</table>
		</td></tr></table>
		</form>
		</p>	 

		<p>
		<form method="POST" action="addhheaderad.php">
		<table border=1><tr><td>
		<table border=0 cellpadding=3 cellspacing=0>
		<tr><td colspan=2 align=center><b>Add a HOT Header Ad to a users account</b></td></tr>
		<tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
		<tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
		<tr><td width=110 align=right>Max Clicks:</td><td><input type="text" name="max"></td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
		</table>
		</td></tr></table>
		</form>
		</p>

          <p>
          <form method="POST" action="addbanners.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add blank banners to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td width=110 align=right>Max impressions:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>
<p>

          <form method="POST" action="addbuttons.php">

          <table border=1><tr><td>

          <table border=0 cellpadding=3 cellspacing=0>

          <tr><td colspan=2 align=center><b>Add blank button ads to a users account</b></td></tr>

		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>

          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>

          <tr><td width=110 align=right>Max impressions:</td><td><input type="text" name="max"></td></tr>

          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>

          </table>

          </td></tr></table>

          </form>

          </p>
 <p>
          <form method="POST" action="addhotlinks.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add blank hot link to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
		  <tr><td width=110 align=right>Max Displays:</td><td><input type="text" name="max"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          <p>
          <form method="POST" action="addtlinks.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add blank traffic links to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td width=110 align=right>Max views:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>
	<p>
          <form method="POST" action="addptclinks.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add blank ptc links to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td width=110 align=right>Max views:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>
	  
		  
		  <p>
          <form method="POST" action="addtopnav.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add a blank top navigation link to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>
		  <p>
          <form method="POST" action="addbotnav.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add a blank bottom navigation link to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>

         <p>
          <form method="POST" action="addfeaturedad.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add blank Featured Ad to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td width=110 align=right>Max impressions:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>

			<p>
			<form method="POST" action="addfullloginad.php">
			<table border=1><tr><td>
			<table border=0 cellpadding=3 cellspacing=0>
			<tr><td colspan=2 align=center><b>Add a blank Full Page Login Ad to a users account</b></td></tr>
			<tr><td width=110 align=right>Date For This Ad:</td><td>
			<script>DateInput('rented', true, 'YYYY-MM-DD')</script>
			</td></tr>
			<tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
			<tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
			</table>
			</td></tr></table>
			</form>
			</p>	

		  <p>
          <form method="POST" action="addlogins.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add a blank login ad to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
		  <tr><td width=110 align=right>Max views:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>
	  <p>
          <form method="POST" action="addfooterads.php">
          <table border=1><tr><td>
          <table border=0 cellpadding=3 cellspacing=0>
          <tr><td colspan=2 align=center><b>Add footer ads to a users account</b></td></tr>
		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity"></td></tr>
          <tr><td width=110 align=right>Userid:</td><td><input type="text" name="userid"></td></tr>
          <tr><td width=110 align=right>Max views:</td><td><input type="text" name="max"></td></tr>
          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>
          </table>
          </td></tr></table>
          </form>
          </p>	  
<b>Add blank admin ads</b>
<p>

          <form method="POST" action="addadminads.php">

          <table border=1><tr><td>

          <table border=0 cellpadding=3 cellspacing=0>

          <tr><td colspan=2 align=center><b>Add a blank solo ad to admins account</b></td></tr>

		  <tr><td width=110 align=right>Quantity:</td><td><input type="text" name="quantity" value="10"></td></tr>

          <tr><td width=110 align=right></td><td><input type="hidden" name="userid"></td></tr>

          <tr><td>&nbsp;</td><td><input type="submit" value="Add"></td></tr>

          </table>

          </td></tr></table>

          </form>

          </p>	
        <?
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>