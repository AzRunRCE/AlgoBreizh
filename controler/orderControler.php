<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';

class OrderControler {
    private $order;
    public function __construct() {
        $this->order = new Order();    
    }
    // Affiche les détails sur un billet
    public function show($idClient) {
        $orders = $this->order->getOrders($idClient);
        $view = new View("Order",UserIsLogged());
        $view->generate(array('orders' => $orders));
    }
}
?>
  