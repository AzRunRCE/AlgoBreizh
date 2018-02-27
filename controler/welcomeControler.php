<?php
require_once 'Model/Product.php';
require_once 'View/View.php';
class WelcomeControler   {
    public function __construct() {
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("Welcome");
		$view->generate(NULL);
	
    }
}