<?php
require_once("Model/model.php");
require_once('Model/Product.php');

class ProductsManager extends Model {
	// Renvoie la liste des commandes associés à un client
	public function get($id){
		$req = 'SELECT * FROM tproducts WHERE id=?';
		$row = $this->executerRequete($req, array($id))->fetch();
		print_r($row);
		return new Product($row);
    }

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