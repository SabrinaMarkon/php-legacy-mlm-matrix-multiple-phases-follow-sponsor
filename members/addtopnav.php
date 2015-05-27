<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$done = $_POST['done'];
$id = $_POST['id'];
$name = $_POST['name'];
$targeturl = $_POST['targeturl'];



if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    if ($done == "YES") {
	
	

		if (empty($name)){

       		?><p>No name entered. Click <a href=addtopnav.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;

    	}

		if (empty($targeturl)){

       		?><p>No url entered. Click <a href=addtopnav.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;

    	}
		
		//$url = mysql_real_escape_string($url);
		//$name = mysql_real_escape_string($name);
		

    	$query = "update topnav set name='$name', targeturl='$targeturl', added=1, status=0 where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");

    	?>

      		<p><center>Your Top Navigation Link has been submitted to added to queue for appproval. <a href="advertise.php">Click here</a> to go back.</p></center>

    	<?

    }
    else {

    	$query = "SELECT * FROM topnav where added=0 and userid='".$_SESSION[uname]."' limit 1";
		$result = mysql_query ($query)
			or die ("Query failed");

    	while ($line = mysql_fetch_array($result)) {

            $id = $line["id"];
            $name = $line["name"];
            $targeturl = $line["targeturl"];

            ?>


              <center><H2>Add your top navigation link</H2><br>Text for link cannot be longer than 20 characters including spaces.
				<font style="font-weight: bold">
              <form method="POST" action="addtopnav.php">
              Text:<br>
              <input type="text" name="name" maxlength="20"><br>
              Url:<br>
              <input type="text" name="targeturl" value="http://"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
			  <p>Please double check your link, as it cannot be edited once submitted.</p>
              <input type="submit" value="Save">
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