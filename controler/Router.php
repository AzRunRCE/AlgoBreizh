<?php
require_once 'Controler/welcomeControler.php';
require_once 'Controler/orderControler.php';
require_once 'View/View.php';
class Router {
    private $welcomeCtrl;
    private $orderCtrl;
    public function __construct() {
        $this->welcomeCtrl = new WelcomeControler();
        $this->orderCtrl = new OrderControler();
    }
    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->orderCtrl->order($idBillet);
                    }
                    else
                        throw new Exception("Identifiant de commande non valide");
                } 
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->welcomeCtrl->welcome();
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