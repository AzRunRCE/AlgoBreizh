<?php
class Product{
	public $Id;
	public $Label;
	public $Price;
	public $Desc;
	public $Reference;
	
    public function __construct($_id, $_label, $_price, $_desc, $_reference) {
		$this->Id = $_id;
		$this->Price = $_price;
		$this->Desc = $_desc;
		$this->Reference = $_reference;
		$this->Label = $_label;
    }
}
?>