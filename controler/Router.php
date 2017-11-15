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
        $this->welcomeCtrl = new WelcomeControler();
        $this->orderCtrl = new OrderControler();
		$this->productCtrl = new ProductControler();
		$this->loginCtrl = new LoginControler();
    }
    // Route une requête entrante : exécution l'action associée
    public function routerRequest() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'products') {
                   $this->productCtrl->show();
                } 
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->loginCtrl->show();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
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