<?php

namespace app\strategy\interfaces;

use app\strategy\classes\Order;

interface Shipping
{
	public function getCost(Order $order);
	public function getDate(Order $order);
}