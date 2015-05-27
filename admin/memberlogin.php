<?php

session_start();

include "../config.php";

$userid = $_GET['userid'];

if( session_is_registered("alogin") ) {

	
	$userinfo=mysql_query ("select * from members where userid='".$userid."'");
	$userrecord=mysql_fetch_array($userinfo);
	
  session_register("ulogin");
  $login = true;
  session_register("uname");
  $_SESSION['uname'] = $userrecord['userid'];
  session_register("pw");
  $_SESSION['pw'] = $userrecord['password'];

  echo '<META HTTP-EQUIV="Refresh" Content="0;URL=/members/tlinkview.php">';

    }

else  {
	echo "Unauthorised Access!";
    }

mysql_close($dblink);
?>