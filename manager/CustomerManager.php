<?php
require_once("Model/model.php");
require_once('Model/Customer.php');

class CustomerManager extends Model {
	// Renvoie la liste des commandes associés à un client
	public function GetCustomerByLogin($username,$password){
		$req = 'SELECT * FROM tclients WHERE username=? AND password=?';
		$result = $this->executerRequete($req, array($username,$password))->fetch();
		return new Customer(
			$result['id'],
			$result['firstname'],
			$result['lastname'],
			$result['username'],
			$result['password'],
			$result['email'],
			$result['active'],
			$result['admin']);
   }
   
	public function SavePassword($username,$password){
		$req = 'UPDATE tclients SET password = ? WHERE username=?';
		$password =sha1($password);
		$client = $this->executerRequete($req, array($password,$username));
	}
}
?>