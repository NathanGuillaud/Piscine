<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelConcerner {
	private $numType;	
	private $idZone;
	
	public function getNumType(){
		return $this->numType;
	}
	
	public function getIdZone(){
		return $this->idZone;
	}
	
	
	// un constructeur
	public function __construct($numType = NULL, $idZone = NULL) {
		if (!is_null($numType) && !is_null($idZone)) {
			$this->idZone = $idZone;
			$this->numType = $numType;
		}
	}
	
	//zone par type
	static public function getAllZoneByType($numType, $idZone) {
		$sql = "SELECT * from concerner WHERE numType=:numType";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"numType" => $numType
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelConcerner');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllZoneByType() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	//type d'une zone
	static public function getTypeZone($idZone) {
		$sql = "SELECT * from concerner WHERE idZone=:idZone";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"idZone" => $idZone
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelConcerner');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllZoneByType() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}
	
	public function save() {

		$sql = "INSERT INTO concerner (numType, idZone) VALUES (:numType,:idZone)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numType" => $this->getNumType(),
				"idZone" => $this->getIdZone(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save de Concerner /!\ )' . $e);
		}
	}
	
	public function updateConcerner(){
		$sql = "UPDATE concerner SET concerner.numType = :numType 
							WHERE concerner.idZone = :idZone ";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numType" => $this->getNumType(),
				"idZone" => $this->getIdZone(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method updateConcerner() /!\ ) ' . $e);
		}
	}
}
?>