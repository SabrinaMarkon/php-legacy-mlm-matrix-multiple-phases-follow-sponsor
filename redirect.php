<?php
include "config.php";

if (is_numeric($_GET['id']) || eregi('^[a-z0-9-]+$', $_GET['tag'])) {

	if (!$_GET['tag']) {

		$sql = "SELECT * FROM `urls` WHERE `id` = '$_GET[id]'";
		mysql_query("UPDATE `urls` SET clicks=clicks+1 WHERE `id` = '$_GET[id]'");

	} else {

		$sql = "SELECT * FROM `urls` WHERE `url_tag` = '$_GET[tag]'";
		mysql_query("UPDATE `urls` SET clicks=clicks+1 WHERE `url_tag` = '$_GET[tag]'");

	}
	$q = mysql_query($sql);

	if(@mysql_num_rows($q)) {
	
		
		$r = mysql_fetch_assoc($q);

		?>

<frameset ROWS="43,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>

<frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="/redirect_top.php?referid=<? echo $r['userid']; ?>">

<frame name="main" src="<? echo $r[url_location]; ?>">

</frameset>

		<?

		
		mysql_close($dblink);
		exit;
	
	}


} 

mysql_close($dblink);
header("Location: $domain");

?>