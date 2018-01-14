<?php
	require_once File::buildPath(array('model', 'modelJeux.php'));

	class ControllerJeux {

		public static function addJeux(){
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
			$controller = "jeux";
			$view = "addJeux";
			$title = "Ajouter un jeux";
			$listeType = ModelType::getAllType();
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerJeux(){
			$controller = "jeux";
			$view = "jeuxAdded";
			$title = "Jeu ajouté";

			$numEditeur = htmlspecialchars($_POST['numEditeur']);

			if(isset($_POST['estPrototype'])){
				$prototype = 1;
			}else{
				$prototype = 0;
			}
		
			if(isset($_POST['estSurdi'])){
				$surdi = 1;
			}else{
				$surdi = 0;
			}

			if(isset($_POST['payerFrais'])){
				$frais = 1;
			}else{
				$frais = 0;
			}
			
			//intval -> convertit un string en int
			$jeux = new ModelJeux($_POST['libelleJeu'], $prototype, $surdi, $frais, intval($_POST['numType']));

			$jeux->save();

			//On récupère le num du jeux qu'on vient d'enregistrer et on insére dans la table avoir
			$lastNumJeux = ModelJeux::getLastNumJeux();
			$avoir = new ModelAvoir(intval($lastNumJeux[0]), $numEditeur, $_POST['nbExemplaire']);
			$avoir->save();

			$listeType = ModelType::getAllType();
			
			//On regarde si on vient d'une popup ou non
			if(!isset($_POST['popupJS'])){				
				require File::buildPath(array("view", "view.php"));
			}
			return 0;
		}
		
		public static function delete() {
			if (!empty(ModelJeux::getJeuxByNum($_GET['numJeu']))){
				$jeux = ModelJeux::getJeuxByNum($_GET['numJeu']);
				$jeux->deleteJeux();
			}else{$error = "Ce jeu n'existe pas !";}		
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des éditeurs";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
		}

		public static function update(){
			if (!empty(ModelJeux::getJeuxByNum($_GET['numJeu']))){
				if (!empty(ModelEditeur::getEditeurByNum($_GET['numEditeur']))) {
					$controller = "jeux";
					$view = "updateJeux";
					$title = "Modifier un jeu";
					$jeux = ModelJeux::getJeuxByNum($_GET['numJeu']);
					$avoir = ModelAvoir::getAllExemplaireByEditeur($_GET['numJeu'], $_GET['numEditeur']);
					$listeType = ModelType::getAllType();
					require File::buildPath(array("view", "view.php"));
					return 0; 		
				}else{
					$error = "Cet editeur n'existe pas !";
				}
			}else{		
				$error = "Ce jeu n'existe pas !";
			}
			$controller = "editeur";
			$view = "listeEditeur";
			$title = "Liste des éditeurs";
			$tab_edit = ModelEditeur::getAllEditeurs();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateJeux(){
			if (!empty(ModelJeux::getJeuxByNum($_GET['numJeu']))){
				$numEditeur = htmlspecialchars($_POST['numEditeur']);

				if(isset($_POST['estPrototype'])){
					$prototype = 1;
				}else{
					$prototype = 0;
				}
			
				if(isset($_POST['estSurdi'])){
					$surdi = 1;
				}else{
					$surdi = 0;
				}

				if(isset($_POST['payerFrais'])){
					$frais = 1;
				}else{
					$frais = 0;
				}
				
				//intval -> convertit un string en int
				$jeux = new ModelJeux($_POST['libelleJeu'], $prototype, $surdi, $frais, intval($_POST['numType']));
				$jeux->update($_GET['numJeu']);

				$avoir = new ModelAvoir($_GET['numJeu'], $numEditeur, $_POST['nbExemplaire']);
				$avoir->updateAvoir();

				$controller = "jeux";
				$view = "jeuxAdded";
				$title = "Jeu modifié";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce jeu n'existe pas !";
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