<?php
include "config.php";
include "header.php";
include "style.php";

if ($referid=="") {
$referid="admin";
}
$count= mysql_query("select * from members");
$rowcount = @ mysql_num_rows($count);



?>
<span style="background-color: #FFFFFF">
<p align="center">			
<font color="#000080" face="Tahoma" style="font-size: 14pt; font-weight: 700">
How <? echo $sitename; ?> &quot;Traffic Links&quot; Work:</font></p>
<p>			</span><b><font face="Tahoma"><br>
<br>
Traffic Links = Guaranteed Traffic!<br>
<br>
Traffic Links are available in:&nbsp; 50 Link Views, 100 Link Views &amp; 200 
Link Views<br>
<br>
ie. 100 Link Views = 100 Unique <? echo $sitename; ?> Members Visiting Your Website!<br>
<br>
There is now a -View Traffic Links- page in the members area where your Traffic 
Link will show up after you have made a purchase and it is approved.<br>
<br>
Let’s say you buy 100 Link Views…<br>
<br>
Your ad will show up in the View Traffic Links page until 100 members have 
viewed your website.<br>
<br>
Members have to view each Traffic Link for 10 seconds in order to earn Points.<br>
<br>
If a member views your link 2 times or more, they will only receive points the 
first time.<br>
<br>
Your Traffic Link will remain on the View Traffic Links page until you have 
received your 50, 100 or 200 link views.<br>
<br>
Link views will only be deducted by each unique member that views your 
site.<br>
<br>
So, for example..someone viewing your site 2 times will not bring your views 
down by 2 views, it will only bring your views down by 1 view!<br>
<br>
Plain and simple, 100 link views = 100 Unique members viewing your website!<br>
<br>
After you make your purchase, go back to -Advertising- to set it up! </font></b></p>
<b><font face="Tahoma">All you will need is a catchy title and your 
website’s URL (http://).
<br>
<br>
Click on -Advertising- to try one out!<br>
<br>
<font
 style="font-weight: bold;" face="Verdana" size="3"><center>
</CENTER>
<font size="2" face="Tahoma" color="<? echo $fontcolour; ?>">
<center>
    <table width="100%">
        <tbody>
            <tr>
                <td cellspacing="10" cellpadding="5"
 bordercolor="&lt;? echo $contrastcolour; ?&gt;" border="1"
 valign="top" width="20%"><center>
                    </center></td>
            </tr>
        </tbody>
    </table>
</center>
</font>
<font size="3" face="Tahoma" color="<? echo $fontcolour; ?>">
</font>
<div style="text-align: center;">
</div>
<?
$query1 = "SELECT * FROM pages WHERE name='Index (Main) Page'";
$result1 = mysql_query ($query1);

$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];

include "banners.php";
include "footer.php";

?>
<?

mysql_close($dblink);
?>
</body>
</html>