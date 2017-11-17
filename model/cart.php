<?php
require_once("model.php");
class Cart extends Model {
	// Renvoie la liste des commandes associés à un client
	public function __construct() {
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
		}
    }
	public function addToCart($productId,$quantity){
		$product = new Product($productId);
		for($i=0; $i < $quantity ; $i++ )
		  array_push($_SESSION['cart'],$product);
		return true;
	}
	
	 public function getCart(){
		
		return NULL;
	}
	
    public function Push(){
		$req = 'SELECT * FROM tOrders WHERE client_id=?';
		return $this->executerRequete($req, array($idClient));
	}
}
?>