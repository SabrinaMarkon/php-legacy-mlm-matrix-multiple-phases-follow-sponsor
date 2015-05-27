<?php
## page thanking buyer for a purchase after payment.
include "config.php";
include "header.php";
include "style.php";
?>
<table cellpadding="0" cellspacing="0" border="0" align="center" width="90%">
<tr><td align="center" colspan="2"><div class="heading">Thank You For Your Purchase!</div></td></tr>
<tr><td colspan="2"><br>
<div style="text-align: center;">
<?php
$query1 = "select * from pages where name='Thank-You Page After a Position is Purchased'";
$result1 = mysql_query($query1);
$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];
include "banners.php";
echo $htmlcode;
?>
</div> 
</td></tr>
</table>
<?php
include "footer.php";
?>