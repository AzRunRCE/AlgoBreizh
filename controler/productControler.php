<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';

class ProductControler {
    private $product;
    public function __construct() {
        $this->product = new Product();    
    }
    // Affiche les détails sur un billet
    public function show($isConnected) {
        $products = $this->product->getProducts();
        $view = new View("product");
        $view->generate(array('products' => $products,'Connected' =>$isConnected));
    }
}
?>
  