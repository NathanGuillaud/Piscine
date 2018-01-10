<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelAvoir {
	private $numEditeur;
	private $numJeu;
	private $nbExemplaire;

	public function getNumJeu(){
		return $this->numJeu;
	}

	public function getNumEditeur(){
		return $this->numEditeur;
	}

	public function getNbExemplaire(){
		return $this->nbExemplaire;
	}


	// un constructeur
	public function __construct($numJeu = NULL, $numEditeur = NULL, $nbExemplaire = NULL) {
		if (!is_null($numEditeur) && !is_null($numJeu) && !is_null($nbExemplaire)) {
			$this->numEditeur = $numEditeur;
			$this->numJeu = $numJeu;
			$this->nbExemplaire = $nbExemplaire;
		}
	}

	//methode d'affichage de tous les contacts d'un editeur !
	static public function getAllExemplaireByEditeur($numJeu, $numEditeur) {
		$sql = "SELECT * from avoir WHERE numEditeur=:num_editeur AND numJeu = :num_jeu";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_editeur" => $numEditeur,
				"num_jeu" => $numJeu,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAvoir');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllJeuxByEditeur() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}

	//methode d'affichage de tous les contacts d'un editeur !
	static public function getAllJeuxByEditeur($numEditeur) {
		$sql = "SELECT * from avoir WHERE numEditeur=:num_editeur";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_editeur" => $numEditeur,
			);
	            // On donne les valeurs et on exécute la requête
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAvoir');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllJeuxByEditeur() /!\ )');
		}

		// Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}
		echo(count($tab_prod));
		echo("---");
		return $tab_prod;
	}

	public function save() {

		$sql = "INSERT INTO avoir (numJeu, numEditeur, nbExemplaire) VALUES (:num_jeu,:num_editeur,:nb_exemplaire)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_jeu" => $this->getNumJeu(),
				"nb_exemplaire" => $this->getNbExemplaire(),
				"num_editeur" => $this->getNumEditeur(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}

	public function updateAvoir(){
		$sql = "UPDATE avoir SET avoir.nbExemplaire = :nb_exemplaire
							WHERE avoir.numJeu = :num_jeu AND avoir.numEditeur = :num_editeur";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_jeu" => $this->getNumJeu(),
				"num_editeur" => $this->getNumEditeur(),
				"nb_exemplaire" => $this->getNbExemplaire(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method updateAvoir /!\ ) ' . $e);
		}
	}
}
?>
