<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$done = $_POST['done'];
$id = $_POST['id'];
$userid = $_POST["userid"];
$added = $_POST["added"];
$shown = $_POST["shown"];
$approved = $_POST["approved"];
$max = $_POST["max"];
$bannerurl = $_POST["bannerurl"];
$targeturl = $_POST["targeturl"];

if( session_is_registered("alogin") ) {
?>
<table>
      	<tr>
        <td width="15%" valign=top><br>
     <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br>

 <?


    if ($done == "YES") {
				if (empty($targeturl)){
       		?><center><p>No 'targeturl' entered. Click <a href=viewallbanners.php>here</a> to go back<p></center> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($bannerurl)){
       		?><center><p>No 'bannerurl' entered. Click <a href=viewallbanners.php>here</a> to go back<p></center> <?
       		include "../footer.php";
       		exit;
    	}
		                	$query = "update buttons set added='$added', shown='$shown', status='$approved', bannerurl='$bannerurl', targeturl='$targeturl'  where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
    	?>
      		<p><center>Button Banner has been edited, <a href="viewallbuttonss.php">click here</a> to go back.</center></p>
    	<?
    }
     else {
     	$query2 = "select * from buttons where id=".$_GET['id']; ;
    	$result2 = mysql_query ($query2)
	     	or die ("Query2 failed");
    	$line = mysql_fetch_array($result2);
       	$id = $line["id"];
                $bannerurl = $line["bannerurl"];
                $targeturl = $line["targeturl"];
    	?>

    	<center><H2>Edit Button Banner</H2><br>
    	<form method="POST" action="editbutton.php">
    	<img src="<? echo $bannerurl; ?>"><br><br>
    	Target Url:<br>
    	<input type="text" name="targeturl" maxsize="150" value="<? echo $targeturl; ?>"><br><br>
    	Banner Url:<br>
    	<input type="text" name="bannerurl" maxsize="150" value="<? echo $bannerurl; ?>"><br><br>
                <input type="hidden" name="approved" maxsize="1" value=0>
                <input type="hidden" name="added" maxsize="1" value=1><br><br>
    	<input type="hidden" name="id" value="<? echo $id; ?>">
    	<input type="hidden" name="done" value="YES">
    	<input type="submit" value="Save">
    	</form></center>
    	<?
    }
  }
else
  { ?>

  <center><p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p></center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>