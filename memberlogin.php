<?php
include "config.php";
include "header.php";
include "style.php";

if ($referid=="") {
$referid="admin";
}
$count= mysql_query("select * from members where verified=1");
$rowcount = @ mysql_num_rows($count);



?><font size=4>
<font face="Verdana">
<br>
</font>
<div style="text-align: center;">
<p align="center">Member Count: <? echo $rowcount; ?></p>


<?
$query1 = "SELECT * FROM pages WHERE name='Index (Main) Page'";
$result1 = mysql_query ($query1);

$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];

include "banners.php";
?>
<center>

<p align="center"><font size="4">Member Login</font><br><br>
Cookies Must Be Enabled To Use This Site<p align="center">

	      	<FORM style="border: 0px dotted red; padding: 2px" method="POST" action="login.php">
					        Username:<br>
            <input type="text" name="userid" value="demomember">
<br>Password:<br></font>
            <font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
            	<font color="#000000"><font face="Verdana"><input type="password" name="password" value="demopass"></font><font size="2" color="<? echo $fontcolour; ?>"><br>
            </font>
            <font size="2" face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>">
	      	<input type="submit" name="login" value="Login">
	        </font>
	        </font>
	        		        </form><BR><a href="forgot.php">Forgot your password?</a><BR><BR></font>

			<?
$query1 = "SELECT * FROM pages WHERE name='Index (Main) Page'";
$result1 = mysql_query ($query1);

$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];

include "banners.php";
?><BR><BR>
<?
include "footer.php";
?>

                    </center>
            </tr>
        </table>
   </center>
<?

mysql_close($dblink);
?></body></html>