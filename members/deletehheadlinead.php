<?
session_start();

include "../header.php";
include "../config.php";
include "../style.php";


$id = $_POST['id'];

if( session_is_registered("ulogin") )

   	{ 

		include("navigation.php");
        include("../banners.php");
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		
		
	$query1 = "delete from hheadlineads where id='".$id."' and userid='$userid'";
	$result1 = mysql_query ($query1) or die (mysql_error());
		 
		 
	mysql_query("DELETE FROM hheadlineadclicks WHERE hheadlineadid='".$id."'");	 	 
		 
  ?>      
<p><center>The Hot Headline Ad has been deleted. <a href="advertise.php">Click here</a> to go back.</center></p>
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