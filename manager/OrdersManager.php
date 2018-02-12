<?php
require_once("Model/model.php");
require_once 'Model/Order.php';
require_once 'Model/attachedProduct.php';

class OrdersManager extends Model {

	// Changement d'état en base de données : 0 = En attente / 1 = Validée
	public function update($Order){
		$req = "UPDATE torders SET state = ?, creationDate = ? WHERE id = ?";
		$this->executerRequete($req, array($Order->state(),$Order->creationDate(),$Order->id()));
	}

	// Retourne toutes les commande d'un client donné
	function getListForClient($clientId){
		$stack = array();
		$req = 'SELECT * FROM torders WHERE clientId = ? ORDER BY creationDate DESC';
		$result = $this->executerRequete($req,array($clientId))->fetchAll();
		foreach ($result as $row){
			$itm = new Order($row, $this->getContent($row['id']));
			array_push($stack, $itm);
		}
		return $stack;
	}

   // Retourne un object de type Order
	function get($orderId){
		
		$row = $this->executerRequete('SELECT * FROM torders WHERE id = ?', array($orderId))->fetch();
		$order = new Order($row, $this->getContent($row['id']));
		return $order;
    }

   // Retourne toutes les commandes sous forme de tableau
    function getList(){
		$stack = array();
		$req = "SELECT * FROM torders WHERE state = 0 ORDER BY creationDate";
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
		$req = "SELECT quantity, productId FROM torders_products WHERE id = ?";
        $orderLines = $this->executerRequete($req, array($OrderId));
		$lines = $orderLines->fetchAll(PDO::FETCH_ASSOC);
		for($i = 0; $i < count($lines); $i++){
			$productsRow = $this->executerRequete("SELECT * FROM tproducts WHERE id = ?", array($lines[$i]['productId']))->fetch(PDO::FETCH_ASSOC);
			$content[$i] = new AttachedProduct($productsRow, array('quantity' => $lines[$i]['quantity']));
		}
		return $content;
	}

}
?>