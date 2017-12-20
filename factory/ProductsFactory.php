<?php
require_once("Model/model.php");
require_once('Model/Product.php');

class ProductsFactory extends Model {
	// Renvoie la liste des commandes associés à un client
   function GetProductById($id){
	$req = 'SELECT * FROM tproducts WHERE id=?';
	$result = $this->executerRequete($req, array($id))->fetch();
	return new Product($result['id'],$result['name'],$result['price'],$result['reference']);
   }

   function GetProducts(){
	$stack = array();
	$req = 'SELECT * FROM tproducts';
	$result = $this->executerRequete($req)->fetchAll();
	foreach ($result as $row){
		$itm = new Product($row['id'],$row['name'],$row['price'],$row['reference']);
		array_push($stack, $itm);
	}
	return $stack;
   }
}
?>