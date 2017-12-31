<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelFestival {
	private $idFestival;	
	private $nomSalle;
	private $nbTotalPlace;
	private $prixUniTable;
	
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
	
	
	// un constructeur
	public function __construct($nomSalle = NULL/*'The girl has no name' luul*/, $nbTotalPlace = NULL, $prixUniTable = NULL) {
		if (!is_null($nomSalle) && !is_null($nbTotalPlace) && !is_null($prixUniTable)) {
			$this->nomSalle = $nomSalle;
			$this->nbTotalPlace = $nbTotalPlace;
			$this->prixUniTable = $prixUniTable;
		}
	}
	
	public function save() {
		$sql = "INSERT INTO festival (nomSalle, nbTotalPlace, prixUniTable) VALUES (:nomSalle_tag, :nbTotalPlace_tag, :prixUniTable_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"nomSalle_tag" => $this->getNomSalle(),
				"nbTotalPlace_tag" => $this->getNbTotalPlace(),
				"prixUniTable_tag" => $this->getPrixUniTable(),
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
								   festival.prixUniTable = :prix
							 WHERE festival.idFestival = :id_festival";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"id_festival" => $idFestival,
				"nom_salle" => $this->getNomSalle(),
				"nb_place" => $this->getnbTotalPlace(),
				"prix" => $this->getPrixUniTable(),
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

}

?>