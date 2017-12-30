<?php
	require_once File::buildPath(array('model', 'modelResrvation.php'));

	class ControllerReservation {

		public static function readAllReservation() {			
			$numEditeur = htmlspecialchars($_GET['numReservation']);
			$editeur = Modelreservation::getReservationByNum($numReservation);
			if(!isset($numReservation) || $reservation == false){
				$tab_edit = ModelReservation::getAllReservations(); //appel au modèle pour gerer la BDD
				$controller = "reservation";
				$view = "listeReservation";
				$title = "Liste des Reservation pour l'editeur";
				$error = "Cette Reservation n'existe pas !";
				require File::buildPath(array("view", "view.php"));
				return 0;
			}
			$tab_cont = ModelReservation::getAllReservation($numReservation);
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des Reservations de l'editeur";
			require File::buildPath(array("view", "view.php")); //"redirige" vers la vue
		}
		
		public static function readReservation(){
			$editeur = ModelReservation::getReservationByNum($_GET['numReservation']);
	        if ($reservation == false) {
	            $controller = "reservation";
	            $view = "listeReservation";
	            $error = "Cette reservation n'existe pas !";
	            $title = "Liste des reservations";
	            $tab_edit = ModelReservation::getAllReservations();
	            require File::buildPath(array("view", "view.php"));
	        } else {
	            $controller = "reservation";
	            $view = "detailReservation";
	            $title = "Détails de la reservation";
	            require File::buildPath(array("view", "view.php"));
	        }
		}
		
		public static function addReservation(){
			$controller = "reservation";
			$view = "addReservation";
			$title = "Ajouter une reservation";
			require File::buildPath(array("view","view.php"));
		}
		
		public static function registerReservation(){
			$controller = "reservation";
			$view = "listeReservation";
			$title = "Liste des reservations";
            
            if(isset($_POST['paye']) && isset($_POST['deplacement'])){
                
				// Paye et deplacement :
				$reservation = new ModelReservation(1, $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix']),1;
                
			}else if (isset($_POST['paye']) && !isset($_POST['deplacement'])){
                
				//Paye mais ne se deplace pas : 
                $reservation = new ModelReservation(1, $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix'],0);
            
            }else if (!isset($_POST['paye']) && isset($_POST['deplacement'])){
                
				//Pas payé mais se déplace : 
                $reservation = new ModelReservation(0, $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix'],1);
                
            }else{
                
                //Pas payé et se déplace pas : 
				$reservation = new ModelReservation(0, $_POST['dateFacture'], $_POST['dateRelance'], $_POST['prix'],0);
			}                                    
                                                
			$reservation->save();
			$tab_edit = ModelReservation::getAllReservations();
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
			$tab_edit = ModelReservation::getAllReservations();
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