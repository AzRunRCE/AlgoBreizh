<?php
class Product{
	public $Id;
	public $Name;
	public $Price;
	public $Reference;
    public function __construct($_id, $_name, $_price, $_reference) {
		$this->Id = $_id;
		$this->Name = $_name;
		$this->Price = $_price;
		$this->Reference = $_reference;
    }
}
?>