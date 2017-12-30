<?php
	require_once File::buildPath(array('model', 'modelType.php'));

	class ControllerType {

		public static function readAllType() {
			$tab_type = ModelType::getAllType();     //appel au modèle pour gerer la BD
			$controller = "type";
			$view = "listeType";
			$title = "Liste des types de jeux";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}

		public static function readType(){
			$type = ModelType::getTypeByNum($_GET['numType']);
	        if ($type == false) {
	            $controller = "type";
	            $view = "listeType";
	            $error = "Ce type n'existe pas !";
	            $title = "Liste des types de jeux";
	            $tab_type = ModelType::getAllType();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "type";
	            $view = "detailType";
	            $title = "Détails type de jeux";
	            require File::buildPath(array("view", "view.php"));
	        }
		}
		
		public static function addType(){
			$controller = "type";
			$view = "addType";
			$title = "Ajouter un type";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerType(){
			$controller = "type";
			$view = "listeType";
			$title = "Liste des types de jeux";
			$type = new ModelType($_POST['libelleType']);
			$type->save();
			$tab_type = ModelType::getAllType();
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelType::getTypeByNum($_GET['numType']))){
				if(!ModelType::isUsedType($_GET['numType'])){
					$type = ModelType::getTypeByNum($_GET['numType']);
					$type->deleteType();
				}else{
					$error = "Ce type est utilisé vous ne pouvez pas le supprimer !";
				}
			}else{$error = "Ce type n'existe pas !";}		
			$controller = "type";
			$view = "listeType";
			$title = "Liste des types de jeux";
			$tab_type = ModelType::getAllType();
			require File::buildPath(array("view", "view.php"));
		} 

		public static function update(){
			if (!empty(ModelType::getTypeByNum($_GET['numType']))){
				$controller = "type";
				$view = "updateType";
				$title = "Modifier un type";
				$type = ModelType::getTypeByNum($_GET['numType']);
				require File::buildPath(array("view", "view.php"));
				return 0; 		
			}else{		
				$error = "Ce type n'existe pas !";
			}
			$controller = "type";
			$view = "listeType";
			$title = "Liste des types de jeux";
			$tab_type = ModelType::getAllType();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateType(){
			if (!empty(ModelType::getTypeByNum($_GET['numType']))){
				$type = new ModelType($_POST['libelleType']);
				$type->update($_GET['numType']);
				$tab_type = ModelType::getAllType();
				$controller = "type";
				$view = "listeType";
				$title = "Liste des types de jeux";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Ce type n'existe pas !";
			}
			$tab_type = ModelType::getAllType();
			$controller = "type";
			$view = "listeType";
			$title = "Liste des types de jeux";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
	}
?>