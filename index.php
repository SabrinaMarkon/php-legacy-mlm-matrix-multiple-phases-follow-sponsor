<?php
include "config.php";
if ($referid=="")
{
$referid="admin";
}
include "header.php";
?>
<script type="text/javascript">
function ajaxFunction(){
    var ajaxRequest;  // The variable that makes Ajax possible!
   
    try{
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e){
        // Internet Explorer Browsers
        try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data sent from the server
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            var ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    var order_domain_name = document.getElementById('order_domain_name').value;
    var order_domain_extension = document.getElementById('order_domain_extension').value;
   
    var queryString = "?order_domain_name=" + order_domain_name + "&order_domain_extension=" + order_domain_extension;
    ajaxRequest.open("GET", "script_domain_checker.php" + queryString, true);
    ajaxRequest.send(null);
}

/***********************************************
* Dynamic Ajax Content- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}
</script>

<!-- Content Begins -->

<table align="center" width="960" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF">
<?php
###########
$hheadlinequeryexclude = "select * from hheadlineads where clicks<=max and approved=1 order by rand()";
$hheadlineresult = mysql_query($hheadlinequeryexclude);
$hheadlinerows = mysql_num_rows($hheadlineresult);
###########
$hheaderqueryexclude = "select * from hheaderads where clicks<=max and approved=1 order by rand()";
$hheaderresult = mysql_query($hheaderqueryexclude);
$hheaderrows = mysql_num_rows($hheaderresult);
###########
if (($hheadlinerows > 0) or ($hheaderrows > 0))
{
?>
<tr><td align="center" colspan="2">
<?php
include "hhiframe.php";
?>
</td></tr>
<?php
}
?>
  <tr>
    <td width="250" valign="top">
<!-- Left Navigation Begins -->
    <table width="250" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td width="11" height="11"></td>
        <td width="230" height="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="228" height="11" alt="" /></td>
        <td width="11" height="11"></td>

      </tr>
      <tr>
        <td width="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="11" alt="" /></td>
        <td valign="top">
<!-- Left Nav Content Begins -->
                                                <script language="JavaScript1.2" type="text/javascript">
												          iens6=document.all||document.getElementById
												          ns4=document.layers
												          //specify speed of scroll (greater=faster)
												          var speed=2
										</script>
                            <table cellpadding="0" cellspacing="0" border='0' width="100%">
                            <tr style="height:40px;">
                                <td class="left_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />

                                </td>
                                <td class="center_title">
                                    Members Joining
                                </td>
                                <td class="right_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                            </tr>

                            <tr style="height:4px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>

                            <tr class='content_title' align="center">

                                <td>
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                                <td style="padding:5px;" bgcolor="#eeeeee">

<div class="newsContent" align="center">
<div id='container1' style='position:relative;width:100%;height:150px;overflow:hidden;'>
<div id='content1' style='position:absolute;width:100%;'>
<table cellpadding='4' cellspacing='0' border='0' width='100%' align='center'>

<?php
$memberq = "select * from members order by id desc";
$memberr = mysql_query($memberq);
$memberrows = mysql_num_rows($memberr);
if ($memberrows > 0)
{
while ($memberrowz = mysql_fetch_array($memberr))
	{
	$memberuserid = $memberrowz["userid"];
	$memberip = $memberrowz["ip"];
	$memberjoindate = $memberrowz["joindate"];
	$membercountry = $memberrowz["country"];

$countryq = "select * from countries where country_name=\"$membercountry\"";
$countryr = mysql_query($countryq);
$countryrows = mysql_num_rows($countryr);
if ($countryrows > 0)
{
$iso_code2 = mysql_result($countryr,0,"iso_code2");
}
if ($countryrows < 1)
{ 
$iso_code2 = "";
}
?>
<tr><td style="width: 50px; overflow: hidden;"><span style='font-size:10px;color:#000000;'><?php echo $memberuserid ?></span></td><td><span style='font-size:10px;color:#000000;'><?php echo $membercountry ?></span></td>
<?php
if ($iso_code2 != "")
{
?>
<td><span><img src="<?php echo $domain ?>/images/flags/<?php echo $iso_code2 ?>.gif" border="0" alt="<?php echo $membercountry ?>"></span></td>
<?php
}
?>
</tr>
<?php
	}
}
?>
</table>
</div>
</div>
</div>


                                </td>
                                <td>
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>

                            </tr>
                            <tr style="height:8px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                        </table>

                    <script language='JavaScript' type="text/javascript">
                    var speed=1

                    if (iens6){
										var crossobj1=document.getElementById? document.getElementById("content1") : document.all.content1

										var contentheight1=crossobj1.offsetHeight
										}
										else if (ns4){
										var crossobj1=document.nscontainer1.document.nscontent1

										var contentheight1=crossobj1.clip.height
										}

                    function movedown1(){
										if (iens6&&parseInt(crossobj1.style.top)>=(contentheight1*(-1)-10))
										crossobj1.style.top=parseInt(crossobj1.style.top)-speed+"px"
										else if (ns4&&crossobj1.top>=(contentheight1*(-1)-10))
										crossobj1.top-=speed
										else if (iens6){
                           crossobj1.style.top = 50 + "px";
                    }
										movedownvar1=setTimeout("movedown1()",50)
										}

										function getcontent_height(){
										if (iens6)
										{
										contentheight1=crossobj1.offsetHeight
										}
										else if (ns4)
										{
                    document.nscontainer1.document.nscontent1.visibility="show"
										}

                    movedown1 ();
										}

                    window.onload=getcontent_height

                    </script>


                        <table cellpadding="0" cellspacing="0" border='0' width="100%">
                            <tr style="height:40px;">
                                <td class="left_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />

                                </td>
                                <td class="center_title">
                                    Member Login
                                </td>
                                <td class="right_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                            </tr>
                            <tr style="height:4px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                            <tr class='content_title'>

                                <td>
                                </td>
                                <td style="padding:10px;" bgcolor="#eeeeee" style="border: 4px solid #ffffff;">


                    <form name='LoginForm' action='login.php' method='POST'>
                         <table cellpadding="0" cellspacing="0" border='0' width='100%'>
                            <tr>
                                <td align="left" class="w_padding">
                                    <span class='question'>Username:</span>

                                </td>
                                <td align="left" class="w_padding">
                                    <input type='text' name='userid' value='' maxlength='25' style='width: 110px;'>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" class="w_padding">
                                    <span class='question'>Password:</span>

                                </td>
                                <td align="left" class="w_padding">
                                    <input type='password' name='password' value='' maxlength='25' style='width: 110px;'>
                                </td>
                            </tr>
                            <tr>

                                <td align="left" valign="top" class="w_padding">
                                </td>
                                <td align="left" class="w_padding">
                                    <input type="submit" name="login" value="Login">
                                </td>
                            </tr>
                            <tr>
                                <td align="left" valign="top" class="w_padding">
                                </td>

                                <td align="left" class="w_padding">
                                    <a href='forgot.php?referid=<?php echo $referid ?>' class='smallLink'>Forgot Password?</a>
                                </td>
                            </tr>
                            </form>
                        </table>

                                </td>

                                <td>
                                </td>
                            </tr>
                            <tr style="height:8px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                        </table>


                        <table cellpadding="0" cellspacing="0" border='0' width="100%">
                            <tr style="height:40px;">
                                <td class="left_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>

                                <td class="center_title">
                                    Sign Up
                                </td>
                                <td class="right_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                            </tr>
                            <tr style="height:4px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                            <tr class='content_title'>
                                <td>

                                </td>
                                <td style="padding:5px;" align="center" bgcolor="#eeeeee">

                        <table cellpadding="0" cellspacing="0" border='0' width='100%'>

                            <tr>
                                <td>
<center><form method="POST" action="join.php">
<input type="hidden" name="referrer" value="<? echo $_SERVER['HTTP_REFERER']; ?>">
<br>Username (no spaces):<br>
<input type="text" size="25" name="new_userid">
<br>Password (no spaces):<br>
<input type="password" size="25" name="new_password">
<br>Retype Password:<br>
<input type="password" size="25" name="new_passwordv">
<br>First Name:(required)<br>
<input type="text" size="25" name="new_fullname">
<br>Last Name:(required)<br>
<input type="text" size="25" name="new_lastname">
<br>Email:<br>
<input type="text" size="25" name="new_contact">
<?php
$cq = "select * from countries order by country_id";
$cr = mysql_query($cq);
$crows = mysql_num_rows($cr);
if ($crows > 0)
{
?>
<br>Country:<br>
<select name="new_country" style="width: 178px;">
<?php
	while ($crowz = mysql_fetch_array($cr))
	{
	$country_name = $crowz["country_name"];
?>
<option value="<?php echo $country_name ?>" <?php if ($country_name == "United States") { echo "selected"; } ?>><?php echo $country_name ?></option>
<?php
	}
?>
</select>
<?php
}
?>
<br><br>
Member Type:&nbsp;<b><?php echo $lowerlevel ?> Membership</b>
<br><br>
<input type="checkbox" name="terms" value=1><font size="1"> By joining you agree to receive emails from <? echo $sitename; ?>.  You are also agreeing to the rest of our <a href="<? echo $domain; ?>/terms.php" target="_blank"><font color="#000000" size="1"><u>Terms and Conditions</u></a>.</font>
<br><br>
<input type="hidden" size="25" name="referid" value="<? echo $referid; ?>">
<input type="hidden" name="mtY" value="PRO">
<input type="submit" name="signup" value="Sign Up">
</form></center><br>
                                </td>

                            </tr>

                        </table>


                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr style="height:8px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                        </table>


                        <table cellpadding="0" cellspacing="0" border='0' width="100%">
                            <tr style="height:40px;">

                                <td class="left_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                                <td class="center_title">
                                    Featured Ads
                                </td>
                                <td class="right_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>

                            </tr>
                            <tr style="height:4px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                            <tr class='content_title'>
                                <td>
                                </td>
                                <td style="padding:5px;" align="center" bgcolor="#eeeeee">
                        <table cellpadding="0" cellspacing="0" border='0' width='100%'>

                            <tr>
                                <td>

<?php
############################################################################################################### FEATURED ADS - Sabrina Markon - June 2 2010
$featuredadq1 = "select * from featuredads where views<=max and approved=1 order by rand() limit $featuredadnumberofboxes";
$featuredadr1 = mysql_query($featuredadq1);
$featuredadrows1 = mysql_num_rows($featuredadr1);
if ($featuredadrows1 > 0)
{
echo "<font size=2 face='$fonttype' color='$fontcolour'><center>";
echo "<br><font face=\"Tahoma\" size=\"2\"><center><b>FEATURED ADS</b><br><br>";		
echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"$featuredadwidth\" align=\"center\">";
$topborder = 0;
while ($featuredadrowz1 = mysql_fetch_array($featuredadr1))
	{
	$featuredadid = $featuredadrowz1["id"];
	$featuredviewq = "update featuredads set views=views+1 where id=\"$featuredadid\"";
	$featuredviewr = mysql_query($featuredviewq);
	$featuredadheading = $featuredadrowz1["heading"];
	$featuredadheading = stripslashes($featuredadheading);
	$featuredadheadinghighlight = $featuredadrowz1["headinghighlight"];
	if ($featuredadheadinghighlight == "")
	{
	$featuredadheadinghighlight = $featuredadheadingbgcolor;
	}
	$featuredaddescription = $featuredadrowz1["description"];
	$featuredaddescription = stripslashes($featuredaddescription);
	$featuredaddescription = trim($featuredaddescription);
	$featuredaddescription = nl2br($featuredaddescription);
	$featuredadredircturl = "./featuredadclicks.php?id=" . $featuredadid;
	if ($topborder != 0)
	{
	$onepixeltopborder = " border-top: 0px;";
	}
	$topborder = $topborder+1;
?>
<tr><td align="center">
<div onclick="window.open('<?php echo $featuredadredircturl ?>','_blank');" id="featuredadpanetop" style="text-align: left; font-weight: bold; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; background: <?php echo $featuredadheadinghighlight ?>; border: 1px solid <?php echo $featuredadheadingbordercolor ?>; border-bottom: 0px; overflow: visible; padding: 4px; color: <?php echo $featuredadheadingfontcolor ?>; font-family: '<?php echo $featuredadheadingfontface ?>'; font-size: <?php echo $featuredadheadingfontsize ?>; overflow: hidden; cursor: pointer;<?php echo $onepixeltopborder ?>">
<div id="featuredadpanetitle" style="width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheightheading ?>px; text-align: center; overflow: hidden; cursor: pointer;">
<?php
echo $featuredadheading;
?>
</div>
</div>
<div onclick="window.open('<?php echo $featuredadredircturl ?>','_blank');" id="featuredadpane" style="text-align: left; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadheight ?>px; background: <?php echo $featuredaddescbgcolor ?>; border: 1px solid <?php echo $featuredaddescbordercolor ?>; overflow: hidden; padding: 4px; color: <?php echo $featuredaddescfontcolor ?>; font-family: '<?php echo $featuredaddescfontface ?>'; font-size: <?php echo $featuredaddescfontsize ?>; text-align: center; cursor: pointer;">
<div id="featuredaddescpane" style="padding: 4px; cursor: pointer;">
<?php
echo $featuredaddescription;
?>
</div>
</div>
</td></tr>
<?php
	} # while ($featuredadrowz1 = mysql_fetch_array($featuredadr1))
if ($featuredadadsbytext != "")
{
?>
<tr><td align="center">
<div onclick="window.open('<?php echo $featuredadadsbyurl ?>','_blank');" id="featuredadadsby" style="text-align: left; font-weight: bold; width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadadsbyheight ?>px; background: <?php echo $featuredadadsbybgcolor ?>; border: 1px solid <?php echo $featuredadadsbybordercolor ?>; overflow: hidden; padding: 4px; color: <?php echo $featuredadadsbyfontcolor ?>; font-family: '<?php echo $featuredadadsbyfontface ?>'; font-size: <?php echo $featuredadadsbyfontsize ?>; overflow: hidden; cursor: pointer; border-bottom: 1px solid  <?php echo $featuredadadsbybordercolor ?>; border-top: 0px;">
<div id="featuredadadsbytext" style="width: <?php echo $featuredadwidth ?>px; height: <?php echo $featuredadadsbyheight ?>px; text-align: center; overflow: hidden; cursor: pointer;">
<?php
echo $featuredadadsbytext;
?>
</div>
</div>
<?php
}
echo "</table><br>";
} # if ($featuredadrows1 > 0)
############################################################################################################### END FEATURED ADS - Sabrina Markon - June 2 2010
?>

                                </td>
                            </tr>

                        </table>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr style="height:8px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                        </table>

                        
                        <table cellpadding="0" cellspacing="0" border='0' width="100%">
                            <tr style="height:40px;">

                                <td class="left_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>
                                <td class="center_title">
                                Recommended Systems
                                </td>
                                <td class="right_title">
                                <img src="<?php echo $domain ?>/images/spacer.gif" width="5" height="33" alt="" />
                                </td>

                            </tr>
                            <tr style="height:4px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                            <tr class='content_title' align="center">
                                <td>
                                </td>
                                <td style="padding:5px;" bgcolor="#eeeeee">

<?php
    $query1 = "SELECT * FROM pages WHERE name='Advertising Column'";
    $result1 = mysql_query ($query1);
    $line1 = mysql_fetch_array($result1);
    $htmlcode = $line1["htmlcode"];
    echo $htmlcode;

################################################################## START RECOMMENDED SYSTEMS CODE - Sabrina Oct 22 2010
$rq = "select * from recommendedsystems order by id limit 1";
$rr = mysql_query($rq);
$rrows = mysql_num_rows($rr);
if ($rrows > 0)
{
$recommendedsystems = mysql_result($rr,0,"htmlcode");
echo $recommendedsystems;
}
################################################################## END RECOMMENDED SYSTEMS CODE
?>

                                </td>
                                <td>
                                </td>

                            </tr>
                            <tr style="height:8px;">
							<td colspan="3" bgcolor="#ffffff">
                            </tr>
                        </table>


                    <!-- Left Nav Content Ends -->
        </td>
        <td width="11"><img src="<?php echo $domain ?>/images/spacer.gif" width="11" alt="" /></td>
      </tr>
      <tr>
        <td width="11" height="11"></td>

        <td width="154" height="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="154" height="11" alt="" /></td>
        <td width="11" height="11"></td>
      </tr>
    </table>
<!-- Left Navigation Ends -->
    </td>
    <td width="661" valign="top">
<!-- Right Column Begins -->
    <table width="661" cellpadding="0" cellspacing="0" border="0">
      <tr>

        <td width="11" height="11"></td>
        <td width="661" height="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="661" height="11" alt="" /></td>
        <td width="11" height="11"></td>
      </tr>
      <tr>
        <td height="750" width="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" height="750" width="11" alt="" /></td>
        <td height="40" style="" align="center" valign="top">

<!-- Right Column Content Begins -->

<table cellpadding="0" cellspacing="0" border='0' width="100%">
    <tr class="content_title">
        <td>
        </td>
        <td style="padding:5px;text-align:left;">
            <div align="center">
                <span style='font-size:12px;'><b>Sponsor name :</b> <?php echo $referid ?></span>
            </div>

            <br />
<div style="text-align: center;">
<?php
$query1 = "SELECT * FROM pages WHERE name='Index (Main) Page'";
$result1 = mysql_query($query1);
$line1 = mysql_fetch_array($result1);
$htmlcode = $line1["htmlcode"];
include "banners.php";
echo $htmlcode;

$tmq = "select * from testimonials where approved=\"1\"";
$tmr = mysql_query($tmq);
$tmrows = mysql_num_rows($tmr);
if ($tmrows > 0)
{
?>
<script type="text/javascript">
ajaxpage('testimonials.php', 'testimonialdiv') //load "testimonials.php" into "testimonialdiv" DIV
</script>
<div id="testimonialdiv"></div>
<div align="center"><a href="javascript:ajaxpage('testimonials.php?referid=<?php echo $referid ?>', 'testimonialdiv');" style="font-size: 16px;">Click To View More Testimonials!</a></div>
<?php
}
?>



<br>
<a href="http://demomatrixmpsf.phpsitescripts.com/admin" target="_blank"><img src="http://phpsitescripts.com/images/demo.png" border="0"></a>
<br><br><br>
Please check out our interactive DEMO of the Multi-Phase "Follow Me" Sponsor Forced Matrix with Spillover/Spillunder v.10.1 Script as an admin <a href="http://demomatrixmpsf.phpsitescripts.com/admin" target="_blank">HERE</a> (admin login details are already in the login form for you). <br><br>Examine our DEMO site as a member <a href="http://demomatrixmpsf.phpsitescripts.com/memberlogin.php" target="_blank">HERE</a> (login with userid demomember and password demopass)</b><br><br>
<div style="text-align:left;padding-left:100px;">SCRIPT REQUIREMENTS:<br>
<ul>
<li>Unix/Linux (CentOS most CPanel servers run is good)</li>
<li>PHP 5.2 or Greater Version</li>
<li>MySQL Database Support</li>
<li>Ioncube Loader</li>
<li>GD Library</li>
<li>cURL</li>
</ul>
</div>
<br><br>
<table cellpadding="10" cellspacing="2" border="0" align="center" width="600" style="border:2px dashed #f00;background:#fff;">
<tr><td colspan="2" align="center"><font size="6" color="ff0000">Buy This Multi-Phase "Follow Me" Sponsor Forced Matrix with Spillover/Spillunder v.10.1 Script Now For Only $299.99!</font></td></tr>
</table>

<br>
<font color="#ff0000" style="background:#ff0;">IMPORTANT:</font> After payment please allow us up to 24 hours to process your order. Please whitelist sabrina@phpsitescripts.com.



</td></tr>
</table>
</div>   
        </td>
        <td>
        </td>

    </tr>
</table>

<!-- Right Column Content Ends -->
        </td>
        <td width="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="11" alt="" /></td>
      </tr>
      <tr>
        <td width="11" height="35" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="11" height="35" alt="" /></td>
        <td width="661" height="35" style=""><p align="center"><div style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #222; text-align: center; line-height: 17px">

</div></p></td>
        <td width="11" height="35" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="11" height="35" alt="" /></td>
      </tr>
      <tr>
        <td width="11" height="11"></td>
        <td width="661" height="11" style=""><img src="<?php echo $domain ?>/images/spacer.gif" width="661" height="11" alt="" /></td>
        <td width="11" height="11"></td>
      </tr>

<!-- Right Column Ends -->


    </td>
  </tr>

</table>
<!-- Content Ends -->

<?php
include "footer.php";
?>