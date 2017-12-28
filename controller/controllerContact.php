<?php
	require_once File::buildPath(array('model', 'modelContact.php'));

	class ControllerContact {

		public static function readAllContact() {			
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
			$tab_cont = ModelContact::getAllContact($numEditeur);
			$controller = "contact";
			$view = "listeContact";
			$title = "Liste des contacts";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}
		
		public static function addContact(){
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
			$controller = "contact";
			$view = "addContact";
			$title = "Ajouter un contact";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerContact(){
			$controller = "contact";
			$view = "contactAdded";
			$title = "Contact ajouté";
			/*
			*Priviligie = checkbox donc coché = 1 = privilegie
			*						pas coché = 0 = pas privilegie
			*Si la checkbox n'est pas coché aucune valeur n'est retourné donc si une valeur est retournée (vérification par la fonction isset @see phpdoc) alors le contact est priviligié
			*/
			if(isset($_POST['estPrivilegie'])){
				//privilegie
				$contact = new ModelContact(1, $_POST['nomContact'], $_POST['prenomContact'], $_POST['mailContact'], $_POST['poste'], $_POST['telContact'], $_POST['numEditeur']);
			}else{
				//non privilegie
				$contact = new ModelContact(0, $_POST['nomContact'], $_POST['prenomContact'], $_POST['mailContact'], $_POST['poste'], $_POST['telContact'], $_POST['numEditeur']);
			}
			
			$contact->save();
			$tab_cont = ModelContact::getAllContact($_POST['numEditeur']);
			$numEditeur = $_POST['numEditeur'];
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelContact::getContactByNum($_GET['numContact']))){
				$contact = ModelContact::getContactByNum($_GET['numContact']);
				$contact->deleteContact();
			}else{$error = "Ce contact n'existe pas !";}		
			$controller = "contact";
			$view = "listeContact";
			$title = "Liste des contacts";
			$tab_edit = ModelEditeur::getAllEditeurs($contact->getNumEditeur());
			require File::buildPath(array("view", "view.php"));
		}
	}
?>