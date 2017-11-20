<?php
require_once 'Model/Product.php';
require_once 'Tools/CredentialManager.php';
require_once 'View/View.php';
class WelcomeControler   {
    public function __construct() {
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("Welcome",UserIsLogged());
		$view->generate(NULL);
	
    }
}