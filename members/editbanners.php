<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$name = $_POST['name'];
$id = $_POST['id'];
$bannerurl = $_POST['bannerurl'];
$targeturl = $_POST['targeturl'];
$status = $_POST['status'];
$done = $_POST['done'];


if( session_is_registered("ulogin") ) {
    include("navigation.php");
    include("../banners2.php");

    if ($done == "YES") {
		if (empty($name)){
       		?><center><p>No name entered. Click <a href=advertise.php>here</a> to go back<p></center> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($targeturl)){
       		?><center><p>No target url entered. Click <a href=advertise.php>here</a> to go back<p></center> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($bannerurl)){
       		?><center><p>No banner url entered. Click <a href=advertise.php>here</a> to go back<p></center> <?
       		include "../footer.php";
       		exit;
    	}

    	$query = "update banners set name='$name', targeturl='$targeturl', bannerurl='$bannerurl', added=1, status=0 where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
    	?>
      		<p><center>Your banner has been sent back to queue for approval, <a href="advertise.php">click here</a> to go back.</center></p>
    	<?
    }
    else {
    	?>
    	<center><H2>Edit banner</H2><br>
    	<form method="POST" action="editbanners.php">
    	Banner Name:<br>
    	<input type="text" name="name" maxsize="30" value="<? echo $name; ?>"><br>
    	Banner Url:<br>
    	<input type="text" name="bannerurl" maxsize="70" value="<? echo $bannerurl; ?>"><br>
    	Target Url:<br>
    	<input type="text" name="targeturl" maxsize="70" value="<? echo $targeturl; ?>"><br><br>
    	<input type="hidden" name="id" value="<? echo $id; ?>">
               	<input type="hidden" name="done" value="YES">
    	<input type="submit" value="Save">
    	</form></center>
    	<?
    }
  }
else
  { ?>

  <center><p>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</p></center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>