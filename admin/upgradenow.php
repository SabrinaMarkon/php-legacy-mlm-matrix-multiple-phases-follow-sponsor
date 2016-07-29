<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";

$userid = $_POST['userid'];
$memtype = $_POST['memtype'];
$givematrixposition =  $_POST['givematrixposition'];

if( session_is_registered("alogin") ) {

    	?><table>
      	<tr>
        <td width="15%" valign=top><br>
        <? include("adminnavigation.php"); ?>
        </td>
        <td valign="top" align="center"><br><br> <?
    	echo "<font size=2 face='$fonttype' color='$fontcolour'><p><b><center>";

	       if ($memtype == "SUPER JV") {


            	


				upgrade_superjv($userid);


if ($givematrixposition > 0)
{
$mq = "select * from matrixconfiguration order by id limit 1";
$mr = mysql_query($mq);
$mrows = mysql_num_rows($mr);
if ($mrows > 0)
{
$paychoice = "Added in Admin Area";
$transaction = "Added in Admin Area";
include "../matrixadd.php";
$matrixid = mysql_result($mr,0,"id");
$matrixlevelname = mysql_result($mr,0,"matrixlevelname");
$matrixwidth = mysql_result($mr,0,"matrixwidth");
$matrixdepth = mysql_result($mr,0,"matrixdepth");
$matrixprice = mysql_result($mr,0,"matrixprice");
$matrixpayout = mysql_result($mr,0,"matrixpayout");
$givereentrythislevel = mysql_result($mr,0,"givereentrythislevel");
$cyclecommissionforsponsor = mysql_result($mr,0,"cyclecommissionforsponsor");
$matrixsequence = mysql_result($mr,0,"matrixsequence");
MatrixAdd($userid,$matrixlevelname,$matrixwidth,$matrixdepth,$matrixprice,$matrixpayout,$givereentrythislevel,$matrixsequence,$matrixid,$cyclecommissionforsponsor);
}
}

                echo $userid." has been upgraded successfully.";


	        } elseif ($memtype == "JV MEMBER") {


            	


				upgrade_jv($userid);


				


                echo $userid." has been upgraded successfully.";


	        }


            else {


	            $query3 = "update members set memtype='$memtype' where userid='".$userid."'";


	            $result3 = mysql_query ($query3);


                echo $userid." has been downgraded successfully.";


            }    echo "</td></tr></table>";
  }
else
	echo "Unauthorised Access!";

include "../footer.php";
mysql_close($dblink);
?>