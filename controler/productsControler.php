<?php
require_once 'Controler/welcomeControler.php';
require_once 'Tools/CredentialManager.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Factory/ProductsFactory.php';

class ProductsControler   {
    private $productsFactory;
    public function __construct() {
        $this->productsFactory = new ProductsFactory();    
    }
    // Affiche les détails sur un billet
    public function show() {
        $products = $this->productsFactory->GetProducts();
        $view = new View("products");
        $view->generate(array('products' => $products));
	
    }
}
?>
  