<?php
require_once 'Modele/Billet.php';
require_once 'View/View.php';
class ControleurAccueil {
    private $products;
    public function __construct() {
        $this->products = new Product();
    }
	// Affiche la liste de tous les billets du blog
    public function welcome() {
        $products = $this->product->getProducts();
        $view = new Vue("Accueil");
        $view->generer(array('products' => $products));
    }
}