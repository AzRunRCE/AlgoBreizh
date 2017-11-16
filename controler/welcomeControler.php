<?php
require_once 'Model/Product.php';
require_once 'Controler/baseControler.php';
require_once 'View/View.php';
class WelcomeControler extends BaseControler {
    public function __construct() {
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("Welcome",$this->UserIsLogged());
		$view->generate(NULL);
	
    }
}