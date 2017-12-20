<?php
require_once 'Controler/welcomeControler.php';
require_once 'Controler/orderControler.php';
require_once 'Controler/productsControler.php';
require_once 'Controler/productControler.php';
require_once 'Controler/loginControler.php';
require_once 'Controler/cartControler.php';

require_once 'View/View.php';

class Router {
	private $welcomeCtrl;
	private $orderCtrl;
	private $productsCtrl;
	private $productCtrl;
	private $loginCtrl;
	private $cartCtrl;	
	public function __construct() {
		session_start();
		$this->welcomeCtrl = new WelcomeControler();
		$this->orderCtrl = new OrderControler();
		$this->productsCtrl = new ProductsControler();
		$this->productCtrl = new ProductControler();
		$this->loginCtrl = new LoginControler();
		$this->cartCtrl = new CartControler();
    }
    // Route une requête entrante : exécution l'action associée
	public function routerRequest() {
		try {
			$isLogged = $this->UserIsLogged();
			if (isset($_GET['action'])) {
				if ($_GET['action'] == 'order' && $isLogged) {
					$this->orderCtrl->show($_SESSION['client']['id']);
				}
				else if ($_GET['action'] == 'login' ) {
					if (isset($_POST['username']) && isset($_POST['password'])) {
						$username = $this->getParameter($_POST,'username');
						$password =	$this->getParameter($_POST,'password');
						$this->loginCtrl->login($username,$password);	
					}
					else
						$this->loginCtrl->show();
				}
				else if ($_GET['action'] == 'products') {
					$this->productsCtrl->show();
				}
				else if ($_GET['action'] == 'product') {
					$this->productCtrl->show($this->getParameter($_GET,'id'));
				}
				else if ($_GET['action'] == 'logout') {
					session_destroy();
					header("Location: index.php");
				}
				else if ($_GET['action'] == 'isUserLogged') {
					if (isset($_SESSION['client']['id'])) {
						$return['firstname'] = $_SESSION['client']['firstname'];
						$return['lastname'] = $_SESSION['client']['lastname'];
						$return['code'] = 'logged';
					} else {
						$return['code'] = 'notLogged';
					}
					echo json_encode($return);
					exit;
				}
				else if ($_GET['action'] == 'cart') {
					$this->cartCtrl->show();
				}
				else if ($_GET['action'] == 'addToCart' ) {
					if (isset($_GET['productId']) && isset($_GET['quantity'])) {
						$this->cartCtrl->addToCart($this->getParameter($_GET,'productId'),$this->getParameter($_GET,'quantity'));
						$return['code'] = 'success';
					}
					else {
						$return['code'] = 'error';
					}
					echo json_encode($return);
					exit;
				}
				else if ($_GET['action'] == 'removeFromCart' ) {
					if (isset($_GET['productId'])) {
						$this->cartCtrl->removeFromCart($this->getParameter($_GET,'productId'));
					}
				}
				else if ($_GET['action'] == 'checkOut' ) {
					$this->cartCtrl->checkOut();
				}
				else if ($_GET['action'] == 'clearCart' ) {
					$this->cartCtrl->clearCart();
				}
				else {
					$this->welcomeCtrl->show();
				}
			}
			else {
				$this->welcomeCtrl->show();
			}
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
	// Redirection vers login.php si la session n'existe pas
	private function UserIsLogged(){
		if(!isset($_SESSION["client"])){
			return false;
		} 
		else{
			return true;
		}
	}
	
	 private function getParameter($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
    // Affiche une erreur
    private function erreur($msgErreur) {
        $view = new View("Error",false);
        $view->generate(array('msgErreur' => $msgErreur));
    }
    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
}