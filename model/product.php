<?php
require_once("model.php");
abstract class OrderStatus
{
    const PENDING = 0;
	
    const CLOSE = 1;
    // etc.
}

class Product extends Model {
	// Renvoie la liste des commandes associés à un client
    public function getProducts($id){
		$req = 'SELECT * FROM tproducts';
		return $this->executerRequete($req, array($id));
	}
}
?>