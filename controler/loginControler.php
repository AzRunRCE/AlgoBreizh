<?php
require_once 'View/View.php';
class LoginControler {
    public function __construct() {
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("Login");
        $view->generate(null);
    }
}