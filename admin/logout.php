<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

if( session_is_registered("alogin") ) {

    session_unset();
    session_destroy();
    ?> <p>You are logged out now. Click <a href=login.php>here</a> to log back in!</p> <?
  }
else  {
	?> <p>You are already logged out. Click <a href=login.php>here</a> to login!</p> <?
    }

include "../footer.php";

?>