<?php
require_once("Model/model.php");

class CartManager extends Model {
	// Renvoie la liste des commandes associés à un client
	public function __construct() {
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
		}
    }

	public function get() {
		return $_SESSION['cart'];
	}

	public function addToCart($productId, $quantity) {
		$productsRow = $this->executerRequete("SELECT * FROM tproducts WHERE id = ?", array($productId))->fetch(PDO::FETCH_ASSOC);
		$exist = 0;
		$attProduct = new AttachedProduct($productsRow,array('quantity' => $quantity));
		for ($i=0; $i < count($_SESSION['cart']);$i++){
			if ($attProduct->id() == $_SESSION['cart'][$i]->id()){
				$_SESSION['cart'][$i]->setQuantity($_SESSION['cart'][$i]->quantity() + 1);
				$exist = 1;
			}
		}

		if (!$exist){
			array_push($_SESSION['cart'], $attProduct);
		}
		return true;
	}

	public function delete($productId) {
		for ($i=0; $i < count($_SESSION['cart']);$i++){
			if ($productId == $_SESSION['cart'][$i]->id()){
				$_SESSION['cart'][$i]->setQuantity($_SESSION['cart'][$i]->quantity() - 1);
			}
			if ($_SESSION['cart'][$i]->quantity() <=0){
				array_splice($_SESSION['cart'], $i, 1);
			}
		}	
		return true;
	}

	public function deleteAll() {
		array_splice($_SESSION['cart'], 0, count($_SESSION['cart']));
		return true;
	}

}
?>