<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Manager/ProductsManager.php';

class ProductControler {
	private $productsManager;
	public function __construct() {
		$this->productsManager = new ProductsManager();    
	}
    // Affiche les détails sur un billet
	public function show($id) {
        $product = $this->productsManager->get($id);
        $view = new View("product",UserIsLogged());
        $view->generate(array('product' => $product),False);
    }
}
?>
  