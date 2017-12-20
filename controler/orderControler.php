<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Tools/CredentialManager.php';
require_once 'factory/OrdersFactory.php';
class OrderControler {
    private $order;
    public function __construct() {
        $this->orderFactory = new OrdersFactory();    
    }
    // Affiche les détails sur un billet
    public function show($idClient) {
        $orders = $this->orderFactory->getOrders($idClient);
        $view = new View("Order",UserIsLogged());
        $view->generate(array('orders' => $orders));
    }
}
?>
  