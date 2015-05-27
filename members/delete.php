<?php

session_start();


include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");

		?>
        <center>
        <p><b>Deleting your account will be permanent!<b></p>
        <p>Your banners and solo ads will be deleted as well.</p>
        <p>Please click 'Delete Now' to proceed.</p>
        <form method="POST" action="deletenow.php">
        <input type=submit value="Delete Now">
        </center>
        <?

        echo "</td></tr></table>";

	}

else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>