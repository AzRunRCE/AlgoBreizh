<?php
require_once 'Model/Product.php';
require_once 'View/View.php';
class WelcomeControler {
    private $product;
    public function __construct() {
        $this->product = new Product();
    }
	// Affiche la liste de tous les billets du blog
    public function welcome() {
        $products = $this->product->getProducts();
        $view = new View("Welcome");
        $view->generate(null);
    }
}