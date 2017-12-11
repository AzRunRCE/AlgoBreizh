<?php
class Product{
	public $Id;
	public $Label;
	public $Name;
	public $Price;
	public $Reference;
    public function __construct($_id, $_label, $_name, $_price, $_reference) {
		$this->Id = $_id;
		$this->Label = $_label;
		$this->Name = $_name;
		$this->Price = $_price;
		$this->Reference = $_reference;
    }
}
?>