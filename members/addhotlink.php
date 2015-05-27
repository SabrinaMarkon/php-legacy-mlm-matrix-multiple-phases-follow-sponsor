<?php



session_start();



include "../header.php";

include "../config.php";

include "../style.php";



$done = $_POST['done'];

$id = $_POST['id'];
$subject = $_POST['subject'];
$url = $_POST['url'];



if( session_is_registered("ulogin") ) {



    include("navigation.php");

    include("../banners2.php");

    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

    if ($done == "YES") {
	
	

		if (empty($subject)){

       		?><p>No subject line entered. Click <a href=addhotlink.php>here</a> to go back<p> <?

       		include "../footer.php";

       		exit;

    	}

		if (empty($url)){

       		?><p>No url entered. Click <a href=addhotlink.php>here</a> to go back<p> <?

       		include "../footer.php";

       		exit;

    	}


		

		//$url = mysql_real_escape_string($url);

		//$name = mysql_real_escape_string($name);




    	$query = "update hotlinks set subject='$subject', url='$url', added=1, approved=0 where id=".$id;

    	$result = mysql_query ($query)

	     	or die ("Query failed");

    	?>

      		<p><center>Your hotlink has been submitted for approval. <a href="advertise.php">Click here</a> to go back.</p></center>

    	<?

    }

    else {

    	$query = "SELECT * FROM hotlinks where added=0 and userid='".$_SESSION[uname]."' limit 1";

		$result = mysql_query ($query)

			or die ("Query failed");

    	while ($line = mysql_fetch_array($result)) {

            $id = $line["id"];

            $subject = $line["subject"];

            $url = $line["url"];

            ?>



              <center><H2>Add your Hotlink</H2>

			  <div style="padding: 0px 20px 0px 20px;">
			  
<font size=2><BR>
				


Hotlinks Rotate at the Top of Credit Link Pages on all  Solo Ads, Banner Ads, Html Ads & Text Ads .. <br><br>

<b>1 Hotlink Impression = 1 Display. <BR> </b>
 
<P align="center"><br>
	      <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before
You Send Them Out!</font></h3></center>

<center><h3><font color=#000080>Protect Your Membership By Using the Tool
Below! <br>

(Opens in New Window)</font></h3></center>

<center>
<FORM NAME='urtotest' target="_blank" ACTION='sitecheck.php'
METHOD='GET' >

<input type='text' value="http://" size="50" name='url' />

<input type='submit' value='Check URL' />
<br>
</FORM>
</center><p>
Add Your Hotlink (Maximum 30 Characters including spaces)
</font><br><br>



			</div>

              <form method="POST" action="addhotlink.php">

              Subject Line:<br>

              <input type="text" name="subject" maxlength="50"><br>

              Url:<br>

              <input type="text" name="url" maxsize="70" value="http://"><br>

              <input type="hidden" name="id" value="<? echo $id; ?>">

              <input type="hidden" name="done" value="YES">

			  <p><b>Please double check your Hotlink, as it cannot be edited once submitted.</b></p>

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