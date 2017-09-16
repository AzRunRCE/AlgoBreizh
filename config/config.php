<?php
$user = "root";
$pass = "";
ini_set('SMTP','smtp.free.fr');
ini_set('sendmail_from', 'frank@free.fr');

global $db;
try {
     $db = new PDO('mysql:host=localhost;dbname=algobreizh', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>