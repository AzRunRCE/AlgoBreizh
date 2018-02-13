<?php
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';
require_once 'Manager/CartManager.php';


class CartControler{
	private $cartManager;
	private $ordersManager;
	private $welcomeCtrl;
    public function __construct() {
		$this->cartManager = new CartManager();
		$this->ordersManager = new OrdersManager();
    }
	// Affiche la liste de tous les billets du blog
    public function show() {
        $view = new View("cart");
		$view->generate(array('cart' => $this->cartManager->get()));
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
		$this->cartManager->delete($producId);
		header('Location: index.php?action=cart');
    }

	public function clearCart() {
		$this->cartManager->deleteAll();
		header('Location: index.php?action=cart');
    }

	public function checkOut() {
		$order = new Order(array('id' => 1, 
		'creationDate' => date(DATE_W3C),
		'clientId' => $_SESSION['customer']->id(), 
		'state' => '0'), $this->cartManager->get());

		$this->ordersManager->add($order);
		$this->cartManager->deleteAll();
		header('Location: index.php?action=orders');
    }
}
?>