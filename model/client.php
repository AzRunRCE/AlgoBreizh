<?php
require_once("model.php");
class Client extends Model {
	// Renvoie la liste des commandes associés à un client
    public function getClient($username,$password){
		$req = 'SELECT * FROM tclients WHERE username=? AND password=?';
		$password =sha1($password);
		$client = $this->executerRequete($req, array($username,$password));
		if ($client->rowCount() > 0)
			return $client->fetch();	// Accès à la première ligne de résultat
        else
			return NULL;
	}

	public function addClient($userCoder, $email){
		$req = 'SELECT * FROM tproducts';
		return $this->executerRequete($req, array($id));
	}
}
?>