<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelReservation {
	private $numReservation;
	private $paye;
	private $dateFacture;
	private $dateRelance;
	private $prix;
	private $deplacement;
	
	public function getNumReservation(){
		return $this->numReservation;
	}
	
	public function getPaye(){
		return $this->paye;
	}
	
	public function getDateFacture(){
		return $this->dateFacture;
	}
	
	public function getDateRelance(){
		return $this->dateRelance;
	}
	
	public function getPrix(){
		return $this->prix;
	}
	
	public function getDeplacement(){
		return $this->deplacement;
	}
	
		// un constructeur
	public function __construct($paye = NULL, $dateFacture = NULL, $dateRelance = NULL, $prix = NULL, $deplacement = NULL) {
		if ( !is_null($paye) && !is_null($dateFacture) && !is_null($dateRelance) && !is_null($prix) && !is_null($deplacement)) {
			$this->paye = $paye;
			$this->dateFacture = $dateFacture;
			$this->dateRelance = $dateRelance;
			$this->prix = $prix;
            $this->deplacement = $deplacement;
		}
	}

		//methode d'affichage de tous les editeurs
	static public function getAllReservations() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM reservation');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllReservations() /!\ )');
		}
	}		
	
	static public function getReservationByNum($numReservation) {
		$sql = "SELECT * from reservation WHERE numReservation=:num_reservation";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_reservation" => $numReservation,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelReservation');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getReservationByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}
	
	public function save() {

		$sql = "INSERT INTO editeur (paye, dateFacture, dateRelance, prix, deplacement) VALUES (:paye_tag, :dateFacture_tag, :dateRelance_tag, :prix_tag, :deplacement_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"paye_tag" => $this->getPaye(),
				"dateFacture_tag" => $this->getDateFacture(),
				"dateRelance_tag" => $this->getDateRelance(),
				"prix_tag" => $this->getPrix(),
				"deplacement_tag" => $this->getDeplacement(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save de reservation /!\ )' . $e);
		}
	}
	
	public function deleteReservation() {
		$sql = "DELETE FROM reservation WHERE reservation.numReservation = :numReservation_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numReservation_tag" => $this->getNumReservation(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete() de reservation /!\ )');
		}
	} 

	public function update($numReservation){
		$sql = "UPDATE reservation SET reservation.paye = :paye_tag, 
								   reservation.dateFacture = :dateFacture_tag, 
								   reservation.dateRelance = :dateRelance_tag, 
								   reservation.prix = :prix_tag,
                                   reservation.deplacement = :deplacement_tag,
							 WHERE reservation.numReservation = :numReservation_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numReservation_tag" => $numReservation,
				"paye_tag" => $this->getPaye(),
				"dateFacture_tag" => $this->getdateFacture(),
				"dateRelance_tag" => $this->getdateRelance(),
				"prix_tag" => $this->getPrix(),
				"deplacement_tag" => $this->getDeplacement(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update() de Reservation /!\ )');
		}
	}
}

?>