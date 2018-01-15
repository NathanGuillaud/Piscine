<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelFestival {
	private $idFestival;	
	private $nomSalle;
	private $nbTotalPlace;
	private $prixUniTable;
	private $annee;
	
	public function getIdFestival(){
		return $this->idFestival;
	}

	public function getNomSalle(){
		return $this->nomSalle;
	}
	
	public function getnbTotalPlace(){
		return $this->nbTotalPlace;
	}
	
	public function getPrixUniTable(){
		return $this->prixUniTable;
	}
	public function getAnneeFestival(){
		return $this->annee;
	}
	
	// un constructeur
	public function __construct($nomSalle = NULL, $nbTotalPlace = NULL, $prixUniTable = NULL, $annee = NULL) {
		if (!is_null($nomSalle) && !is_null($nbTotalPlace) && !is_null($prixUniTable) && !is_null($annee)) {
			$this->nomSalle = $nomSalle;
			$this->nbTotalPlace = $nbTotalPlace;
			$this->prixUniTable = $prixUniTable;
			$this->annee = $annee;
		}
	}

	static public function getAllFestivals() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM festival');
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelFestival');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllFestivals() /!\ )');
		}
	} 
	
	public function save() {
		$sql = "INSERT INTO festival (nomSalle, nbTotalPlace, prixUniTable, annee) VALUES (:nomSalle_tag, :nbTotalPlace_tag, :prixUniTable_tag, :annee)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nomSalle_tag" => $this->getNomSalle(),
				"nbTotalPlace_tag" => $this->getNbTotalPlace(),
				"prixUniTable_tag" => $this->getPrixUniTable(),
				"annee" => $this->getAnneeFestival(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save de festival /!\ )' . $e);
		}
	}
    
    static public function getFestivalById($idFestival) {
		$sql = "SELECT * from festival WHERE idFestival=:id_festival";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"id_festival" => $idFestival,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelFestival');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getFestivalByid() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	public function update($idFestival){
		$sql = "UPDATE festival SET festival.nomSalle = :nom_salle, 
								   festival.nbTotalPlace = :nb_place, 
								   festival.prixUniTable = :prix,
								   festival.annee = :annee
							 WHERE festival.idFestival = :id_festival";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"id_festival" => $idFestival,
				"nom_salle" => $this->getNomSalle(),
				"nb_place" => $this->getnbTotalPlace(),
				"prix" => $this->getPrixUniTable(),
				"annee" => $this->getAnneeFestival(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update /!\ )' . $e);
		}
	}

	static public function getNombrePlace($idFestival) {
		$sql = "SELECT nbTotalPlace from festival WHERE idFestival=:id_festival";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"id_festival" => $idFestival,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getNombrePlace() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0][0];
	}

    static public function getPrixUnitaire($idFestival) {
		$sql = "SELECT prixUniTable from festival WHERE idFestival=:id_festival";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"id_festival" => $idFestival,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getNombrePlace() /!\ )');
		}

        // Attention, si il n'y a pas de résultats!, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0][0];
	}

	public static function getLastIdFestival(){
		try {
			$rep = Model::$pdo->query('SELECT MAX(idFestival) FROM festival');
			$maxNum = $rep->fetch();
			return $maxNum[0];
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getLastIdFestival() /!\ )');
		}
	}
}

?>
