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
			$orders = $this->orderFactory->GetAllOrders();
			$view = new View("OrderAdmin");
			$view->generate(array('orders' => $orders));
		}
		else {
			$orders = $this->orderFactory->GetOrdersByClient($idClient);
			$view = new View("Order");
			$view->generate(array('orders' => $orders));
		}
    }

    public function generatePDF($idOrder){
        define('FPDF_FONTPATH','fpdf181/font');
        include('fpdf181/invoice/ex.php');
    }

    public function GetOrder($orderId){
        $order = $this->orderFactory->GetOrder($orderId);
        return $order;
    }

	 public function switchState($orderId){
        $order = new Order($orderId, "", "", "",null);
        $orderInfos = $order->switchState();
		return true;
    }
}
?>