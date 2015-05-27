<?php
include "../config.php";
include "../header.php";
include "../style.php";
?>

	<center>
	<form method="POST" action="loginnow.php"><br>
	Admin Id:<br><input type="text" name="Adminid" value="Admin"><br>
	Password:<br><input type="password" name="Password" value="admin"><br>
    <input type="submit" value="Login">
	</form>
	</center>

<?

include "../footer.php";

?>