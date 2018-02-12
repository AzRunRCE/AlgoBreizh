<?php
require_once("Model/model.php");
require_once 'Model/Order.php';

class OrdersManager extends Model {

	// Changement d'état en base de données : 0 = En attente / 1 = Validée
	public function update($Order){
		$req = "UPDATE torders SET done = ?, creationDate = ? WHERE id = ?";
		$this->executerRequete($req, array($Order->Status,$Order->CreationDate,$Order->Id));
	}

	// Retourne toutes les commande d'un client donné
	function getListForClient($clientId){
		$stack = array();
		$req = 'SELECT * FROM torders WHERE id_tClients = ? ORDER BY creationDate DESC';
		$result = $this->executerRequete($req,array($clientId))->fetchAll();
		foreach ($result as $row){
			$itm = new Order($row, $this->getContent($row['id']));
			array_push($stack, $itm);
		}
		return $stack;
	}

   // Retourne un object de type Order
	function get($orderId){
		$req = 'SELECT * FROM torders WHERE id = ?';
		$row = $this->executerRequete($req,array($orderId))->fetch();
		$order = new Order($row,$this->getContent($row['id']));
		return $order;
    }

   // Retourne toutes les commandes sous forme de tableau
    function getList(){
		$stack = array();
		$req = "SELECT * FROM torders WHERE done = 0 ORDER BY creationDate";
		$result = $this->executerRequete($req)->fetchAll();
		foreach ($result as $row){
			$itm = new Order($row,$this->getContent($row['id']));
			array_push($stack, $itm);
		}
		return $stack;
    }

	// Retourne le contenu de la commande sous forme de tableau
   	private function getContent($OrderId){
		$content = array();
		$req = "SELECT quantity, id_tProducts FROM torders_products WHERE id = ?";
        $productsIndexInOrder = $this->executerRequete($req, array($OrderId));
		$result = $productsIndexInOrder->fetchAll(PDO::FETCH_ASSOC);
		for($i = 0; $i < $productsIndexInOrder->rowCount(); $i++){
			$req2 = "SELECT * FROM tproducts WHERE id = ?";
			$res =	$this->executerRequete($req, array($OrderId));
			$product = $productsInfos->fetch(PDO::FETCH_ASSOC);
			array_push($content,new Product($product));
		}
		
		return $content;
	}

}
?>