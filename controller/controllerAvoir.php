<?php
	require_once File::buildPath(array('model', 'modelAvoir.php'));

	class ControllerAvoir {

		public static function getJeux(){
			$editeur = ModelEditeur::getEditeurByNum($_GET['numEditeur']);
	        if ($editeur == false) {
	            $controller = "editeur";
	            $view = "listeEditeur";
	            $error = "Cet editeur n'existe pas !";
	            $title = "Liste des éditeurs";
	            $tab_edit = ModelEditeur::getAllEditeurs();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "avoir";
	            $view = "listeJeux";
	            $title = "Liste des jeux";
	            $tab_avoir = ModelAvoir::getAllJeuxByEditeur($editeur->getNumEditeur());
	            $tab_jeux = array();
	            if (isset($tab_avoir) && !empty($tab_avoir)){
		            foreach($tab_avoir as $avoir){
		            	$jeux = ModelJeux::getJeuxByNum($avoir->getNumJeu());
		            	array_push($tab_jeux, $jeux);
		            }
		        }
	            $listeType = ModelType::getAllType();
	            require File::buildPath(array("view", "view.php"));
	        }
		}
	}
?>