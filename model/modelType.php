<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelType {
	private $numType;	
	private $libelleType;

	
	public function getNumType(){
		return $this->numType;
	}

	public function getLibelleType(){
		return $this->libelleType;
	}
	
	// un constructeur
	public function __construct($libelleType = NULL) {
		if (!is_null($libelleType)) {
			$this->libelleType = $libelleType;
		}
	}

		//methode d'affichage de tous les types de jeux
	static public function getAllType() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM type');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelType');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllType() /!\ )');
		}
	}

	static public function getTypeByNum($numType) {
		$sql = "SELECT * from type WHERE numType=:num_type";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_type" => $numType,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelType');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getTypeByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}
	
	public function save() {

		$sql = "INSERT INTO type (libelleType) VALUES (:libelle_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"libelle_tag" => $this->getLibelleType(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}
	
	public function deleteType() {
		$sql = "DELETE FROM type WHERE type.numType = :numType_tag";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"numType_tag" => $this->getNumType(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	} 

	public function update($numType){
		$sql = "UPDATE type SET type.libelleType = :libelle_tag 
							WHERE type.numType = :num_type";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_type" => $numType,
				"libelle_tag" => $this->getLibelleType(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update type /!\ ) ' . $e);
		}
	}

	public static function isUsedType($numType){
		$sql = "SELECT COUNT(*) from jeux WHERE jeux.numType=:num_type";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_type" => $numType,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getTypeByNum() /!\ )');
		}

		if (empty($tab_prod) || $tab_prod[0] == 0) {
			return false;
		}else{
			return true;
		}
	}
}

?>