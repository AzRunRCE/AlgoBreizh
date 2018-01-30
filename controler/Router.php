<?php
require_once 'Controler/welcomeControler.php';
require_once 'Controler/loginControler.php';
require_once 'Controler/productsControler.php';
require_once 'Controler/productControler.php';
require_once 'Controler/cartControler.php';
require_once 'Controler/orderControler.php';

require_once 'View/View.php';

class Router {
    private $welcomeCtrl;
	private $loginCtrl;
	private $productsCtrl;
	private $productCtrl;
	private $cartCtrl;
	private $orderCtrl;
    public function __construct() {
		session_start();
        $this->welcomeCtrl = new WelcomeControler();
		$this->loginCtrl = new LoginControler();
		$this->productsCtrl = new ProductsControler();
		$this->productCtrl = new ProductControler();
		$this->cartCtrl = new CartControler();
		$this->orderCtrl = new OrderControler();
    }
    // Route une requête entrante : exécute l'action associée
    public function routerRequest() {	// Pourquoi pas un switch case à la place ?
        try {
			// Vérifie si la session du client est connectée
			$isLogged = isset($_SESSION["customer"]);
			if (isset($_GET['action'])) {
				// Affiche la page d'authentification / d'inscription
				if ($_GET['action'] == 'login' or $_GET['action'] == 'register' ) {
					if (isset($_POST['username']) && isset($_POST['password'])) {
						$username = $this->getParameter($_POST,'username');
						$password =	$this->getParameter($_POST,'password');
						$this->loginCtrl->login($username,$password);
					}
					else if(isset($_POST['username']) && isset($_POST['email']) ) {
						$username = $this->getParameter($_POST,'username');
						$email =	$this->getParameter($_POST,'email');
						$this->loginCtrl->sendPassword($username,$email);	
						$this->loginCtrl->show('login');
					}
					else {
						$this->loginCtrl->show($_GET['action']);
					}
				}
				// Affiche la boutique
				else if ($_GET['action'] == 'products' && $isLogged) {
					$this->productsCtrl->show();
				}
				// Affiche la modal de l'article séléctionné
				else if ($_GET['action'] == 'product' && $isLogged) {
					$this->productCtrl->show($this->getParameter($_GET,'id'));
				}
				// Déconnecte la session du client
				else if ($_GET['action'] == 'logout') {
					session_destroy();
					header("Location: index.php");
				}
				// Affiche les informations de la session connectée
				else if ($_GET['action'] == 'isUserLogged') {
					if (isset($_SESSION['customer']->Id)) {
						$return['firstname'] = $_SESSION['customer']->FirstName;
						$return['lastname'] = $_SESSION['customer']->LastName;
						$return['code'] = 'logged';
					}
					else {
						$return['code'] = 'notLogged';
					}
					echo json_encode($return);
					exit;
				}
				// Affiche le panier du client
				else if ($_GET['action'] == 'cart') {
					$this->cartCtrl->show();
				}
				// Ajoute l'article sélectionné au panier
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
				// Retir l'article sélectionné du panier
				else if ($_GET['action'] == 'removeFromCart' ) {
					if (isset($_GET['productId'])) {
						$this->cartCtrl->removeFromCart($this->getParameter($_GET,'productId'));
					}
				}
				// Retir tous les articles du panier
				else if ($_GET['action'] == 'clearCart' ) {
					$this->cartCtrl->clearCart();
				}
				// Affiche le message d'erreur spécifique au panier
				else if ($_GET['action'] == 'checkOut' ) {
					$this->cartCtrl->checkOut();
				}
				// Affiche les commandes du client
				else if ($_GET['action'] == 'orders' ) {
					$this->orderCtrl->show($_SESSION['customer']->Id);
				} else if ($_GET['action'] == 'generatePdf') {
					$this->orderCtrl->generatePDF($this->getParameter($_GET, 'orderId'));
				} else if ($_GET['action'] == 'switchState') {
					$this->orderCtrl->switchState($this->getParameter($_GET, 'orderId'));
					$this->orderCtrl->show($_SESSION['customer']->Id);
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
	// Redirection vers "login.php" si la session n'existe pas
	private function UserIsLogged() {
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
?>