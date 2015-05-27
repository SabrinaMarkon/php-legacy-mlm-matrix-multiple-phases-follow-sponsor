<?php
include "config.php";
include "header.php";
$ip=$_SERVER["REMOTE_ADDR"];
$new_userid = $_POST['new_userid'];
$new_password = $_POST['new_password'];
$new_passwordv = $_POST['new_passwordv'];
$new_fullname = $_POST['new_fullname'];
$new_lastname = $_POST['new_lastname'];
$new_contact = $_POST['new_contact'];
$new_country = $_POST['new_country'];

function ae_gen_password($syllables = 3, $use_prefix = false)
{

    // Define function unless it is already exists
    if (!function_exists('ae_arr'))
    {
        // This function returns random array element
        function ae_arr(&$arr)
        {
            return $arr[rand(0, sizeof($arr)-1)];
        }
    }

    // 20 prefixes
    $prefix = array('aero', 'anti', 'auto', 'bi', 'bio',
                    'cine', 'deca', 'demo', 'dyna', 'eco',
                    'ergo', 'geo', 'gyno', 'hypo', 'kilo',
                    'mega', 'tera', 'mini', 'nano', 'duo');

    // 10 random suffixes
    $suffix = array('dom', 'ity', 'ment', 'sion', 'ness',
                    'ence', 'er', 'ist', 'tion', 'or'); 

    // 8 vowel sounds 
    $vowels = array('a', 'o', 'e', 'i', 'y', 'u', 'ou', 'oo'); 

    // 20 random consonants 
    $consonants = array('w', 'r', 't', 'p', 's', 'd', 'f', 'g', 'h', 'j', 
                        'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm', 'qu');

    $password = $use_prefix?ae_arr($prefix):'';
    $password_suffix = ae_arr($suffix);

    for($i=0; $i<$syllables; $i++)
    {
        // selecting random consonant
        $doubles = array('n', 'm', 't', 's');
        $c = ae_arr($consonants);
        if (in_array($c, $doubles)&&($i!=0)) { // maybe double it
            if (rand(0, 2) == 1) // 33% probability
                $c .= $c;
        }
        $password .= $c;
        //

        // selecting random vowel
        $password .= ae_arr($vowels);

        if ($i == $syllables - 1) // if suffix begin with vovel
            if (in_array($password_suffix[0], $vowels)) // add one more consonant 
                $password .= ae_arr($consonants);

    }

    // selecting random suffix
    $password .= $password_suffix;

    return $password;
}
#$new_password = ae_gen_password(3, false);
#$new_passwordv = $new_password;

	if (isset($_POST['$new_subscribed'])) {
        $new_subscribed= $new_contact;
    }
    else {
        $new_subscribed= $new_contact;
    }
	if (isset($_POST['referid'])) {
	    $referid = $_POST['referid'];
	}
	else {
	    $referid="admin";
	}

	if (isset($_POST['solo'])) {
	    $solo = $_POST['solo'];
	    if ($solo=="on") {
	        $solo=1;
	    }
	    else {
	        $solo=0;
	    }
	}
	else {
	    $solo=1;
	}


// errorchecking first:
if (empty($new_userid) OR $new_userid=='admin') {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Userid field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
   
 // errorchecking first:
if (!$_POST['terms']) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! You must agree to the term and conditions to join. Please click your browsers back button.</p><b></center></font>";
   exit;
   }   
   
 $sql = mysql_query("SELECT * FROM banned_emails");
while($each = mysql_fetch_array($sql)) {
	if(strpos(strtolower($new_contact), strtolower(trim($each['email']))) !== false) {
		echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! That email address has been banned.</p><b></center></font>";
		exit;	
	}
}     
  

$query = "select * from members where userid='".$new_userid."'";
$result = mysql_query ($query);
$numrows = mysql_num_rows($result);

if ($numrows>0) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Userid already exists. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
   
$query = "select * from members where ip='".$ip."'";
$result = mysql_query ($query);
$numrows = mysql_num_rows($result);

if ($numrows>0) {

echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! A member already exists with your IP address.</p><b></center></font>";

   exit;
   }

$queryc = "select * from members where contact_email='".$new_contact."'";
$resultc = mysql_query ($queryc);
$numrowsc = mysql_num_rows($resultc);

if ($numrowsc>0) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Email already exists. Please click your browsers back button.</p><b></center></font>";
   exit;
   }

if ((empty($new_password))||(empty($new_passwordv))) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Password field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }

if (empty($new_fullname)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! First Name field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
if (empty($new_lastname)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Last Name field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }


if (empty($new_contact)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Contact field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $new_contact)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! You've entered an invalid email address. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
if (empty($new_subscribed)) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Subscribed field is empty. Please click your browsers back button.</p><b></center></font>";
   exit;
   }
if ($new_password != $new_passwordv ) {
   echo "<font size=3 face='$fonttype' color='$fontcolour'><p><b><center>Error! Passwords do not match. Please click your browsers back button.</p><b></center></font>";
   exit;
   }

//all clear, now add user.....

    $points=$propoints;


    $today = date('Y-m-d',strtotime("now"));
	$yesterday = date("Y-m-d", time()-86400);
	
	
	
