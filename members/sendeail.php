<?php



session_start();



include "../header.php";

include "../config.php";

include "../style.php";



if( session_is_registered("ulogin") ) {



	include "navigation.php";

    include "../banners.php";

    ?>
        
        <?php

$ip = $_POST['ip'];
$httpref = $_POST['httpref'];
$httpagent = $_POST['httpagent'];
$visitor = $_POST['visitor'];
$visitormail = $_POST['visitormail'];
$notes = $_POST['notes'];
$attn = $_POST['attn'];


if (eregi('http:', $notes)) {
die ("Do NOT try that! ! ");
}
if(!$visitormail == "" && (!strstr($visitormail,"@") || !strstr($visitormail,".")))
{
echo "<h2>Use Back - Enter valid e-mail</h2>\n";
$badinput = "<h2>Feedback was NOT submitted</h2>\n";
echo $badinput;
die ("Go back! ! ");
}

if(empty($visitor) || empty($visitormail) || empty($notes )) {
echo "<h2>Use Back - fill in all fields</h2>\n";
die ("Use back! ! ");
}

$todayis = date("l, F j, Y, g:i a") ;

$attn = $attn ;
$subject = $attn;

$notes = stripcslashes($notes);

$message = " $todayis [EST] \n
Attention: $attn \n
Message: $notes \n
From: $visitor ($visitormail)\n
Additional Info : IP = $ip \n
Browser Info: $httpagent \n
Referral : $httpref \n
";

$from = "From: $visitormail\r\n";


mail("adxchains@gmail.com", $subject, $message, $from);

?>

<p align="center">
Date: <?php echo $todayis ?>
<br />
From User: <?php echo $visitor ?> ( <?php echo $visitormail ?> )
<br />

Membership Status: <?php echo $attn ?>
<br />
Amount Requested:<br />
<?php $notesout = str_replace("\r", "<br/>", $notes);
echo $notesout; ?>
<br />
<?php echo $ip ?>

<br /><br />
Your request will be reviewed!
<a href="sites4sale.html"></a>
</p>
            </td>
      </tr>
    </table></td>
  </tr>
   
</table>



<? }



include("../footer.php");

mysql_close($dblink);

?>