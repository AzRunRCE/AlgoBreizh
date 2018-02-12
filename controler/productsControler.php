<?php
require_once 'Controler/welcomeControler.php';
require_once 'Tools/CredentialManager.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Manager/ProductsManager.php';

class ProductsControler   {
    private $productsManager;
    public function __construct() {
        $this->productsManager = new ProductsManager();    
    }
    // Affiche les produits
    public function show() {
        $products = $this->productsManager->getList();
        $view = new View("products");
        $view->generate(array('products' => $products));
       
    }
}
?>
  