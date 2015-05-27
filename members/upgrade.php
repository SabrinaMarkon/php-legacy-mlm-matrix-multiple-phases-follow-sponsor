<?php
session_start();
include "../config.php";
require('../EgoPaySci.php');
include "../header.php";
include "../style.php";


if( session_is_registered("ulogin") )
   	{  // members only stuff!
		#include("navigation.php");
        include("../banners2.php");
        echo "<p><center>";
        ?>
        <p><font size=6>Upgrade Your Account</font></p>
        <?
        if($memtype=="PRO") {

?>
<table><tr><td>
             <p align="center"><font size=2><b>As a <?php echo $middlelevel ?> Member you get the following:</b></font></p>
             <?
	               if ($jvpoints<>0) {
                		echo "<p>".$jvpoints." points on joining</p>";
                                   }
	               if ($jvreadearn<>0) {
                   		echo "<p>".$jvreadearn." points for every text ad read</p>";
                                   }
                               if ($jvhtmlearn<>0) {
                   		echo "<p>".$jvhtmlearn." points for every html ad read</p>";
                                   }
                               if ($jvbannerearn<>0) {
                   		echo "<p>".$jvbannerearn." points for every banner clicked</p>";
                                   }
                               if ($jvbuttonclickearn<>0) {
                   		echo "<p>".$jvbuttonclickearn." points for every button banner clicked</p>";
                                   }
                               if ($jvhotlinkearn<>0) {
                   		echo "<p>".$jvhotlinkearn." points for every hotlink ad clicked</p>";
                                   }
                               if ($jvptcearn<>0) {
                   		echo "<p>".$jvptcearn." commissions for every paid to click ad read</p>";
                                   }
                                if ($jvtrafficearn<>0) {
                   		echo "<p>".$jvtrafficearn." points for every traffic link clicked</p>";
                                   }
                                if ($jvtopnavearn<>0) {
                   		echo "<p>".$jvtopnavearn." points for every top navigation link clicked</p>";
                                  }
                                if ($jvbotnavearn<>0) {
                   		echo "<p>".$jvbotnavearn." points for every bottom navigation link clicked</p>";
                                  }
                                if ($jvclickearn<>0) {
                   		echo "<p>".$jvclickearn." points for every solo ad click</p>";
                                  }
                                if ($adminjvclickearn<>0) {
                   		echo "<p>".$adminjvclickearn." points for every admin ad clicked</p>";
                                  }
                                if ($jvsupersoloearn<>0) {
                   		echo "<p>".$jvsupersoloearn." points for every Super Hot Solo ad clicked</p>";
                                  }
                               if ($jvpost<>0) {
                   		echo "<p>Post ".$jvpost." text ads per day</p>";
                                  }
                               if ($jvposthtml<>0) {
                   		echo "<p>Post ".$jvposthtml." html ads per day</p>";
                                  }
                               if ($jvsave<>0) {
                   		echo "<p>Save ".$jvsave." text ads</p>";
                                  }
                               if ($jvsavehtml<>0) {
                   		echo "<p>Save ".$jvsavehtml." html ads</p>";
                                  }
                               if ($jvsavesolos<>0) {
                   		echo "<p>Save ".$jvsavesolos." solo ads</p>";
                                  }
                               if ($jvurls<>0) {
                   		echo "<p>Have ".$jvurls." links in the Viral Link Cloaker</p>";
                                 }
                               if ($jvrefpoints<>0) {
                		echo "<p>".$jvrefpoints." points for every referral</p>";
                                 }
                               if ($jvreflogin<>0) {
                		echo "<p>".$jvreflogin." points when a referral logs in</p>";
                                 }
                                if ($jvpercent<>0) {
                		echo "<p>When a referrer earns points you earn ".$jvpercent." percent in points</p>";
                                 }
                                if ($jvbuycom<>0) {
                		echo "<p>When a referrer purchases advertising you earn ".$jvbuycom." percent in commissions</p>";
                                }
	               if ($jvcommission<>0) {                   	 	                                echo "<p>$".$jvcommission." for every ".$lowerlevel." member referred";
                                }
                             if ($jvjvcom<>0) {                                                              	                                echo "<p>$".$jvjvcom." for every ".$middlelevel." Member referred";
                               }
                            if ($jvsupercom<>0) {                   	 	                                echo "<p>$".$jvsupercom." for every ".$toplevel." Member referred";
                              }
                           if($jvinterval =="Lifetime") {

               		  if($points >= $jvpointprice) {
		  ?> 
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=upgrade_jv_exchange"><font color=BLUE><b>Upgrade Your Account By Exchanging Points</b></font></a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a <?php echo $middlelevel ?> Member upgrade</font></p>
		  <?
		  }
		  ?>
<p>Price: <b><? echo $jvpointprice; ?> Points <? echo $jvinterval; ?></b>. Please click on the link above to upgrade your account using your points.</b></p>
<?
}
?>
               <p>Price: <b>$<? echo $jvprice; ?> <? echo $jvinterval; ?></b>. Please click the payment button to upgrade your account.</b></p>
          <center><?



        	if ($paypal <> "") {
                           if ($jvinterval == "Monthly") {
	                //monthly paypal
	                ?>
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
              <input type="hidden" name="cmd" value="_xclick-subscriptions">
              <input type="hidden" name="business" value="<? echo $paypal; ?>">
              <input type="hidden" name="item_name" value="<? echo $sitename; ?> Monthly <?php echo $middlelevel ?> Membership <? echo $userid; ?>">
              <input type="hidden" name="item_number" value="monthly">
              <input type="hidden" name="no_note" value="1">
              <input type="hidden" name="currency_code" value="USD">
              <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
               <input type="hidden" name="a3" value="<? echo $jvprice; ?>">
               <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
               <input type="hidden" name="p3" value="1">
               <input type="hidden" name="t3" value="M">
               <input type="hidden" name="src" value="1">
               <input type="hidden" name="sra" value="1">
               <input type="hidden" name="on0" value="User ID">
               <input type="hidden" name="os0" value="<? echo $userid; ?>">
               <input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/jv_ipn.php">
               </form>
	                <?
	            }
	            elseif ($jvinterval == "Lifetime") {
	                ?>
               <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
               <input type="hidden" name="cmd" value="_xclick">
               <input type="hidden" name="business" value="<? echo $paypal; ?>">
               <input type="hidden" name="item_name" value="<? echo $sitename; ?> <?php echo $middlelevel ?> Membership <? echo $userid; ?>">
               <input type="hidden" name="item_number" value="onetime">
               <input type="hidden" name="amount" value="<? echo $jvprice; ?>">
               <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
               <input type="hidden" name="no_note" value="1">
               <input type="hidden" name="currency_code" value="USD">
               <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
	<input type="hidden" name="on0" value="User ID">
	<input type="hidden" name="os0" value="<? echo $userid; ?>">
	<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/jv_ipn.php">
	</form>
	                <?
	                }
	            else {
	                ?>
               <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
               <input type="hidden" name="cmd" value="_xclick-subscriptions">
               <input type="hidden" name="business" value="<? echo $paypal; ?>">
               <input type="hidden" name="item_name" value="<? echo $sitename; ?> Yearly <?php echo $middlelevel ?> Membership <? echo $userid; ?>">
               <input type="hidden" name="item_number" value="yearly">
               <input type="hidden" name="no_note" value="1">
               <input type="hidden" name="currency_code" value="USD">
               <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but20.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
               <input type="hidden" name="a3" value="<? echo $jvprice; ?>">
               <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
               <input type="hidden" name="p3" value="1">
               <input type="hidden" name="t3" value="Y">
               <input type="hidden" name="src" value="1">
               <input type="hidden" name="sra" value="1">
               <input type="hidden" name="on0" value="User ID">
               <input type="hidden" name="os0" value="<? echo $userid; ?>">
               <input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/jv_ipn.php">
               </form>
	                <?
	            }
	        }
			if ($adminpayza <> "") {

	            if ($jvinterval == "Monthly") {

                ?>

<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/> 
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>"/>
<input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>">
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>
<input type="hidden" name="ap_quantity" value="1"/> <input type="hidden" name="ap_amount" value="<? echo $jvprice; ?>"/>
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> 
<input type="hidden" name="ap_timeunit" value="month"/>  <input type="hidden" name="ap_periodlength" value="1"/> 
</form>
	                <?
	            }
	            elseif ($jvinterval == "Lifetime") {
	                ?>
<form method="post" action="https://secure.payza.com/checkout" > <input type="hidden" name="ap_purchasetype" value="item"/> 
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>"/> 
<input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>"> 
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/> 
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $jvprice; ?>"/> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> 
</form>

                <?
                            }
                          else {
	                ?>
<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/>  
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>"/>  
<input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>">  
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>  
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $jvprice; ?>"/> 
<input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/>   
<input type="hidden" name="ap_timeunit" value="year"/>  
<input type="hidden" name="ap_periodlength" value="1"/> 
</form>

	                <?
	            }
            }


			if (($egopay_store_id!="") and ($egopay_store_password!=""))
			{
			try {
					
				$oEgopay = new EgoPaySci(array(
					'store_id'          => $egopay_store_id,
					'store_password'    => $egopay_store_password
				));
				
				$sPaymentHash = $oEgopay->createHash(array(
				/*
				 * Payment amount with two decimal places 
				 */
					'amount'    => $jvprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' Membership ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/upgrade.php',
				'success_url'	=> $domain. '/members/proreturn.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' Membership ' . $userid,
				'cf_3' => $jvprice,
				//'cf_4' => '',
				//'cf_5' => '',
				//'cf_6' => '',
				//'cf_7' => '',
				//'cf_8' => '',
				));
				
			} catch (EgoPayException $e) {
				die($e->getMessage());
			}
			?>
			<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $jvprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> Membership <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> Membership <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $jvprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $jvprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> Membership <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")



                	if ($adminmoneybookers <> "") {



	            if ($jvinterval == "Monthly") {

	                ?>

						

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $jvprice; ?>">
<input type="hidden" name="rec_amount" value="<? echo $jvprice; ?>">
<input type="hidden" name="rec_period" value="1">
<input type="hidden" name="rec_cycle" value="month">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>

	                <?

	            }

	            elseif ($jvinterval == "Lifetime") {

	                ?>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $jvprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>

	                <?

	                }

	            else {

	                ?>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $jvprice; ?>">
<input type="hidden" name="rec_amount" value="<? echo $jvprice; ?>">
<input type="hidden" name="rec_period" value="1">
<input type="hidden" name="rec_cycle" value="year">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>

	                <?
	            }

                }

}
	     			
			if($memtype=="PRO") {

			
			
            ?>
</center><br><br><p align="center"><br><font size="2"><b>As a <?php echo $toplevel ?> member you get the following:</b></cont></p>



               <?

	                if ($superjvpoints<>0) {
                		echo "<p>".$superjvpoints." points on joining</p>";
                                   }
	               if ($superjvreadearn<>0) {
                   		echo "<p>".$superjvreadearn." points for every text ad read</p>";
                                   }
                               if ($superjvhtmlearn<>0) {
                   		echo "<p>".$superjvhtmlearn." points for every html ad read</p>";
                                   }
                               if ($superjvbannerclick<>0) {
                   		echo "<p>".$superjvbannerclick." points for every banner clicked</p>";
                                   }
                               if ($superjvbuttonclickearn<>0) {
                   		echo "<p>".$superjvbuttonclickearn." points for every button banner clicked</p>";
                                   }
                               if ($superjvhotlinkearn<>0) {
                   		echo "<p>".$superjvhotlinkearn." points for every hotlink ad clicked</p>";
                                   }
                               if ($superjvptcearn<>0) {
                   		echo "<p>".$superjvptcearn." commissions for every paid to click ad read</p>";
                                   }
                                if ($superjvtrafficearn<>0) {
                   		echo "<p>".$superjvtrafficearn." points for every traffic link clicked</p>";
                                   }
                                if ($superjvtopnavearn<>0) {
                   		echo "<p>".$superjvtopnavearn." points for every top navigation link clicked</p>";
                                  }
                                if ($superjvbotnavearn<>0) {
                   		echo "<p>".$superjvbotnavearn." points for every bottom navigation link clicked</p>";
                                  }
                                if ($superjvclickearn<>0) {
                   		echo "<p>".$superjvclickearn." points for every solo ad click</p>";
                                  }
                                if ($adminsuperjvclickearn<>0) {
                   		echo "<p>".$adminsuperjvclickearn." points for every admin ad clicked</p>";
                                  }
                                if ($jvssupersoloearn<>0) {
                   		echo "<p>".$jvssupersoloearn." points for every Super Hot Solo ad clicked</p>";
                                  }
                               if ($superjvpost<>0) {
                   		echo "<p>Post ".$superjvpost." text ads per day</p>";
                                  }
                              if ($superjvposthtml<>0) {
                   		echo "<p>Post ".$superjvposthtml." html ads per day</p>";
                                  }
                               if ($superjvsave<>0) {
                   		echo "<p>Save ".$superjvsave." text ads</p>";
                                  }
                               if ($superjvsavehtml<>0) {
                   		echo "<p>Save ".$superjvsavehtml." html ads</p>";
                                  }
                              if ($superjvsavesolos<>0) {
                   		echo "<p>Save ".$superjvsavesolos." solo ads</p>";
                                  }
                              if ($superjvurls<>0) {
                   		echo "<p>Have ".$superjvurls." links in the Viral Link Cloaker</p>";
                                 }
                             if ($superjvrefpoints<>0) {
                		echo "<p>".$superjvrefpoints." points for every referral</p>";
                                 }
                               if ($superjvreflogin<>0) {
                		echo "<p>".$superjvreflogin." points when a referral logs in</p>";
                                 }
                                  if ($superjvpercent<>0) {
                		echo "<p>When a referrer earns points you earn ".$superjvpercent." percent in points</p>";
                                 }
                                if ($superjvbuycom<>0) {
                		echo "<p>When a referrer purchases advertising you earn ".$superjvbuycom." percent in commissions</p>";
                                }
	               if ($superjvcommission<>0) {                   	 	                                echo "<p>$".$superjvcommission." for every " . $lowerlevel . " member referred";
                                }
                             if ($superjvjvcom<>0) {                                                              	                                echo "<p>$".$superjvjvcom." for every " . $middlelevel . " Member referred";
                               }
                            if ($superjv2supercom<>0) {                   	 	                                echo "<p>$".$superjv2supercom." for every " . $toplevel . " Member referred";
                              }
                           if($superjvinterval =="Lifetime") {

              		  if($points >= $superjvpricepoints) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=upgrade_superjv_exchange"><font color=BLUE><b>Upgrade Your Account By Exchanging Points</b></font></a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a <?php echo $toplevel ?> upgrade</font></p>
		  <?
		  }
		  ?>

<p>Price: <b><? echo $superjvpricepoints; ?> Points <? echo $superjvinterval; ?></b>. Please click on the link above to upgrade your account using your points.</b></p>
<?

}

?>
               <p>Price: <b>$<? echo $superjvprice; ?> <? echo $superjvinterval; ?></b>. Please click the payment button to upgrade your account.</b></p>

          <center><?


        	if ($paypal <> "") {



	             if ($superjvinterval == "Monthly") {

	                //monthly paypal

	                ?>

            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick-subscriptions">
            <input type="hidden" name="business" value="<? echo $paypal; ?>">
            <input type="hidden" name="item_name" value="<? echo $sitename; ?> Monthly <?php echo $toplevel ?> Membership <? echo $userid; ?>">
            <input type="hidden" name="item_number" value="monthly">
            <input type="hidden" name="no_note" value="1">
            <input type="hidden" name="currency_code" value="USD">
            <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
            <input type="hidden" name="a3" value="<? echo $superjvprice; ?>">
            <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
            <input type="hidden" name="p3" value="1">
            <input type="hidden" name="t3" value="M">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">
            <input type="hidden" name="on0" value="User ID">
            <input type="hidden" name="os0" value="<? echo $userid; ?>">
            <input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">
            </form>
                               <?
	            }

	            elseif ($superjvinterval == "Lifetime") {

	                ?>
           <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
           <input type="hidden" name="cmd" value="_xclick">
           <input type="hidden" name="business" value="<? echo $paypal; ?>">
           <input type="hidden" name="item_name" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
           <input type="hidden" name="item_number" value="onetime">
           <input type="hidden" name="amount" value="<? echo $superjvprice; ?>">
           <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
           <input type="hidden" name="no_note" value="1">
           <input type="hidden" name="currency_code" value="USD">
           <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
           <input type="hidden" name="on0" value="User ID">
           <input type="hidden" name="os0" value="<? echo $userid; ?>">
           <input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">
           </form>
	                <?
	                }
	            else {
	                ?>
         <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
         <input type="hidden" name="cmd" value="_xclick-subscriptions">
         <input type="hidden" name="business" value="<? echo $paypal; ?>">
         <input type="hidden" name="item_name" value="<? echo $sitename; ?> Yearly <?php echo $toplevel ?> Membership <? echo $userid; ?>">
         <input type="hidden" name="item_number" value="yearly">
         <input type="hidden" name="no_note" value="1">
         <input type="hidden" name="currency_code" value="USD">
         <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but20.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
         <input type="hidden" name="a3" value="<? echo $superjvprice; ?>">
         <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">
         <input type="hidden" name="p3" value="1">
         <input type="hidden" name="t3" value="Y">
         <input type="hidden" name="src" value="1">
         <input type="hidden" name="sra" value="1">
         <input type="hidden" name="on0" value="User ID">
         <input type="hidden" name="os0" value="<? echo $userid; ?>">
         <input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">
         </form>
	                <?
	            }
         }

		if ($adminpayza <> "") {

	           if ($superjvinterval == "Monthly") {

	                ?>

<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/>  
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/>  
<input type="hidden" name="ap_currency" value="USD"/>
<input type="hidden" name="apc_1" value="<? echo $userid; ?>">  
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>  
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $superjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/>  
<input type="hidden" name="ap_timeunit" value="month"/>  <input type="hidden" name="ap_periodlength" value="1"/> 
</form>

                <?

                             }

	           elseif ($superjvinterval == "Lifetime") {

	                ?>

<form method="post" action="https://secure.payza.com/checkout" > <input type="hidden" name="ap_purchasetype" value="item"/> 
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/> 
<input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>"> 
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/> 
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $superjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>

	                <?
	            }

	            else {

	                ?>


<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/>  
<input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/>  
<input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>">  
<input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>  
<input type="hidden" name="ap_quantity" value="1"/> 
<input type="hidden" name="ap_amount" value="<? echo $sperjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/>   
<input type="hidden" name="ap_timeunit" value="year"/>  <input type="hidden" name="ap_periodlength" value="1"/> 
</form>



	                <?

	            }

            }

			if (($egopay_store_id!="") and ($egopay_store_password!=""))
			{
			try {
					
				$oEgopay = new EgoPaySci(array(
					'store_id'          => $egopay_store_id,
					'store_password'    => $egopay_store_password
				));
				
				$sPaymentHash = $oEgopay->createHash(array(
				/*
				 * Payment amount with two decimal places 
				 */
					'amount'    => $superjvprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' ' . $toplevel . ' Membership ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/upgrade.php',
				'success_url'	=> $domain. '/members/proreturn.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' ' . $toplevel . ' Membership ' . $userid,
				'cf_3' => $superjvprice,
				//'cf_4' => '',
				//'cf_5' => '',
				//'cf_6' => '',
				//'cf_7' => '',
				//'cf_8' => '',
				));
				
			} catch (EgoPayException $e) {
				die($e->getMessage());
			}
			?>
			<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")

				if ($adminmoneybookers <> "") {



	            if ($superjvinterval == "Monthly") {


	                ?>

						

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">
<input type="hidden" name="rec_amount" value="<? echo $superjvprice; ?>">
<input type="hidden" name="rec_period" value="1">
<input type="hidden" name="rec_cycle" value="month">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>



	                <?



	            }



	            elseif ($superjvinterval == "Lifetime") {



	                ?>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>



	                <?



	                }



	            else {



	                ?>



<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">
<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">
<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">
<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">
<input type="hidden" name="language" value="EN">
<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">
<input type="hidden" name="rec_amount" value="<? echo $superjvprice; ?>">
<input type="hidden" name="rec_period" value="1">
<input type="hidden" name="rec_cycle" value="year">
<input type="hidden" name="currency" value="USD">
<input type="hidden" name="merchant_fields" value="userid,itemname">
<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">
<input type="hidden" name="userid" value="<? echo $userid; ?>">
<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> Executive Membership <? echo $userid; ?>">
<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">
</form>

	                <?




	            }



	        }			
			


    }


if($memtype=="JV Member") {
			
			
			
            ?>
<table><tr><td>
<br><br><p align="center"><font size="2"><b>As a <?php echo $toplevel ?> Member you get the following:</b></font></p>



               <?

	              if ($superjvpoints<>0) {
                		echo "<p>".$superjvpoints." points on joining</p>";
                                   }
	               if ($superjvreadearn<>0) {
                   		echo "<p>".$superjvreadearn." points for every text ad read</p>";
                                   }
                               if ($superjvhtmlearn<>0) {
                   		echo "<p>".$superjvhtmlearn." points for every html ad read</p>";
                                   }
                               if ($superjvbannerclick<>0) {
                   		echo "<p>".$superjvbannerclick." points for every banner clicked</p>";
                                   }
                               if ($superjvbuttonclickearn<>0) {
                   		echo "<p>".$superjvbuttonclickearn." points for every button banner clicked</p>";
                                   }
                               if ($superjvhotlinkearn<>0) {
                   		echo "<p>".$superjvhotlinkearn." points for every hotlink ad clicked</p>";
                                   }
                               if ($superjvptcearn<>0) {
                   		echo "<p>".$superjvptcearn." commissions for every paid to click ad read</p>";
                                   }
                                if ($superjvtrafficearn<>0) {
                   		echo "<p>".$superjvtrafficearn." points for every traffic link clicked</p>";
                                   }
                                if ($superjvtopnavearn<>0) {
                   		echo "<p>".$superjvtopnavearn." points for every top navigation link clicked</p>";
                                  }
                                if ($superjvbotnavearn<>0) {
                   		echo "<p>".$superjvbotnavearn." points for every bottom navigation link clicked</p>";
                                  }
                                if ($superjvclickearn<>0) {
                   		echo "<p>".$superjvclickearn." points for every solo ad click</p>";
                                  }
                                if ($adminsuperjvclickearn<>0) {
                   		echo "<p>".$adminsuperjvclickearn." points for every admin ad clicked</p>";
                                  }
                                if ($jvssupersoloearn<>0) {
                   		echo "<p>".$jvssupersoloearn." points for every Super Hot Solo ad clicked</p>";
                                  }
                               if ($superjvpost<>0) {
                   		echo "<p>Post ".$superjvpost." text ads per day</p>";
                                  }
                              if ($superjvposthtml<>0) {
                   		echo "<p>Post ".$superjvposthtml." html ads per day</p>";
                                  }
                               if ($superjvsave<>0) {
                   		echo "<p>Save ".$superjvsave." text ads</p>";
                                  }
                               if ($superjvsavehtml<>0) {
                   		echo "<p>Save ".$superjvsavehtml." html ads</p>";
                                  }
                              if ($superjvsavesolos<>0) {
                   		echo "<p>Save ".$superjvsavesolos." solo ads</p>";
                                  }
                              if ($superjvurls<>0) {
                   		echo "<p>Have ".$superjvurls." links in the Viral Link Cloaker</p>";
                                 }
                             if ($superjvrefpoints<>0) {
                		echo "<p>".$superjvrefpoints." points for every referral</p>";
                                 }
                               if ($superjvreflogin<>0) {
                		echo "<p>".$superjvreflogin." points when a referral logs in</p>";
                                 }
                                  if ($superjvpercent<>0) {
                		echo "<p>When a referrer earns points you earn ".$superjvpercent." percent in points</p>";
                                 }
                                if ($superjvbuycom<>0) {
                		echo "<p>When a referrer purchases advertising you earn ".$superjvbuycom." percent in commissions</p>";
                                }
	               if ($superjvcommission<>0) {                   	 	                                echo "<p>$".$superjvcommission." for every " . $lowerlevel . " member referred";
                                }
                             if ($superjvjvcom<>0) {                                                              	                                echo "<p>$".$superjvjvcom." for every " . $middlelevel . " Member referred";
                               }
                            if ($superjv2supercom<>0) {                   	 	                                echo "<p>$".$superjv2supercom." for every " . $toplevel . " Member referred";
                              }
                           
if($superjvinterval =="Lifetime") {

              		  if($points >= $superjvpricepoints) {
		  ?>
		   <p><font face="Tahoma" size="2"><a href="trade.php?item=upgrade_superjv_exchange"><font color=BLUE><b>Upgrade Your Account By Exchanging Points</b></font></a></font></p>
		  <?
		  } else {
		  ?>
		   <p><font face="Tahoma" size="2">You don't have enough points to buy a <?php echo $toplevel ?> upgrade</font></p>
		  <?
		  }
		  ?>

<p>Price: <b><? echo $superjvpricepoints; ?> Points <? echo $superjvinterval; ?></b>. Please click on the link above to upgrade your account using your points.</b></p>
<?

}

?>
               <p>Price: <b>$<? echo $superjvprice; ?> <? echo $superjvinterval; ?></b>. Please click the payment button to upgrade your account.</b></p>

          <center><?


        	if ($paypal <> "") {



	             If ($superjvinterval == "Monthly") {



	                //monthly paypal



	                ?>



	                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">



	                    <input type="hidden" name="cmd" value="_xclick-subscriptions">



	                    <input type="hidden" name="business" value="<? echo $paypal; ?>">



	                    <input type="hidden" name="item_name" value="<? echo $sitename; ?> Monthly <?php echo $toplevel ?> Membership <? echo $userid; ?>">



	                    <input type="hidden" name="item_number" value="monthly">



	                    <input type="hidden" name="no_note" value="1">



	                    <input type="hidden" name="currency_code" value="USD">



	                    <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">



	                    <input type="hidden" name="a3" value="<? echo $superjvprice; ?>">



	                    <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">



	                    <input type="hidden" name="p3" value="1">



	                    <input type="hidden" name="t3" value="M">



	                    <input type="hidden" name="src" value="1">



	                    <input type="hidden" name="sra" value="1">



						<input type="hidden" name="on0" value="User ID">



						<input type="hidden" name="os0" value="<? echo $userid; ?>">



						<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">



	                    </form>



	                <?



	            }



	            elseif ($superjvinterval == "Lifetime") {



	                ?>



	                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">



	                    <input type="hidden" name="cmd" value="_xclick">



	                    <input type="hidden" name="business" value="<? echo $paypal; ?>">



	                    <input type="hidden" name="item_name" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">



	                    <input type="hidden" name="item_number" value="onetime">



	                    <input type="hidden" name="amount" value="<? echo $superjvprice; ?>">



	                    <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">



	                    <input type="hidden" name="no_note" value="1">



	                    <input type="hidden" name="currency_code" value="USD">



	                    <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">



						<input type="hidden" name="on0" value="User ID">



						<input type="hidden" name="os0" value="<? echo $userid; ?>">



						<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">



						</form>



	                <?



	                }



	            else {



	                ?>



	                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">



	                    <input type="hidden" name="cmd" value="_xclick-subscriptions">



	                    <input type="hidden" name="business" value="<? echo $paypal; ?>">



	                    <input type="hidden" name="item_name" value="<? echo $sitename; ?> Yearly <?php echo $toplevel ?> Membership <? echo $userid; ?>">



	                    <input type="hidden" name="item_number" value="yearly">



	                    <input type="hidden" name="no_note" value="1">



	                    <input type="hidden" name="currency_code" value="USD">



	                    <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but20.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">



	                    <input type="hidden" name="a3" value="<? echo $superjvprice; ?>">



	                    <input type="hidden" name="return" value="<? echo $domain; ?>/members/proreturn.php">



	                    <input type="hidden" name="p3" value="1">



	                    <input type="hidden" name="t3" value="Y">



	                    <input type="hidden" name="src" value="1">



	                    <input type="hidden" name="sra" value="1">



						<input type="hidden" name="on0" value="User ID">



						<input type="hidden" name="os0" value="<? echo $userid; ?>">



						<input type="hidden" name="notify_url" value="<? echo $domain; ?>/members/superjv_ipn.php">



	                    </form>



	                <?







	            }







	        }



			



			if ($adminpayza <> "") {



	           If ($superjvinterval == "Monthly") {


	                ?>







<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/>  <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/>  <input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>">  <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>  <input type="hidden" name="ap_quantity" value="1"/> <input type="hidden" name="ap_amount" value="<? echo $superjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/>  <input type="hidden" name="ap_timeunit" value="month"/>  <input type="hidden" name="ap_periodlength" value="1"/> </form>



	                <?



	            }



	           elseif ($superjvinterval == "Lifetime") {



	                ?>



<form method="post" action="https://secure.payza.com/checkout" > <input type="hidden" name="ap_purchasetype" value="item"/> <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/> <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/> <input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>"> <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/> <input type="hidden" name="ap_quantity" value="1"/> <input type="hidden" name="ap_amount" value="<? echo $superjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/> </form>



	                <?



	            }



	            else {



	                ?>



<form method="post" action="https://secure.payza.com/checkout" >  <input type="hidden" name="ap_purchasetype" value="subscription"/>  <input type="hidden" name="ap_merchant" value="<? echo $adminpayza; ?>"/>  <input type="hidden" name="ap_itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>"/>  <input type="hidden" name="ap_currency" value="USD"/><input type="hidden" name="apc_1" value="<? echo $userid; ?>">  <input type="hidden" name="ap_returnurl" value="<? echo $domain; ?>/members/proreturn.php"/>  <input type="hidden" name="ap_quantity" value="1"/> <input type="hidden" name="ap_amount" value="<? echo $superjvprice; ?>"/> <input type="image" name="ap_image" src="<?php echo $domain ?>/images/payza.gif"/>   <input type="hidden" name="ap_timeunit" value="year"/>  <input type="hidden" name="ap_periodlength" value="1"/> </form>











	                <?



	            }



            }


			if (($egopay_store_id!="") and ($egopay_store_password!=""))
			{
			try {
					
				$oEgopay = new EgoPaySci(array(
					'store_id'          => $egopay_store_id,
					'store_password'    => $egopay_store_password
				));
				
				$sPaymentHash = $oEgopay->createHash(array(
				/*
				 * Payment amount with two decimal places 
				 */
					'amount'    => $superjvprice,
				/*
				 * Payment currency, USD/EUR
				 */
					'currency'  => 'USD',
				/*
				 * Description of the payment, limited to 120 chars
				 */
					'description' => $sitename . ' ' . $toplevel . ' Membership ' . $userid,
				
				/*
				 * Optional fields
				 */
				'fail_url'	=> $domain. '/members/upgrade.php',
				'success_url'	=> $domain. '/members/proreturn.php',
				
				/*
				 * 8 Custom fields, hidden from users, limited to 100 chars.
				 * You can retrieve them only from your callback file.
				 */
				'cf_1' => $userid,
				'cf_2' => $sitename . ' ' . $toplevel . ' Membership ' . $userid,
				'cf_3' => $superjvprice,
				//'cf_4' => '',
				//'cf_5' => '',
				//'cf_6' => '',
				//'cf_7' => '',
				//'cf_8' => '',
				));
				
			} catch (EgoPayException $e) {
				die($e->getMessage());
			}
			?>
			<form action="<?php echo EgoPaySci::EGOPAY_PAYMENT_URL; ?>" method="post">
			<input type="hidden" name="hash" value="<?php echo $sPaymentHash ?>">
			<input type="image" src="<?php echo $domain ?>/images/egopay.png" border="0">
			</form>
			<?php
			} # if (($egopay_store_id!="") and ($egopay_store_password!=""))

			if ($adminperfectmoney != "")
			{
			?>
			<form action="https://perfectmoney.com/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="<?php echo $adminperfectmoney ?>">
			<input type="hidden" name="PAYEE_NAME" value="<?php echo $adminname ?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="<?php echo $domain ?>/perfectmoney_ipn.php">
			<input type="hidden" name="PAYMENT_URL" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="NOPAYMENT_URL" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="BAGGAGE_FIELDS" value="userid item">
			<input type="hidden" name="userid" value="<?php echo $userid ?>">
			<input type="hidden" name="item" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="image" name="PAYMENT_METHOD" value="PerfectMoney account" src="<?php echo $domain ?>/images/perfectmoney.gif" border="0">
			</form>
			<?php
			} # if ($adminperfectmoney != "")

			if ($adminokpay != "")
			{
			?>
			<form  method="post" action="https://www.okpay.com/process.html">
			<input type="hidden" name="ok_receiver" value="<?php echo $adminokpay ?>">
			<input type="hidden" name="ok_item_1_name" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="hidden" name="ok_currency" value="usd">
			<input type="hidden" name="ok_item_1_type" value="service">
			<input type="hidden" name="ok_item_1_price" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="ok_item_1_custom_1_title" value="userid">
			<input type="hidden" name="ok_item_1_custom_1_value" value="<?php echo $userid ?>">
			<input type="hidden" name="ok_return_success" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="ok_return_fail" value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="ok_ipn" value="<?php echo $domain ?>/okpay_ipn.php">
			<input type="image" name="submit" src="<?php echo $domain ?>/images/okpay.gif" border="0">
			</form>
			<?php
			} # if ($adminokpay != "")

			if ($adminsolidtrustpay != "")
			{
			?>
			<form action="https://solidtrustpay.com/handle.php" method="post">
			<input type="hidden" name="merchantAccount" value="<?php echo $adminsolidtrustpay ?>">
			<input type="hidden" name="sci_name" value="your_sci_name">
			<input type="hidden" name="amount" value="<?php echo $superjvprice ?>">
			<input type="hidden" name="currency" value="USD">
			<input type="hidden" name="user1" value="<?php echo $userid ?>">
			<input type="hidden" name="notify_url" value="<?php echo $domain ?>/solidtrustpay_ipn.php">
			<input type="hidden" name="return_url" value="<?php echo $domain ?>/members/proreturn.php">
			<input type="hidden" name="cancel_url"  value="<?php echo $domain ?>/members/upgrade.php">
			<input type="hidden" name="item_id" value="<?php echo $sitename ?> <?php echo $toplevel ?> Membership <?php echo $userid ?>">
			<input type="image" name="cartImage" src="<?php echo $domain ?>/images/solidtrustpay.gif" alt="Solid Trust Pay" border="0">
			</form>
			<?php
			} # if ($adminsolidtrustpay != "")		

			

			if ($adminmoneybookers <> "") {



	            If ($superjvinterval == "Monthly") {





	                ?>

						

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">

<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">

<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">

<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">

<input type="hidden" name="language" value="EN">

<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">

<input type="hidden" name="rec_amount" value="<? echo $superjvprice; ?>">

<input type="hidden" name="rec_period" value="1">

<input type="hidden" name="rec_cycle" value="month">

<input type="hidden" name="currency" value="USD">

<input type="hidden" name="merchant_fields" value="userid,itemname">

<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="hidden" name="userid" value="<? echo $userid; ?>">

<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">

</form>



	                <?



	            }



	            elseif ($superjvinterval == "Lifetime") {



	                ?>

<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">

<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">

<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">

<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">

<input type="hidden" name="language" value="EN">

<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">

<input type="hidden" name="currency" value="USD">

<input type="hidden" name="merchant_fields" value="userid,itemname">

<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="hidden" name="userid" value="<? echo $userid; ?>">

<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">

</form>



	                <?



	                }



	            else {



	                ?>



<form action="https://www.moneybookers.com/app/payment.pl" method="post" target="_blank">

<input type="hidden" name="pay_to_email" value="<? echo $adminmoneybookers; ?>">

<input type="hidden" name="status_url" value="<? echo $domain; ?>/moneybookers_ipn.php">

<input type="hidden" name="return_url" value="<? echo $domain; ?>/members/proreturn.php">

<input type="hidden" name="language" value="EN">

<input type="hidden" name="amount" value="<? echo $superjvprice; ?>">

<input type="hidden" name="rec_amount" value="<? echo $superjvprice; ?>">

<input type="hidden" name="rec_period" value="1">

<input type="hidden" name="rec_cycle" value="year">

<input type="hidden" name="currency" value="USD">

<input type="hidden" name="merchant_fields" value="userid,itemname">

<input type="hidden" name="itemname" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="hidden" name="userid" value="<? echo $userid; ?>">

<input type="hidden" name="detail1_text" value="<? echo $sitename; ?> <?php echo $toplevel ?> Membership <? echo $userid; ?>">

<input type="image" style="border-width: 1px; border-color: #8B8583;" src="http://www.moneybookers.com/images/logos/checkout_logos/checkout_120x40px.gif">

</form>

	                <?







	            }



  



	        }			
			
			
			
			
			
				
			
			
			
			
			
			



    }

elseif ($memtype=="SUPER JV") {



        	echo "<p><br>You are already a " . $toplevel . " Member.<br> If you wish to purchase points, please click on 'Advertising' in the navigation menu.</p>";



        }


	echo "</td></tr></table>";



    }






else



  { ?>







  <p><center>You must be logged in to access this site. Please <a href="../index.php">click here</a> to login.</center></p>







  <? }







include "../footer.php";



mysql_close($dblink);



?>