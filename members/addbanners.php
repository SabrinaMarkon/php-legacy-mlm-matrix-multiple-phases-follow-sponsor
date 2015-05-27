<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

$done = $_POST['done'];
$name = $_POST['name'];
$id = $_POST['id'];
$targeturl = $_POST['targeturl'];
$bannerurl = $_POST['bannerurl'];

if( session_is_registered("ulogin") ) {

    include("navigation.php");
    include("../banners2.php");
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    echo "<center><H2>Banner setup</H2></center><br>";
    if ($done == "YES") {
		if (empty($name)){
       		?><p>No name entered. Click <a href=addbanners.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($targeturl)){
       		?><p>No target url entered. Click <a href=addbanners.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}
		if (empty($bannerurl)){
       		?><p>No banner url entered. Click <a href=addbanners.php>here</a> to go back<p> <?
       		include "../footer.php";
       		exit;
    	}

    	$query = "update banners set name='$name', targeturl='$targeturl', bannerurl='$bannerurl', added=1 where id=".$id;
    	$result = mysql_query ($query)
	     	or die ("Query failed");
    	?>
      		<center><p>Your banner has been set up, <a href="advertise.php">click here</a> to go back.</p></center>
    	<?
    }
    else {

        //first check whether there are existing ads in the database....
        $query3 = "select * from banners where added=1 and userid='".$_SESSION[uname]."'";
        $result3 = mysql_query ($query3)
			or die ("Query failed");
        $numrows = @ mysql_num_rows($result3);
        if ($numrows == 0) {
        	$existing = 0;
        }
        else {
        	$existing = 1;
        }
        //*********************

    	$query = "SELECT * FROM banners where added=0 and userid='".$_SESSION[uname]."' limit 1";
		$result = mysql_query ($query)
			or die ("Query failed");

    	while ($line = mysql_fetch_array($result)) {
        	$name = $line["name"];
            $id = $line["id"];
            $targeturl = $line["targeturl"];
            $bannerurl = $line["bannerurl"];

        		if ($existing == 1) { ?><center>
	                <p><b>To add your credits to an existing campaign:</b></p>
	                   <form method="POST" action="addbannerexisting.php">
	                   <select name="name">
	                <?
                        $query2 = "select * from banners where added=1 and userid='".$_SESSION[uname]."'";
        				$result2 = mysql_query ($query2)
							or die ("Query failed");
	                    while ($line2 = mysql_fetch_array($result2)) {
	                         $name = $line2["name"];
                             $oldid = $line2["id"];
                             ?>
	                         <option value="<? echo $oldid; ?>"><? echo $name; ?></option>
	                         <?
	                    }
	                ?>
	                </select>
                    <input type="hidden" name="id" value="<? echo $id; ?>">
	                <input type="submit" value=" Add "><br><br>
	                </form></center>
                <? }

            ?><center><br>
              <p><b>Set up a new campaign:</b></p>
              <form method="POST" action="addbanners.php">
              Banner Name:<br>
              <input type="text" name="name" maxsize="30"><br>
              Banner Url:<br>
              <input type="text" name="bannerurl" maxsize="70"><br>
              Target Url:<br>
              <input type="text" name="targeturl" maxsize="70"><br>
              <input type="hidden" name="id" value="<? echo $id; ?>">
              <input type="hidden" name="done" value="YES">
             <SCRIPT LANGUAGE="JavaScript">
	                    function previewad(bannerurl,targeturl)
	                    {
	                    var win
	                    win = window.open("", "win", "height=68,width=500,toolbar=no,directories=no,menubar=no,scrollbars=yes,resizable=yes,dependent=yes'");
	                    win.document.clear();
						win.document.write('<a href="'+targeturl+'"><img src="'+bannerurl+'" border="0"></a>');
	                    win.focus();
	                    win.document.close();
	                    }
	                    </SCRIPT>
	                    <INPUT TYPE="button" class="form-button" value=" Preview Banner " onClick="previewad(bannerurl.value, targeturl.value)">
              <input type="submit" value="Save">
              </form></center>
                        <?
    	}

    }
    echo "</td></tr></table>";
  }
else
  { ?>

  <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>

  <? }

include "../footer.php";
mysql_close($dblink);
?>