<?php
require 'Model/Cart.php';
require_once 'View/View.php';
require_once 'Controler/baseControler.php';

class CartControler  extends BaseControler {
	private $cart;
	private $welcomeCtrl;
    public function __construct() {
		$this->cart = new Cart();
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("cart",$this->UserIsLogged());
        $view->generate(null);
    }
	
	public function addToCart($producId,$quantity) {
		$this->cart->addToCart($producId);
    }
	
}