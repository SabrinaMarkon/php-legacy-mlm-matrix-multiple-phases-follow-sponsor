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


        echo "<center><H2>Edit OTO</H2></center>";

		

		if($_POST['action'] == "update") {

		

				mysql_query("UPDATE oto SET price = '".$_POST['price']."', priceinterval = '".$_POST['priceinterval']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."', upgrade_pro = '".$_POST['upgrade_pro']."' WHERE 1");



				echo "<font color=red>The settings have been updated.</font><br><br>";

			

			}

			

		

			$sql = mysql_query("SELECT * FROM oto LIMIT 1");

			$oto = mysql_fetch_array($sql);

		

		

		?>

		

		  <form method="POST" action="editoto.php">

		  <input type="hidden" name="action" value="update">

		  <table>

		   <tr><td>Price:</td><td>$ <input type="text" name="price" value="<? echo $oto['price']; ?>">&nbsp;
		   <select name="priceinterval">
		   <option value="monthly" <?php if ($oto["priceinterval"] == "monthly") { echo "selected"; } ?>>Per Month</option>
		   <option value="onetime" <?php if ($oto["priceinterval"] != "monthly") { echo "selected"; } ?>>One Time</option>
		   </select>
		   </td></tr>

		  <tr><td>Points to add:</td><td><input type="text" name="points" value="<? echo $oto['points']; ?>"> points</td></tr>
		  <tr><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="<? echo $oto['surfcredits']; ?>"> surf credits</td></tr>
		  <tr><td>Solo to add:</td><td><input type="text" name="solo_num" value="<? echo $oto['solo_num']; ?>"> solos</td></tr>
		  <tr><td>Hot Headline Adz to add:</td><td><input type="text" name="hheadlinead_num" value="<? echo $oto['hheadlinead_num']; ?>"> hot headline ads</td></tr>
		  <tr><td>Clicks per Hot Headline Ad:</td><td><input type="text" name="hheadlinead_views" value="<? echo $oto['hheadlinead_views']; ?>"> clicks</td></tr>
		  <tr><td>Hot Header Ads to add:</td><td><input type="text" name="hheaderad_num" value="<? echo $oto['hheaderad_num']; ?>"> hot header ads</td></tr>
		  <tr><td>Clicks per Hot Header Ad:</td><td><input type="text" name="hheaderad_views" value="<? echo $oto['hheaderad_views']; ?>"> clicks</td></tr>
		  <tr><td>Banners to add:</td><td><input type="text" name="banner_num" value="<? echo $oto['banner_num']; ?>"> banners</td></tr>
		  <tr><td>Views per banner:</td><td><input type="text" name="banner_views" value="<? echo $oto['banner_views']; ?>"> views</td></tr>
		  <tr><td>Featured Ads to add:</td><td><input type="text" name="featuredad_num" value="<? echo $oto['featuredad_num']; ?>"> featured ads</td></tr>
		  <tr><td>Views per Featured Ad:</td><td><input type="text" name="featuredad_views" value="<? echo $oto['featuredad_views']; ?>"> views</td></tr>
<tr><td>Buttons to add:</td><td><input type="text" name="button_num" value="<? echo $oto['button_num']; ?>">button banners</td></tr>

		  <tr><td>Views per button:</td><td><input type="text" name="button_views" value="<? echo $oto['button_views']; ?>"> views</td></tr>


		  <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="<? echo $oto['traffic_num']; ?>"> traffic links</td></tr>

		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="<? echo $oto['traffic_views']; ?>"> views</td></tr>
 
                                      <tr><td>PTC links to add:</td><td><input type="text" name="ptc_num" value="<? echo $oto['ptc_num']; ?>"> ptc links</td></tr>

		  <tr><td>Views per ptc link:</td><td><input type="text" name="ptc_views" value="<? echo $oto['ptc_views']; ?>"> views</td></tr>

                            
		    <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="<? echo $oto['hotlink_num']; ?>"> hotlinks links</td></tr>

		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="<? echo $oto['hotlink_views']; ?>"> views</td></tr>

		  <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="<? echo $oto['login_num']; ?>"> login ads</td></tr>

		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="<? echo $oto['login_views']; ?>"> views</td></tr>

  <tr><td>Top Nav links to add:</td><td><input type="text" name="topnav_num" value="<? echo $oto['topnav_num']; ?>"> Top Nav links</td></tr>

 <tr><td>Bottom Nav links to add:</td><td><input type="text" name="botnav_num" value="<? echo $oto['botnav_num']; ?>"> Bottom Nav links</td></tr>

		 <tr><td>Upgrade:</td><td><input type="radio" name="upgrade_pro" value="1"<? if($oto['upgrade_pro'] == "1") echo " CHECKED"; ?>> <?php echo $middlelevel ?> Member <input type="radio" name="upgrade_pro" value="2"<? if($oto['upgrade_pro'] == "2") echo " CHECKED"; ?>> <?php echo $toplevel ?> <input type="radio" name="upgrade_pro" value="0"<? if($oto['upgrade_pro'] == 0) echo " CHECKED"; ?>> no</td></tr> 

		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>

		  </table>

          </form>

		

		

		

		<?

        echo "</td></tr></table>";

    }

else

	echo "Unauthorised Access!";



include "../footer.php";



?>