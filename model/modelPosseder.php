<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelPosseder {
	private $envoi;
	private $don;
	private $nbExemplaire;
	private $numJeu;
	private $numReservation;


	public function getNumJeu(){
		return $this->numJeu;
	}

	public function getEnvoi(){
		return $this->envoi;
	}

	public function getDon(){
		return $this->don;
	}

	public function getNbExemplaire(){
		return $this->nbExemplaire;
	}

	public function getNumReservation(){
		return $this->numReservation;
	}


	// un constructeur
	public function __construct($envoi = NULL, $don = NULL, $nbExemplaire = NULL, $numJeu = NULL ,$numReservation = NULL) {
		if (!is_null($envoi) && !is_null($don) && !is_null($nbExemplaire) && !is_null($numJeu) && !is_null($numReservation)) {
			$this->envoi = $envoi;
			$this->don = $don;
			$this->numJeu = $numJeu;
			$this->nbExemplaire = $nbExemplaire;
			$this->numReservation = $numReservation;
		}
	}

	public function save() {

		$sql = "INSERT INTO posseder (Envoi, Don, nbExemplaire, numJeu, numReservation) VALUES (:envoi, :don, :nb_exemplaire, :numJeu, :numReservation)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"envoi" => $this->getEnvoi(),
				"don" => $this->getDon(),
				"nb_exemplaire" => $this->getNbExemplaire(),
				"numJeu" => $this->getNumJeu(),
				"numReservation" => $this->getNumReservation(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}

	public function updatePosseder(){
		$sql = "UPDATE posseder SET envoi = :envoi, don = :don, nbExemplaire = :nbExemplaire
							WHERE numJeu = :num_jeu AND numReservation = :num_reservation";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_jeu" => $this->getNumJeu(),
				"don" => $this->getDon(),
				"nb_exemplaire" => $this->getNbExemplaire(),
				"num_reservation" => $this->getNumReservation(),
				"envoi" => $this->getEnvoi(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method updatePosseder /!\ ) ' . $e);
		}
	}
}
?>
