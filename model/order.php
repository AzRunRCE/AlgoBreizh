<?php
require_once("model.php");
class Order extends Model {
	// Renvoie la liste des commandes associés à un client
    public function getOrders($idClient){
		$req = 'SELECT * FROM tOrders WHERE id_tClients=?';
		return $this->executerRequete($req, array($idClient));
	}
}
?>