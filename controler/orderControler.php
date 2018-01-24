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
		if (UserIsAdmin()){
			$orders = $this->orderFactory->getAllOrders();
			$view = new View("OrderAdmin",UserIsLogged());
			$view->generate(array('orders' => $orders));
		}else {
			$orders = $this->orderFactory->getOrders($idClient);
			$view = new View("Order",UserIsLogged());
			$view->generate(array('orders' => $orders));
		}
        
    }

    public function generatePDF($idOrder){
        define('FPDF_FONTPATH','fpdf181/font');
        include('fpdf181/invoice/ex.php');
    }

    public function getOrderContent($orderId){
        $order = new Order($orderId, "", "", "");
        $orderInfos = $order->getContent();
        //print_r($orderInfos);
        return $orderInfos;
    }
	 public function switchState($orderId){
        $order = new Order($orderId, "", "", "");
        $orderInfos = $order->switchState();
		return true;
    }
}
?>