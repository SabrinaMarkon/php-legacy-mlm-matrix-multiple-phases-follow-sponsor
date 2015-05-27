<?php
session_start();
include "../header.php";
include "../config.php";
include "../style.php";
?>
<head>
<link rel="stylesheet" href="../jscripts/colorpicker/js_color_picker_v2.css" media="screen">
<script type="text/javascript" src="../jscripts/colorpicker/color_functions.js"></script>
<script type="text/javascript" src="../jscripts/colorpicker/js_color_picker_v2.js"></script>
</head>
<?
$done = $_POST['done'];
$id = $_POST['id'];
$subject = $_POST['subject'];
$url = $_POST['url'];
$color = $_POST['textcolor'];
$bgcolor = $_POST['bgcolor'];
$bold = $_POST['bold'];

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

    if ($done == "YES") {

		if (empty($subject)){
       		?><p>No subject line entered. Click <a href=addhheadlinead.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}

		if (empty($url)){
       		?><p>No url entered. Click <a href=addhheadlinead.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}

    	$query = "update hheadlineads set title='$subject', url='$url', color='$color', bgcolor='$bgcolor', bold='$bold', added=1, approved=0 where id=".$id;
    	$result = mysql_query ($query) or die (mysql_error());
    	?>
      		<p><center>Thank you, your Hot Headline Ad has been submitted to admin for approval. <a href="advertise.php">Click here</a> to go back.<br><br><strong>Your own ad is not visible to yourself. <br> You can keep track of the displays and clicks on the Advertising page.</strong> </p></center>
    	<?
    }

    else {
    	$query = "SELECT * FROM hheadlineads where added=0 and userid='".$_SESSION[uname]."' limit 1";
		$result = mysql_query ($query) or die (mysql_error());
    	while ($line = mysql_fetch_array($result)) {
            $id = $line["id"];
            $subject = $line["subject"];
            $url = $line["url"];
            ?>

             <center><H2>Add your Hot Headline Ad</H2>
			  <div style="padding: 0px 20px 0px 20px;">

			</div>
              <form method="POST">
              Subject Line:<br>
              <input type="text" name="subject" maxlength="50"><br>
              Url:<br>
              <input type="text" name="url" maxsize="70" value="http://"><br>

<br>
	Background Color: <input type="text" size="10" maxlength="7" name="bgcolor">&nbsp;<input type="button" value="Pick Color" onclick="showColorPicker(this,document.forms[0].bgcolor)">
<br><br>
	Text Color: <input type="text" size="10" maxlength="7" name="textcolor">&nbsp;<input type="button" value="Pick Color" onclick="showColorPicker(this,document.forms[0].textcolor)">
<br><br>	
	Bold&nbsp;
<input type="radio" name="bold" value="1"> Yes <input type="radio" name="bold" value="1" CHECKED> No<br>		  	  
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
			  <p><b>Please double check your Hot Headline Ad, as it cannot be edited once submitted.</b></p>
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