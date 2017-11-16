<?php
require 'Model/Client.php';
require_once 'View/View.php';
class LoginControler {
	private $client;
    public function __construct() {
		 $this->client = new Client();    
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("Login");
        $view->generate(null);
    }
	
	public function Login($clientCode,$password) {
		$_SESSION['client'] =  $this->client->getClient($clientCode,$password);
    }
	private function sendPassword($to,$password)
	{
		$subject = 'AlgoBreizh - Inscription';
		$message = 'Mot de passe: '.$password;
		$headers = 'From: client@algobreizh.com' . "\r\n" .
		'Reply-To: client@algobreizh.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($email, $subject, $message, $headers);
	}
	
	
}