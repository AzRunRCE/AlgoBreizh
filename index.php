<?php

require 'controler/controler.php';

try {
  if (isset($_GET['view'])) {
    if ($_GET['view'] == 'billet') {
      if (isset($_GET['id'])) {
        $idBillet = intval($_GET['id']);
        if ($idBillet != 0) {
          billet($idBillet);
        }
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {  // aucune action définie : affichage de l'accueil
    accueil();
  }
}
catch (Exception $e) {
  erreur($e->getMessage());
}

?>
