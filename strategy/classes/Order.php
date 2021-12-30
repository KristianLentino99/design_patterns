<?php
namespace app\strategy\classes;
use app\strategy\interfaces\Shipping;

/**
 * Order class
 */
class Order
{
	/**
	 * @var array
	 */
	private array $details = [];
	/**
	 * @var float
	 */
	private float $total = 0.0;
	/**
	 * @var float
	 */
	private float $vat = 0.0;
	private Shipping $shipping;

	/**
	 * @return array
	 */
	public function getDetails(): array
	{
		return $this->details;
	}

	/**
	 * @param array $details
	 */
	public function setDetails(array $details): void
	{
		$this->details = $details;
	}

	/**
	 * Add a single detail to the array
	 * @param array $detail
	 */
	public function addDetail(array $detail): void
	{
		$this->details[] = $detail;
	}

	/**
	 * @return float
	 */
	public function getTotal(): float
	{
		return $this->total;
	}

	/**
	 * @param float $total
	 */
	public function setTotal(float $total): void
	{
		$this->total = $total;
	}

	/**
	 * @return float
	 */
	public function getVat(): float
	{
		return $this->vat;
	}

	/**
	 * @param float $vat
	 */
	public function setVat(float $vat): void
	{
		$this->vat = $vat;
	}

	public function setShipping(Shipping $shipping)
	{
		$this->shipping = $shipping;
	}

	public function getShippingCosts()
	{
		return $this->shipping->getCost($this);
	}
	public function getShippingDate()
	{
		return $this->shipping->getDate($this);
	}
}