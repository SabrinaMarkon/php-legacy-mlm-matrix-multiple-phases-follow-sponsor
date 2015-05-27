<?php
session_start();
include "../config.php";


if( session_is_registered("ulogin") ) {

	$sql = mysql_query("SELECT * FROM dailybonus WHERE rented='".date('Y-m-j')."' AND added=1 AND approved=1");
	if(@mysql_num_rows($sql)) {
		mysql_query("UPDATE dailybonus SET clicks=clicks+1 WHERE rented='".date('Y-m-j')."' AND added=1 AND approved=1");
		$info = mysql_fetch_array($sql);
		$bonusurl = $info['url'];
		
	}


		if($userrecord['bonus_viewed']) $top = "bonustop.php?message=".urlencode("You have already received todays BONUS points!");
		else {
		

			$top = "bonustop.php";
			
		}

		

} //end if ($numrows == 1)
else {
	$top = "bonustop.php?message=".urlencode("Invalid click link");
}

mysql_close();
?>

  <frameset ROWS="185,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
  <frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="<? echo $top; ?>">
  <frame name="main" src="<? echo $bonusurl; ?>">
  </frameset>