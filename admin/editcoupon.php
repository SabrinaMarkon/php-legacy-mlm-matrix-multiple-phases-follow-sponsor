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

        echo "<center><H2>Edit Coupon Codes</H2></center>";
		
		if($_POST['action'] == "update") {
		
				mysql_query("UPDATE promo_codes SET name = '".$_POST['name']."', max = '".$_POST['max']."', code = '".$_POST['code']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', upgrade = '".$_POST['upgrade']."', members='".$_POST['members']."' WHERE id='".$_POST['id']."'");

				echo "<font color=red>The coupon code has been updated.</font><br><br>";
			
		} else if($_POST['action'] == "add") {
		
				mysql_query("INSERT INTO promo_codes SET name = '".$_POST['name']."', max = '".$_POST['max']."', code = '".$_POST['code']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', upgrade = '".$_POST['upgrade']."', time = '".time()."', members='".$_POST['members']."'");

				echo "<font color=red>The coupon code has been added.</font><br><br>";
			
		} else if($_POST['action'] == "delete") {
		
				mysql_query("DELETE FROM promo_codes WHERE id='".$_POST['id']."'");
				mysql_query("DELETE FROM promo_used WHERE promoid='".$_POST['id']."'");
				
				echo "<font color=red>The coupon code has been deleted.</font><br><br>";
			
		}
		
		
		$sql = mysql_query("SELECT * FROM promo_codes");
		if(@mysql_num_rows($sql)) {
			echo "<table width=\"80%\" border=\"1\" cellpadding=\"5\"><tr><th>Name</th><th>Code</th><th>Redemptions</th><th>Max</th><th>Members</th><th>Action</th></tr>";
			
			while($each = mysql_fetch_array($sql)) {
				echo "<tr><td>".$each['name']."</td><td>".$each['code']."</td><td>".$each['count']."</td><td>".$each['max']."</td><td>".$each['members']."</td><td><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"edit\"><input type=\"submit\" value=\"Edit\"></form><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"delete\"><input type=\"submit\" value=\"Delete\"></form></td></tr>";
			}
			
			
			echo "</table>";
		}
		
		
			
		
		if($_POST['action'] == "edit") {
			$sql = mysql_query("SELECT * FROM promo_codes WHERE id='".$_POST['id']."' LIMIT 1");
			
			if(@mysql_num_rows($sql)) {
			$offer = mysql_fetch_array($sql);
		?>
			<h2>Edit</h2>
		
		  <form method="POST" action="editcoupon.php">
		  <input type="hidden" name="action" value="update">
		  <input type="hidden" name="id" value="<? echo $offer['id']; ?>">
		  <table>
		   <tr><td>Name:</td><td><input type="text" name="name" value="<? echo $offer['name']; ?>"></td></tr>
		   <tr><td>Code:</td><td><input type="text" name="code" value="<? echo $offer['code']; ?>"></td></tr>
		   <tr><td>Max:</td><td><input type="text" name="max" value="<? echo $offer['max']; ?>"></td></tr>
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

                                 <tr><td>Button Banners to add:</td><td><input type="text" name="button_num" value="<? echo $offer['button_num']; ?>"> banners</td></tr>
		  <tr><td>Views per button banner:</td><td><input type="text" name="button_views" value="<? echo $offer['button_views']; ?>"> views</td></tr>

		  <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="<? echo $offer['traffic_num']; ?>"> traffic links</td></tr>
		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="<? echo $offer['traffic_views']; ?>"> views</td></tr>
      
                                    <tr><td>PTC links to add:</td><td><input type="text" name="ptc_num" value="<? echo $offer['ptc_num']; ?>"> ptc links</td></tr>
		  <tr><td>Views per ptc link:</td><td><input type="text" name="ptc_views" value="<? echo $offer['ptc_views']; ?>"> views</td></tr>



                                    <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="<? echo $offer['hotlink_num']; ?>"> hotlinks links</td></tr>
		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="<? echo $offer['hotlink_views']; ?>"> views</td></tr>

		   <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="<? echo $offer['login_num']; ?>"> login ads</td></tr>

		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="<? echo $offer['login_views']; ?>"> views</td></tr>

 <tr><td>Top Nav links to add:</td><td><input type="text" name="topnav_num" value="<? echo $offer['topnav_num']; ?>"> Top Nav links</td></tr>
<tr><td>Bottom Nav links to add:</td><td><input type="text" name="botnav_num" value="<? echo $offer['botnav_num']; ?>"> Bottom Nav links</td></tr>

		<tr><td>Upgrade:</td><td><input type="radio" name="upgrade" value="1"<? if($offer['upgrade'] == "1") echo " CHECKED"; ?>> <?php echo $middlelevel ?> Member <input type="radio" name="upgrade" value="2"<? if($offer['upgrade'] == "2") echo " CHECKED"; ?>> <?php echo $toplevel ?> <input type="radio" name="upgrade" value="No"<? if($offer['upgrade'] == No) echo " CHECKED"; ?>> no</td></tr>
		  <tr><td>Members:</td><td><input type="radio" name="members" value="New"<? if($offer['members'] == 'New') echo " CHECKED"; ?>> New <input type="radio" name="members" value="Existing"<? if($offer['members'] == 'Existing') echo " CHECKED"; ?>> Existing <input type="radio" name="members" value="All"<? if($offer['members'] == 'All') echo " CHECKED"; ?>> All</td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>
		  </table>
          </form>
		
		
		
		<?
			} else echo "<font color=red>That promo code doesn't exist anymore.</font><br><br>";
		} else {
		?>
		
			<h2>Add</h2>
		  <form method="POST" action="editcoupon.php">
		  <input type="hidden" name="action" value="add">
		  <table>
		   <tr><td>Name:</td><td><input type="text" name="name" value=""></td></tr>
		   <tr><td>Code:</td><td><input type="text" name="code" value=""></td></tr>
		   <tr><td>Max:</td><td><input type="text" name="max" value=""></td></tr>
		  <tr><td>Points to add:</td><td><input type="text" name="points" value="0"> points</td></tr>
		  <tr><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="0"> surf credits</td></tr>
		  <tr><td>Solo to add:</td><td><input type="text" name="solo_num" value="0"> solos</td></tr>
		  <tr><td>Hot Headline Adz to add:</td><td><input type="text" name="hheadlinead_num" value="0"> hot headline ads</td></tr>
		  <tr><td>Clicks per Hot Headline Ad:</td><td><input type="text" name="hheadlinead_views" value="0"> clicks</td></tr>
		  <tr><td>Hot Header Ads to add:</td><td><input type="text" name="hheaderad_num" value="0"> hot header ads</td></tr>
		  <tr><td>Clicks per Hot Header Ad:</td><td><input type="text" name="hheaderad_views" value="0"> clicks</td></tr>
		  <tr><td>Banners to add:</td><td><input type="text" name="banner_num" value="0"> banners</td></tr>
		  <tr><td>Views per banner:</td><td><input type="text" name="banner_views" value="0"> views</td></tr>
		  <tr><td>Featured Ads to add:</td><td><input type="text" name="featuredad_num" value="0"> featured ads</td></tr>
		  <tr><td>Views per Featured Ad:</td><td><input type="text" name="featuredad_views" value="0"> views</td></tr>
                                <tr><td>Button Banners to add:</td><td><input type="text" name="button_num" value="0"> banners</td></tr>
		  <tr><td>Views per button banner:</td><td><input type="text" name="button_views" value="0"> views</td></tr>

				  <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="0"> traffic links</td></tr>
		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="0"> views</td></tr>
                                    <tr><td>PTC links to add:</td><td><input type="text" name="ptc_num" value="0"> ptc links</td></tr>
		  <tr><td>Views per ptc link:</td><td><input type="text" name="ptc_views" value="0"> views</td></tr>
                                 <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="0"> hot links</td></tr>
		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="0"> views</td></tr>

		   <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="0"> login ads</td></tr>

		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="0"> views</td></tr>

  <tr><td>Top Navigation links to add:</td><td><input type="text" name="topnav_num" value="0"> links</td></tr>

  <tr><td>Bottom Navigation links to add:</td><td><input type="text" name="botnav_num" value="0"> links</td></tr>

		<tr><td>Upgrade:</td><td><input type="radio" name="upgrade" value="1"> JV Member <input type="radio" name="upgrade" value="2"> SUPERJV <input type="radio" name="upgrade" value="No" CHECKED> no</td></tr>	
         	  	  <tr><td>Members:</td><td><input type="radio" name="members" value="New"> New <input type="radio" name="members" value="Existing"> Existing <input type="radio" name="members" value="All" CHECKED> All</td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>
		  </table>
          </form>
		
		<?
		}
		
		
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>