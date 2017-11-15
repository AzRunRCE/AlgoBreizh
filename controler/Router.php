<?php
require_once 'Controler/welcomeControler.php';
require_once 'Controler/orderControler.php';
require_once 'Controler/productControler.php';
require_once 'Controler/loginControler.php';
require_once 'View/View.php';

class Router {
    private $welcomeCtrl;
    private $orderCtrl;
	private $productCtrl;
	private $loginCtrl;
    public function __construct() {
		session_start();
        $this->welcomeCtrl = new WelcomeControler();
        $this->orderCtrl = new OrderControler();
		$this->productCtrl = new ProductControler();
		$this->loginCtrl = new LoginControler();
    }
    // Route une requête entrante : exécution l'action associée
    public function routerRequest() {
        try {
			$isLogged = $this->UserIsLogged();
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'order' && $isLogged) {
					   $this->orderCtrl->show();
				} 
				else if ($_GET['action'] == 'bill' && $isLogged) {
						$this->productCtrl->show();
				}
				else if ($_GET['action'] == 'login' && !$isLogged) {
						$this->loginCtrl->show();
				}
				else if ($_GET['action'] == 'products') {
						$this->productCtrl->show();
				}
				else{
					$this->welcomeCtrl->show();
				}
			}
			else{
				$this->welcomeCtrl->show();
			}
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
		// Redirection vers login.php si la session n'existe pas
	private function UserIsLogged(){
		if(!isset($_SESSION["user"])){
			return false;
		} 
		else{
			return true;
		}
	}

    // Affiche une erreur
    private function erreur($msgErreur) {
        $view = new View("Error");
        $view->generate(array('msgErreur' => $msgErreur));
    }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}