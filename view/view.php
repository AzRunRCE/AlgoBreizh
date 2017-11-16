<?php
class View {
    // Nom du fichier associé à la vue
    private $file;
    
    // Titre de la vue (défini dans le fichier vue)
    private $title;
	 private $logged;
    public function __construct($action,$_logged) {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "View/" . $action . "view.php";
		$this->logged = $_logged;
    }
    // Génère et affiche la vue
    public function generate($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile('View/template.php',
                array('title' => $this->title, 'content' => $content, 'logged' => $this->logged));
        // Renvoi de la vue au navigateur
        echo $view;
    }
	
	
    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data) {
        if (file_exists($file)) {
			if ($data != null){
			    extract($data);
			}	
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}