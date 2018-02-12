<?php
require_once("Model/model.php");

class CartManager extends Model {
	// Renvoie la liste des commandes associés à un client
	private $productsManager;
	public function __construct() {
		$this->productsManager = new ProductsManager();    
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
		}
    }

	public function GetCart() {
		return $_SESSION['cart'];
	}

	public function AddToCart($productId, $quantity) {
		$product = $this->productsManager->get($productId);
		$find = false;
		for ($i=0; $i < count($_SESSION['cart']);$i++){

			if ($_SESSION['cart'][$i][0]->id() == $productId) {
				$_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] + 1;
				return true;
			}
		}
		array_push($_SESSION['cart'],array($product, $quantity));
		return true;
	}

	public function RemoveFromCart($productId) {
		for ($i=0; $i < count($_SESSION['cart']);$i++) {
			if ($_SESSION['cart'][$i][0]->id() == $productId) {
				$_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] - 1;
				if ($_SESSION['cart'][$i][1] == 0) {
					array_splice($_SESSION['cart'], $i, 1);
				}
			}
		}
		return true;
	}

	public function ClearCart() {
		array_splice($_SESSION['cart'], 0, count($_SESSION['cart']));
		return true;
	}

		
	//Enregistre un object cart en tant que commande en base.
    public function CheckOut() {
		$req = "INSERT INTO tOrders (creationDate,state,clientId) VALUES (?,0,?)";
		$date = date(DATE_W3C);
		$this->executerRequete($req, array($date,$_SESSION['customer']->id()));
		for ($i=0; $i < count($_SESSION['cart']);$i++){
			$productReq = "INSERT INTO torders_products (quantity,id,productId) VALUES (?,LAST_INSERT_ID(),?)";
			$this->executerRequete($productReq, array($_SESSION['cart'][$i][1],$_SESSION['cart'][$i][0]->id()));
		}
		$this->clearCart();
		return true;
	}

}
?>