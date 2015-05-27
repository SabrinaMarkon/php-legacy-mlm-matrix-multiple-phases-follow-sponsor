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

<table align="center"><tr><td>

<?

         $query = "SELECT * FROM pages where name='Prizes'";
		$result = mysql_query ($query)
			or die ("Query failed");
		while ($line = mysql_fetch_array($result)) {
			$htmlcode = $line["htmlcode"];
			echo $htmlcode;

 	}

?>
</td></tr></table><br><br><br>
<?

 	}

else

  { ?>



  <font size=3 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></b></font>



  <? }



include "../footer.php";

mysql_close($dblink);

?>