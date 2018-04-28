<?php
require_once("model/model.php");
require_once('model/Product.php');

class ProductsManager extends Model {
	// Renvoie la liste des commandes associés à un client
	public function get($id){
		$req = 'SELECT * FROM tproducts WHERE id=?';
		$row = $this->executerRequete($req, array($id))->fetch();
		return new Product($row);
	}
	
	//Retourne l'ensemble des produits disponible en base
  	public function getList(){
		$stack = array();
		$req = 'SELECT * FROM tproducts WHERE 1';
		$result = $this->executerRequete($req)->fetchAll();
		foreach ($result as $row){
			$itm = new Product($row);
			array_push($stack, $itm);
		}
		return $stack;
	}
}
?>