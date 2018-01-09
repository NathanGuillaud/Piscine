<?php
	require_once File::buildPath(array('model', 'modelSuivi.php'));

	class ControllerSuivi {

		public static function addSuivi($numEditeur){
			$controller = "suivi";
			$view = "addSuivi";
			$title = "Ajouter un suivi";
			require File::buildPath(array("view","view.php"));
		}

		public static function readSuivi(){
			$suivi = ModelSuivi::getSuiviByNum($_GET['numSuivi']);
	        if ($suivi == false) {
	            $controller = "editeur";
	            $view = "listeEditeur";
	            $error = "Ce suivi n'existe pas !";
	            $title = "Liste des éditeurs";
	            $tab_edit = ModelEditeur::getAllEditeurs();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "suivi";
	            $view = "detailSuivi";
	            $title = "Détails Suivi";
	            require File::buildPath(array("view", "view.php"));
	        }
		}
        
        public static function readAllSuivis() {
			$tab_suivi = ModelSuivi::getAllSuivis();     //appel au modèle pour gerer la BD
			$controller = "suivi";
			$view = "listeSuivi";
			$title = "Liste de l'ensemble des suivis";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}

		public static function registerSuivi(){
			$controller = "suivi";
			$view = "suiviAdded";
			$title = "Suivi ajouté";

			$numEditeur = htmlspecialchars($_POST['numEditeur']);



			//On récupère le num du jeux qu'on vient d'enregistrer et on insére dans la table avoir
			$lastNumSuivi = ModelSuivi::getLastNumSuivi();

			require File::buildPath(array("view", "view.php"));
		}

		public static function delete() {
			if (!empty(ModelSuivi::getSuivitByNum($_GET['numSuivi']))){
				$suivi = ModelSuivi::getSuiviByNum($_GET['numSuivi']);
				$suivi->deleteSuivi();
			}else{$error = "Ce suivi n'existe pas !";}
			$controller = "suivi";
			$view = "listeSuivi";
			$title = "Liste des suivis";
			$tab_edit = ModelEditeur::getAllEditeurs($contact->getNumEditeur());
			require File::buildPath(array("view", "view.php"));
		}

		public static function update(){
			if (!empty(ModelSuivi::getSuiviByNum($_GET['numSuivi']))){
				$controller = "suivi";
				$view = "updateSuivi";
				$title = "Modifier un suivi";
				$suivi = ModelSuivi::getSuiviByNum($_GET['numSuivi']);
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce suivi n'existe pas !";
			}
		}

		public static function updateSuivi(){
			$suivi = ModelSuivi::getSuiviByNum($_GET['numSuivi']);
			$numEditeur = $suivi["numEditeur"];
			if (!empty($suivi)){

				if(isset($_POST['estPresent'])){
					$estPresent = 1;
				}else{
					$estPresent = 0;
				}

				if(isset($_POST['interesse'])){
					$interesse = 1;
				}else{
					$interesse = 0;
				}

				if(isset($_POST['datePremierContact'])){
					$date = $_POST['datePremierContact'];
				}else{
					echo 'ERREUR : MANQUE DATE PREMIER CONTACT';
				}

				if(isset($_POST['relanceContact'])){
					$relance = $_POST['relanceContact'];
				}else{
					echo 'ERREUR : MANQUE DATE RELANCE CONTACT';
				}

				if(isset($_POST['compteRendu'])){
					$cr = $_POST['compteRendu'];
				}else{
					echo 'ERREUR : MANQUE DATE COMPTE RENDU';
				}

				if(isset($_POST['commentaire'])){
					$commentaire = $_POST['commentaire'];
				}else{
					echo 'ERREUR : MANQUE COMMENTAIRE';
				}

				//intval -> convertit un string en int
				$suivi = new ModelSuivi($date, $relance, $cr, $interesse, $estPresent, $commentaire, $numEditeur);
				$suivi->update($_GET['numSuivi']);

				$controller = "suivi";
				$view = "detailSuivi";
				$title = "Suivi modifié";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce suivi n'existe pas !";
			}
		}
	}
?>
