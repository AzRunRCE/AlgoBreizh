<?php
require_once 'Controler/welcomeControler.php';
require_once 'Tools/CredentialManager.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Factory/ProductsFactory.php';

class ProductControler   {
    private $productsFactory;
    public function __construct() {
        $this->productsFactory = new ProductsFactory();    
    }
    // Affiche les détails sur un billet
    public function show($id) {
        $product = $this->productsFactory->GetProductById($id);
        $view = new View("product",UserIsLogged());
        $view->generate(array('product' => $product),False);
    }
}
?>
  