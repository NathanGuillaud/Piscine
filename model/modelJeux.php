<?php
require_once File::buildPath(array('model', 'model.php'));

class ModelJeux {
	private $numJeu;	
	private $libelleJeu;
	private $estPrototype;
	private $estSurdim;
	private $payerFrais;	
	private $numType;
	
	public function getNumJeu(){
		return $this->numJeu;
	}

	public function getLibelleJeu(){
		return $this->libelleJeu;
	}
	
	public function getEstPrototype(){
		return $this->estPrototype;
	}
	
	public function getEstSurdim(){
		return $this->estSurdim;
	}
	
	public function getPayerFrais(){
		return $this->payerFrais;
	}
	
	public function getNumType(){
		return $this->numType;
	}
	
	// un constructeur
	public function __construct($libelleJeu = NULL, $estPrototype = NULL, $estSurdim = NULL, $payerFrais = NULL, $numType = NULL) {
		if (!is_null($libelleJeu) && !is_null($estPrototype) && !is_null($estSurdim) && !is_null($payerFrais) && !is_null($numType)) {
			$this->libelleJeu = $libelleJeu;
			$this->estPrototype = $estPrototype;
			$this->estSurdim = $estSurdim;
			$this->payerFrais = $payerFrais;
			$this->numType = $numType;
		}
	}

	static public function getJeuxByNum($numJeux) {
		$sql = "SELECT * from jeux WHERE numJeu=:num_jeux";
		try {
	            // Préparation de la requête
			$req_prep = Model::$pdo->prepare($sql);

			$values = array(
				"num_jeux" => $numJeux,
			);
	            // On donne les valeurs et on exécute la requête	 
			$req_prep->execute($values);

			$req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelJeux');
			$tab_prod = $req_prep->fetchAll();
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getJeuxByNum() /!\ )');
		}

        // Attention, si il n'y a pas de résultats, on renvoie false
		if (empty($tab_prod)) {
			return false;
		}

		return $tab_prod[0];
	}
	
	public function save() {
		$sql = "INSERT INTO jeux (libelleJeu, estPrototype, estSurdim, payerFrais, numType) VALUES (:libelleJeu_tag, :estPrototype_tag, :estSurdim_tag, :payerFrais_tag, :num_Type)";

		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"libelleJeu_tag" => $this->getLibelleJeu(),
				"estPrototype_tag" => $this->getEstPrototype(),
				"estSurdim_tag" => $this->getEstSurdim(),
				"payerFrais_tag" => $this->getPayerFrais(),
				"num_Type" => $this->getNumType(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ methode save /!\ )' . $e);
		}
	}
	
	public function deleteJeux() {
		$sql = "DELETE FROM jeux WHERE jeux.numJeu = :num_jeux";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"num_jeux" => $this->getNumJeu(),
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method delete /!\ )');
		}
	} 

	public function update($numJeux){
		$sql = "UPDATE jeux SET jeux.libelleJeu = :libelleJeu_tag, 
								   jeux.estPrototype = :estPrototype_tag, 
								   jeux.estSurdim = :estSurdim_tag, 
								   jeux.payerFrais = :payerFrais_tag,
								   jeux.numType = :num_type 
							 WHERE jeux.numJeu = :num_jeu";
		try {
			$req_prep = Model::$pdo->prepare($sql);
			$values = array(
				"libelleJeu_tag" => $this->getLibelleJeu(),
				"estPrototype_tag" => $this->getEstPrototype(),
				"estSurdim_tag" => $this->getEstSurdim(),
				"payerFrais_tag" => $this->getPayerFrais(),
				"num_type" => $this->getNumType(),
				"num_jeu" => $numJeux,
			);
			$req_prep->execute($values);
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method update /!\ )' . $e);
		}
	}

	public static function getLastNumJeux(){
		try {
			$rep = Model::$pdo->query('SELECT MAX(numJeu) FROM jeux');
			$maxNum = $rep->fetch();
			return $maxNum;
		} catch (PDOException $e) {
			echo('Error tout casse ( /!\ method getAllEditeurs() /!\ )');
		}
	}
}

?>