<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$id = $_POST['id'];


if (isset($_POST['action'])) {
   $action = $_POST['action'];
}

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
	

    if ($action == "send") {
	
		$url = $_POST['url'];
		
		if (empty($url)){
       		?><p>No url entered. Click <a href=adddailybonus.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		

    	$query = "update dailybonus set added=1, approved=0, url='$url' where id=".$id;
		
    	$result = mysql_query ($query)
	     	or die ("Query failed");
			
		
    	?>
      		<p><center>Your daily bonus link has been set up. <a href="advertise.php">Click here</a> to go back.</center></p><BR><BR>
					
    	<?
		
		
		
		
	} else {
	
	

	
	//daily bonus available

	$query = "SELECT * FROM dailybonus where added=0 and userid='".$_SESSION[uname]."' ORDER BY rented DESC limit 1";

	$result = mysql_query ($query)

		or die ("Query failed");

	while ($line = @mysql_fetch_array($result)) {

	
			echo "<br><font color=red><b><u>Your daily bonus will be shown on ".$line['rented']."!</u></b></font><br><br><br>";
		

		
		
			$id = $line["id"];
            $subject = $line["subject"];
            $adbody = $line["adbody"];
            ?>
              <center><H2>Add your daily bonus link</H2>

			  <form method="POST">
			  Ad URL:<br>
              <input type="text" name="url" maxsize="1250"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="action" value="send">
			  <br>
              <input type="submit" value="Send">
              </form></center>
            <?
    	}
    }
    echo "</td></tr></table>";
  }
else
  { ?>

  <p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>