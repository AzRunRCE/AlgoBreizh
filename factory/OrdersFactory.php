<?php
require_once("Model/model.php");
require_once 'Model/Order.php';
class OrdersFactory extends Model {
	// Renvoie la liste des commandes associés à un client
   function GetBillByOrderId($id){
	
   }

   function GetOrdersByClient($clientId){
	$stack = array();
	$req = 'SELECT * FROM torders WHERE id_tClients = ? ORDER BY creationDate DESC';
	$result = $this->executerRequete($req,array($clientId))->fetchAll();
	foreach ($result as $row){
		$itm = new Order($row['id'],$row['creationDate'],$row['done'],$row['id_tClients'],$this->GetContent($row['id']));
		array_push($stack, $itm);
	}
	return $stack;
   }

	function GetOrder($clientId){
		$stack = array();
		$req = 'SELECT * FROM torders WHERE id = ?';
		$row = $this->executerRequete($req,array($clientId))->fetch();
		$order = new Order($row['id'],$row['creationDate'],$row['done'],$row['id_tClients'],$this->GetContent($row['id']));
	
		return $order;
   }

   function GetAllOrders(){
		$stack = array();
		$req = "SELECT * FROM torders WHERE done = 0 ORDER BY creationDate";
		$result = $this->executerRequete($req)->fetchAll();
		foreach ($result as $row){
			$itm = new Order($row['id'],$row['creationDate'],$row['done'],$row['id_tClients'],$this->GetContent($row['id']));
			array_push($stack, $itm);
		}
	return $stack;
   }

   	private function GetContent($OrderId){
		$content = array();
		$req = "SELECT quantity, id_tProducts FROM torders_products WHERE id = ?";
        $productsIndexInOrder = $this->executerRequete($req, array($OrderId));
		$result = $productsIndexInOrder->fetchAll(PDO::FETCH_ASSOC);

		for($i = 0; $i < $productsIndexInOrder->rowCount(); $i++){
			$req2 = "SELECT * FROM tproducts WHERE id = ?";
			$productsInfos = $this->executerRequete($req2, array($result[$i]['id_tProducts']));
			$result2 = $productsInfos->fetch(PDO::FETCH_ASSOC);

			for ($j = 0; $j < $productsInfos->rowCount(); $j++){
				$result2[$j]['quantity'] = $result[$i]['quantity'];
				$content[$i] = $result2;
			}
		}
		return $content;
	}
}
?>