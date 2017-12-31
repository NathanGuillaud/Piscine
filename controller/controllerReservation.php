<?php
	require_once File::buildPath(array('model', 'modelReservation.php'));
	require_once File::buildPath(array('model', 'modelLouer.php'));

	class ControllerReservation {

		public static function readAllReservation() {
			$tab_reserv = ModelReservation::getAllReservations();     //appel au modèle pour gerer la BD
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des réservations";
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function readReservation(){
			$reservation = ModelReservation::getReservationByNum($_GET['numReservation']);
	        if ($reservation == false) {
	            $controller = "reservation";
	            $view = "listeReservation";
	            $error = "Cette reservation n'existe pas !";
	            $title = "Liste des reservations";
	            $tab_reserv = ModelReservation::getAllReservations();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "reservation";
	            $view = "detailReservation";
	            $title = "Détails de la reservation";
	            require File::buildPath(array("view", "view.php"));
	        }
		}
		
		public static function addReservation(){
			$tab_edit = ModelEditeur::getAllEditeurs();
			$tab_zone = ModelZone::getAllZones();
			if(isset($tab_edit) && !empty($tab_edit)){
				if(isset($tab_zone) && !empty($tab_zone)){
					$controller = "reservation";
					$view = "addReservation";
					$title = "Ajouter une reservation";
				}else{
					$error = "Vous n'avez pas de zones";
					$controller = "reservation";
					$view = "listeReservation";
					$title = "Liste des reservations";
				}				
			}else{
				$error = "Vous n'avez pas d'éditeur";
				$controller = "reservation";
				$view = "listeReservation";
				$title = "Liste des reservations";
			}
			require File::buildPath(array("view","view.php"));
		}

		public static function registerInterReservation(){	
			$tab_edit = ModelEditeur::getAllEditeurs();
			$tab_zone = ModelZone::getAllZones();		
			$numEditeur = $_POST['numEditeur'];
			$listeZone = $_POST['idZone'];//tableau id zones
			$tabZone = array();
			foreach ($listeZone as $idZone) {
				$zone = ModelZone::getZoneById($idZone);
				array_push($tabZone, $zone);
			}
			$tab_avoir = ModelAvoir::getAllJeuxByEditeur($numEditeur);
			$listeJeux = array();
	        if (isset($tab_avoir) && !empty($tab_avoir)){
		        foreach($tab_avoir as $avoir){
		            $jeux = ModelJeux::getJeuxByNum($avoir->getNumJeu());
		            array_push($listeJeux, $jeux);
		        }
		    }
			if(isset($listeJeux) && !empty($listeJeux)){
				$controller = "reservation";
				$view = "addReservationPlaces";
				$title = "Ajouter une reservation";			
			}else{
				$error = "L'éditeur n'a pas de jeux !";
				$controller = "reservation";
				$view = "addReservation";
				$title = "Ajouter une reservation";
			}
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function registerReservation(){
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des reservations";

			$idZone = $_POST['idZone'];
			$numEditeur = $_POST['numEditeur'];
			$nbPlace = $_POST['nbPlace'];//tableau contenant le nombre de place par zone..
			$numJeu = $_POST['numJeu'];//tableau des num jeux
			$place = 0;
			for ($i=0; $i < count($nbPlace); $i++) { 
				$place = $place + intval($nbPlace[$i]);
			}

			//Si il n'y a pas assez de place on arrete la reservation
			if($place > ModelLouer::getNombrePlaceRestante(Conf::$idFestival) || ModelLouer::getNombrePlaceRestante(Conf::$idFestival) == NULL){
				$error = "Pas assez de place !";
				$controller = "reservation";
				$view = "listeReservation";
				$title = "Liste des reservations";
				$tab_reserv = ModelReservation::getAllReservations();
				require File::buildPath(array("view", "view.php"));
				return 0;
			}

			if(isset($_POST['paye'])){
				$paye = 1;
			}else{
				$paye = 0;
			}

			if(isset($_POST['deplacement'])){
				$deplacement = 1;
			}else{
				$deplacement = 0;
			}
            
          	$reservation = new ModelReservation($paye, $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix'], $deplacement, $numEditeur);               
            $reservation->save();

			$numReservation = intval(ModelReservation::getLastNumReservation()[0]);

            for ($i=0; $i < count($idZone); $i++) {
            	$louer = new ModelLouer($nbPlace[$i], $idZone[$i], $numReservation);
            	$louer->save();
            }

			$tab_reserv = ModelReservation::getAllReservations();
			require File::buildPath(array("view", "view.php"));
		}
		
		public static function delete() {
			if (!empty(ModelReservation::getReservationByNum($_GET['numReservation']))){
				$reservation = ModelReservation::getReservationByNum($_GET['numReservation']);
				$reservation->deleteReservation();
			}else{$error = "Cette reservation n'existe pas !";}		
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des reservations pour cet editeur";			
			$tab_reserv = ModelReservation::getAllReservations();
			require File::buildPath(array("view", "view.php"));
		} 

		public static function update(){
			if (!empty(ModelReservation::getReservationByNum($_GET['numReservation']))){
				$controller = "reservation";
				$view = "updateReservation";
				$title = "Modifier une reservation";
				$editeur = ModelReservation::getReservationByNum($_GET['numReservation']);
				require File::buildPath(array("view", "view.php"));
				return 0; 		
			}else{		
				$error = "Cette reservation n'existe pas !";
			}
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des reservations";
			$tab_edit = ModelEditeur::getAllReservations();
			require File::buildPath(array("view", "view.php"));
			return 0;
		}

		public static function updateReservation(){
			if (!empty(ModelReservation::getReservationByNum($_GET['numReservation']))){
				$reservation = new ModelReservation($_POST['paye'], $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix'], $_POST['deplacement']);
				$reservation->update($_GET['numReservation']);
				$tab_edit = ModelReservation::getAllReservations();
				$controller = "reservation";
				$view = "listeReservation";
				$title = "Liste des reservations pour cet editeur";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}else{
				$error = "Cette reservation n'existe pas !";
			}
			$tab_edit = ModelReservation::getAllReservations();
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des reservations";
			require File::buildPath(array("view", "view.php"));
			return 0;
		}
	}
?>