<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {
    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
    echo "<table>";
    $query = "select * from advertise";
	$result = mysql_query ($query)
	     or die ("Query failed");
	while ($line = mysql_fetch_array($result)) {
        $bannerurl = $line["bannerurl"];
        $index = $line["id"];
    ?>
    <tr>
        <td><center><img src="<? echo $bannerurl; ?>"><br>
        <form action="deletebanner.php" method="POST">
        <input type="hidden" name="index" value="<? echo $index; ?>">
        <input type="submit" value="delete">
        </form><br>
        </center>
        </td>
    </tr>
    <?
  	}
    echo "</table>";
    ?>
    <table>
    <tr>
    <td><center>
    <b>Add a Banner</b>
    <form method="POST" action="addbanner.php">
    Name:<br><input type="text" name="name" value=""><br>
    Banner Url:<br><input type="text" name="url" value=""><br><br>
    <input type="submit" value="Add"></center>
    </form>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    <?
    }
else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>