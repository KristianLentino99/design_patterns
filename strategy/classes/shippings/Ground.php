<?php
namespace app\strategy\classes\shippings;
use app\strategy\classes\Order;
use app\strategy\interfaces\Shipping;

class Ground implements Shipping
{

	/**
	 * @param Order $order
	 * @return int
	 * Return the shipping cost of the order, if the quantity of products
	 * is greater than 3 then you have a discount of 25 euros
	 */
	public function getCost(Order $order)
	{
		if(count($order->getDetails()) > 3){
			return 75;
		}

		return 100;
	}

	/**
	 * @param Order $order
	 * @return string
	 *  Return the delivery date of the order
	 */
	public function getDate(Order $order)
	{
		return date('d/m/Y', strtotime(' + 5 day'));

	}
}