<?php
require_once("Model/model.php");
require_once('Model/Product.php');

class ProductsFactory extends Model {
	// Renvoie la liste des commandes associés à un client
   function GetProductById($id){
	$req = 'SELECT * FROM tproducts WHERE id=?';
	$result = $this->executerRequete($req, array($id));
	return new Product($result);
   }
   
   function GetProducts(){
	$stack = array();
	$req = 'SELECT * FROM tproducts';
	$result = $this->executerRequete($req)->fetchAll();
	foreach ($result as $row){
		$itm = new Product($row['id'],$row['label'],$row['price'],$row['description'],$row['reference']);
		array_push($stack, $itm);
	}
	return $stack;
   }
}
?>