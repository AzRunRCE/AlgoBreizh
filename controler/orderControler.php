<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';

class OrderControler {
    private $order;
    public function __construct() {
        $this->order = new Order();    
    }
    // Affiche les détails sur un billet
    public function order($idClient) {
        $order = $this->order->getOrders($idClient);
        $vue = new Vue("Order");
        $vue->generate(array('Order' => $order));
    }
}
?>
  