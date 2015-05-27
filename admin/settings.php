<?php
session_start();
include "../config.php";
include "../header.php";
include "../style.php";
if( session_is_registered("alogin") ) {

    	?><table>

      	<tr>

        <td width="15%" valign=top><br>

        <? include("adminnavigation.php"); ?>

        </td>

        <td valign="top" align="center" width="5%">

        <td valign="top" align="center" ><br><br> <?

    echo "<font size=2 face='$fonttype' color='$fontcolour'>";

    if ($action=="save") {

        
        $update=mysql_query("update settings set setting='$bannerpricep' where name='bannerprice'");
        $update=mysql_query("update settings set setting='$pointpricep' where name='pointprice'");
        $update=mysql_query("update settings set setting='$solopricep' where name='soloprice'") ;
        $update=mysql_query("update settings set setting='$solopointpricep' where name='solopointprice'") ;
        $update=mysql_query("update settings set setting='$bannerpointpricep' where name='bannerpointprice'") ;
        $update=mysql_query("update settings set setting='$procommissionp' where name='procommission'") ;
        $update=mysql_query("update settings set setting='$propostp' where name='propost'");
        $update=mysql_query("update settings set setting='$propointsp' where name='propoints'");
        $update=mysql_query("update settings set setting='$propointsmonthlyp' where name='propointsmonthly'");
        $update=mysql_query("update settings set setting='$prorefpointsp' where name='prorefpoints'");
        $update=mysql_query("update settings set setting='$proreadearnp' where name='proreadearn'") ;
        $update=mysql_query("update settings set setting='$proclickearnp' where name='proclickearn'");
        $update=mysql_query("update settings set setting='$buttonpointpricep' where name='buttonpointprice'");
        $update=mysql_query("update settings set setting='$buttonpricep' where name='buttonprice'");
        $update=mysql_query("update settings set setting='$tlinkprice1p' where name='tlinkprice1'");
        $update=mysql_query("update settings set setting='$tlinkprice2p' where name='tlinkprice2'");
        $update=mysql_query("update settings set setting='$tlinkprice3p' where name='tlinkprice3'");
        $update=mysql_query("update settings set setting='$probannerearnp' where name='probannerearn'");
        $update=mysql_query("update settings set setting='$navpricep' where name='navprice'");
        $update=mysql_query("update settings set setting='$navpricepointsp' where name='navpricepoints'");
        $update=mysql_query("update settings set setting='$navmaxp' where name='navmax'");
  $update=mysql_query("update settings set setting='$topnavmaxp' where name='topnavmax'");
         $update=mysql_query("update settings set setting='$prosavep' where name='prosave'");
        $update=mysql_query("update settings set setting='$prourlsp' where name='prourls'");
        $update=mysql_query("update settings set setting='$prosavesolosp' where name='prosavesolos'");
        $update=mysql_query("update settings set setting='$protrafficearnp' where name='protrafficearn'");
        $update=mysql_query("update settings set setting='$loginpricep' where name='loginprice'");
        $update=mysql_query("update settings set setting='$loginpricepointsp' where name='loginpricepoints'");
        $update=mysql_query("update settings set setting='$prohtmlearnp' where name='prohtmlearn'");
        $update=mysql_query("update settings set setting='$prosavehtmlp' where name='prosavehtml'");
       $update=mysql_query("update settings set setting='$proposthtmlp' where name='proposthtml'");
       $update=mysql_query("update settings set setting='$prorefloginp' where name='proreflogin'");
       $update=mysql_query("update settings set setting='$propercentp' where name='propercent'");
       $update=mysql_query("update settings set setting='$probuycomp' where name='probuycom'");
       $update=mysql_query("update settings set setting='$tlinkpoints1p' where name='tlinkpoints1'");
        $update=mysql_query("update settings set setting='$tlinkpoints2p' where name='tlinkpoints2'");
        $update=mysql_query("update settings set setting='$tlinkpoints3p' where name='tlinkpoints3'");
        $update=mysql_query("update settings set setting='$probuttonclickp' where name='probuttonclick'");
        $update=mysql_query("update settings set setting='$proptcearnp' where name='proptcearn'");
        $update=mysql_query("update settings set setting='$prohotlinkearnp' where name='prohotlinkearn'");
      $update=mysql_query("update settings set setting='$hotlinkprice1p' where name='hotlinkprice1'");
        $update=mysql_query("update settings set setting='$hotlinkpointprice1p' where name='hotlinkpointprice1'");
        $update=mysql_query("update settings set setting='$hotlinkprice2p' where name='hotlinkprice2'");
        $update=mysql_query("update settings set setting='$hotlinkpointprice2p' where name='hotlinkpointprice2'");
        $update=mysql_query("update settings set setting='$hotlinkprice3p' where name='hotlinkprice3'");
        $update=mysql_query("update settings set setting='$hotlinkpointprice3p' where name='hotlinkpointprice3'");
$update=mysql_query("update settings set setting='$ptc1pointsp' where name='ptc1points'");
$update=mysql_query("update settings set setting='$ptc2pointsp' where name='ptc2points'");
$update=mysql_query("update settings set setting='$ptc3pointsp' where name='ptc3points'");
$update=mysql_query("update settings set setting='$ptc1p' where name='ptc1'");
$update=mysql_query("update settings set setting='$ptc2p' where name='ptc2'");
$update=mysql_query("update settings set setting='$ptc3p' where name='ptc3'");
$update=mysql_query("update settings set setting='$adminproclickearnp' where name='adminproclickearn'");
$update=mysql_query("update settings set setting='$sopointpricep' where name='sopointprice'");
$update=mysql_query("update settings set setting='$safpricep' where name='safprice'");
$update=mysql_query("update settings set setting='$safpointpricep' where name='safpointprice'");
$update=mysql_query("update settings set setting='$prosupercomp' where name='prosupercom'");
$update=mysql_query("update settings set setting='$projvcomp' where name='projvcom'");
$update=mysql_query("update settings set setting='$jvpointsp' where name='jvpoints'");
$update=mysql_query("update settings set setting='$jvintervalp' where name='jvinterval'");
$update=mysql_query("update settings set setting='$jvpointsmonthlyp' where name='jvpointsmonthly'");
$update=mysql_query("update settings set setting='$jvpricep' where name='jvprice'");
$update=mysql_query("update settings set setting='$jvpointpricep' where name='jvpointprice'");
$update=mysql_query("update settings set setting='$jvreadearnp' where name='jvreadearn'");
$update=mysql_query("update settings set setting='$jvhtmlearnp' where name='jvhtmlearn'");
$update=mysql_query("update settings set setting='$jvbannerearnp' where name='jvbannerearn'");
$update=mysql_query("update settings set setting='$jvclickearnp' where name='jvclickearn'");
$update=mysql_query("update settings set setting='$jvtrafficearnp' where name='jvtrafficearn'");
$update=mysql_query("update settings set setting='$jvhotlinkearnp' where name='jvhotlinkearn'");
$update=mysql_query("update settings set setting='$jvbuttonclickp' where name='jvbuttonclick'");
$update=mysql_query("update settings set setting='$jvptcearnp' where name='jvptcearn'");
$update=mysql_query("update settings set setting='$adminjvclickearnp' where name='adminjvclickearn'");
$update=mysql_query("update settings set setting='$jvpostp' where name='jvpost'");
$update=mysql_query("update settings set setting='$jvposthtmlp' where name='jvposthtml'");
$update=mysql_query("update settings set setting='$jvsavep' where name='jvsave'");
$update=mysql_query("update settings set setting='$jvsavehtmlp' where name='jvsavehtml'");
$update=mysql_query("update settings set setting='$jvsavesolosp' where name='jvsavesolos'");
$update=mysql_query("update settings set setting='$jvurlsp' where name='jvurls'");
$update=mysql_query("update settings set setting='$jvrefloginp' where name='jvreflogin'");
$update=mysql_query("update settings set setting='$jvrefpointsp' where name='jvrefpoints'");
$update=mysql_query("update settings set setting='$jvcommissionp' where name='jvcommission'");
$update=mysql_query("update settings set setting='$jvpercentp' where name='jvpercent'");
$update=mysql_query("update settings set setting='$jvbuycomp' where name='jvbuycom'");
$update=mysql_query("update settings set setting='$jvsupercomp' where name='jvsupercom'");
$update=mysql_query("update settings set setting='$jvjvcomp' where name='jvjvcom'");
$update=mysql_query("update settings set setting='$superjvpointsp' where name='superjvpoints'");
$update=mysql_query("update settings set setting='$superjvpointsmonthlyp' where name='superjvpointsmonthly'");
$update=mysql_query("update settings set setting='$superjvpricep' where name='superjvprice'");
$update=mysql_query("update settings set setting='$superjvintervalp' where name='superjvinterval'");
$update=mysql_query("update settings set setting='$superjvpricepointsp' where name='superjvpricepoints'");
$update=mysql_query("update settings set setting='$superjvreadearnp' where name='superjvreadearn'");
$update=mysql_query("update settings set setting='$superjvhtmlearnp' where name='superjvhtmlearn'");
$update=mysql_query("update settings set setting='$superjvbannerclickp' where name='superjvbannerclick'");
$update=mysql_query("update settings set setting='$superjvclickearnp' where name='superjvclickearn'");
$update=mysql_query("update settings set setting='$superjvtrafficearnp' where name='superjvtrafficearn'");
$update=mysql_query("update settings set setting='$superjvhotlinkearnp' where name='superjvhotlinkearn'");
$update=mysql_query("update settings set setting='$superjvbuttonclickp' where name='superjvbuttonclick'");
$update=mysql_query("update settings set setting='$adminsuperjvclickearnp' where name='adminsuperjvclickearn'");
$update=mysql_query("update settings set setting='$superjvpostp' where name='superjvpost'");
$update=mysql_query("update settings set setting='$superjvposthtmlp' where name='superjvposthtml'");
$update=mysql_query("update settings set setting='$superjvsavep' where name='superjvsave'");
$update=mysql_query("update settings set setting='$superjvsavehtmlp' where name='superjvsavehtml'");
$update=mysql_query("update settings set setting='$superjvsavesolosp' where name='superjvsavesolos'");
$update=mysql_query("update settings set setting='$superjvurlsp' where name='superjvurls'");
$update=mysql_query("update settings set setting='$superjvrefloginp' where name='superjvreflogin'");
$update=mysql_query("update settings set setting='$superjvrefpointsp' where name='superjvrefpoints'");
$update=mysql_query("update settings set setting='$superjvcommissionp' where name='superjvcommission'");
$update=mysql_query("update settings set setting='$superjvpercentp' where name='superjvpercent'");
$update=mysql_query("update settings set setting='$superjvbuycomp' where name='superjvbuycom'");
$update=mysql_query("update settings set setting='$superjvprocomp' where name='superjvprocom'");
$update=mysql_query("update settings set setting='$superjvjvcomp' where name='superjvjvcom'");
$update=mysql_query("update settings set setting='$superjv2supercomp' where name='superjv2supercom'");
$update=mysql_query("update settings set setting='$superjvptcearnp' where name='superjvptcearn'");
$update=mysql_query("update settings set setting='$pronavtopearnp' where name='pronavtopearn'");
$update=mysql_query("update settings set setting='$jvnavtopearnp' where name='jvnavtopearn'");
$update=mysql_query("update settings set setting='$superjvnavtopearnp' where name='superjvnavtopearn'");
$update=mysql_query("update settings set setting='$navtoppricep' where name='navtopprice'");
$update=mysql_query("update settings set setting='$navtoppointpricep' where name='navtoppointprice'");
$update=mysql_query("update settings set setting='$probotnavearnp' where name='probotnavearn'");
$update=mysql_query("update settings set setting='$jvbotnavearnp' where name='jvbotnavearn'");
$update=mysql_query("update settings set setting='$superjvbotnavearnp' where name='superjvbotnavearn'");
$update=mysql_query("update settings set setting='$superjvfullloginadearnp' where name='superjvfullloginadearn'");
$update=mysql_query("update settings set setting='$jvfullloginadearnp' where name='jvfullloginadearn'");
$update=mysql_query("update settings set setting='$profullloginadearnp' where name='profullloginadearn'");
$update=mysql_query("update settings set setting='$superjvfullloginadpricep' where name='superjvfullloginadprice'");
$update=mysql_query("update settings set setting='$jvfullloginadpricep' where name='jvfullloginadprice'");
$update=mysql_query("update settings set setting='$profullloginadpricep' where name='profullloginadprice'");
$update=mysql_query("update settings set setting='$fullloginadpointpricesuperjvp' where name='fullloginadpointpricesuperjv'");
$update=mysql_query("update settings set setting='$fullloginadpointpricejvp' where name='fullloginadpointpricejv'");
$update=mysql_query("update settings set setting='$fullloginadpointpriceprop' where name='fullloginadpointpricepro'");
$update=mysql_query("update settings set setting='$superjvfullloginadcredittimerp' where name='superjvfullloginadcredittimer'");
$update=mysql_query("update settings set setting='$jvfullloginadcredittimerp' where name='jvfullloginadcredittimer'");
$update=mysql_query("update settings set setting='$profullloginadcredittimerp' where name='profullloginadcredittimer'");
$update=mysql_query("update settings set setting='$superjvfeaturedadearnp' where name='superjvfeaturedadearn'");
$update=mysql_query("update settings set setting='$jvfeaturedadearnp' where name='jvfeaturedadearn'");
$update=mysql_query("update settings set setting='$profeaturedadearnp' where name='profeaturedadearn'");
$update=mysql_query("update settings set setting='$superjvfeaturedadpricep' where name='superjvfeaturedadprice'");
$update=mysql_query("update settings set setting='$jvfeaturedadpricep' where name='jvfeaturedadprice'");
$update=mysql_query("update settings set setting='$profeaturedadpricep' where name='profeaturedadprice'");
$update=mysql_query("update settings set setting='$featuredadpointpricesuperjvp' where name='featuredadpointpricesuperjv'");
$update=mysql_query("update settings set setting='$featuredadpointpricejvp' where name='featuredadpointpricejv'");
$update=mysql_query("update settings set setting='$featuredadpointpriceprop' where name='featuredadpointpricepro'");
$update=mysql_query("update settings set setting='$superjvfeaturedadcredittimerp' where name='superjvfeaturedadcredittimer'");
$update=mysql_query("update settings set setting='$jvfeaturedadcredittimerp' where name='jvfeaturedadcredittimer'");
$update=mysql_query("update settings set setting='$profeaturedadcredittimerp' where name='profeaturedadcredittimer'");
$update=mysql_query("update settings set setting='$superjvfeaturedadmaxhitsp' where name='superjvfeaturedadmaxhits'");
$update=mysql_query("update settings set setting='$jvfeaturedadmaxhitsp' where name='jvfeaturedadmaxhits'");
$update=mysql_query("update settings set setting='$profeaturedadmaxhitsp' where name='profeaturedadmaxhits'");
$update=mysql_query("update settings set setting='$superjvhheadlineadearnp' where name='superjvhheadlineadearn'");
$update=mysql_query("update settings set setting='$jvhheadlineadearnp' where name='jvhheadlineadearn'");
$update=mysql_query("update settings set setting='$prohheadlineadearnp' where name='prohheadlineadearn'");
$update=mysql_query("update settings set setting='$superjvhheadlineadpricep' where name='superjvhheadlineadprice'");
$update=mysql_query("update settings set setting='$jvhheadlineadpricep' where name='jvhheadlineadprice'");
$update=mysql_query("update settings set setting='$prohheadlineadpricep' where name='prohheadlineadprice'");
$update=mysql_query("update settings set setting='$hheadlineadpointpricesuperjvp' where name='hheadlineadpointpricesuperjv'");
$update=mysql_query("update settings set setting='$hheadlineadpointpricejvp' where name='hheadlineadpointpricejv'");
$update=mysql_query("update settings set setting='$hheadlineadpointpriceprop' where name='hheadlineadpointpricepro'");
$update=mysql_query("update settings set setting='$superjvhheadlineadcredittimerp' where name='superjvhheadlineadcredittimer'");
$update=mysql_query("update settings set setting='$jvhheadlineadcredittimerp' where name='jvhheadlineadcredittimer'");
$update=mysql_query("update settings set setting='$prohheadlineadcredittimerp' where name='prohheadlineadcredittimer'");
$update=mysql_query("update settings set setting='$superjvhheadlineadmaxhitsp' where name='superjvhheadlineadmaxhits'");
$update=mysql_query("update settings set setting='$jvhheadlineadmaxhitsp' where name='jvhheadlineadmaxhits'");
$update=mysql_query("update settings set setting='$prohheadlineadmaxhitsp' where name='prohheadlineadmaxhits'");
$update=mysql_query("update settings set setting='$superjvhheaderadearnp' where name='superjvhheaderadearn'");
$update=mysql_query("update settings set setting='$jvhheaderadearnp' where name='jvhheaderadearn'");
$update=mysql_query("update settings set setting='$prohheaderadearnp' where name='prohheaderadearn'");
$update=mysql_query("update settings set setting='$superjvhheaderadpricep' where name='superjvhheaderadprice'");
$update=mysql_query("update settings set setting='$jvhheaderadpricep' where name='jvhheaderadprice'");
$update=mysql_query("update settings set setting='$prohheaderadpricep' where name='prohheaderadprice'");
$update=mysql_query("update settings set setting='$hheaderadpointpricesuperjvp' where name='hheaderadpointpricesuperjv'");
$update=mysql_query("update settings set setting='$hheaderadpointpricejvp' where name='hheaderadpointpricejv'");
$update=mysql_query("update settings set setting='$hheaderadpointpriceprop' where name='hheaderadpointpricepro'");
$update=mysql_query("update settings set setting='$superjvhheaderadcredittimerp' where name='superjvhheaderadcredittimer'");
$update=mysql_query("update settings set setting='$jvhheaderadcredittimerp' where name='jvhheaderadcredittimer'");
$update=mysql_query("update settings set setting='$prohheaderadcredittimerp' where name='prohheaderadcredittimer'");
$update=mysql_query("update settings set setting='$superjvhheaderadmaxhitsp' where name='superjvhheaderadmaxhits'");
$update=mysql_query("update settings set setting='$jvhheaderadmaxhitsp' where name='jvhheaderadmaxhits'");
$update=mysql_query("update settings set setting='$prohheaderadmaxhitsp' where name='prohheaderadmaxhits'");
$update=mysql_query("update settings set setting='$hheaderadmaxheadingcharsp' where name='hheaderadmaxheadingchars'");
$update=mysql_query("update settings set setting='$hheaderadmaxdesccharsp' where name='hheaderadmaxdescchars'");
$update=mysql_query("update settings set setting='$hheaderadtopnotefontcolorp' where name='hheaderadtopnotefontcolor'");
$update=mysql_query("update settings set setting='$hheaderadtopnotefontfacep' where name='hheaderadtopnotefontface'");
$update=mysql_query("update settings set setting='$hheaderadtopnotefontsizep' where name='hheaderadtopnotefontsize'");
$update=mysql_query("update settings set setting='$hheaderadtopnotebgcolorp' where name='hheaderadtopnotebgcolor'");
$update=mysql_query("update settings set setting='$hheaderadbottomnotefontcolorp' where name='hheaderadbottomnotefontcolor'");
$update=mysql_query("update settings set setting='$hheaderadbottomnotefontfacep' where name='hheaderadbottomnotefontface'");
$update=mysql_query("update settings set setting='$hheaderadbottomnotefontsizep' where name='hheaderadbottomnotefontsize'");
$update=mysql_query("update settings set setting='$hheaderadbottomnotebgcolorp' where name='hheaderadbottomnotebgcolor'");
$update=mysql_query("update settings set setting='$autoapproveenablep' where name='autoapproveenable'");
$update=mysql_query("update settings set setting='$autoapproveenablesurfp' where name='autoapproveenablesurf'");
$update=mysql_query("update settings set setting='$prosurfurlsp' where name='prosurfurls'");
$update=mysql_query("update settings set setting='$jvsurfurlsp' where name='jvsurfurls'");
$update=mysql_query("update settings set setting='$superjvsurfurlsp' where name='superjvsurfurls'");
$update=mysql_query("update settings set setting='$prosurfcreditspersitep' where name='prosurfcreditspersite'");
$update=mysql_query("update settings set setting='$jvsurfcreditspersitep' where name='jvsurfcreditspersite'");
$update=mysql_query("update settings set setting='$superjvsurfcreditspersitep' where name='superjvsurfcreditspersite'");
$update=mysql_query("update settings set setting='$prosurftimerp' where name='prosurftimer'");
$update=mysql_query("update settings set setting='$jvsurftimerp' where name='jvsurftimer'");
$update=mysql_query("update settings set setting='$superjvsurftimerp' where name='superjvsurftimer'");
$update=mysql_query("update settings set setting='$prosurfratiop' where name='prosurfratio'");
$update=mysql_query("update settings set setting='$jvsurfratiop' where name='jvsurfratio'");
$update=mysql_query("update settings set setting='$superjvsurfratiop' where name='superjvsurfratio'");
$update=mysql_query("update settings set setting='$prosurfcreditsignupbonusp' where name='prosurfcreditsignupbonus'");
$update=mysql_query("update settings set setting='$jvsurfcreditsignupbonusp' where name='jvsurfcreditsignupbonus'");
$update=mysql_query("update settings set setting='$superjvcreditsignupbonusp' where name='superjvcreditsignupbonus'");
$update=mysql_query("update settings set setting='$prodailysurfsitestopostadsp' where name='prodailysurfsitestopostads'");
$update=mysql_query("update settings set setting='$jvdailysurfsitestopostadsp' where name='jvdailysurfsitestopostads'");
$update=mysql_query("update settings set setting='$superjvdailysurfsitestopostadsp' where name='superjvdailysurfsitestopostads'");
$update=mysql_query("update settings set setting='$showmembercountp' where name='showmembercount'");
$update=mysql_query("update settings set setting='$showperlevelmembercountp' where name='showperlevelmembercount'");

        echo "<p><b>Your settings have been saved.</b></p>";

    }

    else {

    ?>

       <H2><? echo $sitename; ?> Site Settings</H2>

       <p>Is is absolutely vital you set this up first before doing anything else. You can change your settings at any time you wish.</p>

       <form action="settings.php" method="POST">

       <input type="hidden" name="action" value="save">

<hr>
<table width="650"><tr><td><p align="left">
Do you want to enable Auto-Approve for Solo Ads?&nbsp;<select name="autoapproveenablep"><option value="yes" <?php if ($autoapproveenable == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($autoapproveenable != "yes") { echo "selected"; } ?>>NO</option></select>
</td></td></table>
<hr>
<table width="650"><tr><td><p align="left">
Do you want to enable Auto-Approve for Surf URLs?&nbsp;<select name="autoapproveenablesurfp"><option value="yes" <?php if ($autoapproveenablesurf == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($autoapproveenablesurf != "yes") { echo "selected"; } ?>>NO</option></select>
</td></td></table>
<hr>
<table width="650"><tr><td><p align="left">
Show Total Membership Count:&nbsp;<select name="showmembercountp"><option value="yes" <?php if ($showmembercount == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($showmembercount != "yes") { echo "selected"; } ?>>NO</option></select>
</td></td></table>
<hr>
<table width="650"><tr><td><p align="left">
Show Per Level Membership Count:&nbsp;<select name="showperlevelmembercountp"><option value="yes" <?php if ($showperlevelmembercount == "yes") { echo "selected"; } ?>>YES</option><option value="no" <?php if ($showperlevelmembercount != "yes") { echo "selected"; } ?>>NO</option></select>
</td></td></table>
<hr>


      <H2>Site Price Settings</H2>
<table width="650"><tr><td><p align="left">
Jv Member Upgrade Price&nbsp;
<input type="text" name="jvpointpricep" value="<? echo $jvpointprice; ?>"> points or $<input type="text" name="jvpricep" value="<? echo $jvprice; ?>"><br><br>

<?php echo $middlelevel ?> Member Payment Interval&nbsp;
       <select name="jvintervalp">
           <? if ($jvinterval=="Monthly") { ?>
                  <option>Monthly</option>
                  <option>Yearly</option>
                  <option>Lifetime</option>
       <?} elseif ($jvinterval=="Yearly") { ?>
                  <option>Yearly</option>
                  <option>Monthly</option>
                  <option>Lifetime</option>
       <?} elseif ($prointerval=="Lifetime") { ?>
                  <option>Lifetime</option>
                  <option>Monthly</option>
	  <option>Yearly</option>
       <?} else { ?>
                  <option>Monthly</option>
	  <option>Yearly</option>
                  <option>Lifetime</option>
       <?} ?>
   </select><br><br>

<?php echo $toplevel ?> Upgrade Price&nbsp;<input type="text" name="superjvpricepointsp" value="<? echo $superjvpricepoints; ?>"> &nbsp;points or $<input type="text" name="superjvpricep" value="<? echo $superjvprice; ?>"><br><br>
       

<?php echo $toplevel ?> Payment Interval&nbsp;
       <select name="superjvintervalp">
       <? if ($superjvinterval=="Monthly") { ?>
                    <option>Monthly</option>
	    <option>Yearly</option>
                    <option>Lifetime</option>
       <?} elseif ($superjvinterval=="Yearly") { ?>
                   <option>Yearly</option>
                   <option>Monthly</option>
                   <option>Lifetime</option>
       <?} elseif ($superjvinterval=="Lifetime") { ?>
                    <option>Lifetime</option>
                    <option>Monthly</option>
	    <option>Yearly</option>
       <?} else { ?>
                    <option>Monthly</option>
	    <option>Yearly</option>
                    <option>Lifetime</option>
       <?} ?>
	   </select><br><br>
Price per 1000 points&nbsp;$<input type="text" name="pointpricep" value="<? echo $pointprice; ?>"><br><br>
	  
Price per 1000 banner impressions&nbsp;<input type="text" name="bannerpointpricep" value="<? echo $bannerpointprice; ?>"> points or
$<input type="text" name="bannerpricep" value="<? echo $bannerprice; ?>"><br><br>

Price per button banner ad with 1000 views&nbsp;<input type="text" name="buttonpointpricep" value="<? echo $buttonpointprice; ?>"> points or	   $<input type="text" name="buttonpricep" value="<? echo $buttonprice; ?>"><br><br>

Price per 50 traffic link views&nbsp;<input type="text" name="tlinkpoints1p" value="<? echo $tlinkpoints1; ?>"> points or $<input type="text" name="tlinkprice1p" value="<? echo $tlinkprice1; ?>"><br><br>

Price per 100 traffic link views&nbsp;<input type="text" name="tlinkpoints2p" value="<? echo $tlinkpoints2; ?>"> points or $<input type="text" name="tlinkprice2p" value="<? echo $tlinkprice2; ?>"><br><br>

Price per 200 traffic link views&nbsp;<input type="text" name="tlinkpoints3p" value="<? echo $tlinkpoints3; ?>"> points or $<input type="text" name="tlinkprice3p" value="<? echo $tlinkprice3; ?>"><br><br>
	   
Price per 5000 hotlink impressions&nbsp;<input type="text" name="hotlinkpointprice1p" value="<? echo $hotlinkpointprice1; ?>"> points or $<input type="text" name="hotlinkprice1p" value="<? echo $hotlinkprice1; ?>"><br><br>
 
Price per 10000 hotlink impressions&nbsp;<input type="text" name="hotlinkpointprice2p" value="<? echo $hotlinkpointprice2; ?>"> points or $<input type="text" name="hotlinkprice2p" value="<? echo $hotlinkprice2; ?>"><br><br>

Price per 20000 hotlink impressions&nbsp;
<input type="text" name="hotlinkpointprice3p" value="<? echo $hotlinkpointprice3; ?>"> points or$<input type="text" name="hotlinkprice3p" value="<? echo $hotlinkprice3; ?>"><br><br>

Price per 50 ptc ad views&nbsp;<input type="text" name="ptc1pointsp" value="<? echo $ptc1points; ?>"> points or $<input type="text" name="ptc1p" value="<? echo $ptc1; ?>"><br><br>

Price per 100 ptc ad views&nbsp;<input type="text" name="ptc2pointsp" value="<? echo $ptc2points; ?>"> points or $<input type="text" name="ptc2p" value="<? echo $ptc2; ?>"><br><br>

Price per 200 ptc ad views&nbsp;<input type="text" name="ptc3pointsp" value="<? echo $ptc3points; ?>"> points or $<input type="text" name="ptc3p" value="<? echo $ptc3; ?>"><br><br>

Price per solo ad&nbsp;<input type="text" name="solopointpricep" value="<? echo $solopointprice; ?>"> points or $<input type="text" name="solopricep" value="<? echo $soloprice; ?>"><br><br>

Price per solo footer ad&nbsp;<input type="text" name="safpointpricep" value="<? echo $safpointprice; ?>"> points or $<input type="text" name="safpricep" value="<? echo $safprice; ?>"><br><br>

Price per login ad with 1000 views&nbsp;<input type="text" name="loginpricepointsp" value="<? echo $loginpricepoints; ?>"> points or	   $<input type="text" name="loginpricep" value="<? echo $loginprice; ?>"><br><br>

Price per top navigation link&nbsp;<input type="text" name="navtoppointpricep" value="<? echo $navtoppointprice; ?>"> points or $<input type="text" name="navtoppricep" value="<? echo $navtopprice; ?>"><br><br>

Price per bottom navigation link&nbsp;<input type="text" name="navpricepointsp" value="<? echo $navpricepoints; ?>"> points or $<input type="text" name="navpricep" value="<? echo $navprice; ?>"><br><br>

Max # of top navigation links&nbsp;<input type="text" name="topnavmaxp" value="<? echo $topnavmax; ?>"><br><br>

Max # of bottom navigation links&nbsp;<input type="text" name="navmaxp" value="<? echo $navmax; ?>"><br><br>

Points Price for Special Offer Package&nbsp;<input type="text" name="sopointpricep" value="<? echo $sopointprice; ?>"> points<br>(The same special offer as when logging in, can trade points for in the advertising area)<br><br>

<?php echo $lowerlevel ?> Member Price per day for a Full Page Login Ad (set points to 0 if you don't want <?php echo $lowerlevel ?> members to be able to trade points for full page login ads)<br>$<input type="text" name="profullloginadpricep" value="<? echo $profullloginadprice; ?>"> or <input type="text" name="fullloginadpointpriceprop" value="<? echo $fullloginadpointpricepro; ?>"> points<br><br>
<?php echo $middlelevel ?> Member Price per day for a Full Page Login Ad (set points to 0 if you don't want <?php echo $middlelevel ?> members to be able to trade points for full page login ads)<br>$<input type="text" name="jvfullloginadpricep" value="<? echo $jvfullloginadprice; ?>"> or <input type="text" name="fullloginadpointpricejvp" value="<? echo $fullloginadpointpricejv; ?>"> points<br><br>
<?php echo $toplevel ?> Member Price per day for a Full Page Login Ad (set points to 0 if you don't want <?php echo $toplevel ?> members to be able to trade points for full page login ads)<br>$<input type="text" name="superjvfullloginadpricep" value="<? echo $superjvfullloginadprice; ?>"> or <input type="text" name="fullloginadpointpricesuperjvp" value="<? echo $fullloginadpointpricesuperjv; ?>"> points<br><br>

<?php echo $lowerlevel ?> Member Price per <input type="text" name="profeaturedadmaxhitsp" value="<? echo $profeaturedadmaxhits; ?>" size="4"> impressions for a Featured Ad (set points to 0 if you don't want <?php echo $lowerlevel ?> members to be able to trade points for featured ads)<br>$<input type="text" name="profeaturedadpricep" value="<? echo $profeaturedadprice; ?>"> or <input type="text" name="featuredadpointpriceprop" value="<? echo $featuredadpointpricepro; ?>"> points<br><br>
<?php echo $middlelevel ?> Member Price per <input type="text" name="jvfeaturedadmaxhitsp" value="<? echo $jvfeaturedadmaxhits; ?>" size="4"> impressions for a Featured Ad (set points to 0 if you don't want <?php echo $middlelevel ?> members to be able to trade points for featured ads)<br>$<input type="text" name="jvfeaturedadpricep" value="<? echo $jvfeaturedadprice; ?>"> or <input type="text" name="featuredadpointpricejvp" value="<? echo $featuredadpointpricejv; ?>"> points<br><br>
<?php echo $toplevel ?> Member Price per <input type="text" name="superjvfeaturedadmaxhitsp" value="<? echo $superjvfeaturedadmaxhits; ?>" size="4"> impressions for a Featured Ad (set points to 0 if you don't want <?php echo $toplevel ?> members to be able to trade points for featured ads)<br>$<input type="text" name="superjvfeaturedadpricep" value="<? echo $superjvfeaturedadprice; ?>"> or <input type="text" name="featuredadpointpricesuperjvp" value="<? echo $featuredadpointpricesuperjv; ?>"> points<br><br>

<?php echo $lowerlevel ?> Member Price per <input type="text" name="prohheadlineadmaxhitsp" value="<? echo $prohheadlineadmaxhits; ?>" size="4"> clicks for a Hot Headline Ad (set points to 0 if you don't want <?php echo $lowerlevel ?> members to be able to trade points for hot headline ads)<br>$<input type="text" name="prohheadlineadpricep" value="<? echo $prohheadlineadprice; ?>"> or <input type="text" name="hheadlineadpointpriceprop" value="<? echo $hheadlineadpointpricepro; ?>"> points<br><br>
<?php echo $middlelevel ?> Member Price per <input type="text" name="jvhheadlineadmaxhitsp" value="<? echo $jvhheadlineadmaxhits; ?>" size="4"> clicks for a Hot Headline Ad (set points to 0 if you don't want <?php echo $middlelevel ?> members to be able to trade points for hot headline ads)<br>$<input type="text" name="jvhheadlineadpricep" value="<? echo $jvhheadlineadprice; ?>"> or <input type="text" name="hheadlineadpointpricejvp" value="<? echo $hheadlineadpointpricejv; ?>"> points<br><br>
<?php echo $toplevel ?> Member Price per <input type="text" name="superjvhheadlineadmaxhitsp" value="<? echo $superjvhheadlineadmaxhits; ?>" size="4"> clicks for a Hot Headline Ad (set points to 0 if you don't want <?php echo $toplevel ?> members to be able to trade points for hot headline ads)<br>$<input type="text" name="superjvhheadlineadpricep" value="<? echo $superjvhheadlineadprice; ?>"> or <input type="text" name="hheadlineadpointpricesuperjvp" value="<? echo $hheadlineadpointpricesuperjv; ?>"> points<br><br>

<?php echo $lowerlevel ?> Member Price per <input type="text" name="prohheaderadmaxhitsp" value="<? echo $prohheaderadmaxhits; ?>" size="4"> clicks for a Hot Header Ad (set points to 0 if you don't want <?php echo $lowerlevel ?> members to be able to trade points for hot header ads)<br>$<input type="text" name="prohheaderadpricep" value="<? echo $prohheaderadprice; ?>"> or <input type="text" name="hheaderadpointpriceprop" value="<? echo $hheaderadpointpricepro; ?>"> points<br><br>
<?php echo $middlelevel ?> Member Price per <input type="text" name="jvhheaderadmaxhitsp" value="<? echo $jvhheaderadmaxhits; ?>" size="4"> clicks for a Hot Header Ad (set points to 0 if you don't want <?php echo $middlelevel ?> members to be able to trade points for hot header ads)<br>$<input type="text" name="jvhheaderadpricep" value="<? echo $jvhheaderadprice; ?>"> or <input type="text" name="hheaderadpointpricejvp" value="<? echo $hheaderadpointpricejv; ?>"> points<br><br>
<?php echo $toplevel ?> Member Price per <input type="text" name="superjvhheaderadmaxhitsp" value="<? echo $superjvhheaderadmaxhits; ?>" size="4"> clicks for a Hot Header Ad (set points to 0 if you don't want <?php echo $toplevel ?> members to be able to trade points for hot header ads)<br>$<input type="text" name="superjvhheaderadpricep" value="<? echo $superjvhheaderadprice; ?>"> or <input type="text" name="hheaderadpointpricesuperjvp" value="<? echo $hheaderadpointpricesuperjv; ?>"> points<br><br>
       <hr>

</td></tr></table> 	   
		   
	  
       <H2>Members Commission Settings</H2>
<table width="650"><tr><td><p align="left">
When a <?php echo $lowerlevel ?> member joins, a <?php echo $lowerlevel ?> referrer is paid&nbsp;$<input type="text" name="procommissionp" value="<? echo $procommission; ?>"><br><br>

When a <?php echo $lowerlevel ?> member joins, a <?php echo $middlelevel ?> Member referrer is paid&nbsp;$<input type="text" name="jvcommissionp" value="<? echo $jvcommission; ?>"><br><br>
 
When a <?php echo $lowerlevel ?> member joins, a <?php echo $toplevel ?> referrer is paid&nbsp;$<input type="text" name="superjvcommissionp" value="<? echo $superjvcommission; ?>"><br><br>

When a <?php echo $middlelevel ?> Member joins, a <?php echo $lowerlevel ?> referrer is paid&nbsp;$<input type="text" name="projvcomp" value="<? echo $projvcom; ?>"><br><br>

When a <?php echo $middlelevel ?> Member joins, a <?php echo $middlelevel ?> Member referrer is paid&nbsp;$<input type="text" name="jvjvcomp" value="<? echo $jvjvcom; ?>"><br><br>

When a <?php echo $middlelevel ?> Member joins, a <?php echo $toplevel ?> referrer is paid&nbsp;$<input type="text" name="superjvjvcomp" value="<? echo $superjvjvcom; ?>"><br><br>

When a <?php echo $toplevel ?> Member joins, a <?php echo $lowerlevel ?> referrer is paid&nbsp;$<input type="text" name="prosupercomp" value="<? echo $prosupercom; ?>"><br><br>
	
When a <?php echo $toplevel ?> Member joins, a <?php echo $middlelevel ?> Member referrer is paid&nbsp;$<input type="text" name="jvsupercomp" value="<? echo $jvsupercom; ?>"><br><br>

When a <?php echo $toplevel ?> Member joins, a <?php echo $toplevel ?> referrer is paid&nbsp;$<input type="text" name="superjv2supercomp" value="<? echo $superjv2supercom; ?>"><br><br>  

When a member logins, a <?php echo $lowerlevel ?> referrer is paid&nbsp;<input type="text" name="prorefloginp" value="<? echo $proreflogin; ?>"> points<br><br>

When a member logins, a <?php echo $middlelevel ?> Member referrer is paid&nbsp;<input type="text" name="jvrefloginp" value="<? echo $jvreflogin; ?>"> points<br><br>	 

When a member logins, a <?php echo $toplevel ?> referrer is paid&nbsp;<input type="text" name="superjvrefloginp" value="<? echo $superjvreflogin; ?>"> points<br><br>	
When a member earn points, a <?php echo $lowerlevel ?> referrer earns&nbsp;<input type="text" name="propercentp" value="<? echo $propercent; ?>">%<br><br>

When a member earn points, a <?php echo $middlelevel ?> Member referrer earns&nbsp;<input type="text" name="jvpercentp" value="<? echo $jvpercent; ?>">%<br><br>

When a member earn points, a <?php echo $toplevel ?> referrer earns&nbsp;<input type="text" name="superjvpercentp" value="<? echo $superjvpercent; ?>">%<br><br>
	   
When a member buys advertising, a <?php echo $lowerlevel ?> referrer earns&nbsp;<input type="text" name="probuycomp" value="<? echo $probuycom; ?>">%<br><br>

When a member buys advertising, a <?php echo $middlelevel ?> Member referrer earns&nbsp;<input type="text" name="jvbuycomp" value="<? echo $jvbuycom; ?>">%<br><br>

When a member buys advertising, a <?php echo $toplevel ?> referrer earns&nbsp;<input type="text" name="superjvbuycomp" value="<? echo $superjvbuycom; ?>">%<br><br>
<hr>
</td></tr></table>
       <H2>Posting Frequency Settings</H2>
<table width="650"><tr><td><p align="left">
       <p>An ad stays active on the system for 24 hours. How often do you wish your members to be able to post in days (24 hours)?</p>

How many text ads can a <?php echo $lowerlevel ?> member post per day?&nbsp;<input type="text" name="propostp" value="<? echo $propost; ?>"><br><br>

How many text ads can a <?php echo $middlelevel ?> member post per day?&nbsp;<input type="text" name="jvpostp" value="<? echo $jvpost; ?>"><br><br>

How many text ads can a <?php echo $toplevel ?> member post per day?&nbsp;<input type="text" name="superjvpostp" value="<? echo $superjvpost; ?>"><br><br>

How many html ads can a <?php echo $lowerlevel ?> member post per day?&nbsp;<input type="text" name="proposthtmlp" value="<? echo $proposthtml; ?>"><br><br>

How many html ads can a <?php echo $middlelevel ?> member post per day?&nbsp;<input type="text" name="jvposthtmlp" value="<? echo $jvposthtml; ?>"><br><br>

How many html ads can a <?php echo $toplevel ?> member post per day?&nbsp;<input type="text" name="superjvposthtmlp" value="<? echo $superjvposthtml; ?>"><br><br>

How many text ads can a <?php echo $lowerlevel ?> member save?&nbsp;<input type="text" name="prosavep" value="<? echo $prosave; ?>"><br><br>

How many text ads can a <?php echo $middlelevel ?> member save?&nbsp;<input type="text" name="jvsavep" value="<? echo $jvsave; ?>"><br><br>
	   
How many text ads can a <?php echo $toplevel ?> member save?&nbsp;<input type="text" name="superjvsavep" value="<? echo $superjvsave; ?>"><br><br>

How many html ads can a <?php echo $lowerlevel ?> member save?&nbsp;<input type="text" name="prosavehtmlp" value="<? echo $prosavehtml; ?>"><br><br>

How many html ads can a <?php echo $middlelevel ?> member save?&nbsp;<input type="text" name="jvsavehtmlp" value="<? echo $jvsavehtml; ?>"><br><br>

How many html ads can a <?php echo $toplevel ?> member save?&nbsp;<input type="text" name="superjvsavehtmlp" value="<? echo $superjvsavehtml; ?>"><br><br>

How many solos can a <?php echo $lowerlevel ?> member save?&nbsp;<input type="text" name="prosavesolosp" value="<? echo $prosavesolos; ?>"><br><br>

How many solos can a <?php echo $middlelevel ?> member save?&nbsp;<input type="text" name="jvsavesolosp" value="<? echo $jvsavesolos; ?>"><br><br>

How many solos can a <?php echo $toplevel ?> member save?&nbsp;<input type="text" name="superjvsavesolosp" value="<? echo $superjvsavesolos; ?>"><br><br>

       <hr>
</td></tr></table>
              <H2>Point Earning Settings</H2>

<table width="650"><tr><td><p align="left">
   
<?php echo $lowerlevel ?> member points on signups&nbsp;<input type="text" name="propointsp" value="<? echo $propoints; ?>"><br><br>

<?php echo $middlelevel ?> member points on signups&nbsp;<input type="text" name="jvpointsp" value="<? echo $jvpoints; ?>"><br><br>

<?php echo $toplevel ?> member points on signups&nbsp;<input type="text" name="superjvpointsp" value="<? echo $superjvpoints; ?>"><br><br>
 
<?php echo $lowerlevel ?> members get this amount of points monthly&nbsp;<input type="text" name="propointsmonthlyp" value="<? echo $propointsmonthly; ?>"> <br><br>

<?php echo $middlelevel ?> members get this amount of points monthly&nbsp;<input type="text" name="jvpointsmonthlyp" value="<? echo $jvpointsmonthly; ?>"><br><br>

<?php echo $toplevel ?> members get this amount of points monthly&nbsp;<input type="text" name="superjvpointsmonthlyp" value="<? echo $superjvpointsmonthly; ?>"> <br><br>
 
When a new member joins, a <?php echo $lowerlevel ?> referrer gets this amount of points&nbsp;<input type="text" name="prorefpointsp" value="<? echo $prorefpoints; ?>"><br><br>

When a new member joins, a <?php echo $middlelevel ?> Member referrer gets this amount of points&nbsp;<input type="text" name="jvrefpointsp" value="<? echo $jvrefpoints; ?>"><br><br>

When a new member joins, a <?php echo $toplevel ?> referrer gets this amount of points&nbsp;<input type="text" name="superjvrefpointsp" value="<? echo $superjvrefpoints; ?>"><br><br>
 
How many points does a <?php echo $lowerlevel ?> member get for reading a text ad&nbsp;<input type="text" name="proreadearnp" value="<? echo $proreadearn; ?>"><br><br>

How many points does a <?php echo $middlelevel ?> member get for reading a text ad&nbsp;<input type="text" name="jvreadearnp" value="<? echo $jvreadearn; ?>"><br><br>

How many points does a <?php echo $toplevel ?> member get for reading a text ad&nbsp;<input type="text" name="superjvreadearnp" value="<? echo $superjvreadearn; ?>"><br><br>
	   
How many points does a <?php echo $lowerlevel ?> member get for reading an html ad&nbsp;<input type="text" name="prohtmlearnp" value="<? echo $prohtmlearn; ?>"><br><br>

How many points does a <?php echo $middlelevel ?> member get for reading an html ad&nbsp;<input type="text" name="jvhtmlearnp" value="<? echo $jvhtmlearn; ?>"><br><br>

How many points does a <?php echo $toplevel ?> member get for reading an html ad&nbsp;<input type="text" name="superjvhtmlearnp" value="<? echo $superjvhtmlearn; ?>"><br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a banner&nbsp;<input type="text" name="probannerearnp" value="<? echo $probannerearn; ?>"> <br><br>

How many points does a <?php echo $middlelevel ?> member get for clicking a banner&nbsp;<input type="text" name="jvbannerearnp" value="<? echo $jvbannerearn; ?>"> <br><br>

How many points does a <?php echo $toplevel ?> member get for clicking a banner&nbsp;<input type="text" name="superjvbannerclickp" value="<? echo $superjvbannerclick; ?>"> <br><br> 
	   
How many points does a <?php echo $lowerlevel ?> member get for clicking a button banner&nbsp;<input type="text" name="probuttonclickp" value="<? echo $probuttonclick; ?>"> <br><br>       

How many points does a <?php echo $middlelevel ?> member get for clicking a button banner&nbsp;<input type="text" name="jvbuttonclickp" value="<? echo $jvbuttonclick; ?>"><br><br>

How many points does a <?php echo $toplevel ?> member get for clicking a button banner&nbsp;<input type="text" name="superjvbuttonclickp" value="<? echo $superjvbuttonclick; ?>"><br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a hotlink&nbsp;<input type="text" name="prohotlinkearnp" value="<? echo $prohotlinkearn; ?>">
<br><br>
  
How many points does a <?php echo $middlelevel ?> member get for clicking a hotlink&nbsp;<input type="text" name="jvhotlinkearnp" value="<? echo $jvhotlinkearn; ?>">
<br><br>

How many points does a <?php echo $toplevel ?> member get for clicking a hotlink&nbsp;<input type="text" name="superjvhotlinkearnp" value="<? echo $superjvhotlinkearn; ?>"><br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a traffic link&nbsp;<input type="text" name="protrafficearnp" value="<? echo $protrafficearn; ?>"> <br><br>	

How many points does a <?php echo $middlelevel ?> member get for clicking a traffic link&nbsp;<input type="text" name="jvtrafficearnp" value="<? echo $jvtrafficearn; ?>"> <br><br>	   
How many points does a <?php echo $toplevel ?> member get for clicking a traffic link&nbsp;<input type="text" name="superjvtrafficearnp" value="<? echo $superjvtrafficearn; ?>"> <br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a nav top link&nbsp;<input type="text" name="pronavtopearnp" value="<? echo $pronavtopearn; ?>"> <br><br>	

How many points does a <?php echo $middlelevel ?> member get for clicking a nav top link&nbsp;<input type="text" name="jvnavtopearnp" value="<? echo $jvnavtopearn; ?>"> <br><br>	   
How many points does a <?php echo $toplevel ?> member get for clicking a nav top link&nbsp;<input type="text" name="superjvnavtopearnp" value="<? echo $superjvnavtopearn; ?>"> <br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a nav bottom link&nbsp;<input type="text" name="probotnavearnp" value="<? echo $probotnavearn; ?>"> <br><br>	

How many points does a <?php echo $middlelevel ?> member get for clicking a nav bottom link&nbsp;<input type="text" name="jvbotnavearnp" value="<? echo $jvbotnavearn; ?>"> <br><br>	   
How many points does a <?php echo $toplevel ?> member get for clicking a nav bottom link&nbsp;<input type="text" name="superjvbotnavearnp" value="<? echo $superjvbotnavearn; ?>"> <br><br>


When a <?php echo $lowerlevel ?> member clicks a ptc ad they get how much commissions&nbsp;$<input type="text" name="proptcearnp" value="<? echo $proptcearn; ?>"><br><br>


When a <?php echo $middlelevel ?> member clicks a ptc ad they get how much commissions&nbsp;$<input type="text" name="jvptcearnp" value="<? echo $jvptcearn; ?>"><br><br>

When a <?php echo $toplevel ?> member clicks a ptc ad they get how much commissions&nbsp;$<input type="text" name="superjvptcearnp" value="<? echo $superjvptcearn; ?>"><br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a solo ad link&nbsp;<input type="text" name="proclickearnp" value="<? echo $proclickearn; ?>"> <br><br>

How many points does a <?php echo $middlelevel ?> member get for clicking a solo ad link&nbsp;<input type="text" name="jvclickearnp" value="<? echo $jvclickearn; ?>"> <br><br>

How many points does a <?php echo $toplevel ?> member get for clicking a solo ad link&nbsp;<input type="text" name="superjvclickearnp" value="<? echo $superjvclickearn; ?>"> <br><br>
  
How many points does a <?php echo $lowerlevel ?> member get for clicking a admin email link&nbsp;<input type="text" name="adminproclickearnp" value="<? echo $adminproclickearn; ?>"> <br><br>	

How many points does a <?php echo $middlelevel ?> member get for clicking a admin email link&nbsp;<input type="text" name="adminjvclickearnp" value="<? echo $adminjvclickearn; ?>"> <br><br>

How many points does a <?php echo $toplevel ?> member get for clicking a admin email link&nbsp;<input type="text" name="adminsuperjvclickearnp" value="<? echo $adminsuperjvclickearn; ?>"> 

How many points does a <?php echo $lowerlevel ?> member get for viewing a Full Page Login Ad?&nbsp;<input type="text" name="profullloginadearnp" value="<? echo $profullloginadearn; ?>"> <br><br>	
How many points does a <?php echo $middlelevel ?> member get for viewing a Full Page Login Ad?&nbsp;<input type="text" name="jvfullloginadearnp" value="<? echo $jvfullloginadearn; ?>"> <br><br>
How many points does a <?php echo $toplevel ?> member get for viewing a Full Page Login Ad?&nbsp;<input type="text" name="superjvfullloginadearnp" value="<? echo $superjvfullloginadearn; ?>"><br><br>
How long a <?php echo $lowerlevel ?> member must view a Full Page Login Ad before getting points:&nbsp;<input type="text" name="profullloginadcredittimerp" value="<? echo $profullloginadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $middlelevel ?> member must view a Full Page Login Ad before getting points:&nbsp;<input type="text" name="jvfullloginadcredittimerp" value="<? echo $jvfullloginadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $toplevel ?> member must view a Full Page Login Ad before getting points:&nbsp;<input type="text" name="superjvfullloginadcredittimerp" value="<? echo $superjvfullloginadcredittimer; ?>"> seconds<br><br>	

How many points does a <?php echo $lowerlevel ?> member get for clicking a Featured Ad?&nbsp;<input type="text" name="profeaturedadearnp" value="<? echo $profeaturedadearn; ?>"> <br><br>	
How many points does a <?php echo $middlelevel ?> member get for clicking a Featured Ad?&nbsp;<input type="text" name="jvfeaturedadearnp" value="<? echo $jvfeaturedadearn; ?>"> <br><br>
How many points does a <?php echo $toplevel ?> member get for clicking a Featured Ad?&nbsp;<input type="text" name="superjvfeaturedadearnp" value="<? echo $superjvfeaturedadearn; ?>"><br><br>
How long a <?php echo $lowerlevel ?> member must view a Featured Ad before getting points:&nbsp;<input type="text" name="profeaturedadcredittimerp" value="<? echo $profeaturedadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $middlelevel ?> member must view a Featured Ad before getting points:&nbsp;<input type="text" name="jvfeaturedadcredittimerp" value="<? echo $jvfeaturedadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $toplevel ?> member must view a Featured Ad before getting points:&nbsp;<input type="text" name="superjvfeaturedadcredittimerp" value="<? echo $superjvfeaturedadcredittimer; ?>"> seconds<br><br>
How many points does a <?php echo $lowerlevel ?> member get for clicking a Hot Headline Ad?&nbsp;<input type="text" name="prohheadlineadearnp" value="<? echo $prohheadlineadearn; ?>"> <br><br>	
How many points does a <?php echo $middlelevel ?> member get for clicking a Hot Headline Ad?&nbsp;<input type="text" name="jvhheadlineadearnp" value="<? echo $jvhheadlineadearn; ?>"> <br><br>
How many points does a <?php echo $toplevel ?> member get for clicking a Hot Headline Ad?&nbsp;<input type="text" name="superjvhheadlineadearnp" value="<? echo $superjvhheadlineadearn; ?>"><br><br>
How long a <?php echo $lowerlevel ?> member must view a Hot Headline Ad before getting points:&nbsp;<input type="text" name="prohheadlineadcredittimerp" value="<? echo $prohheadlineadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $middlelevel ?> member must view a Hot Headline Ad before getting points:&nbsp;<input type="text" name="jvhheadlineadcredittimerp" value="<? echo $jvhheadlineadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $toplevel ?> member must view a Hot Headline Ad before getting points:&nbsp;<input type="text" name="superjvhheadlineadcredittimerp" value="<? echo $superjvhheadlineadcredittimer; ?>"> seconds<br><br>

How many points does a <?php echo $lowerlevel ?> member get for clicking a Hot Header Ad?&nbsp;<input type="text" name="prohheaderadearnp" value="<? echo $prohheaderadearn; ?>"> <br><br>	
How many points does a <?php echo $middlelevel ?> member get for clicking a Hot Header Ad?&nbsp;<input type="text" name="jvhheaderadearnp" value="<? echo $jvhheaderadearn; ?>"> <br><br>
How many points does a <?php echo $toplevel ?> member get for clicking a Hot Header Ad?&nbsp;<input type="text" name="superjvhheaderadearnp" value="<? echo $superjvhheaderadearn; ?>"><br><br>
How long a <?php echo $lowerlevel ?> member must view a Hot Header Ad before getting points:&nbsp;<input type="text" name="prohheaderadcredittimerp" value="<? echo $prohheaderadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $middlelevel ?> member must view a Hot Header Ad before getting points:&nbsp;<input type="text" name="jvhheaderadcredittimerp" value="<? echo $jvhheaderadcredittimer; ?>"> seconds<br><br>	
How long a <?php echo $toplevel ?> member must view a Hot Header Ad before getting points:&nbsp;<input type="text" name="superjvhheaderadcredittimerp" value="<? echo $superjvhheaderadcredittimer; ?>"> seconds<br><br>

Maximum Characters allowed in the subject for a Hot Header Ad:&nbsp;<input type="text" name="hheaderadmaxheadingcharsp" value="<? echo $hheaderadmaxheadingchars; ?>"> characters<br><br>
Maximum Characters allowed in the description for a Hot Header Ad:&nbsp;<input type="text" name="hheaderadmaxdesccharsp" value="<? echo $hheaderadmaxdescchars; ?>"> characters<br><br>
Background color for Hot Header Ad Top Admin Bar (text above all hot header ads):&nbsp;<input type="text" name="hheaderadtopnotebgcolorp" value="<? echo $hheaderadtopnotebgcolor; ?>"><br><br>
Text color for Hot Header Ad Top Admin Bar (text above all hot header ads):&nbsp;<input type="text" name="hheaderadtopnotefontcolorp" value="<? echo $hheaderadtopnotefontcolor; ?>"><br><br>
Text size for Hot Header Ad Top Admin Bar (text above all hot header ads):&nbsp;<input type="text" name="hheaderadtopnotefontsizep" value="<? echo $hheaderadtopnotefontsize; ?>"><br><br>
Text font for Hot Header Ad Top Admin Bar (text above all hot header ads):&nbsp;<input type="text" name="hheaderadtopnotefontfacep" value="<? echo $hheaderadtopnotefontface; ?>"><br><br>
Background color for Hot Header Ad Bottom Admin Bar (order text below all hot header ads):&nbsp;<input type="text" name="hheaderadbottomnotebgcolorp" value="<? echo $hheaderadbottomnotebgcolor; ?>"><br><br>
Text color for Hot Header Ad Bottom Admin Bar (order text below all hot header ads):&nbsp;<input type="text" name="hheaderadbottomnotefontcolorp" value="<? echo $hheaderadbottomnotefontcolor; ?>"><br><br>
Text size for Hot Header Ad Bottom Admin Bar (order text below all hot header ads):&nbsp;<input type="text" name="hheaderadbottomnotefontsizep" value="<? echo $hheaderadbottomnotefontsize; ?>"><br><br>
Text font for Hot Header Ad Bottom Admin Bar (order text below all hot header ads):&nbsp;<input type="text" name="hheaderadbottomnotefontfacep" value="<? echo $hheaderadbottomnotefontface; ?>"><br><br>
</td></tr></table>
    	

       <hr>
<H2>Viral Link Cloaker Settings</H2>
<table width="650"><tr><td><p align="left">
       	 
How many links can a <?php echo $lowerlevel ?> member create &nbsp;<input type="text" name="prourlsp" value="<? echo $prourls; ?>">&nbsp;links<br><br>

How many links can a <?php echo $middlelevel ?> member create&nbsp;<input type="text" name="jvurlsp" value="<? echo $jvurls; ?>">&nbsp;links<br><br>

How many links can a <?php echo $toplevel ?> member create&nbsp;<input type="text" name="superjvurlsp" value="<? echo $superjvurls; ?>">&nbsp;links<br><br>
</td></tr></table> 
 

<hr>
<H2>Surf Settings</H2>
<table width="650"><tr><td><p align="left">
How many surf page can a <?php echo $lowerlevel ?> member create &nbsp;<input type="text" name="prosurfurlsp" value="<? echo $prosurfurls; ?>">&nbsp;pages<br><br>
How many surf page can a <?php echo $middlelevel ?> member create&nbsp;<input type="text" name="jvsurfurlsp" value="<? echo $jvsurfurls; ?>">&nbsp;pages<br><br>
How many surf page can a <?php echo $toplevel ?> member create&nbsp;<input type="text" name="superjvsurfurlsp" value="<? echo $superjvsurfurls; ?>">&nbsp;pages<br><br><br>
How many seconds should <?php echo $lowerlevel ?> members wait for each surf timer&nbsp;<input type="text" name="prosurftimerp" value="<? echo $prosurftimer; ?>">&nbsp;seconds<br><br>
How many seconds should <?php echo $middlelevel ?> members wait for each surf timer&nbsp;<input type="text" name="jvsurftimerp" value="<? echo $jvsurftimer; ?>">&nbsp;seconds<br><br>
How many seconds should <?php echo $toplevel ?> members wait for each surf timer&nbsp;<input type="text" name="superjvsurftimerp" value="<? echo $superjvsurftimer; ?>">&nbsp;seconds<br><br><br>
How many surf credits should a <?php echo $lowerlevel ?> member get as a signup bonus&nbsp;<input type="text" name="prosurfcreditsignupbonusp" value="<? echo $prosurfcreditsignupbonus; ?>">&nbsp;surf credits<br><br>
How many surf credits should a <?php echo $middlelevel ?> member get as a signup bonus&nbsp;<input type="text" name="jvsurfcreditsignupbonusp" value="<? echo $jvsurfcreditsignupbonus; ?>">&nbsp;surf credits<br><br>
How many surf credits should a <?php echo $toplevel ?> member get as a signup bonus&nbsp;<input type="text" name="superjvcreditsignupbonusp" value="<? echo $superjvcreditsignupbonus; ?>">&nbsp;surf credits<br><br>
Surf ratio for <?php echo $lowerlevel ?> members (how many pages a <?php echo $lowerlevel ?> needs to surf before receiving surf credit(s))&nbsp;1:<input type="text" name="prosurfratiop" value="<? echo $prosurfratio; ?>" size="2"><br><br>
Surf ratio for <?php echo $middlelevel ?> members (how many pages a <?php echo $middlelevel ?> needs to surf before receiving surf credit(s))&nbsp;1:<input type="text" name="jvsurfratiop" value="<? echo $jvsurfratio; ?>" size="2"><br><br>
Surf ratio for <?php echo $toplevel ?> members (how many pages a <?php echo $toplevel ?> needs to surf before receiving surf credit(s))&nbsp;1:<input type="text" name="superjvsurfratiop" value="<? echo $superjvsurfratio; ?>" size="2"><br><br>
How many surf credits does a <?php echo $lowerlevel ?> member get for viewing their required ratio of surf pages&nbsp;<input type="text" name="prosurfcreditspersitep" value="<? echo $prosurfcreditspersite; ?>">&nbsp;surf credits<br><br>
How many surf credits does a <?php echo $middlelevel ?> member get for viewing their required ratio of surf pages&nbsp;<input type="text" name="jvsurfcreditspersitep" value="<? echo $jvsurfcreditspersite; ?>">&nbsp;surf credits<br><br>
How many surf credits does a <?php echo $toplevel ?> member get for viewing their required ratio of surf pages&nbsp;<input type="text" name="superjvsurfcreditspersitep" value="<? echo $superjvsurfcreditspersite; ?>">&nbsp;surf credits<br><br>
How many surf pages does a <?php echo $lowerlevel ?> member need to surf to be allowed to post ads (enter 0 to disable)&nbsp;<input type="text" name="prodailysurfsitestopostadsp" value="<? echo $prodailysurfsitestopostads; ?>">&nbsp;surf sites<br><br>
How many surf pages does a <?php echo $middlelevel ?> member need to surf to be allowed to post ads (enter 0 to disable)&nbsp;<input type="text" name="jvdailysurfsitestopostadsp" value="<? echo $jvdailysurfsitestopostads; ?>">&nbsp;surf sites<br><br>
How many surf pages does a <?php echo $toplevel ?> member need to surf to be allowed to post ads (enter 0 to disable)&nbsp;<input type="text" name="superjvdailysurfsitestopostadsp" value="<? echo $superjvdailysurfsitestopostads; ?>">&nbsp;surf sites<br><br>
</td></tr></table>

	   <input type="submit" value=" Save Site Settings ">

       </form></center>

    <? }

    echo "</td><td valign=top align=center width=5%></tr></table>";

    }

else  {

	echo "Unauthorised Access!";

    }

include "../footer.php";

mysql_close($dblink);

?>