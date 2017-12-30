<?php
	require_once File::buildPath(array('model', 'modelSuivi.php'));

	class ControllerSuivi {

		public static function readAllSuivi() {
			$tab_edit = ModelSuivi::getAllSuivi();     //appel au modèle pour gerer la BD
			$controller = "suivi";
			$view = "listeSuivi";
			$title = "Liste des suivis";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}

		public static function addSuivi(){
			$numEditeur = htmlspecialchars($_GET['numEditeur']);
			$editeur = ModelEditeur::getEditeurByNum($numEditeur);
			if(!isset($numEditeur) || $editeur == false){
				$tab_edit = ModelEditeur::getAllEditeurs();     //appel au modèle pour gerer la BD
				$controller = "editeur";
				$view = "listeEditeur";
				$title = "Liste des editeurs";
				$error = "Cet editeur n'existe pas !";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}
			$controller = "suivi";
			$view = "addSuivi";
			$title = "Ajouter un suivi";
			$listeType = ModelType::getAllType();
			require File::buildPath(array("view","view.php"));
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
			if (!empty(ModelSuivi::getsuiviByNum($_GET['numSuivi']))){
				if (!empty(ModelEditeur::getEditeurByNum($_GET['numEditeur']))) {
					$controller = "suivi";
					$view = "updateSuivi";
					$title = "Modifier un suivi";
					$suivi = ModelSuivi::getSuiviByNum($_GET['numSuivi']);
					require File::buildPath(array("view", "view.php"));
					return 0;
				}else{
					$error = "Cet editeur n'existe pas !";
				}
			}else{
				$error = "Ce suivi n'existe pas !";
			}
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des éditeurs";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updatesuivi(){
			if (!empty(ModelSuivi::getSuiviByNum($_GET['numSuivi']))){
				$numEditeur = htmlspecialchars($_POST['numEditeur']);

				if(isset($_POST['estPresent'])){
					$present = 1;
				}else{
					$present = 0;
				}

				if(isset($_POST['interesse'])){
					$interesse = 1;
				}else{
					$interesse = 0;
				}
        $date = 'test date'
        $relance = 'test relance'
        $cr = 'test CR'
        $commentaire = 'test commentaire'

				//intval -> convertit un string en int
				$suivi = new ModelSuivi($date, $relance, $cr, $interesse, $present, $commentaire, $numEditeur);
				$suivi->update($_GET['numSuivi']);

				$controller = "suivi";
				$view = "SuivisAdded";
				$title = "Suivi modifié";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce suivi n'existe pas !";
			}
			$tab_edit = ModelEditeur::getAllEditeurs();
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste éditeurs";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
	}
?>
