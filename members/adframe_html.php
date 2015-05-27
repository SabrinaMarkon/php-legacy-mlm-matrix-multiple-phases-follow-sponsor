<?php
session_start();
include "../config.php";

$id = $_GET['id'];

$result = mysql_query("SELECT * FROM `post_html` WHERE id = '".$id."' LIMIT 1");
$numrows = @ mysql_num_rows($result);

if ($numrows == 1) {

	$url = mysql_result($result, 0, "url");
	$poster = mysql_result($result, 0, "userid");
	
    $query1 = "select * from viewed_html where userid = '".$userid."' and postid = '".$id."'";
    $result1 = mysql_query ($query1);
	$numrows1 = @ mysql_num_rows($result1);

    if (!$numrows1) {
    		$top = "adtop_html.php?message=".urlencode("Invalid click link");
    }  //end if ($numrows1 ==1)
    else {
	
		$paid = mysql_result($result1, 0, "paid");
		
		if($paid) $top = "adtop_html.php?message=".urlencode("You have already received credit for this link")."&url=".urlencode($url);
		else {
		
			$sql = mysql_query("SELECT memtype,referid FROM members WHERE userid = '".$poster."'");
			$adtype = mysql_result($sql, 0,'memtype');
			$referid = mysql_result($sql, 0,'referid');
			

				$top = "adtop_html.php?id=".$id."&type=pro&url=".urlencode($url);
			
			
		}

		
    }
} //end if ($numrows == 1)
else {
	$top = "adtop_html.php?message=".urlencode("Invalid click link");
}

mysql_close();
?>

  <frameset ROWS="185,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
  <frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="<? echo $top; ?>">
  <frame name="main" src="<? echo $url; ?>">
  </frameset>