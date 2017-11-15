<?php
require_once("model.php");
abstract class OrderStatus
{
    const PENDING = 0;
	
    const CLOSE = 1;
    // etc.
}

class Order extends Model {
	// Renvoie la liste des commandes associés à un client
    public function getOrders($idClient){
		$req = 'SELECT * FROM tOrders WHERE client_id=?';
		return $this->executerRequete($req, array($id));
	}
}
?>