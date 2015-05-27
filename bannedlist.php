<?php
include "config.php";
include "header.php";
include "style.php";




?>

<center>
<h3>List of banned emails</h3>


<?
$sql = mysql_query("SELECT * FROM banned_emails");
while($each = mysql_fetch_array($sql)) {
	echo $each['email']."<br>";
}


?>

</center>
<br><br>

<?
include "footer.php";
mysql_close($dblink);
?><BR><BR>
</body>

