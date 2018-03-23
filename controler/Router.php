<?php
require_once 'Controler/welcomeControler.php';
require_once 'Controler/loginControler.php';
require_once 'Controler/productsControler.php';

require_once 'Controler/cartControler.php';
require_once 'Controler/ordersControler.php';
require_once 'Controler/newProductControler.php';
require_once 'View/View.php';

class Router {
    private $welcomeCtrl;
	private $loginCtrl;
	private $productsCtrl;
	private $cartCtrl;
	private $ordersCtrl;
	private $newProductCtrl;
	
    public function __construct() {
		session_start();
        $this->welcomeCtrl = new WelcomeControler();
		$this->loginCtrl = new LoginControler();
		$this->productsCtrl = new ProductsControler();
		$this->cartCtrl = new CartControler();
		$this->ordersCtrl = new OrdersControler();
		$this->newProductCtrl = new NewProductControler();
    }
    // Route une requête entrante : exécute l'action associée
    public function routerRequest() {	// Pourquoi pas un switch case à la place ?
        try {
			// Vérifie si la session du client est connectée
				$isLogged = isset($_SESSION["customer"]);
				if (!isset($_GET['action'])) {
					$this->welcomeCtrl->show();
					return;
				}
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
						$this->loginCtrl->register($username,$email);	
						$this->loginCtrl->show('login');
					}
					else {
						$this->loginCtrl->show($_GET['action']);
					}
					return;
				}
				if (!$isLogged){
					$this->welcomeCtrl->show();
					return;
				}
				// Affiche la boutique
				if ($_GET['action'] == 'products') {
					$this->productsCtrl->show();
				}
				// Déconnecte la session du client
				else if ($_GET['action'] == 'logout') {
					session_destroy();
					header("Location: index.php");
				}
				// Affiche le panier du client
				else if ($_GET['action'] == 'cart') {
					$this->cartCtrl->show();
				}
				// Ajoute l'article sélectionné au panier
				else if ($_GET['action'] == 'addToCart' ) {
					if (isset($_GET['productId']) && isset($_GET['quantity']) && isset($_GET['output'])) {
						$this->cartCtrl->addToCart($this->getParameter($_GET,'productId'), $this->getParameter($_GET,'quantity'),$this->getParameter($_GET,'output'));
					}
				}
				// Retir l'article sélectionné du panier
				else if ($_GET['action'] == 'removeFromCart') {
					if (isset($_GET['productId'])) {
						$this->cartCtrl->removeFromCart($this->getParameter($_GET,'productId'));
					}
				}
				// Retir tous les articles du panier
				else if ($_GET['action'] == 'clearCart') {
					$this->cartCtrl->clearCart();
				}
				// Affiche le message d'erreur spécifique au panier
				else if ($_GET['action'] == 'checkOut') {
					$this->cartCtrl->checkOut();
				}
				// Affiche les commandes du client
				else if ($_GET['action'] == 'orders') {
					$this->ordersCtrl->show($_SESSION['customer']->id());
				}
				//Affiche la commande passée en paramèttre
				else if ($_GET['action'] == 'order') {
					if (isset($_GET['order'])) {
						$orderId = $this->getParameter($_GET,'order');	
						$this->ordersCtrl->showOrder($orderId);	
					}
				} 
				//Affiche la facture de la commande
				else if ($_GET['action'] == 'generatePdf') {
					$this->ordersCtrl->generatePDF($this->getParameter($_GET, 'orderId'));
				} 
				//Affiche la facture de la commande
				else if ($_GET['action'] == 'newProduct') {
						$this->newProductCtrl->show();
				} 
					//Affiche la facture de la commande
				else if ($_GET['action'] == 'addNewProduct') {
					$this->newProductCtrl->add($_POST);
				} 
				//Affiche la change l'état de la commande
				else if ($_GET['action'] == 'valid') {
					$this->ordersCtrl->ValidOrder($this->getParameter($_GET, 'orderId'));
					$this->ordersCtrl->show($_SESSION['customer']->id());
				}
				// Affiche les informations de la session connectée
				else if ($_GET['action'] == 'isUserLogged') {
						if (isset($_SESSION['customer'])) {
							$return['firstname'] = $_SESSION['customer']->firstName();
							$return['lastname'] = $_SESSION['customer']->lastName();
							$return['code'] = 'logged';
						}
						else {
							$return['code'] = 'notLogged';
						}
						echo json_encode($return);
						exit;
				}
				else {
					$this->welcomeCtrl->show();
				}
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
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