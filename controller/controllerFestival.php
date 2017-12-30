<?php
	require_once File::buildPath(array('model', 'modelFestival.php'));

	class ControllerFestival {

		
		public static function addFestival(){
			$controller = "festival";
			$view = "addFestival";
			$title = "Ajout d'un festival";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerFestival(){
			$controller = "accueil";
			$view = "home";
            $title = "Accueil";
            $festival = new ModelFestival($_POST['nomSalle'], $_POST['nbTotalPlace'], $_POST['prixUniTable']); 
			$festival->save();
			require File::buildPath(array("view", "view.php"));
		}
        
        public static function update(){
			if (!empty(ModelFestival::getFestivalById($_GET['idFestival']))){
				$controller = "festival";
				$view = "updateFestival";
				$title = "Modifier les informations de ce festival";
				$festival = ModelFestival::getFestivalById($_GET['idFestival']);
                require File::buildPath(array("view", "view.php"));
				return 0; 		
			}else{		
				$error = "Ce festival n'existe plus !";
			}
			$controller = "festival";
			$view = "detailFestival";
			$title = "Details de cette Edition";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateFestival(){
			if (!empty(ModelFestival::getFestivalById($_POST['idFestival']))){
				$festival = new ModelFestival($_POST['nomSalle'], $_POST['nbTotalPlace'], $_POST['prixUniTable']);
				$festival->update($_POST['idFestival']);
			}else{
				$error = "Ce festival n'existe pas !";
			}
			$controller = "accueil";
			$view = "home";
			$title = "Accueil";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
	}
?>