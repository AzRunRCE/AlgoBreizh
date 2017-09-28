<?php
require_once("config/config.php");

abstract class OrderStatus
{
    const PENDING = 0;
	
    const CLOSE = 1;
    // etc.
}

function showHeader(){
	if(isset($_SESSION["user"])){
	    $buttons = file_get_contents("includes/header_logged.php");
	}
	else{
	    $buttons = file_get_contents("includes/header_not_logged.php");
	}
echo $buttons;
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

function verifyUserIsLogged(){
	// Redirection vers login.php si la session n'existe pas
	if(!isset($_SESSION["user"])){
  		header('Location: login.php');
	}else{
		return true;
	}
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
?>