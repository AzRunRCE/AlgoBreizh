<?php
require_once("config/config.php");
require_once("cart.php");
abstract class OrderStatus
{
    const PENDING = 0;
	
    const CLOSE = 1;
    // etc.
}

function showHeader(){
	if(isset($_SESSION["user"])){
	    $header = require'view/header_logged.php';
	}
	else{
	    $header = require'view/header_not_logged.php';
	}
	echo $header;
}

function getClient($id){
    global $db;
    $req =$db->prepare('SELECT * FROM tclients WHERE id=:id');
    $req->bindParam(':id', $id);
    $req->execute();
    if($req->rowCount() == 1) {
        return $req->fetch();
    }
}

function checkPassword($clientCode,$password){
    global $db;
    $hashPassword= sha1($password);
    $req = $db->prepare('SELECT id FROM tclients WHERE code=:clientCode AND password=:password');
    $req->bindParam(':clientCode',$clientCode);
    $req->bindParam(':password',$hashPassword);
    $req->execute();
    if($req->rowCount() == 1) {
        return $req->fetch(PDO::FETCH_ASSOC)['id'];
    }
    else {
        return NULL;
    }
}
function createPassword($nbCaractere)
{
        $password = "";
        for($i = 0; $i <= $nbCaractere; $i++)
        {
            $random = rand(97,122);
            $password .= chr($random);
        }
    return $password;
}

function register($email,$clientCode){
    global $db;
	$hashPassword = sha1($password);
    $req = $db->prepare('SELECT id FROM tclients WHERE code=:clientCode AND active = 0');
    $req->bindParam(':clientCode',$clientCode);
    $req->execute();
    if($req->rowCount() == 1) {
		$password = createPassword(8);
		$id =$req->fetch(PDO::FETCH_ASSOC)['id'];
		$upd = $db->prepare('UPDATE tclients set password=:password,email=:email, active=1 WHERE id=:id');
		$upd->bindParam(':password',$hashPassword);
		$upd->bindParam(':email',$email);
		$upd->bindParam(':id',$id);	
		$upd->execute();
		$subject = 'AlgoBreizh - Inscription';
		$message = 'Mot de passe: '.$password;
		$headers = 'From: client@algobreizh.com' . "\r\n" .
		'Reply-To: client@algobreizh.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($email, $subject, $message, $headers);
        return 1;
    }
    else {
        return NULL;
    }
}


function getOrderForClient($id){
    global $db;
    $req = $db->prepare('SELECT * FROM tOrders WHERE client_id=:id');
    $req->bindParam(':id',$id);
    $req->execute();
    while($row=$req->fetch(PDO::FETCH_OBJ)) {
		echo '<tr><td>'.$row->date.'</td><td><a href="https://www.w3schools.com">PDF</a></td>'.'</td>';
		if($row->status == OrderStatus::PENDING){			
			echo '<td>En attente</td></tr>';
		}
		else if($row->status == OrderStatus::CLOSE){	
			echo '<td>Traîtée</td></tr>';
		}
    }
}

function getProducts(){
    global $db;
    $req = $db->prepare('SELECT * FROM tproducts');
    $req->execute();
    while($row=$req->fetch(PDO::FETCH_OBJ)) {
        $description = str_replace("-", " ", $row->description);
        $description = str_replace("_", " ", $description);
		echo '<div class="col-md-2">
            <div class="card" style="height: 230px">
                <div class="card-image">
                    <center> <img class="imageClip" src="thumbnail/'.$row->label.'.jpg"> </center>           
                </div>       
                <div class="card-content" style="height: 60px">
                    <p style="font-size: 16px">'.$description.'</p>
                </div>   
                <div class="card-action">
                <p>Prix: '.$row->price.'€</p>
                    <a href="#" class="btn btn-sm btn-success">Ajouter au panier</a>
                </div>
            </div>
        </div>';
    }
}
?>