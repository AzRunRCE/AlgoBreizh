<?php
require_once("model.php");

class Order extends Model{
	public $Id;
	public $CreationDate;
	public $Status;
	public $OwnerId;
	public $Content;
    public function __construct($_id, $_creationDate, $_status, $_OwnerId,$_Content) {
		$this->Id = $_id;
		$this->CreationDate = $_creationDate;
		$this->Status = $_status;
		$this->OwnerId = $_OwnerId;
		$this->Content = $_Content;
	}

	
// Changement d'état en base de données : 0 = En attente / 1 = Validée
	public function switchState(){
		$req = "UPDATE torders SET done = 1 WHERE id = ?";
		$this->executerRequete($req, array($this->Id));
	}
}
?>