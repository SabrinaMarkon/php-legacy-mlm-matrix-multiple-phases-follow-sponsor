<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
{ // members only stuff!

include("navigation.php");
include("../banners2.php");

echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
?>
<font size=6>Viral Url Cloaker</font><br>
<?


if($_POST['action'] == "delete") {

	mysql_query("DELETE FROM urls WHERE userid = '".$userid."' AND id = '".$_POST['id']."'");
	echo '<font color=red>The link has been deleted.</font><br><br>';

}

if($_POST['action'] == "reset") {

	mysql_query("UPDATE urls SET clicks = 0 WHERE userid = '".$userid."' AND id = '".$_POST['id']."'");
	echo '<font color=red>The hits are back to 0.</font><br><br>';

}


$uuq = mysql_query("SELECT * FROM urls WHERE userid = '".$userid."'");
$uuc = @mysql_num_rows($uuq);


if($memtype == "PRO") $maxurls = $prourls;
if($memtype == "SUPER JV") $maxurls = $superjvurls;
else $maxurls = $jvurls;

if($_POST['action'] == "generate" AND $uuc >= $maxurls) {

	echo '<font color=red>Sorry but you reached the maximum of '.$maxurls.' links.</font><br><br>';

} elseif($_POST['action'] == "generate") {

	$parsed = @parse_url($_POST['url']);

	if ($parsed && strlen($_POST['url']) && ereg('\.', $_POST['url'])) {

		if (eregi('^[a-z0-9-]+$', $_POST['tag'])) {

			$tag = $_POST['tag'];

			
			$sql = "SELECT * FROM `urls` WHERE `url_tag` = '$tag' OR `id` = '$tag'";

			$q = mysql_query($sql);

			$n = mysql_fetch_assoc($q);

			if ($n) {
				$cancel = true;
			}

		}



		if (!$cancel) {


			$url = ($parsed['scheme'] ? '' : 'http://') . $_POST['url'];
	
			$sql = "INSERT INTO `urls` (`url_location`, `url_tag`, `userid`) VALUES ('$url', '$_POST[tag]', '".$userid."')";
			$q = mysql_query($sql);
			$id = mysql_insert_id();
			
			$uuq = mysql_query("SELECT * FROM urls WHERE userid = '".$userid."'");
			$uuc = @mysql_num_rows($uuq);

			if (!$tag) {

				$result = '<font color=red>Here is your <strong>new URL!</strong>: <a href="'.$domain.'/link/'.$id.'/" target=_blank">'.$domain.'/link/'.$id.'</a></font><br><br>';

			} else {
				$result = '<font color=red>Here is your <strong>new URL!</strong>: <a href="'.$domain.'/link/'.$tag.'/" target=_blank">'.$domain.'/link/'.$tag.'</a></font><br><br>';

			}

		} else {

			if (ereg('^[0-9]+$', $_POST['tag'])) {

				$result = '<font color=red>That tag is reserved for the system!</font><br><br>';

			} else {
				$result = '<font color=red>Tag unavailable!</font><br><br>';

			}

		}

	} else {

		$result = '<font color=red>Put in a <strong>real URL</strong> please!</font><br><br>';

	}

	echo $result;
			
}

?>
<h3>Your links</h3>
You can have a maximum of <? echo $maxurls; ?> links.<br>
<?

if($uuc) {
	echo "<table width=\"70%\" border=\"1\"><tr align=\"center\"><td><b>Real url<b></td><td><b>Cloaked url<b></td><td><b>Hits<b></td><td><b>Action<b></td></tr>";
	while($each = mysql_fetch_array($uuq)) {
	
		if($each['url_tag']) $link = $domain."/link/".$each['url_tag'];
		else $link = $domain."/link/".$each['id'];
		
		echo "<tr align=\"center\"><td><a href=\"".$each['url_location']."\" target=\"_blank\">".$each['url_location']."</a></td><td><a href=\"".$link."\" target=\"_blank\">".$link."</a></td><td>".$each['clicks']."</td><td>
		<form method=\"post\">
		<input type=\"hidden\" name=\"action\" value=\"delete\">
		<input type=\"hidden\" name=\"id\" value=\"".$each['id']."\">
		<input type=\"submit\" value=\"Delete\">
		</form>
		<form method=\"post\">
		<input type=\"hidden\" name=\"action\" value=\"reset\">
		<input type=\"hidden\" name=\"id\" value=\"".$each['id']."\">
		<input type=\"submit\" value=\"Reset hits\">
		</form>
		</td></tr>";
	}

	echo "</table>";
} else {
	echo "<br>You don't have any link currently.";
}
?>

<br><br>

<?
if($uuc < $maxurls) {
?>
<h3>Create link</h3>

<form method="post">

	<input type="hidden" name="action" value="generate">

	<label for="url">Step 1: Put your URL in the box below</label><br>

	<input type="text" name="url" id="url" class="input"><br>


	<label for="tag">Step 2: Use a custom tag if you 

	would like and put it in the box below (must be all lower case letters)</label><br>

	<input name="tag" id="tag" class="input" style="font-weight: 700"><br><br>
	
	<input type="submit">
	
</form>
<br><br>

<?
}




echo "</font></td></tr></table></font>";
}

else
{ ?>

</p>

<font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>

<? }

include "../footer.php";
mysql_close($dblink);
?>