<?php
	require_once File::buildPath(array('model', 'modelEditeur.php'));

	class ControllerEditeur {

		public static function readAllEditeur() {
			$tab_edit = ModelEditeur::getAllEditeurs();     //appel au modèle pour gerer la BD
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des editeurs";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}
		
		public static function addEditeur(){
			$controller = "editeur";
			$view = "addEditeur";
			$title = "Ajouter un éditeur";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerEditeur(){
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste éditeurs";
			$editeur = new ModelEditeur($_POST['nomEditeur'], $_POST['mailEditeur'], $_POST['telEditeur'], $_POST['siteEditeur'], $_POST['comEditeur'], $_POST['nbrJeux']);
			$editeur->save();
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelEditeur::getEditeurByNum($_GET['numEditeur']))){
				$editeur = ModelEditeur::getEditeurByNum($_GET['numEditeur']);
				$editeur->deleteEditeur();
			}			
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des éditeurs";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
		} 
        
        public static function change() {
			if (!empty(ModelEditeur::getEditeurByNum($_GET['numEditeur']))){
				$editeur = ModelEditeur::getEditeurByNum($_GET['numEditeur']);
				$editeur->changeEditeur();
			}			
			$controller = "editeur";
			$view = "addEditeur";
			$title = "Modifiez les informations de cet editeur";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
		} 
        

	}
?>