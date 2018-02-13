<?php
require 'manager/CustomersManager.php';
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';

class LoginControler {
	private $CustomersManager;
	private $welcomeCtrl;
    public function __construct() {
		 $this->CustomersManager = new CustomersManager();
		 $this->welcomeCtrl = new WelcomeControler();
    }
	// Affiche la liste de tous les billets du blog
    public function Show($action) {
        $view = new View($action);
        $view->generate(null);
    }

	public function login($username,$password) {
		$password = sha1($password);
		$customer = $this->CustomersManager->get($username);
		if ($customer != null){
			if ($customer->password() == $password){
				$_SESSION['customer'] = $customer;
				$this->welcomeCtrl->show();
			}
			else {
				$this->show("login");
			}
		}
	}
	
	private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function register($username,$email)
	{
		$password = $this->generateRandomString(5);
		$customer = $this->CustomersManager->get($username);
		if ($customer != null){
			if ($customer->enabled() == 1){
				 return;
			}
			$customer->setPassword(sha1($password));
			$customer->setEmail($email);
			$customer->setEnabled(1);
			$this->CustomersManager->update($customer);
			$subject = 'AlgoBreizh - Inscription';
			$message = 'Mot de passe: '.$password;
			$headers = 'From: client@algobreizh.com' . "\r\n" .
			'Reply-To: client@algobreizh.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($email, $subject, $message, $headers);
		}
	}
}