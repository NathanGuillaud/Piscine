<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelLouer {
	private $idZone;
	private $numReservation;
	private $quantitetable;

	public function getIdZone(){
		return $this->idZone;
	}

	public function getNumReservation(){
		return $this->numReservation;
	}

	public function getQuantiteTable(){
		return $this->quantitetable;
	}

	// un constructeur
	public function __construct($quantitetable = NULL, $idZone = NULL, $numReservation = NULL) {
		if (!is_null($quantitetable) && !is_null($idZone) && !is_null($numReservation)) {
			$this->quantitetable = $quantitetable;
			$this->idZone = $idZone;
			$this->numReservation = $numReservation;
		}
	}

	//table par zone/par reservation
	static public function getNbTable($idZone, $numReservation) {
		$sql = "SELECT quantitetable from louer WHERE idZone=:idZone AND numReservation=:numReservation";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"idZone" => $idZone,
				"numReservation" => $numReservation,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getNbTable() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	public function save() {

		$sql = "INSERT INTO louer (quantitetable, idZone, numReservation) VALUES (:quantitetable,:idZone,:numReservation)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"quantitetable" => $this->getQuantiteTable(),
				"idZone" => $this->getIdZone(),
				"numReservation" => $this->getNumReservation(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save de louer /!\ )' . $e);
		}
	}

	public function updateLouer(){
		$sql = "UPDATE louer SET louer.quantitetable = :quantitetable
							 WHERE louer.idZone=:idZone AND louer.numReservation=:numReservation";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"quantitetable" => $this->getQuantiteTable(),
				"idZone" => $this->getIdZone(),
				"numReservation" => $this->getNumReservation(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method updateLouer() /!\ ) ' . $e);
		}
	}

	public static function getNombrePlaceRestante($idFestival){
		$placeTotal = ModelFestival::getNombrePlace($idFestival);
		try {
			$rep = Model::$pdo->query('SELECT SUM(quantitetable) FROM louer');
			$tab_prod = $rep->fetchAll();
			if($tab_prod[0][0] == NULL){
				$placeRestante = intval($placeTotal);
			}else{
				$placeRestante = intval($placeTotal) - intval($tab_prod[0][0]);
			}
			return $placeRestante;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllZones() /!\ )');
		}
	}

	static public function getAllTableByReservation($numReservation) {
		$sql = "SELECT quantitetable from louer WHERE numReservation=:numReservation";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"numReservation" => $numReservation,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllTableByReservation() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}
		return $tab_prod[0][0];
	}
}
?>
