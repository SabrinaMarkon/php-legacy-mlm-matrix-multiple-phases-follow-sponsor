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


if($action == "Doedit") {
		if($surfnamep == "") $error[] = "ERROR. Surf Name can not be empty.";
		if($surfurlp == "") $error[] = "ERROR. Surf URL can not be empty.";
		elseif (substr($surfurlp, 0,7)!= 'http://') $error[] = "ERROR. You must put a valid url.";
		if(count($error) ==0){
			$udextra = ($surfurloldp != $surfurlp) ? " ,surfurl='$surfurlp', surfview='0', surfclicks='0', approved='0' " : '';
			mysql_query("UPDATE surfurls SET surfname='$surfnamep' $udextra WHERE id='".$_POST['id']."'");
			$surfnamep="";
			$surfurlp="";
			$surfurloldp="";
			echo "<center><p><b>The surf url has been edited.</b></p></center>";
		}else{
			echo "<center><p><b><font color=red>".join('<br>',$error)."</font></b></p></center>";
			$error = array();
		}
	}else {
		$sql = mysql_query("SELECT * FROM surfurls WHERE id='".$_GET['id']."'");
		if(@mysql_num_rows($sql)) {
			$info = mysql_fetch_array($sql);

			?>
			

			  <center>
			  <h3>Edit Suft Page</h3>
			  <form method="POST">
			  <br>
<P align="center"><br>
	      <center><h3><font color=#000080>Check Your URLS for Frame Breaking Before You Send Them Out!</font></h3></center>

<center><FORM NAME='urtotest' target="_blank" ACTION='sitecheck.php' METHOD='GET' ><input type='text' value="http://" size="50" name='url' /><input type='submit' value='Check URL' /><br></FORM></center>			  
<p>URL:<br><input name="surfurlp" size="65" maxlength="255" value="<? echo $info['surfurl']; ?>"></p>
<p>Name:<br><input name="surfnamep" size="65" maxlength="15" value="<? echo $info['surfname']; ?>"></p>
			  <br>
			  <input type="hidden" name="surfurloldp" value="<? echo $info['surfurl']; ?>">
			  <input type="hidden" name="action" value="Doedit">
			  <input type="hidden" name="id" value="<? echo $info['id']; ?>">
			  <input type="submit" value="Edit Surf Page"></p>
			  </form></center>
			
			
			
			<?
		} else echo "<p><font color=\"red\"><b>Invalid Surf Page.</b></font></p>";
    }
  }
else
  { ?>

  <center><p>You must be logged in to access this site. Please <a href="../login.php">click here</a> to login.</p></center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>