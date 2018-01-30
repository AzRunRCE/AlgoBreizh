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
    public function routerRequest() { // Pourquoi pas un switch case à la place ?
        try {
			// Vérifie si la session du client est connectée
			$isLogged = isset($_SESSION["customer"]);
			if (isset($_GET['action'])) {
				// Affichage de la page d'inscription / authentification
				if ($_GET['action'] == 'login' or $_GET['action'] == 'register' ) {
					if (isset($_POST['username']) && isset($_POST['password'])) {
						$username = $this->getParameter($_POST,'username');
						$password =	$this->getParameter($_POST,'password');
						$this->loginCtrl->login($username,$password);
					}
					else if($_POST['username'] && $_POST['email'] ) {
						$username = $this->getParameter($_POST,'username');
						$email =	$this->getParameter($_POST,'email');
						$this->loginCtrl->sendPassword($username,$email);	
						$this->loginCtrl->show('login');
					}
					else {
						$this->loginCtrl->show($_GET['action']);
					}
				}
				// Affichage de la boutique
				else if ($_GET['action'] == 'products' && $isLogged) {
					$this->productsCtrl->show();
				}
				// Affichage de la modal du produit séléctionné
				else if ($_GET['action'] == 'product' && $isLogged) {
					$this->productCtrl->show($this->getParameter($_GET,'id'));
				}
				// Déconnexion de la session de l'utilisateur
				else if ($_GET['action'] == 'logout') {
					session_destroy();
					header("Location: index.php");
				}
				// Affichage des informations de la session connecté
				else if ($_GET['action'] == 'isUserLogged') {
					if (isset($_SESSION['customer']->Id)) {
						$return['firstname'] = $_SESSION['customer']->FirstName;
						$return['lastname'] = $_SESSION['customer']->LastName;
						$return['code'] = 'logged';
					} else {
						$return['code'] = 'notLogged';
					}
					echo json_encode($return);
					exit;
				}
				// Affichage du panier
				else if ($_GET['action'] == 'cart') {
					$this->cartCtrl->show();
				}
				// Ajout de l'article au panier
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
				// Retrait de l'article du panier
				else if ($_GET['action'] == 'removeFromCart' ) {
					if (isset($_GET['productId'])) {
						$this->cartCtrl->removeFromCart($this->getParameter($_GET,'productId'));
					}
				}
				// Affichage du message d'erreur
				else if ($_GET['action'] == 'checkOut' ) {
					$this->cartCtrl->checkOut();
				}
				// Retrait de tous les articles du panier
				else if ($_GET['action'] == 'clearCart' ) {
					$this->cartCtrl->clearCart();
				}
				// Affichage des commandes
				else if ($_GET['action'] == 'orders' ) {
					$this->orderCtrl->show($_SESSION['customer']->Id);
				} else if ($_GET['action'] == 'generatePdf') {
					$this->orderCtrl->generatePDF($this->getParameter($_GET, 'orderId'));
				} else if ($_GET['action'] == 'switchState') {
					$this->orderCtrl->switchState($this->getParameter($_GET, 'orderId'));
					$this->orderCtrl->show();
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