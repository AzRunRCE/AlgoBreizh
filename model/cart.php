<?php
require_once("model.php");

class Cart extends Model {
	// Renvoie la liste des commandes associés à un client
	 private $productsFactory;
	public function __construct() {
		$this->productsFactory = new ProductsFactory();    
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
		}
    }

	public function getCart(){
		return $_SESSION['cart'];
	}

	public function addToCart($productId, $quantity){
		$product = $this->productsFactory->GetProductById($productId);
		for($i=0; $i < $quantity; $i++)
			array_push($_SESSION['cart'], $product);
		return true;
	}

	public function removeFromCart($position){
		array_splice($_SESSION['cart'], $position, 1);
		return true;
	}

	public function clearCart($position){
		array_splice($_SESSION['cart'], $position, 1);
		return true;
	}

    public function Push(){
		$req = 'SELECT * FROM tOrders WHERE client_id=?';
		return $this->executerRequete($req, array($idClient));
	}
}
?>