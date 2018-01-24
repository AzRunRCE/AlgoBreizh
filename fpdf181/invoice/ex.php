<?php
require_once 'Controler/orderControler.php';
$orderControler = new OrderControler();
$tot_prods = array();
$orderContent = array();
$orderContent = $orderControler->getOrderContent($_GET['orderId']);

require('invoice.php');

$clientFullname = $_SESSION['client']['firstname'].' '.$_SESSION['client']['lastname'];
$clientAddress = "1337 Rue Elon Musk\n75000 PARIS";
$date = date('d/m/Y');
$endDate = date('d/m/Y', strtotime('+1 month'));

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "AlgoBreizh",
                  "18, rue de Molene\n" .
                  "29810 LAMPAUL-PLOUARZEL\n".
                  "R.C.S. RENNES B 000 000 007\n" .
                  "Capital : 18000 " . EURO );
$pdf->fact_dev( "Facture" , str_pad($_GET['orderId'], 8, '0', STR_PAD_LEFT));
$pdf->addDate($date);
$pdf->addClient($clientFullname);
$pdf->addPageNumber("1");
$pdf->addClientAdresse($clientFullname . "\n" . $clientAddress);
$pdf->addReglement("Cheque");
$pdf->addEcheance($endDate);
$pdf->addNumTVA("FR888777666");

$cols=array( "REFERENCE"    => 23,
"DESIGNATION"  => 74,
"QUANTITE"     => 22,
"P.U. HT"      => 26,
"MONTANT H.T." => 30,
"TVA"          => 15 );
$pdf->addCols( $cols);

$cols=array( "REFERENCE"    => "L",
             "DESIGNATION"  => "L",
             "QUANTITE"     => "C",
             "P.U. HT"      => "R",
             "MONTANT H.T." => "R",
             "TVA"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;

//Affichage du contenu de la commande
for($i = 0; $i < sizeof($orderContent); $i++){

    $reference = strval($orderContent[$i]['reference']);
    $name = utf8_decode($orderContent[$i]['name']);
    $price = floatval($orderContent[$i]['price']);
    $quantity = floatval($orderContent[$i][0]['quantity']);

    $line = array( 
    "REFERENCE"    => strval($reference),
    "DESIGNATION"  => strval($name),
    "QUANTITE"     => strval($quantity),
    "P.U. HT"      => strval($price),
    "MONTANT H.T." => strval($price * $quantity),
    "TVA"          => "20%" );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

$this_prod = array("px_unit" => $price, "qte" => $quantity, "tva" => 1);
array_push($tot_prods, $this_prod);

$tab_tva = array( "1"       => 19.6,
                  "2"       => 5.5);
}

$pdf->addCadreTVAs();
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte

$params  = array( "RemiseGlobale" => 0,
                      "remise_tva"     => 0,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 0,
                      "portTTC"        => 10,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 20,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 0,
                //      "accompte"         => 0,     // montant de l'acompte (TTC)
                //      "accompte_percent" => 0,    // pourcentage d'acompte (TTC)
                  "Remarque" => "" );

$pdf->addTVAs( $params, $tab_tva, $tot_prods);
$pdf->addCadreEurosFrancs();
$pdf->Output();
?>
