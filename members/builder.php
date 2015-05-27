<?php

session_start();

include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!
		include("navigation.php");
        include("../banners2.php");

        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";
		echo "<center><font size=6>Business Builder</font></center><br><div align=\"left\">";

		$query1 = "SELECT * FROM pages WHERE name='Downline Builder'";
	    $result1 = mysql_query ($query1);

	    $line1 = mysql_fetch_array($result1);
	         $htmlcode = $line1["htmlcode"];

	    echo $htmlcode;


if($_POST['update']) {

	$sid = intval($_POST['sid']);
	$info = htmlentities($_POST['info']);
	
	$sql = mysql_query("SELECT * FROM builder WHERE userid = '".$userid."'");
	if(!@mysql_num_rows($sql)) {
		mysql_query("INSERT INTO builder (userid, site".$sid.") VALUES ('".$userid."', '".$info."')");
	} else {
		mysql_query("UPDATE builder SET site".$sid." = '".$info."' WHERE userid = '".$userid."'");
	}
}


if($_POST['favorite']) {

	if(($fav1_url OR $fav1_title) AND ($fav1_url == "" OR $fav1_title == "")) {
		$fav1_url = "";
		$fav1_title = "";
		$fav1_desc = "";		
		$msg1 = "<font color=red>You need to fill all the fields.</font>";
	}
	

	if(($fav2_url OR $fav2_title) AND ($fav2_url == "" OR $fav2_title == "")) {
		$fav2_url = "";
		$fav2_title = "";
		$fav2_desc = "";		
		$msg2 = "<font color=red>You need to fill all the fields.</font>";
	}
	
	if(($fav3_url OR $fav3_title) AND ($fav3_url == "" OR $fav3_title == "")) {
		$fav3_url = "";
		$fav3_title = "";
		$fav3_desc = "";		
		$msg3 = "<font color=red>You need to fill all the fields.</font>";
	}




	$sql = mysql_query("SELECT * FROM builder WHERE userid = '".$userid."'");
	if(!@mysql_num_rows($sql)) {
		mysql_query("INSERT INTO builder (userid, fav1_title, fav2_title, fav3_title, fav1_url, fav2_url ,fav3_url,fav1_bold,fav1_color,fav2_bold,fav2_color,fav3_bold,fav3_color) VALUES ('".$userid."', '".$fav1_title."', '".$fav2_title."', '".$fav3_title."', '".$fav1_url."', '".$fav2_url."', '".$fav3_url."', '".$fav1_bold."', '".$fav1_color."', '".$fav2_bold."', '".$fav2_color."', '".$fav3_bold."', '".$fav3_color."')");
	} else {
		mysql_query("UPDATE builder SET fav1_title = '".$fav1_title."',fav2_title = '".$fav2_title."',fav3_title = '".$fav3_title."',fav1_url = '".$fav1_url."',fav2_url = '".$fav2_url."',fav3_url = '".$fav3_url."',fav1_bold = '".$fav1_bold."',fav1_color = '".$fav1_color."',fav2_bold = '".$fav2_bold."',fav2_color = '".$fav2_color."',fav3_bold = '".$fav3_bold."',fav3_color = '".$fav3_color."' WHERE userid = '".$userid."'");
	}
}


//Get the user links
$ub = array();
$sql = mysql_query("SELECT * FROM builder WHERE userid = '".$userid."'");
if(@mysql_num_rows($sql)) $ub = mysql_fetch_array($sql);



$sql = mysql_query("SELECT * FROM builder_fav");
while($each = mysql_fetch_array($sql)) {
	$fav[$each['id']] = array('title' => $each['title'],'desc' => $each['desc'],'url' => $each['url']);
}


echo "<center>";
// Builder

echo "</center>";


