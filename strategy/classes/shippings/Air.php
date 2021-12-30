<?php
namespace app\strategy\classes\shippings;
use app\strategy\classes\Order;
use app\strategy\interfaces\Shipping;

class Air implements Shipping
{

	/**
	 * @param Order $order
	 * @return float
	 * Return the shipping cost of the order, if the quantity of products
	 * is greater than 3 then you have a discount of 50 euros
	 */
	public function getCost(Order $order):float
	{
		if(count($order->getDetails()) > 3){
			return 100;
		}

		return 150;
	}

	/**
	 * @param Order $order
	 * @return string
	 *  Return the delivery date of the order
	 */
	public function getDate(Order $order):string
	{
		return date('d/m/Y', strtotime(' + 7 day'));

	}
}