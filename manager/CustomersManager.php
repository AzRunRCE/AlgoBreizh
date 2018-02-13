<?php
require_once("Model/model.php");
require_once('Model/Customer.php');

class CustomersManager extends Model {
	// Renvoie la liste des commandes associés à un client
	public function get($username){
		$req = 'SELECT * FROM tclients WHERE username=?';
		$result = $this->executerRequete($req, array($username))->fetch();
		return new Customer($result);
   }
   
   public function getById($id){
		$req = 'SELECT * FROM tclients WHERE id=?';
		$result = $this->executerRequete($req, array($id))->fetch();
		return new Customer($result);
	}
   
	public function update($Customer){
		$req = 'UPDATE tclients SET username = ?, firstname = ?, lastname = ?, password = ?, email = ?, enabled = ?, userRights = ? WHERE username=?';
		$client = $this->executerRequete($req, array(
			$Customer->username(),
			$Customer->firstName(), 
			$Customer->lastName(),
			$Customer->password(),
			$Customer->email(),
			$Customer->enabled(),
			$Customer->userRights(),
			$Customer->username()
		));
	}
}
?>