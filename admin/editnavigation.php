<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
$index = $_POST['index'];
$name = $_POST['name'];
$url = $_POST['url'];
$seq = $_POST['seq'];
$memtype = $_POST['memtype'];

if( session_is_registered("alogin") ) {
    ?>
    	<table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";
     ?>
    <p>Edit members area navigation (<? echo $name; ?>):</p>
    <form method="POST" action="editnavigationnow.php">
    <input type="hidden" name="index" value=<? echo $index; ?>>
    <input type="text" name="name" value="<? echo $name; ?>"><br>
    <input type="text" name="url" value=<? echo $url; ?>><br>
    <input type="text" name="seq" value=<? echo $seq; ?>><br>
	
	<input type="radio" name="memtype" value=""<? if($memtype=="") echo " CHECKED"; ?>> All
	<input type="radio" name="memtype" value="FREE"<? if($memtype=="FREE") echo " CHECKED"; ?>> Free
	<input type="radio" name="memtype" value="PRO"<? if($memtype=="PRO") echo " CHECKED"; ?>> Pro
	
    <input type="submit" value="Save">
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