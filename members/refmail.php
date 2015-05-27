<?php

session_start();



include "../header.php";
include "../config.php";
include "../style.php";

if( session_is_registered("ulogin") )
   	{  // members only stuff!
		include("navigation.php");
        include("../banners2.php");
		
		
		if($memtype=="FREE") {
		echo "You must be a pro member to access this feature.";
		echo "</td></tr></table>";
		include "../footer.php";
		exit;
		}		
		
?>
				<!-- tinyMCE -->
		<script language="javascript" type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
		<script language="javascript" type="text/javascript">
			tinyMCE.init({
				theme : "advanced",
				mode : "textareas",
				//save_callback : "customSave",
				content_css : "advanced.css",
				extended_valid_elements : "a[href|target|name],font[face|size|color|style],span[class|align|style]",
				theme_advanced_toolbar_location : "top",
				plugins : "table",
				theme_advanced_buttons3_add_before : "tablecontrols,separator",
				//invalid_elements : "a",
				theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1", // Theme specific setting CSS classes
				//execcommand_callback : "myCustomExecCommandHandler",
				debug : false
			});

			// Custom event handler
			function myCustomExecCommandHandler(editor_id, elm, command, user_interface, value) {
				var linkElm, imageElm, inst;

				switch (command) {
					case "mceLink":
						inst = tinyMCE.getInstanceById(editor_id);
						linkElm = tinyMCE.getParentElement(inst.selection.getFocusElement(), "a");

						if (linkElm)
							alert("Link dialog has been overriden. Found link href: " + tinyMCE.getAttrib(linkElm, "href"));
						else
							alert("Link dialog has been overriden.");

						return true;

					case "mceImage":
						inst = tinyMCE.getInstanceById(editor_id);
						imageElm = tinyMCE.getParentElement(inst.selection.getFocusElement(), "img");

						if (imageElm)
							alert("Image dialog has been overriden. Found image src: " + tinyMCE.getAttrib(imageElm, "src"));
						else
							alert("Image dialog has been overriden.");

						return true;
				}

				return false; // Pass to next handler in chain
			}
		</script>
		<!-- /tinyMCE -->
<?
        echo "<font size=2 face='$fonttype' color='$fontcolour'><p><center>";

		echo "<p><font size=6>Email Your Referrals</font></p>";
		
		echo "
You can use this tag: ~fname~ to call up the members first name in the email<br>To keep emails from bouncing, please cloak your URL with a service like tinyurl.com or lil-url.com.  The reason for this is many of the URLs being promoted are often BLACKLISTED by many ISPs.  Please comply with this request.";


	$scount = mysql_query("SELECT COUNT(*) FROM members  WHERE referid = '".$userid."' and verified=1");
	if(mysql_result($scount, 0)) {


		$days = 7;	
		
		$scan = mysql_query("SELECT * FROM refmail  WHERE userid = '".$userid."' AND timestamp >= '".(time()-$days*24*60*60)."'");
		if(@mysql_num_rows($scan)) {
			echo "<p><b><center>You must wait $days days before sending another message.</center></b></p>";
		} else {

			if($_POST['message'] AND $_POST['subject']) {

				$sql = mysql_query("SELECT * FROM refmail  WHERE userid = '".$userid."'");
				if(@mysql_num_rows($sql)) mysql_query("UPDATE refmail SET timestamp = '".time()."' WHERE userid = '".$userid."'");
				else mysql_query("INSERT INTO refmail VALUES('".$userid."', '".time()."')");
				
				$sql = mysql_query("SELECT * FROM members WHERE referid = '".$userid."' and verified=1");
				

				
				while($each = mysql_fetch_array($sql)) {
				
					$each['name'] = trim($each['name']);
					if(strpos($each['name'], " ")) $firstname = substr($each['name'] , 0, strpos($each['name'], " "));
					else $firstname = $each['name'];
					
					$message = str_replace("~userid~", $each['userid'], str_replace("~fname~", $firstname, stripslashes($_POST['message'])));
					$subject = str_replace("~userid~", $each['userid'], str_replace("~fname~", $firstname, stripslashes($_POST['subject'])));
					
					$message .= "<br><br>---------------------------------------------------------<br>You are receiving this as you are a member of $sitename. You can opt out of receiving emails only by deleting your account, click here to delete your account.<br><br>$domain/delete.php?userid=".$each['userid']."&code=".md5($each['pword'])."<br><br>$sitename<br>$adminaddress";
				
					mail($each['contact_email'], $subject, $message, "From: $sitename <$adminemail>\nReply-To: $adminemail\nReturn-Path: $adminemail\n", "-f$adminemail");
				
				}
				
				echo "<p><b><center>Your message has been sent. Please wait $days days before sending another one.</center></b></p>";
				
			} else {
			?>
			
			
		  <form action="refmail.php" method="post">
		  Subject:<br>
		  <input type="text" name="subject">
		  <br><br>
		  Message:<br>
		  <textarea name="message" cols="57" rows="20"></textarea>
		  <br>
		  <input type="submit">
		  </form>
			
			
			
			<?
			}
		
		}
		
	} else {
		//No referral
		echo "<p><b><center>You don't have any referrals yet.</center></b></p>";
	}
		
		
		
		
        echo "</font></td></tr></table>";
	}

else
  { ?>

  <font size=2 face="<? echo $fonttype; ?>" color="<? echo $fontcolour; ?>"><p><b><center>You must be logged in to access this site. Please <a href="<? echo $domain; ?>/memberlogin.php">click here</a> to login.</p></b></font><center>

  <? }

include "../footer.php";
mysql_close($dblink);
?>