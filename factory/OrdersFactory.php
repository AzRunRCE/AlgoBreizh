<?php
require_once("Model/model.php");
require_once 'Model/Order.php';
class OrdersFactory extends Model {
	// Renvoie la liste des commandes associés à un client
   function GetBillByOrderId($id){
	
   }

   function GetOrders($clientId){
	$stack = array();
	$req = 'SELECT * FROM torders WHERE id_tClients = ? ORDER BY creationDate DESC';
	$result = $this->executerRequete($req,array($clientId))->fetchAll();
	foreach ($result as $row){
		$itm = new Order($row['id'],$row['creationDate'],$row['done'],$row['id_tClients']);
		array_push($stack, $itm);
	}
	return $stack;
   }

   function GetAllOrders(){
		$stack = array();
		$req = "SELECT * FROM torders WHERE done = 0 ORDER BY creationDate";
		$result = $this->executerRequete($req)->fetchAll();
		foreach ($result as $row){
			$itm = new Order($row['id'],$row['creationDate'],$row['done'],$row['id_tClients']);
			array_push($stack, $itm);
		}
	return $stack;
   }

}
?>