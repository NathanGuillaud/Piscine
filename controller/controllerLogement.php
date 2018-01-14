 <?php
	require_once File::buildPath(array('model', 'modelLogement.php'));

	class ControllerLogement {

		public static function readAllLogement() {
			$tab_edit = ModelLogement::getAllLogements();     //appel au modèle pour gerer la BD
			$controller = "Logement";
			$view = "listeLogement";
			$title = "Liste des Logements";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}

        
		public static function readLogement(){
			$logement = ModelLogement::getLogementByNum($_GET['numLogement']);
	        if ($logement == false) {
	            $controller = "Logement";
	            $view = "listeLogement";
	            $error = "Cet Logement n'existe pas !";
	            $title = "Liste des éditeurs";
	            $tab_edit = ModelLogement::getAllLogements();
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
			$view = "listeLogement";
			$title = "Liste logements";
            if(isset($_POST['payeParFestival'])){
				$nbrJeux = $_POST['payeParFestival'];
			}else{
				$nbrJeux = 0;
			}
            
			$logement = new ModelLogement($_POST['nomLogement'],$_POST['rueLogement'], $_POST['villeLogement'], $_POST['CPLogement'],$_POST['mailLogement'], $_POST['telLogement'], $_POST['siteLogement'], $payeParFestival);
			$logement->save();
			$tab_edit = ModelLogement::getAllLogements();
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelLogement::getLogementByNum($_GET['numLogement']))){
				$Logement = ModelLogement::getLogementByNum($_GET['numLogement']);
				$Logement->deleteLogement();
			}else{$error = "Ce Logement n'existe pas !";}		
			$controller = "Logement";
			$view = "listeLogement";
			$title = "Liste des logements";
			$tab_edit = ModelLogement::getAllLogements();
			require File::buildPath(array("view", "view.php"));
		} 

		public static function update(){
			if (!empty(ModelLogement::getLogementByNum($_GET['numLogement']))){
				$controller = "Logement";
				$view = "updateLogement";
				$title = "Modifier un logement";
				$logement = ModelLogement::getLogementByNum($_GET['numLogement']);
				require File::buildPath(array("view", "view.php"));
				return 0; 		
			}else{		
				$error = "Cet Logement n'existe pas !";
			}
			$controller = "Logement";
			$view = "listeLogement";
			$title = "Liste logements";
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
	}
?>