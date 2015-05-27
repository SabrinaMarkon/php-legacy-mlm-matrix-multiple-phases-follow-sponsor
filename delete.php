<?php
include "config.php";
include "header.php";
include "style.php";
include "banners.php";


if(!$_GET['userid'] OR !$_GET['code']) {
	echo "Invalid link.";
} else {

	?>
			<center>
			<br><br>
	<?

	$userid = $_GET['userid'];
	$code = $_GET['code'];

	$sql = mysql_query("SELECT * FROM members WHERE userid = '$userid'");
	$info = mysql_fetch_array($sql);

	if($code == md5($info['pword'])) {

		if($_GET['delete']) {
			mysql_query("DELETE FROM members WHERE userid = '$userid'");
	?>
		Your account has been succesfully deleted.
	<?
		} else {
			?>
			

			Are you sure you want to cancel your <? echo $sitename; ?> account?  If you continue you will no longer have access to your account "<? echo $userid; ?>",<br> you will lose your downline, and will lose all commissions. 
			
			<br><br>
			
			<form action="delete.php">
			<input type="hidden" name="userid" value="<? echo $userid; ?>">
			<input type="hidden" name="code" value="<? echo $code; ?>">
			<input type="submit" name="delete" value="Yes">
			</form>
			
			<form action="index.php">
			<input type="submit" value="No">
			</form>

			<?
		}

	} else echo "Invalid link.";

}

?>
		<br><br>
		</center>
<?

include "footer.php";
mysql_close($dblink);
?>