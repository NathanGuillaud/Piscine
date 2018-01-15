 <?php
	require_once File::buildPath(array('model', 'modelLogement.php'));

	class ControllerLogement {
        
		public static function readLogement(){
			$logement = ModelLogement::getLogement($_GET['numEditeur']);
	        if ($logement == false) {
	            $controller = "Logement";
	            $view = "detailLogement";
	            $error = "L'editeur n'a pas d'informations";
	            $title = "Details sur le logement";
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "Logement";
	            $view = "detailLogement";
	            $title = "Détails logement";
	            require File::buildPath(array("view", "view.php"));
	        }
		}
		
        
		public static function addLogement(){
			$controller = "Logement";
			$view = "addLogement";
			$title = "Ajouter un logement";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerLogement(){
			$controller = "Logement";
			$view = "detailEditeur";
			$title = "Informations sur le logement";
            
            if(isset($_POST['veutLogement'])){
					$veutLogement = 1;
				}else{
					$veutLogement = 0;
				}

				if(isset($_POST['aEuLogement'])){
					$aEuLogement = 1;
				}else{
					$aEuLogement = 0;
				}

				if(isset($_POST['facture'])){
					$facture = 1;
				}else{
					$facture = 0;
				}
            
                if(isset($_POST['commentaire'])){
					$commentaire = $_POST['commentaire'] ;
				}else{
					$facture = "Aucun commentaire";
				}
            
			$logement = new ModelLogement();
			$logement->save();
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelLogement::getLogement($_GET['numLogement']))){
				$Logement = ModelLogement::getLogement($_GET['numLogement']);
				$Logement->deleteLogement();
			}else{$error = "Ce Logement n'existe pas !";}		
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des editeurs";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
		} 
/*
		public static function update(){
			if (!empty(ModelLogement::getLogement($_GET['numEditeur']))){
				$controller = "Logement";
				$view = "updateLogement";
				$title = "Modifier un logement";
				$logement = ModelLogement::getLogement($_GET['numEditeur']);
				require File::buildPath(array("view", "view.php"));
				return 0; 		
			}else{		
				$error = "Ce Logement n'existe pas !";
			}
			$controller = "Logement";
			$view = "detailLogement";
			$title = "Detail du logement";
			$tab_edit = ModelLogement::getAllLogements();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateLogement(){
			if (!empty(ModelLogement::getLogementByNum($_GET['numLogement']))){
				$logement = new ModelLogement($_POST['nomLogement'], $_POST['mailLogement'], $_POST['telLogement'], $_POST['siteLogement'], $_POST['comLogement']);
				$logement->update($_GET['numLogement']);
				$tab_edit = ModelLogement::getAllLogements();
				$controller = "Logement";
				$view = "listeLogement";
				$title = "Liste éditeurs";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce Logement n'existe pas !";
			}
			$tab_edit = ModelLogement::getAllLogements();
			$controller = "Logement";
			$view = "listeLogement";
			$title = "Liste des logements";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
        */
	}
?>