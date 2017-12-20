<?php
require_once("Model/model.php");
require_once('Model/Product.php');

class OrdersFactory extends Model {
	// Renvoie la liste des commandes associés à un client
   function GetBillByOrderId($id){
	
   }

   function GetOrders($clientId){
	$stack = array();
	$req = 'SELECT * FROM torders  where id_tClients = ?';
	$result = $this->executerRequete($req)->fetchAll();
	foreach ($result as $row){
		$itm = new Product($row['id'],$row['name'],$row['price'],$row['reference']);
		array_push($stack, $itm);
	}
	return $stack;
   }
}
?>