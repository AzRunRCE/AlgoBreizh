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
					   $this->orderCtrl->show($_SESSION['client']['id']);
				} 
				else if ($_GET['action'] == 'bill' && $isLogged) {
						$this->productCtrl->show();
				}
			
				else if ($_GET['action'] == 'login' ) {
					if (isset($_POST['clientCode']) && isset($_POST['password'])) {
						$code = 	$this->getParameter($_POST,'clientCode');
						$password =	$this->getParameter($_POST,'password');
						$this->loginCtrl->Login($code,$password);	
					}
					else
						$this->loginCtrl->show();
				}
				else if ($_GET['action'] == 'products') {
						$this->productCtrl->show();
				}
				else if ($_GET['action'] == 'logout') {
					session_destroy();
					header("Location: index.php");
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
		if(!isset($_SESSION["client"])){
			return false;
		} 
		else{
			return true;
		}
	}
	
	 private function getParameter($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
    // Affiche une erreur
    private function erreur($msgErreur) {
        $view = new View("Error",false);
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