<?php
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';
require_once 'Manager/CartManager.php';


class CartControler{
	private $cartManager;
	private $welcomeCtrl;
    public function __construct() {
		$this->cartManager = new CartManager();
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("cart");
		$view->generate(array('cart' => $this->cartManager->getCart()));
    }	

	public function addToCart($producId, $quantity,$output) {
		if ($this->cartManager->addToCart($producId, $quantity)){
			$return['code'] = 'success';
		}
		else {
			$return['code'] = 'error';
		}
		if ($output){
			echo json_encode($return);}
		else{
			$this->show();}
    }

	public function removeFromCart($producId) {
		$this->cartManager->removeFromCart($producId);
		header('Location: index.php?action=cart');
    }

	public function clearCart() {
		$this->cartManager->clearCart();
		header('Location: index.php?action=cart');
    }

	public function checkOut() {
		$this->cartManager->checkOut();
		header('Location: index.php?action=orders');
    }
}
?>