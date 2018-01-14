<?php
	require_once File::buildPath(array('model', 'modelZone.php'));
	require_once File::buildPath(array('model', 'modelConcerner.php'));
	class ControllerZone {

		public static function readZone(){
			$zone = ModelZone::getZoneById($_GET['idZone']);
	        if ($zone == false) {
	            $controller = "zone";
	            $view = "listeZone";
	            $error = "Cette zone n'existe pas !";
	            $title = "Liste des zones";
	            $tab_edit = ModelZone::getAllZones();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "zone";
	            $view = "detailZone";
	            $title = "Détails Zone";
	            require File::buildPath(array("view", "view.php"));
	        }
		}

		public static function readZones(){
			$tab_zone = ModelZone::getAllZones();     //appel au modèle pour gerer la BD
			$controller = "zone";
			$view = "listeZone";
			$title = "Liste des zones";
			$listeType = ModelType::getAllType();
			require File::buildPath(array("view", "view.php"));
		}

		public static function addZone(){
			$controller = "zone";
			$view = "addZone";
			$title = "Ajouter une Zone";
			$listeType = ModelType::getAllType();
			require File::buildPath(array("view","view.php"));
		}

		public static function registerZone(){
			$controller = "zone";
			$view = "listeZone";
			$title = "Liste des zones";

			//intval -> convertit un string en int
			$zone = new ModelZone($_SESSION['idFestival'], $_POST['libelleZone']);

			$zone->save();

			//On récupère l'id de la zone qu'on vient d'enregistrer et on insére dans la table concerner
			$lastIdZone = ModelZone::getLastIdZone();
			$concerner = new ModelConcerner($_POST['numType'], intval($lastIdZone[0]));
			$concerner->save();


			$listeType = ModelType::getAllType();

			//On regarde si on vient d'une popup ou non
			if(isset($_POST['popupJS']) && $_POST['popupJS'] == true){
				echo $lastIdZone[0];
				return 0;
			}else{
				$tab_zone = ModelZone::getAllZones();
				require File::buildPath(array("view", "view.php"));
			}
		}


		public static function delete() {
			if (!empty(ModelZone::getZoneById($_GET['idZone']))){
				$zone = ModelZone::getZoneById($_GET['idZone']);
				$zone->deleteZone();
			}else{$error = "Cette zone n'existe pas !";}

            $controller = "zone";
			$view = "listeZone";
			$title = "Liste des Zones créées";
			$tab_zone = ModelZone::getAllZones($zone->getIdZone());
			$listeType = ModelType::getAllType();
			require File::buildPath(array("view", "view.php"));
		}


		public static function update(){
			if (!empty(ModelZone::getZoneById($_GET['idZone']))){
				$controller = "zone";
				$view = "updateZone";
				$title = "Modifier zone";
				$zone = ModelZone::getZoneById($_GET['idZone']);
				$listeType = ModelType::getAllType();
	      require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Cette zone n'existe pas !";
			}
			$controller = "zone";
			$view = "listeZone";
			$title = "Liste des zones";
			$tab_zone = ModelZone::getAllZones();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateZone(){
			if (!empty(ModelZone::getZoneById($_GET['idZone']))){
				$idZone = htmlspecialchars($_GET['idZone']);

				//intval -> convertit un string en int
				$zone = new ModelZone($_SESSION['idFestival'],$_POST['libelleZone'] );
				$zone->update($idZone);

				$concerner = new ModelConcerner($_POST['numType'], $idZone);
				$concerner->updateConcerner();

				$controller = "zone";
				$view = "listeZone";
				$title = "Liste des zones";

				$tab_zone = ModelZone::getAllZones();
				$listeType = ModelType::getAllType();

				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Cette zone n'existe pas !";
			}
			$tab_zone = ModelZone::getAllZones();
			$controller = "zone";
			$view = "listeZone";
			$title = "Liste des zones";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
	}
?>
