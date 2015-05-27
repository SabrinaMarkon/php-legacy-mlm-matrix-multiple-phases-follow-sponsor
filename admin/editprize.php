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

        echo "<center><H2>Prize Contest Settings</H2></center>";
		
		if($_POST['action'] == "update") {
		
				mysql_query("UPDATE prizes SET clicks = '".$_POST['clicks']."', type = '".$_POST['type']."',commission = '".$_POST['commission']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."' WHERE id='".$_POST['id']."'");

				echo "<font color=red>The prize has been updated.</font><br><br>";
			
		} else if($_POST['action'] == "add") {
		
				mysql_query("INSERT INTO prizes SET clicks = '".$_POST['clicks']."', type = '".$_POST['type']."',commission = '".$_POST['commission']."', points = '".$_POST['points']."',surfcredits = '".$_POST['surfcredits']."', solo_num = '".$_POST['solo_num']."', hheadlinead_num = '".$_POST['hheadlinead_num']."', hheadlinead_views = '".$_POST['hheadlinead_views']."', hheaderad_num = '".$_POST['hheaderad_num']."', hheaderad_views = '".$_POST['hheaderad_views']."', banner_num = '".$_POST['banner_num']."', banner_views = '".$_POST['banner_views']."', featuredad_num = '".$_POST['featuredad_num']."', featuredad_views = '".$_POST['featuredad_views']."', button_num = '".$_POST['button_num']."', button_views = '".$_POST['button_views']."', hotlink_num = '".$_POST['hotlink_num']."', hotlink_views = '".$_POST['hotlink_views']."', login_num = '".$_POST['login_num']."', login_views = '".$_POST['login_views']."', traffic_num = '".$_POST['traffic_num']."', traffic_views = '".$_POST['traffic_views']."', ptc_num = '".$_POST['ptc_num']."', ptc_views = '".$_POST['ptc_views']."', botnav_num = '".$_POST['botnav_num']."', topnav_num = '".$_POST['topnav_num']."'");

				echo "<font color=red>The prize has been added.</font><br><br>";


			
		} else if($_POST['action'] == "delete") {
		
				mysql_query("DELETE FROM prizes WHERE id='".$_POST['id']."'");
				
				echo "<font color=red>The prize has been deleted.</font><br><br>";
			
		}
		
		
		$sql = mysql_query("SELECT * FROM prizes");
		if(@mysql_num_rows($sql)) {
			echo "<table width=\"50%\" border=\"1\" cellpadding=\"5\"><tr><th>Clicks</th><th>Type</th><th>Action</th></tr>";
			
			while($each = mysql_fetch_array($sql)) {
				echo "<tr><td>".$each['clicks']."</td><td>".$each['type']."</td><td align=\"center\"><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"edit\"><input type=\"submit\" value=\"Edit\"></form><form method=\"post\"><input type=\"hidden\" name=\"id\" value=\"".$each['id']."\"><input type=\"hidden\" name=\"action\" value=\"delete\"><input type=\"submit\" value=\"Delete\"></form></td></tr>";
			}
			
			
			echo "</table>";
		}
		
		
			
		
		if($_POST['action'] == "edit") {
			$sql = mysql_query("SELECT * FROM prizes WHERE id='".$_POST['id']."' LIMIT 1");
			
			if(@mysql_num_rows($sql)) {
			$offer = mysql_fetch_array($sql);
		?>
			<h2>Edit</h2>
		
		  <form method="POST">
		  <input type="hidden" name="action" value="update">
		  <input type="hidden" name="id" value="<? echo $offer['id']; ?>">
		  <table width="675">
		   <tr><td># of Clicks Need to Collect Prize:</td><td><input type="text" name="clicks" value="<? echo $offer['clicks']; ?>"></td></tr>
		   <tr><td>Type of clicks:</td><td><input type="radio" name="type" value="htmlad"<? if($offer['type'] == 'htmlad') echo " CHECKED"; ?>> Html <input type="radio" name="type" value="text"<? if($offer['type'] == 'text') echo " CHECKED"; ?>> Text <input type="radio" name="type" value="banner"<? if($offer['type'] == 'banner') echo " CHECKED"; ?>> Banner <input type="radio" name="type" value="button"<? if($offer['type'] == 'button') echo " CHECKED"; ?>> Button <input type="radio" name="type" value="hotlink"<? if($offer['type'] == 'hotlink') echo " CHECKED"; ?>> Hotlink <input type="radio" name="type" value="solo"<? if($offer['type'] == 'solo') echo " CHECKED"; ?>> Solo </td></tr><tr><td>&nbsp;</td><td><input type="radio" name="type" value="traffic"<? if($offer['type'] == 'traffic') echo " CHECKED"; ?>> Traffic <input type="radio" name="type" value="navtop"<? if($offer['type'] == 'navtop') echo " CHECKED"; ?>> Nav Top <input type="radio" name="type" value="navbot"<? if($offer['type'] == 'navbot') echo " CHECKED"; ?>> Nav Bot <input type="radio" name="type" value="ptc"<? if($offer['type'] == 'ptc') echo " CHECKED"; ?>> PTC</td></tr></td></tr></table>
<table width="675">
<tr><td><b>Prize(s) To Win</b></td><td>&nbsp;</td></tr>
		  <tr><td>Points to add:</td><td><input type="text" name="points" value="<? echo $offer['points']; ?>"> points</td></tr>
		  <tr><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="<? echo $offer['surfcredits']; ?>"> surf credits</td></tr>
		  <tr><td>Commissions to add:</td><td>$<input type="text" name="commission" value="<? echo $offer['commission']; ?>"></td></tr>
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
 <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="<? echo $offer['hotlink_num']; ?>"> hotlinks links</td></tr>

		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="<? echo $offer['hotlink_views']; ?>"> views</td></tr>
		  <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="<? echo $offer['login_num']; ?>"> login ads</td></tr>

		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="<? echo $offer['login_views']; ?>"> views</td></tr>
		 <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="<? echo $offer['traffic_num']; ?>"> traffic links</td></tr>
		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="<? echo $offer['traffic_views']; ?>"> views</td></tr>
                                    <tr><td>Top Nav links to add:</td><td><input type="text" name="topnav_num" value="<? echo $offer['topnav_num']; ?>"> links</td></tr>
                                    <tr><td>Bottom Nav links to add:</td><td><input type="text" name="botnav_num" value="<? echo $offer['botnav_num']; ?>"> links</td></tr>
                                   <tr><td>PTC ads to add:</td><td><input type="text" name="ptc_num" value="<? echo $offer['ptc_num']; ?>"> links</td></tr>
		  <tr><td>Views per ptc ad:</td><td><input type="text" name="ptc_views" value="<? echo $offer['ptc_views']; ?>"> views</td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Update"></td></tr>
		  </table>
          </form>
		
		
		
		<?
			} else echo "<font color=red>That promo code doesn't exist anymore.</font><br><br>";
		} else {
		?>
		
			<h2>Add</h2>
		  <form method="POST">
		  <input type="hidden" name="action" value="add">
		  <table width="675">
		   <tr><td># of Clicks Need To Collect Prize:</td><td><input type="text" name="clicks" value="50"></td></tr>
		   <tr><td>Type of clicks:</td><td><input type="radio" name="type" value="htmlad" CHECKED> Html ad <input type="radio" name="type" value="text" CHECKED> Text ad <input type="radio" name="type" value="banner" CHECKED> Banner ad <input type="radio" name="type" value="button" CHECKED> Button ad <input type="radio" name="type" value="hotlink" CHECKED> Hotlink ad <input type="radio" name="type" value="solo"> Solo ad </td></tr><tr><td>&nbsp;</td><td><input type="radio" name="type" value="traffic"> Traffic  <input type="radio" name="type" value="navtop"> Nav Top <input type="radio" name="type" value="navbot"> Nav Bot</td></tr></td></tr></table>
<table width="675">
<tr><td><b>Prize(s) To Win</b></td><td>&nbsp;</td></tr>
		  <tr><td>Points to add:</td><td><input type="text" name="points" value="0"> points</td></tr>
		  <tr><td>Surf Credits to add:</td><td><input type="text" name="surfcredits" value="0"> surf credits</td></tr>
		  <tr><td>Commissions to add:</td><td>$<input type="text" name="commission" value="0.00"></td></tr>
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
		 <tr><td>Hot links to add:</td><td><input type="text" name="hotlink_num" value="0"> hot links</td></tr>
		  <tr><td>Views per hot link:</td><td><input type="text" name="hotlink_views" value="0"> views</td></tr>
		   <tr><td>Login ads to add:</td><td><input type="text" name="login_num" value="0"> login ads</td></tr>
		  <tr><td>Views per login ad:</td><td><input type="text" name="login_views" value="0"> views</td></tr>
		  <tr><td>Traffic links to add:</td><td><input type="text" name="traffic_num" value="0"> traffic links</td></tr>
		  <tr><td>Views per traffic link:</td><td><input type="text" name="traffic_views" value="0"> views</td></tr>
                                   <tr><td>Top Nav links to add:</td><td><input type="text" name="topnav_num" value="0"> links</td></tr> 
                                     <tr><td>Bottom Nav links to add:</td><td><input type="text" name="botnav_num" value="0"> links</td></tr>
                                      <tr><td>PTC to add:</td><td><input type="text" name="ptc_num" value="0"> links</td></tr>
		  <tr><td>Views per ptc ad:</td><td><input type="text" name="ptc_views" value="0"> views</td></tr>
		  <tr><td colspan="2" align="center"><input type="submit" value="Update">  </form></td></tr>
		  </table>
        
		
		<?
		}
		
		
        echo "</td></tr></table>";
    }
else
	echo "Unauthorised Access!";

include "../footer.php";

?>