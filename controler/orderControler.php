<?php
require_once 'Controler/WelcomeControler.php';
require_once 'Controler/OrderControler.php';
require_once 'View/View.php';

class ControlerOrder {
    private $order;
    public function __construct() {
        $this->order = new Order();    
    }
    // Affiche les détails sur un billet
    public function order($idClient) {
        $order = $this->order->getOrders($idClient);
        $vue = new Vue("Commande");
        $vue->generer(array('order' => $order));
    }
}
?>
  