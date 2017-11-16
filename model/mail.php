<?php
require_once("model.php");

class Mail extends Model {
	private $to;
	private $from;
	private $message;
	public function __construct($from,$to,$message) {
        $this->order = new Order();    
    }
	// Renvoie la liste des commandes associés à un client
    public function send($clientCode,$password){
		$req = 'SELECT id FROM tclients WHERE code=? AND password=?';
		return $this->executerRequete($req, array($clientCode,$password));
	}
	
	public function addClient($userCoder, $email){
		$req = 'SELECT * FROM tproducts';
		return $this->executerRequete($req, array($id));
	}
}
?>