<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Manager/OrderManager.php';
require_once 'Tools/CredentialManager.php';

class OrderControler {
    private $order;

    public function __construct() {
        $this->orderManager = new OrderManager();    
    }
    // Affiche les détails sur un billet
    public function show($idClient) {
		if (UserIsAdmin()){
			$orders = $this->orderManager->GetAllOrders();
			$view = new View("OrdersAdmin");
			$view->generate(array('orders' => $orders));
		}
		else {
			$orders = $this->orderManager->GetOrdersByClient($idClient);
			$view = new View("Orders");
			$view->generate(array('orders' => $orders));
		}
    }

    public function showOrder($idClient, $idOrder){
            $Order = $this->orderManager->GetOrder($idOrder);
			$view = new View("Order");
		    $view->generate(array('Order' => $Order));
    }

    public function generatePDF($idOrder){
        define('FPDF_FONTPATH','fpdf181/font');
        include('fpdf181/invoice/ex.php');
    }

	public function ValidOrder($orderId){
        $this->orderManager->ValidOrder($orderId);
    }
}
?>