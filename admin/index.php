<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
	?>
    	<table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
        ?>
<?

   $query1 = "SELECT * FROM adminnotes WHERE name='Admin Notes'";
   $result1 = mysql_query ($query1);
   $line1 = mysql_fetch_array($result1);
   $htmlcode = $line1["htmlcode"];

?>

 

    	<center>  <b>Admin Notes</b>

		<form method="POST" action="editadminnotes.php">

        <input type="hidden" name="index" value="1">

		<textarea rows=10 cols=75 name="htmlcode"><? echo $htmlcode; ?></textarea><br>

		<input type="submit" value="Update Admin Notes">

		</form>

		</center>

<br>
          <p><H2>Welcome to the admin area!</H2></p>
          <p>First you MUST go to 'Settings' to set up your Ad- Exchange</p>
          
		<?
		if($_POST['optimize']) {
			mysql_query("OPTIMIZE TABLE `advertise` , `autoresponder` , `banners` , `banner_clicks` , `builder` , `builder_cat` , `builder_fav` , `builder_sites` , `clicks` , `drawing` , `emails` , `email_promotion` , `links` , `members` , `navigation` , `navlink` , `offerpage` , `oto` , `pages` , `post` , `promo_codes` , `promo_used` , `refmail` , `saved_post` , `saved_solos` , `settings` , `solos` , `support` , `tlinks` , `tlviews` , `transactions` , `urls` , `viewed`");
			echo "The tables have been optimized";
		}
		?>

			<form method="post">
			<input type="submit" name="optimize" value="Optimize database">
			</form>


          </td>
      </tr>
    </table>
    <?
  }
else {
	?>
    	<center>
	    <form method="POST" action="loginnow.php"><br>
	    Admin Id:<br><input type="text" name="Adminid" value=""><br>
	    Password:<br><input type="password" name="Password" value=""><br>
	    <input type="submit" value="Login">
	    </form>
	    </center>
    <?
}
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
include "../footer.php";

?>