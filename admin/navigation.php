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

	$query = "SELECT distinct * FROM navigation order by seq";
	$result = mysql_query ($query)
	     or die ("Query failed");

    ?> <center>
    <p>These are the navigations that are shown in the members area. You can add new navigations here or set these to inactive.</p>
    <a href="addnav.php?<? echo $userid; ?>">Add Navigation</a></center><br><br> <?
    echo "<table width=100% border=0 cellpadding=2 cellspacing=2>";

    ?>
  		<tr>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Name</font></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Url</font></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Status</font></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Sequence</font></td>
		  <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Membership</font></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Edit</font></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Change Status</font></td>
        </tr>
    <?

    while ($line = mysql_fetch_array($result)) {
		$name = $line["name"];
        $url = $line["url"];
	    $status = $line["status"];
        $index = $line["id"];
        $seq = $line["seq"];
		$memtype = $line["memtype"];

        // to be completed!
        ?>
  		<tr>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $name; ?></font></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $url; ?></font></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $status; ?></font></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo $seq; ?></font></td>
		  <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><? echo ucfirst($memtype); ?></font></td>
          <td bgcolor="<? echo $basecolour; ?>" valign="middle" align="center"><br>
          <form method=POST action=editnavigation.php>
          <input type="hidden" name="index" value="<? echo $index; ?>">
          <input type="hidden" name="name" value="<? echo $name; ?>">
          <input type="hidden" name="url" value="<? echo $url; ?>">
          <input type="hidden" name="seq" value="<? echo $seq; ?>">
		  <input type="hidden" name="memtype" value="<? echo $memtype; ?>">
          <input type="submit" value="Edit">
          </form></td>
          <? if ($status == "ON") { ?>
          		<td bgcolor="<? echo $basecolour; ?>" valign="middle" align="center"><br>
          		<form method=POST action=changesetting.php>
          		<input type="hidden" name="index" value="<? echo $index; ?>">
                <input type="hidden" name="status" value="OFF">
          		<input type="submit" value="Set Off">
          		</form></td>
          <? } if ($status == "OFF") { ?>
          		<td bgcolor="<? echo $basecolour; ?>" valign="middle" align="center"><br>
          		<form method=POST action=changesetting.php>
          		<input type="hidden" name="index" value="<? echo $index; ?>">
                <input type="hidden" name="status" value="ON">
          		<input type="submit" value="Set On">
          		</form></td>
          <? } ?>
        </tr>
        <?
     }
    ?>
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