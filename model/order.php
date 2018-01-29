<?php
require_once("model.php");

class Order extends Model{
	public $Id;
	public $CreationDate;
	public $Status;
	public $OwnerId;
    public function __construct($_id, $_creationDate, $_status, $_OwnerId) {
		$this->Id = $_id;
		$this->CreationDate = $_creationDate;
		$this->Status = $_status;
		$this->OwnerId = $_OwnerId;
		}


	// Requête en base de données pour récuperer le contenu de la commande
	public function getContent(){
		$content = array();
		$req = "SELECT quantity, id_tProducts FROM torders_products WHERE id = ?";
        $productsIndexInOrder = $this->executerRequete($req, array($this->Id));
		$result = $productsIndexInOrder->fetchAll(PDO::FETCH_ASSOC);
		
		for($i = 0; $i < $productsIndexInOrder->rowCount(); $i++){
			$req2 = "SELECT * FROM tproducts WHERE id = ?";
			$productsInfos = $this->executerRequete($req2, array($result[$i]['id_tProducts']));
			$result2 = $productsInfos->fetch(PDO::FETCH_ASSOC);

			for ($j = 0; $j < $productsInfos->rowCount(); $j++){
				$result2[$j]['quantity'] = $result[$i]['quantity'];
				$content[$i] = $result2;
			}
		}
		
	return $content;
	}
	// Changement d'état en base de données : 0 = En attente / 1 = Validée
	public function switchState(){
		$req = "UPDATE torders SET done = 1 WHERE id = ?";
		$this->executerRequete($req, array($this->Id));
	}

}
?>