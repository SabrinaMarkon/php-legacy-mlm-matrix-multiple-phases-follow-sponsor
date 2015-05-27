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
    echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
    ?>
    <table width=70% border=0 cellpadding=2 cellspacing=2>


  		<tr>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Url</font></center></td>
          <td bgcolor="<? echo $contrastcolour; ?>"><center><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">Referrals</font></center></td>
        </tr>
    <?
	
	$sql = mysql_query("SELECT referrer FROM members WHERE referrer != ''");
	$sites = array();
	while($each = mysql_fetch_array($sql)) {
	$url = parse_url($each['referrer']);
	$url = str_replace("www.","",$url['host']);
		$sites[$url]++;
	}
	
	arsort($sites);
	
	//$count = 0;
    foreach($sites as $url => $referrals) {
	
		//if($count == 30) break;
		//$count++;

        ?>
  		<tr>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $url; ?></font></center></td>
          <td bgcolor="<? echo $basecolour; ?>"><font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><center><? echo $referrals; ?></font></center></td>
        	</tr>
        <? }
     echo "</table></td></tr></table>";
  	}
else  {
	echo "Unauthorised Access!";
    }

include "../footer.php";
mysql_close($dblink);
?>