<?php
include "config.php";
include "header.php";
include "style.php";


include "banners.php";
echo "<br><br>";

$query1 = "SELECT * FROM pages WHERE name='Referral Contest'";
$result1 = mysql_query ($query1);

$line1 = mysql_fetch_array($result1);
echo $line1["htmlcode"];

?>
<br><br>

<center>
<?php include "contest_inc.php";?>	
</center>					
 
<font size="3" face="Tahoma" color="<? echo $fontcolour; ?>">

<br><br><br>
<?

include "footer.php";

mysql_close($dblink);
?>