?>
	  
	  
	  <br><br>
	  <center>
	  <h3>Your favorite programs</h3>
	  <form action="builder.php" method="post">
	  <input type="hidden" name="favorite" value="1">
		  <p><b>Site 1</b></p>
		  <? if($msg1) echo $msg1; ?>
		  <table>
		   <tr><td>Text:</td><td><input maxlength="65" type="text" name="fav1_title" value="<? echo $ub['fav1_title']; ?>"></td></tr>
		   <tr><td>Url:</td><td><input type="text" name="fav1_url" value="<? echo $ub['fav1_url']; ?>"></td></tr>
		   <tr><td>Bold:</td><td><input type="radio" name="fav1_bold" value="1"<? if($ub['fav1_bold']==1) echo ' CHECKED'; ?>> Yes <input type="radio" name="fav1_bold" value="0"<? if($ub['fav1_bold']==0) echo ' CHECKED'; ?>> No</td></tr>
		   <tr><td>Color:</td><td><input type="radio" name="fav1_color" value="red"<? if($ub['fav1_color']=='red') echo ' CHECKED'; ?>> <font color=red>Red</font> <input type="radio" name="fav1_color" value="blue"<? if($ub['fav1_color']=='blue') echo ' CHECKED'; ?>> <font color=blue>Blue</font> <input type="radio" name="fav1_color" value="green"<? if($ub['fav1_color']=='green') echo ' CHECKED'; ?>> <font color=green>Green</font> <br><input type="radio" name="fav1_color" value="black"<? if($ub['fav1_color']=='black' OR !$ub['fav1_bold']) echo ' CHECKED'; ?>> <font color=black>Black</font> <input type="radio" name="fav1_color" value="purple"<? if($ub['fav1_color']=='purple') echo ' CHECKED'; ?>> <font color=purple>Purple</font> <input type="radio" name="fav1_color" value="pink"<? if($ub['fav1_color']=='pink') echo ' CHECKED'; ?>> <font color=pink>Pink</font></td></tr>
		  </table>
		  
		  <p><b>Site 2</b></p>
		  <? if($msg2) echo $msg2; ?>
		  <table>
		   <tr><td>Text:</td><td><input maxlength="65" type="text" name="fav2_title" value="<? echo $ub['fav2_title']; ?>"></td></tr>
		   <tr><td>Url:</td><td><input type="text" name="fav2_url" value="<? echo $ub['fav2_url']; ?>"></td></tr>
		   <tr><td>Bold:</td><td><input type="radio" name="fav2_bold" value="1"<? if($ub['fav2_bold']==1) echo ' CHECKED'; ?>> Yes <input type="radio" name="fav2_bold" value="0"<? if($ub['fav2_bold']==0) echo ' CHECKED'; ?>> No</td></tr>
		   <tr><td>Color:</td><td><input type="radio" name="fav2_color" value="red"<? if($ub['fav2_color']=='red') echo ' CHECKED'; ?>> <font color=red>Red</font> <input type="radio" name="fav2_color" value="blue"<? if($ub['fav2_color']=='blue') echo ' CHECKED'; ?>> <font color=blue>Blue</font> <input type="radio" name="fav2_color" value="green"<? if($ub['fav2_color']=='green') echo ' CHECKED'; ?>> <font color=green>Green</font> <br><input type="radio" name="fav2_color" value="black"<? if($ub['fav2_color']=='black' OR !$ub['fav2_bold']) echo ' CHECKED'; ?>> <font color=black>Black</font> <input type="radio" name="fav2_color" value="purple"<? if($ub['fav2_color']=='purple') echo ' CHECKED'; ?>> <font color=purple>Purple</font> <input type="radio" name="fav2_color" value="pink"<? if($ub['fav2_color']=='pink') echo ' CHECKED'; ?>> <font color=pink>Pink</font></td></tr>
		  </table>
		  
		  <p><b>Site 3</b></p>
		  <? if($msg3) echo $msg3; ?>
		  <table>
		   <tr><td>Text:</td><td><input maxlength="65" type="text" name="fav3_title" value="<? echo $ub['fav3_title']; ?>"></td></tr>
		   <tr><td>Url:</td><td><input type="text" name="fav3_url" value="<? echo $ub['fav3_url']; ?>"></td></tr>
		   <tr><td>Bold:</td><td><input type="radio" name="fav3_bold" value="1"<? if($ub['fav3_bold']==1) echo ' CHECKED'; ?>> Yes <input type="radio" name="fav3_bold" value="0"<? if($ub['fav3_bold']==0) echo ' CHECKED'; ?>> No</td></tr>
		   <tr><td>Color:</td><td><input type="radio" name="fav3_color" value="red"<? if($ub['fav3_color']=='red') echo ' CHECKED'; ?>> <font color=red>Red</font> <input type="radio" name="fav3_color" value="blue"<? if($ub['fav3_color']=='blue') echo ' CHECKED'; ?>> <font color=blue>Blue</font> <input type="radio" name="fav3_color" value="green"<? if($ub['fav3_color']=='green') echo ' CHECKED'; ?>> <font color=green>Green</font> <br><input type="radio" name="fav3_color" value="black"<? if($ub['fav3_color']=='black' OR !$ub['fav3_bold']) echo ' CHECKED'; ?>> <font color=black>Black</font> <input type="radio" name="fav3_color" value="purple"<? if($ub['fav3_color']=='purple') echo ' CHECKED'; ?>> <font color=purple>Purple</font> <input type="radio" name="fav3_color" value="pink"<? if($ub['fav3_color']=='pink') echo ' CHECKED'; ?>> <font color=pink>Pink</font></td></tr>
		  </table>
		  <br><input type="submit" value="Submit">
		  </form>
		  </center>
		  <br>


<?

$lastcat = "";
//Get the links for each site
$slist = mysql_query("SELECT s.*,c.name as catname FROM builder_sites s JOIN builder_cat c ON s.category=c.id ORDER BY c.order, s.category, s.order ASC");
while($each = mysql_fetch_array($slist)) {

	$user = $userid;
	$found = 0;

	while($found == 0) {

		//Referrer exists?
		$sql = mysql_query("SELECT m.referid FROM members m JOIN members r ON m.referid = r.id WHERE m.userid = '".$user."'");

		if(@mysql_num_rows($sql)) {
		
			$referrer = mysql_result($sql, 0);
			
			$sql = mysql_query("SELECT site".$each['id']." FROM builder WHERE userid = '".$referrer."'");
			if(@mysql_num_rows($sql)) {
			
				// Found a row, check if it's empty
				$value = mysql_result($sql, 0);
				if($value) {
					//found a link, end the loop
					$links = $value;
					$found = 1;
				} else {
					//No link, next.
					$user = $referrer;
				}
				
			} else {
				//No row, next.
				$user = $referrer;
			}

		} else {
			//No more referrers, use default values
			$links = $each['url'];
			$found = 1;
		}

	}
	
	if($lastcat != $each['category']) echo "<br><center><h2>".$each['catname']."</h2></center><hr>";
	$lastcat = $each['category'];	
	
	?>
	
	
	  <h3><a href="<? echo $links; ?>" target=_new"><? echo $each['name']; ?></a></h3>
	  
	  <p><? echo $each['desc']; ?></p> 
	  <div style="text-align: right;">
	  <form method="post"><input type="hidden" name="sid" value="<? echo $each['id']; ?>">My referral link: <input type="text" name="info" value="<? echo $ub["site".$each['id']]; ?>"><input type="submit" name="update" value="Update"></form>
	  </div>
	  
	  <hr>
	
	
	
	<?
	
	
	

}
		echo "<br><br></div>";
        echo "</font></td></tr></table>";
	}

else
  { ?>

  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>