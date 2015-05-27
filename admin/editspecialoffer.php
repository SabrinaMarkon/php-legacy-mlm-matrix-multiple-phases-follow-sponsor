<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
?>
<table align="center" border="0" width="100%">
<tr>
<td width="15%" valign=top><br>
<? include("adminnavigation.php"); ?>
</td>
<td valign="top" align="center"><br><br> <?
echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";


        echo "<center><H2>Edit Special Offer</H2></center>";
		
		if($_POST['action'] == "update") {
		
				mysql_query("UPDATE offerpage SET price = '".$_POST['price']."', priceinterval = '".$_POST['priceinterval']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."', memtype = '".$_POST['memtype']."', enable = '".$_POST['enable']."', upgrade_pro = '".$_POST['upgrade_pro']."' WHERE 1");				
				echo "<font color=red>The settings have been updated.</font><br><br>";
			
			}
			
		
			$sql = mysql_query("SELECT * FROM offerpage LIMIT 1");
			$offer = mysql_fetch_array($sql);
		
		
		?>
		
		  <form method="POST" action="editspecialoffer.php">
		  <input type="hidden" name="action" value="update">
		  <table>
			<tr><td>Price:</td><td>$ <input type="text" name="price" value="<? echo $offer['price']; ?>">&nbsp;
			<select name="priceinterval">
			<option value="monthly" <?php if ($offer["priceinterval"] == "monthly") { echo "selected"; } ?>>Per Month</option>
			<option value="onetime" <?php if ($offer["priceinterval"] != "monthly") { echo "selected"; } ?>>One Time</option>
			</select>
			</td></tr>
		  <tr><td>Points to add:</td><td><input type="text" name="points" value="<? echo $offer['points']; ?>"> points</td></tr>
		  <tr><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="<? echo $offer['surfcredits']; ?>"> surf credits</td></tr>
		  <tr><td>Solo to add:</td><td><input type="text" name="solo_num" value="<? echo $offer['solo_num']; ?>"> solos</td></tr>
		  <tr><td>Hot Headline Adz to add:</td><td><input type="text" name="hheadlinead_num" value="<? echo $offer['hheadlinead_num']; ?>"> hot headline ads</td></tr>
		  <tr><td>Clicks per Hot Headline Ad:</td><td><input type="text" name="hheadlinead_views" value="<? echo $offer['hheadlinead_views']; ?>"> clicks</td></tr>
		  <tr><td>Hot Header Ads to add:</td><td><input type="text" name="hheaderad_num" value="<? echo $offer['hheaderad_num']; ?>"> hot header ads</td></tr>
		  <tr><td>Clicks per Hot Header Ad:</td><td><input type="text" name="hheaderad_views" value="<? echo $offer['hheaderad_views']; ?>"> clicks</td></tr>
		  <tr><td>Banners to add:</td><td><input type="text" name="banner_num" value="<? echo $offer['banner_num']; ?>"> banners</td></tr>
		  <tr><td>Views per banner:</td><td><input type="text" name="banner_views" value="<? echo $offer['banner_views']; ?>"> views</td></tr>
		  <tr><td>Featured Ads to add:</td><td><input type="text" name="featuredad_num" value="<? echo $offer['featuredad_num']; ?>"> featured ads</td></tr>
		  <tr><td>Views per Featured Ad:</td><td><input type="text" name="featuredad_views" value="<? echo $offer['featuredad_views']; ?>"> views</td></tr>
 <tr><td>Buttons to add:</td><td><input type="text" name="button_num" value="<? echo $offer['button_num']; ?>"> banners</td></tr>
		  <tr><td>Views per button:</td><td><input type="text" name="button_views" value="<? echo $offer['button_views']; ?>"> views</td></tr>

		  <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="<? echo $offer['traffic_num']; ?>"> traffic links</td></tr>
		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="<? echo $offer['traffic_views']; ?>"> views</td></tr>
                                  <tr><td>PTC links to add:</td><td><input type="text" name="ptc_num" value="<? echo $offer['ptc_num']; ?>"> ptc links</td></tr>
		  <tr><td>Views per ptc link:</td><td><input type="text" name="ptc_views" value="<? echo $offer['ptc_views']; ?>"> views</td></tr>

                                   <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="<? echo $offer['hotlink_num']; ?>"> hotlink links</td></tr>

		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="<? echo $offer['hotlink_views']; ?>"> views</td></tr>
		  <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="<? echo $offer['login_num']; ?>"> login ads</td></tr>

		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="<? echo $offer['login_views']; ?>"> views</td></tr>
                              <tr><td>Top Nav links to add:</td><td><input type="text" name="topnav_num" value="<? echo $offer['topnav_num']; ?>"> Top Nav links</td></tr>
<tr><td>Bottom Nav links to add:</td><td><input type="text" name="botnav_num" value="<? echo $offer['botnav_num']; ?>"> Bottom Nav links</td></tr>
		<tr><td>Upgrade:</td><td><input type="radio" name="upgrade_pro" value="1"<? if($offer['upgrade_pro'] == "1") echo " CHECKED"; ?>> <?php echo $middlelevel ?> Member <input type="radio" name="upgrade_pro" value="2"<? if($offer['upgrade_pro'] == "2") echo " CHECKED"; ?>> <?php echo $toplevel ?> <input type="radio" name="upgrade_pro" value="0"<? if($offer['upgrade_pro'] == 0) echo " CHECKED"; ?>> no</td></tr>
		  <tr><td>Show to:</td><td><input type="radio" name="memtype" value="PRO"<? if($offer['memtype'] == "PRO") echo " CHECKED"; ?>> <?php echo $lowerlevel ?> members <input type="radio" name="memtype" value="JV Member"<? if($offer['memtype'] == "JV Member") echo " CHECKED"; ?>> <?php echo $middlelevel ?> members <input type="radio" name="memtype" value="SUPERJV"<? if($offer['memtype'] == "SUPERJV") echo " CHECKED"; ?>> <?php echo $toplevel ?> members <input type="radio" name="memtype" value="ALL"<? if($offer['memtype'] == "ALL") echo " CHECKED"; ?>> All</td></tr>
		  
		  <tr><td>Show after login:</td><td><input type="radio" name="enable" value="1"<? if($offer['enable'] == 1) echo " CHECKED"; ?>> yes <input type="radio" name="enable" value="0"<? if($offer['enable'] == 0) echo " CHECKED"; ?>> no</td></tr> 		  		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>
		  </table>
          </form>
		
		
		
		<?
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>