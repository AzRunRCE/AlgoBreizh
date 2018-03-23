<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Manager/OrdersManager.php';
class NewProductControler {
  
    private $productsManager;
    private $welcomeCtrl;

    public function __construct() {
        $this->productsManager = new ProductsManager();
        $this->welcomeCtrl = new WelcomeControler();
    }
    // Affiche les détails sur un billet
    public function show() {
		if ($_SESSION["customer"]->Rights() == 0){
            $this->welcomeCtrl->show();
		}
		else {		
			$view = new View("NewProduct");
			$view->generate(NULL);
		}
    }

    // Ajoute un produit en fesant appel au ProductManager
    public function add($data) {
        $product = new Product(array('name' => $this->getParameter($data, 'name'),
        'price' => $this->getParameter($data, 'price'),
        'reference' => $this->getParameter($data, 'reference')));
        if ($this->productsManager->add($product))
        {
             return  $this->welcomeCtrl->show();
        }
    }

  	private function getParameter($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}
?>