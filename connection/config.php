<?php
$currency = '&#36; ';
$db_username = 'digiartm_main';
$db_password = '}!l]btCbq7}q*EboX3';
$db_name = 'digiartm_main';
$db_host = 'localhost';

$PayPalMode 			= 'sandbox'; 
$PayPalApiUsername 		= 'Pickperfection-facilitator_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword 		= 'QJD5GR5RDWMGMX3C'; //Paypal API password
$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31A0vasVU.8QpzSrhZpIowlKbyeVeJ'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://localhost/eshop/paypal-express-checkout/'; //Point to paypal-express-checkout page
$PayPalCancelURL 		= 'http://localhost/eshop/shopping-cart/paypal-express-checkout/cancel_url.html'; //Cancel URL if user clicks cancel
$PayPalApiUsername2 	= 'Pickperfection-facilitator_api1.gmail.com'; //Cancel URL if user clicks cancel
$PayPalApiPassword2 	= 'QJD5GR5RDWMGMX3C'; //Paypal API password
$PayPalApiSignature2	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31A0vasVU.8QpzSrhZpIowlKbyeVeJ'; 





$HandalingCost 		= 0.00;  
$InsuranceCost 		= 0.00;  
$shipping_cost      = 0.50; 
$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 0, 
                            'Service Tax' => 0
                            );


$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>
