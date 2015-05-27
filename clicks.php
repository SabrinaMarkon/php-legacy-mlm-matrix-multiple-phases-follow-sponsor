<?php

include "config.php";

if (empty($seed)) {
	$top = "clicks2.php?message=".urlencode("Invalid click link");
}
if (empty($userid)) {
	$top = "clicks2.php?message=".urlencode("Invalid click link");
}
if (empty($id)) {
	$top = "clicks2.php?message=".urlencode("Invalid click link");
}

$query = "select * from links where adid=".$id." and number=".$seed;
$result = mysql_query ($query)
           		or die ("Query failed");
$numrows = @ mysql_num_rows($result);

if ($numrows == 1) {

	$url = mysql_result(mysql_query("select url from solos where id='".$id."' LIMIT 1"), 0, 'url');

    $query1 = "select * from clicks where userid='".$userid."' and number=".$seed;
    $result1 = mysql_query ($query1)
            		or die ("Query failed");
	$numrows1 = @ mysql_num_rows($result1);

    if ($numrows1 == 1) {
    		$top = "clicks2.php?message=".urlencode("You have already received credit for this link")."&url=".urlencode($url);
    }  //end if ($numrows1 ==1)
    else {
	
	    $query3 = "select * from members where userid='".$userid."'";
		$result3 = mysql_query ($query3)
            		or die ("Query failed");
        $line3 = mysql_fetch_array($result3);
		$memtype = $line3["memtype"];
		
        if ($memtype == "PRO") {
			$top = "clicks2.php?credit=".$proclickearn."&seed=".$seed."&adid=".$id."&userid=".$userid."&url=".urlencode($url);
        }
        elseif ($memtype == "JV Member") {
            $top = "clicks2.php?credit=".$jvclickearn."&seed=".$seed."&adid=".$id."&userid=".$userid."&url=".urlencode($url);
        }
		elseif ($memtype == "SUPER JV") {
            $top = "clicks2.php?credit=".$superjvclickearn."&seed=".$seed."&adid=".$id."&userid=".$userid."&url=".urlencode($url);
        }
		
    }
} //end if ($numrows == 1)
else {
	$top = "clicks2.php?message=".urlencode("Invalid click link");
}


if(empty($url)) $url = $domain;

mysql_close($dblink);
?>

  <frameset ROWS="185,*" BORDER=0 FRAMEBORDER=1 FRAMESPACING=0>
  <frame name="header" scrolling="no" noresize marginheight="1" marginwidth="1" target="main" src="<? echo $top; ?>">
  <frame name="main" src="<? echo $url; ?>">
  </frameset>