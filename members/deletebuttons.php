<?
session_start();

include "../header.php";
include "../config.php";
include "../style.php";


$id = mysql_real_escape_string($_POST['id']);

if( session_is_registered("ulogin") )

   	{  // members only stuff!

		include("navigation.php");
        include("../banners2.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		
		
	$query1 = "delete from buttons where id='".$id."' and userid='$userid'";
	$result1 = mysql_query ($query1)
	     or die ("Delete from 'buttons' failed");
		 
	$query1 = "delete from button_clicks where bannerid='".$id."'";
	$result1 = mysql_query ($query1)
	     or die ("Delete from 'banner_clicks' failed");

  ?>      
<p><center>The button ad has been deleted. <a href="advertise.php">Click here</a> to go back.</center></p>
<?
		
		
        echo "</font></td></tr></table>";
    }
else
  { ?>

  <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>

  <? }

include "../footer.php";
mysql_close($dblink);

?>