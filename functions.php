<?php
require_once("config/config.php");

abstract class OrderStatus
{
    const PENDING = 0;
	
    const CLOSE = 1;
    // etc.
}

function getClient($id){
    global $db;
    $sth =$db->prepare('SELECT * FROM tclients WHERE id=:id');
    $sth->bindParam(':id', $id);
    $sth->execute();
    if($sth->rowCount() == 1) {
        return $sth->fetch();
    }
}

function checkPassword($clientCode,$password){
    global $db;
    $sth = $db->prepare('SELECT id FROM tclients WHERE code=:clientCode AND password=:password');
    $sth->bindParam(':clientCode',$clientCode);
    $sth->bindParam(':password', sha1($password));
    $sth->execute();
    if($sth->rowCount() == 1) {
        return $sth->fetch(PDO::FETCH_ASSOC)['id'];
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
	
    $sth = $db->prepare('SELECT id FROM tclients WHERE code=:clientCode AND active = 0');
    $sth->bindParam(':clientCode',$clientCode);
    $sth->execute();
    if($sth->rowCount() == 1) {
		$password = createPassword(8);
		$id =$sth->fetch(PDO::FETCH_ASSOC)['id'];
		$upd = $db->prepare('UPDATE tclients set password=:password,email=:email, active=1 WHERE id=:id');
		$upd->bindParam(':password',$password);
		$upd->bindParam(':email',sha1($email));
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
    $sth = $db->prepare('SELECT * FROM tOrders WHERE client_id=:id');
    $sth->bindParam(':id',$id);
    $sth->execute();
    while($row=$sth->fetch(PDO::FETCH_OBJ)) {
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