<?php
require 'Model/Client.php';
require_once 'View/View.php';
require_once 'Controler/baseControler.php';

class LoginControler  extends BaseControler {
	private $client;
	private $welcomeCtrl;
    public function __construct() {
		 $this->client = new Client();    
		 $this->welcomeCtrl = new WelcomeControler();
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("login",$this->UserIsLogged());
        $view->generate(null);
    }
	
	public function Login($clientCode,$password) {
		$client = $this->client->getClient($clientCode,$password);
		if ($client){
			$_SESSION['client'] = $client;
			$this->welcomeCtrl->show();
		}
		else
			$this->show();
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