if($jvsignup) {
	$mtY = 'JV Member';
	$points=$jvpoints;
	$surfcredits = $jvsurfcreditsignupbonus;
} else {
	$mtY = 'PRO';
	$points=$propoints;
	$surfcredits = $prosurfcreditsignupbonus;
}


	$query = "INSERT INTO members ";
	$query .= "(userid,pword,name,lastname,country,contact_email,subscribed_email,status,referid,points,surfcredits,memtype,solos,ip,joindate,referrer,lastsolopost,lastmonthlybonus,nextmonthlybonus) ";
	$query .= "VALUES ";
	$query .= "('$new_userid','$new_password','$new_fullname','$new_lastname','$new_country','$new_contact','$new_subscribed',1,'$referid','$points','$surfcredits','$mtY',$solo,'$ip','$today','".$_POST['referrer']."','$yesterday',NOW(),DATE_ADD(NOW(),INTERVAL 1 MONTH))";

	$result = mysql_query ($query)
	  or die ("Signup failed. Please contact support.");

    $queryrefer="select * from members where userid='".$referid."'";

    $resultrefer = mysql_query ($queryrefer);
    $line = mysql_fetch_array ($resultrefer);
    $mem = $line["memtype"];

	
	$headers .= "From: $sitename<$adminemail>\n";
	$headers .= "Reply-To: <$adminemail>\n";
	$headers .= "X-Sender: <$adminemail>\n";
	$headers .= "X-Mailer: PHP4\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "Return-Path: <$adminemail>\n";
	

	
	// send the user an email to inform them about having joined. And send a verification email to subscribed....

 	$message = "Dear ".$new_fullname." ".$new_lastname.",\n\nThank you for signing up for ".$sitename.".\nYour account details are below:\n\n"
	           ."Userid: ".$new_userid."\nPassword: ".$new_password."\n\n"
               ."Before you can advertise on the site, please verify your email address by clicking this link ".$domain."/verify.php?userid=".$new_userid."&email=".$new_subscribed."\n\n"
               ."Your unique referral url is: ".$domain."/index.php?referid=".$new_userid ."\n\n"
               ."You can log into your members area to post a text ad or to earn points by viewing other members websites:\n"
               .$domain."\n\n"
	           ."Thank you!\n\n\n"
	           .$sitename." Admin\n"
	           .$adminemail."\n\n\n\n";


	@mail($new_contact, "Welcome to ". $sitename, wordwrap(stripslashes($message)),$headers, "-f$adminemail");


/*    $messagev = "Dear ".$new_fullname." ".$new_lastname.",\n\nThank you for signing up to ". $sitename ."\n\n"
               ."Before you can post to our site, please verify your email address by clicking this link ".$domain."/verify.php?userid=".$new_userid."&email=".$new_subscribed."\n\n"
               ."Thank you!\n\n\n"
               .$sitename." Admin\n"
               .$adminemail."\n\n\n\n";

    $headersv .= "From: $sitename<$adminemail>\n";
    $headersv .= "Reply-To: <$adminemail>\n";
    $headersv .= "Bcc: <$adminemail>\n";
    $headersv .= "X-Sender: <$adminemail>\n";
    $headersv .= "X-Mailer: PHP4\n";
    $headersv .= "X-Priority: 3\n";
    $headersv .= "Return-Path: <$adminemail>\n";

    @mail($new_subscribe, "Verification for ". $sitename, wordwrap(stripslashes($messagev)),$headersv);*/

    include "banners.php";

if ($adminnotice=="1") {
					$headern .= "From: $sitename<$adminemail>\n";
    $headern .= "Reply-To: <$adminemail>\n";
    $headern .= "Bcc: <$adminemail>\n";
    $headern .= "X-Sender: <$adminemail>\n";
    $headern .= "X-Mailer: PHP4\n";
    $headern .= "X-Priority: 3\n";
    $headern .= "Return-Path: <$adminemail>\n";


		$subject = "".$sitename." new member ".$new_userid." joined";
		$body = "A new member ".$new_fullname."(".$new_userid.") has joined from the IP: ".$ip."\nThe contact e-mail given was: ".$new_contact;
		mail($adminemail, $subject, $body,$headern);
				}
				elseif ($adminnotice=="0") {
					
				}

    ?>

	<font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>" ?><b><center>Signup Successfull!<br><BR><br>
	<font color="#ff0000" style="background: #ffff00;">IMPORTANT:</font> Please make a note of your login information below:<br><br>
	UserID: <?php echo $new_userid ?><br>
	Password: <?php echo $new_password ?><br>
	Login URL: <?php echo $domain ?><br><br>
	<br><br>
	Please whitelist (add to your addressbook) <? echo $adminemail; ?> to ensure you verify your account. 
	Unverified (even paid) accounts will be deleted.<BR><BR> Check your bulk/spam folder for your welcome email if it is not in your inbox.<br><br>
	You will not be able to use the website until your account is verified.  If you do not receive the verification email within an hour, contact us.</b>
	<p></font></p></center><br><br><br><br><br><br><br><br> 
            
<?

include "footer.php";
mysql_close($dblink);
?>