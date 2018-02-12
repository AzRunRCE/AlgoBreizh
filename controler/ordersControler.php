<?php
require_once 'Controler/welcomeControler.php';
require_once 'Model/Order.php';
require_once 'View/View.php';
require_once 'Manager/OrdersManager.php';
require_once 'Tools/CredentialManager.php';

class OrdersControler {
    private $ordersManager;

    public function __construct() {
        $this->ordersManager = new OrdersManager();    
    }
    // Affiche les détails sur un billet
    public function show($idClient) {
		if (UserIsAdmin()){
			$orders = $this->ordersManager->getList();
			$view = new View("OrdersAdmin");
			$view->generate(array('orders' => $orders));
		}
		else {
			$orders = $this->ordersManager->getListForClient($idClient);
			$view = new View("Orders");
			$view->generate(array('orders' => $orders));
		}
    }

    public function showOrder($OrderId){
            $order = $this->ordersManager->get($OrderId);
		    $view = new View("Order");
		    $view->generate(array('Order' => $order));
    }

    public function generatePDF($idOrder){
        define('FPDF_FONTPATH','fpdf181/font');
        include('fpdf181/invoice/ex.php');
    }

	public function ValidOrder($orderId){
        $order = $this->ordersManager->get($orderId);
        $order->setState(1);
        $this->ordersManager->update($order);
    }
}
?>