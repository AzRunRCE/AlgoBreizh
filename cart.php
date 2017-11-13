<?php
class Article{
	private $price = 0;
	private $label = "";
	private $productId = 0;
	private $quantity = 0;
	public function __construct($ProductId,$Label,$Price,$Quantity){
		
		$this->productId = $ProductId;
		$this->label = $label;
		$this->price = $Price;
		$this->quantity = $Quantity;
		
	}
	public function getPrice(){
		return $price;
	}
	public function getLabel(){
		return $label;
	}
	public function getQuantity(){
		return $quantity;
	}
	public function getProductId(){
		return $productId;
	}
}

function initCart(){
   if (!isset($_SESSION['cart'])){
      $_SESSION['cart']=array();
   }
   return true;
}

?>