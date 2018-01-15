<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelZone {
	private $idFestival;
	private $idZone;
	private $libelleZone;

	public function getIdFestival(){
		return $this->idFestival;
	}

	public function getIdZone(){
		return $this->idZone;
	}

	public function getLibelleZone(){
		return $this->libelleZone;
	}


	// un constructeur
	public function __construct($idFestival = NULL, $libelleZone = NULL) {
		if (!is_null($idFestival) && !is_null($libelleZone)) {
			$this->idFestival = $idFestival;
			$this->libelleZone= $libelleZone;
		}
	}

	public function save() {
		$sql = "INSERT INTO zone (idZone, idFestival, libelleZone) VALUES (:idZone_tag, :idFestival_tag, :libelleZone_tag)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"idZone_tag" => $this->getIdZone(),
				"idFestival_tag" => $this->getIdFestival(),
				"libelleZone_tag" => $this->getLibelleZone(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save de Zone /!\ )' . $e);
		}
	}

    static public function getZoneById($idZone) {
		$sql = "SELECT * from zone WHERE idZone=:idZone";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"idZone" => $idZone,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelZone');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getZoneByid() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

    static public function getAllZones() {
		try {
			$rep = Model::$pdo->query('SELECT * FROM zone WHERE idFestival =' . $_SESSION['idFestival']);
			$rep->setFetchMode(PDO::FETCH_CLASS, 'ModelZone');
			$tab_prod = $rep->fetchAll();
			return $tab_prod;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllZones() /!\ )');
		}
	}


	public function update($idZone){
		$sql = "UPDATE zone SET zone.libelleZone=:libelleZone WHERE zone.idZone=:idZone";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"idZone" => $idZone,
				"libelleZone" => $this->getLibelleZone(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update Zone /!\ )' . $e);
		}
	}

	public function deleteZone() {
		$sql = "DELETE FROM zone WHERE zone.idZone = :id_zone";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"id_zone" => $this->getIdZone(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	}

	public static function getLastIdZone(){
		try {
			$rep = Model::$pdo->query('SELECT MAX(idZone) FROM zone');
			$maxNum = $rep->fetch();
			return $maxNum;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getLastIdZone() /!\ )');
		}
	}

	static public function getTypeById($idZone) {
		$sql = "SELECT type.libelleType from type,concerner,zone WHERE concerner.idZone=:idZone AND concerner.numType=type.numType LIMIT 1";
		try {
							// Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"idZone" => $idZone,
			);
							// On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelZone');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getTypeById() /!\ )');
		}

				// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	static public function getJeuxAndEditeurById($idZone) {
		$sql = "SELECT jeux.libelleJeu, editeur.nomEditeur
		FROM jeux,posseder,louer,zone,avoir,editeur
		WHERE zone.idZone=:idZone
		AND zone.idZone=louer.idZone
		AND louer.numReservation=posseder.numReservation
		AND posseder.numJeu=jeux.numJeu
		AND jeux.numJeu=avoir.numJeu
		AND avoir.numEditeur=editeur.numEditeur";
		try {
							// Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"idZone" => $idZone,
			);
							// On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelZone');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getJeuxAndEditeurById() /!\ )');
		}

				// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod;
	}
}

?>
