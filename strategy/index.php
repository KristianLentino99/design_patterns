<?php

use app\strategy\classes\Order;
use app\strategy\classes\shippings\Air;
use app\strategy\classes\shippings\Ground;

require_once "../common/autoloader.php";

$shippingTypeAir = new Air();
$shippingTypeGround = new Ground();

$orderAir = new Order();
$orderAir->addDetail([
	'name' => 'Ipad Pro',
	'price' => 899.99,
	'vat' => 22,
]);
$orderAir->setShipping($shippingTypeAir);
echo "Shipping cost of type Air is {$orderAir->getShippingCosts()}\n";
echo "Shipping date of type Air is {$orderAir->getShippingDate()}\n";

$orderGround = new Order();
$orderGround->addDetail([
	'name' => 'Headsets',
	'price' => 200,
	'vat' => 22,
]);
$orderGround->setShipping($shippingTypeGround);
echo "Shipping cost of type Ground is {$orderGround->getShippingCosts()}\n";
echo "Shipping date of type Ground is {$orderGround->getShippingDate()}\n";

/**
 * Now if we want to add for example a Shipping of type Boat it would be very easy , you just need to
 * implement the Shipping interface and then implement your Boat logic and costs.
 */
?>
